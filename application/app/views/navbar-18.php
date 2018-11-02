<?php
/*
	David Bray
	BrayWorth Pty Ltd
	e. david@brayworth.com.au

	This work is licensed under a Creative Commons Attribution 4.0 International Public License.
		http://creativecommons.org/licenses/by/4.0/

	DO NOT change this file
	Copy it to <application>/app/views/ and modify it there
	*/	?>
	<nav class="navbar sticky-top navbar-dark bg-dark navbar-expand-md py-1" role="navigation" >
		<div class="navbar-header" >
			<?php printf( '<a href="%s" class="navbar-brand text-white" >%s</a>', \url::$URL, $this->data->title);	?>

		</div>

		<button class="navbar-toggler text-white" type="button"
			data-toggle="collapse"
			data-target="#navbarSupportedContent"
			aria-controls="navbarSupportedContent"
			aria-expanded="false"
			aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a href="https://mail.brayworth.com.au/webmail/" target="_blank" class="nav-link text-white">webmail</a>

				</li>

				<li class="nav-item">
					<a href="<?php url::write( '#about'); ?>" class="nav-link text-white">about</a>

				</li>

<?php if ( userAgent::isLegit()) {	?>
				<li class="nav-item d-none" id="contactNAV">
					<a href="<?php url::write( '#contact'); ?>" class="nav-link text-white">contact</a>

				</li>

<?php }	?>

			</ul>

		</div>

	</nav>
