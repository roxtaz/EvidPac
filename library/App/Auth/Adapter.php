<?php

class App_Auth_Adapter implements Zend_Auth_Adapter_Interface
{
    protected $user;
    protected $pass;

    /**
     * Seteaza username si password pentru autentificare
     * 
     * @param string $username
     * @param string $password 
     * @return void
     */
    public function __construct($username, $password) {
        $this->user = $username;
        $this->pass = $password;
    }
    /**
     * Incearca sa efectueze autentificarea
     * 
     * @throws Zend_Auth_Adapter_Exception daca autentificarea nu poate fi efectuata
     * @return Zend_Auth_Result
     */
    public function authenticate()
    {
        
    }
}