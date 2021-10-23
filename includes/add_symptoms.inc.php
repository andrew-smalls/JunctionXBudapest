<?php

include 'autoloader.inc.php';

if(isset($_POST['addSymptoms'])){

    //$user_id=$_POST['user_id'];
    $user_id=$_POST['uid'];
    $raw_description=$_POST['editor'];
    $description=substr($raw_description,3,-6);

    $controller=new Controller();
    $submission_id=$controller->addSubmission($user_id,$description);

    $len=count($_FILES['images']);

    if(!$_FILES['images']){
        for($i = 0; $i < $len; $i++)
        {

            $filename=$_FILES['images']['name'][$i];
            $type=strtolower(pathinfo($filename, PATHINFO_EXTENSION));
            $image=base64_encode(addslashes(file_get_contents($_FILES['images']['tmp_name'][$i])));
            
            if($controller->addImage($image,$type,$user_id,$submission_id)){
            }
            else{
                header("Location: ../add_symptoms.php?error=failed_to_send_images&len=".$len."");
                exit();
            }

            
        }
        header("Location: ../successful_submission.php?uid=".$user_id."");
        exit();
    }
    else{
        header("Location: ../successful_submission.php?uid=".$user_id."");
        exit();
    }
}
else{
    header("Location: ../add_symptoms.php?error=permission_denied");
	exit();
}