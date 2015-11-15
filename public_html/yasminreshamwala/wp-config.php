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
define('DB_NAME', 'sajidres_wrd4');

/** MySQL database username */
define('DB_USER', 'sajidres_wrd4');

/** MySQL database password */
define('DB_PASSWORD', 'pjFkXTBeL0');

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
define('AUTH_KEY',         'HrhNtQoagnglRTGaFKUjbos0NBssyh8gk1YFKtxIbXWx137IhZEDI8sNXZ3NiUqH');
define('SECURE_AUTH_KEY',  '5E1vvIYGDoUqrufoLoUoSI2PgFek35V0uh7oOHsQwdOEXBoWmsqi8MFfIjaSsSnl');
define('LOGGED_IN_KEY',    'PmM3ri5QlFJj7fWyDyncCk1v8LGQ2Tq3xGIFNCkWkRtwgoktWWqxcIS9AGGlilmJ');
define('NONCE_KEY',        '0OS0SvsfkTfsBcnAT8kWd8w9bdiCq3khN3iwaGQuVJvAUyUMMQPhDWYGd6gCaLFM');
define('AUTH_SALT',        'Q7LygJWBZbUO6E78TwgMOycdImRNLn9dQwK7a6JEHRXoL6UIpbaPSvz4REMRWFUK');
define('SECURE_AUTH_SALT', '0pZTYToKfT733xpdM9UpChckuJM0myRjetuLWIbHZH198x5GkrCuqJdZuHXZbTLZ');
define('LOGGED_IN_SALT',   'BSbyq35fIX8X9t4VL3m4DpqpuIHsOm3Gx0LX6YzdhoJFen6RZvj6aFTpkD8X3CDL');
define('NONCE_SALT',       '4C8LJZolomaY20H4v0vN0bJfgf47F5Gjiyy81xjndW5EAVnNNdXOfO9QSQPJtxdA');

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

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
