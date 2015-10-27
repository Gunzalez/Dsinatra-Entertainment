<?php
/** 
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information by
 * visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
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
define('DB_NAME', 'dsinatraentcom_1186030_db2');

/** MySQL database username */
define('DB_USER', 'udsina_1186030_2');

/** MySQL database password */
define('DB_PASSWORD', 'W3stafrica');

/** MySQL hostname */
define('DB_HOST', 'cust-mysql-123-07:');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link http://api.wordpress.org/secret-key/1.1/ WordPress.org secret-key service}
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'c4aNpHJ7Etzex&!X(eQ06@GpLm#1NJZXYk4YK2jDg)rTm6RMS7jJyEmyM%!StGbS');
define('SECURE_AUTH_KEY',  'elLfwXXf!34(vKS*l@Pqq*b%1hF66*wLGgHj&JT4zKEDaocAi3zkI4SJpixwHJ@S');
define('LOGGED_IN_KEY',    'D9WiWJtfPHCW6oMrhW3ca^JT0Bym7LY6iHR5Z%qgMeZYJh&)xETfrNG!z$jzDZwP');
define('NONCE_KEY',        'kqHlpj&4b^f!XOcXv3ExEVicujOM3mbcttIG0NQvuFs&z#@i^33UksQZ9uk@6zV9');
define('AUTH_SALT',        '$FW4qwa$8XbdDAfiE#7^od9u8Xd$CCpPo4mCqSzSXHC1k7vizKQeh1)4eLlqMMWc');
define('SECURE_AUTH_SALT', 'DoP6fPfzzywj6@QrgT#cNsAeTHPEzUgiPi4TTGLT%N%bAXaTAqs9m9nkK)VV33Yq');
define('LOGGED_IN_SALT',   'tm&0J5hRJNXgDTxg%br9V8d4XqjkV3ap1ijXk!ry$iieHJHwWq#bUvRlJ3R9WSfh');
define('NONCE_SALT',       'kHtxNm8)oGdnahB7@dYU3m%c&kcvZ%#q4Kw3Zh4fRA5D(Cjh1qFAzHzXX1j*9T&l');
/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'Truewp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress.  A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de.mo to wp-content/languages and set WPLANG to 'de' to enable German
 * language support.
 */
define ('WPLANG', 'en_US');

define ('FS_METHOD', 'direct');

define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

?>
