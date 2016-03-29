<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * SkillTypes Controller
 *
 * @property \App\Model\Table\SkillTypesTable $SkillTypes
 */
class SkillTypesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $skillTypes = $this->paginate($this->SkillTypes);

        $this->set(compact('skillTypes'));
        $this->set('_serialize', ['skillTypes']);
    }

    /**
     * View method
     *
     * @param string|null $id Skill Type id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $skillType = $this->SkillTypes->get($id, [
            'contain' => ['Skills']
        ]);

        $this->set('skillType', $skillType);
        $this->set('_serialize', ['skillType']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $skillType = $this->SkillTypes->newEntity();
        if ($this->request->is('post')) {
            $skillType = $this->SkillTypes->patchEntity($skillType, $this->request->data);
            if ($this->SkillTypes->save($skillType)) {
                $this->Flash->success(__('The skill type has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The skill type could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('skillType'));
        $this->set('_serialize', ['skillType']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Skill Type id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $skillType = $this->SkillTypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $skillType = $this->SkillTypes->patchEntity($skillType, $this->request->data);
            if ($this->SkillTypes->save($skillType)) {
                $this->Flash->success(__('The skill type has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The skill type could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('skillType'));
        $this->set('_serialize', ['skillType']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Skill Type id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $skillType = $this->SkillTypes->get($id);
        if ($this->SkillTypes->delete($skillType)) {
            $this->Flash->success(__('The skill type has been deleted.'));
        } else {
            $this->Flash->error(__('The skill type could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
