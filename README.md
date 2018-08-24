# Kntnt's Sourcer for Beaver Builder post modules

WordPress plugin that provides hooks that allows developers to add new content sources for Beaver Builder's Post, Post Slider and Post Carousel modules.

## Description

This plugin provides the action hook `kntnt_bb_post_sourcer` that can be used
to add new data sources to Beaver Builder's Post, Post Slider and Post Carousel
modules. This is an example how it can be used:

    add_filter( 'kntnt_bb_post_sourcer', function ( $sources ) {
    
    	// For each source, add an element with the source slug as key and
    	// array with its settings as value.
    	$sources['kntnt_bb_personalized_posts'] = [
    
    		// The name shown in user interface.
    		'name' => 'Selected posts',
    
    		// Which fields to be shown (see https://bit.ly/2MKvj2k)
    		'toggle_fields' => [ 'kntnt_bb_personalized_post_ids', 'posts_per_page' ],
    
    		// An array of fields (see https://bit.ly/2w82X8I)
    		'fields' => [
    			'kntnt_bb_personalized_post_ids' => [
    				'type' => 'suggest',
    				'label' => 'Select posts',
    				'description' => 'Enter the titles of posts to be shown.',
    				'action' => 'fl_as_posts',
    				'data' => 'post',
    			],
    		],
    
    		// Filter the arguments used by WPQuery (see https://bit.ly/2PADIUp
    		// and https://bit.ly/2OYXHLB).
    		'loop_query_args_filter' => function ( $args, $settings, $source ) {
    			if ( isset( $settings->kntnt_bb_personalized_post_ids ) ) {
    				$args['post__in'] = explode( ',', $settings->kntnt_bb_personalized_post_ids );
    				$args['post_type'] = 'any';
    				$args['orderby'] = 'post__in';
    				unset( $args['fields'] );
    				unset( $args['nopaging'] );
    				unset( $args['post__not_in'] );
    				unset( $args['author__not_in'] );
    				unset( $args['tax_query'] );
    				unset( $args['order'] );
    			}
    			return $args;
    		},
    
    	];
    
    	return $sources;
    
    } );

## Installation

Install the plugin [the usually way](https://codex.wordpress.org/Managing_Plugins#Installing_Plugins).

## Frequently Asked Questions

### Where is the setting page?

There is no setting page.

### How can I get help?

If you have a questions about the plugin, and cannot find an answer here, start by looking at [issues](https://github.com/Kntnt/kntnt-bb-post-sourcer/issues) and [pull requests](https://github.com/Kntnt/kntnt-bb-post-sourcer/pulls). If you still cannot find the answer, feel free to ask in the the plugin's [issue tracker](https://github.com/Kntnt/kntnt-bb-post-sourcer/issues) at Github.

### How can I report a bug?

If you have found a potential bug, please report it on the plugin's [issue tracker](https://github.com/Kntnt/kntnt-bb-post-sourcer/issues) at Github.

### How can I contribute?

Contributions to the code or documentation are much appreciated.

If you are unfamiliar with Git, please date it as a new issue on the plugin's [issue tracker](https://github.com/Kntnt/kntnt-bb-post-sourcer/issues) at Github.

If you are familiar with Git, please do a pull request.

## Changelog

### 1.0.0

Initial release. Fully functional plugin.
