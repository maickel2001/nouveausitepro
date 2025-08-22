<?php
/**
 * Page des services
 * Site professionnel de Maickel Okereke
 */

// Configuration de la page
$page_title = 'Nos Services - Maickel Okereke';
$page_description = 'Découvrez nos services de comptabilité, développement web et conseil fiscal. Solutions sur mesure pour TPE/PME et startups.';
$page_keywords = 'services comptabilité, développement web, conseil fiscal, TPE PME, startups, Maickel Okereke';

// Inclusion des fichiers nécessaires
require_once 'includes/functions.php';

// Inclusion du header
include 'includes/header.php';

// Données des services (en production, viendront de la base de données)
$services = [
    [
        'id' => 'comptabilite',
        'titre' => 'Comptabilité Générale',
        'description_courte' => 'Gestion complète de votre comptabilité',
        'description_complete' => 'Service complet de comptabilité générale incluant la saisie des écritures, la tenue des livres comptables, l\'établissement des comptes annuels et la déclaration fiscale. Nous nous adaptons à la taille et aux besoins de votre entreprise.',
        'prix' => 'À partir de 150€/mois',
        'icone' => 'fas fa-calculator',
        'avantages' => [
            'Saisie des écritures comptables',
            'Tenue des livres comptables',
            'Établissement des comptes annuels',
            'Déclarations fiscales',
            'Suivi de trésorerie',
            'Reporting mensuel'
        ],
        'image' => generatePlaceholderImage(400, 300, 'Comptabilité', '2563eb', 'ffffff')
    ],
    [
        'id' => 'developpement',
        'titre' => 'Développement Web',
        'description_courte' => 'Création de sites web professionnels',
        'description_complete' => 'Développement de sites web sur mesure, applications web et solutions e-commerce adaptées aux besoins de votre entreprise. Nous créons des solutions modernes, responsives et performantes.',
        'prix' => 'À partir de 2500€',
        'icone' => 'fas fa-code',
        'avantages' => [
            'Sites web responsives',
            'Applications web sur mesure',
            'Solutions e-commerce',
            'Maintenance et support',
            'Formation utilisateurs',
            'Hébergement sécurisé'
        ],
        'image' => generatePlaceholderImage(400, 300, 'Développement Web', '1e40af', 'ffffff')
    ],
    [
        'id' => 'conseil',
        'titre' => 'Conseil Fiscal',
        'description_courte' => 'Optimisation fiscale et conseils',
        'description_complete' => 'Accompagnement personnalisé pour optimiser votre situation fiscale et respecter vos obligations légales. Nous vous aidons à prendre les bonnes décisions pour votre entreprise.',
        'prix' => 'À partir de 200€/heure',
        'icone' => 'fas fa-chart-line',
        'avantages' => [
            'Optimisation fiscale',
            'Conseils juridiques',
            'Accompagnement création d\'entreprise',
            'Audit fiscal',
            'Formation équipes',
            'Veille réglementaire'
        ],
        'image' => generatePlaceholderImage(400, 300, 'Conseil Fiscal', '1e3a8a', 'ffffff')
    ],
    [
        'id' => 'accompagnement',
        'titre' => 'Accompagnement TPE/PME',
        'description_courte' => 'Support complet pour votre croissance',
        'description_complete' => 'Accompagnement global pour les petites et moyennes entreprises : stratégie, organisation, financement, développement commercial. Nous vous aidons à structurer votre croissance.',
        'prix' => 'Sur devis',
        'icone' => 'fas fa-users',
        'avantages' => [
            'Stratégie d\'entreprise',
            'Organisation et process',
            'Recherche de financement',
            'Développement commercial',
            'Formation des équipes',
            'Suivi de performance'
        ],
        'image' => generatePlaceholderImage(400, 300, 'Accompagnement TPE/PME', '1d4ed8', 'ffffff')
    ],
    [
        'id' => 'formation',
        'titre' => 'Formation Comptable',
        'description_courte' => 'Formation de vos équipes',
        'description_complete' => 'Formation sur mesure de vos équipes aux outils comptables et à la gestion financière. Nous adaptons nos programmes à votre niveau et à vos besoins spécifiques.',
        'prix' => 'À partir de 500€/jour',
        'icone' => 'fas fa-graduation-cap',
        'avantages' => [
            'Formation sur mesure',
            'Formation en entreprise',
            'Support pédagogique',
            'Suivi post-formation',
            'Certification possible',
            'Formation à distance'
        ],
        'image' => generatePlaceholderImage(400, 300, 'Formation Comptable', '1e40af', 'ffffff')
    ],
    [
        'id' => 'audit',
        'titre' => 'Audit & Contrôle',
        'description_courte' => 'Vérification et amélioration de vos processus',
        'description_complete' => 'Audit de vos processus comptables et financiers pour identifier les points d\'amélioration et assurer la conformité. Nous vous proposons des recommandations concrètes.',
        'prix' => 'Sur devis',
        'icone' => 'fas fa-search',
        'avantages' => [
            'Audit des processus',
            'Contrôle de conformité',
            'Recommandations d\'amélioration',
            'Mise en place des corrections',
            'Suivi des actions',
            'Rapport détaillé'
        ],
        'image' => generatePlaceholderImage(400, 300, 'Audit & Contrôle', '1e3a8a', 'ffffff')
    ]
];

// En-tête de page personnalisé
$page_header = '
<div class="page-header-content">
    <h1>Nos Services</h1>
    <p>Des solutions sur mesure pour accompagner votre entreprise vers le succès</p>
    <div class="page-header-actions">
        <a href="#services" class="btn btn-primary">Découvrir nos services</a>
        <a href="/devis.php" class="btn btn-outline">Demander un devis</a>
    </div>
</div>
';

// Inclusion de l\'en-tête
include 'includes/header.php';
?>

<!-- Section d\'introduction -->
<section class="section section-intro">
    <div class="container">
        <div class="intro-content">
            <div class="intro-text">
                <h2>Des services adaptés à vos besoins</h2>
                <p>En tant qu\'expert-comptable et développeur web, je vous propose une gamme complète de services pour accompagner votre entreprise à chaque étape de son développement. De la création à la croissance, en passant par l\'optimisation de vos processus.</p>
                <p>Que vous soyez une TPE, une PME ou une startup, nos solutions s\'adaptent à votre taille et à vos objectifs. Nous privilégions un accompagnement personnalisé et des relations de confiance durables.</p>
            </div>
            <div class="intro-stats">
                <div class="stat-item">
                    <div class="stat-number">150+</div>
                    <div class="stat-label">Clients satisfaits</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">10+</div>
                    <div class="stat-label">Années d\'expérience</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">98%</div>
                    <div class="stat-label">Taux de satisfaction</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section des services -->
<section class="section section-services" id="services">
    <div class="container">
        <div class="section-header">
            <h2>Nos Services Principaux</h2>
            <p>Découvrez notre gamme complète de services professionnels</p>
        </div>
        
        <div class="services-grid">
            <?php foreach ($services as $service): ?>
            <div class="service-card" id="<?php echo $service['id']; ?>">
                <div class="service-image">
                    <img src="<?php echo $service['image']; ?>" alt="<?php echo htmlspecialchars($service['titre']); ?>" loading="lazy">
                    <div class="service-icon">
                        <i class="<?php echo $service['icone']; ?>"></i>
                    </div>
                </div>
                
                <div class="service-content">
                    <h3 class="service-title"><?php echo htmlspecialchars($service['titre']); ?></h3>
                    <p class="service-description"><?php echo htmlspecialchars($service['description_courte']); ?></p>
                    
                    <div class="service-details">
                        <p class="service-full-description"><?php echo htmlspecialchars($service['description_complete']); ?></p>
                        
                        <div class="service-avantages">
                            <h4>Ce que nous vous apportons :</h4>
                            <ul>
                                <?php foreach ($service['avantages'] as $avantage): ?>
                                <li><i class="fas fa-check"></i> <?php echo htmlspecialchars($avantage); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        
                        <div class="service-pricing">
                            <span class="price"><?php echo htmlspecialchars($service['prix']); ?></span>
                        </div>
                    </div>
                    
                    <div class="service-actions">
                        <button class="btn btn-primary service-toggle" data-service="<?php echo $service['id']; ?>">
                            <i class="fas fa-info-circle"></i>
                            <span>En savoir plus</span>
                        </button>
                        <a href="/devis.php?service=<?php echo urlencode($service['id']); ?>" class="btn btn-outline">
                            <i class="fas fa-file-invoice"></i>
                            <span>Demander un devis</span>
                        </a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Section des avantages -->
<section class="section section-advantages">
    <div class="container">
        <div class="section-header">
            <h2>Pourquoi nous choisir ?</h2>
            <p>Les atouts qui font la différence</p>
        </div>
        
        <div class="advantages-grid">
            <div class="advantage-item">
                <div class="advantage-icon">
                    <i class="fas fa-user-tie"></i>
                </div>
                <h3>Expertise reconnue</h3>
                <p>Plus de 10 ans d\'expérience en comptabilité et développement web, avec une expertise reconnue dans l\'accompagnement des TPE/PME.</p>
            </div>
            
            <div class="advantage-item">
                <div class="advantage-icon">
                    <i class="fas fa-handshake"></i>
                </div>
                <h3>Accompagnement personnalisé</h3>
                <p>Chaque client est unique. Nous adaptons nos services à vos besoins spécifiques et à votre contexte d\'entreprise.</p>
            </div>
            
            <div class="advantage-item">
                <div class="advantage-icon">
                    <i class="fas fa-clock"></i>
                </div>
                <h3>Réactivité et disponibilité</h3>
                <p>Une équipe disponible et réactive pour répondre à vos questions et vous accompagner dans vos décisions importantes.</p>
            </div>
            
            <div class="advantage-item">
                <div class="advantage-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3>Conformité garantie</h3>
                <p>Nous veillons à ce que vos obligations légales et fiscales soient respectées, vous garantissant une tranquillité d\'esprit totale.</p>
            </div>
            
            <div class="advantage-item">
                <div class="advantage-icon">
                    <i class="fas fa-chart-bar"></i>
                </div>
                <h3>Résultats mesurables</h3>
                <p>Nos services vous permettent de mesurer concrètement l\'impact sur votre performance et votre rentabilité.</p>
            </div>
            
            <div class="advantage-item">
                <div class="advantage-icon">
                    <i class="fas fa-heart"></i>
                </div>
                <h3>Relations durables</h3>
                <p>Nous construisons des relations de confiance sur le long terme, en nous investissant dans la réussite de votre entreprise.</p>
            </div>
        </div>
    </div>
</section>

<!-- Section CTA -->
<section class="section section-cta">
    <div class="container">
        <div class="cta-content">
            <h2>Prêt à nous faire confiance ?</h2>
            <p>Contactez-nous pour discuter de vos besoins et obtenir un devis personnalisé. Notre équipe est là pour vous accompagner vers le succès.</p>
            <div class="cta-actions">
                <a href="/contact.php" class="btn btn-primary">
                    <i class="fas fa-envelope"></i>
                    <span>Nous contacter</span>
                </a>
                <a href="/devis.php" class="btn btn-outline">
                    <i class="fas fa-file-invoice"></i>
                    <span>Demander un devis</span>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- JavaScript spécifique à la page -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Gestion des cartes de service
    const serviceToggles = document.querySelectorAll('.service-toggle');
    
    serviceToggles.forEach(toggle => {
        toggle.addEventListener('click', function() {
            const serviceId = this.dataset.service;
            const serviceCard = document.getElementById(serviceId);
            const details = serviceCard.querySelector('.service-details');
            const buttonText = this.querySelector('span');
            const buttonIcon = this.querySelector('i');
            
            if (details.style.display === 'none' || !details.style.display) {
                details.style.display = 'block';
                buttonText.textContent = 'Masquer les détails';
                buttonIcon.className = 'fas fa-eye-slash';
                serviceCard.classList.add('expanded');
            } else {
                details.style.display = 'none';
                buttonText.textContent = 'En savoir plus';
                buttonIcon.className = 'fas fa-info-circle';
                serviceCard.classList.remove('expanded');
            }
        });
    });
    
    // Animation des statistiques
    const statNumbers = document.querySelectorAll('.stat-number');
    
    const animateStats = () => {
        statNumbers.forEach(stat => {
            const target = parseInt(stat.textContent);
            const increment = target / 100;
            let current = 0;
            
            const updateStat = () => {
                if (current < target) {
                    current += increment;
                    stat.textContent = Math.ceil(current) + (stat.textContent.includes('+') ? '+' : '') + (stat.textContent.includes('%') ? '%' : '');
                    requestAnimationFrame(updateStat);
                } else {
                    stat.textContent = stat.textContent.replace(stat.textContent, target + (stat.textContent.includes('+') ? '+' : '') + (stat.textContent.includes('%') ? '%' : ''));
                }
            };
            
            updateStat();
        });
    };
    
    // Déclencher l'animation quand la section est visible
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                animateStats();
                observer.unobserve(entry.target);
            }
        });
    });
    
    const introSection = document.querySelector('.section-intro');
    if (introSection) {
        observer.observe(introSection);
    }
});
</script>

<?php
// Inclusion du pied de page
include 'includes/footer.php';
?>