<?php
/**
 * Page des services - Style identique à l'accueil
 * Site professionnel de Maickel Okereke
 */

// Configuration de la page
$page_title = 'Nos Services - Maickel Okereke';
$page_description = 'Découvrez nos services de comptabilité, développement web et conseil fiscal. Solutions sur mesure pour TPE/PME et startups.';
$page_keywords = 'services comptabilité, développement web, conseil fiscal, TPE PME, startups, Maickel Okereke';

// Inclusion des fichiers nécessaires
require_once 'includes/functions.php';

// Données des services
$services = [
    [
        'id' => 'comptabilite',
        'titre' => 'Comptabilité Générale',
        'description' => 'Gestion complète de votre comptabilité incluant la saisie des écritures, la tenue des livres comptables, l\'établissement des comptes annuels et la déclaration fiscale.',
        'prix' => 'À partir de 150€/mois',
        'icone' => 'fas fa-calculator'
    ],
    [
        'id' => 'developpement',
        'titre' => 'Développement Web',
        'description' => 'Développement de sites web sur mesure, applications web et solutions e-commerce adaptées aux besoins de votre entreprise.',
        'prix' => 'À partir de 2500€',
        'icone' => 'fas fa-code'
    ],
    [
        'id' => 'conseil',
        'titre' => 'Conseil Fiscal',
        'description' => 'Accompagnement personnalisé pour optimiser votre situation fiscale et respecter vos obligations légales.',
        'prix' => 'À partir de 200€/heure',
        'icone' => 'fas fa-chart-line'
    ]
];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title; ?></title>
    <meta name="description" content="<?php echo $page_description; ?>">
    <meta name="keywords" content="<?php echo $page_keywords; ?>">
    
    <!-- CSS principal (même que l'accueil) -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <!-- Header -->
    <header class="header">
        <nav class="navbar">
            <div class="container">
                <div class="navbar-brand">
                    <a href="index.php" class="logo">
                        <span class="logo-text">Maickel Okereke</span>
                        <span class="logo-subtitle">Comptable & Développeur Web</span>
                    </a>
                </div>
                
                <div class="navbar-menu" id="navbar-menu">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a href="index.php" class="nav-link">Accueil</a></li>
                        <li class="nav-item"><a href="services.php" class="nav-link active">Services</a></li>
                        <li class="nav-item"><a href="a-propos.php" class="nav-link">À propos</a></li>
                        <li class="nav-item"><a href="equipe.php" class="nav-link">Équipe</a></li>
                        <li class="nav-item"><a href="etudes-de-cas.php" class="nav-link">Études de cas</a></li>
                        <li class="nav-item"><a href="blog.php" class="nav-link">Blog</a></li>
                        <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
                    </ul>
                </div>
                
                <div class="navbar-actions">
                    <a href="devis.php" class="btn btn-primary">Devis gratuit</a>
                    <a href="user/login.php" class="btn btn-outline">Connexion</a>
                    <button class="navbar-toggle" id="navbar-toggle">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                </div>
            </div>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <div class="hero-text">
                    <h1 class="hero-title">
                        Nos Services
                        <span class="highlight">Professionnels</span>
                    </h1>
                    <p class="hero-description">
                        Découvrez notre gamme complète de services en comptabilité, développement web et conseil. 
                        Des solutions sur mesure adaptées aux besoins de votre entreprise.
                    </p>
                    <div class="hero-actions">
                        <a href="devis.php" class="btn btn-primary btn-large">
                            <i class="fas fa-calculator"></i>
                            Devis gratuit
                        </a>
                        <a href="contact.php" class="btn btn-outline btn-large">
                            <i class="fas fa-envelope"></i>
                            Nous contacter
                        </a>
                    </div>
                </div>
                <div class="hero-image">
                    <img src="assets/images/hero-main.jpg" alt="Nos services professionnels" class="hero-img">
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="services-preview">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Nos Services Principaux</h2>
                <p class="section-subtitle">Des solutions complètes et personnalisées pour votre entreprise</p>
            </div>
            
            <div class="services-grid">
                <?php foreach ($services as $service): ?>
                <div class="service-card" id="<?php echo $service['id']; ?>">
                    <div class="service-icon">
                        <i class="<?php echo $service['icone']; ?>"></i>
                    </div>
                    <h3 class="service-title"><?php echo htmlspecialchars($service['titre']); ?></h3>
                    <p class="service-description">
                        <?php echo htmlspecialchars($service['description']); ?>
                    </p>
                    <div class="service-price">
                        <span class="price-tag"><?php echo htmlspecialchars($service['prix']); ?></span>
                    </div>
                    <a href="devis.php?service=<?php echo urlencode($service['id']); ?>" class="service-link">
                        Demander un devis <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <div class="cta-content">
                <h2 class="cta-title">Prêt à commencer votre projet ?</h2>
                <p class="cta-description">
                    Contactez-nous pour discuter de vos besoins et obtenir un devis personnalisé.
                </p>
                <div class="cta-actions">
                    <a href="devis.php" class="btn btn-primary btn-large">
                        <i class="fas fa-calculator"></i>
                        Devis gratuit
                    </a>
                    <a href="contact.php" class="btn btn-outline btn-large">
                        <i class="fas fa-phone"></i>
                        Nous appeler
                    </li>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include 'includes/footer.php'; ?>

    <!-- JavaScript -->
    <script src="assets/js/main.js"></script>
</body>
</html>
