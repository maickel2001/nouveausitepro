<?php
/**
 * Gestion des utilisateurs - Interface administrateur
 * Site professionnel de Maickel Okereke
 */

// Configuration de la page
$page_title = 'Gestion des utilisateurs - Administration - Maickel Okereke';
$page_description = 'Gérez les utilisateurs de votre site web depuis l\'interface administrateur.';
$page_keywords = 'admin, utilisateurs, gestion, administration, Maickel Okereke';

// Vérification de la connexion et des droits admin (simulation)
session_start();
$is_logged_in = isset($_SESSION['user_id']) && !empty($_SESSION['user_id']);
$is_admin = isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin';

if (!$is_logged_in || !$is_admin) {
    // Redirection vers la page de connexion
    header('Location: /login.php?redirect=' . urlencode($_SERVER['REQUEST_URI']));
    exit;
}

// Données simulées des utilisateurs
$users = [
    [
        'id' => 1,
        'nom' => 'Dupont',
        'prenom' => 'Jean',
        'email' => 'jean.dupont@example.com',
        'entreprise' => 'Entreprise ABC',
        'role' => 'user',
        'statut' => 'actif',
        'date_inscription' => '2024-01-15',
        'derniere_connexion' => '2024-08-22 14:30:00',
        'total_devis' => 5,
        'total_telechargements' => 12
    ],
    [
        'id' => 2,
        'nom' => 'Martin',
        'prenom' => 'Sophie',
        'email' => 'sophie.martin@example.com',
        'entreprise' => 'Startup XYZ',
        'role' => 'admin',
        'statut' => 'actif',
        'date_inscription' => '2023-11-20',
        'derniere_connexion' => '2024-08-22 15:45:00',
        'total_devis' => 0,
        'total_telechargements' => 0
    ],
    [
        'id' => 3,
        'nom' => 'Bernard',
        'prenom' => 'Pierre',
        'email' => 'pierre.bernard@example.com',
        'entreprise' => 'Cabinet Comptable',
        'role' => 'user',
        'statut' => 'actif',
        'date_inscription' => '2024-03-10',
        'derniere_connexion' => '2024-08-21 09:15:00',
        'total_devis' => 3,
        'total_telechargements' => 8
    ],
    [
        'id' => 4,
        'nom' => 'Petit',
        'prenom' => 'Marie',
        'email' => 'marie.petit@example.com',
        'entreprise' => 'Consulting Pro',
        'role' => 'user',
        'statut' => 'inactif',
        'date_inscription' => '2024-02-28',
        'derniere_connexion' => '2024-07-15 16:20:00',
        'total_devis' => 1,
        'total_telechargements' => 3
    ],
    [
        'id' => 5,
        'nom' => 'Durand',
        'prenom' => 'Thomas',
        'email' => 'thomas.durand@example.com',
        'entreprise' => 'Tech Solutions',
        'role' => 'user',
        'statut' => 'actif',
        'date_inscription' => '2024-04-05',
        'derniere_connexion' => '2024-08-22 11:30:00',
        'total_devis' => 7,
        'total_telechargements' => 15
    ]
];

// Filtres et recherche
$search = $_GET['search'] ?? '';
$role_filter = $_GET['role'] ?? '';
$status_filter = $_GET['status'] ?? '';
$sort_by = $_GET['sort'] ?? 'date_inscription';
$sort_order = $_GET['order'] ?? 'desc';

// Filtrage des utilisateurs
$filtered_users = $users;
if (!empty($search)) {
    $filtered_users = array_filter($filtered_users, function($user) use ($search) {
        return stripos($user['nom'] . ' ' . $user['prenom'] . ' ' . $user['email'] . ' ' . $user['entreprise'], $search) !== false;
    });
}

if (!empty($role_filter)) {
    $filtered_users = array_filter($filtered_users, function($user) use ($role_filter) {
        return $user['role'] === $role_filter;
    });
}

if (!empty($status_filter)) {
    $filtered_users = array_filter($filtered_users, function($user) use ($status_filter) {
        return $user['statut'] === $status_filter;
    });
}

// Tri des utilisateurs
usort($filtered_users, function($a, $b) use ($sort_by, $sort_order) {
    $result = 0;
    switch ($sort_by) {
        case 'nom':
            $result = strcmp($a['nom'], $b['nom']);
            break;
        case 'date_inscription':
            $result = strcmp($a['date_inscription'], $b['date_inscription']);
            break;
        case 'derniere_connexion':
            $result = strcmp($a['derniere_connexion'], $b['derniere_connexion']);
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
$total_users = count($users);
$active_users = count(array_filter($users, function($user) { return $user['statut'] === 'actif'; }));
$admin_users = count(array_filter($users, function($user) { return $user['role'] === 'admin'; }));
$new_users_month = count(array_filter($users, function($user) { 
    return strtotime($user['date_inscription']) >= strtotime('-1 month'); 
}));

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

.btn-add-user {
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

.btn-add-user:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
    text-decoration: none;
    color: white;
}

.users-table-container {
    background: white;
    border-radius: 15px;
    padding: 1.5rem;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
    overflow-x: auto;
}

.users-table {
    width: 100%;
    border-collapse: collapse;
    font-size: 0.9rem;
}

.users-table th {
    background: #f8f9fa;
    padding: 1rem;
    text-align: left;
    font-weight: 600;
    color: #333;
    border-bottom: 2px solid #e9ecef;
}

.users-table th.sortable {
    cursor: pointer;
    transition: all 0.3s ease;
}

.users-table th.sortable:hover {
    background: #e9ecef;
}

.users-table th.sortable i {
    margin-left: 0.5rem;
    opacity: 0.5;
}

.users-table th.sortable.active i {
    opacity: 1;
    color: #667eea;
}

.users-table td {
    padding: 1rem;
    border-bottom: 1px solid #f0f0f0;
    vertical-align: middle;
}

.users-table tr:hover {
    background: #f8f9fa;
}

.user-info {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.user-avatar {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-weight: 600;
    font-size: 1rem;
}

.user-details h4 {
    margin: 0 0 0.25rem 0;
    font-size: 1rem;
    color: #333;
}

.user-details p {
    margin: 0;
    font-size: 0.8rem;
    color: #666;
}

.user-email {
    color: #667eea;
    font-weight: 500;
}

.status-badge {
    padding: 0.25rem 0.75rem;
    border-radius: 15px;
    font-size: 0.8rem;
    font-weight: 600;
    text-transform: uppercase;
}

.status-badge.actif {
    background: #d4edda;
    color: #155724;
}

.status-badge.inactif {
    background: #f8d7da;
    color: #721c24;
}

.role-badge {
    padding: 0.25rem 0.75rem;
    border-radius: 15px;
    font-size: 0.8rem;
    font-weight: 600;
    text-transform: uppercase;
}

.role-badge.admin {
    background: #cce5ff;
    color: #004085;
}

.role-badge.user {
    background: #d1ecf1;
    color: #0c5460;
}

.user-actions {
    display: flex;
    gap: 0.5rem;
    flex-wrap: wrap;
}

.btn-action {
    padding: 0.5rem;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    transition: all 0.3s ease;
    font-size: 0.8rem;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 0.25rem;
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

.pagination {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 0.5rem;
    margin-top: 2rem;
}

.pagination-item {
    padding: 0.5rem 1rem;
    border: 2px solid #e9ecef;
    border-radius: 8px;
    text-decoration: none;
    color: #333;
    transition: all 0.3s ease;
}

.pagination-item:hover,
.pagination-item.active {
    background: #667eea;
    color: white;
    border-color: #667eea;
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
    
    .users-table th,
    .users-table td {
        padding: 0.75rem 0.5rem;
        font-size: 0.8rem;
    }
    
    .user-info {
        flex-direction: column;
        align-items: flex-start;
        gap: 0.5rem;
    }
    
    .user-actions {
        flex-direction: column;
    }
}
</style>

<!-- En-tête admin -->
<div class="admin-header">
    <div class="container">
        <h1>Gestion des utilisateurs</h1>
        <p>Gérez les comptes utilisateurs, les rôles et les permissions de votre site.</p>
    </div>
</div>

<!-- Contenu principal -->
<div class="container">
    <!-- Statistiques -->
    <div class="stats-overview">
        <div class="stat-card">
            <div class="stat-number"><?php echo $total_users; ?></div>
            <div class="stat-label">Total utilisateurs</div>
        </div>
        
        <div class="stat-card">
            <div class="stat-number"><?php echo $active_users; ?></div>
            <div class="stat-label">Utilisateurs actifs</div>
        </div>
        
        <div class="stat-card">
            <div class="stat-number"><?php echo $admin_users; ?></div>
            <div class="stat-label">Administrateurs</div>
        </div>
        
        <div class="stat-card">
            <div class="stat-number"><?php echo $new_users_month; ?></div>
            <div class="stat-label">Nouveaux ce mois</div>
        </div>
    </div>
    
    <!-- Contrôles et filtres -->
    <div class="controls-section">
        <div class="controls-header">
            <h2 class="controls-title">Contrôles</h2>
            
            <div class="controls-actions">
                <a href="#" class="btn-add-user" onclick="showAddUserModal()">
                    <i class="fas fa-plus"></i>
                    <span>Ajouter un utilisateur</span>
                </a>
            </div>
        </div>
        
        <div class="search-box">
            <i class="fas fa-search"></i>
            <input type="text" id="search-input" placeholder="Rechercher un utilisateur..." value="<?php echo htmlspecialchars($search); ?>">
        </div>
        
        <div class="filters-row">
            <div class="filter-group">
                <label for="role-filter">Rôle :</label>
                <select id="role-filter" onchange="applyFilters()">
                    <option value="">Tous les rôles</option>
                    <option value="admin" <?php echo $role_filter === 'admin' ? 'selected' : ''; ?>>Administrateur</option>
                    <option value="user" <?php echo $role_filter === 'user' ? 'selected' : ''; ?>>Utilisateur</option>
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
                    <option value="date_inscription" <?php echo $sort_by === 'date_inscription' ? 'selected' : ''; ?>>Date d'inscription</option>
                    <option value="nom" <?php echo $sort_by === 'nom' ? 'selected' : ''; ?>>Nom</option>
                    <option value="derniere_connexion" <?php echo $sort_by === 'derniere_connexion' ? 'selected' : ''; ?>>Dernière connexion</option>
                    <option value="total_devis" <?php echo $sort_by === 'total_devis' ? 'selected' : ''; ?>>Nombre de devis</option>
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
    
    <!-- Tableau des utilisateurs -->
    <div class="users-table-container">
        <?php if (empty($filtered_users)): ?>
        <div class="empty-state">
            <i class="fas fa-users"></i>
            <h3>Aucun utilisateur trouvé</h3>
            <p>Aucun utilisateur ne correspond à vos critères de recherche.</p>
        </div>
        <?php else: ?>
        <table class="users-table">
            <thead>
                <tr>
                    <th class="sortable" onclick="sortTable('nom')">
                        Utilisateur
                        <i class="fas fa-sort <?php echo $sort_by === 'nom' ? 'active' : ''; ?>"></i>
                    </th>
                    <th>Entreprise</th>
                    <th>Rôle</th>
                    <th>Statut</th>
                    <th class="sortable" onclick="sortTable('date_inscription')">
                        Inscription
                        <i class="fas fa-sort <?php echo $sort_by === 'date_inscription' ? 'active' : ''; ?>"></i>
                    </th>
                    <th class="sortable" onclick="sortTable('derniere_connexion')">
                        Dernière connexion
                        <i class="fas fa-sort <?php echo $sort_by === 'derniere_connexion' ? 'active' : ''; ?>"></i>
                    </th>
                    <th class="sortable" onclick="sortTable('total_devis')">
                        Devis
                        <i class="fas fa-sort <?php echo $sort_by === 'total_devis' ? 'active' : ''; ?>"></i>
                    </th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($filtered_users as $user): ?>
                <tr>
                    <td>
                        <div class="user-info">
                            <div class="user-avatar">
                                <?php echo strtoupper(substr($user['prenom'], 0, 1) . substr($user['nom'], 0, 1)); ?>
                            </div>
                            <div class="user-details">
                                <h4><?php echo htmlspecialchars($user['prenom'] . ' ' . $user['nom']); ?></h4>
                                <p class="user-email"><?php echo htmlspecialchars($user['email']); ?></p>
                            </div>
                        </div>
                    </td>
                    <td><?php echo htmlspecialchars($user['entreprise']); ?></td>
                    <td>
                        <span class="role-badge <?php echo $user['role']; ?>">
                            <?php echo ucfirst($user['role']); ?>
                        </span>
                    </td>
                    <td>
                        <span class="status-badge <?php echo $user['statut']; ?>">
                            <?php echo ucfirst($user['statut']); ?>
                        </span>
                    </td>
                    <td><?php echo date('d/m/Y', strtotime($user['date_inscription'])); ?></td>
                    <td><?php echo date('d/m/Y H:i', strtotime($user['derniere_connexion'])); ?></td>
                    <td><?php echo $user['total_devis']; ?></td>
                    <td>
                        <div class="user-actions">
                            <a href="#" class="btn-action btn-view" onclick="viewUser(<?php echo $user['id']; ?>)">
                                <i class="fas fa-eye"></i>
                                <span>Voir</span>
                            </a>
                            <a href="#" class="btn-action btn-edit" onclick="editUser(<?php echo $user['id']; ?>)">
                                <i class="fas fa-edit"></i>
                                <span>Modifier</span>
                            </a>
                            <a href="#" class="btn-action btn-delete" onclick="deleteUser(<?php echo $user['id']; ?>)">
                                <i class="fas fa-trash"></i>
                                <span>Supprimer</span>
                            </a>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
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
    
    // Animation du tableau
    const tableRows = document.querySelectorAll('.users-table tbody tr');
    tableRows.forEach((row, index) => {
        row.style.opacity = '0';
        row.style.transform = 'translateX(-20px)';
        row.style.transition = 'all 0.3s ease';
        
        setTimeout(() => {
            row.style.opacity = '1';
            row.style.transform = 'translateX(0)';
        }, index * 50);
    });
});

// Fonction pour appliquer les filtres
function applyFilters() {
    const search = document.getElementById('search-input').value;
    const role = document.getElementById('role-filter').value;
    const status = document.getElementById('status-filter').value;
    const sort = document.getElementById('sort-select').value;
    const order = document.getElementById('order-select').value;
    
    const params = new URLSearchParams();
    if (search) params.append('search', search);
    if (role) params.append('role', role);
    if (status) params.append('status', status);
    if (sort) params.append('sort', sort);
    if (order) params.append('order', order);
    
    const url = window.location.pathname + (params.toString() ? '?' + params.toString() : '');
    window.location.href = url;
}

// Fonction pour trier le tableau
function sortTable(column) {
    const currentSort = '<?php echo $sort_by; ?>';
    const currentOrder = '<?php echo $sort_order; ?>';
    
    let newOrder = 'desc';
    if (currentSort === column && currentOrder === 'desc') {
        newOrder = 'asc';
    }
    
    const params = new URLSearchParams(window.location.search);
    params.set('sort', column);
    params.set('order', newOrder);
    
    window.location.href = window.location.pathname + '?' + params.toString();
}

// Fonction pour afficher le modal d'ajout d'utilisateur
function showAddUserModal() {
    // Simulation d'un modal
    if (confirm('Voulez-vous créer un nouvel utilisateur ?')) {
        alert('Fonctionnalité d\'ajout d\'utilisateur à implémenter');
    }
}

// Fonction pour voir un utilisateur
function viewUser(userId) {
    if (confirm(`Voulez-vous voir les détails de l'utilisateur ${userId} ?`)) {
        alert(`Fonctionnalité de visualisation de l'utilisateur ${userId} à implémenter`);
    }
}

// Fonction pour modifier un utilisateur
function editUser(userId) {
    if (confirm(`Voulez-vous modifier l'utilisateur ${userId} ?`)) {
        alert(`Fonctionnalité de modification de l'utilisateur ${userId} à implémenter`);
    }
}

// Fonction pour supprimer un utilisateur
function deleteUser(userId) {
    if (confirm(`Êtes-vous sûr de vouloir supprimer l'utilisateur ${userId} ? Cette action est irréversible.`)) {
        if (confirm('Confirmez-vous la suppression ?')) {
            alert(`Utilisateur ${userId} supprimé avec succès (simulation)`);
            // Ici, on pourrait recharger la page ou supprimer la ligne du tableau
        }
    }
}

// Fonction pour exporter la liste des utilisateurs
function exportUsers() {
    const users = <?php echo json_encode($filtered_users); ?>;
    const csvContent = [
        ['ID', 'Nom', 'Prénom', 'Email', 'Entreprise', 'Rôle', 'Statut', 'Date d\'inscription', 'Dernière connexion', 'Total devis'],
        ...users.map(user => [
            user.id,
            user.nom,
            user.prenom,
            user.email,
            user.entreprise,
            user.role,
            user.statut,
            user.date_inscription,
            user.derniere_connexion,
            user.total_devis
        ])
    ].map(row => row.map(cell => `"${cell}"`).join(',')).join('\n');
    
    const blob = new Blob([csvContent], { type: 'text/csv;charset=utf-8;' });
    const link = document.createElement('a');
    link.href = URL.createObjectURL(blob);
    link.download = 'utilisateurs.csv';
    link.click();
}

// Fonction pour rafraîchir les données
function refreshUsers() {
    location.reload();
}

// Gestion des raccourcis clavier
document.addEventListener('keydown', function(e) {
    if (e.ctrlKey || e.metaKey) {
        switch(e.key) {
            case 'n':
                e.preventDefault();
                showAddUserModal();
                break;
            case 'f':
                e.preventDefault();
                document.getElementById('search-input').focus();
                break;
            case 'r':
                e.preventDefault();
                refreshUsers();
                break;
            case 'e':
                e.preventDefault();
                exportUsers();
                break;
        }
    }
});

// Notification des raccourcis clavier
setTimeout(() => {
    if (confirm('Voulez-vous voir les raccourcis clavier disponibles ?')) {
        alert('Raccourcis clavier :\nCtrl+N : Nouvel utilisateur\nCtrl+F : Rechercher\nCtrl+R : Rafraîchir\nCtrl+E : Exporter');
    }
}, 3000);
</script>

<?php
// Inclusion du pied de page
include '../includes/footer.php';
?>