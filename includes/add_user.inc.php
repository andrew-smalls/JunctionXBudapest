<?php

include 'autoloader.inc.php';



if(isset($_POST['addUser'])){

    $first_name=$_POST['first_name'];
    $email=$_POST['email'];

    $controller=new Controller();
    $controller->addUser($first_name,$email);

    header("Location: ../add_user.php?uid=".$first_name."");
	exit();
}
else{
    header("Location: ../add_user.php?error");
	exit();
}