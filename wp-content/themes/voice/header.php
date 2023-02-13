<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">

<head>

<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta name="viewport" content="user-scalable=yes, width=device-width, initial-scale=1.0, maximum-scale=1, minimum-scale=1">
<link rel="profile" href="https://gmpg.org/xfn/11" />

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="vce-main">

<header id="header" class="main-header">
<?php if(vce_get_option('top_bar')) : ?>
	<?php get_template_part('template-parts/headers/top'); ?>
<?php endif; ?>
<?php get_template_part('template-parts/headers/header-'.vce_get_option('header_layout')); ?>
</header>

<?php if( vce_get_option( 'sticky_header' ) ): ?>
	<?php get_template_part('template-parts/headers/sticky'); ?>
<?php endif; ?>

<div id="main-wrapper">
