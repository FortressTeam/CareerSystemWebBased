<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * HiringManagers Controller
 *
 * @property \App\Model\Table\HiringManagersTable $HiringManagers
 */
class HiringManagersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $hiringManagers = $this->paginate($this->HiringManagers);

        $this->set(compact('hiringManagers'));
        $this->set('_serialize', ['hiringManagers']);
    }

    /**
     * View method
     *
     * @param string|null $id Hiring Manager id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $hiringManager = $this->HiringManagers->get($id, [
            'contain' => ['Appointments', 'Follow', 'Posts', 'Users']
        ]);
        $this->set('hiringManager', $hiringManager);
        $this->set('_serialize', ['hiringManager']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $hiringManager = $this->HiringManagers->newEntity();
        if ($this->request->is('post')) {
            $hiringManager = $this->HiringManagers->patchEntity($hiringManager, $this->request->data);
            if ($this->HiringManagers->save($hiringManager)) {
                $this->Flash->success(__('The hiring manager has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The hiring manager could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('hiringManager'));
        $this->set('_serialize', ['hiringManager']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Hiring Manager id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $hiringManager = $this->HiringManagers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $hiringManager = $this->HiringManagers->patchEntity($hiringManager, $this->request->data);
            if ($this->HiringManagers->save($hiringManager)) {
                $this->Flash->success(__('The hiring manager has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The hiring manager could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('hiringManager'));
        $this->set('_serialize', ['hiringManager']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Hiring Manager id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $hiringManager = $this->HiringManagers->get($id);
        if ($this->HiringManagers->delete($hiringManager)) {
            $this->Flash->success(__('The hiring manager has been deleted.'));
        } else {
            $this->Flash->error(__('The hiring manager could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
