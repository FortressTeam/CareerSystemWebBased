<?php
namespace App\Controller\Api;

use App\Controller\Api\AppController;

/**
 * Feedbacks Controller
 *
 * @property \App\Model\Table\FeedbacksTable $Feedbacks
 */
class FeedbacksController extends AppController
{

    /**
     * @apiDefine FeedbackDefaultGetParameter
     *
     * @apiParam {String=id,feedback_title,feedback_date,feedback_type_id,user_id} [sort=id] Sort by field.
     */

    /**
     * @apiDefine FeedbackNotFoundError
     *
     * @apiError FeedbackNotFound The <code>id</code> of the Feedback was not found.
     *
     * @apiErrorExample {json} Error-Response:
     *     HTTP/1.1 404 Not Found
     *      {
     *          message: "Record not found in table "feedbacks"",
     *          url: "/CareerSystemWebBased/career_system/api/feedbacks/0",
     *          code: 404
     *      }
     */

    /**
     * @api {GET} /feedbacks 1. Request All Feedbacks information
     * @apiName GetFeedbacks
     * @apiGroup Feedback
     * @apiVersion 0.2.0
     * @apiPermission Admin
     *
     * @apiDescription Request All Feedbacks information. This is a descripton.
     *
     * @apiParam {Number}       [user_id] User ID.
     * @apiParam {Number}       [feedback_type_id] Feedback Type ID.
     * @apiUse DefaultGetParameter
     * @apiUse FeedbackDefaultGetParameter
     *
     * @apiSuccess {Object[]}   feedbacks List of feedbacks (Array of Objects).
     * @apiSuccess {Number}     feedbacks.id Feedback ID.
     * @apiSuccess {String}     feedbacks.feedback_title Feedback title.
     * @apiSuccess {String}     feedbacks.feedback_comment Feedback comment.
     * @apiSuccess {Date}       feedbacks.feedback_date Created date.
     * @apiSuccess {String}     feedbacks.feedback_result Feedback result.
     * @apiSuccess {Number}     feedbacks.feedback_type_id Feedback type ID.
     * @apiSuccess {Number}     feedbacks.user_id User ID.
     *
     * @apiSuccessExample Success-Response:
     *      HTTP/1.1 200 OK
     *      {
     *          "feedbacks": [
     *               {
     *                   "id": 1,
     *                   "feedback_title": "About the menu bar",
     *                   "feedback_comment": "The top menu bar is not show in Post Page.",
     *                   "feedback_date": "2016-03-02T00:00:00+0000",
     *                   "feedback_result": "Thank you. We'll fix it soon.",
     *                   "feedback_type_id": 1,
     *                   "user_id": 1
     *               }
     *          ]
     *     }
     *
     */
    public function index()
    {
        $conditions = [];
        if(isset($this->request->query['user_id'])) {
            $conditions['user_id'] = $this->request->query['user_id'];
        }
        if(isset($this->request->query['feedback_type_id'])) {
            $conditions['feedback_type_id'] = $this->request->query['feedback_type_id'];
        }
        $this->paginate = [
            'conditions' => $conditions,
            'contain' => ['FeedbackTypes', 'Users']
        ];
        $feedbacks = $this->paginate($this->Feedbacks);

        $this->set(compact('feedbacks'));
        $this->set('_serialize', ['feedbacks']);
    }

    /**
     * @api {GET} /feedbacks/:id 2. Request Feedback information
     * @apiName GetFeedback
     * @apiGroup Feedback
     * @apiVersion 0.2.0
     * @apiPermission Admin
     *
     * @apiDescription Request Feedbacks information. This is a descripton.
     *
     * @apiParam {Number}       id Feedbacks ID.
     *
     * @apiSuccess {Object}     feedback Feedback Objects.
     * @apiSuccess {Number}     feedback.id Feedback ID.
     * @apiSuccess {String}     feedback.feedback_title Feedback title.
     * @apiSuccess {String}     feedback.feedback_comment Feedback comment.
     * @apiSuccess {Date}       feedback.feedback_date Created date.
     * @apiSuccess {String}     feedback.feedback_result Feedback result.
     * @apiSuccess {Number}     feedback.feedback_type_id Feedback type ID.
     * @apiSuccess {Number}     feedback.user_id User ID.
     *
     * @apiSuccessExample Success-Response:
     *      HTTP/1.1 200 OK
     *      {
     *          "feedback": {
     *              "id": 1,
     *              "feedback_title": "About the menu bar",
     *              "feedback_comment": "The top menu bar is not show in Post Page.",
     *              "feedback_date": "2016-03-02T00:00:00+0000",
     *              "feedback_result": "Thank you. We'll fix it soon.",
     *              "feedback_type_id": 1,
     *              "user_id": 1
     *          }
     *     }
     *
     * @apiUse FeedbackNotFoundError
     */
    public function view($id = null)
    {
        $feedback = $this->Feedbacks->get($id, [
            'contain' => ['FeedbackTypes', 'Users']
        ]);

        $this->set('feedback', $feedback);
        $this->set('_serialize', ['feedback']);
    }

    /**
     * @api {POST} /feedbacks 3. Create a new Feedback
     * @apiName PostFeedback
     * @apiGroup Feedback
     * @apiVersion 0.2.0
     * @apiPermission none
     *
     * @apiDescription Create a new Feedback. This is a descripton.
     *
     * @apiParam {String}       feedback_title Feedback title.
     * @apiParam {String}       feedback_comment Feedback comment.
     * @apiParam {Date}         feedback_date Created date.
     * @apiParam {String}       feedback_result Feedback result.
     * @apiParam {Number}       feedback_type_id Feedback type ID.
     * @apiParam {Number}       user_id User ID.

     * @apiSuccess {String}     message POST message (Values: <code>Saved</code>,<code>Error</code>).
     * @apiSuccess {Object}     feedback Feedback Objects.
     * @apiSuccess {Number}     feedback.id Feedback ID.
     * @apiSuccess {String}     feedback.feedback_title Feedback title.
     * @apiSuccess {String}     feedback.feedback_comment Feedback comment.
     * @apiSuccess {Date}       feedback.feedback_date Created date.
     * @apiSuccess {String}     feedback.feedback_result Feedback result.
     * @apiSuccess {Number}     feedback.feedback_type_id Feedback type ID.
     * @apiSuccess {Number}     feedback.user_id User ID.
     *
     * @apiSuccessExample Success-Response:
     *      HTTP/1.1 200 OK
     *      {
     *          "message": "Saved",
     *          "feedback": {
     *              "id": 2
     *              "feedback_title": "About the menu bar",
     *              "feedback_comment": "The top menu bar is not show in Post Page.",
     *              "feedback_date": "2016-03-02T00:00:00+0000",
     *              "feedback_result": null,
     *              "feedback_type_id": 1,
     *              "user_id": 1
     *          }
     *      }
     *
     */
    public function add()
    {
        $feedback = $this->Feedbacks->newEntity();
        if ($this->request->is('post')) {
            $feedback = $this->Feedbacks->patchEntity($feedback, $this->request->data);
            if ($this->Feedbacks->save($feedback)) {
                $message = 'Saved';
            } else {
                $message = 'Error';
            }
        }
        $this->set(compact('message', 'feedback'));
        $this->set('_serialize', ['message', 'feedback']);
    }

    /**
     * @apiIgnore Not finished Method
     * @api {get} /feedbacks/month 4. Get Statistic by Month
     * @apiName GetMonthStatistic
     * @apiGroup Feedback
     * @apiVersion 0.2.0
     * @apiPermission Admin
     *
     * @apiDescription Get Statistic by Month. This is a descripton.
     */
    public function month()
    {
        $dataByMonth = $this->Feedbacks->find();
        $month = $dataByMonth->func()->month([
            'feedback_date' => 'literal'
        ]);
        $dataByMonth
            ->select([
                'monthSubmited' => 'feedback_date',
                'totalFeedbacks' => $dataByMonth->func()->count('Feedbacks.id')
            ])
            ->where(function($exp, $q){
                $year = $q->func()->year([
                    'feedback_date' => 'literal'
                ]);
                return $exp->eq($year, 2016);
            })
            ->group($month);
        $this->set(compact('dataByMonth'));
        $this->set('_serialize', ['dataByMonth']);
    }

    /**
     * @apiIgnore Not finished Method
     * @api {get} /feedbacks/month 5. Get Statistic by Type
     * @apiName GetTypeStatistic
     * @apiGroup Feedback
     * @apiVersion 0.2.0
     * @apiPermission Admin
     *
     * @apiDescription Get Statistic by Type. This is a descripton.
     */
    public function type()
    {
        $dataByType = $this->Feedbacks->find();
        $dataByType
        	->contain(['FeedbackTypes'])
        	->select([
        		'label' => 'FeedbackTypes.feedback_type_name',
                'value' => $dataByType->func()->count('Feedbacks.id')
        	])
            ->where(function($exp, $q){
                $year = $q->func()->year([
                    'feedback_date' => 'literal'
                ]);
                return $exp->eq($year, 2016);
            })
            ->group(['FeedbackTypes.id']);
        $this->set(compact('dataByType'));
        $this->set('_serialize', ['dataByType']);
    }

}