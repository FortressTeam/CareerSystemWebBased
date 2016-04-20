<?php
namespace App\Controller\Api;

use App\Controller\Api\AppController;

/**
 * SkillTypes Controller
 *
 * @property \App\Model\Table\SkillTypesTable $SkillTypes
 */
class SkillTypesController extends AppController
{

    /**
     * @apiDefine SkillTypeDefaultGetParameter
     *
     * @apiParam {String=id,skill_type_name} [sort=id] Sort by field.
     */

    /**
     * @apiDefine SkillTypeNotFoundError
     *
     * @apiError SkillTypeNotFound The <code>id</code> of the SkillType was not found.
     *
     * @apiErrorExample {json} Error-Response:
     *     HTTP/1.1 404 Not Found
     *      {
     *          message: "Record not found in table "skill_types"",
     *          url: "/CareerSystemWebBased/career_system/api/skill_types/0",
     *          code: 404
     *      }
     */

    /**
     * @api {GET} /skill_types 1. Request All Skill Types information
     * @apiName GetSkillTypes
     * @apiGroup Skill Type
     * @apiVersion 0.2.0
     * @apiPermission none
     *
     * @apiDescription Request All Skill Types information. This is a descripton.
     *
     * @apiUse DefaultGetParameter
     * @apiUse SkillTypeDefaultGetParameter
     *
     * @apiSuccess {Object[]}   skillTypes List of Skill Types (Array of Objects).
     * @apiSuccess {Number}     skillTypes.id Skill Type ID.
     * @apiSuccess {String}     skillTypes.skill_type_name Skill Type name.
     *
     * @apiSuccessExample Success-Response:
     *      HTTP/1.1 200 OK
     *      {
     *          "skillTypes": [
     *               {
     *                   "id": 1,
     *                   "skill_type_name": "Websites, IT & Software"
     *               }
     *          ]
     *     }
     *
     */
    public function index()
    {
        $skillTypes = $this->paginate($this->SkillTypes);

        $this->set(compact('skillTypes'));
        $this->set('_serialize', ['skillTypes']);
    }

    // public function view($id = null)
    // {
    //     $skillType = $this->SkillTypes->get($id, [
    //         'contain' => ['Skills']
    //     ]);

    //     $this->set('skillType', $skillType);
    //     $this->set('_serialize', ['skillType']);
    // }


    // public function add()
    // {
    //     $skillType = $this->SkillTypes->newEntity();
    //     if ($this->request->is('post')) {
    //         $skillType = $this->SkillTypes->patchEntity($skillType, $this->request->data);
    //         if ($this->SkillTypes->save($skillType)) {
    //             $this->Flash->success(__('The skill type has been saved.'));
    //             return $this->redirect(['action' => 'index']);
    //         } else {
    //             $this->Flash->error(__('The skill type could not be saved. Please, try again.'));
    //         }
    //     }
    //     $this->set(compact('skillType'));
    //     $this->set('_serialize', ['skillType']);
    // }


    // public function edit($id = null)
    // {
    //     $skillType = $this->SkillTypes->get($id, [
    //         'contain' => []
    //     ]);
    //     if ($this->request->is(['patch', 'post', 'put'])) {
    //         $skillType = $this->SkillTypes->patchEntity($skillType, $this->request->data);
    //         if ($this->SkillTypes->save($skillType)) {
    //             $this->Flash->success(__('The skill type has been saved.'));
    //             return $this->redirect(['action' => 'index']);
    //         } else {
    //             $this->Flash->error(__('The skill type could not be saved. Please, try again.'));
    //         }
    //     }
    //     $this->set(compact('skillType'));
    //     $this->set('_serialize', ['skillType']);
    // }
}
