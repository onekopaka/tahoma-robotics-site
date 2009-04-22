<?php
session_start();

function displayArticleItems($menuId)
{
	echo '<FORM METHOD="POST" ACTION="editMenu.php"><INPUT TYPE="submit" VALUE="<< Menu Items"></FORM>';
	echo '<p>Add a new article...</p>';
	echo '<FORM class="styled1" METHOD="POST" ACTION="editProcess.php?function=articleAdd&menuId='.$menuId.'&loc=0"><INPUT TYPE="submit" VALUE="...to top"></FORM>';
	echo '<FORM class="styled2" METHOD="POST" ACTION="editProcess.php?function=articleAdd&menuId='.$menuId.'&loc=1"><INPUT TYPE="submit" VALUE="...to bottom"></FORM>';
	echo '';
	
	$dbc = @mysqli_connect ($DBHOST, $DBUSER, $DBPASS, $DBNAME) OR die ('Could not connect to MySQL: '.mysqli_connect_error());
	
	$q=     "SELECT ArticleId, MenuId, SeqNbr, ArticleTitle, Body ";
    $q = $q."     , CASE WHEN IFNULL(ActiveInd, 0) = 0 THEN 'No' ELSE 'Yes' END ActiveInd ";
    $q = $q."FROM trcarticle a ";
    $q = $q."WHERE a.MenuId = ".$menuId." ";
    $q = $q."ORDER BY SeqNbr ";

	$r = mysqli_query($dbc, $q);

	echo '<table><tr><th></th></tr>';
	echo '<tr>';
	echo '<td></td>';

	echo '<td><p>Active</p></td>';
	echo '<td><p>Title</p></td>';
	echo '<td><p>Body</p></td>';
	echo '</tr>';

	while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
		echo '<tr>';
		echo    '<td width="54"><p><a title="Edit this entry" href="editArticleDetails.php?articleId='.$row[ArticleId].'"><img class="styled1" src="images/reply.gif" width="20" height="20" /></a> ';
		echo    '<a title="Move this entry up" href="editProcess.php?function=articleMoveUp&menuId='.$row[MenuId].'&seqNbr='.$row[SeqNbr].'"><img class="styled2" src="images/arrow_top.gif" width="20" height="20"></a> </p>';
		echo    '<p><a title="Delete this entry" href="articleConfirmDelete.php?articleId='.$row[ArticleId].'"><img class="styled1" src="images/action_delete.gif" width="20" height="20"></a> ';
		echo    '<a title="Move this entry down" href="editProcess.php?function=articleMoveDown&menuId='.$row[MenuId].'&seqNbr='.$row[SeqNbr].'"><img class="styled2" src="images/arrow_down.gif" width="20" height="20"></a> </p>';
		echo '</td>';
	
		echo '<td><p>'.$row[ActiveInd].'</p></td>';
		echo '<td><p>'.$row[ArticleTitle].'</p></td>';
		echo '<td><p>'.$row[Body].'</p></td>';
		echo '</tr>';
	}
	echo '</table>';

	$_SESSION['currentEditPage'] = $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
}
?>
