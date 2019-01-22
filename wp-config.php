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
//define('WP_CACHE', true); //Added by WP-Cache Manager
// define( 'WPCACHEHOME', '/home/dh_b24siw/test.indylostpetalert.com/wp-content/plugins/wp-super-cache/' ); //Added by WP-Cache Manager
define('DB_NAME', 'ilpawpdbtest');

/** MySQL database username */
define('DB_USER', 'ilpawpdbuser');

/** MySQL database password */
define('DB_PASSWORD', 'LDF1684dsaIHFd6574g4');

/** MySQL hostname */
define('DB_HOST', 'ilbawpdbaddr.indylostpetalert.com');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

define('WP_HOME', 'https://test.indylostpetalert.com');
define('WP_SITEURL', 'https://test.indylostpetalert.com');
define('SERVER_HOME', '/home/dh_b24siw/test.indylostpetalert.com');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'kEge;15r(KlTxsglXVkogtz7zYCN4:x2poQ9y2n~eK&H2La4BrYtuoq|2fkt)S_&');
define('SECURE_AUTH_KEY',  'fc;YtuVMmz4O:x^!+U5FV/);0xChjoHKXLIXEz%|8XVb:ZJb7W"$MNo)xZu)Ff1x');
define('LOGGED_IN_KEY',    'xAYZFSSL+:)uhJWZRA@lPXob^%+TPJKG~DUd+!yJDi$P/h6Dt0*K#U#7jMpD+1Vt');
define('NONCE_KEY',        '%O2C)l|fiYj1KU~J1KepeGIsZ)RT~L~D_W0yd(;Ka0^s"y"v!#+h2U9hYCB*4`&?');
define('AUTH_SALT',        'yLr_OJG!qw@2EQX!CON9HoNZD8bTXn;%*hklUZ^f~vml4N5IJk_FtBCIROlxIbd0');
define('SECURE_AUTH_SALT', 'Zb$v;j|^%ySES|s3@ALwe%l:gj9ff8$/?76ANUmXdUkL"Zv0HsKcAWfHDNQHlspo');
define('LOGGED_IN_SALT',   'mmDnTrfAosxb1Nv"JQ^n?DR/+YY_MKJ9Z+0kxaV*R2"wMlWX$D7vKDNV1|Gq63tR');
define('NONCE_SALT',       'BpHsy!7LeS:nv9H!AStG%baIERAlmoytF^ZKjt""VI3QL0MpWmOY#jZ~5rT;3"uR');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_nwq5vs_';

/**
 * Limits total Post Revisions saved per Post/Page.
 * Change or comment this line out if you would like to increase or remove the limit.
 */
define('WP_POST_REVISIONS',  10);

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

define('WP_MEMORY_LIMIT', '256M');

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

