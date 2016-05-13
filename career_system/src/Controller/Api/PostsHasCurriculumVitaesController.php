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

    private function _getUserViaPost($id = null)
    {
        $postInfo = $this->PostsHasCurriculumVitaes->Posts->find()
            ->select([
                'id' => 'hiring_manager_id', 'username' => 'jUsers.username',
                'user_android_token' => 'jUsers.user_android_token'
            ])
            ->join([
                'table' => 'users', 'alias' => 'jUsers', 'type' => 'INNER',
                'conditions' => 'jUsers.id = Posts.hiring_manager_id',
            ])
            ->where(['Posts.id' => $id])
            ->first();

        return [
            'id' => $postInfo['id'],
            'username' => $postInfo['username'],
            'user_android_token' => $postInfo['user_android_token']
        ];
    }

    public function _getUserViaCV($id = null)
    {
        $postInfo = $this->PostsHasCurriculumVitaes->CurriculumVitaes->find()
            ->select([
                'id' => 'applicant_id', 'username' => 'jUsers.username',
                'user_android_token' => 'jUsers.user_android_token'
            ])
            ->join([
                'table' => 'users', 'alias' => 'jUsers', 'type' => 'INNER',
                'conditions' => 'jUsers.id = CurriculumVitaes.applicant_id',
            ])
            ->where(['CurriculumVitaes.id' => $id])
            ->first();

        return [
            'id' => $postInfo['id'],
            'username' => $postInfo['username'],
            'user_android_token' => $postInfo['user_android_token']
        ];
    }

    private function _createCVApplyMessage($post_id = null, $user = null)
    {
        return [
            'title' => 'New CV apply',
            'message' => '[' . $user['username'] . '] was apply to your post.',
            'object_id' => $post_id,
            'type' => '1'
        ];
    }

    private function _createAcceptCVMessage($post_id = null, $user = null)
    {
        return [
            'title' => 'Accept CV',
            'message' => 'Your CV was accepted by [' . $user['username'] . ']',
            'object_id' => $post_id,
            'type' => '1'
        ];
    }

    private function _createRejectCVMessage($post_id = null, $user = null)
    {
        return [
            'title' => 'Reject CV',
            'message' => 'Your CV was rejected by [' . $user['username'] . ']',
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
                    $user = $this->_getUserViaPost($post_id);
                    $message = $this->_createCVApplyMessage($post_id, $user);
                }
                else if($this->request->data['applied_cv_status'] == '1'){
                    $user = $this->_getUserViaCV($curriculum_vitae_id);
                    $message = $this->_createAcceptCVMessage($post_id, $user);
                }
                else if($this->request->data['applied_cv_status'] == '2'){
                    $user = $this->_getUserViaCV($curriculum_vitae_id);
                    $message = $this->_createRejectCVMessage($post_id, $user);
                }
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
