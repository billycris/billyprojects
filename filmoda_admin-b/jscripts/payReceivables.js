;(function($){
	$.payReceivables= {
	
		init:function(){
			this.display_payReceivables();
		},
		
		display_payReceivables:function(){
			$("#tbl_pay_receivables").flexigrid({
				// url :'action/display_item_list.php',
				dataType : 'json',
				colModel :[ 
					{display : 'Buyer',name : 'product_photo',width : 150,sortable : false,align : 'center'}, 
					{display : 'Details',name : 'product_code',width : 150,sortable : true,align : 'center'}, 
					{display : 'Amount',name : 'product_name',width : 150,sortable : true,align : 'center'},
					{display : 'Receiving Date',name : 'item_description',width : 150,sortable : false,	align : 'center',hide : false}, 
					{display : 'Actual Date Received',name : 'product_name',width : 150,sortable : false,align : 'center'},
					{display : 'Status',name : 'product_name',	width : 150,sortable : false,align : 'center'},
				],
				buttons : [ 
					{name : 'Add',bclass :'add',onpress : action_payReceivables},
					{separator : true},
					{name : 'Edit',bclass :'edit',onpress : action_payReceivables}, 
					{separator : true},
					{name : 'Delete',bclass :'delete',onpress : action_payReceivables}, 
					{separator : true},
				],
				searchitems : [ 
					{display : 'Code',name : 'product_code'}, 
					{display : 'Product Name',name : 'product_name',isdefault : true}
				],
				sortname : "item_no",
				sortorder : "asc",
				usepager : true,
				resizable: false,
				title : 'Payment Receivables',
				useRp : true,
				rp : 15,
				showTableToggleBtn : true,
				// width : 1250,
				height : 1000,
				singleSelect:true
			});
			function action_payReceivables(com,grid){
				switch(com){
					case 'Add':
							alert('add');
						break;
					case 'Edit':
							alert('edit');
						break;
					case 'Delete':
							alert('delete');
						break;
				}
			
			}
		}
	}
})(jQuery);
jQuery(document).ready(function(){ jQuery.payReceivables.init(); });