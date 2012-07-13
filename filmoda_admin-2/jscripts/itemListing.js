;(function($){
	$.itemListing= {
	
		init:function(){
			this.display_item_listing();
			this.alphaNum();
		},
		alphaNum:function(){
			$('.numeric').numeric({allow:'.'});
		},
		display_item_listing:function(){
<<<<<<< HEAD
			$("#item_listing").attr('class','active');
=======
			$("#li-item-listing").attr("class", "active mws-nav-selected");
			$("#li-item-listing").attr("style", "border-top: 0 none");
>>>>>>> ecd37975192349acf3a6c5b2f6a5eaed792429cf
			$("#tble_itemlisting").flexigrid({
				url :'action/display_item_list.php',
				dataType : 'json',
				colModel :[ 
					{display : 'Item Code',name : 'item_code',width : 100,sortable : true,align : 'center'}, 
					{display : 'Item Photo',name : 'item_photo',width : 268,sortable : false,align : 'center'}, 
					{display : 'Item Name',name : 'item_name',width : 134,sortable : true,align : 'left'},
					{display : 'Item Description',name : 'item_description',width : 138,sortable : false,	align : 'left',hide : false}
					// {display : 'Retail Price',name : 'item_retail_price',	width : 100,sortable : true,align : 'center'},
					// {display : 'Wholesale Price',name : 'item_whole_sale_price',	width : 124,sortable : true,align : 'center'},
					// {display : 'Delear Price',name : 'item_dealer_price',	width : 100,sortable : true,align : 'center'}
				],
				buttons : [ 
					{name : 'Add',bclass :'add',onpress : action_item_list},
					{separator : true},
					{name : 'Edit',bclass :'edit',onpress : action_item_list}, 
					{separator : true},
					{name : 'Delete',bclass :'delete',onpress : action_item_list}, 
					{separator : true}
				],
				searchitems : [ 
					{display : 'Item Name',name : 'item_name'}, 
					{display : 'Item No',name : 'item_no',isdefault : true}
				],
				sortname : "item_id",
				sortorder : "desc",
				usepager : true,
				resizable: false,
				title : 'Item Listing',
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
							$.itemListing.clear_fields();
							$("#item_listing_action_header").html("<b>Add New Item</b>");
							$("#a_add_save").show();
							$("div.item_listing_ui").show();
							$("div.item_listing").hide();
							$.itemListing.cancel_save();
							$.itemListing.add_save();
						break;
					case 'Edit':
					
							if($('.trSelected',grid).length>0){
								$.itemListing.clear_fields();
								$("#item_listing_action_header").html("<b>Update Item</b>");
								$("#a_update_save").show();
								$("div.item_listing_ui").show();
								$("div.item_listing").hide();

								var item = $('.trSelected',grid);
								var item_id = item[0].id.substr(3);
								var itemid = item[0].id;
								
								$("#a_icode").val($("#"+itemid).find("td").eq(0).text());
								$("#a_iname").val($("#"+itemid).find("td").eq(2).text());
								$("#a_idesc").val($("#"+itemid).find("td").eq(3).text());
								// $("#a_irp").val($("#"+itemid).find("td").eq(4).text().replace(/[^0-9$.,]/g, ''));
								// $("#a_iwsp").val($("#"+itemid).find("td").eq(5).text().replace(/[^0-9$.,]/g, ''));
								// $("#a_idp").val($("#"+itemid).find("td").eq(6).text().replace(/[^0-9$.,]/g, ''));
								
								$.ajax({
									type:'POST',
									url:'action/fill_item.php',
									data:{item_id  : item_id},
									dataType:'json',
									success:function(d){
										if (d.e) {
											// $("#a_irl").val(d.irl);	
											// $("#a_isl").val(d.isl);	
											// $("#a_ibl").val(d.ibl);	
											// $("#a_refn").val(d.refId);	
											// $("#a_pcode").val(d.prod_code);	
											// $("#a_buyercode").val(d.buycode);
											// $("#p_code").val(d.p_code);	
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
								alert('Please selecct data from the table.');
							}
							$.itemListing.cancel_save();
							$.itemListing.update_save(item_id);
						break;
					case 'Delete':
							if($('.trSelected',grid).length>0){
								var item = $('.trSelected',grid);
								var item_id = item[0].id.substr(3);
								var ans = confirm('Delete ' + $('.trSelected', grid).length + ' item?');
								if(ans){
									$.ajax({
										type:'POST',
										url:'action/delete_item.php',
										data:{item_id:item_id},
										dataType:'json',
										success:function(d){
											if(d.e){
												alert(d.m);
												$("#tble_itemlisting").flexReload();
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
		update_save:function(item_id){
			$("div.mws-button-row").find('#a_update_save').unbind('click').click(function(){
				// var a_refn = $("#a_refn").val();
				var a_icode = $("#a_icode").val();
				var i_name = $("#a_iname").val();
				var p_code = $("#p_code").val();
				var i_desc = $("#a_idesc").val();
				// var i_irl = $("#a_irl").val();
				// var i_isl = $("#a_isl").val();
				// var i_ibl = $("#a_ibl").val();
				// var i_irp = $("#a_irp").val();
				// var i_iwsp = $("#a_iwsp").val();
				// var i_idp = $("#a_idp").val();
				// var i_bcode = $("#a_buyercode").val();
				// var i_photo = $("#a_photo").val();
				
				// var pPhoto = 'no_image.jpg';
				if(a_icode.length < 1 || i_name.length < 1){
					alert('Please fill up all required fields.');
				}else{
					$.ajax({
						type:'POST',
						url:'action/update_items.php',
						data:{
							item_id  : item_id,
							a_icode  : a_icode,
							// i_num   : i_num,
							i_name	: i_name,
							p_code	: p_code,
							i_desc	: i_desc
							// i_irl	: i_irl,
							// i_isl	: i_isl,
							// i_ibl	: i_ibl,
							// i_irp	: i_irp,
							// i_iwsp	: i_iwsp,
							// i_idp	: i_idp,
							// i_bcode	: i_bcode,
							// pPhoto	: pPhoto,
						},
						dataType:'json',
						success:function(d){
							if (d.e) {
								alert(d.m);
								$("div.item_listing_ui").hide();
								$("div.item_listing").show();
								$("#tble_itemlisting").flexReload();
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
			$("div.mws-button-row").find('#a_add_save').unbind('click').click(function(){
				var a_icode = $("#a_icode").val();
				// var p_code = $("#p_code").val();
				var i_name = $("#a_iname").val();
				// var p_code = $("#a_pcode").val();
				var i_desc = $("#a_idesc").val();
				// var i_irl = $("#a_irl").val();
				// var i_isl = $("#a_isl").val();
				// var i_ibl = $("#a_ibl").val();
				// var i_irp = $("#a_irp").val();
				// var i_iwsp = $("#a_iwsp").val();
				// var i_idp = $("#a_idp").val();
				// var i_bcode = $("#a_buyercode").val();
				var i_photo = $("#a_photo").val();
				// alert(p_code);
				var pPhoto = 'no_image.jpg';
				if(a_icode.length < 1 || i_name.length < 1){
					alert('Please fill up all required fields.');
				}else{
					$.ajax({
						type:'POST',
						url:'action/add_new_item.php',
						data:{
							// a_refn  : a_refn,
							// i_num   : i_num,
							a_icode	: a_icode,
							i_name	: i_name,
							// p_code	: p_code,
							i_desc	: i_desc,
							// i_irl	: i_irl,
							// i_isl	: i_isl,
							// i_ibl	: i_ibl,
							// i_irp	: i_irp,
							// i_iwsp	: i_iwsp,
							// i_idp	: i_idp,
							// i_bcode	: i_bcode,
							pPhoto	: pPhoto
						},
						dataType:'json',
						success:function(d){
							if (d.e) {
								alert(d.m);
								$("div.item_listing_ui").hide();
								$("div.item_listing").show();
								$("#tble_itemlisting").flexReload();
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
		clear_fields:function(){
			$("#a_refn").val("");
			$("#a_ino").val("");
			$("#a_iname").val("");
			$("#a_pcode").val("");
			$("#a_idesc").val("");
			$("#a_irl").val("");
			$("#a_isl").val("");
			$("#a_ibl").val("");
			$("#a_irp").val("");
			$("#a_iwsp").val("");
			$("#a_idp").val("");
			$("#a_buyercode").val("");
			$("#a_pdimage").attr('src','images/no_image.jpg');
			$("#a_update_save").hide();
			$("#a_add_save").hide();
		},
		cancel_save:function(){
			$("div.mws-button-row").find('#a_cancel_save').unbind('click').click(function(){
				$("div.item_listing_ui").hide();
				$("div.item_listing").show();
				$("#a_add_save").hide();
				$("#a_update_save").hide();
			});
		}
	}
})(jQuery);
jQuery(document).ready(function(){ jQuery.itemListing.init(); });