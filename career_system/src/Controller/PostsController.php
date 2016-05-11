<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

/**
 * Posts Controller
 *
 * @property \App\Model\Table\PostsTable $Posts
 */
class PostsController extends AppController
{

    public $paginate = [
        'order' => ['Posts.post_date' => 'DESC'],
        'limit' => 10
    ];

    private $_fields = [
        'id', 'post_title', 'post_salary', 'post_date',
        'category_id', 'hiring_manager_id',
        'Categories.id', 'Categories.category_name',
        'HiringManagers.id', 'HiringManagers.company_name',
        'HiringManagers.hiring_manager_phone_number'
    ];

    private $_contains = ['Categories', 'HiringManagers'];


    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow('view');
    }
    
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Search.Prg', [
            'actions' => ['index'],
        ]);
    }

    public function index()
    {
        $loggedUser = $this->request->session()->read('Auth.User');
        $conditions = [];
        if(isset($loggedUser['id']) && isset($loggedUser['group_id']) && ($loggedUser['group_id'] == '2')){
            $conditions = ['hiring_manager_id =' => $this->request->session()->read('Auth.User')['id']];
        }
        $query = $this->Posts
            ->find('search', $this->Posts->filterParams($this->request->query))
            ->contain(['Categories', 'HiringManagers'])
            ->autoFields(true)
            ->where(['post_title IS NOT' => null, $conditions]);
        $posts = $this->paginate($query);

        $countCats = $this->Posts->Categories->find()->select([
            'count' => $query->func()->count('id')
        ]);

        $countPosts = $this->Posts->find()->select([
            'count' => $query->func()->count('id')
        ]);

        $this->set(compact('posts', 'countCats', 'countPosts'));
        $this->set('_serialize', ['posts', 'countCats', 'countPosts']);
    }

    public function followedPosts(){
        $loggedUser = $this->request->session()->read('Auth.User');
        $posts = $this->Posts->find('all')
            ->select($_fields)
            ->contain($_contains)
            ->join([
                'table' => 'applicants_follow_posts',
                'alias' => 'jTable',
                'type' => 'LEFT',
                'conditions' => 'jTable.post_id = Posts.id',
            ])
            ->where([
                'post_status' => '1',
                'jTable.applicant_id' => $loggedUser['id'],
                'jTable.follow_status' => '1'
            ]);

        $this->set(compact('posts'));
        $this->set('_serialize', ['posts']);
    }

    public function followedCompanyPosts(){
        $loggedUser = $this->request->session()->read('Auth.User');
        $posts = $this->Posts->find('all')
            ->select($_fields)
            ->contain($_contains)
            ->join([
                'table' => 'hiring_managers',
                'alias' => 'jHiring',
                'type' => 'LEFT',
                'conditions' => 'jHiring.id = Posts.hiring_manager_id',
            ])
            ->join([
                'table' => 'follow',
                'alias' => 'jFollow',
                'type' => 'LEFT',
                'conditions' => 'jFollow.hiring_manager_id = jHiring.id',
            ])
            ->where([
                'post_status' => '1',
                'jFollow.applicant_id' => $loggedUser['id'],
                'jFollow.follow_hiring_manager' => '1'
            ]);

        $this->set(compact('posts'));
        $this->set('_serialize', ['posts']);
    }

    public function submittedPosts(){
        $loggedUser = $this->request->session()->read('Auth.User');
        $posts = $this->Posts->find('all')
            ->select($_fields)
            ->contain($_contains)
            ->join([
                'table' => 'posts_has_curriculum_vitaes',
                'alias' => 'jSubmit',
                'type' => 'LEFT',
                'conditions' => 'jSubmit.post_id = Posts.id',
            ])
            ->join([
                'table' => 'curriculum_vitaes',
                'alias' => 'jCV',
                'type' => 'LEFT',
                'conditions' => 'jSubmit.curriculum_vitae_id = jCV.id',
            ])
            ->where([
                'post_status' => '1',
                'jCV.applicant_id' => $loggedUser['id']
            ]);

        $this->set(compact('posts'));
        $this->set('_serialize', ['posts']);
    }

    public function view($id = null)
    {
        $loggedUser = $this->request->session()->read('Auth.User');
        
        $applicantCVConditions = [];
        if((isset($loggedUser['group_id'])) && ($loggedUser['group_id'] == '3')){
            $applicantCVConditions = function ($q) {
                $loggedUser = $this->request->session()->read('Auth.User');
                return $q
                    ->contain(['CurriculumVitaes'])
                    ->where(['CurriculumVitaes.applicant_id' => $loggedUser['id']]);
            };
        }
        
        $post = $this->Posts->get($id, [
            'contain' => [
                'Categories',
                'HiringManagers',
                'ApplicantsFollowPosts' => function ($q) {
                    $loggedUser = $this->request->session()->read('Auth.User');
                    return $q
                        ->where(['applicant_id' => $loggedUser['id']]);
                },
                'CurriculumVitaes' => function($q){
                    return $q
                        ->contain(['Applicants'])
                        ->select(['Applicants.id', 'Applicants.applicant_name'])
                        ->select(['id', 'curriculum_vitae_name']);
                },
                'PostsHasCurriculumVitaes' => $applicantCVConditions
            ],
        ]);

        $loggedUser = $this->request->session()->read('Auth.User');
        $curriculumVitaes = $this->Posts->CurriculumVitaes->find('all', [
            'fields' => ['id', 'applicant_id', 'curriculum_vitae_name', 'CurriculumVitaeTemplates.curriculum_vitae_template_image'],
            'contain' => ['CurriculumVitaeTemplates'],
            'conditions' => ['applicant_id' => $loggedUser['id']]
        ]);

        $editable = $this->Posts->isOwnedBy($id, $loggedUser['id']);

        $this->set(compact('post', 'curriculumVitaes', 'editable'));
        $this->set('_serialize', ['post', 'curriculumVitaes', 'editable']);
    }

    public function add()
    {
        $post = $this->Posts->newEntity();
        if ($this->request->is('post')) {
            $post = $this->Posts->patchEntity($post, $this->request->data);
            if ($this->Posts->save($post)) {
                $this->Flash->success(__('The post has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The post could not be saved. Please, try again.'));
            }
        }
        $categories = $this->Posts->Categories->find('list', ['limit' => 200]);
        $this->set(compact('post', 'categories'));
        $this->set('_serialize', ['post']);
    }

    public function edit($id = null)
    {
        $post = $this->Posts->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $post = $this->Posts->patchEntity($post, $this->request->data);
            if ($this->Posts->save($post)) {
                $this->Flash->success(__('The post has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The post could not be saved. Please, try again.'));
            }
        }
        $categories = $this->Posts->Categories->find('list', ['limit' => 200]);
        $hiringManagers = $this->Posts->HiringManagers->find('list', ['limit' => 200]);
        $this->set(compact('post', 'categories', 'hiringManagers'));
        $this->set('_serialize', ['post']);
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $post = $this->Posts->get($id);
        if ($this->Posts->delete($post)) {
            $this->Flash->success(__('The post has been deleted.'));
        } else {
            $this->Flash->error(__('The post could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function isAuthorized($user)
    {
        if ($this->request->action === 'get') {
            return true;
        }
        if ($this->request->action === 'index') {
            if (isset($user['group_id']) 
                && (($user['group_id'] == '2') || ($user['group_id'] == '1'))) {
                    return true;
                }
        }
        else if ($this->request->action === 'add'){
            if (isset($user['group_id']) && $user['group_id'] == '2') {
                return true;
            }
        }
        else if ($this->request->action === 'view') {
            return true;
        }
        else if (in_array($this->request->action, ['edit', 'delete'])) {
            $postId = (int)$this->request->params['pass'][0];
            if ($this->Posts->isOwnedBy($postId, $user['id'])) {
                return true;
            }
        }
        return false;
    }
}
