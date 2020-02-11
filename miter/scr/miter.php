<?
	
	// upload image
	if (!empty($_FILES['upload']['name'])) {
		$img_name = $_FILES['upload']['name'];
		$img_name = stripslashes($img_name);
		$img_name = str_replace("'", "", $img_name);
		$upload_file = move_uploaded_file($_FILES['upload']['tmp_name'], "../upl/" . $img_name);
		$img_path = "upl/" . $img_name;
		} else {
		$img_path = '';
	}
	
	// time zone
	$user_file = '../usr/user.xml';
	$user_get = simplexml_load_file($user_file);
	$user_array = json_decode(json_encode($user_get), 1);
	$user_set = end($user_array['user']);
	$user_time_zone = $user_set['time'];
	date_default_timezone_set($user_time_zone);
	
	// convert gregorian to otc
	$hour = date("H");
	$min = date("i");
	$sec = date("s");
	
	$day = date("z") + 1;
	if ($day < 79) {
		$final_day = $day + 287;
		} else if ($day >= 79) {
		$final_day = $day - 78;
	}
	
	// file name correction
	if ($final_day < 10) {
		$zero_final_day = "00" . $final_day;
		} else if ($final_day < 100 && $final_day > 9) {
		$zero_final_day = "0" . $final_day;
		} else {
		$zero_final_day = $final_day;
	}
	
	$year = date("Y");
	$set_year = $year - 2000;
	if ($day < 79) {
		$final_year = $set_year - 1;
		} else {
		$final_year = $set_year;
	}
	$zero_year = "0".$final_year;
	
	// print date
	$o_date = ($hour . ":" . $min . ":" . $sec . " " . $final_day . " " . $zero_year); 
	
	// file date
	$id_date = ($zero_year . "" . $zero_final_day . "" . $hour . "" . $min . "" . $sec); 
	
	// gregorian date
	$g_date = date("Y-m-d H:i:s");
	
	// get post
	$miter_post = str_replace(array("\r\n", "\r", "\n"), "<br />", $_POST["miter"]);
	
	// get link
	$link = $_POST["url"];
	if (strpos($link, 'Link, Image or Video:') !== false) {
		$miter_url = '';
		} else {
		$link = str_replace('&', '%26', $link);
		$miter_url = $link;
	}
	
	// retired 59019
	$miter_tp_img = '';
	
	// location
	$miter_file = "../dat/" . $id_date . ".txt";
	
	// complile data
	$miter_data = $miter_post . "\n" . $miter_url . "\n" . $img_path . "\n" . $miter_tp_img . "\n" . $o_date . "\n" . $g_date;
	
	// create and write
	$dat_file = fopen($miter_file, "w") or die("Error");
	fwrite($dat_file, $miter_data);
	fclose($dat_file);
	
	// return
	header("location:index.php");
?>