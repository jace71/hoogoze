<?php

// delete existing user

//new organization


// add new user
	// include form for new user
if (isset($_GET['add'])) {
	$pagetitle = 'New User';
    $action = 'addform';	
    $first_name = '';
    $last_name = '';
    $email = '';
	$password = '';
	$org_id = '';	
	$button = 'Add Registration';
	
	$orgSql = "SELECT id, org_name FROM organization";
	$result = mysqli_query($link,$orgSql);
	if (!$result) {
		$error = "Error fetching organization list";
		exit();
	}
	while($row = mysqli_fetch_array($result)) {
		$orgs[] = array(
			'id' => $row['id'],
			'org_name' => $row['org_name'],
			'selected' => FALSE
		);
	}
	
    include 'add-edit-user.html.php';
    exit();
}

	// process the form for adding new user
if (isset($_GET['addform'])) {
	include $_SERVER['DOCUMENT_ROOT'] . '/hoogoze/db.inc.php';
    $first_name = mysqli_real_escape_string($link, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($link, $_POST['last_name']);
    $email = mysqli_real_escape_string($link, $_POST['email']);
	$password = md5(mysqli_real_escape_string($link, $_POST['password']) . 'hoogoze');
	$org_id = mysqli_real_escape_string($link, $_POST['org_id']);
	
	$newUserSql = "INSERT INTO users SET first_name = '$first_name', last_name = '$last_name', email = '$email', password = '$password', org_id = '$org_id'";
	if (!mysqli_query($link, $newUserSql))
    {
        $error = 'Error adding new record';
    }
    header('Location: .');
    exit();
}

// edit existing user
	// include the form for editing an existing user
if (isset($_POST['action']) and $_POST['action'] == 'Edit') {
	include $_SERVER['DOCUMENT_ROOT'] . '/hoogoze/db.inc.php';
    $id = mysqli_real_escape_string($link, $_POST['id']);
    $sql = "SELECT id, first_name, last_name, email, password, org_id FROM users WHERE id = '$id'";
    $result = mysqli_query($link, $sql);
    if (!$result)
    {
        $error = 'Error fetching registration details';
    }
    $row = mysqli_fetch_array($result);
    $pagetitle = 'Edit User';
    $action = 'editform';
	$id = $row['id'];
    $first_name = $row['first_name'];
    $last_name = $row['last_name'];
    $email = $row['email'];
	$password = $row['password'];
	$org_id = $row['org_id'];
	
	$button = 'Update User';
	
	$orgSql = "SELECT id, org_name FROM organization";
	$result = mysqli_query($link,$orgSql);
	if (!$result) {
		$error = "Error fetching organization list";
		exit();
	}
	while($row = mysqli_fetch_array($result)) {
		$orgs[] = array(
			'id' => $row['id'],
			'org_name' => $row['org_name'],
			'selected' => ($row['id'] == $org_id)
		);
	}
	
    include 'add-edit-user.html.php';
    exit();
}

	// process the form for editing an existing user
if (isset($_GET['editform'])) {
	include $_SERVER['DOCUMENT_ROOT'] . '/hoogoze/db.inc.php';
    $id = mysqli_real_escape_string($link, $_POST['id']);
    $first_name = mysqli_real_escape_string($link, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($link, $_POST['last_name']);
    $email = mysqli_real_escape_string($link, $_POST['email']);	
	$sql = "UPDATE users SET
        first_name = '$first_name',
        last_name = '$last_name',
        email = '$email'		
        WHERE id = '$id'";
    if (!mysqli_query($link, $sql))
    {
        $error = 'Error updating record';
    }	
	
	if ($_POST['password'] != '') {
		$password = md5(mysqli_real_escape_string($link, $_POST['password']) . 'hoogoze');
		$sql = "UPDATE users SET
        password = '$password'		
        WHERE id = '$id'";
		if (!mysqli_query($link, $sql))
		{
			$error = 'Error setting password';
		}		
	}	
	
	header('Location: .');
    exit();
}

// list users
$pagetitle = "User List";


?>