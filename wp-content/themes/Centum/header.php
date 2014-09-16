<!DOCTYPE html>
<!--[if IE 7 ]><html class="ie ie7" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 8 ]><html class="ie ie8" <?php language_attributes(); ?>><![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html <?php language_attributes(); ?>><!--<![endif]-->
<head>
<!-- Basic Page Needs
	================================================== -->

	<meta charset ="<?php bloginfo('charset'); ?>" />
	<title><?php  wp_title('',true);  ?></title>

	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo ot_get_option('incr_favicon_upload', get_template_directory_uri().'/images/favicon.ico')?>" />
<!-- Mobile Specific
================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- CSS
	================================================== -->
	<link rel="stylesheet" media="screen, print" href="<?php bloginfo('stylesheet_url'); ?>" />
	<?php
	 $style = get_theme_mod( 'centum_layout_style', 'boxed' ) ;
	 $scheme = get_theme_mod( 'centum_scheme_switch', 'light' ) ;
	?>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/<?php echo $scheme.$style; ?>.css" type="text/css" media="screen" id="layout"/>
<!-- Java Script
	================================================== -->

	<?php if (is_singular()) wp_enqueue_script('comment-reply');

	wp_enqueue_script('jquery');
	wp_head(); ?>


</head>
  <body <?php body_class(); ?>>
<!-- Wrapper Start -->
<div id="wrapper">


<!-- Header
================================================== -->

<!-- 960 Container -->
<div class="container ie-dropdown-fix">

<!-- Header -->
	<div id="header">
		<?php
				$logo_area_width = ot_get_option('logo_area_width',8);
				$menu_area_width = 16 - $logo_area_width;
			?>
		<!-- Logo -->
		<div class="<?php echo incr_number_to_width($logo_area_width); ?>  columns">
			<div id="logo">
				<?php  $logo = ot_get_option( 'logo_upload' );
				if($logo) { ?>
					<?php if(is_front_page()){ ?>
					<h1><a href="<?php echo home_url('/'); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home">
						<img src="<?php echo $logo; ?>" alt="<?php bloginfo('name'); ?>"/>
					</a></h1>
					<?php } else { ?>
					<a href="<?php echo home_url('/'); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home">
						<img src="<?php echo $logo; ?>" alt="<?php bloginfo('name'); ?>"/>
					</a>
					<?php } ?>

				<?php } else { ?>
					<?php if(is_front_page()) { ?>
						<h1 class="logo">
							<a href="<?php echo home_url('/'); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home"><?php bloginfo('name'); ?></a>
						</h1>
					<?php } else { ?>
						<h2 class="logo">
							<a href="<?php echo home_url('/'); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home"><?php bloginfo('name'); ?></a>
						</h2>
					<?php } ?>
				<?php } ?>
				<?php if(get_theme_mod('centum_tagline_switch','show') == 'show') { ?><div id="tagline"><?php echo get_bloginfo ( 'description' ); ?></div><?php } ?>
				<div class="clear"></div>
			</div>
		</div>
		<?php if($menu_area_width != 0){ ?>
		<!-- Social / Contact -->
		<div class="<?php echo incr_number_to_width($menu_area_width); ?>  columns">

			<?php /* get the slider array */
				$footericons = ot_get_option( 'headericons', array() );
				if ( !empty( $footericons ) ) {
					echo '<ul class="social-icons">';
					foreach( $footericons as $icon ) {
						echo '<li class="' . $icon['icons_service'] . '"><a target="_blank" title="' . $icon['title'] . '" href="' . $icon['icons_url'] . '">' . $icon['icons_service'] . '</a></li>';
					}
					echo '</ul>';
				}
			?>


			<div class="clear"></div>
			
			<div class="mini">
			<?php 
				wp_nav_menu(array(
				'theme_location' => 'mini', // menu slug
				'container' => false, // 'div' container will not be added
				'menu_class' => 'nav', // <ul class="nav"> 
				'fallback_cb' => 'default_mini', // name of default function
				));
			?>
			</div>
			
			<?php
			if(ot_get_option( 'centum_contact_details') == 'yes') {
				$email = ot_get_option( 'centum_cdetails_email');
				$phone = ot_get_option( 'centum_cdetails_phone');
			?>
			<!-- Contact Details -->
			<div id="contact-details">
				<ul>
					<?php if($email) { ?><li><i class="mini-ico-envelope"></i><a href="mailto:<?php echo $email ;?>"><?php echo $email ;?></a></li><?php } ?>
					<?php if($phone) { ?><li><i class="mini-ico-user"></i><?php echo $phone ;?></li><?php } ?>
				</ul>
			</div>
			<?php } ?>
			<?php if(ot_get_option('centum_wpml_switcher') == "yes")  do_action('icl_language_selector'); ?>
		</div>
		<?php } ?>

	</div>
	<!-- Header / End -->

<!-- Navigation -->
	<div class="sixteen columns">

		<div id="navigation">
			<?php
					$menu = wp_nav_menu(
						array(
							'theme_location' => 'mainmenu',
							'echo' => 0,
							'menu_class' => 'dropmenu main-menu',
							'container_id' => 'mainmenu-cont',
							'fallback_cb' => 'magnovus_menu_fb')
						);

					$menu = str_replace("\n", "", $menu);
					$menu = str_replace("\r", "", $menu);
					echo $menu; ?>
			<?php
				wp_nav_menu(array(
					'theme_location' => 'mainmenu',
					'walker'         => new Walker_Nav_Menu_Dropdown(),
					'items_wrap'     => '<select class="selectnav"><option value="/">'.__('Select Page','purepress').'</option>%3$s</select>',
					'container' => false,
					'menu_class' => 'selectnav',

					)); ?>

			<!-- Search Form -->
		<?php if(ot_get_option('centum_search') != "disable") { ?>
			<div class="search-form">
				<form action=" <?php echo home_url(); ?> " id="searchform" method="get">
					<input type="text" class="search-text-box"   name="s">
				</form>
			</div>
			<?php } ?>
		</div>
		<div class="clear"></div>

	</div>
	<!-- Navigation / End -->
</div>
<!-- 960 Container / End -->