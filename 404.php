<?php
/**
 * Page d'erreur 404
 * Site professionnel de Maickel Okereke
 */

// Configuration de la page
$page_title = 'Page non trouvée - Maickel Okereke';
$page_description = 'La page que vous recherchez n\'existe pas ou a été déplacée.';
http_response_code(404);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title; ?></title>
    <meta name="description" content="<?php echo $page_description; ?>">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/assets/images/favicon.ico">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- CSS -->
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/responsive.css">
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="container">
            <div class="header-content">
                <div class="logo">
                    <a href="/">
                        <h1>Maickel Okereke</h1>
                        <p>Comptable & Développeur web</p>
                    </a>
                </div>
                
                <nav class="nav">
                    <ul>
                        <li><a href="/">Accueil</a></li>
                        <li><a href="/services.php">Services</a></li>
                        <li><a href="/a-propos.php">À propos</a></li>
                        <li><a href="/contact.php">Contact</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main>
        <!-- Section 404 -->
        <section class="section section-404">
            <div class="container">
                <div class="error-container">
                    <div class="error-content">
                        <div class="error-number">404</div>
                        <h1>Page non trouvée</h1>
                        <p>Désolé, la page que vous recherchez n'existe pas ou a été déplacée.</p>
                        
                        <div class="error-actions">
                            <a href="/" class="btn btn-primary">
                                <i class="fas fa-home"></i>
                                <span>Retour à l'accueil</span>
                            </a>
                            <a href="/contact.php" class="btn btn-outline">
                                <i class="fas fa-envelope"></i>
                                <span>Nous contacter</span>
                            </a>
                        </div>
                        
                        <div class="error-help">
                            <h3>Vous cherchez quelque chose de spécifique ?</h3>
                            <div class="help-links">
                                <a href="/services.php">Nos services</a>
                                <a href="/blog.php">Notre blog</a>
                                <a href="/ressources.php">Ressources</a>
                                <a href="/faq.php">FAQ</a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="error-image">
                        <div class="placeholder-404">
                            <i class="fas fa-search"></i>
                            <p>Page introuvable</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-brand">
                    <h3>Maickel Okereke</h3>
                    <p>Expert en comptabilité et développement web</p>
                    <p>contact@maickel-okereke.com</p>
                </div>
                
                <div class="footer-links">
                    <h4>Liens utiles</h4>
                    <ul>
                        <li><a href="/mentions-legales.php">Mentions légales</a></li>
                        <li><a href="/politique-de-confidentialite.php">Politique de confidentialité</a></li>
                        <li><a href="/plan-du-site.php">Plan du site</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>&copy; 2025 Maickel Okereke. Tous droits réservés.</p>
            </div>
        </div>
    </footer>

    <!-- JavaScript -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Animation de la page 404
        const errorNumber = document.querySelector('.error-number');
        const errorContent = document.querySelector('.error-content');
        
        setTimeout(() => {
            errorNumber.classList.add('animate');
        }, 100);
        
        setTimeout(() => {
            errorContent.classList.add('animate');
        }, 300);
        
        // Animation des liens d'aide
        const helpLinks = document.querySelectorAll('.help-links a');
        helpLinks.forEach((link, index) => {
            setTimeout(() => {
                link.classList.add('animate');
            }, 500 + (index * 100));
        });
        
        // Gestion des images placeholder
        const placeholder = document.querySelector('.placeholder-404');
        if (placeholder) {
            placeholder.style.backgroundColor = '#f3f4f6';
            placeholder.style.display = 'flex';
            placeholder.style.flexDirection = 'column';
            placeholder.style.alignItems = 'center';
            placeholder.style.justifyContent = 'center';
            placeholder.style.minHeight = '300px';
            placeholder.style.borderRadius = '10px';
        }
    });
    </script>
</body>
</html>