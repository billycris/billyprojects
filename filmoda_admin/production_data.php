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
					<div class="add_products" style="display:none;">
						<div class="mws-panel-header">
							<span class="mws-i-24 i-sign-post" id="product_action_header">Add New Product</span>
						</div>
						<fieldset id="fieldset" style="border-radius:1px 1px 7px 7px; background-color: gray; padding: 10px;">
							<fieldset id="fieldset" style="border-radius:7px; background-color: white; padding: 10px; width:50%;margin-left:20px;">
								<div style="width: 160px; float: left; margin: 5px; margin-left: 15px; margin-top: 10px;">
									<label>Product Code</label>
								</div>
								<div style="float: left; margin-top: 10px;">
									<font color="red">* </font>
									<input type="text" name="a_pcode" id="a_pcode" size="30"/>
								</div>
								<div style="clear:both;"></div>
								<div style="width: 160px; float: left; margin: 5px; margin-left: 15px; margin-top: 10px;">
									<label>Product Name</label>
								</div>
								<div style="float: left; margin-top: 10px;">
									<font color="red">* </font>
									<input type="text" name="a_pname" id="a_pname" size="30"/>
								</div>
								<div style="clear:both;"></div>
								<div style="width: 160px; float: left; margin: 5px; margin-left: 15px; margin-top: 10px;">
									<label>Product Cost</label>
								</div>
								<div style="float: left; margin-top: 10px;">
									<font color="red">* </font>
									<input type="text" class="numeric" name="a_pcost" id="a_pcost" size="30"/>
								</div>
								<div style="clear:both;"></div>
								<div style="width: 160px; float: left; margin: 5px; margin-left: 15px; margin-top: 10px;">
									<label>Product Description</label>
								</div>
								<div style="float: left; margin-top: 10px;">
									&nbsp;&nbsp;<textarea name="a_pdesc" id="a_pdesc" rows="0" cols="22" style='font-family:Verdana;font-size:1em;'></textarea>
								</div>
								<div style="clear:both;"></div>
							</fieldset>
							<div style="float: right;margin-top: -200px;border-radius:7px; background-color: white; padding: 20px; width:250px;margin-right:20px;">
								<fieldset id="fieldset" style="text-align:center;border: 1px solid gray; border-radius:7px; background-color: white; padding: 20px;">
									<div>
										<img src="images/no_image.jpg" id="a_pdimage" style="width:200px; height:220px;"/>
									</div>
								</fieldset>
								<div style="text-align:center;">
									<input type="file" name="a_photo" id="a_photo" />
								</div>
							</div>
							<div style="clear:both;"></div>
							<div class="mws-button-row" style="float:right;">
								<input style="margin:10px 7px 0 0;" class="mws-button red left" id="p_cancel_save" type="submit" value="Cancel"/>
								<input style="margin:10px 50px 0 0; display:none;" class="mws-button green" id="p_add_save" type="submit" value="Save"/>
								<input style="margin:10px 50px 0 0; display:none;" class="mws-button green" id="p_update_save" type="submit" value="Save"/>
							</div>
						</fieldset>
					</div>
					
					
					<div class="production_data">
						<table id="tbl_production_data"></table>
					</div>
					
					<div class="item_listing_ui" style="display:none;">
						<div class="mws-panel-header">
							<span class="mws-i-24 i-sign-post" id="item_listing_action_header_item">Add New Item</span>
						</div>
						<fieldset id="fieldset" style="border-radius:1px 1px 7px 7px; background-color: gray; padding: 10px;">
							<fieldset id="fieldset" style="border-radius:7px; background-color: white; padding: 10px; width:50%;margin-left:20px;">
								<!--div style="width: 160px; float: left; margin: 5px; margin-left: 15px; margin-top: 10px;">
									<label>Ref No.</label>
								</div>
								<div style="float: left; margin-top: 10px;">
									<input class="numeric" type="text" name="a_refn" id="a_refn" size="30"/>
								</div>
								<div style="clear:both;"></div>
								<div style="width: 160px; float: left; margin: 5px; margin-left: 15px; margin-top: 10px;">
									<label>Item No.</label>
								</div>
								<div style="float: left; margin-top: 10px;">
									<input class="numeric" type="text" name="a_ino" id="a_ino" size="30"/>
								</div-->
								<div style="clear:both;"></div>
								<div style="width: 160px; float: left; margin: 5px; margin-left: 15px; margin-top: 10px;">
									<label>Item Name</label>
								</div>
								<div style="float: left; margin-top: 10px;">
									<font color="red">* </font>
									<select id="i_id" onchange="jQuery.production.fill_production_item()">
										<option value="0">Select Item</option>
										<?php 
											$sql = "SELECT item_id,item_code,item_name FROM item_listing where 1";
											$result = mysql_query($sql);
											while($row = mysql_fetch_assoc($result)){
												echo "<option value='".$row['item_id']."'>".$row['item_name']." - ".$row['item_code']."</option>";
											}
										?>
									</select>
								</div>
								<div style="clear:both;"></div>
									<div style="width: 160px; float: left; margin: 5px; margin-left: 15px; margin-top: 10px;">
										<label>Item Cost</label>
									</div>
									<div style="float: left; margin-top: 10px;">
										&nbsp;&nbsp;<input type="text" name="a_icost" id="a_icost" size="30" disabled />
									</div>
									<div style="clear:both;"></div>
									<div style="width: 160px; float: left; margin: 5px; margin-left: 15px; margin-top: 10px;">
										<label>Item Description</label>
									</div>
									<div style="float: left; margin-top: 10px;">
										&nbsp;&nbsp;<textarea name="a_idesc" id="a_idesc" rows="0" cols="22" disabled ></textarea>
									</div>
									<div style="clear:both;"></div>
									<!--div style="width: 160px; float: left; margin: 5px; margin-left: 15px; margin-top: 10px;">
										<label>Item Row Location</label>
									</div>
									<div style="float: left; margin-top: 10px;">
										<input type="text" class="numeric" name="a_irl" id="a_irl" size="30"/>
									</div>
									<div style="clear:both;"></div>
									<div style="width: 160px; float: left; margin: 5px; margin-left: 15px; margin-top: 10px;">
										<label>Item Shelf Location</label>
									</div>
									<div style="float: left; margin-top: 10px;">
										<input type="text" class="numeric" name="a_isl" id="a_isl" size="30"/>
									</div>
									<div style="clear:both;"></div>
									<div style="width: 160px; float: left; margin: 5px; margin-left: 15px; margin-top: 10px;">
										<label>Item Bin Location</label>
									</div>
									<div style="float: left; margin-top: 10px;">
										<input type="text" class="numeric" name="a_ibl" id="a_ibl" size="30"/>
									</div>
									<div style="clear:both;"></div>
									<div style="width: 160px; float: left; margin: 5px; margin-left: 15px; margin-top: 10px;">
										<label>Item Retail Price</label>
									</div>
									<div style="float: left; margin-top: 10px;">
										<input class="numeric" type="text" class="numeric" name="a_irp" id="a_irp" size="30"/>
									</div>
									<div style="clear:both;"></div>
									<div style="width: 160px; float: left; margin: 5px; margin-left: 15px; margin-top: 10px;">
										<label>Item Whole Sale Price</label>
									</div>
									<div style="float: left; margin-top: 10px;">
										<input class="numeric" type="text" class="numeric" name="a_iwsp" id="a_iwsp" size="30"/>
									</div>
									<div style="clear:both;"></div>
									<div style="width: 160px; float: left; margin: 5px; margin-left: 15px; margin-top: 10px;">
										<label>Item Dealer Price</label>
									</div>
									<div style="float: left; margin-top: 10px;">
										<input class="numeric" type="text" class="numeric" name="a_idp" id="a_idp" size="30"/>
									</div>
									<div style="clear:both;"></div>
									<div style="width: 160px; float: left; margin: 5px; margin-left: 15px; margin-top: 10px;">
										<label>Buyer Code</label>
									</div>
									<div style="float: left; margin-top: 10px;">
										<font color="red">* </font>
										<input type="text" name="a_buyercode" id="a_buyercode" size="30"/>
									</div-->
									<div style="clear:both;"></div>
								</fieldset>
								<div style="float: right;margin-top: -140px;border-radius:7px; background-color: white; padding: 20px; height:180px; width:180px;margin-right:30px;">
									<fieldset id="fieldset" style="text-align:center;border: 1px solid gray; border-radius:7px; background-color: white; padding: 20px;">
										<div>
											<img src="images/no_image.jpg" id="a_pdimage" style="width:140px; height:140px;"/>
										</div>
									</fieldset>
								</div>
							<div style="clear:both;"></div>
							<div class="mws-button-row-item" style="float:right;">
								<input style="margin:40px 7px 0 0;" class="mws-button red left" id="a_cancel_save_item" type="submit" value="Cancel"/>
								<input style="margin:40px 100px 0 0; display:none;" class="mws-button green" id="a_add_save_item" type="submit" value="Save"/>
								<input style="margin:40px 100px 0 0; display:none;" class="mws-button green" id="a_update_save_item" type="submit" value="Save"/>
							</div>
						</fieldset>
					</div>
					<div class="item_list" style="display:none;">
						<table id="tbl_item_list"></table>
					</div>
                </div>
<script type='text/javascript' src='<?php echo $base_url; ?>/jscripts/production.js'></script> 
                
 	
             <?php include_once "footer.php"; ?>