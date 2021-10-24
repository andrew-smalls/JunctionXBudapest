<?php


include 'autoloader.inc.php';

if(isset($_POST['keywordButton'])){

    $keyword=$_POST['keyword'];
    $uid = $_GET['uid'];

    if(empty($keyword) || empty($uid))
    {
		header("Location: ..symptoms_doctorPOV.php?error=emptyfields&uid=$uid");
		exit();
	}

    header("Location: ../symptoms_doctorPOV.php&uid=$uid");
	exit();
}
else{
    header("Location: ../symptoms_doctorPOV.php&uid=$uid");
	exit();
}