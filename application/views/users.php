<div class="container">
    <br><br>
    <h3>Users</h3>
    <br>
    <a href="<?php echo site_url('index.php/users/add')?>"><button id="addNew">Add</button></a>
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr>
                <th>Name</th>
                <th>Type</th>
                <th>ID Number</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Mobile Phone</th>
                <th>Email</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
    </table>
    <br>
</div>

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
		font-size: 12pt;
	}

</style>
<script type="text/javascript">
	var dataTbl;
    $(document).ready(function() {
    	var site_url = '<?php echo site_url('/'); ?>';
        resetCallBack();
        dataTbl = $("#dataTables-example").dataTable({
                "aoColumns": [
                    { "sWidth": "15%"},
                    { "sWidth": "5%" },
                    { "sWidth": "15%" },
                    { "sWidth": "20%" },
                    { "sWidth": "10%" },
                    { "sWidth": "10%" },
                    { "sWidth": "15%" },
                    { "sWidth": "5%","sClass": "center" },
                    { "sWidth": "5%","sClass": "center" }
                    
                ],
                "aaSorting": [[ 0, "asc" ]],
                "bProcessing": true,
                "bServerSide": true,
                "sAjaxSource": site_url+'users/datasource',
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
        // $(".btnDelete").unbind('click');
        // $(".btnDelete").click(function(e){
        //     var dataId = $(this).attr('data');
        //     $.displayConfirm("Are you sure to delete this data?", function(){
        //         $.ajax({
        //             url: site_url + 'users/delete',
        //             data:{
        //                 dataId:dataId
        //             },
        //             async:false,
        //             success :function(result){
        //                 data = result;
                        
        //             },
        //         });
        //     });
        // });
    }
</script>
