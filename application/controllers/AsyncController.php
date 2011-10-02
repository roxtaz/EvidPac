<?php

class AsyncController extends Zend_Controller_Action
{
	public function init()
	{
		$this->_helper->viewRenderer->setNoRender();
		$this->_helper->getHelper('layout')->disableLayout();
	}
	
	public function preDispatch()
	{
	
	}
	
	public function getnoticeAction()
	{
		print $this->view->notice('Hello');
	}
}