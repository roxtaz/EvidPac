<?php
/**
 * Description of Notice
 *
 * @author Mihaela Birladeanu
 */
class App_View_Helper_Notice extends Zend_View_Helper_Abstract
{
	public $messages = array();

	//FFCCEE
	public $startColour = 16764142;
	
	public function notice($message)
	{
		$this->messages[] = $message;
	

		$this->startColour -= 6000;
		
		$o = "<div style='background: #".dechex($this->startColour).";font-weight: bold;padding: 3px;border: 3px solid #".dechex($this->startColour - 4000).";text-align:center;' >";

		foreach ($this->messages as $msg)
			$o .= $msg . " ";

		return $o .= "</div>";
		
	}
}