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
  <body class="add-edit-form user-page">
    
	<?php include '../includes/header.html.php' ?>
    
	<div class="ui-wrapper">
		
	<h1><?php htmlout($pagetitle); ?></h1>		
    
    <form action="?<?php htmlout($action); ?>" method="post">
	  <div class="form-block">		  
		
		<div><h2>User Info</h2></div>
      <div>
		<label for="org_id">
			Organization:
			<select id="org_id" name="org_id">
				<option value="0">Select organization...</option>
				<?php foreach ($orgs as $org): ?>
				<option value="<?php htmlout($org['id']); ?>" 
						<?php if($org['selected'])
							{echo " selected";} 
						?>
				><?php htmlout($org['org_name']); ?></option>
				<?php endforeach ?>
			</select>
		</label>	  
	  </div>
		  
	  <div>  
        <label for="first_name">First Name: <input type="text" name="first_name"  
            id="first_name" value="<?php htmlout($first_name); ?>"></label>  
      </div>
      <div>  
        <label for="last_name">Last Name: <input type="text" name="last_name"  
            id="last_name" value="<?php htmlout($last_name); ?>"></label>  
      </div>
      <div>  
        <label for="email">Email: <input type="text" name="email"  
            id="email" value="<?php htmlout($email); ?>"></label>  
      </div>
	  <div>  
        <label for="password">Password: <input type="password" name="password" id="password">
		</label>  
      </div>
	  <div>  
        <input type="hidden" name="id" value="<?php htmlout($id); ?>">
		  
        <input type="submit" value="<?php htmlout($button); ?>">  
      </div>
		</div><!--end form-block-->
	</form>
		
	</div><!--end ui-wrapper-->    
    
  </body>  
</html>