<?php 
    include_once $_SERVER['DOCUMENT_ROOT'] . '/hoogoze/helpers.inc.php';
?>  
<!DOCTYPE html>  
<html lang="en">  
  <head>  
	  <meta charset="utf-8"/>
	  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	  <script src="http://labelwriter.com/software/dls/sdk/js/DYMO.Label.Framework.latest.js"
        type="text/javascript" charset="UTF-8"> </script>
	  <script type="text/javascript" src="../includes/NurseryCheckin1.js"></script>	  
	  
	  <link href='http://fonts.googleapis.com/css?family=Inder' rel='stylesheet' type='text/css'>
	  <link rel="stylesheet" type="text/css" href="../includes/styles.css"/>
	  
    <title><?php htmlout($pagetitle); ?></title> 
  </head>  
  <body class="label-page">  	
	  
	  <h1>
		  <?php htmlout($pagetitle); ?>
	  </h1>
	  <a class="no-print" href="javascript:window.print();"><h2>Click to print label</h2></a>
	  
	  <a class="no-print" id="dymo-print-button" onclick="printDymo()" href="javascript:void(0);"><h2>Click to print Dymo label</h2></a>
	  
	  <a href="." class="no-print">Return to checkin form</a>
	  
	   <?php foreach ($checkinNames as $checkinName): ?>
	  
	  <div class="wrapper">
		  
		  <div class="label-name" id="label-name">
			  <h3 class='header'>Name</h3>
			  <span class='content'><?php htmlout($checkinName['name']); ?></span>
		  </div>
		  
		  <div class="label-alergies">
			  <h3 class='header'>Allergies</h3>
			  <span class='content'><?php htmlout($checkinName['alergies']);  ?></span>
		  </div>
		  
		  <div class="label-id">
			  <h3 class='header'>ID#</h3>
			  <span class='content'><?php htmlout($checkinName['id']); ?></span>
		  </div>
		  
		  <?php if ($feed_time) { ?>
		  <div class="for-infants">
			  <div class="feeding-time">
				  <h4 class='header'>Feeding Time:</h4>
				  <span class='content'><?php htmlout($feed_time); ?></span>
			  </div>
			  <div class="ozs">
				  <h4 class='header'>Ounces:</h4>
				  <span class='content'><?php htmlout($ozs); ?></span>
			  </div>
		  </div><!--end .for-infants-->
		  <?php } ?>
		  
		  <div class="label-instructions">
		  	<h3 class="header">Special Instructions</h3>
			<span class="content"><?php htmlout($instructions) ?></span>
		  </div>
		  
		  <div class="label-date">
		  	<h3 class="header">Check-In Date</h3>
			<span class="content"><?php htmlout($checkin_date) ?></span>
		  </div>
		  
		  <div id="logo-img">
		  	<img class="logo" src="../images/Troy-Kids-logo.jpg"/>
		  </div><!--end logo-img-->
		  
	  </div><!--end wrapper-->
	  
	  <?php endforeach ?>
	  
  </body>
</html>