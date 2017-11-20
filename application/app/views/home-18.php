<?php
/**
	David Bray
	BrayWorth Pty Ltd
	e. david@brayworth.com.au

	This work is licensed under a Creative Commons Attribution 4.0 International Public License.
		http://creativecommons.org/licenses/by/4.0/

	*/	?>
<div id="parallax">
	<img src="<?php url::write('images/bg-1600.jpg') ?>" />
</div>
<div class="parallax"></div>

<script>
$(document).ready( function() {
	_brayworth_.hashScroll();
	if ( _brayworth_.browser.isMobileDevice)
		$('html, body').animate({ scrollTop: 150 }, 1000);

})
</script>
