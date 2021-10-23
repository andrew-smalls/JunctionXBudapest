<?php

use function PHPSTORM_META\type;

 include 'header.html';
 include 'includes/autoloader.inc.php';
?>

<body>
<?php include 'navbar.php'; ?>

<div class="card" style="width: 18rem;">
  <div class="card-header"> Patient info
  </div>
  <?php

  $view=new View();
  $symptoms=$view->getSymptoms('andrei');

  for($i=0;$i<count($symptoms);$i=$i+1){
  print '
  <ul class="list-group list-group-flush">
  <li class="list-group-item"> Patient name: ' .$symptoms[$i]['patientName'].'</li>
  <li class="list-group-item">Recovering from: ' .$symptoms[$i]['previousIlness'].'</li>
  <li class="list-group-item">Surgery date: ' .$symptoms[$i]['surgeryDate'].'</li>
  <li class="list-group-item">Treatment Summary: ' .$symptoms[$i]['treatmentSummary'].'</li>
      
  </ul>';
  }
      ?>
      
</div>
  <div class="row" style="margin-bottom: 40px;">
    <div class="col-md-2">
    </div>
    <div class="col-md-8" style="text-align: center;">
      <h2>This symptom submission was completed by <?php print($_GET['uid']); ?></h2>
    </div>
    <div class="col-md-2">
    </div>
  </div>
  <div class='roundTreatmentSummary'>
      <p href="..."> See patient ASCO Treatment Summary and Survivorship Care plan</p>
  </div>  

<div class="card" style="width: 18rem;">
  <div class="card-header"> Suggested research papers: 
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">Link 1 </li>
    <li class="list-group-item"> Link 2 </li>
  </ul>
<div class='suggestestedResearchMaterials'> Suggested research papers:

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Suggested reading</th>
      <th scope="col">Link</th>
    </tr>
  </thead>
  <tbody>
      <?php
        $search=new Search();
        $keywords = 'lung cancer,throat soarness';
        $results=$search->getResearchMaterials($keywords); //de pus keywords dinamic
        
        $count=1;
        $controller=new Controller();
        
        foreach($results as $item){
          $link = $item->link;
          $essential_phrases = $controller->parse_link($link, $keywords);
          
            print '<tr>
                <th scope="row">'.($count).'</th>
                    <td>'.$item->title.'</td>
                    <td><a href="'.$item->link.'">'.$item->link.'</a></td>
                    <td>'.$essential_phrases.'</td>
                    <td></td>
                </tr>';
              $count=$count+1;
              
        }
    ?>
  </tbody>
</table>

</div>

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