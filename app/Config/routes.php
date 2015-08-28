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
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
	//Router::connect('/', array('controller' => 'pages', 'action' => 'display', 'home'));
	Router::connect('/', array('controller' => 'home', 'action' => 'view'));
/**
 * ...and connect the rest of 'Pages' controller's URLs.
 */
	Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));

/**
 * Then we connect urls to all defined controllers.
 */
	Router::connect('/accounts/*', array('controller' => 'accounts', 'action' => 'login'));
	Router::connect('/administration_inquiries/*', array('controller' => 'administration_inquiries', 'action' => 'add'));
	//Router::connect('/asian_heritage/*', array('controller' => 'asian_heritage', 'action' => 'index'));
	Router::connect('/awards', array('controller' => 'awards', 'action' => 'index'));
	Router::connect('/awards/:action/*', array('controller' => 'awards', 'action' => 'view'));
	Router::connect('/bestsellers', array('controller' => 'bestsellers', 'action' => 'index'));
	Router::connect('/bestsellers/:action/*', array('controller' => 'bestsellers', 'action' => 'view'));
	Router::connect('/black_heritage', array('controller' => 'black_heritage', 'action' => 'index'));
	Router::connect('/books_for_book_clubs', array('controller' => 'books_for_book_clubs', 'action' => 'index'));
	Router::connect('/book_for_book_club_reservations/*', array('controller' => 'book_for_book_club_reservations', 'action' => 'add'));
	Router::connect('/book_for_book_club_registrations/*', array('controller' => 'book_for_book_club_registrations', 'action' => 'add'));
	Router::connect('/business', array('controller' => 'business', 'action' => 'index'));
	Router::connect('/business#workshop', array('controller' => 'business', 'action' => 'index'));
	Router::connect('/career', array('controller' => 'career', 'action' => 'index'));
	//Router::connect('/categories/*', array('controller' => 'categories', 'action' => 'index'));
	Router::connect('/databases', array('controller' => 'databases', 'action' => 'index'));
	Router::connect('/databases/:action/*', array('controller' => 'databases', 'action' => 'view'));
	Router::connect('/elibrarian_inquiries/*', array('controller' => 'elibrarian_inquiries', 'action' => 'add'));
	Router::connect('/evergreen_votes/*', array('controller' => 'evergreen_votes', 'action' => 'index','stats_report'));
	Router::connect('/email_librarian/*', array('controller' => 'email_librarian', 'action' => 'add'));
	Router::connect('/email_notification_requests/*', array('controller' => 'email_notification_requests', 'action' => 'add'));
	Router::connect('/events_calendars/*', array('controller' => 'events_calendars', 'action' => 'index'));
	Router::connect('/feedback/*', array('controller' => 'feedbacks', 'action' => 'add'));
	Router::connect('/fiftyfiveplus/*', array('controller' => 'fiftyfiveplus', 'action' => 'index'));
	Router::connect('/government_community', array('controller' => 'government_community', 'action' => 'index'));
	Router::connect('/health', array('controller' => 'health', 'action' => 'index'));
	Router::connect('/jobs/*', array('controller' => 'jobs', 'action' => 'index'));
	Router::connect('/just_returned/*', array('controller' => 'just_returned', 'action' => 'index'));
	Router::connect('/libraries', array('controller' => 'libraries', 'action' => 'index'));
	Router::connect('/libraries/:action/*', array('controller' => 'libraries', 'action' => 'view'));
	Router::connect('/library_features/*', array('controller' => 'library_features', 'action' => 'index'));
	Router::connect('/library_notification_requests/*', array('controller' => 'library_notification_requests', 'action' => 'add'));
	Router::connect('/library_services', array('controller' => 'library_services', 'action' => 'index'));
	//Router::connect('/links/*', array('controller' => 'links', 'action' => 'index'));
	Router::connect('/local_studies', array('controller' => 'local_studies', 'action' => 'index'));
	Router::connect('/maker_reservation/', array('controller' => 'maker_reservation', 'action' => 'add'));
	Router::connect('/membership_applications/*', array('controller' => 'membership_applications', 'action' => 'add'));
	Router::connect('/multilingual/*', array('controller' => 'multilinguals', 'action' => 'add'));
	Router::connect('/new_arrivals/*', array('controller' => 'new_arrivals', 'action' => 'index'));
	Router::connect('/newcomers/*', array('controller' => 'newcomers', 'action' => 'index'));
	Router::connect('/newsletters/*', array('controller' => 'newsletters', 'action' => 'subscribe'));
	Router::connect('/next_reads/', array('controller' => 'next_reads', 'action' => 'add'));
	Router::connect('/proctor/*', array('controller' => 'proctors', 'action' => 'add'));
	Router::connect('/programs/*', array('controller' => 'programs', 'action' => 'index'));
	Router::connect('/reviews/*', array('controller' => 'reviews', 'action' => 'index'));
	Router::connect('/sixtyfiveplus', array('controller' => 'sixtyfiveplus', 'action' => 'index'));
	Router::connect('/today_events/*', array('controller' => 'today_events', 'action' => 'view'));
	Router::connect('/volunteers', array('controller' => 'volunteers', 'action' => 'index'));
	Router::connect('/votes/*', array('controller' => 'votes', 'action' => 'add'));



/**
 * Then we connect urls to all main sections of the site.
 */
	Router::connect('/about', array('controller' => 'pages', 'action' => 'index', 'about'));
	Router::connect('/blogs', array('controller' => 'pages', 'action' => 'display', 'blogs'));
	Router::connect('/community', array('controller' => 'pages', 'action' => 'index', 'community'));
	Router::connect('/contact', array('controller' => 'pages', 'action' => 'index', 'contact'));
	Router::connect('/materials', array('controller' => 'pages', 'action' => 'index', 'materials'));
	Router::connect('/materials/collections', array('controller' => 'pages', 'action' => 'index', 'materials/collections'));
	Router::connect('/news_and_events', array('controller' => 'pages', 'action' => 'index', 'news_and_events'));
	Router::connect('/participate', array('controller' => 'pages', 'action' => 'index', 'participate'));
	Router::connect('/services', array('controller' => 'pages', 'action' => 'index', 'services'));




/**
 * Lastly we connect /page to the pages folder. This is to avoid seeing "pages/" in the url.
 */
	Router::connect('/*', array('controller' => 'pages', 'action' => 'display'));



/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
	//require CAKE . 'Config' . DS . 'routes.php';
require CAKE . 'Config/routes.php';