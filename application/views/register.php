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
				$address = '';
				$province = '';
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
			}
			?>
				<div>
					<span><label>Name</label></span>
					<input name="user_name" type="text" required="" size="50" maxlength="100" value="<?php echo $user_name; ?>">
					<input name="id" type="hidden" value="<?php echo ($action == 'edit') ? $id : ''; ?>">
				</div>
				<div>
					<span><label>Password</label></span>
					<input name="password" type="password"  <?php echo ($action == 'add') ? 'required' : ''; ?> size="50" maxlength="100">
					<span style="color:#f00; font-size:9pt;"><i><?php echo ($action == 'edit') ? '* Kosongkan jika tidak dirubah' : '' ; ?></i></span>
				</div>
				<div>
					<span><label>Type</label></span>
					<input type="radio" name="user_type" id="sell" value="1">
					<label for="sell">Seller</label>
				</div>
				<div>
					<span></span>
					<input type="radio" name="user_type" id="buy" value="2">
					<label for="buy">Buyer</label>
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
					<span><label>Address by ID</label></span>
					<textarea name="address_by_id" required="" ><?php echo $address_by_id; ?></textarea>
				</div>
				<div>
					<span><label>Province by ID</label></span>
					<input name="province_by_id" type="text" required="" size="50" maxlength="50" value="<?php echo $province_by_id; ?>">
				</div>
				<div>
					<span><label>City by ID</label></span>
					<input name="city_by_id" type="text" required="" size="50" maxlength="50" value="<?php echo $city_by_id; ?>">
				</div>
				<div>
					<span><label>Address</label></span>
					<textarea name="address" required="" ><?php echo $address; ?></textarea>
				</div>
				<div>
					<span><label>Province</label></span>
					<input name="province" type="text" required="" size="50" maxlength="50" value="<?php echo $province; ?>">
				</div>
				<div>
					<span><label>City</label></span>
					<input name="city" type="text" required="" size="50" maxlength="50" value="<?php echo $city; ?>">
				</div>
				<div>
					<span><label>Phone</label></span>
					<input name="phone" type="text"   required="" size="30" maxlength="15" value="<?php echo $phone; ?>">
				</div>
				<div>
					<span><label>Mobile Phone</label></span>
					<input name="mobile_phone" type="text"   required="" size="30" maxlength="15" value="<?php echo $mobile_phone; ?>">
					<span style="color:#f00; font-size:9pt;"><i>*All informatioin will send to this number</i></span>
				</div>
				<div>
					<span><label>Email</label></span>
					<input name="email" type="email"   required="" size="50" maxlength="100" value="<?php echo $email; ?>">
				</div>
				<label class="hvr-sweep-to-right">
		           	<input type="submit" value="<?php echo ($action == 'add') ? 'Sign Up' : 'Update'; ?>" name="btnsubmit">
		        </label>
			<?php echo form_close(); ?>
			<p>Already have a BigbangLand account? <a href="<?php echo site_url('index.php/login')?>">Login</a></p>
		</div>
	</div>
</div>

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