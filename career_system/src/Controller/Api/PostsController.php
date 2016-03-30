<?php
namespace App\Controller\Api;

use App\Controller\Api\AppController;

class PostsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $conditions = [];
        if(isset($this->request->params['hiring_manager_id'])) {
            $conditions['hiring_manager_id'] = $this->request->params['hiring_manager_id'];
        }
        $this->paginate = [
            'conditions' => $conditions,
            'contain' => ['Categories', 'HiringManagers']
        ];
        $posts = $this->paginate($this->Posts);

        $this->set(compact('posts'));
        $this->set('_serialize', ['posts']);
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
				$message = 'Saved';
			} else {
				$message = 'Error';
			}
        }
        $this->set(compact('message', 'post'));
        $this->set('_serialize', ['message', 'post']);
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
        $post = $this->Posts->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $post = $this->Posts->patchEntity($post, $this->request->data);
            if ($this->Posts->save($post)) {
				$message = 'Saved';
			} else {
				$message = 'Error';
			}
		}
        $this->set(compact('message', 'post'));
        $this->set('_serialize', ['message', 'post']);
    }
}