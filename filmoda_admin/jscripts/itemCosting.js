;(function($){
	$.itemCosting= {
	
		init:function(){
			this.display_item_costing();
			this.alphaNum();
		},
		alphaNum:function(){
			$('.numeric').numeric({allow:'.'});
		},
		display_item_costing:function(){
			$("#li-item-costing").attr("class", "active mws-nav-selected");
			$("#li-item-costing").attr("style", "border-top: 0 none");
			$("#tbl_item_costing").flexigrid({
				url :'action/display_item_cost.php',
				dataType : 'json',
				colModel :[ 
					{display : 'Item Code',name : 'item_code',width : 50,sortable : true,align : 'center'}, 
					{display : 'Item Photo',name : 'item_photo',width : 268,sortable : false,align : 'center'}, 
					{display : 'Item Name',name : 'item_name',width : 134,sortable : true,align : 'left'},
					{display : 'Item Description',name : 'item_description',width : 138,sortable : false,	align : 'left',hide : false}, 
					{display : 'Item Cost',name : 'item_price',	width : 75,sortable : true,align : 'center'},
					{display : 'Measure',name : 'measure',	width : 75,sortable : false,align : 'center'},
					{display : 'Quantity',name : 'item_qty',	width : 75,sortable : false,align : 'center'},
					{display : 'Total',name : 'product_name',	width : 75,sortable : false,align : 'center'}
				],
				buttons : [ 
					{name : 'Add',bclass :'add',onpress : action_item_cost},
					{separator : true},
					{name : 'Edit',bclass :'edit',onpress : action_item_cost}, 
					{separator : true},
					{name : 'Delete',bclass :'delete',onpress : action_item_cost}, 
					{separator : true},
				],
				searchitems : [ 
					{display : 'Item Code',name : 'item_code'}, 
					// {display : 'Item Name',name : 'item_name',isdefault : true}
				],
				sortname : "costing_no",
				sortorder : "desc",
				usepager : true,
				resizable: false,
				title : 'Item Costing',
				useRp : true,
				rp : 15,
				showTableToggleBtn : true,
				// width : 1250,
				height : 1000,
				singleSelect:true
			});
			function action_item_cost(com,grid){
				switch(com){
					case 'Add':
							$("#product_action_header").html("<b>Add New Item Cost</b>");
							$("div.curr").show();
							$.itemCosting.clear_fields();
							$("div.add_costing").show();
							$("div.item_costing").hide();
							$("#c_add_save").show();
							$.itemCosting.cancel_save();
							$.itemCosting.add_save();
						break;
					case 'Edit':
						if($('.trSelected',grid).length>0){
							$.itemCosting.clear_fields();
							$("#product_action_header").html("<b>Edit Item Cost</b>");
							$("div.curr").hide();
							$("div.add_costing").show();
							$("div.item_costing").hide();
							$("#c_update_save").show();
							var cost = $('.trSelected',grid);
							var cost_id = cost[0].id.substr(3);
							var costid = cost[0].id;
							$("#c_iprice").val($("#"+costid).find("td").eq(4).text().replace(/[^0-9$.,]/g, ''));	
							$("#c_iquant").val($("#"+costid).find("td").eq(6).text());
							// alert(item_code);
							$.ajax({
								type:'POST',
								url:'action/displayItemcostImg.php',
								data:{cost_id:cost_id},
								dataType:'json',
								success:function(d){
									if(d.e){
										$("#c_item_id").val(d.item_name_id);	
										$("#a_pdimage").attr('src','images/'+d.item_photo);	
									}else{
										alert(d.m);
									}
								},
								error: function() {
									alert("Something's wrong. We'll try to fix this later.");
								}
							});
							
						}else{
							alert('Please select data from the table.');
						}
						$.itemCosting.cancel_save();
						$.itemCosting.update_save(cost_id);
						break;
					case 'Delete':
						if($('.trSelected',grid).length>0){
							var cost = $('.trSelected',grid);
							var cost_id = cost[0].id.substr(3);
							var ans = confirm('Delete ' + $('.trSelected', grid).length + ' item?');
								if(ans){
									$.ajax({
										type:'POST',
										url:'action/delete_item_cost.php',
										data:{cost_id:cost_id},
										dataType:'json',
										success:function(d){
											if(d.e){
												alert(d.m);
												$("#tbl_item_costing").flexReload();
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
		update_save:function(cost_id){
			$("div.mws-button-row").find('#c_update_save').unbind('click').click(function(){
				var item_id 	 = $("#c_item_id").val();
				var item_price 	 = $("#c_iprice").val();
				var item_quan 	 = $("#c_iquant").val();
				// var c_curr		 = $("#c_curr").val();
				if(item_id.length<1){
					alert('Please select item code.');
				}else if(item_price.length <1){
					alert('Please enter item price.');
				}else if(item_quan.length<1){
					alert('Please enter item quantity.');
				// }else if(c_curr.length<1){
					// alert('Please enter item currency.');
				}else{
					$.ajax({
						type:'POST',
						url:'action/update_item_costing.php',
						data:{
							cost_id	: cost_id,
							item_id : item_id,
							item_price : item_price,
							item_quan : item_quan,
							// c_curr : c_curr,
						},
						dataType:'json',
						success:function(d){
							if(d.e){
								alert(d.m);
								$("div.add_costing").hide();
								$("div.item_costing").show();
								$("#tbl_item_costing").flexReload();
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
		clear_fields:function(){
			$("#c_item_code").val("");
			$("#c_iprice").val("");
			$("#c_iquant").val("");
			$("#c_curr").val("");
			$("#c_add_save").hide();
			$("#c_update_save").hide();
			$("#a_pdimage").attr('src','images/no_image.jpg');	
		},
		chngeitemcode:function(){
			var item_id = $("#c_item_id").val();
			if(item_id < 1){
				alert('Please select item.');
			}else{
				$.ajax({
					type:'POST',
					url:'action/displayItemcostImg.php',
					data:{item_id:item_id},
					dataType:'json',
					success:function(d){
						if(d.e){
							$("#a_pdimage").attr('src','images/'+d.item_photo);	
						}else{
							alert(d.m);
						}
					},
					error: function() {
						alert("Something's wrong. We'll try to fix this later.");
					}
				});
			}
		},
		cancel_save:function(){
			$("div.mws-button-row").find('#c_cancel_save').unbind('click').click(function(){
				$("div.add_costing").hide();
				$("div.item_costing").show();
				$("#c_add_save").hide();
				$("#c_update_save").hide();
			});
		},
		add_save:function(){
			$("div.mws-button-row").find('#c_add_save').unbind('click').click(function(){
				var item_id 	 = $("#c_item_id").val();
				var item_price 	 = $("#c_iprice").val();
				var item_quan 	 = $("#c_iquant").val();
				// var c_curr		 = $("#c_curr").val();
				
				if(item_id.length < 1){
					alert('Please select item name.');
				}else if(item_price.length < 1){
					alert('Please enter item price.');
				}else if(item_quan.length < 1){
					alert('Please enter item quantity.');
				}else{
					$.ajax({
						type:'POST',
						url:'action/add_item_costing.php',
						data:{
							item_id 	: item_id,
							item_price  : item_price,
							item_quan   : item_quan,
							// c_curr : c_curr,
						},
						dataType:'json',
						success:function(d){
							if(d.e){
								alert(d.m);
								$("div.add_costing").hide();
								$("div.item_costing").show();
								$("#tbl_item_costing").flexReload();
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
	}
})(jQuery);
jQuery(document).ready(function(){ jQuery.itemCosting.init(); });