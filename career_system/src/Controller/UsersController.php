<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Utility\Inflector;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
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
        $this->Auth->allow(['signup', 'hiringManagers']);
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Groups']
        ];
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'fields' => [
                'Applicants.id', 'Applicants.applicant_name',
                'HiringManagers.id', 'HiringManagers.hiring_manager_name',
                'Administrators.id'
            ],
            'contain' => ['Applicants', 'HiringManagers', 'Administrators']
        ]);

        if($user->has('Applicants')) {
            $user = $user->toArray();
            $this->redirect(['controller' => 'Applicants', 'action' => 'view', 'slug' => Inflector::slug($user['Applicants']['applicant_name']), 'id' => $user['Applicants']['id']]);
        }
        else if($user->has('HiringManagers')) {
            $user = $user->toArray();
            $this->redirect(['controller' => 'HiringManagers', 'action' => 'view', 'slug' => Inflector::slug($user['HiringManagers']['hiring_manager_name']), 'id' => $user['HiringManagers']['id']]);
        }
        else {
            $this->redirect($this->referer());
        }

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')){
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)){
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $groups = $this->Users->Groups->find('list', ['limit' => 200]);
        $this->set(compact('user', 'groups'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])){
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)){
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $groups = $this->Users->Groups->find('list', ['limit' => 200]);
        $this->set(compact('user', 'groups'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)){
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    /**
     * Sign up method
     *
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function signup()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')){
            $this->request->data['user_registered'] = date("Y-m-d");
            $this->request->data['user_status'] = '1';
            $this->request->data['user_activation_key'] = rand(0, 1262055681);
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)){
                $this->Flash->success(__('Sign up successful!'));
                return $this->redirect(['action' => 'signin']);
            } else {
                $this->Flash->error(__('Sign up error. Please, try again.'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Sign up method
     *
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function hiringManagers()
    {

    }

    /**
     * Sign in method
     *
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function signin()
    {
        $this->viewBuilder()->layout('visitor');
        if ($this->request->is('post')){
            $user = $this->Auth->identify();
            if ($user){
                $user = $this->Users->get($user['id'], [
                    'contain' => ['Groups', 'Applicants', 'HiringManagers', 'Administrators']
                ]);
                $this->Auth->setUser($user->toArray());
                return $this->redirect($this->Auth->redirectUrl());
            }
            else {
                $this->Flash->error(__('Username or password is incorrect'));
            }
        }
        if($this->request->session()->read('Auth.User'))
            $this->redirect($this->referer());
    }

    /**
     * Sign out method
     *
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function signout()
    {
        return $this->redirect($this->Auth->logout());
    }

    /**
     * is authorized callback.
     *
     * @param $user
     * @return void
     */    
    public function isAuthorized($user)
    {
        return true;
    }
}
