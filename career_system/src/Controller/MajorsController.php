<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Majors Controller
 *
 * @property \App\Model\Table\MajorsTable $Majors
 */
class MajorsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $majors = $this->paginate($this->Majors);

        $this->set(compact('majors'));
        $this->set('_serialize', ['majors']);
    }

    /**
     * View method
     *
     * @param string|null $id Major id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $major = $this->Majors->get($id, [
            'contain' => ['Applicants']
        ]);

        $this->set('major', $major);
        $this->set('_serialize', ['major']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $major = $this->Majors->newEntity();
        if ($this->request->is('post')) {
            $major = $this->Majors->patchEntity($major, $this->request->data);
            if ($this->Majors->save($major)) {
                $this->Flash->success(__('The major has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The major could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('major'));
        $this->set('_serialize', ['major']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Major id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $major = $this->Majors->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $major = $this->Majors->patchEntity($major, $this->request->data);
            if ($this->Majors->save($major)) {
                $this->Flash->success(__('The major has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The major could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('major'));
        $this->set('_serialize', ['major']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Major id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $major = $this->Majors->get($id);
        if ($this->Majors->delete($major)) {
            $this->Flash->success(__('The major has been deleted.'));
        } else {
            $this->Flash->error(__('The major could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
