<?php

include 'session.php';
include 'sql.php';

$user_id = $_SESSION["user_id"];

?>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="mystyle.css">
</head>
<body class="loginpage">
    <header>
        <div id="logo" onclick="slowScroll('#top')">
          <h2><span>My Page</span></h2>
        </div>
    </header>
    <div>Your Username: <?php echo $_SESSION["username"]; ?>
    <div><a href="https://khavronin.ursse.org/feed.php">Go to feed</a></div>
    <form>
    <input type="text" size="30" onkeyup="showResult(this.value)">
    <div id="livesearch"></div>
    </form>
    <form>
	<table>
		<?php
		$posts_content = "SELECT * FROM posts WHERE user_id = 'user_id' ORDER BY `posts`.`post_id` DESC;";

		$posts_content_res = mysqli_query($sql, $posts_content);

		if (mysqli_num_rows($posts_content_res) > 0) {
		  while ($row = mysqli_fetch_row($posts_content_res)){
		    $out = "<tr><td>".$row[3]."</td><td>|</td><td>".$row[4]."</td><td>|Created by -</td><td>".$row[2]."</td></tr>";
		   echo $out;
		        }
			} else {
  			echo "There are no massages";
			}

			?>		

	</table>
    </form>
    <script src="js/searchbar.js"> </script>
</body>