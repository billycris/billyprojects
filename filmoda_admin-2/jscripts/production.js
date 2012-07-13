;(function($){
	$.production= {
		
		init:function(){
			this.display_production();
			this.alphaNum();
		},
		alphaNum:function(){
			$('.numeric').numeric({allow:'.'});
		},
		prewiewimage:function(D){
			var source = D.value;
			var imageName = "file:///"+source;
			alert(imageName);
			$("#a_pdimage").attr('src',imageName);
		},
		item_list_sub:function(D){
			var prod_code = D.prod_code;
			$("div.item_list").show();
			$("div.production_data").hide();
			
			$(".item_list").html('');
			$(".item_list").append('<table id = "tbl_item_list"></table>');
			
			$("#tbl_item_list").flexigrid({
				url :'action/display_prod_item_list.php' + "?prod_id="+D.prod_id,
				dataType : 'json',
				colModel :[ 
					{display : 'Item Code',name : 'item_code',width : 100,sortable : true,align : 'center'}, 
					{display : 'Item Photo',name : 'item_photo',width : 268,sortable : false,align : 'center'}, 
					{display : 'Item Name',name : 'item_name',width : 134,sortable : true,align : 'left'},
					{display : 'Item Description',name : 'item_description',width : 138,sortable : false,	align : 'left',hide : false}, 
					// {display : 'Retail Price',name : 'item_retail_price',	width : 100,sortable : true,align : 'center'},
					// {display : 'Wholesale Price',name : 'item_whole_sale_price',	width : 124,sortable : true,align : 'center'},
					// {display : 'Delear Price',name : 'item_dealer_price',	width : 100,sortable : true,align : 'center'}
				],
				buttons : [ 
					{name : 'Product',bclass :'product',onpress : action_item_list},
					{separator : true},
					{name : 'Add',bclass :'add',onpress : action_item_list},
					{separator : true},
					// {name : 'Edit',bclass :'edit',onpress : action_item_list}, 
					// {separator : true},
					{name : 'Delete',bclass :'delete',onpress : action_item_list}, 
					{separator : true},
				],
				searchitems : [ 
					{display : 'Item Name',name : 'item_name'}, 
					{display : 'Item No',name : 'item_no',isdefault : true}
				],
				sortname : "prod_item_id",
				sortorder : "desc",
				usepager : true,
				resizable: false,
				title : 'Product-'+ prod_code+' : ' + D.prod_name,
				useRp : true,
				rp : 15,
				showTableToggleBtn : true,
				// width : 1250,
				height : 1000,
				singleSelect:true
			});
			function action_item_list(com,grid){
				switch(com){
					case 'Add':
						$("#item_listing_action_header_item").html("<b>Add New Item : " + D.prod_name+"</b>");
						$.production.clear_fields_item();
						$("div.item_listing_ui").show();
						$("div.item_list").hide();
						$("#a_add_save_item").show();
						$.production.cancel_item();
						$.production.add_item_list(D.prod_id);
						break;
					case 'Product':
						$("div.item_list").hide();
						$("div.production_data").show();
						break;
					case 'Edit':
						if($('.trSelected',grid).length>0){
							$.production.clear_fields_item();
							$("#item_listing_action_header_item").html("<b>Update Item : " + D.prod_name+"</b>");
							$("div.item_listing_ui").show();
							$("div.item_list").hide();
							$("#a_update_save_item").show();
							var item = $('.trSelected',grid);
							var item_id = item[0].id.substr(3);
							var itemid = item[0].id;
							
								$("#a_iname").val($("#"+itemid).find("td").eq(1).text());
								$("#a_idesc").val($("#"+itemid).find("td").eq(2).text());
								$.ajax({
									type:'POST',
									url:'action/fill_item.php',
									data:{item_id  : item_id},
									dataType:'json',
									success:function(d){
										if (d.e) {
											$("#a_pdimage").attr('src','images/'+d.item_photo);	
										}else{
											alert('failed');
										}
									},
									error: function() {
										alert("Something's wrong. We'll try to fix this later.");
									}	
								});
						}else{	
								alert('Please select data from the table.');
						}	
							$.production.cancel_item();
							$.production.update_item_list(item_id,D.prod_code);
						break;
					case 'Delete':
						if($('.trSelected',grid).length>0){
								var item = $('.trSelected',grid);
								var item_id = item[0].id.substr(3);
								var ans = confirm('Delete ' + $('.trSelected', grid).length + ' item?');
								if(ans){
									$.ajax({
										type:'POST',
										url:'action/delete_prod_item_list.php',
										data:{item_id:item_id},
										dataType:'json',
										success:function(d){
											if(d.e){
												alert(d.m);
												$("#tbl_item_list").flexReload();
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
								alert('Please selecct data from the table.');
							}
						break;
				}
			}
		},
		clear_fields_item:function(){
			$("#a_icost").val("");
			$("#a_iname").val("");
			$("#a_idesc").val("");
			$("#a_add_save_item").hide();
			$("#a_update_save_item").hide();
		},
		update_item_list:function(item_id,p_code){
			$("div.mws-button-row-item").find("#a_update_save_item").unbind('click').click(function(){
				var i_name = $("#a_iname").val();
				var i_desc =$("#a_idesc").val();
				var pPhoto = 'no_image.jpg';
				if(i_name.length < 1){
					alert('Please fill up important fields.');
				}else{
					$.ajax({
						type:'POST',
						url:'action/update_items.php',
						data:{
							p_code : p_code,
							i_name  : i_name,
							i_desc  : i_desc,
							item_id : item_id,
							pPhoto  : pPhoto,
						},
						dataType:'json',
						success:function(d){
							if(d.e){
								alert(d.m);
								$("div.item_listing_ui").hide();
								$("div.item_list").show();
								$("#tbl_item_list").flexReload();
							}else{
								alert(d.m);
							}
						},
						error:function(){
							alert("Something's wrong. We'll try to fix this later.");
						}
					});
				}
			});
		},
		add_item_list:function(p_code){
			$("div.mws-button-row-item").find("#a_add_save_item").unbind('click').click(function(){
				alert(p_code);
				var i_id = $("#i_id").val();
			
				if(i_id < 1){
					alert('Please fill up important fields.');
				}else{
					
					$.ajax({
						type:'POST',
						url:'action/add_prod_item.php',
						data:{
							i_id 	: i_id,
							p_code  : p_code,
						},
						dataType:'json',
						success:function(d){
							if(d.e){
								alert(d.m);
								$("div.item_listing_ui").hide();
								// $.production.item_list(E);
								$("div.item_list").show();
								$("#tbl_item_list").flexReload();
								
							}else{
								alert(d.m);
							}
						},
						error:function(){
							alert("Something's wrong. We'll try to fix this later.");
						}
					});
				}
			});
		},
		cancel_item:function(){
			$("div.mws-button-row-item").find("#a_cancel_save_item").unbind('click').click(function(){
				$("div.item_listing_ui").hide();
				$("div.item_list").show();
				$("#a_add_save_item").hide();
			});
		},
		add_item:function(D){
			$("#item_listing_action_header_item").html("<b>Add New Item : " + D.prod_name+"</b>");
			$("div.item_listing_ui").show();
			$("div.production_data").hide();
			$("div.item_list").hide();
			$("#a_add_save_item").show();
			$.production.cancel_item();
			$.production.add_item_list(D.prod_code,D);
		},
		fill_production_item:function(){
			var item_id = $("#i_id").val();
			$.production.clear_fields_item();
			$("#a_add_save_item").show();
			if(item_id < 1){
				alert('Please select item.');
			}else{
				$.ajax({
					type:'POST',
					url:'action/fill_production_item.php',
					data:{item_id:item_id},
					dataType:'json',
					success:function(d){
						if(d.e){
							$("#a_icost").val(d.item_cost);
							$("#a_idesc").val(d.item_desc);
							$("#a_pdimage").attr('src','images/'+d.item_photo);	
						}else{
							alert("Something's wrong. We'll try to fix this later.");
						}
					},
					error:function(){
						alert("Something's wrong. We'll try to fix this later.");
					}
				});
			}
			
		},
		display_production:function(){
			$("#li-production-data").attr("class", "active mws-nav-selected");
			$("#li-production-data").attr("style", "border-top: 0 none");
			$("#tbl_production_data").flexigrid({
				url :'action/display_products.php',
				dataType : 'json',
				colModel :[ 
					{display : 'Product Photo',name : 'product_photo',width : 268,sortable : false,align : 'center'}, 
					{display : 'Product Code',name : 'product_code',width : 124,sortable : true,align : 'center'},
					{display : 'Product Name',name : 'product_name',width : 150,sortable : true,align : 'left',hide : false}, 
					{display : 'Product Description',name : 'product_description',	width :230,sortable : false,align : 'center'},
					{display : 'Item List',name : 'product_name',	width : 100,sortable : false,align : 'center'},
					// {display : 'Add List',name : 'product_name',	width : 100,sortable : false,align : 'center'},
				],
				buttons : [ 
					{name : 'Add',bclass :'add',onpress : action_products},
					{separator : true},
					{name : 'Edit',bclass :'edit',onpress : action_products}, 
					{separator : true},
					{name : 'Delete',bclass :'delete',onpress : action_products}, 
					{separator : true},
				],
				searchitems : [ 
					{display : 'Product Code',name : 'product_code'}, 
					{display : 'Product Name',name : 'product_name',isdefault : true}
				],
				sortname : "product_id",
				sortorder : "desc",
				usepager : true,
				resizable: false,
				title : 'Products',
				useRp : true,
				rp : 15,
				showTableToggleBtn : true,
				// width : 1250,
				height : 1000,
				singleSelect:true
			});
			function action_products(com,grid){
				switch(com){
					case 'Add':
							$.production.clear_fields();
							$("#product_action_header").html("<b>Add New Product</b>");
							$("#p_add_save").show();
							$("div.add_products").show();
							$("div.production_data").hide();
							$.production.cancel_save();
							$.production.add_save();
						break;
					case 'Edit':
						if($('.trSelected',grid).length>0){
							$.production.clear_fields();
							$("#product_action_header").html("<b>Edit Product</b>");
							$("#p_update_save").show();
							$("div.add_products").show();
							$("div.production_data").hide();
							var prod = $('.trSelected',grid);
							var prod_id = prod[0].id.substr(3);
							var prodid = prod[0].id;
								$("#a_pcode").val($("#"+prodid).find("td").eq(1).text());	
								$("#a_pname").val($("#"+prodid).find("td").eq(2).text());	
								$("#a_pdesc").val($("#"+prodid).find("td").eq(3).text());	
							
								$.ajax({
									type:'GET',
									url:'action/fill_production.php',
									data:{prod_id  : prod_id},
									dataType:'json',
									success:function(response){
										if (response.success) {
											$("#a_pcost").val(response.prod_cost);	
											$("#a_pdimage").attr('src','images/'+response.prod_photo);	
										}else{
											alert('failed');
										}
									},
									error: function() {
										alert("Something's wrong. We'll try to fix this later.");
									}	
								});
								
						}else{
							alert('Please select data from the table.');
						}	
							$.production.cancel_save();
							$.production.update_save(prod_id);
						break;
					case 'Delete':
							if($('.trSelected',grid).length>0){
								var prod = $('.trSelected',grid);
								var prod_id = prod[0].id.substr(3);
								var ans = confirm('Delete ' + $('.trSelected', grid).length + ' item?');
								if(ans){
									$.ajax({
										type:'POST',
										url:'action/delete_prod.php',
										data:{prod_id:prod_id},
										dataType:'json',
										success:function(d){
											if(d.e){
												alert(d.m);
												$("#tbl_production_data").flexReload();
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
			$("div.mws-button-row").find('#p_cancel_save').unbind('click').click(function(){
				$("div.add_products").hide();
				$("div.production_data").show();
				$("#p_add_save").hide();
				$("#p_update_save").hide();
			});
		},
		update_save:function(prod_id){
			$("div.mws-button-row").find('#p_update_save').unbind('click').click(function(){
				var pcode = $("#a_pcode").val();
				var pname = $("#a_pname").val();
				var pdesc = $("#a_pdesc").val();
				var pcost = $("#a_pcost").val();
				// var pPhoto = $("#a_photo").val();
				var pPhoto = 'no_image.jpg';	
				
				$.ajax({
					type:'GET',
					url:'action/update_products.php',
					data:{
						prod_id	: prod_id,
						pcode   : pcode, 
						
						pname	: pname,
						pdesc	: pdesc,
						pcost	: pcost,
						pPhoto	: pPhoto,
					},
					dataType:'json',
					success:function(d){
						if (d.success) {
							alert(d.m);
							$("#p_update_save").hide();
							$("div.add_products").hide();
							$("div.production_data").show();
							$("#tbl_production_data").flexReload();
						}else{
							alert(d.m);
						}
					},
					error: function() {
						alert("Something's wrong. We'll try to fix this later.");
					}	
				});
			});
		},
		add_save:function(){
			$("div.mws-button-row").find('#p_add_save').unbind('click').click(function(){
				var pcode = $("#a_pcode").val();
				var pname = $("#a_pname").val();
				var pdesc = $("#a_pdesc").val();
				var pcost = $("#a_pcost").val();
				// var pPhoto = $("#a_photo").val();
				var pPhoto = 'no_image.jpg';	
				if(pname.length < 1 || pcost.length < 1 || pcode.length < 1){
					alert('Please fill up all required fields.');
				}else{
					$.ajax({
						type:'GET',
						url:'action/add_new_products.php',
						data:{
							pcode	: pcode,
							pname	: pname,
							pdesc	: pdesc,
							pcost	: pcost,
							pPhoto	: pPhoto,
						},
						dataType:'json',
						success:function(d){
							if (d.success) {
								alert(d.m);
								$("div.add_products").hide();
								$("#p_add_save").hide();
								$("div.production_data").show();
								$("#tbl_production_data").flexReload();
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
jQuery(document).ready(function(){ jQuery.production.init(); });