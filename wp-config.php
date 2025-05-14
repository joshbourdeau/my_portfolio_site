<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'josh_portfolio' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

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
define( 'AUTH_KEY',         'HJIBc[F=C~XXCPoTM3i53nT+Z&DZAxT)meVJMH?vQtEmh6CcVjg#m)K>EOo()v9Y' );
define( 'SECURE_AUTH_KEY',  'u6&*5)2%66&v(j}fFv||O{#N-j5}U^!K+9{wF UN#PkWjaDEy B3cwaO928Uk8c/' );
define( 'LOGGED_IN_KEY',    'Q?Z$#5.>>4+!# G%EM!0fs$l&VF#[J<lQSYJ.lCEYC4-C{v[3h,hJ;>,4K;]qeUA' );
define( 'NONCE_KEY',        'A]BA_/H/)sjk].V<Q9$t/o_P8~(Kb%/?Leb8T5YMh4_jw6m?IMSn~<2Q~_-d7k:O' );
define( 'AUTH_SALT',        'Ny v6ns$AM[Q3+M$<uV=G_K7`H>2^, S9w?%`2f/.q-5[dU>N1*)oS(Re5sy#k}p' );
define( 'SECURE_AUTH_SALT', ' ^@8[&0/]_zpKiN/{a_Qb+of7j8<;R>5&5C[P,Zp<(1)9YYW&oeq{p|CSNSmy.c<' );
define( 'LOGGED_IN_SALT',   'XnZ>:@@eX5|A%LG>CX }3$+U)P`F;%Yq^a(%c2OJEF4uhj}HMmqJ_jP^%i2ejd`u' );
define( 'NONCE_SALT',       'Y$VEj#UqjSz[;?SaVU>6IiW[zlb8,;pr?@9+TYhOY6}/ZhTcLsh^[@#7Z~%(1,t-' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
