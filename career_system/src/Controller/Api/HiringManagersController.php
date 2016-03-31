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


    public function index()
    {
        $hiringManagers = $this->paginate($this->HiringManagers);

        $this->set(compact('hiringManagers'));
        $this->set('_serialize', ['hiringManagers']);
    }


    public function view($id = null)
    {
        $hiringManager = $this->HiringManagers->get($id, [
            'contain' => ['Appointments', 'Follow', 'Posts', 'Users']
        ]);
        $this->set(compact('hiringManager'));
        $this->set('_serialize', ['hiringManager']);
    }


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
