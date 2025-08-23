<?php
/**
 * Tableau de bord administrateur - Site professionnel de Maickel Okereke
 */

// Configuration de la page
$page_title = 'Tableau de bord administrateur - Maickel Okereke';
$page_description = 'Gérez votre site web, vos utilisateurs et vos contenus depuis le tableau de bord administrateur.';
$page_keywords = 'admin, tableau de bord, gestion, administrateur, Maickel Okereke';

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

// Données simulées pour le tableau de bord
$stats = [
    'total_users' => 1247,
    'new_users_month' => 89,
    'total_quotes' => 456,
    'pending_quotes' => 23,
    'total_resources' => 89,
    'total_downloads' => 2156,
    'total_articles' => 67,
    'total_testimonials' => 34,
    'total_case_studies' => 23,
    'monthly_visitors' => 15420,
    'conversion_rate' => 3.2,
    'avg_session_duration' => '4m 32s'
];

$recent_activities = [
    [
        'type' => 'user_registration',
        'title' => 'Nouvelle inscription',
        'description' => 'Jean Dupont s\'est inscrit',
        'time' => 'Il y a 5 minutes',
        'icon' => 'fas fa-user-plus',
        'color' => 'success'
    ],
    [
        'type' => 'quote_request',
        'title' => 'Nouvelle demande de devis',
        'description' => 'Devis pour site e-commerce',
        'time' => 'Il y a 12 minutes',
        'icon' => 'fas fa-file-invoice',
        'color' => 'info'
    ],
    [
        'type' => 'resource_download',
        'title' => 'Téléchargement ressource',
        'description' => 'Guide fiscal 2024 téléchargé',
        'time' => 'Il y a 25 minutes',
        'icon' => 'fas fa-download',
        'color' => 'warning'
    ],
    [
        'type' => 'contact_form',
        'title' => 'Nouveau message contact',
        'description' => 'Demande d\'information',
        'time' => 'Il y a 1 heure',
        'icon' => 'fas fa-envelope',
        'color' => 'primary'
    ]
];

$quick_actions = [
    [
        'title' => 'Gérer les utilisateurs',
        'description' => 'Ajouter, modifier ou supprimer des utilisateurs',
        'icon' => 'fas fa-users',
        'link' => '/admin/utilisateurs.php',
        'color' => 'primary'
    ],
    [
        'title' => 'Gérer les services',
        'description' => 'Modifier la liste des services proposés',
        'icon' => 'fas fa-cogs',
        'link' => '/admin/services.php',
        'color' => 'success'
    ],
    [
        'title' => 'Gérer le blog',
        'description' => 'Créer, modifier ou publier des articles',
        'icon' => 'fas fa-blog',
        'link' => '/admin/blog.php',
        'color' => 'info'
    ],
    [
        'title' => 'Gérer les ressources',
        'description' => 'Ajouter ou modifier les ressources téléchargeables',
        'icon' => 'fas fa-download',
        'link' => '/admin/ressources.php',
        'color' => 'warning'
    ],
    [
        'title' => 'Gérer les devis',
        'description' => 'Traiter les demandes de devis en attente',
        'icon' => 'fas fa-file-invoice',
        'link' => '/admin/devis.php',
        'color' => 'danger'
    ],
    [
        'title' => 'Voir les statistiques',
        'description' => 'Analyser les performances du site',
        'icon' => 'fas fa-chart-line',
        'link' => '/admin/stats.php',
        'color' => 'secondary'
    ]
];

$system_status = [
    'database' => ['status' => 'online', 'response_time' => '12ms'],
    'email_service' => ['status' => 'online', 'response_time' => '45ms'],
    'file_storage' => ['status' => 'online', 'response_time' => '8ms'],
    'backup_service' => ['status' => 'online', 'last_backup' => 'Il y a 2 heures']
];

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

.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 1.5rem;
    margin-bottom: 2rem;
}

.stat-card {
    background: white;
    border-radius: 15px;
    padding: 1.5rem;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.stat-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
}

.stat-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, #667eea, #764ba2);
}

.stat-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 1rem;
}

.stat-icon {
    width: 50px;
    height: 50px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    color: white;
}

.stat-icon.primary { background: #007bff; }
.stat-icon.success { background: #28a745; }
.stat-icon.warning { background: #ffc107; }
.stat-icon.danger { background: #dc3545; }
.stat-icon.info { background: #17a2b8; }
.stat-icon.secondary { background: #6c757d; }

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

.stat-change {
    font-size: 0.8rem;
    color: #28a745;
    font-weight: 600;
}

.content-grid {
    display: grid;
    grid-template-columns: 2fr 1fr;
    gap: 2rem;
    margin-bottom: 2rem;
}

.quick-actions-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 1.5rem;
    margin-bottom: 2rem;
}

.action-card {
    background: white;
    border-radius: 15px;
    padding: 1.5rem;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
    text-decoration: none;
    color: inherit;
    display: block;
}

.action-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
    text-decoration: none;
    color: inherit;
}

.action-header {
    display: flex;
    align-items: center;
    margin-bottom: 1rem;
}

.action-icon {
    width: 50px;
    height: 50px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    color: white;
    margin-right: 1rem;
}

.action-title {
    font-size: 1.2rem;
    font-weight: 600;
    color: #333;
    margin-bottom: 0.5rem;
}

.action-description {
    color: #666;
    font-size: 0.9rem;
    line-height: 1.5;
}

.recent-activities {
    background: white;
    border-radius: 15px;
    padding: 1.5rem;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
}

.activity-item {
    display: flex;
    align-items: center;
    padding: 1rem 0;
    border-bottom: 1px solid #f0f0f0;
}

.activity-item:last-child {
    border-bottom: none;
}

.activity-icon {
    width: 40px;
    height: 40px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1rem;
    color: white;
    margin-right: 1rem;
    flex-shrink: 0;
}

.activity-content {
    flex: 1;
}

.activity-title {
    font-weight: 600;
    color: #333;
    margin-bottom: 0.25rem;
}

.activity-description {
    color: #666;
    font-size: 0.9rem;
    margin-bottom: 0.25rem;
}

.activity-time {
    color: #999;
    font-size: 0.8rem;
}

.system-status {
    background: white;
    border-radius: 15px;
    padding: 1.5rem;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
}

.status-item {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 1rem 0;
    border-bottom: 1px solid #f0f0f0;
}

.status-item:last-child {
    border-bottom: none;
}

.status-info {
    display: flex;
    align-items: center;
}

.status-icon {
    width: 12px;
    height: 12px;
    border-radius: 50%;
    margin-right: 0.75rem;
}

.status-icon.online { background: #28a745; }
.status-icon.offline { background: #dc3545; }
.status-icon.warning { background: #ffc107; }

.status-name {
    font-weight: 500;
    color: #333;
}

.status-details {
    color: #666;
    font-size: 0.9rem;
}

.admin-welcome {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    border-radius: 15px;
    padding: 2rem;
    margin-bottom: 2rem;
    text-align: center;
}

.admin-welcome h2 {
    color: #333;
    margin-bottom: 1rem;
}

.admin-welcome p {
    color: #666;
    font-size: 1.1rem;
    margin-bottom: 0;
}

@media (max-width: 768px) {
    .content-grid {
        grid-template-columns: 1fr;
    }
    
    .stats-grid {
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    }
    
    .quick-actions-grid {
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
        <h1>Tableau de bord administrateur</h1>
        <p>Bienvenue dans votre espace de gestion. Surveillez et gérez votre site en temps réel.</p>
    </div>
</div>

<!-- Contenu principal -->
<div class="container">
    <!-- Message de bienvenue -->
    <div class="admin-welcome">
        <h2>Bonjour, administrateur !</h2>
        <p>Voici un aperçu de l'activité de votre site aujourd'hui. Utilisez les actions rapides ci-dessous pour gérer votre contenu.</p>
    </div>
    
    <!-- Statistiques principales -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-header">
                <div class="stat-icon primary">
                    <i class="fas fa-users"></i>
                </div>
                <div class="stat-change">+7% ce mois</div>
            </div>
            <div class="stat-number" data-target="<?php echo $stats['total_users']; ?>">0</div>
            <div class="stat-label">Utilisateurs totaux</div>
        </div>
        
        <div class="stat-card">
            <div class="stat-header">
                <div class="stat-icon success">
                    <i class="fas fa-file-invoice"></i>
                </div>
                <div class="stat-change">+12% ce mois</div>
            </div>
            <div class="stat-number" data-target="<?php echo $stats['total_quotes']; ?>">0</div>
            <div class="stat-label">Devis demandés</div>
        </div>
        
        <div class="stat-card">
            <div class="stat-header">
                <div class="stat-icon warning">
                    <i class="fas fa-download"></i>
                </div>
                <div class="stat-change">+23% ce mois</div>
            </div>
            <div class="stat-number" data-target="<?php echo $stats['total_downloads']; ?>">0</div>
            <div class="stat-label">Téléchargements</div>
        </div>
        
        <div class="stat-card">
            <div class="stat-header">
                <div class="stat-icon info">
                    <i class="fas fa-eye"></i>
                </div>
                <div class="stat-change">+8% ce mois</div>
            </div>
            <div class="stat-number" data-target="<?php echo $stats['monthly_visitors']; ?>">0</div>
            <div class="stat-label">Visiteurs/mois</div>
        </div>
    </div>
    
    <!-- Grille de contenu -->
    <div class="content-grid">
        <!-- Actions rapides -->
        <div class="quick-actions-grid">
            <?php foreach ($quick_actions as $action): ?>
            <a href="<?php echo htmlspecialchars($action['link']); ?>" class="action-card">
                <div class="action-header">
                    <div class="action-icon <?php echo $action['color']; ?>">
                        <i class="<?php echo $action['icon']; ?>"></i>
                    </div>
                </div>
                <div class="action-title"><?php echo htmlspecialchars($action['title']); ?></div>
                <div class="action-description"><?php echo htmlspecialchars($action['description']); ?></div>
            </a>
            <?php endforeach; ?>
        </div>
        
        <!-- Activités récentes -->
        <div class="recent-activities">
            <h3>Activités récentes</h3>
            <?php foreach ($recent_activities as $activity): ?>
            <div class="activity-item">
                <div class="activity-icon <?php echo $activity['color']; ?>">
                    <i class="<?php echo $activity['icon']; ?>"></i>
                </div>
                <div class="activity-content">
                    <div class="activity-title"><?php echo htmlspecialchars($activity['title']); ?></div>
                    <div class="activity-description"><?php echo htmlspecialchars($activity['description']); ?></div>
                    <div class="activity-time"><?php echo htmlspecialchars($activity['time']); ?></div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    
    <!-- Statut du système -->
    <div class="system-status">
        <h3>Statut du système</h3>
        <?php foreach ($system_status as $service => $status): ?>
        <div class="status-item">
            <div class="status-info">
                <div class="status-icon <?php echo $status['status']; ?>"></div>
                <div class="status-name"><?php echo ucfirst($service); ?></div>
            </div>
            <div class="status-details">
                <?php if (isset($status['response_time'])): ?>
                    <?php echo $status['response_time']; ?>
                <?php elseif (isset($status['last_backup'])): ?>
                    <?php echo $status['last_backup']; ?>
                <?php endif; ?>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<!-- JavaScript spécifique à la page -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Animation des statistiques
    const statNumbers = document.querySelectorAll('.stat-number[data-target]');
    
    statNumbers.forEach(stat => {
        const target = parseInt(stat.getAttribute('data-target'));
        const duration = 2000; // 2 secondes
        const step = target / (duration / 16); // 60 FPS
        let current = 0;
        
        const timer = setInterval(() => {
            current += step;
            if (current >= target) {
                current = target;
                clearInterval(timer);
            }
            
            // Formatage des nombres
            if (target >= 1000) {
                stat.textContent = Math.floor(current).toLocaleString('fr-FR');
            } else {
                stat.textContent = Math.floor(current);
            }
        }, 16);
    });
    
    // Animation des cartes au scroll
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    });
    
    const animatedElements = document.querySelectorAll('.stat-card, .action-card, .recent-activities, .system-status');
    animatedElements.forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(30px)';
        el.style.transition = 'all 0.6s ease';
        observer.observe(el);
    });
    
    // Gestion des cartes d'action
    const actionCards = document.querySelectorAll('.action-card');
    actionCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-8px) scale(1.02)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
        });
    });
    
    // Gestion des cartes de statistiques
    const statCards = document.querySelectorAll('.stat-card');
    statCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-8px) scale(1.02)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
        });
    });
    
    // Mise à jour en temps réel des activités (simulation)
    function updateRecentActivities() {
        const activityContainer = document.querySelector('.recent-activities');
        if (activityContainer) {
            const newActivity = document.createElement('div');
            newActivity.className = 'activity-item';
            newActivity.style.opacity = '0';
            newActivity.style.transform = 'translateX(-20px)';
            newActivity.style.transition = 'all 0.3s ease';
            
            newActivity.innerHTML = `
                <div class="activity-icon primary">
                    <i class="fas fa-chart-line"></i>
                </div>
                <div class="activity-content">
                    <div class="activity-title">Mise à jour statistiques</div>
                    <div class="activity-description">Données mises à jour automatiquement</div>
                    <div class="activity-time">À l'instant</div>
                </div>
            `;
            
            // Insérer au début
            const firstActivity = activityContainer.querySelector('.activity-item');
            if (firstActivity) {
                activityContainer.insertBefore(newActivity, firstActivity);
                
                // Animation d'apparition
                setTimeout(() => {
                    newActivity.style.opacity = '1';
                    newActivity.style.transform = 'translateX(0)';
                }, 100);
                
                // Supprimer après 10 secondes
                setTimeout(() => {
                    newActivity.style.transition = 'all 0.3s ease';
                    newActivity.style.opacity = '0';
                    newActivity.style.transform = 'translateX(-20px)';
                    setTimeout(() => {
                        if (newActivity.parentNode) {
                            newActivity.parentNode.removeChild(newActivity);
                        }
                    }, 300);
                }, 10000);
            }
        }
    }
    
    // Mettre à jour toutes les 30 secondes
    setInterval(updateRecentActivities, 30000);
    
    // Effet de parallaxe léger sur le scroll
    window.addEventListener('scroll', function() {
        const scrolled = window.pageYOffset;
        const parallaxElements = document.querySelectorAll('.stat-card, .action-card');
        
        parallaxElements.forEach((element, index) => {
            const speed = 0.1 + (index * 0.02);
            element.style.transform = `translateY(${scrolled * speed}px)`;
        });
    });
    
    // Gestion des raccourcis clavier
    document.addEventListener('keydown', function(e) {
        if (e.ctrlKey || e.metaKey) {
            switch(e.key) {
                case '1':
                    e.preventDefault();
                    window.location.href = '/admin/utilisateurs.php';
                    break;
                case '2':
                    e.preventDefault();
                    window.location.href = '/admin/services.php';
                    break;
                case '3':
                    e.preventDefault();
                    window.location.href = '/admin/blog.php';
                    break;
                case '4':
                    e.preventDefault();
                    window.location.href = '/admin/ressources.php';
                    break;
                case '5':
                    e.preventDefault();
                    window.location.href = '/admin/devis.php';
                    break;
                case '6':
                    e.preventDefault();
                    window.location.href = '/admin/stats.php';
                    break;
            }
        }
    });
    
    // Notification des raccourcis clavier
    setTimeout(() => {
        if (confirm('Voulez-vous voir les raccourcis clavier disponibles ?')) {
            alert('Raccourcis clavier :\nCtrl+1 : Gérer les utilisateurs\nCtrl+2 : Gérer les services\nCtrl+3 : Gérer le blog\nCtrl+4 : Gérer les ressources\nCtrl+5 : Gérer les devis\nCtrl+6 : Voir les statistiques');
        }
    }, 5000);
});

// Fonction pour rafraîchir les données
function refreshDashboard() {
    location.reload();
}

// Fonction pour exporter les statistiques
function exportStats() {
    const stats = {
        date: new Date().toISOString(),
        total_users: <?php echo $stats['total_users']; ?>,
        total_quotes: <?php echo $stats['total_quotes']; ?>,
        total_downloads: <?php echo $stats['total_downloads']; ?>,
        monthly_visitors: <?php echo $stats['monthly_visitors']; ?>
    };
    
    const dataStr = JSON.stringify(stats, null, 2);
    const dataBlob = new Blob([dataStr], {type: 'application/json'});
    
    const link = document.createElement('a');
    link.href = URL.createObjectURL(dataBlob);
    link.download = 'dashboard-stats.json';
    link.click();
}
</script>

<?php
// Inclusion du pied de page
include '../includes/footer.php';
?>