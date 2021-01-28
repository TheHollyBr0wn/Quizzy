<!DOCTYPE html>
<html lang="en">
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

    <?php
      // Errors - e.g passwords are the same or not
      if(isset($_GET['err'])) { // if something got passed in called "err"
        $errVal = $_GET['err'];  // sets what ever the variable err was into errVal
      } else {
        $errVal = null; // else sets it to null 
      }
    ?>

    <div class="d-flex flex-row justify-content-center">
        <div class="col-md-5 bg-light mx-3">
          <center><b>Login</b></center>  <!-- Login section for the form -->
            <br> 
            <form action = 'signincheck.php' method = 'POST'> <!-- When they click submit all the info typed -->
              <div class="form-group">                        <!-- Will be passed into the other file called -->
                <label for="Mail">Email</label>               <!-- signincheck.php -->
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
              </div>

              <div class="form-group">
                <label for="pass">Password</label>
                <input type="password" class="form-control" id="pass" name="pass" placeholder="Enter password">
              </div>

              <div class="form-group">
                <input type="submit" value="Submit"><br>
                <button type="button" class="btn btn-link my-2 p-0">Reset Password</button>
              </div> 
              <?php
              if($errVal == 7) { 
                    echo '<span style="color:#FF0000">Email or password entered incorrectly, please try again.</span>';
                  }  // error checking to make sure the account does or does not exist
              ?>
            </form>
        </div>

        <div class="vl"></div>

        <div class="col-md-5 bg-light mx-3">
          <center><b>Create Account</b></center>  <!-- Form for creating an account -->
            <br>
            <form action = 'uploadD.php' method = 'POST'>  <!-- info transferred to uploadD.php -->
               <div class="form-group">
                 <label for="Mail">Email</label> 
                 <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
               </div>

               <div class="form-group">
                 <label for="name">Name</label>
                 <input type="text" class="form-control" id="name" name = "name" placeholder="Enter your first name">
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
               <br><br>

                <?php // ERROR CHECKING
                  if($errVal == 1){
                    echo '<span style="color:#FF0000">Passwords are not the same - please try again.</span>';
                  } elseif($errVal == 2) {
                    echo '<span style="color:#FF0000">Password left blank - please enter password</span>';
                  } elseif($errVal == 3) {
                    echo '<span style="color:#FF0000">Confirm password left blank - please enter password</span>';
                  } elseif($errVal == 4) { 
                    echo '<span style="color:#FF0000">Name left blank - please enter your name</span>';
                  } elseif($errVal == 5) { 
                    echo '<span style="color:#FF0000">Email left blank - please enter your email</span>';
                  } elseif($errVal == 6) { 
                    echo '<span style="color:#FF0000">Account already exists - try logging in</span>';
                  } 
                ?>
            </form>
            <br>
        </div>
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