<?php
namespace App\Controller\Api;

use App\Controller\Api\AppController;

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
                $message = 'Saved';
            } else {
                $message = 'Error';
            }
        }
        $this->set(compact('message', 'hiringManager'));
        $this->set('_serialize', ['message', 'hiringManager']);
    }
}
