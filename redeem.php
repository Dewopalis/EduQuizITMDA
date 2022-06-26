<?php session_start() ?>
<!DOCTYPE html>

<?php 

$currentUser = $_SESSION['user'];

$servername = "localhost";
$username = "id19128965_dewaldbekker";
$password = "6bF$%A/RQSJN)D>D";
$database = "id19128965_eduquiz";

//create connection
 $conn = new mysqli($servername, $username, $password, $database);
     //test
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//getting slider value from previous page
$redeemedPoints= $_POST["scoreSlider"];

//removing the points from db based on chosen amount to redeem
$query = "UPDATE users SET score = score- ".$redeemedPoints." WHERE username = '$currentUser'";

$result  = mysqli_query($conn, $query);  

?>

<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduQuiz</title>
    <link rel="stylesheet" href="app.css">
        <style type="text/css">.disclaimer { display: none; }</style>
    <style type="text/css">.disclaimer { display: none; }</style>
        <link rel="stylesheet" href="pictures.css">
  </head>
  <body>
       <script>//</script>
    <div class="container">
      <div id="home" class="flex-center flex-column">
            <h2>You have successfully redeemed <?php echo $redeemedPoints?> points at</h2>
            <h3 id="current_date"></h3>
            <h4>Show this to a school administrator to redeem your vouchers</h4>
            <a class= "btn" href="profile.php">Back</a>
      </div>
    </div>
    <script>
const d = new Date();
let day = d.getDate();
document.getElementById("current_date").innerHTML = d;
</script>
  </body>

</html>

