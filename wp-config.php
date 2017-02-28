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
define('DB_NAME', 'ienetwork');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

define('FS_METHOD', 'direct');
/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'jwu_ ZZ.m|2A#GID]=<[)-{L*,,m={n0*{OXG!REH{8xKs%?T{4fEPR=f*5l:kQP');
define('SECURE_AUTH_KEY',  'KJH2/{)lVc~qu+0<5s%4*$75a?BgR$kr1!ILxpSjC=C;UDRx- oJK^Z<<-%; MVf');
define('LOGGED_IN_KEY',    'j)>0p-FppVl;n-ioGK2o3dT.YI~c.C|j)TIZ!Qh`|279-EO]:y-5}THXhM87+##o');
define('NONCE_KEY',        'UdkO+D70`4aamf9j%ybau2oUR?~Kt<iW9X_| PkBz|j?a{^SOZI_7^9zYW+lXtWi');
define('AUTH_SALT',        'Br*^~Od)(oAX{4ulPM&DEOIU6zy+PM3pn&^Q(D:<UACX(%GRFe*=F3 O;*CS+^Ny');
define('SECURE_AUTH_SALT', '*0oPEa{nBge)RRg%g(&&q=l4B}-@razuuK1Lu0fwLx4W:IqKa6Vb^b(8jbUh.E*/');
define('LOGGED_IN_SALT',   ']:&~l0f0x4$duG5PAK(67jcb31j2>z>0VK?5:;lBs.-m+Yki~48ycZX-~HZ|fAMS');
define('NONCE_SALT',       'r:Pka+QcRato0]Bx2IH84;FUW{.40gn!CI8C7n[R~*W|c>Orm]*qaQoSu 5^bZK ');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

