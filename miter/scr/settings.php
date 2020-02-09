<script src='scr/user.js'></script>

<table class='static_header'>
	<tr>
		<td class='static_header_td'>
			<span class='title'>Settings</span>
		</td>
	</tr>
</table>

<table class='static_table'>
	<tr>
		<td class='static_td'>";
			
			
			<span class="tenon">40 Character Limit &rarr; No @ Symbol</span>
			<div class='bump'></div>
			<table class='setting_table'>
				<tr>
					<td>
						<form name="miter_user_form" action="scr/user_name.php" method="POST" onsubmit="return validate_user()">
							<input id="miter_user" name="miter_user" class="settings_field" maxlength="40" value="<? 
								$miter_user = str_replace('@', '', $user_username);
								echo $miter_user;
							?>"><br />
							<input type="submit" name="user_submit" value="Change Miter Name" class="settings_submit">
						</form>
					</td>
				</tr>
			</table>
			
			
			<div class='bump'></div>
			
			
			<table class='setting_table'>
				<tr>
					<td>
						<form name="miter_title_form" action="scr/user_title.php" method="POST" onsubmit="return validate_title()">
							<input id="user_title" name="user_title" class="settings_field" maxlength="40" value="<? 
								echo $user_title;
							?>">
							<input type="submit" name="user_submit" value="Change Title" class="settings_submit">
						</form>
					</td>
				</tr>
			</table>
			

			<div class='bump'></div>
			

			<span class="tenon">Images will be resized to 50x50px</span>
			<div class='bump'></div>
			<table class='setting_table'>
				<tr>
					<td>
						<form name="miter_avatar" action="scr/avatar.php" enctype="multipart/form-data" method="POST">
							<input name="avatar" type="file" id="avatar" class="settings_field_file">
							<input type="submit" name="user_submit" value="Change Avatar" class="settings_submit">
						</form>
					</td>
				</tr>
			</table>
			
			
			<div class='bump'></div>
			
			
			<table class='setting_table'>
				<tr>
					<td>
						<form name="miter_bio_form" action="scr/bio.php" method="POST" onsubmit="return validate_bio()">
							<input id="miter_bio" name="miter_bio" class="settings_field" maxlength="40" value="<? 
								echo $user_bio;
							?>">
							<input type="submit" name="user_submit" value="Change Bio" class="settings_submit">
						</form>
					</td>
				</tr>
			</table>
			
			
			<div class='bump'></div>
			
			
			<span class="tenon">Favicons must be saved as <i>favicon.ico</i></span>
			<div class='bump'></div>
			<table class='setting_table'>
				<tr>
					<td>
						<form name="miter_favicon" action="scr/favicon.php" enctype="multipart/form-data" method="POST">
							<input name="favicon" type="file" id="favicon" class="settings_field_file">
							<input type="submit" name="user_submit" value="Change Favicon" class="settings_submit">
						</form>
					</td>
				</tr>
			</table>
			
			
			
			<div class='bump'></div>
			
			
			
			<span class="tenon">Color format: #000000 &rarr; <a href="http://color-hex.com/" target="_blank" style="text-decoration:none;color:#000;">color-hex.com</a></span>
			<div class='bump'></div>
			<table class='setting_table'>
				<tr>
					<td>
						<form name="miter_color_form" action="scr/color.php" method="POST" onsubmit="return validate_color()">
							<input id="miter_color" name="miter_color" class="settings_field" minlength="7" maxlength="7" value="<? 
								echo $user_bg;
								?>">
								<input type="submit" name="color_submit" value="Change Background Color" class="settings_submit">
							</form>
						</td>
					</tr>
				</table>
				
				
				
				<div class='bump'></div>
				
				
				
				<table class='setting_table'>
					<tr>
						<td>
							<form name="miter_header_form" action="scr/color_header.php" method="POST" onsubmit="return validate_header()">
								<input id="miter_color_header" name="miter_color_header" class="settings_field" minlength="7" maxlength="7" value="<? 
									echo $user_header;
								?>">
								<input type="submit" name="color_submit" value="Change Header Color" class="settings_submit">
							</form>
						</td>
					</tr>
				</table>
				
				
				
				<div class='bump'></div>
				
				
				
				<table class='setting_table'>
					<tr>
						<td>
							<form name="miter_border_form" action="scr/color_border.php" method="POST" onsubmit="return validate_border()">
								<input id="miter_color_border" name="miter_color_border" class="settings_field" minlength="7" maxlength="7" value="<? 
									echo $user_border;
									?>">
									<input type="submit" name="color_submit" value="Change Border Color" class="settings_submit">
								</form>
							</td>
						</tr>
					</table>
					
					
					
					<div class='bump'></div>
					
					
					
					<table class='setting_table'>
						<tr>
							<td>
								<form name="miter_link_form" action="scr/color_link.php" method="POST" onsubmit="return validate_link()">
									<input id="miter_color_link" name="miter_color_link" class="settings_field" minlength="7" maxlength="7" value="<? 
										echo $user_link;
									?>">
									<input type="submit" name="color_submit" value="Change Link Color" class="settings_submit">
								</form>
							</td>
						</tr>
					</table>
					
					
					
					<div class='bump'></div>
					<span class="tenon">Default time zone is -06:00 OTC</span>
					<div class='bump'></div>
					<?php
						if ($user_tz == "Pacific/Midway") { $c_tz = "-11:00 Midway Island"; } else if
						($user_tz == "Etc/GMT+10") { $c_tz = "-10:00 Hawaii"; } else if
						($user_tz == "Pacific/Marquesas") { $c_tz = "-09:30 Marquesas Islands"; } else if
						($user_tz == "America/Anchorage") { $c_tz = "-09:00 Alaska"; } else if
						($user_tz == "America/Los_Angeles") { $c_tz = "-08:00 Pacific"; } else if
						($user_tz == "America/Denver") { $c_tz = "-07:00 Mountain"; } else if
						($user_tz == "America/Chicago") { $c_tz = "-06:00 OTC"; } else if
						($user_tz == "America/New_York") { $c_tz = "-05:00 Eastern"; } else if
						($user_tz == "America/Caracas") { $c_tz = "-04:30 Caracas"; } else if
						($user_tz == "America/Glace_Bay") { $c_tz = "-04:00 Atlantic"; } else if
						($user_tz == "America/St_Johns") { $c_tz = "-03:30 Newfoundland"; } else if
						($user_tz == "America/Godthab") { $c_tz = "-03:00 Greenland"; } else if
						($user_tz == "America/Noronha") { $c_tz = "-02:00 Mid-Atlantic"; } else if
						($user_tz == "Atlantic/Azores") { $c_tz = "-01:00 Azores"; } else if
						($user_tz == "Europe/London") { $c_tz = "0:00 GMT"; } else if
						($user_tz == "Europe/Amsterdam") { $c_tz = "+01:00 Rome"; } else if
						($user_tz == "Africa/Cairo") { $c_tz = "+02:00 Cairo"; } else if
						($user_tz == "Europe/Moscow") { $c_tz = "+03:00 Moscow"; } else if
						($user_tz == "Asia/Tehran") { $c_tz = "+03:30 Tehran"; } else if
						($user_tz == "Asia/Dubai") { $c_tz = "+04:00 Abu Dhabi"; } else if
						($user_tz == "Asia/Kabul") { $c_tz = "+04:30 Kabul"; } else if
						($user_tz == "Asia/Yekaterinburg") { $c_tz = "+05:00 Ekaterinburg"; } else if
						($user_tz == "Asia/Kolkata") { $c_tz = "+05:30 New Delhi"; } else if
						($user_tz == "Asia/Katmandu") { $c_tz = "+05:45 Kathmandu"; } else if
						($user_tz == "Asia/Novosibirsk") { $c_tz = "+06:00 Novosibirsk"; } else if
						($user_tz == "Asia/Rangoon") { $c_tz = "+06:30 Yangon"; } else if
						($user_tz == "Asia/Bangkok") { $c_tz = "+07:00 Bangkok"; } else if
						($user_tz == "Asia/Hong_Kong") { $c_tz = "+08:00 Beijing"; } else if
						($user_tz == "Australia/Eucla") { $c_tz = "+08:45 Eucla"; } else if
						($user_tz == "Asia/Tokyo") { $c_tz = "+09:00 Tokyo"; } else if
						($user_tz == "Australia/Darwin") { $c_tz = "+09:30 Darwin"; } else if
						($user_tz == "Asia/Vladivostok") { $c_tz = "+10:00 Vladivostok"; } else if
						($user_tz == "Australia/Lord_Howe") { $c_tz = "+10:30 Lord Howe Island"; } else if
						($user_tz == "Etc/GMT-11") { $c_tz = "+11:00 Solomon Islands"; } else if
						($user_tz == "Pacific/Norfolk") { $c_tz = "+11:30 Norfolk Island"; } else if
						($user_tz == "Asia/Anadyr") { $c_tz = "+12:00 Anadyr"; } else if
						($user_tz == "Pacific/Auckland") { $c_tz = "+12:00 Auckland"; } else if
						($user_tz == "Pacific/Chatham") { $c_tz = "+12:45 Chatham Islands"; } else if
						($user_tz == "Pacific/Tongatapu") { $c_tz = "+13:00 Nuku'alofa"; } else if
						($user_tz == "Pacific/Kiritimati") { $c_tz = "+14:00 Kiritimati"; } else
						{ $c_tz = "-06:00 OTC"; }
					?>
					
					<table class='setting_table'>
						<tr>
							<td>
								<form name="miter_timezone" action="scr/time_zone.php" method="POST">
									<select name="user_time_zone" class="settings_dropdown">
										<option value="<? echo $user_tz; ?>" selected><? echo $c_tz; ?></option>
										<option value="Pacific/Midway">-11:00 Midway Island</option>
										<option value="Etc/GMT+10">-10:00 Hawaii</option>
										<option value="Pacific/Marquesas">-09:30 Marquesas Islands</option>
										<option value="America/Anchorage">-09:00 Alaska</option>
										<option value="America/Los_Angeles">-08:00 Pacific</option>
										<option value="America/Denver">-07:00 Mountain</option>
										<option value="America/Chicago">-06:00 OTC</option>
										<option value="America/New_York">-05:00 Eastern</option>
										<option value="America/Caracas">-04:30 Caracas</option>
										<option value="America/Glace_Bay">-04:00 Atlantic</option>
										<option value="America/St_Johns">-03:30 Newfoundland</option>
										<option value="America/Godthab">-03:00 Greenland</option>
										<option value="America/Noronha">-02:00 Mid-Atlantic</option>
										<option value="Atlantic/Azores">-01:00 Azores</option>
										<option value="Europe/London">0:00 GMT</option>
										<option value="Europe/Amsterdam">+01:00 Rome</option>
										<option value="Africa/Cairo">+02:00 Cairo</option>
										<option value="Europe/Moscow">+03:00 Moscow</option>
										<option value="Asia/Tehran">+03:30 Tehran</option>
										<option value="Asia/Dubai">+04:00 Abu Dhabi</option>
										<option value="Asia/Kabul">+04:30 Kabul</option>
										<option value="Asia/Yekaterinburg">+05:00 Ekaterinburg</option>
										<option value="Asia/Kolkata">+05:30 New Delhi</option>
										<option value="Asia/Katmandu">+05:45 Kathmandu</option>
										<option value="Asia/Novosibirsk">+06:00 Novosibirsk</option>
										<option value="Asia/Rangoon">+06:30 Yangon</option>
										<option value="Asia/Bangkok">+07:00 Bangkok</option>
										<option value="Asia/Hong_Kong">+08:00 Beijing</option>
										<option value="Australia/Eucla">+08:45 Eucla</option>
										<option value="Asia/Tokyo">+09:00 Tokyo</option>
										<option value="Australia/Darwin">+09:30 Darwin</option>
										<option value="Asia/Vladivostok">+10:00 Vladivostok</option>
										<option value="Australia/Lord_Howe">+10:30 Lord Howe Island</option>
										<option value="Etc/GMT-11">+11:00 Solomon Islands</option>
										<option value="Pacific/Norfolk">+11:30 Norfolk Island</option>
										<option value="Asia/Anadyr">+12:00 Anadyr</option>
										<option value="Pacific/Auckland">+12:00 Auckland</option>
										<option value="Pacific/Chatham">+12:45 Chatham Islands</option>
										<option value="Pacific/Tongatapu">+13:00 Nuku'alofa</option>
										<option value="Pacific/Kiritimati">+14:00 Kiritimati</option>
									</select>
									<input type="submit" name="color_submit" value="Change Time Zone" class="settings_submit">
								</form>
							</td>
						</tr>
					</table>
					
					
					
					<div class='bump'></div>
					
					
					
					<span class="tenon">To restore an Miter archive, unzip *.txt files to dat/</span>
					<div class='bump'></div>
					<?
						// miter dir size
						$dir_size = 0;
						$dir_loc = 'dat';
						$miter_files = glob($dir_loc.'/*');
						foreach($miter_files as $miter_path){
							is_file($miter_path) && $dir_size += filesize($miter_path);
							is_dir($miter_path) && get_dir_size($miter_path);
						}
						if ($dir_size > 1024) {
							$miter_size = $dir_size / 1024;
							$miter_size = "" . number_format($miter_size, 2) . " kb";
							} else {
							$miter_size = "" . number_format($dir_size) . " bytes";
						}
					?>
					<table class='setting_table'>
						<tr>
							<td>
								<form name="miter_button_form" action="scr/download.php" method="POST" target="_blank">
									<input class="settings_field" value="<? 
										echo "" . $miter_size . "";
									?>">
									<input type="submit" value="Download Miter Archive" class="settings_submit">
								</form>
							</td>
						</tr>
					</table>
					
					
					
					<div class='bump'></div>
					
					
					
					<?
						// user xml file size
						$xml_dir = 'usr/user.xml';
						$xml_size = filesize($xml_dir);
					?>
					<table class='setting_table'>
						<tr>
							<td>
								<form name="miter_button_form" action="usr/user.xml" method="POST" target="_blank">
									<input class="settings_field" value="<? 
										echo "" . number_format($xml_size) . " bytes";
										?>">
										<input type="submit" value="Download User Data" class="settings_submit">
									</form>
								</td>
							</tr>
						</table>
						
						
						
						<div class='bump'></div>
						
						
						
						<span class="tenon">Warning: This action is permanent</span>
						<div class='bump'></div>
						<table class='setting_table'>
							<tr>
								<td>
									<form name="miter_button_form" action="scr/delete_archive.php" method="POST" target="_blank">
										<input type="submit" value="Delete Archive" class="settings_submit_solo" style="background-color:#af7579;color:#fff;" onclick="return confirm('Delete Archive?!')">
									</form>
								</td>
							</tr>
						</table>
						
						
					</td>
				</tr>
			</table>																											