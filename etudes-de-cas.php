<?php
/**
 * Page des études de cas
 * Site professionnel de Maickel Okereke
 */

// Configuration de la page
$page_title = 'Études de cas - Maickel Okereke';
$page_description = 'Découvrez nos réalisations et études de cas en comptabilité et développement web.';
$keywords = 'études de cas, réalisations, projets, comptabilité, développement web, Maickel Okereke';

// Données des études de cas (en production, viendraient de la base de données)
$etudes_cas = [
    [
        'id' => 1,
        'titre' => 'Transformation digitale d\'une boulangerie artisanale',
        'sous_titre' => 'Site e-commerce + Comptabilité optimisée',
        'contexte' => 'Une boulangerie familiale de 3 générations souhaitait moderniser son activité et développer ses ventes en ligne.',
        'probleme' => 'Gestion comptable manuelle, absence de présence web, difficultés de gestion des stocks et des commandes.',
        'solution' => 'Création d\'un site e-commerce avec gestion des stocks, système de commandes en ligne, et mise en place d\'une comptabilité informatisée.',
        'resultats' => 'Augmentation de 40% du chiffre d\'affaires, réduction de 30% du temps de gestion administrative, meilleure visibilité locale.',
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
            'Visites +200%' => 'Augmentation du trafic web'
        ]
    ],
    [
        'id' => 2,
        'titre' => 'Plateforme de gestion pour cabinet de conseil',
        'titre' => 'Plateforme de gestion pour cabinet de conseil',
        'sous_titre' => 'Application web sur mesure + Comptabilité',
        'contexte' => 'Un cabinet de conseil en stratégie d\'entreprise cherchait à digitaliser ses processus internes et optimiser sa gestion.',
        'probleme' => 'Processus manuels, difficultés de suivi des projets, gestion comptable complexe avec plusieurs entités.',
        'solution' => 'Développement d\'une application web de gestion de projets, suivi des temps, facturation automatisée, et comptabilité multi-entités.',
        'resultats' => 'Amélioration de 50% de la productivité, réduction de 25% des erreurs de facturation, meilleur suivi des projets.',
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
            'Projets +100%' => 'Meilleur suivi des projets'
        ]
    ],
    [
        'id' => 3,
        'titre' => 'Site vitrine pour architecte d\'intérieur',
        'sous_titre' => 'Portfolio professionnel + Présence en ligne',
        'contexte' => 'Une architecte d\'intérieur indépendante souhaitait créer une présence en ligne professionnelle pour présenter ses réalisations.',
        'probleme' => 'Absence de site web, difficultés de présentation des projets, pas de visibilité en ligne.',
        'solution' => 'Création d\'un site vitrine moderne avec portfolio interactif, galerie de projets, et formulaire de contact.',
        'resultats' => 'Augmentation de 60% des demandes de devis, meilleure présentation des projets, image professionnelle renforcée.',
        'service_id' => 'developpement',
        'categorie' => 'architecture',
        'image' => 'assets/images/case-studies/architecte.jpg',
        'client' => 'Studio Design Intérieur',
        'secteur' => 'Architecture',
        'duree' => '2 mois',
        'budget' => '8 000€',
        'technologies' => ['HTML5', 'CSS3', 'JavaScript', 'PHP'],
        'chiffres_cles' => [
            'Devis +60%' => 'Augmentation des demandes de devis',
            'Visites +150%' => 'Augmentation du trafic web',
            'Projets +40%' => 'Plus de projets présentés'
        ]
    ],
    [
        'id' => 4,
        'titre' => 'Optimisation comptable pour restaurant',
        'sous_titre' => 'Gestion financière + Contrôle des coûts',
        'contexte' => 'Un restaurant traditionnel cherchait à optimiser sa gestion financière et mieux contrôler ses coûts.',
        'probleme' => 'Gestion comptable manuelle, difficultés de suivi des coûts, manque de visibilité sur la rentabilité.',
        'solution' => 'Mise en place d\'une comptabilité informatisée, suivi des coûts par poste, tableaux de bord de gestion.',
        'resultats' => 'Réduction de 20% des coûts d\'exploitation, meilleure visibilité financière, optimisation de la rentabilité.',
        'service_id' => 'comptabilite',
        'categorie' => 'restauration',
        'image' => 'assets/images/case-studies/restaurant.jpg',
        'client' => 'Le Petit Bistrot',
        'secteur' => 'Restauration',
        'duree' => '2 mois',
        'budget' => '5 000€',
        'technologies' => ['Sage', 'Excel', 'Power BI'],
        'chiffres_cles' => [
            'Coûts -20%' => 'Réduction des coûts d\'exploitation',
            'Rentabilité +15%' => 'Amélioration de la rentabilité',
            'Temps -40%' => 'Réduction du temps de gestion'
        ]
    ],
    [
        'id' => 5,
        'titre' => 'E-commerce pour créateur de bijoux',
        'sous_titre' => 'Boutique en ligne + Gestion des stocks',
        'contexte' => 'Une créatrice de bijoux artisanaux souhaitait développer ses ventes en ligne et gérer ses stocks efficacement.',
        'probleme' => 'Ventes limitées au local, gestion manuelle des stocks, difficultés de promotion des créations.',
        'solution' => 'Création d\'une boutique en ligne avec gestion des stocks, système de paiement sécurisé, et outils de promotion.',
        'resultats' => 'Augmentation de 80% des ventes, développement de nouveaux marchés, meilleure gestion des stocks.',
        'service_id' => 'developpement',
        'categorie' => 'artisanat',
        'image' => 'assets/images/case-studies/bijoux.jpg',
        'client' => 'Bijoux Marie',
        'secteur' => 'Artisanat',
        'duree' => '3 mois',
        'budget' => '12 000€',
        'technologies' => ['Shopify', 'Liquid', 'Stripe', 'Zapier'],
        'chiffres_cles' => [
            'Ventes +80%' => 'Augmentation des ventes',
            'Marchés +5' => 'Nouveaux marchés développés',
            'Stocks +100%' => 'Meilleure gestion des stocks'
        ]
    ],
    [
        'id' => 6,
        'titre' => 'Comptabilité multi-entités pour groupe',
        'sous_titre' => 'Consolidation + Reporting financier',
        'contexte' => 'Un groupe de 3 entreprises cherchait à consolider sa comptabilité et améliorer son reporting financier.',
        'probleme' => 'Comptabilités séparées, difficultés de consolidation, manque de visibilité globale.',
        'solution' => 'Mise en place d\'une comptabilité consolidée, reporting automatisé, tableaux de bord de gestion.',
        'resultats' => 'Meilleure visibilité financière, réduction de 30% du temps de reporting, décisions plus éclairées.',
        'service_id' => 'comptabilite',
        'categorie' => 'groupe',
        'image' => 'assets/images/case-studies/groupe.jpg',
        'client' => 'Groupe Multi-Entités',
        'secteur' => 'Services',
        'duree' => '4 mois',
        'budget' => '18 000€',
        'technologies' => ['Sage', 'Power BI', 'Excel', 'VBA'],
        'chiffres_cles' => [
            'Visibilité +100%' => 'Meilleure visibilité financière',
            'Temps -30%' => 'Réduction du temps de reporting',
            'Décisions +50%' => 'Décisions plus éclairées'
        ]
    ]
];

// Filtrage des études de cas
$filtre_service = $_GET['service'] ?? '';
$filtre_categorie = $_GET['categorie'] ?? '';
$recherche = $_GET['recherche'] ?? '';

$etudes_filtrees = $etudes_cas;

// Filtre par service
if (!empty($filtre_service)) {
    $etudes_filtrees = array_filter($etudes_filtrees, function($e) use ($filtre_service) {
        return $e['service_id'] === $filtre_service;
    });
}

// Filtre par catégorie
if (!empty($filtre_categorie)) {
    $etudes_filtrees = array_filter($etudes_filtrees, function($e) use ($filtre_categorie) {
        return $e['categorie'] === $filtre_categorie;
    });
}

// Recherche textuelle
if (!empty($recherche)) {
    $etudes_filtrees = array_filter($etudes_filtrees, function($e) use ($recherche) {
        $recherche_lower = strtolower($recherche);
        return strpos(strtolower($e['titre']), $recherche_lower) !== false ||
               strpos(strtolower($e['contexte']), $recherche_lower) !== false ||
               strpos(strtolower($e['client']), $recherche_lower) !== false ||
               strpos(strtolower($e['secteur']), $recherche_lower) !== false;
    });
}

// Statistiques
$total_etudes = count($etudes_cas);
$total_filtrees = count($etudes_filtrees);

// En-tête de page personnalisé
$page_header = '
<div class="page-header-content">
    <h1>Études de cas</h1>
    <p>Découvrez nos réalisations et la valeur ajoutée de nos services</p>
</div>
';

// Inclusion de l\'en-tête
include 'includes/header.php';
?>

<!-- Section des statistiques -->
<section class="section section-stats">
    <div class="container">
        <div class="stats-grid">
            <div class="stat-item">
                <div class="stat-number"><?php echo $total_etudes; ?></div>
                <div class="stat-label">Études de cas</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">6</div>
                <div class="stat-label">Secteurs d\'activité</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">100%</div>
                <div class="stat-label">Clients satisfaits</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">3</div>
                <div class="stat-label">Types de services</div>
            </div>
        </div>
    </div>
</section>

<!-- Section des filtres et recherche -->
<section class="section section-filters">
    <div class="container">
        <div class="filters-container">
            <form class="filters-form" method="GET" action="">
                <div class="filters-row">
                    <div class="filter-group">
                        <label for="service">Service</label>
                        <select id="service" name="service">
                            <option value="">Tous les services</option>
                            <option value="comptabilite" <?php echo $filtre_service === 'comptabilite' ? 'selected' : ''; ?>>Comptabilité</option>
                            <option value="developpement" <?php echo $filtre_service === 'developpement' ? 'selected' : ''; ?>>Développement web</option>
                            <option value="mixte" <?php echo $filtre_service === 'mixte' ? 'selected' : ''; ?>>Service mixte</option>
                        </select>
                    </div>
                    
                    <div class="filter-group">
                        <label for="categorie">Catégorie</label>
                        <select id="categorie" name="categorie">
                            <option value="">Toutes les catégories</option>
                            <option value="commerce" <?php echo $filtre_categorie === 'commerce' ? 'selected' : ''; ?>>Commerce</option>
                            <option value="conseil" <?php echo $filtre_categorie === 'conseil' ? 'selected' : ''; ?>>Conseil</option>
                            <option value="architecture" <?php echo $filtre_categorie === 'architecture' ? 'selected' : ''; ?>>Architecture</option>
                            <option value="restauration" <?php echo $filtre_categorie === 'restauration' ? 'selected' : ''; ?>>Restauration</option>
                            <option value="artisanat" <?php echo $filtre_categorie === 'artisanat' ? 'selected' : ''; ?>>Artisanat</option>
                            <option value="groupe" <?php echo $filtre_categorie === 'groupe' ? 'selected' : ''; ?>>Groupe</option>
                        </select>
                    </div>
                    
                    <div class="filter-group search-group">
                        <label for="recherche">Rechercher</label>
                        <div class="search-input">
                            <i class="fas fa-search"></i>
                            <input type="text" id="recherche" name="recherche" value="<?php echo htmlspecialchars($recherche); ?>" placeholder="Titre, client, secteur...">
                        </div>
                    </div>
                    
                    <div class="filter-actions">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-filter"></i>
                            <span>Filtrer</span>
                        </button>
                        <a href="/etudes-de-cas.php" class="btn btn-outline">
                            <i class="fas fa-times"></i>
                            <span>Effacer</span>
                        </a>
                    </div>
                </div>
            </form>
            
            <div class="filters-results">
                <p><?php echo $total_filtrees; ?> étude<?php echo $total_filtrees > 1 ? 's' : ''; ?> de cas trouvée<?php echo $total_filtrees > 1 ? 's' : ''; ?></p>
            </div>
        </div>
    </div>
</section>

<!-- Section des études de cas -->
<section class="section section-case-studies">
    <div class="container">
        <?php if (empty($etudes_filtrees)): ?>
        <div class="no-results">
            <div class="no-results-icon">
                <i class="fas fa-search"></i>
            </div>
            <h3>Aucune étude de cas trouvée</h3>
            <p>Aucune étude de cas ne correspond à vos critères de recherche. Essayez de modifier vos filtres.</p>
            <a href="/etudes-de-cas.php" class="btn btn-primary">
                <i class="fas fa-eye"></i>
                <span>Voir toutes les études de cas</span>
            </a>
        </div>
        <?php else: ?>
        
        <div class="case-studies-grid">
            <?php foreach ($etudes_filtrees as $etude): ?>
            <article class="case-study-item" data-service="<?php echo $etude['service_id']; ?>" data-categorie="<?php echo $etude['categorie']; ?>">
                <div class="case-study-image">
                    <?php if (file_exists($etude['image'])): ?>
                    <img src="<?php echo $etude['image']; ?>" alt="<?php echo htmlspecialchars($etude['titre']); ?>">
                    <?php else: ?>
                    <div class="placeholder-image">
                        <i class="fas fa-image"></i>
                    </div>
                    <?php endif; ?>
                    
                    <div class="case-study-overlay">
                        <div class="overlay-content">
                            <a href="/etude-detail.php?id=<?php echo $etude['id']; ?>" class="btn btn-primary">
                                <i class="fas fa-eye"></i>
                                <span>Voir le détail</span>
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="case-study-content">
                    <div class="case-study-header">
                        <h3><?php echo htmlspecialchars($etude['titre']); ?></h3>
                        <p class="case-study-subtitle"><?php echo htmlspecialchars($etude['sous_titre']); ?></p>
                    </div>
                    
                    <div class="case-study-meta">
                        <div class="meta-item">
                            <i class="fas fa-user"></i>
                            <span><?php echo htmlspecialchars($etude['client']); ?></span>
                        </div>
                        <div class="meta-item">
                            <i class="fas fa-industry"></i>
                            <span><?php echo htmlspecialchars($etude['secteur']); ?></span>
                        </div>
                        <div class="meta-item">
                            <i class="fas fa-calendar"></i>
                            <span><?php echo htmlspecialchars($etude['duree']); ?></span>
                        </div>
                    </div>
                    
                    <div class="case-study-context">
                        <h4>Contexte</h4>
                        <p><?php echo htmlspecialchars(substr($etude['contexte'], 0, 150)) . '...'; ?></p>
                    </div>
                    
                    <div class="case-study-results">
                        <h4>Résultats clés</h4>
                        <div class="results-grid">
                            <?php foreach (array_slice($etude['chiffres_cles'], 0, 3) as $chiffre => $description): ?>
                            <div class="result-item">
                                <div class="result-number"><?php echo htmlspecialchars($chiffre); ?></div>
                                <div class="result-description"><?php echo htmlspecialchars($description); ?></div>
                            </div>
                            <?php endfor; ?>
                        </div>
                    </div>
                    
                    <div class="case-study-footer">
                        <div class="case-study-service">
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
                        </div>
                        
                        <div class="case-study-technologies">
                            <?php foreach (array_slice($etude['technologies'], 0, 3) as $tech): ?>
                            <span class="tech-badge"><?php echo htmlspecialchars($tech); ?></span>
                            <?php endfor; ?>
                            <?php if (count($etude['technologies']) > 3): ?>
                            <span class="tech-badge more">+<?php echo count($etude['technologies']) - 3; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </article>
            <?php endfor; ?>
        </div>
        
        <?php endif; ?>
    </div>
</section>

<!-- Section des statistiques détaillées -->
<section class="section section-detailed-stats">
    <div class="container">
        <div class="section-header">
            <h2>Analyse des résultats</h2>
            <p>Découvrez l\'impact de nos services sur vos entreprises</p>
        </div>
        
        <div class="stats-details-grid">
            <div class="stats-card">
                <div class="stats-icon">
                    <i class="fas fa-chart-line"></i>
                </div>
                <div class="stats-content">
                    <h3>Amélioration moyenne</h3>
                    <div class="stats-number">+45%</div>
                    <div class="stats-label">Performance</div>
                    <div class="stats-description">Amélioration moyenne des indicateurs clés de nos clients</div>
                </div>
            </div>
            
            <div class="stats-card">
                <div class="stats-icon">
                    <i class="fas fa-clock"></i>
                </div>
                <div class="stats-content">
                    <h3>Gain de temps</h3>
                    <div class="stats-number">-35%</div>
                    <div class="stats-label">Temps administratif</div>
                    <div class="stats-description">Réduction moyenne du temps de gestion administrative</div>
                </div>
            </div>
            
            <div class="stats-card">
                <div class="stats-icon">
                    <i class="fas fa-euro-sign"></i>
                </div>
                <div class="stats-content">
                    <h3>ROI moyen</h3>
                    <div class="stats-number">300%</div>
                    <div class="stats-label">Retour sur investissement</div>
                    <div class="stats-description">Retour sur investissement moyen de nos clients</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section des secteurs d'activité -->
<section class="section section-sectors">
    <div class="container">
        <div class="section-header">
            <h2>Secteurs d'activité</h2>
            <p>Nous accompagnons des entreprises dans de nombreux secteurs</p>
        </div>
        
        <div class="sectors-grid">
            <div class="sector-item">
                <div class="sector-icon">
                    <i class="fas fa-store"></i>
                </div>
                <h3>Commerce</h3>
                <p>Boutiques, e-commerce, distribution</p>
                <div class="sector-count">2 études de cas</div>
            </div>
            
            <div class="sector-item">
                <div class="sector-icon">
                    <i class="fas fa-lightbulb"></i>
                </div>
                <h3>Conseil</h3>
                <p>Cabinet de conseil, consulting</p>
                <div class="sector-count">1 étude de cas</div>
            </div>
            
            <div class="sector-item">
                <div class="sector-icon">
                    <i class="fas fa-drafting-compass"></i>
                </div>
                <h3>Architecture</h3>
                <p>Architectes, designers, créatifs</p>
                <div class="sector-count">1 étude de cas</div>
            </div>
            
            <div class="sector-item">
                <div class="sector-icon">
                    <i class="fas fa-utensils"></i>
                </div>
                <h3>Restauration</h3>
                <p>Restaurants, bars, traiteurs</p>
                <div class="sector-count">1 étude de cas</div>
            </div>
            
            <div class="sector-item">
                <div class="sector-icon">
                    <i class="fas fa-hammer"></i>
                </div>
                <h3>Artisanat</h3>
                <p>Artisans, créateurs, métiers d\'art</p>
                <div class="sector-count">1 étude de cas</div>
            </div>
            
            <div class="sector-item">
                <div class="sector-icon">
                    <i class="fas fa-building"></i>
                </div>
                <h3>Groupes</h3>
                <p>Entreprises multi-entités, groupes</p>
                <div class="sector-count">1 étude de cas</div>
            </div>
        </div>
    </div>
</section>

<!-- Section CTA -->
<section class="section section-cta">
    <div class="container">
        <div class="cta-content">
            <h2>Prêt à transformer votre entreprise ?</h2>
            <p>Découvrez comment nous pouvons vous aider à atteindre vos objectifs.</p>
            <div class="cta-actions">
                <a href="/devis.php" class="btn btn-primary">
                    <i class="fas fa-calculator"></i>
                    <span>Demander un devis</span>
                </a>
                <a href="/contact.php" class="btn btn-outline">
                    <i class="fas fa-envelope"></i>
                    <span>Nous contacter</span>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- JavaScript spécifique à la page -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Gestion de la recherche en temps réel
    const searchInput = document.getElementById('recherche');
    const searchForm = document.querySelector('.filters-form');
    
    if (searchInput) {
        let searchTimeout;
        
        searchInput.addEventListener('input', function() {
            clearTimeout(searchTimeout);
            searchTimeout = setTimeout(() => {
                searchForm.submit();
            }, 500);
        });
    }
    
    // Gestion des filtres automatiques
    const filterSelects = document.querySelectorAll('select[name="service"], select[name="categorie"]');
    
    filterSelects.forEach(select => {
        select.addEventListener('change', function() {
            searchForm.submit();
        });
    });
    
    // Animation des éléments au scroll
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate');
            }
        });
    });
    
    const animatedElements = document.querySelectorAll('.stat-item, .case-study-item, .stats-card, .sector-item, .cta-content');
    animatedElements.forEach(el => observer.observe(el));
    
    // Animation des statistiques
    const statNumbers = document.querySelectorAll('.stat-number');
    
    const animateStats = () => {
        statNumbers.forEach(stat => {
            const text = stat.textContent;
            if (text.includes('%') || text.includes('+') || text.includes('-')) {
                const number = parseInt(text.replace(/[^\d]/g, ''));
                if (!isNaN(number)) {
                    const increment = number / 100;
                    let current = 0;
                    
                    const updateStat = () => {
                        if (current < number) {
                            current += increment;
                            stat.textContent = text.replace(number.toString(), Math.ceil(current).toString());
                            requestAnimationFrame(updateStat);
                        } else {
                            stat.textContent = text;
                        }
                    };
                    
                    updateStat();
                }
            }
        });
    };
    
    // Déclencher l'animation quand la section est visible
    const statsSection = document.querySelector('.section-stats');
    if (statsSection) {
        const statsObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateStats();
                    statsObserver.unobserve(entry.target);
                }
            });
        });
        statsObserver.observe(statsSection);
    }
    
    // Animation des études de cas
    const caseStudyItems = document.querySelectorAll('.case-study-item');
    
    const animateCaseStudies = () => {
        caseStudyItems.forEach((item, index) => {
            setTimeout(() => {
                item.classList.add('animate');
            }, index * 150);
        });
    };
    
    const caseStudiesSection = document.querySelector('.section-case-studies');
    if (caseStudiesSection) {
        const caseStudiesObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateCaseStudies();
                    caseStudiesObserver.unobserve(entry.target);
                }
            });
        });
        caseStudiesObserver.observe(caseStudiesSection);
    }
    
    // Animation des secteurs
    const sectorItems = document.querySelectorAll('.sector-item');
    
    const animateSectors = () => {
        sectorItems.forEach((item, index) => {
            setTimeout(() => {
                item.classList.add('animate');
            }, index * 100);
        });
    };
    
    const sectorsSection = document.querySelector('.section-sectors');
    if (sectorsSection) {
        const sectorsObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateSectors();
                    sectorsObserver.unobserve(entry.target);
                }
            });
        });
        sectorsObserver.observe(sectorsSection);
    }
    
    // Gestion des filtres avec URL
    const updateURL = () => {
        const formData = new FormData(searchForm);
        const params = new URLSearchParams();
        
        for (let [key, value] of formData.entries()) {
            if (value) {
                params.append(key, value);
            }
        }
        
        const newURL = window.location.pathname + (params.toString() ? '?' + params.toString() : '');
        window.history.pushState({}, '', newURL);
    };
    
    // Mettre à jour l'URL lors des changements de filtres
    filterSelects.forEach(select => {
        select.addEventListener('change', updateURL);
    });
    
    if (searchInput) {
        searchInput.addEventListener('input', function() {
            clearTimeout(searchTimeout);
            searchTimeout = setTimeout(updateURL, 500);
        });
    }
    
    // Restaurer les filtres depuis l'URL au chargement
    const urlParams = new URLSearchParams(window.location.search);
    const serviceParam = urlParams.get('service');
    const categorieParam = urlParams.get('categorie');
    const rechercheParam = urlParams.get('recherche');
    
    if (serviceParam) {
        document.getElementById('service').value = serviceParam;
    }
    if (categorieParam) {
        document.getElementById('categorie').value = categorieParam;
    }
    if (rechercheParam) {
        document.getElementById('recherche').value = rechercheParam;
    }
    
    // Gestion des images placeholder
    const placeholderImages = document.querySelectorAll('.placeholder-image');
    placeholderImages.forEach(placeholder => {
        const parent = placeholder.closest('.case-study-image');
        if (parent) {
            parent.style.backgroundColor = '#f3f4f6';
            parent.style.display = 'flex';
            parent.style.alignItems = 'center';
            parent.style.justifyContent = 'center';
            parent.style.minHeight = '200px';
        }
    });
});
</script>

<?php
// Inclusion du pied de page
include 'includes/footer.php';
?>