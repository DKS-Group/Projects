
<?php wp_footer(); ?>
<footer>
	<article>
		<div class="wrapper">
			<div id="up_button"></div>
			
			<span id="copyright_full_footer">
				Использование материалов без согласия автора и прямой индексируемой гиперссылки на сайт запрещено.
			</span>			
				<b id="copyright_footer">© 2015 ilyavarentsov.ru </b>
<?php if ( is_active_sidebar( 'fuck-widget-area' ) ) : ?>
					<div class="contentMess">
	          			  <?php dynamic_sidebar( 'fuck-widget-area' ); ?>
	            	</div>
				<?php endif; ?>
		</div>
	</article>
	<div class="wrapper">
		<div id="liveinternet">
 			<?php if ( is_active_sidebar( 'fa-widget-area' ) ) : ?>
	            <?php dynamic_sidebar( 'fa-widget-area' ); ?>
			<?php endif; ?>
		 </div>
		<nav id="footer_menu">
				<?php wp_nav_menu( array( 'theme_location' => 'header-menu-top','container' => '' ) ); ?>
		</nav>
		<figure id="develop">						
		</figure>
		<div class="c-b"></div>

    </div><!--End .wrapper-->
</footer><!--End #footer-->
<script>
	$(document).ready(function(){ 
		//Исправляет баги в мобильных версиях сайта
	(function(doc) {
			var addEvent = 'addEventListener',
				type = 'gesturestart',
				qsa = 'querySelectorAll',
				scales = [1, 1],
				meta = qsa in doc ? doc[qsa]('meta[name=viewport]') : [];

			function fix() {
				meta.content = 'width=device-width,minimum-scale=' + scales[0] + ',maximum-scale=' + scales[1];
				doc.removeEventListener(type, fix, true);
			}

			if ((meta = meta[meta.length - 1]) && addEvent in doc) {
				fix();
				scales = [.25, 1.5];
				doc[addEvent](type, fix, true);
			}
	}(document));
		ScrollUp();
		var nav_x;
		var nav_y;
		var test_nav;
		if($(window).width() < 770) {
			nav_x = $('.navigation').width();
			nav_y = $(window).width();
			test_nav = nav_y / 2  - nav_x / 2;
			test_nav = test_nav - 15;
			$('.navigation').css('margin-left', test_nav+'px');
		}
		else {
			nav_x = $('.navigation').width();
			nav_y = $('#index_post_list_div').width();
			test_nav = nav_y / 2  - nav_x / 2;
			test_nav = test_nav - 15;
			$('.navigation').css('margin-left', test_nav+'px');
		}
		$(window).resize(function(){
			if($(window).width() < 770) {
				nav_x = $('.navigation').width();
				nav_y = $(window).width();
				test_nav = nav_y / 2  - nav_x / 2;
				test_nav = test_nav - 15;
				$('.navigation').css('margin-left', test_nav+'px');
			}
			else {
				nav_x = $('.navigation').width();
				nav_y = $('#index_post_list_div').width();
				test_nav = nav_y / 2  - nav_x / 2;
				test_nav = test_nav - 15;
				$('.navigation').css('margin-left', test_nav+'px');
			}
		});
		
		var perev = 0;
		
	});
    function GoTo(link){
        window.open(link.replace("_","http://"));
    }
</script>
<script>
	$(function() {
  $('#menu_open_link').click(function() {
    if($('.menu').is(':visible')) {
      $('.menu').removeClass('showitems'); 
    }
    else {
      $('.menu').addClass('showitems'); 
    }   
 }); 
});


</script>
<script type="text/javascript" src="http://ilyavarentsov.ru/simplebox_util.js"></script>
<script type="text/javascript">
(function(){
var boxes=[],els,i,l;
if(document.querySelectorAll){
els=document.querySelectorAll('a[rel=simplebox]');	
Box.getStyles('simplebox_css','http://ilyavarentsov.ru/simplebox.css');
Box.getScripts('simplebox_js','http://ilyavarentsov.ru/simplebox.js',function(){
simplebox.init();
for(i=0,l=els.length;i<l;++i)
simplebox.start(els[i]);
simplebox.start('a[rel=simplebox_group]');			
});
}
})();</script>
</body>
</html>

