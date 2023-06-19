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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wrapp' );

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
define( 'AUTH_KEY',         '`fOw[R(s->|SWG]e;F#w,wHp{II:7H$ wg}WoxcE.UC{xC3o41ckcz*8uh*B}cW8' );
define( 'SECURE_AUTH_KEY',  ',#@b*q>-)XUGc&2}aK9U5x~3trq{$LE:q/mLxBwFg|G}&}K[Vhq_(Rt3U:bl!x,F' );
define( 'LOGGED_IN_KEY',    'T#Z f!1(25?`UVw%.nE8LZ ;k:Ky_|Uo1`36QV!T&Z/2mIwDpi`6B)Qkubis/us-' );
define( 'NONCE_KEY',        'NPB:{1;V[ZRy%.~ x:K/c)!!0^z,|*>)!CYy6OuN>%ZJ)St=V<-$K(Gzx|XmiQ, ' );
define( 'AUTH_SALT',        '}p*9wHR-8Wesm=ND=^!IB6dLl<Hx[Ik-VB[Ay7omUWbvGVWA@,R@imZN?Sy:ZJQc' );
define( 'SECURE_AUTH_SALT', 'F-*~r)m)<jIAozr&$<4b{oi=hY7bd.PN1ThR`GEhpke]Qv&`*H-2p9u;`}#9[`O~' );
define( 'LOGGED_IN_SALT',   'L^.Xt]<mVR@-TVdsFSm8Tz8N+Nc^XXB:uKVO}vv8-Gw7oc7=5}X7F0Uxh=z5/p]%' );
define( 'NONCE_SALT',       'DMC|;`<O9QN>3!tiQX?068nZe-eM9&+aqG{h%rAxWxClQ}Prcp?fM`#(Ue kWcg4' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
