<!DOCTYPE html>
<html>
<body>
	<div class="container">
		<div class="registration">
		<div class="registration_left">
		<h2><span> buat akun </span></h2>
		
		<script>
			(function() {
		
			// Create input element for testing
			var inputs = document.createElement('input');
			
			// Create the supports object
			var supports = {};
			
			supports.autofocus   = 'autofocus' in inputs;
			supports.required    = 'required' in inputs;
			supports.placeholder = 'placeholder' in inputs;
		
			// Fallback for autofocus attribute
			if(!supports.autofocus) {
				
			}
			
			// Fallback for required attribute
			if(!supports.required) {
				
			}
		
			// Fallback for placeholder attribute
			if(!supports.placeholder) {
				
			}
			var send = document.getElementById('register-submit');
			if(send) {
				send.onclick = function () {
					this.innerHTML = '...Sending';
				}
			}
		})();
		</script>
		 <div class="registration_form">
		 	<?php echo form_open('users/newUsers');?>
			<div>
				<label>
					<input name="user_name" placeholder="nama" type="text" tabindex="1" required autofocus>
				</label>
			</div>
			<div>
				<label>
					<input name="email" placeholder="email" type="email" tabindex="2" required>
				</label>
			</div>
			<div>
				<label>
					<input name="no_telp" placeholder="no. telp." type="text" tabindex="3" required autofocus>
				</label>
			</div>
			<div>
				<label>
					<textarea name="alamat" placeholder="Alamat" tabindex="4" style="height: 100px; width: 520px;" required autofocus></textarea>
				</label>
			</div>
			<div>
				<label>
					<input name="provinsi" placeholder="provinsi" type="text" tabindex="5" required autofocus>
				</label>
			</div>
			<div>
				<label>
					<input name="kota" placeholder="kota" type="text" tabindex="6" required autofocus>
				</label>
			</div>
			<div>
				<label>
					<input name="kode_pos" placeholder="kode pos" type="text" tabindex="7" required autofocus>
				</label>
			</div>
			<!-- <div class="sky-form">
				<div class="sky_form1">
					<ul>
						<li><label class="radio left"><input type="radio" name="gender" checked=""><i></i>Male</label></li>
						<li><label class="radio"><input type="radio" name="gender"><i></i>Female</label></li>
						<div class="clearfix"></div>
					</ul>
				</div>
			</div> -->
			<div>
				<label>
					<input name="password" placeholder="password" type="password" tabindex="9" required>
				</label>
			</div>						
			<div>
				<label>
					<input name="re_password" placeholder="retype password" type="password" tabindex="10" required>
				</label>
			</div>	
			<div>
				<input name="btnSubmit_reg" type="submit" value="Submit" id="register-submit">
			</div>
			<!-- <div class="sky-form">
				<label class="checkbox"><input type="checkbox" name="checkbox" ><i></i>i agree to shoppe.com &nbsp;<a class="terms" href="#"> terms of service</a> </label>
			</div> -->
		</div>
		<?php
		echo form_close();
		?>
	</div>
		<div class="clearfix"></div>
		</div>
		</div>
	</div>
</div>
   <!-- content-section-ends -->	
   <!-- contact-section-starts -->
	<div class="content-section">
		<div class="container">
			<div class="col-md-3 about-us">
				<h4>LITTLE ABOUT US</h4>
				<p><span>Sed posuere</span> consectetur  est at. Nulla vitae elit libero, a pharetra. Lorem ipsum <span>dolor sit</span> amet, consectetuer adipiscing elit.</p>
				<h4>FOLLOW US</h4>
				<div class="social-icons">
					<i class="facebook"></i>
					<i class="twitter"></i>
					<i class="rss"></i>
					<i class="vimeo"></i>
					<i class="dribble"></i>
					<i class="msn"></i>
				</div>
			</div>
			<div class="col-md-3 archives">
				<h4>ARCHIVES</h4>
				<ul>
					<li><a href="#">March 2012</a></li>
					<li><a href="#">February 2012</a></li>
					<li><a href="#">January 2012</a></li>
					<li><a href="#">December 2011</a></li>
				</ul>
			</div>
			<div class="col-md-3 contact-us">
				<h4>CONTACT US</h4>
				<ul>
					<li><i class="message"></i></li>
					<li><a href="mail-to:info@premiumcoding.com">info@premiumcoding.com</a></li>
				</ul>
				<ul>
					<li><i class="land-phone"></i></li>
					<li>800 756 156</li>
				</ul>
				<ul>
					<li><i class="smart-phone"></i></li>
					<li>+386408007561</li>
				</ul>
			</div>
			<div class="col-md-3 about-us">
				<h4>SIGN TO NEWSLETTER</h4>
				<input type="text" class="text" value="Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}">
				<input type="text" class="text" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}">
				<input type="submit" value="subscribe">
			</div>	
			<div class="clearfix"></div>
		</div>
	</div>
</body>
</html>