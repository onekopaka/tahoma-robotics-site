<?php
session_start();

function displayArticleConfirmDelete($articleId)
{
	
	
	$dbc = @mysqli_connect ($DBHOST, $DBUSER, $DBPASS, $DBNAME) OR die ('Could not connect to MySQL: '.mysqli_connect_error());
	
	$q = "SELECT * FROM trcarticle where ArticleId = ".$articleId.";";

	$r = mysqli_query($dbc, $q);

	echo '<table><tr><th></th></tr>';
	echo '<tr>';
	echo '<td><p>Active</p></td>';
	echo '<td><p>Title</p></td>';
	echo '<td><p>Body</p></td>';
	echo '</tr>';
	
	while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
		$_menuId = $row[MenuId];	
		echo '<tr><FORM METHOD="POST" ACTION="editProcess.php?function=articleDelete&menuId='.$row[MenuId].'">';
		echo '</td>';
		if($row[ActiveInd] == 1)
			echo '<td><input disabled type="checkbox" name="chkActiveInd" checked /></td>';
		else
			echo '<td><input disabled type="checkbox" name="chkActiveInd" /></td>';
		echo '<td><p><input disabled type="text" name="txtArticleTitle" value="'.$row[ArticleTitle].'" /></p></td>';
		echo '<td><textarea disabled name="txtArticleBody" cols="80" rows="8">';
		echo '<p>'.$row[Body].'</p>';
		echo '</textarea></td></tr>';
	}
	echo '</table>';

	echo '<input type="hidden" name="articleId" value="'.$articleId.'"><INPUT TYPE="submit" VALUE="delete"></FORM>';
	echo '<FORM METHOD="POST" ACTION="editArticle.php?menuId='.$_menuId.'"><INPUT TYPE="submit" VALUE="cancel"></FORM>';

	$_SESSION['currentEditPage'] = $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
}
?>
