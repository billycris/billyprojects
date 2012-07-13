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
					<div class="mws-panel-header">
						<span class="mws-i-24 i-sign-post" id="item_listing_action_header">Add New Product</span>
					</div>
					<div class="search-bar">
					<div style="width: 100px; float: left; margin: 5px; margin-left: 15px; margin-top: 10px;">
						Search:
					</div>
						<div style="float: left; margin-top: 15px; font-size:1.5em;">
							<select id = "month" name = "month">
								<option value = "01" >January</option>
								<option value = "02" >February</option>
								<option value = "03" >March</option>
								<option value = "04" >April</option>
								<option value = "05" >May</option>
								<option value = "06" >June</option>
								<option value = "07" >July</option>
								<option value = "08" >August</option>
								<option value = "09" >September</option>
								<option value = "10" >October</option>
								<option value = "11" >November</option>
								<option value = "12" >December</option>
							</select>
						</div>
						<div style="float: left; margin-top: 15px;margin-left:10px; font-size:1.5em;">
							<select id = "year" name = "year">
								<?php 
								$i = 2007;
								$presDate = date('Y');
								while($presDate > $i ){ ?>
									<option><?php echo $presDate;?></option>
								<?php $presDate--; } ?>
								</select>
						</div>
						<div style="float: left; margin-top: 15px;margin-left:10px; font-size:1.5em;">
							<input type="button" value="FIND"/>
						</div>
					</div>
					<div style="clear:both;"></div><br/>
					<div class="inventory">
						<table id="tbl_inventory"></table>
					</div>	
                </div>
                
<script type='text/javascript' src='<?php echo $base_url; ?>/jscripts/inventory.js'></script>            	
             <?php include_once "footer.php"; ?>