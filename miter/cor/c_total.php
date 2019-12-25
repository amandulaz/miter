<?
	$c_t_path = 'usr/total.txt';
	$c_t_file  = fopen($c_t_path, 'r');
	$c_t_count = fgets($c_t_file, 1000);
	fclose($c_t_file);
	$c_t_count = abs(intval($c_t_count)) + 1;
	$c_t_file = fopen($c_t_path, 'w');
	fwrite($c_t_file, $c_t_count);
	fclose($c_t_file);
?>