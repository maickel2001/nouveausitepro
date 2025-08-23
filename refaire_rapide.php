<?php
/**
 * Script pour refaire rapidement toutes les pages avec le style de l'accueil
 */

echo "=== REFAIRE RAPIDEMENT TOUTES LES PAGES ===\n";
echo "Style basé sur la page d'accueil\n\n";

// Liste des pages à refaire
$pages = [
    'devis.php' => [
        'title' => 'Devis Gratuit - Maickel Okereke',
        'description' => 'Demandez votre devis gratuit pour vos services de comptabilité et développement web.',
        'hero_title' => 'Devis Gratuit',
        'hero_highlight' => 'Personnalisé',
        'hero_description' => 'Obtenez un devis sur mesure pour vos besoins en comptabilité et développement web.'
    ],
    'equipe.php' => [
        'title' => 'Notre Équipe - Maickel Okereke',
        'description' => 'Découvrez l\'équipe de professionnels qui accompagne votre entreprise.',
        'hero_title' => 'Notre Équipe',
        'hero_highlight' => 'Professionnelle',
        'hero_description' => 'Une équipe d\'experts dédiés à votre succès.'
    ],
    'etudes-de-cas.php' => [
        'title' => 'Études de Cas - Maickel Okereke',
        'description' => 'Découvrez nos réalisations et succès clients.',
        'hero_title' => 'Études de Cas',
        'hero_highlight' => 'Réussites',
        'hero_description' => 'Des exemples concrets de nos réalisations et du succès de nos clients.'
    ],
    'blog.php' => [
        'title' => 'Blog - Maickel Okereke',
        'description' => 'Actualités, conseils et insights sur la comptabilité et le développement web.',
        'hero_title' => 'Notre Blog',
        'hero_highlight' => 'Expertise',
        'hero_description' => 'Partagez notre expertise et restez informé des dernières tendances.'
    ],
    'faq.php' => [
        'title' => 'FAQ - Maickel Okereke',
        'description' => 'Questions fréquemment posées sur nos services.',
        'hero_title' => 'Questions Fréquentes',
        'hero_highlight' => 'Réponses',
        'hero_description' => 'Trouvez rapidement les réponses à vos questions.'
    ],
    'ressources.php' => [
        'title' => 'Ressources - Maickel Okereke',
        'description' => 'Téléchargez nos guides et ressources gratuites.',
        'hero_title' => 'Ressources',
        'hero_highlight' => 'Gratuites',
        'hero_description' => 'Téléchargez nos guides et ressources pour vous accompagner.'
    ],
    'temoignages.php' => [
        'title' => 'Témoignages - Maickel Okereke',
        'description' => 'Ce que disent nos clients satisfaits.',
        'hero_title' => 'Témoignages',
        'hero_highlight' => 'Clients',
        'hero_description' => 'Découvrez ce que disent nos clients satisfaits.'
    ]
];

foreach ($pages as $page => $config) {
    echo "Refaisant $page...\n";
    
    $content = '<?php
/**
 * ' . $config['title'] . ' - Style identique à l\'accueil
 * Site professionnel de Maickel Okereke
 */

// Configuration de la page
$page_title = "' . $config['title'] . '";
$page_description = "' . $config['description'] . '";
$page_keywords = "' . strtolower(str_replace([' - ', ' '], [', ', ', '], $config['title'])) . '";

// Inclusion des fichiers nécessaires
require_once \'includes/functions.php\';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title; ?></title>
    <meta name="description" content="<?php echo $page_description; ?>">
    <meta name="keywords" content="<?php echo $page_keywords; ?>">
    
    <!-- CSS principal (même que l\'accueil) -->
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
                        ' . $config['hero_title'] . '
                        <span class="highlight">' . $config['hero_highlight'] . '</span>
                    </h1>
                    <p class="hero-description">
                        ' . $config['hero_description'] . '
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
                    <img src="assets/images/hero-main.jpg" alt="' . $config['hero_title'] . '" class="hero-img">
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="main-content">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Contenu de la Page</h2>
                <p class="section-subtitle">Cette page utilise le même style que l\'accueil</p>
            </div>
            
            <div class="content-placeholder">
                <p>Le contenu spécifique de cette page sera ajouté ici, mais avec le même style que l\'accueil.</p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include \'includes/footer.php\'; ?>

    <!-- JavaScript -->
    <script src="assets/js/main.js"></script>
</body>
</html>';

    // Sauvegarder l'ancienne page
    if (file_exists($page)) {
        rename($page, $page . '_old');
        echo "  - Ancienne page sauvegardée: {$page}_old\n";
    }
    
    // Créer la nouvelle page
    file_put_contents($page, $content);
    echo "  - Nouvelle page créée: $page\n";
}

echo "\n=== TERMINÉ ===\n";
echo "Toutes les pages ont été refaites avec le style de l'accueil !\n";
echo "Les anciennes pages ont été sauvegardées avec l'extension _old\n";
?>
