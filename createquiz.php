<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Quizzy</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">

  <style>
    .vl {
      border-left: 6px solid white;
      height: 500px;
    }

  </style>
</head>

<body>
  <section id="hero">
    <div class="container-fluid">  <!-- Creates a container for the title "Quizzy" -->
      <div class="row">
        <div class="col-md-12">
          <h1 class="my-2 mx-0"><center>Quizzy</center></h1>
        </div>
      </div>
    </div>

    <br>
    <br>

    <div class="col-md-11 bg-light ml-5 mr-5">
      <center><b>Create Quiz</b></center>  <!-- create quiz section -->
      <br> 
      <form action = 'uploadQNameDesc.php' method = 'POST'> <!-- When they click submit all the info typed -->
        <div class="form-group">                        <!-- Will be passed into the other file called -->
          <label for="quizname">Quiz Name</label>               <!-- uploadQNameDesc.php -->
          <input type="text" class="form-control-lg" name="quizname"  placeholder="e.g. Indicies">
        </div>

        <div class="form-group">
          <label for="descriptionforquiz">Description for quiz</label>
          <textarea class="form-control" name="descriptionforquiz" rows="2"></textarea>
        </div>

        <button type="submit" class="btn btn-secondary mb-2" name="b1" value="1">Confirm</button>
      </form>
      <br>
    </div> 
  </section>

</body>

  <!-- JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/waypoints/waypoints.min.js"></script>
  <script src="lib/counterup/counterup.min.js"></script>
  <script src="lib/superfish/hoverIntent.js"></script>
  <script src="lib/superfish/superfish.min.js"></script>

  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>
</html>