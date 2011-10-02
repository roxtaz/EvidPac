<?php

/**
 * ErrorController
 * 
 */
class ErrorController extends Zend_Controller_Action
{
	protected $logger;
	
    public function init()
    {
        $this->logger = Zend_Registry::get('logger');
    }
    
    public function errorAction()
    {
    	$this->_helper->viewRenderer->setViewSuffix('phtml');
    	
        $errors = $this->_getParam('error_handler');
        
        switch ($errors->type) {
            case Zend_Controller_Plugin_ErrorHandler::EXCEPTION_NO_ROUTE:
            case Zend_Controller_Plugin_ErrorHandler::EXCEPTION_NO_CONTROLLER:
            case Zend_Controller_Plugin_ErrorHandler::EXCEPTION_NO_ACTION:
        
                // 404 error -- controller or action not found
                $this->getResponse()->setHttpResponseCode(404);
                $this->view->message = 'Page not found';
                //$this->logger->log($this->view->message);
                break;
            default:
                // application error
                $this->getResponse()->setHttpResponseCode(500);
                $this->view->message = 'Application error';
                //$this->logger->log($this->view->message);
        }
        $this->view->env = $this->getInvokeArg('env');
        $this->view->exception = $errors->exception;
        
        
        // Log exception, if logger available
        $log = $this->getLog();
        if ($log) {
            $log->crit($this->view->message, $errors->exception);
        }
        
        // conditionally display exceptions
        if ($this->getInvokeArg('displayExceptions') == true) {
            $this->view->exception = $errors->exception;
        }
        $this->view->request = $errors->request;
    }

    public function getLog()
    {
        $bootstrap = $this->getInvokeArg('bootstrap');
        if (!$bootstrap->hasPluginResource('Log')) {
            return false;
        }
        $log = $bootstrap->getResource('Log');
        return $log;
    }


}

