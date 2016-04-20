<?php
namespace App\Controller\Api;

use App\Controller\Api\AppController;
use Cake\Event\Event;
use Cake\Network\Exception\UnauthorizedException;
use Cake\Utility\Security;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{

    /**
     * Token method
     *
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function signin()
    {
        $user = $this->Auth->identify();
        if (!$user){
            throw new UnauthorizedException('Error');
        }
        $user = $this->Users->get($user['id'], [
            'contain' => ['Groups', 'Applicants', 'HiringManagers', 'Administrators']
        ])->toArray();
        $message = 'Success';
        $this->set(compact('message', 'user'));
        $this->set('_serialize', ['message', 'user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function updateToken()
    {
        $user = $this->Auth->identify();
        if (!$user){
            throw new UnauthorizedException('Error');
        }
        $user = $this->Users->get($user['id']);
        $data['user_android_token'] = $this->request->data['user_android_token'];
        if ($this->request->is(['patch', 'post', 'put'])){
            $user = $this->Users->patchEntity($user, $data);
            if ($this->Users->save($user)){
                $message = 'Saved';
            } else {
                $message = 'Error';
            }
        }
        $this->set(compact('message', 'user'));
        $this->set('_serialize', ['message', 'user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function updatePassword()
    {
        $new_password = $this->request->data['new_password'];
        $retype_new_password = $this->request->data['retype_new_password'];

        $user = $this->Auth->identify();
        if (!$user){
            throw new UnauthorizedException('Error');
        }
        $user = $this->Users->get($user['id']);
        if((strlen($new_password) > 0) && ($new_password == $retype_new_password)){
            $data['password'] = $new_password;
            if ($this->request->is(['patch', 'post', 'put'])){
                $user = $this->Users->patchEntity($user, $data);
                if ($this->Users->save($user)){
                    $message = 'Saved';
                } else {
                    $message = 'Error';
                }
            }
        }
        else{
            $message = 'Error';
        }
        $this->set(compact('message', 'user'));
        $this->set('_serialize', ['message', 'user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function updateEmail()
    {
        $user_email = $this->request->data['user_email'];
        $user = $this->Auth->identify();
        if (!$user){
            throw new UnauthorizedException('Error');
        }
        $user = $this->Users->get($user['id']);
        if(strlen($user_email) > 0){
            $data['user_email'] = $user_email;
            if ($this->request->is(['patch', 'post', 'put'])){
                $user = $this->Users->patchEntity($user, $data);
                if ($this->Users->save($user)){
                    $message = 'Saved';
                } else {
                    $message = 'Error';
                }
            }
        }
        else{
            $message = 'Error';
        }
        $this->set(compact('message', 'user'));
        $this->set('_serialize', ['message', 'user']);
    }
}
