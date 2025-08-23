<?php
// Test du style de l'accueil
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Style - Maickel Okereke</title>
    
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
                        <li class="nav-item"><a href="a-propos.php" class="nav-link">À propos</a></li>
                        <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
                    </ul>
                </div>
                
                <div class="navbar-actions">
                    <a href="devis.php" class="btn btn-primary">Devis gratuit</a>
                    <a href="user/login.php" class="btn btn-outline">Connexion</a>
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
                        Test du Style
                        <span class="highlight">de l'Accueil</span>
                    </h1>
                    <p class="hero-description">
                        Cette page utilise exactement le même CSS que la page d'accueil pour vérifier que le style est cohérent.
                    </p>
                    <div class="hero-actions">
                        <a href="index.php" class="btn btn-primary btn-large">
                            <i class="fas fa-home"></i>
                            Retour à l'accueil
                        </a>
                    </div>
                </div>
                <div class="hero-image">
                    <img src="assets/images/hero-main.jpg" alt="Test style" class="hero-img">
                </div>
            </div>
        </div>
    </section>

    <!-- Test Section -->
    <section class="services-preview">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Test des Composants</h2>
                <p class="section-subtitle">Vérification que tous les styles fonctionnent</p>
            </div>
            
            <div class="services-grid">
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-check"></i>
                    </div>
                    <h3 class="service-title">Style OK</h3>
                    <p class="service-description">
                        Si vous voyez ceci avec le même style que l'accueil, c'est que tout fonctionne !
                    </p>
                    <a href="#" class="service-link">Test réussi <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </section>

    <!-- JavaScript -->
    <script src="assets/js/main.js"></script>
</body>
</html>
