<?php
session_start();
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

$query = "Select score, picture from users WHERE username = '$currentUser'";

$result  = mysqli_query($conn, $query);  

   if($result){
        $row = mysqli_fetch_assoc($result);
        }
$score = $row['score'];
$profilePic = $row["picture"];

 //all images that can be chosen as profile pictures
$allImages = array(
  "https://i.imgur.com/G1kXyhJ.png",
  "https://i.imgur.com/I2A8so0.png",
  "https://i.imgur.com/EL7hpXQ.png",
  "https://i.imgur.com/kBuLZxc.png",
  "https://i.imgur.com/kepTeH5.png",
  "https://i.imgur.com/S3Ppap5.png",
  "https://i.imgur.com/S2jQkso.jpg",
  "https://i.imgur.com/RGyICVZ.png",
  "https://i.imgur.com/z7F6Nt8.jpg",
  "https://i.imgur.com/VmQicME.jpg"
    ) ;
    
  
//this checks if user had chosen an image. Will skip this code when coming from startpage
if(!empty($_GET["image"])){
 

$selectedImage = $allImages[$_GET["image"]-1];
//updating the db to new chosen profile picture    
$query = "UPDATE users SET picture = '$selectedImage' WHERE username = '$currentUser'";
mysqli_query($conn, $query);   
  
  //reloading the query to update picture in realtime
  $query = "Select picture from users WHERE username = '$currentUser'";
$result  = mysqli_query($conn, $query);  
   if($result){
        $row = mysqli_fetch_assoc($result);
        }

$profilePic = $row["picture"];
}
?>

<!DOCTYPE html>


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
         <img src="<?php echo $profilePic;?>" style="">
        <h1><?php echo $currentUser ?></h1>
        <h2>Points:<?php echo $score ?></h2>
        
        <form id="Login" action='redeem.php' method="post">
        <input type="range" min="0" max=<?php echo $score ?>  step="10" class="slider" id="scoreSlider" name="scoreSlider">
              <h3 id=output></h3>
             <button class="form_button btn"type="submit">Redeem points</button>
        </form>
        <a class= "btn" href="pictures.html">Change profile photo</a>
        <a class= "btn" href="startpage.html">Back</a>
 
      </div>
    </div>
  </body>
  <script>
  //slider to choose how many points to redeem
var slider = document.getElementById("scoreSlider");
var output = document.getElementById("output");
output.innerHTML = slider.value; // Display the default slider value

// Update the current slider value (each time you drag the slider handle)
slider.oninput = function() {
  output.innerHTML = this.value;
} 

function redeem(){
     document.cookie = "redeemAmount=" +slider.value;
}


  </script>
</html>



