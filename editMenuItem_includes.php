<?php
session_start();


function displayEditMenuItem()
{
	echo '<h3>Logged in successfully.</h3>';
	
	$dbc = @mysqli_connect ($DBHOST, $DBUSER, $DBPASS, $DBNAME) OR die ('Could not connect to MySQL: '.mysqli_connect_error());
	
	$q = "SELECT * FROM trcmenu where MenuId = ".$_REQUEST[menuId]."";

	$r = mysqli_query($dbc, $q);

	while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
		echo '<h3>Editing data for page '.$row[Label].'</h3>';
	
		echo '<table>';
		echo '<tr>';
		echo '<td>Page Name</td>';
		echo '<td>Page value<br />used in urls</td>';	
		echo '<td>Show BG Image<br />indicator</td>';
		echo '<td>Active Ind</td>';
		echo '</tr>';
	
		echo '<tr><form method="post" action="editProcess.php?function=menuItemSave&menuId='.$row[MenuId].'">';
		echo '<td><input type="text" name="txtLabel" value="'.$row[Label].'" /></td>';
		echo '<td><input type="text" name="txtPageName" value="'.$row[PageName].'" /></td>';
		if($row[ShowBackgroundInd] == 1)
			echo '<td><input type="checkbox" name="chkShowBackgroundInd" checked /></td>';
		else
			echo '<td><input type="checkbox" name="chkShowBackgroundInd" /></td>';
		if($row[ActiveInd] == 1)
			echo '<td><input type="checkbox" name="chkActiveInd" checked /></td>';
		else
			echo '<td><input type="checkbox" name="chkActiveInd" /></td>';
		echo '</tr>';
		echo '</table>';
    }
	echo '<input type="submit" value="save" default="true"/></form>';
	echo '<form action="editMenu.php"><input type="submit" value="cancel" default="true"/></form>';


	$_SESSION['currentEditPage'] = $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
}
?>
