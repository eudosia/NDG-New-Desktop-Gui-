<?php
	
	//Prevent dirrect file access
	define('GUARD', true);

	require('config.php');
	require('account.php');
	
	
	//Create new account from Account class to verify account was submitted
	$account = new Account;
	
	//Clean up the form submission
	$username = (!empty($_POST['usernamePost']))?trim($_POST['usernamePost']):false;
	$password = (!empty($_POST['passwordPost']))?trim($_POST['passwordPost']):false;
				
	//Signin will be here
	$verify = $account->login($username,$password);
				
	if($verify) {
		//Login Successful
		echo "{'status': true,'url':'".TARGET."'}";
	} else {
		//Failed to login
		echo "{'status': false,}";
	}
				
	//Destroy 
	unset($account);
?>