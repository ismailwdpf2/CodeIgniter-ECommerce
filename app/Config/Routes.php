<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');



// user section

$routes->get('/login', 'Login::index');
$routes->get('/register', 'Login::register');
$routes->get('/logout', 'Login::logout');
$routes->post('/do-login', 'Login::do_login');
$routes->post('/do-register', 'Login::do_register');

$routes->post('/do-login', 'Login::do_login');
$routes->post('/do-register', 'Login::do_register');


// Catogories routes
$routes->post('/admin/insert-categories', 'Admin\Categories::insert_categories');
$routes->get('/admin/show-category', 'Admin\Categories::show_category');
$routes->get('/user/category', 'Admin\Categories::show_category_user');
$routes->get('/user/subcategory/(:num)', 'Admin\SubcategoryController::show_products/$1');
$routes->get('/user/details/(:num)', 'Admin\Product::product_show/$1');
$routes->get('/admin/category/(:any)', 'Admin\Categories::delete_category/$1');
$routes->get('/insert_catogories', 'Admin\Categories::index');


// product section
// $routes->get('/product-add', 'Admin\ProductAdd::index');
$routes->get('product/create', 'Admin\Product::create');
$routes->post('product/create', 'Admin\Product::create');
$routes->get('product-show', 'Admin\Product::product_show');
$routes->get('singal/product/(:num)', 'Admin\Product::singalpost/$1');
// $routes->get('product-show', 'Admin\Product::product_show');
// $routes->get('Admin/product/create', 'Admin\Product::product_show');

$routes->get('admin/product/all', 'Admin\Product::index');

$routes->get('admin/product/create', 'Admin\Product::create');
$routes->post('admin/product/create', 'Admin\Product::create');


// subcategories section

$routes->get('admin/subcategory', 'Admin\SubcategoryController::index');
$routes->get('subcategory/page/(:num)', 'Admin\SubcategoryController::getPaginatedData/$1');
$routes->get('subcategory/all', 'Admin\SubcategoryController::all');
$routes->post('/subcategory/new', 'Admin\SubcategoryController::create');
$routes->post('subcategory/delete', 'Admin\SubcategoryController::delete');
// $routes->get('getsubcat/(:num)', 'Admin\SubcategoryController::subcat/$1');

// admin section
$routes->get('admin', 'Admin\AdminHome::index');
$routes->get('/admin/adminuser', 'Admin\User::index');
$routes->delete('admin/user/(:num)', 'Admin\User::delete/$1');
$routes->get('getsubcat/(:num)', 'Admin\SubcategoryController::subcat/$1');


// add to cart section
$routes->get('/cart', 'CartController::index');
// $routes->get('/addcart', 'CartController::addtocart');



// $routes->post('cart/add/(:num)', 'CartController::addToCart/$1');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
