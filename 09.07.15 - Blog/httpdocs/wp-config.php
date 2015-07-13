<?php
/**
 * Основные параметры WordPress.
 *
 * Этот файл содержит следующие параметры: настройки MySQL, префикс таблиц,
 * секретные ключи, язык WordPress и ABSPATH. Дополнительную информацию можно найти
 * на странице {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Кодекса. Настройки MySQL можно узнать у хостинг-провайдера.
 *
 * Этот файл используется сценарием создания wp-config.php в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать этот файл
 * с именем "wp-config.php" и заполнить значения.
 *
 * @package WordPress
 */

//define('WP_CACHE', true); //Added by WP-Cache Manager
define('WPCACHEHOME', '/home/httpd/vhosts/ilyavarentsov.ru/httpdocs/wp-content/plugins/wp-super-cache/'); //Added by WP-Cache Manager

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //

/** Имя базы данных для WordPress */
define('DB_NAME', 'a136672_1');

/** Имя пользователя MySQL */
define('DB_USER', 'a136672_1');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', '9B3Q7b4netQe');

/** Имя сервера MySQL */
define('DB_HOST', 'a136672.mysql.mchost.ru');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется снова авторизоваться.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'W6081m%O<{FG_van$HCHASS>Or?Ap1225JZ3IY6cn+D(^G-0r4I-Qk6J+-5C1');
define('SECURE_AUTH_KEY',  '*VMozF`Y}WN()ry>WMoVE8RpHxM7l)p1225p~^[l%h|!aG0]:z)uED+]m,!-l(');
define('LOGGED_IN_KEY',    'x!)^^U_7T,7o/5x;pX:L CDE2KDsG,*R8vw>r8$#.k~Sp1225.[oB+im;JuPQ7H-');
define('NONCE_KEY',        'B1&6C1qY8m>!Jc|&frZOhfV>p1225T{%*Uv4S=4vc;rm_{!zY~UK^Mkz:k}8Rhf');
define('AUTH_SALT',        'FZN*DZb_mUzLfblCiw4k||. :Q,xBp1225!OlL=: |_$N!834aQK?s|iE#dL#kt');
define('SECURE_AUTH_SALT', 'WO%H*:*L/,-j|0(?+<Nag-$p1225:@|M^O|pn:R k+siC.DuCC|vN-a]hG,UVAq');
define('LOGGED_IN_SALT',   'eA9A=4rFo5uGj5a(c+(~Lf@0p1225j<#-<u-(#+j,CB79$I6)fVfC]Q<|wl_|HW');
define('NONCE_SALT',       ';$C-z@&F,md(xE|Rjx+Rb5pzIo;0p12256>P{ctm*R8!7?%;YN!iNisV#mydta3V');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько блогов в одну базу данных, если вы будете использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'p1225_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Настоятельно рекомендуется, чтобы разработчики плагинов и тем использовали WP_DEBUG
 * в своём рабочем окружении.
 */
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
define('WP_CACHE', true);
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
define('CONCATENATE_SCRIPTS', false );
require_once(ABSPATH . 'wp-settings.php');
