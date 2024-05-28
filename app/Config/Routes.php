<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Landingpage::index');

// auth
$routes->get('/login', 'Login::index');
$routes->post('/login', 'Login::get');
$routes->get('/logout', 'Logout::logout');
$routes->get('/registration', 'Registration::index');
$routes->post('/registration', 'Registration::create');


$routes->get('/dashboard', 'Dashboard::index', ['filter' => 'auth:admin,user,pic,ppc,worker']);
$routes->post('/countorder', 'Dashboard::getOrder', ['filter' => 'auth:admin,user,pic,ppc,worker']);
$routes->post('/countworker', 'Dashboard::getWorker', ['filter' => 'auth:admin,user,pic,ppc,worker']);
$routes->post('/countpekerjaan', 'Dashboard::getPekerjaan', ['filter' => 'auth:admin,user,pic,ppc,worker']);


$routes->get('/forbidden', 'Forbidden::index', ['filter' => 'auth:admin,user,pic,ppc,worker']);

$routes->get('/filestorage', 'Filestorage::index', ['filter' => 'auth:admin,user,pic,ppc,worker']);
$routes->get('/addfile', 'Addfile::index', ['filter' => 'auth:admin,user,pic,ppc,worker']);
$routes->post('/savefile', 'Addfile::save', ['filter' => 'auth:admin,pic']);
$routes->post('/deletefile-(:num)', 'Filestorage::delete/$1', ['filter' => 'auth:admin,pic']);
$routes->get('/editfilestorage-(:num)', 'EditFilestorage::index/$1', ['filter' => 'auth:admin,pic']);
$routes->post('/editfilestorage-(:num)', 'EditFilestorage::edit/$1', ['filter' => 'auth:admin,pic']);

$routes->get('/uploadfile', 'Uploadfile::index');
$routes->get('/editpage', 'Editpage::index');

$routes->get('/3dprint', 'print3D::index', ['filter' => 'auth:admin,user,pic,ppc,worker']);

$routes->get('/worker', 'Worker::index', ['filter' => 'auth:admin,user,pic,ppc,worker']);
$routes->post('/editprogress-(:num)', 'Worker::editprogress/$1', ['filter' => 'auth:admin,worker,pic']);


$routes->get('/manageaccount', 'Manageaccount::index', ['filter' => 'auth:admin']);
$routes->get('/addaccount', 'Addaccount::index', ['filter' => 'auth:admin']);
$routes->post('/addaccount', 'Addaccount::create', ['filter' => 'auth:admin']);
$routes->delete('/deleteaccount-(:num)', 'DeleteAccount::delete/$1', ['filter' => 'auth:admin']);
$routes->patch('/editProfile-(:num)', 'Profile::editProfile/$1', ['filter' => 'auth:admin']);
$routes->patch('/editAdditionalData-(:num)', 'Profile::editAdditionalData/$1', ['filter' => 'auth:admin,user,pic,ppc,worker']);
$routes->patch('/changePassword-(:num)', 'Profile::changePassword/$1', ['filter' => 'auth:admin,user,pic,ppc,worker']);
$routes->patch('/changePhoto-(:num)', 'Profile::changePhoto/$1', ['filter' => 'auth:admin,user,pic,ppc,worker']);
$routes->get('/profile-(:num)', 'Profile::index/$1', ['filter' => 'auth:admin,user,pic,ppc,worker']);

$routes->get('/orderlistpage', 'Orderlistpage::index', ['filter' => 'auth:admin,user,pic,ppc,worker']);
$routes->post('/editworker-(:num)', 'Orderlistpage::editworker/$1', ['filter' => 'auth:admin,pic']);
$routes->post('/mulai-(:num)', 'Orderlistpage::mulai/$1', ['filter' => 'auth:admin,pic']);
$routes->post('/stop-(:num)', 'Orderlistpage::stop/$1', ['filter' => 'auth:admin,pic']);
$routes->post('/backtobidd-(:num)', 'Orderlistpage::backToBidd/$1', ['filter' => 'auth:admin,pic']);

$routes->get('/biddinglistpage', 'Biddinglistpage::index', ['filter' => 'auth:admin,user,pic,ppc,worker']);
$routes->get('/addbidd', 'Spk::create', ['filter' => 'auth:admin,ppc,pic']);
$routes->post('/save-spk', 'Spk::save', ['filter' => 'auth:admin,ppc,pic']);
$routes->get('/editspk-(:num)', 'Editspk::index/$1', ['filter' => 'auth:admin,ppc,pic']);
$routes->post('/edit-spk-(:num)', 'Editspk::edit/$1', ['filter' => 'auth:admin,ppc,pic']);
$routes->delete('/delete-spk-(:num)', 'Editspk::delete/$1', ['filter' => 'auth:admin,ppc,pic']);
$routes->patch('/add-to-order-(:num)', 'Biddinglistpage::addToOrder/$1', ['filter' => 'auth:admin,pic']);

$routes->get('/donelistpage', 'Donelistpage::index', ['filter' => 'auth:admin,user,pic,ppc,worker']);

$routes->get('/onprogresslistpage', 'Onprogresslistpage::index');

$routes->post('/download-all-(:num)', 'DownloadFile::downloadAll/$1', ['filter' => 'auth:admin,user,pic,ppc,worker']);

$routes->delete('/orderlistpage/(:num)','Orderlistpage::delete/$1');
$routes->get('/(:num)', 'Editspk::index/$1');

$routes->get('/progressform', 'ProgressForm::index', ['filter' => 'auth:admin,user,pic,ppc,worker']);

$routes->get('/notification-all', 'Notification::getAll', ['filter' => 'auth:pic']);
$routes->post('/read-notification-all', 'Notification::readAll', ['filter' => 'auth:pic']);