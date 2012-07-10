;(function($){
	$.buyers= {
	
		init:function(){
			this.display_buyers();
		},
		
		display_buyers:function(){
			$("#tbl_buyers").flexigrid({
				url :'action/display_buyers.php',
				dataType : 'json',
				colModel :[ 
					{display : 'Buyer',name : 'buyer_code',width : 148,sortable : false,align : 'center'}, 
					{display : 'Contact Details',name : 'buyer_contact',width : 155,sortable : true,align : 'center'}, 
					{display : 'Address',name : 'buyer_address',width : 193,sortable : true,align : 'left'},
					{display : 'Date Updated',name : 'date_updated',width : 128,sortable : false,	align : 'left',hide : false}, 
					{display : 'Status',name : 'buyer_status',	width : 115,sortable : false,align : 'center'}
				],
				buttons : [ 
					{name : 'Add',bclass :'add',onpress : action_performa},
					{separator : true},
					{name : 'Edit',bclass :'edit',onpress : action_performa}, 
					{separator : true},
					{name : 'Delete',bclass :'delete',onpress : action_performa}, 
					{separator : true},
				],
				searchitems : [ 
					{display : 'Buyer',name : 'buyer_code',isdefault : true}, 
					{display : 'Status',name : 'buyer_status'}
				],
				sortname : "id",
				sortorder : "desc",
				usepager : true,
				resizable: false,
				title : 'Buyer',
				useRp : true,
				rp : 15,
				showTableToggleBtn : true,
				// width : 1250,
				height : 1000,
				singleSelect:true
			});
			function action_performa(com,grid){
				switch(com){
					case 'Add':
							$.buyers.clear_fields();
							$("#item_listing_action_header").html("<b>Add New Buyers</b>");
							$("#c_add_save").show();
							$("div.add_buyers").show();
							$("div.buyers").hide();
							$.buyers.cancel_save();
							$.buyers.add_save();
						break;
					case 'Edit':
						if($('.trSelected',grid).length>0){
							$.buyers.clear_fields();
							$("#product_action_header").html("<b>Edit Buyer</b>");
							$("#c_update_save").show();
							$("div.add_buyers").show();
							$("div.buyers").hide();
							var buyer = $('.trSelected',grid);
							var buyer_id = buyer[0].id.substr(3);
							var buyerid = buyer[0].id;
							$("#a_bname").val($("#"+buyerid).find("td").eq(0).text());
							$("#a_baddress").val($("#"+buyerid).find("td").eq(2).text());
							$("#a_bcontact").val($("#"+buyerid).find("td").eq(1).text());
							$("#a_bstatus").val((($("#"+buyerid).find("td").eq(4).text())!='Active')?'0':'1');
							$.ajax({
								type:'POST',
								url:'action/fill_buyer.php',
								data:{buyer_id:buyer_id},
								dataType:'json',
								success:function(d){
									if(d.e){
										$("#a_bcode").val(d.bcode);
										$("#a_bdesc").val(d.bdesc);
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
						$.buyers.cancel_save();
						$.buyers.update_save(buyer_id);
						break;
					case 'Delete':
							if($('.trSelected',grid).length>0){
								var buyer = $('.trSelected',grid);
								var buyer_id = buyer[0].id.substr(3);
								var ans = confirm('Delete ' + $('.trSelected', grid).length + ' data?');
								if(ans){
									$.ajax({
										type:'POST',
										url:'action/delete_buyer.php',
										data:{buyer_id:buyer_id},
										dataType:'json',
										success:function(d){
											if(d.e){
												alert(d.m);
												$("#tbl_buyers").flexReload();
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
			$("#a_bcode").val("");
			$("#a_bname").val("");
			$("#a_bdesc").val("");
			$("#a_baddress").val("");
			$("#a_bcontact").val("");
			$("#a_bstatus").val("");	
		},
		cancel_save:function(){
			$("div.mws-button-row").find('#c_cancel_save').unbind('click').click(function(){
				$("div.add_buyers").hide();
				$("div.buyers").show();
				$("#c_add_save").hide();
				$("#c_update_save").hide();
			});
		},
		add_save:function(){
			$("div.mws-button-row").find('#c_add_save').unbind('click').click(function(){
				var a_bcode = $("#a_bcode").val();
				var a_bname = $("#a_bname").val();
				var a_bdesc = $("#a_bdesc").val();
				var a_baddress = $("#a_baddress").val();
				var a_bcontact = $("#a_bcontact").val();
				var a_bstatus = $("#a_bstatus").val();
				
				if(a_bcode.length < 1 || a_bname.length < 1 || a_baddress.length < 1 || a_bcontact.length < 1){
					alert('Please fill up all required fields.');
				}else{
					$.ajax({
						type:'POST',
						url:'action/add_new_buyers.php',
						data:{
							a_bcode     : a_bcode,
							a_bname		: a_bname,
							a_bdesc		: a_bdesc,
							a_baddress	: a_baddress,
							a_bcontact	: a_bcontact,
							a_bstatus	: a_bstatus,
						},
						dataType:'json',
						success:function(d){
							if (d.e) {
								alert(d.m);
								$("div.add_buyers").hide();
								$("div.buyers").show();
								$("#tbl_buyers").flexReload();
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
		update_save:function(buyer_id){
			$("div.mws-button-row").find('#c_update_save').unbind('click').click(function(){
				var a_bcode = $("#a_bcode").val();
				var a_bname = $("#a_bname").val();
				var a_bdesc = $("#a_bdesc").val();
				var a_baddress = $("#a_baddress").val();
				var a_bcontact = $("#a_bcontact").val();
				var a_bstatus = $("#a_bstatus").val();
				
				if(a_bcode.length < 1 || a_bname.length < 1 || a_baddress.length < 1 || a_bcontact.length < 1){
					alert('Please fill up all required fields.');
				}else{
					$.ajax({
						type:'POST',
						url:'action/update_buyers.php',
						data:{
							buyer_id	: buyer_id,
							a_bcode     : a_bcode,
							a_bname		: a_bname,
							a_bdesc		: a_bdesc,
							a_baddress	: a_baddress,
							a_bcontact	: a_bcontact,
							a_bstatus	: a_bstatus,
						},
						dataType:'json',
						success:function(d){
							if (d.e) {
								alert(d.m);
								$("div.add_buyers").hide();
								$("div.buyers").show();
								$("#tbl_buyers").flexReload();
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
		}
	}
})(jQuery);
jQuery(document).ready(function(){ jQuery.buyers.init(); });