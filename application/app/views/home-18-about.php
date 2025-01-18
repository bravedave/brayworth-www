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

				<button class="btn no-focus" title="top of page" tabindex="-1" id="<?= $_uid = strings::rand() ?>"><i class="bi bi-arrow-up bi-2x"></i></button>
			</div>
			<script>
				$('#<?= $_uid ?>').on('click', e => $(document).trigger('go-top'));
			</script>
		</div>
	</div>

	<div class="row">

		<div class="col-md-6 col-sm-8 col-8">

			<p>BrayWorth is a Full Stack Web Development Company.</p>

			<p>Full Stack Web Development works with back end server-side languages
				like PHP to find, save, or change data for front-end code.<br>
				We use Linux, PHP and SQL.</p>

			<p>Full Stack Developers use front-end browser languages that
				control how content looks on a site’s user-face side like - HTML, CSS, and JavaScript.<br />
				We use Bootstrap and libraries like jQuery</p>

			<p>BrayWorth's Full Stack Developers speak database and browser languages,
				but importantly they speak your language...<br>
				Discuss your project with us today.</p>
		</div>

		<div class="col-md-3 col-sm-4 col-4">
			<img class="img img-responsive img-thumbnail" src="<?= strings::url('images/iphone-profile.jpg') ?>" />
		</div>

		<div class="col-md-3">
			<div class="alert about-button-a text-center text-white">HTML/CSS</div>
			<div class="alert about-button-b text-center text-white">Bootstrap</div>
			<div class="alert about-button-c text-center text-white">JavaScript</div>
			<div class="alert about-button-d text-center text-white">PHP</div>
			<div class="alert about-button-e text-center text-white">REST</div>
			<div class="alert about-button-a text-center text-white">DataBase</div>
		</div>
	</div>

	<div class="row py-1">
		<div class="col">
			<p>Find our source code on <a href="https://github.com/bravedave/" target="_blank"><i class="bi bi-github"></i> GitHub</a></p>

			<p>Find the source code for this web site at <a href="https://github.com/bravedave/brayworth-www/" target="_blank"><i class="bi bi-github"></i> https://github.com/bravedave/brayworth-www/</a></p>

			<p>Find documentation of the MVC Web Application Architecture <a href="/docs/"><i class="bi bi-stickies"></i> here</a></p>

			<p>Find some recent work at these websites:</p>
		</div>
	</div>

	<div class="row py-1">

		<div class="offset-lg-3 col-lg-3 col-6 text-center">

			<a class="btn btn-block btn-outline-secondary" href="https://www.darcy.com.au" target="_blank">D'Arcy Estate Agents</a>
		</div>

		<div class="col-lg-3 col-6 text-center">

			<a class="btn btn-block btn-outline-secondary" href="https://www.bilingabeachweddings.com" target="_blank">Bilinga Beach Weddings</a>
		</div>
	</div>
</div>
<div class="parallax"></div>