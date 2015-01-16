<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 's1307001_airfun');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

//define('WP_SITEURL', 'http://www.airfunproducts.com');
//define('WP_HOME', 'http://www.airfunproducts.com');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */

define('AUTH_KEY',         'nE!D9DocK%J5lTS|${]V~NY$*vDo<hGO!@|Eoha=DO/H]Ns>g7LNiI=xiGT{iS(S');
define('SECURE_AUTH_KEY',  'kivBf$)yMGL+nv++*)[<JU[W@-N-9Y$Hq0MI6bU1Qwk<!PU3 OC]f/-l#d+E.qPN');
define('LOGGED_IN_KEY',    '|*_lEy~V37nmU/?Z]Z-p$U}}]4fdNQ|]a/0[7MWxesZ@Q!)9T]pt|I-y%0nU0g{2');
define('NONCE_KEY',        'm*_Z|=-=_$Re+6;5?@=I{x;!LNE.>4XPutA+ Df+n3-*@4-$osvnA)#0+Ii3OzXn');
define('AUTH_SALT',        'rn]<ub9(% m;k+>2Vk4$wd|q`=d&g|B2Hj}?@-+Ti*#7-DdcMU0mzzT5_5BN:%P&');
define('SECURE_AUTH_SALT', 'BlqCp!,{+JPWreq#AirS}m9Tf2q,j6XE9nR):Vv8&pD/fJgQ<d-M/aX$[4S9&Zy=');
define('LOGGED_IN_SALT',   'S;2P.4pw;Fl)N)6E!TD#@xqT+u4;LAly<W`UfdcKBmI&B]Yhp|^dL Q&.y[ V~y{');
define('NONCE_SALT',       ')q$b)wgXpum22N*3f8%dqFozjuX#Q-=hpa,[Maq#S|kzz+tj4U|5b9Mjjk)O#XB0');


/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

define( 'FS_METHOD', 'direct' );
define( 'FS_CHMOD_DIR', ( 0775 & ~ umask() ) );
define( 'FS_CHMOD_FILE', ( 0664 & ~ umask() ) );

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */
/* Multisite */
define( 'WP_ALLOW_MULTISITE', true );
define('MULTISITE', true);
define('SUBDOMAIN_INSTALL', false);
define('DOMAIN_CURRENT_SITE', 'www.airfunproducts.com');
define('PATH_CURRENT_SITE', '/');
define('SITE_ID_CURRENT_SITE', 1);
define('BLOG_ID_CURRENT_SITE', 1);


/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
