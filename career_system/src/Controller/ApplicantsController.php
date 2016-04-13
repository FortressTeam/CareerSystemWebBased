<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Applicants Controller
 *
 * @property \App\Model\Table\ApplicantsTable $Applicants
 */
class ApplicantsController extends AppController
{

    public $paginate = [
        'order' => ['Applicants.id' => 'DESC'],
        'limit' => 10
    ];

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
     * Initialize method
     *
     * @return \Cake\Network\Response|null
     */
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Search.Prg', [
            'actions' => ['index'],
        ]);
    }
    
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $query = $this->Applicants
            ->find('search', $this->Applicants->filterParams($this->request->query))
            ->contain(['Users','CareerPaths'])
            ->autoFields(true)
            ->where(['applicant_name IS NOT' => null]);
        $applicants = $this->paginate($query);

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
        // $applicant = $this->Applicants->get($id, [
        //     'contain' => ['CareerPaths', 'ApplicantsFollowPosts', 'ApplicantsHasHobbies', 'AppointmentsHasApplicants', 'CurriculumVitaes', 'Follow', 'PersonalHistory', 'Users']
        // ]);
        $applicant = $this->Applicants->get($id, [
            'contain' => ['CareerPaths', 'Users', 'PersonalHistory'],
        ]);

        $careerPaths = $this->Applicants->CareerPaths->find('list');

        $this->loadModel('Skills');
        $skills = $this->Skills->find('list');
        $this->loadModel('Hobbies');
        $hobbies = $this->Hobbies->find('list');
        $this->set(compact('applicant', 'careerPaths', 'skills', 'hobbies'));
        $this->set('_serialize', ['applicant']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $applicant = $this->Applicants->newEntity();
        if ($this->request->is('post')) {
            $applicant = $this->Applicants->patchEntity($applicant, $this->request->data);
            if ($this->Applicants->save($applicant)) {
                $this->Flash->success(__('The applicant has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The applicant could not be saved. Please, try again.'));
            }
        }
        $careerPaths = $this->Applicants->CareerPaths->find('list', ['limit' => 200]);
        $this->set(compact('applicant', 'careerPaths'));
        $this->set('_serialize', ['applicant']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Applicant id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    // public function edit($id = null)
    // {
    //     $applicant = $this->Applicants->get($id, [
    //         'contain' => []
    //     ]);
    //     if ($this->request->is(['patch', 'post', 'put'])) {
    //         $applicant = $this->Applicants->patchEntity($applicant, $this->request->data);
    //         if ($this->Applicants->save($applicant)) {
    //             $this->Flash->success(__('The applicant has been saved.'));
    //             return $this->redirect(['action' => 'index']);
    //         } else {
    //             $this->Flash->error(__('The applicant could not be saved. Please, try again.'));
    //         }
    //     }
    //     $careerPaths = $this->Applicants->CareerPaths->find('list', ['limit' => 200]);
    //     $this->set(compact('applicant', 'careerPaths'));
    //     $this->set('_serialize', ['applicant']);
    // }

    /**
     * Delete method
     *
     * @param string|null $id Applicant id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $applicant = $this->Applicants->get($id);
        if ($this->Applicants->delete($applicant)) {
            $this->Flash->success(__('The applicant has been deleted.'));
        } else {
            $this->Flash->error(__('The applicant could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
