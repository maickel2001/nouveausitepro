<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maickel Okereke - Comptable & Développeur Web | Services Professionnels</title>
    <meta name="description" content="Maickel Okereke, expert comptable et développeur web. Services de comptabilité, développement web et conseil pour TPE/PME et startups.">
    <meta name="keywords" content="comptable, développeur web, comptabilité, développement, TPE, PME, startup">
    
    <!-- Open Graph -->
    <meta property="og:title" content="Maickel Okereke - Comptable & Développeur Web">
    <meta property="og:description" content="Services professionnels de comptabilité et développement web">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://maickel-okereke.com">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/images/favicon.ico">
    
    <!-- CSS -->
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
                        <li class="nav-item"><a href="index.php" class="nav-link active">Accueil</a></li>
                        <li class="nav-item"><a href="services.php" class="nav-link">Services</a></li>
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
                        Solutions Comptables & Développement Web
                        <span class="highlight">Professionnelles</span>
                    </h1>
                    <p class="hero-description">
                        Expert en comptabilité et développement web, je vous accompagne dans la croissance de votre entreprise avec des solutions sur mesure et un service personnalisé.
                    </p>
                    <div class="hero-actions">
                        <a href="devis.php" class="btn btn-primary btn-large">
                            <i class="fas fa-calculator"></i>
                            Devis gratuit
                        </a>
                        <a href="services.php" class="btn btn-outline btn-large">
                            <i class="fas fa-info-circle"></i>
                            Découvrir nos services
                        </a>
                    </div>
                </div>
                <div class="hero-image">
                    <img src="assets/images/hero-main.jpg" alt="Maickel Okereke - Expert comptable et développeur web" class="hero-img">
                </div>
            </div>
        </div>
    </section>

    <!-- Services Preview -->
    <section class="services-preview">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Nos Services Principaux</h2>
                <p class="section-subtitle">Des solutions complètes pour votre entreprise</p>
            </div>
            
            <div class="services-grid">
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-calculator"></i>
                    </div>
                    <h3 class="service-title">Comptabilité</h3>
                    <p class="service-description">
                        Gestion comptable complète, déclarations fiscales, bilan annuel et conseil financier personnalisé.
                    </p>
                    <a href="services.php#comptabilite" class="service-link">En savoir plus <i class="fas fa-arrow-right"></i></a>
                </div>
                
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-code"></i>
                    </div>
                    <h3 class="service-title">Développement Web</h3>
                    <p class="service-description">
                        Sites web professionnels, applications sur mesure et solutions e-commerce adaptées à vos besoins.
                    </p>
                    <a href="services.php#developpement" class="service-link">En savoir plus <i class="fas fa-arrow-right"></i></a>
                </div>
                
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h3 class="service-title">Conseil & Stratégie</h3>
                    <p class="service-description">
                        Accompagnement stratégique, optimisation des processus et conseil en développement d'entreprise.
                    </p>
                    <a href="services.php#conseil" class="service-link">En savoir plus <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </section>

    <!-- About Preview -->
    <section class="about-preview">
        <div class="container">
            <div class="about-content">
                <div class="about-text">
                    <h2 class="section-title">À Propos de Maickel Okereke</h2>
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
                    <a href="a-propos.php" class="btn btn-outline">En savoir plus</a>
                </div>
                <div class="about-image">
                    <img src="assets/images/about-preview.jpg" alt="Maickel Okereke en action" class="about-img">
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Preview -->
    <section class="testimonials-preview">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Ce que disent nos clients</h2>
                <p class="section-subtitle">Témoignages de satisfaction</p>
            </div>
            
            <div class="testimonials-grid">
                <div class="testimonial-card">
                    <div class="testimonial-content">
                        <p class="testimonial-text">
                            "Maickel a transformé notre gestion comptable et créé un site web qui reflète parfaitement notre image de marque. Un professionnel de confiance !"
                        </p>
                    </div>
                    <div class="testimonial-author">
                        <img src="assets/images/testimonial-1.jpg" alt="Marie Dubois" class="author-photo">
                        <div class="author-info">
                            <h4 class="author-name">Marie Dubois</h4>
                            <p class="author-role">Directrice, TechStart SAS</p>
                        </div>
                    </div>
                </div>
                
                <div class="testimonial-card">
                    <div class="testimonial-content">
                        <p class="testimonial-text">
                            "Un accompagnement exceptionnel dans notre transformation digitale. Maickel comprend parfaitement les enjeux des PME."
                        </p>
                    </div>
                    <div class="testimonial-author">
                        <img src="assets/images/testimonial-2.jpg" alt="Pierre Martin" class="author-photo">
                        <div class="author-info">
                            <h4 class="author-name">Pierre Martin</h4>
                            <p class="author-role">Gérant, Martin & Co</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="testimonials-actions">
                <a href="temoignages.php" class="btn btn-outline">Voir tous les témoignages</a>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <div class="cta-content">
                <h2 class="cta-title">Prêt à transformer votre entreprise ?</h2>
                <p class="cta-description">
                    Contactez-moi pour un devis personnalisé et gratuit. Ensemble, créons les solutions qui feront croître votre entreprise.
                </p>
                <div class="cta-actions">
                    <a href="devis.php" class="btn btn-primary btn-large">
                        <i class="fas fa-rocket"></i>
                        Commencer maintenant
                    </a>
                    <a href="contact.php" class="btn btn-outline btn-large">
                        <i class="fas fa-phone"></i>
                        Nous contacter
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <div class="footer-brand">
                        <h3 class="footer-logo">Maickel Okereke</h3>
                        <p class="footer-subtitle">Comptable & Développeur Web</p>
                    </div>
                    <p class="footer-description">
                        Solutions professionnelles en comptabilité et développement web pour TPE/PME et startups.
                    </p>
                    <div class="social-links">
                        <a href="#" class="social-link"><i class="fab fa-linkedin"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-facebook"></i></a>
                    </div>
                </div>
                
                <div class="footer-section">
                    <h4 class="footer-title">Services</h4>
                    <ul class="footer-links">
                        <li><a href="services.php#comptabilite">Comptabilité</a></li>
                        <li><a href="services.php#developpement">Développement Web</a></li>
                        <li><a href="services.php#conseil">Conseil & Stratégie</a></li>
                        <li><a href="ressources.php">Ressources</a></li>
                    </ul>
                </div>
                
                <div class="footer-section">
                    <h4 class="footer-title">Entreprise</h4>
                    <ul class="footer-links">
                        <li><a href="a-propos.php">À propos</a></li>
                        <li><a href="equipe.php">Équipe</a></li>
                        <li><a href="etudes-de-cas.php">Études de cas</a></li>
                        <li><a href="blog.php">Blog</a></li>
                    </ul>
                </div>
                
                <div class="footer-section">
                    <h4 class="footer-title">Support</h4>
                    <ul class="footer-links">
                        <li><a href="faq.php">FAQ</a></li>
                        <li><a href="contact.php">Contact</a></li>
                        <li><a href="devis.php">Devis</a></li>
                        <li><a href="rendez-vous.php">Rendez-vous</a></li>
                    </ul>
                </div>
                
                <div class="footer-section">
                    <h4 class="footer-title">Légal</h4>
                    <ul class="footer-links">
                        <li><a href="mentions-legales.php">Mentions légales</a></li>
                        <li><a href="politique-de-confidentialite.php">Confidentialité</a></li>
                        <li><a href="plan-du-site.php">Plan du site</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="footer-bottom">
                <div class="footer-bottom-content">
                    <p class="footer-copyright">
                        © 2025 Maickel Okereke. Tous droits réservés.
                    </p>
                    <div class="footer-bottom-links">
                        <a href="mentions-legales.php">Mentions légales</a>
                        <a href="politique-de-confidentialite.php">Confidentialité</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="assets/js/main.js"></script>
    <script src="assets/js/navigation.js"></script>
</body>
</html>