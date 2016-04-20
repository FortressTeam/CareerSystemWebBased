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
