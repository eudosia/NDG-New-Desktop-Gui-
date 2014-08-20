<?php

if (!defined('GUARD')) {
   die('I am sorry, you can not access this file directly.');
   exit;
} 

class Account
{		
	public function login($username,$password)
		{
			global $config;
			
			
			//Set default return value is false
			$return = false;
			
			
			//Connect to the Database
			$this->db = @mysql_connect($config['server'],$config['dbuser'],$config['dbpass']);
			
			//Can not connect? return false
			if(!$this->db) 
				return false;
							
			//Select Database table
			$opendb = @mysql_select_db($config['dbname'], $this->db);
			
			//Can not find or open table? Or something else ....Return false
			if(!$opendb) 
				return false;
							
			$sql = "SELECT * FROM ".$config['dbtable']." WHERE ";
			$sql .= "(username='".mysql_real_escape_string($username)."'";
			$sql .= " OR useremail='".mysql_real_escape_string($username)."')";
			$sql .= " AND userpassword = '".md5($password)."'";
			
			
			//Query table								
			$rs = @mysql_query($sql,$this->db);		
			
			//Can not query
			if(!$rs) return false;
			
			//If result value is number of rows
			if(mysql_num_rows($rs))
				$return = true;
			
			mysql_close($this->db);
			
			unset($rs,$sql);
			
			
			//Return to the value of $return aboe
			return $return;		
		}
}

?>