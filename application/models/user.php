<?php

	class User extends Model
	{
		
		public function select_all()
		{
			$this->query("SELECT * FROM users");	
		}
		
	}

?>