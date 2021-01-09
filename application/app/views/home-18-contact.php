<?php
/*
 * David Bray
 * BrayWorth Pty Ltd
 * e. david@brayworth.com.au
 *
 * MIT License
 *
*/	?>

<div class="container-fluid py-4 bg-white d-none" id="contact">
	<div class="row">
		<div class="offset-sm-3 col">
			<div class="d-flex">
				<h1 class="flex-fill">Contact</h1>

				<button class="btn no-focus" title="top of page" tabindex="-1" id="<?= $_uid = strings::rand() ?>"><i class="bi bi-arrow-up bi-2x"></i></button>

			</div>
			<script>
			$('#<?= $_uid ?>').on( 'click', e => $(document).trigger( 'go-top'));
			</script>

		</div>

	</div>

	<div class="row">
		<div class="offset-sm-3 col">
			<strong>Gold Coast, Q. Australia</strong><br />
			PO Box 292 Tugun, Q 4224<br />
			t. 0418 745334

		</div>

	</div>

	<div class="row">&nbsp;</div>

	<form method="POST" id="mailform" action="<?php print url::$URL ?>">
		<input type="hidden" name="soz" value="" />

		<div class="form-group row">
			<label class="control-label col-sm-3" for="contactName">Name</label>
			<div class="col-sm-9">
				<input class="form-control " type="text" name="contactName" id="contactName" required />

			</div>

		</div><!-- div class="form-group row" -->

		<div class="form-group row">
			<label class="control-label col-sm-3"  for="email">Email</label>
			<div class="col-sm-9">
				<input class="form-control" type="text" name="email" id="email" required />

			</div>

		</div><!-- div class="form-group row" -->

		<div class="form-group row">
			<label class="control-label col-sm-3" for="commentsText">Message</label>
			<div class="col-sm-9">
				<textarea class="form-control" rows="7" name="comments" id="commentsText"></textarea>

			</div>

		</div><!-- div class="form-group row" -->

		<div class="form-group row">
			<div class="col-sm-3">&nbsp;</div>
			<div class="col-sm-9">
				<label class="checkbox">
					<input type="checkbox"data-toggle="checkbox" name="sendCopy" id="sendCopy" value="true" />
					Send a copy of this email to yourself

				</label>

			</div>

		</div><!-- div class="form-group row" -->

		<div class="form-group row">
			<div class="offset-sm-3 col-sm-9">
				<input class="btn btn-outline-primary" name="action" type="submit" value="Submit" />

			</div>

		</div><!-- div class="form-group row" -->

	</form>

</div><!-- div class="container" -->

<div class="parallax"></div>

<script>
$(document).ready( () => {
	$('#mailform')
	.on( 'submit', function( evt ) {
		let em = $('#email').val();
		if ( !em.isEmail()) {
			$('#email').closest('div.form-group').addClass('alert').addClass('alert-warning')
			$('#email').focus().select();
			return ( false );

		}

		$('#email').closest('div.form-group').removeClass('alert').removeClass('alert-warning')
		return ( true );

	});

})
</script>
