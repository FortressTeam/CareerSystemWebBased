<?php
namespace App\Controller\Api;

use App\Controller\Api\AppController;

/**
 * Applicants Controller
 *
 * @property \App\Model\Table\ApplicantsTable $Applicants
 */
class ApplicantsController extends AppController
{

    public $paginate = [
        'order' => ['Applicants.id' => 'DESC'],
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

    public function index()
    {
//         $this->paginate = [
//             'contain' => ['Majors']
//         ];
//         $applicants = $this->paginate($this->Applicants);
        $query = $this->Applicants
            ->find('search', $this->Applicants->filterParams($this->request->query))
            ->contain(['Users','Majors'])
            ->autoFields(true)
            ->where(['applicant_name IS NOT' => null]);
        $applicants = $this->paginate($query);

        $this->set(compact('applicants'));
        $this->set('_serialize', ['applicants']);
    }


    public function view($id = null)
    {
        $applicant = $this->Applicants->get($id, [
            'contain' => [
                'Majors',
                'ApplicantsFollowPosts',
                'Follow',
                'PersonalHistory',
                'Users',
                'Skills',
                'Hobbies']
        ]);

        $this->set('applicant', $applicant);
        $this->set('_serialize', ['applicant']);
    }


    public function edit($id = null)
    {
        $applicant = $this->Applicants->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $applicant = $this->Applicants->patchEntity($applicant, $this->request->data);
            if ($this->Applicants->save($applicant)) {
                $message = 'Saved';
            } else {
                $message = 'Error';
            }
        }
        $applicant = $this->Applicants->get($id, [
            'contain' => ['Majors']
        ]);
        $this->set(compact('message', 'applicant'));
        $this->set('_serialize', ['message', 'applicant']);
    }
}
