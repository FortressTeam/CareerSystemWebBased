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

    public function _getHiringManager($id = null)
    {
        $postInfo = $this->PostsHasCurriculumVitaes->Posts->find()
            ->select([
                'id' => 'hiring_manager_id', 'user_fullname' => 'jHirings.hiring_manager_name',
                'user_android_token' => 'jUsers.user_android_token',
                'Posts.post_title'
            ])
            ->join([
                'table' => 'hiring_managers', 'alias' => 'jHirings', 'type' => 'INNER',
                'conditions' => 'jHirings.id = Posts.hiring_manager_id',
            ])
            ->join([
                'table' => 'users', 'alias' => 'jUsers', 'type' => 'INNER',
                'conditions' => 'jUsers.id = Posts.hiring_manager_id',
            ])
            ->where(['Posts.id' => $id])
            ->first();

        return [
            'id' => $postInfo['id'],
            'user_fullname' => $postInfo['user_fullname'],
            'user_android_token' => $postInfo['user_android_token'],
            'post_title' => $postInfo['post_title']
        ];
    }

    public function _getApplicant($id = null)
    {
        $cvInfo = $this->PostsHasCurriculumVitaes->CurriculumVitaes->find()
            ->select([
                'id' => 'applicant_id', 'user_fullname' => 'jApplicants.applicant_name',
                'user_android_token' => 'jUsers.user_android_token',
                'CurriculumVitaes.curriculum_vitae_name'
            ])
            ->join([
                'table' => 'applicants', 'alias' => 'jApplicants', 'type' => 'INNER',
                'conditions' => 'jApplicants.id = CurriculumVitaes.applicant_id',
            ])
            ->join([
                'table' => 'users', 'alias' => 'jUsers', 'type' => 'INNER',
                'conditions' => 'jUsers.id = CurriculumVitaes.applicant_id',
            ])
            ->where(['CurriculumVitaes.id' => $id])
            ->first();

        return [
            'id' => $cvInfo['id'],
            'user_fullname' => $cvInfo['user_fullname'],
            'user_android_token' => $cvInfo['user_android_token'],
            'curriculum_vitae_name' => $cvInfo['curriculum_vitae_name'],
        ];
    }

    private function _createCVApplyMessage($post_id = null, $user = null, $applicant = null)
    {
        return [
            'title' => 'New CV was applied to your post!',
            'message' => $applicant['user_fullname'] . ' applied to the post: "' . $user['post_title'] .'"',
            'object_id' => $post_id,
            'type' => '1'
        ];
    }

    private function _createAcceptCVMessage($post_id = null, $user = null, $hiring_manager = null)
    {
        return [
            'title' => 'Accepted CV!',
            'message' => 'Congrats! Your CV: "' . $user['curriculum_vitae_name'] . '", was accepted by ' . $hiring_manager['user_fullname'] . '',
            'object_id' => $post_id,
            'type' => '1'
        ];
    }

    private function _createRejectCVMessage($post_id = null, $user = null, $hiring_manager = null)
    {
        return [
            'title' => 'Rejected CV!',
            'message' => 'Sorry! Your CV: "' . $user['curriculum_vitae_name'] . '", was rejected by ' . $hiring_manager['user_fullname'] . '',
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
                    $user = $this->_getHiringManager($post_id);
                    $applicant = $this->_getApplicant($curriculum_vitae_id);
                    $message = $this->_createCVApplyMessage($post_id, $user, $applicant);
                }
                else if($this->request->data['applied_cv_status'] == '1'){
                    $user = $this->_getApplicant($curriculum_vitae_id);
                    $hiring_manager = $this->_getHiringManager($post_id);
                    $message = $this->_createAcceptCVMessage($post_id, $user, $hiring_manager);
                }
                else if($this->request->data['applied_cv_status'] == '2'){
                    $user = $this->_getApplicant($curriculum_vitae_id);
                    $hiring_manager = $this->_getHiringManager($post_id);
                    $message = $this->_createRejectCVMessage($post_id, $user, $hiring_manager);
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
