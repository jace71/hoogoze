<?php

// process check out
if (isset($_GET['checkout']))
{
	include $_SERVER['DOCUMENT_ROOT'] . '/hoogoze/db.inc.php';
	$checkinID = mysqli_real_escape_string($link, $_GET['kid']);
	
	$sql = "UPDATE checkins SET currently_checked_in = '0' WHERE id = '$checkinID'";
	if (!mysqli_query($link, $sql))
	{
		$error = "Error processing check out";
		echo ($error);
		exit();
	}
	
	header('Location: .');
	exit();
}

// process check in form
if (isset($_GET['checkin']))
{
	include $_SERVER['DOCUMENT_ROOT'] . '/hoogoze/db.inc.php';
	$child_id = mysqli_real_escape_string($link, $_POST['child_id']);
	$checkin_date = date('Y-m-d');
	$checkin_time = date('H:i:s');
	$responsible = mysqli_real_escape_string($link, $_POST['responsible']);
	$instructions = mysqli_real_escape_string($link, $_POST['instructions']);
	$feed_time = mysqli_real_escape_string($link, $_POST['feed_time']);
	$ozs = mysqli_real_escape_string($link, $_POST['ozs']);
	
	
	$sql = "INSERT INTO checkins SET child_id = '$child_id', checkin_date = '$checkin_date', checkin_time = '$checkin_time', currently_checked_in = '1', responsible = '$responsible', instructions = '$instructions', feed_time = '$feed_time', ozs = '$ozs'";
	if (!mysqli_query($link, $sql))
    {
        $error = 'Error adding new record';
    }
	$checkin_id = mysqli_insert_id($link);
	
	$childSql = "SELECT first_name, last_name, alergies FROM inventory WHERE id = '$child_id'";
	$childResult = mysqli_query($link, $childSql);
	if (!$childResult)
	{
		$error = "Error retrieving child name";
	}
	$row = mysqli_fetch_array($childResult);
	
	$pagetitle = 'Print label for ' . $row['first_name'];
	$labelName = $row['first_name'] . ' ' . $row['last_name'];
	$labelAlergies = $row['alergies'];
	$labelId = $checkin_id;
	
	$checkinNames[] = array('id' => $labelId, 'name' => $row['first_name'] . ' ' . $row['last_name'], 'alergies' => $row['alergies']);
	
	include "label.html.php";
	exit();
}

// include pre-check-in form
if (isset($_GET['precheck']))
{
	$pagetitle = "Pre-Print Labels";
	$action = "labellist";
	$button = "Generate Labels";
	
	include $_SERVER['DOCUMENT_ROOT'] . '/hoogoze/db.inc.php';
	
	$namesSql = "SELECT id, first_name, last_name FROM inventory ORDER BY last_name";
	$allNamesList = mysqli_query($link,$namesSql);
	if (!$allNamesList) {
		$error = "Error retrieving names";
		echo $error;
		exit();
	}
	while ($allNamesRow = mysqli_fetch_array($allNamesList)){
		$allNames[] = array('id' => $allNamesRow['id'], 'name' => $allNamesRow['last_name'] . ', ' . $allNamesRow['first_name']);
	}
	include "preprint.html.php";
	exit();
}

// process pre-check-in form
if (isset($_GET['labellist'])) {
	include $_SERVER['DOCUMENT_ROOT'] . '/hoogoze/db.inc.php';
	
	$nameList = '';
	foreach($_POST['namelist'] as $child_id) {
		$nameList = $nameList . $child_id . ',';
	}
	
	$nameList = rtrim($nameList, ',');
	
	$sql = "SELECT id, first_name, last_name, alergies FROM inventory WHERE id IN (" . $nameList . ")";
	
	$precheckSqlResult = mysqli_query($link,$sql);
	while ($row = mysqli_fetch_array($precheckSqlResult)) {
		$child_id = $row['id'];
		$instructions = '';
		$feed_time = '';
		$ozs = '';
		
		$checkinSql = "INSERT INTO checkins SET child_id = '$child_id', checkin_date = '1999-09-09', checkin_time = '00:00:00', currently_checked_in = '0', responsible = 'pre-check', instructions = '$instructions', feed_time = '$feed_time', ozs = '$ozs'"; 
		if (!mysqli_query($link, $sql))
		{
			$error = 'Error adding new record';
		}
		$checkin_id = mysqli_insert_id($link);
			
		$checkinNames[] = array('id' => $checkin_id, 'name' => $row['first_name'] . ' ' . $row['last_name'], 'alergies' => $row['alergies']);
	}
	
	include "label.html.php";
	exit();
}

// include form to check in
$pagetitle = "Check In";
$action = "checkin";
$button = "Check In";

include $_SERVER['DOCUMENT_ROOT'] . '/hoogoze/db.inc.php';

$checkinsSql = "SELECT inventory.id, inventory.first_name, inventory.last_name, checkins.id AS cid, checkins.checkin_date, checkins.child_id, checkins.currently_checked_in 
				FROM checkins 
				INNER JOIN inventory 
				ON checkins.child_id = inventory.id 
				AND currently_checked_in = '1'
				ORDER BY inventory.last_name, inventory.first_name";

$checkinsResult = mysqli_query($link, $checkinsSql);
if (!$checkinsResult)
{
	$error = "Error retrieving list of checkins";
	echo $error;
	exit();
}
while ($checkinRow = mysqli_fetch_array($checkinsResult))
{
	$checkinNames[] = array('id' => $checkinRow['cid'], 'name' => $checkinRow['last_name'] . ', ' . $checkinRow['first_name']);
}

// >>> Pre check column
$precheckinSql = "SELECT inventory.id, inventory.first_name, inventory.last_name, checkins.id AS cid, checkins.checkin_date, checkins.child_id, checkins.currently_checked_in 
				FROM checkins 
				INNER JOIN inventory 
				ON checkins.child_id = inventory.id 
				AND currently_checked_in = '0'
				ORDER BY inventory.last_name, inventory.first_name";

$precheckinResult = mysqli_query($link, $precheckinSql);
if (!$precheckinResult) {
	$error = "Error retrieving pre checkins";
	echo $error;
	exit();
}
while ($precheckinRow = mysqli_fetch_array($precheckinResult)) 
{
	$precheckinNames[] = array('id' => $precheckinRow['cid'], 'name' => $precheckinRow['last_name'] . ', ' . $precheckinRow['first_name']);
}
// >>> end pre check column

$sql = "SELECT id, first_name, last_name, alergies FROM inventory ORDER BY last_name";
$result = mysqli_query($link, $sql);
if (!$result)
{
	$error = "Error fetching child names";
	exit();
}
while ($row = mysqli_fetch_array($result))
{
	$kidnames[] = array('id' => $row['id'], 'name' => $row['last_name'] . ', ' . $row['first_name'], 'alergies' => $row['alergies']);
}

include "checkin-form.html.php";
exit();

?>