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
define( 'DB_NAME', 'archer' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'archer_stg' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', 'Zbh3UK3fJW}rV2sihzcM2(Fn' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

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
define( 'AUTH_KEY',         'QI_Pj3`:KZEdmn.}z=xKY0$2LRln>g)x^+$bmZpanVXd]|A`o>2blg-sMzw$0G`X' );
define( 'SECURE_AUTH_KEY',  'EFNa}H;px/l${82m-VMT)k^Qy>`vDKMo2NcddG%ep+E^-JW-L.E[-sE=G5=E,x4E' );
define( 'LOGGED_IN_KEY',    'duo1jti9>lE{d0d`?fWSgEac}B[<R7t8D_vk(21t$=yuIUoG{rH;ja[Jh9hV(Q/]' );
define( 'NONCE_KEY',        'QZMakhlG(u8y0>K_wU|M]e,EZ:,B=<GOL33*V#dL$=q/Z}LZ(XKf:vcf4Pw0rWX>' );
define( 'AUTH_SALT',        '(2cs3WWF]keX_XI;UAFC&lzy.1n/bML5h>Qkg7C(NGI(uISD?R}2fZm-~h1sBXb=' );
define( 'SECURE_AUTH_SALT', '>~PE>5~y^4M7y4ZRq?+sV.(hE*J4*x3:?&;tDX:c,03-QT@&IbJ)imM48m}d76G3' );
define( 'LOGGED_IN_SALT',   '7|Ktt%O]5.*>y?VS9TO`)rtmCl[w-mh!BrD(}^I38>BvF&C`n<G)m3$.g@Tx1$/4' );
define( 'NONCE_SALT',       '`?kUoYwa)C5~W+D7wW+2ILr]1=+FXnd?1v^:mt.{@!J2S9#5,+_N>$9yrvJ&x9?J' );
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
