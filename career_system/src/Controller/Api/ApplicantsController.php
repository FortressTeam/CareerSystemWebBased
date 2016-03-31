<?php
namespace App\Controller\Api;

use App\Controller\Api\AppController;

/**
 * Applicants Controller
 *
 * @property \App\Model\Table\ApplicantsTable $Applicants
 */
class ApplicantsController extends AppController
{


    public function index()
    {
        $this->paginate = [
            'contain' => ['CareerPaths']
        ];
        $applicants = $this->paginate($this->Applicants);

        $this->set(compact('applicants'));
        $this->set('_serialize', ['applicants']);
    }


    public function view($id = null)
    {
        $applicant = $this->Applicants->get($id, [
            'contain' => ['CareerPaths', 'ApplicantsFollowPosts', 'ApplicantsHasHobbies', 'AppointmentsHasApplicants', 'CurriculumVitaes', 'Follow', 'PersonalHistory', 'Users', 'Skills']
        ]);

        $this->set('applicant', $applicant);
        $this->set('_serialize', ['applicant']);
    }


    public function edit($id = null)
    {
        $applicant = $this->Applicants->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $applicant = $this->Applicants->patchEntity($applicant, $this->request->data);
            if ($this->Applicants->save($applicant)) {
                $message = 'Saved';
            } else {
                $message = 'Error';
            }
        }
        $this->set(compact('message', 'applicant'));
        $this->set('_serialize', ['message', 'applicant']);
    }
}
