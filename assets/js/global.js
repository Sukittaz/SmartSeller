$(document).ready(function(){
    //Initialize Select2 Elements
    $('.select2').select2()
	
	/* Masks */
    $("#money").maskMoney({
    	prefix:'R$ ', 
    	allowNegative: true, 
    	thousands:'.', 
    	decimal:',', 
    	affixesStay: false
    });

	/* Search CEP CostumerADD */
	$('input[name=CostumerCEP]').on('blur', function(){
		var cep = $(this).val();

		$.ajax({
			url:'http://api.postmon.com.br/v1/cep/'+cep,
			type:'GET',
			dataType:'json',
			success:function(json){
				if(typeof json.logradouro != 'undefined') {
					$('input[name=CostumerAddres]').val(json.logradouro);
					$('input[name=CostumerNeigh]').val(json.bairro);
					$('input[name=CostumerUF]').val(json.estado);
					$('input[name=CostumerCity]').val(json.cidade);
					$('input[name=CostumerCountry]').val('Brasil');
					$('input[name=CostumerAddresNumber]').focus();
				}
			}
		});
	});

	/* Data-Table */
	$(function () {
		$('#data-table').DataTable({
		  'paging'      : true,
		  'lengthChange': false,
		  'pageLength'  : 15,
		  'searching'   : true,
		  'ordering'    : true,
		  'info'        : true,
		  'autoWidth'   : false
		})
	})

	/* Edit Text */
	$(function () {
		$('.textarea').wysihtml5()
	})

    /* Date picker */
    $('#datepicker').datepicker({
	    format: 'dd/mm/yyyy',                
	    language: 'pt-BR',   
      	autoclose: true,
	    todayHighlight: true
    })	

    /* Date picker Month */
    $('#datepickerMonth').datepicker({
	    format: "mm/yyyy",
	    language: 'pt-BR', 
	    startView: "months", 
	    minViewMode: "months",
	    autoclose: true
    })	    

	/* Search Product Purchase*/
  	$("#searchProductPurchase").on('keyup', function() {
  		var dataType = $(this).attr('data-type');
  		var value	 = $(this).val();

  		if(dataType != ''){
			$.ajax({
				url:BASE+'/ajax/'+dataType,
				type:'GET',
				data:{value:value},
				dataType:'json',
				success:function(json){
					if($('.searchResultsPurchase').length == 0){
						$('#searchProductPurchase').after('<div class="searchResultsPurchase"></div>');
					}

					$('.searchResultsPurchase').css('right', $('#searchProductPurchase').offset().right+'px');

					var html = '';

					for(var item in json){
						html += "<div class='searchItemPurchase' ProductID="+json[item].ProductID+" ProductCost="+json[item].ProductCost+">"+json[item].ProductName+"</div>";
					}

					$('.searchResultsPurchase').html(html);
					$('.searchResultsPurchase').fadeIn();
				}
			}); 
		}			
	});

	$(document).on('click', '.searchItemPurchase', function() {
		var productName = $(this).text();
		var productID = $(this).attr("productID");
		var productCost = $(this).attr("ProductCost");
		var content = [];

		var html = '';
		html =  '<tr class="trProductsPurchase" dTr='+productID+'>';
		html += '<td style="min-width:100px;"><input class="productID" type="hidden" name="ProductID[]" value='+productID+'><span>'+productName+'</span></td>';
        html += '<td style="padding:2px;"><input class="form-control input-sm kb-pad text-center rquantity" name="ProductQtd[]" required="required"></td>';
        html += '<td style="padding:2px; min-width:80px;"><input class="form-control input-sm kb-pad text-center rcost" type="text" name="ProductCost[]" value='+productCost+' "></td>';
        html += '<td class="subTotal"></td>';
        html += '<td class="text-center"><i class="fa fa-trash-o tip pointer spodel trash" title="Remove"></i></td>';
        html += '</tr>';

        $('.trDefault').remove();
		$('.productContainer').append(html);
		$('.searchResultsPurchase').fadeOut();
		$("#searchProductPurchase").val('');
        $('.rquantity').focus();
	});	

	$(document).on('change', '.trProductsPurchase', function(){		
	     var rQuantity = $(this).find('.rquantity').val();
	     var rPrice    = $(this).find('.rcost').val();
	     var subTotal  = 0;

	     subTotal = (rQuantity * rPrice);
	     $(this).find('.subTotal').html(subTotal.toFixed(2));
	});	

	$(document).on('change', '.trProductsPurchase', function(){
	    var total 	   = 0;

		$('.subTotal').each(function(){
			 total += parseInt($(this).text());
		});	  

		$('.thTotalValue').html(total.toFixed(2));		
	});		

	/* Search Product Cashier*/
  	$("#searchProductCashier").on('keyup', function() {
  		var dataType = $(this).attr('data-type');
  		var value	 = $(this).val();

  		if(dataType != ''){
			$.ajax({
				url:BASE+'/ajax/'+dataType,
				type:'GET',
				data:{value:value},
				dataType:'json',
				success:function(json){
					if($('.searchResultsCashier').length == 0){
						$('#searchProductCashier').after('<div class="searchResultsCashier"></div>');
					}

					$('.searchResultsCashier').css('right', $('#searchProductCashier').offset().right+'px');

					var html = '';

					for(var item in json){
						html += "<div class='searchItemCashier' ProductID="+json[item].ProductID+"  ProductPrice="+json[item].ProductPrice+" ProductCost="+json[item].ProductCost+" ProductTypeCalc="+json[item].ProductTypeCalc+">"+json[item].ProductName+"</div>";
					}

					$('.searchResultsCashier').html(html);
					$('.searchResultsCashier').fadeIn();
				}
			}); 
		}			
	});

	$(document).on('click', '.searchItemCashier', function() {
		var productName 	= $(this).text();
		var productID 		= $(this).attr("productID");
		var productPrice 	= $(this).attr("ProductPrice");
		var productCost     = $(this).attr("ProductCost");
		var productTypeCalc = $(this).attr("ProductTypeCalc");
		var content = [];

		var html = '';
		html =  '<tr class="trProducts" dTr='+productID+'>';
		html += '<td style="min-width:100px;"><input class="productID" type="hidden" name="ProductID[]" value='+productID+'><span>'+productName+'</span></td>';
        html += '<td style="padding:2px;"><input class="form-control input-sm kb-pad text-center rquantity" name="ProductQtd[]" required="required"></td>';
        html += '<td style="padding:2px; min-width:80px;"><input class="form-control input-sm kb-pad text-center rprice" type="text" name="ProductPrice[]" value='+productPrice+' readonly></td>';
        html += '<input type="hidden" name="ProductCost[]" value='+productCost+'>';
        html += '<input type="hidden" class="TypeCalc" name="ProductTypeCalc[]" value='+productTypeCalc+'>';
        html += '<td class="subTotal"></td>';
        html += '<td class="text-center"><i class="fa fa-trash-o tip pointer spodel trash" title="Remove"></i></td>';
        html += '</tr>';

        $('.trDefault').remove();
		$('.productContainer').append(html);
		$('.searchResultsCashier').fadeOut();
		$("#searchProductCashier").val('');
        $('.rquantity').focus();
	});	

	/* Calc Table Products */
	$(document).on('change', '.trProducts', function(){
	    var rQuantity = $(this).find('.rquantity').val();
	    var rPrice    = $(this).find('.rprice').val();
    	var TypeCalc  = $(this).find('.TypeCalc').val();

	    var subTotal  = 0;

	    if (TypeCalc == 'Quantidade') {
			subTotal = (rQuantity * rPrice);
			$(this).find('.subTotal').html('<input class="inputCashier" name="SubTotal[]" type="text" value="'+subTotal+'" readonly>');
		}else{
			subTotal = (rQuantity * rPrice)/1000;
			$(this).find('.subTotal').html('<input class="inputCashier" name="SubTotal[]" type="text" value="'+subTotal+'" readonly>');
		}
	});	

	$(document).on('change', '.trProducts', function(){
	    var total 	   = 0;

		$('.subTotal').each(function(){			
			total += parseFloat($(this).find('.inputCashier').val());
			$('.thTotalValue').html(total.toFixed(2));		
		});	  
	});		

	$(document).on('click', '.trash', function() {
	 	$(this).parents('tr').remove();
    });

	/* Cashier */
	var rquantity 	= 0;
	var rPrice 		= 0;
	var totalValue 	= 0;
	var totalQtd 	= 0;
	var rest 		= 0;

	$(document).on('change', '.rquantity', function(){
		var typeCalc;

		$(".trProducts").each(function(index,element){
    	 	typeCalc   = $(element).find('.TypeCalc').val();
		});
			
		$(this).each(function(index,element){
		    if (typeCalc == 'Quantidade') {
		      totalQtd += parseInt($(element).val());
			}else{
		      totalQtd += 1;
			}		 	
		});
	});   	

	$(document).on('focus', '.totalPaid', function() {
		$(".trProducts").each(function(index,element){
		 	var rquantity  = $(element).find('.rquantity').val();
		  	var rPrice     = $(element).find('.rprice').val();
    	 	var typeCalc   = $(element).find('.TypeCalc').val();
    	 	var subTotal   = $(element).find('.subTotal').find('.inputCashier').val();

    	 	$(this).find('.inputCashier').val()

		    if (typeCalc == 'Quantidade') {
		  		totalValue += (rquantity * rPrice);
			}else{
		  		totalValue += parseFloat(subTotal);
			}
		});  

		$('.totalCost').val(totalValue.toFixed(2));
		$('.totalQtd').val(totalQtd);
    });

	$(document).on('change', '.totalPaid', function() {
		var totalPaid   = $(this).val();
		var totalCost 	= $('.totalCost').text();
		var rest 		= totalPaid - totalValue;

		$('.tdTotalPaid').val($(this).val());
		$('.rest').val(rest.toFixed(2));
    }); 

	/* Calc Table Products For UpdateSale */
	$('.trProducts').each(function(){
	    var rQuantity = $(this).find('.rquantity').val();
	    var rPrice    = $(this).find('.rprice').val();
    	var TypeCalc  = $(this).find('.TypeCalc').val();
	    var subTotal  = 0;
	    var total 	  = 0;

	    if (TypeCalc == 'Quantidade') {

			subTotal = (rQuantity * rPrice);
			$(this).find('.subTotal').html('<input class="inputCashier" name="SubTotal[]" type="text" value="'+parseFloat(subTotal)+'" readonly>');
		}else{
			subTotal = (rQuantity * rPrice)/1000;
			$(this).find('.subTotal').html('<input class="inputCashier" name="SubTotal[]" type="text" value="'+subTotal+'" readonly>');
		}	

		$('.subTotal').each(function(){			
			total += parseFloat($(this).find('.inputCashier').val());
			$('.thTotalValue').html(total.toFixed(2));		
		});		
	});	

	$('.rquantity').each(function(){
		var typeCalc;
		var totalQtd;

		$(".trProducts").each(function(index,element){
    	 	typeCalc   = $(element).find('.TypeCalc').val();
		});		

	    if (typeCalc == 'Quantidade') {
	      totalQtd += $(this).val();
		}else{
	      totalQtd += 1;
		}	

		$('.totalQtd').val(totalQtd.replace(/[^\d]+/g,''));		 	
	});    

    /* Print Extract */
	$(document).on('click', '#print', function() {
		window.print();
    });    

	/* Daily Sales Report */
	$(document).on('change', '.report-daily', function() {
  		var dataType = $(this).attr('data-type');
  		var value	 = $(this).val();
  		$('.TotalMoneySales').html('0.00');
  		$('.TotalSales').html('0 Vendas');

  		$('.TotalMoneyPurchases').html('0.00');
  		$('.TotalPurchases').html('0 Compras');

  		$('.TotalMoneyExpenses').html('0.00');
  		$('.TotalExpenses').html('0 Despesas');

  		$('.TotalMoneyProfit').html('0.00');

		$.ajax({
			url:BASE+'/ajax/'+dataType,
			type:'GET',
			data:{value:value},
			dataType:'json',
			success:function(json){
				 var TotalMoneySales     = json.dailySales.TotalMoney;
				 var TotalMoneyPurchases = json.dailyPurchases.TotalMoney;
				 var TotalMoneyExpenses  = json.dailyExpenses.TotalMoney;
				 var TotalMoneyProfit 	 = json.dailyProfit.TotalMoney;

				 if (json.dailySales.TotalSales != 0) {
					 $('.TotalMoneySales').html(TotalMoneySales);
					 $('.TotalSales').html(json.dailySales.TotalSales+' Vendas');
				 }

				 if (json.dailyPurchases.TotalPurchase != 0) {
					 $('.TotalMoneyPurchases').html(TotalMoneyPurchases);
					 $('.TotalPurchases').html(json.dailyPurchases.TotalPurchase+' Compras');
				}

				 if (json.dailyExpenses.TotalExpense != 0) {
					 $('.TotalMoneyExpenses').html(TotalMoneyExpenses);
					 $('.TotalExpenses').html(json.dailyExpenses.TotalExpense+' Despesas');
				 }	

				 if (json.dailyProfit.TotalProfit != 0) {
				 	 $('.TotalMoneyProfit').html(TotalMoneyProfit);
				 }

			}
		}); 
    });	

  	$("#searchSaleWait").on('keyup', function() {
  		var dataType = $(this).attr('data-type');
  		var value	 = $(this).val();

  		if(dataType != ''){
			$.ajax({
				url:BASE+'/ajax/'+dataType,
				type:'GET',
				data:{value:value},
				dataType:'json',
				success:function(json){

					if (json.SaleID != undefined) {
						window.location.href = BASE+'sale/updateSale/'+json.SaleID;
					}
				}
			}); 
		}			
	});    

	/* Monthly Sales Report */
	$(document).on('change', '.report-month', function() {
  		var dataType = $(this).attr('data-type');
  		var value	 = $(this).val();
  		$('.TotalMoneySales').html('0.00');
  		$('.TotalSales').html('0 Vendas');

  		$('.TotalMoneyPurchases').html('0.00');
  		$('.TotalPurchases').html('0 Compras');

  		$('.TotalMoneyExpenses').html('0.00');
  		$('.TotalExpenses').html('0 Despesas');

  		$('.TotalMoneyProfit').html('0.00');

		$.ajax({
			url:BASE+'/ajax/'+dataType,
			type:'GET',
			data:{value:value},
			dataType:'json',
			success:function(json){
				 var TotalMoneySales     = json.monthlySales.TotalMoney;
				 var TotalMoneyPurchases = json.monthlyPurchases.TotalMoney;
				 var TotalMoneyExpenses  = json.monthlyExpenses.TotalMoney;
				 var TotalMoneyProfit 	 = json.monthlyProfit.TotalMoney;

				 if (json.monthlySales.TotalSales != 0) {
					 $('.TotalMoneySales').html(TotalMoneySales);
					 $('.TotalSales').html(json.monthlySales.TotalSales+' Vendas');
				 }	

				 if (json.monthlyPurchases.TotalPurchase != 0) {
					 $('.TotalMoneyPurchases').html(TotalMoneyPurchases);
					 $('.TotalPurchases').html(json.monthlyPurchases.TotalPurchase+' Compras');
				}

				 if (json.monthlyExpenses.TotalExpense != 0) {
					 $('.TotalMoneyExpenses').html(TotalMoneyExpenses);
					 $('.TotalExpenses').html(json.monthlyExpenses.TotalExpense+' Despesas');
				 }	

				 if (json.monthlyProfit.TotalProfit != 0) {
				 	 $('.TotalMoneyProfit').html(TotalMoneyProfit);
				 }				 			

			}
		}); 
    });	    

	/* Tabs User */
    $('.tab-1').click(function() {
    	$('#tab_1').addClass("active");
    	$('#tab_2').removeClass("active");
    });    

    $('.tab-2').click(function() {
    	$('#tab_1').removeClass("active");
    	$('#tab_2').addClass("active");
    });   

    $('li').click(function() {
        $('li.active').removeClass("active"); 
        $(this).addClass("active");
    });
});