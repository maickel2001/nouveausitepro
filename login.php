<?php
/**
 * Page de connexion
 * Site professionnel de Maickel Okereke
 */

// Configuration de la page
$page_title = 'Connexion - Maickel Okereke';
$page_description = 'Connectez-vous à votre espace personnel pour accéder à vos ressources et suivre vos demandes.';
$page_keywords = 'connexion, login, espace personnel, Maickel Okereke';

// Inclusion des fichiers nécessaires
require_once 'includes/functions.php';

// Redirection après connexion
$redirect = $_GET['redirect'] ?? '';

// Traitement du formulaire de connexion
$form_errors = [];
$form_data = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupération et validation des données
    $form_data = [
        'email' => $_POST['email'] ?? '',
        'password' => $_POST['password'] ?? '',
        'remember' => isset($_POST['remember'])
    ];
    
    // Validation des champs
    if (empty($form_data['email'])) {
        $form_errors['email'] = 'L\'email est obligatoire';
    } elseif (!filter_var($form_data['email'], FILTER_VALIDATE_EMAIL)) {
        $form_errors['email'] = 'L\'email n\'est pas valide';
    }
    
    if (empty($form_data['password'])) {
        $form_errors['password'] = 'Le mot de passe est obligatoire';
    }
    
    // Si pas d'erreurs, tentative de connexion
    if (empty($form_errors)) {
        // En production, ici on vérifierait les identifiants en base
        // Simulation d'une connexion réussie
        if ($form_data['email'] === 'demo@example.com' && $form_data['password'] === 'demo123') {
            // Création de la session
            $_SESSION['user_id'] = 1;
            $_SESSION['user_nom'] = 'Utilisateur Demo';
            $_SESSION['user_email'] = $form_data['email'];
            $_SESSION['user_role'] = 'user';
            
            // Redirection
            $redirect_url = $redirect ? "/$redirect.php" : '/user/dashboard.php';
            header('Location: ' . $redirect_url);
            exit;
        } else {
            $form_errors['general'] = 'Email ou mot de passe incorrect';
        }
    }
}

// En-tête de page personnalisé
$page_header = '
<div class="page-header-content">
    <h1>Connexion</h1>
    <p>Accédez à votre espace personnel</p>
</div>
';

// Inclusion de l\'en-tête
include 'includes/header.php';
?>

<!-- Section de connexion -->
<section class="section section-login">
    <div class="container">
        <div class="login-container">
            <div class="login-form-container">
                <div class="form-header">
                    <h2>Se connecter</h2>
                    <p>Accédez à vos ressources et suivez vos demandes</p>
                </div>
                
                <?php if (isset($form_errors['general'])): ?>
                <div class="form-error general">
                    <i class="fas fa-exclamation-triangle"></i>
                    <span><?php echo $form_errors['general']; ?></span>
                </div>
                <?php endif; ?>
                
                <form class="login-form" method="POST" action="">
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
                    </div>
                    
                    <div class="form-options">
                        <div class="form-checkbox">
                            <label>
                                <input type="checkbox" name="remember" <?php echo ($form_data['remember'] ?? false) ? 'checked' : ''; ?>>
                                <span>Se souvenir de moi</span>
                            </label>
                        </div>
                        <a href="/reset-password.php" class="forgot-password">Mot de passe oublié ?</a>
                    </div>
                    
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary btn-full">
                            <i class="fas fa-sign-in-alt"></i>
                            <span>Se connecter</span>
                        </button>
                    </div>
                </form>
                
                <div class="form-footer">
                    <p>Pas encore de compte ? <a href="/register.php">Créer un compte</a></p>
                </div>
            </div>
            
            <div class="login-info">
                <div class="info-content">
                    <h3>Pourquoi créer un compte ?</h3>
                    <ul class="benefits-list">
                        <li>
                            <div class="benefit-icon">
                                <i class="fas fa-download"></i>
                            </div>
                            <div class="benefit-content">
                                <h4>Accès aux ressources premium</h4>
                                <p>Téléchargez nos guides, templates et outils exclusifs</p>
                            </div>
                        </li>
                        
                        <li>
                            <div class="benefit-icon">
                                <i class="fas fa-file-invoice"></i>
                            </div>
                            <div class="benefit-content">
                                <h4>Suivi de vos demandes</h4>
                                <p>Consultez l\'état de vos devis et rendez-vous</p>
                            </div>
                        </li>
                        
                        <li>
                            <div class="benefit-icon">
                                <i class="fas fa-user-edit"></i>
                            </div>
                            <div class="benefit-content">
                                <h4>Profil personnalisé</h4>
                                <p>Gérez vos informations et préférences</p>
                            </div>
                        </li>
                        
                        <li>
                            <div class="benefit-icon">
                                <i class="fas fa-bell"></i>
                            </div>
                            <div class="benefit-content">
                                <h4>Notifications personnalisées</h4>
                                <p>Recevez des alertes sur vos projets</p>
                            </div>
                        </li>
                    </ul>
                    
                    <div class="demo-account">
                        <h4>Compte de démonstration</h4>
                        <p>Testez notre espace utilisateur avec :</p>
                        <div class="demo-credentials">
                            <div class="credential">
                                <strong>Email :</strong> demo@example.com
                            </div>
                            <div class="credential">
                                <strong>Mot de passe :</strong> demo123
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section des témoignages -->
<section class="section section-testimonials">
    <div class="container">
        <div class="section-header">
            <h2>Ils utilisent déjà notre espace</h2>
            <p>Découvrez ce que disent nos utilisateurs</p>
        </div>
        
        <div class="testimonials-grid">
            <div class="testimonial-item">
                <div class="testimonial-content">
                    <p>"L'espace utilisateur est très pratique. Je peux facilement accéder à mes ressources et suivre mes demandes de devis."</p>
                </div>
                <div class="testimonial-author">
                    <div class="author-avatar">
                        <img src="<?php echo generatePlaceholderImage(60, 60, 'Marie', '1e40af', 'ffffff'); ?>" alt="Marie Dubois" loading="lazy">
                    </div>
                    <div class="author-info">
                        <h4>Marie Dubois</h4>
                        <span>Dirigeante - TechStart SARL</span>
                    </div>
                </div>
            </div>
            
            <div class="testimonial-item">
                <div class="testimonial-content">
                    <p>"Les ressources premium m'ont vraiment aidé à structurer ma comptabilité. L'interface est claire et intuitive."</p>
                </div>
                <div class="testimonial-author">
                    <div class="author-avatar">
                        <img src="<?php echo generatePlaceholderImage(60, 60, 'Pierre', '1e3a8a', 'ffffff'); ?>" alt="Pierre Martin" loading="lazy">
                    </div>
                    <div class="author-info">
                        <h4>Pierre Martin</h4>
                        <span>Gérant - Boulangerie du Centre</span>
                    </div>
                </div>
            </div>
            
            <div class="testimonial-item">
                <div class="testimonial-content">
                    <p>"Excellent suivi de mes projets. Je reçois des notifications en temps réel et peux consulter l'avancement facilement."</p>
                </div>
                <div class="testimonial-author">
                    <div class="author-avatar">
                        <img src="<?php echo generatePlaceholderImage(60, 60, 'Sophie', '059669', 'ffffff'); ?>" alt="Sophie Bernard" loading="lazy">
                    </div>
                    <div class="author-info">
                        <h4>Sophie Bernard</h4>
                        <span>Fondatrice - GreenEco</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section CTA -->
<section class="section section-cta">
    <div class="container">
        <div class="cta-content">
            <h2>Prêt à rejoindre notre communauté ?</h2>
            <p>Créez votre compte gratuitement et accédez à toutes nos ressources et services personnalisés.</p>
            <div class="cta-actions">
                <a href="/register.php" class="btn btn-primary">
                    <i class="fas fa-user-plus"></i>
                    <span>Créer un compte</span>
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
    // Gestion de l'affichage/masquage du mot de passe
    const passwordToggle = document.querySelector('.password-toggle');
    const passwordInput = document.getElementById('password');
    
    if (passwordToggle && passwordInput) {
        passwordToggle.addEventListener('click', function() {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            
            const icon = this.querySelector('i');
            if (type === 'password') {
                icon.className = 'fas fa-eye';
                this.setAttribute('aria-label', 'Afficher le mot de passe');
            } else {
                icon.className = 'fas fa-eye-slash';
                this.setAttribute('aria-label', 'Masquer le mot de passe');
            }
        });
    }
    
    // Validation en temps réel du formulaire
    const form = document.querySelector('.login-form');
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
            case 'email':
                if (!value) {
                    showFieldError(field, 'L\'email est obligatoire');
                    isValid = false;
                } elseif (!isValidEmail(value)) {
                    showFieldError(field, 'L\'email n\'est pas valide');
                    isValid = false;
                }
                break;
                
            case 'password':
                if (!value) {
                    showFieldError(field, 'Le mot de passe est obligatoire');
                    isValid = false;
                } elseif (value.length < 6) {
                    showFieldError(field, 'Le mot de passe doit contenir au moins 6 caractères');
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
    
    // Animation des éléments au scroll
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate');
            }
        });
    });
    
    const animatedElements = document.querySelectorAll('.benefit-item, .testimonial-item, .cta-content');
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
    
    const infoSection = document.querySelector('.login-info');
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
    
    // Focus automatique sur le premier champ
    const firstInput = document.querySelector('.login-form input[type="email"]');
    if (firstInput) {
        firstInput.focus();
    }
});
</script>

<?php
// Inclusion du pied de page
include 'includes/footer.php';
?>