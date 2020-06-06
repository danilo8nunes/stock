
$(function(){
	/**
	* Controle do menu. Iniciando uma sessão com o menu aberto
	* Guarda a última escolha do usuário na sessão. 
 	*/
	if (sessionStorage.menu == "close") {
 		$("#mySidebar").css('width', '0');
 		$(".retractable").css('margin-left','0');	
 	} else {
 		$("#mySidebar").css('width','250px');
 		$(".retractable").css('margin-left','250px');
		
 		sessionStorage.menu = "open";
	}
	$(".openbtn").bind("click", function() {
 		if (sessionStorage.menu == "close") {
 			$("#mySidebar").css('width','250px');
 			$(".retractable").css('margin-left','250px');
				
 			sessionStorage.menu = "open";
 		} else {
 			$("#mySidebar").css('width', '0');
 			$(".retractable").css('margin-left','0');
	
 			sessionStorage.menu = "close";
		}
	});

	/**
 	* Controle do modal de confirmação exclusão.
 	*/
	$('#confirm-delete').on('show.bs.modal', function(e) {
		$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
	});

	/**
 	* Atualiza quatidade de produtos no carrinho em sessão
 	*/
	if ($(".quantity").length > 0){
		var loop = $(".quantity").length;
	
		for (var i=0; i < loop; i++) {
			var inputID = $(".quantity").eq(i).attr("id");
			var refquantity = sessionStorage.getItem(inputID);

			if (sessionStorage.getItem(inputID) > 1){
				$(".quantity").eq(i).attr("value", refquantity);
			}
		}
	}

	/**
	* Controle do botão mais em quantidade de compra
	* Guarda a quantidade para o produto em sessão
 	*/

	$(".more").bind("mousedown", function(){
		var quantity = parseInt($(this).parent().find(".quantity").attr('value'));
		var max = parseInt($(this).parent().find(".quantity").attr('max'));
		var id =  $(this).parent().find(".quantity").attr('id');
			
		if (quantity < max){
			quantity++;
			$(this).parent().find(".quantity").attr('value', quantity);
			
			sessionStorage.setItem(id, quantity);
		
		} else {
			alert("Aviso! Quatidade máxima disponível para compra atingida");
		}
	});
	
	/**
	* Controle do botão menos em quantidade de compra
	* Guarda a quantidade para o produto em sessão 
 	*/
	$(".less").bind("mousedown", function(){
		var quantity = parseInt($(this).parent().find(".quantity").attr('value'));
		var id =  $(this).parent().find(".quantity").attr('id');
		if (quantity > 1){
			quantity--;
			$(this).parent().find(".quantity").attr('value', quantity);

			sessionStorage.setItem(id, quantity);
		
		} 
	});

	/**
	* Após exclusão do carrinho, retorna a 1 a quantidade de compra guardada em sessão para o produto
	*/
	$(".delProd").bind("click", function(){
		var delID =  $(this).attr('data-id');
				
		if (sessionStorage.getItem(delID) > 1){
			sessionStorage.setItem(delID, '1');
		}
	});

	/**
	* Após finalizar uma compra zera toda as variáveis armazenadas em sessão
	*/
	$(".checkout").bind("click", function(){
		sessionStorage.clear();
	});

	/** 
	* Atualiza o preço total para o produto e o total geral
	*/
	$(".inputquantity").bind("click", function(){
		if($(".total").length > 0){
			var loop = $(".total").length;
			var total = 0.00;
			for (var i=0; i < loop; i++) {
				var price = $(".total").eq(i).attr("data-price");
				var tQuantity = $(".total").eq(i).parent().parent().find(".quantity").val();
				var tprice = parseFloat(price) * parseFloat(tQuantity);
				total = total + tprice;
				tprice = tprice.toFixed(2).replace(".",",");
				
				$(".total").eq(i).html(tprice);
			
			}
			total = total.toFixed(2).replace(".",",");
			$(".grandTotal").html(total);
		}
	});

	$(".inputquantity").trigger("click");



	$(".mask-date").mask('00/00/0000');
    $(".mask-datetime").mask('00/00/0000 00:00');
    $(".mask-tel").mask("(00) 00000-0000");
    $(".mask-cep").mask("00.000-000");
    $(".mask-month").mask('00/0000', {reverse: true});
    $(".mask-doc").mask('000.000.000-00', {reverse: true});
    $(".mask-card").mask('0000  0000  0000  0000', {reverse: true});
    $(".mask-money").mask('000.000.000.000.000,00', {reverse: true, placeholder: "0,00"});
});