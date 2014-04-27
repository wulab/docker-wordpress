<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '/@NoQcA@/g)a|1-.WAHLT!&5:)FB>Rs~uE`mU^ZPNCdq= faB3m}H|TG/?8rKr|8');
define('SECURE_AUTH_KEY',  '|w;$;eJ4|qlChbAhdl%%_/pIkL*>A(s.70fB&f.y6K1^] B$4z^OlAr~Gv^{/pM&');
define('LOGGED_IN_KEY',    '-_2V5+Ty=&ZU3+V1UmT`eSZ p0n3=YZwJ&i!qb0S0M0+*^mz92xw_&:cvt@|m7J#');
define('NONCE_KEY',        'b#^A/w(g^U;!yA]-I133Lz,<Yl$.*tSB qks+p6~|P`_HaT(J:}8||5$y)>V}}g>');
define('AUTH_SALT',        '-3|J+^Om2~Qv-h>8l8}42B>DiH[52jl6a8Fo+DL%V9(}-1axEWl:)1rB }zoLVz|');
define('SECURE_AUTH_SALT', 'J&XdAh!+Zlp_Iim8TWdRijGAnqaUnOqH)e|YWXGb+L~$Xtxqd#Gnhr+Wy-7g|k=E');
define('LOGGED_IN_SALT',   'Eow(7^Iq77TPJ:8P>U]qbpMTd3 :^?tG[*+mv~RTz-$?bf/nU.mbgN>Y-zX/L1|/');
define('NONCE_SALT',       'H5l4(Ha:HVY$+]RDJZJ,P5!C2H[O_U%>Z#)we*lgP/EYJ9zd%G{BU?1moHF-[[6`');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

define('FS_METHOD', 'direct');
define('FS_CHMOD_DIR', 0777);
define('FS_CHMOD_FILE', 0777);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
    define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');