<?php
/*
 * David Bray
 * BrayWorth Pty Ltd
 * e. david@brayworth.com.au
 *
 * MIT License
 *
*/	?>

<div id="contact"></div>
<article class="container-fluid py-4 bg-white d-none js-contact"
	id="<?= $_article = strings::rand() ?>">

	<div class="row mb-2">

		<div class="offset-sm-3 col">

			<div class="d-flex">

				<h1 class="flex-fill">Contact</h1>
				<button class="btn no-focus js-top-of-page" title="top of page" tabindex="-1">
					<i class="bi bi-arrow-up bi-2x"></i></button>
			</div>
		</div>
	</div>

	<div class="row mb-2">

		<div class="offset-sm-3 col">

			<strong>Gold Coast, Q. Australia</strong><br>
			PO Box 292 Tugun, Q 4224<br>
			t. 0418 745334
		</div>
	</div>

	<form autocomplete="off">
		<input type="hidden" name="soz" value="">
		<input type="hidden" name="action" value="">

		<div class="row mb-2">

			<label class="control-label col-sm-3" for="<?= $_uid = strings::rand() ?>">Name</label>
			<div class="col">
				<input class="form-control " type="text" name="contactName" id="<?= $_uid ?>" required>
			</div>
		</div>

		<div class="row mb-2">

			<label class="control-label col-sm-3" for="<?= $_uid = strings::rand() ?>">Email</label>
			<div class="col">
				<input class="form-control" type="text" name="email" id="<?= $_uid ?>" required>
			</div>
		</div>

		<div class="row mb-2">

			<label class="control-label col-sm-3" for="<?= $_uid = strings::rand() ?>">Message</label>
			<div class="col">
				<textarea class="form-control" rows="7" name="comments" id="<?= $_uid ?>"></textarea>
			</div>
		</div>

		<div class="row mb-2">

			<div class="offset-sm-3 col js-feedback">
				<button class="btn btn-outline-primary" type="submit">send message</button>
			</div>
		</div>
	</form>

	<script>
		(_ => {

			const article = $('#<?= $_article ?>');
			const form = article.find('form');

			article.find('.js-top-of-page').on('click', e => $(document).trigger('go-top'));

			_.ready(() => {

				form.on('submit', function(evt) {

					const em = form.find('input[name=email]').val();
					if (!em.isEmail()) {

						form.find('input[name=email]').closest('.row')
							.addClass('alert alert-warning');
						form.find('input[name=email]').focus().select();
						return false;
					}

					form.find('input[name=email]').closest('.row')
						.removeClass('alert alert-warning');

					form.find('.js-feedback').html('<div class="spinner-border"></div>');
					form.find('input[name=action]').val('send-message')
					_.fetch.post.form(_.url('<?= $this->route ?>'), this)
						.then(d => {

							if ('ack' == d.response) {

								form.find('.js-feedback').html('<div class="alert alert-success">Thank you for your message</div>');
							} else {

								_.growl(d);
							}
						});

					return false;
				});
			});
		})(_brayworth_);
	</script>
</article><!-- div class="container" -->

<div class="parallax"></div>