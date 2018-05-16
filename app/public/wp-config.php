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

// ** MySQL settings ** //
if (file_exists(dirname(__FILE__) . '/local.php')) {
    // Local database settings
    define( 'DB_NAME', 'local' );
    define( 'DB_USER', 'root' );
    define( 'DB_PASSWORD', 'root' );
    define( 'DB_HOST', 'localhost' );
} else {
    // Live database settings
    define( 'DB_NAME', 'universitydata-33354aeb' );
    define( 'DB_USER', 'universitydata-33354aeb' );
    define( 'DB_PASSWORD', 'srbuabcf06' );
    define( 'DB_HOST', 'shareddb-i.hosting.stackcp.net' );
}



/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'K9FYyXAQmoobhl5unORDDiAn1o8DcI0+fBswZUBzsBmMDayVe9dPT0dWSizFMtD2iBC4oP0x5M8DwB9YF6dPwg==');
define('SECURE_AUTH_KEY',  'qarzZUKaaZ4eGyQS/ozxb0IIlLgNOB2wcioB4mITMo4qzrM8Yeu6Uy7JyzB0ZewJ/AMaNbE4UtdUesD8BW4C3A==');
define('LOGGED_IN_KEY',    'AEtmh2RiSUxtUvzeOPba9qGpzVtMQQWZBoN8GXuQoeckCLFf1nHl0T+RYhmBdFaHUf8KNc6/BzdRL6uyNmLGCw==');
define('NONCE_KEY',        'GhYD6y2yVP9uqqG8PysIDqpfYz6+HFYkqTiBjNV4OY5RwaOhV6uFnPBeQfCSYIsWqOy2gyBqRHjdl+TBHHuZhw==');
define('AUTH_SALT',        '4N6xNymbNTS1mbTIckEwQK9FnOAG8Eh7GczLV0yrg/Ph9/SDcuVQu4BXQhw7UhBMqE92IuvX0ZNF5GBxh3761Q==');
define('SECURE_AUTH_SALT', 'eneEtDL3LbesTJpabbI9bJRGoIfCgp+8my/gthNewzBLnr9aHhxKYXZUMMen63TNsrw08uk1bvHakb6pZnFdWA==');
define('LOGGED_IN_SALT',   'zmeC6lcEF0hQjNaLsrZCGSg+nGijP+Dk9mcF0C/lGLLPgWYl6kqvhuDB9imFMyTcvr8s2q9zuu79FKvQumRXDw==');
define('NONCE_SALT',       'R6c3iDK07RC0Wn32dRPmjwvYHdRqb+8QB6p3RD5dWPDeD8H3fdHbUMG1uUm9YElzYarZ6fv5EMDTBT5BDdkBFA==');

/**
 * WordPress Database Table prefix.
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
 */
define('WP_DEBUG', false);



/* Inserted by Local by Flywheel. See: http://codex.wordpress.org/Administration_Over_SSL#Using_a_Reverse_Proxy */
if ( isset( $_SERVER['HTTP_X_FORWARDED_PROTO'] ) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https' ) {
	$_SERVER['HTTPS'] = 'on';
}

/* Inserted by Local by Flywheel. Fixes $is_nginx global for rewrites. */
if ( ! empty( $_SERVER['SERVER_SOFTWARE'] ) && strpos( $_SERVER['SERVER_SOFTWARE'], 'Flywheel/' ) !== false ) {
	$_SERVER['SERVER_SOFTWARE'] = 'nginx/1.10.1';
}
/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
