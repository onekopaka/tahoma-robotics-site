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
<script type="text/javascript" src="scripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "advanced",
		plugins : "safari,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
		content_css : "",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",
	});
</script>

<p>
	<h2>Tahoma Robotics Club<br />Website Content Management</h2>
</p>

<?php
include_once "editArticleDetails_includes.php";
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
		displayEditArticleDetails($articleId);
	else
		loginForm();
}		
elseif($_SESSION['loggedIn'] == 'yes')
	displayEditArticleDetails($articleId);
?>

</body>

