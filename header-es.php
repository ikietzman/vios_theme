<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

	<head>
		<meta charset="utf-8">

		<?php // force Internet Explorer to use the latest rendering engine available ?>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<title><?php wp_title(''); ?></title>

		<?php // mobile meta (hooray!) ?>
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1"/>

		<?php // icons & favicons (for more: http://www.jonathantneal.com/blog/understand-the-favicon/) ?>
		<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/library/images/apple-touch-icon.png">
		<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
		<!--[if IE]>
			<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
		<![endif]-->
		<?php // or, set /favicon.ico for IE10 win ?>
		<meta name="msapplication-TileColor" content="#f01d4f">
		<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/library/images/win8-tile-icon.png">
            <meta name="theme-color" content="#121212">

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">


		<?php // wordpress head functions ?>
		<?php wp_head(); ?>
		<?php // end of wordpress head ?>
		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/library/js/libs/slick.min.js"></script>

		<?php // drop Google Analytics Here ?>
		<?php // end analytics ?>

		<!-- Google Tag Manager -->
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','GTM-KC7GW5G');</script>
		<!-- End Google Tag Manager -->

		<!-- Global site tag (gtag.js) - Google Ads: 931740869 --> <script async src="https://www.googletagmanager.com/gtag/js?id=AW-931740869"></script> <script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'AW-931740869'); </script>



	</head>

	<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">
		<!-- Google Tag Manager (noscript) -->
		<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KC7GW5G"
		height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
		<!-- End Google Tag Manager (noscript) -->
		<!-- <div id="mobile-menu-btn">
			<span id="mobile-menu-btn-inner">

			</span>
		</div> -->
		<div id="container">

			<header class="header header-cn" role="banner" itemscope itemtype="http://schema.org/WPHeader">

				<div id="upper_header" class="wrap cf">
					<div id="upper_header_phone">
						<div>
							<span class="upper_header_phone_title"><?php the_field('spanish_phone_1_name', 'option'); ?></span>
							<?php the_field('spanish_phone_1_number', 'option'); ?>
						</div>
						<div>
							<span class="upper_header_phone_title"><?php the_field('spanish_phone_2_name', 'option'); ?></span>
							<?php the_field('spanish_phone_2_number', 'option'); ?>
						</div>
					</div>

					<?php
						if( have_rows('spanish_social_media_icons', 'option') ):
							echo '<div class="social_media_menu"><div class="sm-icons">';
						    while ( have_rows('spanish_social_media_icons', 'option') ) : the_row();
						        echo '<a href="' . get_sub_field('link') . '"><img src="'. get_sub_field('icon') . '" /></a>';

						    endwhile;
						    echo '</div><div><a href="https://patientportal.viosnetwork.com " target="_blank" class="blue-btn">患者網頁</a></div>';
						    echo '</div>';
						endif;
					?>
				</div>

				<div id="inner-header" class="wrap cf">
					<?php
						$current_url = str_split('http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
					?>
					<?php
						if( have_rows('international_links', 'option') ):
							echo '<div class="international_links">';
						    while ( have_rows('international_links', 'option') ) : the_row();
								$arr = str_split(get_sub_field('link'));
									if ($current_url[25].$current_url[26] != $arr[26].$arr[27]) :
						        echo '<a href="' . get_sub_field('link') . '" target="_blank">' . get_sub_field('label') . '</a>';
									endif;
						    endwhile;
						    echo '</div>';
						endif;
					?>
					<?php // to use a image just replace the bloginfo('name') with your img src and remove the surrounding <p> ?>
					<p id="logo" class="h1" itemscope itemtype="http://schema.org/Organization"><a href="<?php echo home_url(); ?>" rel="nofollow"><img src="<?php the_field('spanish_logo', 'option'); ?>" /></a></p>

					<?php // if you'd like to use the site description you can un-comment it below ?>
					<?php // bloginfo('description'); ?>


					<nav role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
						<?php wp_nav_menu(array(
    					         'container' => false,                           // remove nav container
    					         'container_class' => 'menu cf',                 // class of container (should you choose to use it)
    					         'menu' => __( 'The Main Menu for /cn', 'bonestheme' ),  // nav name
    					         'menu_class' => 'nav top-nav cf',               // adding custom nav class
    					         'theme_location' => 'main-nav-cn',                 // where it's located in the theme
    					         'before' => '',                                 // before the menu
        			               'after' => '',                                  // after the menu
        			               'link_before' => '',                            // before each link
        			               'link_after' => '',                             // after each link
        			               'depth' => 0,                                   // limit the depth of the nav
    					         'fallback_cb' => ''                             // fallback function (if there is one)
						)); ?>

					</nav>

				</div>

			</header>
