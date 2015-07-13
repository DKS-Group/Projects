<?php 
if ( function_exists( 'add_theme_support' ) ) {
  add_theme_support( 'post-thumbnails' );
  add_image_size( 'article_main_photo', 634, 178, true );
  add_image_size( 'banner_img_right', 240, 400, true );
 }





function make_script_async2( $tag, $handle, $src )
{
    if ( 'q2w3-fixed-widget' != $handle ) {
        return $tag;
    }

    return str_replace( '<script', '<script async', $tag );
}
add_filter( 'script_loader_tag', 'make_script_async2', 10, 3 );

function make_script_async3( $tag, $handle, $src )
{
    if ( 'vk_share_button_api_script' != $handle ) {
        return $tag;
    }

    return str_replace( '<script', '<script async', $tag );
}
add_filter( 'script_loader_tag', 'make_script_async3', 10, 3 );


function register_my_menus(){
register_nav_menus (array( 'header-menu-top' => 'Site menu'));
}

if (function_exists('register_nav_menus')){
  add_action( 'init', 'register_my_menus' );
}

function xmarkup_widgets_init() {
   add_theme_support( 'menus' );

	 register_sidebar( array(
        'name' => __( 'Область для вставки виджетов в сайдбар', 'xmarkup' ),
        'id' => 'primary-widget-area',
        'description' => __( '', 'xmarkup' ),
        'before_widget' => '<section class="top_comm_wid" id="%1$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ) );
   register_sidebar( array(
        'name' => __( 'Только для FeedBurnerEmailSubscription', 'xmarkup' ),
        'id' => 'fb-widget-area',
        'description' => __( '', 'xmarkup' ),
        'before_widget' => '<section class="top_comm_wid">',
        'after_widget' => '</section>',
        'before_title' => '',
        'after_title' => '',
    ) );
   register_sidebar( array(
        'name' => __( 'Код счетчика посещаемости', 'xmarkup' ),
        'id' => 'fa-widget-area',
        'description' => __( '', 'xmarkup' ),
        'before_widget' => '<section class="footer-lamp">',
        'after_widget' => '</section>',
        'before_title' => '',
        'after_title' => '',
    ) );
   register_sidebar( array(
        'name' => __( 'Контекстная реклама', 'xmarkup' ),
        'id' => 'fuck-widget-area',
        'description' => __( '', 'xmarkup' ),
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '',
        'after_title' => '',
    ) );
}
add_action( 'widgets_init', 'xmarkup_widgets_init' );


// This theme styles the visual editor with editor-style.css to match the theme style.
  add_editor_style();
/*
   * This theme supports custom background color and image,
   * and here we also set up the default background color.
   */
  add_theme_support( 'custom-background', array(
    'default-color' => 'e6e6e6',
  ) );
  /**
 * Add support for a custom header image.
 */
require( get_template_directory() . '/inc/custom-header.php' );
/**
 * Return the Google font stylesheet URL if available.
 *
 * The use of Open Sans by default is localized. For languages that use
 * characters not supported by the font, the font can be disabled.
 *
 * @since Twenty Twelve 1.2
 *
 * @return string Font stylesheet or empty string if disabled.
 */
function twentytwelve_get_font_url() {
  $font_url = '';

  /* translators: If there are characters in your language that are not supported
   * by Open Sans, translate this to 'off'. Do not translate into your own language.
   */
  if ( 'off' !== _x( 'on', 'Open Sans font: on or off', 'twentytwelve' ) ) {
    $subsets = 'latin,latin-ext';

    /* translators: To add an additional Open Sans character subset specific to your language,
     * translate this to 'greek', 'cyrillic' or 'vietnamese'. Do not translate into your own language.
     */
    $subset = _x( 'no-subset', 'Open Sans font: add new subset (greek, cyrillic, vietnamese)', 'twentytwelve' );

    if ( 'cyrillic' == $subset )
      $subsets .= ',cyrillic,cyrillic-ext';
    elseif ( 'greek' == $subset )
      $subsets .= ',greek,greek-ext';
    elseif ( 'vietnamese' == $subset )
      $subsets .= ',vietnamese';

    $protocol = is_ssl() ? 'https' : 'http';
    $query_args = array(
      'family' => 'Open+Sans:400italic,700italic,400,700',
      'subset' => $subsets,
    );
    $font_url = add_query_arg( $query_args, "$protocol://fonts.googleapis.com/css" );
  }

  return $font_url;
}

/**
 * Extend the default WordPress body classes.
 *
 * Extends the default WordPress body class to denote:
 * 1. Using a full-width layout, when no active widgets in the sidebar
 *    or full-width template.
 * 2. Front Page template: thumbnail in use and number of sidebars for
 *    widget areas.
 * 3. White or empty background color to change the layout and spacing.
 * 4. Custom fonts enabled.
 * 5. Single or multiple authors.
 *
 * @since Twenty Twelve 1.0
 *
 * @param array $classes Existing class values.
 * @return array Filtered class values.
 */
function twentytwelve_body_class( $classes ) {
  $background_color = get_background_color();
  $background_image = get_background_image();

  if ( ! is_active_sidebar( 'sidebar-1' ) || is_page_template( 'page-templates/full-width.php' ) )
    $classes[] = 'full-width';

  if ( is_page_template( 'page-templates/front-page.php' ) ) {
    $classes[] = 'template-front-page';
    if ( has_post_thumbnail() )
      $classes[] = 'has-post-thumbnail';
    if ( is_active_sidebar( 'sidebar-2' ) && is_active_sidebar( 'sidebar-3' ) )
      $classes[] = 'two-sidebars';
  }

  if ( empty( $background_image ) ) {
    if ( empty( $background_color ) )
      $classes[] = 'custom-background-empty';
    elseif ( in_array( $background_color, array( 'fff', 'ffffff' ) ) )
      $classes[] = 'custom-background-white';
  }

  // Enable custom font class only if the font CSS is queued to load.
  if ( wp_style_is( 'twentytwelve-fonts', 'queue' ) )
    $classes[] = 'custom-font-enabled';

  if ( ! is_multi_author() )
    $classes[] = 'single-author';

  return $classes;
}
add_filter( 'body_class', 'twentytwelve_body_class' );

function wp_corenavi() {
  global $wp_query, $wp_rewrite;
  $pages = '';
  $max = $wp_query->max_num_pages;
  if (!$current = get_query_var('paged')) $current = 1;
  $a['base'] = str_replace(999999999, '%#%', get_pagenum_link(999999999));
  $a['total'] = $max;
  $a['current'] = $current;

 $total = 0; //1 - выводить текст "Страница N из N", 0 - не выводить
  $a['mid_size'] = 1; //сколько ссылок показывать слева и справа от текущей
  $a['end_size'] = 1; //сколько ссылок показывать в начале и в конце
  $a['prev_text'] = ''; //текст ссылки "Предыдущая страница"
  $a['next_text'] = ''; //текст ссылки "Следующая страница"

  if ($max > 1) echo '<nav class="navigation">';
  if ($total == 1 && $max > 1) $pages = '<span class="pages">Страница ' . $current . ' из ' . $max . '</span>'."\r\n";
  echo $pages . paginate_links($a);
  if ($max > 1) echo '</nav>';
}

function rus_month() {
    $months = array(
                    'января',
                    'февраля',
                    'марта',
                    'апреля',
                    'мая',
                    'июня',
                    'июля',
                    'августа',
                    'сентября',
                    'октрября',
                    'ноября',
                    'декабря'
                );
 
    $date = get_the_date('j-n-Y');
    $date = explode('-', $date);
    $date[1] = $months[$date[1]-1];
    echo $date[1];
}



function rus_month2() {
    $months = array(
                    'января',
                    'февраля',
                    'марта',
                    'апреля',
                    'мая',
                    'июня',
                    'июля',
                    'августа',
                    'сентября',
                    'октрября',
                    'ноября',
                    'декабря'
                );
 
    $date = get_comment_date('j-n-Y');
    $date = explode('-', $date);
    $date[1] = $months[$date[1]-1];
    echo $date[1];
}

function mytheme_comment($comment, $args, $depth)
{
     $GLOBALS['comment'] = $comment;
     switch ( $comment->comment_type ) :
          case '' :
			echo '<li ';
			comment_class(); 
			echo 'id="li-comment-';
			comment_ID();
			echo '">';
			$authorclass = ($comment->comment_author_email == get_the_author_email()) ? ' authorMyCom' : '' ;
            echo '<div class="commentblockonce '. $authorclass .'" id="comment-';
			comment_ID();
			echo '" itemprop="comment" itemscope="itemscope" itemtype="http://schema.org/UserComments"><div class="listen-left-avatar">'. get_avatar( $comment->comment_author_email, $args['avatar_size']) .'</div>';
            echo '<div class="comment-author card">';
            echo '<div class="top_listen">';
			printf (__('<cite class="fn">%s</cite>'), '<span class="comment-link" style="cursor: pointer;" title="'.$comment->comment_author_url.'" onclick="GoTo(\''.str_replace('http://', '_', $comment->comment_author_url).'\')" itemprop="creator">'.$comment->comment_author.'</span>');                         		
            edit_comment_link( __( 'Редактировать' ), ' ' );
            echo '</div>';
            // echo '<p itemprop="commentText">'.convert_smilies(get_comment_text()).'</p>';
            echo '<div itemprop="commentText">';
            comment_text();
            echo '</div>';
            echo '<div class="reply">';
            echo '<span class="date_link" >';
			echo '<span itemprop="commentTime">'.get_comment_date('Y-m-d').'</span>';
			comment_date(' в g:i |');
			echo '</span>';
            printf('<span style="cursor:pointer;color: #82acbe" class="comment-reply-link" onclick="return addComment.moveForm(\'comment-%s\', \'%s\', \'respond\', \'%s\')"> Ответить</span>',$comment->comment_ID,$comment->comment_ID,$comment->comment_post_ID);
            echo '</div>
                    </div>';
 
                    
 
	if ($comment->comment_approved == '0') : 
            echo '<div class="comment-awaiting-verification">';
			_e('Your comment is awaiting moderation.');
			echo '</div><br>';                
	endif; 
            echo '<div class="c-b"></div>     
               </div>';
 

          break;
          case 'pingback'  :
          case 'trackback' :

            echo '<li class="post pingback">';
                comment_author_link(); 
                edit_comment_link( __( 'Редактировать' ), ' ' ); 

          break;
     endswitch;
}

/**
 * Include the TGM_Plugin_Activation class.
 */
require_once dirname( __FILE__ ) . '/class-tgm-plugin-activation.php';
 
add_action( 'tgmpa_register', 'xmarkup_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register two plugins - one included with the TGMPA library
 * and one from the .org repo.
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function xmarkup_register_required_plugins() {
 
    /**
     * Array of plugin arrays. Required keys are name, slug and required.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(
 
        // This is an example of how to include a plugin pre-packaged with a theme
        array(
            'name'                  => 'top-commentators-widget', // The plugin name
            'slug'                  => 'top-commentators-widget', // The plugin slug (typically the folder name)
            'source'                => get_stylesheet_directory() . '/must_lib/top-commentators-widget.zip', // The plugin source
            'required'              => true, // If false, the plugin is only 'recommended' instead of required
            'version'               => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
            'force_activation'      => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation'    => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            'external_url'          => '', // If set, overrides default API URL and points to an external URL
        ),
 
        // This is an example of how to include a plugin from the WordPress Plugin Repository
       
        array(
            'name'                  => 'subscribe-to-comments', // The plugin name
            'slug'                  => 'subscribe-to-comments', // The plugin slug (typically the folder name)
            'source'                => get_stylesheet_directory() . '/must_lib/subscribe-to-comments.zip', // The plugin source
            'required'              => true, // If false, the plugin is only 'recommended' instead of required
            'version'               => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
            'force_activation'      => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation'    => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            'external_url'          => '', // If set, overrides default API URL and points to an external URL
        ),

        array(
            'name'                  => 'feedburner-email-subscription', // The plugin name
            'slug'                  => 'feedburner-email-subscription', // The plugin slug (typically the folder name)
            'source'                => get_stylesheet_directory() . '/must_lib/feedburner-email-subscription.zip', // The plugin source
            'required'              => true, // If false, the plugin is only 'recommended' instead of required
            'version'               => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
            'force_activation'      => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation'    => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            'external_url'          => '', // If set, overrides default API URL and points to an external URL
        )       
    );
 
    // Change this to your theme text domain, used for internationalising strings  feedburner-email-subscription
    $theme_text_domain = 'tgmpa';
 
    /**
     * Array of configuration settings. Amend each line as needed.
     * If you want the default strings to be available under your own theme domain,
     * leave the strings uncommented.
     * Some of the strings are added into a sprintf, so see the comments at the
     * end of each line for what each argument will be.
     */
    $config = array(
        'domain'            => $theme_text_domain,           // Text domain - likely want to be the same as your theme.
        'default_path'      => '',                           // Default absolute path to pre-packaged plugins
        'parent_menu_slug'  => 'themes.php',         // Default parent menu slug
        'parent_url_slug'   => 'themes.php',         // Default parent URL slug
        'menu'              => 'install-required-plugins',   // Menu slug
        'has_notices'       => true,                         // Show admin notices or not
        'is_automatic'      => false,            // Automatically activate plugins after installation or not
        'message'           => '',               // Message to output right before the plugins table
        'strings'           => array(
            'page_title'                                => __( 'Установите требуемые плагины', $theme_text_domain ),
            'menu_title'                                => __( 'Установить плагины', $theme_text_domain ),
            'installing'                                => __( 'Установка плагина: %s', $theme_text_domain ), // %1$s = plugin name
            'oops'                                      => __( 'Упс, извините ошибка в области API плагина.', $theme_text_domain ),
            'notice_can_install_required'               => _n_noop( 'Эта тема требует установки следующих плагинов: %1$s.', 'Эта тема требует установки следующих плагинов: %1$s.' ), // %1$s = plugin name(s)
            'notice_can_install_recommended'            => _n_noop( 'Эта тема рекомендует следующие плагины: %1$s.', 'Эта тема рекомендует следующие плагины: %1$s.' ), // %1$s = plugin name(s)
            'notice_cannot_install'                     => _n_noop( 'Извините, но у вас нет необходимых разрешений для установки %s плагина. Сообщите об этом администратору этого сайта.', 'Извините, но у вас нет необходимых разрешений для установки %s плагина. Сообщите об этом администратору этого сайта.' ), // %1$s = plugin name(s)
            'notice_can_activate_required'              => _n_noop( 'Плагины которые нужны для совместимости с темой сейчас не активны: %1$s.', 'Плагины которые нужны для совместимости с темой сейчас не активны: %1$s.' ), // %1$s = plugin name(s)
            'notice_can_activate_recommended'           => _n_noop( 'Следующии рекомендованые плагины не все еще активны: %1$s.', 'Следующии рекомендованые плагины не все еще активны: %1$s.' ), // %1$s = plugin name(s)
            'notice_cannot_activate'                    => _n_noop( 'Извините, но у вас нет необходимых разрешений для активации %s плагина. Сообщите об этом администратору этого сайта.', 'Извините, но у вас нет необходимых разрешений для активации %s плагина. Сообщите об этом администратору этого сайта.' ), // %1$s = plugin name(s)
            'notice_ask_to_update'                      => _n_noop( 'Следующии плагины нужно обновить для максимальной совместимости с активной темой: %1$s.', 'Следующии плагины нужно обновить для максимальной совместимости с активной темой: %1$s.' ), // %1$s = plugin name(s)
            'notice_cannot_update'                      => _n_noop( 'Извините, но у вас нет необходимых разрешений для обновления %s плагина. Сообщите об этом администратору этого сайта.', 'Извините, но у вас нет необходимых разрешений для обновления %s плагина. Сообщите об этом администратору этого сайта.' ), // %1$s = plugin name(s)
            'install_link'                              => _n_noop( 'Начало установки плагинов', 'Начало установки плагинов' ),
            'activate_link'                             => _n_noop( 'Активировать установленые плагины', 'Активировать установленые плагины' ),
            'return'                                    => __( 'Вернуться к установки нужных плагинов', $theme_text_domain ),
            'plugin_activated'                          => __( 'Плагин активировался успешно.', $theme_text_domain ),
            'complete'                                  => __( 'Все плагины которые нужны для совместимости с темой установлены и активны. %s', $theme_text_domain ) // %1$s = dashboard link
        )
    );
 
    tgmpa( $plugins, $config );
 
}

/*
Plugin Name: Russify Comments Number
Plugin URI: http://ulizko.com/russify_comments_number
Description: Нормальное отображение окончания слова "комментарий" - то есть, "2 комментария", "5 комментариев" и так далее.
Version: 0.1
Author: Alexander Ulizko
Author URI: http://ulizko.com
*/

function russify_comments_number($zero = false, $one = false, $more = false, $deprecated = '') {
	global $id;
	$number = get_comments_number($id);
	
	if ($number == 0) {
		$output = 'Комментариев нет';
	} elseif ($number == 1) {
		$output = 'Один комментарий';
	} elseif (($number > 20) && (($number % 10) == 1)) {
		$output = str_replace('%', $number, '% комментарий');
	} elseif ((($number >= 2) && ($number <= 4)) || ((($number % 10) >= 2) && (($number % 10) <= 4)) && ($number > 20)) {
		$output = str_replace('%', $number, '% комментария');
	} else {
		$output = str_replace('%', $number, '% комментариев');
	}
	echo apply_filters('russify_comments_number', $output, $number);
}

add_filter('comments_number', 'russify_comments_number');
function sp_top_commentator_winners(){
global $wpdb;
$length = 10;        // Максимальная длинна имени в символах, если стоит 0, то имя не обрезается
$month = false;     // true - комментаторы за текущий месяц, false - за все время
$comment = true;    // Показывать количество комментариев? true - показывать, false - не показывать
$nofollow = true;   // Ссылки nofollow, true - да, false - нет
$count = 6;        // Количество отображаемых комментаторов
$col = 3;       // Количество колонок
$avatarSize = 70;   // Размер аватара в px
$exceptionEmail = '12345@gmail.com'; // исключить эти E-mail адреса из ТОПа
$showWinners = false;    // Показывать победителей? true - показывать, false - не показывать
$countWinners = 3;  // Количество победителей
$showDays = 3;      // Количество дней, которое показываются победители
$separator = '<hr style="display:block;">'; // разделитель ТОПа и победителей
 
$results = $wpdb->get_results('
SELECT
COUNT(comment_author_email) AS comments_count, comment_author_email, comment_author, comment_author_url
FROM
(select * from '.$wpdb->comments.' order by comment_ID desc) as pc
WHERE
comment_author_email != "" AND
comment_type = "" AND
comment_approved = 1 AND
comment_author_email NOT IN ('.preg_replace('/([\w\d\.\-_]+@[\w\d\.\-_]+)(,? ?)/','"\\1"\\2',$exceptionEmail).')'.
($month ? 'AND month(comment_date) = month(now()) AND year(comment_date) = year(now())' : '').
'GROUP BY
comment_author_email
ORDER BY
comments_count DESC
LIMIT '.$count
);
 
$firstIteration = true; // отвечает за то чтобы было всего две итерации
do {
$output = "<div class='top-comment'><table width='100%'><tr>";
$i = 0;
foreach($results as $result){
if ($i>=$col) {
$output .= "</tr><tr>";
$i = 0;
}
$i++;
$output .= "<td><div class='avatar-top'>".get_avatar($result->comment_author_email,$avatarSize)."</div><div class='avatar-comment'>";
if ($length and $length<mb_strlen($result->comment_author)) $result->comment_author = trim(mb_substr($result->comment_author, 0, $length)).'.';
if ($result->comment_author_url)
if ($nofollow)
$output .= "<a target='_blank' rel='nofollow' href='".$result->comment_author_url."'>".$result->comment_author."</a>";
else
$output .= "<a target='_blank' href='".$result->comment_author_url."'>".$result->comment_author."</a>";
else
$output .= $result->comment_author;
 
if ($comment) $output .= "(".$result->comments_count.")";
$output .= "<div style='clear:both;'></div></div></td>";
}
if ($i<=$col) $output .= "</tr>";
$output .= "</table></div>";
echo $output;
 
if ($showWinners and date('j') <= $showDays and $firstIteration) {
$results = $wpdb->get_results('
SELECT
COUNT(comment_author_email) AS comments_count, comment_author_email, comment_author, comment_author_url
FROM
(select * from '.$wpdb->comments.' order by comment_ID desc) as pc
WHERE
comment_author_email != "" AND
comment_type = "" AND
comment_approved = 1 AND
comment_author_email NOT IN ('.preg_replace('/([\w\d\.\-_]+@[\w\d\.\-_]+)(,? ?)/','"\\1"\\2',$exceptionEmail).') AND
month(comment_date) = month(now() - interval 1 month)
GROUP BY
comment_author_email
ORDER BY
comments_count DESC
LIMIT '.$countWinners
);
echo $separator;
$firstIteration = false;
} else {
$showWinners = false;
}
} while($showWinners);
}
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0";
    }
    return $count;
}

function redirect_first_time_commenters( $url, $comment ) {
 // get count of user comment
    $comment_count = get_comments( array( 'author_email' => $comment->comment_author_email, 'count' => true ) );
 
    // if this is the user first comment, redirect to the "Thank You" Page
    if ( 1 == $comment_count ) {
        $url = 'http://ilyavarentsov.ru/spasibo-za-kommentarij';
    }
 
    return $url;
}
 
add_filter( 'comment_post_redirect', 'redirect_first_time_commenters', 10, 2 );