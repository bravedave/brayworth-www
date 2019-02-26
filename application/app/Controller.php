<?php
/*
	David Bray
	BrayWorth Pty Ltd
	e. david@brayworth.com.au

	This work is licensed under a Creative Commons Attribution 4.0 International Public License.
		http://creativecommons.org/licenses/by/4.0/

	*/
class Controller extends dvc\Controller {
	protected function _offManifest( $option = '') {
		if ( !$option) $option = 'index.html';
		if ( $_manifest_file = realpath( sprintf( '%s/asset-manifest.json', $this->manifest))) {
			if ( 'manifest.json' == $option) {
				$_path = sprintf( '%s/%s', $this->manifest, $option);

			}
			else {
				$_manifest = json_decode( file_get_contents( $_manifest_file));
				$_path = false;
				foreach($_manifest as $_p) {
					if ( ltrim( $_p, './') == $option) {
						$_path = sprintf( '%s/%s', $this->manifest, ltrim( $_p, './'));

					}

				}

			}

			if ( $_path) {
				if ( $_file = realpath( $_path)) {
					sys::serve( $_file);
					sys::logger( sprintf( '%s - served', $_file));

				}
				else {
					printf( '%s - file not found', $_path);
					//~ sys::dump( $_manifest);

				}

			}
			else {
				printf( '%s - not set<br />', $option);
				//~ printf( '%s - not set', application::Request()->getUrl());
				sys::dump( $_manifest);

			}

		}
		else {
			printf( '%s - manifest not found', $_manifest_file);

		}

		// if we find a static file serve it, otherwise serve index

	}

	protected function _index() {
		$this->page404();

	}

	public function index( $option = '') {
		if ( $this->isPost())
			$this->postHandler();

		elseif ( $this->manifest)
			$this->_offManifest( application::Request()->getUrl());

		else
			$this->_index( $option);

	}

}