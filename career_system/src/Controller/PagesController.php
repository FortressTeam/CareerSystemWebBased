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

use Cake\Core\Configure;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\Event\Event;

/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link http://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController
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
        $this->Auth->allow(['home', 'search']);
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
            'actions' => ['search'],
        ]);
    }

    /**
     * Displays home page
     *
     * @return void|\Cake\Network\Response
     * @throws \Cake\Network\Exception\NotFoundException When the view file could not
     *   be found or \Cake\View\Exception\MissingTemplateException in debug mode.
     */
    public function home()
    {
        $this->viewBuilder()->layout('ajax');
        if($this->request->session()->read('Auth.User'))
            $this->redirect('/dashboard');

        $this->loadModel('Categories');
        $categories = $this->Categories->find('list', [
            'conditions' => ['parent_id IS NOT' => NULL],
            'order' => ['category_name' => 'ASC']
        ]);

        $this->set(compact('categories'));
        $this->set('_serialize', ['categories']);
    }

    /**
     * Displays home page
     *
     * @return void|\Cake\Network\Response
     * @throws \Cake\Network\Exception\NotFoundException When the view file could not
     *   be found or \Cake\View\Exception\MissingTemplateException in debug mode.
     */
    public function search()
    {
        $this->loadModel('Posts');
        $query = $this->Posts
            ->find('search', $this->Posts->filterParams($this->request->query))
            ->contain(['HiringManagers', 'Categories'])
            ->autoFields(true)
            ->where(['post_title IS NOT' => null])
            ->order(['Posts.post_date' => 'DESC']);
        $posts = $this->paginate($query);

        $categories = $this->Posts->Categories->find('list', [
            'conditions' => ['parent_id IS NOT' => NULL],
            'order' => ['category_name' => 'ASC']
        ]);

        $this->set(compact('posts', 'categories'));
        $this->set('_serialize', ['posts', 'categories']);

    }

    /**
     * Displays dashboard page
     *
     * @return void|\Cake\Network\Response
     * @throws \Cake\Network\Exception\NotFoundException When the view file could not
     *   be found or \Cake\View\Exception\MissingTemplateException in debug mode.
     */
    public function dashboard()
    {

    }


    public function display()
    {
        $path = func_get_args();

        $count = count($path);
        if (!$count) {
            return $this->redirect('/');
        }
        $page = $subpage = null;

        if (!empty($path[0])) {
            $page = $path[0];
        }
        if (!empty($path[1])) {
            $subpage = $path[1];
        }
        $this->set(compact('page', 'subpage'));

        try {
            $this->render(implode('/', $path));
        } catch (MissingTemplateException $e) {
            if (Configure::read('debug')) {
                throw $e;
            }
            throw new NotFoundException();
        }
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
