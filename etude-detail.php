<?php
/**
 * Page de détail d'une étude de cas
 * Site professionnel de Maickel Okereke
 */

// Configuration de la page
$page_title = 'Détail de l\'étude de cas - Maickel Okereke';
$page_description = 'Découvrez en détail nos réalisations et la valeur ajoutée de nos services.';
$page_keywords = 'étude de cas, détail, projet, comptabilité, développement web, Maickel Okereke';

// Récupération de l'ID de l'étude de cas
$etude_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Données des études de cas (en production, viendraient de la base de données)
$etudes_cas = [
    1 => [
        'id' => 1,
        'titre' => 'Transformation digitale d\'une boulangerie artisanale',
        'sous_titre' => 'Site e-commerce + Comptabilité optimisée',
        'contexte' => 'Une boulangerie familiale de 3 générations souhaitait moderniser son activité et développer ses ventes en ligne. L\'entreprise, bien établie localement, faisait face à la concurrence des grandes surfaces et souhaitait diversifier ses canaux de vente.',
        'probleme' => 'Gestion comptable manuelle, absence de présence web, difficultés de gestion des stocks et des commandes, manque de visibilité sur la rentabilité des produits.',
        'solution' => 'Création d\'un site e-commerce avec gestion des stocks, système de commandes en ligne, et mise en place d\'une comptabilité informatisée avec tableaux de bord de gestion.',
        'resultats' => 'Augmentation de 40% du chiffre d\'affaires, réduction de 30% du temps de gestion administrative, meilleure visibilité locale, développement de nouveaux clients.',
        'service_id' => 'mixte',
        'categorie' => 'commerce',
        'image' => 'assets/images/case-studies/boulangerie.jpg',
        'client' => 'Boulangerie du Centre',
        'secteur' => 'Alimentation',
        'duree' => '3 mois',
        'budget' => '15 000€',
        'technologies' => ['WordPress', 'WooCommerce', 'Sage', 'Excel'],
        'chiffres_cles' => [
            'CA +40%' => 'Augmentation du chiffre d\'affaires',
            'Temps -30%' => 'Réduction du temps administratif',
            'Visites +200%' => 'Augmentation du trafic web',
            'Clients +25%' => 'Nouveaux clients acquis'
        ],
        'processus' => [
            'Phase 1' => 'Audit et analyse des besoins (2 semaines)',
            'Phase 2' => 'Conception et développement du site (6 semaines)',
            'Phase 3' => 'Mise en place de la comptabilité (2 semaines)',
            'Phase 4' => 'Formation et accompagnement (2 semaines)'
        ],
        'defis' => [
            'Intégration avec le système de gestion existant',
            'Formation du personnel aux nouveaux outils',
            'Migration des données comptables'
        ],
        'temoignage' => 'Maickel a su comprendre nos besoins et nous proposer des solutions adaptées. Sa double expertise comptabilité/web est un vrai plus ! Grâce à lui, nous avons pu moderniser notre activité tout en conservant notre savoir-faire artisanal.',
        'auteur_temoignage' => 'Marie Dubois',
        'role_temoignage' => 'Gérante'
    ],
    2 => [
        'id' => 2,
        'titre' => 'Plateforme de gestion pour cabinet de conseil',
        'sous_titre' => 'Application web sur mesure + Comptabilité',
        'contexte' => 'Un cabinet de conseil en stratégie d\'entreprise cherchait à digitaliser ses processus internes et optimiser sa gestion. L\'entreprise comptait 15 consultants et gérait une centaine de projets par an.',
        'probleme' => 'Processus manuels, difficultés de suivi des projets, gestion comptable complexe avec plusieurs entités, manque de visibilité sur la rentabilité des missions.',
        'solution' => 'Développement d\'une application web de gestion de projets, suivi des temps, facturation automatisée, et comptabilité multi-entités avec reporting consolidé.',
        'resultats' => 'Amélioration de 50% de la productivité, réduction de 25% des erreurs de facturation, meilleur suivi des projets, visibilité financière renforcée.',
        'service_id' => 'mixte',
        'categorie' => 'conseil',
        'image' => 'assets/images/case-studies/cabinet-conseil.jpg',
        'client' => 'Stratégie Plus',
        'secteur' => 'Conseil',
        'duree' => '4 mois',
        'budget' => '25 000€',
        'technologies' => ['Laravel', 'Vue.js', 'MySQL', 'Sage'],
        'chiffres_cles' => [
            'Productivité +50%' => 'Amélioration de la productivité',
            'Erreurs -25%' => 'Réduction des erreurs de facturation',
            'Projets +100%' => 'Meilleur suivi des projets',
            'Temps -40%' => 'Réduction du temps de gestion'
        ],
        'processus' => [
            'Phase 1' => 'Analyse des processus existants (3 semaines)',
            'Phase 2' => 'Conception de l\'architecture (2 semaines)',
            'Phase 3' => 'Développement de l\'application (8 semaines)',
            'Phase 4' => 'Intégration et formation (3 semaines)'
        ],
        'defis' => [
            'Gestion des droits utilisateurs complexes',
            'Intégration avec les systèmes comptables existants',
            'Formation de 15 utilisateurs aux nouveaux outils'
        ],
        'temoignage' => 'Consultation très enrichissante. J\'ai pu clarifier mes objectifs et obtenir un plan d\'action concret pour mon projet. Maickel a une approche méthodique et professionnelle qui m\'a beaucoup aidé.',
        'auteur_temoignage' => 'Thomas Martin',
        'role_temoignage' => 'Directeur Général'
    ]
];

// Vérification de l'existence de l'étude de cas
if (!isset($etudes_cas[$etude_id])) {
    // Redirection vers la page 404 ou la liste des études de cas
    header('Location: /etudes-de-cas.php');
    exit;
}

$etude = $etudes_cas[$etude_id];

// Mise à jour du titre de la page
$page_title = $etude['titre'] . ' - Étude de cas - Maickel Okereke';
$page_description = $etude['contexte'];

// En-tête de page personnalisé
$page_header = '
<div class="page-header-content">
    <h1>' . htmlspecialchars($etude['titre']) . '</h1>
    <p>' . htmlspecialchars($etude['sous_titre']) . '</p>
</div>
';

// Inclusion de l\'en-tête
include 'includes/header.php';
?>

<!-- Section de l\'étude de cas -->
<section class="section section-case-study-detail">
    <div class="container">
        <div class="case-study-detail-container">
            <!-- Image principale -->
            <div class="case-study-hero">
                <?php if (file_exists($etude['image'])): ?>
                <img src="<?php echo $etude['image']; ?>" alt="<?php echo htmlspecialchars($etude['titre']); ?>">
                <?php else: ?>
                <div class="placeholder-image-large">
                    <i class="fas fa-image"></i>
                </div>
                <?php endif; ?>
                
                <div class="case-study-hero-overlay">
                    <div class="hero-content">
                        <div class="hero-badges">
                            <?php
                            $service_labels = [
                                'comptabilite' => 'Comptabilité',
                                'developpement' => 'Développement web',
                                'mixte' => 'Service mixte'
                            ];
                            ?>
                            <span class="service-badge service-<?php echo $etude['service_id']; ?>">
                                <?php echo $service_labels[$etude['service_id']]; ?>
                            </span>
                            <span class="category-badge">
                                <?php echo ucfirst($etude['categorie']); ?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Informations clés -->
            <div class="case-study-key-info">
                <div class="key-info-grid">
                    <div class="key-info-item">
                        <div class="key-info-icon">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="key-info-content">
                            <h4>Client</h4>
                            <p><?php echo htmlspecialchars($etude['client']); ?></p>
                        </div>
                    </div>
                    
                    <div class="key-info-item">
                        <div class="key-info-icon">
                            <i class="fas fa-industry"></i>
                        </div>
                        <div class="key-info-content">
                            <h4>Secteur</h4>
                            <p><?php echo htmlspecialchars($etude['secteur']); ?></p>
                        </div>
                    </div>
                    
                    <div class="key-info-item">
                        <div class="key-info-icon">
                            <i class="fas fa-calendar"></i>
                        </div>
                        <div class="key-info-content">
                            <h4>Durée</h4>
                            <p><?php echo htmlspecialchars($etude['duree']); ?></p>
                        </div>
                    </div>
                    
                    <div class="key-info-item">
                        <div class="key-info-icon">
                            <i class="fas fa-euro-sign"></i>
                        </div>
                        <div class="key-info-content">
                            <h4>Budget</h4>
                            <p><?php echo htmlspecialchars($etude['budget']); ?></p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Contenu détaillé -->
            <div class="case-study-content">
                <div class="content-grid">
                    <!-- Colonne principale -->
                    <div class="content-main">
                        <!-- Contexte -->
                        <div class="content-section">
                            <h2>Contexte</h2>
                            <p><?php echo htmlspecialchars($etude['contexte']); ?></p>
                        </div>
                        
                        <!-- Problème -->
                        <div class="content-section">
                            <h2>Problématique</h2>
                            <p><?php echo htmlspecialchars($etude['probleme']); ?></p>
                        </div>
                        
                        <!-- Solution -->
                        <div class="content-section">
                            <h2>Solution mise en place</h2>
                            <p><?php echo htmlspecialchars($etude['solution']); ?></p>
                        </div>
                        
                        <!-- Processus -->
                        <div class="content-section">
                            <h2>Processus de réalisation</h2>
                            <div class="process-timeline">
                                <?php foreach ($etude['processus'] as $phase => $description): ?>
                                <div class="process-step">
                                    <div class="step-header">
                                        <h4><?php echo htmlspecialchars($phase); ?></h4>
                                    </div>
                                    <div class="step-content">
                                        <p><?php echo htmlspecialchars($description); ?></p>
                                    </div>
                                </div>
                                <?php endfor; ?>
                            </div>
                        </div>
                        
                        <!-- Défis -->
                        <div class="content-section">
                            <h2>Défis rencontrés</h2>
                            <ul class="challenges-list">
                                <?php foreach ($etude['defis'] as $defi): ?>
                                <li><?php echo htmlspecialchars($defi); ?></li>
                                <?php endfor; ?>
                            </ul>
                        </div>
                        
                        <!-- Résultats -->
                        <div class="content-section">
                            <h2>Résultats obtenus</h2>
                            <p><?php echo htmlspecialchars($etude['resultats']); ?></p>
                            
                            <div class="results-grid">
                                <?php foreach ($etude['chiffres_cles'] as $chiffre => $description): ?>
                                <div class="result-item">
                                    <div class="result-number"><?php echo htmlspecialchars($chiffre); ?></div>
                                    <div class="result-description"><?php echo htmlspecialchars($description); ?></div>
                                </div>
                                <?php endfor; ?>
                            </div>
                        </div>
                        
                        <!-- Technologies -->
                        <div class="content-section">
                            <h2>Technologies utilisées</h2>
                            <div class="technologies-grid">
                                <?php foreach ($etude['technologies'] as $tech): ?>
                                <span class="tech-badge"><?php echo htmlspecialchars($tech); ?></span>
                                <?php endfor; ?>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Barre latérale -->
                    <div class="content-sidebar">
                        <!-- Témoignage client -->
                        <div class="sidebar-section testimonial-card">
                            <div class="testimonial-header">
                                <i class="fas fa-quote-left"></i>
                            </div>
                            <div class="testimonial-content">
                                <p><?php echo htmlspecialchars($etude['temoignage']); ?></p>
                            </div>
                            <div class="testimonial-author">
                                <div class="author-info">
                                    <div class="author-name"><?php echo htmlspecialchars($etude['auteur_temoignage']); ?></div>
                                    <div class="author-role"><?php echo htmlspecialchars($etude['role_temoignage']); ?></div>
                                    <div class="author-company"><?php echo htmlspecialchars($etude['client']); ?></div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Statistiques clés -->
                        <div class="sidebar-section stats-card">
                            <h3>Impact du projet</h3>
                            <div class="stats-summary">
                                <?php foreach (array_slice($etude['chiffres_cles'], 0, 3) as $chiffre => $description): ?>
                                <div class="stat-summary-item">
                                    <div class="stat-number"><?php echo htmlspecialchars($chiffre); ?></div>
                                    <div class="stat-label"><?php echo htmlspecialchars($description); ?></div>
                                </div>
                                <?php endfor; ?>
                            </div>
                        </div>
                        
                        <!-- CTA -->
                        <div class="sidebar-section cta-card">
                            <h3>Votre projet similaire ?</h3>
                            <p>Discutons de vos besoins et de la façon dont nous pouvons vous aider.</p>
                            <div class="cta-actions">
                                <a href="/devis.php" class="btn btn-primary btn-full">
                                    <i class="fas fa-calculator"></i>
                                    <span>Demander un devis</span>
                                </a>
                                <a href="/contact.php" class="btn btn-outline btn-full">
                                    <i class="fas fa-envelope"></i>
                                    <span>Nous contacter</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section des études de cas similaires -->
<section class="section section-similar-cases">
    <div class="container">
        <div class="section-header">
            <h2>Études de cas similaires</h2>
            <p>Découvrez d\'autres projets dans le même secteur ou avec le même type de service</p>
        </div>
        
        <div class="similar-cases-grid">
            <?php
            // Recherche d'études de cas similaires
            $etudes_similaires = array_filter($etudes_cas, function($e) use ($etude) {
                return $e['id'] !== $etude['id'] && 
                       ($e['service_id'] === $etude['service_id'] || $e['categorie'] === $etude['categorie']);
            });
            
            // Limiter à 3 études similaires
            $etudes_similaires = array_slice($etudes_similaires, 0, 3);
            
            foreach ($etudes_similaires as $etude_similaire):
            ?>
            <div class="similar-case-item">
                <div class="similar-case-image">
                    <?php if (file_exists($etude_similaire['image'])): ?>
                    <img src="<?php echo $etude_similaire['image']; ?>" alt="<?php echo htmlspecialchars($etude_similaire['titre']); ?>">
                    <?php else: ?>
                    <div class="placeholder-image">
                        <i class="fas fa-image"></i>
                    </div>
                    <?php endif; ?>
                </div>
                
                <div class="similar-case-content">
                    <h3><?php echo htmlspecialchars($etude_similaire['titre']); ?></h3>
                    <p><?php echo htmlspecialchars(substr($etude_similaire['contexte'], 0, 100)) . '...'; ?></p>
                    
                    <div class="similar-case-meta">
                        <span class="client"><?php echo htmlspecialchars($etude_similaire['client']); ?></span>
                        <span class="service"><?php echo $service_labels[$etude_similaire['service_id']]; ?></span>
                    </div>
                    
                    <a href="/etude-detail.php?id=<?php echo $etude_similaire['id']; ?>" class="btn btn-outline btn-small">
                        <i class="fas fa-eye"></i>
                        <span>Voir le détail</span>
                    </a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        
        <div class="similar-cases-cta">
            <a href="/etudes-de-cas.php" class="btn btn-primary">
                <i class="fas fa-list"></i>
                <span>Voir toutes les études de cas</span>
            </a>
        </div>
    </div>
</section>

<!-- Section CTA -->
<section class="section section-cta">
    <div class="container">
        <div class="cta-content">
            <h2>Prêt à transformer votre entreprise ?</h2>
            <p>Découvrez comment nous pouvons vous aider à atteindre des résultats similaires.</p>
            <div class="cta-actions">
                <a href="/devis.php" class="btn btn-primary">
                    <i class="fas fa-calculator"></i>
                    <span>Demander un devis</span>
                </a>
                <a href="/rendez-vous.php" class="btn btn-outline">
                    <i class="fas fa-calendar"></i>
                    <span>Prendre rendez-vous</span>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- JavaScript spécifique à la page -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Animation des éléments au scroll
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate');
            }
        });
    });
    
    const animatedElements = document.querySelectorAll('.key-info-item, .content-section, .sidebar-section, .similar-case-item, .cta-content');
    animatedElements.forEach(el => observer.observe(el));
    
    // Animation des étapes du processus
    const processSteps = document.querySelectorAll('.process-step');
    
    const animateProcessSteps = () => {
        processSteps.forEach((step, index) => {
            setTimeout(() => {
                step.classList.add('animate');
            }, index * 200);
        });
    };
    
    const processSection = document.querySelector('.process-timeline');
    if (processSection) {
        const processObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateProcessSteps();
                    processObserver.unobserve(entry.target);
                }
            });
        });
        processObserver.observe(processSection);
    }
    
    // Animation des résultats
    const resultItems = document.querySelectorAll('.result-item');
    
    const animateResults = () => {
        resultItems.forEach((item, index) => {
            setTimeout(() => {
                item.classList.add('animate');
            }, index * 150);
        });
    };
    
    const resultsSection = document.querySelector('.results-grid');
    if (resultsSection) {
        const resultsObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateResults();
                    resultsObserver.unobserve(entry.target);
                }
            });
        });
        resultsObserver.observe(resultsSection);
    }
    
    // Animation des technologies
    const techBadges = document.querySelectorAll('.tech-badge');
    
    const animateTechBadges = () => {
        techBadges.forEach((badge, index) => {
            setTimeout(() => {
                badge.classList.add('animate');
            }, index * 100);
        });
    };
    
    const techSection = document.querySelector('.technologies-grid');
    if (techSection) {
        const techObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateTechBadges();
                    techObserver.unobserve(entry.target);
                }
            });
        });
        techObserver.observe(techSection);
    }
    
    // Gestion des images placeholder
    const placeholderImages = document.querySelectorAll('.placeholder-image, .placeholder-image-large');
    placeholderImages.forEach(placeholder => {
        const parent = placeholder.closest('.case-study-hero, .similar-case-image');
        if (parent) {
            if (placeholder.classList.contains('placeholder-image-large')) {
                parent.style.backgroundColor = '#f3f4f6';
                parent.style.display = 'flex';
                parent.style.alignItems = 'center';
                parent.style.justifyContent = 'center';
                parent.style.minHeight = '400px';
            } else {
                parent.style.backgroundColor = '#f3f4f6';
                parent.style.display = 'flex';
                parent.style.alignItems = 'center';
                parent.style.justifyContent = 'center';
                parent.style.minHeight = '200px';
            }
        }
    });
    
    // Navigation breadcrumb
    const breadcrumb = document.createElement('nav');
    breadcrumb.className = 'breadcrumb';
    breadcrumb.innerHTML = `
        <ol>
            <li><a href="/">Accueil</a></li>
            <li><a href="/etudes-de-cas.php">Études de cas</a></li>
            <li aria-current="page">${document.title.split(' - ')[0]}</li>
        </ol>
    `;
    
    const pageHeader = document.querySelector('.page-header-content');
    if (pageHeader) {
        pageHeader.parentNode.insertBefore(breadcrumb, pageHeader);
    }
    
    // Bouton retour en haut
    const backToTopBtn = document.createElement('button');
    backToTopBtn.className = 'back-to-top';
    backToTopBtn.innerHTML = '<i class="fas fa-arrow-up"></i>';
    backToTopBtn.setAttribute('aria-label', 'Retour en haut');
    
    document.body.appendChild(backToTopBtn);
    
    backToTopBtn.addEventListener('click', () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
    
    // Affichage/masquage du bouton retour en haut
    window.addEventListener('scroll', () => {
        if (window.pageYOffset > 300) {
            backToTopBtn.classList.add('visible');
        } else {
            backToTopBtn.classList.remove('visible');
        }
    });
});
</script>

<?php
// Inclusion du pied de page
include 'includes/footer.php';
?>