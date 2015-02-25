<?php 
    include_once $_SERVER['DOCUMENT_ROOT'] . '/hoogoze/helpers.inc.php';
?>  
<!DOCTYPE html>  
<html lang="en">  
  <head>  
	  <meta charset="utf-8"/>
	  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	  <script src="../includes/scripts.js"></script>
	  <link href='http://fonts.googleapis.com/css?family=Inder' rel='stylesheet' type='text/css'>
	  <link rel="stylesheet" type="text/css" href="../includes/styles.css"/>
	  
    <title><?php htmlout($pagetitle); ?></title> 
  </head>  
  <body class="checkin-page preprint-page">
  	
	  <?php include '../includes/header.html.php' ?>
	  
	  <div class="ui-wrapper">
		  
		  <h1>
			  <?php htmlout($pagetitle); ?>
		  </h1>
		  
		  <div id="checkall-holder">
		  	<input type="checkbox" name="checkall" id="checkall"/> <span id="checkall-text">Check All</span>
		  </div>
		  
		  <form action="?<?php htmlout($action); ?>" method="post" id="precheck-form">
			  
			  <?php foreach ($allNames as $allName): ?>
			  	<div class="checklist-item">
			  		<input type="checkbox" name="namelist[]" value="<?php htmlout($allName['id']); ?>"/> <?php htmlout($allName['name']); ?>
				</div>
			  <?php endforeach ?>
			  
			  <div class="submit-button">
				  <input type="submit" value="<?php htmlout($button); ?>">
			  </div>
			  
		  </form>
		  
	  </div><!--end ui-wrapper-->
	
  </body>
</html>