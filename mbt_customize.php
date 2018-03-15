<?php

class mbt_customizePlugin extends MantisPlugin {

	function register() {
		$this->name = '"Modern UI" Bring Back Customizer';
		$this->description = 'MantisBT Plugin to put back what the "Modern UI" build broke';
		// $this->page = 'about';

		$this->version = '0.0.1';
		$this->requires = array(
			"MantisCore" => "2.2.0",
		);

		$this->author = 'Vino Rodrigues';
		$this->contact = '';
		$this->url = 'http://github.com/vinorodrigues/mbt-customize';
	}

	function hooks() {
		return array(
			// 'EVENT_PLUGIN_INIT' => 'mbtp_event_plugin_init',
			// 'EVENT_LAYOUT_CONTENT_BEGIN' => 'mbtp_event_layout_content_begin',
			'EVENT_LAYOUT_BODY_BEGIN' => 'mbtp_event_layout_body_begin',
			'EVENT_LAYOUT_RESOURCES' =>  'mbtp_event_layout_resources',
			'EVENT_LAYOUT_BODY_END' =>   'mbtp_event_layout_body_end',
		);
	}

	function mbtp_event_layout_body_begin( $p_event ) {
		echo '<!-- EVENT_LAYOUT_BODY_BEGIN -->';
	}

	function mbtp_event_layout_resources( $p_event ) {
		echo '<!-- EVENT_LAYOUT_RESOURCES -->';
	}

	function mbtp_event_layout_body_end( $p_event ) {
		echo '<!-- EVENT_LAYOUT_BODY_END -->';
	}

}
