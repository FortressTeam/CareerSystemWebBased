<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Posts Controller
 *
 * @property \App\Model\Table\PostsTable $Posts
 */
class PostsController extends AppController
{

    public $paginate = [
        'fields' => ['Posts.id', 'Posts.post_title', 'Posts.hiring_manager_id', 'Posts.post_date', 'Posts.post_status'],
        'order' => ['Posts.post_date' => 'DESC'],
        'limit' => 20
    ];


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
        $query = $this->Posts
            ->find('search', $this->Posts->filterParams($this->request->query))
            ->contain(['Categories', 'HiringManagers'])
            ->autoFields(true)
            ->where(['post_title IS NOT' => null]);
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
        $post = $this->Posts->get($id, [
            'contain' => ['Categories', 'HiringManagers', 'ApplicantsFollowPosts', 'PostsHasCurriculumVitaes']
        ]);
        $this->set(compact('post'));
        $this->set('_serialize', ['post']);
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
        $hiringManagers = $this->Posts->HiringManagers->find('list', ['limit' => 200]);
        $this->set(compact('post', 'categories', 'hiringManagers'));
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
}
