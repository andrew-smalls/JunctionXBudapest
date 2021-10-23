<!DOCTYPE html>
<html lang="en">

<?php
	include 'includes/autoloader.inc.php';
  include 'header.html';

  $view=new View();
  $users=$view->getUsersByType(1);
  $submissions=$view->getSubmissions();
?>

<body>
<?php include 'navbar.php'; ?>
<div style="margin: 20px;">
  <div class="row">
    <div class="col-md-12">
       <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Patients</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Symptom submissions</button>
        </li>
      </ul>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Patient name</th>
                <th scope="col">Email</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
                <?php

                  

                  for($i=0;$i<count($users);$i=$i+1){
                      print '<tr>
                          <th scope="row">'.($i+1).'</th>
                              <td>'.$users[$i]['first_name'].'</td>
                              <td>'.$users[$i]['email'].'</td>
                              <td></td>
                          </tr>';
                  }
              ?>
            </tbody>
          </table>
        </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
          <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Patient name</th>
                  <th scope="col">Condition</th>
                  <th scope="col">Date</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
                  <?php

                    $patient_name='';
                    $cancer_type='';
                    for($i=0;$i<count($submissions);$i=$i+1){

                       for($j=0;$j<count($users);$j=$j+1){
                          if($users[$j]['user_id']==$submissions[$i]['user_id']){
                            $patient_name=$users[$j]['first_name'];
                            $cancer_type=$users[$j]['cancer_type'];
                          }
                       }

                      //print "Name of user for submission: ".$submissions[$i]['submission_id']." is ".$patient_name."";
                        
                        print '<tr>
                            <th scope="row">'.($i+1).'</th>
                                <td>'.$patient_name.'</td>
                                <td>'.$cancer_type.' cancer</td>
                                <td>'.$submissions[$i]['date'].'</td>
                                <td>
                                  <form action="symptoms_doctorPOV.php" method="GET" id="sub_form">
                                      <input type="hidden" name="sid" value="'.$submissions[$i]['submission_id'].'" />
                                      <input type="hidden" name="uid" value="'.$_GET['uid'].'" />
                                  </form>
                                  <button form="sub_form" type="submit" class="btn btn-primary">Check symptoms</button>
                                </td>
                            </tr>';
                    }
                ?>
              </tbody>
            </table>
        </div>
        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
      </div>

    </div>
  </div>
  
  <div>
  
  </div>
  <div>
      <a class="btn btn-primary" style="margin: 30 px;" href="add_user.php">Add new patient</a>
  </div>
</div>
</body>
</html>