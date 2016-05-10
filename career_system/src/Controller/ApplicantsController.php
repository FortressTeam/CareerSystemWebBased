<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

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
            ->contain(['Users','Majors'])
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
        $applicant = $this->Applicants->get($id, [
            'contain' => [
                'Majors',
                'Users',
                'PersonalHistory',
                'Follow' => function ($q) {
                    $loggedUser = $this->request->session()->read('Auth.User');
                    return $q
                        ->where(['hiring_manager_id' => $loggedUser['id']]);
                }
            ],
        ]);

        $majors = $this->Applicants->Majors->find('list');

        $this->loadModel('Skills');
        $skills = $this->Skills->find('list');
        $this->loadModel('Hobbies');
        $hobbies = $this->Hobbies->find('list');

        $editable = (int)$id === (int)$this->request->session()->read('Auth.User')['id'];

        $this->set(compact('applicant', 'majors', 'skills', 'hobbies', 'editable'));
        $this->set('_serialize', ['applicant']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function update()
    {
        $applicant = $this->Applicants->newEntity();
        $loggedUser = $this->request->session()->read('Auth.User');
        
        if ($this->request->is('post')) {
            $applicant->id = $loggedUser['id'];
            $this->request->data['applicant_status'] = '1';
            $applicant = $this->Applicants->patchEntity($applicant, $this->request->data);
            if ($this->Applicants->save($applicant)) {
                $this->Flash->success(__('The applicant has been saved.'));
                $user = $this->Applicants->Users->get($applicant->id, [
                    'contain' => ['Groups', 'Applicants', 'HiringManagers', 'Administrators']
                ]);
                $this->Auth->setUser($user->toArray());
                return $this->redirect('/dashboard');
            } else {
                $this->Flash->error(__('The applicant could not be saved. Please, try again.'));
            }
        }
        $majors = $this->Applicants->Majors->find('list', ['limit' => 200]);
        $this->set(compact('applicant', 'majors'));
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
    //     $majors = $this->Applicants->majors->find('list', ['limit' => 200]);
    //     $this->set(compact('applicant', 'majors'));
    //     $this->set('_serialize', ['applicant']);
    // }

    /**
     * Delete method
     *
     * @param string|null $id Applicant id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    // public function delete($id = null)
    // {
    //     $this->request->allowMethod(['post', 'delete']);
    //     $applicant = $this->Applicants->get($id);
    //     if ($this->Applicants->delete($applicant)) {
    //         $this->Flash->success(__('The applicant has been deleted.'));
    //     } else {
    //         $this->Flash->error(__('The applicant could not be deleted. Please, try again.'));
    //     }
    //     return $this->redirect(['action' => 'index']);
    // }

    /**
     * is authorized callback.
     *
     * @param $user
     * @return void
     */
    public function isAuthorized($user)
    {
        if (($this->request->action === 'index')
            && isset($user['group_id'])
            && ($user['group_id'] == '1')) {
                return true;
        }
        else if (($this->request->action === 'update')
            && isset($user['group_id'])
            && ($user['group_id'] == '3')
            && (empty($user['applicant']))) {
            return true;
        }
        else if ($this->request->action === 'view') {
            return true;
        }
        return false;
    }
}
