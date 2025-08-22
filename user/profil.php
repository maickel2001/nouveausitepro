<?php
/**
 * Profil utilisateur - Espace utilisateur
 * Site professionnel de Maickel Okereke
 */

// Configuration de la page
$page_title = 'Mon profil - Espace utilisateur - Maickel Okereke';
$page_description = 'Gérez vos informations personnelles et vos paramètres de compte dans votre espace utilisateur.';
$page_keywords = 'profil, compte, paramètres, espace utilisateur, Maickel Okereke';

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

// Données utilisateur simulées (en production, viendraient de la base de données)
$user = [
    'id' => $_SESSION['user_id'] ?? 1,
    'nom' => 'Jean Dupont',
    'prenom' => 'Jean',
    'email' => 'jean.dupont@example.com',
    'telephone' => '06 12 34 56 78',
    'entreprise' => 'Entreprise ABC',
    'secteur' => 'Services',
    'taille_entreprise' => '10-50 employés',
    'adresse' => '123 Rue de la Paix',
    'code_postal' => '75001',
    'ville' => 'Paris',
    'pays' => 'France',
    'date_inscription' => '2024-01-15',
    'derniere_connexion' => '2024-08-22 14:30:00',
    'newsletter' => true,
    'notifications_email' => true,
    'notifications_sms' => false
];

// Traitement des formulaires
$message_success = '';
$message_error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        switch ($_POST['action']) {
            case 'update_profile':
                // Mise à jour du profil
                $user['nom'] = $_POST['nom'] ?? $user['nom'];
                $user['prenom'] = $_POST['prenom'] ?? $user['prenom'];
                $user['telephone'] = $_POST['telephone'] ?? $user['telephone'];
                $user['entreprise'] = $_POST['entreprise'] ?? $user['entreprise'];
                $user['secteur'] = $_POST['secteur'] ?? $user['secteur'];
                $user['taille_entreprise'] = $_POST['taille_entreprise'] ?? $user['taille_entreprise'];
                $user['adresse'] = $_POST['adresse'] ?? $user['adresse'];
                $user['code_postal'] = $_POST['code_postal'] ?? $user['code_postal'];
                $user['ville'] = $_POST['ville'] ?? $user['ville'];
                $user['pays'] = $_POST['pays'] ?? $user['pays'];
                
                $message_success = 'Votre profil a été mis à jour avec succès !';
                break;
                
            case 'update_password':
                // Mise à jour du mot de passe
                $ancien_mot_de_passe = $_POST['ancien_mot_de_passe'] ?? '';
                $nouveau_mot_de_passe = $_POST['nouveau_mot_de_passe'] ?? '';
                $confirmation_mot_de_passe = $_POST['confirmation_mot_de_passe'] ?? '';
                
                if (empty($ancien_mot_de_passe) || empty($nouveau_mot_de_passe) || empty($confirmation_mot_de_passe)) {
                    $message_error = 'Tous les champs sont obligatoires.';
                } elseif ($nouveau_mot_de_passe !== $confirmation_mot_de_passe) {
                    $message_error = 'Les nouveaux mots de passe ne correspondent pas.';
                } elseif (strlen($nouveau_mot_de_passe) < 8) {
                    $message_error = 'Le nouveau mot de passe doit contenir au moins 8 caractères.';
                } else {
                    $message_success = 'Votre mot de passe a été modifié avec succès !';
                }
                break;
                
            case 'update_preferences':
                // Mise à jour des préférences
                $user['newsletter'] = isset($_POST['newsletter']);
                $user['notifications_email'] = isset($_POST['notifications_email']);
                $user['notifications_sms'] = isset($_POST['notifications_sms']);
                
                $message_success = 'Vos préférences ont été mises à jour avec succès !';
                break;
        }
    }
}

// Inclusion de l'en-tête
include '../includes/header.php';
?>
<!-- CSS spécifique à la page -->
<link rel="stylesheet" href="/assets/css/user-profil.css">
<?php
?>

<!-- Section du profil -->
<section class="section section-user-profile">
    <div class="container">
        <div class="profile-container">
            <!-- En-tête de la page -->
            <div class="page-header">
                <div class="header-content">
                    <h1>Mon profil</h1>
                    <p>Gérez vos informations personnelles et vos paramètres de compte</p>
                </div>
                
                <div class="header-actions">
                    <a href="/user/dashboard.php" class="btn btn-outline">
                        <i class="fas fa-arrow-left"></i>
                        <span>Retour au tableau de bord</span>
                    </a>
                </div>
            </div>
            
            <!-- Messages de notification -->
            <?php if (!empty($message_success)): ?>
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i>
                <span><?php echo htmlspecialchars($message_success); ?></span>
            </div>
            <?php endif; ?>
            
            <?php if (!empty($message_error)): ?>
            <div class="alert alert-error">
                <i class="fas fa-exclamation-circle"></i>
                <span><?php echo htmlspecialchars($message_error); ?></span>
            </div>
            <?php endif; ?>
            
            <!-- Contenu du profil -->
            <div class="profile-content">
                <div class="content-grid">
                    <!-- Colonne principale -->
                    <div class="content-main">
                        <!-- Informations personnelles -->
                        <div class="profile-section">
                            <div class="section-header">
                                <h2>Informations personnelles</h2>
                                <p>Modifiez vos informations de base</p>
                            </div>
                            
                            <form class="profile-form" method="POST" action="">
                                <input type="hidden" name="action" value="update_profile">
                                
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="prenom">Prénom *</label>
                                        <input type="text" id="prenom" name="prenom" value="<?php echo htmlspecialchars($user['prenom']); ?>" required>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="nom">Nom *</label>
                                        <input type="text" id="nom" name="nom" value="<?php echo htmlspecialchars($user['nom']); ?>" required>
                                    </div>
                                </div>
                                
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="email">Email *</label>
                                        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" readonly>
                                        <small>L'email ne peut pas être modifié. Contactez-nous si nécessaire.</small>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="telephone">Téléphone</label>
                                        <input type="tel" id="telephone" name="telephone" value="<?php echo htmlspecialchars($user['telephone']); ?>">
                                    </div>
                                </div>
                                
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="entreprise">Nom de l'entreprise</label>
                                        <input type="text" id="entreprise" name="entreprise" value="<?php echo htmlspecialchars($user['entreprise']); ?>">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="secteur">Secteur d'activité</label>
                                        <select id="secteur" name="secteur">
                                            <option value="">Sélectionnez un secteur</option>
                                            <option value="Services" <?php echo $user['secteur'] === 'Services' ? 'selected' : ''; ?>>Services</option>
                                            <option value="Commerce" <?php echo $user['secteur'] === 'Commerce' ? 'selected' : ''; ?>>Commerce</option>
                                            <option value="Industrie" <?php echo $user['secteur'] === 'Industrie' ? 'selected' : ''; ?>>Industrie</option>
                                            <option value="Construction" <?php echo $user['secteur'] === 'Construction' ? 'selected' : ''; ?>>Construction</option>
                                            <option value="Santé" <?php echo $user['secteur'] === 'Santé' ? 'selected' : ''; ?>>Santé</option>
                                            <option value="Éducation" <?php echo $user['secteur'] === 'Éducation' ? 'selected' : ''; ?>>Éducation</option>
                                            <option value="Autre" <?php echo $user['secteur'] === 'Autre' ? 'selected' : ''; ?>>Autre</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="taille_entreprise">Taille de l'entreprise</label>
                                    <select id="taille_entreprise" name="taille_entreprise">
                                        <option value="">Sélectionnez une taille</option>
                                        <option value="1-9 employés" <?php echo $user['taille_entreprise'] === '1-9 employés' ? 'selected' : ''; ?>>1-9 employés</option>
                                        <option value="10-50 employés" <?php echo $user['taille_entreprise'] === '10-50 employés' ? 'selected' : ''; ?>>10-50 employés</option>
                                        <option value="51-200 employés" <?php echo $user['taille_entreprise'] === '51-200 employés' ? 'selected' : ''; ?>>51-200 employés</option>
                                        <option value="201-500 employés" <?php echo $user['taille_entreprise'] === '201-500 employés' ? 'selected' : ''; ?>>201-500 employés</option>
                                        <option value="500+ employés" <?php echo $user['taille_entreprise'] === '500+ employés' ? 'selected' : ''; ?>>500+ employés</option>
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label for="adresse">Adresse</label>
                                    <input type="text" id="adresse" name="adresse" value="<?php echo htmlspecialchars($user['adresse']); ?>">
                                </div>
                                
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="code_postal">Code postal</label>
                                        <input type="text" id="code_postal" name="code_postal" value="<?php echo htmlspecialchars($user['code_postal']); ?>">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="ville">Ville</label>
                                        <input type="text" id="ville" name="ville" value="<?php echo htmlspecialchars($user['ville']); ?>">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="pays">Pays</label>
                                    <select id="pays" name="pays">
                                        <option value="France" <?php echo $user['pays'] === 'France' ? 'selected' : ''; ?>>France</option>
                                        <option value="Belgique" <?php echo $user['pays'] === 'Belgique' ? 'selected' : ''; ?>>Belgique</option>
                                        <option value="Suisse" <?php echo $user['pays'] === 'Suisse' ? 'selected' : ''; ?>>Suisse</option>
                                        <option value="Luxembourg" <?php echo $user['pays'] === 'Luxembourg' ? 'selected' : ''; ?>>Luxembourg</option>
                                        <option value="Canada" <?php echo $user['pays'] === 'Canada' ? 'selected' : ''; ?>>Canada</option>
                                        <option value="Autre" <?php echo $user['pays'] === 'Autre' ? 'selected' : ''; ?>>Autre</option>
                                    </select>
                                </div>
                                
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save"></i>
                                        <span>Enregistrer les modifications</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                        
                        <!-- Modification du mot de passe -->
                        <div class="profile-section">
                            <div class="section-header">
                                <h2>Modifier le mot de passe</h2>
                                <p>Changez votre mot de passe de connexion</p>
                            </div>
                            
                            <form class="password-form" method="POST" action="">
                                <input type="hidden" name="action" value="update_password">
                                
                                <div class="form-group">
                                    <label for="ancien_mot_de_passe">Mot de passe actuel *</label>
                                    <div class="password-input">
                                        <input type="password" id="ancien_mot_de_passe" name="ancien_mot_de_passe" required>
                                        <button type="button" class="password-toggle" onclick="togglePassword('ancien_mot_de_passe')">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="nouveau_mot_de_passe">Nouveau mot de passe *</label>
                                    <div class="password-input">
                                        <input type="password" id="nouveau_mot_de_passe" name="nouveau_mot_de_passe" required>
                                        <button type="button" class="password-toggle" onclick="togglePassword('nouveau_mot_de_passe')">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </div>
                                    <div class="password-strength" id="password-strength"></div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="confirmation_mot_de_passe">Confirmer le nouveau mot de passe *</label>
                                    <div class="password-input">
                                        <input type="password" id="confirmation_mot_de_passe" name="confirmation_mot_de_passe" required>
                                        <button type="button" class="password-toggle" onclick="togglePassword('confirmation_mot_de_passe')">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </div>
                                </div>
                                
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-warning">
                                        <i class="fas fa-key"></i>
                                        <span>Modifier le mot de passe</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                        
                        <!-- Préférences de communication -->
                        <div class="profile-section">
                            <div class="section-header">
                                <h2>Préférences de communication</h2>
                                <p>Gérez vos préférences de notifications et communications</p>
                            </div>
                            
                            <form class="preferences-form" method="POST" action="">
                                <input type="hidden" name="action" value="update_preferences">
                                
                                <div class="form-group checkbox-group">
                                    <label class="checkbox-label">
                                        <input type="checkbox" name="newsletter" <?php echo $user['newsletter'] ? 'checked' : ''; ?>>
                                        <span class="checkmark"></span>
                                        Recevoir la newsletter mensuelle
                                    </label>
                                    <small>Recevez nos derniers articles, conseils et actualités</small>
                                </div>
                                
                                <div class="form-group checkbox-group">
                                    <label class="checkbox-label">
                                        <input type="checkbox" name="notifications_email" <?php echo $user['notifications_email'] ? 'checked' : ''; ?>>
                                        <span class="checkmark"></span>
                                        Notifications par email
                                    </label>
                                    <small>Recevez des notifications importantes par email</small>
                                </div>
                                
                                <div class="form-group checkbox-group">
                                    <label class="checkbox-label">
                                        <input type="checkbox" name="notifications_sms" <?php echo $user['notifications_sms'] ? 'checked' : ''; ?>>
                                        <span class="checkmark"></span>
                                        Notifications par SMS
                                    </label>
                                    <small>Recevez des alertes urgentes par SMS</small>
                                </div>
                                
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save"></i>
                                        <span>Enregistrer les préférences</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    
                    <!-- Barre latérale -->
                    <div class="content-sidebar">
                        <!-- Résumé du profil -->
                        <div class="sidebar-section">
                            <h3>Résumé du profil</h3>
                            <div class="profile-summary">
                                <div class="profile-avatar">
                                    <i class="fas fa-user"></i>
                                </div>
                                
                                <div class="profile-info">
                                    <h4><?php echo htmlspecialchars($user['prenom'] . ' ' . $user['nom']); ?></h4>
                                    <p><?php echo htmlspecialchars($user['entreprise']); ?></p>
                                    <p class="profile-email"><?php echo htmlspecialchars($user['email']); ?></p>
                                </div>
                                
                                <div class="profile-stats">
                                    <div class="stat-item">
                                        <div class="stat-number"><?php echo date('d/m/Y', strtotime($user['date_inscription'])); ?></div>
                                        <div class="stat-label">Membre depuis</div>
                                    </div>
                                    
                                    <div class="stat-item">
                                        <div class="stat-number"><?php echo date('H:i', strtotime($user['derniere_connexion'])); ?></div>
                                        <div class="stat-label">Dernière connexion</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Actions rapides -->
                        <div class="sidebar-section">
                            <h3>Actions rapides</h3>
                            <div class="quick-actions">
                                <a href="/user/dashboard.php" class="quick-action">
                                    <i class="fas fa-tachometer-alt"></i>
                                    <span>Tableau de bord</span>
                                </a>
                                
                                <a href="/user/devis.php" class="quick-action">
                                    <i class="fas fa-file-invoice"></i>
                                    <span>Mes devis</span>
                                </a>
                                
                                <a href="/user/ressources.php" class="quick-action">
                                    <i class="fas fa-download"></i>
                                    <span>Mes ressources</span>
                                </a>
                                
                                <a href="/contact.php" class="quick-action">
                                    <i class="fas fa-envelope"></i>
                                    <span>Nous contacter</span>
                                </a>
                            </div>
                        </div>
                        
                        <!-- Sécurité du compte -->
                        <div class="sidebar-section">
                            <h3>Sécurité du compte</h3>
                            <div class="security-info">
                                <div class="security-item">
                                    <i class="fas fa-shield-alt"></i>
                                    <div class="security-text">
                                        <h4>Connexion sécurisée</h4>
                                        <p>Votre compte est protégé par des mesures de sécurité avancées</p>
                                    </div>
                                </div>
                                
                                <div class="security-item">
                                    <i class="fas fa-clock"></i>
                                    <div class="security-text">
                                        <h4>Session active</h4>
                                        <p>Dernière connexion : <?php echo date('d/m/Y H:i', strtotime($user['derniere_connexion'])); ?></p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="security-actions">
                                <a href="/logout.php" class="btn btn-outline btn-full">
                                    <i class="fas fa-sign-out-alt"></i>
                                    <span>Se déconnecter</span>
                                </a>
                            </div>
                        </div>
                        
                        <!-- Support -->
                        <div class="sidebar-section">
                            <h3>Besoin d'aide ?</h3>
                            <p>Notre équipe est là pour vous accompagner dans la gestion de votre compte.</p>
                            
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
    
    const animatedElements = document.querySelectorAll('.profile-section, .sidebar-section');
    animatedElements.forEach(el => observer.observe(el));
    
    // Validation en temps réel du formulaire de mot de passe
    const nouveauMotDePasse = document.getElementById('nouveau_mot_de_passe');
    const confirmationMotDePasse = document.getElementById('confirmation_mot_de_passe');
    const passwordStrength = document.getElementById('password-strength');
    
    if (nouveauMotDePasse && confirmationMotDePasse) {
        nouveauMotDePasse.addEventListener('input', function() {
            validatePassword(this.value);
            checkPasswordMatch();
        });
        
        confirmationMotDePasse.addEventListener('input', function() {
            checkPasswordMatch();
        });
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
    
    // Gestion des formulaires
    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            // Validation basique avant envoi
            const requiredFields = this.querySelectorAll('[required]');
            let isValid = true;
            
            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    field.classList.add('error');
                    isValid = false;
                } else {
                    field.classList.remove('error');
                }
            });
            
            if (!isValid) {
                e.preventDefault();
                showNotification('Veuillez remplir tous les champs obligatoires', 'error');
            }
        });
    });
});

// Fonction pour basculer la visibilité du mot de passe
function togglePassword(fieldId) {
    const field = document.getElementById(fieldId);
    const button = field.nextElementSibling;
    const icon = button.querySelector('i');
    
    if (field.type === 'password') {
        field.type = 'text';
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
    } else {
        field.type = 'password';
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
    }
}

// Fonction pour valider la force du mot de passe
function validatePassword(password) {
    const strength = document.getElementById('password-strength');
    let score = 0;
    let feedback = '';
    
    if (password.length >= 8) score++;
    if (/[a-z]/.test(password)) score++;
    if (/[A-Z]/.test(password)) score++;
    if (/[0-9]/.test(password)) score++;
    if (/[^A-Za-z0-9]/.test(password)) score++;
    
    switch (score) {
        case 0:
        case 1:
            feedback = '<span class="strength-weak">Très faible</span>';
            break;
        case 2:
            feedback = '<span class="strength-weak">Faible</span>';
            break;
        case 3:
            feedback = '<span class="strength-medium">Moyen</span>';
            break;
        case 4:
            feedback = '<span class="strength-strong">Fort</span>';
            break;
        case 5:
            feedback = '<span class="strength-very-strong">Très fort</span>';
            break;
    }
    
    strength.innerHTML = `Force du mot de passe : ${feedback}`;
}

// Fonction pour vérifier la correspondance des mots de passe
function checkPasswordMatch() {
    const nouveauMotDePasse = document.getElementById('nouveau_mot_de_passe');
    const confirmationMotDePasse = document.getElementById('confirmation_mot_de_passe');
    
    if (nouveauMotDePasse && confirmationMotDePasse) {
        if (nouveauMotDePasse.value && confirmationMotDePasse.value) {
            if (nouveauMotDePasse.value === confirmationMotDePasse.value) {
                confirmationMotDePasse.classList.remove('error');
                confirmationMotDePasse.classList.add('success');
            } else {
                confirmationMotDePasse.classList.remove('success');
                confirmationMotDePasse.classList.add('error');
            }
        }
    }
}

// Fonction pour afficher des notifications
function showNotification(message, type = 'info') {
    const notification = document.createElement('div');
    notification.className = `notification notification-${type}`;
    notification.innerHTML = `
        <i class="fas fa-${type === 'success' ? 'check-circle' : type === 'error' ? 'exclamation-circle' : 'info-circle'}"></i>
        <span>${message}</span>
    `;
    
    document.body.appendChild(notification);
    
    // Supprimer la notification après 5 secondes
    setTimeout(() => {
        notification.remove();
    }, 5000);
}

// Mise à jour automatique de la dernière connexion
function updateLastConnection() {
    const now = new Date();
    const lastConnectionElement = document.querySelector('.stat-item:last-child .stat-number');
    if (lastConnectionElement) {
        lastConnectionElement.textContent = now.toLocaleTimeString('fr-FR', {hour: '2-digit', minute: '2-digit'});
    }
}

// Mettre à jour toutes les minutes
setInterval(updateLastConnection, 60000);
</script>

<?php
// Inclusion du pied de page
include '../includes/footer.php';
?>