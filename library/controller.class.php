<?php

	class Controller
	{
		//Fields
		protected $_model;
		protected $_controller;
		protected $_action;
		protected $_template;
		
		//Properties
		public function set($name, $value)
		{
			$this->_template->set($name, $value);
		}
			
		//Constructor
		public function __construct($model, $controller, $action)
		{
			$this->_model = new $model();
			$this->_controller = $controller;
			$this->_action = $action;
			$this->_template = new Template($controller, $action);
		}
		
		//Destructor
		public function __destruct()
		{
			$this->_template->render();	
		}
	}

?>