<?php

include 'autoloader.inc.php';

if(isset($_POST['addSymptoms'])){

    //$user_id=$_POST['user_id'];
    $user_id=1;
    $raw_description=$_POST['editor'];
    $description=substr($raw_description,3,-6);

    $controller=new Controller();
    $submission_id=$controller->addSubmission($user_id,$description);

    for($i = 0; $i < count($_FILES['images']); $i++)
    {

        $filename=$_FILES['images']['name'][$i];
        $type=strtolower(pathinfo($filename, PATHINFO_EXTENSION));
        $image=base64_encode(addslashes(file_get_contents($_FILES['images']['tmp_name'][$i])));
        
        if($controller->addImage($image,$type,$user_id,$submission_id)){
        }
        else{
            header("Location: ../add_symptoms.php?error");
	        exit();
        }

        
    }
    header("Location: ../add_symptoms.php?fine");
	    exit();
}
else{
    header("Location: ../add_symptoms.php?error");
	exit();
}