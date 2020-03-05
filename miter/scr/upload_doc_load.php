<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	
	<head>
		
		<meta charset="utf-8" />
		<meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
		
		<link rel="icon" type="image/x-icon" href="img/but/favicon.ico" />
		<link rel="shortcut icon" type="image/x-icon" href="img/but/favicon.ico" />
		
		<title>Upload Tenon Files</title>
		
	</head>
	
	<body>
		
		<?
			$uploadsNeeded = $_POST['uploadsNeeded'];
			
			for ($i = 0; $i < $uploadsNeeded; $i++) {
				$file_name = $_FILES['uploadFile'. $i]['name'];
				
				// strip slashes
				$file_name = stripslashes($file_name);
				$file_name = str_replace("'","",$file_name);
				
				$copy = copy($_FILES['uploadFile'. $i]['tmp_name'],"../doc/".$file_name);
				
				// prompt
				if ($copy) {
					echo $file_name . " uploaded<br />";
					} else {
					echo $file_name . " FAILED<br />";
				}
			}
		?>
		
	</body>
</html>