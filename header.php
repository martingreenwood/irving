<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package irving
 */

?>
<!-- Website Design & Build by Martin Greenwood / https://martingreenwood.com -->
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class($pagename); ?>>
	<nav id="site-navigation" class="main-navigation" role="navigation">
		<div class="menu-icon">
			<button aria-expanded="false" aria-controls="primary-menu" class="menu-toggle" id="nav-icon">
				<span></span>
				<span></span>
				<span></span>
			</button>
			<span>Menu</span>
		</div>
		<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
	</nav>

<div id="page" class="site">

	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">
			<?php
			if ( is_front_page() || is_singular('shows') ): ?>
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/ISC_Logo.svg" width="177">
   			<?php else:
   				the_custom_logo();
			endif; ?>
		</div>
	</header>

	<div id="content" class="site-content">
