<?php
/**
 * Gestion des témoignages - Interface administrateur
 * Site professionnel de Maickel Okereke
 */

// Configuration de la page
$page_title = 'Gestion des témoignages - Administration - Maickel Okereke';
$page_description = 'Gérez les témoignages clients depuis l\'interface administrateur.';
$page_keywords = 'admin, témoignages, gestion, administration, Maickel Okereke';

// Inclusion des fichiers nécessaires
require_once '../includes/functions.php';

// Vérification de la connexion et des droits admin (simulation)
session_start();
$is_logged_in = isset($_SESSION['user_id']) && !empty($_SESSION['user_id']);
$is_admin = isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin';

if (!$is_logged_in || !$is_admin) {
    header('Location: /login.php?redirect=' . urlencode($_SERVER['REQUEST_URI']));
    exit;
}

// Données simulées des témoignages
$temoignages = [
    [
        'id' => 1,
        'auteur' => 'Marie Martin',
        'role' => 'Gérante',
        'societe' => 'Cabinet Martin & Associés',
        'citation' => 'Une transformation remarquable qui a révolutionné notre façon de travailler.',
        'note' => 5,
        'service' => 'Développement web',
        'statut' => 'approuvé',
        'date_creation' => '2024-01-15',
        'date_publication' => '2024-02-01',
        'photo' => '/assets/images/temoignages/marie-martin.jpg',
        'vues' => 1247,
        'likes' => 89
    ],
    [
        'id' => 2,
        'auteur' => 'Thomas Durand',
        'role' => 'Directeur Marketing',
        'societe' => 'Fashion Forward',
        'citation' => 'Un site magnifique qui a transformé notre business en ligne.',
        'note' => 5,
        'service' => 'E-commerce',
        'statut' => 'approuvé',
        'date_creation' => '2024-02-20',
        'date_publication' => '2024-03-15',
        'photo' => '/assets/images/temoignages/thomas-durand.jpg',
        'vues' => 2156,
        'likes' => 156
    ],
    [
        'id' => 3,
        'auteur' => 'Sophie Bernard',
        'role' => 'CEO',
        'societe' => 'TechStart Solutions',
        'citation' => 'Un conseil fiscal de qualité qui nous a fait économiser des milliers d\'euros.',
        'note' => 4,
        'service' => 'Conseil fiscal',
        'statut' => 'en_attente',
        'date_creation' => '2024-03-10',
        'date_publication' => null,
        'photo' => '/assets/images/temoignages/sophie-bernard.jpg',
        'vues' => 0,
        'likes' => 0
    ]
];

// Filtres et recherche
$search = $_GET['search'] ?? '';
$service_filter = $_GET['service'] ?? '';
$status_filter = $_GET['status'] ?? '';
$sort_by = $_GET['sort'] ?? 'date_creation';
$sort_order = $_GET['order'] ?? 'desc';

// Filtrage des témoignages
$filtered_temoignages = $temoignages;
if (!empty($search)) {
    $filtered_temoignages = array_filter($filtered_temoignages, function($temoignage) use ($search) {
        return stripos($temoignage['auteur'] . ' ' . $temoignage['societe'] . ' ' . $temoignage['citation'], $search) !== false;
    });
}

if (!empty($service_filter)) {
    $filtered_temoignages = array_filter($filtered_temoignages, function($temoignage) use ($service_filter) {
        return $temoignage['service'] === $service_filter;
    });
}

if (!empty($status_filter)) {
    $filtered_temoignages = array_filter($filtered_temoignages, function($temoignage) use ($status_filter) {
        return $temoignage['statut'] === $status_filter;
    });
}

// Tri des témoignages
usort($filtered_temoignages, function($a, $b) use ($sort_by, $sort_order) {
    $result = 0;
    switch ($sort_by) {
        case 'auteur': $result = strcmp($a['auteur'], $b['auteur']); break;
        case 'date_creation': $result = strcmp($a['date_creation'], $b['date_creation']); break;
        case 'note': $result = $a['note'] - $b['note']; break;
        case 'vues': $result = $a['vues'] - $b['vues']; break;
        default: $result = 0;
    }
    return $sort_order === 'desc' ? -$result : $result;
});

// Statistiques
$total_temoignages = count($temoignages);
$approved_temoignages = count(array_filter($temoignages, function($t) { return $t['statut'] === 'approuvé'; }));
$total_views = array_sum(array_column($temoignages, 'vues'));
$avg_rating = array_sum(array_column($temoignages, 'note')) / count($temoignages);

// Services uniques
$services = array_unique(array_column($temoignages, 'service'));

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

.btn-add-temoignage {
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

.btn-add-temoignage:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
    text-decoration: none;
    color: white;
}

.temoignages-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
    gap: 1.5rem;
    margin-bottom: 2rem;
}

.temoignage-card {
    background: white;
    border-radius: 15px;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
    overflow: hidden;
    transition: all 0.3s ease;
    position: relative;
}

.temoignage-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
}

.temoignage-header {
    position: relative;
    height: 150px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    padding: 1rem;
}

.temoignage-status {
    position: absolute;
    top: 1rem;
    left: 1rem;
    padding: 0.25rem 0.75rem;
    border-radius: 15px;
    font-size: 0.8rem;
    font-weight: 600;
    text-transform: uppercase;
    backdrop-filter: blur(10px);
}

.temoignage-status.approuvé {
    background: rgba(40, 167, 69, 0.2);
    color: #28a745;
}

.temoignage-status.en_attente {
    background: rgba(255, 193, 7, 0.2);
    color: #ffc107;
}

.temoignage-status.rejeté {
    background: rgba(220, 53, 69, 0.2);
    color: #dc3545;
}

.temoignage-service {
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

.temoignage-citation {
    font-size: 1.1rem;
    font-style: italic;
    text-align: center;
    line-height: 1.4;
    margin: 0;
}

.temoignage-content {
    padding: 1.5rem;
}

.temoignage-author {
    display: flex;
    align-items: center;
    gap: 1rem;
    margin-bottom: 1rem;
}

.temoignage-photo {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-weight: 600;
    font-size: 1.2rem;
}

.temoignage-info h4 {
    margin: 0 0 0.25rem 0;
    color: #333;
    font-size: 1.1rem;
}

.temoignage-info p {
    margin: 0;
    color: #666;
    font-size: 0.9rem;
}

.temoignage-rating {
    display: flex;
    gap: 0.25rem;
    margin-bottom: 1rem;
}

.star {
    color: #ffc107;
    font-size: 1.1rem;
}

.star.empty {
    color: #e9ecef;
}

.temoignage-meta {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
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

.temoignage-actions {
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

.btn-approve {
    background: #28a745;
    color: white;
}

.btn-approve:hover {
    background: #218838;
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
    
    .temoignages-grid {
        grid-template-columns: 1fr;
    }
    
    .temoignage-meta {
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
        <h1>Gestion des témoignages</h1>
        <p>Gérez les témoignages clients pour valoriser votre expertise et votre réputation.</p>
    </div>
</div>

<!-- Contenu principal -->
<div class="container">
    <!-- Statistiques -->
    <div class="stats-overview">
        <div class="stat-card">
            <div class="stat-number"><?php echo $total_temoignages; ?></div>
            <div class="stat-label">Total témoignages</div>
        </div>
        
        <div class="stat-card">
            <div class="stat-number"><?php echo $approved_temoignages; ?></div>
            <div class="stat-label">Approuvés</div>
        </div>
        
        <div class="stat-card">
            <div class="stat-number"><?php echo number_format($total_views); ?></div>
            <div class="stat-label">Total vues</div>
        </div>
        
        <div class="stat-card">
            <div class="stat-number"><?php echo number_format($avg_rating, 1); ?></div>
            <div class="stat-label">Note moyenne</div>
        </div>
    </div>
    
    <!-- Contrôles et filtres -->
    <div class="controls-section">
        <div class="controls-header">
            <h2 class="controls-title">Contrôles</h2>
            
            <div class="controls-actions">
                <a href="#" class="btn-add-temoignage" onclick="showAddTemoignageModal()">
                    <i class="fas fa-plus"></i>
                    <span>Ajouter un témoignage</span>
                </a>
            </div>
        </div>
        
        <div class="search-box">
            <i class="fas fa-search"></i>
            <input type="text" id="search-input" placeholder="Rechercher un témoignage..." value="<?php echo htmlspecialchars($search); ?>">
        </div>
        
        <div class="filters-row">
            <div class="filter-group">
                <label for="service-filter">Service :</label>
                <select id="service-filter" onchange="applyFilters()">
                    <option value="">Tous les services</option>
                    <?php foreach ($services as $service): ?>
                    <option value="<?php echo htmlspecialchars($service); ?>" <?php echo $service_filter === $service ? 'selected' : ''; ?>>
                        <?php echo htmlspecialchars($service); ?>
                    </option>
                    <?php endforeach; ?>
                </select>
            </div>
            
            <div class="filter-group">
                <label for="status-filter">Statut :</label>
                <select id="status-filter" onchange="applyFilters()">
                    <option value="">Tous les statuts</option>
                    <option value="approuvé" <?php echo $status_filter === 'approuvé' ? 'selected' : ''; ?>>Approuvé</option>
                    <option value="en_attente" <?php echo $status_filter === 'en_attente' ? 'selected' : ''; ?>>En attente</option>
                    <option value="rejeté" <?php echo $status_filter === 'rejeté' ? 'selected' : ''; ?>>Rejeté</option>
                </select>
            </div>
            
            <div class="filter-group">
                <label for="sort-select">Trier par :</label>
                <select id="sort-select" onchange="applyFilters()">
                    <option value="date_creation" <?php echo $sort_by === 'date_creation' ? 'selected' : ''; ?>>Date de création</option>
                    <option value="auteur" <?php echo $sort_by === 'auteur' ? 'selected' : ''; ?>>Auteur</option>
                    <option value="note" <?php echo $sort_by === 'note' ? 'selected' : ''; ?>>Note</option>
                    <option value="vues" <?php echo $sort_by === 'vues' ? 'selected' : ''; ?>>Nombre de vues</option>
                </select>
            </div>
            
            <div class="filter-group">
                <label for="order-select">Ordre :</label>
                <select id="order-select" onchange="applyFilters()">
                    <option value="desc" <?php echo $sort_order === 'desc' ? 'selected' : ''; ?>>Décroissant</option>
                    <option value="asc" <?php echo $sort_order === 'asc' ? 'selected' : ''; ?>>Croissant</option>
                </select>
            </div>
        </div>
    </div>
    
    <!-- Grille des témoignages -->
    <div class="temoignages-grid">
        <?php if (empty($filtered_temoignages)): ?>
        <div class="empty-state">
            <i class="fas fa-comments"></i>
            <h3>Aucun témoignage trouvé</h3>
            <p>Aucun témoignage ne correspond à vos critères de recherche.</p>
        </div>
        <?php else: ?>
        <?php foreach ($filtered_temoignages as $temoignage): ?>
        <div class="temoignage-card">
            <div class="temoignage-header">
                <div class="temoignage-status <?php echo $temoignage['statut']; ?>">
                    <?php echo ucfirst($temoignage['statut']); ?>
                </div>
                <div class="temoignage-service"><?php echo htmlspecialchars($temoignage['service']); ?></div>
                
                <p class="temoignage-citation">"<?php echo htmlspecialchars($temoignage['citation']); ?>"</p>
            </div>
            
            <div class="temoignage-content">
                <div class="temoignage-author">
                    <div class="temoignage-photo">
                        <?php echo strtoupper(substr($temoignage['auteur'], 0, 1)); ?>
                    </div>
                    <div class="temoignage-info">
                        <h4><?php echo htmlspecialchars($temoignage['auteur']); ?></h4>
                        <p><?php echo htmlspecialchars($temoignage['role']); ?> - <?php echo htmlspecialchars($temoignage['societe']); ?></p>
                    </div>
                </div>
                
                <div class="temoignage-rating">
                    <?php for ($i = 1; $i <= 5; $i++): ?>
                    <i class="fas fa-star star <?php echo $i <= $temoignage['note'] ? '' : 'empty'; ?>"></i>
                    <?php endfor; ?>
                </div>
                
                <div class="temoignage-meta">
                    <div class="meta-item">
                        <div class="meta-label">Vues</div>
                        <div class="meta-value"><?php echo number_format($temoignage['vues']); ?></div>
                    </div>
                    
                    <div class="meta-item">
                        <div class="meta-label">Likes</div>
                        <div class="meta-value"><?php echo number_format($temoignage['likes']); ?></div>
                    </div>
                </div>
                
                <div class="temoignage-actions">
                    <a href="#" class="btn-action btn-view" onclick="viewTemoignage(<?php echo $temoignage['id']; ?>)">
                        <i class="fas fa-eye"></i>
                        <span>Voir</span>
                    </a>
                    
                    <a href="#" class="btn-action btn-edit" onclick="editTemoignage(<?php echo $temoignage['id']; ?>)">
                        <i class="fas fa-edit"></i>
                        <span>Modifier</span>
                    </a>
                    
                    <?php if ($temoignage['statut'] !== 'approuvé'): ?>
                    <a href="#" class="btn-action btn-approve" onclick="approveTemoignage(<?php echo $temoignage['id']; ?>)">
                        <i class="fas fa-check"></i>
                        <span>Approuver</span>
                    </a>
                    <?php endif; ?>
                    
                    <a href="#" class="btn-action btn-delete" onclick="deleteTemoignage(<?php echo $temoignage['id']; ?>)">
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
    
    // Animation des cartes
    const statCards = document.querySelectorAll('.stat-card');
    const temoignageCards = document.querySelectorAll('.temoignage-card');
    
    statCards.forEach((card, index) => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(30px)';
        card.style.transition = 'all 0.6s ease';
        
        setTimeout(() => {
            card.style.opacity = '1';
            card.style.transform = 'translateY(0)';
        }, index * 100);
    });
    
    temoignageCards.forEach((card, index) => {
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
    const service = document.getElementById('service-filter').value;
    const status = document.getElementById('status-filter').value;
    const sort = document.getElementById('sort-select').value;
    const order = document.getElementById('order-select').value;
    
    const params = new URLSearchParams();
    if (search) params.append('search', search);
    if (service) params.append('service', service);
    if (status) params.append('status', status);
    if (sort) params.append('sort', sort);
    if (order) params.append('order', order);
    
    const url = window.location.pathname + (params.toString() ? '?' + params.toString() : '');
    window.location.href = url;
}

// Fonctions d'action
function showAddTemoignageModal() {
    if (confirm('Voulez-vous créer un nouveau témoignage ?')) {
        alert('Fonctionnalité d\'ajout de témoignage à implémenter');
    }
}

function viewTemoignage(id) {
    if (confirm(`Voulez-vous voir les détails du témoignage ${id} ?`)) {
        alert(`Fonctionnalité de visualisation du témoignage ${id} à implémenter`);
    }
}

function editTemoignage(id) {
    if (confirm(`Voulez-vous modifier le témoignage ${id} ?`)) {
        alert(`Fonctionnalité de modification du témoignage ${id} à implémenter`);
    }
}

function approveTemoignage(id) {
    if (confirm(`Voulez-vous approuver le témoignage ${id} ?`)) {
        alert(`Témoignage ${id} approuvé avec succès (simulation)`);
        location.reload();
    }
}

function deleteTemoignage(id) {
    if (confirm(`Êtes-vous sûr de vouloir supprimer le témoignage ${id} ?`)) {
        if (confirm('Confirmez-vous la suppression ?')) {
            alert(`Témoignage ${id} supprimé avec succès (simulation)`);
            location.reload();
        }
    }
}

// Gestion des raccourcis clavier
document.addEventListener('keydown', function(e) {
    if (e.ctrlKey || e.metaKey) {
        switch(e.key) {
            case 'n':
                e.preventDefault();
                showAddTemoignageModal();
                break;
            case 'f':
                e.preventDefault();
                document.getElementById('search-input').focus();
                break;
        }
    }
});
</script>

<?php
// Inclusion du pied de page
include '../includes/footer.php';
?>