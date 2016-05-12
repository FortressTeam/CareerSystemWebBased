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
        $this->Auth->allow(['home']);
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

        $locations = ['Can Tho', 'Da Nang', 'Hai Phong', 'Ha Noi', 'TP HCM', 'An Giang', 'Ba Ria Vung Tau', 'Bac Giang', 'Bac Kan', 'Bac Lieu', 'Bac Ninh', 'Ben Tre', 'Binh Dinh', 'Binh Duong', 'Binh Phuoc', 'Binh Thuan', 'Ca Mau', 'Cao Bang', 'Dak Lak', 'Dak Nong', 'Dien Bien', 'Dong Nai', 'Dong Thap', 'Gia Lai', 'Ha Giang', 'Ha Nam', 'Ha Tinh', 'Hai Duong', 'Hau Giang', 'Hoa Binh', 'Hung Yen', 'Khanh Hoa', 'Kien Giang', 'Kon Tum', 'Lai Chau', 'Lam Dong', 'Lang Son', 'Lao Cai', 'Long An', 'Nam Dinh', 'Nghe An', 'Ninh Binh', 'Ninh Thuan', 'Phu Tho', 'Quang Binh', 'Quang Nam', 'Quang Ngai', 'Quang Ninh', 'Quang Tri', 'Soc Trang', 'Son La', 'Tay Ninh', 'Thai Binh', 'Thai Nguyen', 'Thanh Hoa', 'Thua Thien Hue', 'Tien Giang', 'Tra Vinh', 'Tuyen Quang', 'Vinh Long', 'Vinh Phuc', 'Yen Bai', 'Phu Yen'];

        $this->set(compact('categories', 'locations'));
        $this->set('_serialize', ['categories', 'locations']);
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

        $this->loadModel('Categories');
        $categories = $this->Categories->find('list', [
            'conditions' => ['parent_id IS NOT' => NULL],
            'order' => ['category_name' => 'ASC']
        ]);

        $locations = ['Can Tho', 'Da Nang', 'Hai Phong', 'Ha Noi', 'TP HCM', 'An Giang', 'Ba Ria Vung Tau', 'Bac Giang', 'Bac Kan', 'Bac Lieu', 'Bac Ninh', 'Ben Tre', 'Binh Dinh', 'Binh Duong', 'Binh Phuoc', 'Binh Thuan', 'Ca Mau', 'Cao Bang', 'Dak Lak', 'Dak Nong', 'Dien Bien', 'Dong Nai', 'Dong Thap', 'Gia Lai', 'Ha Giang', 'Ha Nam', 'Ha Tinh', 'Hai Duong', 'Hau Giang', 'Hoa Binh', 'Hung Yen', 'Khanh Hoa', 'Kien Giang', 'Kon Tum', 'Lai Chau', 'Lam Dong', 'Lang Son', 'Lao Cai', 'Long An', 'Nam Dinh', 'Nghe An', 'Ninh Binh', 'Ninh Thuan', 'Phu Tho', 'Quang Binh', 'Quang Nam', 'Quang Ngai', 'Quang Ninh', 'Quang Tri', 'Soc Trang', 'Son La', 'Tay Ninh', 'Thai Binh', 'Thai Nguyen', 'Thanh Hoa', 'Thua Thien Hue', 'Tien Giang', 'Tra Vinh', 'Tuyen Quang', 'Vinh Long', 'Vinh Phuc', 'Yen Bai', 'Phu Yen'];

        $this->loadModel('Posts');
        $sponsoredPost = $this->Posts->find('all')
            ->select(['id', 'post_title','HiringManagers.id', 'HiringManagers.company_name', 'HiringManagers.company_logo'])
            ->contain(['HiringManagers'])
            ->order('rand()')
            ->where(['post_status' => '1'])
            ->first();

        $loggedUser = $this->request->session()->read('Auth.User');
        if($loggedUser['group_id'] == '3') {
            $fields = [
                'id', 'post_title', 'post_salary', 'post_date', 'post_location',
                'category_id', 'hiring_manager_id',
                'Categories.id', 'Categories.category_name',
                'HiringManagers.id', 'HiringManagers.company_name',
                'HiringManagers.company_logo',
                'HiringManagers.hiring_manager_phone_number'
            ];
            $contains = ['Categories', 'HiringManagers'];
            $submittedPosts = $this->Posts->find('all')
                ->select($fields)
                ->contain($contains)
                ->contain(['PostsHasCurriculumVitaes.CurriculumVitaes' => function ($q) {
                    return $q
                        ->select(['curriculum_vitae_name'])
                        ->where(['CurriculumVitaes.applicant_id' => $this->request->session()->read('Auth.User')['id']]);
                }])
                ->join([
                    'table' => 'posts_has_curriculum_vitaes',
                    'alias' => 'jSubmit',
                    'type' => 'LEFT',
                    'conditions' => 'jSubmit.post_id = Posts.id',
                ])
                ->join([
                    'table' => 'curriculum_vitaes',
                    'alias' => 'jCV',
                    'type' => 'LEFT',
                    'conditions' => 'jSubmit.curriculum_vitae_id = jCV.id',
                ])
                ->where([
                    'post_status' => '1',
                    'jCV.applicant_id' => $loggedUser['id']
                ])
                ->order(['jSubmit.applied_cv_status' => 'ASC'])
                ->limit(6);
            $followedPosts = $this->Posts->find('all')
                ->select($fields)
                ->contain($contains)
                ->join([
                    'table' => 'applicants_follow_posts',
                    'alias' => 'jTable',
                    'type' => 'LEFT',
                    'conditions' => 'jTable.post_id = Posts.id',
                ])
                ->where([
                    'post_status' => '1',
                    'jTable.applicant_id' => $loggedUser['id'],
                    'jTable.follow_status' => '1'
                ])
                ->order('rand()')
                ->limit(3);
            $followedCompanyPosts = $this->Posts->find('all')
                ->select($fields)
                ->contain($contains)
                ->join([
                    'table' => 'hiring_managers',
                    'alias' => 'jHiring',
                    'type' => 'LEFT',
                    'conditions' => 'jHiring.id = Posts.hiring_manager_id',
                ])
                ->join([
                    'table' => 'follow',
                    'alias' => 'jFollow',
                    'type' => 'LEFT',
                    'conditions' => 'jFollow.hiring_manager_id = jHiring.id',
                ])
                ->where([
                    'post_status' => '1',
                    'jFollow.applicant_id' => $loggedUser['id'],
                    'jFollow.follow_hiring_manager' => '1'
                ])
                ->order(['Posts.post_date' => 'DESC'])
                ->limit(6);
            $this->set(compact('submittedPosts', 'followedPosts', 'followedCompanyPosts'));
        }

        $this->set(compact('categories', 'locations', 'sponsoredPost'));
        $this->set('_serialize', ['categories']);
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
