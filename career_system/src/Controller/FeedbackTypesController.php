<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * FeedbackTypes Controller
 *
 * @property \App\Model\Table\FeedbackTypesTable $FeedbackTypes
 */
class FeedbackTypesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $feedbackTypes = $this->paginate($this->FeedbackTypes);

        $this->set(compact('feedbackTypes'));
        $this->set('_serialize', ['feedbackTypes']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $feedbackType = $this->FeedbackTypes->newEntity();
        if ($this->request->is('post')) {
            $feedbackType = $this->FeedbackTypes->patchEntity($feedbackType, $this->request->data);
            if ($this->FeedbackTypes->save($feedbackType)) {
                $this->Flash->success(__('The feedback type has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The feedback type could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('feedbackType'));
        $this->set('_serialize', ['feedbackType']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Feedback Type id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $feedbackType = $this->FeedbackTypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $feedbackType = $this->FeedbackTypes->patchEntity($feedbackType, $this->request->data);
            if ($this->FeedbackTypes->save($feedbackType)) {
                $this->Flash->success(__('The feedback type has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The feedback type could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('feedbackType'));
        $this->set('_serialize', ['feedbackType']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Feedback Type id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $feedbackType = $this->FeedbackTypes->get($id);
        if ($this->FeedbackTypes->delete($feedbackType)) {
            $this->Flash->success(__('The feedback type has been deleted.'));
        } else {
            $this->Flash->error(__('The feedback type could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
