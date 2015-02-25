<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/hoogoze/helpers.inc.php'; ?>
<!DOCTYPE html>  
<html lang="en">  
  <head>  
    <meta charset="utf-8">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="../includes/scripts.js"></script>
	<link href='http://fonts.googleapis.com/css?family=Inder' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="../includes/styles.css"/>
	<!--bootstrap-->
	  <!-- Latest compiled and minified CSS -->
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
	  <!-- Optional theme
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css"> -->
	  <!-- Latest compiled and minified JavaScript -->
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
	  
    <title>Manage Registrations</title>  
  </head>
    
  <body class="register-page">
	
	<?php include '../includes/header.html.php' ?>
	  
	<div class="ui-wrapper">
	  
    <h1>Manage Registrations</h1>
		
    <p><a href="?add">Add new registration</a></p>
    <ul>  
      <?php foreach ($kids as $kid): ?>  
      <li>  
        <form action="" method="post">
          <div>  
            <?php
                htmlout($kid['first_name']);
                echo '&nbsp;';
                htmlout($kid['last_name']); 
            ?>
            <input type="hidden" name="id" value="<?php  
                echo $kid['id']; ?>">  
            <input type="submit" name="action" value="Edit">
            <input type="submit" name="action" value="Delete">  
          </div>  
        </form>  
      </li>  
      <?php endforeach; ?>  
    </ul>  
    
		
	</div>
  </body>  
</html>