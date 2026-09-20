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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',          '6=G.2a>:{W*ZG6~`k_Ry>0>cdKUHgGGYiv3/r_DQr~a5<%b+g$XjtfkO~5pUcJ7T' );
define( 'SECURE_AUTH_KEY',   '84bG%}I9j||5zahcR%_t^yLfsGR+y _*L&%TIwSrj@Tx#x%D%Qr9z CehoE.{8XY' );
define( 'LOGGED_IN_KEY',     '2$XZ_{W.i}(lN}PhX]1xgK(pgUcSE0Ao|^C=rTCy/O75TaiIS-!S?t[o3fA:FjJ<' );
define( 'NONCE_KEY',         'PT{}FIxT5I/E!bVhmL2z~Rp1~l[nZ8{zV4JX{cb,H-FpgEX8O1u5sv#XFvT;YA(x' );
define( 'AUTH_SALT',         '4cD!$>5aL&T,1xURJ4 n.KrzE<]<C]wc1j#.Pz}-;Vju1jxfD2-+,UPVGW#D*bni' );
define( 'SECURE_AUTH_SALT',  'nqMc|2m/xT,AJRdQe;xIvII)x6cu&./bw>F%~0K9>8-2Fq/W+#]#6|Z`k5iMl_2T' );
define( 'LOGGED_IN_SALT',    '1O.P@]^Zw6xR|.SQ?fL}N> c04:tG%k2{{?Y-xk,XRZ)tC~0NIpqLQ1^+m)Qh3Cv' );
define( 'NONCE_SALT',        'hzoWr,q7@[BrV2j517s@s`M?0/{*)]Y2*(ave=(~>]hEn!k(K910j*)Qfb lb?Nc' );
define( 'WP_CACHE_KEY_SALT', 'ur`Bij!{M{*D.kyq%m]c[z)%mUg}ufnHVzhMk)3{]X$-5=%kZ681(8F_%gh@x+@k' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
