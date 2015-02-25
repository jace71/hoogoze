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
	  <!--bootstrap-->
	  <!-- Latest compiled and minified CSS -->
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
	  <!-- Optional theme
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css"> -->
	  <!-- Latest compiled and minified JavaScript -->
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
	  
    <title><?php htmlout($pagetitle); ?></title> 
  </head>  
  <body class="checkin-page">  
	  
	<?php include '../includes/header.html.php' ?>
	  
	<div class="ui-wrapper">
		  
	<h1><?php htmlout($pagetitle); ?></h1>
	<div id="form-top">
		<a href="?precheck">Pre-print labels</a>	
	</div>
		  
	  <div id="checkin-list">
		  <h3>
			  Currently Checked In:
		  </h3>
		  <p>
			  (Click to check out)
		  </p>
		  <ul>	  
		  
		  <?php if(!empty($checkinNames)) { ?>
			  <?php foreach ($checkinNames as $checkinName): ?>
				<li><a href="?checkout&kid=<?php htmlout($checkinName['id']); ?>"><?php htmlout($checkinName['name']); ?></a></li>
			  <?php endforeach ?>
		  <?php } else { ?>
			  <em>No one checked in.</em>
		  <?php } ?>
			  
		  </ul>
	  </div>
	  
	  <form action="?<?php htmlout($action); ?>" method="post" class="checkin-form">
	  <div class="form-block">
		  
		  
		  <div>
			  <label for="child_id">
				  Child's Name: 
				  <select id="child_id" name="child_id">
				  	<option value="0">Select child to check in...</option>
					  <?php foreach ($kidnames as $kidname): ?>
					  	<option value="<?php htmlout($kidname['id']); ?>"><?php htmlout($kidname['name']); ?></option>
					  <?php endforeach ?>
				  </select>
			  </label>
		  </div>
		  
		  <div>
			  <label for="responsible">
				  Who's dropping off? 
				  <input type="text" id="responsible" name="responsible"/>
			  </label>
		  </div>
		  
		  <fieldset>
			  <div>
				  <label for="instructions">
					  Special Instructions:
					  <textarea name="instructions" id="instructions" rows="3" cols="25"></textarea>
				  </label>
			  </div>
			  <div>
				  <label for="feed_time">
					  Feeding Time:
					  <input type="text" name="feed_time" id="feed_time"/>
				  </label>
			  </div>
			  <div>
				  <label for="ozs">
					  Feeding Amount (ozs.):
					  <input type="text" id="ozs" name="ozs"/>
				  </label>
			  </div>
		  </fieldset>
		  <div>
			  <input type="submit" value="<?php htmlout($button); ?>">
		  </div>
		  
	  </div>
	  </form>
		
	  <div id="checkin-list">
		  <h3>
			  Pre-Checked In:
		  </h3>
		  <p>
			  (Click to check in)
		  </p>
		  <ul>	  
		  
		  <?php if(!empty($precheckinNames)) { ?>
			  <?php foreach ($precheckinNames as $precheckinName): ?>
				<li><a href="?precheckin&checkid=<?php htmlout($precheckinName['id']); ?>"><?php htmlout($precheckinName['name']); ?></a></li>
			  <?php endforeach ?>
		  <?php } else { ?>
			  <em>No one pre-checked in</em>
		   <?php } ?>
			  
		  </ul>
	  </div><!--end checkin list (pre check in) -->
	  
	 </div><!--end .ui-wrapper-->
	 
	 
	  
  </body>
</html>