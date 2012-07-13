<?php include_once "header.php"; ?>
    
    <div id="mws-wrapper">
		<div id="mws-sidebar-stitch"></div>
		<div id="mws-sidebar-bg"></div>
        <div id="mws-sidebar">
        	<div id="mws-searchbox" class="mws-inset">
            	<form action="">
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
									<th>Code</th>
									<th>Product Name</th>
                                    <th>Product Description</th>
                                    <th colspan="2">Action</th>
                                    
                                    
                                   
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="gradeX">
                                	<td><input type="checkbox" /></td>
                                    <td><img src="images/beaded.jpg" /></td>
                                    <td>P0001</td>
									<td>Breaded Bracelet</td>
                                    <td>Description here</td>
									<td><a href="item_listing.php">See Item List</a></td>
									<td><a href="additems.php">Add Items</a></td>
                                  
                                </tr>
                                <tr class="gradeC">
                                	<td><input type="checkbox" /></td>
                                    <td><img src="images/beaded_2.jpg" /></td>
                                    <td>P0002</td>
									<td>Breaded Bracelet</td>
                                    <td>Description here</td>
									<td><a href="item_listing.php">See Item List</a></td>
                                    <td><a href="additems.php">Add Items</a></td>
                                  
                                </tr>
                                <tr class="gradeA">
                                	<td><input type="checkbox" /></td>
                                    <td><img src="images/beaded_earrings.jpg" /></td>
									<td>P0003</td>
								    <td>Breaded Bracelet</td>
                                    <td>Description here</td>
                                    <td><a href="item_listing.php">See Item List</a></td>
                                    <td><a href="additems.php">Add Items</a></td>
                                  
                                </tr>
                                <tr class="gradeA">
                                	<td><input type="checkbox" /></td>
                                    <td><img src="images/earrings.jpg" /></td>
                                    <td>P0004</td>
								    <td>Breaded Bracelet</td>
                                    <td>Description here</td>
                                    <td><a href="item_listing.php">See Item List</a></td>
									<td><a href="additems.php">Add Items</a></td>
                                  
                                </tr>
                                <tr class="gradeA">
                                	<td><input type="checkbox" /></td>
									<td><img src="images/beaded.jpg" /></td>
									<td>P0005</td>
								    <td>Breaded Bracelet</td>
                                    <td>Description here</td>
									<td><a href="item_listing.php">See Item List</a></td>
									<td><a href="additems.php">Add Items</a></td>
                                  
                                </tr>
                            </tbody>
                        </table>
                    </div>    	
                </div>
                
            	<table id="flexme1"></table>

	<script type="text/javascript">
		
jQuery(document).ready(function($) {
		$("#flexme1").flexigrid({
			url : 'post-xml.php',
			dataType : 'xml',
			colModel : [ {
				display : 'Photo',
				name : 'photo',
				width : 40,
				sortable : true,
				align : 'center'
			}, {
				display : 'Code',
				name : 'code',
				width : 180,
				sortable : true,
				align : 'left'
			}, {
				display : 'Product Name',
				name : 'product_name',
				width : 120,
				sortable : true,
				align : 'left'
			}, {
				display : 'Description',
				name : 'iso3',
				width : 130,
				sortable : true,
				align : 'left',
				hide : false
			}, {
				display : 'Action',
				name : 'numcode',
				width : 80,
				sortable : true,
				align : 'right'
			} ],
			buttons : [ {
				name : 'Add',
				bclass : 'add',
				onpress : test
			}, {
				name : 'Delete',
				bclass : 'delete',
				onpress : test
			}, {
				separator : true
			} ],
			searchitems : [ {
				display : 'ISO',
				name : 'iso'
			}, {
				display : 'Name',
				name : 'name',
				isdefault : true
			} ],
			sortname : "iso",
			sortorder : "asc",
			usepager : true,
			title : 'Products',
			useRp : true,
			rp : 15,
			showTableToggleBtn : true,
			width : 700,
			height : 200
		});

		function test(com, grid) {
			if (com == 'Delete') {
				confirm('Delete ' + $('.trSelected', grid).length + ' items?')
			} else if (com == 'Add') {
				alert('Add New Item');
			}
		}
			});
	</script>
	
             <?php include_once "footer.php"; ?>