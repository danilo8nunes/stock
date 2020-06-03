/**
 * Controle do menu. Iniciando uma seção com o menu aberto
 */
$(function(){
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
	
	$('#confirm-delete').on('show.bs.modal', function(e) {
		$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
	});

	
	
	$(".mask-date").mask('00/00/0000');
    $(".mask-datetime").mask('00/00/0000 00:00');
    $(".mask-tel").mask("(00) 00000-0000");
    $(".mask-cep").mask("00.000-000");
    $(".mask-month").mask('00/0000', {reverse: true});
    $(".mask-doc").mask('000.000.000-00', {reverse: true});
    $(".mask-card").mask('0000  0000  0000  0000', {reverse: true});
    $(".mask-money").mask('000.000.000.000.000,00', {reverse: true, placeholder: "0,00"});
});