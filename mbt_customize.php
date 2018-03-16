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
			'EVENT_PLUGIN_INIT' => 'mbtp_event_plugin_init',
			// 'EVENT_LAYOUT_CONTENT_BEGIN' => 'mbtp_event_layout_content_begin',
			'EVENT_LAYOUT_RESOURCES' =>  'mbtp_event_layout_resources',
			'EVENT_LAYOUT_BODY_BEGIN' => 'mbtp_event_layout_body_begin',
			'EVENT_LAYOUT_BODY_END' =>   'mbtp_event_layout_body_end',
		);
	}

	function mbtp_event_plugin_init( $p_event ) {
		global $g_meta_include_file, $g_top_include_page, $g_bottom_include_page;
		if( !isset($g_meta_include_file) ) $g_meta_include_file = '';
		if( !isset($g_top_include_page) ) $g_top_include_page = '';
		if( !isset($g_bottom_include_page) ) $g_bottom_include_page = '';
	}

	function mbtp_event_layout_resources( $p_event ) {
		$t_meta = config_get_global( 'meta_include_file' );
		if( !is_blank( $t_meta )  && file_exists( $t_meta ) && !is_dir( $t_meta ) ) {
			include( $t_meta );
		}

		event_signal( 'EVENT_LAYOUT_PAGE_HEADER' );
	}

	function mbtp_event_layout_body_begin( $p_event ) {
		$t_page = config_get( 'top_include_page' );

		if( !is_blank( $t_page ) && file_exists( $t_page ) && !is_dir( $t_page ) ) {
			include( $t_page );
		}
	}

	function mbtp_event_layout_body_end( $p_event ) {
		$t_page = config_get( 'bottom_include_page' );

		if( !is_blank( $t_page ) && file_exists( $t_page ) && !is_dir( $t_page ) ) {
			include( $t_page );
		}
	}

}
