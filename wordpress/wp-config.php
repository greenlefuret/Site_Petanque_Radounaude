<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define('DB_NAME', 'wordpressPetanque');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'root');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', 'admin');

/** Adresse de l’hébergement MySQL. */
define('DB_HOST', 'localhost');

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'ZJhRp$ff.bjMHl+iWx=A=a.NKUWeb~S_<j{3>$o|6$mr=QOVTvL%K$Muz7VrB![v');
define('SECURE_AUTH_KEY',  'O=0:JIYjP).738L%piUEt(d7B{M~?{Z#%Dc/;vMF *>n:R.$pa|YWmfdkpp{utMK');
define('LOGGED_IN_KEY',    '{jSsp*}?V5bCmk)y^!;.!fZ$~aH[E:EQOW&vi$*97Bk~%GL)n+Qcav>.Av}sMc$x');
define('NONCE_KEY',        'U}pYYfF`rp-X6z68]i~v^1:0U~Y gm-XwqQmGiL;B.xx 8;Hi::XluFj2W{4>I13');
define('AUTH_SALT',        '!K$ON$yt:/VvA/0:7#>@Y>Cd.A=&q|LZO9L(279<fmRcTt68^^Mr]kkx^=]>ZLMr');
define('SECURE_AUTH_SALT', '0MLGj4`L{7s~Mt*.P!g4vJvCRAf%bS=hYP/Dk>Ocu3*j$zw6rtdY+]?4jh7xUO`n');
define('LOGGED_IN_SALT',   ') Ds[D(V?+df7mUAp,.Nd?-|2@nS.5sP$w-i!uQee=RC+7($}zEAe6Y GVlL5^;#');
define('NONCE_SALT',       ';$)m0Ci4J)xy_SIkgI#ws5}@ [qdx/zNXy&c:gUa5g+TAz^nC!Z|S~iR}Pd|&TPI');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix  = 'wppetanque_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortemment recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* C’est tout, ne touchez pas à ce qui suit ! */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');
define('FS_METHOD', 'direct');
