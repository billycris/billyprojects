<?php 
	include_once "header.php"; 
	require_once("/config/config.php");
?>
    
    <div id="mws-wrapper">
		<div id="mws-sidebar-stitch"></div>
		<div id="mws-sidebar-bg"></div>
        <div id="mws-sidebar">
        	<div id="mws-searchbox" class="mws-inset">
            	<form action="http://www.malijuwebshop.com/themes/mws-admin/table.html">
                	<input type="text" class="mws-search-input" />
                    <input type="submit" class="mws-search-submit" />
                </form>
            </div>
            
            <?php include_once "main_navigation.php";?>
        </div>
        
        <div id="mws-container" class="clearfix">
            <div class="container">
            
            	<?php include_once "top_indicator.php"; ?>
                
            	
            	<div class="mws-panel grid_8">
					<div class="add_costing" style="display:none;">
						<div class="mws-panel-header">
							<span class="mws-i-24 i-sign-post" id="product_action_header">Add New Item Cost</span>
						</div>
						<fieldset id="fieldset" style="border-radius:1px 1px 7px 7px; background-color: gray; padding: 10px;">
							<fieldset id="fieldset" style="border-radius:7px; background-color: white; padding: 10px; width:50%;margin-left:20px;">
								<div style="width: 160px; float: left; margin: 5px; margin-left: 15px; margin-top: 10px;">
									<label>Item Name</label>
								</div>
								<div style="float: left; margin-top: 10px;">
									<select id = "c_item_id" name = "c_item_id" onchange='jQuery.itemCosting.chngeitemcode()'>
											<option value="0">Select Item</option>
											<?php
												$sql = "SELECT 	item_name,item_id,item_code FROM item_listing where 1";
												$result=mysql_query($sql);
												while($row = mysql_fetch_assoc($result)){
													echo "<option value='".$row['item_id']."'>".$row['item_name']." - ".$row['item_code']."</option>";
												}
											?>
									</select>
								</div>
								<div style="clear:both;"></div>
								<div style="width: 160px; float: left; margin: 5px; margin-left: 15px; margin-top: 10px;">
									<label>Item Price</label>
								</div>
								<div style="float: left; margin-top: 10px;">
									<input class="numeric" type="text" name="c_iprice" id="c_iprice" size="30"/>
								</div>
								<div style="clear:both;"></div>
								<div style="width: 160px; float: left; margin: 5px; margin-left: 15px; margin-top: 10px;">
									<label>Item Quantity</label>
								</div>
								<div style="float: left; margin-top: 10px;">
									<input class="numeric" type="text" class="numeric" name="c_iquant" id="c_iquant" size="30"/>
								</div>
								<div style="clear:both;"></div>
								<!--div class ="curr" style="display:none;">
									<div style="width: 160px; float: left; margin: 5px; margin-left: 15px; margin-top: 10px;">
										<label>Item Currency</label>
									</div>
									<div style="float: left; margin-top: 10px;">
										<input class="numeric" type="text" class="numeric" name="c_curr" id="c_curr" size="30"/>
									</div>
								</div-->
								<div style="clear:both;"></div>
								<br/><br/><br/><br/>
							</fieldset>
							<div style="float: right;margin-top: -220px;border-radius:7px; background-color: white; padding: 20px; width:250px;margin-right:20px;">
								<fieldset id="fieldset" style="text-align:center;border: 1px solid gray; border-radius:7px; background-color: white; padding: 20px;">
									<div>
										<img src="images/no_image.jpg" id="a_pdimage" style="width:200px; bckground:red;"/>
									</div>
								</fieldset>
								<!--div style="text-align:center;">
									<input type="file" name="a_photo" id="a_photo" />
								</div-->
							</div>
							<div style="clear:both;"></div>
							<div class="mws-button-row" style="float:right;">
								<input style="margin:10px 7px 0 0;" class="mws-button red left" id="c_cancel_save" type="submit" value="Cancel"/>
								<input style="margin:10px 50px 0 0; display:none;" class="mws-button green" id="c_add_save" type="submit" value="Save"/>
								<input style="margin:10px 50px 0 0; display:none;" class="mws-button green" id="c_update_save" type="submit" value="Save"/>
							</div>
						</fieldset>
					</div>
					<div class="item_costing" style="display:block;">
						<table id="tbl_item_costing"></table>
					</div>
                </div>
<script type='text/javascript' src='<?php echo $base_url; ?>/jscripts/itemCosting.js'></script>               
            	
             <?php include_once "footer.php"; ?>