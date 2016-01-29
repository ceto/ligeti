<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package Ligeti
 * @since Ligeti 1.0
 */
?><!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title><?php wp_title( '|', true, 'right' ); ?></title>

<meta property="fb:app_id" content="{155467497952402}"/>

<link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<script src="<?php echo get_template_directory_uri(); ?>/js/vendor/modernizr-2.6.2.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="<?php echo get_template_directory_uri(); ?>/js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
<?php wp_head(); ?>


</head>

<body <?php body_class(); ?>>
<!--[if lt IE 7]>
    <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
<![endif]-->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=155467497952402";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<a name="top"></a>
<div class="sitewrap">
<div class="hfeed site layout">
	<?php do_action( 'before' ); ?>
	<div class="left-panel clearfix">
		<header id="masthead" class="site-header clearfix" role="banner">
			<hgroup>
				<h1 class="site-title">
					<a class="site-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
						<?php // bloginfo( 'name' ); ?>
					<img src="<?php echo get_template_directory_uri(); ?>/images/ligetilogo-light.png" alt="<?php bloginfo( 'name' ); ?>" />
					</a>
				</h1>
				<h3 class="site-description"><?php bloginfo( 'description' ); ?></h3>
			</hgroup>
			<div id="nav-toggle-cont">
				<a class="small-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
						<?php // bloginfo( 'name' ); ?>
					<img src="<?php echo get_template_directory_uri(); ?>/images/femes_logo.png" alt="<?php bloginfo( 'name' ); ?>" />
				</a><i id="nav-toggle" class="icon-align-justify"></i>
			</div>
			<nav id="nav" class="navigation-main" role="navigation">
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'main-menu clearfix' ) ); ?>
			</nav><!-- #site-navigation -->
			<?php get_sidebar('leftbottom'); ?>
			<?php // wp_nav_menu( array( 'theme_location' => 'leftbottom', 'menu_class' => 'leftbottom-menu clearfix' ) ); ?>
			<div class="menu-left-bottom-container">
			<p>© <?= date('Y'); ?> <a href="http://ligetidesign.hu/">Ligeti Design</a> <span class="sep"> | </span>
			Minden jog fenntartva<br>
			Honlap: <a href="http://hydrogene.hu" rel="designer">Hydrogene</a></p>
			</div>
		</header><!-- .site-header -->
	</div><!-- .leftpanel .span3-->

	<div id="main" class="site-main right-panel clearfix">
