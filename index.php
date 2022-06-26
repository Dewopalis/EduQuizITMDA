<?php
$servername = "";
$username = "";
$password = ";
$database = "";


//create connection
 $conn = new mysqli($servername, $username, $password, $database);
   
   
  
  //test
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


if(isset($_POST['log']))
{
     //something was posted
$username=  $_POST['username'];
$password= $_POST['password'];

//logic to log user in from db
  if(!empty($username) && !empty($password) && !is_numeric($username)){
$query = "select * from users where username = '$username' limit 1";

  $result = mysqli_query($conn, $query);

  if($result){
    if($result && mysqli_num_rows($result) >0){
        $user_data = mysqli_fetch_assoc($result);
          if($user_data['password'] == $password){
              Session_Start();
            $_SESSION['user'] = $user_data['username'];
            header("Location: startpage.html");
            
             die;
          }
    }
  }

$info = "wrong username/password";
}else{
  $info = "invalid info"; 
}
}
 ?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>EduQuiz</title>
    <link rel="stylesheet" href="app.css">
        <style type="text/css">.disclaimer { display: none; }</style>
</head>
<body>
  <div class="header">
        <div class="container">  
            <div id="Home" class="flex-center flex-column">
                <style>
                   

                    .danger {
                        background: red;
                    }
                </style>
                <div class="login" style="text-align:center">
                    <form class="form" id="Login" action='#' method="post">
                        <h1 class="form__title">Login</h1>
                        <?php if(isset($info)) { ?>
                        <div class="danger">
                            <?= $info ?>
                        </div>
                        <?php } ?>

                        <div class="form__input-group">
                            <input type="text" class="form__input" name="username" autofocus placeholder="username">

                        </div>
                        <div class="form__input-group">
                            <input type="password" name="password" class="form__input" autofocus placeholder="Password">

                        </div>

                        <button class="form__button btn"type="submit" name="log" value="log_in">Log in </button>
                    </form>
                </div>
            </div>
            </div>
         
    </div>
   
</body>
</html>
<!-- Code injected by live-server -->
<script type="text/javascript">
	// <![CDATA[  <-- For SVG support
	if ('WebSocket' in window) {
		(function() {
			function refreshCSS() {
				var sheets = [].slice.call(document.getElementsByTagName("link"));
				var head = document.getElementsByTagName("head")[0];
				for (var i = 0; i < sheets.length; ++i) {
					var elem = sheets[i];
					head.removeChild(elem);
					var rel = elem.rel;
					if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
						var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
						elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
					}
					head.appendChild(elem);
				}
			}
			var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
			var address = protocol + window.location.host + window.location.pathname + '/ws';
			var socket = new WebSocket(address);
			socket.onmessage = function(msg) {
				if (msg.data == 'reload') window.location.reload();
				else if (msg.data == 'refreshcss') refreshCSS();
			};
			console.log('Live reload enabled.');
		})();
	}
	// ]]>
</script>
