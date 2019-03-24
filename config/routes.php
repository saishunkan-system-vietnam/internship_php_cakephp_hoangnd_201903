<?php

/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
use Cake\Http\Middleware\CsrfProtectionMiddleware;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

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
 * Cache: Routes are cached to improve performance, check the RoutingMiddleware
 * constructor in your `src/Application.php` file to change this behavior.
 *
 */
Router::defaultRouteClass(DashedRoute::class);

Router::scope('/', function (RouteBuilder $routes) {
    // Register scoped middleware for in scopes.
    $routes->registerMiddleware('csrf', new CsrfProtectionMiddleware([
        'httpOnly' => true
    ]));

    /**
     * Apply a middleware to the current route scope.
     * Requires middleware to be registered via `Application::routes()` with `registerMiddleware()`
     */
    $routes->applyMiddleware('csrf');

    /**
     * Here, we are connecting '/' (base path) to a controller called 'Pages',
     * its action called 'display', and we pass a param to select the view file
     * to use (in this case, src/Template/Pages/home.ctp)...
     */
    $routes->connect('/', ['controller' => 'Pages', 'action' => 'display', 'home']);

    /**
     * ...and connect the rest of 'Pages' controller's URLs.
     */
    $routes->connect('/pages/*', ['controller' => 'Pages', 'action' => 'display']);

    /**
     * Connect catchall routes for all controllers.
     *
     * Using the argument `DashedRoute`, the `fallbacks` method is a shortcut for
     *
     * ```
     * $routes->connect('/:controller', ['action' => 'index'], ['routeClass' => 'DashedRoute']);
     * $routes->connect('/:controller/:action/*', [], ['routeClass' => 'DashedRoute']);
     * ```
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
//    Router::scope('/manager', function (RouteBuilder $routes) {
//        $routes->connect('/', ['controller' => 'Managers', 'action' => 'index']);
//        $routes->connect('/logout', ['controller' => 'Managers', 'action' => 'logout']);
//        $routes->connect('/phone_manager', ['controller' => 'PhoneManager', 'action' => 'index']);
//    });
//    Router::scope('/', function (RouteBuilder $routes) {
//        $routes->connect('/', ['controller' => 'Homes', 'action' => 'index']);
    $routes->connect('/login', ['controller' => 'Login', 'action' => 'index']);
//        $routes->connect('/registration', ['controller' => 'Registration', 'action' => 'index']);
//    });
    $routes->fallbacks(DashedRoute::class);
});

Router::prefix('manager', function ($routes) {
    $routes->connect('/', ['controller' => 'Homes', 'action' => 'index']);

    //logout
    $routes->connect('/logout', ['controller' => 'Managers', 'action' => 'logout']);

    //route category
    $routes->connect('/category', ['controller' => 'Categories', 'action' => 'index']);
    $routes->connect('/category/add', ['controller' => 'Categories', 'action' => 'addproducer']);
    $routes->connect('/category/editproducer', ['controller' => 'Categories', 'action' => 'editproducer']);
    $routes->connect('/category/editsubproducer', ['controller' => 'Categories', 'action' => 'editsubproducer']);
    $routes->connect('/category/delete', ['controller' => 'Categories', 'action' => 'delete']);


    //route product groups
    $routes->connect('/product_groups', ['controller' => 'ProductGroups', 'action' => 'index']);
    $routes->connect('/product_groups/edit', ['controller' => 'ProductGroups', 'action' => 'edit']);
    $routes->connect('/product_groups/delete', ['controller' => 'ProductGroups', 'action' => 'delete']);


    //route product
    $routes->connect('/product', ['controller' => 'Products', 'action' => 'index']);
    $routes->connect('/product/edit', ['controller' => 'Products', 'action' => 'edit']);
    $routes->connect('/product/add', ['controller' => 'Products', 'action' => 'add']);
    $routes->connect('/product/delete', ['controller' => 'Products', 'action' => 'delete']);

    //Ajax
    $routes->connect('/getsubproducer', ['controller' => 'Ajax', 'action' => 'getsubproducer']);
    $routes->connect('/saveimagesinram', ['controller' => 'Ajax', 'action' => 'saveimagesinram']);


    $routes->fallbacks(DashedRoute::class);
});
