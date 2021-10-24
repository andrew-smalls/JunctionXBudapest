<?php

use function PHPSTORM_META\type;

 include 'header.html';
 include 'includes/autoloader.inc.php';
?>

<body>
<?php include 'navbar.php'; ?>

  <?php

  $view=new View();
  //$symptoms=$view->getSymptoms('andrei');
  $submission=$view->getSubmissionById($_GET['sid']);
  $user=$view->getUserById($_GET['uid']);

  
      ?>
      
</div>
  <div class="row" style="margin-bottom: 40px;">
    <div class="col-md-2">
    </div>
    <div class="col-md-8" style="text-align: center;">
      <h2>This symptom submission was completed by <?php print($user['first_name']); ?></h2>
    </div>
    <div class="col-md-2">
    </div>
  </div>
  <div class='roundTreatmentSummary'>
      <p href="..."> See patient ASCO Treatment Summary and Survivorship Care plan</p>
  </div>  
<div>
  <p> Give keywords aici: </p>
<form action='symptoms_doctorPOV.php' method='GET' >
    <div class="form-group">
        <label for="keywords" class="text-info">Add list of keywords (comma separated):</label><br>
        <input type="text" name="keywords" id="keywords" class="form-control">
        <?php print "
        <input type='hidden' name='uid' value='".$_GET['uid']."' >
        <input type='hidden' name='sid' value='".$_GET['sid']."' >
        "; ?>
    </div>
    <button type='submit' name='keywordsButton'>Get suggestions</button>
</form>
</div>  
  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Suggested reading</th>
        <th scope="col">Link</th>
        <th scope="col">Suggestions from research papers</th>
      </tr>
    </thead>
    <tbody>
        <?php
          $search=new Search();
          if(empty($_GET['keywords']))
            $keywords='cancer';
          else 
            $keywords = $_GET['keywords'];
            
          $results=$search->getResearchMaterials($keywords); //de pus keywords dinamic <td>'.$controller->parse_link($link, $keywords).'</td>
          
          $count=1;
          $controller=new Controller();
          
          foreach($results as $item){
            $link = $item->link;
            $content = $controller->parse_link($link, $keywords);
              print '
                 <tr>
                  <th scope="row">'.($count).'</th>
                      <td>'.$item->title.'</td>
                      <td><a href="'.$item->link.'">'.$item->link.'</a></td>
                      
                      <td>';
                      foreach($content as $line)
                      {
                         echo $line;
                         echo '\n';
                      }
                      print  '</td>
                  </tr>';
                $count=$count+1;
                
          }
      ?>
    </tbody>
  </table>

<div class='automatedEvaluation'>
  <button type="button" class="btn btn-info">Generate Automated Evaluation</button>
</div>

<div class='completePatientMedicalFile'>
  <a href="inner/small-cell-lung-cancer-treatment-summary-and-survivorship-care-plan.docx" class="btn btn-primary btn-lg active" role="button" aria-pressed="true"> Get a copy of the Treatment Summary here </a>
</div>


  <?php $patientName='andrei'; $doctorName='mrDoctor'; 
  echo "<form action='includes/uploadCompletedFile.inc.php?patientName=$patientName&doctorName=$doctorName' method='post' enctype='multipart/form-data'>"
  ?> Select file to upload:
  <div class="form-group">
    <input type="file" name="fileToUpload" class="form-control-file" id="exampleFormControlFile1">
  </div>
    <input type="submit" value="Upload file" name="submit" class="form-control-file" id="exampleFormControlFile1">
  
  </form>


<div class='uploadedFile'>
  <p> Here is the uploaded file </p>
</div>

</body>
</html>