<?php
/*
	David Bray
	BrayWorth Pty Ltd
	e. david@brayworth.com.au

	This work is licensed under a Creative Commons Attribution 4.0 International Public License.
		http://creativecommons.org/licenses/by/4.0/

	*/

	$a = rand(1,9);
	$b = rand(1,9);

	?>
<div class="container-fluid py-4 bg-white" id="contact">
	<h1 class="text-center">Contact</h1>

	<div class="row">
		<div class="offset-sm-6 col-sm-6">
			<strong>Gold Coast, Q. Australia</strong><br />
			PO Box 292 Tugun, Q 4224<br />
			t. 0418 745334

		</div>

	</div>

	<div class="row">&nbsp;</div>

	<form method="POST" id="mailform" action="<?php print url::$URL ?>">
		<input type="hidden" name="riddle" id="riddle" value="<?php print $a+$b ?>" />
		<input type="hidden" name="mathCheck" id="mathCheck" value="<?php print $a+$b ?>" />
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
					<input type="checkbox"data-toggle="checkbox" name="sendCopy" id="sendCopy" value="true">
					Send a copy of this email to yourself

				</label>

			</div>

		</div><!-- div class="form-group row" -->

		<?php if ( false) {	?>

		<div class="form-group row">
			<label class="control-label col-sm-3" for="mathCheck"><?php printf( 'Solve: %s + %s', $a, $b ) ?></label>
			<div class="col-sm-4">
				<input class="form-control" type="text" name="mathCheck" id="mathCheck" required />

			</div>

		</div><!-- div class="form-group row" -->

		<?php }	?>

		<div class="form-group row">
			<div class="offset-sm-3 col-sm-2">
				<input class="btn btn-default" name="action" type="submit" value="Submit" />

			</div>

		</div><!-- div class="form-group row" -->
	</form>

</div><!-- div class="container" -->

<div class="parallax"></div>

<script>
$(document).ready( function() {
	$('#mailform')
	.on( 'submit', function( evt ) {
		var em = $('#email').val();
		if ( !em.isEmail()) {
			$('#email').closest('div.form-group').addClass('alert').addClass('alert-warning')
			$('#email').focus().select();
			return ( false );

		}
		$('#email').closest('div.form-group').removeClass('alert').removeClass('alert-warning')

		<?php if ( false) {	?>
		var v = $('#mathCheck').val()
		if ( v == '' || isNaN(v)) {
			$('#mathCheck').closest('div.form-group').addClass('alert').addClass('alert-warning')
			$('#mathCheck').focus().select();
			return ( false );

		}

		if ( parseInt( v) != parseInt( $('#riddle').val())) {
			$('#mathCheck').closest('div.form-group').addClass('alert').addClass('alert-warning')
			$('#mathCheck').focus().select();
			return ( false );

		}
		$('#mathCheck').closest('div.form-group').removeClass('alert').removeClass('alert-warning')
		<?php }	?>

		return ( true );

	})

})
</script>
