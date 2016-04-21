<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

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

    /**
     * Before filter callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return void
     */
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow('view');
    }
    
    /**
     * Initialize method
     *
     * @return \Cake\Network\Response|null
     */
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Search.Prg', [
            'actions' => ['index'],
        ]);
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
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

    /**
     * View method
     *
     * @param string|null $id Post id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
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

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
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

    /**
     * Edit method
     *
     * @param string|null $id Post id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
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

    /**
     * Delete method
     *
     * @param string|null $id Post id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
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

    /**
     * is authorized callback.
     *
     * @param $user
     * @return void
     */
    public function isAuthorized($user)
    {
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
