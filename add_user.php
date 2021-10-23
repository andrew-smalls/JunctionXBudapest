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
  <div class="modal-body row">
    <div class="col-md-8">
    <h1>Add user info:</h1>
    <form action="includes/add_user.inc.php" method="POST">
      <div class="mb-3">
        <label for="first_name" class="form-label" >First name</label>
        <input name="first_name" id="first_name" type="text" class="form-control" placeholder="First name" aria-label="First name" aria-describedby="basic-addon2">
      </div>
      <div class="mb-3" >
        <label for="exampleInputEmail1" class="form-label" >Email address</label>
        <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
      </div>
      <div class="mb-3" >
        <label for="cancer_type" class="form-label" >Cancer type:</label>
        <input name="cancer_type" type="text" class="form-control" id="cancer_type" aria-describedby="emailHelp">
      </div>
      <div class="mb-3" >
        <label for="address" class="form-label" >Address:</label>
        <input name="address" type="text" class="form-control" id="address" aria-describedby="emailHelp">
      </div>
      <div class="mb-3" >
      <select class="form-select" aria-label="User type" name="type">
        <option value="1">Patient</option>
        <option value="2">Doctor</option>
      </select>
      </div>
      <button type="submit" class="btn btn-primary" name="addUser">Add</button>
    </form>
    </div>
  </div>
</body>