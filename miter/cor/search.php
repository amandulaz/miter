<?
	$search_get = $_GET['q'];
?>

<table class='static_header'>
	<tr><td class='static_header_td'>
		<span class='title'>Search</span>
	</td></tr></table>  
	
	<table class='static_table'>
		<tr><td class='static_td' align='center'>
			
			<form name='search_form' id='search_form' action='index.php'>
				<input type='input' name='q' id='search_field' class='search_field' value='<? echo $search_get; ?>'> <input type='submit' class='search_submit' value='Search'>
			</form>
			
		</td></tr></table>
		
		<div class='bump'></div>
		
		<?
			// search miters
			foreach (glob("dat/*.txt") as $miter_search) {
				$miter_contents = file_get_contents($miter_search);
				if (!empty($miter_contents) && stripos($miter_contents, $search_get)) {
					$miter_found[] = $miter_search;
				}
			}
			
			krsort($miter_found);
			$miter_files = count($miter_found);
			
			// miter print
			$miter_print_arc = array_slice($miter_found, 0, 2, true);
			
			if ($miter_files > 0) {
				// set print miter array
				foreach($miter_print_arc as $step_miter) {
					$arc = file($step_miter, FILE_IGNORE_NEW_LINES);
					include 'echo.php';
				}
			}
			
			// miter list
			$miter_list_arc = array_slice($miter_found, 2, 20, true);
			
			// print miter list
			if ($miter_files > 2) {
				
				echo "<table class='static_table'>
				<tr><td class='static_td'>
				<span class='tenon'>";
				
				$z = 1;
				foreach($miter_list_arc as $miter_list) {
					$miter_list = str_replace("dat/","",$miter_list);
					$miter_list = str_replace(".txt","",$miter_list);
					$miter_print = str_replace("_"," ",$miter_list);
					echo "" . $z++ . ". <a href='index.php?miter=" . $miter_list . "'>" . $miter_print . "</a><br />";
				}
				
				echo "</span>
				</td></tr></table>";
				
				} else {
				
				echo "<table class='static_table'>
				<tr><td class='static_td'>
				<span class='tenon'>No results found.";
				echo "</span>
				</td></tr></table>";
				
			}
			
		?>		