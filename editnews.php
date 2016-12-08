<!Doctype html>
<!-- This page creates a form for each news post in the database
and populates the default values for those forms with information form
the database -->
<html lang = 'en'>
<head>
<title>
cswebsite
</title>
<meta charset = 'utf-8'>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel='stylesheet' href='website/styles.css'>

<script src='website/java.js' type='text/javascript'></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
<body>
	<main>
	<div id = "maintitle">
		Winona State Computer Science Admin
	</div>
	<div id="top">
			<ul class="topnav" id="myTopnav">
				<li><a class="active" href="editnews.php">Edit News Articles</a></li>
				<li><a href="addnews.html">Add News Articles</a></li>
				</li>
			</ul>
		</div>
		
		<header id = 'newsheader' class = 'col-s-12 col-m-10 col-l-10'>
			Add a new news article
		</header>
		
		<div id = "newsposts" class = "col-s-12 col-m-12 col-l-12">
		
			<?php 
			$currentDate = date("Y/m/d");
			$querystring = "SELECT * FROM `NewsPosts` order by DateExpired desc;";
			
			$db = new PDO("mysql:dbname=cswebsite;host=localhost", "AdminUser", "WCaG4qK8sEuvP5U4");
			$rows = $db->query($querystring);
			//echo $currentDate;
			//echo $querystring;
			
			foreach ($rows as $row) 
			{
				
				?>
				<div class = 'editcontent marginspacing col-s-10 col-l-5 col-m-5'>
					
					
				<form action = "submitchange.php" method = "POST">
					<input type = "checkbox" name = "delete" value = "delete">Remove post?
					<p>
						Author of news post: <input type = "text" name = "author" value = "<?=$row["Author"]?>">
					</p>
					<p>
						Title of news post <br>
						<input type = "text" name = "title" value = "<?=$row["Title"]?>">
					</p>
					<p>
						<textarea class = 'textbox textboxsize' name="body"><?=$row["Body"]?></textarea>
					</p>
					<p>
					Show from: 
					<input type = "text" class = "datepicker" name = "start" value = "<?=$row["DateStart"]?>">
					To: 
					<input type = "text" class = "datepicker" name = "expire" value = "<?=$row["DateExpired"]?>"><br>
					</p>
					
					<input type="hidden" name="id" value="<?=$row["id"]?>">
					
					<input class = "submitbutton" type="submit" value="Make changes">
				
					</form>
				
				</div>
			<?php
			}?>
		
		</div>
		
	</main>
	<footer>
		
	</footer>

</body>
