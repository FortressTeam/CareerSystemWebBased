<?php
namespace App\Controller\Api;

use App\Controller\Api\AppController;
use Cake\Event\Event;
use Cake\Network\Exception\UnauthorizedException;
use Cake\Utility\Security;
use Firebase\JWT\JWT;

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
}
