<?php
/**
 * Page d'inscription
 * Site professionnel de Maickel Okereke
 */

// Configuration de la page
$page_title = 'Inscription - Maickel Okereke';
$page_description = 'Créez votre compte gratuitement pour accéder à nos ressources premium et suivre vos demandes.';
$page_keywords = 'inscription, création compte, espace personnel, Maickel Okereke';

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
        'societe' => $_POST['societe'] ?? '',
        'password' => $_POST['password'] ?? '',
        'password_confirm' => $_POST['password_confirm'] ?? '',
        'consentement' => isset($_POST['consentement']),
        'newsletter' => isset($_POST['newsletter'])
    ];
    
    // Validation des champs
    if (empty($form_data['nom'])) {
        $form_errors['nom'] = 'Le nom est obligatoire';
    } elseif (strlen($form_data['nom']) < 2) {
        $form_errors['nom'] = 'Le nom doit contenir au moins 2 caractères';
    }
    
    if (empty($form_data['email'])) {
        $form_errors['email'] = 'L\'email est obligatoire';
    } elseif (!filter_var($form_data['email'], FILTER_VALIDATE_EMAIL)) {
        $form_errors['email'] = 'L\'email n\'est pas valide';
    }
    
    if (!empty($form_data['telephone'])) {
        if (!preg_match('/^[\+]?[0-9\s\-\(\)]{10,}$/', $form_data['telephone'])) {
            $form_errors['telephone'] = 'Le numéro de téléphone n\'est pas valide';
        }
    }
    
    if (empty($form_data['password'])) {
        $form_errors['password'] = 'Le mot de passe est obligatoire';
    } elseif (strlen($form_data['password']) < 8) {
        $form_errors['password'] = 'Le mot de passe doit contenir au moins 8 caractères';
    } elseif (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)/', $form_data['password'])) {
        $form_errors['password'] = 'Le mot de passe doit contenir au moins une minuscule, une majuscule et un chiffre';
    }
    
    if ($form_data['password'] !== $form_data['password_confirm']) {
        $form_errors['password_confirm'] = 'Les mots de passe ne correspondent pas';
    }
    
    if (!$form_data['consentement']) {
        $form_errors['consentement'] = 'Vous devez accepter les conditions d\'utilisation';
    }
    
    // Si pas d'erreurs, traitement de l'inscription
    if (empty($form_errors)) {
        // En production, ici on créerait le compte en base
        // Simulation d'une inscription réussie
        $form_sent = true;
        
        // Réinitialisation des données
        $form_data = [];
    }
}

// En-tête de page personnalisé
$page_header = '
<div class="page-header-content">
    <h1>Créer un compte</h1>
    <p>Rejoignez notre communauté et accédez à nos ressources premium</p>
</div>
';

// Inclusion de l\'en-tête
include 'includes/header.php';
?>

<!-- Section d\'inscription -->
<section class="section section-register">
    <div class="container">
        <div class="register-container">
            <div class="register-form-container">
                <div class="form-header">
                    <h2>Créer votre compte</h2>
                    <p>Rejoignez notre communauté d\'entrepreneurs et de professionnels</p>
                </div>
                
                <?php if ($form_sent): ?>
                <div class="form-success">
                    <div class="success-icon">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <h3>Compte créé avec succès !</h3>
                    <p>Votre compte a été créé avec succès. Vous pouvez maintenant vous connecter et accéder à toutes nos ressources premium.</p>
                    <div class="success-actions">
                        <a href="/login.php" class="btn btn-primary">
                            <i class="fas fa-sign-in-alt"></i>
                            <span>Se connecter</span>
                        </a>
                        <a href="/" class="btn btn-outline">
                            <i class="fas fa-home"></i>
                            <span>Retour à l\'accueil</span>
                        </a>
                    </div>
                </div>
                <?php else: ?>
                
                <form class="register-form" method="POST" action="">
                    <div class="form-row">
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
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group <?php echo isset($form_errors['telephone']) ? 'has-error' : ''; ?>">
                            <label for="telephone">Téléphone</label>
                            <div class="input-group">
                                <i class="fas fa-phone"></i>
                                <input type="tel" id="telephone" name="telephone" value="<?php echo htmlspecialchars($form_data['telephone'] ?? ''); ?>" placeholder="Votre numéro de téléphone">
                            </div>
                            <?php if (isset($form_errors['telephone'])): ?>
                            <span class="error-message"><?php echo $form_errors['telephone']; ?></span>
                            <?php endif; ?>
                        </div>
                        
                        <div class="form-group">
                            <label for="societe">Société</label>
                            <div class="input-group">
                                <i class="fas fa-building"></i>
                                <input type="text" id="societe" name="societe" value="<?php echo htmlspecialchars($form_data['societe'] ?? ''); ?>" placeholder="Nom de votre entreprise">
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group <?php echo isset($form_errors['password']) ? 'has-error' : ''; ?>">
                            <label for="password">Mot de passe *</label>
                            <div class="input-group">
                                <i class="fas fa-lock"></i>
                                <input type="password" id="password" name="password" required placeholder="Votre mot de passe">
                                <button type="button" class="password-toggle" aria-label="Afficher/masquer le mot de passe">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                            <?php if (isset($form_errors['password'])): ?>
                            <span class="error-message"><?php echo $form_errors['password']; ?></span>
                            <?php endif; ?>
                            <div class="password-strength" id="password-strength">
                                <div class="strength-bar">
                                    <div class="strength-fill" id="strength-fill"></div>
                                </div>
                                <span class="strength-text" id="strength-text">Force du mot de passe</span>
                            </div>
                        </div>
                        
                        <div class="form-group <?php echo isset($form_errors['password_confirm']) ? 'has-error' : ''; ?>">
                            <label for="password_confirm">Confirmer le mot de passe *</label>
                            <div class="input-group">
                                <i class="fas fa-lock"></i>
                                <input type="password" id="password_confirm" name="password_confirm" required placeholder="Confirmez votre mot de passe">
                                <button type="button" class="password-toggle" aria-label="Afficher/masquer le mot de passe">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                            <?php if (isset($form_errors['password_confirm'])): ?>
                            <span class="error-message"><?php echo $form_errors['password_confirm']; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                    
                    <div class="form-group <?php echo isset($form_errors['consentement']) ? 'has-error' : ''; ?>">
                        <div class="form-checkbox">
                            <label>
                                <input type="checkbox" name="consentement" <?php echo ($form_data['consentement'] ?? false) ? 'checked' : ''; ?> required>
                                <span>J\'accepte les <a href="/mentions-legales.php" target="_blank">conditions d\'utilisation</a> et la <a href="/politique-de-confidentialite.php" target="_blank">politique de confidentialité</a> *</span>
                            </label>
                            <?php if (isset($form_errors['consentement'])): ?>
                            <span class="error-message"><?php echo $form_errors['consentement']; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="form-checkbox">
                            <label>
                                <input type="checkbox" name="newsletter" <?php echo ($form_data['newsletter'] ?? false) ? 'checked' : ''; ?>>
                                <span>J\'accepte de recevoir la newsletter avec nos actualités et conseils (optionnel)</span>
                            </label>
                        </div>
                    </div>
                    
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary btn-full">
                            <i class="fas fa-user-plus"></i>
                            <span>Créer mon compte</span>
                        </button>
                    </div>
                </form>
                
                <div class="form-footer">
                    <p>Vous avez déjà un compte ? <a href="/login.php">Se connecter</a></p>
                </div>
                <?php endif; ?>
            </div>
            
            <div class="register-info">
                <div class="info-content">
                    <h3>Rejoignez notre communauté</h3>
                    <p>En créant votre compte, vous accédez à :</p>
                    
                    <ul class="benefits-list">
                        <li>
                            <div class="benefit-icon">
                                <i class="fas fa-crown"></i>
                            </div>
                            <div class="benefit-content">
                                <h4>Ressources premium</h4>
                                <p>Guides, templates et outils exclusifs pour votre entreprise</p>
                            </div>
                        </li>
                        
                        <li>
                            <div class="benefit-icon">
                                <i class="fas fa-chart-line"></i>
                            </div>
                            <div class="benefit-content">
                                <h4>Suivi personnalisé</h4>
                                <p>Consultez l\'état de vos demandes et projets en temps réel</p>
                            </div>
                        </li>
                        
                        <li>
                            <div class="benefit-icon">
                                <i class="fas fa-bell"></i>
                            </div>
                            <div class="benefit-content">
                                <h4>Notifications</h4>
                                <p>Recevez des alertes personnalisées sur vos projets</p>
                            </div>
                        </li>
                        
                        <li>
                            <div class="benefit-icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <div class="benefit-content">
                                <h4>Communauté</h4>
                                <p>Échangez avec d\'autres entrepreneurs et professionnels</p>
                            </div>
                        </li>
                    </ul>
                    
                    <div class="security-info">
                        <h4>Vos données sont sécurisées</h4>
                        <ul>
                            <li><i class="fas fa-shield-alt"></i> Chiffrement SSL/TLS</li>
                            <li><i class="fas fa-lock"></i> Mots de passe hashés</li>
                            <li><i class="fas fa-user-shield"></i> Conformité RGPD</li>
                            <li><i class="fas fa-database"></i> Sauvegarde sécurisée</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section des statistiques -->
<section class="section section-stats">
    <div class="container">
        <div class="section-header">
            <h2>Notre communauté en chiffres</h2>
            <p>Rejoignez des milliers d\'entrepreneurs et professionnels</p>
        </div>
        
        <div class="stats-grid">
            <div class="stat-item">
                <div class="stat-number">1500+</div>
                <div class="stat-label">Membres actifs</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">50+</div>
                <div class="stat-label">Ressources premium</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">98%</div>
                <div class="stat-label">Satisfaction client</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">24h</div>
                <div class="stat-label">Support client</div>
            </div>
        </div>
    </div>
</section>

<!-- Section CTA -->
<section class="section section-cta">
    <div class="container">
        <div class="cta-content">
            <h2>Prêt à rejoindre notre communauté ?</h2>
            <p>Créez votre compte gratuitement et commencez à bénéficier de nos ressources premium dès aujourd\'hui.</p>
            <div class="cta-actions">
                <a href="#register-form" class="btn btn-primary">
                    <i class="fas fa-user-plus"></i>
                    <span>Créer mon compte</span>
                </a>
                <a href="/contact.php" class="btn btn-outline">
                    <i class="fas fa-envelope"></i>
                    <span>Nous contacter</span>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- JavaScript spécifique à la page -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Gestion de l'affichage/masquage des mots de passe
    const passwordToggles = document.querySelectorAll('.password-toggle');
    
    passwordToggles.forEach(toggle => {
        toggle.addEventListener('click', function() {
            const input = this.previousElementSibling;
            const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
            input.setAttribute('type', type);
            
            const icon = this.querySelector('i');
            if (type === 'password') {
                icon.className = 'fas fa-eye';
                this.setAttribute('aria-label', 'Afficher le mot de passe');
            } else {
                icon.className = 'fas fa-eye-slash';
                this.setAttribute('aria-label', 'Masquer le mot de passe');
            }
        });
    });
    
    // Gestion de la force du mot de passe
    const passwordInput = document.getElementById('password');
    const strengthFill = document.getElementById('strength-fill');
    const strengthText = document.getElementById('strength-text');
    
    if (passwordInput && strengthFill && strengthText) {
        passwordInput.addEventListener('input', function() {
            const password = this.value;
            const strength = calculatePasswordStrength(password);
            updatePasswordStrength(strength);
        });
    }
    
    // Fonction de calcul de la force du mot de passe
    function calculatePasswordStrength(password) {
        let score = 0;
        
        if (password.length >= 8) score += 1;
        if (password.match(/[a-z]/)) score += 1;
        if (password.match(/[A-Z]/)) score += 1;
        if (password.match(/[0-9]/)) score += 1;
        if (password.match(/[^a-zA-Z0-9]/)) score += 1;
        
        return score;
    }
    
    // Fonction de mise à jour de l'affichage de la force
    function updatePasswordStrength(strength) {
        const strengthClasses = ['très-faible', 'faible', 'moyenne', 'forte', 'très-forte'];
        const strengthTexts = ['Très faible', 'Faible', 'Moyenne', 'Forte', 'Très forte'];
        const strengthColors = ['#dc2626', '#ea580c', '#d97706', '#059669', '#047857'];
        
        // Supprimer les anciennes classes
        strengthFill.className = 'strength-fill';
        
        // Ajouter la nouvelle classe
        strengthFill.classList.add(strengthClasses[strength - 1]);
        
        // Mettre à jour le texte et la couleur
        strengthText.textContent = strengthTexts[strength - 1];
        strengthFill.style.backgroundColor = strengthColors[strength - 1];
        strengthFill.style.width = (strength * 20) + '%';
    }
    
    // Validation en temps réel du formulaire
    const form = document.querySelector('.register-form');
    if (form) {
        const inputs = form.querySelectorAll('input[required]');
        
        inputs.forEach(input => {
            input.addEventListener('blur', function() {
                validateField(this);
            });
            
            input.addEventListener('input', function() {
                clearFieldError(this);
            });
        });
        
        // Validation avant soumission
        form.addEventListener('submit', function(e) {
            let isValid = true;
            
            inputs.forEach(input => {
                if (!validateField(input)) {
                    isValid = false;
                }
            });
            
            if (!isValid) {
                e.preventDefault();
                showNotification('error', 'Erreur de validation', 'Veuillez corriger les erreurs dans le formulaire.');
            }
        });
    }
    
    // Fonction de validation d'un champ
    function validateField(field) {
        const value = field.value.trim();
        const fieldName = field.name;
        let isValid = true;
        
        // Supprimer les erreurs précédentes
        clearFieldError(field);
        
        // Validation selon le type de champ
        switch (fieldName) {
            case 'nom':
                if (!value) {
                    showFieldError(field, 'Le nom est obligatoire');
                    isValid = false;
                } elseif (value.length < 2) {
                    showFieldError(field, 'Le nom doit contenir au moins 2 caractères');
                    isValid = false;
                }
                break;
                
            case 'email':
                if (!value) {
                    showFieldError(field, 'L\'email est obligatoire');
                    isValid = false;
                } elseif (!isValidEmail(value)) {
                    showFieldError(field, 'L\'email n\'est pas valide');
                    isValid = false;
                }
                break;
                
            case 'telephone':
                if (value && !isValidPhone(value)) {
                    showFieldError(field, 'Le numéro de téléphone n\'est pas valide');
                    isValid = false;
                }
                break;
                
            case 'password':
                if (!value) {
                    showFieldError(field, 'Le mot de passe est obligatoire');
                    isValid = false;
                } elseif (value.length < 8) {
                    showFieldError(field, 'Le mot de passe doit contenir au moins 8 caractères');
                    isValid = false;
                } elseif (!isValidPassword(value)) {
                    showFieldError(field, 'Le mot de passe doit contenir au moins une minuscule, une majuscule et un chiffre');
                    isValid = false;
                }
                break;
                
            case 'password_confirm':
                const password = document.getElementById('password').value;
                if (!value) {
                    showFieldError(field, 'La confirmation du mot de passe est obligatoire');
                    isValid = false;
                } elseif (value !== password) {
                    showFieldError(field, 'Les mots de passe ne correspondent pas');
                    isValid = false;
                }
                break;
        }
        
        return isValid;
    }
    
    // Fonction pour afficher une erreur de champ
    function showFieldError(field, message) {
        field.parentNode.parentNode.classList.add('has-error');
        const errorSpan = document.createElement('span');
        errorSpan.className = 'error-message';
        errorSpan.textContent = message;
        field.parentNode.parentNode.appendChild(errorSpan);
    }
    
    // Fonction pour effacer une erreur de champ
    function clearFieldError(field) {
        field.parentNode.parentNode.classList.remove('has-error');
        const errorSpan = field.parentNode.parentNode.querySelector('.error-message');
        if (errorSpan) {
            errorSpan.remove();
        }
    }
    
    // Validation email
    function isValidEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }
    
    // Validation téléphone
    function isValidPhone(phone) {
        const phoneRegex = /^[\+]?[0-9\s\-\(\)]{10,}$/;
        return phoneRegex.test(phone);
    }
    
    // Validation mot de passe
    function isValidPassword(password) {
        return /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)/.test(password);
    }
    
    // Animation des éléments au scroll
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate');
            }
        });
    });
    
    const animatedElements = document.querySelectorAll('.benefit-item, .stat-item, .cta-content');
    animatedElements.forEach(el => observer.observe(el));
    
    // Animation des bénéfices
    const benefitItems = document.querySelectorAll('.benefits-list li');
    
    const animateBenefits = () => {
        benefitItems.forEach((item, index) => {
            setTimeout(() => {
                item.classList.add('animate');
            }, index * 150);
        });
    };
    
    const infoSection = document.querySelector('.register-info');
    if (infoSection) {
        const infoObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateBenefits();
                    infoObserver.unobserve(entry.target);
                }
            });
        });
        infoObserver.observe(infoSection);
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
                    stat.textContent = Math.ceil(current) + (stat.textContent.includes('+') ? '+' : '') + (stat.textContent.includes('%') ? '%' : '') + (stat.textContent.includes('h') ? 'h' : '');
                    requestAnimationFrame(updateStat);
                } else {
                    stat.textContent = stat.textContent.replace(stat.textContent, target + (stat.textContent.includes('+') ? '+' : '') + (stat.textContent.includes('%') ? '%' : '') + (stat.textContent.includes('h') ? 'h' : ''));
                }
            };
            
            updateStat();
        });
    };
    
    // Déclencher l'animation quand la section est visible
    const statsSection = document.querySelector('.section-stats');
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
    
    // Focus automatique sur le premier champ
    const firstInput = document.querySelector('.register-form input[type="text"]');
    if (firstInput) {
        firstInput.focus();
    }
});
</script>

<?php
// Inclusion du pied de page
include 'includes/footer.php';
?>