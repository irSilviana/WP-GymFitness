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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// Load Composer autoloader
require_once __DIR__ . '/vendor/autoload.php'; // Adjust this path if necessary

// Determine if the environment is local or production
if (file_exists(__DIR__ . '/../.env')) {
	// Production environment (load .env from one directory up)
	$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
} else {
	// Local environment (load .env from the current directory)
	$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
}

// Load the environment variables
$dotenv->load();

// Define WP_ENV based on the environment variable
define('WP_ENV', $_ENV['WP_ENV'] ?? 'local'); // Default to 'local' if not set

// ** Database settings ** //
if (WP_ENV === 'production') {
	// Production environment
	define('DB_NAME', $_ENV['DB_NAME']);
	define('DB_USER', $_ENV['DB_USER']);
	define('DB_PASSWORD', $_ENV['DB_PASSWORD']);
	define('DB_HOST', $_ENV['DB_HOST']);
} else {
	// Local environment
	define('DB_NAME', 'local');
	define('DB_USER', 'root');
	define('DB_PASSWORD', 'root');
	define('DB_HOST', 'localhost');
}

/** Database charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The database collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

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
define('AUTH_KEY',          'qK_,DP$lh[26KWa#GUYY{)W=CL<R!;S<OImHscH4oVOezOkA+lF72x<!z`5Z}&_e');
define('SECURE_AUTH_KEY',   'D`nnnjw`2jI))*A-& CeA_o,TzG_pxr3Ycdgp<xu)5;9*GrEL9-u+;hrUwBgxS/(');
define('LOGGED_IN_KEY',     'nlocId[xq>]Zy Q<S|d`,_]j^<15ZQt_;CWIV /?Z[HT zkq+kt.aN@B 9cnHA3E');
define('NONCE_KEY',         'V&6KY$^^OP~?Yqqa!P0  }o)~TIl3hD`Xt$VL<.L$y1o-[SxkSyI&*[NcQ>@>1&y');
define('AUTH_SALT',         'n.,fd~ Ci-0xDw,E+p602pjb:t*WZ)Ab{{Urv@P}8%&}YL+,j)#]./&U4IV:<&@7');
define('SECURE_AUTH_SALT',  '~y)%Zd?JdbFk[PT.(p;7A<FhGq1c9~wf^|U2rQ8&-fv{%;VUo#2o~kdzzdR5fX,o');
define('LOGGED_IN_SALT',    '2iNBRc9/II|z_D@4.i{1(8igVx,dWny7<~^t*M~R-X*bCT2y&6zx<GJIA@jh0P&l');
define('NONCE_SALT',        '@U=gkc5(Skq+g7F/#]cjU^TGOh6T2Z0Sz>^B@(s2qOy1p?KDc,8=W^P7o]+nBlYQ');
define('WP_CACHE_KEY_SALT', 'vTCJBem{bDL+`F{&~G!:,~jC$4(dV*a^_J^019O HP(4ckXB^3nO24py+w7avMNo');


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if (! defined('ABSPATH')) {
	define('ABSPATH', __DIR__ . '/');
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
