$(document).ready(function(){

    $("#slider1 a").first().show();

    var index = 0;
    var count = 3;

    function bannerRotator() {
        $('#slider1 a').delay(3000).eq(index).fadeOut(function() { 
            if (index === count){
                index = -1;
            }
            
            $('#slider1 a').eq(index + 1).fadeIn(function() {
                index++;
                bannerRotator();
            });
        });
    }
    bannerRotator();

	});
