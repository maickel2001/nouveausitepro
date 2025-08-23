<?php
/**
 * Gestion des études de cas - Interface administrateur
 * Site professionnel de Maickel Okereke
 */

// Configuration de la page
$page_title = 'Gestion des études de cas - Administration - Maickel Okereke';
$page_description = 'Gérez les études de cas et témoignages clients depuis l\'interface administrateur.';
$page_keywords = 'admin, études de cas, témoignages, gestion, administration, Maickel Okereke';

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

// Données simulées des études de cas
$etudes = [
    [
        'id' => 1,
        'titre' => 'Transformation digitale d\'un cabinet comptable',
        'client' => 'Cabinet Martin & Associés',
        'secteur' => 'Comptabilité',
        'categorie' => 'Transformation digitale',
        'statut' => 'publié',
        'date_creation' => '2024-01-15',
        'date_publication' => '2024-02-01',
        'image' => '/assets/images/etudes/cabinet-comptable.jpg',
        'resume' => 'Modernisation complète des processus comptables avec intégration d\'outils digitaux',
        'probleme' => 'Processus manuels chronophages et risques d\'erreurs',
        'solution' => 'Développement d\'une plateforme web personnalisée avec automatisation',
        'resultats' => 'Réduction de 60% du temps de traitement, amélioration de la précision',
        'impact_chiffre' => '60%',
        'impact_qualitatif' => 'Très élevé',
        'technologies' => ['PHP', 'MySQL', 'JavaScript', 'API REST'],
        'duree_projet' => '4 mois',
        'budget' => '25 000€',
        'temoignage' => 'Une transformation remarquable qui a révolutionné notre façon de travailler.',
        'auteur_temoignage' => 'Marie Martin',
        'fonction_temoignage' => 'Gérante',
        'photo_temoignage' => '/assets/images/temoignages/marie-martin.jpg',
        'vues' => 1247,
        'telechargements' => 89,
        'note' => 4.8
    ],
    [
        'id' => 2,
        'titre' => 'Site e-commerce pour une marque de mode',
        'client' => 'Fashion Forward',
        'secteur' => 'Mode',
        'categorie' => 'E-commerce',
        'statut' => 'publié',
        'date_creation' => '2024-02-20',
        'date_publication' => '2024-03-15',
        'image' => '/assets/images/etudes/fashion-ecommerce.jpg',
        'resume' => 'Création d\'une plateforme e-commerce moderne et performante',
        'probleme' => 'Site web obsolète, conversion faible, expérience utilisateur médiocre',
        'solution' => 'Refonte complète avec design responsive et optimisation conversion',
        'resultats' => 'Augmentation de 150% des ventes en ligne, amélioration UX',
        'impact_chiffre' => '150%',
        'impact_qualitatif' => 'Élevé',
        'technologies' => ['React', 'Node.js', 'MongoDB', 'Stripe'],
        'duree_projet' => '6 mois',
        'budget' => '45 000€',
        'temoignage' => 'Un site magnifique qui a transformé notre business en ligne.',
        'auteur_temoignage' => 'Thomas Durand',
        'fonction_temoignage' => 'Directeur Marketing',
        'photo_temoignage' => '/assets/images/temoignages/thomas-durand.jpg',
        'vues' => 2156,
        'telechargements' => 156,
        'note' => 4.9
    ],
    [
        'id' => 3,
        'titre' => 'Optimisation fiscale pour startup tech',
        'client' => 'TechStart Solutions',
        'secteur' => 'Technologie',
        'categorie' => 'Conseil fiscal',
        'statut' => 'brouillon',
        'date_creation' => '2024-03-10',
        'date_publication' => null,
        'image' => '/assets/images/etudes/startup-fiscale.jpg',
        'resume' => 'Stratégie d\'optimisation fiscale pour une startup en croissance',
        'probleme' => 'Structure fiscale non optimisée, charges fiscales élevées',
        'solution' => 'Restructuration juridique et optimisation des flux financiers',
        'resultats' => 'Économies fiscales de 40 000€/an, structure optimisée',
        'impact_chiffre' => '40 000€',
        'impact_qualitatif' => 'Élevé',
        'technologies' => ['Excel', 'Logiciels comptables', 'Outils de simulation'],
        'duree_projet' => '2 mois',
        'budget' => '8 000€',
        'temoignage' => 'Un conseil fiscal de qualité qui nous a fait économiser des milliers d\'euros.',
        'auteur_temoignage' => 'Sophie Bernard',
        'fonction_temoignage' => 'CEO',
        'photo_temoignage' => '/assets/images/temoignages/sophie-bernard.jpg',
        'vues' => 0,
        'telechargements' => 0,
        'note' => 0
    ],
    [
        'id' => 4,
        'titre' => 'Formation comptable pour équipe commerciale',
        'client' => 'SalesPro International',
        'secteur' => 'Commerce',
        'categorie' => 'Formation',
        'statut' => 'publié',
        'date_creation' => '2024-04-05',
        'date_publication' => '2024-05-01',
        'image' => '/assets/images/etudes/formation-commerciale.jpg',
        'resume' => 'Programme de formation sur mesure pour équipe commerciale',
        'probleme' => 'Manque de connaissances comptables, difficultés de compréhension',
        'solution' => 'Formation personnalisée avec supports pratiques et suivi',
        'resultats' => 'Amélioration de 80% des compétences, meilleure collaboration',
        'impact_chiffre' => '80%',
        'impact_qualitatif' => 'Moyen',
        'technologies' => ['PowerPoint', 'Vidéo', 'Exercices pratiques', 'Quiz en ligne'],
        'duree_projet' => '1 mois',
        'budget' => '12 000€',
        'temoignage' => 'Une formation excellente qui a boosté la confiance de notre équipe.',
        'auteur_temoignage' => 'Pierre Moreau',
        'fonction_temoignage' => 'Directeur Commercial',
        'photo_temoignage' => '/assets/images/temoignages/pierre-moreau.jpg',
        'vues' => 892,
        'telechargements' => 67,
        'note' => 4.7
    ],
    [
        'id' => 5,
        'titre' => 'Audit comptable pour PME manufacturière',
        'client' => 'Manufacture Plus',
        'secteur' => 'Industrie',
        'categorie' => 'Audit',
        'statut' => 'en_revision',
        'date_creation' => '2024-05-15',
        'date_publication' => null,
        'image' => '/assets/images/etudes/audit-manufacture.jpg',
        'resume' => 'Audit complet des comptes et processus comptables',
        'probleme' => 'Processus comptables non conformes, risques de contrôle',
        'solution' => 'Audit détaillé avec recommandations d\'amélioration',
        'resultats' => 'Mise en conformité, réduction des risques, processus optimisés',
        'impact_chiffre' => 'N/A',
        'impact_qualitatif' => 'Très élevé',
        'technologies' => ['Outils d\'audit', 'Logiciels de contrôle', 'Rapports automatisés'],
        'duree_projet' => '3 mois',
        'budget' => '18 000€',
        'temoignage' => 'Un audit professionnel qui nous a rassurés sur notre conformité.',
        'auteur_temoignage' => 'Jean Dupont',
        'fonction_temoignage' => 'Directeur Financier',
        'photo_temoignage' => '/assets/images/temoignages/jean-dupont.jpg',
        'vues' => 0,
        'telechargements' => 0,
        'note' => 0
    ]
];

// Filtres et recherche
$search = $_GET['search'] ?? '';
$category_filter = $_GET['category'] ?? '';
$status_filter = $_GET['status'] ?? '';
$sector_filter = $_GET['sector'] ?? '';
$sort_by = $_GET['sort'] ?? 'date_creation';
$sort_order = $_GET['order'] ?? 'desc';

// Filtrage des études
$filtered_etudes = $etudes;
if (!empty($search)) {
    $filtered_etudes = array_filter($filtered_etudes, function($etude) use ($search) {
        return stripos($etude['titre'] . ' ' . $etude['client'] . ' ' . $etude['resume'], $search) !== false;
    });
}

if (!empty($category_filter)) {
    $filtered_etudes = array_filter($filtered_etudes, function($etude) use ($category_filter) {
        return $etude['categorie'] === $category_filter;
    });
}

if (!empty($status_filter)) {
    $filtered_etudes = array_filter($filtered_etudes, function($etude) use ($status_filter) {
        return $etude['statut'] === $status_filter;
    });
}

if (!empty($sector_filter)) {
    $filtered_etudes = array_filter($filtered_etudes, function($etude) use ($sector_filter) {
        return $etude['secteur'] === $sector_filter;
    });
}

// Tri des études
usort($filtered_etudes, function($a, $b) use ($sort_by, $sort_order) {
    $result = 0;
    switch ($sort_by) {
        case 'titre':
            $result = strcmp($a['titre'], $b['titre']);
            break;
        case 'client':
            $result = strcmp($a['client'], $b['client']);
            break;
        case 'date_creation':
            $result = strcmp($a['date_creation'], $b['date_creation']);
            break;
        case 'vues':
            $result = $a['vues'] - $b['vues'];
            break;
        case 'note':
            $result = $a['note'] - $b['note'];
            break;
        default:
            $result = 0;
    }
    return $sort_order === 'desc' ? -$result : $result;
});

// Statistiques
$total_etudes = count($etudes);
$published_etudes = count(array_filter($etudes, function($etude) { return $etude['statut'] === 'publié'; }));
$total_views = array_sum(array_column($etudes, 'vues'));
$total_downloads = array_sum(array_column($etudes, 'telechargements'));
$avg_rating = array_sum(array_column($etudes, 'note')) / count(array_filter($etudes, function($etude) { return $etude['note'] > 0; }));

// Catégories et secteurs uniques
$categories = array_unique(array_column($etudes, 'categorie'));
$sectors = array_unique(array_column($etudes, 'secteur'));

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

.btn-add-etude {
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

.btn-add-etude:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
    text-decoration: none;
    color: white;
}

.etudes-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
    gap: 1.5rem;
    margin-bottom: 2rem;
}

.etude-card {
    background: white;
    border-radius: 15px;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
    overflow: hidden;
    transition: all 0.3s ease;
    position: relative;
}

.etude-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
}

.etude-header {
    position: relative;
    height: 200px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    overflow: hidden;
}

.etude-header::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="white" opacity="0.1"/><circle cx="75" cy="75" r="1" fill="white" opacity="0.1"/><circle cx="50" cy="10" r="0.5" fill="white" opacity="0.1"/><circle cx="10" cy="60" r="0.5" fill="white" opacity="0.1"/><circle cx="90" cy="40" r="0.5" fill="white" opacity="0.1"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
    opacity: 0.3;
}

.etude-status {
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

.etude-status.publié {
    background: rgba(40, 167, 69, 0.2);
    color: #28a745;
}

.etude-status.brouillon {
    background: rgba(108, 117, 125, 0.2);
    color: #6c757d;
}

.etude-status.en_revision {
    background: rgba(255, 193, 7, 0.2);
    color: #ffc107;
}

.etude-category {
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

.etude-title {
    font-size: 1.3rem;
    font-weight: 700;
    text-align: center;
    margin: 0;
    padding: 0 1rem;
    line-height: 1.3;
}

.etude-content {
    padding: 1.5rem;
}

.etude-client {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    margin-bottom: 1rem;
    color: #667eea;
    font-weight: 600;
}

.etude-client i {
    font-size: 1.2rem;
}

.etude-resume {
    color: #666;
    margin-bottom: 1rem;
    line-height: 1.6;
    font-style: italic;
}

.etude-meta {
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

.etude-stats {
    display: flex;
    justify-content: space-around;
    margin-bottom: 1.5rem;
    padding: 1rem;
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    border-radius: 8px;
}

.stat-item {
    text-align: center;
}

.stat-number {
    font-size: 1.2rem;
    font-weight: 700;
    color: #333;
    margin-bottom: 0.25rem;
}

.stat-label {
    font-size: 0.7rem;
    color: #666;
    text-transform: uppercase;
}

.etude-actions {
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

.btn-publish {
    background: #28a745;
    color: white;
}

.btn-publish:hover {
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

.etude-impact {
    display: flex;
    gap: 1rem;
    margin-bottom: 1rem;
}

.impact-item {
    flex: 1;
    text-align: center;
    padding: 0.5rem;
    background: #f8f9fa;
    border-radius: 8px;
    font-size: 0.8rem;
}

.impact-label {
    color: #666;
    margin-bottom: 0.25rem;
}

.impact-value {
    font-weight: 600;
    color: #28a745;
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
    
    .etudes-grid {
        grid-template-columns: 1fr;
    }
    
    .etude-meta {
        grid-template-columns: 1fr;
    }
    
    .etude-stats {
        flex-direction: column;
        gap: 1rem;
    }
    
    .admin-header h1 {
        font-size: 2rem;
    }
}
</style>

<!-- En-tête admin -->
<div class="admin-header">
    <div class="container">
        <h1>Gestion des études de cas</h1>
        <p>Gérez les études de cas et témoignages clients pour valoriser votre expertise.</p>
    </div>
</div>

<!-- Contenu principal -->
<div class="container">
    <!-- Statistiques -->
    <div class="stats-overview">
        <div class="stat-card">
            <div class="stat-number"><?php echo $total_etudes; ?></div>
            <div class="stat-label">Total études</div>
        </div>
        
        <div class="stat-card">
            <div class="stat-number"><?php echo $published_etudes; ?></div>
            <div class="stat-label">Études publiées</div>
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
                <a href="#" class="btn-add-etude" onclick="showAddEtudeModal()">
                    <i class="fas fa-plus"></i>
                    <span>Ajouter une étude</span>
                </a>
            </div>
        </div>
        
        <div class="search-box">
            <i class="fas fa-search"></i>
            <input type="text" id="search-input" placeholder="Rechercher une étude..." value="<?php echo htmlspecialchars($search); ?>">
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
                <label for="sector-filter">Secteur :</label>
                <select id="sector-filter" onchange="applyFilters()">
                    <option value="">Tous les secteurs</option>
                    <?php foreach ($sectors as $sector): ?>
                    <option value="<?php echo htmlspecialchars($sector); ?>" <?php echo $sector_filter === $sector ? 'selected' : ''; ?>>
                        <?php echo htmlspecialchars($sector); ?>
                    </option>
                    <?php endforeach; ?>
                </select>
            </div>
            
            <div class="filter-group">
                <label for="status-filter">Statut :</label>
                <select id="status-filter" onchange="applyFilters()">
                    <option value="">Tous les statuts</option>
                    <option value="publié" <?php echo $status_filter === 'publié' ? 'selected' : ''; ?>>Publié</option>
                    <option value="brouillon" <?php echo $status_filter === 'brouillon' ? 'selected' : ''; ?>>Brouillon</option>
                    <option value="en_revision" <?php echo $status_filter === 'en_revision' ? 'selected' : ''; ?>>En révision</option>
                </select>
            </div>
            
            <div class="filter-group">
                <label for="sort-select">Trier par :</label>
                <select id="sort-select" onchange="applyFilters()">
                    <option value="date_creation" <?php echo $sort_by === 'date_creation' ? 'selected' : ''; ?>>Date de création</option>
                    <option value="titre" <?php echo $sort_by === 'titre' ? 'selected' : ''; ?>>Titre</option>
                    <option value="client" <?php echo $sort_by === 'client' ? 'selected' : ''; ?>>Client</option>
                    <option value="vues" <?php echo $sort_by === 'vues' ? 'selected' : ''; ?>>Nombre de vues</option>
                    <option value="note" <?php echo $sort_by === 'note' ? 'selected' : ''; ?>>Note</option>
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
    
    <!-- Grille des études -->
    <div class="etudes-grid">
        <?php if (empty($filtered_etudes)): ?>
        <div class="empty-state">
            <i class="fas fa-file-alt"></i>
            <h3>Aucune étude trouvée</h3>
            <p>Aucune étude ne correspond à vos critères de recherche.</p>
        </div>
        <?php else: ?>
        <?php foreach ($filtered_etudes as $etude): ?>
        <div class="etude-card">
            <div class="etude-header">
                <div class="etude-status <?php echo $etude['statut']; ?>">
                    <?php echo ucfirst($etude['statut']); ?>
                </div>
                <div class="etude-category"><?php echo htmlspecialchars($etude['categorie']); ?></div>
                
                <h3 class="etude-title"><?php echo htmlspecialchars($etude['titre']); ?></h3>
            </div>
            
            <div class="etude-content">
                <div class="etude-client">
                    <i class="fas fa-building"></i>
                    <span><?php echo htmlspecialchars($etude['client']); ?></span>
                </div>
                
                <p class="etude-resume"><?php echo htmlspecialchars($etude['resume']); ?></p>
                
                <div class="etude-impact">
                    <div class="impact-item">
                        <div class="impact-label">Impact</div>
                        <div class="impact-value"><?php echo htmlspecialchars($etude['impact_chiffre']); ?></div>
                    </div>
                    
                    <div class="impact-item">
                        <div class="impact-label">Durée</div>
                        <div class="impact-value"><?php echo htmlspecialchars($etude['duree_projet']); ?></div>
                    </div>
                    
                    <div class="impact-item">
                        <div class="impact-label">Budget</div>
                        <div class="impact-value"><?php echo htmlspecialchars($etude['budget']); ?></div>
                    </div>
                </div>
                
                <div class="etude-meta">
                    <div class="meta-item">
                        <div class="meta-label">Secteur</div>
                        <div class="meta-value"><?php echo htmlspecialchars($etude['secteur']); ?></div>
                    </div>
                    
                    <div class="meta-item">
                        <div class="meta-label">Technologies</div>
                        <div class="meta-value"><?php echo count($etude['technologies']); ?> tech</div>
                    </div>
                </div>
                
                <div class="etude-stats">
                    <div class="stat-item">
                        <div class="stat-number"><?php echo number_format($etude['vues']); ?></div>
                        <div class="stat-label">Vues</div>
                    </div>
                    
                    <div class="stat-item">
                        <div class="stat-number"><?php echo number_format($etude['telechargements']); ?></div>
                        <div class="stat-label">Téléchargements</div>
                    </div>
                    
                    <div class="stat-item">
                        <div class="stat-number"><?php echo $etude['note'] > 0 ? number_format($etude['note'], 1) : 'N/A'; ?></div>
                        <div class="stat-label">Note</div>
                    </div>
                </div>
                
                <div class="etude-actions">
                    <a href="#" class="btn-action btn-view" onclick="viewEtude(<?php echo $etude['id']; ?>)">
                        <i class="fas fa-eye"></i>
                        <span>Voir</span>
                    </a>
                    
                    <a href="#" class="btn-action btn-edit" onclick="editEtude(<?php echo $etude['id']; ?>)">
                        <i class="fas fa-edit"></i>
                        <span>Modifier</span>
                    </a>
                    
                    <?php if ($etude['statut'] !== 'publié'): ?>
                    <a href="#" class="btn-action btn-publish" onclick="publishEtude(<?php echo $etude['id']; ?>)">
                        <i class="fas fa-upload"></i>
                        <span>Publier</span>
                    </a>
                    <?php endif; ?>
                    
                    <a href="#" class="btn-action btn-delete" onclick="deleteEtude(<?php echo $etude['id']; ?>)">
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
    
    // Animation des cartes d'études
    const etudeCards = document.querySelectorAll('.etude-card');
    etudeCards.forEach((card, index) => {
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
    const sector = document.getElementById('sector-filter').value;
    const sort = document.getElementById('sort-select').value;
    const order = document.getElementById('order-select').value;
    
    const params = new URLSearchParams();
    if (search) params.append('search', search);
    if (category) params.append('category', category);
    if (status) params.append('status', status);
    if (sector) params.append('sector', sector);
    if (sort) params.append('sort', sort);
    if (order) params.append('order', order);
    
    const url = window.location.pathname + (params.toString() ? '?' + params.toString() : '');
    window.location.href = url;
}

// Fonction pour afficher le modal d'ajout d'étude
function showAddEtudeModal() {
    // Simulation d'un modal
    if (confirm('Voulez-vous créer une nouvelle étude de cas ?')) {
        alert('Fonctionnalité d\'ajout d\'étude à implémenter');
    }
}

// Fonction pour voir une étude
function viewEtude(etudeId) {
    if (confirm(`Voulez-vous voir les détails de l'étude ${etudeId} ?`)) {
        alert(`Fonctionnalité de visualisation de l'étude ${etudeId} à implémenter`);
    }
}

// Fonction pour modifier une étude
function editEtude(etudeId) {
    if (confirm(`Voulez-vous modifier l'étude ${etudeId} ?`)) {
        alert(`Fonctionnalité de modification de l'étude ${etudeId} à implémenter`);
    }
}

// Fonction pour publier une étude
function publishEtude(etudeId) {
    if (confirm(`Voulez-vous publier l'étude ${etudeId} ?`)) {
        alert(`Étude ${etudeId} publiée avec succès (simulation)`);
        // Ici, on pourrait recharger la page ou mettre à jour l'interface
        location.reload();
    }
}

// Fonction pour supprimer une étude
function deleteEtude(etudeId) {
    if (confirm(`Êtes-vous sûr de vouloir supprimer l'étude ${etudeId} ? Cette action est irréversible.`)) {
        if (confirm('Confirmez-vous la suppression ?')) {
            alert(`Étude ${etudeId} supprimée avec succès (simulation)`);
            // Ici, on pourrait recharger la page ou supprimer la carte
            location.reload();
        }
    }
}

// Fonction pour exporter la liste des études
function exportEtudes() {
    const etudes = <?php echo json_encode($filtered_etudes); ?>;
    const csvContent = [
        ['ID', 'Titre', 'Client', 'Secteur', 'Catégorie', 'Statut', 'Impact', 'Durée', 'Budget', 'Vues', 'Téléchargements', 'Note'],
        ...etudes.map(etude => [
            etude.id,
            etude.titre,
            etude.client,
            etude.secteur,
            etude.categorie,
            etude.statut,
            etude.impact_chiffre,
            etude.duree_projet,
            etude.budget,
            etude.vues,
            etude.telechargements,
            etude.note
        ])
    ].map(row => row.map(cell => `"${cell}"`).join(',')).join('\n');
    
    const blob = new Blob([csvContent], { type: 'text/csv;charset=utf-8;' });
    const link = document.createElement('a');
    link.href = URL.createObjectURL(blob);
    link.download = 'etudes-de-cas.csv';
    link.click();
}

// Fonction pour rafraîchir les données
function refreshEtudes() {
    location.reload();
}

// Gestion des raccourcis clavier
document.addEventListener('keydown', function(e) {
    if (e.ctrlKey || e.metaKey) {
        switch(e.key) {
            case 'n':
                e.preventDefault();
                showAddEtudeModal();
                break;
            case 'f':
                e.preventDefault();
                document.getElementById('search-input').focus();
                break;
            case 'r':
                e.preventDefault();
                refreshEtudes();
                break;
            case 'e':
                e.preventDefault();
                exportEtudes();
                break;
        }
    }
});

// Notification des raccourcis clavier
setTimeout(() => {
    if (confirm('Voulez-vous voir les raccourcis clavier disponibles ?')) {
        alert('Raccourcis clavier :\nCtrl+N : Nouvelle étude\nCtrl+F : Rechercher\nCtrl+R : Rafraîchir\nCtrl+E : Exporter');
    }
}, 3000);
</script>

<?php
// Inclusion du pied de page
include '../includes/footer.php';
?>