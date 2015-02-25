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
  <body class="add-edit-form register-page">
    
	<?php include '../includes/header.html.php' ?>
    
	<div class="ui-wrapper">
		
	<h1><?php htmlout($pagetitle); ?></h1>		
    
    <form action="?<?php htmlout($action); ?>" method="post">
	  <div class="form-block">		  
		
		<div><h2>Child Info</h2></div>
      <div>  
        <label for="first_name">First Name: <input type="text" name="first_name"  
            id="first_name" value="<?php htmlout($first_name); ?>"></label>  
      </div>
      <div>  
        <label for="mid_name">Middle Name: <input type="text" name="mid_name"  
            id="mid_name" value="<?php htmlout($mid_name); ?>"></label>  
      </div>
      <div>  
        <label for="last_name">Last Name: <input type="text" name="last_name"  
            id="last_name" value="<?php htmlout($last_name); ?>"></label>  
      </div>
      <div>  
        <label for="birthday">Birthday: <input type="text" name="birthday"  
            id="birthday" value="<?php htmlout($birthday); ?>"></label>  
      </div>
	  <div>  
        <label for="alergies">Allergies: <textarea rows="4" cols="25" name="alergies"  
            id="alergies"><?php htmlout($alergies); ?></textarea></label>  
      </div>
		</div><!--end form-block-->
		<div class="form-block">
			  
	  <div><h2>Parent 1</h2></div>
	  <div>  
        <label for="parent_first_name">First Name: <input type="text" name="parent_first_name"  
            id="parent_first_name" value="<?php htmlout($parent_first_name); ?>"></label>  
      </div>
	  <div>  
        <label for="parent_last_name">Last Name: <input type="text" name="parent_last_name"  
            id="parent_last_name" value="<?php htmlout($parent_last_name); ?>"></label>  
      </div>
	  <div>  
        <label for="parent_email">Email: <input type="text" name="parent_email"  
            id="parent_email" value="<?php htmlout($parent_email); ?>"></label>  
      </div>
	  <div>  
        <label for="parent_phone">Phone: <input type="text" name="parent_phone"  
            id="parent_phone" value="<?php htmlout($parent_phone); ?>"></label>  
      </div>
	  <div>  
        <label for="parent_addr">Address: <input type="text" name="parent_addr"  
            id="parent_addr" value="<?php htmlout($parent_addr); ?>"></label>  
      </div>
	  <div>  
        <label for="parent_city">City: <input type="text" name="parent_city"  
            id="parent_city" value="<?php htmlout($parent_city); ?>"></label>  
      </div>
	  <div>
		  <label for="parent_state">State: 
			  <select name="parent_state">
				<option value="AL" <?php if ($parent_state == 'AL') echo ' selected = "selected"'; ?>>AL</option>
				<option value="AK" <?php if ($parent_state == 'AK') echo ' selected = "selected"'; ?>>AK</option>
				<option value="AZ" <?php if ($parent_state == 'AZ') echo ' selected = "selected"'; ?>>AZ</option>
				<option value="AR" <?php if ($parent_state == 'AR') echo ' selected = "selected"'; ?>>AR</option>
				<option value="CA" <?php if ($parent_state == 'CA') echo ' selected = "selected"'; ?>>CA</option>
				<option value="CO" <?php if ($parent_state == 'CO') echo ' selected = "selected"'; ?>>CO</option>
				<option value="CT" <?php if ($parent_state == 'CT') echo ' selected = "selected"'; ?>>CT</option>
				<option value="DE" <?php if ($parent_state == 'DE') echo ' selected = "selected"'; ?>>DE</option>
				<option value="DC" <?php if ($parent_state == 'DC') echo ' selected = "selected"'; ?>>DC</option>
				<option value="FL" <?php if ($parent_state == 'FL') echo ' selected = "selected"'; ?>>FL</option>
				<option value="GA" <?php if ($parent_state == 'GA') echo ' selected = "selected"'; ?>>GA</option>
				<option value="HI" <?php if ($parent_state == 'HI') echo ' selected = "selected"'; ?>>HI</option>
				<option value="ID" <?php if ($parent_state == 'ID') echo ' selected = "selected"'; ?>>ID</option>
				<option value="IL" <?php if ($parent_state == 'IL') echo ' selected = "selected"'; ?>>IL</option>
				<option value="IN" <?php if ($parent_state == 'IN') echo ' selected = "selected"'; ?>>IN</option>
				<option value="IA" <?php if ($parent_state == 'IA') echo ' selected = "selected"'; ?>>IA</option>
				<option value="KS" <?php if ($parent_state == 'KS') echo ' selected = "selected"'; ?>>KS</option>
				<option value="KY" <?php if ($parent_state == 'KY') echo ' selected = "selected"'; ?>>KY</option>
				<option value="LA" <?php if ($parent_state == 'LA') echo ' selected = "selected"'; ?>>LA</option>
				<option value="ME" <?php if ($parent_state == 'ME') echo ' selected = "selected"'; ?>>ME</option>
				<option value="MD" <?php if ($parent_state == 'MO') echo ' selected = "selected"'; ?>>MD</option>
				<option value="MA" <?php if ($parent_state == 'MA') echo ' selected = "selected"'; ?>>MA</option>
				<option value="MI" <?php if ($parent_state == 'MI') echo ' selected = "selected"'; ?>>MI</option>
				<option value="MN" <?php if ($parent_state == 'MN') echo ' selected = "selected"'; ?>>MN</option>
				<option value="MS" <?php if ($parent_state == 'MS') echo ' selected = "selected"'; ?>>MS</option>
				<option value="MO" <?php if ($parent_state == 'MO') echo ' selected = "selected"'; ?>>MO</option>
				<option value="MT" <?php if ($parent_state == 'MT') echo ' selected = "selected"'; ?>>MT</option>
				<option value="NE" <?php if ($parent_state == 'NE') echo ' selected = "selected"'; ?>>NE</option>
				<option value="NV" <?php if ($parent_state == 'NV') echo ' selected = "selected"'; ?>>NV</option>
				<option value="NH" <?php if ($parent_state == 'NH') echo ' selected = "selected"'; ?>>NH</option>
				<option value="NJ" <?php if ($parent_state == 'NJ') echo ' selected = "selected"'; ?>>NJ</option>
				<option value="NM" <?php if ($parent_state == 'NM') echo ' selected = "selected"'; ?>>NM</option>
				<option value="NY" <?php if ($parent_state == 'NY') echo ' selected = "selected"'; ?>>NY</option>
				<option value="NC" <?php if ($parent_state == 'NC') echo ' selected = "selected"'; ?>>NC</option>
				<option value="ND" <?php if ($parent_state == 'ND') echo ' selected = "selected"'; ?>>ND</option>
				<option value="OH" <?php if ($parent_state == 'OH') echo ' selected = "selected"'; ?>>OH</option>
				<option value="OK" <?php if ($parent_state == 'OK') echo ' selected = "selected"'; ?>>OK</option>
				<option value="OR" <?php if ($parent_state == 'OR') echo ' selected = "selected"'; ?>>OR</option>
				<option value="PA" <?php if ($parent_state == 'PA') echo ' selected = "selected"'; ?>>PA</option>
				<option value="RI" <?php if ($parent_state == 'RI') echo ' selected = "selected"'; ?>>RI</option>
				<option value="SC" <?php if ($parent_state == 'SC') echo ' selected = "selected"'; ?>>SC</option>
				<option value="SD" <?php if ($parent_state == 'SD') echo ' selected = "selected"'; ?>>SD</option>
				<option value="TN" <?php if ($parent_state == 'TN') echo ' selected = "selected"'; ?>>TN</option>
				<option value="TX" <?php if ($parent_state == 'TX') echo ' selected = "selected"'; ?>>TX</option>
				<option value="UT" <?php if ($parent_state == 'UT') echo ' selected = "selected"'; ?>>UT</option>
				<option value="VT" <?php if ($parent_state == 'VT') echo ' selected = "selected"'; ?>>VT</option>
				<option value="VA" <?php if ($parent_state == 'VA') echo ' selected = "selected"'; ?>>VA</option>
				<option value="WA" <?php if ($parent_state == 'WA') echo ' selected = "selected"'; ?>>WA</option>
				<option value="WV" <?php if ($parent_state == 'WV') echo ' selected = "selected"'; ?>>WV</option>
				<option value="WI" <?php if ($parent_state == 'WI') echo ' selected = "selected"'; ?>>WI</option>
				<option value="WY" <?php if ($parent_state == 'WY') echo ' selected = "selected"'; ?>>WY</option>
			</select></label>	
	  </div>
	  <div>  
        <label for="parent_zip">Zip: <input type="text" name="parent_zip"  
            id="parent_zip" value="<?php htmlout($parent_zip); ?>"></label>  
      </div>
		</div><!--end form-block-->
		
		<div class="form-block">
			
	  <div><h2>Parent 2</h2></div>
	  <div>  
        <label for="parent2_first_name">First Name: <input type="text" name="parent2_first_name"  
            id="parent2_first_name" value="<?php htmlout($parent2_first_name); ?>"></label>  
      </div>
	  <div>  
        <label for="parent2_last_name">Last Name: <input type="text" name="parent2_last_name"  
            id="parent2_last_name" value="<?php htmlout($parent2_last_name); ?>"></label>  
      </div>
	  <div>  
        <label for="parent2_email">Email: <input type="text" name="parent2_email"  
            id="parent2_email" value="<?php htmlout($parent2_email); ?>"></label>  
      </div>
	  <div>  
        <label for="parent2_phone">Phone: <input type="text" name="parent2_phone"  
            id="parent2_phone" value="<?php htmlout($parent2_phone); ?>"></label>  
      </div>
	  <div>  
        <label for="parent2_addr">Address: <input type="text" name="parent2_addr"  
            id="parent2_addr" value="<?php htmlout($parent2_addr); ?>"></label>  
      </div>
	  <div>  
        <label for="parent2_city">City: <input type="text" name="parent2_city"  
            id="parent2_city" value="<?php htmlout($parent2_city); ?>"></label>  
      </div>
	  <div>
		  <label for="parent2_state">State: 
			  <select name="parent2_state">
				<option value="AL" <?php if ($parent2_state == 'AL') echo ' selected = "selected"'; ?>>AL</option>
				<option value="AK" <?php if ($parent2_state == 'AK') echo ' selected = "selected"'; ?>>AK</option>
				<option value="AZ" <?php if ($parent2_state == 'AZ') echo ' selected = "selected"'; ?>>AZ</option>
				<option value="AR" <?php if ($parent2_state == 'AR') echo ' selected = "selected"'; ?>>AR</option>
				<option value="CA" <?php if ($parent2_state == 'CA') echo ' selected = "selected"'; ?>>CA</option>
				<option value="CO" <?php if ($parent2_state == 'CO') echo ' selected = "selected"'; ?>>CO</option>
				<option value="CT" <?php if ($parent2_state == 'CT') echo ' selected = "selected"'; ?>>CT</option>
				<option value="DE" <?php if ($parent2_state == 'DE') echo ' selected = "selected"'; ?>>DE</option>
				<option value="DC" <?php if ($parent2_state == 'DC') echo ' selected = "selected"'; ?>>DC</option>
				<option value="FL" <?php if ($parent2_state == 'FL') echo ' selected = "selected"'; ?>>FL</option>
				<option value="GA" <?php if ($parent2_state == 'GA') echo ' selected = "selected"'; ?>>GA</option>
				<option value="HI" <?php if ($parent2_state == 'HI') echo ' selected = "selected"'; ?>>HI</option>
				<option value="ID" <?php if ($parent2_state == 'ID') echo ' selected = "selected"'; ?>>ID</option>
				<option value="IL" <?php if ($parent2_state == 'IL') echo ' selected = "selected"'; ?>>IL</option>
				<option value="IN" <?php if ($parent2_state == 'IN') echo ' selected = "selected"'; ?>>IN</option>
				<option value="IA" <?php if ($parent2_state == 'IA') echo ' selected = "selected"'; ?>>IA</option>
				<option value="KS" <?php if ($parent2_state == 'KS') echo ' selected = "selected"'; ?>>KS</option>
				<option value="KY" <?php if ($parent2_state == 'KY') echo ' selected = "selected"'; ?>>KY</option>
				<option value="LA" <?php if ($parent2_state == 'LA') echo ' selected = "selected"'; ?>>LA</option>
				<option value="ME" <?php if ($parent2_state == 'ME') echo ' selected = "selected"'; ?>>ME</option>
				<option value="MD" <?php if ($parent2_state == 'MD') echo ' selected = "selected"'; ?>>MD</option>
				<option value="MA" <?php if ($parent2_state == 'MA') echo ' selected = "selected"'; ?>>MA</option>
				<option value="MI" <?php if ($parent2_state == 'MI') echo ' selected = "selected"'; ?>>MI</option>
				<option value="MN" <?php if ($parent2_state == 'MN') echo ' selected = "selected"'; ?>>MN</option>
				<option value="MS" <?php if ($parent2_state == 'MS') echo ' selected = "selected"'; ?>>MS</option>
				<option value="MO" <?php if ($parent2_state == 'MO') echo ' selected = "selected"'; ?>>MO</option>
				<option value="MT" <?php if ($parent2_state == 'MT') echo ' selected = "selected"'; ?>>MT</option>
				<option value="NE" <?php if ($parent2_state == 'NE') echo ' selected = "selected"'; ?>>NE</option>
				<option value="NV" <?php if ($parent2_state == 'NV') echo ' selected = "selected"'; ?>>NV</option>
				<option value="NH" <?php if ($parent2_state == 'NH') echo ' selected = "selected"'; ?>>NH</option>
				<option value="NJ" <?php if ($parent2_state == 'NJ') echo ' selected = "selected"'; ?>>NJ</option>
				<option value="NM" <?php if ($parent2_state == 'NM') echo ' selected = "selected"'; ?>>NM</option>
				<option value="NY" <?php if ($parent2_state == 'NY') echo ' selected = "selected"'; ?>>NY</option>
				<option value="NC" <?php if ($parent2_state == 'NC') echo ' selected = "selected"'; ?>>NC</option>
				<option value="ND" <?php if ($parent2_state == 'ND') echo ' selected = "selected"'; ?>>ND</option>
				<option value="OH" <?php if ($parent2_state == 'OH') echo ' selected = "selected"'; ?>>OH</option>
				<option value="OK" <?php if ($parent2_state == 'OK') echo ' selected = "selected"'; ?>>OK</option>
				<option value="OR" <?php if ($parent2_state == 'OR') echo ' selected = "selected"'; ?>>OR</option>
				<option value="PA" <?php if ($parent2_state == 'PA') echo ' selected = "selected"'; ?>>PA</option>
				<option value="RI" <?php if ($parent2_state == 'RI') echo ' selected = "selected"'; ?>>RI</option>
				<option value="SC" <?php if ($parent2_state == 'SC') echo ' selected = "selected"'; ?>>SC</option>
				<option value="SD" <?php if ($parent2_state == 'SD') echo ' selected = "selected"'; ?>>SD</option>
				<option value="TN" <?php if ($parent2_state == 'TN') echo ' selected = "selected"'; ?>>TN</option>
				<option value="TX" <?php if ($parent2_state == 'TX') echo ' selected = "selected"'; ?>>TX</option>
				<option value="UT" <?php if ($parent2_state == 'UT') echo ' selected = "selected"'; ?>>UT</option>
				<option value="VT" <?php if ($parent2_state == 'VT') echo ' selected = "selected"'; ?>>VT</option>
				<option value="VA" <?php if ($parent2_state == 'VA') echo ' selected = "selected"'; ?>>VA</option>
				<option value="WA" <?php if ($parent2_state == 'WA') echo ' selected = "selected"'; ?>>WA</option>
				<option value="WV" <?php if ($parent2_state == 'WV') echo ' selected = "selected"'; ?>>WV</option>
				<option value="WI" <?php if ($parent2_state == 'WI') echo ' selected = "selected"'; ?>>WI</option>
				<option value="WY" <?php if ($parent2_state == 'WY') echo ' selected = "selected"'; ?>>WY</option>
			</select></label>	
	  </div>
	  <div>  
        <label for="parent2_zip">Zip: <input type="text" name="parent2_zip"  
            id="parent2_zip" value="<?php htmlout($parent2_zip); ?>"></label>  
      </div>
		
		
      <div>  
        <input type="hidden" name="id" value="<?php htmlout($id); ?>">
		<input type="hidden" name="idp1" value="<?php htmlout($idp1); ?>">
		<input type="hidden" name="idp2" value="<?php htmlout($idp2); ?>">  
		  
        <input type="submit" value="<?php htmlout($button); ?>">  
      </div>
		</div><!--end form-block-->
		
    </form>
    
    </div><!--end ui-wrapper-->
    
    
  </body>  
</html>