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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('WP_CACHE', true);
define( 'WPCACHEHOME', '/var/www/madmallardpersonaltraining.com/wp-content/plugins/wp-super-cache/' );
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'wordpressuser' );

/** MySQL database password */
define( 'DB_PASSWORD', 'password_wordpress' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '9G<jCQf=Fo~ADYv%a.+uw{2~.@$r^.u<w Kge0gIX[l(=-EO;[:rBN8dOrUIp0%g');
define('SECURE_AUTH_KEY',  'U}3X8W+>6M;34(~YeaX#3AkvwInB->u*q30{sf|Pfas 6(xgO8~nnNZyR/Y~*YfL');
define('LOGGED_IN_KEY',    '|@DEB0Ze|+5<!)r}G%}TNg8hOD{F(K(eKATa[JP8dmBci+<f )Q/x|vr#gsV1U2A');
define('NONCE_KEY',        'V0Rez5i:?FZV_+#l.blg5BwXy&!|G5-K(CGHmdio`C,-:svt)3_hqh!q_dN6^~Ej');
define('AUTH_SALT',        'N&G%i&7ScwJX@K;rwvnK^[U Uu:@x&/i^$uUz+J&O&#D)WkZ;3}OZ|@3{o?@rY:;');
define('SECURE_AUTH_SALT', 'WPx`^RzFMNZk-_i5C5b}-%Y7nc4!$-yg<xH&/S]t}T-Y#+-D[d.5S_{7MDDE*s(/');
define('LOGGED_IN_SALT',   'ZAiir=n)RP|k !1?H)jF%=wYy+&F/,7p-_NRbCy`CRQe(XE&|]OW:--udJ|/Qu5a');
define('NONCE_SALT',       'sJg?,eAd`@hKzqtM/HQ|2 )MZ3_8>eVov2;%l`x8+0jV Q*q|>P|=!3VAtK;Dg-+');

/**#@-*/

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
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
