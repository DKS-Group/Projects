<?php 
/*
    Template Name: index
*/
get_header();?>	
<section id="content"><!-- content -->
	<div class="wrapper">
		<article id="index_post_list_div">
			<ul id="list_of_article">
				<?php if(have_posts()):?>
				<?php while(have_posts()):the_post();?>
					<li itemscope itemtype="http://schema.org/BlogPosting">
						<div class="include_date">
							<span class="the_date" itemprop="datePublished"><?php echo get_the_date('d F Yг'); ?></span>
							<b><?php the_time('g:i'); ?></b>
						</div>
						<figure class="line_block_about mybrichka myposition">
							<span class="author_line_block_about">Автор:</span>
							<i class="addd" itemprop="author"><?php the_author(); ?></i>
							<a href="<?php the_permalink() ?>#new_comment_block" class="amount_of_comments"><?php comments_number('Комментариев нет','1 Комментарий','% Комментариев') ?></a>
						</figure>
						<?php if(has_post_thumbnail( )){the_post_thumbnail('article_main_photo');}?>
						<a href="<?php the_permalink(); ?>" class="article_name">
							<span itemprop="name"><?php the_title(); ?></span>
						</a>
						<span class="the_excerpt" itemprop="description">
							<?php the_content(''); ?>
						</span>
						<figure class="labels">
							<?php 								
								$catmy = get_the_category();
								$i=0;
								if($catmy){
									echo "<span>Рубрики: </span><i>";
									foreach($catmy as $category) { 
									   $tag_links_cat[$i] = '<a href="'.get_category_link($category->term_id).'"><span itemprop="articleSection">'.$category->cat_name.'</span></a>' ;
									   $i++;
									} 
									 echo join( ', ', $tag_links_cat );
								}
								else echo "<span></span>
							<i>Нет рубрик";
							?>
							</i>
							<a href="<?php the_permalink(); ?>">Читать полностью</a>
							<a class="hiddenLink" href="<?php the_permalink(); ?>#commentators_block">Комменты</a>
						</figure>
					</li> 					
				<?php endwhile;?>  
				<?php endif;?>
			</ul>
			<?php wp_corenavi(); ?>	
		</article>
		<?php get_sidebar(); ?>		
		<div class="c-b"></div>	
	</div><!--End .wrapper-->
</section><!--End #content-->
<?php get_footer();?>