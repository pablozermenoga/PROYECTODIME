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
define( 'DB_NAME', 'DIMEBD' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         '*J7f.T*Nzd&dk325RGjj)c]fV%`p~CX_kE[:NCms6s[LlY<SR5HpkE8{8m=[mQ+w' );
define( 'SECURE_AUTH_KEY',  ')O:#H~ob<8osJ*2eZW^i[NHesI@Td{z8`b/A8IU#eH51H0IW`%foKlwgrRu:gp6^' );
define( 'LOGGED_IN_KEY',    'eTyJUi./.e93(eD?u/50daMdY~|5EjS|dR:*{8Z<x@)qByc<;gG,W(,zL)x,;0Eu' );
define( 'NONCE_KEY',        '4z!!3=?!lho1S%8U!8GE6/CEi)x_{sMSb5$T+L+.eW`=)D/K,?3Y-}H.y(cFrPRn' );
define( 'AUTH_SALT',        '}ApqG$H-ffE~@GRZvDXDTMI`ij$QTO%sEZ8_K[9jghavTqNEN[s Q@I(]2C%TSCu' );
define( 'SECURE_AUTH_SALT', '16$-oEEwYWvr=4pIwsuojJ:=3l!e?A #xn(iZpmR}1{8/,y4*nn+,QQ}O:&rmLNl' );
define( 'LOGGED_IN_SALT',   '9]Yi=N~:c2n:9z?HwxHx4Ni`V;%o=Ag|Izy#)JX2M$gBDu,?J{6paQB2N#PzG6s.' );
define( 'NONCE_SALT',       ';;)r=t^1IBG=Fz; M3<fAg-YIbEO2z`8F/!y@)_!h18K{f8=!O(X6}GV[zA9RS?0' );

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
