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
     * @apiDefine CategoryDefaultGetParameter
     *
     * @apiParam {String=id,category_name,category_description,parent_id} [sort=id] Sort by field.
     */

    /**
     * @apiDefine CategoryNotFoundError
     *
     * @apiError CategoryNotFound The <code>id</code> of the Category was not found.
     *
     * @apiErrorExample {json} Error-Response:
     *     HTTP/1.1 404 Not Found
     *      {
     *          message: "Record not found in table "categories"",
     *          url: "/CareerSystemWebBased/career_system/api/categories/0",
     *          code: 404
     *      }
     */

    /**
     * @api {GET} /categories 1. Request All Categories information
     * @apiName GetCategories
     * @apiGroup Category
     * @apiVersion 0.2.0
     * @apiPermission none
     *
     * @apiDescription Request All Categories information. This is a descripton.
     *
     * @apiUse DefaultGetParameter
     * @apiUse CategoryDefaultGetParameter
     *
     * @apiSuccess {Object[]}   categories List of categories (Array of Objects).
     * @apiSuccess {Number}     categories.id Post ID.
     * @apiSuccess {String}     categories.category_name Post title.
     * @apiSuccess {String}     categories.category_description Post content.
     * @apiSuccess {Number}     categories.parent_id Job's salary.
     * @apiSuccess {Number}     categories.lft Job's location.
     * @apiSuccess {Number}     categories.rght Created date.
     *
     * @apiSuccessExample Success-Response:
     *      HTTP/1.1 200 OK
     *      {
     *          "categories": [
     *               {
     *                   "id": 2,
     *                   "category_name": "Accounting",
     *                   "category_description": "Description here",
     *                   "parent_id": 1,
     *                   "lft": 2,
     *                   "rght": 3
     *               }
     *          ]
     *     }
     *
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

}
