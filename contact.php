<?php
/**
 * Page Contact - Style identique à l'accueil
 * Site professionnel de Maickel Okereke
 */

// Configuration de la page
$page_title = 'Contact - Maickel Okereke';
$page_description = 'Contactez Maickel Okereke pour vos besoins en comptabilité et développement web.';
$page_keywords = 'contact, comptable, développeur web, Maickel Okereke';

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
                        <li class="nav-item"><a href="a-propos.php" class="nav-link">À propos</a></li>
                        <li class="nav-item"><a href="equipe.php" class="nav-link">Équipe</a></li>
                        <li class="nav-item"><a href="etudes-de-cas.php" class="nav-link">Études de cas</a></li>
                        <li class="nav-item"><a href="blog.php" class="nav-link">Blog</a></li>
                        <li class="nav-item"><a href="contact.php" class="nav-link active">Contact</a></li>
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
                        Contactez
                        <span class="highlight">Maickel Okereke</span>
                    </h1>
                    <p class="hero-description">
                        Prêt à discuter de votre projet ? Contactez-moi pour un accompagnement personnalisé.
                    </p>
                    <div class="hero-actions">
                        <a href="tel:+33123456789" class="btn btn-primary btn-large">
                            <i class="fas fa-phone"></i>
                            M\'appeler
                        </a>
                        <a href="mailto:contact@maickel-okereke.com" class="btn btn-outline btn-large">
                            <i class="fas fa-envelope"></i>
                            M\'écrire
                        </a>
                    </div>
                </div>
                <div class="hero-image">
                    <img src="assets/images/contact-hero.jpg" alt="Contact Maickel Okereke" class="hero-img">
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Form Section -->
    <section class="contact-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Formulaire de Contact</h2>
                <p class="section-subtitle">Envoyez-moi votre message et je vous répondrai rapidement</p>
            </div>
            
            <div class="contact-content">
                <div class="contact-info">
                    <h3>Mes Coordonnées</h3>
                    <div class="contact-item">
                        <i class="fas fa-phone"></i>
                        <span>+33 1 23 45 67 89</span>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-envelope"></i>
                        <span>contact@maickel-okereke.com</span>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>Paris, France</span>
                    </div>
                </div>
                
                <form class="contact-form">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="nom">Nom *</label>
                            <input type="text" id="nom" name="nom" required>
                        </div>
                        <div class="form-group">
                            <label for="prenom">Prénom *</label>
                            <input type="text" id="prenom" name="prenom" required>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="email">Email *</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="telephone">Téléphone</label>
                            <input type="tel" id="telephone" name="telephone">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="sujet">Sujet *</label>
                        <select id="sujet" name="sujet" required>
                            <option value="">Sélectionnez un sujet</option>
                            <option value="comptabilite">Comptabilité</option>
                            <option value="developpement">Développement Web</option>
                            <option value="conseil">Conseil</option>
                            <option value="devis">Demande de devis</option>
                            <option value="autre">Autre</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="message">Message *</label>
                        <textarea id="message" name="message" rows="5" required></textarea>
                    </div>
                    
                    <button type="submit" class="btn btn-primary btn-large">
                        <i class="fas fa-paper-plane"></i>
                        Envoyer le message
                    </button>
                </form>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include 'includes/footer.php'; ?>

    <!-- JavaScript -->
    <script src="assets/js/main.js"></script>
</body>
</html>
