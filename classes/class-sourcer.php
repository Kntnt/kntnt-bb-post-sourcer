<?php

namespace Kntnt\BB_Post_Sourcer;

require_once Plugin::plugin_dir( '/classes/trait-sources.php' );

class Sourcer {

	use Sources;

	public function run() {
		add_filter( 'fl_builder_loop_query_args', [ $this, 'loop_query_args' ] );
	}

	public function loop_query_args( $args ) {
		foreach ( $this->sources() as $slug => $source ) {
			if ( $slug == $args['settings']->data_source ) {
				$args = $source['loop_query_args_filter']( $args, $args['settings'], $source );
			}
		}
		return $args;
	}

}