<?php
namespace App\Controller\Api;

use App\Controller\Api\AppController;

/**
 * ApplicantsHasHobbies Controller
 *
 * @property \App\Model\Table\ApplicantsHasHobbiesTable $ApplicantsHasHobbies
 */
class ApplicantsHasHobbiesController extends AppController
{

    /**
     * @apiDefine ApplicantsHasHobbiesDefaultGetParameter
     *
     * @apiParam {String=applicant_id,hobby_id} [sort=id] Sort by field.
     */

    /**
     * @apiDefine ApplicantsHasHobbiesNotFoundError
     *
     * @apiError ApplicantsHasHobbiesNotFound The <code>applicant_id</code> and <code>hobby_id</code> of the ApplicantsHasHobbies was not found.
     *
     * @apiErrorExample {json} Error-Response:
     *     HTTP/1.1 404 Not Found
     *      {
     *          message: "Record not found in table "applicants_has_hobbies"",
     *          url: "/CareerSystemWebBased/career_system/api/applicants_has_hobbies",
     *          code: 404
     *      }
     */

    /**
     * @api {GET} /applicants_has_hobbies 1. Request All Applicants Hobbies information
     * @apiName GetApplicantsHasHobbies
     * @apiGroup Applicants-Hobbies
     * @apiVersion 0.2.0
     * @apiPermission Applicant
     *
     * @apiDescription Request All Applicants Hobbies information. This is a descripton.
     *
     * @apiParam {Number}       [applicant_id] Applicant ID.
     * @apiParam {Number}       [hobby_id] Hobby ID.
     * @apiUse DefaultGetParameter
     * @apiUse ApplicantsHasHobbiesDefaultGetParameter
     *
     * @apiSuccess {Object[]}   applicantsHasHobbies List of Applicants Hobbies (Array of Objects).
     * @apiSuccess {Number}     applicantsHasHobbies.applicant_id Applicant ID.
     * @apiSuccess {Number}     applicantsHasHobbies.hobby_id Hobby ID.
     *
     * @apiSuccessExample Success-Response:
     *      HTTP/1.1 200 OK
     *      {
     *          "applicantsHasHobbies": [
     *               {
     *                   "applicant_id": 4,
     *                   "hobby_id": 12
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
            $contain[] = 'Hobbies';
        }
        if(isset($this->request->query['hobby_id'])) {
            $conditions['hobby_id'] = $this->request->query['hobby_id'];
            $contain[] = 'Applicants';
        }

        $this->paginate = [
            'conditions' => $conditions,
            'contain' => $contain
        ];
        $applicantsHasHobbies = $this->paginate($this->ApplicantsHasHobbies);

        $this->set(compact('applicantsHasHobbies'));
        $this->set('_serialize', ['applicantsHasHobbies']);
    }


    /**
     * @api {POST} /applicants_has_hobbie 2. Create a new Applicants Hobbies
     * @apiName PostApplicantsHasHobbies
     * @apiGroup Applicants-Hobbies
     * @apiVersion 0.2.0
     * @apiPermission Applicant
     *
     * @apiDescription Create a new Applicants Hobbies. This is a descripton.
     *
     * @apiParam {Number}       applicant_id Applicant ID.
     * @apiParam {Number}       hobby_id Hobby ID.
     *
     * @apiParamExample {json} Request-Data-Example:
     *      {
     *          "applicant_id": 4,
     *          "hobby_id": 12
     *      }
     *
     * @apiSuccess {String}     message POST message (Values: <code>Saved</code>,<code>Error</code>).
     * @apiSuccess {Object}     applicantsHasHobby Applicants Hoobies Objects.
     * @apiSuccess {Number}     applicantsHasHobby.applicant_id Applicant ID.
     * @apiSuccess {Number}     applicantsHasHobby.hobby_id Hobby ID.
     *
     * @apiSuccessExample Success-Response:
     *      HTTP/1.1 200 OK
     *      {
     *          "message": "Saved",
     *          "applicantsHasHobby": {
     *              "applicant_id": 4,
     *              "hobby_id": 12
     *          }
     *      }
     *
     */
    public function add()
    {
        $applicantsHasHobby = $this->ApplicantsHasHobbies->newEntity();
        if ($this->request->is('post')) {
            $applicantsHasHobby = $this->ApplicantsHasHobbies->patchEntity($applicantsHasHobby, $this->request->data);
            if ($this->ApplicantsHasHobbies->save($applicantsHasHobby)) {
                $message = 'Saved';
            } else {
                $message = 'Error';
            }
        }
        $this->set(compact('message', 'applicantsHasHobby'));
        $this->set('_serialize', ['message', 'applicantsHasHobby']);
    }

    /**
     * @api {DELETE} /applicants_has_hobbies 2. Delete Applicants Hobbies
     * @apiName DeleteApplicantsHasHobbies
     * @apiGroup Applicants-Hobbies
     * @apiVersion 0.2.0
     * @apiPermission Applicant
     *
     * @apiDescription Delete Applicants Hobbies. This is a descripton.
     *
     * @apiParam {Number}       applicant_id Applicant ID.
     * @apiParam {Number}       hobby_id Hobby ID.
     *
     * @apiSuccess {String}     message PUT message (Values: <code>Deleted</code>,<code>Error</code>).
     *
     * @apiSuccessExample Success-Response:
     *      HTTP/1.1 200 OK
     *      {
     *          "message": "Deleted",
     *      }
     *
     * @apiUse ApplicantsHasHobbiesNotFoundError
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);

        $conditions['applicant_id'] = $this->request->data['applicant_id'];
        $conditions['hobby_id'] = $this->request->data['hobby_id'];
        $applicantsHasHobby = $this->ApplicantsHasHobbies->find('all', [
            'conditions' => $conditions,
            'contain' => []
        ])->first();

        if (empty($applicantsHasHobby)) {
            throw new NotFoundException(__('Applicants Hobbies not found'));
        }

        if ($this->ApplicantsHasHobbies->delete($applicantsHasHobby)) {
                $message = 'Deleted';
            } else {
                $message = 'Error';
            }
        $this->set(compact('message'));
        $this->set('_serialize', ['message']);
    }
}
