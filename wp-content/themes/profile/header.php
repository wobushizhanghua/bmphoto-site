<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Profile
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

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'profile' ); ?></a>
<div class="header-area">

<div class="parallax-background">
  <div class="intro-text">
<?php if ( profile_the_custom_logo()  ) {
      profile_the_custom_logo();
   }
   else {
	   
	  if ( is_front_page() && is_home() ) : ?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
					<?php else : ?>
						<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
						<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
					<?php endif;
   }
   ?> 
  </div>
</div>
 <?php if(get_theme_mod('profile_topbar_enble') !=='disable' ){
	get_template_part( 'template-parts/topinfo-area');
} ?>
</div>
<div id="mainside">
<div class="row">

	<div id="content" class="site-content">
<?php get_template_part( 'template-parts/top'); ?>

<div class="small-12 medium-9 large-9 columns">
	
	<?php if ( is_active_sidebar( 'below-navi' ) ) { ?>
	 <div class="medium-12 columns">
<div id="secondary" class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'below-navi' ); ?>
</div><!-- #secondary -->
</div>
<?php } 