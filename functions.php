<?php

require_once 'plugins/widgets.php';

// wp_deregister_script('jquery');

define( 'CSS_URL', get_stylesheet_uri() );
define( 'BASE_URL', get_template_directory_uri() );

// remove_action( 'wp_head', 'wp_generator' );

wp_register_script( 'jquery', BASE_URL . '/js/jquery.js' );
wp_register_script( 'bootstrap', BASE_URL . '/js/bootstrap.min.js', array( 'jquery' ) );

function add_scripts() {
	if ( is_admin() ) {
		return;
	}

	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'bootstrap' );

	if ( is_single() ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

wp_register_style( 'bootstrap', BASE_URL . '/css/bootstrap.min.css' );
wp_register_style( 'style', CSS_URL );

function add_styles() {
	if ( is_admin() ) {
		return;
	}

	wp_enqueue_style( 'bootstrap' );
	wp_enqueue_style( 'style' );
}

add_action( 'wp_print_scripts', 'add_scripts' );
add_action( 'wp_print_styles', 'add_styles' );

add_action( 'after_setup_theme', function(){
	load_theme_textdomain( 'treinaweb', get_template_directory() . '/languages' );
} );

// remove url field.
add_filter( 'comment_form_default_fields', 'unset_url_field' );

function unset_url_field( $fields ) {
	if ( isset( $fields['url'] ) ) {
		unset( $fields['url'] );
	}

	if ( isset( $fields['cookies'] ) ) {
		unset( $fields['cookies'] );
	}

	// add fields in comment form.
	$fields['author'] = '<p class="comment-form-author">
	<label for="author">Nome</label> 
	<input id="author" name="author" type="text" value="" size="30" maxlength="245" required="required"></p>';

	$fields['email'] = '<p class="comment-form-email">
	<label for="email">E-mail</label> 
	<input id="email" name="email" type="text" value="" size="30" maxlength="100" required="required"></p>';

	$fields['phone'] = '<p class="comment-form-phone">
	<label for="phone">Telefone</label> 
	<input id="phone" name="phone" type="text" value="" size="30" maxlength="100" required="required"></p>';

	return $fields;
}

// reorder fields in comment form.
add_filter( 'comment_form_fields', 'reorder_comment_fields' );
function reorder_comment_fields( $fields ) {
	$comment_field = $fields['comment'];
	unset( $fields['comment'] );
	$fields['comment'] = $comment_field;
	return $fields;
}

function saving_comment_meta_data( $comment_id ) {
    add_comment_meta( $comment_id, 'phone', $_POST[ 'phone' ] );
}

add_action( 'comment_post', 'saving_comment_meta_data' );

add_filter( 'pre_comment_on_post', 'validate_comment_meta_data' );

function validate_comment_meta_data( $comment_data ) {
	if ( ! isset( $_POST['phone'] ) )
		wp_die( 'Error: Enter phone number.' );
	
	return $comment_data;
}

function treinaweb_widgets_init() {	
	register_sidebar( 
		array( 
			'name' => 'Widget Lateral',
			'id'   => 'widget-lateral',
			'description' => 'Widgets a serem exibidos do lado esquerdo do site.',
			'class' => 'well',
			'before_widget' => '',
			'after_widget' => '',
			'before_title' => '<li class="nav-header">',
			'after_title' => '</li>',
			'before_sidebar' => '<ul class="nav nav-list">',
			'after_sidebar' => '</ul>'
		) 
	);
}

add_action( 'widgets_init', 'treinaweb_widgets_init' );


function pagination() {
	global $wp_query;

	$base_url = esc_url( home_url() );

	$page = ( ! $wp_query->query_vars['paged'] ) ? 1 : $wp_query->query_vars['paged'];

	if ( $wp_query->found_posts > $wp_query->query_vars['posts_per_page'] ) {
		echo '<div class="pagination">';
		    echo '<ul>';

		    if ( $page > 1 ) {
		    	echo '<li><a href="'. $base_url .'/page/' . ( $page - 1 ) . '">&laquo; Anterior</a></li>';
		    }

		    for ( $i = 1; $i <= $wp_query->max_num_pages; $i++ ) {
		    	if ( $i == $page ) {
		    		echo '<li class="active"><a href="">'. $i .'</a></li>';
		    	} else {
		    		echo '<li><a href="'. $base_url .'/page/'. $i .'">'. $i .'</a></li>';
		    	}
		    }

		    if ( $page < $wp_query->max_num_pages ) {
		    	echo '<li><a href="'. $base_url .'/page/' . ( $page + 1 ) . '">Próximo &raquo;</a></li>';
		    }

		    echo '</ul>';
		echo '</div>';
	}
}


add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 100, 100 );

function excerpt_post( $more ) {
	if ( ! is_singular( array( 'post', 'page' ) ) ) {
		$more = sprintf( 
			'&nbsp;<a class="read-more" href="%1$s">%2$s</a>', 
			get_permalink( get_the_ID() ), 
			'Leia mais' 
		);
	}

	return $more;
}

add_filter( 'excerpt_more', 'excerpt_post' );

if ( ! isset( $content_width ) ) {
	$content_width = 900;
}


add_theme_support('automatic-feed-links');
add_theme_support('title-tag');
add_theme_support('wp-block-styles');
add_theme_support('responsive-embeds');
add_theme_support('align-wide');


function inicializacao() {

	register_nav_menus( array( 'menu_principal' => 'Menu Principal' ) );

	add_editor_style( 'style-editor.css' );

	$defaults = array(
        'height'               => 100,
        'width'                => 400,
        'flex-height'          => true,
        'flex-width'           => true,
        'header-text'          => array( 'site-title', 'site-description' )
    );

	add_theme_support( 'custom-logo', $defaults );

	$args = array(
        'default-image'      => get_template_directory_uri() . '/img/treinaweb-index.png',
        'default-text-color' => '000',
        'width'              => 400,
        'height'             => 250,
        'flex-width'         => true,
        'flex-height'        => true,
    );

    add_theme_support( 'custom-header', $args );

    $bgs = array(
		'default-color'          => '',
		'default-image'          => '',
		'default-repeat'         => 'repeat',
		'default-position-x'     => 'left',
        'default-position-y'     => 'top',
        'default-size'           => 'auto',
		'default-attachment'     => 'scroll',
		'wp-head-callback'       => '_custom_background_cb',
		'admin-head-callback'    => '',
		'admin-preview-callback' => ''
	);
	
	add_theme_support( 'custom-background', $defaults );



}

add_action( 'after_setup_theme', 'inicializacao' );


wp_register_script( 'autosize', BASE_URL . '/js/autosize.min.js' );
wp_register_script( 'app', BASE_URL . '/js/app.js', array( 'autosize' ) );

function adicionar_scripts() {
	if ( is_admin() ) {
		return;
	}

	wp_enqueue_script( 'autosize' );
	wp_enqueue_script( 'app' );

}

add_action( 'wp_footer', 'adicionar_scripts' );



add_action( 'init', function() {
	wp_register_style( 'my-block-styles', get_template_directory_uri() . '/css/my-custom-block-style.css', false );

	register_block_style( 'core/cover', array(
		'name' => 'my-cover',
		'label' => 'My custom cover'
	) );
});


register_block_pattern(
	'treinaweb/about',
	array(
		'title' => 'Two buttons',
		'description' => 'Two horizontal buttons, the left button is filled in, and the right button is outlined.',
        'content' => "<!-- wp:buttons {\"align\":\"center\"} -->\n<div class=\"wp-block-buttons aligncenter\"><!-- wp:button {\"backgroundColor\":\"very-dark-gray\",\"borderRadius\":0} -->\n<div class=\"wp-block-button\"><a class=\"wp-block-button__link has-background has-very-dark-gray-background-color no-border-radius\">" . 'Button One' . "</a></div>\n<!-- /wp:button -->\n\n<!-- wp:button {\"textColor\":\"very-dark-gray\",\"borderRadius\":0,\"className\":\"is-style-outline\"} -->\n<div class=\"wp-block-button is-style-outline\"><a class=\"wp-block-button__link has-text-color has-very-dark-gray-color no-border-radius\">".'Button Two'."</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons -->",
    )
);


if ( ! function_exists( 'wp_body_open' ) ) {
    function wp_body_open() {
        do_action( 'wp_body_open' );
    }
}



add_action( 'init', function(){
	add_theme_support( 'html5', array(
    // Any or all of these.
    'comment-list', 
    'comment-form',
    'search-form',
    'gallery',
    'caption',
) );

	add_theme_support( 'title-tag' );
});