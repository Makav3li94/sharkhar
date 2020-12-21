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
define( 'DB_NAME', 'sharkhar_blog' );

/** MySQL database username */
define( 'DB_USER', 'sharkhar_blog' );

/** MySQL database password */
define( 'DB_PASSWORD', 'ajp~_hY%9~B,' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         'aR-3aN:(cu6e:/=7* Bcz3>L, t<sf|^G]PYy;Kwa3HVNGV{9S;G=M)IP=a6QF)?' );
define( 'SECURE_AUTH_KEY',  '_n#Igksk:L?Yt} (.eU*Ig+$VJ?=S;WE54Lk4?H/L /x M}?y%xdlY%Xo5w ^V7>' );
define( 'LOGGED_IN_KEY',    '-x.nR;U,^D*uv4)fBD @IUS$Zix{-ui)/U[Z!gYLN-<Yp=b$xJ4+ Wwrvhzf_mH:' );
define( 'NONCE_KEY',        ',;pW*OpD45Wbi]M2c*LsQ=D4#SI}l+s|.!ilKRw><ZM|:A*2X`l~Po8KIsuX ~oq' );
define( 'AUTH_SALT',        'FrL``q[pm^Qu<ZVB0QX`yyyKT~1VUNb[qs|.):MV;!jiSPP8-<45I>;Ph:bnq >y' );
define( 'SECURE_AUTH_SALT', 'a6JNcvX,?;/xd^lFOTr)yk$O@>ChzVrb_ar(o?l@f-_n*dJ7bd@uskmbKxRUD1ve' );
define( 'LOGGED_IN_SALT',   'j.?6/LiHYX54M_TgK`[OMX:vdX,B!jwlW@pK:75(%LG(o5ra=Lbn,4Rn#`U,Z}v)' );
define( 'NONCE_SALT',       'PiWMI1o3j,{@(!gX4!v![ P~ vF0P$Pk[z*AJKLQKCx?bzT/<f%t4KBO}AG!,ch!' );

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
