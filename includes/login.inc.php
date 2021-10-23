<?php


include 'autoloader.inc.php';

if(isset($_POST['login'])){

	
	$email=$_POST['email'];
	$password=$_POST['password'];
	
	if(empty($email) || empty($password)){
		header("Location: ../login.php?error=emptyfields&uid=".$email."");
		exit();
	}
	
	$controller=new Controller();
    $user_id=$controller->confirmIdentity($email,$password);

	
    if($user_id){

		$user=$controller->getUserById($user_id);
		if($user['type']==2){
			header("Location: ../index.php?uid=".$user_id."");
			exit();
		}
		else{
        	header("Location: ../patient_home.php?uid=".$user_id."");
			exit();
		}
    }
    else{
        
        header("Location: ../login.php?error=wrong_credentials");
        exit();
        
    }
}
else{
	header("Location: ../login.php?error=permission_denied");
	exit();
}