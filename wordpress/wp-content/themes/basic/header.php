<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php themify_body_start(); // hook ?>
<div id="pagewrap" class="hfeed site">

	<div id="headerwrap">

		<?php themify_header_before(); // hook ?>
		<header id="header" class="pagewidth" itemscope="itemscope" itemtype="https://schema.org/WPHeader">
        <?php themify_header_start(); // hook ?>
			<hgroup>
				<?php echo themify_logo_image('site_logo'), themify_site_description();?>
			</hgroup>

			<nav id="main-nav-wrap" itemscope="itemscope" itemtype="https://schema.org/SiteNavigationElement">
				<div id="menu-icon" class="mobile-button"><span class="menu-icon-inner"></span></div>
				<?php
				    themify_menu_nav( array(
					    'theme_location' => 'main-nav',
					    'fallback_cb'    => 'themify_default_main_nav',
					    'container'      => '',
					    'menu_id'        => 'main-nav',
					    'menu_class'     => 'main-nav'
				    ));
				?>
				<!-- /#main-nav -->
			</nav>

			<?php if(!themify_check('setting-exclude_search_form')): ?>
				<?php get_search_form(); ?>
			<?php endif ?>

			<div class="social-widget">
				<?php
				    dynamic_sidebar('social-widget');
				    themify_theme_feed(array('text'=>'RSS','icon'=>'fas rss-square'));
				?>
			</div>
			<!-- /.social-widget -->
		<?php themify_header_end(); // hook ?>
		</header>
		<!-- /#header -->
        <?php themify_header_after(); // hook ?>

	</div>
	<!-- /#headerwrap -->

	<div id="body" class="clearfix">
    <?php themify_layout_before(); //hook
