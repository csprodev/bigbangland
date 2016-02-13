<!DOCTYPE html>
<html>
<script>
	$(document).ready(function(){
		$('#ipresenter').iPresenter({
			timerPadding: -1,
			controlNav: true,
			controlNavThumbs: true,
			controlNavNextPrev: false
		});
	});
</script>
<body>
	<div class="header">
		<div class="slider">
			<div id="ipresenter">
				<div id="intro" class="step" data-x="0" data-y="0" data-thumbnail="images/banner/thumbs/4.jpg">
					<img src="<?php echo base_url()?>images/banner/4.jpg" />
					<!-- <h2>CHECK OUR LATEST FASHION</h2> -->
				</div>

				<div id="capture" class="step" data-x="1100" data-y="1200" data-scale="1.8" data-rotate="180" data-thumbnail="images/banner/thumbs/9.jpg">
					<img src="<?php echo base_url()?>images/banner/9.jpg" />
					<!-- <h2>CHECK OUR LATEST FASHION</h2> -->
				</div>

				<div id="view" class="step" data-x="-300" data-y="600" data-scale="0.2" data-rotate="270" data-thumbnail="images/banner/thumbs/10.jpg">
					<img src="<?php echo base_url()?>images/banner/10.jpg" />
					<!-- <h2>CHECK OUR LATEST FASHION</h2> -->
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-32024393-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<!-- header-section-ends -->
<!-- content-section-starts -->
	<div class="content">
		<div class="sales">
			<div class="container">
				<div class="sales-head text-center">
					<h3>CHECK OUT OUR UNIQUE APPROACH TO <span>FASHION</span></h3>
				</div>
				<div class="sales-grids">
					<div class="col-md-4 sales-grid-a">
						<div class="discount">
							<h4>Sale up to 60%</h4>
						</div>
						<div class="s-img">
							<img src="images/s1.png" alt="" />
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="col-md-4 sales-grid-b">
						<div class="discount">
							<h4>Free Shipping *</h4>
						</div>
						<div class="s-img">
							<img src="images/s2.png" alt="" />
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="col-md-4 sales-grid-c">
						<div class="discount">
							<h4>24/7 Support</h4>
						</div>
						<div class="s-img">
							<img src="images/s3.png" alt="" />
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
		<!-- products-section-starts -->
	  <div class="products-section">
	    <div class="container">
		<div class="product-section-head-text">
		    <h3>NEW <span>ANYAR</span></h3>
		</div>
		<div class="bottom-grids collections">
				<div class="bottom-grids-left">
					<div class="f-products">
							<!----sreen-gallery-cursual---->
						<div class="sreen-gallery-cursual">
							 <!-- requried-jsfiles-for owl -->
							<link href="css/owl.carousel.css" rel="stylesheet">
							    <script src="js/owl.carousel.js"></script>
							        <script>
									    $(document).ready(function() {
									      $("#owl-demo").owlCarousel({
									        items : 3,
									        lazyLoad : true,
									        autoPlay : true,
									        navigation : true,
									        navigationText :  false,
									        pagination : false,
									      });
									    });
									   </script>
							 <!-- //requried-jsfiles-for owl -->
							 <!-- start content_slider -->
						       <div id="owl-demo" class="owl-carousel text-center">
						       	<?php
						       	// print_r($produkNew);die();
						       	foreach($produkNew as $k=>$objProduk)
						       	{
						       		$Expnames = explode(" ", $objProduk->item_name);
						       		// print_r($Expnames);die();
						       		$Unames = '';
						       		foreach($Expnames as $l=>$names)
						       		{
						       			if($l>0)
							       			$Unames .= '_';
							       		$Unames.=$names;
						       		}

							       	?>
					                <div class="item">
					                	<div onclick="location.href='<?php echo site_url()?>produk/preview/<?php echo $objProduk->item_code;?>';" class="product-grid">
											<div class="product-pic">
												<img src="<?php echo base_url()?>upload_produk/<?php echo $objProduk->item_code.'_'.$Unames;?>.jpg" class="img-responsive" style="height:444px;"/>
											</div>
											<div class="product-pic-info">
												<h4><a href="#"><?php echo $objProduk->item_name; ?></a></h4>
												<div class="product-pic-info-price-cart">
													<div class="product-pic-info-price">
														<span><?php echo 'Rp. '.number_format($objProduk->price,0,',','.'); ?></span>
													</div>
													<div class="product-pic-info-cart">
														<?php echo form_open('produk/preview/'.$objProduk->item_code); ?>
														<input type="hidden" name="ukuran" value="M"/>
														<input type="hidden" name="qty" value="1"/>
														<button type="submit" class="p-btn" name="btnCart">Add to Cart</button>
														<?php echo form_close(); ?>
													</div>
													<div class="clearfix"> </div>
												</div>
											</div>
										</div>
					                </div>
					                <?php
					            }?>
				              </div>
						<!--//sreen-gallery-cursual---->
							
					</div>
				</div>
				<div class="d-products product-section-head-text">
			     	<h3>FOR <span> SALE</span></h3>
							<!----sreen-gallery-cursual---->
						<div class="sreen-gallery-cursual">
							 <!-- requried-jsfiles-for owl -->
							<link href="css/owl.carousel.css" rel="stylesheet">
							    <script src="js/owl.carousel.js"></script>
							        <script>
									    $(document).ready(function() {
									      $("#owl-demo1").owlCarousel({
									        items : 3,
									        lazyLoad : true,
									        autoPlay : true,
									        navigation : true,
									        navigationText :  false,
									        pagination : false,
									      });
									    });
									   </script>
							 <!-- //requried-jsfiles-for owl -->
							 <!-- start content_slider -->
						    <div id="owl-demo1" class="owl-carousel text-center">
						       	<?php
						       	foreach($produkDiscAtas as $a=>$objAtasan)
						       	{
						       		$Expnames = explode(" ", $objAtasan->item_name);
						       		// print_r($Expnames);die();
						       		$Unames = '';
						       		foreach($Expnames as $l=>$names)
						       		{
						       			if($l>0)
							       			$Unames .= '_';
							       		$Unames.=$names;
						       		}
						       		?>
					                <div class="item">
					                	<div onclick="location.href='single.html';" class="product-grid">
											<div class="product-pic">
												<img src="<?php echo base_url()?>upload_produk/<?php echo $objAtasan->item_code.'_'.$Unames;?>.jpg" class="img-responsive" style="height:444px;"/>
												<div class="offer"><p><?php echo number_format($objAtasan->discount,0,',','.').' %'; ?></p></div>
											</div>
											<div class="product-pic-info">
												<h4><a href="#"><?php echo $objAtasan->item_name; ?></a></h4>
												<div class="product-pic-info-price-cart">
													<div class="product-pic-info-price">
														<span><?php echo 'Rp. '.number_format($objAtasan->price,0,',','.');?></span>
														
													</div>
													<div class="product-pic-info-cart">
														<a class="p-btn" href="single.html">Add to Cart</a>
													</div>
													<div class="clearfix"> </div>
												</div>
											</div>
										</div>
					                </div>
					                <?php
					            }?>
				            </div>
						<!--//sreen-gallery-cursual---->
							
					</div>
				</div>
				<div class="product-section-head-text">
							<!----sreen-gallery-cursual---->
						<div class="sreen-gallery-cursual">
							 <!-- requried-jsfiles-for owl -->
							<link href="css/owl.carousel.css" rel="stylesheet">
							    <script src="js/owl.carousel.js"></script>
							        <script>
									    $(document).ready(function() {
									      $("#owl-demo2").owlCarousel({
									        items : 3,
									        lazyLoad : true,
									        autoPlay : true,
									        navigation : false,
									        navigationText :  false,
									        pagination : false,
									      });
									    });
									   </script>
							 <!-- //requried-jsfiles-for owl -->
							 <!-- start content_slider -->
						        <div id="owl-demo2" class="owl-carousel text-center">
						        	<?php
							       	foreach($produkDiscBawah as $a=>$objBawahan)
							       	{
							       		$Expnames = explode(" ", $objBawahan->item_name);
							       		// print_r($Expnames);die();
							       		$Unames = '';
							       		foreach($Expnames as $l=>$names)
							       		{
							       			if($l>0)
								       			$Unames .= '_';
								       		$Unames.=$names;
							       		}
							       		?>
						                <div class="item">
						                	<div onclick="location.href='single.html';" class="product-grid">
												<div class="product-pic">
													<img src="<?php echo base_url()?>upload_produk/<?php echo $objBawahan->item_code.'_'.$Unames;?>.jpg" class="img-responsive" style="height:444px;"/>
													<div class="offer"><p><?php echo number_format($objBawahan->discount,0,',','.').' %'; ?></p></div>
												</div>
												<div class="product-pic-info">
													<h4><a href="#"><?php echo $objBawahan->item_name; ?></a></h4>
													<div class="product-pic-info-price-cart">
														<div class="product-pic-info-price">
															<span><?php echo 'Rp. '.number_format($objBawahan->price,0,',','.'); ?></span>
															<label> </label>
														</div>
														<div class="product-pic-info-cart">
															<a class="p-btn" href="single.html">Add to Cart</a>
														</div>
														<div class="clearfix"> </div>
													</div>
												</div>
											</div>
						                </div>
						                <?php
					            	}?>
				              	</div>
						<!--//sreen-gallery-cursual---->
							
					</div>
				</div>
				</div>
	</div>
	</div>
	</div>
	</div>
	<!-- products-section-ends -->
	<!-- brands-section-starts -->
	<div class="brands-section">
		<div class="container">
			<div class="brands-section-head">
				<h3>OUR MAJOR <span>BRANDS</span></h3>
			</div>
			<ul class="sponsors">
				<li><img src="images/b1.png" alt="" /></li>
				<li><img src="images/b2.png" alt="" /></li>
				<li><img src="images/b3.png" alt="" /></li>
				<li><img src="images/b4.png" alt="" /></li>
				<li><img src="images/b5.png" alt="" /></li>
				<li><img src="images/b6.png" alt="" /></li>
			</ul>
		</div>
	</div>
	<!-- brands-section-ends -->
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