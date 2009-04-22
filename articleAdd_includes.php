<?php
session_start();

function displayArticleAdd($menuId)
{
	echo '<FORM METHOD="POST" ACTION="editMenu.php"><INPUT TYPE="submit" VALUE="<< Menu Items"></FORM>';
	
	$dbc = @mysqli_connect ($DBHOST, $DBUSER, $DBPASS, $DBNAME) OR die ('Could not connect to MySQL: '.mysqli_connect_error());
	
	$q = "SELECT * FROM trcarticle where MenuId = ".$menuId." order by SeqNbr";

	$r = mysqli_query($dbc, $q);

	echo '<table><tr><th></th></tr>';
	echo '<tr>';
	echo '<td><p>Active Ind</p></td>';
	echo '<td><p>Title</p></td>';
	echo '<td><p>Body</p></td>';
	echo '</tr>';

	while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
		echo '<tr>';
		echo '</td>';
		echo '<td><p><input type="checkbox" name="chkActiveId" value="'.$row[ActiveInd].'" /></p></td>';
		echo '<td><p><input type="text" name="txtArticleTitle" value="'.$row[ArticleTitle].'" /></p></td>';
		echo '<td><p><input type="text" name="txtBody" value="'.$row[Body].'" /></p></td>';
		echo '</tr>';
	}
	echo '</table>';

	$_SESSION['currentEditPage'] = $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
}
?>
