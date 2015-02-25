<?php 

// Delete registered child if delete button clicked
if (isset($_POST['action']) and $_POST['action'] == 'Delete') 
{
    include $_SERVER['DOCUMENT_ROOT'] . '/hoogoze/db.inc.php';
    $id = mysqli_real_escape_string($link, $_POST['id']);
    $sql = "SELECT id FROM inventory WHERE id = '$id'";
    $result = mysqli_query($link, $sql);
    if (!$result)
    {
        $error = "Error getting child id";
    }
    
    // Delete parents here <---------------------***
    
    // Delete kids from inventory
    $sql = "DELETE FROM inventory WHERE id = '$id'";
    if (!mysqli_query($link, $sql))
    {
        $error = "Error deleting child record";
    }
    header('Location: .');
    exit();        
}

// Include form for new registration
if (isset($_GET['add']))
{
    $pagetitle = 'New Child Registration';
    $action = 'addform';
    $first_name = '';
    $mid_name = '';
    $last_name = '';
    $birthday = '';
	$alergies = '';
	
	$parent_first_name = '';
	$parent_last_name = '';
	$parent_email = '';
	$parent_phone = '';
	$parent_addr = '';
	$parent_city = '';
	$parent_state = '';
	$parent_zip = '';
	
	$parent2_first_name = '';
	$parent2_last_name = '';
	$parent2_email = '';
	$parent2_phone = '';
	$parent2_addr = '';
	$parent2_city = '';
	$parent2_state = '';
	$parent2_zip = '';
    $id = '';
    $button = 'Add Registration';
    include 'add-edit-form.html.php';
    exit();
}

// Process the form for adding new child registration
if (isset($_GET['addform']))
{
    include $_SERVER['DOCUMENT_ROOT'] . '/hoogoze/db.inc.php';
    $first_name = mysqli_real_escape_string($link, $_POST['first_name']);
    $mid_name = mysqli_real_escape_string($link, $_POST['mid_name']);
    $last_name = mysqli_real_escape_string($link, $_POST['last_name']);
    $birthday = mysqli_real_escape_string($link, $_POST['birthday']);
	$alergies = mysqli_real_escape_string($link, $_POST['alergies']);
	
	$parent_first_name = mysqli_real_escape_string($link, $_POST['parent_first_name']);
	$parent_last_name = mysqli_real_escape_string($link, $_POST['parent_last_name']);
	$parent_email = mysqli_real_escape_string($link, $_POST['parent_email']);
	$parent_phone = mysqli_real_escape_string($link, $_POST['parent_phone']);
	$parent_addr = mysqli_real_escape_string($link, $_POST['parent_addr']);
	$parent_city = mysqli_real_escape_string($link, $_POST['parent_city']);
	$parent_state = mysqli_real_escape_string($link, $_POST['parent_state']);
	$parent_zip = mysqli_real_escape_string($link, $_POST['parent_zip']);
	
	$parent2_first_name = mysqli_real_escape_string($link, $_POST['parent2_first_name']);
	$parent2_last_name = mysqli_real_escape_string($link, $_POST['parent2_last_name']);
	$parent2_email = mysqli_real_escape_string($link, $_POST['parent2_email']);
	$parent2_phone = mysqli_real_escape_string($link, $_POST['parent2_phone']);
	$parent2_addr = mysqli_real_escape_string($link, $_POST['parent2_addr']);
	$parent2_city = mysqli_real_escape_string($link, $_POST['parent2_city']);
	$parent2_state = mysqli_real_escape_string($link, $_POST['parent2_state']);
	$parent2_zip = mysqli_real_escape_string($link, $_POST['parent2_zip']);
	
	$parentSql = "INSERT INTO parents SET first_name = '$parent_first_name', last_name = '$parent_last_name', email = '$parent_email', phone = '$parent_phone', addr = '$parent_addr', city = '$parent_city', state = '$parent_state', zip = '$parent_zip'";
	if (!mysqli_query($link, $parentSql))
    {
        $error = 'Error adding new record';
    }
	$parent1_id = mysqli_insert_id($link);
	
	if ($parent2_first_name) 
	{
		$parent2Sql = "INSERT INTO parents SET first_name = '$parent2_first_name', last_name = '$parent2_last_name', email = '$parent2_email', phone = '$parent2_phone', addr = '$parent2_addr', city = '$parent2_city', state = '$parent2_state', zip = '$parent2_zip'";
		if (!mysqli_query($link, $parent2Sql))
		{
			$error = 'Error adding new record';
		}
		$parent2_id = mysqli_insert_id($link);
	}
	else 
	{
		$parent2_id = null;
	}
	
    $sql = "INSERT INTO inventory SET first_name = '$first_name', mid_name = '$mid_name', last_name = '$last_name', birthday = '$birthday', alergies = '$alergies', parent_1 = '$parent1_id', parent_2 = '$parent2_id'";
    if (!mysqli_query($link, $sql))
    {
        $error = 'Error adding new record';
    }
    header('Location: .');
    exit();
}

// Include form to edit existing registration
if (isset($_POST['action']) and $_POST['action'] == 'Edit')
{
    include $_SERVER['DOCUMENT_ROOT'] . '/hoogoze/db.inc.php';
    $id = mysqli_real_escape_string($link, $_POST['id']);
    $sql = "SELECT id, first_name, mid_name, last_name, birthday, alergies, parent_1, parent_2 FROM inventory WHERE id = '$id'";
    $result = mysqli_query($link, $sql);
    if (!$result)
    {
        $error = 'Error fetching registration details';
    }
    $row = mysqli_fetch_array($result);
    $pagetitle = 'Edit Registration';
    $action = 'editform';
	$id = $row['id'];
    $first_name = $row['first_name'];
    $mid_name = $row['mid_name'];
    $last_name = $row['last_name'];
    $birthday = $row['birthday'];
	$alergies = $row['alergies'];
	$parent_1 = $row['parent_1'];
	$parent_2 = $row['parent_2'];
	
 	if ($parent_1)
	{
		$parentSql = "SELECT id, first_name, last_name, email, phone, addr, city, state, zip FROM parents WHERE id = '$parent_1'";
		$result = mysqli_query($link, $parentSql);
		if (!$result)
		{
			$error = 'Error fetching registration details';
		}
		$row = mysqli_fetch_array($result);
		
		$idp1 = $row['id'];
		$parent_first_name = $row['first_name'];
		$parent_last_name = $row['last_name'];
		$parent_email = $row['email'];
		$parent_phone = $row['phone'];
		$parent_addr = $row['addr'];
		$parent_city = $row['city'];
		$parent_state = $row['state'];
		$parent_zip = $row['zip'];
	}
	
	if ($parent_2)
	{
		$parent2Sql = "SELECT id, first_name, last_name, email, phone, addr, city, state, zip FROM parents WHERE id = '$parent_2'";
		$result = mysqli_query($link, $parent2Sql);
		if (!$result)
		{
			$error = 'Error fetching registration details';
		}
		$row = mysqli_fetch_array($result);
		
		$idp2 = $row['id'];
		$parent2_first_name = $row['first_name'];
		$parent2_last_name = $row['last_name'];
		$parent2_email = $row['email'];
		$parent2_phone = $row['phone'];
		$parent2_addr = $row['addr'];
		$parent2_city = $row['city'];
		$parent2_state = $row['state'];
		$parent2_zip = $row['zip'];
	}	
    
    $button = 'Update Registration';
    include 'add-edit-form.html.php';
    exit();
}

// Process form to edit registration
if (isset($_GET['editform']))
{
    include $_SERVER['DOCUMENT_ROOT'] . '/hoogoze/db.inc.php';
    $id = mysqli_real_escape_string($link, $_POST['id']);
    $first_name = mysqli_real_escape_string($link, $_POST['first_name']);
    $mid_name = mysqli_real_escape_string($link, $_POST['mid_name']);
    $last_name = mysqli_real_escape_string($link, $_POST['last_name']);
    $birthday = mysqli_real_escape_string($link, $_POST['birthday']);
	$alergies = mysqli_real_escape_string($link, $_POST['alergies']);
	
	$idp1 = mysqli_real_escape_string($link, $_POST['idp1']);
	$parent_first_name = mysqli_real_escape_string($link, $_POST['parent_first_name']);
	$parent_last_name = mysqli_real_escape_string($link, $_POST['parent_last_name']);
	$parent_email = mysqli_real_escape_string($link, $_POST['parent_email']);
	$parent_phone = mysqli_real_escape_string($link, $_POST['parent_phone']);
	$parent_addr = mysqli_real_escape_string($link, $_POST['parent_addr']);
	$parent_city = mysqli_real_escape_string($link, $_POST['parent_city']);
	$parent_state = mysqli_real_escape_string($link, $_POST['parent_state']);
	$parent_zip = mysqli_real_escape_string($link, $_POST['parent_zip']);
	
	$idp2 = mysqli_real_escape_string($link, $_POST['idp2']);
	$parent2_first_name = mysqli_real_escape_string($link, $_POST['parent2_first_name']);
	$parent2_last_name = mysqli_real_escape_string($link, $_POST['parent2_last_name']);
	$parent2_email = mysqli_real_escape_string($link, $_POST['parent2_email']);
	$parent2_phone = mysqli_real_escape_string($link, $_POST['parent2_phone']);
	$parent2_addr = mysqli_real_escape_string($link, $_POST['parent2_addr']);
	$parent2_city = mysqli_real_escape_string($link, $_POST['parent2_city']);
	$parent2_state = mysqli_real_escape_string($link, $_POST['parent2_state']);
	$parent2_zip = mysqli_real_escape_string($link, $_POST['parent2_zip']);
	
    $sql = "UPDATE inventory SET
        first_name = '$first_name',
        mid_name = '$mid_name',
        last_name = '$last_name',
        birthday = '$birthday'
        WHERE id = '$id'";
    if (!mysqli_query($link, $sql))
    {
        $error = 'Error updating record';
    }
	
	if ((!empty($idp1)) && ($idp1 > 0))
	{
		$parent1sql = "UPDATE parents SET
			first_name = '$parent_first_name',
			last_name = '$parent_last_name',
			email = '$parent_email',
			phone = '$parent_phone',
			addr = '$parent_addr',
			city = '$parent_city',
			state = '$parent_state',
			zip = '$parent_zip'
			WHERE id = '$idp1'";
		if (!mysqli_query($link, $parent1sql))
		{
			$error = 'Error updating parent 1 record';
			echo($error . "<br/>");
			exit();
		}
	} elseif ($parent_first_name) {
		$parentSql = "INSERT INTO parents SET first_name = '$parent_first_name', last_name = '$parent_last_name', email = '$parent_email', phone = '$parent_phone', addr = '$parent_addr', city = '$parent_city', state = '$parent_state', zip = '$parent_zip'";
		if (!mysqli_query($link, $parentSql))
		{
			$error = 'Error adding new record';
		}
		$parent1_id = mysqli_insert_id($link);
		$updateKidSql = "UPDATE inventory SET parent_1 = '$parent1_id' WHERE id = '$id'";
		if (!mysqli_query($link, $updateKidSql))
		{
			$error = 'Error adding new record';
		}
	}
	
	if ((!empty($idp2)) && ($idp2 > 0))
	{	
		$parent2sql = "UPDATE parents SET
			first_name = '$parent2_first_name',
			last_name = '$parent2_last_name',
			email = '$parent2_email',
			phone = '$parent2_phone',
			addr = '$parent2_addr',
			city = '$parent2_city',
			state = '$parent2_state',
			zip = '$parent2_zip'
			WHERE id = '$idp2'";
		if (!mysqli_query($link, $parent2sql))
		{
			$error = 'Error updating parent 2 record';
			echo($error . '<br/>');
			exit();
		}
	} elseif ($parent2_first_name) {
		$parent2Sql = "INSERT INTO parents SET first_name = '$parent2_first_name', last_name = '$parent2_last_name', email = '$parent2_email', phone = '$parent2_phone', addr = '$parent2_addr', city = '$parent2_city', state = '$parent2_state', zip = '$parent2_zip'";
		if (!mysqli_query($link, $parent2Sql))
		{
			$error = 'Error adding new record';
		}
		$parent2_id = mysqli_insert_id($link);
		$updateKidSql = "UPDATE inventory SET parent_2 = '$parent2_id' WHERE id = '$id'";
		if (!mysqli_query($link, $updateKidSql))
		{
			$error = 'Error adding new record';
		}
	}		
	
	header('Location: .');
    exit();
}


// Display kid list  
include $_SERVER['DOCUMENT_ROOT'] . '/hoogoze/db.inc.php';

$result = mysqli_query($link, 'SELECT id, first_name, mid_name, last_name FROM inventory ORDER BY last_name');

if (!$result)  
{  
  $error = 'Error fetching kids from database!';  
  include 'error.html.php';  
  exit();  
}

while ($row = mysqli_fetch_array($result))  
{  
  $kids[] = array('id' => $row['id'], 'first_name' => $row['first_name'], 'last_name' => $row['last_name']);  
}

include 'kidlist.html.php';

?>