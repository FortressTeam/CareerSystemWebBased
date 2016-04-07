<?php
namespace App\Controller\Api;

use App\Controller\Api\AppController;

/**
 * Hobbies Controller
 *
 * @property \App\Model\Table\HobbiesTable $Hobbies
 */
class HobbiesController extends AppController
{
    public $paginate = [
        'limit' => 1000,
        'maxLimit' => 1000
    ];
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $hobbies = $this->paginate($this->Hobbies);

        $this->set(compact('hobbies'));
        $this->set('_serialize', ['hobbies']);
    }
}
