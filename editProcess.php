<?php session_start(); ?>
<HTML>
<head></head>
<body>
<?php


function articleMoveUp($MenuId,$SeqNbr)
{
	$dbc = @mysqli_connect ('localhost', 'trcweb_attend', 'oreo23', 'trcweb') OR die ('Could not connect to MySQL: '.mysqli_connect_error());

	$q = "call spArticleMoveUp(".$MenuId.",".$SeqNbr.");";

	$r = mysqli_query($dbc, $q);

	echo '<META HTTP-EQUIV="refresh" CONTENT="0;URL=http://'.$_SESSION['currentEditPage'].'">';

}
function articleMoveDown($MenuId,$SeqNbr)
{
	$dbc = @mysqli_connect ('localhost', 'trcweb_attend', 'oreo23', 'trcweb') OR die ('Could not connect to MySQL: '.mysqli_connect_error());

	$q = "call spArticleMoveDown(".$MenuId.",".$SeqNbr.");";

	$r = mysqli_query($dbc, $q);

	echo '<META HTTP-EQUIV="refresh" CONTENT="0;URL=http://'.$_SESSION['currentEditPage'].'">';
}
function menuItemMoveUp($MenuId,$SeqNbr)
{
	$dbc = @mysqli_connect ('localhost', 'trcweb_attend', 'oreo23', 'trcweb') OR die ('Could not connect to MySQL: '.mysqli_connect_error());

	$q = "call spMenuItemMoveUp(".$MenuId.",".$SeqNbr.");";

	$r = mysqli_query($dbc, $q);
	
	echo '<META HTTP-EQUIV="refresh" CONTENT="0;URL=http://'.$_SESSION['currentEditPage'].'">';
}
function menuItemMoveDown($MenuId,$SeqNbr)
{
	$dbc = @mysqli_connect ('localhost', 'trcweb_attend', 'oreo23', 'trcweb') OR die ('Could not connect to MySQL: '.mysqli_connect_error());

	$q = "call spMenuItemMoveDown(".$MenuId.",".$SeqNbr.");";

	$r = mysqli_query($dbc, $q);

	echo '<META HTTP-EQUIV="refresh" CONTENT="0;URL=http://'.$_SESSION['currentEditPage'].'">';
}
function menuItemSave($MenuId)
{
	$dbc = @mysqli_connect ('localhost', 'trcweb_attend', 'oreo23', 'trcweb') OR die ('Could not connect to MySQL: '.mysqli_connect_error());
	
	if (!isset($_POST['chkShowBackgroundInd']))
	  $_showBackgroundInd = 0;
	else
	  $_showBackgroundInd = 1;

	if (!isset($_POST['chkActiveInd']))
	  $_chkActiveInd = 0;
	else
	  $_chkActiveInd = 1;

	//$q = "call spMenuItemSave(".$MenuId.",'".$_POST['txtLabel']."','".$_POST['txtPageName']."',".isset($_POST['chkShowBackgroundInd']).",".isset($_POST['chkActiveInd']).");";
	$q = "call spMenuItemSave(".$MenuId.",'".$_POST['txtLabel']."','".$_POST['txtPageName']."',".$_showBackgroundInd.",".$_chkActiveInd.");";
	
	$r = mysqli_query($dbc, $q);
//   echo $q;

	echo '<META HTTP-EQUIV="refresh" CONTENT="0;URL=editMenu.php">';

}
function articleSave($menuId)
{
	$dbc = @mysqli_connect ('localhost', 'trcweb_attend', 'oreo23', 'trcweb') OR die ('Could not connect to MySQL: '.mysqli_connect_error());
	
	if (!isset($_POST['chkActiveInd']))
	  $_chkActiveInd = 0;
	else
	  $_chkActiveInd = 1;

	$q = "call spArticleSave(".$_POST['articleId'].",".$_chkActiveInd.",'".$_POST['txtArticleTitle']."','".$_POST['txtArticleBody']."');";
	
	$r = mysqli_query($dbc, $q);

	echo '<META HTTP-EQUIV="refresh" CONTENT="0;URL=editArticle.php?menuId='.$menuId.'">';
}
function menuItemDelete($SeqNbr)
{
	echo '<META HTTP-EQUIV="refresh" CONTENT="0;URL=http://'.$_SESSION['currentEditPage'].'">';
}
function articleDelete($menuId)
{
	$dbc = @mysqli_connect ('localhost', 'trcweb_attend', 'oreo23', 'trcweb') OR die ('Could not connect to MySQL: '.mysqli_connect_error());

	$q = "call spArticleDelete(".$_POST['articleId'].");";

	$r = mysqli_query($dbc, $q);

	echo '<META HTTP-EQUIV="refresh" CONTENT="0;URL=editArticle.php?menuId='.$menuId.'">';
}
function menuItemAdd($SeqNbr)
{
	echo '<META HTTP-EQUIV="refresh" CONTENT="0;URL=http://'.$_SESSION['currentEditPage'].'">';
}
function articleAdd($MenuId,$loc)
{
	$dbc = @mysqli_connect ('localhost', 'trcweb_attend', 'oreo23', 'trcweb') OR die ('Could not connect to MySQL: '.mysqli_connect_error());

	$q = "call spArticleAdd(".$MenuId.",".$loc.");";

	$r = mysqli_query($dbc, $q);
	
	while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {

	echo '<META HTTP-EQUIV="refresh" CONTENT="0;URL=editArticleDetails.php?articleId='.$row[newArticleId].'">';
	}
}



if($_REQUEST['function'] == "articleMoveUp")
{
	articleMoveUp($_REQUEST['menuId'],$_REQUEST['seqNbr']);
}
elseif($_REQUEST['function'] == "articleMoveDown")
{
	articleMoveDown($_REQUEST['menuId'],$_REQUEST['seqNbr']);
}
elseif($_REQUEST['function'] == "menuItemMoveUp")
{
	menuItemMoveUp($_REQUEST['menuId'],$_REQUEST['seqNbr']);
}
elseif($_REQUEST['function'] == "menuItemMoveDown")
{
	menuItemMoveDown($_REQUEST['menuId'],$_REQUEST['seqNbr']);
}
elseif($_REQUEST['function'] == "menuItemSave")
{
	menuItemSave($_REQUEST['menuId']);
}
elseif($_REQUEST['function'] == "articleSave")
{
	articleSave($_REQUEST['menuId']);
}
elseif($_REQUEST['function'] == "menuItemDelete")
{
	menuItemDelete($_REQUEST['menuId'],$_REQUEST['seqNbr']);
}
elseif($_REQUEST['function'] == "articleDelete")
{
	articleDelete($_REQUEST['menuId']);
}
elseif($_REQUEST['function'] == "menuItemAdd")
{
	menuItemAdd();
}
elseif($_REQUEST['function'] == "articleAdd")
{
	articleAdd($_REQUEST['menuId'],$_REQUEST['loc']);
}


?>
</body>
</html>
