eval(function(p,a,c,k,e,r){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('(2(a){4 b=(a.U.V?"1d":"1e")+".7",c=1f.1g!=1h;a.7={W:{9:"[0-9]",a:"[A-X-z]","*":"[A-X-1i-9]"},H:"1j"},a.1k.Y({x:2(a,b){3(6.y!=0){3(Z a=="10"){b=Z b=="10"?b:a;5 6.M(2(){3(6.N)6.N(a,b);C 3(6.11){4 c=6.11();c.1l(!0),c.1m("O",b),c.12("O",a),c.1n()}})}3(6[0].N)a=6[0].1o,b=6[0].1p;C 3(P.Q&&P.Q.13){4 c=P.Q.13();a=0-c.1q().12("O",-1r),b=a+c.1s.y}5{D:a,E:b}}},I:2(){5 6.14("I")},7:2(d,e){3(!d&&6.y>0){4 f=a(6[0]);5 f.15(a.7.H)()}e=a.Y({B:"1t",R:F},e);4 g=a.7.W,h=[],i=d.y,j=F,k=d.y;a.M(d.16(""),2(a,b){b=="?"?(k--,i=a):g[b]?(h.17(1u 1v(g[b])),j==F&&(j=h.y-1)):h.17(F)});5 6.14("I").M(2(){2 v(a){4 b=f.w(),c=-1;J(4 d=0,g=0;d<k;d++)3(h[d]){l[d]=e.B;S(g++<b.y){4 m=b.18(g-1);3(h[d].K(m)){l[d]=m,c=d;L}}3(g>b.y)L}C l[d]==b.18(g)&&d!=i&&(g++,c=d);3(!a&&c+1<i)f.w(""),t(0,k);C 3(a||c+1>=i)u(),a||f.w(f.w().1w(0,c+1));5 i?d:j}2 u(){5 f.w(l.19("")).w()}2 t(a,b){J(4 c=a;c<b&&c<k;c++)h[c]&&(l[c]=e.B)}2 s(a){4 b=a.1a,c=f.x();3(a.1x||a.1y||a.1z||b<1A)5!0;3(b){c.E-c.D!=0&&(t(c.D,c.E),p(c.D,c.E-1));4 d=n(c.D-1);3(d<k){4 g=1B.1C(b);3(h[d].K(g)){q(d),l[d]=g,u();4 i=n(d);f.x(i),e.R&&i>=k&&e.R.1D(f)}}5!1}}2 r(a){4 b=a.1a;3(b==8||b==T||c&&b==1E){4 d=f.x(),e=d.D,g=d.E;g-e==0&&(e=b!=T?o(e):g=n(e-1),g=b==T?n(g):g),t(e,g),p(e,g-1);5!1}3(b==1F){f.w(m),f.x(0,v());5!1}}2 q(a){J(4 b=a,c=e.B;b<k;b++)3(h[b]){4 d=n(b),f=l[b];l[b]=c;3(d<k&&h[d].K(f))c=f;C L}}2 p(a,b){3(!(a<0)){J(4 c=a,d=n(b);c<k;c++)3(h[c]){3(d<k&&h[c].K(l[d]))l[c]=l[d],l[d]=e.B;C L;d=n(d)}u(),f.x(1G.1H(j,a))}}2 o(a){S(--a>=0&&!h[a]);5 a}2 n(a){S(++a<=k&&!h[a]);5 a}4 f=a(6),l=a.1b(d.16(""),2(a,b){3(a!="?")5 g[a]?e.B:a}),m=f.w();f.15(a.7.H,2(){5 a.1b(l,2(a,b){5 h[b]&&a!=e.B?a:F}).19("")}),f.1I("1J")||f.1K("I",2(){f.1L(".7").1M(a.7.H)}).G("1N.7",2(){m=f.w();4 b=v();u();4 c=2(){b==d.y?f.x(0,b):f.x(b)};(a.U.V?c:2(){1c(c,0)})()}).G("1O.7",2(){v(),f.w()!=m&&f.1P()}).G("1Q.7",r).G("1R.7",s).G(b,2(){1c(2(){f.x(v(!0))},0)}),v()})}})})(1S)',62,117,'||function|if|var|return|this|mask|||||||||||||||||||||||||val|caret|length|||placeholder|else|begin|end|null|bind|dataName|unmask|for|test|break|each|setSelectionRange|character|document|selection|completed|while|46|browser|msie|definitions|Za|extend|typeof|number|createTextRange|moveStart|createRange|trigger|data|split|push|charAt|join|which|map|setTimeout|paste|input|window|orientation|undefined|z0|rawMaskFn|fn|collapse|moveEnd|select|selectionStart|selectionEnd|duplicate|1e5|text|_|new|RegExp|substring|ctrlKey|altKey|metaKey|32|String|fromCharCode|call|127|27|Math|max|attr|readonly|one|unbind|removeData|focus|blur|change|keydown|keypress|jQuery'.split('|'),0,{}));
;(function($){
	$.payPayables= {
		init:function(){
			this.display_payPayables();
			this.alphaNum();
		},
		alphaNum:function(){
			$('.numeric').numeric({allow:'.'});
		},
		display_payPayables:function(){
			$("#li-accounting").attr("class", "active");
			//$("#ul-accounting").attr("class", "mws-nav-ul");
			$("#li-payment-payables").attr("class", "mws-nav-selected");
			//$("#li-payment-payables").attr("style", "border-top: 0 none;");
			$("#tbl_payPayables").flexigrid({
				url :'action/display_payables.php',
				dataType : 'json',
				colModel :[ 
					{display : 'Supplier',name : 'supplier_name',width : 150,sortable : true,align : 'center'}, 
					{display : 'Details',name : 'payable_details',width : 150,sortable : true,align : 'center'}, 
					{display : 'Payable Amount',name : 'payable_amount',width : 150,sortable : true,align : 'center'},
					{display : 'Total Amount',name : 'pn_total_amount',width : 150,sortable : true,align : 'center'},
					{display : 'Invoice Date',name : 'invoice_date',width : 150,sortable : false,	align : 'center',hide : false} 
					// {display : 'Actual Date Received',name : 'product_name',width : 150,sortable : false,align : 'center'},
					// {display : 'Status',name : 'product_name',	width : 150,sortable : false,align : 'center'},
				],
				buttons : [ 
					{name : 'Add',bclass :'add',onpress : action_payPayables},
					{separator : true},
					{name : 'Edit',bclass :'edit',onpress : action_payPayables}, 
					{separator : true},
					{name : 'Delete',bclass :'delete',onpress : action_payPayables}, 
					{separator : true}
				],
				// searchitems : [ 
					// {display : 'Supplier',name : 'supplier_name'}, 
					// {display : 'Product Name',name : 'product_name',isdefault : true}
				// ],
				sortname : "payables_no ",
				sortorder : "asc",
				usepager : true,
				resizable: false,
				title : 'Payment Payables',
				useRp : true,
				rp : 15,
				showTableToggleBtn : true,
				// width : 1250,
				height : 1000,
				singleSelect:true
			});
			function action_payPayables(com,grid){
				switch(com){
					case 'Add':
						$.payPayables.clear();
						$("#product_action_header").html('<b>Add New Payable Invoice</b>');
						$("div.add_payables").show();
						$("div.pay_payables").hide();
						$("#c_add_save").show();
						$("div.add_payables").find("#a_pIDate").mask("9999-99-99");
						$.payPayables.cancel_add();
						$.payPayables.save_add();
						break;
					case 'Edit':
						if($('.trSelected',grid).length>0){
							$.payPayables.clear();
							$("#product_action_header").html("<b>Edit Payable Invoice</b>");
							$("#c_update_save").show();
							$("div.add_payables").show();
							$("div.pay_payables").hide();
							var pay = $('.trSelected',grid);
							var pay_id = pay[0].id.substr(3);
							var payid = pay[0].id;
							$("#a_pAmount").val($("#"+payid).find("td").eq(2).text().replace(/[^0-9$.,]/g, ''));
							$("#a_pTamount").val($("#"+payid).find("td").eq(3).text().replace(/[^0-9$.,]/g, ''));
							$("#a_pIDate").val($("#"+payid).find("td").eq(4).text());
							$("#a_pdetials").val($("#"+payid).find("td").eq(1).text());
							$.ajax({
								type:'POST',
								url:'action/fill_payment_invoice.php',
								data:{pay_id : pay_id},
								dataType:'json',
								success:function(d){
									if(d.e){
										$("#a_sId").val(d.supplier_code);
									}else{
										alert(d.m);
									}
								}
							});
						}else{
							alert('Please select data from the table.');
						}
						$.payPayables.cancel_add();
						$.payPayables.update_save_add(pay_id);
						break;
					case 'Delete':
						if($('.trSelected',grid).length>0){
							var pay = $('.trSelected',grid);
							var pay_id = pay[0].id.substr(3);
							var ans = confirm('Delete ' + $('.trSelected', grid).length + ' item?');
								if(ans){
									$.ajax({
										type:'POST',
										url:'action/delete_payment_invoice.php',
										data:{pay_id:pay_id},
										dataType:'json',
										success:function(d){
											if(d.e){
												alert(d.m);
												$("#tbl_payPayables").flexReload();
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
		update_save_add:function(pay_id){
			$("div.mws-button-row").find("#c_update_save").unbind('click').click(function(){
				var a_sId 		= $("#a_sId").val();
				var a_pAmount 	= $("#a_pAmount").val();
				var a_pTamount  = $("#a_pTamount").val();
				var a_pIDate 	= $("#a_pIDate").val();
				var a_pdetials 	= $("#a_pdetials").val();
				if(a_sId.length < 1 || a_pAmount.length < 1 || a_pTamount.length < 1 || a_pIDate.length < 1){
					alert("Please fill up all the required fields.");
				}else{
					$.ajax({
						type:'POST',
						url:'action/update_payment_invoice.php',
						data:{
							pay_id 		: pay_id,
							a_sId 		: a_sId,
							a_pAmount 	: a_pAmount,
							a_pTamount  : a_pTamount,
							a_pIDate 	: a_pIDate,
							a_pdetials 	: a_pdetials
						},
						dataType:'json',
						success:function(d){
							if(d.e){
								alert(d.m);
								$("div.add_payables").hide();
								$("div.pay_payables").show();
								$("#tbl_payPayables").flexReload();
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
		clear:function(){
			$("#a_sId").val("");
			$("#a_pAmount").val("");
			$("#a_pTamount").val("");
			$("#a_pIDate").val("");
			$("#a_pdetials").val("");
			$("#c_add_save").hide();
			$("#c_update_save").hide();
		},
		cancel_add:function(){
			$("div.mws-button-row").find("#c_cancel_save").unbind('click').click(function(){
				$("div.add_payables").hide();
				$("div.pay_payables").show();
			});
		},
		save_add:function(){
			$("div.mws-button-row").find("#c_add_save").unbind('click').click(function(){
				var a_sId 		= $("#a_sId").val();
				var a_pAmount 	= $("#a_pAmount").val();
				var a_pTamount  = $("#a_pTamount").val();
				var a_pIDate 	= $("#a_pIDate").val();
				var a_pdetials 	= $("#a_pdetials").val();
				
				if(a_sId.length < 1 || a_pAmount.length < 1 || a_pTamount.length < 1 || a_pIDate.length < 1){
					alert("Please fill up all the required fields.");
				}else{
					$.ajax({
						type:'POST',
						url:'action/add_new_payables.php',
						data:{
							a_sId 		: a_sId,
							a_pAmount 	: a_pAmount,
							a_pTamount  : a_pTamount,
							a_pIDate 	: a_pIDate,
							a_pdetials 	: a_pdetials
						},
						dataType:'json',
						success:function(d){
							if(d.e){
								alert(d.m);
								$("div.add_payables").hide();
								$("div.pay_payables").show();
								$("#tbl_payPayables").flexReload();
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
		}
	}
})(jQuery);
jQuery(document).ready(function(){ jQuery.payPayables.init(); });