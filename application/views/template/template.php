<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $title; ?></title>
		<link href="<?php echo base_url()?>css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
		<link href="<?php echo base_url()?>css/dataTables.bootstrap.css" rel="stylesheet" type="text/css"/>	
		<link href="<?php echo base_url()?>css/styles.css" rel="stylesheet">
		<!--//menu-->
		<!--theme-style-->
		<link href="<?php echo base_url()?>css/style.css" rel="stylesheet" type="text/css" media="all" />
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="<?php echo base_url()?>js/jquery.min.js"></script>
		<!-- Custom Theme files -->
		<!--menu-->
		<script src="<?php echo base_url()?>js/scripts.js"></script>
		<script src="<?php echo base_url()?>js/dataTables/dataTables.bootstrap.js"></script>
		<script src="<?php echo base_url()?>js/dataTables/jquery.dataTables.js"></script>
		<script src="<?php echo base_url()?>js/dataTables/jquery.dataTables.min.js"></script>
		<!--//theme-style-->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="keywords" content="Real Home Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
		Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		<!-- slide -->
		<script src="<?php echo base_url()?>js/responsiveslides.min.js"></script>
	   	<script>
		    $(function () {
		      	$("#slider").responsiveSlides({
			      	auto: true,
			      	speed: 500,
			        namespace: "callbacks",
			        pager: true,
		    	});
	    	});
  		</script>
	</head>
	<body >
	<div id="">
		<div class="navigation"></div>
	    <div class="header clearfix">
	      <?php echo $header; ?>
	    </div>
	      <div class="content clearfix" >
	        <?php echo $content; ?>
	      </div>
	    <div class="footer clearfix">
	      <?php echo $footer; ?>
	    </div>
	  </div>
	</body>
</html>