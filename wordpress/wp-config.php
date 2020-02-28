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
define( 'DB_NAME', 'store' );

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
define( 'AUTH_KEY',         '`_1Ix1h<*gqmjzlt.-=p~a&Hrb88fIW!bm4qWJH486+]@;+!aM}Tn,cv3*9/Wd%P' );
define( 'SECURE_AUTH_KEY',  '.cTUH2K%Jv5,6YYjokS)YsqGu0}CE6BTR`E!CWGC-$dLk3C:}!HjR/(~k^jE_RTe' );
define( 'LOGGED_IN_KEY',    '_!HH_!zR+`]on*_P((r&bNAA-E5<+%E_{f/WNYxJl#rmt&Tzt?~L@KFH[vpQ19/i' );
define( 'NONCE_KEY',        'A7wI8c+u~*RI]R1i uxe|#>>Qwd.#O=hJn05F_?|:Hmk;=ljI6z?1,kY1$gh)^JM' );
define( 'AUTH_SALT',        '18/>WrfcFBbL^F`15Jvr>6%r(hs-)V?$L=m+Q3uTabv[TZW^DYZMM~c;t3^%j|rI' );
define( 'SECURE_AUTH_SALT', 'mjS6I34n%gg4g@Ld4|FcuO@ukav9L2gODjd!a Ib~%O;/pX]BdX?uA)mOX^TBsIA' );
define( 'LOGGED_IN_SALT',   '!FRgO4q/r@U^-zlIJ3D$ZbbRTv*Z$a8_zT#/%jNeq]r*7!<#NQJYx-Pjl}l8wE+x' );
define( 'NONCE_SALT',       '[F$IU@!5Ua])>N,}eEC)qL4$A58TxVJ@`<z8I$-#7p5 @KKLFryVjd[^(2i^w^%S' );

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
