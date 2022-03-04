<!doctype html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php echo get_bloginfo( 'charset' ); ?>">
		<meta name="description" content="<?php echo get_bloginfo( 'description' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">		
		<link rel="alternate" type="application/rss+xml" title="RSS2.0" href="<?php echo get_bloginfo( 'rss2_url' ); ?>">
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<?php wp_body_open(); ?>
		<div class="container">
			
			<div class="navbar navbar-inverse">
				<div class="navbar-inner">
					<a style="display: block;margin-top: 4px;" href="#" class="brand">Blog Treinaweb</a>


				    <?php 
				    	if ( has_nav_menu( 'menu_principal' ) ) {
				    		wp_nav_menu( array( 
				    			'theme_location' => 'menu_principal', 
				    			'menu_class' => 'nav' 
				    		) );
				    	}				        
				    ?>

				    <?php get_search_form( array( 'aria_label' => '' ) ); ?>
				</div>
			</div>

			<div class="row-fluid">
				<div class="hero-unit">
					<?php 
					    $logoid = get_theme_mod( 'custom_logo' );
					    $logo = wp_get_attachment_image_src( $logoid, 'full' );

					    if ( has_custom_logo() ) {
					    	$title = esc_html( get_bloginfo( 'name' ) );
					    	$description = esc_html( get_bloginfo( 'description' ) );
					    	$src = esc_url( $logo[0] );
					    	$width = intval( $logo[1] );
					    	$height = intval( $logo[2] ); 	

					    	echo '<img width="'. $width .'" height="'. $height .'" src="'. $src .'" alt="'. $title .'" title="'. $title .'" />';
					    	echo '<br>';				    	

					    	if ( display_header_text() ) {
					    		echo '<h2 style="margin-bottom: 0;color: #'. get_header_textcolor() .'">'. $title .'</h2>';
					    		echo '<p style="font-size:12.8px;font-weight:normal;">'. $description .'</p>';
					    	} else {

					    	}

					    } else {
					    	echo '<h2 style="margin-bottom: 0;">'. esc_html( get_bloginfo( 'name' ) ) .'</h2>';
					    	echo '<p style="font-size: 12.8px; font-weight: normal;">'. esc_html( get_bloginfo( 'description' ) ) .'</p>';
					    }
					?>
				</div>
			</div>

			<div class="row-fluid">