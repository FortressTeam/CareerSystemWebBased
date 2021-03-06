<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\Database\Type; 
Type::build('date')->setLocaleFormat('yyyy-MM-dd');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Flash');
        $this->loadComponent('Auth', [
            'authorize' => ['Controller'],
            'authenticate' => [
                'Form' => [
                    'fields' => [
                        'username' => 'username',
                        'password' => 'password'
                    ],
                    'scope' => ['Users.user_status' => 1]
                ] 
            ],
            'authError' => 'Did you really think you are allowed to see that?',
            'loginAction' => [
                'controller' => 'Users',
                'action' => 'signin'
            ],
            'logoutRedirect' => [
                'controller' => 'Pages',
                'action' => 'home'
            ]
        ]);
    }

    /**
     * Before filter callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return void
     */
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);

        $loggedUser = $this->request->session()->read('Auth.User');
        if($loggedUser){
            if(($loggedUser['group_id'] == '3') 
                && (empty($loggedUser['applicant']))
                && ($this->request->params['controller'] != 'Applicants')
                && ($this->request->params['action'] != 'update')){
                    $this->redirect(['controller' => 'Applicants', 'action' => 'update']);
                }
            $this->viewBuilder()->layout('default');
        }
        else{
            $this->viewBuilder()->layout('visitor');
        }
    }

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return void
     */
    public function beforeRender(Event $event)
    {
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ){
            $this->set('_serialize', true);
        }

        $this->set('loggedUser', $this->request->session()->read('Auth.User'));
    }
}
