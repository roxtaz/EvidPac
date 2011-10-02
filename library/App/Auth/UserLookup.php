<?php

class App_Auth_UserLookup
{
	private static $users = array(
			"mihaela" => "pass",
			"marian" => "test",
			"robi" => "theo",
			"theo" => "robi"
	);
	
	public  static function findByUsername($username)
	{
		if(array_key_exists($username, self::$users))
		{
			$account = new stdClass();
			$account->role = App_Roles::USER;
			$account->username = $username;
			$account->password = self::$users[$username];
			$account->description = "Utilizator al sistemului EvidPac";
			return $account;
		}
		
		return false;
	}
}