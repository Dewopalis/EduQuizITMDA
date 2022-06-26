<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Congrats!</title>
    <link rel="stylesheet" href="app.css" />
    <style type="text/css">.disclaimer { display: none; }</style>
  </head>
  <body>
    <div class="container">
      <div id="end" class="flex-center flex-column">
          <h1>You scored</h1>
        <h1 id="finalScore"></h1>
        <a class="btn" href="startpage.html">Go Home</a>
      </div>
    </div>
    <script>
        document.getElementById ("finalScore"). innerHTML = "<?php echo $_GET['score'] ?>";
    </script>
  </body>
</html>


<?php
$servername = "localhost";
$username = "id19128965_dewaldbekker";
$password = "6bF$%A/RQSJN)D>D";
$database = "id19128965_eduquiz";


//create connection
 $conn = new mysqli($servername, $username, $password, $database);

$currentUser = $_SESSION['user'];
$score = $_GET['score'];

  //test
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//increasing score of the user in database based on their quiz result
$query = "UPDATE users SET score = score+ ".$score." WHERE username = '$currentUser'";
mysqli_query($conn, $query);


 ?>
