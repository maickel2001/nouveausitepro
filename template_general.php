<?php
/**
 * Page À propos - Style identique à l'accueil
 * Site professionnel de Maickel Okereke
 */

// Configuration de la page
$page_title = 'À Propos - Maickel Okereke';
$page_description = 'Découvrez l\'expertise et l\'expérience de Maickel Okereke, comptable et développeur web professionnel.';
$page_keywords = 'à propos, expertise, expérience, Maickel Okereke, comptable, développeur web';

// Inclusion des fichiers nécessaires
require_once 'includes/functions.php';
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
                        <li class="nav-item"><a href="services.php" class="nav-link">Services</a></li>
                        <li class="nav-item"><a href="a-propos.php" class="nav-link active">À propos</a></li>
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
                        À Propos de
                        <span class="highlight">Maickel Okereke</span>
                    </h1>
                    <p class="hero-description">
                        Découvrez mon parcours, mon expertise et ma vision pour accompagner votre entreprise vers le succès.
                    </p>
                    <div class="hero-actions">
                        <a href="contact.php" class="btn btn-primary btn-large">
                            <i class="fas fa-envelope"></i>
                            Me contacter
                        </a>
                        <a href="services.php" class="btn btn-outline btn-large">
                            <i class="fas fa-info-circle"></i>
                            Mes services
                        </a>
                    </div>
                </div>
                <div class="hero-image">
                    <img src="assets/images/about-hero.jpg" alt="Maickel Okereke" class="hero-img">
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="about-preview">
        <div class="container">
            <div class="about-content">
                <div class="about-text">
                    <h2 class="section-title">Mon Parcours</h2>
                    <p class="about-description">
                        Avec plus de 10 ans d'expérience dans la comptabilité et le développement web, je combine expertise technique et vision stratégique pour offrir des solutions complètes à mes clients.
                    </p>
                    <p class="about-description">
                        Spécialisé dans l'accompagnement des TPE/PME et startups, je m'adapte aux spécificités de chaque entreprise pour maximiser leur potentiel de croissance.
                    </p>
                    <div class="about-stats">
                        <div class="stat-item">
                            <span class="stat-number">150+</span>
                            <span class="stat-label">Clients satisfaits</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number">10+</span>
                            <span class="stat-label">Années d'expérience</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number">98%</span>
                            <span class="stat-label">Taux de satisfaction</span>
                        </div>
                    </div>
                </div>
                <div class="about-image">
                    <img src="assets/images/about-preview.jpg" alt="Maickel Okereke en action" class="about-img">
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <div class="cta-content">
                <h2 class="cta-title">Prêt à travailler ensemble ?</h2>
                <p class="cta-description">
                    Contactez-moi pour discuter de votre projet et voir comment je peux vous aider.
                </p>
                <div class="cta-actions">
                    <a href="contact.php" class="btn btn-primary btn-large">
                        <i class="fas fa-envelope"></i>
                        Me contacter
                    </a>
                    <a href="devis.php" class="btn btn-outline btn-large">
                        <i class="fas fa-calculator"></i>
                        Devis gratuit
                    </a>
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
