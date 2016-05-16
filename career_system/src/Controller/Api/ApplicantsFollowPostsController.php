<?php
namespace App\Controller\Api;

use App\Controller\Api\AppController;

/**
 * ApplicantsFollowPosts Controller
 *
 * @property \App\Model\Table\ApplicantsFollowPostsTable $ApplicantsFollowPosts
 */
class ApplicantsFollowPostsController extends AppController
{

    public $paginate = [
        'limit' => 1000,
        'maxLimit' => 1000
    ];

    public function index()
    {
        $conditions = [];
        if(isset($this->request->query['applicant_id'])) {
            $conditions['applicant_id'] = $this->request->query['applicant_id'];
            $conditions['follow_status'] = $this->request->query['follow_status'];
        }
        $this->paginate = [
            'limit' => 1000,
            'conditions' => $conditions,
            'contain' => 'Posts'
        ];
        $applicantsFollowPost = $this->paginate($this->ApplicantsFollowPosts);

        $this->set(compact('applicantsFollowPost'));
        $this->set('_serialize', ['applicantsFollowPost']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $applicantsFollowPost = $this->ApplicantsFollowPosts->newEntity();
        if ($this->request->is('post')) {
            $applicantsFollowPost = $this->ApplicantsFollowPosts->patchEntity($applicantsFollowPost, $this->request->data);
            if ($this->ApplicantsFollowPosts->save($applicantsFollowPost)) {
                $message = 'Saved';
            } else {
                $message = 'Error';
            }
        }
        $this->set(compact('message', 'applicantsFollowPost'));
        $this->set('_serialize', ['message', 'applicantsFollowPost']);
    }
}
