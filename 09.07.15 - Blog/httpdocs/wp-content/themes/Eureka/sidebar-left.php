<div class="sidebar sidebar-left">
		
			<ul>
				<?php 
						if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Left Sidebar') ) : ?>
	
                    
				<?php wp_list_categories('hide_empty=1&show_count=0&depth=1&title_li=<h2>Рубрики</h2>'); ?>
				
			<?php endif; ?>
			</ul>
			
		
		</div>