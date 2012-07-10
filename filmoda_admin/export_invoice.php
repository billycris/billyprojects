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
					<div class="add_export" style="display:none;">
						<div class="mws-panel-header">
							<span class="mws-i-24 i-sign-post" id="product_export_header">Add Export Invoce</span>
						</div>
						<fieldset id="fieldset" style="border-radius:1px 1px 7px 7px; background-color: gray; padding: 10px;">
							<fieldset id="fieldset" style="border-radius:7px; background-color: white; padding: 10px;margin-left:20px;">
							<div style="width: 160px; float: left; margin: 5px; margin-left: 15px; margin-top: 10px;">
									<label>Buyer</label>
								</div>
								<div style="float: left; margin-top: 10px;">
									<font color="red">* </font>
									<select id="buyer_id">
										<option value="0">Select Buyer</option>
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
								<div style="width: 160px; float: left; margin: 5px; margin-left: 15px; margin-top: 10px;">
									<label>Product</label>
								</div>
								<div style="float: left; margin-top: 10px;">
									<font color="red">* </font>
									<select id="a_icode" onchange="jQuery.exportInvoice.change_product()">
										<option value="0">Select Product</option>
										<?php
											$sql ="SELECT product_id,product_code,product_name FROM product where 1";
											$result=mysql_query($sql);
											while($row = mysql_fetch_assoc($result)){
												echo "<option value='".$row['product_id']."'>".$row['product_name']." - ".$row['product_code']."</option>";
											}
										?>
									</select>
								</div>
								<div style="clear:both;"></div>
								<div style="width: 160px; float: left; margin: 5px; margin-left: 15px; margin-top: 10px;">
									<label>Date</label>
								</div>
								<div style="float: left; margin-top: 10px;">
									<font color="red">* </font>
									<input type="text" name="a_date" id="a_date" size="15"/><i> (YYYY-MM-DD)<i>
								</div>
								<div style="clear:both;"></div>
								<div class="mws-button-row" style="float:left; margin-left:180px;">
									<input style="margin:10px 7px 0 0;" class="mws-button red left" id="c_cancel_save" type="submit" value="Cancel"/>
									<input style="margin:10px 50px 0 0; display:none;" class="mws-button green" id="c_add_save" type="submit" value="Save"/>
									<input style="margin:10px 50px 0 0; display:none;" class="mws-button green" id="c_update_save" type="submit" value="Save"/>
								</div>
								<div style="clear:both;"></div>
								<div class="right_container" style="float:right; margin-top:-90px;">
										<!--iv class="add_invoice_item" style="display:none; background-color:gray; width:500px; margin-top:-40px;">
											<div style="width: 50px; float: left; margin: 5px; margin-left: 15px; margin-top: 10px;">
												<label><b>Item</b></label>
											</div>
											<div style="float: left; margin-top: 10px;">
												&nbsp;&nbsp;
												<select id="ex_item_id">
													<option value="0">Select Item</option>
													<?php
														// $sql = "SELECT item_id,item_name,item_code FROM item_listing where 1";
														// $result=mysql_query($sql);
														// while($row = mysql_fetch_assoc($result)){
															// echo "<option value='".$row['item_id']."'>".$row['item_name']." - ".$row['item_code']."</option>";
														// }
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
										</div-->
									<div class="sub_ei" style="margin: -50px 0 0 -50px;display:none;">
										<table id="tbl_sub_ei"></table>
									</div>
								</div>
								<!--div class="ex_fields" style="display:none;">
									<div style="width: 160px; float: left; margin: 5px; margin-left: 15px; margin-top: 10px;">
										<label>CODE</label>
									</div>
									<div style="float: left; margin-top: 10px;">
										<font color="red">* </font>
										<input type="text" name="a_pcode" id="a_pcode" size="30" disabled />
									</div>
									<div style="clear:both;"></div>
									<div style="width: 160px; float: left; margin: 5px; margin-left: 15px; margin-top: 10px;">
										<label>Description</label>
									</div>
									<div style="float: left; margin-top: 10px;">
										<font color="red">* </font>
										<input type="text" name="a_pdesc" id="a_pdesc" size="30" disabled />
									</div>
									<div style="clear:both;"></div>
								
									<div style="width: 160px; float: left; margin: 5px; margin-left: 15px; margin-top: 10px;">
										<label>UnitPrice</label>
									</div>
									<div style="float: left; margin-top: 10px;">
										<font color="red">* </font>
										<input type="text" class="numeric" name="a_unit_price" id="a_unit_price" size="30" disabled />
									</div>
									<div style="clear:both;"></div>
									<div style="width: 160px; float: left; margin: 5px; margin-left: 15px; margin-top: 10px;">
										<label></label>
									</div>
									<div class="qty_available" style="margin-top: 10px;">
										<label>&nbsp;&nbsp;Available QTY</label>
										<font color="red"><span id="qty_available_product"><b>00</b></span></font>
									</div>
									<div style="clear:both;"></div>
									<div style="width: 160px; float: left; margin: 5px; margin-left: 15px; margin-top: 10px;">
										<label>QTY</label>
									</div>
									<div style="float: left; margin-top: 10px;">
										<font color="red">* </font>
										<input type="text" class="numeric" name="a_qty" id="a_qty" size="30"/>
									</div>
								</div-->
								<div style="clear:both;"></div>
								<br/><br/><br/><br/>
							</fieldset>
							<div class="mws-button-row" style="float:right;">
								<!--input style="margin:10px 7px 0 0;" class="mws-button red left" id="c_cancel_save" type="submit" value="Cancel"/-->
								<input style="margin:10px 50px 0 0; display:none;" class="mws-button green" id="c_add_save" type="submit" value="Save"/>
								<!--input style="margin:10px 50px 0 0; display:none;" class="mws-button green" id="c_update_save" type="submit" value="Save"/-->
							</div>
						</fieldset>
					</div>
                	<div class="export_invoice">
						<table id ="tbl_export_invoice"></table>
					</div>	
                </div>
			
                
 <script type='text/javascript' src='<?php echo $base_url; ?>/jscripts/exportInvoice.js'></script>            	
             <?php include_once "footer.php"; ?>