<?php

namespace Config;

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

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Welcome::index');

$routes->get('/login', 'Welcome::login');
$routes->post('/login_validate', 'User::login_validate');
$routes->get('/logout', 'User::logout');


$routes->get('/dashboard', 'Home::dashboard');
$routes->get('/orders', 'Home::orders');
$routes->post('dtorderslist', 'TableData::dtOrdersList');

$routes->get('/customers', 'Home::customers');
$routes->post('dtcustomerslist', 'TableData::dtCustomersList');

$routes->get('/beneficiaries', 'Home::beneficiaries');
$routes->post('dtbeneficiarieslist', 'TableData::dtBeneficiariesList');

$routes->get('/notifications', 'Home::notifications');
$routes->post('dtnotificationslist', 'TableData::dtNotificationsList');


$routes->get('/settings', 'Home::settings');

$routes->get('/settings/units', 'Settings::units');
$routes->post('/settings/addunit', 'Settings::addunit');
$routes->post('/settings/deleteunit', 'Settings::deleteunit');
$routes->post('/settings/dtunitslist', 'TableData::dtUnitsList');

$routes->get('/settings/users', 'Settings::users');
$routes->post('/settings/adduser', 'Settings::adduser');
$routes->post('/settings/deleteuser', 'Settings::deleteuser');
$routes->post('/settings/dtuserslist', 'TableData::dtUsersList');

$routes->get('/settings/reminder', 'Settings::reminder');
$routes->post('/settings/saveescalation', 'Settings::saveescalation');
$routes->post('/settings/enablenotifications', 'Settings::enablenotifications');

$routes->post('/settings/importbenefiaries', 'Settings::importbenefiaries');

$routes->get('/visits', 'Home::visits');
$routes->get('/schedule/(:alphanum)', 'Home::schedule/$1');
$routes->post('/schedulevisit', 'Schedule::savevisit');
$routes->get('/visitstatus/(:alphanum)', 'Home::visitstatus/$1');
$routes->post('/savestatus', 'Schedule::savestatus');

$routes->post('/dtvisitslist', 'TableData::dtVisitsList');


$routes->get('dashboard/summary', 'Dashboard::summary');
$routes->get('dashboard/unitwisesummary', 'Dashboard::unitwisesummary');
$routes->get('dashboard/unitsummary', 'Dashboard::unitsummary');
$routes->post('dashboard/upcomingvisits', 'Dashboard::upcomingvisits');


$routes->get('shopify/customercreated', 'Shopify::customercreated');
$routes->get('shopify/ordercreated', 'Shopify::ordercreated');
$routes->get('shopify/naseeraordercreated', 'Shopify::naseeraordercreated');




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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
