<?php
session_start();
include_once("settings.php");

function loginForm()
{
	echo '<form method="post" action="editMenu.php">';

	echo '<h3>username:</h3>';
	echo '<input type="text" name="userName" />';

	echo '<h3>password:</h3>';
	echo '<input type="password" name="password" />';

	echo '<input type="submit" value="login" default="true"/>';
	echo '</form>';
}

function checkLogin()
{
	if(empty($_POST['userName']))
	{
		echo '<p>You must enter a username.</p>';
		$_SESSION['loggedIn'] = 'no';
	}
	if(empty($_POST['password']))
	{
		echo '<p>You must enter a password.</p>';
		$_SESSION['loggedIn'] = 'no';
	}
	if($_POST['userName'] != "editor" || md5($_POST['password']) != $EDITORPASS)
	{
		echo '<p>Incorrect login information. Please try again.</p>';
		$_SESSION['loggedIn'] = 'no';
	}
	if($_POST['userName'] == "editor" && md5($_POST['password']) == $EDITORPASS)
	{
		$_SESSION['loggedIn'] = 'yes';
	}
}

?>
