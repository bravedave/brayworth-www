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

	return;
	var p = $('.parallax').first();

	var dim = {
		width : $(window).width(),
		height : $(window).height(),
		ph : p.height(),

	}

	$('<div>w:' + dim.width + ' / h:' + dim.height + ' : pw:' + dim.pw + '</div><p>&nbsp;</p><p>&nbsp;</p>').appendTo('body')


})
</script>
