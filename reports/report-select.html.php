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
  <body class="report-page">  
	  
	<?php include '../includes/header.html.php' ?>
	  
	<div class="ui-wrapper">
		  
	<h1><?php htmlout($pagetitle); ?></h1>	  
	  
	  <form action="?<?php htmlout($action); ?>" method="post" class="checkin-form">
	  <div class="form-block">		  
		  
		  <div>
			  
			  <h2>Search by attendee name:</h2>
			  
			  <label for="child_id">
				  Child's Name: 
				  <select id="child_id" name="child_id">
				  	<option value="0">Select name</option>
					  <?php foreach ($kidnames as $kidname): ?>
					  	<option value="<?php htmlout($kidname['id']); ?>"><?php htmlout($kidname['name']); ?></option>
					  <?php endforeach ?>
				  </select>
			  </label>
			  
		  </div>
		  
		  <div>
			
			  <h2>Search by date:</h2>
			  
			  <label for="checkin-date">
				  Child's Name: 
				  <select id="checkin-date" name="checkin-date">
				  	<option value="0">Select date</option>
					  <?php foreach ($checkindates as $checkindate): ?>
					  	<option value="<?php htmlout($checkindate['id']); ?>"><?php htmlout($checkindate['name']); ?></option>
					  <?php endforeach ?>
				  </select>
			  </label>
			  
		  </div>
		  		  
		  <div>
			  <input type="submit" value="<?php htmlout($button); ?>">
		  </div>
		  
	  </div>
	  </form>
	  
	 </div><!--end .ui-wrapper-->
	 
	 
	  
  </body>
</html>