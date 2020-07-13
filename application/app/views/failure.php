<?php
/*
 * David Bray
 * BrayWorth Pty Ltd
 * e. david@brayworth.com.au
 *
 * MIT License
 *
*/  ?>

<div class="alert alert-warning alert-dismissible position-fixed fade show mt-5 ml-1" role="alert">
	<b>Failed to send message</b> <?= $this->getParam('err') ?>
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>

	</button>

</div>
