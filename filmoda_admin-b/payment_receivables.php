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
					<div class ="pay_receivables_ui" style="display: none">
						<div class="mws-panel-header">
							<span class="mws-i-24 i-sign-post" id="pay_receivables_action_header">Add New Product</span>
						</div>
						<fieldset id="fieldset" style="border-radius:1px 1px 7px 7px; background-color: gray; padding: 10px;">
							<fieldset id="fieldset" style="border-radius:7px; background-color: white; padding: 10px; width:94%;margin-left:20px;">
								<div style="width: 160px; float: left; margin: 5px; margin-left: 15px; margin-top: 10px;">
									<label>Buyer</label>
								</div>
								<div style="float: left; margin-top: 10px;">
									<font color="red">* </font>
									<select id="a_bcode">
										<option value="">Select Buyer</option>
										<?php
											$sql ="SELECT * FROM buyer where 1";
											$result=mysql_query($sql);
											while($row = mysql_fetch_assoc($result)){
												echo "<option value='".$row['buyer_code']."'>".$row['buyer_name']."</option>";
											}
										?>
									</select>
								</div>
								<div style="clear:both;"></div>
								<div style="width: 160px; float: left; margin: 5px; margin-left: 15px; margin-top: 10px;">
									<label>Payable Amount</label>
								</div>
								<div style="float: left; margin-top: 10px;">
									<font color="red">* </font>
									<input type="text" name="a_pamount" id="a_pamount" size="30"/>
								</div>
								<div style="clear:both;"></div>
								<div style="width: 160px; float: left; margin: 5px; margin-left: 15px; margin-top: 10px;">
									<label>Total Amount</label>
								</div>
								<div style="float: left; margin-top: 10px;">
									<font color="red">* </font>
									<input type="text" name="a_tamount" id="a_tamount " size="30"/>
								</div>
								<div style="clear:both;"></div>
								<div style="width: 160px; float: left; margin: 5px; margin-left: 15px; margin-top: 10px;">
									<label>Invoice Date</label>
								</div>
								<div style="float: left; margin-top: 10px;">
									<font color="red">* </font>
									<input type="text" name="a_idate" id="a_idate" size="30"/>
								</div>
								<div style="clear:both;"></div>
								<div style="clear:both;"></div>
								<div style="width: 160px; float: left; margin: 5px; margin-left: 15px; margin-top: 10px;">
									<label>Details</label>
								</div>
								<div style="float: left; margin-top: 10px;">
									&nbsp;&nbsp;<textarea name="a_details" id="a_details" rows="0" cols="22"></textarea>
								</div>
								<div style="clear:both;"></div>
							</fieldset>
							<div class="mws-button-row" style="float:right;">
								<input style="margin:10px 7px 0 0;" class="mws-button red left" id="a_cancel_save" type="submit" value="Cancel"/>
								<input style="margin:10px 100px 0 0; display:none;" class="mws-button green" id="a_add_save" type="submit" value="Save"/>
								<input style="margin:10px 100px 0 0; display:none;" class="mws-button green" id="a_update_save" type="submit" value="Save"/>
							</div>
						</fieldset>
					</div>
					<div class="pay_receivables" style="display: block">
						<table id="tbl_pay_receivables"></table>
					</div>
                </div>
                
<script type='text/javascript' src='<?php echo $base_url; ?>/jscripts/payReceivables.js'></script>           	
             <?php include_once "footer.php"; ?>