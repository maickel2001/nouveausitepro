<?php
/**
 * Page de demande de devis
 * Site professionnel de Maickel Okereke
 */

// Configuration de la page
$page_title = 'Demande de Devis - Maickel Okereke';
$page_description = 'Demandez un devis personnalisé pour vos besoins en comptabilité et développement web. Formulaire simple et rapide.';
$page_keywords = 'devis, devis comptabilité, devis développement web, tarifs, Maickel Okereke';

// Inclusion des fichiers nécessaires
require_once 'includes/functions.php';

// Récupération du service présélectionné depuis l'URL
$service_preselect = $_GET['service'] ?? '';

// Traitement du formulaire de devis
$form_sent = false;
$form_errors = [];
$form_data = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupération et validation des données
    $form_data = [
        'etape' => $_POST['etape'] ?? '1',
        'nom' => $_POST['nom'] ?? '',
        'email' => $_POST['email'] ?? '',
        'telephone' => $_POST['telephone'] ?? '',
        'societe' => $_POST['societe'] ?? '',
        'service' => $_POST['service'] ?? '',
        'besoin' => $_POST['besoin'] ?? '',
        'volume' => $_POST['volume'] ?? '',
        'details' => $_POST['details'] ?? '',
        'budget' => $_POST['budget'] ?? '',
        'urgence' => $_POST['urgence'] ?? '',
        'consentement' => isset($_POST['consentement'])
    ];
    
    // Validation selon l'étape
    $current_step = (int)$form_data['etape'];
    
    if ($current_step === 1) {
        // Validation étape 1 : Informations de base
        if (empty($form_data['nom'])) {
            $form_errors['nom'] = 'Le nom est obligatoire';
        }
        
        if (empty($form_data['email'])) {
            $form_errors['email'] = 'L\'email est obligatoire';
        } elseif (!filter_var($form_data['email'], FILTER_VALIDATE_EMAIL)) {
            $form_errors['email'] = 'L\'email n\'est pas valide';
        }
        
        if (empty($form_data['service'])) {
            $form_errors['service'] = 'Veuillez sélectionner un service';
        }
        
        if (empty($form_errors)) {
            $form_data['etape'] = '2';
        }
    } elseif ($current_step === 2) {
        // Validation étape 2 : Détails du projet
        if (empty($form_data['besoin'])) {
            $form_errors['besoin'] = 'La description du besoin est obligatoire';
        }
        
        if (empty($form_errors)) {
            $form_data['etape'] = '3';
        }
    } elseif ($current_step === 3) {
        // Validation étape 3 : Finalisation
        if (!$form_data['consentement']) {
            $form_errors['consentement'] = 'Vous devez accepter le traitement de vos données';
        }
        
        if (empty($form_errors)) {
            // Formulaire complet, traitement final
            $form_sent = true;
            $form_data = [];
        }
    }
}

// En-tête de page personnalisé
$page_header = '
<div class="page-header-content">
    <h1>Demande de Devis</h1>
    <p>Obtenez un devis personnalisé pour vos besoins en comptabilité et développement web</p>
</div>
';

// Inclusion de l\'en-tête
include 'includes/header.php';
?>

<!-- Section d\'introduction -->
<section class="section section-intro">
    <div class="container">
        <div class="intro-content">
            <div class="intro-text">
                <h2>Un devis sur mesure pour votre projet</h2>
                <p>Chaque projet est unique, c\'est pourquoi nous établissons des devis personnalisés adaptés à vos besoins spécifiques. Notre processus en 3 étapes vous permet de nous donner toutes les informations nécessaires pour vous proposer la meilleure solution.</p>
                <p>Remplissez ce formulaire et recevez votre devis détaillé sous 48h. Nous vous proposerons également un rendez-vous gratuit pour discuter de votre projet en détail.</p>
            </div>
            <div class="intro-image">
                <img src="<?php echo generatePlaceholderImage(400, 300, 'Devis', '2563eb', 'ffffff'); ?>" alt="Devis personnalisé" loading="lazy">
            </div>
        </div>
    </div>
</section>

<!-- Section du formulaire de devis -->
<section class="section section-devis-form">
    <div class="container">
        <div class="devis-form-container">
            <?php if ($form_sent): ?>
            <div class="form-success">
                <div class="success-icon">
                    <i class="fas fa-check-circle"></i>
                </div>
                <h3>Demande de devis envoyée avec succès !</h3>
                <p>Merci pour votre demande. Nous l\'étudions actuellement et vous enverrons un devis détaillé sous 48h.</p>
                <div class="success-actions">
                    <a href="/contact.php" class="btn btn-primary">
                        <i class="fas fa-envelope"></i>
                        <span>Nous contacter</span>
                    </a>
                    <a href="/" class="btn btn-outline">
                        <i class="fas fa-home"></i>
                        <span>Retour à l\'accueil</span>
                    </a>
                </div>
            </div>
            <?php else: ?>
            
            <!-- Indicateur de progression -->
            <div class="form-progress">
                <div class="progress-step <?php echo ($form_data['etape'] ?? '1') >= '1' ? 'active' : ''; ?>">
                    <div class="step-number">1</div>
                    <div class="step-label">Informations</div>
                </div>
                <div class="progress-line"></div>
                <div class="progress-step <?php echo ($form_data['etape'] ?? '1') >= '2' ? 'active' : ''; ?>">
                    <div class="step-number">2</div>
                    <div class="step-label">Projet</div>
                </div>
                <div class="progress-line"></div>
                <div class="progress-step <?php echo ($form_data['etape'] ?? '1') >= '3' ? 'active' : ''; ?>">
                    <div class="step-number">3</div>
                    <div class="step-label">Validation</div>
                </div>
            </div>
            
            <form class="devis-form" method="POST" action="#devis-form" id="devis-form">
                <input type="hidden" name="etape" value="<?php echo $form_data['etape'] ?? '1'; ?>">
                
                <!-- Étape 1 : Informations de base -->
                <div class="form-step <?php echo ($form_data['etape'] ?? '1') === '1' ? 'active' : ''; ?>" id="step-1">
                    <div class="step-header">
                        <h3>Étape 1 : Vos informations</h3>
                        <p>Commençons par vos coordonnées et le service qui vous intéresse</p>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group <?php echo isset($form_errors['nom']) ? 'has-error' : ''; ?>">
                            <label for="nom">Nom complet *</label>
                            <input type="text" id="nom" name="nom" value="<?php echo htmlspecialchars($form_data['nom'] ?? ''); ?>" required>
                            <?php if (isset($form_errors['nom'])): ?>
                            <span class="error-message"><?php echo $form_errors['nom']; ?></span>
                            <?php endif; ?>
                        </div>
                        
                        <div class="form-group <?php echo isset($form_errors['email']) ? 'has-error' : ''; ?>">
                            <label for="email">Email *</label>
                            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($form_data['email'] ?? ''); ?>" required>
                            <?php if (isset($form_errors['email'])): ?>
                            <span class="error-message"><?php echo $form_errors['email']; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="telephone">Téléphone</label>
                            <input type="tel" id="telephone" name="telephone" value="<?php echo htmlspecialchars($form_data['telephone'] ?? ''); ?>">
                        </div>
                        
                        <div class="form-group">
                            <label for="societe">Société</label>
                            <input type="text" id="societe" name="societe" value="<?php echo htmlspecialchars($form_data['societe'] ?? ''); ?>">
                        </div>
                    </div>
                    
                    <div class="form-group <?php echo isset($form_errors['service']) ? 'has-error' : ''; ?>">
                        <label for="service">Service souhaité *</label>
                        <select id="service" name="service" required>
                            <option value="">Choisir un service</option>
                            <option value="comptabilite" <?php echo ($form_data['service'] ?? '') === 'comptabilite' || $service_preselect === 'comptabilite' ? 'selected' : ''; ?>>Comptabilité générale</option>
                            <option value="developpement" <?php echo ($form_data['service'] ?? '') === 'developpement' || $service_preselect === 'developpement' ? 'selected' : ''; ?>>Développement web</option>
                            <option value="conseil" <?php echo ($form_data['service'] ?? '') === 'conseil' || $service_preselect === 'conseil' ? 'selected' : ''; ?>>Conseil fiscal</option>
                            <option value="accompagnement" <?php echo ($form_data['service'] ?? '') === 'accompagnement' || $service_preselect === 'accompagnement' ? 'selected' : ''; ?>>Accompagnement TPE/PME</option>
                            <option value="formation" <?php echo ($form_data['service'] ?? '') === 'formation' || $service_preselect === 'formation' ? 'selected' : ''; ?>>Formation comptable</option>
                            <option value="audit" <?php echo ($form_data['service'] ?? '') === 'audit' || $service_preselect === 'audit' ? 'selected' : ''; ?>>Audit & Contrôle</option>
                            <option value="autre" <?php echo ($form_data['service'] ?? '') === 'autre' || $service_preselect === 'autre' ? 'selected' : ''; ?>>Autre service</option>
                        </select>
                        <?php if (isset($form_errors['service'])): ?>
                        <span class="error-message"><?php echo $form_errors['service']; ?></span>
                        <?php endif; ?>
                    </div>
                    
                    <div class="step-actions">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-arrow-right"></i>
                            <span>Continuer</span>
                        </button>
                    </div>
                </div>
                
                <!-- Étape 2 : Détails du projet -->
                <div class="form-step <?php echo ($form_data['etape'] ?? '1') === '2' ? 'active' : ''; ?>" id="step-2">
                    <div class="step-header">
                        <h3>Étape 2 : Votre projet</h3>
                        <p>Décrivez-nous vos besoins et votre projet en détail</p>
                    </div>
                    
                    <div class="form-group <?php echo isset($form_errors['besoin']) ? 'has-error' : ''; ?>">
                        <label for="besoin">Description de votre besoin *</label>
                        <textarea id="besoin" name="besoin" rows="4" required placeholder="Décrivez votre projet, vos objectifs, vos contraintes..."><?php echo htmlspecialchars($form_data['besoin'] ?? ''); ?></textarea>
                        <?php if (isset($form_errors['besoin'])): ?>
                        <span class="error-message"><?php echo $form_errors['besoin']; ?></span>
                        <?php endif; ?>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="volume">Volume de travail</label>
                            <select id="volume" name="volume">
                                <option value="">Sélectionner</option>
                                <option value="ponctuel" <?php echo ($form_data['volume'] ?? '') === 'ponctuel' ? 'selected' : ''; ?>>Ponctuel</option>
                                <option value="mensuel" <?php echo ($form_data['volume'] ?? '') === 'mensuel' ? 'selected' : ''; ?>>Mensuel</option>
                                <option value="trimestriel" <?php echo ($form_data['volume'] ?? '') === 'trimestriel' ? 'selected' : ''; ?>>Trimestriel</option>
                                <option value="annuel" <?php echo ($form_data['volume'] ?? '') === 'annuel' ? 'selected' : ''; ?>>Annuel</option>
                                <option value="continu" <?php echo ($form_data['volume'] ?? '') === 'continu' ? 'selected' : ''; ?>>Continu</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="budget">Budget estimé</label>
                            <select id="budget" name="budget">
                                <option value="">Sélectionner</option>
                                <option value="moins-1000" <?php echo ($form_data['budget'] ?? '') === 'moins-1000' ? 'selected' : ''; ?>>Moins de 1000€</option>
                                <option value="1000-5000" <?php echo ($form_data['budget'] ?? '') === '1000-5000' ? 'selected' : ''; ?>>1000€ - 5000€</option>
                                <option value="5000-10000" <?php echo ($form_data['budget'] ?? '') === '5000-10000' ? 'selected' : ''; ?>>5000€ - 10000€</option>
                                <option value="10000-25000" <?php echo ($form_data['budget'] ?? '') === '10000-25000' ? 'selected' : ''; ?>>10000€ - 25000€</option>
                                <option value="plus-25000" <?php echo ($form_data['budget'] ?? '') === 'plus-25000' ? 'selected' : ''; ?>>Plus de 25000€</option>
                                <option value="a-definir" <?php echo ($form_data['budget'] ?? '') === 'a-definir' ? 'selected' : ''; ?>>À définir</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="urgence">Niveau d\'urgence</label>
                        <select id="urgence" name="urgence">
                            <option value="">Sélectionner</option>
                            <option value="faible" <?php echo ($form_data['urgence'] ?? '') === 'faible' ? 'selected' : ''; ?>>Faible (plus de 3 mois)</option>
                            <option value="moyenne" <?php echo ($form_data['urgence'] ?? '') === 'moyenne' ? 'selected' : ''; ?>>Moyenne (1-3 mois)</option>
                            <option value="elevee" <?php echo ($form_data['urgence'] ?? '') === 'elevee' ? 'selected' : ''; ?>>Élevée (moins d\'1 mois)</option>
                            <option value="critique" <?php echo ($form_data['urgence'] ?? '') === 'critique' ? 'selected' : ''; ?>>Critique (immédiat)</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="details">Détails supplémentaires</label>
                        <textarea id="details" name="details" rows="3" placeholder="Informations complémentaires, contraintes particulières, questions..."><?php echo htmlspecialchars($form_data['details'] ?? ''); ?></textarea>
                    </div>
                    
                    <div class="step-actions">
                        <button type="button" class="btn btn-outline step-prev" data-step="1">
                            <i class="fas fa-arrow-left"></i>
                            <span>Retour</span>
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-arrow-right"></i>
                            <span>Continuer</span>
                        </button>
                    </div>
                </div>
                
                <!-- Étape 3 : Validation -->
                <div class="form-step <?php echo ($form_data['etape'] ?? '1') === '3' ? 'active' : ''; ?>" id="step-3">
                    <div class="step-header">
                        <h3>Étape 3 : Validation</h3>
                        <p>Vérifiez vos informations et validez votre demande</p>
                    </div>
                    
                    <div class="form-summary">
                        <h4>Récapitulatif de votre demande</h4>
                        <div class="summary-content">
                            <div class="summary-item">
                                <strong>Nom :</strong> <span id="summary-nom"><?php echo htmlspecialchars($form_data['nom'] ?? ''); ?></span>
                            </div>
                            <div class="summary-item">
                                <strong>Email :</strong> <span id="summary-email"><?php echo htmlspecialchars($form_data['email'] ?? ''); ?></span>
                            </div>
                            <div class="summary-item">
                                <strong>Service :</strong> <span id="summary-service"><?php echo htmlspecialchars($form_data['service'] ?? ''); ?></span>
                            </div>
                            <div class="summary-item">
                                <strong>Besoin :</strong> <span id="summary-besoin"><?php echo htmlspecialchars($form_data['besoin'] ?? ''); ?></span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group <?php echo isset($form_errors['consentement']) ? 'has-error' : ''; ?>">
                        <div class="form-checkbox">
                            <label>
                                <input type="checkbox" name="consentement" <?php echo ($form_data['consentement'] ?? false) ? 'checked' : ''; ?> required>
                                <span>J\'accepte que mes données soient traitées pour cette demande de devis et je consens à être recontacté(e) par Maickel Okereke dans le cadre de ma demande. <a href="/politique-de-confidentialite.php" target="_blank">En savoir plus</a></span>
                            </label>
                            <?php if (isset($form_errors['consentement'])): ?>
                            <span class="error-message"><?php echo $form_errors['consentement']; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                    
                    <div class="step-actions">
                        <button type="button" class="btn btn-outline step-prev" data-step="2">
                            <i class="fas fa-arrow-left"></i>
                            <span>Retour</span>
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-paper-plane"></i>
                            <span>Envoyer la demande</span>
                        </button>
                    </div>
                </div>
            </form>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Section des avantages -->
<section class="section section-advantages">
    <div class="container">
        <div class="section-header">
            <h2>Pourquoi nous faire confiance ?</h2>
            <p>Les atouts qui font la différence dans nos devis</p>
        </div>
        
        <div class="advantages-grid">
            <div class="advantage-item">
                <div class="advantage-icon">
                    <i class="fas fa-clock"></i>
                </div>
                <h3>Réactivité</h3>
                <p>Devis détaillé sous 48h et première consultation gratuite dans la semaine.</p>
            </div>
            
            <div class="advantage-item">
                <div class="advantage-icon">
                    <i class="fas fa-calculator"></i>
                </div>
                <h3>Transparence</h3>
                <p>Devis détaillé avec décomposition des coûts et pas de mauvaises surprises.</p>
            </div>
            
            <div class="advantage-item">
                <div class="advantage-icon">
                    <i class="fas fa-handshake"></i>
                </div>
                <h3>Accompagnement</h3>
                <p>Suivi complet de votre projet et support post-livraison inclus.</p>
            </div>
            
            <div class="advantage-item">
                <div class="advantage-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3>Garantie</h3>
                <p>Garantie de satisfaction et engagement sur la qualité de nos services.</p>
            </div>
        </div>
    </div>
</section>

<!-- Section CTA -->
<section class="section section-cta">
    <div class="container">
        <div class="cta-content">
            <h2>Prêt à commencer votre projet ?</h2>
            <p>Remplissez le formulaire ci-dessus et recevez votre devis personnalisé sous 48h. Nous vous proposerons également un rendez-vous gratuit pour discuter de votre projet en détail.</p>
            <div class="cta-actions">
                <a href="#devis-form" class="btn btn-primary">
                    <i class="fas fa-file-invoice"></i>
                    <span>Demander un devis</span>
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
    // Gestion des étapes du formulaire
    const form = document.querySelector('.devis-form');
    if (form) {
        const steps = form.querySelectorAll('.form-step');
        const progressSteps = document.querySelectorAll('.progress-step');
        
        // Boutons de navigation entre étapes
        const prevButtons = form.querySelectorAll('.step-prev');
        const nextButtons = form.querySelectorAll('button[type="submit"]');
        
        // Navigation vers l'étape précédente
        prevButtons.forEach(button => {
            button.addEventListener('click', function() {
                const targetStep = this.dataset.step;
                goToStep(targetStep);
            });
        });
        
        // Navigation vers l'étape suivante
        nextButtons.forEach(button => {
            button.addEventListener('click', function() {
                const currentStep = form.querySelector('input[name="etape"]').value;
                if (currentStep === '3') {
                    // Dernière étape, validation finale
                    return;
                }
                
                // Validation de l'étape courante
                if (validateCurrentStep(currentStep)) {
                    const nextStep = parseInt(currentStep) + 1;
                    goToStep(nextStep.toString());
                }
            });
        });
        
        // Fonction pour aller à une étape spécifique
        function goToStep(stepNumber) {
            // Masquer toutes les étapes
            steps.forEach(step => step.classList.remove('active'));
            
            // Afficher l'étape cible
            const targetStep = document.getElementById(`step-${stepNumber}`);
            if (targetStep) {
                targetStep.classList.add('active');
            }
            
            // Mettre à jour l'étape dans le formulaire
            form.querySelector('input[name="etape"]').value = stepNumber;
            
            // Mettre à jour la progression
            updateProgress(stepNumber);
            
            // Scroll vers le formulaire
            targetStep.scrollIntoView({ behavior: 'smooth' });
        }
        
        // Fonction pour mettre à jour la progression
        function updateProgress(currentStep) {
            progressSteps.forEach((step, index) => {
                if (index + 1 <= currentStep) {
                    step.classList.add('active');
                } else {
                    step.classList.remove('active');
                }
            });
        }
        
        // Fonction de validation de l'étape courante
        function validateCurrentStep(step) {
            const currentStepElement = document.getElementById(`step-${step}`);
            const requiredFields = currentStepElement.querySelectorAll('[required]');
            let isValid = true;
            
            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    field.classList.add('has-error');
                    isValid = false;
                } else {
                    field.classList.remove('has-error');
                }
            });
            
            if (!isValid) {
                showNotification('error', 'Erreur de validation', 'Veuillez remplir tous les champs obligatoires.');
            }
            
            return isValid;
        }
        
        // Mise à jour du récapitulatif en temps réel
        const summaryFields = ['nom', 'email', 'service', 'besoin'];
        summaryFields.forEach(fieldName => {
            const field = form.querySelector(`[name="${fieldName}"]`);
            const summaryElement = document.getElementById(`summary-${fieldName}`);
            
            if (field && summaryElement) {
                field.addEventListener('input', function() {
                    summaryElement.textContent = this.value;
                });
            }
        });
        
        // Validation en temps réel
        const inputs = form.querySelectorAll('input, textarea, select');
        inputs.forEach(input => {
            input.addEventListener('blur', function() {
                validateField(this);
            });
            
            input.addEventListener('input', function() {
                clearFieldError(this);
            });
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
                if (value.length < 2) {
                    showFieldError(field, 'Le nom doit contenir au moins 2 caractères');
                    isValid = false;
                }
                break;
                
            case 'email':
                if (!isValidEmail(value)) {
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
                
            case 'service':
                if (!value) {
                    showFieldError(field, 'Veuillez sélectionner un service');
                    isValid = false;
                }
                break;
                
            case 'besoin':
                if (value.length < 10) {
                    showFieldError(field, 'La description doit contenir au moins 10 caractères');
                    isValid = false;
                }
                break;
        }
        
        return isValid;
    }
    
    // Fonction pour afficher une erreur de champ
    function showFieldError(field, message) {
        field.classList.add('has-error');
        const errorSpan = document.createElement('span');
        errorSpan.className = 'error-message';
        errorSpan.textContent = message;
        field.parentNode.appendChild(errorSpan);
    }
    
    // Fonction pour effacer une erreur de champ
    function clearFieldError(field) {
        field.classList.remove('has-error');
        const errorSpan = field.parentNode.querySelector('.error-message');
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
    
    // Animation des éléments au scroll
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate');
            }
        });
    });
    
    const animatedElements = document.querySelectorAll('.advantage-item');
    animatedElements.forEach(el => observer.observe(el));
});
</script>

<?php
// Inclusion du pied de page
include 'includes/footer.php';
?>