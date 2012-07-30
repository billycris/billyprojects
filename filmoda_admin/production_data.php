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
									<div id="result">
										<img src="images/no_image.jpg" id="a_pdimage" style="width:200px; height:220px;"/>
									</div>
								</fieldset>
								<?php
									include_once('uploadphoto.php');
								?>
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
                </div>
<script type='text/javascript' src='<?php echo $base_url; ?>/jscripts/production.js'></script> 
             <?php include_once "footer.php"; ?>