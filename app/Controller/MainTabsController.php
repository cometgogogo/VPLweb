<?php
/**
 * Controller class for the test page.
 */
class MainTabsController extends AppController
{
	var $name = 'MainTabs';
	var $components = array('General');
	var $helpers = array('Html', 'Tab');

    function index()
    {
        $message = "This is a test of built-in web services";
        $this->set('message', $message);
    }


    /**
		 * Force this controller to pick up the appropriate style
		 */
		function beforeRender() {

			//session_start();
			$this->General->setCSS();
	}


}

?>