<?php
include 'autoloader.inc.php';
include '../header.html';  

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

$uploadOk = 1;
$fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

$patientName = $_GET['patientName'];
$doctorName = $_GET['doctorName'];

if(isset($_POST["submit"])) 
{
  $filename = $_FILES['fileToUpload']['name'];
  $file = $_FILES['fileToUpload']['tmp_name'];

  $fileSize = $_FILES['fileToUpload']['size'];
  $fileSizeInMB = ($fileSize)/(1024*1024);
  if($fileSizeInMB > 5)
  {
     echo "File is not ok";
     $uploadOk = 0;
  }

  $info = pathinfo($_FILES['fileToUpload']['tmp_name']);
  $ext = $info['extension']; // get the extension of the file
  $newname = "newname.".$ext; 
  $target = '../uploads/'.$newname;
  move_uploaded_file( $_FILES['fileToUpload']['tmp_name'], $target);
}

if($fileType != "docx" && $fileType != "doc" && $fileType != "pdf") 
  {
    echo "Sorry, only docx, doc, pdf are allowed.";
    $uploadOk = 0;
  }

if ($uploadOk == 0) 
{
    echo "Sorry, your file was not uploaded.";
} 
/*
else 
{
      $controller=new Controller();
      if($controller->uploadTreatmentSummary($patientName, $doctorName, $_FILES['fileToUpload']['name']))
      {
        header("Location: ../symptoms_doctorPOV.php?uid=".$doctorName."");
        exit();
      }
      else{
          header("Location: ../symptoms_doctorPOV.php?error");
        exit();
      }
}
*/