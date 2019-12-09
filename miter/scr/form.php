<?
	
	// if quote
	if (isset($_GET['quote'])) {
		$quote_id = $_GET['quote'];
	}
	
	// if edit last
	if (isset($_GET['edit'])) {
		$edit_last_id = $_GET['edit'];
		// get edit last
		$edit_last_file = $edit_last_id . '.txt';
		$edit_last_dir = 'dat/';
		$edit_last_get = $edit_last_dir . '' . $edit_last_file;
		$edit_last = file($edit_last_get, FILE_IGNORE_NEW_LINES);
		$edit_last_text  = $edit_last[0];
		$edit_last_text  = str_replace("<br />", "\n", $edit_last_text);
		$quote_id        = $edit_last[1];
		$edit_last_img   = $edit_last[2];
		$edit_last_tpimg = $edit_last[3];
		$edit_last_odate = $edit_last[4];
		$edit_last_gdate = $edit_last[5];
	} 
	
?>

<div align="center">
	<table class="gen_table">
		<tr>
			<td class='gen_td'>
				
				<form name="miterform" id="miterform" action="scr/<? if (strlen($edit_last_id) != 0) { echo 'replace.php'; } else { echo 'miter.php'; } ?>" method="POST" enctype="multipart/form-data" onsubmit="return validate()">
					
					<textarea id="miter" name="miter" class="miter_input" maxlength="260" onkeyup="limiter();"><? echo $edit_last_text; ?></textarea>
					
					<table class="sub_button_table">
						<tr>
							<td class="td_button" align="center">
								<table class="button_table_holder">
									<tr>
										<td>                 
											<input type="button" value="b" title="b" onclick="addTag(this)" class="format_button" style="font-weight:bold;" />
											<input type="button" value="i" title="i" onclick="addTag(this)" class="format_button" style="font-style:italic;" />
											<input type="button" value="u" title="u" onclick="addTag(this)" class="format_button" style="text-decoration:underline;" />
											<input type="button" value="s" title="s" onclick="addTag(this)" class="format_button" style="text-decoration:line-through;" />
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
					
					<table class="sub_link_table">
						<tr>
							<td class="link_td" align="right">
								<?
									if (strlen($quote_id) != 0) {
										echo "<input id='url' name='url' class='miter_url_field' value='" . $quote_id . "'>";
										} else {
									?>
									<input id="url" name="url" class="miter_url_field" value="Link, Image or Video:" onfocus="(this.value == 'Link, Image or Video:') && (this.value = '')" onblur="(this.value == '') && (this.value = 'Link, Image or Video:')">
									<?
									}
								?>
							</td>
						</tr>
					</table>
					
					<? if (strlen($edit_last_id) != 0) {
						echo "<input type='hidden' id='img' name='img' value='" . $edit_last_img . "'>";
						echo "<input type='hidden' id='odate' name='odate' value='" . $edit_last_odate . "'>";
						echo "<input type='hidden' id='gdate' name='gdate' value='" . $edit_last_gdate . "'>";
						echo "<input type='hidden' id='filename' name='filename' value='" . $edit_last_id . "'>";
					} ?>
					
					<table cellpadding="0" cellspacing="0" class="sub_submit_table">
						<tr>
							<td class="upload_td" align="left">
								<input name="upload" type="file" id="upload" class="upload_style">
							</td>
							<td class="submit_td" align="right">
								<script>
									document.write("<input type='submit' name='submit' value="+count+" class='miter_user_submit'>");
								</script>
							</td>
						</tr>
					</table>
					
				</form>
                
				<script src="scr/buttons.js"></script>
				
			</td>
		</tr>
	</table>
</div>