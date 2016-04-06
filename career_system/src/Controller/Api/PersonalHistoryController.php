<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PersonalHistory Controller
 *
 * @property \App\Model\Table\PersonalHistoryTable $PersonalHistory
 */
class PersonalHistoryController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['PersonalHistoryTypes', 'Applicants']
        ];
        $personalHistory = $this->paginate($this->PersonalHistory);

        $this->set(compact('personalHistory'));
        $this->set('_serialize', ['personalHistory']);
    }

    /**
     * View method
     *
     * @param string|null $id Personal History id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $personalHistory = $this->PersonalHistory->get($id, [
            'contain' => ['PersonalHistoryTypes', 'Applicants']
        ]);

        $this->set('personalHistory', $personalHistory);
        $this->set('_serialize', ['personalHistory']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $personalHistory = $this->PersonalHistory->newEntity();
        if ($this->request->is('post')) {
            $personalHistory = $this->PersonalHistory->patchEntity($personalHistory, $this->request->data);
            if ($this->PersonalHistory->save($personalHistory)) {
                $this->Flash->success(__('The personal history has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The personal history could not be saved. Please, try again.'));
            }
        }
        $personalHistoryTypes = $this->PersonalHistory->PersonalHistoryTypes->find('list', ['limit' => 200]);
        $applicants = $this->PersonalHistory->Applicants->find('list', ['limit' => 200]);
        $this->set(compact('personalHistory', 'personalHistoryTypes', 'applicants'));
        $this->set('_serialize', ['personalHistory']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Personal History id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $personalHistory = $this->PersonalHistory->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $personalHistory = $this->PersonalHistory->patchEntity($personalHistory, $this->request->data);
            if ($this->PersonalHistory->save($personalHistory)) {
                $this->Flash->success(__('The personal history has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The personal history could not be saved. Please, try again.'));
            }
        }
        $personalHistoryTypes = $this->PersonalHistory->PersonalHistoryTypes->find('list', ['limit' => 200]);
        $applicants = $this->PersonalHistory->Applicants->find('list', ['limit' => 200]);
        $this->set(compact('personalHistory', 'personalHistoryTypes', 'applicants'));
        $this->set('_serialize', ['personalHistory']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Personal History id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $personalHistory = $this->PersonalHistory->get($id);
        if ($this->PersonalHistory->delete($personalHistory)) {
            $this->Flash->success(__('The personal history has been deleted.'));
        } else {
            $this->Flash->error(__('The personal history could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
