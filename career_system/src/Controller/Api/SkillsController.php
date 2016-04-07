<?php
namespace App\Controller\Api;

use App\Controller\Api\AppController;

/**
 * Skills Controller
 *
 * @property \App\Model\Table\SkillsTable $Skills
 */
class SkillsController extends AppController
{

    public $paginate = [
        'limit' => 1000,
        'maxLimit' => 1000
    ];
    /**
     * @apiDefine SkillDefaultGetParameter
     *
     * @apiParam {String=id,skill_name,skill_type_id} [sort=id] Sort by field.
     */

    /**
     * @apiDefine SkillNotFoundError
     *
     * @apiError SkillNotFound The <code>id</code> of the Skill was not found.
     *
     * @apiErrorExample {json} Error-Response:
     *     HTTP/1.1 404 Not Found
     *      {
     *          message: "Record not found in table "skills"",
     *          url: "/CareerSystemWebBased/career_system/api/skills/0",
     *          code: 404
     *      }
     */

    /**
     * @api {GET} /skills 1. Request All Skills information
     * @apiName GetSkills
     * @apiGroup Skill
     * @apiVersion 0.2.0
     * @apiPermission none
     *
     * @apiDescription Request All Skills information. This is a descripton.
     *
     * @apiParam {Number}       [skill_type_id] Skill Type ID.
     * @apiUse DefaultGetParameter
     * @apiUse SkillDefaultGetParameter
     *
     * @apiSuccess {Object[]}   skills List of skills (Array of Objects).
     * @apiSuccess {Number}     skills.id Skill ID.
     * @apiSuccess {String}     skills.skill_name Skill name.
     * @apiSuccess {Number}     skills.skill_type_id Skill type ID.
     *
     * @apiSuccessExample Success-Response:
     *      HTTP/1.1 200 OK
     *      {
     *          "skills": [
     *               {
     *                   "id": 1,
     *                   "skill_name": "CakePHP",
     *                   "skill_type_id": 1,
     *               }
     *          ]
     *     }
     *
     */
    public function index()
    {
        $conditions = [];
        if(isset($this->request->query['skill_type_id'])) {
            $conditions['skill_type_id'] = $this->request->query['skill_type_id'];
        }
        $this->paginate = [
            'limit' => 1000,
            'conditions' => $conditions
        ];
        $skills = $this->paginate($this->Skills);

        $this->set(compact('skills'));
        $this->set('_serialize', ['skills']);
    }


    // public function view($id = null)
    // {
    //     $skill = $this->Skills->get($id, [
    //         'contain' => ['ApplicantsHasSkills']
    //     ]);

    //     $this->set('skill', $skill);
    //     $this->set('_serialize', ['skill']);
    // }


    // public function add()
    // {
    //     $skill = $this->Skills->newEntity();
    //     if ($this->request->is('post')) {
    //         $skill = $this->Skills->patchEntity($skill, $this->request->data);
    //         if ($this->Skills->save($skill)) {
    //             $this->Flash->success(__('The skill has been saved.'));
    //             return $this->redirect(['action' => 'index']);
    //         } else {
    //             $this->Flash->error(__('The skill could not be saved. Please, try again.'));
    //         }
    //     }
    //     $this->set(compact('skill'));
    //     $this->set('_serialize', ['skill']);
    // }


    // public function edit($id = null)
    // {
    //     $skill = $this->Skills->get($id, [
    //         'contain' => []
    //     ]);
    //     if ($this->request->is(['patch', 'post', 'put'])) {
    //         $skill = $this->Skills->patchEntity($skill, $this->request->data);
    //         if ($this->Skills->save($skill)) {
    //             $this->Flash->success(__('The skill has been saved.'));
    //             return $this->redirect(['action' => 'index']);
    //         } else {
    //             $this->Flash->error(__('The skill could not be saved. Please, try again.'));
    //         }
    //     }
    //     $this->set(compact('skill'));
    //     $this->set('_serialize', ['skill']);
    // }
}
