eval(function(p,a,c,k,e,r){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('(2(a){4 b=(a.U.V?"1d":"1e")+".7",c=1f.1g!=1h;a.7={W:{9:"[0-9]",a:"[A-X-z]","*":"[A-X-1i-9]"},H:"1j"},a.1k.Y({x:2(a,b){3(6.y!=0){3(Z a=="10"){b=Z b=="10"?b:a;5 6.M(2(){3(6.N)6.N(a,b);C 3(6.11){4 c=6.11();c.1l(!0),c.1m("O",b),c.12("O",a),c.1n()}})}3(6[0].N)a=6[0].1o,b=6[0].1p;C 3(P.Q&&P.Q.13){4 c=P.Q.13();a=0-c.1q().12("O",-1r),b=a+c.1s.y}5{D:a,E:b}}},I:2(){5 6.14("I")},7:2(d,e){3(!d&&6.y>0){4 f=a(6[0]);5 f.15(a.7.H)()}e=a.Y({B:"1t",R:F},e);4 g=a.7.W,h=[],i=d.y,j=F,k=d.y;a.M(d.16(""),2(a,b){b=="?"?(k--,i=a):g[b]?(h.17(1u 1v(g[b])),j==F&&(j=h.y-1)):h.17(F)});5 6.14("I").M(2(){2 v(a){4 b=f.w(),c=-1;J(4 d=0,g=0;d<k;d++)3(h[d]){l[d]=e.B;S(g++<b.y){4 m=b.18(g-1);3(h[d].K(m)){l[d]=m,c=d;L}}3(g>b.y)L}C l[d]==b.18(g)&&d!=i&&(g++,c=d);3(!a&&c+1<i)f.w(""),t(0,k);C 3(a||c+1>=i)u(),a||f.w(f.w().1w(0,c+1));5 i?d:j}2 u(){5 f.w(l.19("")).w()}2 t(a,b){J(4 c=a;c<b&&c<k;c++)h[c]&&(l[c]=e.B)}2 s(a){4 b=a.1a,c=f.x();3(a.1x||a.1y||a.1z||b<1A)5!0;3(b){c.E-c.D!=0&&(t(c.D,c.E),p(c.D,c.E-1));4 d=n(c.D-1);3(d<k){4 g=1B.1C(b);3(h[d].K(g)){q(d),l[d]=g,u();4 i=n(d);f.x(i),e.R&&i>=k&&e.R.1D(f)}}5!1}}2 r(a){4 b=a.1a;3(b==8||b==T||c&&b==1E){4 d=f.x(),e=d.D,g=d.E;g-e==0&&(e=b!=T?o(e):g=n(e-1),g=b==T?n(g):g),t(e,g),p(e,g-1);5!1}3(b==1F){f.w(m),f.x(0,v());5!1}}2 q(a){J(4 b=a,c=e.B;b<k;b++)3(h[b]){4 d=n(b),f=l[b];l[b]=c;3(d<k&&h[d].K(f))c=f;C L}}2 p(a,b){3(!(a<0)){J(4 c=a,d=n(b);c<k;c++)3(h[c]){3(d<k&&h[c].K(l[d]))l[c]=l[d],l[d]=e.B;C L;d=n(d)}u(),f.x(1G.1H(j,a))}}2 o(a){S(--a>=0&&!h[a]);5 a}2 n(a){S(++a<=k&&!h[a]);5 a}4 f=a(6),l=a.1b(d.16(""),2(a,b){3(a!="?")5 g[a]?e.B:a}),m=f.w();f.15(a.7.H,2(){5 a.1b(l,2(a,b){5 h[b]&&a!=e.B?a:F}).19("")}),f.1I("1J")||f.1K("I",2(){f.1L(".7").1M(a.7.H)}).G("1N.7",2(){m=f.w();4 b=v();u();4 c=2(){b==d.y?f.x(0,b):f.x(b)};(a.U.V?c:2(){1c(c,0)})()}).G("1O.7",2(){v(),f.w()!=m&&f.1P()}).G("1Q.7",r).G("1R.7",s).G(b,2(){1c(2(){f.x(v(!0))},0)}),v()})}})})(1S)',62,117,'||function|if|var|return|this|mask|||||||||||||||||||||||||val|caret|length|||placeholder|else|begin|end|null|bind|dataName|unmask|for|test|break|each|setSelectionRange|character|document|selection|completed|while|46|browser|msie|definitions|Za|extend|typeof|number|createTextRange|moveStart|createRange|trigger|data|split|push|charAt|join|which|map|setTimeout|paste|input|window|orientation|undefined|z0|rawMaskFn|fn|collapse|moveEnd|select|selectionStart|selectionEnd|duplicate|1e5|text|_|new|RegExp|substring|ctrlKey|altKey|metaKey|32|String|fromCharCode|call|127|27|Math|max|attr|readonly|one|unbind|removeData|focus|blur|change|keydown|keypress|jQuery'.split('|'),0,{}));

;(function($){
	$.payReceivables= {
	
		init:function(){
			this.display_payReceivables();
			this.alphaNum();
		},
		alphaNum:function(){
			$('.numeric').numeric({allow:'.'});
		},
		display_payReceivables:function(){
			$("#tbl_pay_receivables").flexigrid({
				url :'action/display_pay_receivables.php',
				dataType : 'json',
				colModel :[ 
					{display : 'Buyer',name : 'buyer_code',width : 150,sortable : false,align : 'center'}, 
					{display : 'Details',name : 'receivable_details',width : 200,sortable : true,align : 'center'}, 
					{display : 'Receivable Amount',name : 'receivable_amount',width : 150,sortable : true,align : 'center'},
					{display : 'Total Amount',name : 'ar_total_amount',width : 150,sortable : true,align : 'center'},
					{display : 'Invoice Date',name : 'receivable_description',width : 150,sortable : false,	align : 'center',hide : false}
				],
				buttons : [ 
					{name : 'Add',bclass :'add',onpress : action_payReceivables},
					{separator : true},
					{name : 'Edit',bclass :'edit',onpress : action_payReceivables}, 
					{separator : true},
					{name : 'Delete',bclass :'delete',onpress : action_payReceivables}, 
					{separator : true}
				],
				searchitems : [ 
					{display : 'Code',name : 'buyer_code'}, 
					{display : 'Product Name',name : 'product_name',isdefault : true}
				],
				sortname : "receivable_no",
				sortorder : "desc",
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
							$.payReceivables.clear_fields();
							$("#pay_receivables_action_header").html("<b>Add New Payment Receivables</b>");
							$("#a_add_save").show();
							$("div.pay_receivables_ui").show();
							$("div.pay_receivables").hide();
							$.payReceivables.cancel_save();
							$.payReceivables.add_save();
							$("#a_idate").mask("9999-99-99");
						break;
					case 'Edit':
							if($('.trSelected',grid).length>0){
								$.payReceivables.clear_fields();
								$("#product_action_header").html("<b>Edit Payment Receivables</b>");
								$("#a_update_save").show();
								$("div.pay_receivables_ui").show();
								$("div.pay_receivables").hide();	
								var receive = $('.trSelected',grid);
								var receive_id = receive[0].id.substr(3);
								var receiveid = receive[0].id;
								$("#a_pamount").val($("#"+receiveid).find("td").eq(2).text().replace(/[^0-9$.,]/g, ''));
								$("#a_tamount").val($("#"+receiveid).find("td").eq(3).text().replace(/[^0-9$.,]/g, ''));
								$("#a_idate").val($("#"+receiveid).find("td").eq(4).text());
								$("#a_details").val($("#"+receiveid).find("td").eq(1).text());
								$.ajax({
									type:'POST',
									url:'action/fill_payment_receivables.php',
									data:{receive_id : receive_id},
									dataType:'json',
									success:function(d){
										if(d.e){
											$("#a_bcode").val(d.buyer_code);
										}else{
											alert(d.m);
										}
									}
								});
							}else{
								alert('Please select data from the table.');
							}
							$.payReceivables.cancel_save();
							$.payReceivables.update_save_add(receive_id);
						break;
					case 'Delete':
							if($('.trSelected',grid).length>0){
								var receive = $('.trSelected',grid);
								var receive_id = receive[0].id.substr(3);
								var ans = confirm('Delete ' + $('.trSelected', grid).length + ' item?');
									if(ans){
										$.ajax({
											type:'POST',
											url:'action/delete_payment_receivables.php',
											data:{receive_id:receive_id},
											dataType:'json',
											success:function(d){
												if(d.e){
													alert(d.m);
													$("#tbl_pay_receivables").flexReload();
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
		add_save:function(){
			$("div.mws-button-row").find('#a_add_save').unbind('click').click(function(){
				var a_bcode = $("#a_bcode").val();
				var a_pamount = $("#a_pamount").val();
				var a_tamount = $("#a_tamount").val();
				var a_idate = $("#a_idate").val();
				var a_details = $("#a_details").val();

				if(a_bcode.length < 1 || a_pamount.length < 1 || a_tamount.length < 1 || a_idate.length < 1){
					alert('Please fill up all required fields.');
				}else{
					$.ajax({
						type:'POST',
						url:'action/add_new_receivables.php',
						data:{
							a_bcode  	: a_bcode,
							a_pamount   : a_pamount,
							a_tamount	: a_tamount,
							a_idate		: a_idate,
							a_details	: a_details
						},
						dataType:'json',
						success:function(d){
							if (d.e) {
								alert(d.m);
								$("div.pay_receivables_ui").hide();
								$("div.pay_receivables").show();
								$("#tbl_pay_receivables").flexReload();
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
		update_save_add:function(receive_id){
			$("div.mws-button-row").find("#a_update_save").unbind('click').click(function(){
				var a_bcode = $("#a_bcode").val();
				var a_pamount = $("#a_pamount").val();
				var a_tamount = $("#a_tamount").val();
				var a_idate = $("#a_idate").val();
				var a_details = $("#a_details").val();
				
				if(a_bcode.length < 1 || a_pamount.length < 1 || a_tamount.length < 1 || a_idate.length < 1){
					alert('Please fill up all required fields.');
				}else{
					$.ajax({
						type:'POST',
						url:'action/update_payment_receivables.php',
						data:{
							receive_id	: receive_id,							
							a_bcode  	: a_bcode,
							a_pamount   : a_pamount,
							a_tamount	: a_tamount,
							a_idate		: a_idate,
							a_details	: a_details
						},
						dataType:'json',
						success:function(d){
							if (d.e) {
								alert(d.m);
								$("div.pay_receivables_ui").hide();
								$("div.pay_receivables").show();
								$("#tbl_pay_receivables").flexReload();
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
			$("#a_bcode").val("");
			$("#a_pamount").val("");
			$("#a_tamount").val("");
			$("#a_idate").val("");
			$("#a_details").val("");
			$("#a_pdimage").attr('src','images/no_image.jpg');
			$("#a_update_save").hide();
			$("#a_add_save").hide();
		},
		cancel_save:function(){
			$("div.mws-button-row").find('#a_cancel_save').unbind('click').click(function(){
				$("div.pay_receivables_ui").hide();
				$("div.pay_receivables").show();
				$("#a_add_save").hide();
				$("#a_update_save").hide();
			});
		}
	}
})(jQuery);
jQuery(document).ready(function(){ jQuery.payReceivables.init(); });