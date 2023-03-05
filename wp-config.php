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
define( 'DB_NAME', 'first-task' );

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
define( 'AUTH_KEY',         'J&svr}{<B|-!Ho#wv^tu?oHp_aJcy<bjHIVo&lC6Hv5&=$SoU@;XKyql]{O2D-rN' );
define( 'SECURE_AUTH_KEY',  '39tih7nqIF&C#M|z;7Ljwx43govDmr+@|L3Ct_S MEwhn!{]Y3s$C|z[I6!1JQ%r' );
define( 'LOGGED_IN_KEY',    'OC{)?x+Ty]`mJWv(Y}Mf5pBGyCBfCf%t?t]_sX0:V(++ClY]-[S)l3Mc/ckBLg^1' );
define( 'NONCE_KEY',        '1gPY@E4Kko%XvvXhe$8]m1D+vV2v.ct}!J-1@P*&O)i?imNNp;Yuwj7ZG}.95IFO' );
define( 'AUTH_SALT',        'yK>np0jG?d-<?L8}ZhB{Pf]z0KkhCEZmoZZ!dt4}rJkk$U<t.BV+r{RQSs0TKX~9' );
define( 'SECURE_AUTH_SALT', '{ hv!=[V#Nh:d7o6Q2~}oA47y>as1h7M=6CNP!W%?`H ~)VHO(JZwFOz=8mJ:CL?' );
define( 'LOGGED_IN_SALT',   'cvh7>6#3`DGw^vl+lfG=jQjSlt=&$Kt#:^,OL|7dmOenSYtDa-atRyT2VjE<;Y>?' );
define( 'NONCE_SALT',       '-F*0nT*EndSy]Zr2k4~7Yx-tw+OpT,um:lE):Op:rWjnQ~EbiKK%uVLN%(yY%i=D' );

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
