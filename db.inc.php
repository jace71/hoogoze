<?php

// connect to db ///////////
$link = mysqli_connect('hoogoze.halfassterpiecetheater.com','hoogozeadmin','h00goze!');

if (!$link) {
	$output = 'unable to create link';
	//include 'output.php';
	echo $output;
	exit();
}

if (!mysqli_select_db($link,'hoogoze_beta')){
	$output = 'unable to select db';
	//include 'output.php';
	echo $output;
	exit();
}

?>