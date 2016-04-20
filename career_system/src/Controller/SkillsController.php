<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Skills Controller
 *
 * @property \App\Model\Table\SkillsTable $Skills
 */
class SkillsController extends AppController
{

    public $paginate = [
        'limit' => 10
    ];

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
        $query = $this->Skills
            ->find('search', $this->Skills->filterParams($this->request->query))
            ->contain(['SkillTypes'])
            ->autoFields(true);
        $skills = $this->paginate($query);

        $skill = $this->Skills->newEntity();
        $skillTypes = $this->Skills->SkillTypes->find('list', ['limit' => 200]);

        $countSkills = $this->Skills->find()->select([
            'count' => $query->func()->count('id')
        ]);

        $this->set(compact('skills', 'skill', 'skillTypes', 'countSkills'));
        $this->set('_serialize', ['skills']);
    }

    /**
     * View method
     *
     * @param string|null $id Skill id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    // public function view($id = null)
    // {
    //     $skill = $this->Skills->get($id, [
    //         'contain' => ['ApplicantsHasSkills']
    //     ]);

    //     $this->set('skill', $skill);
    //     $this->set('_serialize', ['skill']);
    // }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $skill = $this->Skills->newEntity();
        if ($this->request->is('post')) {
            $skill = $this->Skills->patchEntity($skill, $this->request->data);
            if ($this->Skills->save($skill)) {
                $this->Flash->success(__('The skill has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The skill could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('skill'));
        $this->set('_serialize', ['skill']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Skill id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $skill = $this->Skills->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $skill = $this->Skills->patchEntity($skill, $this->request->data);
            if ($this->Skills->save($skill)) {
                $this->Flash->success(__('The skill has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The skill could not be saved. Please, try again.'));
            }
        }
        $skillTypes = $this->Skills->SkillTypes->find('list', ['limit' => 200]);
        $this->set(compact('skill', 'skillTypes'));
        $this->set('_serialize', ['skill']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Skill id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $skill = $this->Skills->get($id);
        if ($this->Skills->delete($skill)) {
            $this->Flash->success(__('The skill has been deleted.'));
        } else {
            $this->Flash->error(__('The skill could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
    
    /**
     * is authorized callback.
     *
     * @param $user
     * @return void
     */
    public function isAuthorized($user)
    {
        if (isset($user['group_id']) && ($user['group_id'] == '1')) {
            return true;
        }
    }
}