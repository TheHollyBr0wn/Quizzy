<!DOCTYPE html>
<html lang="en">

<html>
  <style>
    input[type=submit] {
      width: 100%;
      background-color: #4CAF50;
      color: white;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
    input[type=submit]:hover {
      background-color: #45a049;
    }
    input[type=email] {
      width: 100%;
      background-color: #FFFFFF;
      color: black;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      border-radius: 2px;
      cursor: pointer;
    }
    input[type=password] {
      width: 100%;
      background-color: #FFFFFF;
      color: black;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      border-radius: 2px;
      cursor: pointer;
    }
    label{
      color:white;
    }
  </style>
</html>

<head>
  <meta charset="utf-8">
  <title>Quiz</title>
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
</head>

<body>

  <!--==========================
  Header
  ============================-->
  <header id="header">
    <div class="container ml-0">

      <div id="logo" class="pull-left">
        <h1><a>Quizzy</a></h1>
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="login.php?">Log In</a></li>
          <li class="menu-active"><a href="register.php?">Create account</a></li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>

  </header><!-- #header -->

  <!--==========================
    Hero Section
  ============================-->
<?php
  /*$servername = "localhost";
  $username = "quiz";
  $password = "quiz";
  $dbname = "quiz";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

  $conn->close();*/
?>

  <section id="hero">
    <div class="hero-container"> 
      <div id='form'>
        <form action = 'uploadD.php' method = 'POST'>
             <div class="form-group">
               <label for="Mail">Email</label>
               <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
             </div>

             <div class="form-group">
               <label for="name">Name</label>
               <input type="text" class="form-control" id="name" name = "name" placeholder="Enter your firstname">
             </div>

             <div class="form-group">
               <label for="pass">Password</label>
               <input type="password" class="form-control" id="pass" name = "pass" placeholder="Enter password">
             </div>

             <div class="form-group">
               <label for="Cpass">Confirm Password</label>
               <input type="password" class="form-control" id="Cpass" name = "Cpass" placeholder="Confirm Password">
             </div>

             <input type="submit" id = 'btn' value="Submit">
        </form>
      </div>
    </div>
  </section><!-- #hero -->

  <!--==========================
    Footer
  ============================-->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">

      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>Quizzy</strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!--
          All the links in the footer should remain intact.
          You can delete the links only if you purchased the pro version.
          Licensing information: https://bootstrapmade.com/license/
          Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Regna
        -->
        <a>Designed by Holly Brown</a>
      </div>
    </div>
  </footer>

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

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

</body>
</html>
