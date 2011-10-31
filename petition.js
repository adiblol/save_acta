$(function() {
	$('#submit').removeAttr('disabled');
	$('form').submit(function(e) {
		e.preventDefault();
		
		if($('#country').val() != '' && $('#country').val() != '' && $('#country').val() != '') {
		
		$('#submit').val('Loading...');
		$('#submit').attr('disabled', 'disabled');
		$.post('ajax.php', 'country=' + $('#country').val()
			+ '&name=' + $('#name').val()
			+ '&location=' + $('#location').val(),
			function(content) {
				$('form').animate({height: 'toggle', opacity: 'toggle'}, function() {
					$('#submit').removeAttr('disabled');
					$('form').html(content);
					$('form').animate({height: 'toggle', opacity: 'toggle'});
				});
			});
		} else {
			alert('Please fill everything.');
		}
	});
	
	var pos = 0;
	
	var slide = new Image();
	slide.onload = function() {
		window.setInterval(function() {
			$('#slide').animate({'opacity': 0.1}, 'fast', function() {
				pos++;
				if(pos == 8)
					pos = 0;
				$('#slide').css('background-position', '0 -' + pos * 371 + 'px');
				$('#slide').animate({'opacity': 1}, 'fast');
			});
		}, 7000);
	};
	slide.src = $('#slide').css('background-image').slice(5, -2);
});