<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package sonnet
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'tt-sonnet' ); ?></a>

    <div class="wrapper animated fadeIn">

        <header class="header grid" role="banner">

            <div class="logo col-1-2">
                <?php if ( has_custom_logo () ) : ?>
                    <?php the_custom_logo(); ?>
                <?php else : ?>
                    <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                <?php endif; ?>
            </div>


            <div class="col-1-2">
                <nav id="menu" class="nav" role="navigation">
                    <a href="#menu" class="menu-toggle" id="menu-toggle">Menu</a>
                    <?php wp_nav_menu( array(
                		'theme_location' => 'top',
                		'menu_id'        => 'top-menu',
                	) ); ?>
                </nav>
            </div>

        </header>

		<div id="content" class="site-content">
