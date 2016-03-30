<?php
namespace App\Controller\Api;

use App\Controller\Api\AppController;

/**
 * ApplicantsHasSkills Controller
 *
 * @property \App\Model\Table\ApplicantsHasSkillsTable $ApplicantsHasSkills
 */
class ApplicantsHasSkillsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $conditions = [];
        $contain = [];
        if(isset($this->request->params['applicant_id'])) {
            $conditions['applicant_id'] = $this->request->params['applicant_id'];
            $contain[] = 'Skills';
        }
        else if(isset($this->request->params['skill_id'])) {
            $conditions['skill_id'] = $this->request->params['skill_id'];
            $contain[] = 'Applicants';
        }

        $this->paginate = [
            'conditions' => $conditions,
            'contain' => $contain
        ];
        $applicantsHasSkills = $this->paginate($this->ApplicantsHasSkills);

        $this->set(compact('applicantsHasSkills'));
        $this->set('_serialize', ['applicantsHasSkills']);
    }

    /**
     * View method
     *
     * @param string|null $id Applicants Has Skill id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $applicantsHasSkill = $this->ApplicantsHasSkills->get($id, [
            'contain' => ['Applicants', 'Skills']
        ]);

        $this->set('applicantsHasSkill', $applicantsHasSkill);
        $this->set('_serialize', ['applicantsHasSkill']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $applicantsHasSkill = $this->ApplicantsHasSkills->newEntity();
        if ($this->request->is('post')) {
            $applicantsHasSkill = $this->ApplicantsHasSkills->patchEntity($applicantsHasSkill, $this->request->data);
            if ($this->ApplicantsHasSkills->save($applicantsHasSkill)) {
                $message = 'Saved';
            } else {
                $message = 'Error';
            }
        }
        $this->set(compact('applicantsHasSkill'));
        $this->set('_serialize', ['applicantsHasSkill']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Applicants Has Skill id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $applicantsHasSkill = $this->ApplicantsHasSkills->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $applicantsHasSkill = $this->ApplicantsHasSkills->patchEntity($applicantsHasSkill, $this->request->data);
            if ($this->ApplicantsHasSkills->save($applicantsHasSkill)) {
                $message = 'Saved';
            } else {
                $message = 'Error';
            }
        }
        $this->set(compact('applicantsHasSkill'));
        $this->set('_serialize', ['applicantsHasSkill']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Applicants Has Skill id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $applicantsHasSkill = $this->ApplicantsHasSkills->get($id);
        if ($this->ApplicantsHasSkills->delete($applicantsHasSkill)) {
                $message = 'Saved';
            } else {
                $message = 'Error';
            }
        $this->set(compact('message'));
        $this->set('_serialize', ['message']);
    }
}
