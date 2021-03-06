<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo $sitetitle.$pb; ?></title>
<link rel="icon" href="favicon.ico" type="image/x-icon" />
<link href="<?php echo $siteurl; ?>assets/css/<?php echo $theme; ?>.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $siteurl; ?>assets/css/addon.css" rel="stylesheet" type="text/css" />
<style type="text/css">
body {
  min-height: 200px;
  padding-top: 90px;
}
</style>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo $siteurl; ?>assets/js/bootstrap.js"></script>
<script type="text/javascript" src="<?php echo $siteurl; ?>assets/js/login.js"></script>
</head>

<body>
<nav class="<?php echo getNav(); ?> navbar-fixed-top" role="navigation">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="#"><?php echo $servername; ?></a>
	</div>	
	<div class="navbar-collapse collapse">
		<ul class="nav navbar-nav">
              <li><a href="?base=main">Home</a></li>
			<?php
				if(!isset($_SESSION['id'])){
					echo "<li><a href=\"?base=main&amp;page=register\">Register</a></li>";
				}
			?>
              <li><a href="?base=main&amp;page=download">Download</a></li>
			  <li><a href="?base=main&amp;page=rankings">Rankings</a></li>
			  <li><a href="?base=main&amp;page=vote">Vote</a></li>
			  <li><a href="<?php echo $forumurl; ?>">Forums</a></li>
			<?php
			$getpages = $mysqli->query("SELECT * from ".$prefix."pages WHERE visible = 1");
			while ($fetchpages = $getpages->fetch_assoc()){ 
				echo "<li><a href=\"?base=main&amp;page=".$fetchpages['slug']."\">" . $fetchpages['title'] . "</a>";
			}
			?>
			
            </ul>
		<?php	
			if(isset($_SESSION['id'])){
			$name = $_SESSION['name'];
		?>
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $name; ?><b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="?cype=main&amp;page=members&amp;name=<?php echo $_SESSION['pname'] ?>">Profile</a></li>
						<li><a href="?cype=ucp&page=mail&s=3"><?php mailStats(3)?> Unread Mail</a></li>
						<li><a href="?cype=ucp&amp;page=charfix">Character Fix</a></li>
						<li class="divider"></li>
						<li><a href="?cype=misc&amp;script=logout">Log Out</a></li>
					</ul>
				</li>
			</ul>
		<?php } ?>
	</div>
</nav>
<body>
<div class="container">
  <div class="row">