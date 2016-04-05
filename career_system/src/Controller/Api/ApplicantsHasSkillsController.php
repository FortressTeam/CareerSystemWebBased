<?php
namespace App\Controller\Api;

use App\Controller\Api\AppController;
use Cake\Network\Exception\NotFoundException;

/**
 * ApplicantsHasSkills Controller
 *
 * @property \App\Model\Table\ApplicantsHasSkillsTable $ApplicantsHasSkills
 */
class ApplicantsHasSkillsController extends AppController
{

    /**
     * @apiDefine ApplicantsHasSkillsDefaultGetParameter
     *
     * @apiParam {String=applicant_id,skill_id,skill_level} [sort=id] Sort by field.
     */

    /**
     * @apiDefine ApplicantsHasSkillsNotFoundError
     *
     * @apiError ApplicantsHasSkillsNotFound The <code>applicant_id</code> and <code>skill_id</code> of the ApplicantsHasSkills was not found.
     *
     * @apiErrorExample {json} Error-Response:
     *     HTTP/1.1 404 Not Found
     *      {
     *          message: "Record not found in table "applicants_has_skills"",
     *          url: "/CareerSystemWebBased/career_system/api/applicants_has_skills",
     *          code: 404
     *      }
     */

    /**
     * @api {GET} /applicants_has_skills 1. Request All Applicants Skills information
     * @apiName GetApplicantsHasSkills
     * @apiGroup Applicants-Skills
     * @apiVersion 0.2.0
     * @apiPermission Applicant
     *
     * @apiDescription Request All Applicants Skills information. This is a descripton.
     *
     * @apiParam {Number}       [applicant_id] Applicant ID.
     * @apiParam {Number}       [skill_id] Skill ID.
     * @apiUse DefaultGetParameter
     * @apiUse ApplicantsHasSkillsDefaultGetParameter
     *
     * @apiSuccess {Object[]}   applicantsHasSkills List of Applicants Skills (Array of Objects).
     * @apiSuccess {Number}     applicantsHasSkills.applicant_id Applicant ID.
     * @apiSuccess {Number}     applicantsHasSkills.skill_id Skill ID.
     * @apiSuccess {Number}     applicantsHasSkills.skill_level Level of skill.
     *
     * @apiSuccessExample Success-Response:
     *      HTTP/1.1 200 OK
     *      {
     *          "applicantsHasSkills": [
     *               {
     *                   "applicant_id": 4,
     *                   "skill_id": 4,
     *                   "skill_level": 5,
     *               }
     *          ]
     *     }
     *
     */
    public function index()
    {
        $conditions = [];
        $contain = [];
        if(isset($this->request->query['applicant_id'])) {
            $conditions['applicant_id'] = $this->request->query['applicant_id'];
            $contain[] = 'Skills';
        }
        if(isset($this->request->query['skill_id'])) {
            $conditions['skill_id'] = $this->request->query['skill_id'];
            $contain[] = 'Applicants';
        }

        $this->paginate = [
            'conditions' => $conditions,
            'contain' => $contain
        ];
        $applicantsHasSkills = $this->paginate($this->ApplicantsHasSkills);

        $this->set(compact('applicantsHasSkills'));
        $this->set('_serialize', ['applicantsHasSkills']);
    }

    /**
     * @api {POST} /applicants_has_skills 2. Create a new Applicants Skills
     * @apiName PostApplicantsHasSkills
     * @apiGroup Applicants-Skills
     * @apiVersion 0.2.0
     * @apiPermission Applicant
     *
     * @apiDescription Create a new Applicants Skills. This is a descripton.
     *
     * @apiParam {Number}       applicant_id Applicant ID.
     * @apiParam {Number}       skill_id Skill ID.
     * @apiParam {Number}       skill_level Skill level.
     *
     * @apiParamExample {json} Request-Data-Example:
     *      {
     *          "applicant_id": 4,
     *          "skill_id": 4,
     *          "skill_level": 5,
     *      }
     *
     * @apiSuccess {String}     message POST message (Values: <code>Saved</code>,<code>Error</code>).
     * @apiSuccess {Object}     applicantsHasSkill Applicants Skills Objects.
     * @apiSuccess {Number}     applicantsHasSkill.applicant_id Applicant ID.
     * @apiSuccess {Number}     applicantsHasSkill.skill_id Skill ID.
     * @apiSuccess {Number}     applicantsHasSkill.skill_level Skill level.
     *
     * @apiSuccessExample Success-Response:
     *      HTTP/1.1 200 OK
     *      {
     *          "message": "Saved",
     *          "applicantsHasSkill": {
     *              "applicant_id": 4,
     *              "skill_id": 4,
     *              "skill_level": 5,
     *          }
     *      }
     *
     */
    public function add()
    {
        $applicantsHasSkill = $this->ApplicantsHasSkills->newEntity();
        if ($this->request->is('post')) {
            $applicantsHasSkill = $this->ApplicantsHasSkills->patchEntity($applicantsHasSkill, $this->request->data);
            if ($this->ApplicantsHasSkills->save($applicantsHasSkill)) {
                $message = 'Saved';
            } else {
                $message = 'Error';
            }
        }
        $this->set(compact('message', 'applicantsHasSkill'));
        $this->set('_serialize', ['message', 'applicantsHasSkill']);
    }

    /**
     * @api {PUT} /applicants_has_skills 3. Modify Applicants Skills
     * @apiName PutApplicantsHasSkills
     * @apiGroup Applicants-Skills
     * @apiVersion 0.2.0
     * @apiPermission Applicant
     *
     * @apiDescription Modify Applicants Skills. This is a descripton.
     *
     * @apiParam {Number}       applicant_id Applicant ID.
     * @apiParam {Number}       skill_id Skill ID.
     * @apiParam {Number}       [skill_level] Skill level.
     *
     * @apiParamExample {json} Request-Data-Example:
     *      {
     *          "applicant_id": 4,
     *          "skill_id": 4,
     *          "skill_level": 5,
     *      }
     *
     * @apiSuccess {String}     message PUT message (Values: <code>Saved</code>,<code>Error</code>).
     * @apiSuccess {Object}     applicantsHasSkill Applicants Skills Objects.
     * @apiSuccess {Number}     applicantsHasSkill.applicant_id Applicant ID.
     * @apiSuccess {Number}     applicantsHasSkill.skill_id Skill ID.
     * @apiSuccess {Number}     applicantsHasSkill.skill_level Skill level.
     *
     * @apiSuccessExample Success-Response:
     *      HTTP/1.1 200 OK
     *      {
     *          "message": "Saved",
     *          "applicantsHasSkill": {
     *              "applicant_id": 4
     *              "skill_id": 4,
     *              "skill_level": 3,
     *          }
     *      }
     *
     * @apiUse ApplicantsHasSkillsNotFoundError
     */
    public function edit()
    {
        $conditions['applicant_id'] = $this->request->data['applicant_id'];
        $conditions['skill_id'] = $this->request->data['skill_id'];
        $applicantsHasSkill = $this->ApplicantsHasSkills->find('all', [
            'conditions' => $conditions,
            'contain' => []
        ])->first();

        if (empty($applicantsHasSkill)) {
            throw new NotFoundException(__('Applicants Skills not found'));
        }

        if ($this->request->is(['patch', 'post', 'put'])) {
            $applicantsHasSkill = $this->ApplicantsHasSkills->patchEntity($applicantsHasSkill, $this->request->data);
            if ($this->ApplicantsHasSkills->save($applicantsHasSkill)) {
                $message = 'Saved';
            } else {
                $message = 'Error';
            }
        }
        $this->set(compact('message', 'applicantsHasSkill'));
        $this->set('_serialize', ['message', 'applicantsHasSkill']);
    }

    /**
     * @api {DELETE} /applicants_has_skills 4. Delete Applicants Skills
     * @apiName DeleteApplicantsHasSkills
     * @apiGroup Applicants-Skills
     * @apiVersion 0.2.0
     * @apiPermission Applicant
     *
     * @apiDescription Delete Applicants Skills. This is a descripton.
     *
     * @apiParam {Number}       applicant_id Applicant ID.
     * @apiParam {Number}       skill_id Skill ID.
     *
     * @apiSuccess {String}     message PUT message (Values: <code>Deleted</code>,<code>Error</code>).
     *
     * @apiSuccessExample Success-Response:
     *      HTTP/1.1 200 OK
     *      {
     *          "message": "Deleted",
     *      }
     *
     * @apiUse ApplicantsHasSkillsNotFoundError
     */
    public function delete()
    {
        $this->request->allowMethod(['post', 'delete']);

        $conditions['applicant_id'] = $this->request->query['applicant_id'];
        $conditions['skill_id'] = $this->request->query['skill_id'];
        $applicantsHasSkill = $this->ApplicantsHasSkills->find('all', [
            'conditions' => $conditions,
            'contain' => []
        ])->first();

        if (empty($applicantsHasSkill)) {
            throw new NotFoundException(__('Applicants Skills not found'));
        }

        if ($this->ApplicantsHasSkills->delete($applicantsHasSkill)) {
                $message = 'Deleted';
            } else {
                $message = 'Error';
            }
        $this->set(compact('message'));
        $this->set('_serialize', ['message']);
    }
}
