<?php get_header();?>	


<!-- Get link on thumbmail for social links -->
<?php $image_id = get_post_thumbnail_id();   
$image_url = wp_get_attachment_image_src($image_id,'large');  
$image_url = $image_url[0]; ?>
<section id="content"><!-- content -->
	<div class="wrapper">
	
	
	
	
	
		<div class="main_content" itemscope itemtype="http://schema.org/Article">
			<?php get_sidebar(); ?>
		<article id="main_content_post">
			<div class="include_date marginleftonly">
				<span class="the_date" itemprop="datePublished"><?php the_time('Y-m-d'); ?></span>
				<b><?php the_time('g:i'); ?></b>
			</div>
			<div id="main_div" class="single_box">
				<figure class="line_block_about">
					<span class="author_line_block_about">Автор:</span>
					<i><?php the_post();?><span itemprop="author"><?php the_author(); ?></span></i>
					<span id="category_line_block_about">Рубрика:
						<?php $current_categ = get_the_category();
							  if($current_categ) {
								foreach($current_categ as $cat){
									$current_category_name = $cat->name;
									$current_category_link = $cat->cat_ID;
						}}
						echo '<a href="'.get_category_link($current_category_link).'"><span itemprop="articleSection">'.$current_category_name.'</span></a>';
						?>
					</span>
					
					<span class="amount_of_comments nolink"><?php comments_number('Комментариев нет','1 Комментарий','% Комментариев') ?></span>
				</figure>
				
<!-- Content_which_generating_from_wordpress -->
				<h1 itemprop="name"><?php the_title(); ?></h1>			
				<div itemprop="articleBody"><?php the_content(); ?></div>
				<!-- END Content_which_generating_from_wordpress -->
				
			</div>
			<div class="sample-posts">


<script type="text/javascript">(function(w,doc) {
if (!w.__utlWdgt ) {
    w.__utlWdgt = true;
    var d = doc, s = d.createElement('script'), g = 'getElementsByTagName';
    s.type = 'text/javascript'; s.charset='UTF-8'; s.async = true;
    s.src = ('https:' == w.location.protocol ? 'https' : 'http')  + '://w.uptolike.com/widgets/v1/uptolike.js';
    var h=d[g]('body')[0];
    h.appendChild(s);
}})(window,document);
</script>
<div data-background-alpha="0.0" data-buttons-color="#ffffff" data-counter-background-color="#ffffff" data-share-counter-size="12" data-top-button="false" data-share-counter-type="common" data-share-style="8" data-mode="share" data-like-text-enable="false" data-hover-effect="scale" data-mobile-view="true" data-icon-color="#ffffff" data-orientation="horizontal" data-text-color="#000000" data-share-shape="rectangle" data-sn-ids="fb.vk.tw.ok.gp." data-share-size="30" data-background-color="#ffffff" data-preview-mobile="false" data-mobile-sn-ids="fb.vk.tw.wh.ok.gp." data-pid="1375968" data-counter-background-alpha="1.0" data-following-enable="false" data-exclude-show-more="false" data-selection-enable="true" class="uptolike-buttons" ></div>

 <h4>А вот еще интересные статьи по этой теме:</h4>
 <?php
 $categories = get_the_category($post->ID);
 if ($categories) {
 $category_ids = array();
 foreach($categories as $individual_category) 
 $category_ids[] = $individual_category->term_id;
 $args=array(
 'category__in' => $category_ids,
 'post__not_in' => array($post->ID),
 'showposts'=>5,
 'caller_get_posts'=>1);
 $my_query = new wp_query($args);
 if( $my_query->have_posts() ) {
 echo '<ul>';
 while ($my_query->have_posts()) {
 $my_query->the_post();
 ?>
 <li><a href="<?php the_permalink() ?>" rel="bookmark" 
 title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>
 <?php
 }
 echo '</ul>';
 }
 wp_reset_query();
 }
 ?></div>

            <div id="rss_div">
				<img src="<?php bloginfo('template_url'); ?>/images/rss_photo.png">
				<span id="question">Хочешь получать статьи этого блога на почту?</span>
				
			<form onsubmit="return SR_submit(this)" method="post" action="http://smartresponder.ru/subscribe.html" target="_blank" name="SR_form_2_61">
<input type="hidden" value="1" name="version">
<input type="hidden" value="0" name="tid">
<input type="hidden" value="" name="uid">
<input type="hidden" value="ru" name="lang">
<input type="hidden" value="824262" name="did[]">
<div id="optin">

    <input type="text" tabindex="900" onblur="if(this.value=='')this.value=this.defaultValue;" onfocus="if(this.value==this.defaultValue)this.value='';" value=" Имя" class="name" name="field_name_first">
    <input type="text" tabindex="901" onblur="if(this.value=='')this.value=this.defaultValue;" onfocus="if(this.value==this.defaultValue)this.value='';" value=" E-Mail" class="email" name="field_email">
    <input type="submit" value="Подписаться на рассылку!" name="SR_submitButton">
</div>
</form>
			 
				</div>
				
			
			   


<div id="n1n">
			
		
	        

<h1 itemprop="name">Комментарии по теме:</h1>
			        <?php comments_template(); ?>
				
			</div>
			
			
		</article>
	
<section id="commentators_block">


			<span>Ваш комментарий</span>
			<div id="rss_div"><div id="new_comment_block">
				<?php 
				    $commenter = wp_get_current_commenter();

		 			global $wpsmiliestrans;
					$dm_showsmiles = '';
					$dm_smiled = array();
					foreach ($wpsmiliestrans as $tag => $dm_smile) {
					    if (!in_array($dm_smile,$dm_smiled)) {
					        $dm_smiled[] = $dm_smile;
					        $tag = str_replace(' ', '', $tag);
					        $dm_showsmiles .= '<img style="margin-right: -2px;cursor:pointer;" src="'.get_bloginfo('wpurl').'/wp-includes/images/smilies/'.$dm_smile.'" alt="'.$tag.'" onclick="addsmile(\''.$tag.'\');"/> ';
					    }
					}
                ?>
                <div class="comment-respond" id="respond">
                    <?php cancel_comment_reply_link('<strong style="font-size: 18px; position: relative; top: 2px;">×</strong>&nbsp;&nbsp;Отменить ответ'); ?>
                    <?php if ( get_option('comment_registration') && !$user_ID ) : ?>
                        <p>Вы должны <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">войти</a>, чтобы оставлять комментарии.</p>
                    <?php else : ?>
                        <div class="comment_form_block">
                            <form class="comment-form" id="commentform" method="post" action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php">
                              <?php if ( $user_ID ) : ?>

                               <p class="comment-message">Вы вошли как <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Выйти">Выйти &raquo;</a></p>

                               <div class="newtextarea">
                                    <div class="smileblock">
                                        <div class="button_txt_smile"></div>
                                        <div id="smile-panel">
                                            <?php print($dm_showsmiles);?>
                                        </div>
                                    </div>
                                    <textarea aria-required="true" name="comment" placeholder="ТЕКСТ КОММЕНТАРИЯ" id="comment"></textarea>
                                </div>

                           <?php else : ?>
                                <table>
                                    <tr>
                                        <td>
                                            <div class="comment-form-author">
                                                <input type="text" size="30" placeholder="ИМЯ" name="author" id="author" value="<?php esc_attr( $commenter['comment_author'] ); ?>">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="comment-form-email">
                                                <input type="text" size="30" placeholder="E-MAIL" name="email" id="email" value="<?php  esc_attr(  $commenter['comment_author_email'] ); ?>">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="comment-form-url">
                                                <input type="text" size="30" placeholder="САЙТ" name="url" id="url" value="<?php esc_attr( $commenter['comment_author_url'] ); ?>">
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                                <div class="newtextarea">
                                    <div class="smileblock">
                                        <div class="button_txt_smile"></div>
                                        <div id="smile-panel">
                                            <?php print($dm_showsmiles);?>
                                        </div>
                                    </div>
                                    <textarea aria-required="true" name="comment" placeholder="ТЕКСТ КОМЕНТАРИЯ" id="comment"></textarea>
                                </div>
                            <?php endif; ?>
                                <p class="form-submit">
                                    <input type="submit" value="Отправить" id="submit" name="submit">
                                    <?php comment_id_fields(); ?><?php do_action('comment_form', $post->ID); ?>
                                </p>
                            </form>
                        </div>
                    <!--?php setPostViews(get_the_ID()); ?-->
<?php endif;?>
                </div>
			</div> 
			
		</section>
		<div style="clear:both;"></div>
	  </div>
		<div class="c-b"></div>	
        		
	</div><!--End .wrapper-->
</section>
<script>
	if($('.nocomments').html() == 'Комментарии запрещены') {
		$('#new_comment_block').css('display','none');
	}
	
	$('.button_txt_smile').bind('click',function(){

		if( $('#smile-panel').css('display') == 'none' ){
			$('#smile-panel').css('display','block');
		}
		else $('#smile-panel').css('display','none');
		$('#comment').focus();
	});

</script><!--End #content-->
<script type="text/javascript">
	function addsmile($smile){
		document.getElementById('comment').value=document.getElementById('comment').value+' '+$smile+' ';
		$('#smile-panel').css('display','none');
		
		// kursor v konez
		var input = document.getElementById ("comment");
		input.selectionStart = input.value.length;

		$('#comment').focus();
	}
</script>
<?php get_footer();?>

