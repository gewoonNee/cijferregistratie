<?php

	class Template
	{
	
		//Fields
		protected $_variables = array();
		protected $_controller;
		protected $_action;
		
		//Properties
		public function set($name, $value)
		{
			$this->_variables[$name] = $value;	
		}
		
		//Constructor
		public function __construct($controller, $action)
		{
			$this->_controller = $controller;
			$this->_action = $action;
		}
		
		public function render()
		{
			extract($this->_variables);
			if (file_exists(ROOT.DS.'application'.DS.'views'.DS.$this->_controller.DS.'header.php'))
			{
				include (ROOT.DS.'application'.DS.'views'.DS.$this->_controller.DS.'header.php');
			}
			
			else
			{
				include (ROOT.DS.'application'.DS.'views'.DS.'header.php');
			}
			
			
			if(file_exists(ROOT.DS.'application'.DS.'views'.DS.$this->_controller.DS.$this->_action.'.php'))
			{
				include(ROOT.DS.'application'.DS.'views'.DS.$this->_controller.DS.$this->_action.'.php');
			}
			
			else
			{
				 for($i = 0; $i < 19; $i++)
				{
					echo "<marquee><img src='\markregistration\img\ijsbeerBovenkant2.png' />&nbsp;&nbsp;
					<font size='6' color='red'>ERROR</font>&nbsp;
					<img src='\markregistration\public\img\ijsbeerBovenkant2.png' /></marquee>";
					
				}
			}
			
			
			if (file_exists(ROOT.DS.'application'.DS.'views'.DS.$this->_controller.DS.'footer.php'))
			{
				include (ROOT.DS.'application'.DS.'views'.DS.$this->_controller.DS.'footer.php');
			}
			
			else
			{
				include (ROOT.DS.'application'.DS.'views'.DS.'footer.php');
			}
		}
		
	}

?>