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

  <link href="css/styles.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



</head>
<body>
    <?php include 'navbar.html'; ?>
    <div class="row">
        <div class="col-md-8" style="margin-left: 50px; margin-top: 50px;">
        <h1>Please complete the following form:</h1>
        <form action="includes/add_symptoms.inc.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="textAnswer" style="margin-bottom: 15px;"; class="form-label">Please describe in your own words the symptoms you experience.</label>
                <textarea  id="textAnswer" class="ckeditor" name="editor"></textarea>
            </div>
            <div class="mb-3">
                <label for="textAnswer" style="margin-bottom: 15px;"; class="form-label">Add images if relevant:</label>
                <input type="file" id="chooseFile" name="images[]" multiple/>
            </div>
            <button type="submit" class="btn btn-primary" name="addSymptoms">Submit</button>
        </form>

            <div class="imgGallery">
                <!-- image preview -->
            </div>

        </div>
    </div>
</body>

<script>
  $(function () {
    // Multiple images preview with JavaScript
    var multiImgPreview = function (input, imgPreviewPlaceholder) {

      if (input.files) {
        var filesAmount = input.files.length;

        for (i = 0; i < filesAmount; i++) {
          var reader = new FileReader();

          reader.onload = function (event) {
            $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(imgPreviewPlaceholder);
          }

          reader.readAsDataURL(input.files[i]);
        }
      }

    };

    $('#chooseFile').on('change', function () {
      multiImgPreview(this, 'div.imgGallery');
    });
  });
</script>
</html>