<?
	session_start(); 
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	
	<head>
		
		<meta charset="utf-8" />
		<meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta name="robots" content="ALL,INDEX,FOLLOW,ARCHIVE" />
		<meta name="revisit-after" content="1 day" />
		
		<link rel="icon" type="image/x-icon" href="img/favicon.ico" />
		<link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico" />
		<link href="cor/atom.xml" type="application/atom+xml" rel="alternate" />
		<link href="index.css" rel="stylesheet">
		
		<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
		
		<?
			
			// user data
			$user_file = 'usr/user.xml';
			$user_get = simplexml_load_file($user_file);
			$user_array = $user_get->xpath("/miter/user[@id='probe']");
			$user_username =  $user_array[0]->name;
			$user_title =     $user_array[0]->title;
			$user_avatar =    $user_array[0]->avatar;
			$user_bio =       $user_array[0]->bio;
			$user_bg =        $user_array[0]->bg;
			$user_header =    $user_array[0]->header;
			$user_border =    $user_array[0]->border;
			$user_link =      $user_array[0]->link;
			$user_tz =        $user_array[0]->time;
			$user_pin =       $user_array[0]->pin;
			date_default_timezone_set($user_tz);
			
			// logged in?
			$user_log_in = str_replace('@','',$user_username);
			if($_SESSION['miter'] == $user_log_in) {
				$login = true;
				} else {
				$login = false;
			}
			
			// miter form js
			if($login == true){
				echo "<script src='scr/index.js'></script>";
			}
			
			// count miters
			$dat_dir = "dat/";
			$miter_count = 0;
			$count_files = glob($dat_dir . "*.txt");
			if ($count_files){
				$miter_count = count($count_files);
			}
			
			// count tenons
			$ten_dir = "ten/";
			$tenon_count = 0;
			$count_tenon = glob($ten_dir . "*.txt");
			if ($count_tenon){
				$tenon_count = count($count_tenon);
			}
			
		?>
		
		<style>
			<? include 'cor/style.php'; ?>
		</style>
		
		
		<title><?
			echo $user_title;
			
			if (isset($_GET['t'])) {
				echo " - ";
				$page_title = $_GET['t'];
				$page_title = str_replace('_',' ',$page_title);
				echo $page_title;
			}
		?></title>
		
	</head>
	
	<body>
		
		<div align="center">
			
			<? 
				// mobile or desktop
				function isMobile() {
					return preg_match("/(android|webos|avantgo|iphone|ipad|ipod|blackberry|iemobile|bolt|boost|cricket|docomo|fone|hiptop|mini|opera mini|kitkat|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
				}
				if(isMobile()) {
					echo "<table class='mobile'><tr><td>";
					} else {
					echo "<table class='whole'><tr><td class='left_td'>";
				}
			?>
			
			<?
				
				// static
				if (isset($_GET['t'])) {
					
					include 'cor/static.php';
					
					if(isMobile()) {
						echo "<div class='bump'></div>";
					}
					
					// user page
					} else if (isset($_GET['u'])) {
					
					if($login == true) {
						
						$get_user = $_GET['u'];
						if ($get_user == 'new') {
							include 'scr/new.php';
							} else if ($get_user == 'panels') {
							include 'scr/panels.php';
							} else if ($get_user == 'upload') {
							include 'scr/upload.php';
							} else if ($get_user == 'm_images') {
							include 'scr/image_m.php';
							} else if ($get_user == 't_images') {
							include 'scr/image_t.php';
							} else if ($get_user == 'docs') {
							include 'scr/doc_list.php';
							} else if ($get_user == 'settings') {
							include 'scr/settings.php';
						}
						
						if(isMobile()) {
							echo "<div class='bump'></div>";
						}
						
					}
					
					// edit static
					} else if (isset($_GET['e'])) {
					
					if($login == true) {
						include 'cor/static.php';
						
						if(isMobile()) {
							echo "<div class='bump'></div>";
						}
						
					}
					
					// search 
					} else if (isset($_GET['q'])) {
					
					include 'cor/search.php';
					
					if(isMobile()) {
						echo "<div class='bump'></div>";
					}
					
					// static archive
					} else if (isset($_GET['a'])) {
					
					include 'cor/archive.php';
					
					if(isMobile()) {
						echo "<div class='bump'></div>";
					}
					
					// miter iso
					} else if (isset($_GET['miter'])) {
					
					include 'cor/miter.php';
					
					// miter page
					} else if (isset($_GET['page'])) {
					
					include 'cor/miter.php';
					
					if(isMobile()) {
						echo "<div class='bump'></div>";
					}
					
					// miter
					} else {
					
					include 'cor/miter.php';
					
					if(isMobile()) {
						echo "<div class='bump'></div>";
					}
					
				}
				
				// desktop table break
				if(isMobile()) {
					} else {
					echo "</td><td class='center_td'>";
					echo "</td><td class='right_td'>";
					
				}
				
				// profile
				include 'cor/profile.php';
				echo "<div class='bump'></div>";
				
				// menu
				include 'cor/panels.php';
				
				// admin menu
				if($login == true) {
					echo "<div class='bump'></div>";
					include 'scr/menu.php';
				}
				
			?>
			
		</td>
	</tr>
</table>

</div>

</body>
</html>