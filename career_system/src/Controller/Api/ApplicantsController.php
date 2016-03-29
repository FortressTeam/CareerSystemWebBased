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

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['CareerPaths']
        ];
        $applicants = $this->paginate($this->Applicants);

        $this->set(compact('applicants'));
        $this->set('_serialize', ['applicants']);
    }

    /**
     * View method
     *
     * @param string|null $id Applicant id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $applicant = $this->Applicants->get($id, [
            'contain' => ['CareerPaths', 'ApplicantsFollowPosts', 'ApplicantsHasHobbies', 'ApplicantsHasSkills', 'AppointmentsHasApplicants', 'CurriculumVitaes', 'Follow', 'PersonalHistory', 'Users']
        ]);

        $this->set('applicant', $applicant);
        $this->set('_serialize', ['applicant']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Applicant id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
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
