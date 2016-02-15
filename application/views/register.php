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
			<h3>Register</h3>
			<div class="form-info">
				<?php  
				if($action == 'add')
				{
					echo form_open('login/register');
					$user_name = '';
					$password = '';
					$user_type = '';
					$id_no = '';
					$address_by_id = '';
					$province_by_id = '';
					$city_by_id ='';
					$full_name = '';
					$address = '';
					$province = $province;
					$city ='';
					$phone = '';
					$mobile_phone = '';
					$email = '';
				}
				else
				{
					echo form_open('users/edit/'.$id);
					$user_name = $userdata->user_name;
					$password = $userdata->password;
					$user_type = $userdata->user_type;
					$id_no = $userdata->id_no;
					$address_by_id = $userdata->address_by_id;
					$province_by_id = $userdata->province_by_id;
					$city_by_id =$userdata->city_by_id;
					$address = $userdata->address;
					$province = $userdata->province;
					$city =$userdata->city;
					$phone = $userdata->phone;
					$mobile_phone = $userdata->mobile_phone;
					$email = $userdata->email;
					$full_name = $userdata->full_name;
				}
				?>
					<div>
						<span><label>Login Name</label></span>
						<input name="user_name" type="text" required="" size="50" maxlength="100" value="<?php echo $user_name; ?>">
						<input name="id" type="hidden" value="<?php echo ($action == 'edit') ? $id : ''; ?>">
					</div>
					<div>
						<span><label>Password</label></span>
						<input name="password" id="password" type="password" onchange="checkPasswordMatch();" <?php echo ($action == 'add') ? 'required' : ''; ?> size="50" maxlength="100">
						<span style="color:#f00; font-size:9pt;"><i><?php echo ($action == 'edit') ? '* Kosongkan jika tidak dirubah' : '' ; ?></i></span>
					</div>
					<div>
						<span><label>Confirm Password</label></span>
						<input name="confirm_password" id="conf_password" type="password" onchange="checkPasswordMatch();"  <?php echo ($action == 'add') ? 'required' : ''; ?> size="50" maxlength="100">
						<span style="color:#f00; font-size:9pt;"><i><?php echo ($action == 'edit') ? '* Kosongkan jika tidak dirubah' : '' ; ?></i></span>
						<span id='actionCheckPass' style="color:#f00; font-size:9pt; margin-left:-200px"></span>
					</div>
					<div>
						<span><label>Home/Office Phone</label></span>
						<input name="phone" type="text"   required="" size="50" maxlength="15" value="<?php echo $phone; ?>">
					</div>
					<div>
						<span><label>Mobile Phone</label></span>
						<input name="mobile_phone" type="text"   required="" size="50" maxlength="15" value="<?php echo $mobile_phone; ?>">
						<span style="color:#f00; font-size:9pt"><i>*All informatioin will send to this number</i></span>
					</div>
					<div>
						<span><label>Email</label></span>
						<input name="email" type="email"   required="" size="50" maxlength="100" value="<?php echo $email; ?>">
						<span style="color:#f00; font-size:9pt;"><i>*All informatioin will send to this email</i></span>
					</div>
					<div>
						<span><label>Register as</label></span>
						<input type="radio" name="user_type" id="sell" value="1" required>
						<label for="sell" style="margin-right:90px">Seller</label>
						<input type="radio" name="user_type" id="buy" value="2">
						<label for="buy">Buyer</label>
					</div>
						<span></span>
					<div>
						<span><label>Select your ID Card</label></span>
						<select name='type_id' id='type_id' style='width:350px'>
							<option value='ktp'>ID Card (KTP)</option>
							<option value='sim'>Driving Licence (SIM)</option>
							<option value='paspor'>Paspor</option>
						</select>
					</div>
					<?php
					if($this->session->userdata('email') != '')
					{
						$type = $this->usersmodel->GetByCode($this->session->userdata('email'));
						if($type->user_type == '9')
						{
							?>
							<div>
								<span></span>
								<input type="radio" name="user_type" id="adm" value="9">
								<label for="adm">Admin</label>
							</div>
							<?php
						}
					}
					?>
					<div>
						<span><label>ID Number</label></span>
						<input name="id_no" type="text" required="" size="50" maxlength="20" value="<?php echo $id_no; ?>">
					</div>
					<div>
						<span><label>Full Name by ID</label></span>
						<input name="full_name" type="text" required="" size="50" maxlength="100" value="<?php echo $full_name; ?>">
						<input name="id" type="hidden" value="<?php echo ($action == 'edit') ? $id : ''; ?>">
					</div>
					<div>
						<span><label>Address by ID</label></span>
						<textarea name="address_by_id" required="" ><?php echo $address_by_id; ?></textarea>
					</div>
					<div>
						<span><label>Province by ID</label></span>
						<select name="province" id="province" style='width:350px' required>
				    		<option value='' selected>-- Select Province --</option>
				    		<?php
				    			if(!empty($province))
				    			{
				    				foreach($province as $key => $val)
				    				{
				    					echo "<option value='".$val['id_province']."'>".$val['province']."</option>";
				    				}
				    			}
				    		?>
				    	</select>
					</div>
					<div>
						<span><label>City by ID</label></span>
						<select name="city" id="city" style='width:350px' required>
				    		<option value=''>- - - -</option>
				    	</select>
					</div>
					<div>
						<span><label>Current Address</label></span>
						<input type="checkbox" name="check_cur_add" id="check_cur_add" value="1" style='margin-left:-18px;min-width: 50px;' />As Above
					</div>
					<div id='ca'>
						<span><label></label></span>
						<textarea name="address" id="cur_add"><?php echo $address; ?></textarea>
					</div>
					<div id='cp'>
						<span><label>Province</label></span>
						<select name="curr_province" id="curr_province" style='width:350px'>
				    		<option value='' selected>-- Select Province --</option>
				    		<?php
				    			if(!empty($province))
				    			{
				    				foreach($province as $key => $val)
				    				{
				    					echo "<option value='".$val['id_province']."'>".$val['province']."</option>";
				    				}
				    			}
				    		?>
				    	</select>
					</div>
					<div id='cc'>
						<span><label>City</label></span>
						<select name="curr_city" id="curr_city" style='width:350px'>
				    		<option value=''>- - - -</option>
				    	</select>
					</div>
					<label class="hvr-sweep-to-right" style='margin-top:20px'>
			           	<input type="submit" value="<?php echo ($action == 'add') ? 'Sign Up' : 'Update'; ?>" name="btnsubmit">
			        </label>
				<?php echo form_close(); ?>
				<p>Already have a BigbangLand account? <a href="<?php echo site_url('index.php/login')?>">Login</a></p>
			</div>
		</div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/responsiveslides.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/easyResponsiveTabs.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.magnific-popup.js"></script>
	<script>
		function checkPasswordMatch() {
		    var password = $("#password").val();
		    var confirmPassword = $("#conf_password").val();

		    if (password !== confirmPassword)
		        $("#actionCheckPass").html("<span><i>*Password Not Match!</i></span>");
		    else
		        $("#actionCheckPass").html("<span style='color:#2F9EB0'><i>*Password Match</i></span>");
		}

		$(document).ready(function () {
		   $("#conf_password").keyup(checkPasswordMatch);
		});
	</script>

	<script type="text/javascript">
		$(document).ready(function(){
			$("select").change(function(){
				var currentId = $(this).attr("id");
				var url = "<?php echo base_url().'login/ajax_value'; ?>";
				var idCity = '';

				if(currentId == 'province') idCity = 'city';
				else if(currentId == 'curr_province') idCity = 'curr_city'; 
				
				pv_val = $(this).val();
				var send_data = "pv=" + pv_val + "&next_id=" + idCity;

				// script loading
				if(currentId == 'province' || currentId == 'curr_province')
				{
					$.ajax({
						type: "POST",
						url: url,
						data: send_data,
						cache: false,
						success: function(result){
							document.getElementById(idCity).innerHTML = result;
						}
					});
				}
			});
		});
	</script>

	<script type="text/javascript">
		$(document).ready(function(){
			$(':checkbox:checked').prop('checked',false);
			$(":checkbox").change(function(){
				val = $(this).val();
				
				if($("#check_cur_add").is(":checked"))
				{
					document.getElementById("cur_add").innerHTML = '';
					$("select#curr_province")[0].selectedIndex = 0;
					$("select#curr_city")[0].selectedIndex = 0;

					document.getElementById("ca").hidden = true;
					document.getElementById("cp").hidden = true;
					document.getElementById("cc").hidden = true;
				}
				else
				{
					document.getElementById("cur_add").innerHTML = '';
					$("select#curr_province")[0].selectedIndex = 0;
					$("select#curr_city")[0].selectedIndex = 0;


					document.getElementById("ca").hidden = false;
					document.getElementById("cp").hidden = false;
					document.getElementById("cc").hidden = false;
				}
			});
		});
	</script>

	<script type="text/javascript">
		var action = <?php echo json_encode($action); ?>;
		var userdata = <?php echo json_encode($userdata); ?>;

		$(document).ready(function(){
			if(action == 'edit')
			{
				$(userdata).each(function(idx, val){
					if(val.user_type == '1')
					{
						$("#sell").prop("checked", true);
					}
					else if(val.user_type == '2')
					{
						$("#buy").prop("checked", true);
					}
					else
					{
						$("#adm").prop("checked", true);
					}
				});
			}
		});
	</script>