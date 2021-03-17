<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en « wp-config.php » et remplir les
 * valeurs.
 *
 * Ce fichier contient les réglages de configuration suivants :
 *
 * Réglages MySQL
 * Préfixe de table
 * Clés secrètes
 * Langue utilisée
 * ABSPATH
 *
 * @link https://fr.wordpress.org/support/article/editing-wp-config-php/.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'BDDMission4' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'root' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', '' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', '127.0.0.1' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/**
 * Type de collation de la base de données.
 * N’y touchez que si vous savez ce que vous faites.
 */
define( 'DB_COLLATE', '' );

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clés secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '+n<$&aUSvQ;We,x2& z!XCN>1H,cRcEVZ$od^/g72pJ>jgP1>D`$e[A9n8A:Juuf' );
define( 'SECURE_AUTH_KEY',  '&Rg))Ex?hJ)G6S636E>tRpc K<A]Gd *;wUnS@[0I]B8SjkSpu6TE6,k-zC=<iB!' );
define( 'LOGGED_IN_KEY',    'n|(4Lv(.4Ee#^YUmrNF&O+>JJa Q.9zMQy$Zj`dzKI8X# ]Rg=R3F?71~WxKpuXj' );
define( 'NONCE_KEY',        'J-w-KJ>{WA>6lD!&jQY[%PHP/m-<W7@MC}{`KYY0K[o#J4pb>E*&KY3*TT#T^,y ' );
define( 'AUTH_SALT',        'G`s{?)o5~IEha{|]fOULEW#_5?mimMV9:4Vl0FqEC[4j /65?kjt:SP$F= [Xi#7' );
define( 'SECURE_AUTH_SALT', 'YK3DBQ^J-><%_u<k3S4C|:*z`HVb/)zcR?}sht6vu#L}bx 6mb3[soe7y<JpL?zc' );
define( 'LOGGED_IN_SALT',   'BrA?HnX:vGvf/w(D$~Z_,&~#4IYv?x$(_iC[`.x`oZ[k&D :aGlOR*v<w[/dqY+a' );
define( 'NONCE_SALT',       'tGnOyO k%]UlN.dEG}-Q)v+LJ]]&iC5{){2<aT!74FcQbdUlD6U8a]+ntdcFMQe9' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'wp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortement recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://fr.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( ! defined( 'ABSPATH' ) )
  define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once( ABSPATH . 'wp-settings.php' );