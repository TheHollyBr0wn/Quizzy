<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Quizzy</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">

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
  .vl1 {
    border-bottom: 6px solid white;
    width: 90%;
  }

  .scrollBox {
    background: white;
    text-align: center;
    width: 300px;
    height:250px;
    overflow-y: scroll;
  }   
  
</style>

</head>

<body>
  <?php
      // is it okay to proceed (if 1 it will carry on, if 0 it will go back to index)
      if(isset($_GET['okay'])) { // grabs variable created in the URL
        $isokay = $_GET['okay'];
      } else {
        $isokay = 0; // Not okay to proceed - will bounce back to index and ask them to try logging in again
      }
      session_start(); // global variable from creating account or logging in is set here
  ?>

  <section id="hero">
    <div class="container-sm px-1 m-0 pb-4">   <!-- container created for the title and the persons name -->
      <div class="row">
        <div class="col-md-auto">   <!-- container sizes up or down to what is needed for the title -->
          <h1 class="mt-1 mb-0 mx-0 px-1">Quizzy</h1>
        </div>
        <div class="col-md-auto">    <!-- global variable is used to welcome the user -->
          <h2 class="mt-3 mb-0 pt-2 ">Welcome <?php echo $_SESSION['s_fname'] ?>! :)</h2> 
        </div>
      </div>
    </div>

    <div class="d-flex flex-row justify-content-center">
      <div class="col-md-8 bg-light mx-3">
        <center><b>Your Quizzes</b></center>  <!-- Quiz section -->
      </div>
    </div>

    <div class="d-flex flex-row justify-content-center"> 
      <div class="col-md-10 mx-3"> 
            <?php
              // THIS IS ALL TO COLLECT THE USERS ACCOUNT ID
              include 'dbconn.php'; // connects to database
              $email = $_SESSION['s_email']; // email stored in this
              $sql = "SELECT AccountID FROM accounts WHERE Email = '$email'";
              $result = mysqli_query($conn, $sql); // returns true/false if anything found

              if (!$result) { // if result not true then...
                die("Database access failed: " . mysqli_error()); // kills the program, returns error
              } else {
                $rows = mysqli_num_rows($result); // else number of rows found is put into a var
              }   
              if ($rows) { // if there are rows - so a number
                while ($row = mysqli_fetch_array($result)) { // collecting accountID
                  $accid = $row['AccountID']; // stores the account ID into a variable
                  $_SESSION["accID"] = $accid; 
                } 
              }
              // THIS IS FOR DISPLAYING ALL THE USERS QUIZES TO THEM
              $sql = "SELECT * FROM idquiz WHERE accountid = $accid";
              $result = mysqli_query($conn, $sql); // returns true/false if anything found
              if (!$result) { // if result not true then...
                die("Database access failed: " . mysqli_error()); // kills the program, returns error
              } else {
                $rows = mysqli_num_rows($result); // else number of rows found is put into a var
              }   
              if ($rows) { // if there are rows - so a number
                echo "<div class='d-flex flex-row justify-content-center pt-2'>";
                echo "<div class='col-md-10 bg-light mx-3 pb-2 scrollBox'>";
                while ($row = mysqli_fetch_array($result)) { // collecting accountID
                  $quizID = $row['quizid']; // stores the quiz ID into a variable
                  $quizname = $row['quizName']; // stores the quiz name into a variable
                  $isLive = $row['live']; // stores if the quiz is active or not (this will be used for if their was a deletion of the quiz or not)
                  $questDesc = $row['descrip']; // stores the quiz description 
                  echo "<p class='m-0'> <b>Quiz name:</b> $quizname </p>";
                  echo "<p class='m-0'> <b>Description:</b> $questDesc </p>";
                  echo "<a href='quizPlay.php?qident=$quizID&q=1' class='btn-sm btn-secondary btn-block' role='button'> ^^ Play quiz! ^^</a>";
                }
                echo "</div></div>"; 
              }
            ?>
        </div>
      </div>

    <div class="vl1 ml-5 mt-2 mb-2 pl-3"></div> <!-- breaks page down a little makes it look less clustered --> 

    <div class="d-flex flex-row justify-content-center">
      <div class="col-md-10 m-2">
          <form method='POST' action='createquiz.php'>
          <center><button id = btn type='submit' class="btn-lg btn-secondary">Create Quiz</button></center>
          </form>
      </div>
    </div>

    <div class="container" style="border:3px solid #cecece;" > <!-- adds boarder to the carousel -->
      <div id="carouselContent" class="carousel slide" data-ride="carousel"> <!-- sets it up -->
          <div class="carousel-inner" role="listbox"> <!-- states what will be shown in the carousel (the info below) -->
              <div class="carousel-item active text-center p-0"> <!-- centre's the text -->
                   <p class="text-light m-0">There are two kinds of people in this world: those who want to get things done and those who don’t want to make mistakes. </p>
                   <p class="text-light m-0"> – John Maxwell</p>
              </div>
              <div class="carousel-item text-center p-0">
                  <p class="text-light m-0">Challenges are what make life interesting. Overcoming them is what makes life meaningful.</p>
                  <p class="text-light m-0"> – Joshua J. Marine</p>
              </div>
              <div class="carousel-item text-center p-0">
                  <p class="text-light m-0">I’ve failed over and over and over again in my life. And that is why I succeed.</p>
                  <p class="text-light m-0"> – Michael Jordan</p>
              </div>
              <div class="carousel-item text-center p-0">
                  <p class="text-light m-0">There are no shortcuts to any place worth going.</p>
                  <p class="text-light m-0"> – Beverly Sills</p>
              </div>
          </div>
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