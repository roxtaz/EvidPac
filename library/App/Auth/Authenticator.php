<?php

class App_Auth_Authenticator
{
	protected $errorMessage;
	const ERR_NOT_FOUND = "Utilizatorul nu a fost găsit";
	const ERR_BAD_PASSWORD = "Parola dvs. este nevalida";

	public function getCredentials($username, $password)
	{
		$user = $this->validateUser($username, $password, 'App_Auth_UserLookup');
		if($user)
			return $user;
		
		$admin = $this->validateUser($username, $password, 'App_Auth_AdminLookup');
		if($admin)
			return $admin;
			
		// inseamna ca este GUEST (anonim)
		
		if(isset($this->errorMessage))
			return false;
		
		$this->errorMessage = self::ERR_NOT_FOUND;
		return false; 
	}
		
	private function validateUser($username, $password, $lookup)
	{
		$refClass = new ReflectionClass($lookup);
		$refMethod = $refClass->getMethod('findByUsername');
		
	
		$user = $refMethod->invoke(null,  $username);
		if($user)
		{
			//user autentificat
			if($user->password != $password)
			{
				$this->errorMessage = self::ERR_BAD_PASSWORD;
				return false;
			}
			
			// parola a fost validata
			return $user;
			
		}
		return false;
	}
	
	 public function getErrorMessage()
	{
		return $this->errorMessage;
	}
}