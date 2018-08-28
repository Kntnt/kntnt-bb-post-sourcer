<?php

namespace Kntnt\BB_Post_Sourcer;

trait Sources {

	private $sources;

	private function sources() {
		if ( ! $this->sources ) {
			$this->sources = apply_filters( 'kntnt_bb_post_sourcer', [] );
		}
		return $this->sources;
	}

}
