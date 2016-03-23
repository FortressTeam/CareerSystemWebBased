<?php
namespace App\Controller\Api;

use App\Controller\Api\AppController;

/**
 * Categories Controller
 *
 * @property \App\Model\Table\CategoriesTable $Categories
 */
class CategoriesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['ParentCategories']
        ];
        $categories = $this->paginate($this->Categories);

        $this->set(compact('categories'));
        $this->set('_serialize', ['categories']);
    }

    /**
     * View method
     *
     * @param string|null $id Category id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $childCategories = $this->Categories->find('children', ['for' => $id]);        
        foreach ($childCategories as $cat)
        {
            $conditions[] = $cat->id;
        }
        $conditions[] = $id;
        $posts = $this->Categories->Posts->find('all', [
            'conditions' => [
                'Posts.category_id in' => $conditions,
                'Posts.post_status >' => 0 
                ],
            'contain' => ['HiringManagers', 'Categories']
        ]);
        $this->set(compact('posts'));
        $this->set('_serialize', ['posts']);
    }
}
