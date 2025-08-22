    </main>
    
    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <!-- Informations de l'entreprise -->
                <div class="footer-section">
                    <div class="footer-brand">
                        <i class="fas fa-chart-line"></i>
                        <h3>Maickel Okereke</h3>
                    </div>
                    <p class="footer-description">
                        Expert-comptable et développeur web passionné, je vous accompagne dans la réussite de votre entreprise avec des solutions sur mesure et un service personnalisé.
                    </p>
                    <div class="footer-contact">
                        <div class="contact-item">
                            <i class="fas fa-envelope"></i>
                            <a href="mailto:<?php echo SITE_EMAIL; ?>"><?php echo SITE_EMAIL; ?></a>
                        </div>
                        <div class="contact-item">
                            <i class="fas fa-phone"></i>
                            <a href="tel:<?php echo str_replace([' ', '+'], '', SITE_PHONE); ?>"><?php echo SITE_PHONE; ?></a>
                        </div>
                        <div class="contact-item">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>Paris, France</span>
                        </div>
                    </div>
                </div>
                
                <!-- Services -->
                <div class="footer-section">
                    <h4>Nos Services</h4>
                    <ul class="footer-links">
                        <li><a href="/services.php#comptabilite">Comptabilité générale</a></li>
                        <li><a href="/services.php#developpement">Développement web</a></li>
                        <li><a href="/services.php#conseil">Conseil fiscal</a></li>
                        <li><a href="/services.php#accompagnement">Accompagnement TPE/PME</a></li>
                        <li><a href="/services.php#formation">Formation comptable</a></li>
                    </ul>
                </div>
                
                <!-- Ressources -->
                <div class="footer-section">
                    <h4>Ressources</h4>
                    <ul class="footer-links">
                        <li><a href="/blog.php">Blog & Actualités</a></li>
                        <li><a href="/ressources.php">Ressources gratuites</a></li>
                        <li><a href="/faq.php">Questions fréquentes</a></li>
                        <li><a href="/etudes-de-cas.php">Études de cas</a></li>
                        <li><a href="/temoignages.php">Témoignages clients</a></li>
                    </ul>
                </div>
                
                <!-- Entreprise -->
                <div class="footer-section">
                    <h4>Entreprise</h4>
                    <ul class="footer-links">
                        <li><a href="/a-propos.php">À propos</a></li>
                        <li><a href="/equipe.php">Notre équipe</a></li>
                        <li><a href="/tarifs.php">Tarifs</a></li>
                        <li><a href="/devis.php">Demander un devis</a></li>
                        <li><a href="/contact.php">Nous contacter</a></li>
                    </ul>
                </div>
                
                <!-- Newsletter -->
                <div class="footer-section">
                    <h4>Newsletter</h4>
                    <p>Restez informé de nos actualités et conseils</p>
                    <form class="newsletter-form" id="newsletter-form">
                        <div class="form-group">
                            <input type="email" name="email" placeholder="Votre email" required>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-paper-plane"></i>
                            </button>
                        </div>
                        <div class="form-checkbox">
                            <label>
                                <input type="checkbox" name="consentement" required>
                                <span>J'accepte de recevoir la newsletter</span>
                            </label>
                        </div>
                    </form>
                </div>
            </div>
            
            <!-- Barre de séparation -->
            <div class="footer-divider"></div>
            
            <!-- Bas de footer -->
            <div class="footer-bottom">
                <div class="footer-bottom-left">
                    <p>&copy; <?php echo date('Y'); ?> Maickel Okereke. Tous droits réservés.</p>
                </div>
                
                <div class="footer-bottom-center">
                    <ul class="footer-legal">
                        <li><a href="/mentions-legales.php">Mentions légales</a></li>
                        <li><a href="/politique-de-confidentialite.php">Politique de confidentialité</a></li>
                        <li><a href="/plan-du-site.php">Plan du site</a></li>
                    </ul>
                </div>
                
                <div class="footer-bottom-right">
                    <div class="social-links">
                        <a href="https://linkedin.com/in/maickel-okereke" target="_blank" rel="noopener" aria-label="LinkedIn">
                            <i class="fab fa-linkedin"></i>
                        </a>
                        <a href="https://twitter.com/maickel_okereke" target="_blank" rel="noopener" aria-label="Twitter">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="https://facebook.com/maickel.okereke" target="_blank" rel="noopener" aria-label="Facebook">
                            <i class="fab fa-facebook"></i>
                        </a>
                        <a href="https://instagram.com/maickel_okereke" target="_blank" rel="noopener" aria-label="Instagram">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    
    <!-- Bouton retour en haut -->
    <button class="back-to-top" id="back-to-top" aria-label="Retour en haut de page">
        <i class="fas fa-chevron-up"></i>
    </button>
    
    <!-- Modals -->
    <div class="modal-overlay" id="modal-overlay"></div>
    
    <!-- Modal de contact rapide -->
    <div class="modal" id="contact-modal">
        <div class="modal-header">
            <h3>Contact rapide</h3>
            <button class="modal-close" aria-label="Fermer">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="modal-body">
            <form class="contact-form" id="contact-form">
                <div class="form-row">
                    <div class="form-group">
                        <label for="contact-nom">Nom complet *</label>
                        <input type="text" id="contact-nom" name="nom" required>
                    </div>
                    <div class="form-group">
                        <label for="contact-email">Email *</label>
                        <input type="email" id="contact-email" name="email" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="contact-sujet">Sujet *</label>
                    <select id="contact-sujet" name="sujet" required>
                        <option value="">Choisir un sujet</option>
                        <option value="devis">Demande de devis</option>
                        <option value="conseil">Conseil comptable</option>
                        <option value="developpement">Développement web</option>
                        <option value="autre">Autre</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="contact-message">Message *</label>
                    <textarea id="contact-message" name="message" rows="4" required></textarea>
                </div>
                <div class="form-checkbox">
                    <label>
                        <input type="checkbox" name="consentement" required>
                        <span>J'accepte que mes données soient traitées pour cette demande de contact</span>
                    </label>
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-paper-plane"></i>
                        Envoyer le message
                    </button>
                </div>
            </form>
        </div>
    </div>
    
    <!-- Modal de notification -->
    <div class="notification-modal" id="notification-modal">
        <div class="notification-content">
            <i class="notification-icon"></i>
            <div class="notification-text">
                <h4 class="notification-title"></h4>
                <p class="notification-message"></p>
            </div>
            <button class="notification-close" aria-label="Fermer">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
    
    <!-- JavaScript principal -->
    <script src="/assets/js/main.js"></script>
    <script src="/assets/js/navigation.js"></script>
    
    <!-- JavaScript spécifique à la page -->
    <?php if (isset($page_js)): ?>
        <?php foreach ($page_js as $js): ?>
            <script src="<?php echo $js; ?>"></script>
        <?php endforeach; ?>
    <?php endif; ?>
    
    <!-- Scripts inline pour les fonctionnalités spécifiques -->
    <script>
        // Initialisation des fonctionnalités communes
        document.addEventListener('DOMContentLoaded', function() {
            // Initialisation des modals
            initModals();
            
            // Initialisation des formulaires
            initForms();
            
            // Initialisation de la navigation
            initNavigation();
            
            // Initialisation des effets de scroll
            initScrollEffects();
            
            // Initialisation des animations
            initAnimations();
            
            // Initialisation du lazy loading
            initLazyLoading();
            
            // Initialisation des analytics
            initAnalytics();
        });
        
        // Gestion de la newsletter
        document.getElementById('newsletter-form')?.addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            
            // Simulation d'envoi (à remplacer par une vraie requête AJAX)
            showNotification('success', 'Inscription réussie', 'Vous recevrez bientôt nos actualités !');
            this.reset();
        });
        
        // Gestion du formulaire de contact rapide
        document.getElementById('contact-form')?.addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            
            // Simulation d'envoi (à remplacer par une vraie requête AJAX)
            showNotification('success', 'Message envoyé', 'Nous vous répondrons dans les plus brefs délais.');
            closeModal('contact-modal');
            this.reset();
        });
    </script>
</body>
</html>