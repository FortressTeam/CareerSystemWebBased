<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CurriculumVitaes Controller
 *
 * @property \App\Model\Table\CurriculumVitaesTable $CurriculumVitaes
 */
class CurriculumVitaesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Applicants', 'CurriculumVitaeTemplates']
        ];
        $curriculumVitaes = $this->paginate($this->CurriculumVitaes);

        $this->set(compact('curriculumVitaes'));
        $this->set('_serialize', ['curriculumVitaes']);
    }

    /**
     * View method
     *
     * @param string|null $id Curriculum Vitae id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->viewBuilder()->layout('cv');
        $curriculumVitae = $this->CurriculumVitaes->get($id, [
            'contain' => ['Applicants']
        ]);

        $this->set('curriculumVitae', $curriculumVitae);
        $this->set('_serialize', ['curriculumVitae']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $curriculumVitae = $this->CurriculumVitaes->newEntity();
        if ($this->request->is('post')) {
            $curriculumVitae = $this->CurriculumVitaes->patchEntity($curriculumVitae, $this->request->data);
            if ($this->CurriculumVitaes->save($curriculumVitae)) {
                $this->Flash->success(__('The curriculum vitae has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The curriculum vitae could not be saved. Please, try again.'));
            }
        }
        $applicants = $this->CurriculumVitaes->Applicants->find('list', ['limit' => 200]);
        $curriculumVitaeTemplates = $this->CurriculumVitaes->CurriculumVitaeTemplates->find('list', ['limit' => 200]);
        $this->set(compact('curriculumVitae', 'applicants', 'curriculumVitaeTemplates'));
        $this->set('_serialize', ['curriculumVitae']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Curriculum Vitae id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $curriculumVitae = $this->CurriculumVitaes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $curriculumVitae = $this->CurriculumVitaes->patchEntity($curriculumVitae, $this->request->data);
            if ($this->CurriculumVitaes->save($curriculumVitae)) {
                $this->Flash->success(__('The curriculum vitae has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The curriculum vitae could not be saved. Please, try again.'));
            }
        }
        $applicants = $this->CurriculumVitaes->Applicants->find('list', ['limit' => 200]);
        $curriculumVitaeTemplates = $this->CurriculumVitaes->CurriculumVitaeTemplates->find('list', ['limit' => 200]);
        $this->set(compact('curriculumVitae', 'applicants', 'curriculumVitaeTemplates'));
        $this->set('_serialize', ['curriculumVitae']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Curriculum Vitae id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $curriculumVitae = $this->CurriculumVitaes->get($id);
        if ($this->CurriculumVitaes->delete($curriculumVitae)) {
            $this->Flash->success(__('The curriculum vitae has been deleted.'));
        } else {
            $this->Flash->error(__('The curriculum vitae could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
