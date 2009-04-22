<?php session_start(); 
$articleId = $_REQUEST[articleId];

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

<p>
  <h2>Are you sure you want to delete this Article?</h2>
</p>

<?php
include_once "articleConfirmDelete_includes.php";
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
		displayArticleConfirmDelete($articleId);
	else
		loginForm();
}	
elseif($_SESSION['loggedIn'] == 'yes')
	displayArticleConfirmDelete($articleId);
?>

</body>

