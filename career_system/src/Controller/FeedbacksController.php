<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Feedbacks Controller
 *
 * @property \App\Model\Table\FeedbacksTable $Feedbacks
 */
class FeedbacksController extends AppController
{

    public $paginate = [
        'fields' => [
            'Feedbacks.id',
            'Feedbacks.feedback_title',
            'Feedbacks.feedback_date',
            'Feedbacks.user_id'
        ],
        'order' => ['Feedbacks.feedback_date' => 'DESC'],
        'limit' => 10
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
     * View method
     *
     * @param string|null $id Feedback id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $feedback = $this->Feedbacks->get($id, [
            'contain' => ['FeedbackTypes', 'Users']
        ]);

        $this->set('feedback', $feedback);
        $this->set('_serialize', ['feedback']);
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
}
