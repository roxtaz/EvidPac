<?php

require_once APPLICATION_PATH.'/models/UsersTable.php';

class App_UserService
{
	
	protected $db;
	
	/*
	 * users Zend Table
	 * 
	 * @var UsersTable
	 */
	protected $users;
	
	function __construct() {
		$this->db = Zend_Registry::get('db');
		Zend_Db_Table_Abstract::setDefaultAdapter($this->db);

		$this->users = new UsersTable();
	}
	
	public function CreateUser($nume, $email){
		$params = array(
			'nume' => $nume,
			'email'=> $email
		);
		$this->users->insert($params);
	}
	
	public function SaveUser($uid,$nume,$email)
	{
		$params = array(
			'nume' => $nume,
			'email'=> $email
		);
		var_dump($this->getWhereClauseForUserId($uid));
		$this->users->update($params,$this->getWhereClauseForUserId($uid));
	}
	
	public function DeleteUser($uid)
	{
		$this->users->delete($this->getWhereClauseForUserId($uid));
	}
	
	private function getWhereClauseForUserId($uid)
	{
		return $this->users->getAdapter()->quoteInto("uid = ?",$uid);
	}
	
	public function GetUser($uid)
	{
		$row = $this->users->find($uid);
		return $row;
	}
	
	public function GetAllUsers()
	{
		$select = $this->users->select();
		$select->order('uid');	
		return $this->users->fetchAll($select);
	}
	
	
}

?>