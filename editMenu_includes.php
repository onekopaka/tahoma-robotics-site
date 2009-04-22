<?php
session_start();


function displayMenuItems()
{
	echo '<h3>Logged in successfully.</h3>';
	
	$dbc = @mysqli_connect ($DBHOST, $DBUSER, $DBPASS, $DBNAME) OR die ('Could not connect to MySQL: '.mysqli_connect_error());
	
	$q =    "SELECT MenuId, SeqNbr, Label, PageName ";
	$q = $q."     , CASE WHEN IFNULL(ShowBackgroundInd, 0) = 0 THEN 'No' ELSE 'Yes' END ShowBackgroundInd ";
	$q = $q."     , CASE WHEN IFNULL(ActiveInd, 0) = 0 THEN 'No' ELSE 'Yes' END ActiveInd ";
	$q = $q."FROM trcmenu ";
	$q = $q."ORDER BY SeqNbr ";

	$r = mysqli_query($dbc, $q);

	echo '<table><tr><th><p>Navigation Links:</p></th></tr>';
	echo '<tr>';
	echo '<td></td>';
	echo '<td><p>Menu Label</p></td>';
	echo '<td><p>Page value</br> used in urls</p></td>';
	echo '<td><p>Show BG Image</p></td>';
	echo '<td><p>Active</p></td>';
	echo '</tr>';

	while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
		echo '<tr>';
		echo '<td>';
		echo    '<a title="Move this entry up"   href="editProcess.php?function=menuItemMoveUp&menuId='.$row[MenuId].'&seqNbr='.$row[SeqNbr].'">  <img src="images/arrow_top.gif" width="20" height="20"></a> ';
		echo    '<a title="Move this entry down" href="editProcess.php?function=menuItemMoveDown&menuId='.$row[MenuId].'&seqNbr='.$row[SeqNbr].'"><img src="images/arrow_down.gif" width="20" height="20"></a> ';
		echo    '<a title="Edit this entry"      href="editMenuItem.php?menuId='.$row[MenuId].'">                                                 <img src="images/reply.gif" width="20" height="20"></a> ';
		echo    '<a title="Delete this entry">                                                                                                    <img src="images/action_delete.gif" width="20" height="20"></a> ';
		echo    '<a title="Edit menu Articles"   href="editArticle.php?menuId='.$row[MenuId].'">                                                  <img src="images/folder_images.gif" width="20" height="20"></a> ';
		echo '</td>';
		echo '<td><p>'.$row[Label].'</p></td>';
		echo '<td><p>'.$row[PageName].'</p></td>';
		echo '<td><p>'.$row[ShowBackgroundInd].'</p></td>';
		echo '<td><p>'.$row[ActiveInd].'</p></td>';
		echo '</tr>';
	}
	echo '</table>';

	$_SESSION['currentEditPage'] = $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];

}
?>
