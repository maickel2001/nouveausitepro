<?php
/**
 * Configuration générale
 * Site professionnel de Maickel Okereke
 */

// Configuration de base
define('SITE_NAME', 'Maickel Okereke - Comptable & Développeur Web');
define('SITE_URL', 'https://maickel-okereke.com');
define('SITE_EMAIL', 'contact@maickel-okereke.com');
define('SITE_PHONE', '+33 1 23 45 67 89');
define('SITE_DESCRIPTION', 'Expert-comptable et développeur web pour TPE/PME et startups');

// Configuration des chemins
define('ROOT_PATH', __DIR__ . '/..');
define('ASSETS_PATH', ROOT_PATH . '/assets');
define('UPLOADS_PATH', ASSETS_PATH . '/uploads');
define('INCLUDES_PATH', ROOT_PATH . '/includes');

// Configuration de la base de données
define('DB_HOST', 'localhost');
define('DB_NAME', 'maickel_site');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_CHARSET', 'utf8mb4');

// Configuration des sessions
define('SESSION_NAME', 'maickel_session');
define('SESSION_LIFETIME', 3600); // 1 heure
define('SESSION_PATH', '/');
define('SESSION_DOMAIN', '');
define('SESSION_SECURE', false);
define('SESSION_HTTP_ONLY', true);

// Configuration de sécurité
define('CSRF_TOKEN_NAME', 'csrf_token');
define('PASSWORD_MIN_LENGTH', 8);
define('LOGIN_MAX_ATTEMPTS', 5);
define('LOGIN_LOCKOUT_TIME', 900); // 15 minutes

// Configuration des uploads
define('MAX_FILE_SIZE', 10 * 1024 * 1024); // 10 MB
define('ALLOWED_IMAGE_TYPES', ['jpg', 'jpeg', 'png', 'gif', 'webp']);
define('ALLOWED_DOCUMENT_TYPES', ['pdf', 'doc', 'docx', 'xls', 'xlsx']);

// Configuration des emails
define('SMTP_HOST', 'localhost');
define('SMTP_PORT', 587);
define('SMTP_USERNAME', '');
define('SMTP_PASSWORD', '');
define('SMTP_ENCRYPTION', 'tls');

// Configuration des analytics
define('GA_TRACKING_ID', 'G-XXXXXXXXXX');

// Configuration de l'environnement
define('ENVIRONMENT', 'development'); // development, production
define('DEBUG_MODE', ENVIRONMENT === 'development');

// Configuration des erreurs
if (DEBUG_MODE) {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
} else {
    error_reporting(0);
    ini_set('display_errors', 0);
}

// Configuration des sessions
ini_set('session.cookie_httponly', 1);
ini_set('session.use_only_cookies', 1);
ini_set('session.cookie_secure', SESSION_SECURE);
ini_set('session.cookie_samesite', 'Strict');

// Démarrage de la session
if (session_status() === PHP_SESSION_NONE) {
    session_name(SESSION_NAME);
    session_start();
}

// Configuration des fuseaux horaires
date_default_timezone_set('Europe/Paris');

// Configuration des locales
setlocale(LC_TIME, 'fr_FR.UTF-8', 'French_France.1252');

// Fonction d'autoload des classes
spl_autoload_register(function ($class) {
    $file = ROOT_PATH . '/classes/' . $class . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
});

// Fonction de nettoyage des variables globales
function cleanGlobals() {
    if (isset($_GET)) {
        $_GET = array_map('htmlspecialchars', $_GET);
    }
    if (isset($_POST)) {
        $_POST = array_map('htmlspecialchars', $_POST);
    }
}

// Nettoyage automatique
cleanGlobals();
?>
