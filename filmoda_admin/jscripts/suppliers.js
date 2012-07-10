;(function($){
	$.suppliers= {
	
		init:function(){
			this.display_production();
			this.alphaNum();
		},
		alphaNum:function(){
			$('.numeric').numeric({allow:'.'});
		},
		display_production:function(){
			$("#tbl_supplier").flexigrid({
				url :'action/display_suppliers.php',
				dataType : 'json',
				colModel :[ 
					{display : 'Supplier Code',name : '	supplier_code',width : 138,sortable : false,align : 'center'}, 
					{display : 'Supplier Name',name : 'supplier_name',width : 158,sortable : true,align : 'center'},
					{display : 'Supplier Description',name : 'supplier_name',	width :170,sortable : false,align : 'center'},
					{display : 'Supplier Address',name : 'supplier_address',	width :172,sortable : false,align : 'center'},
					{display : 'Supplier Tel. No.',name : 'supplier_telno',	width :114,sortable : false,align : 'center'},
				],
				buttons : [ 
					{name : 'Add',bclass :'add',onpress : action_suppliers},
					{separator : true},
					{name : 'Edit',bclass :'edit',onpress : action_suppliers}, 
					{separator : true},
					{name : 'Delete',bclass :'delete',onpress : action_suppliers}, 
					{separator : true},
				],
				searchitems : [ 
					{display : 'Product Code',name : 'product_code'}, 
					{display : 'Product Name',name : 'product_name',isdefault : true}
				],
				sortname : "supplier_id",
				sortorder : "desc",
				usepager : true,
				resizable: false,
				title : 'Suppliers',
				useRp : true,
				rp : 15,
				showTableToggleBtn : true,
				// width : 1250,
				height : 1000,
				singleSelect:true
			});
			function action_suppliers(com,grid){
				switch(com){
					case 'Add':
							$.suppliers.clear_fields();
							$("#product_action_header").html("<b>Add New Supplier</b>");
							$("#c_add_save").show();
							$("div.add_suppliers").show();
							$("div.supplier").hide();
							$.suppliers.cancel_save();
							$.suppliers.add_save();
						break;
					case 'Edit':
						if($('.trSelected',grid).length>0){
							$.suppliers.clear_fields();
							$("#product_action_header").html("<b>Edit Suppliers</b>");
							$("div.supplier").hide();
							$("div.add_suppliers").show();
							$("#c_update_save").show();
							var supp = $('.trSelected',grid);
							var supp_id = supp[0].id.substr(3);
							var suppid = supp[0].id;
								$("#a_scode").val($("#"+suppid).find("td").eq(0).text());	
								$("#a_sname").val($("#"+suppid).find("td").eq(1).text());	
								$("#a_sdesc").val($("#"+suppid).find("td").eq(2).text());	
								$("#a_saddress").val($("#"+suppid).find("td").eq(3).text());	
								$("#a_scontact").val($("#"+suppid).find("td").eq(4).text());	
						}else{
							alert('Please select data from the table.');
						}		
							$.suppliers.cancel_save();
							$.suppliers.update_save(supp_id);
						break;
					case 'Delete':
							if($('.trSelected',grid).length>0){
								var supp = $('.trSelected',grid);
								var supp_id = supp[0].id.substr(3);
								var ans = confirm('Delete ' + $('.trSelected', grid).length + ' data?');
								if(ans){
									$.ajax({
										type:'POST',
										url:'action/delete_suppliers.php',
										data:{supp_id:supp_id},
										dataType:'json',
										success:function(d){
											if(d.e){
												alert(d.m);
												$("#tbl_supplier").flexReload();
											}else{
												alert(d.m);
											}
										},
										error: function() {
											alert("Something's wrong. We'll try to fix this later.");
										}
									});
								}
							}else{
								alert('Please select data from the table.');
							}
						break;
				}
			
			}
		},
		clear_fields:function(){
			$("#a_pcode").val("");
			$("#a_pname").val("");
			$("#a_pdesc").val("");
			$("#a_pcost").val("");
			$("#a_pdimage").attr('src','images/no_image.jpg');
		},
		cancel_save:function(){
			$("div.mws-button-row").find('#c_cancel_save').unbind('click').click(function(){
				$("div.add_suppliers").hide();
				$("div.supplier").show();
				$("#c_add_save").hide();
				$("#c_update_save").hide();
			});
		},
		update_save:function(supp_id){
			$("div.mws-button-row").find('#c_update_save').unbind('click').click(function(){
				var scode = $("#a_scode").val();
				var sname = $("#a_sname").val();
				var sdesc = $("#a_sdesc").val();
				var saddr = $("#a_saddress").val();
				var stels = $("#a_scontact").val();
				
				// var pPhoto = $("#a_photo").val();
				var pPhoto = 'no_image.jpg';	
				if(scode.length < 1 || sname.length < 1 || saddr.length < 1 || stels.length < 1){
					alert('Please fill up all required fields.');
				}else{
					$.ajax({
						type:'POST',
						url:'action/update_suppliers.php',
						data:{
							supp_id : supp_id,
							scode   : scode,
							sname	: sname,
							sdesc	: sdesc,
							saddr	: saddr,
							stels	: stels,
						},
						dataType:'json',
						success:function(d){
							if (d.e) {
								alert(d.m);
								$("div.add_suppliers").hide();
								$("div.supplier").show();
								$("#tbl_supplier").flexReload();
							}else{
								alert(d.m);
							}
						},
						error: function() {
							alert("Something's wrong. We'll try to fix this later.");
						}	
					});
				}
			});
		},
		add_save:function(){
			$("div.mws-button-row").find('#c_add_save').unbind('click').click(function(){
				var scode = $("#a_scode").val();
				var sname = $("#a_sname").val();
				var sdesc = $("#a_sdesc").val();
				var saddr = $("#a_saddress").val();
				var stels = $("#a_scontact").val();
				
				// var pPhoto = $("#a_photo").val();
				var pPhoto = 'no_image.jpg';	
				if(scode.length < 1 || sname.length < 1 || saddr.length < 1 || stels.length < 1){
					alert('Please fill up all required fields.');
				}else{
					$.ajax({
						type:'POST',
						url:'action/add_new_suppliers.php',
						data:{
							scode   : scode,
							sname	: sname,
							sdesc	: sdesc,
							saddr	: saddr,
							stels	: stels,
						},
						dataType:'json',
						success:function(d){
							if (d.e) {
								alert(d.m);
								$("div.add_suppliers").hide();
								$("div.supplier").show();
								$("#tbl_supplier").flexReload();
							}else{
								alert(d.m);
							}
						},
						error: function() {
							alert("Something's wrong. We'll try to fix this later.");
						}	
					});
				}
			});
		},
		
		/*
		ajaxPOSTRequest:function(ResourceURL, Data, CallBackOnSuccess, CallBackOnError){
			$.ajax({
				url: ResourceURL,
				type: "POST",
				data: Data,
				success: function (data) {
					if (CallBackOnSuccess != '') {
						CallBackOnSuccess(data);
					}
				},
				error: function () {
					if (CallBackOnFail != '') {
						CallBackOnFail();
					}
				}
			}); 
		},
		ajaxPOSTRequest(
			'www.google.com?',
			{key: value},
			function(data){
				
			},
			function(){
				
			},
		)
		*/
		
	}
})(jQuery);
jQuery(document).ready(function(){ jQuery.suppliers.init(); });