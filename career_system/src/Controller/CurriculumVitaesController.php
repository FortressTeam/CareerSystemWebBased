<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CurriculumVitaes Controller
 *
 * @property \App\Model\Table\CurriculumVitaesTable $CurriculumVitaes
 */
class CurriculumVitaesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Applicants', 'CurriculumVitaeTemplates']
        ];
        $curriculumVitaes = $this->paginate($this->CurriculumVitaes);

        $this->set(compact('curriculumVitaes'));
        $this->set('_serialize', ['curriculumVitaes']);
    }

    /**
     * View method
     *
     * @param string|null $id Curriculum Vitae id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->viewBuilder()->layout('cv');
        $curriculumVitae = $this->CurriculumVitaes->get($id, [
            'contain' => ['Applicants', 'Users', 'CurriculumVitaeTemplates']
        ]);

        $applicantInfo = [];
        $applicantInfo['applicant']['applicantImage'] = $curriculumVitae->has('user')? $curriculumVitae->user->user_avatar : 'default.jpg';
        $applicantInfo['applicant']['applicantEmail'] = $curriculumVitae->has('user')? $curriculumVitae->user->user_email : '';
        $applicantInfo['applicant']['applicantName'] = $curriculumVitae->has('applicant')? $curriculumVitae->applicant->applicant_name : '';
        $applicantInfo['applicant']['applicantPhone'] = $curriculumVitae->has('applicant')? $curriculumVitae->applicant->applicant_phone_number : '';
        $applicantInfo['applicant']['applicantAddress'] = $curriculumVitae->has('applicant')? $curriculumVitae->applicant->applicant_address : '';
        $applicantInfo = json_encode($applicantInfo);
        
        $this->set(compact('curriculumVitae', 'applicantInfo'));
        $this->set('_serialize', ['curriculumVitae']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $curriculumVitaeTemplates = $this->CurriculumVitaes->CurriculumVitaeTemplates->find('all');
        $this->set(compact('curriculumVitae', 'curriculumVitaeTemplates'));
        $this->set('_serialize', ['curriculumVitae']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Curriculum Vitae id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $curriculumVitae = $this->CurriculumVitaes->get($id, [
            'contain' => ['Applicants', 'Users', 'CurriculumVitaeTemplates']
        ]);
        $curriculumVitaeTemplates = $this->CurriculumVitaes->CurriculumVitaeTemplates->find('all', [
            'contain' => []
        ]);

        $applicantInfo = [];
        $applicantInfo['applicant']['applicantImage'] = $curriculumVitae->has('user')? $curriculumVitae->user->user_avatar : 'default.jpg';
        $applicantInfo['applicant']['applicantEmail'] = $curriculumVitae->has('user')? $curriculumVitae->user->user_email : '';
        $applicantInfo['applicant']['applicantName'] = $curriculumVitae->has('applicant')? $curriculumVitae->applicant->applicant_name : '';
        $applicantInfo['applicant']['applicantPhone'] = $curriculumVitae->has('applicant')? $curriculumVitae->applicant->applicant_phone_number : '';
        $applicantInfo['applicant']['applicantAddress'] = $curriculumVitae->has('applicant')? $curriculumVitae->applicant->applicant_address : '';
        $applicantInfo = json_encode($applicantInfo);

        $this->set(compact('curriculumVitae', 'applicantInfo', 'curriculumVitaeTemplates'));
        $this->set('_serialize', ['curriculumVitae']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Curriculum Vitae id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $curriculumVitae = $this->CurriculumVitaes->get($id);
        if ($this->CurriculumVitaes->delete($curriculumVitae)) {
            $this->Flash->success(__('The curriculum vitae has been deleted.'));
        } else {
            $this->Flash->error(__('The curriculum vitae could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
