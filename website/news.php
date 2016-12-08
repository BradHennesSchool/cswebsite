<!Doctype html>
<html lang = 'en'>
<head>
<title>
cswebsite
</title>
<meta charset = 'utf-8'>
<link rel='stylesheet' href='styles.css'>
<script src='java.js' type='text/javascript'></script>
</head>
<body>
	<main>
	<div id = "maintitle">
		Winona State Computer Science
	</div>
		<div id="top">
			<ul class="topnav">
				<li><a href="index.html">Home</a></li>
				<li><a class="active" href="news.php">News</a></li>
				<li><a href="timeline.html">Alumni</a></li>
			</ul>
		</div>
		
		<header id = 'newsheader' class = 'col-s-12 col-m-10 col-l-10'>
			News Page
		</header>

		<div class = "wrapper">
			
			<div id = 'links' class = "col-s-12 col-m-1 col-l-1">
				<h3>More Info:</h3>
				<ul class="sidenav">
				<li><a href="http://www.winona.edu" target = "_blank">WSU Home</a></li>
				<li><a href="http://cs.winona.edu/faculty.php" target = "_blank">Faculty</a></li>
			</ul>
				
			</div>
			
			
			<div id = "newsposts" class = "col-s-12 col-m-11 col-l-11">
			
				<?php 
				$currentDate = date("Y/m/d");
				$querystring = "SELECT * FROM `NewsPosts` where DateStart <= '".$currentDate."' and DateExpired >= '".$currentDate."' order by DateExpired desc;";
				
				$db = new PDO("mysql:dbname=cswebsite;host=localhost", "AdminUser", "WCaG4qK8sEuvP5U4");
				$rows = $db->query($querystring);
				
				foreach ($rows as $row) 
				{
					if(strlen($row["Body"]) > 250){
					?><div class = 'content marginspacing col-s-12 col-l-10 col-m-10'><?php	
					}else{
					?><div class = 'content marginspacing col-s-12 col-l-5 col-m-5'><?php
					}?>
						<h2><?= $row["Title"]?></h2>
						<P>
							<?= $row["Body"]?>
						</p>
						<span class = 'small'><?= $row["Author"]?></span>
					</div>
				<?php
				}?>
			
			</div>
		
		</div>
		
		
	</main>
	<footer>
		
	</footer>

</body>
