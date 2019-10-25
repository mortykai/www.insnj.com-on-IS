<?php
define('WP_AUTO_UPDATE_CORE', true);// This setting is required to make sure that WordPress updates can be properly managed in WordPress Toolkit. Remove this line if this WordPress website is not managed by WordPress Toolkit anymore.
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

// ** MySQL settings ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wp' );

/** MySQL database username */
define( 'DB_USER', 'insdb' );

/** MySQL database password */
define( 'DB_PASSWORD', 'W3stp0rt#1' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost:3306' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', '(O#|*9|v/]j3K7%+Px6:rfuM|jnl0AJ:c93a0e6g50U1:-]g!QFFkJEwNkppByc*');
define('SECURE_AUTH_KEY', '%%+ma/141k]7k-706P+xB/o97*x8)j;%9PSe3(aM[y61yGBy+CC4QhBKQ9oBW4w1');
define('LOGGED_IN_KEY', '9!bVi:@oBr;k[a*h&S3RQO;pOV-w%eT37#I9W83R;8_/Zm[x]59c00OptB/Lr0*v');
define('NONCE_KEY', '4U6&9zOME%e8;jk:(@Xhu_B4SD%hf_&~:d0Yj/&8fICl6+EZ07B)L9b]mh:F-c70');
define('AUTH_SALT', 'AJI#RrqZ+T]5&6%t2c7/~0(X*5QLrn#4JVP;#9ZeE)eOC4K;RaM/C645@&vtkLTg');
define('SECURE_AUTH_SALT', 'dbz__205&m3a592!6ly_RnX~c@!49+088+aQQ(CjKb;:#kidjIuxd28!-*1|80Mg');
define('LOGGED_IN_SALT', 'NS4p@Fa2[UR87#GGQ72B%CH+(3@[_dr[18XvXtK0h7qXwL_k3t-;Vr0@E]18F&f9');
define('NONCE_SALT', 'X294-xma6Z)s+Vb]CUXpgISR9J!;W/%SQfh5t3YqRpCa#Fi5Eyu3Cm0oO5ch4Zh8');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'HOHnDW4AW_';


define('WP_ALLOW_MULTISITE', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

define( 'SMTP_HOST', 'mail.insnj.com' );  // A2 Hosting server name. For example, "a2ss10.a2hosting.com"
define( 'SMTP_AUTH', false );
define( 'SMTP_PORT', '25' );
define( 'SMTP_SECURE', 'tls' );
//define( 'SMTP_USERNAME', 'user@example.com' );  // Username for SMTP authentication
//define( 'SMTP_PASSWORD', 'password' );          // Password for SMTP authentication
define( 'SMTP_FROM',     'insweb@insnj.com' );  // SMTP From address
define( 'SMTP_FROMNAME', 'INS Web Site' );         // SMTP From name
