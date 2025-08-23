<?php
/**
 * Gestion des services - Interface administrateur
 * Site professionnel de Maickel Okereke
 */

// Configuration de la page
$page_title = 'Gestion des services - Administration - Maickel Okereke';
$page_description = 'Gérez les services proposés par votre entreprise depuis l\'interface administrateur.';
$page_keywords = 'admin, services, gestion, administration, Maickel Okereke';

// Inclusion des fichiers nécessaires
require_once '../includes/functions.php';

// Vérification de la connexion et des droits admin (simulation)
session_start();
$is_logged_in = isset($_SESSION['user_id']) && !empty($_SESSION['user_id']);
$is_admin = isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin';

if (!$is_logged_in || !$is_admin) {
    // Redirection vers la page de connexion
    header('Location: /login.php?redirect=' . urlencode($_SERVER['REQUEST_URI']));
    exit;
}

// Données simulées des services
$services = [
    [
        'id' => 1,
        'titre' => 'Comptabilité générale',
        'description' => 'Tenue complète de la comptabilité de votre entreprise',
        'description_courte' => 'Gestion complète de votre comptabilité',
        'prix_indicatif' => '150€/mois',
        'categorie' => 'Comptabilité',
        'statut' => 'actif',
        'ordre' => 1,
        'image' => '/assets/images/services/comptabilite-generale.jpg',
        'icone' => 'fas fa-calculator',
        'couleur' => 'primary',
        'date_creation' => '2024-01-15',
        'date_modification' => '2024-08-20',
        'total_devis' => 45,
        'total_clients' => 23
    ],
    [
        'id' => 2,
        'titre' => 'Développement web',
        'description' => 'Création de sites web professionnels et applications web sur mesure',
        'description_courte' => 'Sites web et applications sur mesure',
        'prix_indicatif' => 'À partir de 2000€',
        'categorie' => 'Développement',
        'statut' => 'actif',
        'ordre' => 2,
        'image' => '/assets/images/services/developpement-web.jpg',
        'icone' => 'fas fa-code',
        'couleur' => 'success',
        'date_creation' => '2024-01-20',
        'date_modification' => '2024-08-18',
        'total_devis' => 67,
        'total_clients' => 34
    ],
    [
        'id' => 3,
        'titre' => 'Conseil fiscal',
        'description' => 'Optimisation fiscale et conseils pour réduire votre imposition',
        'description_courte' => 'Optimisation fiscale et conseils',
        'prix_indicatif' => '100€/heure',
        'categorie' => 'Conseil',
        'statut' => 'actif',
        'ordre' => 3,
        'image' => '/assets/images/services/conseil-fiscal.jpg',
        'icone' => 'fas fa-chart-line',
        'couleur' => 'warning',
        'date_creation' => '2024-02-10',
        'date_modification' => '2024-08-15',
        'total_devis' => 28,
        'total_clients' => 15
    ],
    [
        'id' => 4,
        'titre' => 'Formation comptable',
        'description' => 'Formation de vos équipes aux outils comptables et à la réglementation',
        'description_courte' => 'Formation de vos équipes',
        'prix_indicatif' => '500€/jour',
        'categorie' => 'Formation',
        'statut' => 'actif',
        'ordre' => 4,
        'image' => '/assets/images/services/formation-comptable.jpg',
        'icone' => 'fas fa-graduation-cap',
        'couleur' => 'info',
        'date_creation' => '2024-03-05',
        'date_modification' => '2024-08-10',
        'total_devis' => 19,
        'total_clients' => 12
    ],
    [
        'id' => 5,
        'titre' => 'Audit comptable',
        'description' => 'Vérification et certification de vos comptes annuels',
        'description_courte' => 'Vérification de vos comptes',
        'prix_indicatif' => 'À partir de 1500€',
        'categorie' => 'Audit',
        'statut' => 'inactif',
        'ordre' => 5,
        'image' => '/assets/images/services/audit-comptable.jpg',
        'icone' => 'fas fa-search',
        'couleur' => 'secondary',
        'date_creation' => '2024-04-12',
        'date_modification' => '2024-07-25',
        'total_devis' => 8,
        'total_clients' => 5
    ]
];

// Filtres et recherche
$search = $_GET['search'] ?? '';
$category_filter = $_GET['category'] ?? '';
$status_filter = $_GET['status'] ?? '';
$sort_by = $_GET['sort'] ?? 'ordre';
$sort_order = $_GET['order'] ?? 'asc';

// Filtrage des services
$filtered_services = $services;
if (!empty($search)) {
    $filtered_services = array_filter($filtered_services, function($service) use ($search) {
        return stripos($service['titre'] . ' ' . $service['description'] . ' ' . $service['categorie'], $search) !== false;
    });
}

if (!empty($category_filter)) {
    $filtered_services = array_filter($filtered_services, function($service) use ($category_filter) {
        return $service['categorie'] === $category_filter;
    });
}

if (!empty($status_filter)) {
    $filtered_services = array_filter($filtered_services, function($service) use ($status_filter) {
        return $service['statut'] === $status_filter;
    });
}

// Tri des services
usort($filtered_services, function($a, $b) use ($sort_by, $sort_order) {
    $result = 0;
    switch ($sort_by) {
        case 'titre':
            $result = strcmp($a['titre'], $b['titre']);
            break;
        case 'categorie':
            $result = strcmp($a['categorie'], $b['categorie']);
            break;
        case 'ordre':
            $result = $a['ordre'] - $b['ordre'];
            break;
        case 'date_creation':
            $result = strcmp($a['date_creation'], $b['date_creation']);
            break;
        case 'total_devis':
            $result = $a['total_devis'] - $b['total_devis'];
            break;
        default:
            $result = 0;
    }
    return $sort_order === 'desc' ? -$result : $result;
});

// Statistiques
$total_services = count($services);
$active_services = count(array_filter($services, function($service) { return $service['statut'] === 'actif'; }));
$total_devis = array_sum(array_column($services, 'total_devis'));
$total_clients = array_sum(array_column($services, 'total_clients'));

// Catégories uniques
$categories = array_unique(array_column($services, 'categorie'));

// Inclusion de l'en-tête
include '../includes/header.php';
?>

<!-- Styles spécifiques à l'admin -->
<style>
.admin-header {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    padding: 2rem 0;
    margin-bottom: 2rem;
}

.admin-header h1 {
    margin: 0;
    font-size: 2.5rem;
    font-weight: 700;
}

.admin-header p {
    margin: 0.5rem 0 0 0;
    opacity: 0.9;
    font-size: 1.1rem;
}

.stats-overview {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 1.5rem;
    margin-bottom: 2rem;
}

.stat-card {
    background: white;
    border-radius: 15px;
    padding: 1.5rem;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
    text-align: center;
    transition: all 0.3s ease;
}

.stat-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
}

.stat-number {
    font-size: 2.5rem;
    font-weight: 700;
    color: #333;
    margin-bottom: 0.5rem;
}

.stat-label {
    color: #666;
    font-size: 0.9rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.controls-section {
    background: white;
    border-radius: 15px;
    padding: 1.5rem;
    margin-bottom: 2rem;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
}

.controls-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 1.5rem;
    flex-wrap: wrap;
    gap: 1rem;
}

.controls-title {
    font-size: 1.3rem;
    font-weight: 600;
    color: #333;
    margin: 0;
}

.controls-actions {
    display: flex;
    gap: 1rem;
    flex-wrap: wrap;
}

.search-box {
    position: relative;
    min-width: 300px;
}

.search-box input {
    width: 100%;
    padding: 0.75rem 1rem 0.75rem 2.5rem;
    border: 2px solid #e9ecef;
    border-radius: 25px;
    font-size: 0.9rem;
    transition: all 0.3s ease;
}

.search-box input:focus {
    outline: none;
    border-color: #667eea;
    box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
}

.search-box i {
    position: absolute;
    left: 1rem;
    top: 50%;
    transform: translateY(-50%);
    color: #999;
}

.filters-row {
    display: flex;
    gap: 1rem;
    flex-wrap: wrap;
    align-items: center;
}

.filter-group {
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.filter-group label {
    font-weight: 500;
    color: #333;
    font-size: 0.9rem;
}

.filter-group select {
    padding: 0.5rem 1rem;
    border: 2px solid #e9ecef;
    border-radius: 8px;
    font-size: 0.9rem;
    background: white;
    transition: all 0.3s ease;
}

.filter-group select:focus {
    outline: none;
    border-color: #667eea;
}

.btn-add-service {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    border: none;
    padding: 0.75rem 1.5rem;
    border-radius: 25px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
}

.btn-add-service:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
    text-decoration: none;
    color: white;
}

.services-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: 1.5rem;
    margin-bottom: 2rem;
}

.service-card {
    background: white;
    border-radius: 15px;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
    overflow: hidden;
    transition: all 0.3s ease;
    position: relative;
}

.service-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
}

.service-header {
    position: relative;
    height: 200px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
}

.service-header.inactive {
    background: linear-gradient(135deg, #6c757d 0%, #495057 100%);
}

.service-icon {
    font-size: 3rem;
    margin-bottom: 1rem;
}

.service-title {
    font-size: 1.5rem;
    font-weight: 700;
    text-align: center;
    margin: 0;
}

.service-category {
    position: absolute;
    top: 1rem;
    right: 1rem;
    background: rgba(255, 255, 255, 0.2);
    color: white;
    padding: 0.25rem 0.75rem;
    border-radius: 15px;
    font-size: 0.8rem;
    font-weight: 600;
    backdrop-filter: blur(10px);
}

.service-status {
    position: absolute;
    top: 1rem;
    left: 1rem;
    width: 12px;
    height: 12px;
    border-radius: 50%;
    border: 2px solid white;
}

.service-status.actif {
    background: #28a745;
}

.service-status.inactif {
    background: #dc3545;
}

.service-content {
    padding: 1.5rem;
}

.service-description {
    color: #666;
    margin-bottom: 1rem;
    line-height: 1.6;
}

.service-meta {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1rem;
    margin-bottom: 1.5rem;
}

.meta-item {
    text-align: center;
    padding: 0.75rem;
    background: #f8f9fa;
    border-radius: 8px;
}

.meta-label {
    font-size: 0.8rem;
    color: #666;
    text-transform: uppercase;
    margin-bottom: 0.25rem;
}

.meta-value {
    font-weight: 600;
    color: #333;
}

.service-price {
    background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
    color: white;
    padding: 0.75rem 1rem;
    border-radius: 8px;
    text-align: center;
    font-weight: 600;
    margin-bottom: 1rem;
}

.service-actions {
    display: flex;
    gap: 0.5rem;
    flex-wrap: wrap;
}

.btn-action {
    padding: 0.5rem 1rem;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    transition: all 0.3s ease;
    font-size: 0.8rem;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 0.25rem;
    flex: 1;
    justify-content: center;
}

.btn-edit {
    background: #17a2b8;
    color: white;
}

.btn-edit:hover {
    background: #138496;
    transform: translateY(-2px);
}

.btn-delete {
    background: #dc3545;
    color: white;
}

.btn-delete:hover {
    background: #c82333;
    transform: translateY(-2px);
}

.btn-view {
    background: #6c757d;
    color: white;
}

.btn-view:hover {
    background: #5a6268;
    transform: translateY(-2px);
}

.btn-toggle {
    background: #ffc107;
    color: #212529;
}

.btn-toggle:hover {
    background: #e0a800;
    transform: translateY(-2px);
}

.empty-state {
    text-align: center;
    padding: 3rem 1rem;
    color: #666;
}

.empty-state i {
    font-size: 4rem;
    color: #ddd;
    margin-bottom: 1rem;
}

.empty-state h3 {
    color: #333;
    margin-bottom: 0.5rem;
}

.service-order {
    position: absolute;
    top: 1rem;
    left: 1rem;
    background: rgba(0, 0, 0, 0.3);
    color: white;
    width: 30px;
    height: 30px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 600;
    font-size: 0.9rem;
}

@media (max-width: 768px) {
    .controls-header {
        flex-direction: column;
        align-items: stretch;
    }
    
    .search-box {
        min-width: auto;
    }
    
    .filters-row {
        flex-direction: column;
        align-items: stretch;
    }
    
    .filter-group {
        justify-content: space-between;
    }
    
    .services-grid {
        grid-template-columns: 1fr;
    }
    
    .service-meta {
        grid-template-columns: 1fr;
    }
    
    .admin-header h1 {
        font-size: 2rem;
    }
}
</style>

<!-- En-tête admin -->
<div class="admin-header">
    <div class="container">
        <h1>Gestion des services</h1>
        <p>Gérez les services proposés par votre entreprise et leur visibilité sur le site.</p>
    </div>
</div>

<!-- Contenu principal -->
<div class="container">
    <!-- Statistiques -->
    <div class="stats-overview">
        <div class="stat-card">
            <div class="stat-number"><?php echo $total_services; ?></div>
            <div class="stat-label">Total services</div>
        </div>
        
        <div class="stat-card">
            <div class="stat-number"><?php echo $active_services; ?></div>
            <div class="stat-label">Services actifs</div>
        </div>
        
        <div class="stat-card">
            <div class="stat-number"><?php echo $total_devis; ?></div>
            <div class="stat-label">Total devis</div>
        </div>
        
        <div class="stat-card">
            <div class="stat-number"><?php echo $total_clients; ?></div>
            <div class="stat-label">Total clients</div>
        </div>
    </div>
    
    <!-- Contrôles et filtres -->
    <div class="controls-section">
        <div class="controls-header">
            <h2 class="controls-title">Contrôles</h2>
            
            <div class="controls-actions">
                <a href="#" class="btn-add-service" onclick="showAddServiceModal()">
                    <i class="fas fa-plus"></i>
                    <span>Ajouter un service</span>
                </a>
            </div>
        </div>
        
        <div class="search-box">
            <i class="fas fa-search"></i>
            <input type="text" id="search-input" placeholder="Rechercher un service..." value="<?php echo htmlspecialchars($search); ?>">
        </div>
        
        <div class="filters-row">
            <div class="filter-group">
                <label for="category-filter">Catégorie :</label>
                <select id="category-filter" onchange="applyFilters()">
                    <option value="">Toutes les catégories</option>
                    <?php foreach ($categories as $category): ?>
                    <option value="<?php echo htmlspecialchars($category); ?>" <?php echo $category_filter === $category ? 'selected' : ''; ?>>
                        <?php echo htmlspecialchars($category); ?>
                    </option>
                    <?php endforeach; ?>
                </select>
            </div>
            
            <div class="filter-group">
                <label for="status-filter">Statut :</label>
                <select id="status-filter" onchange="applyFilters()">
                    <option value="">Tous les statuts</option>
                    <option value="actif" <?php echo $status_filter === 'actif' ? 'selected' : ''; ?>>Actif</option>
                    <option value="inactif" <?php echo $status_filter === 'inactif' ? 'selected' : ''; ?>>Inactif</option>
                </select>
            </div>
            
            <div class="filter-group">
                <label for="sort-select">Trier par :</label>
                <select id="sort-select" onchange="applyFilters()">
                    <option value="ordre" <?php echo $sort_by === 'ordre' ? 'selected' : ''; ?>>Ordre d'affichage</option>
                    <option value="titre" <?php echo $sort_by === 'titre' ? 'selected' : ''; ?>>Titre</option>
                    <option value="categorie" <?php echo $sort_by === 'categorie' ? 'selected' : ''; ?>>Catégorie</option>
                    <option value="date_creation" <?php echo $sort_by === 'date_creation' ? 'selected' : ''; ?>>Date de création</option>
                    <option value="total_devis" <?php echo $sort_by === 'total_devis' ? 'selected' : ''; ?>>Nombre de devis</option>
                </select>
            </div>
            
            <div class="filter-group">
                <label for="order-select">Ordre :</label>
                <select id="order-select" onchange="applyFilters()">
                    <option value="asc" <?php echo $sort_order === 'asc' ? 'selected' : ''; ?>>Croissant</option>
                    <option value="desc" <?php echo $sort_order === 'desc' ? 'selected' : ''; ?>>Décroissant</option>
                </select>
            </div>
        </div>
    </div>
    
    <!-- Grille des services -->
    <div class="services-grid">
        <?php if (empty($filtered_services)): ?>
        <div class="empty-state">
            <i class="fas fa-cogs"></i>
            <h3>Aucun service trouvé</h3>
            <p>Aucun service ne correspond à vos critères de recherche.</p>
        </div>
        <?php else: ?>
        <?php foreach ($filtered_services as $service): ?>
        <div class="service-card">
            <div class="service-header <?php echo $service['statut'] === 'inactif' ? 'inactive' : ''; ?>">
                <div class="service-order"><?php echo $service['ordre']; ?></div>
                <div class="service-status <?php echo $service['statut']; ?>"></div>
                <div class="service-category"><?php echo htmlspecialchars($service['categorie']); ?></div>
                
                <div class="service-header-content">
                    <div class="service-icon">
                        <i class="<?php echo $service['icone']; ?>"></i>
                    </div>
                    <h3 class="service-title"><?php echo htmlspecialchars($service['titre']); ?></h3>
                </div>
            </div>
            
            <div class="service-content">
                <p class="service-description"><?php echo htmlspecialchars($service['description_courte']); ?></p>
                
                <div class="service-meta">
                    <div class="meta-item">
                        <div class="meta-label">Devis</div>
                        <div class="meta-value"><?php echo $service['total_devis']; ?></div>
                    </div>
                    
                    <div class="meta-item">
                        <div class="meta-label">Clients</div>
                        <div class="meta-value"><?php echo $service['total_clients']; ?></div>
                    </div>
                </div>
                
                <div class="service-price">
                    <?php echo htmlspecialchars($service['prix_indicatif']); ?>
                </div>
                
                <div class="service-actions">
                    <a href="#" class="btn-action btn-view" onclick="viewService(<?php echo $service['id']; ?>)">
                        <i class="fas fa-eye"></i>
                        <span>Voir</span>
                    </a>
                    
                    <a href="#" class="btn-action btn-edit" onclick="editService(<?php echo $service['id']; ?>)">
                        <i class="fas fa-edit"></i>
                        <span>Modifier</span>
                    </a>
                    
                    <a href="#" class="btn-action btn-toggle" onclick="toggleService(<?php echo $service['id']; ?>, '<?php echo $service['statut']; ?>')">
                        <i class="fas fa-<?php echo $service['statut'] === 'actif' ? 'pause' : 'play'; ?>"></i>
                        <span><?php echo $service['statut'] === 'actif' ? 'Désactiver' : 'Activer'; ?></span>
                    </a>
                    
                    <a href="#" class="btn-action btn-delete" onclick="deleteService(<?php echo $service['id']; ?>)">
                        <i class="fas fa-trash"></i>
                        <span>Supprimer</span>
                    </a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>
</div>

<!-- JavaScript spécifique à la page -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Recherche en temps réel
    const searchInput = document.getElementById('search-input');
    let searchTimeout;
    
    searchInput.addEventListener('input', function() {
        clearTimeout(searchTimeout);
        searchTimeout = setTimeout(() => {
            applyFilters();
        }, 300);
    });
    
    // Animation des cartes de statistiques
    const statCards = document.querySelectorAll('.stat-card');
    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry, index) => {
            if (entry.isIntersecting) {
                setTimeout(() => {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }, index * 100);
            }
        });
    });
    
    statCards.forEach(card => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(30px)';
        card.style.transition = 'all 0.6s ease';
        observer.observe(card);
    });
    
    // Animation des cartes de services
    const serviceCards = document.querySelectorAll('.service-card');
    serviceCards.forEach((card, index) => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(30px)';
        card.style.transition = 'all 0.6s ease';
        
        setTimeout(() => {
            card.style.opacity = '1';
            card.style.transform = 'translateY(0)';
        }, index * 100);
    });
});

// Fonction pour appliquer les filtres
function applyFilters() {
    const search = document.getElementById('search-input').value;
    const category = document.getElementById('category-filter').value;
    const status = document.getElementById('status-filter').value;
    const sort = document.getElementById('sort-select').value;
    const order = document.getElementById('order-select').value;
    
    const params = new URLSearchParams();
    if (search) params.append('search', search);
    if (category) params.append('category', category);
    if (status) params.append('status', status);
    if (sort) params.append('sort', sort);
    if (order) params.append('order', order);
    
    const url = window.location.pathname + (params.toString() ? '?' + params.toString() : '');
    window.location.href = url;
}

// Fonction pour afficher le modal d'ajout de service
function showAddServiceModal() {
    // Simulation d'un modal
    if (confirm('Voulez-vous créer un nouveau service ?')) {
        alert('Fonctionnalité d\'ajout de service à implémenter');
    }
}

// Fonction pour voir un service
function viewService(serviceId) {
    if (confirm(`Voulez-vous voir les détails du service ${serviceId} ?`)) {
        alert(`Fonctionnalité de visualisation du service ${serviceId} à implémenter`);
    }
}

// Fonction pour modifier un service
function editService(serviceId) {
    if (confirm(`Voulez-vous modifier le service ${serviceId} ?`)) {
        alert(`Fonctionnalité de modification du service ${serviceId} à implémenter`);
    }
}

// Fonction pour basculer le statut d'un service
function toggleService(serviceId, currentStatus) {
    const newStatus = currentStatus === 'actif' ? 'inactif' : 'actif';
    const action = currentStatus === 'actif' ? 'désactiver' : 'activer';
    
    if (confirm(`Voulez-vous ${action} le service ${serviceId} ?`)) {
        alert(`Service ${serviceId} ${action === 'activer' ? 'activé' : 'désactivé'} avec succès (simulation)`);
        // Ici, on pourrait recharger la page ou mettre à jour l'interface
        location.reload();
    }
}

// Fonction pour supprimer un service
function deleteService(serviceId) {
    if (confirm(`Êtes-vous sûr de vouloir supprimer le service ${serviceId} ? Cette action est irréversible.`)) {
        if (confirm('Confirmez-vous la suppression ?')) {
            alert(`Service ${serviceId} supprimé avec succès (simulation)`);
            // Ici, on pourrait recharger la page ou supprimer la carte
            location.reload();
        }
    }
}

// Fonction pour réorganiser les services
function reorderServices() {
    if (confirm('Voulez-vous réorganiser l\'ordre d\'affichage des services ?')) {
        alert('Fonctionnalité de réorganisation à implémenter');
    }
}

// Fonction pour exporter la liste des services
function exportServices() {
    const services = <?php echo json_encode($filtered_services); ?>;
    const csvContent = [
        ['ID', 'Titre', 'Description', 'Catégorie', 'Prix', 'Statut', 'Ordre', 'Total devis', 'Total clients'],
        ...services.map(service => [
            service.id,
            service.titre,
            service.description_courte,
            service.categorie,
            service.prix_indicatif,
            service.statut,
            service.ordre,
            service.total_devis,
            service.total_clients
        ])
    ].map(row => row.map(cell => `"${cell}"`).join(',')).join('\n');
    
    const blob = new Blob([csvContent], { type: 'text/csv;charset=utf-8;' });
    const link = document.createElement('a');
    link.href = URL.createObjectURL(blob);
    link.download = 'services.csv';
    link.click();
}

// Fonction pour rafraîchir les données
function refreshServices() {
    location.reload();
}

// Gestion des raccourcis clavier
document.addEventListener('keydown', function(e) {
    if (e.ctrlKey || e.metaKey) {
        switch(e.key) {
            case 'n':
                e.preventDefault();
                showAddServiceModal();
                break;
            case 'f':
                e.preventDefault();
                document.getElementById('search-input').focus();
                break;
            case 'r':
                e.preventDefault();
                refreshServices();
                break;
            case 'e':
                e.preventDefault();
                exportServices();
                break;
            case 'o':
                e.preventDefault();
                reorderServices();
                break;
        }
    }
});

// Notification des raccourcis clavier
setTimeout(() => {
    if (confirm('Voulez-vous voir les raccourcis clavier disponibles ?')) {
        alert('Raccourcis clavier :\nCtrl+N : Nouveau service\nCtrl+F : Rechercher\nCtrl+R : Rafraîchir\nCtrl+E : Exporter\nCtrl+O : Réorganiser');
    }
}, 3000);
</script>

<?php
// Inclusion du pied de page
include '../includes/footer.php';
?>