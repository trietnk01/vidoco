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
define('DB_NAME', 'maunhamoi2');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '123456');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         '`<u@3+%J#+w`XJ:+d-,TS^#Z`wB>[g~*vf@Z+j]Z+_c:H&P_$+I-X,z-!5!L]Q(-');
define('SECURE_AUTH_KEY',  '#F>C >ek4_znT?9BlIg%Y,M!}x7c%c<3Br`c15ife{M0sV`|Ao][/d)]pCb[uep-');
define('LOGGED_IN_KEY',    ' 6&J 3rcwx_uck/GU4|*2$`Y|OC_Qn.FwRV)qpw*1]x :K)TLcF>K1jU6li`%nzR');
define('NONCE_KEY',        'dqh2X=:Eq&40NXRQXop]dYeImo=(r l27v6Xf*1](cFDIU[t)v[w5p}^;Ei[HU:5');
define('AUTH_SALT',        '@U$Rr&i9qwzW}2ETa{B3^-(DP0@LuXbe8c/$Ece9tTYGTQ8 D(&[@V%C?(lw>q9[');
define('SECURE_AUTH_SALT', 'nU0!YW,08$i]47AmE<Q,;/,s;@kd )uVKp.c6o_L}$q(`o!1QfgyT+[W^LF| Nl ');
define('LOGGED_IN_SALT',   'o%d`KvA{{[hSt?Q>+`{_F`@]HFg7>W$kXR@x]O 29Mk<4q#4,[w8/$G=DhLSalG7');
define('NONCE_SALT',       'xF2M8OH4($%-J_<(E@H4sWv[JrDl)z*8~An=!w#fflHEwwcm=p+ZsLFdh4LO&XPc');

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
define('WP_DEBUG',true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
