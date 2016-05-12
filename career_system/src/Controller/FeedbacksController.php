<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Feedbacks Controller
 *
 * @property \App\Model\Table\FeedbacksTable $Feedbacks
 */
class FeedbacksController extends AppController
{

    public $paginate = [
        'order' => ['Feedbacks.feedback_date' => 'DESC'],
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
        $this->Auth->allow('add');
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
        $query = $this->Feedbacks
            ->find('search', $this->Feedbacks->filterParams($this->request->query))
            ->contain(['FeedbackTypes', 'Users'])
            ->autoFields(true)
            ->where(['feedback_title IS NOT' => null]);
        $feedbacks = $this->paginate($query);

        $this->set(compact('feedbacks'));
        $this->set('_serialize', ['feedbacks']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $feedback = $this->Feedbacks->newEntity();
        if ($this->request->is('post')) {
            $loggedUser = $this->request->session()->read('Auth.User');
            $this->request->data['user_id'] = $loggedUser ? $loggedUser['id'] : '6';
            $this->request->data['feedback_date'] = date("Y-m-d");
            $feedback = $this->Feedbacks->patchEntity($feedback, $this->request->data);
            if ($this->Feedbacks->save($feedback)) {
                $this->Flash->success(__('The feedback has been saved.'));
                return $this->redirect($this->referer());
            } else {
                $this->Flash->error(__('The feedback could not be saved. Please, try again.'));
                return $this->redirect($this->referer());
            }
        }
        if ($this->request->is('ajax')) {
            $this->response->disableCache();
            $this->viewBuilder()->layout('ajax');
            $feedbackTypes = $this->Feedbacks->FeedbackTypes->find('list', ['limit' => 200]);
            $users = $this->Feedbacks->Users->find('list', ['limit' => 200]);
            $this->set(compact('feedback', 'feedbackTypes', 'users'));
            $this->set('_serialize', ['feedback']);
        }
        else {
            $this->Flash->success(__('This page is not found.'));
            return $this->redirect($this->referer());
        }
    }

    /**
     * is authorized callback.
     *
     * @param $user
     * @return void
     */
    public function isAuthorized($user)
    {
        if (isset($user['group_id']) && ($user['group_id'] == '1')) {
            return true;
        }
    }
}
