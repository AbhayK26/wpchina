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
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'admin' );

/** MySQL database password */
define( 'DB_PASSWORD', 'Pass@word1' );

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
define( 'AUTH_KEY',         'O|B]_#$0sI0gyu6n@82Z<R9uEhb7ii%` &m~<{eu0&%medSpx`}P(P1A,H(>1B:r' );
define( 'SECURE_AUTH_KEY',  '=:YI4!`/i<nyi*^ Pv}gV o[rvewS kT4LO~IC5<t*wTa<{dfR!7<59S(/Q5nnm0' );
define( 'LOGGED_IN_KEY',    'YxHq4]w~R*yEBT(hhChp;RqmH0Nk[F(~rQ]G(N>-8yJ69Uh&3TamoYxeWr@5~lyZ' );
define( 'NONCE_KEY',        'Kv%Y[r]sl813J==ve4ec?.NEpy*R61M^P:@ix{;WaH8mGh[x8sV[8WO}i-!+Cn&9' );
define( 'AUTH_SALT',        '@6O94;BQSJ=E|,_lN}@,O8az;U7()(Nfu8p5tka=fT3=7D7S:Kih0GPJQx8p#&!)' );
define( 'SECURE_AUTH_SALT', 'C(v{0ky2w%3nZCegd0,M1sYi}/NAk Vx>@Vz4TA*w1Ws**!i/c?%yhC!kv1}fnyy' );
define( 'LOGGED_IN_SALT',   'rzg[*Yhsp>(?<,}EwOUSd1b3Qv(2Xb%(d4JHbewtCvJ7j~h_)b.r?0wa-DOZ[K9~' );
define( 'NONCE_SALT',       '3oKd}OvF-Wce=MqQ,h_)HzSi@{m;y%lD;X3f#n#;3s>fWL-/CHvw!A~%1:EvD/K:' );

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
