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
			<h3>Sell</h3>
			<div class="form-info">
				<?php  
				if($action == 'add')
				{
					echo form_open('seller/add');
					$title = '';
					$date = '';
					$user_type = '';
					$id_no = '';
					$address_by_id = '';
					$province_by_id = '';
					$city_by_id ='';
					$full_name = '';
					$address = '';
					// $province = $province;
					$city ='';
					$phone = '';
					$mobile_phone = '';
					$email = '';
				}
				else
				{
					echo form_open('seller/edit/'.$id);
					$title = $userdata->title;
					$date = $userdata->date;
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
						<span><label>Title</label></span>
						<input name="title" type="text" required="" size="50" maxlength="100" value="<?php echo $title; ?>">
					</div>
					<div>
						<span><label>Date</label></span>
						<input name="date" id="date" type="date" size="50" value="<?php echo $date; ?>">
					</div>
					<div>
						<span><label>Address</label></span>
						<textarea name="address_by_id" required="" ><?php echo $address_by_id; ?></textarea>
					</div>
					<div>
						<span><label>Province</label></span>
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
					<input id="pac-input" class="controls" type="text" placeholder="Search">
              		<div id="googleMap" style="width:100%;height:500px;"></div>
					<label class="hvr-sweep-to-right" style='margin-top:20px'>
			           	<input type="submit" value="<?php echo ($action == 'add') ? 'Submit' : 'Update'; ?>" name="btnsubmit">
			        </label>
				<?php echo form_close(); ?>	
			</div>
		</div>
	</div>
	<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDoLI5oBm-YKNQSG2hfvMbeYDTuuqkbd_Y&callback=initMap">
	</script>
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

		var markersToRemove = [];
    var myCenter=new google.maps.LatLng(-8.4420734,114.9356164);
    function initialize() {
      var mapProp = {
        center:myCenter,
        zoom:10,
        mapTypeId:google.maps.MapTypeId.ROADMAP
      };
      var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
      //search
      var input = document.getElementById('pac-input'),
        searchBox = new google.maps.places.SearchBox(input);
      map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
      map.addListener('bounds_changed', function() {
          searchBox.setBounds(map.getBounds());
      });
      searchBox.addListener('places_changed', function() {
          
          var places = searchBox.getPlaces();
          if (places.length == 0) {
              return;
          }
          var bounds = new google.maps.LatLngBounds();
          places.forEach(function(place) {
              if (place.geometry.viewport) {
                  // Only geocodes have viewport.
                  bounds.union(place.geometry.viewport);
              } else {
                  bounds.extend(place.geometry.location);
              }
          });
          map.fitBounds(bounds);
      });
      google.maps.event.addListener(map, "click", function (e) {
        removeMarkers();
        var latLng = e.latLng,
            strlatlng = latLng.toString(),
            spllatlng = strlatlng.split(','),
            lats = spllatlng[0].replace("(", ""), 
            longs = spllatlng[1].replace(")", "");
        $("#map_latitude").val(lats);
        $("#map_longitude").val(longs);
        placeMarker(latLng, map);
      });
    }

    function placeMarker(location, map) {
      var marker = new google.maps.Marker({
          position: location, 
          map: map
      });
      markersToRemove.push(marker);
    }
    function removeMarkers() {
      for(var i = 0; i < markersToRemove.length; i++) {
          markersToRemove[i].setMap(null);
      }
    }


		$(document).ready(function(){
			google.maps.event.addDomListener(window, 'load', initialize);
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