<?
	
    $last_data  = $arc[0]; // miter
    $last_link  = $arc[1]; // link image video
    $last_img   = $arc[2]; // upload
    $last_tpimg = $arc[3]; // retired 59019 // repurpose
    $last_odate = $arc[4]; // otc date
    $last_gdate = $arc[5]; // gregorian date
	
	// permalink address build
	$o_perm = str_replace('dat/','',$step_miter);
	$o_perm = str_replace('.txt','',$o_perm);
    
    $miter = htmlspecialchars($last_data);
    $miter = str_replace('&lt;br /&gt;','<br />',$miter);
    $miter = preg_replace_callback('@(https?://([-\w\.]+)+(:\d+)?(/([-\w/_\.]*(\?\S+)?)?)?)@', function($m) { return '<a href="'.$m[1].'" target="_blank">'.substr($m[1], 0, 30).'</a>'; }, $miter);
    $miter = preg_replace('/(?<!\w)#([0-9a-zA-Z]+)/m', '<a href="index.php?q=$1">#$1</a>', $miter);
    $miter = preg_replace('#\[b\](.*?)\[/b\]#','<b>$1</b>', $miter);
    $miter = preg_replace('#\[i\](.*?)\[/i\]#','<i>$1</i>', $miter);
    $miter = preg_replace('#\[u\](.*?)\[/u\]#','<u>$1</u>', $miter);
    $miter = preg_replace('#\[s\](.*?)\[/s\]#','<s>$1</s>', $miter);
	if (substr($miter, 0, 3) == '&gt') {
		$miter = preg_replace('/&gt;([^<]*)/m', '<span class="green_text">&gt;$1</span>', $miter, 1);
	}
	$miter = preg_replace('/<br \/>&gt;([^<]*)/m', '<br /><span class="green_text">&gt;$1</span>', $miter);
	
    // table miter
    echo "<table class='last_table'>
	<tr>
	<td class='last_table_td'>";
    
    // user name
    echo "<span class='name'>" . $user_username . " ";
    
    // days ago
    $d_start = new DateTime('now');
    $d_end  = new DateTime($last_gdate);
    $d_dif = $d_start->diff($d_end);
    $d_d = $d_dif->days;
    $d_h = $d_dif->h;
    $d_m = $d_dif->i;
	if ($d_d < 1) {
        if ($d_h < 1) {
			$d_since = $d_m . "m";
			} else {
		$d_since = $d_h . "h";
		}
		} else {
        $d_since = $d_d . "d";
		}
		echo "&middot; " . $d_since . "</span><br />";
		
		echo "<div class='space_name'></div>";
		
		// miter
		echo $miter . "<br />";
		
		// upload
		if (strlen($last_img) !== 0) {
		// retired 105019
		if (strpos($last_img, 'img/') !== false) {
		$last_img = str_replace('img/','upl/',$last_img);
		}
		echo "<div class='crop_container'><img src='" . $last_img . "'></div>";
		echo "<div class='space_img_bot'></div>";
		}
		
		// link
		if (strlen($last_link) != 0 || strlen($last_tpimg) != 0) {
		
		// retired 59019
		if (strlen($last_tpimg) != 0){
		$last_link = $last_tpimg;
		}
		
		// gifv embed bug fix
		$last_link = str_replace('gifv','mp4',$last_link);
		
		// youtube
		if (strpos($last_link, 'youtube.com/') !== false || strpos($last_link, 'youtu.be/') !== false) {
		
		// upload then no youtube
		if (strlen($last_img) !== 0) { // null
		} else if (strpos($last_link, 'youtu') !== false) {
		preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $last_link, $yt_match);
		$yt_id = $yt_match[1];
		echo "<div class='embed_yt'>
		<iframe src='https://www.youtube.com/embed/" . $yt_id . "' frameborder='0' allowfullscreen class='yt'></iframe>
		</div>";
		echo "<div class='space_img_bot'></div>";
		}
		
		// video
		} else if (strpos($last_link, '.mp4') !== false || strpos($last_link, '.webm') !== false) {
		
		// upload then no video
		if (strlen($last_img) !== 0) { // null
		} else if (strpos($last_link, '.mp4') !== false) {
		echo "<div class='embed_video'>
		<video class='video_miter' controls><source src='" . $last_link . "' type='video/mp4'></video>
		</div>";
		echo "<div class='space_img_bot'></div>";
		} else if (strpos($last_link, '.webm') !== false) {
		echo "<div class='embed_video'>
		<video class='video_miter' controls><source src='" . $last_link ."' type='video/webm'></video>
		</div>";
		echo "<div class='space_img_bot'></div>";
		}
		
		// image
		} else if (strpos($last_link, '.jpg') !== false || strpos($last_link, '.jpeg') !== false || strpos($last_link, '.png') !== false || strpos($last_link, '.gif') !== false || strpos($last_link, '.svg') !== false) {
		
		// upload then no image
		if (strlen($last_img) !== 0) { // null
		} else {
		echo "<div class='crop_container'><img src='" . $last_link . "'></div>";
		echo "<div class='space_img_bot'></div>";
		}
		
		// quote
		} else if (strpos($last_link, 'index.php?miter=') !== false) {
		
		echo "<table class='quote_container'><tr><td>";
		$quote_link = str_replace('index.php?miter=','dat/',$last_link);
		$quote_link = $quote_link . '.txt';
		$quote_arc = file($quote_link, FILE_IGNORE_NEW_LINES);
		$quote_data  = $quote_arc[0];
		$quote_link  = $quote_arc[1];
		$quote_img   = $quote_arc[2];
		$quote_tpimg = $quote_arc[3];
		$quote_odate = $quote_arc[4];
		$quote_gdate = $quote_arc[5];
		$quote = htmlspecialchars($quote_data);
		$quote = str_replace('&lt;br /&gt;','<br />',$quote);
		$quote = preg_replace_callback('@(https?://([-\w\.]+)+(:\d+)?(/([-\w/_\.]*(\?\S+)?)?)?)@', function($w) { return '<a href="'.$w[1].'" target="_blank">'.substr($w[1], 0, 30).'..</a>'; }, $quote);
		$quote = preg_replace('/(?<!\S)#([0-9a-zA-Z]+)/m', '<a href="index.php?q=$1">#$1</a>', $quote);
		$quote = preg_replace('#\[b\](.*?)\[/b\]#','<b>$1</b>', $quote);
		$quote = preg_replace('#\[i\](.*?)\[/i\]#','<i>$1</i>', $quote);
		$quote = preg_replace('#\[u\](.*?)\[/u\]#','<u>$1</u>', $quote);
		$quote = preg_replace('#\[s\](.*?)\[/s\]#','<s>$1</s>', $quote);
		if (substr($quote, 0, 3) == '&gt') { $quote = preg_replace('/&gt;([^<]*)/m', '<span class="green_text">&gt;$1</span>', $quote, 1); }
		$quote = preg_replace('/<br \/>&gt;([^<]*)/m', '<br /><span class="green_text">&gt;$1</span>', $quote);
		$quote_page_contents = file_get_contents($last_link);
		preg_match("/<title>(.+)<\/title>/i",$quote_page_contents,$quote_username);
		$quote_username = str_replace('Miter -','',$quote_username[1]);
		echo "<span class='name'>@" . $quote_username . " ";
		$q_start = new DateTime('now');
		$q_end  = new DateTime($quote_gdate);
		$q_dif = $q_start->diff($q_end);
		$q_d = $q_dif->days;
		$q_h = $q_dif->h;
		$q_m = $q_dif->i;
		if ($q_d < 1) {
		if ($q_h < 1) {
		$q_since = $q_m . "m";
		} else {
		$q_since = $q_h . "h";
		}
		} else {
		$q_since = $q_d . "d";
		}
		echo "&middot; " . $q_since . "</span><br />";
		echo "<div class='quote_name'></div>";
		echo $quote . "<br />";
		echo "<div class='quote_permalink'></div>";
		echo "<a href='" . $last_link . "' target='_blank' class='permalink' style='color:silver;'>" . $quote_odate . "</a>";
		echo "</td>
		</tr>
		</table>"; 
		
		// link
		} else {
		if (strlen($last_link) != 0) {
		echo "<table class='link_container'><tr><td>";
		echo "<a href='" . $last_link . "' target='_blank'>" . $last_link . "</a>";
		echo "</td>
		</tr>
		</table>"; 
		}
		}
		}
		
		echo "<div class='space_permalink'></div>";
		
		// permalink date
		echo "<a href='index.php?miter=" . $o_perm . "' class='permalink' style='color:silver;'>" . $last_odate . "</a><br />";
		
		// footer
		echo "<table class='footer_table'>
		<tr>
		<td class='footer_button_td'>";
		
		// quote
		if($login == true) {
		$quote_protocol = strpos(strtolower($_SERVER['SERVER_PROTOCOL']),'https') === FALSE ? 'http' : 'https';
		$quote_host = $_SERVER['HTTP_HOST'];
		echo "<a href='index.php?quote=" . $quote_protocol . "://" . $quote_host . "/index.php?miter=" . $o_perm . "'><img src='but/quote.jpg' class='footer_button_img' title='Quote'></a>";
		} else {
		echo "<img src='but/quote.jpg' class='footer_button_img' title='Quote'>";
		}
		echo "</td>
		<td class='footer_button_td'>";
		
		// like
		echo "<img src='but/like.jpg' class='footer_button_img' title='Like'>";
		
		echo "</td>
		<td class='footer_button_td'>";
		
		// share
		echo "<a href='index.php?miter=" . $o_perm . "'><img src='but/share.jpg' class='footer_button_img' title='Share'></a>";
		
		if($login == true) {
		echo "</td>
		<td class='footer_button_td'>";
		
		// delete
		echo "<a href='scr/delete.php?d=" . $o_perm . "' onclick='return confirm_delete()'><img src='but/delete.jpg' class='footer_button_img' title='Delete'></a>";
		
		echo "</td>
		<td class='footer_button_td'>";
		
		// edit
		echo "<a href='index.php?edit=" . $o_perm . "'><img src='but/edit.jpg' class='footer_button_img' title='Edit'></a>";
		
		echo "</td>
		<td class='footer_button_td'>";
		
		// pin
		echo "<a href='scr/pin.php?miter=" . $o_perm . "'><img src='but/pin.jpg' class='footer_button_img' title='Pin'></a>";
		}  
		
		echo "</td>
		</tr>
		</table>"; 
		
		// close table
		echo "</td>
		</tr>
		</table>"; 
		
		echo "<div class='bump'></div>";
		?>								