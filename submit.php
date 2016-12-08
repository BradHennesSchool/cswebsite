<!Doctype html>
<!-- This is the submit page for addnews. This takes all the information
that the user entered on addnews.html and creates a new record in the database -->
<html lang = 'en'>
<head>
<title>
cswebsite
</title>
<meta charset = 'utf-8'>
<link rel='stylesheet' href='website/styles.css'>
<script src='website/java.js' type='text/javascript'></script>
</head>
<body>
	<main>
		<div id = "maintitle">
			Winona State Computer Science Admin
		</div>
		<div id="top">
			<ul class="topnav">
				<li><a href="editnews.php">Edit News Articles</a></li>
				<li><a class="active" href="addnews.html">Add News Articles</a></li>
				</li>
			</ul>
		</div>
		
		<header id = 'newsheader' class = 'col-m-10 col-l-10'>
			Add a new news article
		</header>
		
			<h3>
				Thank you, <?=$_POST["firstname"];?>, your news post will be added!<br>
				Click <a href="addnews.html">here</a> to make more changes!
			</h3>
			<?php
			$time = strtotime($_POST["start"]);
			$start = date('Y-m-d',$time);
			
			$time = strtotime($_POST["expire"]);
			$expire = date('Y-m-d',$time);
			$author = $_POST['firstname']." ".$_POST['lastname'];
			$title = $_POST["title"];
			$body = $_POST["body"];
			$currentdate = date("Y-m-d");
			
			$author = addslashes($author);
			$body = addslashes($body);
			$title = addslashes($title);
			
			$querystring = "INSERT INTO `newsposts`(`Title`, `Body`, `DateStart`, `DateExpired`, `DateCreated`, `Author`) 
			VALUES ('".$title."','".$body."','".$start."','".$expire."','".$currentdate."','".$author."')";
			
			//echo $querystring;
			
			$db = new PDO("mysql:dbname=cswebsite;host=localhost", "AdminUser", "WCaG4qK8sEuvP5U4");
			$rows = $db->query($querystring);
			
			?>
			
		</div>
	</main>
	<footer>
	</footer>
</body>
