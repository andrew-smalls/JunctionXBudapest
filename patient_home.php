<?php
	include 'includes/autoloader.inc.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>VarianCareSystem</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">




</head>
<body>
    <?php include 'navbar.html'; ?>
    <div>
        <h1>Welcome!</h1>
    </div>
    <div class="d-grid gap-2">
        <form action="add_symptoms.php" method="GET" id="submission_form"></form>
        <button class="btn btn-primary" form="submission_form" type="submit" style="height: 200px; margin: 100px">I have some symptoms...</button>
    </div>

</body>
</html>