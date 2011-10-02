<?php

/**
 * PacientController este desemnat managementului pacientilor
 *
 * @author Mihaela Birladeanu
 */
class PacientController extends Zend_Controller_Action
{
	protected $db;
	
	/**
	* Intrare in Layer-ul Pacienti Service
	* @var App_PacientiService
	*/
	protected $pacientService;
	
	public function preDispatch()
	{
		$this->session = new Zend_Session_Namespace('default');
		
		if(!$this->session->items)
			$this->session->items = array();
	}
	
    public function init()
    {
        $this->db = Zend_Registry::get('db');
        //$this->_helper->layout->disableLayout();
    }

    public function indexAction()
    {

    }

    /**
     * Profil pacient cu datele personale
     */
    public function profileAction()
    {
        // action body
    }

    /**
     * Lista cu toti pacientii inregistrati in sistem
     */
    public function listAllPacientsAction()
    {
        // action body
    }

    /**
     * New Action
     */
    public function newAction()
    {    	
        $this->view->form = new App_forms_pacientEditor(1);
      	
    }

    /**
     * Adauga examinare medicala (internare, vizita, externare, consult)
     */
    public function adaugaExaminareAction()
    {
        // action body
    }
}
