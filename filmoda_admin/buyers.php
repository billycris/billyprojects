<?php include_once "header.php"; ?>
    
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
                <div class="add_buyers" style="display:none;">
					<div class="mws-panel-header">
						<span class="mws-i-24 i-sign-post" id="product_action_header">Add New Item Cost</span>
					</div>
					<fieldset id="fieldset" style="border-radius:1px 1px 7px 7px; background-color: gray; padding: 10px;">
						<fieldset id="fieldset" style="border-radius:7px; background-color: white; padding: 10px;margin-left:20px;">
							
							<div style="width: 160px; float: left; margin: 5px; margin-left: 15px; margin-top: 10px;">
								<label>Buyer Code</label>
							</div>
							<div style="float: left; margin-top: 10px;">
								<font color="red">* </font>
								<input type="text" name="a_bcode" id="a_bcode" size="30"/>
							</div>
							<div style="clear:both;"></div>
							<div style="width: 160px; float: left; margin: 5px; margin-left: 15px; margin-top: 10px;">
								<label>Buyer Name</label>
							</div>
							<div style="float: left; margin-top: 10px;">
								<font color="red">* </font>
								<input type="text" class="numeric" name="a_bname" id="a_bname" size="30"/>
							</div>
							<div style="clear:both;"></div>
							<div style="width: 160px; float: left; margin: 5px; margin-left: 15px; margin-top: 10px;">
								<label>Buyer Description</label>
							</div>
							<div style="float: left; margin-top: 10px;">
								&nbsp;&nbsp;<input type="text" class="numeric" name="a_bdesc" id="a_bdesc" size="30"/>
							</div>
							<div style="clear:both;"></div>
							<div style="width: 160px; float: left; margin: 5px; margin-left: 15px; margin-top: 10px;">
								<label>Buyer Address</label>
							</div>
							<div style="float: left; margin-top: 10px;">
								<font color="red">* </font>
								<input type="text" class="numeric" name="a_baddress" id="a_baddress" size="30"/>
							</div>
							<div style="clear:both;"></div>
							<div style="width: 160px; float: left; margin: 5px; margin-left: 15px; margin-top: 10px;">
								<label>Buyer Contact</label>
							</div>
							<div style="float: left; margin-top: 10px;">
								<font color="red">* </font>
								<input type="text" class="numeric" name="a_bcontact" id="a_bcontact" size="30"/>
							</div>
							<div style="clear:both;"></div>
							<div style="width: 160px; float: left; margin: 5px; margin-left: 15px; margin-top: 10px;">
								<label>Buyer Status</label>
							</div>
							<div style="float: left; margin-top: 10px;">
								&nbsp;&nbsp;<select id="a_bstatus" name="a_bstatus">
									<option value="1">Active</option>
									<option value="0">Inactive</option>
								</select>
							</div>
							<div style="clear:both;"></div>
							<br/><br/><br/><br/>
						</fieldset>
						<div class="mws-button-row" style="float:right;">
							<input style="margin:10px 7px 0 0;" class="mws-button red left" id="c_cancel_save" type="submit" value="Cancel"/>
							<input style="margin:10px 50px 0 0; display:none;" class="mws-button green" id="c_add_save" type="submit" value="Save"/>
							<input style="margin:10px 50px 0 0; display:none;" class="mws-button green" id="c_update_save" type="submit" value="Save"/>
						</div>
					</fieldset>
				</div>	  	
				<div class="buyers">
					<table id="tbl_buyers"></table>
				</div>
                </div>
<script type='text/javascript' src='<?php echo $base_url; ?>/jscripts/buyers.js'></script>             	
             <?php include_once "footer.php"; ?>