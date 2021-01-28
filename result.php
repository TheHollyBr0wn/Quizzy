<?php

// these two are for the results
if(isset($_GET["score"]) ){ 
  $tScore = $_GET["score"];
} else {
  echo "oh no..";
  //header("location:Profile.php");
}
if(isset($_GET["tQuest"]) ){
  $numQ = $_GET["tQuest"];
} else {
  //header("location:Profile.php");
}

// these are for the results database to upload their results
if(isset($_GET["accid"]) ){
  $accountID = $_GET["accid"];
} else {
  echo "oh no..";
  //header("location:Profile.php");
}

if(isset($_GET["quizID"]) ){
  $quizID = $_GET["quizID"];
} else {
  echo "oh no..";
  //header("location:Profile.php");
}

//echo "total score: " . $tScore . "...number of questions: " . $numQ . "...account ID: " . $accountID . "...quiz id: " . $quizID;

// calculates the % of how much it takes up in the pie chart
// i will be using java to display the chart
$tWrong = $numQ - $tScore;

if ($tScore >= 1){
  $tSc = ($tScore/($tWrong+$tScore))*100;
  $tWr = ($tWrong/($tWrong+$tScore))*100;
  } else{
    $tSc = 0;
    $tWr = 100;
  }

$dataPoints = array( 
  array("label"=>"Correct", "symbol" => "Correct","y"=>$tSc),
  array("label"=>"Incorrect", "symbol" => "Incorrect","y"=>$tWr),
);

include 'dbconn.php'; // connects to database
$sql = "INSERT INTO result (accountid, quizid, result, numberQuest) VALUES ($accountID, $quizID, $tScore, $numQ);";
$result = mysqli_query($conn, $sql) or die ("failed to query". mysqli_connect_error()); // querys


?>
<!DOCTYPE html>
<html lang="en">
<head>
<script>
window.onload = function() {
 
var chart = new CanvasJS.Chart("chartContainer", { // actual chart, displays data. 
  theme: "dark2",
  backgroundColor: null,
  animationEnabled: true,
  title: {
    text: "Total score"
  },
  data: [{
    type: "doughnut",
    indexLabel: "{symbol} - {y}",
    yValueFormatString: "#,##0.0\"%\"",
    showInLegend: true,
    legendText: "{label} : {y}",
    dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
  }]
});
chart.render();
 
}
</script>

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

  <section id="hero">
    <div class="container-md">
      <div class="row">
        <div class="col-lg">
          <div id="chartContainer" style="height: 400px; width: 100%;"></div>
          <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
        </div>
        <div class="col-sm text-center my-5 py-5">
          <h1 class='m-0 p-1'><b> Well done!</b></h1>
          <a href='Profile.php' class='btn-get-started p-2'>Profile page</a>
        </div>
      </div>
    </div>

  </section>
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


