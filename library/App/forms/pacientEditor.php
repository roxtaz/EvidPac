<?php
/**
 * Genereaza formularul ptr pacienti prin pacientEditor
 *
 * @author Mihaela Birladeanu
 */
 class App_forms_pacientEditor extends Zend_Form
 {
 
 	public function __construct($pacientId)
 	{
 		$this->name = new Zend_Form_Element_Text('name');
 		$this->name->setLabel("nume pacient:")
 					->setRequired(true)
 					->addValidator('alnum')
 					->addValidator('regex', false, array('/^[a-z]/i'))
 					->addFilter('StringToLower');
 					
 		$this->surname = new Zend_Form_Element_Text('surname');
 		$this->surname->setLabel("prenume pacient:")
 					->setRequired(true);
 					
 		$this->pid = new Zend_Form_Element_Hidden('pid');
 		$this->pid->setValue($pacientId);
 		
 		$this->descriere = new Zend_Form_Element('foo', array(
 			'label'		=> 'Foo',
 			'belongsTo'	=> 'bar',
 			'value'		=> 'Text demonstrativ',
 			'class'		=> 'span-15',
 			'prefixPath'=> array('decorator' => array(
 				'My_Decorator' => 'My/Decorator',
 			)),
 		));
 		
 		$this->submit = new Zend_Form_Element_Submit('adauga');

		$this->addElements(array(
			$this->name,
			$this->surname,
			$this->pid
		));
		
		$this->setDecorators(array(
			'FormElements',
				array('HtmlTag', array('tag' => 'dl')),
			'Form'
		)); 	
 	}
 
 }