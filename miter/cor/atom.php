<?
	
		$feed_print = "<?xml version=\"1.0\" encoding=\"utf-8\"?>";
		$feed_print .= "<feed xmlns='http://www.w3.org/2005/Atom'>";
	
	// user
	$user_file = '../usr/user.xml';
	$user_get = simplexml_load_file($user_file);
	$user_array = $user_get->xpath("/miter/user[@id='probe']");
	$user_username  = $user_array[0]->name;
	$user_title     = $user_array[0]->title;
	$user_avatar    = $user_array[0]->avatar;
	$user_bio       = $user_array[0]->bio;
	
	$serv_name = $_SERVER['SERVER_NAME'];
	
	// WARNING --> Uncomment next line if using /miter folder
	// $serv_name = $serv_name . "/miter";
	
		$feed_print .= "<title>" . $user_title . "</title>";
		$feed_print .= "<subtitle>" . $user_bio . "</subtitle>";
		$feed_print .= "<link href='http://" . $serv_name . "/cor/atom.php' rel='self' />";
		$feed_print .= "<id>http://" . $serv_name . "/</id>";
		$feed_print .= "<icon>http://" . $serv_name . "/upl/" . $user_avatar . "</icon>";
	
	$files_listed = array();
	foreach (glob('../dat/*.txt') as $quip) {
		$files_listed[] = $quip;
	}
	arsort($files_listed);
	
	$newest_file = reset($files_listed);
	$last_update = date(DATE_ATOM,filectime($newest_file));
	
		$feed_print .= "<updated>" . $last_update . "</updated>";
	
	$start_page = 0;
	$m_page_show = 20;
	
	$master_arc = array_slice($files_listed, $start_page, $m_page_show, true);
	
	foreach($master_arc as $step_miter) {
		$arc = file($step_miter, FILE_IGNORE_NEW_LINES);
		
		$last_data  = $arc[0];
		$last_link  = $arc[1];
		$last_img   = $arc[2];
		$last_tpimg = $arc[3];
		$last_odate = $arc[4];
		$last_gdate = $arc[5];
		
		// file data
		$o_perm = str_replace('../dat/','',$step_miter);
		$o_perm = str_replace('.txt','',$o_perm);
		$file_create = date(DATE_ATOM,filectime($step_miter));
		
		// miter content
		$miter = htmlspecialchars($last_data);
		// $miter = str_replace('&lt;br /&gt;','<br />',$miter);
		// $miter = preg_replace_callback('@(https?://([-\w\.]+)+(:\d+)?(/([-\w/_\.]*(\?\S+)?)?)?)@', function($m) { return '<a href="'.$m[1].'" target="_blank">'.substr($m[1], 0, 30).'</a>'; }, $miter);
		// $miter = preg_replace('/(?<!\w)#([0-9a-zA-Z]+)/m', '<a href="index.php?q=$1">#$1</a>', $miter);
		// $miter = preg_replace('#\[b\](.*?)\[/b\]#','<b>$1</b>', $miter);
		// $miter = preg_replace('#\[i\](.*?)\[/i\]#','<i>$1</i>', $miter);
		// $miter = preg_replace('#\[u\](.*?)\[/u\]#','<u>$1</u>', $miter);
		// $miter = preg_replace('#\[s\](.*?)\[/s\]#','<s>$1</s>', $miter);
		// if (substr($miter, 0, 3) == '&gt') {
		// 	$miter = preg_replace('/&gt;([^<]*)/m', '<font color="green">&gt;$1</font>', $miter, 1);
		// }
		// $miter = preg_replace('/<br \/>&gt;([^<]*)/m', '<br /><font color="green">&gt;$1</font>', $miter);
		
		// miter link image video
		if (strlen($last_img) !== 0) {
		$miter_link = $serv_name . "" . $last_img;
		} else if (strlen($last_link) !== 0) {
		$miter_link = $last_link;
		}
		
		$feed_print .= "<entry>";
		$feed_print .= "<title>" . substr($miter, 0, 50) . "</title>";
		$feed_print .= "<link href='http://" . $serv_name . "/index.php?miter=" . $o_perm . "' rel='alternate' />";
		
		if (strlen($miter_link) !== 0) {
		$feed_print .= "<link href='http://" . $miter_link . "' rel='related' />";
		}
		
		$feed_print .= "<id>http://" . $serv_name . "/index.php?miter=" . $o_perm . "</id>";
		$feed_print .= "<updated>" . $file_create . "</updated>";
		$feed_print .= "<content>" . $miter . "</content>";
		$feed_print .= "<author>";
		$feed_print .= "<name>" . $user_username . "</name>";
		$feed_print .= "</author>";
		$feed_print .= "</entry>";

	}	
	
	$feed_print .= "</feed>";
	
	header("Content-type: text/xml");
	echo $feed_print;
	
?>