<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Core\Plugin;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;

/**
 * The default class to use for all routes
 *
 * The following route classes are supplied with CakePHP and are appropriate
 * to set as the default:
 *
 * - Route
 * - InflectedRoute
 * - DashedRoute
 *
 * If no call is made to `Router::defaultRouteClass()`, the class used is
 * `Route` (`Cake\Routing\Route\Route`)
 *
 * Note that `Route` does not do any inflections on URLs which will result in
 * inconsistently cased URLs when used with `:plugin`, `:controller` and
 * `:action` markers.
 *
 */
Router::defaultRouteClass('DashedRoute');

Router::scope('/', function (RouteBuilder $routes) {
    /**
     * Here, we are connecting '/' (base path) to a controller called 'Pages',
     * its action called 'display', and we pass a param to select the view file
     * to use (in this case, src/Template/Pages/home.ctp)...
     */
    $routes->connect('/', ['controller' => 'Pages', 'action' => 'home']);

    /**
     * ...and connect the rest of 'Pages' controller's URLs.
     */
    $routes->connect('/signin', ['controller' => 'Users', 'action' => 'signin']);
    $routes->connect('/signup', ['controller' => 'Users', 'action' => 'signup']);
    // $routes->connect('/hiring-managers', ['controller' => 'Users', 'action' => 'hiringManagers']);
    $routes->connect('/dashboard', ['controller' => 'Pages', 'action' => 'dashboard']);
    $routes->connect('/pages/*', ['controller' => 'Pages', 'action' => 'home']);

    $routes->connect(
        '/post/:slug-:id',
        ['controller' => 'Posts', 'action' => 'view'],
        ['id' => '\d+', 'pass' => ['id', 'slug']]
    );
    $routes->connect(
        '/category/:slug-:id',
        ['controller' => 'Categories', 'action' => 'view'],
        ['id' => '\d+', 'pass' => ['id', 'slug']]
    );
    $routes->connect(
        '/applicant/:slug-:id',
        ['controller' => 'Applicants', 'action' => 'view'],
        ['id' => '\d+', 'pass' => ['id', 'slug']]
    );
    $routes->connect(
        '/hiring-manager/:slug-:id',
        ['controller' => 'HiringManagers', 'action' => 'view'],
        ['id' => '\d+', 'pass' => ['id', 'slug']]
    );
    $routes->connect(
        '/administrator/:slug-:id',
        ['controller' => 'Administrators', 'action' => 'view'],
        ['id' => '\d+', 'pass' => ['id', 'slug']]
    );
    /**
     * Connect catchall routes for all controllers.
     *
     * Using the argument `DashedRoute`, the `fallbacks` method is a shortcut for
     *    `$routes->connect('/:controller', ['action' => 'index'], ['routeClass' => 'DashedRoute']);`
     *    `$routes->connect('/:controller/:action/*', [], ['routeClass' => 'DashedRoute']);`
     *
     * Any route class can be used with this method, such as:
     * - DashedRoute
     * - InflectedRoute
     * - Route
     * - Or your own route class
     *
     * You can remove these routes once you've connected the
     * routes you want in your application.
     */
    $routes->fallbacks('DashedRoute');
});

Router::prefix('api', function ($routes) {
    $routes->extensions(['json', 'xml']);
    $routes->resources('Users');
    $routes->resources('HiringManagers');
    $routes->resources('Categories');
    $routes->resources('Posts', [
        'map' => [
            'this_year' => [
                'action' => 'thisYear',
                'method' => 'POST'
           ]
        ]
    ]);
    $routes->resources('CurriculumVitaes');
    $routes->resources('PostsHasCurriculumVitaes');
    $routes->resources('Follow');
    $routes->resources('ApplicantsFollowPosts');
    $routes->resources('Applicants', function ($routes) {
        $routes->resources('CurriculumVitaes');
    });
    $routes->resources('ApplicantsHasSkills', [
        'map' => [
            'update' => [
                'action' => 'edit',
                'method' => 'PUT',
                'path' => '/'
            ],
            'delete' => [
                'action' => 'delete',
                'method' => 'DELETE',
                'path' => '/'
            ],
        ]
    ]);
    $routes->resources('Skills');
    $routes->resources('SkillTypes');
    $routes->resources('ApplicantsHasHobbies', [
        'map' => [
            'delete' => [
                'action' => 'delete',
                'method' => 'DELETE',
                'path' => '/'
            ],
        ]
    ]);
    $routes->resources('Hobbies');
    $routes->resources('PersonalHistory');
    $routes->resources('Feedbacks', [
       'map' => [
           'month' => [
               'action' => 'month',
               'method' => 'POST'
           ],
           'type' => [
               'action' => 'type',
               'method' => 'GET'
           ]
       ]
    ]);
    $routes->resources('Notifications');
    $routes->fallbacks('InflectedRoute');
});



Router::prefix('api/v1', function ($routes) {
    $routes->extensions(['json', 'xml']);
    $routes->resources('Posts');
    $routes->fallbacks('InflectedRoute');
});
/**
 * Load all plugin routes.  See the Plugin documentation on
 * how to customize the loading of plugin routes.
 */
Plugin::routes();
