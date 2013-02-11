<?php

	function callHook()
	{
		global $url;
		$urlArray = explode('/', $url);
			
		$controller = $urlArray[0];
		array_shift($urlArray);
				
		$action = $urlArray[0];
		array_shift($urlArray);
		
		$queryString = $urlArray;
		
		$controllerName = $controller;
		$controller = ucwords($controller);
		
		$model = rtrim($controller, 's');
		
		$controller .= 'controller';
		
		$dispatch = new $controller($model, $controllerName, $action);
				
		//var_dump($urlArray);
		
		if(method_exists($controller, $action))
		{
			call_user_func_array(array($dispatch, $action), $queryString);
		}
		
		else
		{
			echo "ERROR";	
		}
		
	}
	
	function __autoload($classname)
	{
		if (file_exists(ROOT.DS.'library'.DS.strtolower($classname).'.class.php'))
		{
			require_once(ROOT.DS.'library'.DS.strtolower($classname).'.class.php');	
		}
		
		elseif (file_exists(ROOT.DS.'application'.DS.'controllers'.DS.strtolower($classname).'.php'))
		{
			require_once(ROOT.DS.'application'.DS.'controllers'.DS.strtolower($classname).'.php');
		}
		
		elseif (file_exists(ROOT.DS.'application'.DS.'models'.DS.strtolower($classname).'.php'))
		{
			require_once(ROOT.DS.'application'.DS.'models'.DS.strtolower($classname).'.php');
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
		
	}
	
	callHook();

?>