<style type="text/css">
	span
	{
		min-width: 200px;
		display: inline-block;
	}
	textarea
	{
		height: 156px;
    	width: 356px;
	}
</style>
<div class="login-right">
	<div class="container">
		<h3>Setting</h3>
		<div class="form-info">
			<?php
				echo form_open('home/setting');
				$address = $conf->address;
				$phone1 = $conf->phone1;
				$phone2 = $conf->phone2;
				$information = $conf->information;
				$about_us = $conf->about_us;
			?>
			<div>
				<span><label>Address</label></span>
				<textarea name="address"><?php echo nl2br($address); ?></textarea>
			</div>
			<div>
				<span><label>Phone 1</label></span>
				<input name="phone1" type="text" size="50" maxlength="20" value="<?php echo $phone1; ?>">
			</div>
			<div>
				<span><label>Phone 2</label></span>
				<input name="phone2" type="text" size="50" maxlength="20" value="<?php echo $phone2; ?>">
			</div>
			<div>
				<span><label>About Us</label></span>
				<textarea name="about_us"><?php echo nl2br($about_us); ?></textarea>
			</div>
			<div>
				<span><label>Information</label></span>
				<textarea name="information"><?php echo nl2br($information); ?></textarea>
			</div>
			<label class="hvr-sweep-to-right">
				<input type="submit" value="Submit" name="btnsubmit">
			</label>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>