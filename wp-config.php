<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'fivy');

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
define('AUTH_KEY',         'Ch+6_zSe#|$IBE8,lL/1nk|X^(=Q;pe8-:jdm.P{M>hD VJ,m.BqFz2dZhZ>%k2|');
define('SECURE_AUTH_KEY',  '4w#+~tk|T QZiFi~msK2J& |;KvWHC], `$8j7W8+j%.ia;$x#Zu=pW|1-|U[l:L');
define('LOGGED_IN_KEY',    '@OUg5a8FaRS@OFhK!+gL-rcShRwe|.)!8Msydq|XV>+~d nU~sh@E#oJWTQLFoQz');
define('NONCE_KEY',        'c.5x.HooYDIFCD(k9N3vm2F=Wt{LtKgu;@O>C5Z6m}F[~;ixVB)[7?D$G?2lJmpZ');
define('AUTH_SALT',        '!{(Xc9+aCi_QeD-tcf)<j0ifS?dq2Pds*4V^*X+M]}wM[bVCFW^B0wH.GWhFBbRL');
define('SECURE_AUTH_SALT', '<Q6KiB EI:xkC/XY=MH*#bg>gS7aVp+#h^Hj}1=Cmk`v.$uD`rHL/n3`i78nvj--');
define('LOGGED_IN_SALT',   'uoIuRRyvX;]HoC+i0^X/E-cRsg2n3OGq|)Ju1=$i8Dq.t;L*|lBuv4q]-R}}i_,q');
define('NONCE_SALT',       '[t/6?PTO(;qe+8%BuCV_y^5L-$i[^d]tJY,|S=eo+d{HuV^r@sM}]$LDDcr~yB`I');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

/** To remove plugins, themes not via ftp */
define('FS_METHOD', 'direct');