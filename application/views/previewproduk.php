<!DOCTYPE html>
<html>
<script>
			jQuery(document).ready(function($){

				$('#etalage').etalage({
					thumb_image_width: 300,
					thumb_image_height: 400,
					source_image_width: 800,
					source_image_height: 1000,
					show_hint: true,
					click_callback: function(image_anchor, instance_id){
						alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
					}
				});

			});
		</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#horizontalTab').easyResponsiveTabs({
            type: 'default', //Types: default, vertical, accordion           
            width: 'auto', //auto or any width like 600px
            fit: true,   // 100% fit in a container
            closed: 'accordion', // Start closed if in accordion view
            activate: function(event) { // Callback function if tab is switched
                var $tab = $(this);
                var $info = $('#tabInfo');
                var $name = $('span', $info);
                $name.text($tab.text());
                $info.show();
            }
        });

        $('#verticalTab').easyResponsiveTabs({
            type: 'vertical',
            width: 'auto',
            fit: true
        });
    });
</script>
	    <script type="text/javascript" src="<?php echo base_url()?>js/move-top.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>js/easing.js"></script>
<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
				});
			});
		</script>
</head>
<body>
	<div class="single">
			<!-- start span1_of_1 -->
			<div class="left_content">
			<div class="span_1_of_left">
				<div class="grid images_3_of_2">
						<ul id="etalage" >
							<li>
								<a href="optionallink.html">
									<img class="etalage_thumb_image" src="<?php echo base_url()?>upload_produk/<?php echo $produks->item_code.'_'.$produks->item_name;?>.jpg" class="img-responsive" />
									<img class="etalage_source_image" src="<?php echo base_url()?>upload_produk/<?php echo $produks->item_code.'_'.$produks->item_name;?>.jpg" class="img-responsive" title="" />
								</a>
							</li>
							<li>
								<img class="etalage_thumb_image" src="images/d1.jpg" class="img-responsive" />
								<img class="etalage_source_image" src="images/d1.jpg" class="img-responsive" title="" />
							</li>
							<li>
								<img class="etalage_thumb_image" src="images/d2.jpg" class="img-responsive"  />
								<img class="etalage_source_image" src="images/d2.jpg"class="img-responsive"  />
							</li>
						    <li>
								<img class="etalage_thumb_image" src="images/d3.jpg" class="img-responsive"  />
								<img class="etalage_source_image" src="images/d3.jpg"class="img-responsive"  />
							</li>
						</ul>
						 <div class="clearfix"></div>		
				  </div>

			<!-- start span1_of_1 -->
			<div class="span1_of_1_des">
				  <div class="desc1">
					<h3><?php echo $produks->item_name; ?></h3>
					<p><?php echo $produks->item_desc; ?></p>
					<h5><?php echo 'Rp. '.number_format($produks->price,2,',','.');?><a href="#">click for offer</a></h5>
					<div class="available">
						
						<div class="btn_form">
							<!-- <form> -->
							<?php echo form_open('Produk/preview/'.$produks->item_code);?>
							<h4>Available Options :</h4>
							<ul>
								<li>Size:
									<select name="ukuran">
										<option>L</option>
										<option>XL</option>
										<option>S</option>
										<option>M</option>
									</select>
								</li>
								<li style="margin-right: 200px;">Quantity:
									<input type="number" name="qty" value="1"/>
								</li>
							</ul>
							<input type="submit" name="btnCart" value="add to cart" title="" />
							<?php echo form_close();?>
							<!-- </form> -->
						</div>
						<?php
						if($this->session->userdata('id') == '')
						{
							?>
							<span class="span_right"><a href="<?php echo site_url()?>users/login">login to save in wishlist </a></span>
							<?php
						}?>
						<div class="clearfix"></div>
					</div>
					<!-- <div class="filter-by-color"> -->
				<!-- <h3>Filter by Color</h3>
				<ul class="w_nav2">
				<li><a class="color1" href="#"></a></li>
				<li><a class="color2" href="#"></a></li>
				<li><a class="color3" href="#"></a></li>
				<li><a class="color4" href="#"></a></li>
				<li><a class="color5" href="#"></a></li>
				<li><a class="color10" href="#"></a></li>
				<li><a class="color7" href="#"></a></li>
				<li><a class="color8" href="#"></a></li>
				<li><a class="color9" href="#"></a></li>
				<li><a class="color10" href="#"></a></li>
				<li><a class="color6" href="#"></a></li>
				<li><a class="color13" href="#"></a></li>
				<li><a class="color14" href="#"></a></li>
				<li><a class="color15" href="#"></a></li>
				<li><a class="color16" href="#"></a></li>
				<li><a class="color17" href="#"></a></li>
				<li><a class="color1" href="#"></a></li>
				<li><a class="color3" href="#"></a></li>
				<li><a class="color2" href="#"></a></li> -->
			<!-- </ul>

			</div> -->
			   	 </div>
			   	</div>
					<div class="clearfix"></div>
				</div>
			   
			   	<!-- start tabs -->
			    <!--Horizontal Tab-->
        <div id="horizontalTab">
            <ul class="resp-tabs-list">
                <li>Specifications</li>
                <li>Reviews</li>
            </ul>
            <div class="resp-tabs-container">
               <div class="tab-content">
                    <p class="para"><?php echo $produks->spesification; ?>
                </div>
                <div class="tab-content">
                   <p class="para top"><span>LOREM IPSUM</span> There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined </p>
							<ul>
								<li>Research</li>
								<li>Design and Development</li>
								<li>Porting and Optimization</li>
								<li>System integration</li>
								<li>Verification, Validation and Testing</li>
								<li>Maintenance and Support</li>
							</ul>
                </div>
            </div>
        </div>
					
		         	<!-- end tabs -->
			   	</div>
		
			 <div class="left_sidebar">
					<div class="sellers">
						<h4>Best Sellers</h4>
						<div class="single-nav">
			                <ul>
			                   <li><a href="#">Always free from repetition</a></li>
			                    <li><a href="#">Always free from repetition</a></li>
			                    <li><a href="#">The standard chunk of Lorem Ipsum</a></li>
			                    <li><a href="#">The standard chunk of Lorem Ipsum</a></li>
			                    <li><a href="#">Always free from repetition</a></li>
			                    <li><a href="#">The standard chunk of Lorem Ipsum</a></li>
			                    <li><a href="#">Always free from repetition</a></li>
			                    <li><a href="#">Always free from repetition</a></li>
			                    <li><a href="#">Always free from repetition</a></li>
			                    <li><a href="#">The standard chunk of Lorem Ipsum</a></li>
			                    <li><a href="#">Always free from repetition</a></li>
			                    <li><a href="#">Always free from repetition</a></li>
			                    <li><a href="#">Always free from repetition</a></li>			                    
			                </ul>
			              </div>
						  <div class="banner-wrap bottom_banner color_link">
								<a href="#" class="main_link">
								<figure><img src="images/delivery.png" alt=""></figure>
								<h5><span>Free Shipping</span><br> on orders over $99.</h5><p>This offer is valid on all our store items.</p></a>
						 </div>
						 <div class="brands">
							 <h1>Brands</h1>
					  		 <div class="field">
				                 <select class="select1">
				                   <option>Please Select</option>
										<option>Lorem ipsum dolor sit amet</option>
										<option>Lorem ipsum dolor sit amet</option>
										<option>Lorem ipsum dolor sit amet</option>
				                  </select>
				            </div>
			    		</div>
					</div>
				</div>
					<!-- end sidebar -->
          	    <div class="clearfix"></div>
	       </div>	
		   </div>
	<!-- end content -->
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
	<!-- contact-section-ends -->
	<!-- footer-section-starts -->
	<div class="footer">
		<div class="container">
			<div class="col-md-6 bottom-menu">
				<ul>
					<li><a href="index.html">HOME</a></li>
					<li><a href="#">PORTFOLIO</a></li>
					<li><a href="#">SITEMAP</a></li>
					<li><a href="contact.html"> CONTACT</a></li>
				</ul>
			</div>
			<div class="col-md-6 copy-rights">
				<p>&copy; 2015 Template by <a href="http://w3layouts.com" target="target_blank">W3layouts</a></p>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<!-- footer-section-ends -->
</body>
</html>