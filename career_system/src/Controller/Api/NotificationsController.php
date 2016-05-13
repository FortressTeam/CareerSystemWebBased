<?php
namespace App\Controller\Api;

use App\Controller\Api\AppController;

/**
 * Notifications Controller
 *
 * @property \App\Model\Table\NotificationsTable $Notifications
 */
class NotificationsController extends AppController
{

    public function index()
    {
        $conditions = [];
        if(isset($this->request->query['user_id'])) {
            $conditions['user_id'] = $this->request->query['user_id'];
        }
        $this->paginate = [
            'conditions' => $conditions,
            'order' => ['is_seen' => 'ASC']
        ];
        $notifications = $this->paginate($this->Notifications);

        $this->set(compact('notifications'));
        $this->set('_serialize', ['notifications']);
    }

    public function notSeen()
    {
        $count = $this->Notifications->find()
            ->where([
                'user_id' => $this->request->query['user_id'],
                'is_seen' => false
            ])
            ->count();

        $this->set(compact('count'));
        $this->set('_serialize', ['count']);
    }

    public function view($id = null)
    {
        $notification = $this->Notifications->get($id);

        $this->set('notification', $notification);
        $this->set('_serialize', ['notification']);
    }

    public function hasSeen($id = null)
    {
        $notification = $this->Notifications->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $notification = $this->Notifications->patchEntity($notification, $this->request->data);
            if ($this->Notifications->save($notification)) {
                $message = 'Saved';
            } else {
                $message = 'Error';
            }
        }
        $this->set(compact('notification'));
        $this->set('_serialize', ['notification']);
    }
}
