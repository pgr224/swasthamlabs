<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'kpnews');

/** MySQL database username */
define('DB_USER', 'kpnews');

/** MySQL database password */
define('DB_PASSWORD', 'bDm1S(4P-5');

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
define('AUTH_KEY',         'c4igp38dkgzfr4al9jbu1awzjvc5tiq6a6s7ddxi7ogbwt8gyuwat0auntbghzto');
define('SECURE_AUTH_KEY',  'fwfyeqcaxahjqnfr70xpfdsawmkghzozfiyljtovebuza16fagh8aaf1m2btqtoe');
define('LOGGED_IN_KEY',    'mtax9howkmmk8p8oe82nrkquskeykxhiji98ts8v4zdxwuw367onmclpgyifgjms');
define('NONCE_KEY',        'wuuu6gwiuipmquyvvxrvwaygzxeb0fyz1giqjxjgpo0zkz67yvcrusbphooqzkgn');
define('AUTH_SALT',        'caoxd3chrjv5oi0dzhv6bm8arw9da9wkvmjqgzz1cclu44ynlkkutnjtehfdubtd');
define('SECURE_AUTH_SALT', 'hqci8mrfor2kvo3pinlvkxgcrg8sttfspqzomromcln6vknqd1za1prtouje5jiv');
define('LOGGED_IN_SALT',   '9dm3do60dwnnzh71myojsw3sf5ca3awviskkzmqnswldzezozghlqmh6oinsbneq');
define('NONCE_SALT',       'xenzv0esy7gpyl8koqohjzzxkjcwibzbcjnwpk0lbw0rxdwz33c3nmak4bsqz7ki');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* Multisite */
define( 'WP_ALLOW_MULTISITE', true );
define('MULTISITE', true);
define('SUBDOMAIN_INSTALL', false);
define('DOMAIN_CURRENT_SITE', '127.0.0.1');
define('PATH_CURRENT_SITE', '/microweber/news/');
define('SITE_ID_CURRENT_SITE', 1);
define('BLOG_ID_CURRENT_SITE', 1);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
