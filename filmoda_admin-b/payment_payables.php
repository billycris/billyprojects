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
					<div class="add_payables" style="display:none;">
						<div class="mws-panel-header">
							<span class="mws-i-24 i-sign-post" id="product_action_header">Add New Payable Invoice</span>
						</div>
						<fieldset id="fieldset" style="border-radius:1px 1px 7px 7px; background-color: gray; padding: 10px;">
							<fieldset id="fieldset" style="border-radius:7px; background-color: white; padding: 10px;margin-left:20px; width:94%;">
								
								<div style="width: 160px; float: left; margin: 5px; margin-left: 15px; margin-top: 10px;">
									<label>Supplier</label>
								</div>
								<div style="float: left; margin-top: 10px;">
									<font color="red">* </font>
									<select id="a_sId" name="a_sId">
										<option value="0">Select Supplier</option>
										<?php 
											$sql = "SELECT supplier_id,supplier_name from supplier where 1";
											$result = mysql_query($sql);
											while($row = mysql_fetch_assoc($result)){
												echo "<option value='".$row['supplier_id']."'>".$row['supplier_name']."</option>";
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
									<input type="text" class="numeric" name="a_pAmount" id="a_pAmount" size="30"/>
								</div>
								<div style="clear:both;"></div>
								<div style="width: 160px; float: left; margin: 5px; margin-left: 15px; margin-top: 10px;">
									<label>Total Amount</label>
								</div>
								<div style="float: left; margin-top: 10px;">
									<font color="red">* </font>
									<input type="text" class="numeric" name="a_pTamount" id="a_pTamount" size="30"/>
								</div>
								<div style="clear:both;"></div>
								<div style="width: 160px; float: left; margin: 5px; margin-left: 15px; margin-top: 10px;">
									<label>Invoice Date</label>
								</div>
								<div style="float: left; margin-top: 10px;">
									<font color="red">* </font>
									<input type="text" class="numeric" name="a_pIDate" id="a_pIDate" size="30"/><i> (YYYY-MM-DD)<i>
								</div>
								<div style="clear:both;"></div>
								<div style="width: 160px; float: left; margin: 5px; margin-left: 15px; margin-top: 10px;">
									<label>Details</label>
								</div>
								<div style="float: left; margin-top: 10px;">
									&nbsp;&nbsp;&nbsp;<textarea type="text"  name="a_pdetials" id="a_pdetials" size="30"></textarea>
								</div>
								<div style="clear:both;"></div>
							</fieldset>
							<div class="mws-button-row" style="float:right;">
								<input style="margin:10px 7px 0 0;" class="mws-button red left" id="c_cancel_save" type="submit" value="Cancel"/>
								<input style="margin:10px 50px 0 0; display:none;" class="mws-button green" id="c_add_save" type="submit" value="Save"/>
								<input style="margin:10px 50px 0 0; display:none;" class="mws-button green" id="c_update_save" type="submit" value="Save"/>
							</div>
						</fieldset>
					</div>	  
					<div class ="pay_payables">
						<table id="tbl_payPayables"></table>
					</div>
                </div>
<script type='text/javascript' src='<?php echo $base_url; ?>/jscripts/payPayables.js'></script>                 
            	
             <?php include_once "footer.php"; ?>