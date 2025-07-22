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

$routes->get('home', 'Home::index');
$routes->get('/', function() 
{
    return redirect()->to('home');
});

$routes->get('eCommerce', 'Home::index');
$routes->get('logistics', 'Home::index');

$routes->get('contact', 'Contact::index');
$routes->post('contact/send', 'Contact::send');

$routes->get('businesses', 'Businesses::index');
$routes->match(['get', 'post'],'businesses/all', 'Businesses::all');
$routes->get('businesses/view/(:any)', 'Businesses::view/$1');
$routes->get('businesses/edit/(:any)/(:any)', 'Businesses::edit/$1/$2');
$routes->post('businesses/update/(:any)/(:any)', 'Businesses::update/$1/$2');
$routes->match(['get', 'post'],'businesses/type/(:any)', 'Businesses::type/$1');

$routes->match(['get', 'post'],'login', 'Auth::index');
$routes->get('checkout/(:any)', 'Checkout::index/$1');

$routes->get('mydashboard', 'Mydashboard::index');
$routes->get('mydashboard/myprofile', 'Mydashboard::myprofile');
$routes->get('mydashboard/myprofile/edit', 'Mydashboard::profile_edit');
$routes->post('mydashboard/myprofile/update', 'Mydashboard::profile_update');
$routes->get('/mydashboard/mybusiness/view', 'Mydashboard::view');

$routes->get('dashboard', 'Dashboard::index');
$routes->match(['get', 'post'],'dashboard/users', 'Dashboard::users');
$routes->match(['get', 'post'],'dashboard/users/list/(:any)', 'Dashboard::users/$1');
$routes->get('dashboard/users/profile/(:any)', 'Dashboard::users_profile/$1');
$routes->get('dashboard/users/edit/(:any)', 'Dashboard::users_edit/$1');
$routes->post('dashboard/users/update/(:any)', 'Dashboard::users_update/$1');
$routes->match(['get', 'post'],'dashboard/users/password/(:any)', 'Dashboard::password/$1');

$routes->get('about', 'About::index');

$routes->match(['get', 'post'], 'signup/(:any)/(:any)', 'Auth::signup/$1/$2');
$routes->match(['get', 'post'], 'business/registration', 'Auth::businesses_reg');
$routes->match(['get', 'post'], 'business/individual', 'Auth::individual');
$routes->match(['get', 'post'],'change/password', 'Auth::password');
$routes->match(['get', 'post'],'password/(:any)', 'Auth::password_reset/$1');

$routes->get('logout', 'Auth::logout');
$routes->match(['get', 'post'], 'user/edit/(:any)', 'Auth::edit/$1');
$routes->post('user/updateLocation', 'Auth::updateLocation');

$routes->match(['get', 'post'], 'signup', 'Auth::signup');
$routes->post('getcity', 'Auth::getcity');

$routes->get('viewFile/(:any)', 'Home::viewFile/$1');
$routes->get('loadimg/(:any)/(:any)', 'Home::loadimg/$1/$2');
$routes->post('checkout/response', 'Checkout::response');
$routes->get('checkout/success', 'Checkout::success');
$routes->get('checkout/failed', 'Checkout::failed');
$routes->post('checkout/process', 'Checkout::process');

$routes->get('terms-conditions', 'Home::terms');
$routes->get('privacy-policy', 'Home::policy');
$routes->get('refund-cancellation', 'Home::refund');

$routes->get('mybusiness/create', 'MyBusiness::create');
$routes->post('mybusiness/upgrade', 'MyBusiness::upgrade');

$routes->group('api', ['namespace' => 'App\Controllers\Api'], function($routes) 
{
    $routes->get('users/(:any)', 'UserApi::index/$1');
});

$routes->group('siteinfo', function($routes) {
    $routes->get('/', 'SiteInfo::index');
    $routes->get('create', 'SiteInfo::create');
    $routes->post('save', 'SiteInfo::save');
    $routes->get('edit/(:segment)', 'SiteInfo::edit/$1');
    $routes->post('update/(:segment)', 'SiteInfo::update/$1');
    $routes->post('delete/(:segment)', 'SiteInfo::delete/$1');
});

$routes->group('homeinfo', function($routes) {
    $routes->get('/', 'HomeInfo::index');
    $routes->get('create', 'HomeInfo::create');
    $routes->post('save', 'HomeInfo::save');
    $routes->get('edit/(:segment)', 'HomeInfo::edit/$1');
    $routes->post('update/(:segment)', 'HomeInfo::update/$1');
    $routes->post('delete/(:segment)', 'HomeInfo::delete/$1');
    $routes->get('show/(:segment)', 'HomeInfo::show/$1');
});

$routes->group('keyhighlight', function($routes) {
    $routes->get('/', 'KeyHighLight::index');
    $routes->get('create', 'KeyHighLight::create');
    $routes->post('save', 'KeyHighLight::save');
    $routes->get('edit/(:segment)', 'KeyHighLight::edit/$1');
    $routes->post('update/(:segment)', 'KeyHighLight::update/$1');
    $routes->post('delete/(:segment)', 'KeyHighLight::delete/$1');
    $routes->get('show/(:segment)', 'KeyHighLight::show/$1');
});

$routes->group('HighLightItems', function($routes) {
    $routes->get('/', 'HighLightItem::index');
    $routes->get('create', 'HighLightItem::create');
    $routes->post('save', 'HighLightItem::save');
    $routes->get('edit/(:segment)', 'HighLightItem::edit/$1');
    $routes->post('update/(:segment)', 'HighLightItem::update/$1');
    $routes->post('delete/(:segment)', 'HighLightItem::delete/$1');
    $routes->get('show/(:segment)', 'HighLightItem::show/$1');
});

$routes->group('partnership', function($routes) {
    $routes->get('/', 'Partnership::index');
    $routes->get('create', 'Partnership::create');
    $routes->post('save', 'Partnership::save');
    $routes->get('edit/(:segment)', 'Partnership::edit/$1');
    $routes->post('update/(:segment)', 'Partnership::update/$1');
    $routes->post('delete/(:segment)', 'Partnership::delete/$1');
    $routes->get('show/(:segment)', 'Partnership::show/$1');
    $routes->get('allartners', 'Partnership::allPartner');
});

$routes->group('partnershipitem', function($routes) {
    $routes->get('/', 'PartnerItem::index');
    $routes->get('create', 'PartnerItem::create');
    $routes->post('save', 'PartnerItem::save');
    $routes->get('edit/(:segment)', 'PartnerItem::edit/$1');
    $routes->put('update/(:segment)', 'PartnerItem::update/$1');
    $routes->get('show/(:segment)', 'PartnerItem::show/$1');
    $routes->post('delete/(:segment)', 'PartnerItem::delete/$1');
});

$routes->get('menus', 'Menus::index');
$routes->match(['get', 'post'], 'menus/create', 'Menus::create');
$routes->post('store', 'Menus::store');
$routes->match(['get', 'post'], 'menus/(:segment)/edit', 'Menus::edit/$1');
$routes->put('update/(:segment)', 'Menus::update/$1');
$routes->delete('menus/(:segment)', 'Menus::delete/$1');

$routes->get('menus/(:segment)/items', 'MenuItems::index/$1');
$routes->match(['get', 'post'], 'menus/(:segment)/items/create', 'MenuItems::create/$1');
$routes->post('menuItem/(:segment)', 'MenuItems::store/$1');
$routes->put('update/item/(:segment)', 'MenuItems::update/$1');
$routes->put('update/item/(:segment)/(:segment)', 'MenuItems::update/$1/$2');
$routes->match(['get', 'post'], 'menus/(:segment)/items/(:segment)/edit', 'MenuItems::edit/$1/$2');
$routes->delete('menus/(:segment)/items/(:segment)', 'MenuItems::delete/$1/$2');

$routes->get('dashboard/agreement/templates', 'Dashboard::agreement_temp');
$routes->get('dashboard/agreement/list/(:any)', 'Dashboard::agreement_list/$1');
$routes->get('dashboard/agreement/assign/(:any)/(:any)', 'Dashboard::agreement_assign/$1/$2');
$routes->get('dashboard/agreement/create/(:any)', 'Dashboard::agreement_create/$1');
$routes->get('dashboard/agreement/view/(:any)', 'Dashboard::agreement_view/$1');
$routes->get('dashboard/agreement/delete/(:any)', 'Dashboard::agreement_del/$1');

$routes->post('dashboard/agreement/updatefield', 'Auth::updatefield');
$routes->post('dashboard/client/agreement', 'Auth::client_updatefield');