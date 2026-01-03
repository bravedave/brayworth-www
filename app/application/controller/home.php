<?php
/*
 * Copyright (c) 2025 David Bray
 * Licensed under the MIT License. See LICENSE file for details.
*/

use bravedave\dvc\{json, ServerRequest};

class home extends Controller {
	public $RequireValidation = false;

	protected function postHandler() {

		$request = new ServerRequest;
		$action = $request('action');

		return match ($action) {
			'send-message' => handler::sendMessage($request),
			'verify-captcha' => handler::verifyCaptcha($request),
			default => parent::postHandler()
		};
	}

	protected function _index($option = '') {

		$render = [
			'css' => [
				sprintf('<link rel="canonical" href="%s" />', url::$URL)
			],
			'parallax' => [
				'home-18',
				'home-18-about',
				'home-18-contact'
			],
			'meta' => [
				'<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />',
				'<meta name="viewport" content="width=device-width" />'
			],
			'navbar' => 'navbar-18'
		];

		if (config::$captcha) {

			$render['scripts'] = [
				'<script src="https://www.google.com/recaptcha/api.js?render=6Le2OXgUAAAAAJlZnzozDmuZeI2B-mbmJKqABvq3"></script>'
			];

			$render['parallax'][] = 'captcha';
		} else {

			$render['parallax'][] = 'captcha-none';
		}

		$this->render($render);
	}

	protected function render($params) {
		$p = parent::render($params);

		if (isset($params['parallax'])) {
			$this->_render($params['parallax']);
		}
	}

	public function privacy() {

		$p = new page;
		$p->css[] = sprintf('<link rel="canonical" href="%s" />', url::tostring('privacy'));
		$p
			->header()
			->title('navbar-18');

		$this->load('privacy');
	}
}
