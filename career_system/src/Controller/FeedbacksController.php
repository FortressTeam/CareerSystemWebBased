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

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['FeedbackTypes', 'Users']
        ];
        $feedbacks = $this->paginate($this->Feedbacks);

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

    /**
     * Statistic method
     *
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function statistic()
    {
        
    }

    // /**
    //  * Edit method
    //  *
    //  * @param string|null $id Feedback id.
    //  * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
    //  * @throws \Cake\Network\Exception\NotFoundException When record not found.
    //  */
    // public function edit($id = null)
    // {
    //     $feedback = $this->Feedbacks->get($id, [
    //         'contain' => []
    //     ]);
    //     if ($this->request->is(['patch', 'post', 'put'])) {
    //         $feedback = $this->Feedbacks->patchEntity($feedback, $this->request->data);
    //         if ($this->Feedbacks->save($feedback)) {
    //             $this->Flash->success(__('The feedback has been saved.'));
    //             return $this->redirect(['action' => 'index']);
    //         } else {
    //             $this->Flash->error(__('The feedback could not be saved. Please, try again.'));
    //         }
    //     }
    //     $feedbackTypes = $this->Feedbacks->FeedbackTypes->find('list', ['limit' => 200]);
    //     $users = $this->Feedbacks->Users->find('list', ['limit' => 200]);
    //     $this->set(compact('feedback', 'feedbackTypes', 'users'));
    //     $this->set('_serialize', ['feedback']);
    // }

    // /**
    //  * Delete method
    //  *
    //  * @param string|null $id Feedback id.
    //  * @return \Cake\Network\Response|null Redirects to index.
    //  * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
    //  */
    // public function delete($id = null)
    // {
    //     $this->request->allowMethod(['post', 'delete']);
    //     $feedback = $this->Feedbacks->get($id);
    //     if ($this->Feedbacks->delete($feedback)) {
    //         $this->Flash->success(__('The feedback has been deleted.'));
    //     } else {
    //         $this->Flash->error(__('The feedback could not be deleted. Please, try again.'));
    //     }
    //     return $this->redirect(['action' => 'index']);
    // }
}
