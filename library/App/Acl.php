<?php

class App_Acl extends Zend_Acl
{
	public function __construct()
	{
		//resources
		$this->add(new Zend_Acl_Resource(App_Resource::PUBLICPAGE));
		$this->add(new Zend_Acl_Resource(App_Resource::USERACCOUNT));
		$this->add(new Zend_Acl_Resource(App_Resource::ADMINACCOUNT));
		
		//roles
		$this->addRole(new Zend_Acl_Role(App_Roles::GUEST));
		$this->addRole(new Zend_Acl_Role(App_Roles::USER), App_Roles::GUEST);
		$this->addRole(new Zend_Acl_Role(App_Roles::ADMIN),App_Roles::USER);
		
		//permissions
		$this->allow(App_Roles::GUEST, App_resources::PUBLICPAGE);
		$this->allow(App_Roles::USER, App_resources::USERACCOUNT);
		$this->allow(App_Roles::ADMIN, App_resources::ADMINACCOUNT);
	}
}