<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link https://fr.wordpress.org/support/article/editing-wp-config-php/ Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'test_wordpress' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'root' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', '' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Type de collation de la base de données.
  * N’y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '0$1QmlavR62i-dx9K`D8r(Mj  <XPSd>:tK!W-p5I$plOvJ,?UszQ(c i>pu3Rs$' );
define( 'SECURE_AUTH_KEY',  '0KZ9my9Vq~-#~(UO9T(wkAGsx`aWCXaqVNGMJ5qj]eV<uv|$=MU||:p=4+6 :Gc}' );
define( 'LOGGED_IN_KEY',    'z{s.lQw,2ipURCw0mQ%/YlOpeno?n]t28VC_K<t(7I.+BWc2f:F09D])wtFhC=M7' );
define( 'NONCE_KEY',        'CH#oskp~yCllEv{;d4-^:?2NBRKB?<Q#EaRV~aBJVZct;j*~}CNI{zRCfd/@0YU>' );
define( 'AUTH_SALT',        ' ;BzIcHvsv#W sC:?](Mcj8WS2I,gq$4`0*[7Q|M|3J-Lc>~xO!o)U7xJX|[f,hg' );
define( 'SECURE_AUTH_SALT', 'Z?3B9>0Fkdatc8OSM0KLpUX;5LEdT{`A/>,mRx$~Ce$EpQBUM$=dU;)<CM;/f`oN' );
define( 'LOGGED_IN_SALT',   'Kf:a#vU0&OO;JEq]pEr/fZa#H:lBq _-vC(!|Cr-f*>Zz^%0j[J/c(T_|XE4e n!' );
define( 'NONCE_SALT',       ',7OfR<hDid1R4RYAlU,))dIPf/YE&nR%QTTdL/E!.$2cI5fI=.Y<$_-3s{7n%inN' );
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
 * Pour les développeurs et développeuses : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortemment recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur la documentation.
 *
 * @link https://fr.wordpress.org/support/article/debugging-in-wordpress/
 */
define('WP_DEBUG', true);

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');
