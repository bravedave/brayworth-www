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
	(_ => {

		grecaptcha.ready(() => {

			grecaptcha
				.execute('<?= config::$captcha->public ?>', {
					action: 'homepage'
				})
				.then(token => {

					_.post({
						url: _.url(),
						data: {
							action: 'verify-captcha',
							token: token
						}
					}).then(d => {

						if ('ack' == d.response) {

							if (d.data.success) {

								$('input[name="soz"]').val(d.soz);
								$('.js-contact').removeClass('d-none');
								console.log('success');
							}
						}
						console.log(d);
					});

					$('.grecaptcha-badge').fadeOut('slow');
					// console.log('faded ?');
				});

				console.log('grecaptcha');
		});
	})(_brayworth_);
</script>