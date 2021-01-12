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
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

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
define('AUTH_KEY',         'N34lKNvb+c7Esoy1CJ1KjYS3yaomdqHxvmHPxWfaFKqYQtSK6SjfiVkK1DCVe1EZcZHEkqhsObBXgHTZ6fkyVA==');
define('SECURE_AUTH_KEY',  'v+fsqzeeA5g9w5jUK+tmPIOg5h/aL3GojcybBdSeV7I64aj6enF//Pm+NlVXABVgNJ3+kgSmkIYPtQxtUviHxw==');
define('LOGGED_IN_KEY',    'f4Namefp+aI5HEJczgRGbpswilzBdeAGHtOjfPE2iw4mWsCW5RrN1DSuII+j/YeTp5a8smB29XK8QLhdGjLPHA==');
define('NONCE_KEY',        '+aI83Kg0nVeR2BoRX5Ei7rf3upFFb9a0P4+jmW5bU5l+BWG8+C9krN2VhaL7piskZo3LFvTqMJwfsxzP9fNtkw==');
define('AUTH_SALT',        'hAKUvebYpMu8SIpN/hyyXZ9NhobTy9/rxFEEAW7S+oCnw2VYKcFwB+Tlf3lf8PCtc0Uy96BZeq3Pjob1vE8tlQ==');
define('SECURE_AUTH_SALT', 'QktmQT3KVL0bvHXNlasIVMryC/KAh71G9bkRUQldheIiFJL43gtBIAzW0CD3otnKarJ0uY/fOS4XuvlFhm4FKQ==');
define('LOGGED_IN_SALT',   'fQgyzZ0WcZAnVJBEbyge49CbCV5++6IxGoI0QXiV9k+Q1uxusGIlYYNq2zgU77f6SXf2OyXkgVxooJLyawGsdw==');
define('NONCE_SALT',       'oCiut/D99/40JBsolymgX9rZ1CYSf0KDPP+76LxBLSb6ZF5b+kA9OmENA7/RCFnGNUAGHoVAxAhejSfqWifCow==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
