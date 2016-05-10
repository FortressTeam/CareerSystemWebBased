<?php
namespace App\Controller\Api\V1;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\Database\Type; 
Type::build('date')->setLocaleFormat('yyyy-MM-dd');

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

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Auth', [
            'authenticate' => [
                'Form' => [
                    'fields' => [
                        'username' => 'username',
                        'password' => 'password'
                    ],
                    'scope' => ['Users.user_status' => 1]
                ] 
            ]
        ]);
        $this->Auth->allow();
    }

    protected function _getFilter()
    {   
        $conditions = [];
        $tabelName = \Cake\Utility\Inflector::singularize(\Cake\Utility\Inflector::underscore($this->modelClass));
        if(isset($this->request->query['status'])) {
            $statusField = $tabelName.'_status';
            $conditions[$statusField] = $this->request->query['status'];
        }
        return $conditions;
    }

    protected function _getEmbed()
    {
        $contain = [];
        if(isset($this->request->query['embed']) && $this->request->query['embed'] !== '') {
            $contain = explode(',', $this->request->query['embed']);
            foreach ($contain as $key => $value) {
                $contain[$key] = \Cake\Utility\Inflector::camelize($value);
            }
        }
        return $contain;
    }
}