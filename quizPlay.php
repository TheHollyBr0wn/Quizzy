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

  </style>
</head>

<body>
    <section id="hero">
      <div class="container-sm px-1 m-0 pb-4">   <!-- container created for the title and the persons name -->
      <div class="row">
        <div class="col-md-auto">   <!-- container sizes up or down to what is needed for the title -->
          <h1 class="mt-1 mb-0 mx-0 px-1">Quizzy</h1>
        </div>
      </div>
    </div>

    <?php
      include 'dbconn.php'; // connects to database
      if(isset($_GET['qident'])) { // see's to see if the quiz id was passed over (in the url)
        $quizid = $_GET['qident'];  // if yes, stores in varaible 
      } else {
        echo "<html>";
        echo "<head>";
        echo "<meta http-equiv='refresh' content=0;URL=Profile.php>"; // sends to the profile page
        echo "</head>";                                                        
        echo "</html>";
      }

      if(isset($_GET['q'])) { // see's to see if the quiz id was passed over (in the url)
        $questNum = $_GET['q'];  // if yes, stores in varaible 
      } else {
        $questNum = 1; // else sets it to 1 
      }

      if(isset($_GET['score'])) { // see's to see if the quiz id was passed over (in the url)
        $tScore = $_GET['score'];  // if yes, stores in varaible 
      } else {
        $tScore = 0; // else sets it to 1 
      }

      $sql = "SELECT * FROM questandans WHERE quizid=$quizid ORDER BY QuAnID";
      $result = mysqli_query($conn, $sql); // returns true/false if anything found
      if (!$result) { // if result not true then...
        die("Database access failed: " . mysqli_error()); // kills the program, returns error
      } else {
        $rows = mysqli_num_rows($result); // else number of rows found is put into a var
      }

      if ($rows > 0 && $questNum <= $rows) { // will go into this if any rows are avaliable
        for ($x = 1; $x <= $questNum; $x++) { // looks for the Q&A relating to what has been passed into the URL
          $row = mysqli_fetch_array($result); // goes to the row it is looking for
          $quest = $row['question']; // stores the question and answers into the URL
          $an1 = $row['ans1'];
          $an2 = $row['ans2']; 
          $an3 = $row['ans3']; 
          $an4 = $row['ans4']; 
          $corr = $row['correct']; 
        }
        echo " <div class='hero-container'>";
        echo "<h1 class='m-0 pb-2'>Question: $questNum</h1>"; // displaying the questions and answers
        echo "<h2 class='m-0 px-5'><b>$quest</b></h2>"; // below creates buttons for all the answers
        echo "<a href='checkAns.php?ans=1&cAns=$corr&score=$tScore&numquest=$rows&qident=$quizid&q=$questNum' class='btn-get-started p-1'>$an1</a>"; 
        echo "<a href='checkAns.php?ans=2&cAns=$corr&score=$tScore&numquest=$rows&qident=$quizid&q=$questNum' class='btn-get-started p-1'>$an2</a>";
        echo "<a href='checkAns.php?ans=3&cAns=$corr&score=$tScore&numquest=$rows&qident=$quizid&q=$questNum' class='btn-get-started p-1'>$an3</a>";
        echo "<a href='checkAns.php?ans=4&cAns=$corr&score=$tScore&numquest=$rows&qident=$quizid&q=$questNum' class='btn-get-started p-1'>$an4</a>";
        echo "</div>"; 
      }
    ?>
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