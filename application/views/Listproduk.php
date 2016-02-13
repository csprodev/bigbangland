<!DOCTYPE html>
<html>
<style type="text/css">
	.btnEdit, .btnDelete
	{
		background-color: Transparent;
	    background-repeat:no-repeat;
	    border: none;
	    cursor:pointer;
	    overflow: hidden;
	    outline:none;
	}

	table
	{
		font-size: 14pt;
	}

	thead
	{
		color: #E8A3D1;
		background-color: #555;
	}
</style>
<script type="text/javascript">
	var dataTbl;
    $(document).ready(function() {
        resetCallBack();
        dataTbl = $("#dataTables-example").dataTable({
                "aoColumns": [
                    { "sWidth": "10%"},
                    { "sWidth": "20%" },
                    { "sWidth": "15%" ,"sClass": "right"},
                    { "sWidth": "10%" ,"sClass": "right"},
                    { "sWidth": "35%" },
                    { "sWidth": "10%" },
                    { "sWidth": "5%","sClass": "center" },
                    { "sWidth": "5%","sClass": "center" }
                    
                ],
                "aaSorting": [[ 0, "asc" ]],
                "bProcessing": true,
                "bServerSide": true,
                "sAjaxSource": site_url+'produk/listproduk',
                "aaSorting": [[ 0, "asc" ]],
                "aoColumnDefs": [
                    {
                        "bSortable":false, "aTargets":[
                            6,7
                        ]
                    }
                ],
                "pagingType": "full_numbers",
                "dom":'<"top"if<"clearfix">><l><p><"clearfix">rt',
                "fnDrawCallback":function(oSettings){
                    resetCallBack();
                }
            });
    });

	function resetCallBack()
    {
        $(".btnDelete").unbind('click');
        $(".btnDelete").click(function(e){
            var data = $(this).attr('data');
            $.displayConfirm("Are you sure to delete this data?", function(){
                var csrf_code = $("input[name='csrf_shoppink']").val();//alert(csrf_code);
                $(".loading").show();
                $.post("<?php echo site_url('user/delete'); ?>",
                { 
                    csrf_shoppink: csrf_code,
                    user_code:data 
                },
                function(data){
                    dataTbl.fnDraw();
                    $(".loading").hide();
                },
                "json");
            });
        });
    }
</script>
<body>
	<div class="container">
		<br><br>
		<?php
		if(isset($user))
		{
			if($user->user_type == 'ADM')
			{
				?>
				<div>
					<a href="<?php echo site_url('produk/add')?>"><button name="addNewProduk" type="submit" class="btn">Add Product</button></a>
				</div><br>
				<?php
			}
		}
		?>
		<table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr>
                    <th>Kode Produk</th>
                    <th>Name Produk</th>
                    <th>Harga</th>
                    <th>Discount</th>
                    <th>Deskripsi</th>
                    <th>Kategori</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
        </table>
        <br>
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