<?php
$servername = "";
$username = "";
$password = "";
$database = "";


//create connection
 $conn = new mysqli($servername, $username, $password, $database);

  //test
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

//Sorting all users based on their scores
$query = "select username, score, picture from users ORDER BY score DESC";
$result = mysqli_query($conn, $query);
$resultAmount = mysqli_num_rows($result);

$leaderboard =array();
//adding each result of the query into a an array
    for($x = 0; $x < $resultAmount; $x++){
   if($result){
        $leaderboard[$x] = mysqli_fetch_assoc($result);

        }
       }
     
 ?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>High Scores</title>
    <link rel="stylesheet" href="app.css" />
    <link rel="stylesheet" href="highscores.css" />
        <style type="text/css">.disclaimer { display: none; }</style>
  </head>
  <body>
    <div class="container">
      <div id="highScores" class="flex-center flex-column">
        <h1 id="finalScore">High Scores</h1>
        <ol id="highScoresList"></ol>
        <a class="btn" href="startpage.html">Go Home</a>
      </div>
    </div>
  <script type="text/javascript">
  const highScoresList = document.getElementById('highScoresList');
//displaying the high score list
  const highScores = <?php echo Json_encode($leaderboard); ?> || [];
console.log(highScores);

 //showing the relevant user's profile picture
    highScoresList.innerHTML =
    highScores.map(user =>{
      return `<li class="high-score"> <img src=${user.picture} 
      style= "border-radius:50%; width:80px; vertical-align:middle"
      
      > 
      
      
      ${user.username} ${user.score}</li>`;
  }).join("");
  </script>
  </body>
</html>
