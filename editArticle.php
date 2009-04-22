<?php session_start(); 
$menuId = $_REQUEST[menuId];

/*($currentPage = $_REQUEST[page];
if(!$_REQUEST[page])
{
	$currentPage = "Navbar";
}*/


?>

<html>
<head>
<title>TRC Web Content</title>
<link rel="stylesheet" type="text/css" href="stylesheets/editStyle.css" />
</head>

<body>

<p>
	<h2>Tahoma Robotics Club<br />Website Content Management</h2>
</p>

<?php
include_once "editArticle_includes.php";
include_once "security_includes.php";


if(!isset($_SESSION['loggedIn']))
{
	loginForm();
	$_SESSION['loggedIn'] = 'no';
}
elseif($_SESSION['loggedIn'] == 'no')
{
	checkLogin();
	if($_SESSION['loggedIn'] == 'yes')
		displayArticleItems($menuId);
	else
		loginForm();
}
elseif($_SESSION['loggedIn'] == 'yes')
	displayArticleItems($menuId);
?>

</body>

