
$(function(){
	if ($(window).width() > 810){
		
		$("#mySidebar").css('width', '250px');
		$(".retractable").css('margin-left', '250px');
		
		var i=1;
	
	} else {
		var i = 0;
	}

	$('.openbtn').bind("click", function(){
		if ($(window).width() > 810){	
			if (i == 0){
				$("#mySidebar").css('width','250px');
				$(".retractable").css('margin-left','250px');
				
				i = 1;

			} else{
				$("#mySidebar").css('width', '0');
				$(".retractable").css('margin-left','0');	
				
				i = 0;
			}
		}
		if ($(window).width() < 810){	
			if (i == 0){
				$("#mySidebar").css('width','250px');
				$(".openbtn").css('margin-left','250px');

				
				i = 1;

			} else{
				$("#mySidebar").css('width', '0');
				$(".openbtn").css('margin-left','0');	
				
				i = 0;
			}
		}		
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