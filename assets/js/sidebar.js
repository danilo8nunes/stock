
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
});