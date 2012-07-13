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
					<div class="add_performa" style="display:none;">
						<div class="mws-panel-header">
							<span class="mws-i-24 i-sign-post" id="product_action_header">Add New Performa Invoice</span>
						</div>
						<fieldset id="fieldset" style="border-radius:1px 1px 7px 7px; background-color: gray; padding: 5px;">
							<fieldset id="fieldset" style="border-radius:7px; background-color: white; padding: 10px; width:94%;margin-left:20px;">
								<div class="proforma_entry">
									<div style="width: 100px; float: left; margin: 5px; margin-left: 15px; margin-top: 10px;">
										<label>Buyer</label>
									</div>
									<div style="float: left; margin-top: 10px;">
										&nbsp;&nbsp;
										<select id="buyer_id">
												<option value="">Select Buyer</option>
											<?php
												$sql = "SELECT buyer_code,buyer_name FROM buyer where 1";
												$result=mysql_query($sql);
												while($row = mysql_fetch_assoc($result)){
													echo "<option value='".$row['buyer_code']."'>".$row['buyer_name']."</option>";
												}
											?>
										</select>
									</div>
									
									<div style="clear:both;"></div>
									<div style="width: 100px; float: left; margin: 5px; margin-left: 15px; margin-top: 10px;">
										<label>Purcahase Date</label>
									</div>
									<div style="float: left; margin-top: 10px;">
										&nbsp;&nbsp;<input class="numeric" type="text" class="numeric" name="p_mPurDate" id="p_mPurDate" size="30"/><i> (YYYY-MM-DD)<i>
									</div>
									<div style="clear:both;"></div>
									<div style="width: 100px; float: left; margin: 5px; margin-left: 15px; margin-top: 10px;">
										<label>Received Date</label>
									</div>
									<div style="float: left; margin-top: 10px;">
										&nbsp;&nbsp;<input class="numeric" type="text" class="numeric" name="p_mRecDate" id="p_mRecDate" size="30"/><i> (YYYY-MM-DD)<i>
									</div>
								</div>
								<div style="clear:both;"></div>
								<div class="mws-button-row" style="float:left;margin-top: 10px; margin-left:150px;">
									<input style="margin:10px 2px 0 0;" class="mws-button green" id="c_add_save" type="submit" value="Save"/>
									<input style="margin:10px 2px 0 0;" class="mws-button red left" id="c_cancel_save" type="submit" value="Back"/>
									<!--input style="margin:10px 2px 0 0;" class="mws-button green" id="c_view_item" type="submit" value="Add Item"/-->
								</div>
								<div style="clear:both;"></div>
									<div class="proforma_add_item" style="margin-right:300px; margin-top: -110px; width:200px; float: right;">
										<div class="add_invoice_item" style="display:block; background-color:gray; width:500px; margin-top:-40px;">
											<div style="width: 50px; float: left; margin: 5px; margin-left: 15px; margin-top: 10px;">
												<label><b>Item</b></label>
											</div>
											<div style="float: left; margin-top: 10px;">
												&nbsp;&nbsp;
												<select id="item_id">
													<option value="0">Select Item</option>
													<?php
														$sql = "SELECT item_id,item_name,item_code FROM item_listing where 1";
														$result=mysql_query($sql);
														while($row = mysql_fetch_assoc($result)){
															echo "<option value='".$row['item_id']."'>".$row['item_name']." - ".$row['item_code']."</option>";
														}
														?>
												</select>
											</div>
											<div style="clear:both;"></div>
											<div style="width: 50px; float: left; margin: 5px; margin-left: 200px; margin-top: -25px;">
												<b>Quantity</b> 
											</div>
											<div style="float:left;margin-top:-27px;margin-left:290px;">
												<input type="text" class="numeric" name="p_mQuant" id="p_mQuant" size="10"/>
											</div>
											<div class="mws-button-row" style="float:right;">
												<input style="margin:-31px 40px 0 0;font-size:0.8em; font-style:bold;" class="mws-button green left" id="add_item" type="submit" value="ADD"/>
											</div>
										</div>
										<div style="clear:both;"></div>
										<div class="invoice" style="display:none;">
											<table id="tbl_invoice"></table>
										</div>
										
									</div>
								
								<br/><br/><br/><br/>
							</fieldset>
							<!--div style="float: right;margin-top: -395px;border-radius:7px; background-color: white; padding: 20px; width:250px;margin-right:20px;">
								<fieldset id="fieldset" style="text-align:center;border: 1px solid gray; border-radius:7px; background-color: white; padding: 20px;">
									<div>
										<img src="images/no_image.jpg" id="a_pdimage" style="width:200px; bckground:red;"/>
									</div>
								</fieldset>
								<div style="text-align:center;">
									<input type="file" name="a_photo" id="a_photo" />
								</div>
							</div-->
							<div style="clear:both;"></div>
							<!--div class="mws-button-row" style="float:right;">
								<input style="margin:10px 7px 0 0;" class="mws-button red left" id="c_cancel_save" type="submit" value="Cancel"/>
								<input style="margin:10px 50px 0 0; display:none;" class="mws-button green" id="c_add_save" type="submit" value="Save"/>
								<input style="margin:10px 50px 0 0; display:none;" class="mws-button green" id="c_update_save" type="submit" value="Save"/>
							</div-->
							
						</fieldset>
					</div>
					<div class="performa">
						<table id="tbl_perfoma"></table>
					</div>
                </div>
<script type='text/javascript' src='<?php echo $base_url; ?>/jscripts/performa.js'></script> 				
            	
             <?php include_once "footer.php"; ?>