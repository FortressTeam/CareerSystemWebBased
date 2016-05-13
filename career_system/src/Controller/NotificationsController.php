<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Notifications Controller
 *
 * @property \App\Model\Table\NotificationsTable $Notifications
 */
class NotificationsController extends AppController
{

    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $notifications = $this->paginate($this->Notifications);

        $this->set(compact('notifications'));
        $this->set('_serialize', ['notifications']);
    }

    public function view($id = null)
    {
        $notification = $this->Notifications->get($id);

        if($notification['notification_type'] == '1') {
            $this->redirect(['controller' => 'Posts', 'action' => 'view', 'slug' => 'from-notifications', 'id' => $notification['notification_object_id']]);
        }
        else if($notification['notification_type'] == '2') {
            $this->redirect(['controller' => 'Applicants', 'action' => 'view', 'slug' => 'from-notifications', 'id' => $notification['notification_object_id']]);
        }
        else if($notification['notification_type'] == '3') {
            $this->redirect(['controller' => 'HiringManagers', 'action' => 'view', 'slug' => 'from-notifications', 'id' => $notification['notification_object_id']]);
        }

        $this->set('notification', $notification);
        $this->set('_serialize', ['notification']);
    }

    public function isAuthorized(){
        return true;
    }
}
