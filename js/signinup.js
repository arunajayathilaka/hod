$(document).ready(function() {
	
$('#cp').on('keyup', function () {
    if ($(this).val() == $('#p').val()) {
		document.getElementById('takemein').disabled=false;
        $('#message').html('matching').css('color', 'green');
		
		 
    } 
	else {
		document.getElementById('takemein').disabled=true;
		$('#message').html('not matching re enter the password').css('color', 'red');
		
		
	}
});

$('#u').on('keyup', function () {
var uname=$('#u').val();
//alert(uname);
$.ajax({
			url:'usernameavailable.php',
			method:'POST',
			data:{usern: uname},
			success:function(data){
				$('#message2').html(data);
			}
		});
});
});