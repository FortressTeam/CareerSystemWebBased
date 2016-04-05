<?php
namespace App\Controller\Api;

use App\Controller\Api\AppController;

class PostsController extends AppController
{
    /**
     * @apiDefine DefaultGetParameter
     *
     * @apiParam {Number{1-*}}      [limit=20] Number of results.
     * @apiParam {Number{1-*}}      [page=1] Paginate page.
     * @apiParam {String=asc,desc}  [direction=asc] Sort direction.
     */

    /**
     * @apiDefine PostDefaultGetParameter
     *
     * @apiParam {String=id,post_title,post_salary,post_location,post_date,category_id,hiring_manager_id} [sort=id] Sort by field.
     */

    /**
     * @apiDefine PostNotFoundError
     *
     * @apiError PostNotFound The <code>id</code> of the Post was not found.
     *
     * @apiErrorExample {json} Error-Response:
     *     HTTP/1.1 404 Not Found
     *      {
     *          message: "Record not found in table "posts"",
     *          url: "/CareerSystemWebBased/career_system/api/posts/0",
     *          code: 404
     *      }
     */

    /**
     * @api {GET} /posts 1. Request All Posts information
     * @apiName GetPosts
     * @apiGroup Post
     * @apiVersion 0.2.0
     * @apiPermission none
     *
     * @apiDescription Request All Posts information. This is a descripton.
     *
     * @apiParam {Number}       [category_id] Category ID.
     * @apiParam {Number}       [hiring_manager_id] Hiring Manager ID.
     * @apiUse DefaultGetParameter
     * @apiUse PostDefaultGetParameter
     *
     * @apiSuccess {Object[]}   posts List of posts (Array of Objects).
     * @apiSuccess {Number}     posts.id Post ID.
     * @apiSuccess {String}     posts.post_title Post title.
     * @apiSuccess {String}     posts.post_content Post content.
     * @apiSuccess {Number}     posts.post_salary Job's salary.
     * @apiSuccess {String}     posts.post_location Job's location.
     * @apiSuccess {Date}       posts.post_date Created date.
     * @apiSuccess {Boolean}    posts.post_status Post status.
     * @apiSuccess {Number}     posts.category_id Category ID.
     * @apiSuccess {Number}     posts.hiring_manager_id Hiring manager ID.
     *
     * @apiSuccessExample Success-Response:
     *      HTTP/1.1 200 OK
     *      {
     *          "posts": [
     *               {
     *                   "id": 1,
     *                   "post_title": "SUMMER INTERN",
     *                   "post_content": "If full is true, the full base URL will be prepended to the result",
     *                   "post_salary": 5000000,
     *                   "post_location": "Danang, Vietnam",
     *                   "post_date": "2016-03-25T00:00:00+0000",
     *                   "post_status": true,
     *                   "category_id": 1,
     *                   "hiring_manager_id": 1,
     *               }
     *          ]
     *     }
     *
     */
    public function index()
    {
        $conditions = [];
        if(isset($this->request->query['category_id'])) {
            $conditions['category_id'] = $this->request->query['category_id'];
        }
        if(isset($this->request->query['hiring_manager_id'])) {
            $conditions['hiring_manager_id'] = $this->request->query['hiring_manager_id'];
        }
        $this->paginate = [
            'conditions' => $conditions,
            'contain' => ['Categories', 'HiringManagers']
        ];
        $posts = $this->paginate($this->Posts);

        $this->set(compact('posts'));
        $this->set('_serialize', ['posts']);
    }

    /**
     * @api {GET} /posts/:id 2. Request Post information
     * @apiName GetPost
     * @apiGroup Post
     * @apiVersion 0.2.0
     * @apiPermission none
     *
     * @apiDescription Request Post information. This is a descripton.
     *
     * @apiParam {Number}       id Post ID.
     *
     * @apiSuccess {Object}     post Post object.
     * @apiSuccess {Number}     post.id Post ID.
     * @apiSuccess {String}     post.post_title Post title.
     * @apiSuccess {String}     post.post_content Post content.
     * @apiSuccess {Number}     post.post_salary Job's salary.
     * @apiSuccess {String}     post.post_location Job's location.
     * @apiSuccess {Date}       post.post_date Created date.
     * @apiSuccess {Boolean}    post.post_status Post status.
     * @apiSuccess {Number}     post.category_id Category ID.
     * @apiSuccess {Number}     post.hiring_manager_id Hiring manager ID.
     *
     * @apiSuccessExample Success-Response:
     *      HTTP/1.1 200 OK
     *      {
     *          "post": {
     *              "id": 1,
     *              "post_title": "SUMMER INTERN",
     *              "post_content": "If full is true, the full base URL will be prepended to the result",
     *              "post_salary": 5000000,
     *              "post_location": "Danang, Vietnam",
     *              "post_date": "2016-03-25T00:00:00+0000",
     *              "post_status": true,
     *              "category_id": 1,
     *              "hiring_manager_id": 1,
     *          }
     *     }
     *
     * @apiUse PostNotFoundError
     */
    public function view($id = null)
    {
        $post = $this->Posts->get($id, [
            'contain' => ['Categories', 'HiringManagers', 'ApplicantsFollowPosts', 'PostsHasCurriculumVitaes']
        ]);

        $this->set(compact('post'));
        $this->set('_serialize', ['post']);
    }

    /**
     * @api {POST} /posts 3. Create a new Post
     * @apiName PostPost
     * @apiGroup Post
     * @apiVersion 0.2.0
     * @apiPermission Hiring Manager
     *
     * @apiDescription Create a new Post. This is a descripton.
     *
     * @apiParam {String}       post_title Post title.
     * @apiParam {String}       post_content Post content.
     * @apiParam {Number}       post_salary Job's salary.
     * @apiParam {String}       post_location Job's location.
     * @apiParam {Date}         post_date Created date.
     * @apiParam {Boolean}      post_status Post status.
     * @apiParam {Number}       category_id Category ID.
     * @apiParam {Number}       hiring_manager_id Hiring manager ID.
     *
     * @apiSuccess {String}     message POST message (Values: <code>Saved</code>,<code>Error</code>).
     * @apiSuccess {Object}     post Post object.
     * @apiSuccess {Number}     post.id Post ID.
     * @apiSuccess {String}     post.post_title Post title.
     * @apiSuccess {String}     post.post_content Post content.
     * @apiSuccess {Number}     post.post_salary Job's salary.
     * @apiSuccess {String}     post.post_location Job's location.
     * @apiSuccess {Date}       post.post_date Created date.
     * @apiSuccess {Boolean}    post.post_status Post status.
     * @apiSuccess {Number}     post.category_id Category ID.
     * @apiSuccess {Number}     post.hiring_manager_id Hiring manager ID.
     *
     * @apiSuccessExample Success-Response:
     *      HTTP/1.1 200 OK
     *      {
     *          "message": "Saved",
     *          "post": {
     *              "id": 2
     *              "post_title": "SUMMER INTERN",
     *              "post_content": "If full is true, the full base URL will be prepended to the result",
     *              "post_salary": 5000000,
     *              "post_location": "Danang, Vietnam",
     *              "post_date": "2016-03-22T00:00:00+0000",
     *              "post_status": true,
     *              "category_id": 1,
     *              "hiring_manager_id": 1,
     *          }
     *      }
     *
     */
    public function add()
    {
        $post = $this->Posts->newEntity();
        if ($this->request->is('post')) {
            $post = $this->Posts->patchEntity($post, $this->request->data);
            if ($this->Posts->save($post)) {
				$message = 'Saved';
			} else {
				$message = 'Error';
			}
        }
        $this->set(compact('message', 'post'));
        $this->set('_serialize', ['message', 'post']);
    }

    /**
     * @api {PUT} /posts/:id 4. Modify Post information
     * @apiName PutPost
     * @apiGroup Post
     * @apiVersion 0.2.0
     * @apiPermission Hiring Manager
     *
     * @apiDescription Modify Post information. This is a descripton.
     *
     * @apiParam {Number}       id Post ID.
     * @apiParam {String}       [post_title] Post title.
     * @apiParam {String}       [post_content] Post content.
     * @apiParam {Number}       [post_salary] Job's salary.
     * @apiParam {String}       [post_location] Job's location.
     * @apiParam {Boolean}      [post_status] Post status.
     * @apiParam {Number}       [category_id] Category ID.
     * @apiParam {Number}       [hiring_manager_id] Hiring manager ID.
     *
     * @apiSuccess {String}     message PUT message (Values: <code>Saved</code>,<code>Error</code>).
     * @apiSuccess {Object}     post Post object.
     * @apiSuccess {Number}     post.id Post ID.
     * @apiSuccess {String}     post.post_title Post title.
     * @apiSuccess {String}     post.post_content Post content.
     * @apiSuccess {Number}     post.post_salary Job's salary.
     * @apiSuccess {String}     post.post_location Job's location.
     * @apiSuccess {Boolean}    post.post_status Post status.
     * @apiSuccess {Number}     post.category_id Category ID.
     * @apiSuccess {Number}     post.hiring_manager_id Hiring manager ID.
     *
     * @apiSuccessExample Success-Response:
     *      HTTP/1.1 200 OK
     *      {
     *          "message": "Saved",
     *          "post": {
     *              "id": 1,
     *              "post_title": "SUMMER INTERN",
     *              "post_content": "If full is true, the full base URL will be prepended to the result",
     *              "post_salary": 5000000,
     *              "post_location": "Danang, Vietnam",
     *              "post_status": true,
     *              "category_id": 1,
     *              "hiring_manager_id": 1,
     *          }
     *      }
     *
     * @apiUse PostNotFoundError
     */
    public function edit($id = null)
    {
        $post = $this->Posts->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $post = $this->Posts->patchEntity($post, $this->request->data);
            if ($this->Posts->save($post)) {
				$message = 'Saved';
			} else {
				$message = 'Error';
			}
		}
        $this->set(compact('message', 'post'));
        $this->set('_serialize', ['message', 'post']);
    }


    public function thisYear() {
        $months = $this->Posts->find();
        $year_month = $months->func()->date_format([
            'post_date' => 'literal',
            "'%Y-%m'" => 'literal'
        ]);
        $month = $months->func()->month([
            'post_date' => 'literal'
        ]);
        $months
            ->select([
                'month' => $year_month,
                'value' => $months->func()->count('Posts.id')
            ])
            ->where(function($exp, $q){
                $year = $q->func()->year([
                    'post_date' => 'literal'
                ]);
                return $exp->eq($year, 2016);
            })
            ->group($month);
        $this->set(compact('months'));
        $this->set('_serialize', ['months']);
    }
}