<?php
/*
	David Bray
	BrayWorth Pty Ltd
	e. david@brayworth.com.au

	This work is licensed under a Creative Commons Attribution 4.0 International Public License.
		http://creativecommons.org/licenses/by/4.0/

	*/	?>
<script>
  grecaptcha.ready( function() {
    grecaptcha.execute('<?php print \config::$captcha->public ?>', {action: 'homepage'}).then(function(token) {
      // Verify the token on the server.
      console.log( token);

    });

  });

</script>