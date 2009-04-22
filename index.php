<?php session_start(); 
include_once "browser_detection.php";
$currentPage = $_REQUEST[page];
if(!$_REQUEST[page])
{
	$currentPage = "TrcHome";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US" xml:lang="en-US">
<head>
	<title>BEAR METAL</title>
	<?php
		$dbc = @mysqli_connect ('localhost', 'trcweb_attend', 'oreo23', 'trcweb') OR die ('Could not connect to MySQL: '.mysqli_connect_error());
		$q = "SELECT * FROM trcmenu where PageName = '".$currentPage."' order by SeqNbr";
		$r = mysqli_query($dbc, $q);
		$row = mysqli_fetch_array($r, MYSQLI_ASSOC);
		$menuid = $row[MenuId];
		if(!$row[ShowBackgroundInd]) {
?>
		<link rel="stylesheet" type="text/css" href="stylesheets/styleNoBG.css" />
<?php	} else { ?>
		<link rel="stylesheet" type="text/css" href="stylesheets/style.css" />
<?php }; ?>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
	<div id="wholePage">
		<div id="header" style="text-align: center;">
			<img src="images/bear_metal_banner.png" alt="Bear Metal Header" />
		</div>
		<div id="navbar">
			<?php
				$q = "SELECT * FROM trcmenu where ActiveInd = 1 order by SeqNbr";
				$r = mysqli_query($dbc, $q);
				while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
					echo '<p onclick="document.location = \'http://tahomarobotics.org/?page='.$row[PageName].'\'"><a href="?page='.$row[PageName].'" title="'.$row[Label].'">'.$row[Label].'</a></p>'; 
				}
			?>
            <span style="text-align: center;"><a href="http://usfirst.org/"><img src="http://farm4.static.flickr.com/3468/3383779632_c1546f33cc_t_d.jpg" alt="FIRST Logo"/></a></span>
		</div>
		<div id="content">
			<?php
				$q = "SELECT * FROM trcarticle where ActiveInd = 1 and MenuId = ".$menuid." order by SeqNbr";
				$r = mysqli_query($dbc, $q);
				while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
					if(ArticleTitle != null) {
					echo '<p><strong>'.$row[ArticleTitle].'</strong></p>';
					};
				echo $row[Body];
				};
			?>
            <hr />
            <script>
			var idcomments_acct = '8626a970c9c50081267283eec4cc9515';
			var idcomments_post_id;
			var idcomments_post_url;
			</script>
			<span id="IDCommentsPostTitle" style="display:none"></span>
			<script type='text/javascript' src='http://www.intensedebate.com/js/genericCommentWrapperV2.js'></script>
		</div>
		<div id="calendar">
			<img src="images/turbo.jpg" alt="Turbo" />
            <div id="imagedesc" style="text-align: center; background-color: #006; color: #fff;">Bear Metal's 2009 robot.</div>
		</div>
		<div id="footer">
			<pre>Admin: <a href="editMenu.php">Login Here</a></pre>
		</div>
	</div>
	<?php
		$virtual_page = $currentPage;
		include_once "analyticstracking.php";
	?>
</body>
</html>
