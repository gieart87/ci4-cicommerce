<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

$routes->get('products', 'Products::index');

$routes->group('admin', ['filter' => 'admin-auth:admin,operator'] ,function ($routes) {
	$routes->get('dashboard', 'Admin\Dashboard::index');

	$routes->get('categories', 'Admin\Categories::index');
	$routes->get('categories/(:num)', 'Admin\Categories::index/$1');
	$routes->post('categories', 'Admin\Categories::store');
	$routes->put('categories/(:num)', 'Admin\Categories::update/$1');
	$routes->delete('categories/(:num)', 'Admin\Categories::destroy/$1');

	$routes->get('attributes', 'Admin\Attributes::index');
	$routes->get('attributes/(:num)', 'Admin\Attributes::index/$1');
	$routes->post('attributes', 'Admin\Attributes::store');
	$routes->put('attributes/(:num)', 'Admin\Attributes::update/$1');
	$routes->delete('attributes/(:num)', 'Admin\Attributes::destroy/$1');

	$routes->get('attribute-options', 'Admin\AttributeOptions::index');
	$routes->get('attribute-options/(:num)', 'Admin\AttributeOptions::index/$1');
	$routes->get('attribute-options/(:num)/(:num)', 'Admin\AttributeOptions::index/$1/$2');
	$routes->post('attribute-options', 'Admin\AttributeOptions::store');
	$routes->put('attribute-options/(:num)/(:num)', 'Admin\AttributeOptions::update/$1/$2');
	$routes->delete('attribute-options/(:num)', 'Admin\AttributeOptions::destroy/$1');

	$routes->get('brands', 'Admin\Brands::index');
	$routes->get('brands/(:num)', 'Admin\Brands::index/$1');
	$routes->post('brands', 'Admin\Brands::store');
	$routes->put('brands/(:num)', 'Admin\Brands::update/$1');
	$routes->delete('brands/(:num)', 'Admin\Brands::destroy/$1');

	$routes->get('products', 'Admin\Products::index');
	$routes->get('products/create', 'Admin\Products::create');
	$routes->get('products/(:num)', 'Admin\Products::index/$1');
	$routes->get('products/(:num)/edit', 'Admin\Products::edit/$1');
	$routes->post('products', 'Admin\Products::store');
	$routes->put('products/(:num)', 'Admin\Products::update/$1');
	$routes->delete('products/(:num)', 'Admin\Products::destroy/$1');
	$routes->get('products/restore/(:num)', 'Admin\Products::restore/$1');
	$routes->get('products/(:num)/images', 'Admin\Products::images/$1');
	$routes->get('products/(:num)/upload-image', 'Admin\Products::uploadImage/$1');
	$routes->post('products/(:num)/upload-image', 'Admin\Products::doUploadImage/$1');
	$routes->delete('products/images/(:num)', 'Admin\Products::destroyImage/$1');
});

/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need to it be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
