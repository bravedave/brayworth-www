<?php
/*
 * David Bray
 * BrayWorth Pty Ltd
 * e. david@brayworth.com.au
 *
 * MIT License
 *
*/	?>
<div id="parallax">
	<img src="<?php url::write('images/bg-1600.jpg') ?>" />
</div>
<div class="parallax"></div>

<script>
( _ => {
	_.hashScroll = () => {
		/** Scrolls the content into view **/
		$('a[href*="#"]:not([href="#"] , .carousel-control, .ui-tabs-anchor)').on('click', function() {
			if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
				let target = $(this.hash);
				target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
				if (target.length) {
					if ( /nav/i.test( target.prop('tagName')))
						return;

					target[0].scrollIntoView({ behavior: "smooth", block: "start", inline: "nearest" });
					return false;

				}

			}

		});

	};

	$(document).on( 'go-top', e => {
		e.preventDefault();
		window.scrollTo({ left: 0, top: 0, behavior: 'smooth' });

		setTimeout(() => {
			window.scrollTo({ left: 0, top: 150, behavior: 'smooth' });

		}, 100);

	});

	$(document).ready( () => {
		_.hashScroll();

		if ( window.location.hash) {
			let hash = window.location.hash;

			let target = $(hash);
			target = target.length > 0 ? target : $('[name=' + hash.slice(1) +']');
			if (target.length > 0) {
				if ( /nav/i.test( target.prop('tagName')))
					return;

				target[0].scrollIntoView({ behavior: "smooth", block: "start", inline: "nearest" });

			} else { $(document).trigger('go-top'); }

		} else { $(document).trigger('go-top'); }

	})

}) (_brayworth_);
</script>
