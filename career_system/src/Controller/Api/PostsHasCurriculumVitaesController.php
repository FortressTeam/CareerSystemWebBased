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

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Pna');
    }

    public function index()
    {
        $conditions = [];
        if(isset($this->request->query['post_id'])) {
            $conditions['post_id'] = $this->request->query['post_id'];
        }
        if(isset($this->request->query['curriculum_vitae_id'])) {
            $conditions['curriculum_vitae_id'] = $this->request->query['curriculum_vitae_id'];
        }
        $this->paginate = [
            'conditions' => $conditions
        ];
        $postsHasCurriculumVitaes = $this->paginate($this->PostsHasCurriculumVitaes);

        $this->set(compact('postsHasCurriculumVitaes'));
        $this->set('_serialize', ['postsHasCurriculumVitaes']);
    }

    private function _getUser($id = null)
    {
        $this->loadModel('Users');
        $user = $this->Users->find('all', [
            'fields' => ['id', 'user_android_token'],
            'conditions' => ['id' => $id]
        ])->first();
        return $user;
    }

    private function _getUserIDviaPost($id = null)
    {
        return $this->PostsHasCurriculumVitaes->Posts->find('all', [
            'fields' => ['id' => 'hiring_manager_id'],
            'conditions' => ['id' => $id]
        ])->first()['id'];
    }

    private function _getUserIDviaCV($id = null)
    {
        return $this->PostsHasCurriculumVitaes->CurriculumVitaes->find('all', [
            'fields' => ['id' => 'applicant_id'],
            'conditions' => ['id' => $id]
        ])->first()['id'];
    }

    private function _createCVApplyMessage($post_id = null)
    {
        return [
            'title' => 'New CV apply',
            'message' => 'An user was apply to your post.',
            'object_id' => $post_id,
            'type' => '1'
        ];
    }

    private function _createAcceptCVMessage($post_id = null)
    {
        return [
            'title' => 'Accept CV',
            'message' => 'Your CV was accepted',
            'object_id' => $post_id,
            'type' => '1'
        ];
    }

    private function _createRejectCVMessage($post_id = null)
    {
        return [
            'title' => 'Reject CV',
            'message' => 'Your CV was rejected',
            'object_id' => $post_id,
            'type' => '1'
        ];
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
                $post_id = $this->request->data['post_id'];
                $curriculum_vitae_id = $this->request->data['curriculum_vitae_id'];

                if($this->request->data['applied_cv_status'] == '0'){
                    $userID = $this->_getUserIDviaPost($post_id);
                    $message = $this->_createCVApplyMessage($post_id);
                }
                else if($this->request->data['applied_cv_status'] == '1'){
                    $userID = $this->_getUserIDviaCV($curriculum_vitae_id);
                    $message = $this->_createAcceptCVMessage($post_id);
                }
                else if($this->request->data['applied_cv_status'] == '2'){
                    $userID = $this->_getUserIDviaCV($curriculum_vitae_id);
                    $message = $this->_createRejectCVMessage($post_id);
                }
                $user = $this->_getUser($userID);
                if($user && $message) {
                    $this->Pna->sendNotification($message, $user);
                    $message = 'Saved';
                }
                else {
                    $message = 'Error';
                }
            } else {
                $message = 'Error';
            }
        }
        $this->set(compact('message', 'postsHasCurriculumVitae'));
        $this->set('_serialize', ['message', 'postsHasCurriculumVitae']);
    }
}
