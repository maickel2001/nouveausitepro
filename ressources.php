<?php
/**
 * Page des ressources
 * Site professionnel de Maickel Okereke
 */

// Configuration de la page
$page_title = 'Ressources - Maickel Okereke';
$page_description = 'Téléchargez gratuitement nos ressources : guides, templates, checklists pour la comptabilité et le développement web.';
$page_keywords = 'ressources, téléchargements, guides, templates, comptabilité, développement web, Maickel Okereke';

// Inclusion des fichiers nécessaires
require_once 'includes/functions.php';

// Inclusion du header
include 'includes/header.php';

// Données des ressources (en production, viendront de la base de données)
$ressources = [
    [
        'id' => 1,
        'titre' => 'Guide de création d\'entreprise 2025',
        'description' => 'Guide complet et actualisé pour créer votre entreprise en 2025. Inclut toutes les étapes administratives, juridiques et fiscales.',
        'type' => 'pdf',
        'categorie' => 'Guides',
        'acces' => 'public',
        'taille' => '2.5 MB',
        'telechargements' => 1247,
        'image' => generatePlaceholderImage(300, 200, 'Guide Création', '2563eb', 'ffffff'),
        'fichier' => 'guide-creation-entreprise-2025.pdf',
        'tags' => ['création', 'entreprise', 'administratif', 'juridique', 'fiscal']
    ],
    [
        'id' => 2,
        'titre' => 'Modèle de business plan Excel',
        'description' => 'Template Excel professionnel pour votre business plan. Inclut projections financières, analyse de marché et plan d\'action.',
        'type' => 'excel',
        'categorie' => 'Templates',
        'acces' => 'user',
        'taille' => '1.8 MB',
        'telechargements' => 892,
        'image' => generatePlaceholderImage(300, 200, 'Business Plan', '1e40af', 'ffffff'),
        'fichier' => 'modele-business-plan.xlsx',
        'tags' => ['business plan', 'excel', 'financier', 'projet', 'planification']
    ],
    [
        'id' => 3,
        'titre' => 'Checklist comptable mensuelle',
        'description' => 'Liste de contrôle complète pour votre comptabilité mensuelle. Assurez-vous de ne rien oublier dans vos obligations comptables.',
        'type' => 'pdf',
        'categorie' => 'Checklists',
        'acces' => 'user',
        'taille' => '0.8 MB',
        'telechargements' => 1567,
        'image' => generatePlaceholderImage(300, 200, 'Checklist', '1e3a8a', 'ffffff'),
        'fichier' => 'checklist-comptable-mensuelle.pdf',
        'tags' => ['comptabilité', 'checklist', 'mensuel', 'obligations', 'contrôle']
    ],
    [
        'id' => 4,
        'titre' => 'Guide d\'optimisation fiscale TPE/PME',
        'description' => 'Conseils et stratégies pour optimiser votre situation fiscale. Adapté aux petites et moyennes entreprises.',
        'type' => 'pdf',
        'categorie' => 'Guides',
        'acces' => 'user',
        'taille' => '3.2 MB',
        'telechargements' => 743,
        'image' => generatePlaceholderImage(300, 200, 'Optimisation', '1d4ed8', 'ffffff'),
        'fichier' => 'guide-optimisation-fiscale-tpe-pme.pdf',
        'tags' => ['fiscal', 'optimisation', 'TPE', 'PME', 'stratégie']
    ],
    [
        'id' => 5,
        'titre' => 'Template de facture professionnelle',
        'description' => 'Modèle de facture Word et PDF professionnel et personnalisable. Conforme aux exigences légales françaises.',
        'type' => 'word',
        'categorie' => 'Templates',
        'acces' => 'public',
        'taille' => '1.2 MB',
        'telechargements' => 2103,
        'image' => generatePlaceholderImage(300, 200, 'Facture', 'dc2626', 'ffffff'),
        'fichier' => 'template-facture-professionnelle.docx',
        'tags' => ['facture', 'template', 'word', 'professionnel', 'légal']
    ],
    [
        'id' => 6,
        'titre' => 'Guide de développement web pour débutants',
        'description' => 'Introduction complète au développement web : HTML, CSS, JavaScript. Parfait pour débuter en programmation.',
        'type' => 'pdf',
        'categorie' => 'Guides',
        'acces' => 'public',
        'taille' => '4.1 MB',
        'telechargements' => 1892,
        'image' => generatePlaceholderImage(300, 200, 'Développement', '059669', 'ffffff'),
        'fichier' => 'guide-developpement-web-debutants.pdf',
        'tags' => ['développement', 'web', 'HTML', 'CSS', 'JavaScript', 'débutant']
    ],
    [
        'id' => 7,
        'titre' => 'Checklist de lancement de site web',
        'description' => 'Liste de contrôle complète pour le lancement de votre site web. Sécurité, performance, SEO et tests.',
        'type' => 'pdf',
        'categorie' => 'Checklists',
        'acces' => 'user',
        'taille' => '1.5 MB',
        'telechargements' => 567,
        'image' => generatePlaceholderImage(300, 200, 'Lancement', '7c3aed', 'ffffff'),
        'fichier' => 'checklist-lancement-site-web.pdf',
        'tags' => ['site web', 'lancement', 'sécurité', 'performance', 'SEO']
    ],
    [
        'id' => 8,
        'titre' => 'Modèle de contrat de prestation',
        'description' => 'Template de contrat de prestation de services. Adaptable à différents types de services et secteurs d\'activité.',
        'type' => 'word',
        'categorie' => 'Templates',
        'acces' => 'user',
        'taille' => '2.1 MB',
        'telechargements' => 432,
        'image' => generatePlaceholderImage(300, 200, 'Contrat', 'ea580c', 'ffffff'),
        'fichier' => 'modele-contrat-prestation.docx',
        'tags' => ['contrat', 'prestation', 'services', 'template', 'juridique']
    ]
];

// Filtres disponibles
$categories = array_unique(array_column($ressources, 'categorie'));
$types = array_unique(array_column($ressources, 'type'));
$acces = array_unique(array_column($ressources, 'acces'));

// Filtrage des ressources
$filtre_categorie = $_GET['categorie'] ?? '';
$filtre_type = $_GET['type'] ?? '';
$filtre_acces = $_GET['acces'] ?? '';
$filtre_recherche = $_GET['recherche'] ?? '';

$ressources_filtrees = $ressources;

// Filtrage par catégorie
if ($filtre_categorie) {
    $ressources_filtrees = array_filter($ressources_filtrees, function($r) use ($filtre_categorie) {
        return $r['categorie'] === $filtre_categorie;
    });
}

// Filtrage par type
if ($filtre_type) {
    $ressources_filtrees = array_filter($ressources_filtrees, function($r) use ($filtre_type) {
        return $r['type'] === $filtre_type;
    });
}

// Filtrage par accès
if ($filtre_acces) {
    $ressources_filtrees = array_filter($ressources_filtrees, function($r) use ($filtre_acces) {
        return $r['acces'] === $filtre_acces;
    });
}

// Filtrage par recherche
if ($filtre_recherche) {
    $ressources_filtrees = array_filter($ressources_filtrees, function($r) use ($filtre_recherche) {
        $recherche = strtolower($filtre_recherche);
        return strpos(strtolower($r['titre']), $recherche) !== false ||
               strpos(strtolower($r['description']), $recherche) !== false ||
               in_array($recherche, array_map('strtolower', $r['tags']));
    });
}

// En-tête de page personnalisé
$page_header = '
<div class="page-header-content">
    <h1>Ressources Gratuites</h1>
    <p>Téléchargez nos guides, templates et outils pour vous accompagner dans vos projets</p>
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
                <h2>Des ressources utiles pour votre entreprise</h2>
                <p>Nous partageons notre expertise à travers des ressources pratiques et téléchargeables. Guides, templates, checklists : tout ce dont vous avez besoin pour développer votre activité.</p>
                <p>Certaines ressources sont accessibles à tous, d\'autres nécessitent une inscription gratuite. Créez votre compte pour accéder à l\'ensemble de nos ressources premium.</p>
            </div>
            <div class="intro-image">
                <img src="<?php echo generatePlaceholderImage(400, 300, 'Ressources', '2563eb', 'ffffff'); ?>" alt="Ressources gratuites" loading="lazy">
            </div>
        </div>
    </div>
</section>

<!-- Section des filtres -->
<section class="section section-filters">
    <div class="container">
        <form class="filters-form" method="GET" action="">
            <div class="filters-row">
                <div class="filter-group">
                    <label for="categorie">Catégorie</label>
                    <select id="categorie" name="categorie">
                        <option value="">Toutes les catégories</option>
                        <?php foreach ($categories as $cat): ?>
                        <option value="<?php echo htmlspecialchars($cat); ?>" <?php echo $filtre_categorie === $cat ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars($cat); ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                
                <div class="filter-group">
                    <label for="type">Type de fichier</label>
                    <select id="type" name="type">
                        <option value="">Tous les types</option>
                        <?php foreach ($types as $type): ?>
                        <option value="<?php echo htmlspecialchars($type); ?>" <?php echo $filtre_type === $type ? 'selected' : ''; ?>>
                            <?php echo strtoupper(htmlspecialchars($type)); ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                
                <div class="filter-group">
                    <label for="acces">Accès</label>
                    <select id="acces" name="acces">
                        <option value="">Tous les accès</option>
                        <option value="public" <?php echo $filtre_acces === 'public' ? 'selected' : ''; ?>>Public</option>
                        <option value="user" <?php echo $filtre_acces === 'user' ? 'selected' : ''; ?>>Utilisateur</option>
                    </select>
                </div>
                
                <div class="filter-group">
                    <label for="recherche">Recherche</label>
                    <input type="text" id="recherche" name="recherche" value="<?php echo htmlspecialchars($filtre_recherche); ?>" placeholder="Rechercher une ressource...">
                </div>
            </div>
            
            <div class="filters-actions">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-filter"></i>
                    <span>Filtrer</span>
                </button>
                <a href="/ressources.php" class="btn btn-outline">
                    <i class="fas fa-undo"></i>
                    <span>Réinitialiser</span>
                </a>
            </div>
        </form>
    </div>
</section>

<!-- Section des statistiques -->
<section class="section section-stats">
    <div class="container">
        <div class="stats-grid">
            <div class="stat-item">
                <div class="stat-number"><?php echo count($ressources); ?>+</div>
                <div class="stat-label">Ressources disponibles</div>
            </div>
            <div class="stat-item">
                <div class="stat-number"><?php echo array_sum(array_column($ressources, 'telechargements')); ?>+</div>
                <div class="stat-label">Téléchargements</div>
            </div>
            <div class="stat-item">
                <div class="stat-number"><?php echo count(array_filter($ressources, function($r) { return $r['acces'] === 'public'; })); ?></div>
                <div class="stat-label">Ressources publiques</div>
            </div>
            <div class="stat-item">
                <div class="stat-number"><?php echo count(array_filter($ressources, function($r) { return $r['acces'] === 'user'; })); ?></div>
                <div class="stat-label">Ressources premium</div>
            </div>
        </div>
    </div>
</section>

<!-- Section des ressources -->
<section class="section section-ressources">
    <div class="container">
        <div class="ressources-header">
            <h2>Nos Ressources</h2>
            <p><?php echo count($ressources_filtrees); ?> ressource<?php echo count($ressources_filtrees) > 1 ? 's' : ''; ?> trouvée<?php echo count($ressources_filtrees) > 1 ? 's' : ''; ?></p>
        </div>
        
        <?php if (empty($ressources_filtrees)): ?>
        <div class="no-results">
            <div class="no-results-icon">
                <i class="fas fa-search"></i>
            </div>
            <h3>Aucune ressource trouvée</h3>
            <p>Essayez de modifier vos critères de recherche ou consultez toutes nos ressources.</p>
            <a href="/ressources.php" class="btn btn-primary">Voir toutes les ressources</a>
        </div>
        <?php else: ?>
        
        <div class="ressources-grid">
            <?php foreach ($ressources_filtrees as $ressource): ?>
            <div class="ressource-card" data-categorie="<?php echo htmlspecialchars($ressource['categorie']); ?>" data-type="<?php echo htmlspecialchars($ressource['type']); ?>" data-acces="<?php echo htmlspecialchars($ressource['acces']); ?>">
                <div class="ressource-image">
                    <img src="<?php echo $ressource['image']; ?>" alt="<?php echo htmlspecialchars($ressource['titre']); ?>" loading="lazy">
                    <div class="ressource-type">
                        <i class="fas fa-<?php echo $ressource['type'] === 'pdf' ? 'file-pdf' : ($ressource['type'] === 'excel' ? 'file-excel' : 'file-word'); ?>"></i>
                        <span><?php echo strtoupper($ressource['type']); ?></span>
                    </div>
                    <?php if ($ressource['acces'] === 'user'): ?>
                    <div class="ressource-premium">
                        <i class="fas fa-crown"></i>
                        <span>Premium</span>
                    </div>
                    <?php endif; ?>
                </div>
                
                <div class="ressource-content">
                    <div class="ressource-categorie"><?php echo htmlspecialchars($ressource['categorie']); ?></div>
                    <h3 class="ressource-titre"><?php echo htmlspecialchars($ressource['titre']); ?></h3>
                    <p class="ressource-description"><?php echo htmlspecialchars($ressource['description']); ?></p>
                    
                    <div class="ressource-tags">
                        <?php foreach ($ressource['tags'] as $tag): ?>
                        <span class="tag"><?php echo htmlspecialchars($tag); ?></span>
                        <?php endforeach; ?>
                    </div>
                    
                    <div class="ressource-meta">
                        <div class="meta-item">
                            <i class="fas fa-download"></i>
                            <span><?php echo number_format($ressource['telechargements']); ?> téléchargements</span>
                        </div>
                        <div class="meta-item">
                            <i class="fas fa-file"></i>
                            <span><?php echo $ressource['taille']; ?></span>
                        </div>
                    </div>
                    
                    <div class="ressource-actions">
                        <?php if ($ressource['acces'] === 'public'): ?>
                        <a href="/download.php?id=<?php echo $ressource['id']; ?>" class="btn btn-primary">
                            <i class="fas fa-download"></i>
                            <span>Télécharger</span>
                        </a>
                        <?php else: ?>
                        <?php if (isLoggedIn()): ?>
                        <a href="/download.php?id=<?php echo $ressource['id']; ?>" class="btn btn-primary">
                            <i class="fas fa-download"></i>
                            <span>Télécharger</span>
                        </a>
                        <?php else: ?>
                        <a href="/login.php?redirect=ressources" class="btn btn-outline">
                            <i class="fas fa-sign-in-alt"></i>
                            <span>Se connecter</span>
                        </a>
                        <a href="/register.php" class="btn btn-primary">
                            <i class="fas fa-user-plus"></i>
                            <span>S\'inscrire</span>
                        </a>
                        <?php endif; ?>
                        <?php endif; ?>
                        
                        <button class="btn btn-icon" title="Ajouter aux favoris">
                            <i class="fas fa-heart"></i>
                        </button>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
</section>

<!-- Section des catégories populaires -->
<section class="section section-categories-pop">
    <div class="container">
        <div class="section-header">
            <h2>Catégories Populaires</h2>
            <p>Découvrez nos ressources par catégorie</p>
        </div>
        
        <div class="categories-grid">
            <?php foreach ($categories as $cat): ?>
            <?php 
            $cat_ressources = array_filter($ressources, function($r) use ($cat) {
                return $r['categorie'] === $cat;
            });
            $cat_count = count($cat_ressources);
            $cat_downloads = array_sum(array_column($cat_ressources, 'telechargements'));
            ?>
            <div class="category-card">
                <div class="category-icon">
                    <i class="fas fa-<?php echo $cat === 'Guides' ? 'book' : ($cat === 'Templates' ? 'copy' : 'check-square'); ?>"></i>
                </div>
                <h3><?php echo htmlspecialchars($cat); ?></h3>
                <p><?php echo $cat_count; ?> ressource<?php echo $cat_count > 1 ? 's' : ''; ?></p>
                <div class="category-stats">
                    <span><?php echo number_format($cat_downloads); ?> téléchargements</span>
                </div>
                <a href="/ressources.php?categorie=<?php echo urlencode($cat); ?>" class="category-link">
                    Voir les ressources
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Section CTA -->
<section class="section section-cta">
    <div class="container">
        <div class="cta-content">
            <h2>Besoin de ressources personnalisées ?</h2>
            <p>Nous créons également des ressources sur mesure pour vos besoins spécifiques. Contactez-nous pour discuter de vos projets.</p>
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
    // Gestion des filtres en temps réel
    const filterSelects = document.querySelectorAll('select[name="categorie"], select[name="type"], select[name="acces"]');
    const searchInput = document.getElementById('recherche');
    
    // Filtrage automatique lors du changement de sélection
    filterSelects.forEach(select => {
        select.addEventListener('change', function() {
            applyFilters();
        });
    });
    
    // Filtrage automatique lors de la saisie
    searchInput.addEventListener('input', debounce(function() {
        applyFilters();
    }, 300));
    
    // Fonction d\'application des filtres
    function applyFilters() {
        const categorie = document.getElementById('categorie').value;
        const type = document.getElementById('type').value;
        const acces = document.getElementById('acces').value;
        const recherche = searchInput.value.toLowerCase();
        
        const ressources = document.querySelectorAll('.ressource-card');
        let visibleCount = 0;
        
        ressources.forEach(ressource => {
            const ressourceCategorie = ressource.dataset.categorie;
            const ressourceType = ressource.dataset.type;
            const ressourceAcces = ressource.dataset.acces;
            const ressourceTitre = ressource.querySelector('.ressource-titre').textContent.toLowerCase();
            const ressourceDescription = ressource.querySelector('.ressource-description').textContent.toLowerCase();
            
            let visible = true;
            
            // Filtre par catégorie
            if (categorie && ressourceCategorie !== categorie) {
                visible = false;
            }
            
            // Filtre par type
            if (type && ressourceType !== type) {
                visible = false;
            }
            
            // Filtre par accès
            if (acces && ressourceAcces !== acces) {
                visible = false;
            }
            
            // Filtre par recherche
            if (recherche && !ressourceTitre.includes(recherche) && !ressourceDescription.includes(recherche)) {
                visible = false;
            }
            
            if (visible) {
                ressource.style.display = 'block';
                visibleCount++;
            } else {
                ressource.style.display = 'none';
            }
        });
        
        // Mise à jour du compteur
        const header = document.querySelector('.ressources-header p');
        if (header) {
            header.textContent = `${visibleCount} ressource${visibleCount > 1 ? 's' : ''} trouvée${visibleCount > 1 ? 's' : ''}`;
        }
        
        // Affichage du message "aucun résultat" si nécessaire
        const noResults = document.querySelector('.no-results');
        if (visibleCount === 0) {
            if (!noResults) {
                showNoResults();
            }
        } else {
            if (noResults) {
                noResults.remove();
            }
        }
    }
    
    // Fonction pour afficher le message "aucun résultat"
    function showNoResults() {
        const ressourcesSection = document.querySelector('.section-ressources .container');
        const ressourcesGrid = ressourcesSection.querySelector('.ressources-grid');
        
        const noResults = document.createElement('div');
        noResults.className = 'no-results';
        noResults.innerHTML = `
            <div class="no-results-icon">
                <i class="fas fa-search"></i>
            </div>
            <h3>Aucune ressource trouvée</h3>
            <p>Essayez de modifier vos critères de recherche ou consultez toutes nos ressources.</p>
            <a href="/ressources.php" class="btn btn-primary">Voir toutes les ressources</a>
        `;
        
        ressourcesSection.insertBefore(noResults, ressourcesGrid.nextSibling);
    }
    
    // Fonction debounce
    function debounce(func, wait) {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func(...args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    }
    
    // Gestion des favoris
    const favoriteButtons = document.querySelectorAll('.btn-icon');
    favoriteButtons.forEach(button => {
        button.addEventListener('click', function() {
            const icon = this.querySelector('i');
            if (icon.classList.contains('fas')) {
                icon.className = 'fas fa-heart-broken';
                this.classList.add('favorited');
                showNotification('success', 'Ajouté aux favoris', 'Cette ressource a été ajoutée à vos favoris.');
            } else {
                icon.className = 'fas fa-heart';
                this.classList.remove('favorited');
                showNotification('info', 'Retiré des favoris', 'Cette ressource a été retirée de vos favoris.');
            }
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
    
    const animatedElements = document.querySelectorAll('.ressource-card, .category-card, .stat-item');
    animatedElements.forEach(el => observer.observe(el));
    
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
                    stat.textContent = Math.ceil(current) + (stat.textContent.includes('+') ? '+' : '');
                    requestAnimationFrame(updateStat);
                } else {
                    stat.textContent = stat.textContent.replace(stat.textContent, target + (stat.textContent.includes('+') ? '+' : ''));
                }
            };
            
            updateStat();
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
});
</script>

<?php
// Inclusion du pied de page
include 'includes/footer.php';
?>