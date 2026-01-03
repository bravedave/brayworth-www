<?php
/*
 * Copyright (c) 2025 David Bray
 * Licensed under the MIT License. See LICENSE file for details.
*/	?>
<script>
	(_ => {

		grecaptcha.ready(() => {

			grecaptcha
				.execute('<?= config::$captcha->public ?>', {
					action: 'homepage'
				})
				.then(token => {

					_.fetch.post(_.url(), {
						action: 'verify-captcha',
						token: token
					}).then(d => {

						if ('ack' == d.response) {

							if (d.data.success) {

								$('input[name="soz"]').val(d.soz);
								$('.js-contact').removeClass('d-none');
								console.log('success');
							}
						}
						// console.log(d);
					});

					$('.grecaptcha-badge').fadeOut('slow');
					// console.log('faded ?');
				});

			// console.log('grecaptcha');
		});
	})(_brayworth_);
</script>