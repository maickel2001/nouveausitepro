<?php
/**
 * Gestion des devis - Espace utilisateur
 * Site professionnel de Maickel Okereke
 */

// Configuration de la page
$page_title = 'Mes devis - Espace utilisateur - Maickel Okereke';
$page_description = 'Gérez et suivez tous vos devis dans votre espace utilisateur personnel.';
$page_keywords = 'devis, espace utilisateur, suivi, Maickel Okereke';

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

// Données des devis (simulation)
$devis = [
    [
        'id' => 1,
        'service' => 'Comptabilité complète',
        'description' => 'Gestion comptable complète incluant la saisie, la déclaration TVA, le bilan et le compte de résultat.',
        'statut' => 'En cours',
        'date_demande' => '2024-08-20',
        'date_modification' => '2024-08-22',
        'montant' => '1500€',
        'progression' => 75,
        'priorite' => 'Moyenne',
        'commentaires' => [
            [
                'date' => '2024-08-22',
                'auteur' => 'Maickel Okereke',
                'message' => 'Votre devis est en cours de finalisation. Nous avons besoin de quelques informations supplémentaires.'
            ],
            [
                'date' => '2024-08-21',
                'auteur' => 'Jean Dupont',
                'message' => 'Merci pour ce premier échange. J\'attends votre proposition détaillée.'
            ]
        ]
    ],
    [
        'id' => 2,
        'service' => 'Site web e-commerce',
        'description' => 'Création d\'un site web e-commerce complet avec gestion des produits, panier et paiement sécurisé.',
        'statut' => 'Validé',
        'date_demande' => '2024-08-15',
        'date_modification' => '2024-08-18',
        'montant' => '3500€',
        'progression' => 100,
        'priorite' => 'Haute',
        'commentaires' => [
            [
                'date' => '2024-08-18',
                'auteur' => 'Maickel Okereke',
                'message' => 'Excellent ! Votre projet est validé. Nous commençons le développement la semaine prochaine.'
            ]
        ]
    ],
    [
        'id' => 3,
        'service' => 'Audit comptable',
        'description' => 'Audit comptable annuel avec vérification des comptes et recommandations d\'amélioration.',
        'statut' => 'En attente',
        'date_demande' => '2024-08-18',
        'date_modification' => '2024-08-18',
        'montant' => '800€',
        'progression' => 25,
        'priorite' => 'Basse',
        'commentaires' => [
            [
                'date' => '2024-08-18',
                'auteur' => 'Jean Dupont',
                'message' => 'J\'ai soumis ma demande d\'audit. J\'attends votre retour.'
            ]
        ]
    ],
    [
        'id' => 4,
        'service' => 'Formation comptabilité',
        'description' => 'Formation personnalisée sur la gestion comptable pour votre équipe.',
        'statut' => 'Brouillon',
        'date_demande' => '2024-08-22',
        'date_modification' => '2024-08-22',
        'montant' => '600€',
        'progression' => 10,
        'priorite' => 'Moyenne',
        'commentaires' => []
    ]
];

// Filtrage des devis
$filtre_statut = $_GET['statut'] ?? '';
$filtre_priorite = $_GET['priorite'] ?? '';
$recherche = $_GET['recherche'] ?? '';

$devis_filtres = $devis;

// Filtre par statut
if (!empty($filtre_statut)) {
    $devis_filtres = array_filter($devis_filtres, function($d) use ($filtre_statut) {
        return $d['statut'] === $filtre_statut;
    });
}

// Filtre par priorité
if (!empty($filtre_priorite)) {
    $devis_filtres = array_filter($devis_filtres, function($d) use ($filtre_priorite) {
        return $d['priorite'] === $filtre_priorite;
    });
}

// Recherche textuelle
if (!empty($recherche)) {
    $devis_filtres = array_filter($devis_filtres, function($d) use ($recherche) {
        $recherche_lower = strtolower($recherche);
        return strpos(strtolower($d['service']), $recherche_lower) !== false ||
               strpos(strtolower($d['description']), $recherche_lower) !== false;
    });
}

// Statistiques
$stats = [
    'total' => count($devis),
    'en_cours' => count(array_filter($devis, function($d) { return $d['statut'] === 'En cours'; })),
    'valides' => count(array_filter($devis, function($d) { return $d['statut'] === 'Validé'; })),
    'en_attente' => count(array_filter($devis, function($d) { return $d['statut'] === 'En attente'; })),
    'brouillon' => count(array_filter($devis, function($d) { return $d['statut'] === 'Brouillon'; }))
];

// Inclusion de l'en-tête
include '../includes/header.php';
?>

<!-- Section des devis -->
<section class="section section-user-devis">
    <div class="container">
        <div class="devis-container">
            <!-- En-tête de la page -->
            <div class="page-header">
                <div class="header-content">
                    <h1>Mes devis</h1>
                    <p>Gérez et suivez tous vos devis en cours et validés</p>
                </div>
                
                <div class="header-actions">
                    <a href="/devis.php" class="btn btn-primary">
                        <i class="fas fa-plus"></i>
                        <span>Nouveau devis</span>
                    </a>
                </div>
            </div>
            
            <!-- Statistiques des devis -->
            <div class="devis-stats">
                <div class="stats-grid">
                    <div class="stat-item">
                        <div class="stat-number"><?php echo $stats['total']; ?></div>
                        <div class="stat-label">Total</div>
                    </div>
                    
                    <div class="stat-item">
                        <div class="stat-number"><?php echo $stats['en_cours']; ?></div>
                        <div class="stat-label">En cours</div>
                    </div>
                    
                    <div class="stat-item">
                        <div class="stat-number"><?php echo $stats['valides']; ?></div>
                        <div class="stat-label">Validés</div>
                    </div>
                    
                    <div class="stat-item">
                        <div class="stat-number"><?php echo $stats['en_attente']; ?></div>
                        <div class="stat-label">En attente</div>
                    </div>
                </div>
            </div>
            
            <!-- Filtres et recherche -->
            <div class="devis-filters">
                <form class="filters-form" method="GET" action="">
                    <div class="filters-row">
                        <div class="filter-group">
                            <label for="statut">Statut</label>
                            <select id="statut" name="statut">
                                <option value="">Tous les statuts</option>
                                <option value="Brouillon" <?php echo $filtre_statut === 'Brouillon' ? 'selected' : ''; ?>>Brouillon</option>
                                <option value="En attente" <?php echo $filtre_statut === 'En attente' ? 'selected' : ''; ?>>En attente</option>
                                <option value="En cours" <?php echo $filtre_statut === 'En cours' ? 'selected' : ''; ?>>En cours</option>
                                <option value="Validé" <?php echo $filtre_statut === 'Validé' ? 'selected' : ''; ?>>Validé</option>
                                <option value="Refusé" <?php echo $filtre_statut === 'Refusé' ? 'selected' : ''; ?>>Refusé</option>
                            </select>
                        </div>
                        
                        <div class="filter-group">
                            <label for="priorite">Priorité</label>
                            <select id="priorite" name="priorite">
                                <option value="">Toutes les priorités</option>
                                <option value="Basse" <?php echo $filtre_priorite === 'Basse' ? 'selected' : ''; ?>>Basse</option>
                                <option value="Moyenne" <?php echo $filtre_priorite === 'Moyenne' ? 'selected' : ''; ?>>Moyenne</option>
                                <option value="Haute" <?php echo $filtre_priorite === 'Haute' ? 'selected' : ''; ?>>Haute</option>
                                <option value="Urgente" <?php echo $filtre_priorite === 'Urgente' ? 'selected' : ''; ?>>Urgente</option>
                            </select>
                        </div>
                        
                        <div class="filter-group search-group">
                            <label for="recherche">Rechercher</label>
                            <div class="search-input">
                                <i class="fas fa-search"></i>
                                <input type="text" id="recherche" name="recherche" value="<?php echo htmlspecialchars($recherche); ?>" placeholder="Service, description...">
                            </div>
                        </div>
                        
                        <div class="filter-actions">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-filter"></i>
                                <span>Filtrer</span>
                            </button>
                            <a href="/user/devis.php" class="btn btn-outline">
                                <i class="fas fa-times"></i>
                                <span>Effacer</span>
                            </a>
                        </div>
                    </div>
                </form>
                
                <div class="filters-results">
                    <p><?php echo count($devis_filtres); ?> devis trouvé<?php echo count($devis_filtres) > 1 ? 's' : ''; ?></p>
                </div>
            </div>
            
            <!-- Liste des devis -->
            <div class="devis-list">
                <?php if (empty($devis_filtres)): ?>
                <div class="no-results">
                    <div class="no-results-icon">
                        <i class="fas fa-search"></i>
                    </div>
                    <h3>Aucun devis trouvé</h3>
                    <p>Aucun devis ne correspond à vos critères de recherche.</p>
                    <a href="/devis.php" class="btn btn-primary">
                        <i class="fas fa-plus"></i>
                        <span>Demander un devis</span>
                    </a>
                </div>
                <?php else: ?>
                
                <?php foreach ($devis_filtres as $devis_item): ?>
                <div class="devis-card" data-statut="<?php echo $devis_item['statut']; ?>" data-priorite="<?php echo $devis_item['priorite']; ?>">
                    <div class="devis-header">
                        <div class="devis-title">
                            <h3><?php echo htmlspecialchars($devis_item['service']); ?></h3>
                            <div class="devis-badges">
                                <span class="badge statut statut-<?php echo strtolower(str_replace(' ', '-', $devis_item['statut'])); ?>">
                                    <?php echo htmlspecialchars($devis_item['statut']); ?>
                                </span>
                                <span class="badge priorite priorite-<?php echo strtolower($devis_item['priorite']); ?>">
                                    <?php echo htmlspecialchars($devis_item['priorite']); ?>
                                </span>
                            </div>
                        </div>
                        
                        <div class="devis-montant">
                            <span class="montant"><?php echo htmlspecialchars($devis_item['montant']); ?></span>
                        </div>
                    </div>
                    
                    <div class="devis-content">
                        <div class="devis-description">
                            <p><?php echo htmlspecialchars($devis_item['description']); ?></p>
                        </div>
                        
                        <div class="devis-meta">
                            <div class="meta-item">
                                <i class="fas fa-calendar"></i>
                                <span>Demandé le <?php echo date('d/m/Y', strtotime($devis_item['date_demande'])); ?></span>
                            </div>
                            
                            <div class="meta-item">
                                <i class="fas fa-clock"></i>
                                <span>Modifié le <?php echo date('d/m/Y', strtotime($devis_item['date_modification'])); ?></span>
                            </div>
                            
                            <div class="meta-item">
                                <i class="fas fa-comments"></i>
                                <span><?php echo count($devis_item['commentaires']); ?> commentaire<?php echo count($devis_item['commentaires']) > 1 ? 's' : ''; ?></span>
                            </div>
                        </div>
                        
                        <div class="devis-progression">
                            <div class="progression-info">
                                <span>Progression : <?php echo $devis_item['progression']; ?>%</span>
                            </div>
                            <div class="progression-bar">
                                <div class="progression-fill" style="width: <?php echo $devis_item['progression']; ?>%"></div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="devis-footer">
                        <div class="devis-actions">
                            <button class="btn btn-outline btn-sm" onclick="toggleComments(<?php echo $devis_item['id']; ?>)">
                                <i class="fas fa-comments"></i>
                                <span>Commentaires</span>
                            </button>
                            
                            <a href="/user/devis.php?id=<?php echo $devis_item['id']; ?>" class="btn btn-primary btn-sm">
                                <i class="fas fa-eye"></i>
                                <span>Voir détails</span>
                            </a>
                            
                            <?php if ($devis_item['statut'] === 'Brouillon'): ?>
                            <button class="btn btn-warning btn-sm" onclick="editDevis(<?php echo $devis_item['id']; ?>)">
                                <i class="fas fa-edit"></i>
                                <span>Modifier</span>
                            </button>
                            <?php endif; ?>
                            
                            <?php if ($devis_item['statut'] === 'Validé'): ?>
                            <button class="btn btn-success btn-sm" onclick="downloadDevis(<?php echo $devis_item['id']; ?>)">
                                <i class="fas fa-download"></i>
                                <span>Télécharger</span>
                            </button>
                            <?php endif; ?>
                        </div>
                    </div>
                    
                    <!-- Section des commentaires (masquée par défaut) -->
                    <div class="devis-comments" id="comments-<?php echo $devis_item['id']; ?>" style="display: none;">
                        <div class="comments-header">
                            <h4>Commentaires et suivi</h4>
                        </div>
                        
                        <div class="comments-list">
                            <?php if (empty($devis_item['commentaires'])): ?>
                            <p class="no-comments">Aucun commentaire pour le moment.</p>
                            <?php else: ?>
                            
                            <?php foreach ($devis_item['commentaires'] as $commentaire): ?>
                            <div class="comment-item">
                                <div class="comment-header">
                                    <span class="comment-author"><?php echo htmlspecialchars($commentaire['auteur']); ?></span>
                                    <span class="comment-date"><?php echo date('d/m/Y H:i', strtotime($commentaire['date'])); ?></span>
                                </div>
                                
                                <div class="comment-content">
                                    <p><?php echo htmlspecialchars($commentaire['message']); ?></p>
                                </div>
                            </div>
                            <?php endfor; ?>
                            
                            <?php endif; ?>
                        </div>
                        
                        <div class="comment-form">
                            <form class="add-comment-form" method="POST" action="">
                                <div class="form-group">
                                    <textarea name="comment" placeholder="Ajouter un commentaire..." rows="3" required></textarea>
                                </div>
                                
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-primary btn-sm">
                                        <i class="fas fa-paper-plane"></i>
                                        <span>Envoyer</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <?php endfor; ?>
                
                <?php endif; ?>
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
    
    const animatedElements = document.querySelectorAll('.devis-card, .stat-item');
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
    const statsSection = document.querySelector('.devis-stats');
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
    const filterSelects = document.querySelectorAll('select[name="statut"], select[name="priorite"]');
    
    filterSelects.forEach(select => {
        select.addEventListener('change', function() {
            searchForm.submit();
        });
    });
    
    // Animation des barres de progression
    const animateProgressBars = () => {
        const progressBars = document.querySelectorAll('.progression-fill');
        progressBars.forEach(bar => {
            const width = bar.style.width;
            bar.style.width = '0%';
            
            setTimeout(() => {
                bar.style.transition = 'width 1s ease-in-out';
                bar.style.width = width;
            }, 500);
        });
    };
    
    // Déclencher l'animation des barres de progression
    const devisList = document.querySelector('.devis-list');
    if (devisList) {
        const devisObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateProgressBars();
                    devisObserver.unobserve(entry.target);
                }
            });
        });
        devisObserver.observe(devisList);
    }
});

// Fonction pour afficher/masquer les commentaires
function toggleComments(devisId) {
    const commentsSection = document.getElementById(`comments-${devisId}`);
    const isVisible = commentsSection.style.display !== 'none';
    
    if (isVisible) {
        commentsSection.style.display = 'none';
    } else {
        commentsSection.style.display = 'block';
        commentsSection.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
    }
}

// Fonction pour modifier un devis
function editDevis(devisId) {
    // Redirection vers le formulaire de devis avec pré-remplissage
    window.location.href = `/devis.php?edit=${devisId}`;
}

// Fonction pour télécharger un devis
function downloadDevis(devisId) {
    // Simulation de téléchargement
    const link = document.createElement('a');
    link.href = '#';
    link.download = `devis-${devisId}.pdf`;
    link.click();
    
    // Afficher une notification
    showNotification('Téléchargement en cours...', 'success');
}

// Fonction pour afficher des notifications
function showNotification(message, type = 'info') {
    const notification = document.createElement('div');
    notification.className = `notification notification-${type}`;
    notification.innerHTML = `
        <i class="fas fa-${type === 'success' ? 'check-circle' : 'info-circle'}"></i>
        <span>${message}</span>
    `;
    
    document.body.appendChild(notification);
    
    // Supprimer la notification après 3 secondes
    setTimeout(() => {
        notification.remove();
    }, 3000);
}

// Gestion des formulaires de commentaires
document.addEventListener('submit', function(e) {
    if (e.target.classList.contains('add-comment-form')) {
        e.preventDefault();
        
        const form = e.target;
        const textarea = form.querySelector('textarea[name="comment"]');
        const comment = textarea.value.trim();
        
        if (comment) {
            // Simulation d'ajout de commentaire
            const commentItem = document.createElement('div');
            commentItem.className = 'comment-item new-comment';
            commentItem.innerHTML = `
                <div class="comment-header">
                    <span class="comment-author">Vous</span>
                    <span class="comment-date">À l'instant</span>
                </div>
                
                <div class="comment-content">
                    <p>${comment}</p>
                </div>
            `;
            
            const commentsList = form.closest('.devis-comments').querySelector('.comments-list');
            commentsList.appendChild(commentItem);
            
            // Réinitialiser le formulaire
            form.reset();
            
            // Afficher une notification
            showNotification('Commentaire ajouté avec succès !', 'success');
        }
    }
});
</script>

<?php
// Inclusion du pied de page
include '../includes/footer.php';
?>