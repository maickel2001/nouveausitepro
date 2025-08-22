<?php
/**
 * Gestion des ressources - Espace utilisateur
 * Site professionnel de Maickel Okereke
 */

// Configuration de la page
$page_title = 'Mes ressources - Espace utilisateur - Maickel Okereke';
$page_description = 'Accédez et gérez toutes vos ressources téléchargées dans votre espace utilisateur personnel.';
$page_keywords = 'ressources, téléchargements, espace utilisateur, Maickel Okereke';

// Inclusion des fichiers nécessaires
require_once '../includes/functions.php';

// Vérification de la connexion (simulation)
session_start();
$is_logged_in = isset($_SESSION['user_id']) && !empty($_SESSION['user_id']);

if (!$is_logged_in) {
    // Redirection vers la page de connexion
    header('Location: /login.php?redirect=' . urlencode($_SERVER['REQUEST_URI']));
    exit;
}

// Données des ressources (simulation)
$ressources = [
    [
        'id' => 1,
        'titre' => 'Guide de gestion comptable',
        'description' => 'Guide complet pour la gestion comptable de votre entreprise, incluant les bonnes pratiques et les obligations légales.',
        'type' => 'PDF',
        'categorie' => 'Comptabilité',
        'taille' => '2.5 MB',
        'date_telechargement' => '2024-08-20',
        'date_expiration' => '2025-08-20',
        'telechargements' => 3,
        'favori' => true,
        'tags' => ['Comptabilité', 'Guide', 'Gestion', 'Obligations']
    ],
    [
        'id' => 2,
        'titre' => 'Modèle de facture professionnelle',
        'description' => 'Modèle Excel de facture professionnelle avec calculs automatiques et mise en page optimisée.',
        'type' => 'Excel',
        'categorie' => 'Facturation',
        'taille' => '150 KB',
        'date_telechargement' => '2024-08-18',
        'date_expiration' => '2025-08-18',
        'telechargements' => 5,
        'favori' => false,
        'tags' => ['Facturation', 'Modèle', 'Excel', 'Calculs']
    ],
    [
        'id' => 3,
        'titre' => 'Checklist audit comptable',
        'description' => 'Liste de contrôle complète pour préparer et réussir votre audit comptable annuel.',
        'type' => 'PDF',
        'categorie' => 'Audit',
        'taille' => '1.2 MB',
        'date_telechargement' => '2024-08-15',
        'date_expiration' => '2025-08-15',
        'telechargements' => 2,
        'favori' => true,
        'tags' => ['Audit', 'Checklist', 'Contrôle', 'Préparation']
    ],
    [
        'id' => 4,
        'titre' => 'Plan de trésorerie mensuel',
        'description' => 'Modèle de plan de trésorerie pour gérer efficacement vos flux de trésorerie mensuels.',
        'type' => 'Excel',
        'categorie' => 'Trésorerie',
        'taille' => '800 KB',
        'date_telechargement' => '2024-08-12',
        'date_expiration' => '2025-08-12',
        'telechargements' => 4,
        'favori' => false,
        'tags' => ['Trésorerie', 'Plan', 'Flux', 'Mensuel']
    ],
    [
        'id' => 5,
        'titre' => 'Guide de sécurité informatique',
        'description' => 'Bonnes pratiques et recommandations pour sécuriser vos données et systèmes informatiques.',
        'type' => 'PDF',
        'categorie' => 'Sécurité',
        'taille' => '3.1 MB',
        'date_telechargement' => '2024-08-10',
        'date_expiration' => '2025-08-10',
        'telechargements' => 1,
        'favori' => true,
        'tags' => ['Sécurité', 'Informatique', 'Bonnes pratiques', 'Protection']
    ]
];

// Filtrage des ressources
$filtre_categorie = $_GET['categorie'] ?? '';
$filtre_type = $_GET['type'] ?? '';
$filtre_favori = $_GET['favori'] ?? '';
$recherche = $_GET['recherche'] ?? '';

$ressources_filtrees = $ressources;

// Filtre par catégorie
if (!empty($filtre_categorie)) {
    $ressources_filtrees = array_filter($ressources_filtrees, function($r) use ($filtre_categorie) {
        return $r['categorie'] === $filtre_categorie;
    });
}

// Filtre par type
if (!empty($filtre_type)) {
    $ressources_filtrees = array_filter($ressources_filtrees, function($r) use ($filtre_type) {
        return $r['type'] === $filtre_type;
    });
}

// Filtre par favori
if (!empty($filtre_favori)) {
    $ressources_filtrees = array_filter($ressources_filtrees, function($r) use ($filtre_favori) {
        return $filtre_favori === 'true' ? $r['favori'] : !$r['favori'];
    });
}

// Recherche textuelle
if (!empty($recherche)) {
    $ressources_filtrees = array_filter($ressources_filtrees, function($r) use ($recherche) {
        $recherche_lower = strtolower($recherche);
        return strpos(strtolower($r['titre']), $recherche_lower) !== false ||
               strpos(strtolower($r['description']), $recherche_lower) !== false ||
               in_array(strtolower($recherche), array_map('strtolower', $r['tags']));
    });
}

// Statistiques
$stats = [
    'total' => count($ressources),
    'pdf' => count(array_filter($ressources, function($r) { return $r['type'] === 'PDF'; })),
    'excel' => count(array_filter($ressources, function($r) { return $r['type'] === 'Excel'; })),
    'favoris' => count(array_filter($ressources, function($r) { return $r['favori']; })),
    'taille_totale' => array_sum(array_map(function($r) { 
        return (float)str_replace([' MB', ' KB'], ['', ''], $r['taille']) * ($r['taille'] === 'MB' ? 1 : 0.001); 
    }, $ressources))
];

// Inclusion de l'en-tête
include '../includes/header.php';
?>

<!-- Section des ressources -->
<section class="section section-user-ressources">
    <div class="container">
        <div class="ressources-container">
            <!-- En-tête de la page -->
            <div class="page-header">
                <div class="header-content">
                    <h1>Mes ressources</h1>
                    <p>Accédez et gérez toutes vos ressources téléchargées</p>
                </div>
                
                <div class="header-actions">
                    <a href="/ressources.php" class="btn btn-primary">
                        <i class="fas fa-plus"></i>
                        <span>Nouvelles ressources</span>
                    </a>
                </div>
            </div>
            
            <!-- Statistiques des ressources -->
            <div class="ressources-stats">
                <div class="stats-grid">
                    <div class="stat-item">
                        <div class="stat-icon">
                            <i class="fas fa-download"></i>
                        </div>
                        <div class="stat-content">
                            <div class="stat-number"><?php echo $stats['total']; ?></div>
                            <div class="stat-label">Total</div>
                        </div>
                    </div>
                    
                    <div class="stat-item">
                        <div class="stat-icon">
                            <i class="fas fa-file-pdf"></i>
                        </div>
                        <div class="stat-content">
                            <div class="stat-number"><?php echo $stats['pdf']; ?></div>
                            <div class="stat-label">PDF</div>
                        </div>
                    </div>
                    
                    <div class="stat-item">
                        <div class="stat-icon">
                            <i class="fas fa-file-excel"></i>
                        </div>
                        <div class="stat-content">
                            <div class="stat-number"><?php echo $stats['excel']; ?></div>
                            <div class="stat-label">Excel</div>
                        </div>
                    </div>
                    
                    <div class="stat-item">
                        <div class="stat-icon">
                            <i class="fas fa-heart"></i>
                        </div>
                        <div class="stat-content">
                            <div class="stat-number"><?php echo $stats['favoris']; ?></div>
                            <div class="stat-label">Favoris</div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Filtres et recherche -->
            <div class="ressources-filters">
                <form class="filters-form" method="GET" action="">
                    <div class="filters-row">
                        <div class="filter-group">
                            <label for="categorie">Catégorie</label>
                            <select id="categorie" name="categorie">
                                <option value="">Toutes les catégories</option>
                                <option value="Comptabilité" <?php echo $filtre_categorie === 'Comptabilité' ? 'selected' : ''; ?>>Comptabilité</option>
                                <option value="Facturation" <?php echo $filtre_categorie === 'Facturation' ? 'selected' : ''; ?>>Facturation</option>
                                <option value="Audit" <?php echo $filtre_categorie === 'Audit' ? 'selected' : ''; ?>>Audit</option>
                                <option value="Trésorerie" <?php echo $filtre_categorie === 'Trésorerie' ? 'selected' : ''; ?>>Trésorerie</option>
                                <option value="Sécurité" <?php echo $filtre_categorie === 'Sécurité' ? 'selected' : ''; ?>>Sécurité</option>
                            </select>
                        </div>
                        
                        <div class="filter-group">
                            <label for="type">Type</label>
                            <select id="type" name="type">
                                <option value="">Tous les types</option>
                                <option value="PDF" <?php echo $filtre_type === 'PDF' ? 'selected' : ''; ?>>PDF</option>
                                <option value="Excel" <?php echo $filtre_type === 'Excel' ? 'selected' : ''; ?>>Excel</option>
                            </select>
                        </div>
                        
                        <div class="filter-group">
                            <label for="favori">Favoris</label>
                            <select id="favori" name="favori">
                                <option value="">Toutes les ressources</option>
                                <option value="true" <?php echo $filtre_favori === 'true' ? 'selected' : ''; ?>>Favoris uniquement</option>
                                <option value="false" <?php echo $filtre_favori === 'false' ? 'selected' : ''; ?>>Non favoris</option>
                            </select>
                        </div>
                        
                        <div class="filter-group search-group">
                            <label for="recherche">Rechercher</label>
                            <div class="search-input">
                                <i class="fas fa-search"></i>
                                <input type="text" id="recherche" name="recherche" value="<?php echo htmlspecialchars($recherche); ?>" placeholder="Titre, description, tags...">
                            </div>
                        </div>
                        
                        <div class="filter-actions">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-filter"></i>
                                <span>Filtrer</span>
                            </button>
                            <a href="/user/ressources.php" class="btn btn-outline">
                                <i class="fas fa-times"></i>
                                <span>Effacer</span>
                            </a>
                        </div>
                    </div>
                </form>
                
                <div class="filters-results">
                    <p><?php echo count($ressources_filtrees); ?> ressource<?php echo count($ressources_filtrees) > 1 ? 's' : ''; ?> trouvée<?php echo count($ressources_filtrees) > 1 ? 's' : ''; ?></p>
                </div>
            </div>
            
            <!-- Liste des ressources -->
            <div class="ressources-list">
                <?php if (empty($ressources_filtrees)): ?>
                <div class="no-results">
                    <div class="no-results-icon">
                        <i class="fas fa-search"></i>
                    </div>
                    <h3>Aucune ressource trouvée</h3>
                    <p>Aucune ressource ne correspond à vos critères de recherche.</p>
                    <a href="/ressources.php" class="btn btn-primary">
                        <i class="fas fa-download"></i>
                        <span>Découvrir de nouvelles ressources</span>
                    </a>
                </div>
                <?php else: ?>
                
                <?php foreach ($ressources_filtrees as $ressource): ?>
                <div class="ressource-card" data-ressource-id="<?php echo $ressource['id']; ?>">
                    <div class="ressource-header">
                        <div class="ressource-icon">
                            <i class="fas fa-<?php echo $ressource['type'] === 'PDF' ? 'file-pdf' : 'file-excel'; ?>"></i>
                        </div>
                        
                        <div class="ressource-title">
                            <h3><?php echo htmlspecialchars($ressource['titre']); ?></h3>
                            <div class="ressource-badges">
                                <span class="badge categorie"><?php echo htmlspecialchars($ressource['categorie']); ?></span>
                                <span class="badge type"><?php echo htmlspecialchars($ressource['type']); ?></span>
                                <?php if ($ressource['favori']): ?>
                                <span class="badge favori">
                                    <i class="fas fa-heart"></i>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        
                        <div class="ressource-actions">
                            <button class="btn btn-icon" onclick="toggleFavori(<?php echo $ressource['id']; ?>)" title="<?php echo $ressource['favori'] ? 'Retirer des favoris' : 'Ajouter aux favoris'; ?>">
                                <i class="fas fa-heart<?php echo $ressource['favori'] ? '' : '-o'; ?>"></i>
                            </button>
                            
                            <button class="btn btn-icon" onclick="showRessourceDetails(<?php echo $ressource['id']; ?>)" title="Voir les détails">
                                <i class="fas fa-info-circle"></i>
                            </button>
                        </div>
                    </div>
                    
                    <div class="ressource-content">
                        <div class="ressource-description">
                            <p><?php echo htmlspecialchars($ressource['description']); ?></p>
                        </div>
                        
                        <div class="ressource-meta">
                            <div class="meta-item">
                                <i class="fas fa-calendar"></i>
                                <span>Téléchargé le <?php echo date('d/m/Y', strtotime($ressource['date_telechargement'])); ?></span>
                            </div>
                            
                            <div class="meta-item">
                                <i class="fas fa-clock"></i>
                                <span>Expire le <?php echo date('d/m/Y', strtotime($ressource['date_expiration'])); ?></span>
                            </div>
                            
                            <div class="meta-item">
                                <i class="fas fa-download"></i>
                                <span><?php echo $ressource['telechargements']; ?> téléchargement<?php echo $ressource['telechargements'] > 1 ? 's' : ''; ?></span>
                            </div>
                            
                            <div class="meta-item">
                                <i class="fas fa-weight"></i>
                                <span><?php echo htmlspecialchars($ressource['taille']); ?></span>
                            </div>
                        </div>
                        
                        <div class="ressource-tags">
                            <?php foreach ($ressource['tags'] as $tag): ?>
                            <span class="tag"><?php echo htmlspecialchars($tag); ?></span>
                            <?php endfor; ?>
                        </div>
                    </div>
                    
                    <div class="ressource-footer">
                        <div class="ressource-actions-main">
                            <button class="btn btn-primary" onclick="downloadRessource(<?php echo $ressource['id']; ?>)">
                                <i class="fas fa-download"></i>
                                <span>Télécharger</span>
                            </button>
                            
                            <button class="btn btn-outline" onclick="shareRessource(<?php echo $ressource['id']; ?>)">
                                <i class="fas fa-share"></i>
                                <span>Partager</span>
                            </button>
                        </div>
                    </div>
                </div>
                <?php endfor; ?>
                
                <?php endif; ?>
            </div>
            
            <!-- Actions en lot -->
            <div class="bulk-actions">
                <div class="bulk-actions-header">
                    <h3>Actions en lot</h3>
                    <p>Sélectionnez plusieurs ressources pour effectuer des actions groupées</p>
                </div>
                
                <div class="bulk-actions-content">
                    <div class="bulk-actions-buttons">
                        <button class="btn btn-outline" onclick="selectAllRessources()">
                            <i class="fas fa-check-square"></i>
                            <span>Tout sélectionner</span>
                        </button>
                        
                        <button class="btn btn-outline" onclick="deselectAllRessources()">
                            <i class="fas fa-square"></i>
                            <span>Tout désélectionner</span>
                        </button>
                        
                        <button class="btn btn-warning" onclick="addToFavorites()">
                            <i class="fas fa-heart"></i>
                            <span>Ajouter aux favoris</span>
                        </button>
                        
                        <button class="btn btn-danger" onclick="removeFromFavorites()">
                            <i class="fas fa-heart-broken"></i>
                            <span>Retirer des favoris</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal des détails de la ressource -->
<div id="ressource-modal" class="modal" style="display: none;">
    <div class="modal-content">
        <div class="modal-header">
            <h3 id="modal-title">Détails de la ressource</h3>
            <button class="modal-close" onclick="closeRessourceModal()">
                <i class="fas fa-times"></i>
            </button>
        </div>
        
        <div class="modal-body" id="modal-body">
            <!-- Le contenu sera rempli dynamiquement -->
        </div>
        
        <div class="modal-footer">
            <button class="btn btn-outline" onclick="closeRessourceModal()">Fermer</button>
            <button class="btn btn-primary" onclick="downloadFromModal()">Télécharger</button>
        </div>
    </div>
</div>

<!-- JavaScript spécifique à la page -->
<script>
let selectedRessources = [];
let currentRessourceId = null;

document.addEventListener('DOMContentLoaded', function() {
    // Animation des éléments au scroll
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate');
            }
        });
    });
    
    const animatedElements = document.querySelectorAll('.ressource-card, .stat-item');
    animatedElements.forEach(el => observer.observe(el));
    
    // Animation des statistiques
    const animateStats = () => {
        const statNumbers = document.querySelectorAll('.stat-number');
        statNumbers.forEach(stat => {
            const target = parseInt(stat.textContent);
            let current = 0;
            const increment = target / 50;
            
            const timer = setInterval(() => {
                current += increment;
                if (current >= target) {
                    current = target;
                    clearInterval(timer);
                }
                stat.textContent = Math.floor(current);
            }, 30);
        });
    };
    
    // Déclencher l'animation des stats
    const statsSection = document.querySelector('.ressources-stats');
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
    const filterSelects = document.querySelectorAll('select[name="categorie"], select[name="type"], select[name="favori"]');
    
    filterSelects.forEach(select => {
        select.addEventListener('change', function() {
            searchForm.submit();
        });
    });
    
    // Gestion des cases à cocher pour la sélection multiple
    const resourceCards = document.querySelectorAll('.ressource-card');
    resourceCards.forEach(card => {
        const checkbox = document.createElement('input');
        checkbox.type = 'checkbox';
        checkbox.className = 'ressource-checkbox';
        checkbox.dataset.ressourceId = card.dataset.ressourceId || Math.random();
        
        checkbox.addEventListener('change', function() {
            if (this.checked) {
                selectedRessources.push(this.dataset.ressourceId);
            } else {
                selectedRessources = selectedRessources.filter(id => id !== this.dataset.ressourceId);
            }
            updateBulkActions();
        });
        
        card.querySelector('.ressource-header').prepend(checkbox);
    });
});

// Fonction pour basculer le statut favori
function toggleFavori(ressourceId) {
    const heartIcon = event.target.closest('button').querySelector('i');
    const isFavorite = heartIcon.classList.contains('fa-heart');
    
    if (isFavorite) {
        heartIcon.classList.remove('fa-heart');
        heartIcon.classList.add('fa-heart-o');
        showNotification('Ressource retirée des favoris', 'info');
    } else {
        heartIcon.classList.remove('fa-heart-o');
        heartIcon.classList.add('fa-heart');
        showNotification('Ressource ajoutée aux favoris', 'success');
    }
    
    // Mettre à jour l'interface
    updateFavoriBadge(ressourceId, !isFavorite);
}

// Fonction pour mettre à jour le badge favori
function updateFavoriBadge(ressourceId, isFavorite) {
    const card = document.querySelector(`[data-ressource-id="${ressourceId}"]`);
    if (card) {
        let favoriBadge = card.querySelector('.badge.favori');
        
        if (isFavorite && !favoriBadge) {
            const badgesContainer = card.querySelector('.ressource-badges');
            favoriBadge = document.createElement('span');
            favoriBadge.className = 'badge favori';
            favoriBadge.innerHTML = '<i class="fas fa-heart"></i>';
            badgesContainer.appendChild(favoriBadge);
        } else if (!isFavorite && favoriBadge) {
            favoriBadge.remove();
        }
    }
}

// Fonction pour télécharger une ressource
function downloadRessource(ressourceId) {
    // Simulation de téléchargement
    const link = document.createElement('a');
    link.href = '#';
    link.download = `ressource-${ressourceId}.pdf`;
    link.click();
    
    showNotification('Téléchargement en cours...', 'success');
    
    // Mettre à jour le compteur de téléchargements
    updateDownloadCount(ressourceId);
}

// Fonction pour mettre à jour le compteur de téléchargements
function updateDownloadCount(ressourceId) {
    const card = document.querySelector(`[data-ressource-id="${ressourceId}"]`);
    if (card) {
        const downloadCount = card.querySelector('.meta-item:has(.fa-download) span');
        if (downloadCount) {
            const currentCount = parseInt(downloadCount.textContent);
            downloadCount.textContent = `${currentCount + 1} téléchargement${currentCount + 1 > 1 ? 's' : ''}`;
        }
    }
}

// Fonction pour partager une ressource
function shareRessource(ressourceId) {
    if (navigator.share) {
        navigator.share({
            title: 'Ressource partagée',
            text: 'Découvrez cette ressource utile !',
            url: window.location.href
        });
    } else {
        // Fallback pour les navigateurs qui ne supportent pas l'API Web Share
        const url = window.location.href;
        navigator.clipboard.writeText(url).then(() => {
            showNotification('Lien copié dans le presse-papiers !', 'success');
        });
    }
}

// Fonction pour afficher les détails d'une ressource
function showRessourceDetails(ressourceId) {
    currentRessourceId = ressourceId;
    
    // Récupérer les données de la ressource (en production, ce serait une requête AJAX)
    const card = document.querySelector(`[data-ressource-id="${ressourceId}"]`);
    if (card) {
        const title = card.querySelector('h3').textContent;
        const description = card.querySelector('.ressource-description p').textContent;
        const category = card.querySelector('.badge.categorie').textContent;
        const type = card.querySelector('.badge.type').textContent;
        const size = card.querySelector('.meta-item:has(.fa-weight) span').textContent;
        const downloadDate = card.querySelector('.meta-item:has(.fa-calendar) span').textContent;
        const expirationDate = card.querySelector('.meta-item:has(.fa-clock) span').textContent;
        
        // Remplir le modal
        document.getElementById('modal-title').textContent = title;
        document.getElementById('modal-body').innerHTML = `
            <div class="ressource-details">
                <div class="detail-item">
                    <label>Description :</label>
                    <p>${description}</p>
                </div>
                
                <div class="detail-item">
                    <label>Catégorie :</label>
                    <span>${category}</span>
                </div>
                
                <div class="detail-item">
                    <label>Type :</label>
                    <span>${type}</span>
                </div>
                
                <div class="detail-item">
                    <label>Taille :</label>
                    <span>${size}</span>
                </div>
                
                <div class="detail-item">
                    <label>Date de téléchargement :</label>
                    <span>${downloadDate}</span>
                </div>
                
                <div class="detail-item">
                    <label>Date d'expiration :</label>
                    <span>${expirationDate}</span>
                </div>
            </div>
        `;
        
        // Afficher le modal
        document.getElementById('ressource-modal').style.display = 'block';
    }
}

// Fonction pour fermer le modal
function closeRessourceModal() {
    document.getElementById('ressource-modal').style.display = 'none';
    currentRessourceId = null;
}

// Fonction pour télécharger depuis le modal
function downloadFromModal() {
    if (currentRessourceId) {
        downloadRessource(currentRessourceId);
        closeRessourceModal();
    }
}

// Fonction pour sélectionner toutes les ressources
function selectAllRessources() {
    const checkboxes = document.querySelectorAll('.ressource-checkbox');
    checkboxes.forEach(checkbox => {
        checkbox.checked = true;
        selectedRessources.push(checkbox.dataset.ressourceId);
    });
    updateBulkActions();
}

// Fonction pour désélectionner toutes les ressources
function deselectAllRessources() {
    const checkboxes = document.querySelectorAll('.ressource-checkbox');
    checkboxes.forEach(checkbox => {
        checkbox.checked = false;
    });
    selectedRessources = [];
    updateBulkActions();
}

// Fonction pour ajouter aux favoris
function addToFavorites() {
    if (selectedRessources.length === 0) {
        showNotification('Veuillez sélectionner au moins une ressource', 'warning');
        return;
    }
    
    selectedRessources.forEach(ressourceId => {
        // Simuler l'ajout aux favoris
        const card = document.querySelector(`[data-ressource-id="${ressourceId}"]`);
        if (card) {
            const heartIcon = card.querySelector('.ressource-actions .fa-heart-o');
            if (heartIcon) {
                heartIcon.classList.remove('fa-heart-o');
                heartIcon.classList.add('fa-heart');
                updateFavoriBadge(ressourceId, true);
            }
        }
    });
    
    showNotification(`${selectedRessources.length} ressource(s) ajoutée(s) aux favoris`, 'success');
    deselectAllRessources();
}

// Fonction pour retirer des favoris
function removeFromFavorites() {
    if (selectedRessources.length === 0) {
        showNotification('Veuillez sélectionner au moins une ressource', 'warning');
        return;
    }
    
    selectedRessources.forEach(ressourceId => {
        // Simuler le retrait des favoris
        const card = document.querySelector(`[data-ressource-id="${ressourceId}"]`);
        if (card) {
            const heartIcon = card.querySelector('.ressource-actions .fa-heart');
            if (heartIcon) {
                heartIcon.classList.remove('fa-heart');
                heartIcon.classList.add('fa-heart-o');
                updateFavoriBadge(ressourceId, false);
            }
        }
    });
    
    showNotification(`${selectedRessources.length} ressource(s) retirée(s) des favoris`, 'success');
    deselectAllRessources();
}

// Fonction pour mettre à jour les actions en lot
function updateBulkActions() {
    const bulkActions = document.querySelector('.bulk-actions');
    if (selectedRessources.length > 0) {
        bulkActions.style.display = 'block';
    } else {
        bulkActions.style.display = 'none';
    }
}

// Fonction pour afficher des notifications
function showNotification(message, type = 'info') {
    const notification = document.createElement('div');
    notification.className = `notification notification-${type}`;
    notification.innerHTML = `
        <i class="fas fa-${type === 'success' ? 'check-circle' : type === 'warning' ? 'exclamation-triangle' : 'info-circle'}"></i>
        <span>${message}</span>
    `;
    
    document.body.appendChild(notification);
    
    // Supprimer la notification après 3 secondes
    setTimeout(() => {
        notification.remove();
    }, 3000);
}

// Fermer le modal en cliquant à l'extérieur
window.addEventListener('click', function(event) {
    const modal = document.getElementById('ressource-modal');
    if (event.target === modal) {
        closeRessourceModal();
    }
});
</script>

<?php
// Inclusion du pied de page
include '../includes/footer.php';
?>