<?php
/**
 * Page des témoignages clients
 * Site professionnel de Maickel Okereke
 */

// Configuration de la page
$page_title = 'Témoignages clients - Maickel Okereke';
$page_description = 'Découvrez les retours de nos clients satisfaits en comptabilité et développement web.';
$page_keywords = 'témoignages, avis clients, satisfaction, comptabilité, développement web, Maickel Okereke';

// Inclusion des fichiers nécessaires
require_once 'includes/functions.php';

// Inclusion du header
include 'includes/header.php';

// Données des témoignages (en production, viendraient de la base de données)
$temoignages = [
    [
        'id' => 1,
        'auteur' => 'Marie Dubois',
        'role' => 'Créatrice de bijoux',
        'societe' => 'Bijoux Marie',
        'citation' => 'Maickel a su comprendre mes besoins et m\'a proposé des solutions adaptées. Sa double expertise comptabilité/web est un vrai plus ! Grâce à lui, j\'ai pu structurer ma comptabilité et créer un site web professionnel qui reflète parfaitement mon univers créatif.',
        'photo' => 'assets/images/testimonials/marie-dubois.jpg',
        'note' => 5,
        'service' => 'mixte',
        'date' => '2024-07-15',
        'projet' => 'Site web + Comptabilité TPE'
    ],
    [
        'id' => 2,
        'auteur' => 'Thomas Martin',
        'role' => 'Consultant indépendant',
        'societe' => 'Martin Consulting',
        'citation' => 'Consultation très enrichissante. J\'ai pu clarifier mes objectifs et obtenir un plan d\'action concret pour mon projet. Maickel a une approche méthodique et professionnelle qui m\'a beaucoup aidé.',
        'photo' => 'assets/images/testimonials/thomas-martin.jpg',
        'note' => 5,
        'service' => 'developpement',
        'date' => '2024-07-10',
        'projet' => 'Application web de gestion'
    ],
    [
        'id' => 3,
        'auteur' => 'Sophie Bernard',
        'role' => 'Coach en développement personnel',
        'societe' => 'Sophie Bernard Coaching',
        'citation' => 'Approche professionnelle et bienveillante. Maickel prend le temps d\'expliquer et de s\'assurer que tout est clair. Il a créé un site web magnifique qui correspond parfaitement à mon image de marque.',
        'photo' => 'assets/images/testimonials/sophie-bernard.jpg',
        'note' => 5,
        'service' => 'developpement',
        'date' => '2024-07-05',
        'projet' => 'Site web coaching'
    ],
    [
        'id' => 4,
        'auteur' => 'Pierre Moreau',
        'role' => 'Restaurateur',
        'societe' => 'Le Petit Bistrot',
        'citation' => 'Excellent service comptable ! Maickel a su s\'adapter aux spécificités de la restauration et m\'a aidé à optimiser ma gestion. Je recommande vivement ses services.',
        'photo' => 'assets/images/testimonials/pierre-moreau.jpg',
        'note' => 5,
        'service' => 'comptabilite',
        'date' => '2024-06-28',
        'projet' => 'Comptabilité restaurant'
    ],
    [
        'id' => 5,
        'auteur' => 'Julie Leroy',
        'role' => 'Photographe',
        'societe' => 'Julie Leroy Photography',
        'citation' => 'Maickel a transformé ma présence en ligne. Mon site web est maintenant professionnel et attractif, et ma comptabilité est enfin organisée. Un vrai partenaire de confiance !',
        'photo' => 'assets/images/testimonials/julie-leroy.jpg',
        'note' => 5,
        'service' => 'mixte',
        'date' => '2024-06-20',
        'projet' => 'Portfolio web + Comptabilité'
    ],
    [
        'id' => 6,
        'auteur' => 'Marc Dubois',
        'role' => 'Architecte',
        'societe' => 'Dubois Architecture',
        'citation' => 'Service de qualité et respect des délais. Maickel a su comprendre les enjeux de mon métier et créer une solution web adaptée. Je suis très satisfait du résultat.',
        'photo' => 'assets/images/testimonials/marc-dubois.jpg',
        'note' => 5,
        'service' => 'developpement',
        'date' => '2024-06-15',
        'projet' => 'Site web architecture'
    ],
    [
        'id' => 7,
        'auteur' => 'Isabelle Rousseau',
        'role' => 'Naturopathe',
        'societe' => 'Nature & Bien-être',
        'citation' => 'Maickel a été d\'une grande aide pour structurer mon activité. Son expertise comptable m\'a permis de mieux gérer mes finances et son accompagnement web m\'a donné une visibilité professionnelle.',
        'photo' => 'assets/images/testimonials/isabelle-rousseau.jpg',
        'note' => 5,
        'service' => 'mixte',
        'date' => '2024-06-10',
        'projet' => 'Site web + Comptabilité'
    ],
    [
        'id' => 8,
        'auteur' => 'David Laurent',
        'role' => 'Formateur',
        'societe' => 'Laurent Formation',
        'citation' => 'Excellent travail ! Maickel a créé une plateforme de formation moderne et fonctionnelle. Son approche technique et sa compréhension des besoins pédagogiques ont fait toute la différence.',
        'photo' => 'assets/images/testimonials/david-laurent.jpg',
        'note' => 5,
        'service' => 'developpement',
        'date' => '2024-06-05',
        'projet' => 'Plateforme de formation'
    ]
];

// Filtrage des témoignages
$filtre_service = $_GET['service'] ?? '';
$filtre_note = $_GET['note'] ?? '';
$recherche = $_GET['recherche'] ?? '';

$temoignages_filtres = $temoignages;

// Filtre par service
if (!empty($filtre_service)) {
    $temoignages_filtres = array_filter($temoignages_filtres, function($t) use ($filtre_service) {
        return $t['service'] === $filtre_service;
    });
}

// Filtre par note
if (!empty($filtre_note)) {
    $temoignages_filtres = array_filter($temoignages_filtres, function($t) use ($filtre_note) {
        return $t['note'] >= (int)$filtre_note;
    });
}

// Recherche textuelle
if (!empty($recherche)) {
    $temoignages_filtres = array_filter($temoignages_filtres, function($t) use ($recherche) {
        $recherche_lower = strtolower($recherche);
        return strpos(strtolower($t['auteur']), $recherche_lower) !== false ||
               strpos(strtolower($t['role']), $recherche_lower) !== false ||
               strpos(strtolower($t['societe']), $recherche_lower) !== false ||
               strpos(strtolower($t['citation']), $recherche_lower) !== false ||
               strpos(strtolower($t['projet']), $recherche_lower) !== false;
    });
}

// Statistiques
$total_temoignages = count($temoignages);
$total_filtres = count($temoignages_filtres);
$moyenne_notes = array_sum(array_column($temoignages, 'note')) / count($temoignages);

// En-tête de page personnalisé
$page_header = '
<div class="page-header-content">
    <h1>Témoignages clients</h1>
    <p>Découvrez ce que disent nos clients satisfaits</p>
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
                <div class="stat-number"><?php echo $total_temoignages; ?></div>
                <div class="stat-label">Témoignages</div>
            </div>
            <div class="stat-item">
                <div class="stat-number"><?php echo number_format($moyenne_notes, 1); ?>/5</div>
                <div class="stat-label">Note moyenne</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">100%</div>
                <div class="stat-label">Clients satisfaits</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">3</div>
                <div class="stat-label">Services couverts</div>
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
                        <label for="note">Note minimum</label>
                        <select id="note" name="note">
                            <option value="">Toutes les notes</option>
                            <option value="5" <?php echo $filtre_note === '5' ? 'selected' : ''; ?>>5 étoiles</option>
                            <option value="4" <?php echo $filtre_note === '4' ? 'selected' : ''; ?>>4+ étoiles</option>
                            <option value="3" <?php echo $filtre_note === '3' ? 'selected' : ''; ?>>3+ étoiles</option>
                        </select>
                    </div>
                    
                    <div class="filter-group search-group">
                        <label for="recherche">Rechercher</label>
                        <div class="search-input">
                            <i class="fas fa-search"></i>
                            <input type="text" id="recherche" name="recherche" value="<?php echo htmlspecialchars($recherche); ?>" placeholder="Nom, entreprise, projet...">
                        </div>
                    </div>
                    
                    <div class="filter-actions">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-filter"></i>
                            <span>Filtrer</span>
                        </button>
                        <a href="/temoignages.php" class="btn btn-outline">
                            <i class="fas fa-times"></i>
                            <span>Effacer</span>
                        </a>
                    </div>
                </div>
            </form>
            
            <div class="filters-results">
                <p><?php echo $total_filtres; ?> témoignage<?php echo $total_filtres > 1 ? 's' : ''; ?> trouvé<?php echo $total_filtres > 1 ? 's' : ''; ?></p>
            </div>
        </div>
    </div>
</section>

<!-- Section des témoignages -->
<section class="section section-testimonials">
    <div class="container">
        <?php if (empty($temoignages_filtres)): ?>
        <div class="no-results">
            <div class="no-results-icon">
                <i class="fas fa-search"></i>
            </div>
            <h3>Aucun témoignage trouvé</h3>
            <p>Aucun témoignage ne correspond à vos critères de recherche. Essayez de modifier vos filtres.</p>
            <a href="/temoignages.php" class="btn btn-primary">
                <i class="fas fa-eye"></i>
                <span>Voir tous les témoignages</span>
            </a>
        </div>
        <?php else: ?>
        
        <div class="testimonials-grid">
            <?php foreach ($temoignages_filtres as $temoignage): ?>
            <div class="testimonial-item" data-service="<?php echo $temoignage['service']; ?>" data-note="<?php echo $temoignage['note']; ?>">
                <div class="testimonial-header">
                    <div class="testimonial-author">
                        <div class="author-avatar">
                            <?php if (file_exists($temoignage['photo'])): ?>
                            <img src="<?php echo $temoignage['photo']; ?>" alt="<?php echo htmlspecialchars($temoignage['auteur']); ?>">
                            <?php else: ?>
                            <i class="fas fa-user"></i>
                            <?php endif; ?>
                        </div>
                        <div class="author-info">
                            <div class="author-name"><?php echo htmlspecialchars($temoignage['auteur']); ?></div>
                            <div class="author-role"><?php echo htmlspecialchars($temoignage['role']); ?></div>
                            <div class="author-company"><?php echo htmlspecialchars($temoignage['societe']); ?></div>
                        </div>
                    </div>
                    
                    <div class="testimonial-rating">
                        <?php for ($i = 1; $i <= 5; $i++): ?>
                        <i class="fas fa-star <?php echo $i <= $temoignage['note'] ? 'filled' : ''; ?>"></i>
                        <?php endfor; ?>
                    </div>
                </div>
                
                <div class="testimonial-content">
                    <blockquote>
                        <p><?php echo htmlspecialchars($temoignage['citation']); ?></p>
                    </blockquote>
                </div>
                
                <div class="testimonial-footer">
                    <div class="testimonial-project">
                        <i class="fas fa-project-diagram"></i>
                        <span><?php echo htmlspecialchars($temoignage['projet']); ?></span>
                    </div>
                    
                    <div class="testimonial-service">
                        <?php
                        $service_labels = [
                            'comptabilite' => 'Comptabilité',
                            'developpement' => 'Développement web',
                            'mixte' => 'Service mixte'
                        ];
                        ?>
                        <span class="service-badge service-<?php echo $temoignage['service']; ?>">
                            <?php echo $service_labels[$temoignage['service']]; ?>
                        </span>
                    </div>
                    
                    <div class="testimonial-date">
                        <i class="fas fa-calendar"></i>
                        <span><?php echo date('d/m/Y', strtotime($temoignage['date'])); ?></span>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        
        <?php endif; ?>
    </div>
</section>

<!-- Section des statistiques détaillées -->
<section class="section section-detailed-stats">
    <div class="container">
        <div class="section-header">
            <h2>Analyse des témoignages</h2>
            <p>Découvrez les tendances et la satisfaction de nos clients</p>
        </div>
        
        <div class="stats-details-grid">
            <div class="stats-card">
                <div class="stats-icon">
                    <i class="fas fa-calculator"></i>
                </div>
                <div class="stats-content">
                    <h3>Service Comptabilité</h3>
                    <div class="stats-number"><?php echo count(array_filter($temoignages, function($t) { return $t['service'] === 'comptabilite'; })); ?></div>
                    <div class="stats-label">Témoignages</div>
                    <div class="stats-rating">
                        <?php
                        $compta_temoignages = array_filter($temoignages, function($t) { return $t['service'] === 'comptabilite'; });
                        $moyenne_compta = !empty($compta_temoignages) ? array_sum(array_column($compta_temoignages, 'note')) / count($compta_temoignages) : 0;
                        ?>
                        <?php for ($i = 1; $i <= 5; $i++): ?>
                        <i class="fas fa-star <?php echo $i <= $moyenne_compta ? 'filled' : ''; ?>"></i>
                        <?php endfor; ?>
                        <span><?php echo number_format($moyenne_compta, 1); ?>/5</span>
                    </div>
                </div>
            </div>
            
            <div class="stats-card">
                <div class="stats-icon">
                    <i class="fas fa-code"></i>
                </div>
                <div class="stats-content">
                    <h3>Service Développement</h3>
                    <div class="stats-number"><?php echo count(array_filter($temoignages, function($t) { return $t['service'] === 'developpement'; })); ?></div>
                    <div class="stats-label">Témoignages</div>
                    <div class="stats-rating">
                        <?php
                        $dev_temoignages = array_filter($temoignages, function($t) { return $t['service'] === 'developpement'; });
                        $moyenne_dev = !empty($dev_temoignages) ? array_sum(array_column($dev_temoignages, 'note')) / count($dev_temoignages) : 0;
                        ?>
                        <?php for ($i = 1; $i <= 5; $i++): ?>
                        <i class="fas fa-star <?php echo $i <= $moyenne_dev ? 'filled' : ''; ?>"></i>
                        <?php endfor; ?>
                        <span><?php echo number_format($moyenne_dev, 1); ?>/5</span>
                    </div>
                </div>
            </div>
            
            <div class="stats-card">
                <div class="stats-icon">
                    <i class="fas fa-handshake"></i>
                </div>
                <div class="stats-content">
                    <h3>Service Mixte</h3>
                    <div class="stats-number"><?php echo count(array_filter($temoignages, function($t) { return $t['service'] === 'mixte'; })); ?></div>
                    <div class="stats-label">Témoignages</div>
                    <div class="stats-rating">
                        <?php
                        $mixte_temoignages = array_filter($temoignages, function($t) { return $t['service'] === 'mixte'; });
                        $moyenne_mixte = !empty($mixte_temoignages) ? array_sum(array_column($mixte_temoignages, 'note')) / count($mixte_temoignages) : 0;
                        ?>
                        <?php for ($i = 1; $i <= 5; $i++): ?>
                        <i class="fas fa-star <?php echo $i <= $moyenne_mixte ? 'filled' : ''; ?>"></i>
                        <?php endfor; ?>
                        <span><?php echo number_format($moyenne_mixte, 1); ?>/5</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section CTA -->
<section class="section section-cta">
    <div class="container">
        <div class="cta-content">
            <h2>Prêt à rejoindre nos clients satisfaits ?</h2>
            <p>Découvrez comment nous pouvons vous aider à transformer votre entreprise.</p>
            <div class="cta-actions">
                <a href="/contact.php" class="btn btn-primary">
                    <i class="fas fa-envelope"></i>
                    <span>Nous contacter</span>
                </a>
                <a href="/devis.php" class="btn btn-outline">
                    <i class="fas fa-calculator"></i>
                    <span>Demander un devis</span>
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
    const filterSelects = document.querySelectorAll('select[name="service"], select[name="note"]');
    
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
    
    const animatedElements = document.querySelectorAll('.stat-item, .testimonial-item, .stats-card, .cta-content');
    animatedElements.forEach(el => observer.observe(el));
    
    // Animation des statistiques
    const statNumbers = document.querySelectorAll('.stat-number');
    
    const animateStats = () => {
        statNumbers.forEach(stat => {
            const target = parseInt(stat.textContent);
            if (!isNaN(target)) {
                const increment = target / 100;
                let current = 0;
                
                const updateStat = () => {
                    if (current < target) {
                        current += increment;
                        stat.textContent = Math.ceil(current);
                        requestAnimationFrame(updateStat);
                    } else {
                        stat.textContent = target;
                    }
                };
                
                updateStat();
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
    
    // Animation des témoignages
    const testimonialItems = document.querySelectorAll('.testimonial-item');
    
    const animateTestimonials = () => {
        testimonialItems.forEach((item, index) => {
            setTimeout(() => {
                item.classList.add('animate');
            }, index * 150);
        });
    };
    
    const testimonialsSection = document.querySelector('.section-testimonials');
    if (testimonialsSection) {
        const testimonialsObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateTestimonials();
                    testimonialsObserver.unobserve(entry.target);
                }
            });
        });
        testimonialsObserver.observe(testimonialsSection);
    }
    
    // Animation des statistiques détaillées
    const statsCards = document.querySelectorAll('.stats-card');
    
    const animateStatsCards = () => {
        statsCards.forEach((card, index) => {
            setTimeout(() => {
                card.classList.add('animate');
            }, index * 200);
        });
    };
    
    const detailedStatsSection = document.querySelector('.section-detailed-stats');
    if (detailedStatsSection) {
        const detailedStatsObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateStatsCards();
                    detailedStatsObserver.unobserve(entry.target);
                }
            });
        });
        detailedStatsObserver.observe(detailedStatsSection);
    }
    
    // Mise en surbrillance de la recherche
    if (searchInput && searchInput.value) {
        highlightSearchTerms(searchInput.value);
    }
    
    function highlightSearchTerms(searchTerm) {
        if (!searchTerm) return;
        
        const testimonialItems = document.querySelectorAll('.testimonial-item');
        const searchRegex = new RegExp(`(${searchTerm})`, 'gi');
        
        testimonialItems.forEach(item => {
            const textElements = item.querySelectorAll('p, .author-name, .author-role, .author-company, .testimonial-project span');
            
            textElements.forEach(element => {
                const originalText = element.textContent;
                const highlightedText = originalText.replace(searchRegex, '<mark>$1</mark>');
                element.innerHTML = highlightedText;
            });
        });
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
    const noteParam = urlParams.get('note');
    const rechercheParam = urlParams.get('recherche');
    
    if (serviceParam) {
        document.getElementById('service').value = serviceParam;
    }
    if (noteParam) {
        document.getElementById('note').value = noteParam;
    }
    if (rechercheParam) {
        document.getElementById('recherche').value = rechercheParam;
        highlightSearchTerms(rechercheParam);
    }
});
</script>

<?php
// Inclusion du pied de page
include 'includes/footer.php';
?>