;(function($){
	$.inventory= {
	
		init:function(){
			this.display_inventory();
			this.alphaNum();
		},
		alphaNum:function(){
			$('.numeric').numeric({allow:'.'});
		},
		display_inventory:function(){
			$("#tbl_inventory").flexigrid({
				// url :'action/display_suppliers.php',
				dataType : 'json',
				colModel :[ 
					{display : 'Supplier Code',name : 'supplier_code',width : 138,sortable : false,align : 'center'}, 
					{display : 'Supplier Name',name : 'supplier_name',width : 158,sortable : true,align : 'center'},
					{display : 'Supplier Description',name : 'supplier_name',	width :170,sortable : false,align : 'center'},
					{display : 'Supplier Address',name : 'supplier_address',	width :172,sortable : false,align : 'center'},
					{display : 'Supplier Tel. No.',name : 'supplier_telno',	width :114,sortable : false,align : 'center'},
				],
				buttons : [ 
					{name : 'Add',bclass :'add',onpress : action_inventory},
					{separator : true},
					{name : 'Edit',bclass :'edit',onpress : action_inventory}, 
					{separator : true},
					{name : 'Delete',bclass :'delete',onpress : action_inventory}, 
					{separator : true},
				],
				searchitems : [ 
					{display : 'Supplier Code',name : 'supplier_code'}, 
					// {display : 'Supplier Name',name : 'supplier_name',isdefault : true}
				],
				sortname : "supplier_id",
				sortorder : "desc",
				usepager : true,
				resizable: false,
				title : 'INVENTORY',
				useRp : true,
				rp : 15,
				showTableToggleBtn : true,
				// width : 1250,
				height : 1000,
				singleSelect:true
			});
			function action_inventory(com,grid){
				switch(com){
					case 'Add':
						break;
					case 'Edit':
						break;
					case 'Delete':
						break;
				}
			
			}
		},
	
	}
})(jQuery);
jQuery(document).ready(function(){ jQuery.inventory.init(); });