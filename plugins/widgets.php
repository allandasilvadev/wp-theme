<?php

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Invalid request.' );
}

// disables the block editor from managing widgets in the gutenberg plugin.
add_filter( 'gutenberg_use_widgets_block_editor', '__return_false' );

// disables the block editor from managing widgets.
add_filter( 'use_widgets_block_editor', '__return_false' );

// disable for posts
add_filter( 'use_block_editor_for_post', '__return_false', 10 );

// disable for post types.
add_filter( 'use_block_editor_for_post_type', '__return_false', 10 );