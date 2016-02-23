<!DOCTYPE html>
<html>
<body >
<!--header-->
	<div class="navigation">
			<div class="container-fluid">
				<nav class="pull">
					<ul>
						<li><a  href="<?php echo site_url('index.php/home')?>">Home</a></li>
						<li><a  href="<?php echo site_url('index.php/home/aboutus')?>">About Us</a></li>
						<li><a  href="<?php echo site_url('index.php/home/blog')?>">Blog</a></li>
						<li><a  href="<?php echo site_url('index.php/home/contact')?>">Contact Us</a></li>
						<li><a  href="<?php echo site_url('index.php/home/terms')?>">Help</a></li>

					</ul>
				</nav>			
			</div>
		</div>

<div class="header">
	<div class="container">
		<!--logo-->
			<div class="logo">
				<h1><a href="<?php echo site_url('index.php/home')?>"><img src="<?php echo base_url()?>/images/bigbang/logo.png"></a></h1>
			</div>
		<!--//logo-->
		<div class="top-nav">
			<ul class="right-icons" >
				<?php
				
				if($this->session->userdata('email') != '')
				{
					if($users->user_type == '9')
					{
						?>
						<li>
							<a style="color:#000;" href="<?php echo site_url('index.php/home/setting')?>"><i class="glyphicon glyphicon-cog"> </i>Setting</a>
						</li>
						<?php
					}
					else if($users->user_type == '1')
					{
						?>
						<li>
							<a style="color:#000;" href="<?php echo site_url('index.php/seller/add')?>"><i class="glyphicon glyphicon-check"> </i>Sell</a>
						</li>
						<?php
					}
					?>
					<li>
						<?php
						if($users->user_type == '9')
						{
							?>
							<a  style="color:#000;" href="<?php echo site_url('index.php/users')?>"><i class="glyphicon glyphicon-user"> </i><?php echo $users->user_name; ?></a>
							<?php
						}
						else
						{
							?>
							<i class="glyphicon glyphicon-user"> </i>
							<?php
							echo $users->user_name;
						}
						?>
					</li>
					<?php
				}
				if($this->session->userdata('email') == '')
				{
					?>
					<li><a style="color:#000;" href="<?php echo site_url('index.php/login')?>"><i class="glyphicon glyphicon-user"> </i>Login</a></li>	
					<?php
				}
				else
				{
					?>
					<li><a style="color:#000;" href="<?php echo site_url('index.php/login/logout')?>"><i class="glyphicon glyphicon-off"> </i><?php echo 'logout';?></a></li>	
					<?php
				}
				?>
				
				<li><a style="color:#000;" class="play-icon popup-with-zoom-anim" href="#small-dialog"><i class="glyphicon glyphicon-search"> </i> </a></li>
				
			</ul>
			<div class="nav-icon">
				<div class="hero fa-navicon fa-2x nav_slide_button" id="hero">
						<a href="#" ><i style="color:#000;" class="glyphicon glyphicon-menu-hamburger"></i> </a>
					</div>	
				<!---
				<a href="#" class="right_bt" id="activator"><i class="glyphicon glyphicon-menu-hamburger"></i>  </a>
			--->
			</div>
		<div class="clearfix"> </div>
			<!---pop-up-box---->
			   
				<link href="<?php echo base_url()?>css/popuo-box.css" rel="stylesheet" type="text/css" media="all"/>
				<script src="<?php echo base_url()?>js/jquery.magnific-popup.js" type="text/javascript"></script>
			<!---//pop-up-box---->
				<div id="small-dialog" class="mfp-hide">
					    <!----- tabs-box ---->
				<div class="sap_tabs">	
				     <div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
						  <ul class="resp-tabs-list">
						  	  <li class="resp-tab-item " aria-controls="tab_item-0" role="tab"><span>All Homes</span></li>
							  <li class="resp-tab-item" aria-controls="tab_item-1" role="tab"><span>For Sale</span></li>
							  <li class="resp-tab-item" aria-controls="tab_item-2" role="tab"><span>For Rent</span></li>
							  <div class="clearfix"></div>
						  </ul>				  	 
						  <div class="resp-tabs-container">
						  		<h2 class="resp-accordion resp-tab-active" role="tab" aria-controls="tab_item-0"><span class="resp-arrow"></span>All Homes</h2><div class="tab-1 resp-tab-content resp-tab-content-active" aria-labelledby="tab_item-0" style="display:block">
								 	<div class="facts">
									  	<div class="login">
											<input type="text" value="Search Address, Neighborhood, City or Zip" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search Address, Neighborhood, City or Zip';}">		
									 		<input type="submit" value="">
									 	</div>        
							        </div>
						  		</div>
							     <h2 class="resp-accordion" role="tab" aria-controls="tab_item-1"><span class="resp-arrow"></span>For Sale</h2><div class="tab-1 resp-tab-content" aria-labelledby="tab_item-1">
									<div class="facts">									
										<div class="login">
											<input type="text" value="Search Address, Neighborhood, City or Zip" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search Address, Neighborhood, City or Zip';}">		
									 		<input type="submit" value="">
									 	</div> 
							        </div>	
								 </div>									
							      <h2 class="resp-accordion" role="tab" aria-controls="tab_item-2"><span class="resp-arrow"></span>For Rent</h2><div class="tab-1 resp-tab-content" aria-labelledby="tab_item-2">
									 <div class="facts">
										<div class="login">
											<input type="text" value="Search Address, Neighborhood, City or Zip" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search Address, Neighborhood, City or Zip';}">		
									 		<input type="submit" value="">
									 	</div> 
							         </div>	
							    </div>
					      </div>
					 </div>
					 <script src="<?php echo base_url()?>js/easyResponsiveTabs.js" type="text/javascript"></script>
				    	<script type="text/javascript">
						    $(document).ready(function () {
						    	var site_url = '<?php echo site_url('/'); ?>';
						        $('#horizontalTab').easyResponsiveTabs({
						            type: 'default', //Types: default, vertical, accordion           
						            width: 'auto', //auto or any width like 600px
						            fit: true   // 100% fit in a container
						        });
						    });
			  			 </script>	
				</div>
				</div>
				 <script>
						$(document).ready(function() {
						$('.popup-with-zoom-anim').magnificPopup({
							type: 'inline',
							fixedContentPos: false,
							fixedBgPos: true,
							overflowY: 'auto',
							closeBtnInside: true,
							preloader: false,
							midClick: true,
							removalDelay: 300,
							mainClass: 'my-mfp-zoom-in'
						});
																						
						});
				</script>
					
	
		</div>
		<div class="clearfix"> </div>
		</div>	
</div>
	
<!--//footer-->
</body>
</html>