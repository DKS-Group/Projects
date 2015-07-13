 <!DOCTYPE HTML>
<html>
<head>	
	<meta charset="utf-8">				
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
	<title><?php bloginfo('name') ?><?php wp_title( ' | ', true, 'left' ); ?></title>
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
		<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
		<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
		<link rel="alternate" type="application/atom+xml" title="Athom 0.3" href="<?php bloginfo('athom_url'); ?>" />
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
		<?php
		// Required for nested reply function that moves reply inline with JS
		if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
		?>	
		<!--[if IE]>
			<script type="text/javascript" href="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
			<link rel="stylesheet" type="text/css" href="all-ie-only.css" />
		<![endif]-->
		<script>
			function ScrollUp(){
				$("#up_button").hide();
				$(function () {
					$(window).scroll(function () {
						if ($(this).scrollTop() > 50) {
							$('#up_button').fadeIn();
						} else {
							$('#up_button').fadeOut();
							}
					});
				$('#up_button').click(function () {
					$('body,html').animate({
						scrollTop: 0
					}, 800);
					return false;
					});
				});
			}
		</script>
		<?php  /*   including jquery   */
			  wp_deregister_script('jquery');  
			  wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"), false, '1.7.2');  
			  wp_enqueue_script('jquery');  
		?>  	
	<?php wp_head(); ?>	
</head>
<body <?php body_class(); ?>>
<header id="header">
   <div id="head">
	    <div class="wrapper">
		    <div id="wrap_r">
		        <!--<a href="<?php bloginfo('url'); ?>" id="logo-site"><img src="<?php bloginfo('template_url'); ?>/images/logo.png"></a>-->
			    <?php if ( get_header_image() ) : ?>
			    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" id="logo-site"><img src="<?php header_image(); ?>" class="header-image" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt=""></a>
			    <?php endif; ?>
		        <span id="site-description"><?php bloginfo('description'); ?></span>
	        </div>
        </div>	
</div><!--End .wrapper-->
    <div class="all-width">
    	<div class="wrapper">
    		<nav role="navigation">
				<ul class="menu-search-hidden">
					<li><?php get_search_form(); ?></li>
					<li id="menu_open_link">Меню</li>
				</ul>
				<?php wp_nav_menu( array( 'theme_location' => 'header-menu-top','container' => '' ) ); ?>
			</nav>
    	</div>
    </div>
</header><!--End #header-->

