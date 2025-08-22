<?php
/**
 * Page de contact
 * Site professionnel de Maickel Okereke
 */

// Configuration de la page
$page_title = 'Contact - Maickel Okereke';
$page_description = 'Contactez Maickel Okereke pour vos besoins en comptabilité et développement web. Consultation gratuite et devis personnalisé.';
$page_keywords = 'contact, Maickel Okereke, expert-comptable, développeur web, devis, consultation';

// Traitement du formulaire de contact
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
        'message' => $_POST['message'] ?? '',
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
    
    if (empty($form_data['sujet'])) {
        $form_errors['sujet'] = 'Le sujet est obligatoire';
    }
    
    if (empty($form_data['message'])) {
        $form_errors['message'] = 'Le message est obligatoire';
    }
    
    if (!$form_data['consentement']) {
        $form_errors['consentement'] = 'Vous devez accepter le traitement de vos données';
    }
    
    // Si pas d'erreurs, traitement du formulaire
    if (empty($form_errors)) {
        // En production, ici on enverrait l'email et on sauvegarderait en base
        $form_sent = true;
        
        // Réinitialisation des données
        $form_data = [];
    }
}

// En-tête de page personnalisé
$page_header = '
<div class="page-header-content">
    <h1>Contactez-nous</h1>
    <p>Discutons de vos besoins et voyons comment nous pouvons vous accompagner</p>
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
                <h2>Parlons de votre projet</h2>
                <p>Que vous ayez besoin de services comptables, d\'un site web ou d\'un accompagnement global, je suis là pour vous écouter et vous proposer des solutions adaptées à vos besoins.</p>
                <p>N\'hésitez pas à me contacter pour une première consultation gratuite. Je réponds généralement dans les 24h et je m\'adapte à vos disponibilités pour nos échanges.</p>
            </div>
            <div class="intro-image">
                <img src="<?php echo generatePlaceholderImage(400, 300, 'Contact', '2563eb', 'ffffff'); ?>" alt="Contact" loading="lazy">
            </div>
        </div>
    </div>
</section>

<!-- Section des moyens de contact -->
<section class="section section-contact-methods">
    <div class="container">
        <div class="section-header">
            <h2>Nos Moyens de Contact</h2>
            <p>Plusieurs façons de nous joindre selon vos préférences</p>
        </div>
        
        <div class="contact-methods-grid">
            <div class="contact-method">
                <div class="contact-method-icon">
                    <i class="fas fa-envelope"></i>
                </div>
                <h3>Email</h3>
                <p>Le moyen le plus rapide pour un premier contact</p>
                <a href="mailto:<?php echo SITE_EMAIL; ?>" class="contact-link">
                    <?php echo SITE_EMAIL; ?>
                </a>
                <p class="response-time">Réponse sous 24h</p>
            </div>
            
            <div class="contact-method">
                <div class="contact-method-icon">
                    <i class="fas fa-phone"></i>
                </div>
                <h3>Téléphone</h3>
                <p>Pour des échanges plus directs et personnalisés</p>
                <a href="tel:<?php echo str_replace([' ', '+'], '', SITE_PHONE); ?>" class="contact-link">
                    <?php echo SITE_PHONE; ?>
                </a>
                <p class="response-time">Lun-Ven 9h-18h</p>
            </div>
            
            <div class="contact-method">
                <div class="contact-method-icon">
                    <i class="fas fa-calendar-alt"></i>
                </div>
                <h3>Rendez-vous</h3>
                <p>Planifiez une consultation en visioconférence</p>
                <a href="/rendez-vous.php" class="contact-link">
                    Prendre rendez-vous
                </a>
                <p class="response-time">Consultation gratuite</p>
            </div>
            
            <div class="contact-method">
                <div class="contact-method-icon">
                    <i class="fas fa-comments"></i>
                </div>
                <h3>Chat en ligne</h3>
                <p>Questions rapides et réponses immédiates</p>
                <button class="contact-link chat-toggle" id="chat-toggle">
                    Démarrer le chat
                </button>
                <p class="response-time">Temps réel</p>
            </div>
        </div>
    </div>
</section>

<!-- Section du formulaire de contact -->
<section class="section section-contact-form">
    <div class="container">
        <div class="contact-form-container">
            <div class="form-header">
                <h2>Formulaire de Contact</h2>
                <p>Remplissez ce formulaire et nous vous répondrons dans les plus brefs délais</p>
            </div>
            
            <?php if ($form_sent): ?>
            <div class="form-success">
                <div class="success-icon">
                    <i class="fas fa-check-circle"></i>
                </div>
                <h3>Message envoyé avec succès !</h3>
                <p>Merci pour votre message. Nous vous répondrons dans les plus brefs délais.</p>
            </div>
            <?php else: ?>
            
            <form class="contact-form" method="POST" action="#contact-form">
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
                
                <div class="form-group <?php echo isset($form_errors['sujet']) ? 'has-error' : ''; ?>">
                    <label for="sujet">Sujet *</label>
                    <select id="sujet" name="sujet" required>
                        <option value="">Choisir un sujet</option>
                        <option value="devis" <?php echo ($form_data['sujet'] ?? '') === 'devis' ? 'selected' : ''; ?>>Demande de devis</option>
                        <option value="comptabilite" <?php echo ($form_data['sujet'] ?? '') === 'comptabilite' ? 'selected' : ''; ?>>Services comptables</option>
                        <option value="developpement" <?php echo ($form_data['sujet'] ?? '') === 'developpement' ? 'selected' : ''; ?>>Développement web</option>
                        <option value="conseil" <?php echo ($form_data['sujet'] ?? '') === 'conseil' ? 'selected' : ''; ?>>Conseil et accompagnement</option>
                        <option value="formation" <?php echo ($form_data['sujet'] ?? '') === 'formation' ? 'selected' : ''; ?>>Formation</option>
                        <option value="autre" <?php echo ($form_data['sujet'] ?? '') === 'autre' ? 'selected' : ''; ?>>Autre</option>
                    </select>
                    <?php if (isset($form_errors['sujet'])): ?>
                    <span class="error-message"><?php echo $form_errors['sujet']; ?></span>
                    <?php endif; ?>
                </div>
                
                <div class="form-group <?php echo isset($form_errors['message']) ? 'has-error' : ''; ?>">
                    <label for="message">Message *</label>
                    <textarea id="message" name="message" rows="6" required placeholder="Décrivez votre projet, vos besoins ou posez vos questions..."><?php echo htmlspecialchars($form_data['message'] ?? ''); ?></textarea>
                    <?php if (isset($form_errors['message'])): ?>
                    <span class="error-message"><?php echo $form_errors['message']; ?></span>
                    <?php endif; ?>
                </div>
                
                <div class="form-group <?php echo isset($form_errors['consentement']) ? 'has-error' : ''; ?>">
                    <div class="form-checkbox">
                        <label>
                            <input type="checkbox" name="consentement" <?php echo ($form_data['consentement'] ?? false) ? 'checked' : ''; ?> required>
                            <span>J\'accepte que mes données soient traitées pour cette demande de contact et je consens à être recontacté(e) par Maickel Okereke dans le cadre de ma demande. <a href="/politique-de-confidentialite.php" target="_blank">En savoir plus</a></span>
                        </label>
                        <?php if (isset($form_errors['consentement'])): ?>
                        <span class="error-message"><?php echo $form_errors['consentement']; ?></span>
                        <?php endif; ?>
                    </div>
                </div>
                
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-paper-plane"></i>
                        <span>Envoyer le message</span>
                    </button>
                    <button type="reset" class="btn btn-outline">
                        <i class="fas fa-undo"></i>
                        <span>Réinitialiser</span>
                    </button>
                </div>
            </form>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Section des informations pratiques -->
<section class="section section-info">
    <div class="container">
        <div class="info-grid">
            <div class="info-item">
                <div class="info-icon">
                    <i class="fas fa-clock"></i>
                </div>
                <h3>Horaires de disponibilité</h3>
                <ul>
                    <li><strong>Lundi - Vendredi :</strong> 9h00 - 18h00</li>
                    <li><strong>Samedi :</strong> 9h00 - 12h00 (sur rendez-vous)</li>
                    <li><strong>Dimanche :</strong> Fermé</li>
                </ul>
                <p>En dehors de ces horaires, vous pouvez laisser un message, nous vous répondrons dès la réouverture.</p>
            </div>
            
            <div class="info-item">
                <div class="info-icon">
                    <i class="fas fa-map-marker-alt"></i>
                </div>
                <h3>Zone d\'intervention</h3>
                <ul>
                    <li><strong>Paris et Île-de-France :</strong> Interventions sur site</li>
                    <li><strong>France entière :</strong> Accompagnement à distance</li>
                    <li><strong>International :</strong> Consultations en ligne</li>
                </ul>
                <p>La plupart de nos services peuvent être réalisés à distance grâce aux outils numériques modernes.</p>
            </div>
            
            <div class="info-item">
                <div class="info-icon">
                    <i class="fas fa-euro-sign"></i>
                </div>
                <h3>Première consultation</h3>
                <ul>
                    <li><strong>Consultation initiale :</strong> Gratuite (30 min)</li>
                    <li><strong>Devis détaillé :</strong> Gratuit</li>
                    <li><strong>Étude de faisabilité :</strong> Sur devis</li>
                </ul>
                <p>Nous commençons toujours par une première consultation gratuite pour bien comprendre vos besoins.</p>
            </div>
        </div>
    </div>
</section>

<!-- Section FAQ rapide -->
<section class="section section-faq-quick">
    <div class="container">
        <div class="section-header">
            <h2>Questions Fréquentes</h2>
            <p>Les réponses aux questions les plus courantes</p>
        </div>
        
        <div class="faq-quick-grid">
            <div class="faq-item">
                <h3>Combien de temps pour recevoir une réponse ?</h3>
                <p>Nous répondons généralement dans les 24h ouvrées. Pour les urgences, n\'hésitez pas à nous appeler directement.</p>
            </div>
            
            <div class="faq-item">
                <h3>Proposez-vous des consultations à distance ?</h3>
                <p>Oui, la plupart de nos services peuvent être réalisés à distance via visioconférence et outils collaboratifs.</p>
            </div>
            
            <div class="faq-item">
                <h3>Quels sont vos tarifs ?</h3>
                <p>Nos tarifs varient selon la complexité de votre projet. La première consultation est gratuite pour évaluer vos besoins.</p>
            </div>
            
            <div class="faq-item">
                <h3>Pouvez-vous intervenir en urgence ?</h3>
                <p>Oui, nous avons des créneaux réservés aux urgences. Contactez-nous par téléphone pour les situations urgentes.</p>
            </div>
        </div>
        
        <div class="faq-more">
            <p>Vous avez d\'autres questions ? Consultez notre <a href="/faq.php">FAQ complète</a> ou contactez-nous directement.</p>
        </div>
    </div>
</section>

<!-- Section CTA -->
<section class="section section-cta">
    <div class="container">
        <div class="cta-content">
            <h2>Prêt à commencer ?</h2>
            <p>N\'attendez plus pour donner vie à vos projets. Contactez-nous dès aujourd\'hui pour une première consultation gratuite.</p>
            <div class="cta-actions">
                <a href="#contact-form" class="btn btn-primary">
                    <i class="fas fa-paper-plane"></i>
                    <span>Envoyer un message</span>
                </a>
                <a href="/devis.php" class="btn btn-outline">
                    <i class="fas fa-file-invoice"></i>
                    <span>Demander un devis</span>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- JavaScript spécifique à la page -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Gestion du chat toggle
    const chatToggle = document.getElementById('chat-toggle');
    if (chatToggle) {
        chatToggle.addEventListener('click', function() {
            // En production, ici on ouvrirait le chat
            showNotification('info', 'Chat en ligne', 'Le chat sera bientôt disponible. Contactez-nous par email ou téléphone en attendant.');
        });
    }
    
    // Validation en temps réel du formulaire
    const form = document.querySelector('.contact-form');
    if (form) {
        const inputs = form.querySelectorAll('input, textarea, select');
        
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
                
            case 'sujet':
                if (!value) {
                    showFieldError(field, 'Veuillez sélectionner un sujet');
                    isValid = false;
                }
                break;
                
            case 'message':
                if (value.length < 10) {
                    showFieldError(field, 'Le message doit contenir au moins 10 caractères');
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
    
    const animatedElements = document.querySelectorAll('.contact-method, .info-item, .faq-item');
    animatedElements.forEach(el => observer.observe(el));
});
</script>

<?php
// Inclusion du pied de page
include 'includes/footer.php';
?>