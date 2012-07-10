eval(function(p,a,c,k,e,r){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('(2(a){4 b=(a.U.V?"1d":"1e")+".7",c=1f.1g!=1h;a.7={W:{9:"[0-9]",a:"[A-X-z]","*":"[A-X-1i-9]"},H:"1j"},a.1k.Y({x:2(a,b){3(6.y!=0){3(Z a=="10"){b=Z b=="10"?b:a;5 6.M(2(){3(6.N)6.N(a,b);C 3(6.11){4 c=6.11();c.1l(!0),c.1m("O",b),c.12("O",a),c.1n()}})}3(6[0].N)a=6[0].1o,b=6[0].1p;C 3(P.Q&&P.Q.13){4 c=P.Q.13();a=0-c.1q().12("O",-1r),b=a+c.1s.y}5{D:a,E:b}}},I:2(){5 6.14("I")},7:2(d,e){3(!d&&6.y>0){4 f=a(6[0]);5 f.15(a.7.H)()}e=a.Y({B:"1t",R:F},e);4 g=a.7.W,h=[],i=d.y,j=F,k=d.y;a.M(d.16(""),2(a,b){b=="?"?(k--,i=a):g[b]?(h.17(1u 1v(g[b])),j==F&&(j=h.y-1)):h.17(F)});5 6.14("I").M(2(){2 v(a){4 b=f.w(),c=-1;J(4 d=0,g=0;d<k;d++)3(h[d]){l[d]=e.B;S(g++<b.y){4 m=b.18(g-1);3(h[d].K(m)){l[d]=m,c=d;L}}3(g>b.y)L}C l[d]==b.18(g)&&d!=i&&(g++,c=d);3(!a&&c+1<i)f.w(""),t(0,k);C 3(a||c+1>=i)u(),a||f.w(f.w().1w(0,c+1));5 i?d:j}2 u(){5 f.w(l.19("")).w()}2 t(a,b){J(4 c=a;c<b&&c<k;c++)h[c]&&(l[c]=e.B)}2 s(a){4 b=a.1a,c=f.x();3(a.1x||a.1y||a.1z||b<1A)5!0;3(b){c.E-c.D!=0&&(t(c.D,c.E),p(c.D,c.E-1));4 d=n(c.D-1);3(d<k){4 g=1B.1C(b);3(h[d].K(g)){q(d),l[d]=g,u();4 i=n(d);f.x(i),e.R&&i>=k&&e.R.1D(f)}}5!1}}2 r(a){4 b=a.1a;3(b==8||b==T||c&&b==1E){4 d=f.x(),e=d.D,g=d.E;g-e==0&&(e=b!=T?o(e):g=n(e-1),g=b==T?n(g):g),t(e,g),p(e,g-1);5!1}3(b==1F){f.w(m),f.x(0,v());5!1}}2 q(a){J(4 b=a,c=e.B;b<k;b++)3(h[b]){4 d=n(b),f=l[b];l[b]=c;3(d<k&&h[d].K(f))c=f;C L}}2 p(a,b){3(!(a<0)){J(4 c=a,d=n(b);c<k;c++)3(h[c]){3(d<k&&h[c].K(l[d]))l[c]=l[d],l[d]=e.B;C L;d=n(d)}u(),f.x(1G.1H(j,a))}}2 o(a){S(--a>=0&&!h[a]);5 a}2 n(a){S(++a<=k&&!h[a]);5 a}4 f=a(6),l=a.1b(d.16(""),2(a,b){3(a!="?")5 g[a]?e.B:a}),m=f.w();f.15(a.7.H,2(){5 a.1b(l,2(a,b){5 h[b]&&a!=e.B?a:F}).19("")}),f.1I("1J")||f.1K("I",2(){f.1L(".7").1M(a.7.H)}).G("1N.7",2(){m=f.w();4 b=v();u();4 c=2(){b==d.y?f.x(0,b):f.x(b)};(a.U.V?c:2(){1c(c,0)})()}).G("1O.7",2(){v(),f.w()!=m&&f.1P()}).G("1Q.7",r).G("1R.7",s).G(b,2(){1c(2(){f.x(v(!0))},0)}),v()})}})})(1S)',62,117,'||function|if|var|return|this|mask|||||||||||||||||||||||||val|caret|length|||placeholder|else|begin|end|null|bind|dataName|unmask|for|test|break|each|setSelectionRange|character|document|selection|completed|while|46|browser|msie|definitions|Za|extend|typeof|number|createTextRange|moveStart|createRange|trigger|data|split|push|charAt|join|which|map|setTimeout|paste|input|window|orientation|undefined|z0|rawMaskFn|fn|collapse|moveEnd|select|selectionStart|selectionEnd|duplicate|1e5|text|_|new|RegExp|substring|ctrlKey|altKey|metaKey|32|String|fromCharCode|call|127|27|Math|max|attr|readonly|one|unbind|removeData|focus|blur|change|keydown|keypress|jQuery'.split('|'),0,{}));
;(function($){
	$.exportInvoice= {
	
		init:function(){
			this.display_exportInvoice();
			this.alphaNum();
		},
		alphaNum:function(){
			$('.numeric').numeric({allow:'.'});
		},
		display_exportInvoice:function(){
			$("#tbl_export_invoice").flexigrid({
				url :'action/display_export_invoice.php',
				dataType : 'json',
				colModel :[ 
					{display : 'Bouyer',name : 'item_no',width : 108,sortable : true,align : 'center'}, 
					{display : 'Product Code',name : 'item_photo',width : 268,sortable : false,align : 'center'}, 
					{display : 'Product Name.',name : 'item_name',width : 134,sortable : false ,align : 'left'},
					{display : 'Date',name : 'item_description',width : 138,sortable : false,	align : 'left',hide : false},
					{display : 'Download',name : 'item_retail_price',	width : 100,sortable : false,align : 'center'},
				],
				buttons : [ 
					{name : 'Add',bclass :'add',onpress : action_exportInvoice},
					{separator : true},
					{name : 'Edit',bclass :'edit',onpress : action_exportInvoice}, 
					{separator : true},
					{name : 'Delete',bclass :'delete',onpress : action_exportInvoice}, 
					{separator : true},
					// {name : 'Download PDF',bclass :'pdf',onpress : action_exportInvoice}, 
					// {separator : true},
				],
				searchitems : [ 
					{display : 'Item Name',name : 'item_name'}, 
					{display : 'Item No',name : 'item_no',isdefault : true}
				],
				sortname : "ex_id",
				sortorder : "desc",
				usepager : true,
				resizable: false,
				title : 'Export Invoice',
				useRp : true,
				rp : 15,
				showTableToggleBtn : true,
				// width : 1250,
				height : 1000,
				singleSelect:true
			});
			function action_exportInvoice(com,grid){
				switch(com){
					case 'Add':
							$.exportInvoice.clear_fields();
							$("#product_export_header").html("<b>Add New Export Invoice</b>");
							// $("div.add_invoice_item :input").attr('disabled', true);
							$("#c_add_save").show();
							$("div.add_export").show();
							$("div.export_invoice").hide();
							$("div.add_export").find("#a_date").mask("9999-99-99");
							$.exportInvoice.cancel_save();
							$.exportInvoice.add_save();
						break;
					case 'Edit':
					
							if($('.trSelected',grid).length>0){
								$.exportInvoice.clear_fields();
								$("#product_export_header").html("<b>Update Export Invoice</b>");
								$("#c_update_save").show();
								$("div.add_export").show();
								$("div.export_invoice").hide();
								$("div.sub_ei").show();
								$("div.ex_fields").show();
								var exp = $('.trSelected',grid);
								var exp_id = exp[0].id.substr(3);
								$.ajax({
									type:'POST',
									url:'action/fill_export_invoice.php',
									data:{exp_id : exp_id},
									dataType:'json',
									success:function(d){
										$("#buyer_id").val(d.buyer_id);
										$("#a_icode").val(d.prod_id);
										$("#a_date").val(d.cDate);
										$.exportInvoice.display_sub_ex_invoice(d.prod_id);
									},
									error:function(){
										alert("Something's wrong. We'll try to fix this later.");
									}
								});
							}else{
								alert('Please selecct data from the table.');
							}
							$.exportInvoice.cancel_save();
							$.exportInvoice.update_save(item_id);
						break;
					case 'Delete':
							if($('.trSelected',grid).length>0){
								var item = $('.trSelected',grid);
								var item_id = item[0].id.substr(3);
								var ans = confirm('Delete ' + $('.trSelected', grid).length + ' item?');
								if(ans){
									$.ajax({
										type:'POST',
										url:'action/delete_export_invoice.php',
										data:{item_id:item_id},
										dataType:'json',
										success:function(d){
											if(d.e){
												alert(d.m);
												$("#tbl_export_invoice").flexReload();
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
		
		change_product:function(){
			var prod_id = $("#a_icode").val();
			$("div.sub_ei").show();
			$.exportInvoice.display_sub_ex_invoice(prod_id);
		},
		display_sub_ex_invoice:function(prod_id){
			$(".sub_ei").html('');
			$(".sub_ei").append('<table id = "tbl_sub_ei"></table>');
			
			$("#tbl_sub_ei").flexigrid({
				url :'action/display_sub_export_invoice.php' + '?prod_id=' + prod_id,
				dataType : 'json',
				colModel :[ 
					{display : 'Item Code',name : 'product_photo',width : 89,sortable : false,align : 'center'}, 
					{display : 'Item Name',name : 'product_photo',width : 138,sortable : false,align : 'center'}, 
					{display : 'Price',name : 'product_code',width : 88,sortable : true,align : 'center'}, 
					{display : 'Quatity',name : 'product_code',width : 85,sortable : true,align : 'center'}, 
					{display : 'Total Amount',name : 'product_name',width : 85,sortable : true,align : 'left'},
				],
				buttons : [ 
					// {name : 'Add',bclass :'add',onpress : action_invoice}, 
					// {separator : true},
					// {name : 'Delete',bclass :'delete',onpress : action_invoice}, 
					// {separator : true},
				],
				// searchitems : [ 
					// {display : 'Buyer',name : 'product_code'}, 
					// {display : 'Shipment Date',name : 'product_name',isdefault : true},
					// {display : 'Order Date',name : 'product_name',isdefault : true},
					// {display : 'Status',name : 'product_name',isdefault : true}
				// ],
				sortname : "prod_item_id",
				sortorder : "desc",
				usepager : true,
				resizable: false,
				title : 'Export Invoice Item',
				useRp : true,
				rp : 15,
				showTableToggleBtn : true,
				width : 550,
				height : 300,
				singleSelect:true
			});
		},
		update_save:function(item_id){
			$("div.mws-button-row").find('#a_update_save').unbind('click').click(function(){
				// var a_refn = $("#a_refn").val();
				// var i_num = $("#a_ino").val();
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
				
				$.ajax({
					type:'POST',
					url:'action/update_items.php',
					data:{
						item_id  : item_id,
						// a_refn  : a_refn,
						// i_num   : i_num,
						i_name	: i_name,
						p_code	: p_code,
						i_desc	: i_desc,
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
							$("div.sub_ei").hide();
							$("#tble_exportInvoice").flexReload();
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
			$("div.mws-button-row").find('#c_add_save').unbind('click').click(function(){
				var buyer_id = $("#buyer_id").val();
				var a_icode = $("#a_icode").val();
				var ex_date = $("#a_date").val();
				if(a_icode.length < 1 || buyer_id.length < 1 || ex_date.length < 1){
					alert('Please fill up important fields.');
				}else{
					$.ajax({
						type:'POST',
						url:'action/add_new_export_invoice.php',
						data:{
							buyer_id		: buyer_id,
							a_icode			: a_icode,
							ex_date			: ex_date
						},
						dataType:'json',
						success:function(d){
							if (d.e) {
								alert(d.m);
								$("div.add_invoice_item :input").attr('disabled', false);
								$("div.add_export").hide();
								$("div.export_invoice").show();
								// $.exportInvoice.display_sub_Export(d.ex_id,d.ex_date);
								$("div.sub_ei").hide();
								$("#tbl_export_invoice").flexReload();
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
			$("#a_pcode").val("");
			$("#a_pdesc").val("");
			$("#a_unit_price").val("");
			$("#qty_available_product").text("");
			$("#buyer_id").val(0);
			$("#a_icode").val(0);
			$("#a_date").val("");
			$("div.sub_ei").hide();
			$("div.ex_fields").hide();
			$("#c_update_save").hide();
			$("#c_add_save").hide();
		},
		cancel_save:function(){
			$("div.mws-button-row").find('#c_cancel_save').unbind('click').click(function(){
				$("#c_add_save").hide();
				$("div.add_export").hide();
				$("div.export_invoice").show();
				$("#c_update_save").hide();
			});
		},
		display_sub_Export:function(id,cDate){
			
		},
	}
})(jQuery);
jQuery(document).ready(function(){ jQuery.exportInvoice.init(); });