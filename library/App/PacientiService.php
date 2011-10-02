<?php

require_once APPLICATION_PATH.'/models/PacientiTable.php';

class App_PacientiService
{
	
	protected $db;
	
	/*
	 * pacienti Zend Table
	 * 
	 * @var PacientiTable
	 */
	protected $pacienti;
	
	function __construct() {
		$this->db = Zend_Registry::get('db');
		Zend_Db_Table_Abstract::setDefaultAdapter($this->db);

		$this->pacienti = new PacientiTable();
	}
	
	public function CreatePacient($uid, $nume,$prenume,$cnp,$domiciliu,$data_adaugarii,$data_actualizarii){
		$params = array(
			'uid'  => $uid,
			'nume' => $nume,
			'prenume'=> $prenume,
			'cnp'	 => $cnp,
			'domiciliu' => $domiciliu,
			'data_adaugarii'	=> time(),
			'data_actualizarii' => time()
		);
		$this->pacienti->insert($params);
	}
	
	public function SavePacient($uid,$nume,$prenume,$cnp, $data_actualizarii)
	{
		$params = array(
			'pid' =>$pid,
			'uid'  =>$uid,
			'nume' => $nume,
			'prenume'=> $prenume,
			'cnp'  => $cnp,
			'data_actualizarii' => time()
		);
		$where = $this->pacienti->getAdapter()->quoteInto("pid = $pid");
		var_dump($where);
		$this->pacienti->update($params,$where);
	}
	
	private function getWhereClauseForPacientId($pid)
	{
		return $this->pacienti->getAdapter()->quoteInto("pid = $pid");
	}
	
	public function DeletePacient($pid)
	{
		$this->pacienti->delete($this->getWhereClauseForPacientId($pid));
	}
	
	public function GetPacient($pid)
	{
		$row = $this->pacienti->find($pid);
		return $row;
	}
	
	public function GetAllPacienti()
	{
		$select = $this->pacienti->select();
		$select->order('pid');	
		return $this->pacienti->fetchAll($select);
	}
}

?>