<!DOCTYPE html>
<html>
<body>
<!--contact-->
<div class="login-right">
	<div class="container">
		<h3>Login</h3>
		<div class="login-top">
			<!-- <ul class="login-icons">
				<li><a href="#" ><i class="facebook"> </i><span>Facebook</span></a></li>
				<li><a href="#" class="twit"><i class="twitter"></i><span>Twitter</span></a></li>
				<li><a href="#" class="go"><i class="google"></i><span>Google +</span></a></li>
				<li><a href="#" class="in"><i class="linkedin"></i><span>Linkedin</span></a></li>
				<div class="clearfix"> </div>
			</ul> -->
			<div class="form-info">
				<?php echo form_open('login');?>
					<div>
						<input name="email" type="text" class="text" placeholder="User Code" required>
					</div>
					<div>
						<input name="password" type="password"  placeholder="Password" required>
					</div>
					
					<label class="hvr-sweep-to-right">
			           	<input type="submit" value="Submit" name="btnsubmit">
			        </label>
				<?php echo form_close(); ?>
			</div>
			<div class="create">
				<h4>New To BigbangLand?</h4>
				<a class="hvr-sweep-to-right" href="<?php echo site_url('index.php/login/register')?>">Create an Account</a>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
</div>
</body>
</html>