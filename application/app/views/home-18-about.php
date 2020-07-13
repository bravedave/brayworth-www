<?php
/*
 * David Bray
 * BrayWorth Pty Ltd
 * e. david@brayworth.com.au
 *
 * MIT License
 *
*/	?>

<div class="container-fluid py-4 bg-white" id="about">
	<div class="row">
		<div class="col">
			<div class="d-flex">
				<h1 class="text-center flex-fill">Web Developer
					<br class="d-block d-sm-none" />
					<small class="subtitle">Full Stack</small>

				</h1>

				<img src="<?= strings::url( 'images/arrow-up.svg') ?>"
					id="<?= $_uid = strings::rand() ?>"
					alt="up arrow" title="top of page"
					class="up-icon pointer" />

			</div>
			<script>
			$('#<?= $_uid ?>').on( 'click', e => {
				$(document).trigger( 'go-top');

			});
			</script>

		</div>

	</div>

	<div class="row">
		<div class="col-8 col-sm-6">
			<p>BrayWorth is a Full Stack Web Development Company.</p>

			<p>Full Stack Web Development works with back end server-side languages
				like PHP to find, save, or change data for front-end code.<br />
				We use Linux, PHP and SQL.</p>

			<p>Full Stack Developers use front-end browser languages that
				control how content looks on a site’s user-face side like - HTML, CSS, and JavaScript.<br />
				We use Bootstrap and libraries like jQuery</p>

			<p>BrayWorth's Full Stack Developers speak database and browser languages<br />
				but importantly they speak your language.<br />
				Discuss your project with us today.</p>

		</div>

		<div class="col-4 col-sm-3">
			<img class="img img-responsive img-thumbnail" src="<?php url::write( 'images/iphone-profile.jpg' ) ?>" />

		</div>

		<div class="col-12 col-sm-6 col-md-3">
			<div class="alert about-button-a text-center text-white">
				HTML/CSS

			</div>

			<div class="alert about-button-b text-center text-white">
				Bootstrap

			</div>

			<div class="alert about-button-c text-center text-white">
				JavaScript

			</div>

			<div class="alert about-button-d text-center text-white">
				PHP

			</div>

			<div class="alert about-button-e text-center text-white">
				REST

			</div>

			<div class="alert about-button-a text-center text-white">
				DataBase

			</div>

		</div>

	</div>

	<div class="row py-1">
		<div class="col">
			<p>Find our source code on <a href="https://github.com/bravedave/" target="_blank"><i class="fa fa-github"></i> GitHub</a></p>

			<p>Find the source code for this web site at <a href="https://github.com/bravedave/brayworth-www/" target="_blank"><i class="fa fa-github"></i> https://github.com/bravedave/brayworth-www/</a></p>

			<p>Find documentation of the MVC Web Application Architecture <a href="/docs/"><i class="fa fa-sticky-note-o"></i> here</a></p>

			<p>Find .NET work at <a href="https://easydose.net.au" target="_blank"> easydose.net.au</a></p>

			<p>Find some recent work at these websites:</p>

		</div>

	</div>

	<div class="row py-1">
		<div class="col-sm-6 col-md-3 offset-xl-2 col-xl-2 text-center">
			<a class="btn btn-block btn-outline-secondary" href="https://www.darcy.com.au" target="_blank">D'Arcy Estate Agents</a>

		</div>

		<div class="col-sm-6 col-md-3 col-xl-2 text-center">
			<a class="btn btn-block btn-outline-secondary" href="https://www.maricourt.com.au" target="_blank">Mari Court</a>

		</div>

		<div class="col-sm-6 col-md-3 col-xl-2 text-center">
			<a class="btn btn-block btn-outline-secondary" href="https://friendsofcurrumbin.com/" target="_blank">FOC</a>

		</div>

		<div class="col-sm-6 col-md-3 col-xl-2 text-center">
			<a class="btn btn-block btn-outline-secondary" href="https://www.bilingaslsc.com" target="_blank">Bilinga SLSC</a>

		</div>

	</div>

</div>

<div class="parallax"></div>
