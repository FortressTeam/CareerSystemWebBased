<?php
namespace App\Controller\Api;

use App\Controller\Api\AppController;

/**
 * Follow Controller
 *
 * @property \App\Model\Table\FollowTable $Follow
 */
class FollowController extends AppController
{

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $follow = $this->Follow->newEntity();
        if ($this->request->is('post')) {
            $follow = $this->Follow->patchEntity($follow, $this->request->data);
            if ($this->Follow->save($follow)) {
                $message = 'Saved';
            } else {
                $message = 'Error';
            }
        }
        $this->set(compact('message', 'follow'));
        $this->set('_serialize', ['message', 'follow']);
    }
}
