<?php

class App_Auth_AdminLookup
{
	private static $admins = array(
			"admin" => "adm1n",
			"root" => "r00t"
	);
	
	public  static function findByUsername($username)
	{
		
		if(array_key_exists($username, self::$admins))
		{
			$account = new stdClass();
			$account->role = App_Roles::ADMIN;
			$account->username = $username;
			$account->password = self::$admins[$username];
			$account->description = "Administrator al sistemului EvidPac";
			return $account;
		}
		
		return false;
	}
}