<?php
/**
 * AutentificareController este controllerul desemnat autentificarii utilizatorilor
 *
 * @author Mihaela Birladeanu
 */
class AutentificareController extends Zend_Controller_Action
{
	/**
	* Intrare in Layer-ul User Service
	* @var App_UserService
	*/
	protected $userService;
	
	
    public function init() {
        /* Initialize action controller here */
        $this->_helper->layout->setLayout('admin');
    }
    
    public function preDispatch(){
        
    }

    public function indexAction()
    {
		$this->_forward('login');
	}
    
    /**
     * Afisare formular de login
     */
    public function loginAction(){
    
    }
    /**
     * Incerca sa efectueze autentificarea
     */
    public function identificareAction(){
        
    	if($this->getRequest()->isPost()){
    		$auth = new App_Auth_Authenticator();
    		if($auth->getCredentials($this->_getParam('username'),$this->_getParam('password')))
    		{
                // User autentificat
    			$this->_redirect('/');
    		}
    		else
    		{
                $this->_redirect('/autentificare/login');
    			echo "Utilizatorul <b>".$this->_getParam('username')."</b> cu parola <b>".$this->_getParam('password')."</b> a esuat autentificarea . ";
    		} 
    	}        
    }
}