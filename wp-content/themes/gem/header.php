<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Gem
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>    

<div id="page" class="hfeed site <?php echo gem_site_style_class(); ?>">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'gem' ); ?></a>
	<?php do_action('gem_before_header'); ?>
	<header id="masthead" class="site-header <?php echo gem_site_style_header_class(); ?>" role="banner">
		<div class="branding header-image">
		 <?php if ( get_theme_mod ('header_overlay',false ) ) { 
				   echo '<div class="overlay overlay-header"></div>';     
				} ?>
			<div class="container">
				<div class="twelve columns header-left">
					<div class="site-branding">    
						<?php  
						   // $header_text = get_theme_mod( 'header_text' );
							$logo_title = get_theme_mod( 'logo_title' );
							$logo = get_theme_mod( 'logo', '' );  
							$tagline = get_theme_mod( 'tagline',true);
							if( $logo_title && function_exists( 'the_custom_logo' ) ) {
                                the_custom_logo();     
					        }elseif( $logo != '' && $logo_title ) { ?>
							   <h1 class="site-title img-logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo esc_url($logo) ?>"></a></h1>
					<?php	}else { ?>
								<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						    <?php } ?>
						<?php if( $tagline ) : ?>
								<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
						<?php endif;  
					?>

					</div><!-- .site-branding -->

				</div>  
				<div class="four columns">
					<?php do_action('gem_before_branding'); ?>	 				
				</div>
			</div>
		</div>
		<div id="nav-wrap"> 
			<div class="container">
				<?php if ( get_theme_mod ('header_search',true) ){  ?>
				<div class="thirteen columns">
					<nav id="site-navigation" class="main-navigation" role="navigation">
						<button class="menu-toggle" aria-controls="menu" aria-expanded="false"><?php echo apply_filters('gem_responsive_menu_title', __('Primary Menu','gem') ); ?></button>
						<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
					</nav><!-- #site-navigation -->					
				</div>
				<div class="three columns">
					<?php get_search_form(); ?>
				</div>
				<?php } else { ?>
				<div class="sixteen columns">
					<nav id="site-navigation" class="main-navigation" role="navigation">
						<button class="menu-toggle" aria-controls="menu" aria-expanded="false"><?php echo apply_filters('gem_responsive_menu_title', __('Primary Menu','gem') ); ?></button>
						<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
					</nav><!-- #site-navigation -->					
				</div>
				<?php } ?>				
				<?php do_action('gem_after_primary_nav'); ?>
			</div>
		</div>	
		<?php 	if( is_front_page() && get_theme_mod('header_breaking_news',false ) && ( get_theme_mod('home-page-type','default') == 'magazine') && !get_theme_mod('page-builder',false) ) {
			do_action('gem_header_breaking_news');   
	    } ?>   	
	</header><!-- #masthead -->
	<?php do_action('gem_after_header'); ?>  

<?php if ( function_exists( 'is_woocommerce' ) || function_exists( 'is_cart' ) || function_exists( 'is_chechout' ) ) :
	 if ( is_woocommerce() || is_cart() || is_checkout() ) { ?>
	    <div class="breadcrumb-wrap">
			<div class="container">
				<div class="ten columns">
					<header class="entry-header">
						<h1 class="entry-title"><?php woocommerce_page_title(); ?></h1>
					</header><!-- .entry-header -->			
				</div>
				<div class="six columns breadcrumb">
					<?php
					$breadcrumb = get_theme_mod( 'breadcrumb',true );
						if( $breadcrumb ) : ?>
						<?php woocommerce_breadcrumb(); ?>
					<?php endif; ?>
				</div>		
			</div>
        </div>	
	<?php } 
	endif; ?>