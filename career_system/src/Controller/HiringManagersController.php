<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * HiringManagers Controller
 *
 * @property \App\Model\Table\HiringManagersTable $HiringManagers
 */
class HiringManagersController extends AppController
{

    public $paginate = [
        'order' => ['HiringManagers.id' => 'DESC'],
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
        $query = $this->HiringManagers
            ->find('search', $this->HiringManagers->filterParams($this->request->query))
            ->contain(['Users'])
            ->autoFields(true)
            ->where(['hiring_manager_name IS NOT' => null]);
        $hiringManagers = $this->paginate($query);

        $this->set(compact('hiringManagers'));
        $this->set('_serialize', ['hiringManagers']);
    }

    /**
     * View method
     *
     * @param string|null $id Hiring Manager id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $hiringManager = $this->HiringManagers->get($id, [
            'contain' => ['Users']
        ]);
        $this->set('hiringManager', $hiringManager);
        $this->set('_serialize', ['hiringManager']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $hiringManager = $this->HiringManagers->newEntity();
        if ($this->request->is('post')) {
            $hiringManager = $this->HiringManagers->patchEntity($hiringManager, $this->request->data);
            if ($this->HiringManagers->save($hiringManager)) {
                $this->Flash->success(__('The hiring manager has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The hiring manager could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('hiringManager'));
        $this->set('_serialize', ['hiringManager']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Hiring Manager id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    // public function edit($id = null)
    // {
    //     $hiringManager = $this->HiringManagers->get($id, [
    //         'contain' => []
    //     ]);
    //     if ($this->request->is(['patch', 'post', 'put'])) {
    //         $hiringManager = $this->HiringManagers->patchEntity($hiringManager, $this->request->data);
    //         if ($this->HiringManagers->save($hiringManager)) {
    //             $this->Flash->success(__('The hiring manager has been saved.'));
    //             return $this->redirect(['action' => 'index']);
    //         } else {
    //             $this->Flash->error(__('The hiring manager could not be saved. Please, try again.'));
    //         }
    //     }
    //     $this->set(compact('hiringManager'));
    //     $this->set('_serialize', ['hiringManager']);
    // }

    /**
     * Delete method
     *
     * @param string|null $id Hiring Manager id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $hiringManager = $this->HiringManagers->get($id);
        if ($this->HiringManagers->delete($hiringManager)) {
            $this->Flash->success(__('The hiring manager has been deleted.'));
        } else {
            $this->Flash->error(__('The hiring manager could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
