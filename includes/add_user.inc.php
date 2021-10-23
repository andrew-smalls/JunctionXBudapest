<?php

include 'autoloader.inc.php';



if(isset($_POST['addUser'])){

    $first_name=$_POST['first_name'];
    $email=$_POST['email'];
    $password="default";
    $type=$_POST['type'];
    $cancer_type=$_POST['cancer_type'];
    $address=$_POST['address'];

    if(empty($first_name) || empty($email) || empty($password) || empty($type)){
		header("Location: ../login.php?error=emptyfields&uid=".$username."");
		exit();
	}

    $controller=new Controller();
    if($controller->addUser($first_name,$email,$password,$type,$cancer_type,$address)){
        header("Location: ../add_user.php?uid=".$first_name."");
	    exit();
    }
    else{
        header("Location: ../add_user.php?error1");
	    exit();
    }

    header("Location: ../add_user.php?uid=".$first_name."");
	exit();
}
else{
    header("Location: ../add_user.php?error2");
	exit();
}