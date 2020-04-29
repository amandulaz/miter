<form name="contact_form" id="contact_form" action="cor/contact_scr.php" method="POST" enctype="multipart/form-data">
	<input type="email" id="contact_email" name="contact_email" class="contact_field" value="Electronic Mail" onfocus="(this.value == 'Electronic Mail') && (this.value = '')" onblur="(this.value == '') && (this.value = 'Electronic Mail')" required>
	<div class="space_name"></div>
	<textarea id="contact_text" name="contact_text" class="contact_textarea" maxlength="250" required></textarea>
	<?
	$pass_one = rand(1, 47);
	$pass_two = rand(1, 47);
	$pass_test = $pass_one . "+" . $pass_two . "=";
	echo "<input type='hidden' id='pass_one' name='pass_one' value='" . $pass_one . "'>";
	echo "<input type='hidden' id='pass_two' name='pass_two' value='" . $pass_two . "'>";
	?>
	<input type="text" id="contact_test" name="contact_test" class="contact_field" value="<? echo $pass_test; ?>" required>
	<div class="space_name"></div>
	<input type="submit" name="contact_submit" value="Send" class="contact_submit">
</form>