<?
	// Load User Menu
	$menu_dir = 'usr/menu.txt';
	$menu_data = file_get_contents($menu_dir);
	echo $menu_data;
	
	include('cor/c_day.php');
?>

<div class="bump"></div>
<table class="menu_header">
	<tr><td class="menu_header_td">
		<span class="title">Miter</span>
	</td></tr></table>
	
	<table class="menu_table">
		<tr><td class="menu_td">
			
			<span class="tenon">
				<a href="dat/" target="_blank" style="color:#000;"><? echo number_format($miter_count); ?> miters</a><br />
				<a href="index.php?a=" style="color:#000;"><? echo number_format($tenon_count); ?> tenons</a><br />
				<? echo number_format($c_d_count); ?> views today</a><br />
			</span>
			
		</td></tr></table>		
