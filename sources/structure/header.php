<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo $sitetitle; ?></title>
<link rel="icon" href="favicon.ico" type="image/x-icon" />
<link href="<?php echo $siteurl; ?>assets/css/<?php echo $theme; ?>.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $siteurl; ?>assets/css/addon.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $siteurl; ?>assets/css/<?php echo $themetype; ?>.css" rel="stylesheet" type="text/css" />
<style>
body{
	background: #<?php echo $bgcolor; ?> url(<?php echo $background; ?>) <?php echo $bgrepeat . " " . $bgcenter; ?>;
	<?php
	if($bgfixed == 1) {
	echo "background-attachment: fixed;";
	}
	if($bgcover == 1) {
	echo "
	background-size: cover;";
	}
	?>
	
}
</style>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo $siteurl; ?>assets/js/bootstrap.js"></script>
<script type="text/javascript" src="<?php echo $siteurl; ?>assets/js/login.js"></script>
<script>
	function roll(img_name1, img_src1) {document[img_name1].src = img_src1;}
	function goBack() {window.history.back()}
</script>
<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
  <script src="<?php echo $siteurl; ?>assets/js/ie/html5shiv.js"></script>
  <script src="<?php echo $siteurl; ?>assets/js/ie/respond.min.js"></script>
<![endif]-->
</head>
<body>
<div class="container">
<?php
if($banner != ""){echo "<img src=\"".$banner."\" alt=\"banner\" class=\"img-responsive\" style=\"margin: 0 auto;margin-top:20px;\">";} 
?>
<nav class="<?php echo getNav();?>" role="navigation" style="bottom:-22px;">
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
			$name = $_SESSION['name']; // Probably unneeded
			$getemail = $mysqli->query("SELECT email, name FROM accounts WHERE name = '". $_SESSION['name']."'");
			$fetchemail = $getemail->fetch_assoc();
		?>
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?php echo get_small_gravatar($fetchemail['email']);?>" alt="gravatar" class="img-responsive" style="float:left;margin-top: -10px;padding-right: 5px;"><?php echo $name; ?><b class="caret"></b></a>
					<ul class="dropdown-menu">
					<?php
						if($_SESSION['pname'] == "checkpname") {
							echo "<li><a href=\"?base=ucp&amp;page=profname\">Set Profile Name</a></li>";
						}
						else {
							echo "<li><a href=\"?base=main&amp;page=members&amp;name=".$_SESSION['pname']."\">Profile</a></li>";
						}
					?>
						<li><a href="?base=ucp&amp;page=mail&amp;s=3"><?php mailStats(3)?> Unread Mail</a></li>
						<li><a href="?base=ucp&amp;page=charfix">Character Fix</a></li>
						<li class="divider"></li>
						<li><a href="?base=misc&amp;script=logout">Log Out</a></li>
					</ul>
				</li>
			</ul>
		<?php } ?>
	</div>
</nav>

<div class="well">
<div class="row">
	<div class="col-md-3">
		<?php include("sources/structure/sidebar.php"); ?>
	</div>
<div class="col-md-9">