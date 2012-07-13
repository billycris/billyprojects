eval(function(p,a,c,k,e,r){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('(2(a){4 b=(a.U.V?"1d":"1e")+".7",c=1f.1g!=1h;a.7={W:{9:"[0-9]",a:"[A-X-z]","*":"[A-X-1i-9]"},H:"1j"},a.1k.Y({x:2(a,b){3(6.y!=0){3(Z a=="10"){b=Z b=="10"?b:a;5 6.M(2(){3(6.N)6.N(a,b);C 3(6.11){4 c=6.11();c.1l(!0),c.1m("O",b),c.12("O",a),c.1n()}})}3(6[0].N)a=6[0].1o,b=6[0].1p;C 3(P.Q&&P.Q.13){4 c=P.Q.13();a=0-c.1q().12("O",-1r),b=a+c.1s.y}5{D:a,E:b}}},I:2(){5 6.14("I")},7:2(d,e){3(!d&&6.y>0){4 f=a(6[0]);5 f.15(a.7.H)()}e=a.Y({B:"1t",R:F},e);4 g=a.7.W,h=[],i=d.y,j=F,k=d.y;a.M(d.16(""),2(a,b){b=="?"?(k--,i=a):g[b]?(h.17(1u 1v(g[b])),j==F&&(j=h.y-1)):h.17(F)});5 6.14("I").M(2(){2 v(a){4 b=f.w(),c=-1;J(4 d=0,g=0;d<k;d++)3(h[d]){l[d]=e.B;S(g++<b.y){4 m=b.18(g-1);3(h[d].K(m)){l[d]=m,c=d;L}}3(g>b.y)L}C l[d]==b.18(g)&&d!=i&&(g++,c=d);3(!a&&c+1<i)f.w(""),t(0,k);C 3(a||c+1>=i)u(),a||f.w(f.w().1w(0,c+1));5 i?d:j}2 u(){5 f.w(l.19("")).w()}2 t(a,b){J(4 c=a;c<b&&c<k;c++)h[c]&&(l[c]=e.B)}2 s(a){4 b=a.1a,c=f.x();3(a.1x||a.1y||a.1z||b<1A)5!0;3(b){c.E-c.D!=0&&(t(c.D,c.E),p(c.D,c.E-1));4 d=n(c.D-1);3(d<k){4 g=1B.1C(b);3(h[d].K(g)){q(d),l[d]=g,u();4 i=n(d);f.x(i),e.R&&i>=k&&e.R.1D(f)}}5!1}}2 r(a){4 b=a.1a;3(b==8||b==T||c&&b==1E){4 d=f.x(),e=d.D,g=d.E;g-e==0&&(e=b!=T?o(e):g=n(e-1),g=b==T?n(g):g),t(e,g),p(e,g-1);5!1}3(b==1F){f.w(m),f.x(0,v());5!1}}2 q(a){J(4 b=a,c=e.B;b<k;b++)3(h[b]){4 d=n(b),f=l[b];l[b]=c;3(d<k&&h[d].K(f))c=f;C L}}2 p(a,b){3(!(a<0)){J(4 c=a,d=n(b);c<k;c++)3(h[c]){3(d<k&&h[c].K(l[d]))l[c]=l[d],l[d]=e.B;C L;d=n(d)}u(),f.x(1G.1H(j,a))}}2 o(a){S(--a>=0&&!h[a]);5 a}2 n(a){S(++a<=k&&!h[a]);5 a}4 f=a(6),l=a.1b(d.16(""),2(a,b){3(a!="?")5 g[a]?e.B:a}),m=f.w();f.15(a.7.H,2(){5 a.1b(l,2(a,b){5 h[b]&&a!=e.B?a:F}).19("")}),f.1I("1J")||f.1K("I",2(){f.1L(".7").1M(a.7.H)}).G("1N.7",2(){m=f.w();4 b=v();u();4 c=2(){b==d.y?f.x(0,b):f.x(b)};(a.U.V?c:2(){1c(c,0)})()}).G("1O.7",2(){v(),f.w()!=m&&f.1P()}).G("1Q.7",r).G("1R.7",s).G(b,2(){1c(2(){f.x(v(!0))},0)}),v()})}})})(1S)',62,117,'||function|if|var|return|this|mask|||||||||||||||||||||||||val|caret|length|||placeholder|else|begin|end|null|bind|dataName|unmask|for|test|break|each|setSelectionRange|character|document|selection|completed|while|46|browser|msie|definitions|Za|extend|typeof|number|createTextRange|moveStart|createRange|trigger|data|split|push|charAt|join|which|map|setTimeout|paste|input|window|orientation|undefined|z0|rawMaskFn|fn|collapse|moveEnd|select|selectionStart|selectionEnd|duplicate|1e5|text|_|new|RegExp|substring|ctrlKey|altKey|metaKey|32|String|fromCharCode|call|127|27|Math|max|attr|readonly|one|unbind|removeData|focus|blur|change|keydown|keypress|jQuery'.split('|'),0,{}));

;(function($){
	$.purchasing= {
	
		init:function(){
			this.display_purchasing();
			this.alphaNumi();
		},
		alphaNumi:function(){
			$(".numeric").numeric({allow:"."});
		},
		display_purchasing:function(){
			$("#tbl_purchasing").flexigrid({
				url :'action/display_purchasing.php',
				dataType : 'json',
				colModel :[ 
					{display : 'Photo',name : 'product_photo',width : 114,sortable : false,align : 'center'}, 
					{display : 'Material Name',name : 'pur_material_name',width : 124,sortable : true,align : 'center'}, 
					{display : 'Description',name : 'pur_description',width : 145,sortable : true,align : 'left'},
					{display : 'Supplier',name : 'item_description',width : 138,sortable : false,	align : 'left',hide : false}, 
					{display : 'Purchase Address',name : 'supplier_address',width : 138,sortable : false,	align : 'left',hide : false}, 
					{display : 'Price',name : 'pur_price',	width : 75,sortable : false,align : 'center'},
					{display : 'Quantity',name : 'pur_quantity',	width : 75,sortable : false,align : 'center'},
					{display : 'Total',name : 'product_name',	width : 75,sortable : false,align : 'center'},
					{display : 'Purchase Date',name : 'pur_date',	width : 175,sortable : false,align : 'center'},
					{display : 'Receiving Date',name : 'pur_receive_date',	width : 175,sortable : false,align : 'center'}
				],
				buttons : [ 
					{name : 'Add',bclass :'add',onpress : action_purchasing},
					{separator : true},
					{name : 'Edit',bclass :'edit',onpress : action_purchasing}, 
					{separator : true},
					{name : 'Delete',bclass :'delete',onpress : action_purchasing}, 
					{separator : true}
				],
				searchitems : [ 
					{display : 'Material Name',name : 'pur_material_name',isdefault : true}, 
					{display : 'Purchase Date',name : 'pur_date'}, 
					{display : 'Receiving Date',name : 'pur_receive_date'}
				],
				sortname : "pur_id",
				sortorder : "desc",
				usepager : true,
				resizable: false,
				title : 'Purchasing',
				useRp : true,
				rp : 15,
				showTableToggleBtn : true,
				// width : 1250,
				height : 1000,
				singleSelect:true
			});
			function action_purchasing(com,grid){
				switch(com){
					case 'Add':
							$.purchasing.clear_fields();
							$("#item_listing_action_header").html("<b>Add New Purchase</b>");
							$("#c_add_save").show();
							$("div.add_purchasing").show();
							$("div.purchasing").hide();
							$("div.add_purchasing").find("#p_mPurDate").mask("9999-99-99");
							$("div.add_purchasing").find("#p_mRecDate").mask("9999-99-99");
							$.purchasing.cancel_save();
							$.purchasing.add_save();
						break;
					case 'Edit':
							if($('.trSelected',grid).length>0){
								$.purchasing.clear_fields();
								$("#item_listing_action_header").html("<b>Update Purchasing</b>");
								$("#c_update_save").show();
								$("div.add_purchasing").show();
								$("div.purchasing").hide();
								var purr = $('.trSelected',grid);
								var purr_id = purr[0].id.substr(3);
								var purrid = purr[0].id;
								
								$("#p_mName").val($("#"+purrid).find("td").eq(1).text());
								$("#p_mDesc").val($("#"+purrid).find("td").eq(2).text());
								// $("#p_mSupplier").val($("#"+purrid).find("td").eq(3).text());
								$("#p_mQuant").val($("#"+purrid).find("td").eq(6).text());
								$("#p_mPurDate").val($("#"+purrid).find("td").eq(8).text());
								$("#p_mRecDate").val($("#"+purrid).find("td").eq(9).text());
								$("#p_mPrice").val($("#"+purrid).find("td").eq(5).text().replace(/[^0-9$.,]/g, ''));
								$.ajax({
									type:'POST',
									url:'action/fill_purchasing.php',
									data:{purr_id  : purr_id},
									dataType:'json',
									success:function(d){
										if (d.e) {
											$('#p_mName').val(d.pur_id);
											$("#p_mSupplier").val(d.sname);
											$("#a_pdimage").attr('src','images/' +d.item_photo);	
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
							$.purchasing.cancel_save();
							$.purchasing.update_save(purr_id);
						break;
					case 'Delete':
							if($('.trSelected',grid).length>0){
								var purr = $('.trSelected',grid);
								var purr_id = purr[0].id.substr(3);
								var ans = confirm('Delete ' + $('.trSelected', grid).length + ' data?');
								if(ans){
									$.ajax({
										type:'POST',
										url:'action/delete_purchase.php',
										data:{purr_id:purr_id},
										dataType:'json',
										success:function(d){
											if(d.e){
												alert(d.m);
												$("#tbl_purchasing").flexReload();
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
		update_save:function(purr_id){
			$("div.mws-button-row").find('#c_update_save').unbind('click').click(function(){
				var p_mName 	= $("#p_mName").val();
				var p_mDesc 	= $("#p_mDesc").val();
				var p_mSupplier = $("#p_mSupplier").val();
				var p_mPrice 	= $("#p_mPrice").val();
				var p_mQuant 	= $("#p_mQuant").val();
				var p_mPurDate 	= $("#p_mPurDate").val();
				var p_mRecDate 	= $("#p_mRecDate").val();
				
				var pPhoto = 'no_image.jpg';
				
				if(p_mName.length < 1 || p_mPrice.length < 1 || p_mQuant.length < 1){
					alert('Please fill up all required fields.');
				}else{
					$.ajax({
						type:'POST',
						url:'action/update_purchase.php',
						data:{
							purr_id  	: purr_id,
							p_mName  	: p_mName,
							p_mDesc   	: p_mDesc,
							p_mSupplier	: p_mSupplier,
							p_mPrice	: p_mPrice,
							p_mQuant	: p_mQuant,
							p_mPurDate	: p_mPurDate,
							p_mRecDate	: p_mRecDate,
							pPhoto		: pPhoto
						},
						dataType:'json',
						success:function(d){
							if (d.e) {
								alert(d.m);
								$("div.add_purchasing").hide();
								$("div.purchasing").show();
								$("#tbl_purchasing").flexReload();
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
			$("#p_mName").val("");
			$("#p_mDesc").val("");
			$("#p_mSupplier").val("");
			$("#p_mPrice").val("");
			$("#p_mQuant").val("");
			$("#p_mPurDate").val("");
			$("#p_mRecDate").val("");
			$("#c_update_save").hide();
			$("#c_add_save").hide();
		},
		cancel_save:function(){
			$("div.mws-button-row").find('#c_cancel_save').unbind('click').click(function(){
				$("div.add_purchasing").hide();
				$("div.purchasing").show();
				$("#c_add_save").hide();
				$("#c_update_save").hide();
			});
		},
		add_save:function(){
			$("div.mws-button-row").find('#c_add_save').unbind('click').click(function(){
				var p_mName 	= $("#p_mName").val();
				var p_mDesc 	= $("#p_mDesc").val();
				var p_mSupplier = $("#p_mSupplier").val();
				var p_mPrice 	= $("#p_mPrice").val();
				var p_mQuant 	= $("#p_mQuant").val();
				var p_mPurDate 	= $("#p_mPurDate").val();
				var p_mRecDate 	= $("#p_mRecDate").val();
				
				var pPhoto = 'no_image.jpg';
				
				if(p_mName.length < 1 || p_mPrice.length < 1 || p_mQuant.length < 1){
					alert('Please fill up all required fields.');
				}else{
					$.ajax({
						type:'POST',
						url:'action/add_purchase.php',
						data:{
							p_mName  	: p_mName,
							p_mDesc   	: p_mDesc,
							p_mSupplier	: p_mSupplier,
							p_mPrice	: p_mPrice,
							p_mQuant	: p_mQuant,
							p_mPurDate	: p_mPurDate,
							p_mRecDate	: p_mRecDate,
							pPhoto		: pPhoto
						},
						dataType:'json',
						success:function(d){
							if (d.e) {
								alert(d.m);
								$("div.add_purchasing").hide();
								$("div.purchasing").show();
								$("#tbl_purchasing").flexReload();
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
		onSelectItem: function(){
			var item = $('#p_mName').val();
			console.log(item);
			if(item != ''){
				$.ajax({
					type:'POST',
					url:'action/fill_item.php',
					data:{item_id:item},
					dataType:'json',
					success:function(d){
						if(d.e){
							//$("#tbl_purchasing").flexReload();
							$('#a_pdimage').attr('src','images/' + d.item_photo);
						}
					},
					error: function() {
						alert("Something's wrong. We'll try to fix this later.");
					}
				});
			}
		}
	}
})(jQuery);
jQuery(document).ready(function(){ jQuery.purchasing.init(); });