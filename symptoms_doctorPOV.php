<?php

use function PHPSTORM_META\type;

 include 'header.html';
 include 'includes/autoloader.inc.php';
?>

<body>
<?php include 'navbar.php'; ?>

<div class='basicInfoOuterContainer'>
<?php

$view=new View();
$symptoms=$view->getSymptoms('andrei');//class="'basicInfoInnerContainer'"

for($i=0;$i<count($symptoms);$i=$i+1){
print '
    <p><b>Patient info:</b></p>
      <div >
        <p>Patient name:' .$symptoms[$i]['patientName'].'</p>
        <p>Recovering from:' .$symptoms[$i]['previousIlness'].'</p>
        <p>Surgery date:' .$symptoms[$i]['surgeryDate'].'</p>
        <p>Treatment Summary:' .$symptoms[$i]['treatmentSummary'].'</p>
    </div>';
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
          $results=$search->getResearchMaterials("lung cancer throat soarnes");
          //$string_results=file_get_contents($results);
          //print_r($results);
          $count=1;
          foreach($results as $item){
              print '<tr>
                  <th scope="row">'.($count).'</th>
                      <td>'.$item->title.'</td>
                      <td><a href="'.$item->link.'">'.$item->link.'</a></td>
                      <td></td>
                  </tr>';
                $count=$count+1;
          }
      ?>
    </tbody>
  </table>
    

  
  </div>
  <div class='automatedEvaluation'>
    <button type='submit' class='generateEvalButton'>Generate Automated Evaluation</button>
  </div>

  <div class='completePatientMedicalFile'>
    <a href='inner/small-cell-lung-cancer-treatment-summary-and-survivorship-care-plan.docx'> Get a copy of the Treatment Summary here </a>
  </div>
  <div class='uploadCompletedFile'>
    <?php $patientName='andrei'; $doctorName='mrDoctor'; 
    echo "<form action='includes/uploadCompletedFile.inc.php?patientName=$patientName&doctorName=$doctorName' method='post' enctype='multipart/form-data'>"
    ?> Select file to upload:
      <input type="file" name="fileToUpload" id="fileToUpload">
      <input type="submit" value="Upload file" name="submit">
    </form>
  </div>
  <div class='uploadedFile'>
    <p> Here is the uploaded file </p>

  </div>

</body>
</html>