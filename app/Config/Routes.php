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
$routes->setDefaultController('Publiccontroller');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Publiccontroller::index');
$routes->get('/auth', 'AuthController::index');
$routes->post('/auth', 'AuthController::index');
$routes->get('/logout', 'AuthController::logout');

$routes->get('/portfolio-details/(:any)', 'Publiccontroller::portfolio_details/$1');

$routes->get('/blog-details/(:any)', 'Publiccontroller::blog_details/$1');
$routes->post('/blog-details/(:any)', 'Publiccontroller::blog_details/$1');
$routes->get('/blog', 'Publiccontroller::blog');
$routes->get('/blog/(:any)', 'Publiccontroller::blog/$1');


// ========== ADMIN ACCESS ONLY ==========

$routes->group("", ['filter'=>'agentProtector'], function($routes){

// dashboard home 
$routes->get('/dashboard/', 'Dashboard::index');

// portfolio routes 
$routes->get('/dashboard/portfolio', 'PortfolioController::index');
$routes->post('/dashboard/portfolio', 'PortfolioController::index');
$routes->get('/dashboard/edit/portfolio/(:any)', 'PortfolioController::edit/$1');
$routes->post('/dashboard/edit/portfolio/(:any)', 'PortfolioController::edit/$1');


// category routes 
$routes->get('/dashboard/category', 'CategoryController::index');
$routes->post('/dashboard/category', 'CategoryController::index');

// blog routes
$routes->get('/dashboard/blog', 'BlogController::index');
$routes->post('/dashboard/blog', 'BlogController::index');
$routes->get('/dashboard/edit/blog/(:any)', 'BlogController::edit/$1');
$routes->post('/dashboard/edit/blog/(:any)', 'BlogController::edit/$1');


// team members routes
$routes->get('/dashboard/team', 'TeamMemberController::index');
$routes->post('/dashboard/team', 'TeamMemberController::index');
$routes->get('/dashboard/edit/team/(:any)', 'TeamMemberController::edit/$1');
$routes->post('/dashboard/edit/team/(:any)', 'TeamMemberController::edit/$1');


// services routes
$routes->get('/dashboard/services', 'ServicesController::index');
$routes->post('/dashboard/services', 'ServicesController::index');
$routes->get('/dashboard/edit/services/(:any)', 'ServicesController::edit/$1');
$routes->post('/dashboard/edit/services/(:any)', 'ServicesController::edit/$1');

// testimonials routes
$routes->get('/dashboard/testimonials', 'TestimonialsController::index');
$routes->post('/dashboard/testimonials', 'TestimonialsController::index');
$routes->get('/dashboard/edit/testimonials/(:any)', 'TestimonialsController::edit/$1');
$routes->post('/dashboard/edit/testimonials/(:any)', 'TestimonialsController::edit/$1');

// faq routes
$routes->get('/dashboard/faq', 'FaqController::index');
$routes->post('/dashboard/faq', 'FaqController::index');
$routes->get('/dashboard/edit/faq/(:any)', 'FaqController::edit/$1');
$routes->post('/dashboard/edit/faq/(:any)', 'FaqController::edit/$1');


// =============== CLUB MANAGEMENT ==============
//membership routes

// club membership controllers 
$routes->get('/dashboard/membership', 'ClubMembershipController::index');
$routes->post('/dashboard/membership', 'ClubMembershipController::index');
$routes->get('/dashboard/profile/membership/(:any)', 'ClubMembershipController::profile/$1');
$routes->post('/dashboard/profile/membership/(:any)', 'ClubMembershipController::profile/$1');
$routes->post('/dashboard/approve/membership/(:any)', 'ClubMembershipController::approve_mem_acc/$1');
$routes->get('/dashboard/delete/membership/(:any)', 'ClubMembershipController::delete/$1');



// loan  member manager controllers 
$routes->get('/dashboard/loan_membership', 'LoanApplicantController::index');
$routes->post('/dashboard/loan_membership', 'LoanApplicantController::index');
$routes->get('/dashboard/loanmanager/view_profile/(:any)', 'LoanApplicantController::view_profile/$1');
$routes->post('/dashboard/loanmanager/approve/(:any)', 'LoanApplicantController::approved_loan_applicants/$1');
$routes->post('/dashboard/loanmanager/update_status/(:any)', 'LoanApplicantController::update_applicant_status/$1');
$routes->get('/dashboard/delete/loanmanager/(:any)', 'LoanApplicantController::delete/$1');


// saving & editing a lone record 
$routes->get('/dashboard/loan_payments', 'LoanPaymentController::index');
$routes->post('/dashboard/loan_payments', 'LoanPaymentController::index');
$routes->get('/dashboard/edit/log_loan_payment/(:any)', 'LoanPaymentController::edit/$1');
$routes->post('/dashboard/edit/log_loan_payment/(:any)', 'LoanPaymentController::edit/$1');
$routes->get('/dashboard/approve/log_loan_payment/(:any)', 'LoanPaymentController::approve/$1');
$routes->get('/dashboard/delete/log_loan_payment/(:any)', 'LoanPaymentController::delete/$1');

// due payment manager controllers 
$routes->get('/dashboard/club_due_management', 'DueController::index');
$routes->post('/dashboard/club_due_management', 'DueController::index');
$routes->get('/dashboard/edit/club_due_management/(:any)', 'DueController::edit/$1');
$routes->post('/dashboard/edit/club_due_management/(:any)', 'DueController::edit/$1');
$routes->get('/dashboard/delete/club_due_management/(:any)', 'DueController::delete/$1');
$routes->get('/dashboard/approve/club_due_management/(:any)', 'DueController::approve_payment/$1');

$routes->get('/category/(:any)', 'Publiccontroller::category_search/$1');

//4212935681 

});
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
