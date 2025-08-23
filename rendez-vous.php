<?php
/**
 * Page de prise de rendez-vous
 * Site professionnel de Maickel Okereke
 */

// Configuration de la page
$page_title = 'Prendre rendez-vous - Maickel Okereke';
$page_description = 'Planifiez une consultation gratuite pour discuter de vos besoins en comptabilité et développement web.';
$page_keywords = 'rendez-vous, consultation, comptabilité, développement web, Maickel Okereke';

// Inclusion des fichiers nécessaires
require_once 'includes/functions.php';

// Traitement du formulaire de rendez-vous
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
        'sujet' => $_POST['sujet'] ?? '',
        'date' => $_POST['date'] ?? '',
        'heure' => $_POST['heure'] ?? '',
        'duree' => $_POST['duree'] ?? '',
        'type_consultation' => $_POST['type_consultation'] ?? '',
        'message' => $_POST['message'] ?? '',
        'consentement' => isset($_POST['consentement'])
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
    
    if (empty($form_data['sujet'])) {
        $form_errors['sujet'] = 'Le sujet est obligatoire';
    }
    
    if (empty($form_data['date'])) {
        $form_errors['date'] = 'La date est obligatoire';
    } else {
        $selected_date = new DateTime($form_data['date']);
        $today = new DateTime();
        $today->setTime(0, 0, 0);
        
        if ($selected_date < $today) {
            $form_errors['date'] = 'La date ne peut pas être dans le passé';
        }
    }
    
    if (empty($form_data['heure'])) {
        $form_errors['heure'] = 'L\'heure est obligatoire';
    }
    
    if (empty($form_data['duree'])) {
        $form_errors['duree'] = 'La durée est obligatoire';
    }
    
    if (empty($form_data['type_consultation'])) {
        $form_errors['type_consultation'] = 'Le type de consultation est obligatoire';
    }
    
    if (!$form_data['consentement']) {
        $form_errors['consentement'] = 'Vous devez accepter les conditions d\'utilisation';
    }
    
    // Si pas d'erreurs, traitement du rendez-vous
    if (empty($form_errors)) {
        // En production, ici on enregistrerait le rendez-vous en base
        // Simulation d'une réservation réussie
        $form_sent = true;
        
        // Réinitialisation des données
        $form_data = [];
    }
}

// En-tête de page personnalisé
$page_header = '
<div class="page-header-content">
    <h1>Prendre rendez-vous</h1>
    <p>Planifiez une consultation gratuite pour discuter de vos projets</p>
</div>
';

// Inclusion du header
include 'includes/header.php';
?>

<!-- Section de prise de rendez-vous -->
<section class="section section-appointment">
    <div class="container">
        <div class="appointment-container">
            <div class="appointment-form-container">
                <div class="form-header">
                    <h2>Planifier votre consultation</h2>
                    <p>Réservez un créneau pour discuter de vos besoins en comptabilité et développement web</p>
                </div>
                
                <?php if ($form_sent): ?>
                <div class="form-success">
                    <div class="success-icon">
                        <i class="fas fa-calendar-check"></i>
                    </div>
                    <h3>Rendez-vous confirmé !</h3>
                    <p>Votre rendez-vous a été enregistré avec succès. Vous recevrez un email de confirmation avec tous les détails.</p>
                    <div class="success-actions">
                        <a href="/" class="btn btn-primary">
                            <i class="fas fa-home"></i>
                            <span>Retour à l\'accueil</span>
                        </a>
                        <a href="/contact.php" class="btn btn-outline">
                            <i class="fas fa-envelope"></i>
                            <span>Nous contacter</span>
                        </a>
                    </div>
                </div>
                <?php else: ?>
                
                <form class="appointment-form" method="POST" action="">
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
                    
                    <div class="form-group <?php echo isset($form_errors['sujet']) ? 'has-error' : ''; ?>">
                        <label for="sujet">Sujet de la consultation *</label>
                        <div class="input-group">
                            <i class="fas fa-comment"></i>
                            <input type="text" id="sujet" name="sujet" value="<?php echo htmlspecialchars($form_data['sujet'] ?? ''); ?>" required placeholder="Ex: Création de site web, Comptabilité TPE">
                        </div>
                        <?php if (isset($form_errors['sujet'])): ?>
                        <span class="error-message"><?php echo $form_errors['sujet']; ?></span>
                        <?php endif; ?>
                    </div>
                    
                    <div class="form-group <?php echo isset($form_errors['type_consultation']) ? 'has-error' : ''; ?>">
                        <label for="type_consultation">Type de consultation *</label>
                        <div class="input-group">
                            <i class="fas fa-handshake"></i>
                            <select id="type_consultation" name="type_consultation" required>
                                <option value="">Sélectionnez le type de consultation</option>
                                <option value="comptabilite" <?php echo ($form_data['type_consultation'] ?? '') === 'comptabilite' ? 'selected' : ''; ?>>Comptabilité et gestion</option>
                                <option value="developpement" <?php echo ($form_data['type_consultation'] ?? '') === 'developpement' ? 'selected' : ''; ?>>Développement web</option>
                                <option value="mixte" <?php echo ($form_data['type_consultation'] ?? '') === 'mixte' ? 'selected' : ''; ?>>Consultation mixte (comptabilité + web)</option>
                                <option value="audit" <?php echo ($form_data['type_consultation'] ?? '') === 'audit' ? 'selected' : ''; ?>>Audit et conseil</option>
                                <option value="formation" <?php echo ($form_data['type_consultation'] ?? '') === 'formation' ? 'selected' : ''; ?>>Formation et accompagnement</option>
                            </select>
                        </div>
                        <?php if (isset($form_errors['type_consultation'])): ?>
                        <span class="error-message"><?php echo $form_errors['type_consultation']; ?></span>
                        <?php endif; ?>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group <?php echo isset($form_errors['date']) ? 'has-error' : ''; ?>">
                            <label for="date">Date souhaitée *</label>
                            <div class="input-group">
                                <i class="fas fa-calendar"></i>
                                <input type="date" id="date" name="date" value="<?php echo htmlspecialchars($form_data['date'] ?? ''); ?>" required min="<?php echo date('Y-m-d'); ?>">
                            </div>
                            <?php if (isset($form_errors['date'])): ?>
                            <span class="error-message"><?php echo $form_errors['date']; ?></span>
                            <?php endif; ?>
                        </div>
                        
                        <div class="form-group <?php echo isset($form_errors['heure']) ? 'has-error' : ''; ?>">
                            <label for="heure">Heure souhaitée *</label>
                            <div class="input-group">
                                <i class="fas fa-clock"></i>
                                <select id="heure" name="heure" required>
                                    <option value="">Sélectionnez l\'heure</option>
                                    <option value="09:00" <?php echo ($form_data['heure'] ?? '') === '09:00' ? 'selected' : ''; ?>>09:00</option>
                                    <option value="10:00" <?php echo ($form_data['heure'] ?? '') === '10:00' ? 'selected' : ''; ?>>10:00</option>
                                    <option value="11:00" <?php echo ($form_data['heure'] ?? '') === '11:00' ? 'selected' : ''; ?>>11:00</option>
                                    <option value="14:00" <?php echo ($form_data['heure'] ?? '') === '14:00' ? 'selected' : ''; ?>>14:00</option>
                                    <option value="15:00" <?php echo ($form_data['heure'] ?? '') === '15:00' ? 'selected' : ''; ?>>15:00</option>
                                    <option value="16:00" <?php echo ($form_data['heure'] ?? '') === '16:00' ? 'selected' : ''; ?>>16:00</option>
                                    <option value="17:00" <?php echo ($form_data['heure'] ?? '') === '17:00' ? 'selected' : ''; ?>>17:00</option>
                                </select>
                            </div>
                            <?php if (isset($form_errors['heure'])): ?>
                            <span class="error-message"><?php echo $form_errors['heure']; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                    
                    <div class="form-group <?php echo isset($form_errors['duree']) ? 'has-error' : ''; ?>">
                        <label for="duree">Durée souhaitée *</label>
                        <div class="input-group">
                            <i class="fas fa-hourglass-half"></i>
                            <select id="duree" name="duree" required>
                                <option value="">Sélectionnez la durée</option>
                                <option value="30" <?php echo ($form_data['duree'] ?? '') === '30' ? 'selected' : ''; ?>>30 minutes</option>
                                <option value="60" <?php echo ($form_data['duree'] ?? '') === '60' ? 'selected' : ''; ?>>1 heure</option>
                                <option value="90" <?php echo ($form_data['duree'] ?? '') === '90' ? 'selected' : ''; ?>>1h30</option>
                                <option value="120" <?php echo ($form_data['duree'] ?? '') === '120' ? 'selected' : ''; ?>>2 heures</option>
                            </select>
                        </div>
                        <?php if (isset($form_errors['duree'])): ?>
                        <span class="error-message"><?php echo $form_errors['duree']; ?></span>
                        <?php endif; ?>
                    </div>
                    
                    <div class="form-group">
                        <label for="message">Message (optionnel)</label>
                        <div class="input-group">
                            <i class="fas fa-edit"></i>
                            <textarea id="message" name="message" rows="4" placeholder="Décrivez brièvement vos besoins ou questions..."><?php echo htmlspecialchars($form_data['message'] ?? ''); ?></textarea>
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
                    
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary btn-full">
                            <i class="fas fa-calendar-plus"></i>
                            <span>Confirmer le rendez-vous</span>
                        </button>
                    </div>
                </form>
                
                <div class="form-footer">
                    <p>Préférez un contact direct ? <a href="/contact.php">Nous contacter</a></p>
                </div>
                <?php endif; ?>
            </div>
            
            <div class="appointment-info">
                <div class="info-content">
                    <h3>Pourquoi prendre rendez-vous ?</h3>
                    <p>Une consultation personnalisée vous permet de :</p>
                    
                    <ul class="benefits-list">
                        <li>
                            <div class="benefit-icon">
                                <i class="fas fa-lightbulb"></i>
                            </div>
                            <div class="benefit-content">
                                <h4>Bénéficier d\'un diagnostic précis</h4>
                                <p>Analyse de vos besoins et recommandations personnalisées</p>
                            </div>
                        </li>
                        
                        <li>
                            <div class="benefit-icon">
                                <i class="fas fa-chart-line"></i>
                            </div>
                            <div class="benefit-content">
                                <h4>Optimiser votre stratégie</h4>
                                <p>Conseils pour améliorer votre gestion et votre présence web</p>
                            </div>
                        </li>
                        
                        <li>
                            <div class="benefit-icon">
                                <i class="fas fa-calculator"></i>
                            </div>
                            <div class="benefit-content">
                                <h4>Évaluer vos coûts</h4>
                                <p>Devis détaillé et planification budgétaire</p>
                            </div>
                        </li>
                        
                        <li>
                            <div class="benefit-icon">
                                <i class="fas fa-road"></i>
                            </div>
                            <div class="benefit-content">
                                <h4>Planifier votre projet</h4>
                                <p>Roadmap détaillée et planning de réalisation</p>
                            </div>
                        </li>
                    </ul>
                    
                    <div class="consultation-types">
                        <h4>Types de consultation disponibles</h4>
                        <div class="type-grid">
                            <div class="type-item">
                                <i class="fas fa-calculator"></i>
                                <span>Comptabilité</span>
                            </div>
                            <div class="type-item">
                                <i class="fas fa-code"></i>
                                <span>Développement web</span>
                            </div>
                            <div class="type-item">
                                <i class="fas fa-handshake"></i>
                                <span>Consultation mixte</span>
                            </div>
                            <div class="type-item">
                                <i class="fas fa-search"></i>
                                <span>Audit et conseil</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="availability-info">
                        <h4>Disponibilités</h4>
                        <ul>
                            <li><i class="fas fa-clock"></i> Lundi - Vendredi : 9h - 18h</li>
                            <li><i class="fas fa-video"></i> Consultations en visioconférence</li>
                            <li><i class="fas fa-map-marker-alt"></i> Consultations sur site (région parisienne)</li>
                            <li><i class="fas fa-gift"></i> Première consultation gratuite</li>
                        </ul>
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
            <h2>Ce que disent nos clients</h2>
            <p>Découvrez les retours de nos clients satisfaits</p>
        </div>
        
        <div class="testimonials-grid">
            <div class="testimonial-item">
                <div class="testimonial-content">
                    <p>"Maickel a su comprendre mes besoins et m'a proposé des solutions adaptées. Sa double expertise comptabilité/web est un vrai plus !"</p>
                </div>
                <div class="testimonial-author">
                    <div class="author-avatar">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="author-info">
                        <div class="author-name">Marie Dubois</div>
                        <div class="author-company">Créatrice de bijoux</div>
                    </div>
                </div>
            </div>
            
            <div class="testimonial-item">
                <div class="testimonial-content">
                    <p>"Consultation très enrichissante. J'ai pu clarifier mes objectifs et obtenir un plan d'action concret pour mon projet."</p>
                </div>
                <div class="testimonial-author">
                    <div class="author-avatar">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="author-info">
                        <div class="author-name">Thomas Martin</div>
                        <div class="author-company">Consultant indépendant</div>
                    </div>
                </div>
            </div>
            
            <div class="testimonial-item">
                <div class="testimonial-content">
                    <p>"Approche professionnelle et bienveillante. Maickel prend le temps d'expliquer et de s'assurer que tout est clair."</p>
                </div>
                <div class="testimonial-author">
                    <div class="author-avatar">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="author-info">
                        <div class="author-name">Sophie Bernard</div>
                        <div class="author-company">Coach en développement personnel</div>
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
            <h2>Prêt à transformer votre entreprise ?</h2>
            <p>Prenez rendez-vous dès aujourd'hui pour une consultation gratuite et personnalisée.</p>
            <div class="cta-actions">
                <a href="#appointment-form" class="btn btn-primary">
                    <i class="fas fa-calendar-plus"></i>
                    <span>Prendre rendez-vous</span>
                </a>
                <a href="/services.php" class="btn btn-outline">
                    <i class="fas fa-list"></i>
                    <span>Voir nos services</span>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- JavaScript spécifique à la page -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Gestion de la validation en temps réel
    const form = document.querySelector('.appointment-form');
    if (form) {
        const inputs = form.querySelectorAll('input[required], select[required]');
        
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
                
            case 'sujet':
                if (!value) {
                    showFieldError(field, 'Le sujet est obligatoire');
                    isValid = false;
                }
                break;
                
            case 'date':
                if (!value) {
                    showFieldError(field, 'La date est obligatoire');
                    isValid = false;
                } else {
                    const selectedDate = new Date(value);
                    const today = new Date();
                    today.setHours(0, 0, 0, 0);
                    
                    if (selectedDate < today) {
                        showFieldError(field, 'La date ne peut pas être dans le passé');
                        isValid = false;
                    }
                }
                break;
                
            case 'heure':
                if (!value) {
                    showFieldError(field, 'L\'heure est obligatoire');
                    isValid = false;
                }
                break;
                
            case 'duree':
                if (!value) {
                    showFieldError(field, 'La durée est obligatoire');
                    isValid = false;
                }
                break;
                
            case 'type_consultation':
                if (!value) {
                    showFieldError(field, 'Le type de consultation est obligatoire');
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
    
    // Gestion de la date minimale
    const dateInput = document.getElementById('date');
    if (dateInput) {
        const today = new Date().toISOString().split('T')[0];
        dateInput.setAttribute('min', today);
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
    
    const infoSection = document.querySelector('.appointment-info');
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
    
    // Animation des témoignages
    const testimonialItems = document.querySelectorAll('.testimonial-item');
    
    const animateTestimonials = () => {
        testimonialItems.forEach((item, index) => {
            setTimeout(() => {
                item.classList.add('animate');
            }, index * 200);
        });
    };
    
    const testimonialsSection = document.querySelector('.section-testimonials');
    if (testimonialsSection) {
        const testimonialsObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateTestimonials();
                    testimonialsObserver.unobserve(entry.target);
                }
            });
        });
        testimonialsObserver.observe(testimonialsSection);
    }
    
    // Focus automatique sur le premier champ
    const firstInput = document.querySelector('.appointment-form input[type="text"]');
    if (firstInput) {
        firstInput.focus();
    }
    
    // Gestion des liens d'ancrage
    const anchorLinks = document.querySelectorAll('a[href^="#"]');
    anchorLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            const targetId = this.getAttribute('href').substring(1);
            const targetElement = document.getElementById(targetId);
            
            if (targetElement) {
                e.preventDefault();
                targetElement.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
});
</script>

<?php
// Inclusion du pied de page
include 'includes/footer.php';
?>