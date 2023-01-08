<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'fullstack' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

if ( !defined('WP_CLI') ) {
    define( 'WP_SITEURL', $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] );
    define( 'WP_HOME',    $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] );
}



/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'ku5iwhx817XXJH0OLLktl0ThSSKlNQgRtF2MMg5xB3j2DJkNipu0q3zThFOrTcqW' );
define( 'SECURE_AUTH_KEY',  'GJQfl7MPWG1uhVLL3YcF1xjnBynTTg0XwkIzCbAxkvxfPEqvHxLI97MuqwrVrDza' );
define( 'LOGGED_IN_KEY',    'pnNOcYalN0c8qMHej41sJsXkZvoRVCHykim3xkf71Qk5Fh1OmF4MBUcZDJFBgCZP' );
define( 'NONCE_KEY',        'fl7EDrVGReX9EuyboL2I3SXI41w9LNU3MbNy3dG0HBdabX6BLcVKJ0oUQFnrQvX1' );
define( 'AUTH_SALT',        'wDNE22CvkRoWw5WeKMWDXCsDCENt260aPWpjlnNEvrxXr4BNnXZ6SJyL74XPjUjs' );
define( 'SECURE_AUTH_SALT', 'GUwbsXNWWv6UsY0rkyuBJLlzlwJyoh3UpGT1NF0UdMDL9orM0YmN7CDeKjRzK10U' );
define( 'LOGGED_IN_SALT',   '6NYi55J6XpVExDdDwztwFUWnptVgo7gsik1Pqt59XYT09PiJrNVkDodwn2ICFT5o' );
define( 'NONCE_SALT',       'JvPStHzGnUvy1PVcRsk3EaE0DoA2Ala65mxgOQkdHENw5Dhwiy2ayICiILUdpQHh' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
