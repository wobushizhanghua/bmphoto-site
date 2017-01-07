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
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'asdf');

/** MySQL hostname */
define('DB_HOST', '127.0.0.1');

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
define('AUTH_KEY',         '/~}oRP6ID^<C!m~&p*}fs&nr8I$zsEfJOz%05YslNlmm=?]uBs@gdC(>1<h5LG5p');
define('SECURE_AUTH_KEY',  'Cava~&yfz@R,;M/Cfg7?fh-cG~,[}lEr3qBMj..Pn$W<2{D1r/!P!J9z#S%ajo$!');
define('LOGGED_IN_KEY',    '%mu%LFgESwi3$zPgSg:VYdg*6%6|1@eEM=frQJeUX5&ur@46+!rZ<+YVAidGP0Yh');
define('NONCE_KEY',        'J<=zZR{acdHA.*UD)8B;K$Yt<sbY51h7iN.m$|_u)yB440HJWWFOb:2;>QJh~uPM');
define('AUTH_SALT',        'C(prvBL&<F}p{|5C8n.@$wdX-!0me|@^w!n[4=Z;^Se`J2Foy9G{T#(2:8YD:N`s');
define('SECURE_AUTH_SALT', 'Y<?KD+s;joL+) wn%F.P49QCl2[(s2kt-cb|y*hr#.3K#RzYYfX, cAtrWP4_y+!');
define('LOGGED_IN_SALT',   '%`gFvW4QGIKpAJ#,IYi{|Y>oM}Nd#44kv>4BP2EE!$:FBa+z~>-Z$c$e9>k9ufRG');
define('NONCE_SALT',       'N@Aw/:{3tPH#,oE^@E<k`a~O> !qA@^98%qAh,sHjsJ.V_|Qz#{c}=}&DC*dO=ER');

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
