<?php
/**
 * UtilizatorController este controllerul desemnat contului de utilizator
 *
 * @author Mihaela Birladeanu
 */
class UtilizatorController extends Zend_Controller_Action
{
	/**
	* Intrare in Layer-ul User Service
	* @var App_UserService
	*/
	protected $userService;
	
	
    public function init()
    {
        /* Initialize action controller here */
    }
    
    public function preDispatch(){
    	$this->userService = new App_UserService();
    }

    public function indexAction()
    {
		
		}
    
    
	public function updateAction()
	{
		if($this->getRequest()->isPost())
		{
			$this->userService->SaveUser(
				$this->_getParam('uid'),
				$this->_getParam('nume'),
				$this->_getParam('email')
			);
			$this->_redirect('utilizator');
		}
		else
			$this->view->user = $this->userService->GetUser($this->_getParam('uid'))->current();
	}
	
	public function deleteAction()
	{
		$this->userService->DeleteUser($this->_getParam('uid'));
		$this->_redirect('utilizator');
	
	}
    
    /**
     *  Afiseaza profilul utilizatorului
     */
    public function profileAction()
    {
        // TODO De afisat profilul utilizatorului autentificat curent 
    }

    /**
     * Afiseaza mesajele primite prin intermediul aplicatiei
     * si permite adaugarea unui mesaj in sistem
     */
    public function mesajeAction()
    {
        // action body
    }

    /**
     * Proceseaza mesajul de transmis in sistem unui utilizator/ grup de utilizatori
     */
    public function setMessageAction()
    {
        // action body
    }
    
    public function adminAction()
    {
    	//partea de administrare
    	if($this->getRequest()->isPost())
		{
			$this->userService->CreateUser($this->_getParam('nume'),$this->_getParam('email'));
		}
		
		$rowset = $this->userService->GetAllUsers();
		$this->view->users = $rowset->toArray();

    }
}
?>
