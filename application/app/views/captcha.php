<?php
/*
 * David Bray
 * BrayWorth Pty Ltd
 * e. david@brayworth.com.au
 *
 * MIT License
 *
*/	?>
<script>
grecaptcha.ready( () => {
	grecaptcha.execute('<?= \config::$captcha->public ?>', {action: 'homepage'}).then(function(token) {
		( _ => {
			//~ console.log( token);
			_.post({
				url : _.url(),
				data : {
					action : 'verify-captcha',
					token : token

				}

			}).then( function(d) {
				if ( 'ack' == d.response) {
					if ( d.data.success) {
						$('input[name="soz"]').val( d.soz);
						$('#contact, #contactNAV').removeClass('d-none');

					}

				}

			});

			$('.grecaptcha-badge').fadeOut('slow');

		}) (_brayworth_);

	});

});
</script>
