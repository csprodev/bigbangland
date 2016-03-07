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
		<h3>Buy</h3>
        
		<div class="form-info">
            <?php  
            if($action == 'add')
            {
                echo form_open('buy/add');
                $title = '';
                $address = '';
                $province = $province;
                $city ='';
                $luas_tanah = '';
                $satuan_tanah = '';
                $lebar_muka = '';
                $peruntukan = '';
                $budget_per_meter = '';
                $budget_total = '';
                $keterangan = '';
            }
            else
            {
                echo form_open('buy/edit/'.$id);
                $title = $userdata->title;
                $address = $userdata->address;
                $province = $userdata->province;
                $city =$userdata->city;
                $luas_tanah = $userdata->luas_tanah;
                $satuan_tanah = $userdata->satuan_tanah;
                $lebar_muka = $userdata->lebar_muka;
                $full_name = $userdata->full_name;
                $peruntukan = $userdata->peruntukan;
                $budget_per_meter = $userdata->budget_per_meter;
                $budget_total = $userdata->budget_total;
                $keterangan = $userdata->keterangan;
            }
            ?>
                <div>
                    <span><label>Title</label></span>
                    <input name="title" type="text" required="" size="50" maxlength="100" value="<?php echo $title; ?>">
                    <input name="id" type="hidden" value="<?php echo ($action == 'edit') ? $id : ''; ?>">
                </div>
                <div>
                    <span><label>Address</label></span>
                    <textarea name="address" id="address"><?php echo $address; ?></textarea>
                </div>
                <div id='cp'>
                    <span><label>Province</label></span>
                    <select name="province" id="province" style='width:350px'>
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
                    <span><label>City</label></span>
                    <select name="city" id="city" style='width:350px'>
                        <option value=''>- - - -</option>
                    </select>
                </div>
                <div>
                    <span><label>Luas Tanah</label></span>
                    <input name="luas_tanah" type="text"   required="" size="50" maxlength="15" value="<?php echo $luas_tanah; ?>">
                </div>
                <div>
                    <span><label>Satuan Tanah</label></span>
                    <input name="satuan_tanah" type="text"   required="" size="50" maxlength="15" value="<?php echo $satuan_tanah; ?>">
                </div>
                <div>
                    <span><label>Lebar Muka</label></span>
                    <input name="lebar_muka" type="text"   required="" size="50" maxlength="100" value="<?php echo $lebar_muka; ?>">
                </div>
                <div>
                    <span><label>Peruntukan</label></span>
                    <textarea name="peruntukan" id="peruntukan"><?php echo $peruntukan; ?></textarea>
                </div>
                <div>
                    <span><label>Budget Per Meter</label></span>
                    <input name="budget_per_meter" type="text"   required="" size="50" maxlength="100" value="<?php echo $budget_per_meter; ?>">
                </div>
                <div>
                    <span><label>Budget Total</label></span>
                    <input name="budget_total" type="text"   required="" size="50" maxlength="100" value="<?php echo $budget_total; ?>">
                </div>
                <div>
                    <span><label>Keterangan</label></span>
                    <textarea name="keterangan" id="keterangan"><?php echo $keterangan; ?></textarea>
                </div>
                <label class="hvr-sweep-to-right" style='margin-top:20px'>
                    <input type="submit" value="<?php echo ($action == 'add') ? 'Submit' : 'Update'; ?>" name="btnsubmit">
                </label>
        </div>
	</div>
</div>

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