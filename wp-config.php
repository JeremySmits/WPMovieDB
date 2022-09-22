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
define( 'DB_NAME', 'WPMovieDB' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

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
define( 'AUTH_KEY',         'wLN>ifCr>WCtl.M9%W_4k,bkKi236rK0BLKeTOSKI,xWKSksoy),%mPM-#e6#qxI' );
define( 'SECURE_AUTH_KEY',  '<3]|w~W[?P[`O+DSjO#MJS?.{>#.y]{_Kx*(2H$[LQEu-[iEp#RxXD?OQ=j2LrkY' );
define( 'LOGGED_IN_KEY',    'IL1&f#n(1;L?o{@1V`J@8Bal.w+bs#Vr.>|5>u8X^`6HQd(B<Cf6oe2088w?ld1L' );
define( 'NONCE_KEY',        '>/._sP;AJA{A Qj$6$Y+>fVx?lo{$c9AkH_O0BzefitsH:a{|8cjr9(~O:a,.6c/' );
define( 'AUTH_SALT',        'f0#3QJ/g<^)je4En#, m:Q&mU!b05hM+=8hio@>u*>O5$U+c}WNO|~em<N?Geqd#' );
define( 'SECURE_AUTH_SALT', '):L5Dm>I#h/f|JaTJzVhbCGlcTgdEv$hUd3a6dQAr^o?5t`7UmU{[;0=r6|>81#I' );
define( 'LOGGED_IN_SALT',   '`hwlFPzT5sV_BZ9Pj-gS.Y%~$r$m<+GB|V.jgXiBK=n5YwM],D/w~G&N9t(3+$_m' );
define( 'NONCE_SALT',       've>`/LmSc=nd1:a:g!jqS(/T5@^/6$*k4i``3%7jcQOuW5 E8kV[(ti/&te>ZDmb' );

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