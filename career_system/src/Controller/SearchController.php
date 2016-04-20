<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Applicants Controller
 *
 * @property \App\Model\Table\ApplicantsTable $Applicants
 */
class SearchController extends AppController
{

    public $paginate = [
        'limit' => 9
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
        $this->Auth->allow();
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
     * Index page
     *
     * @return void|\Cake\Network\Response
     * @throws \Cake\Network\Exception\NotFoundException When the view file could not
     *   be found or \Cake\View\Exception\MissingTemplateException in debug mode.
     */
    public function index()
    {
        $this->loadModel('Posts');
        $query = $this->Posts
            ->find('search', $this->Posts->filterParams($this->request->query))
            ->contain(['HiringManagers', 'Categories'])
            ->autoFields(true)
            ->where(['post_title IS NOT' => null, 'post_status' => '1'])
            ->order(['Posts.post_date' => 'DESC']);
        $posts = $this->paginate($query);

        // $this->loadModel('HiringManagers');
        // $query = $this->HiringManagers
        //     ->find('search', $this->HiringManagers->filterParams($this->request->query))
        //     ->contain(['Users'])
        //     ->autoFields(true)
        //     ->where(['hiring_manager_name IS NOT' => null]);
        // $hiringManagers = $this->paginate($query);

        // $this->loadModel('Applicants');
        // $query = $this->Applicants
        //     ->find('search', $this->Applicants->filterParams($this->request->query))
        //     ->contain(['Users','Majors'])
        //     ->autoFields(true)
        //     ->where(['applicant_name IS NOT' => null]);
        // $applicants = $this->paginate($query);

        $categories = $this->Posts->Categories->find('list', [
            'conditions' => ['parent_id IS NOT' => NULL],
            'order' => ['category_name' => 'ASC']
        ]);

        $locations = ['Can Tho', 'Da Nang', 'Hai Phong', 'Ha Noi', 'TP HCM', 'An Giang', 'Ba Ria Vung Tau', 'Bac Giang', 'Bac Kan', 'Bac Lieu', 'Bac Ninh', 'Ben Tre', 'Binh Dinh', 'Binh Duong', 'Binh Phuoc', 'Binh Thuan', 'Ca Mau', 'Cao Bang', 'Dak Lak', 'Dak Nong', 'Dien Bien', 'Dong Nai', 'Dong Thap', 'Gia Lai', 'Ha Giang', 'Ha Nam', 'Ha Tinh', 'Hai Duong', 'Hau Giang', 'Hoa Binh', 'Hung Yen', 'Khanh Hoa', 'Kien Giang', 'Kon Tum', 'Lai Chau', 'Lam Dong', 'Lang Son', 'Lao Cai', 'Long An', 'Nam Dinh', 'Nghe An', 'Ninh Binh', 'Ninh Thuan', 'Phu Tho', 'Quang Binh', 'Quang Nam', 'Quang Ngai', 'Quang Ninh', 'Quang Tri', 'Soc Trang', 'Son La', 'Tay Ninh', 'Thai Binh', 'Thai Nguyen', 'Thanh Hoa', 'Thua Thien Hue', 'Tien Giang', 'Tra Vinh', 'Tuyen Quang', 'Vinh Long', 'Vinh Phuc', 'Yen Bai', 'Phu Yen'];

        $this->set(compact('posts', 'categories', 'locations'));
        $this->set('_serialize', ['posts', 'categories', 'locations']);

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
