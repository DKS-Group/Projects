<div class="sidecont rightsector">
<div class="sidebar sidebar-top">
  <div id="topsearch" > 
    		<?php get_search_form(); ?> 
    	</div>
	

			<ul>
				<?php 
						if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Top Sidebar') ) : ?>
	
					<li><h2><?php _e('Недавние записи'); ?></h2>
				               <ul>
						<?php wp_get_archives('type=postbypost&limit=5'); ?>  
				               </ul>
					</li>
                    
				<li> 
						<h2>Календарь</h2>
						<?php get_calendar(); ?> 
					</li>

				
					
					
					
					<?php include (TEMPLATEPATH . '/recent-comments.php'); ?>
				<?php if (function_exists('get_recent_comments')) { get_recent_comments(); } ?>
				
						
					
					
				<?php endif; ?>
			</ul>
			
				</div>