<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="page" class="hfeed site">
		<header id="masthead" class="site-header">
			<div id="top">
				<div class="row-container">
					<div class="container-fluid">
						<div class="row-fluid">
							<div class="moduletable   span8">
								<div class="module_container">
									<div class="mod-menu">
										<ul class="nav menu contact_info">
											<li class="item-280">
												<a href="#" onclick="popupWin = window.open('/wp-content/themes/twentythirteen/call.php', 'contacts', 'location,width=400,height=330,top=0'); popupWin.focus();">
													<img src="/wp-content/themes/twentythirteen/images/call.png" alt="ЗАКАЗАТЬ ЗВОНОК"/>
													<span class="image-title">ЗАКАЗАТЬ ЗВОНОК</span> 
												</a>
											</li>
											<li class="item-281">
												<a href="mailto:email@example.org">
													<img src="/wp-content/themes/twentythirteen/images/email.png" alt="email@example.org"/>
													<span class="__cf_email__">email@example.org</span>
												</a>
											</li>
											<li class="item-282">
												<span class="separator">
													<img src="/wp-content/themes/twentythirteen/images/call.png" alt="+1 800 559 6580"/>
													<span class="image-title">+1 800 559 6580</span> 
												</span>
											</li> 
										</ul>
									</div>
								</div>
							</div>
							<div class="moduletable   span4">
								<div class="module_container">
									<div class="mod-menu mod-menu__social">
										<ul class="nav menu social pull-right">
											<li class="item-148">
												<a class="fa fa-facebook" href="https://www.facebook.com/pages/3737-Show-Group/272590692817762?fref=ts" title="Facebook" target="_blank"></a>
											</li>
											<li class="item-149">
												<a class="fa fa-vk" href="https://vk.com/animatory_mimy" title="Vkontakte" target="_blank"></a>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="main-menu non-fixed">
				<div class="row-fluid">
					<div id="name-site" class="span4">
						<a class="home-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
							<h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
						</a>
					</div>
					<nav class="moduletable span8">
						<div class="module_container">
							<div class="icemegamenu">
								<div class="nav-collapse icemegamenu collapse left ">
									<?php 
										wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu non-fixed', 'menu_id' => 'icemegamenu', 'items_wrap'      => '<ul id="%1$s" class="%2$s"><span class="icemega_title icemega_nosubtitle">%3$s</span></ul>') ); 
									?>
									<div class="search">
										<?php get_search_form(); ?>
									</div>
								</div>
							</div>
							<script type="text/javascript">
								jQuery(document).ready(function(){
									var browser_width1 = jQuery(window).width();
									jQuery("#icemegamenu").find(".icesubMenu").each(function(index){
										var offset1 = jQuery(this).offset();
										var xwidth1 = offset1.left + jQuery(this).width();
										if(xwidth1 >= browser_width1){
											jQuery(this).addClass("ice_righttoleft");
										}
									});
									
								})
								jQuery(window).resize(function() {
									var browser_width = jQuery(window).width();
									jQuery("#icemegamenu").find(".icesubMenu").removeClass("ice_righttoleft");
									jQuery("#icemegamenu").find(".icesubMenu").each(function(index){
										var offset = jQuery(this).offset();
										var xwidth = offset.left + jQuery(this).width();
										
										if(xwidth >= browser_width){
											jQuery(this).addClass("ice_righttoleft");
										}
									});
								});
							</script>
							<script>
							  var h_hght = 38; // высота шапки
							  var h_mrg = 0;    // отступ когда шапка уже не видна
							  
							   jQuery(window).scroll(function(){
							      var top = jQuery(this).scrollTop();
							      if (top+h_mrg < h_hght) {
							       	jQuery("#icemegamenu").removeClass("fixed");
							       	jQuery("#icemegamenu").addClass("non-fixed");
							       	jQuery(".main-menu").removeClass("fixed");
							       	jQuery(".main-menu").addClass("non-fixed");

							      } else {
							      	jQuery("#icemegamenu").removeClass("non-fixed");
							       	jQuery("#icemegamenu").addClass("fixed");
							       	jQuery(".main-menu").removeClass("non-fixed");
							       	jQuery(".main-menu").addClass("fixed");
							      }
							    });
							 
							</script>
						</div>
					</nav>
				</div>
			</div>
		</header><!-- #masthead -->

		<div id="main" class="site-main">
