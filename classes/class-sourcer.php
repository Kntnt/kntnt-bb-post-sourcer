<?php

namespace Kntnt\BB_Post_Sourcer;

class Sourcer {

	private $sources;

	public function run() {
		add_filter( 'fl_builder_render_settings_field', [ $this, 'data_source_field' ], 10, 3 );
		add_action( 'fl_builder_loop_settings_after_form', [ $this, 'loop_settings_fields' ] );
		add_filter( 'fl_builder_loop_query_args', [ $this, 'loop_query_args' ] );

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

	public function loop_query_args( $args ) {
		foreach ( $this->sources() as $slug => $source ) {
			$args = $source['loop_query_args_filter']( $args, $args['settings'], $source );
		}
		return $args;
	}

	private function sources() {
		if ( ! $this->sources ) {
			$this->sources = \apply_filters( 'kntnt_bb_post_sourcer', [] );
		}
		return $this->sources;
	}

}