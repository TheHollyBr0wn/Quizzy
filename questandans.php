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
</head>

<body>

  <section id="hero">

    <?php
      // Errors - e.g passwords are the same or not
      if(isset($_GET['err'])) { // if something got passed in called "err"
        $errVal = $_GET['err'];  // sets what ever the variable err was into errVal
      } else {
        $errVal = null; // else sets it to null 
      }

      if(isset($_GET['qid'])) { // see's to see if the quiz id was passed over (in the url)
        $quizid = $_GET['qid'];  // if yes, stores in varaible 
      } else {
        $quizid = null; // else sets it to null 
      }
    session_start(); // global variable 
    if (isset($qname)){ // if it is the first question, there will be no global variables, but if it is a second question then there will be
        $qname = $_SESSION['s_questname']; // collects all of the global variables made
        $an1 = $_SESSION['s_ans1']; // these are for filling the form back in if they miss anything
        $an2 = $_SESSION['s_ans2']; // error checking 
        $an3 = $_SESSION['s_ans3'];
        $an4 = $_SESSION['s_ans4'];
        $correctAn = $_SESSION['s_corrAns'];
      } else {
        $qname = null; // else if it is a first question, to avoid any kickbacks we set them to null
        $an1 = null;
        $an2 = null;
        $an3 = null;
        $an4 = null;
      }
    ?>

    <div class="col-md-11 bg-light ml-5 mr-5"> 
      <center><b>Question</b></center>  <!-- create quiz section -->
      <?php
      echo "<form action='uploadQA.php' method='POST'>"; // When they click submit all the info typed
      echo "<input type='hidden' name='qid' value='$quizid'>"; // breaks out into php to use php variables
      // cannot use php varibles within hml so you have to echo the statements to show to the user
      ?>

        <div class="form-group">                        <!-- Will be passed into the other file called -->
          <label for="questionName">Question</label>               <!-- upload.QA.php -->
          <input type="text" class="form-control" name="questionName" value="<?php echo $qname; ?>" placeholder="e.g. What can help improve the CPU's performance?">
        </div>

        <div class="form-group">
          <label for="ans1">Answer 1</label> <!-- as you can see we break into php if it has been filled in and there was an error  -->
          <input type="text" class="form-control" name = "ans1" value="<?php echo $an1; ?>" placeholder="Enter first answer..">
        </div> <!-- if there is no error when filling the form in or they just opened it, it will show the placeholder -->

        <div class="form-group">
          <label for="ans2">Answer 2</label>
          <input type="text" class="form-control" name = "ans2" value="<?php echo $an2; ?>" placeholder="Enter second answer..">
        </div>

        <div class="form-group">
          <label for="ans3">Answer 3</label>
          <input type="text" class="form-control" name = "ans3" value="<?php echo $an3; ?>" placeholder="Enter third answer..">
        </div>

        <div class="form-group">
          <label for="ans4">Answer 4</label>
          <input type="text" class="form-control" name = "ans4" value="<?php echo $an4; ?>" placeholder="Enter fourth answer..">
        </div>

        <div class="form-group">
          <label for="correctans">Which one is the correct answer? <b>PLEASE DOUBLE CHECK THIS.</b></label>
          <select class="form-control" name = "correctans">
            <?php // we break into php to use variables which are php variables 
              $s1=""; // these will be changed to selected
              $s2=""; // if an error was made, it will keep which answer they selected 
              $s3=""; // this makes it easier for the user, saves time 
              $s4=""; // makes it so they do not have to fill in the form again which can be very annoying
              if($correctAn == 4){
                $s4="selected"; 
              } elseif ($correctAn == 2){
                $s2="selected";
              } elseif ($correctAn == 3){ // 
                $s3="selected";
              } else {
                $s1="selected";
              }
              echo "<option value=1 " . $s1 . ">answer 1</option>";
              echo "<option value=2 " . $s2 . ">answer 2</option>";
              echo "<option value=3 " . $s3 . ">answer 3</option>"; 
              echo "<option value=4 " . $s4 . ">answer 4</option>"; // we must echo these statements to show to the user
             ?>

          </select>
        </div>
        <!-- two different buttons, will redirect you to different pages depending on what they click on -->
        <button type="submit" class="btn btn-secondary mb-2" name="b1" value="1">Confirm and add question</button>
        <!-- this button above will allow the user to add another question -->
        <button type="submit" class="btn btn-secondary mb-2" name="b2" value="2">Confirm and finish</button>
        <!-- this button above will add the last question to the quiz and take them back to the home page -->
        
        <?php // ERROR CHECKING
          if($errVal == 1){
            echo '<span style="color:#FF0000">Question left blank</span>';
          } elseif($errVal == 2) {
            echo '<span style="color:#FF0000">Answer 1 left blank</span>';
          } elseif($errVal == 3) {
            echo '<span style="color:#FF0000">Answer 2 left blank</span>';
          } elseif($errVal == 4) { 
            echo '<span style="color:#FF0000">Answer 3 left blank</span>';
          } elseif($errVal == 5) { 
            echo '<span style="color:#FF0000">Answer 4 left blank</span>';
          } 
        ?>

      </form>
      <br>
    </div>

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