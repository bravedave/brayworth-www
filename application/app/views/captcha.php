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
      _brayworth_.post({
        url : _brayworth_.url(),
        data : {
          action : 'verify-captcha',
          token : token

        }

      }).then( function(d) {
        if ( 'ack' == d.response) {
          if ( d.data.success) {
            $('input[name="soz"]').val( d.soz);
            $('#contact, #contactNAV').removeClass('d-none');
            /// console.log( d);

          }

        }

      });

    });

  });

</script>
