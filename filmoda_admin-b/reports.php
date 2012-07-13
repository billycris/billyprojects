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
                    	<span class="mws-i-24 i-table-1">Products</span>
                    </div>
                    <div class="mws-panel-body">
                    	<div class="mws-panel-toolbar top clearfix">
                        	<ul>
                            	<li><a href="#" class="mws-ic-16 ic-accept">Add</a></li>
                            	<li><a href="#" class="mws-ic-16 ic-cross">Delete</a></li>
                            	<li><a href="#" class="mws-ic-16 ic-printer">Print</a></li>
                            	<li><a href="#" class="mws-ic-16 ic-arrow-refresh">Copy</a></li>
                            	<li><a href="#" class="mws-ic-16 ic-edit">Update</a></li>
                            </ul>
                        </div>
                        <table class="mws-table">
                            <thead>
                                <tr>
                                	<th><input type="checkbox" /></th>
                                    <th>Photo</th>
									<th>Product Name</th>
                                    <th>Product Description</th>
                                    <th>Item List</th>
                                    
                                    
                                   
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="gradeX">
                                	<td><input type="checkbox" /></td>
                                    <td><img src="images/beaded.jpg" /></td>
                                    <td>Breaded Bracelet</td>
                                    <td>Description here</td>
                                    <td><a href="">See Item List</a></td>
                                   
                                </tr>
                                <tr class="gradeC">
                                	<td><input type="checkbox" /></td>
                                    <td><img src="images/beaded_2.jpg" /></td>
                                    <td>Breaded Bracelet</td>
                                    <td>Description here</td>
                                   <td><a href="">See Item List</a></td>
                                   
                                </tr>
                                <tr class="gradeA">
                                	<td><input type="checkbox" /></td>
                                   <td><img src="images/beaded_earrings.jpg" /></td>
                                    <td>Breaded Bracelet</td>
                                    <td>Description here</td>
                                   <td><a href="">See Item List</a></td>
                                   
                                </tr>
                                <tr class="gradeA">
                                	<td><input type="checkbox" /></td>
                                   <td><img src="images/earrings.jpg" /></td>
                                    <td>Breaded Bracelet</td>
                                    <td>Description here</td>
                                   <td><a href="">See Item List</a></td>
                                   
                                </tr>
                                <tr class="gradeA">
                                	<td><input type="checkbox" /></td>
                                   <td><img src="images/beaded.jpg" /></td>
                                    <td>Breaded Bracelet</td>
                                    <td>Description here</td>
                                   <td><a href="">See Item List</a></td>
                                   
                                </tr>
                            </tbody>
                        </table>
                    </div>    	
                </div>
                
            	
             <?php include_once "footer.php"; ?>