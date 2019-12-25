<?
	
	// get unix epoch from last reset
	$c_date_path = 'usr/day_date.txt';
	$c_date_file  = fopen($c_date_path, 'r');
	$c_date_value = fgets($c_date_file, 1000);
	fclose($c_date_file);	
	
	$c_d_path = 'usr/day.txt';
	$c_d_file  = fopen($c_d_path, 'r');
	$c_d_count = fgets($c_d_file, 1000);
	fclose($c_d_file);
	
	// get current unix epoch
	$now = time();
	$day_dif = $now - $c_date_value;
	
	if ($day_dif >= 86400) {
		// reset date
		$c_date_value = strtotime('today midnight');
		$c_date_file = fopen($c_date_path, 'w');
		fwrite($c_date_file, $c_date_value);
		fclose($c_date_file);
		
		// reset value
		$c_d_count = 1;
		$c_d_file = fopen($c_d_path, 'w');
		fwrite($c_d_file, $c_d_count);
		fclose($c_d_file);
		
		} else {
		
		$c_d_count = abs(intval($c_d_count)) + 1;
		$c_d_file = fopen($c_d_path, 'w');
		fwrite($c_d_file, $c_d_count);
		fclose($c_d_file);
	}
?>