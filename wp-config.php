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
define( 'DB_NAME', 'evergreen' );

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

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
 define('AUTH_KEY',         'e-xyC=h/QU6,5E<J7gDqeY);%IMzWXrq0][Yh$;21dh;+Q&>@WG_?5Rwj[ZykGBi');
 define('SECURE_AUTH_KEY',  '.LZPm)+{^kG?-+Qp/tB;+a7_ABmHIY !mKgu?J4:FuP@2d+0id[Y;!f!N@~gNBTR');
 define('LOGGED_IN_KEY',    '43z9`^6E(&:.4`vvT6huI:4XtYuYg`R:U#`TgFUsIpm}9oA|I-!<5UF^D_S7abhl');
 define('NONCE_KEY',        'tuxHeP`{l/7w-RkgyiELn>0O?$vk;[|iTY#UqmM!x%1y+wU J?Y2{XR/bA+R8g?|');
 define('AUTH_SALT',        '~0l)8,m^O{|>=*qXm-ODZ~PFw<u5$KF{UEV~B4&T&49B{?Qq9-O-+ON=)5VOAg>n');
 define('SECURE_AUTH_SALT', 'D#o^E?ClNvNyX%{m%QO=d6>f/b.7r~MR<P#-}%9&_2m>O/+f~eJyl3@oH6FQ^SKj');
 define('LOGGED_IN_SALT',   'u|f(=b:NQV~BRxtpAaEoCU06**yX1m)qXxcX`iu1fcSg&[J~j F+~q,8o}{^|Cw#');
 define('NONCE_SALT',       'X5DSSNioT,PAky8?d*eO&Ql~Dp&N&+x9?,=L>C,vT|8G)BKxNd2I/IA>S2bZ_+GG');

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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
