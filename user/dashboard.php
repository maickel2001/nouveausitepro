<?php
/**
 * Tableau de bord utilisateur
 * Site professionnel de Maickel Okereke
 */

// Configuration de la page
$page_title = 'Tableau de bord - Espace utilisateur - Maickel Okereke';
$page_description = 'Gérez votre compte et accédez à vos services dans votre espace utilisateur personnel.';
$page_keywords = 'tableau de bord, espace utilisateur, compte, Maickel Okereke';

// Vérification de la connexion (simulation)
session_start();
$is_logged_in = isset($_SESSION['user_id']) && !empty($_SESSION['user_id']);

if (!$is_logged_in) {
    // Redirection vers la page de connexion
    header('Location: /login.php?redirect=' . urlencode($_SERVER['REQUEST_URI']));
    exit;
}

// Données utilisateur simulées (en production, viendraient de la base de données)
$user = [
    'id' => $_SESSION['user_id'] ?? 1,
    'nom' => 'Jean Dupont',
    'email' => 'jean.dupont@example.com',
    'entreprise' => 'Entreprise ABC',
    'date_inscription' => '2024-01-15',
    'derniere_connexion' => '2024-08-22 14:30:00'
];

// Données des devis (simulation)
$devis = [
    [
        'id' => 1,
        'service' => 'Comptabilité complète',
        'statut' => 'En cours',
        'date_demande' => '2024-08-20',
        'montant' => '1500€',
        'progression' => 75
    ],
    [
        'id' => 2,
        'service' => 'Site web e-commerce',
        'statut' => 'Validé',
        'date_demande' => '2024-08-15',
        'montant' => '3500€',
        'progression' => 100
    ],
    [
        'id' => 3,
        'service' => 'Audit comptable',
        'statut' => 'En attente',
        'date_demande' => '2024-08-18',
        'montant' => '800€',
        'progression' => 25
    ]
];

// Données des ressources téléchargées
$ressources = [
    [
        'id' => 1,
        'titre' => 'Guide de gestion comptable',
        'type' => 'PDF',
        'date_telechargement' => '2024-08-20',
        'taille' => '2.5 MB'
    ],
    [
        'id' => 2,
        'titre' => 'Modèle de facture',
        'type' => 'Excel',
        'date_telechargement' => '2024-08-18',
        'taille' => '150 KB'
    ],
    [
        'id' => 3,
        'titre' => 'Checklist audit comptable',
        'type' => 'PDF',
        'date_telechargement' => '2024-08-15',
        'taille' => '1.2 MB'
    ]
];

// Statistiques
$stats = [
    'devis_total' => count($devis),
    'devis_en_cours' => count(array_filter($devis, function($d) { return $d['statut'] === 'En cours'; })),
    'devis_valides' => count(array_filter($devis, function($d) { return $d['statut'] === 'Validé'; })),
    'ressources_telechargees' => count($ressources)
];

// Inclusion de l'en-tête
include '../includes/header.php';
?>

<!-- Section du tableau de bord -->
<section class="section section-dashboard">
    <div class="container">
        <div class="dashboard-container">
            <!-- En-tête du tableau de bord -->
            <div class="dashboard-header">
                <div class="welcome-section">
                    <h1>Bienvenue, <?php echo htmlspecialchars($user['nom']); ?> !</h1>
                    <p>Gérez votre compte et suivez vos projets</p>
                </div>
                
                <div class="user-info">
                    <div class="user-avatar">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="user-details">
                        <h3><?php echo htmlspecialchars($user['nom']); ?></h3>
                        <p><?php echo htmlspecialchars($user['entreprise']); ?></p>
                        <small>Membre depuis <?php echo date('d/m/Y', strtotime($user['date_inscription'])); ?></small>
                    </div>
                </div>
            </div>
            
            <!-- Statistiques rapides -->
            <div class="dashboard-stats">
                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-file-invoice"></i>
                        </div>
                        <div class="stat-content">
                            <div class="stat-number"><?php echo $stats['devis_total']; ?></div>
                            <div class="stat-label">Devis total</div>
                        </div>
                    </div>
                    
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="stat-content">
                            <div class="stat-number"><?php echo $stats['devis_en_cours']; ?></div>
                            <div class="stat-label">En cours</div>
                        </div>
                    </div>
                    
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <div class="stat-content">
                            <div class="stat-number"><?php echo $stats['devis_valides']; ?></div>
                            <div class="stat-label">Validés</div>
                        </div>
                    </div>
                    
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-download"></i>
                        </div>
                        <div class="stat-content">
                            <div class="stat-number"><?php echo $stats['ressources_telechargees']; ?></div>
                            <div class="stat-label">Ressources</div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Contenu principal du tableau de bord -->
            <div class="dashboard-content">
                <div class="content-grid">
                    <!-- Colonne principale -->
                    <div class="content-main">
                        <!-- Section des devis récents -->
                        <div class="dashboard-section">
                            <div class="section-header">
                                <h2>Mes derniers devis</h2>
                                <a href="/user/devis.php" class="btn btn-outline btn-sm">
                                    <i class="fas fa-eye"></i>
                                    <span>Voir tout</span>
                                </a>
                            </div>
                            
                            <div class="devis-list">
                                <?php foreach ($devis as $devis_item): ?>
                                <div class="devis-item">
                                    <div class="devis-info">
                                        <h3><?php echo htmlspecialchars($devis_item['service']); ?></h3>
                                        <div class="devis-meta">
                                            <span class="statut statut-<?php echo strtolower(str_replace(' ', '-', $devis_item['statut'])); ?>">
                                                <?php echo htmlspecialchars($devis_item['statut']); ?>
                                            </span>
                                            <span class="date">Demandé le <?php echo date('d/m/Y', strtotime($devis_item['date_demande'])); ?></span>
                                            <span class="montant"><?php echo htmlspecialchars($devis_item['montant']); ?></span>
                                        </div>
                                    </div>
                                    
                                    <div class="devis-progression">
                                        <div class="progression-bar">
                                            <div class="progression-fill" style="width: <?php echo $devis_item['progression']; ?>%"></div>
                                        </div>
                                        <span class="progression-text"><?php echo $devis_item['progression']; ?>%</span>
                                    </div>
                                    
                                    <div class="devis-actions">
                                        <a href="/user/devis.php?id=<?php echo $devis_item['id']; ?>" class="btn btn-primary btn-sm">
                                            <i class="fas fa-eye"></i>
                                            <span>Voir</span>
                                        </a>
                                    </div>
                                </div>
                                <?php endfor; ?>
                            </div>
                        </div>
                        
                        <!-- Section des ressources récentes -->
                        <div class="dashboard-section">
                            <div class="section-header">
                                <h2>Mes ressources récentes</h2>
                                <a href="/user/ressources.php" class="btn btn-outline btn-sm">
                                    <i class="fas fa-eye"></i>
                                    <span>Voir tout</span>
                                </a>
                            </div>
                            
                            <div class="ressources-list">
                                <?php foreach ($ressources as $ressource): ?>
                                <div class="ressource-item">
                                    <div class="ressource-icon">
                                        <i class="fas fa-<?php echo $ressource['type'] === 'PDF' ? 'file-pdf' : 'file-excel'; ?>"></i>
                                    </div>
                                    
                                    <div class="ressource-info">
                                        <h3><?php echo htmlspecialchars($ressource['titre']); ?></h3>
                                        <div class="ressource-meta">
                                            <span class="type"><?php echo htmlspecialchars($ressource['type']); ?></span>
                                            <span class="taille"><?php echo htmlspecialchars($ressource['taille']); ?></span>
                                            <span class="date">Téléchargé le <?php echo date('d/m/Y', strtotime($ressource['date_telechargement'])); ?></span>
                                        </div>
                                    </div>
                                    
                                    <div class="ressource-actions">
                                        <a href="/user/ressources.php?id=<?php echo $ressource['id']; ?>" class="btn btn-outline btn-sm">
                                            <i class="fas fa-download"></i>
                                            <span>Télécharger</span>
                                        </a>
                                    </div>
                                </div>
                                <?php endfor; ?>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Barre latérale -->
                    <div class="content-sidebar">
                        <!-- Actions rapides -->
                        <div class="sidebar-section">
                            <h3>Actions rapides</h3>
                            <div class="quick-actions">
                                <a href="/devis.php" class="quick-action">
                                    <i class="fas fa-calculator"></i>
                                    <span>Demander un devis</span>
                                </a>
                                
                                <a href="/rendez-vous.php" class="quick-action">
                                    <i class="fas fa-calendar-alt"></i>
                                    <span>Prendre rendez-vous</span>
                                </a>
                                
                                <a href="/ressources.php" class="quick-action">
                                    <i class="fas fa-download"></i>
                                    <span>Nouvelles ressources</span>
                                </a>
                                
                                <a href="/contact.php" class="quick-action">
                                    <i class="fas fa-envelope"></i>
                                    <span>Nous contacter</span>
                                </a>
                            </div>
                        </div>
                        
                        <!-- Informations du compte -->
                        <div class="sidebar-section">
                            <h3>Informations du compte</h3>
                            <div class="account-info">
                                <div class="info-item">
                                    <label>Nom :</label>
                                    <span><?php echo htmlspecialchars($user['nom']); ?></span>
                                </div>
                                
                                <div class="info-item">
                                    <label>Email :</label>
                                    <span><?php echo htmlspecialchars($user['email']); ?></span>
                                </div>
                                
                                <div class="info-item">
                                    <label>Entreprise :</label>
                                    <span><?php echo htmlspecialchars($user['entreprise']); ?></span>
                                </div>
                                
                                <div class="info-item">
                                    <label>Dernière connexion :</label>
                                    <span><?php echo date('d/m/Y H:i', strtotime($user['derniere_connexion'])); ?></span>
                                </div>
                            </div>
                            
                            <div class="account-actions">
                                <a href="/user/profil.php" class="btn btn-primary btn-full">
                                    <i class="fas fa-edit"></i>
                                    <span>Modifier mon profil</span>
                                </a>
                            </div>
                        </div>
                        
                        <!-- Support -->
                        <div class="sidebar-section">
                            <h3>Besoin d'aide ?</h3>
                            <p>Notre équipe est là pour vous accompagner dans tous vos projets.</p>
                            
                            <div class="support-actions">
                                <a href="/faq.php" class="btn btn-outline btn-sm">
                                    <i class="fas fa-question-circle"></i>
                                    <span>Consulter la FAQ</span>
                                </a>
                                
                                <a href="/contact.php" class="btn btn-primary btn-sm">
                                    <i class="fas fa-headset"></i>
                                    <span>Contacter le support</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
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
    
    const animatedElements = document.querySelectorAll('.stat-card, .devis-item, .ressource-item, .sidebar-section');
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
    const statsSection = document.querySelector('.dashboard-stats');
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
    const devisSection = document.querySelector('.devis-list');
    if (devisSection) {
        const devisObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateProgressBars();
                    devisObserver.unobserve(entry.target);
                }
            });
        });
        devisObserver.observe(devisSection);
    }
    
    // Gestion des actions rapides
    const quickActions = document.querySelectorAll('.quick-action');
    quickActions.forEach(action => {
        action.addEventListener('mouseenter', function() {
            this.style.transform = 'translateX(5px)';
        });
        
        action.addEventListener('mouseleave', function() {
            this.style.transform = 'translateX(0)';
        });
    });
    
    // Mise à jour de la dernière connexion
    const updateLastConnection = () => {
        const now = new Date();
        const lastConnection = document.querySelector('.info-item:last-child span');
        if (lastConnection) {
            lastConnection.textContent = now.toLocaleDateString('fr-FR') + ' ' + now.toLocaleTimeString('fr-FR', {hour: '2-digit', minute: '2-digit'});
        }
    };
    
    // Mettre à jour toutes les 5 minutes
    setInterval(updateLastConnection, 300000);
});
</script>

<?php
// Inclusion du pied de page
include '../includes/footer.php';
?>