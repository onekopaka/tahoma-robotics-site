<?php session_start() ?>

<html>

<head>
<title>Tahoma Robotics Club - TRC</title>
<link rel="stylesheet" type="text/css" href="stylesheets/style.css" />
</head>

<body>
<div id="wholePage">
<?php

$dbc = @mysqli_connect ('localhost', 'trcweb_attend', 'oreo23', 'trcweb') OR die ('Could not connect to MySQL: '.mysqli_connect_error());
?>

<div id="a">
<img align="left" src="images/TRC-Logo-Small2.png" alt="TRC Logo" />
<img align="left" src="images/TRC-Header.png" alt="TRC Header" />
<img align="right" src="images/TRC-Logo-Small2.png" alt="TRC Logo" />
</div>

<div id="b">

<?php

$q = "SELECT * FROM trcmenu where ActiveInd = 1 order by SeqNbr";

$r = mysqli_query($dbc, $q);

while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {

		
		echo '<a href="index.php?page='.$row[PageName].'" alt="'.$row[Label].'"><p>'.$row[Label].'</p></a>'; 

}

  
?>

</div>

<div id="d">
<iframe src="http://www.google.com/calendar/embed?showTitle=0&amp;showNav=0&amp;showDate=0&amp;showTabs=0&amp;showCalendars=0&amp;mode=AGENDA&amp;wkst=2&amp;src=tahomarobotics%40gmail.com&amp;ctz=America%2FLos_Angeles" style=" border-width:0 " width="170" height="600" frameborder="0" scrolling="no"></iframe>
</div>

<div id="c">

<?php

$q = "SELECT * FROM trcarticle where ActiveInd = 1 and MenuId = ".$menuid." order by SeqNbr";

$r = mysqli_query($dbc, $q);

while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) 
{

		if(ArticleTitle != null)
		{
			echo '<p><strong>'.$row[ArticleTitle].'</strong></p>';
		}

		echo $row[Body];

}
?>


</div>

<div id="f">
<p>Footer</p>
</div>

</div>  

    <?php
    $virtual_page = $currentPage;
    include_once "analyticstracking.php" ?>

</body>
</html>
