<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * CurriculumVitaes Controller
 *
 * @property \App\Model\Table\CurriculumVitaesTable $CurriculumVitaes
 */
class CurriculumVitaesController extends AppController
{
    /**
     * Before filter callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return void
     */
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow('view');
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $conditions = [];
        if(isset($this->request->session()->read('Auth.User')['id'])){
            $conditions = ['applicant_id =' => $this->request->session()->read('Auth.User')['id']];
        }
        $this->paginate = [
            'contain' => ['Applicants', 'CurriculumVitaeTemplates'],
            'conditions' => $conditions,
            'order' => ['CurriculumVitaes.id' => 'ASC']
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

    /**
     * is authorized callback.
     *
     * @param $user
     * @return void
     */
    public function isAuthorized($user)
    {
        if (($this->request->action === 'index') || ($this->request->action === 'add')) {
            if (isset($user['group_id']) && ($user['group_id'] == '3')) {
                return true;
            }
        }
        else if ($this->request->action === 'view') {
            return true;
        }
        else if (in_array($this->request->action, ['edit', 'delete'])) {
            $cvId = (int)$this->request->params['pass'][0];
            if ($this->CurriculumVitaes->isOwnedBy($cvId, $user['id'])) {
                return true;
            }
        }
        return false;
    }
}
