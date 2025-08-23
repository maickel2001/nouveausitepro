<?php
/**
 * En-tête commun
 * Site professionnel de Maickel Okereke
 */

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../includes/functions.php';

// Récupération des informations de la page courante
$current_page = basename($_SERVER['PHP_SELF'], '.php');
$page_title = $page_title ?? SITE_NAME;
$page_description = $page_description ?? SITE_DESCRIPTION;
$page_keywords = $page_keywords ?? 'comptabilité, développement web, conseil fiscal, Maickel Okereke';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <!-- SEO Meta Tags -->
    <title><?php echo htmlspecialchars($page_title); ?></title>
    <meta name="description" content="<?php echo htmlspecialchars($page_description); ?>">
    <meta name="keywords" content="<?php echo htmlspecialchars($page_keywords); ?>">
    <meta name="author" content="Maickel Okereke">
    <meta name="robots" content="index, follow">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo SITE_URL . $_SERVER['REQUEST_URI']; ?>">
    <meta property="og:title" content="<?php echo htmlspecialchars($page_title); ?>">
    <meta property="og:description" content="<?php echo htmlspecialchars($page_description); ?>">
    <meta property="og:image" content="<?php echo SITE_URL; ?>/assets/images/og-image.jpg">
    <meta property="og:site_name" content="<?php echo SITE_NAME; ?>">
    
    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="<?php echo SITE_URL . $_SERVER['REQUEST_URI']; ?>">
    <meta property="twitter:title" content="<?php echo htmlspecialchars($page_title); ?>">
    <meta property="twitter:description" content="<?php echo htmlspecialchars($page_description); ?>">
    <meta property="twitter:image" content="<?php echo SITE_URL; ?>/assets/images/twitter-image.jpg">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/assets/images/favicon.ico">
    <link rel="apple-touch-icon" sizes="180x180" href="/assets/images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/assets/images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/images/favicon-16x16.png">
    
    <!-- Preconnect pour améliorer les performances -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- CSS principal -->
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/responsive.css">
    
    <!-- CSS spécifique à la page -->
    <?php if (isset($page_css)): ?>
        <?php foreach ($page_css as $css): ?>
            <link rel="stylesheet" href="<?php echo $css; ?>">
        <?php endforeach; ?>
    <?php endif; ?>
    
    <!-- Google Analytics -->
    <?php if (GA_TRACKING_ID && GA_TRACKING_ID !== 'G-XXXXXXXXXX'): ?>
    <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo GA_TRACKING_ID; ?>"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', '<?php echo GA_TRACKING_ID; ?>');
    </script>
    <?php endif; ?>
</head>
<body class="<?php echo $current_page; ?>-page">
    <!-- Skip to main content pour l'accessibilité -->
    <a href="#main-content" class="skip-link">Passer au contenu principal</a>
    
    <!-- Header -->
    <header class="header" id="header">
        <div class="container">
            <nav class="navbar">
                <!-- Logo -->
                <div class="navbar-brand">
                    <a href="/" class="logo" aria-label="Accueil - <?php echo SITE_NAME; ?>">
                        <i class="fas fa-chart-line"></i>
                        <span class="logo-text">Maickel Okereke</span>
                    </a>
                </div>
                
                <!-- Navigation principale -->
                <div class="navbar-menu" id="navbar-menu">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="/" class="nav-link <?php echo $current_page === 'index' ? 'active' : ''; ?>">
                                <i class="fas fa-home"></i>
                                <span>Accueil</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/services.php" class="nav-link <?php echo $current_page === 'services' ? 'active' : ''; ?>">
                                <i class="fas fa-briefcase"></i>
                                <span>Services</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/a-propos.php" class="nav-link <?php echo $current_page === 'a-propos' ? 'active' : ''; ?>">
                                <i class="fas fa-user"></i>
                                <span>À propos</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/etudes-de-cas.php" class="nav-link <?php echo $current_page === 'etudes-de-cas' ? 'active' : ''; ?>">
                                <i class="fas fa-lightbulb"></i>
                                <span>Études de cas</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/blog.php" class="nav-link <?php echo $current_page === 'blog' ? 'active' : ''; ?>">
                                <i class="fas fa-blog"></i>
                                <span>Blog</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/ressources.php" class="nav-link <?php echo $current_page === 'ressources' ? 'active' : ''; ?>">
                                <i class="fas fa-download"></i>
                                <span>Ressources</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/contact.php" class="nav-link <?php echo $current_page === 'contact' ? 'active' : ''; ?>">
                                <i class="fas fa-envelope"></i>
                                <span>Contact</span>
                            </a>
                        </li>
                    </ul>
                </div>
                
                <!-- Actions utilisateur -->
                <div class="navbar-actions">
                    <?php if (isLoggedIn()): ?>
                        <!-- Menu utilisateur connecté -->
                        <div class="user-menu">
                            <button class="user-menu-toggle" aria-expanded="false" aria-haspopup="true">
                                <i class="fas fa-user-circle"></i>
                                <span><?php echo htmlspecialchars($_SESSION['user_nom'] ?? 'Utilisateur'); ?></span>
                                <i class="fas fa-chevron-down"></i>
                            </button>
                            <ul class="user-dropdown" role="menu">
                                <li><a href="/user/dashboard.php" role="menuitem"><i class="fas fa-tachometer-alt"></i> Tableau de bord</a></li>
                                <li><a href="/user/profil.php" role="menuitem"><i class="fas fa-user-edit"></i> Mon profil</a></li>
                                <li><a href="/user/devis.php" role="menuitem"><i class="fas fa-file-invoice"></i> Mes devis</a></li>
                                <li><a href="/user/ressources.php" role="menuitem"><i class="fas fa-download"></i> Mes ressources</a></li>
                                <li class="divider"></li>
                                <li><a href="/logout.php" role="menuitem"><i class="fas fa-sign-out-alt"></i> Déconnexion</a></li>
                            </ul>
                        </div>
                    <?php else: ?>
                        <!-- Boutons pour utilisateurs non connectés -->
                        <div class="auth-buttons">
                            <a href="/devis.php" class="btn btn-primary">
                                <i class="fas fa-file-invoice"></i>
                                <span>Demander un devis</span>
                            </a>
                            <a href="/login.php" class="btn btn-outline">
                                <i class="fas fa-sign-in-alt"></i>
                                <span>Connexion</span>
                            </a>
                        </div>
                    <?php endif; ?>
                    
                    <!-- Bouton mobile -->
                    <button class="navbar-toggle" id="navbar-toggle" aria-label="Menu de navigation">
                        <span class="navbar-toggle-line"></span>
                        <span class="navbar-toggle-line"></span>
                        <span class="navbar-toggle-line"></span>
                    </button>
                </div>
            </nav>
        </div>
    </header>
    
    <!-- Barre de progression -->
    <div class="progress-bar" id="progress-bar"></div>
    
    <!-- Contenu principal -->
    <main id="main-content" class="main-content">
        <?php if (isset($page_header)): ?>
            <!-- En-tête de page personnalisé -->
            <div class="page-header">
                <div class="container">
                    <?php echo $page_header; ?>
                </div>
            </div>
        <?php endif; ?>