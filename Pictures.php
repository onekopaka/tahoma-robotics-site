<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>BEAR METAL Pictures</title>
<script type="text/javascript" src="lightbox/js/prototype.js"></script>
<script type="text/javascript" src="lightbox/js/scriptaculous.js?load=effects,builder"></script>
<script type="text/javascript" src="lightbox/js/lightbox.js"></script>
<style type="text/css">
/* make the page links stylus / finger friendly */
body {
	background: #000;
	color: #fff;
}
#pages {
	font-size: 36px;
}
a:link{
	color: #f90;
	text-decoration: underline;
}
</style>
<link rel="stylesheet" href="lightbox/css/lightbox.css" type="text/css" media="screen" />
</head>

<body>
<div id="gobackhome">
	<a href="index.php" alt="Go Home">Go Back Home</a>
</div>
<div id="pictures">
<?php
//define the path as relative
$path = "newpictures/page1";
$page = $_GET["page"];
 if($page == 1 || $page == 2 || $page == 3 || $page == 4 || $page == 5 || $page == 6 || $page == 7 || $page == 8 || $page == 9 || $page == 10) {
	 $path = "newpictures/page" . $page;
 } else {
	 $page = 1;
 }
//using the opendir function
$dir_handle = @opendir($path) or die("Unable to open $path");

//running the while loop
while ($file = readdir($dir_handle)) 
{
	if($file != '.' && $file != '..') {
?>
<a href="<?php echo('newpictures/page' . $page . '/' . $file); ?>" rel="lightbox"><img src="<?php echo('newpictures/page' . $page . '/' . $file); ?>" height="100" alt="<?php echo($file); ?>"  /></a>
<?php
}
}
//closing the directory
closedir($dir_handle);
?>
</div>
<div id="pages">
Pages:
| <?php
$pc = 1;
while($pc <= 5) {
?>
<a href="/sites/robotics/Pictures.php?page=<?php echo($pc); ?>"><?php echo($pc); ?></a> |
<?php 
$pc++;
} ?>
</div>
</body>
</html>
