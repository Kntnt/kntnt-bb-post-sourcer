<?php

namespace Kntnt\BB_Post_Sourcer;

require_once Plugin::plugin_dir( '/classes/trait-sources.php' );

class UI {

	use Sources;

	public function run() {
		add_filter( 'fl_builder_render_settings_field', [ $this, 'data_source_field' ], 10, 3 );
		add_action( 'fl_builder_loop_settings_after_form', [ $this, 'loop_settings_fields' ] );
	}

	public function data_source_field( $field, $name, $settings ) {
		if ( 'data_source' == $name ) {
			foreach ( $this->sources() as $slug => $source ) {
				$field['options'][ $slug ] = $source['name'];
				$field['toggle'][ $slug ] = [ 'fields' => $source['toggle_fields'] ];
			}
		}
		return $field;
	}

	public function loop_settings_fields( $settings ) {
		foreach ( $this->sources() as $slug => $source ) {
			include Plugin::plugin_dir( 'includes/post-source-fields.php' );
		}
	}

}