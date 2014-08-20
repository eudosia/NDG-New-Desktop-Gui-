<?php

	if (!defined('GUARD')) {
   		die('I am sorry, you can not access this file directly.');
   		exit;
	} 

	define('TARGET',	'http://aext.net/2009/09/learning-jquery-submit-form-php-mac-style-modal-window');		//@ redirection target on success

	$config = array(
				'server'		=>	'localhost',	//Enter your server information
				'dbuser'		=>	'root',									//Mysql username
				'dbpass'		=>	'',									//Mysql password
				'dbname'		=>	'tutorial',									//Database name
				'dbtable'		=>	'tbl_user'									//Table name
	);
?>