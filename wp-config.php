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
define('DB_NAME', 'wp497');

/** MySQL database username */
define('DB_USER', 'wp497');

/** MySQL database password */
define('DB_PASSWORD', '6uP5-2d(uS');

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
define('AUTH_KEY',         'qxyxepewsoaym8hyqfrgfxutzis4vlveccorttt8lw2ue8azakfvyxv8dhcsbhew');
define('SECURE_AUTH_KEY',  '0hathzcuxuzxrsnjxzhtsl2vxivewpjk5rururqqnqpue8yvzpiqp8cgivsutj0j');
define('LOGGED_IN_KEY',    'k30cqphirhjubtqjezckmjn2ypl1ho2aakkvycvj1ml2epzoehnud9walsc5dhuq');
define('NONCE_KEY',        'lfsdsd23ztin5umotpw5r3ksymydty807mqsfhmpjywcml7z4k861pvfti7yun3j');
define('AUTH_SALT',        'lavlx8jzq6qmhmu3ddpaynqffjlp6dlt8xj7xggv4vcoua47lx7noqyao1vcqlfz');
define('SECURE_AUTH_SALT', 'daubv4pefd1lhohvub3ihzdcbhooxtkvpuo3etr8swcqclomgagtu4arxjpldvmy');
define('LOGGED_IN_SALT',   'o3brml0gebs1ardndjrr1bmgztlyxs4o4izkn7rf7gbgjafutilsmnylfd00uqmk');
define('NONCE_SALT',       'mvp4ephaqzp6kdksdyisyt8wgylemx1f1nygqvqzqolj0evqe1whaerzcp24mwnf');

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

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
