


<?php get_header();?>	
<section id="content"><!-- content -->
	<div class="wrapper">
		<article id="main_content">
		<div class="mainphoto-page"><?php if(has_post_thumbnail( )){the_post_thumbnail('article_main_photo');}?></div>
			<?php 
				while ( have_posts() ) : the_post();
				the_content(); ?><?php endwhile; ?>
		</article>
<?php get_sidebar(); ?>		
		<div class="c-b"></div>	
</section>
<?php comments_template(); ?>	
	</div><!--End .wrapper-->
</section><!--End #content-->
<?php get_footer();?>