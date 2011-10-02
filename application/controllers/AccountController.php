<?php

/**
 * AccountController este controllerul desemnat contului de utilizator
 *
 * @author Mihaela Birladeanu
 */
class AccountController extends Zend_Controller_Action
{
    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }
    
    /**
     *  Proceseaza formularul contului
     */
    public function successAction()
    {
        // action body
    }

    /**
     * Afiseaza formularul pentru inscriere in aplicatie
     */
    public function newAction()
    {
        // action body
    }

    /**
     * Activeaza contul.
     * Folosit odata ce utilizatorul primeste un email de intampinare
     * si decide sa se autentifice folosind contul.
     */
    public function activateAction()
    {
        // action body
    }
}
?>
