<?php 
  needLogin();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Upload file</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>

<div class="container">

    <div style="max-width: 650px; margin: auto;">
      <h1 class="page-header">Image Upload Form</h1>
      <p class="lead">Select image, having maximum size <span id="max-size">3</span> MB.</p>

      <form id="upload-image-form" action="upload" method="post" enctype="multipart/form-data">
        <div id="image-preview-div" style="display: none;">
          <label for="exampleInputFile">Selected image:</label>
          <br>
          <img id="preview-img" src="noimage">
        </div>
        <div class="form-group">
          <input type="file" name="image" id="file" required>
        </div>
        <button class="btn btn-lg btn-primary" id="upload-button" type="submit" name='uploadImage'>Upload image</button>
      </form>

      <br>
      <div class="alert alert-info" id="loading" style="display: none;" role="alert">
        Uploading image...
        <div class="progress">
          <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
          </div>
        </div>
      </div>
      <div id="message"></div>
    </div>

  </div>
</body>

</html>