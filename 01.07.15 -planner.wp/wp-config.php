<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'planner.wp');

/** MySQL database username */
define('DB_USER', 'planner.wp');

/** MySQL database password */
define('DB_PASSWORD', 'planner.wp');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '73LGF3n^nCppE&~}ki%4gKgQ+IvU?_gzR7ZS_|fMJ@AL`$?9jD3TY$a-x..[|m;h');
define('SECURE_AUTH_KEY',  '{M$.> :0agvWxHNA,YM?7-,f1R`.HeG2akj*>aXDq}HExez^&y+Wm*SfKO >@Ysy');
define('LOGGED_IN_KEY',    'b(-05*|(;trS[n9(hmh=%3p~:cK{I;-,s.L]]5bHWc&2HpN1i]D$zJZxa%(EC_cS');
define('NONCE_KEY',        '+^q~Qe~Of{-.~fedBU@|Woz?,8!y(Ri!iOTc]9o5_6-p&X<m2L2fgI(nL>uUj&<D');
define('AUTH_SALT',        '<mJ(,U|qSM<C?;2vPRG`?8#u)q-(9VX$%B*}ms;6]HAY{s&oP$GsU0ML,n*-G06e');
define('SECURE_AUTH_SALT', '^+-8a^<E5|*Q+EV Q+CD@oU|9Y7cmfUX4UmT%yA|I:#|0G1*00]3-HWZ-`@38N! ');
define('LOGGED_IN_SALT',   'cQV`TOmV7Jp5SeKQuHIQTi@PKlX]Y=#{L#rb}M%o@[o@NbJ:>vL&!8nS(9:^1rbz');
define('NONCE_SALT',       '@%+dXK e)<7w|P@xW MgDNg^*QmRROP[T9i]sHxnfO5&1xsQOfHXUxz$Ts`=V{^4');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'plan_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
