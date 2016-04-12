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

    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['register', 'token']);
    }

    /**
     * Token method
     *
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function token()
    {
        $user = $this->Auth->identify();
        if (!$user){
            throw new UnauthorizedException('Error');
        }
        else{
            $user = $this->Users->get($user['id'], [
                'contain' => ['Groups', 'Applicants', 'HiringManagers', 'Administrators']
            ])->toArray();
        $message = 'Success';
        $data = [
            'token' => JWT::encode([
                'sub' => $user['id'],
                'exp' =>  time() + 604800
            ],
            Security::salt())
        ];
        $this->set(compact('message', 'data', 'user'));
        $this->set('_serialize', ['message', 'data', 'user']);
    }
        }
}
