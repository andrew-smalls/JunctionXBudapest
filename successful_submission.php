<!DOCTYPE html>
<html lang="en">

<?php
    include 'includes/autoloader.inc.php';
    include 'header.html';
?>

<body>
<?php include 'navbar.html'; ?>

<div class="row">
    <div class="col-md-2">
        
    </div>
    <div class="col-md-8" style="text-align: center;">
        <h2>Your submission was successful! You will be contacted by a doctor in the shortest possible time.</h1>
    </div>
    <div class="col-md-2">
        
    </div>
</div>
<div class="row" style="margin-top: 30px;">
    <div class="col-md-2" >
        
    </div>
    <div class="col-md-8" style="text-align: center;">
        <form action="patient_home.php" method="GET" id="submission_form">
            <input type="hidden" name="uid" value="<?php print($_GET['uid']);?>">; 
        </form>
        <button class="btn btn-primary" form="submission_form" style="height: 80px; width: 200px;" type="submit">Return to home page</button>
    </div>
    <div class="col-md-2" >
        
    </div>
</div>

</body>