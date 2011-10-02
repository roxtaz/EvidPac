<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
	/**
	 * DB initialization
	 */
	protected function _initDb()
	{
		$options = array(
			'host' 		=> 'localhost',
			'username'	=> 'isujis_evidpac',
			'password'	=> 'Birladeanu...',
			'dbname'	=> 'isujis_evidpac',
			'charset'	=> 'utf8'
		);
		$db = Zend_Db::factory('PDO_MYSQL',$options);
		Zend_Registry::set('db',$db);
		Zend_Db_Table_Abstract::setDefaultAdapter($db);
	}
	
	/**
	 * Action Helpers
	 */
	protected function _initActionHelpers()
	{
		$writer = new Zend_Log_Writer_Firebug();
		$logger = new Zend_Log($writer);
		Zend_Registry::set('logger',$logger);
	}
	
	/**
	 * View Helpers
	 */
	protected function _initViewHelpers()
	{
		$this->bootstrap('layout');
		
		$layout = $this->getResource('layout');
		
		$view = $layout->getView();
		$view->doctype('HTML5');
		$view->headTitle('EvidPac')
			 ->setSeparator(' | ');
		$view->headMeta()->appendHttpEquiv('Content-Type','text/html; charset=UTF-8');
		$view->headMeta()->appendHttpEquiv('Content-Language','ro');
		$view->headLink()->appendStylesheet('/css/blueprint/src/reset.css','screen,projection');
		$view->headLink()->appendStylesheet('/css/blueprint/screen.css', 'screen,projection');
		$view->headLink()->appendStylesheet('/css/blueprint/print.css','print');
		//$view->headLink()->appendStylesheet('/css/blueprint/src/grid.css','screen,projection');
		//$view->headLink()->appendStylesheet('/css/blueprint/src/typography.css','screen,projection');
		$view->headLink()->appendStylesheet('/css/blueprint/plugins/fancy-type/screen.css','screen,projection');
		$view->headLink()->appendStylesheet('/css/dropdown.css');
		$view->headLink()->appendStylesheet('/css/blueprint/ie.css','screen,projection',true);
		$view->headLink()->appendStylesheet('/css/style.css','screen,projection');
		$view->headScript()->appendFile('/js/html5.js','text/javascript',array('conditional' => 'IE'));
		$view->headScript()->appendFile('/js/jquery-1.6.4.min.js','text/javascript');
		$view->headScript()->appendFile('/js/modernizr.2.full.min.js','text/javascript');
		$view->headScript()->appendFile('/js/jQuery.dPassword.js','text/javascript');
		$view->headScript()->appendFile('/js/app.js','text/javascript');
		
		$view->addHelperPath('App/View/Helper', 'App_View_Helper');
		Zend_Controller_Action_HelperBroker::addPrefix('App_View_Helper');		
	}
	
	/**
	 * Navigation
	 */
	protected function _initNavigation()
	{
		$this->bootstrap('layout');
		
		$layout = $this->getResource('layout');
		
		$view = $layout->getView();
		
		$config = new Zend_Config_Xml(APPLICATION_PATH . '/configs/navigation.xml','nav');
		
		$navigation = new Zend_Navigation($config);
		$view->navigation($navigation);
		
	}
	
	/**
	 *
	 */
    protected function _initRequest()
    {
        // Ensure the front controller is initialized
        $this->bootstrap('FrontController');
 
        // Retrieve the front controller from the bootstrap registry
        $front = $this->getResource('FrontController');

        $request = new Zend_Controller_Request_Http();
        $request->setBaseUrl('/');
        $front->setRequest($request);
 
        // Ensure the request is stored in the bootstrap registry
        return $request;
    }
    
    protected function _initRoutes()
    {
    	// Ensure the front controller is initialized
        
        $this->bootstrap('FrontController');
 
        // Retrieve the front controller from the bootstrap registry
        $frontController = $this->getResource('FrontController');
				$router = $frontController->getRouter();
				$router->addRoute('crud',
					new Zend_Controller_Router_Route('/utilizator/:action/:uid',array('controller'=>'utilizator'))
				);
				//$autentificare = new Zend_Controller_Router_Route_Static('autentificare', 
				//	array('controller'=> 'autentificare', 'action' => 'login'));
				//$router->addRoute('login', $autentificare );
		
    }

}

