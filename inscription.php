<?php
/**
 * Page d'inscription
 * Site professionnel de Maickel Okereke
 */

// Configuration de la page
$page_title = 'Inscription - Maickel Okereke';
$page_description = 'Créez votre compte personnel pour accéder à nos ressources et services. Inscription gratuite et rapide.';
$page_keywords = 'inscription, création compte, espace personnel, Maickel Okereke';

// Inclusion des fichiers nécessaires
require_once 'includes/functions.php';

// Traitement du formulaire d'inscription
$form_sent = false;
$form_errors = [];
$form_data = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupération et validation des données
    $form_data = [
        'nom' => $_POST['nom'] ?? '',
        'email' => $_POST['email'] ?? '',
        'telephone' => $_POST['telephone'] ?? '',
        'password' => $_POST['password'] ?? '',
        'password_confirm' => $_POST['password_confirm'] ?? '',
        'consentement' => isset($_POST['consentement'])
    ];
    
    // Validation des champs
    if (empty($form_data['nom'])) {
        $form_errors['nom'] = 'Le nom est obligatoire';
    }
    
    if (empty($form_data['email'])) {
        $form_errors['email'] = 'L\'email est obligatoire';
    } elseif (!filter_var($form_data['email'], FILTER_VALIDATE_EMAIL)) {
        $form_errors['email'] = 'L\'email n\'est pas valide';
    }
    
    if (empty($form_data['password'])) {
        $form_errors['password'] = 'Le mot de passe est obligatoire';
    } elseif (strlen($form_data['password']) < 8) {
        $form_errors['password'] = 'Le mot de passe doit contenir au moins 8 caractères';
    }
    
    if ($form_data['password'] !== $form_data['password_confirm']) {
        $form_errors['password_confirm'] = 'Les mots de passe ne correspondent pas';
    }
    
    if (!$form_data['consentement']) {
        $form_errors['consentement'] = 'Vous devez accepter les conditions d\'utilisation';
    }
    
    // Si pas d'erreurs, traitement de l'inscription
    if (empty($form_errors)) {
        // En production, ici on créerait l'utilisateur en base
        $form_sent = true;
        $form_data = [];
    }
}

// Inclusion du header
include 'includes/header.php';
?>

<!-- Section d'inscription -->
<section class="section section-registration">
    <div class="container">
        <div class="registration-container">
            <div class="registration-form-container">
                <div class="form-header">
                    <h2>Créer un compte</h2>
                    <p>Rejoignez notre communauté et accédez à nos ressources</p>
                </div>
                
                <?php if ($form_sent): ?>
                <div class="form-success">
                    <i class="fas fa-check-circle"></i>
                    <h3>Inscription réussie !</h3>
                    <p>Votre compte a été créé avec succès. Vous pouvez maintenant vous connecter.</p>
                    <a href="/login.php" class="btn btn-primary">Se connecter</a>
                </div>
                <?php else: ?>
                
                <form class="registration-form" method="POST" action="">
                    <div class="form-group <?php echo isset($form_errors['nom']) ? 'has-error' : ''; ?>">
                        <label for="nom">Nom complet *</label>
                        <div class="input-group">
                            <i class="fas fa-user"></i>
                            <input type="text" id="nom" name="nom" value="<?php echo htmlspecialchars($form_data['nom'] ?? ''); ?>" required placeholder="Votre nom complet">
                        </div>
                        <?php if (isset($form_errors['nom'])): ?>
                        <span class="error-message"><?php echo $form_errors['nom']; ?></span>
                        <?php endif; ?>
                    </div>
                    
                    <div class="form-group <?php echo isset($form_errors['email']) ? 'has-error' : ''; ?>">
                        <label for="email">Adresse email *</label>
                        <div class="input-group">
                            <i class="fas fa-envelope"></i>
                            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($form_data['email'] ?? ''); ?>" required placeholder="votre@email.com">
                        </div>
                        <?php if (isset($form_errors['email'])): ?>
                        <span class="error-message"><?php echo $form_errors['email']; ?></span>
                        <?php endif; ?>
                    </div>
                    
                    <div class="form-group">
                        <label for="telephone">Téléphone</label>
                        <div class="input-group">
                            <i class="fas fa-phone"></i>
                            <input type="tel" id="telephone" name="telephone" value="<?php echo htmlspecialchars($form_data['telephone'] ?? ''); ?>" placeholder="Votre numéro de téléphone">
                        </div>
                    </div>
                    
                    <div class="form-group <?php echo isset($form_errors['password']) ? 'has-error' : ''; ?>">
                        <label for="password">Mot de passe *</label>
                        <div class="input-group">
                            <i class="fas fa-lock"></i>
                            <input type="password" id="password" name="password" required placeholder="Minimum 8 caractères">
                            <button type="button" class="password-toggle" aria-label="Afficher/masquer le mot de passe">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                        <div class="password-strength" id="password-strength">
                            <div class="strength-bar">
                                <div class="strength-fill" id="strength-fill"></div>
                            </div>
                            <span class="strength-text" id="strength-text">Force du mot de passe</span>
                        </div>
                        <?php if (isset($form_errors['password'])): ?>
                        <span class="error-message"><?php echo $form_errors['password']; ?></span>
                        <?php endif; ?>
                    </div>
                    
                    <div class="form-group <?php echo isset($form_errors['password_confirm']) ? 'has-error' : ''; ?>">
                        <label for="password_confirm">Confirmer le mot de passe *</label>
                        <div class="input-group">
                            <i class="fas fa-lock"></i>
                            <input type="password" id="password_confirm" name="password_confirm" required placeholder="Confirmez votre mot de passe">
                        </div>
                        <?php if (isset($form_errors['password_confirm'])): ?>
                        <span class="error-message"><?php echo $form_errors['password_confirm']; ?></span>
                        <?php endif; ?>
                    </div>
                    
                    <div class="form-group <?php echo isset($form_errors['consentement']) ? 'has-error' : ''; ?>">
                        <div class="form-checkbox">
                            <label>
                                <input type="checkbox" name="consentement" required>
                                <span>J'accepte les <a href="/politique-de-confidentialite.php" target="_blank">conditions d'utilisation</a> et la <a href="/politique-de-confidentialite.php" target="_blank">politique de confidentialité</a> *</span>
                            </label>
                        </div>
                        <?php if (isset($form_errors['consentement'])): ?>
                        <span class="error-message"><?php echo $form_errors['consentement']; ?></span>
                        <?php endif; ?>
                    </div>
                    
                    <button type="submit" class="btn btn-primary btn-full">
                        <i class="fas fa-user-plus"></i>
                        <span>Créer mon compte</span>
                    </button>
                </form>
                
                <div class="form-footer">
                    <p>Déjà un compte ? <a href="/login.php">Connectez-vous</a></p>
                </div>
                
                <?php endif; ?>
            </div>
            
            <div class="registration-benefits">
                <div class="benefits-header">
                    <h3>Pourquoi créer un compte ?</h3>
                    <p>Accédez à de nombreux avantages exclusifs</p>
                </div>
                
                <div class="benefits-list">
                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <i class="fas fa-download"></i>
                        </div>
                        <div class="benefit-content">
                            <h4>Ressources exclusives</h4>
                            <p>Accédez à nos guides premium, templates et outils exclusifs</p>
                        </div>
                    </div>
                    
                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <i class="fas fa-tasks"></i>
                        </div>
                        <div class="benefit-content">
                            <h4>Suivi de vos demandes</h4>
                            <p>Consultez l'état de vos devis et rendez-vous en temps réel</p>
                        </div>
                    </div>
                    
                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <i class="fas fa-bell"></i>
                        </div>
                        <div class="benefit-content">
                            <h4>Notifications personnalisées</h4>
                            <p>Recevez des alertes sur nos nouvelles ressources et offres</p>
                        </div>
                    </div>
                    
                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="benefit-content">
                            <h4>Communauté d'experts</h4>
                            <p>Échangez avec d'autres entrepreneurs et professionnels</p>
                        </div>
                    </div>
                </div>
                
                <div class="security-info">
                    <h4>Vos données sont sécurisées</h4>
                    <ul>
                        <li><i class="fas fa-shield-alt"></i> Chiffrement SSL/TLS</li>
                        <li><i class="fas fa-lock"></i> Mots de passe hashés</li>
                        <li><i class="fas fa-eye-slash"></i> Aucune donnée partagée</li>
                        <li><i class="fas fa-user-check"></i> Conformité RGPD</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section statistiques -->
<section class="section section-stats">
    <div class="container">
        <div class="section-header">
            <h2>Notre communauté en chiffres</h2>
            <p>Rejoignez des milliers d'entrepreneurs satisfaits</p>
        </div>
        
        <div class="stats-grid">
            <div class="stat-item">
                <div class="stat-number" data-target="2500">0</div>
                <div class="stat-label">Membres actifs</div>
            </div>
            <div class="stat-item">
                <div class="stat-number" data-target="15000">0</div>
                <div class="stat-label">Ressources téléchargées</div>
            </div>
            <div class="stat-item">
                <div class="stat-number" data-target="98">0</div>
                <div class="stat-label">% de satisfaction</div>
            </div>
            <div class="stat-item">
                <div class="stat-number" data-target="24">0</div>
                <div class="stat-label">h de réponse</div>
            </div>
        </div>
    </div>
</section>

<!-- Section CTA -->
<section class="section section-cta">
    <div class="container">
        <div class="cta-content">
            <h2>Prêt à rejoindre notre communauté ?</h2>
            <p>Créez votre compte gratuitement et accédez immédiatement à nos ressources exclusives.</p>
            <div class="cta-actions">
                <a href="#top" class="btn btn-primary">
                    <i class="fas fa-user-plus"></i>
                    <span>Créer mon compte</span>
                </a>
                <a href="/contact.php" class="btn btn-outline">
                    <i class="fas fa-question-circle"></i>
                    <span>Des questions ?</span>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- JavaScript spécifique à la page -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Gestion de la visibilité du mot de passe
    const passwordToggle = document.querySelector('.password-toggle');
    const passwordInput = document.getElementById('password');
    
    if (passwordToggle && passwordInput) {
        passwordToggle.addEventListener('click', function() {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            
            const icon = this.querySelector('i');
            icon.className = type === 'password' ? 'fas fa-eye' : 'fas fa-eye-slash';
        });
    }
    
    // Indicateur de force du mot de passe
    const passwordInput2 = document.getElementById('password');
    const strengthFill = document.getElementById('strength-fill');
    const strengthText = document.getElementById('strength-text');
    
    if (passwordInput2 && strengthFill && strengthText) {
        passwordInput2.addEventListener('input', function() {
            const password = this.value;
            const strength = calculatePasswordStrength(password);
            updatePasswordStrength(strength);
        });
    }
    
    function calculatePasswordStrength(password) {
        let score = 0;
        
        if (password.length >= 8) score += 1;
        if (password.match(/[a-z]/)) score += 1;
        if (password.match(/[A-Z]/)) score += 1;
        if (password.match(/[0-9]/)) score += 1;
        if (password.match(/[^a-zA-Z0-9]/)) score += 1;
        
        return score;
    }
    
    function updatePasswordStrength(strength) {
        const percentages = [0, 20, 40, 60, 80, 100];
        const colors = ['#dc2626', '#ea580c', '#d97706', '#ca8a04', '#65a30d', '#16a34a'];
        const texts = ['Très faible', 'Faible', 'Moyen', 'Bon', 'Très bon', 'Excellent'];
        
        strengthFill.style.width = percentages[strength] + '%';
        strengthFill.style.backgroundColor = colors[strength];
        strengthText.textContent = texts[strength];
    }
    
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
                    stat.textContent = Math.ceil(current) + (stat.textContent.includes('+') ? '+' : '') + (stat.textContent.includes('%') ? '%' : '');
                    requestAnimationFrame(updateStat);
                } else {
                    stat.textContent = stat.textContent.replace(stat.textContent, target + (stat.textContent.includes('+') ? '+' : '') + (stat.textContent.includes('%') ? '%' : ''));
                }
            };
            
            updateStat();
        });
    };
    
    // Déclencher l'animation quand la section est visible
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                animateStats();
                observer.unobserve(entry.target);
            }
        });
    });
    
    const statsSection = document.querySelector('.section-stats');
    if (statsSection) {
        observer.observe(statsSection);
    }
});
</script>

<?php
// Inclusion du pied de page
include 'includes/footer.php';
?>