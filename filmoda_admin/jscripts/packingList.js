;(function($){
	$.packingList= {
	
		init:function(){
			this.display_packingList();
			this.alphaNum();
		},
		alphaNum:function(){
			$('.numeric').numeric({allow:'.'});
		},
		display_packingList:function(){
			$("#li-packing-list").attr("class", "active mws-nav-selected");
			$("#li-packing-list").attr("style", "border-top: 0 none");
			$("#tbl_pack_list").flexigrid({
				url :'action/display_packing_list.php',
				dataType : 'json',
				colModel :[ 
					{display : 'BX NO',name : 'p_bx_no',width : 81,sortable : false,align : 'center'}, 
					{display : 'Item Code',name : 'p_item_code',width : 117,sortable : true,align : 'center'},
					{display : 'Color',name : 'p_color',	width :157,sortable : true,align : 'center'},
					{display : 'No. per/bag',name : 'p_no_bag',	width :128,sortable : false,align : 'center'},
					{display : 'QTY pcs/bag',name : 'p_pcs_bag',	width :92,sortable : false,align : 'center'},
					{display : 'Total',name : 'total',	width :79,sortable : false,align : 'center'},
					{display : 'G. W.',name : 'p_gw',	width :76,sortable : false,align : 'center'},
					{display : 'N. W',name : 'p_nw',	width :62,sortable : false,align : 'center'},
					{display : 'Meas',name : 'p_meas',	width :114,sortable : false,align : 'center'},
				],
				buttons : [ 
					{name : 'Add',bclass :'add',onpress : action_packingList},
					{separator : true},
					{name : 'Edit',bclass :'edit',onpress : action_packingList}, 
					{separator : true},
					{name : 'Delete',bclass :'delete',onpress : action_packingList}, 
					{separator : true},
					{name : 'Download PDF',bclass :'pdf',onpress : action_packingList}, 
					{separator : true},
				],
				searchitems : [ 
					{display : 'Item Code',name : 'p_item_code',isdefault : true}
				],
				sortname : "p_bx_no",
				sortorder : "desc",
				usepager : true,
				resizable: false,
				title : 'Packing List',
				useRp : true,
				rp : 15,
				showTableToggleBtn : true,
				// width : 1250,
				height : 1000,
				singleSelect:true
			});
			function action_packingList(com,grid){
				switch(com){
					case 'Add':
							$.packingList.clear_fields();
							$("#product_action_header").html("<b>Add New Packing List</b>");
							$("#c_add_save").show();
							$("div.add_packing_list").show();
							$("div.pack_list").hide();
							$.packingList.cancel_save();
							$.packingList.add_save();
						break;
					case 'Edit':
						if($('.trSelected',grid).length>0){
							$.packingList.clear_fields();
							$("#product_action_header").html("<b>Edit Suppliers</b>");
							$("div.pack_list").hide();
							$("div.add_packing_list").show();
							$("#c_update_save").show();
							var pack = $('.trSelected',grid);
							var pack_id = pack[0].id.substr(3);
							var packid = pack[0].id;
								$("#a_icode").val($("#"+packid).find("td").eq(1).text());	
								$("#a_pcolor").val($("#"+packid).find("td").eq(2).text());	
								$("#a_no_per_bag").val($("#"+packid).find("td").eq(3).text());	
								$("#a_qty_pcs").val($("#"+packid).find("td").eq(4).text());	
								$("#a_gw").val($("#"+packid).find("td").eq(6).text());	
								$("#a_nw").val($("#"+packid).find("td").eq(7).text());	
								$("#a_meas").val($("#"+packid).find("td").eq(8).text());
										
						}else{
							alert('Please select data from the table.');
						}		
							$.packingList.cancel_save();
							$.packingList.update_save(pack_id);
						break;
					case 'Delete':
							if($('.trSelected',grid).length>0){
								var pack = $('.trSelected',grid);
								var pack_id = pack[0].id.substr(3);
								var ans = confirm('Delete ' + $('.trSelected', grid).length + ' data?');
								if(ans){
									$.ajax({
										type:'POST',
										url:'action/delete_packing_list.php',
										data:{pack_id:pack_id},
										dataType:'json',
										success:function(d){
											if(d.e){
												alert(d.m);
												$("#tbl_pack_list").flexReload();
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
			$("#c_add_save").hide();
			$("#c_update_save").hide();
			$("#a_icode").val("");
			$("#a_pcolor").val("");
			$("#a_no_per_bag").val("");
			$("#a_qty_pcs").val("");
			$("#a_gw").val("");
			$("#a_nw").val("");
			$("#a_meas").val("");
		},
		cancel_save:function(){
			$("div.mws-button-row").find('#c_cancel_save').unbind('click').click(function(){
				$("div.add_packing_list").hide();
				$("div.pack_list").show();
				$("#c_add_save").hide();
				$("#c_update_save").hide();
			});
		},
		update_save:function(pack_id){
			$("div.mws-button-row").find('#c_update_save').unbind('click').click(function(){
				var icode = $("#a_icode").val();
				var color = $("#a_pcolor").val();
				var npbag = $("#a_no_per_bag").val();
				var qtypcs = $("#a_qty_pcs").val();
				var gw 	= $("#a_gw").val();
				var nw 	= $("#a_nw").val();
				var meas = $("#a_meas").val();
				
				
				if(icode.length < 1 || color.length < 1 || npbag.length < 1 || qtypcs.length < 1 || gw.length < 1 || nw.length < 1 || meas.length < 1){
					alert('Please fill up all required fields.');
				}else{
					$.ajax({
						type:'POST',
						url:'action/update_packing_list.php',
						data:{
							
							pack_id   : pack_id,
							icode   : icode,
							color	: color,
							npbag	: npbag,
							qtypcs	: qtypcs,
							gw		: gw,
							nw		: nw,
							meas	: meas,
						},
						dataType:'json',
						success:function(d){
							if (d.e) {
								alert(d.m);
								$("div.add_packing_list").hide();
								$("div.pack_list").show();
								$("#tbl_pack_list").flexReload();
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
				var icode = $("#a_icode").val();
				var color = $("#a_pcolor").val();
				var npbag = $("#a_no_per_bag").val();
				var qtypcs = $("#a_qty_pcs").val();
				var gw 	= $("#a_gw").val();
				var nw 	= $("#a_nw").val();
				var meas = $("#a_meas").val();
				
				
				if(icode.length < 1 || color.length < 1 || npbag.length < 1 || qtypcs.length < 1 || gw.length < 1 || nw.length < 1 || meas.length < 1){
					alert('Please fill up all required fields.');
				}else{
					$.ajax({
						type:'POST',
						url:'action/add_new_packing_list.php',
						data:{
							icode   : icode,
							color	: color,
							npbag	: npbag,
							qtypcs	: qtypcs,
							gw		: gw,
							nw		: nw,
							meas	: meas,
						},
						dataType:'json',
						success:function(d){
							if (d.e) {
								alert(d.m);
								$("div.add_packing_list").hide();
								$("div.pack_list").show();
								$("#tbl_pack_list").flexReload();
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

	}
})(jQuery);
jQuery(document).ready(function(){ jQuery.packingList.init(); });