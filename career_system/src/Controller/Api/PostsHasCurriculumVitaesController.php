<?php
namespace App\Controller\Api;

use App\Controller\Api\AppController;
use Cake\Network\Exception\UnauthorizedException;

/**
 * PostsHasCurriculumVitaes Controller
 *
 * @property \App\Model\Table\PostsHasCurriculumVitaesTable $PostsHasCurriculumVitaes
 */
class PostsHasCurriculumVitaesController extends AppController
{

    /**
     * Initialize method
     *
     * @return \Cake\Network\Response|null
     */
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Pna');
    }

    private function _getUser($id = null)
    {
        $this->loadModel('Users');
        $user = $this->Users->find('all', [
            'fields' => ['username', 'user_android_token'],
            'conditions' => ['id' => $id]
        ])->first();
        return $user;
    }

    private function _getUserIDviaPost($id = null)
    {
        $userID = $this->PostsHasCurriculumVitaes->Posts->find('all', [
            'fields' => ['hiring_manager_id'],
            'conditions' => ['id' => $id]
        ])->first();
        return $userID;
    }

    private function _getUserIDviaCV($id = null)
    {
        $userID = $this->PostsHasCurriculumVitaes->CurriculumVitaes->find('all', [
            'fields' => ['applicant_id'],
            'conditions' => ['id' => $id]
        ])->first();
        return $userID;
    }

    public function _createNotificationToHiringManager($post_id = null)
    {
        $userID = $this->_getUserIDviaPost($post_id);
        if($userID){
            $user = $this->_getUser($userID['hiring_manager_id']);
            if($user){
                $userToken = [
                    $user['user_android_token']
                ];
                $message = [
                    'title' => 'New CV apply',
                    'message' => 'An user was apply to your post.'
                ];
                $this->Pna->send($userToken, $message);
            }
        }
        $data = [
            'notification_title' => $message['title'],
            'notification_message' => $message['message'],
            'notification_type' => '1',
            'notification_object_id' => $post_id,
            'is_seen' => 0,
            'user_id' => $userID['hiring_manager_id']
        ];
        $this->loadModel('Notifications');
        $notification = $this->Notifications->newEntity();
        $notification = $this->Notifications->patchEntity($notification, $data);
        $this->Notifications->save($notification);
    }

    public function _createNotificationToApplicant($curriculum_vitae_id = null, $status = null)
    {
        $userID = $this->_getUserIDviaCV($curriculum_vitae_id);
        if($userID){
            $user = $this->_getUser($userID['applicant_id']);
            if($user){
                $userToken = [
                    $user['user_android_token']
                ];
                if($status == '1'){
                    $message = [
                        'title' => 'Accept CV',
                        'message' => 'Your CV was accepted'
                    ];
                }
                elseif($status == '2'){
                    $message = [
                        'title' => 'Reject CV',
                        'message' => 'Your CV was rejected by ' . $user['username']
                    ];
                }
                $this->Pna->send($userToken, $message);
            }
        }
        $data = [
            'notification_title' => $message['title'],
            'notification_message' => $message['message'],
            'notification_type' => '2',
            'notification_object_id' => $curriculum_vitae_id,
            'is_seen' => 0,
            'user_id' => $userID['applicant_id']
        ];
        $this->loadModel('Notifications');
        $notification = $this->Notifications->newEntity();
        $notification = $this->Notifications->patchEntity($notification, $data);
        $this->Notifications->save($notification);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $postsHasCurriculumVitae = $this->PostsHasCurriculumVitaes->newEntity();
        if ($this->request->is('post')) {
            $postsHasCurriculumVitae = $this->PostsHasCurriculumVitaes->patchEntity($postsHasCurriculumVitae, $this->request->data);
            if ($this->PostsHasCurriculumVitaes->save($postsHasCurriculumVitae)) {
                if($this->request->data['applied_cv_status'] == '0'){
                    $this->_createNotificationToHiringManager($this->request->data['post_id']);
                }
                else{
                    $this->_createNotificationToApplicant($this->request->data['curriculum_vitae_id'], $this->request->data['applied_cv_status']);
                }
                $message = 'Saved';
            } else {
                $message = 'Error';
            }
        }
        $this->set(compact('message', 'postsHasCurriculumVitae'));
        $this->set('_serialize', ['message', 'postsHasCurriculumVitae']);
    }
}