<?php
/**
 * Page du plan du site
 * Site professionnel de Maickel Okereke
 */

// Configuration de la page
$page_title = 'Plan du site - Maickel Okereke';
$page_description = 'Plan du site et navigation complète du site professionnel de Maickel Okereke, expert en comptabilité et développement web.';
$page_keywords = 'plan du site, navigation, sitemap, Maickel Okereke, comptabilité, développement web';

// Inclusion des fichiers nécessaires
require_once 'includes/functions.php';

// Inclusion de l'en-tête
include 'includes/header.php';
?>

<!-- Section du plan du site -->
<section class="section section-sitemap">
    <div class="container">
        <div class="sitemap-container">
            <div class="section-header">
                <h1>Plan du site</h1>
                <p>Naviguez facilement dans toutes les pages de notre site</p>
            </div>
            
            <div class="sitemap-content">
                <!-- Accueil -->
                <div class="sitemap-section">
                    <h2><i class="fas fa-home"></i> Accueil</h2>
                    <div class="sitemap-links">
                        <a href="/" class="sitemap-link">
                            <span class="link-title">Page d'accueil</span>
                            <span class="link-desc">Présentation de nos services et expertise</span>
                        </a>
                    </div>
                </div>
                
                <!-- Services -->
                <div class="sitemap-section">
                    <h2><i class="fas fa-cogs"></i> Services</h2>
                    <div class="sitemap-links">
                        <a href="/services.php" class="sitemap-link">
                            <span class="link-title">Nos services</span>
                            <span class="link-desc">Découvrez notre gamme complète de services</span>
                        </a>
                        <a href="/devis.php" class="sitemap-link">
                            <span class="link-title">Demander un devis</span>
                            <span class="link-desc">Formulaire de demande de devis personnalisé</span>
                        </a>
                        <a href="/tarifs.php" class="sitemap-link">
                            <span class="link-title">Tarifs et forfaits</span>
                            <span class="link-desc">Nos tarifs et options de paiement</span>
                        </a>
                    </div>
                </div>
                
                <!-- À propos -->
                <div class="sitemap-section">
                    <h2><i class="fas fa-info-circle"></i> À propos</h2>
                    <div class="sitemap-links">
                        <a href="/a-propos.php" class="sitemap-link">
                            <span class="link-title">Qui sommes-nous</span>
                            <span class="link-desc">Découvrez notre histoire et nos valeurs</span>
                        </a>
                        <a href="/equipe.php" class="sitemap-link">
                            <span class="link-title">Notre équipe</span>
                            <span class="link-desc">Rencontrez nos experts et consultants</span>
                        </a>
                    </div>
                </div>
                
                <!-- Études de cas -->
                <div class="sitemap-section">
                    <h2><i class="fas fa-chart-line"></i> Études de cas</h2>
                    <div class="sitemap-links">
                        <a href="/etudes-de-cas.php" class="sitemap-link">
                            <span class="link-title">Nos réalisations</span>
                            <span class="link-desc">Découvrez nos projets et succès clients</span>
                        </a>
                    </div>
                </div>
                
                <!-- Témoignages -->
                <div class="sitemap-section">
                    <h2><i class="fas fa-quote-left"></i> Témoignages</h2>
                    <div class="sitemap-links">
                        <a href="/temoignages.php" class="sitemap-link">
                            <span class="link-title">Avis clients</span>
                            <span class="link-desc">Ce que disent nos clients de nos services</span>
                        </a>
                    </div>
                </div>
                
                <!-- Blog -->
                <div class="sitemap-section">
                    <h2><i class="fas fa-blog"></i> Blog</h2>
                    <div class="sitemap-links">
                        <a href="/blog.php" class="sitemap-link">
                            <span class="link-title">Articles et actualités</span>
                            <span class="link-desc">Nos derniers articles et conseils</span>
                        </a>
                    </div>
                </div>
                
                <!-- FAQ -->
                <div class="sitemap-section">
                    <h2><i class="fas fa-question-circle"></i> FAQ</h2>
                    <div class="sitemap-links">
                        <a href="/faq.php" class="sitemap-link">
                            <span class="link-title">Questions fréquentes</span>
                            <span class="link-desc">Réponses aux questions les plus courantes</span>
                        </a>
                    </div>
                </div>
                
                <!-- Ressources -->
                <div class="sitemap-section">
                    <h2><i class="fas fa-download"></i> Ressources</h2>
                    <div class="sitemap-links">
                        <a href="/ressources.php" class="sitemap-link">
                            <span class="link-title">Téléchargements</span>
                            <span class="link-desc">Documents, guides et outils utiles</span>
                        </a>
                    </div>
                </div>
                
                <!-- Contact et rendez-vous -->
                <div class="sitemap-section">
                    <h2><i class="fas fa-envelope"></i> Contact et rendez-vous</h2>
                    <div class="sitemap-links">
                        <a href="/contact.php" class="sitemap-link">
                            <span class="link-title">Nous contacter</span>
                            <span class="link-desc">Formulaire de contact et informations</span>
                        </a>
                        <a href="/rendez-vous.php" class="sitemap-link">
                            <span class="link-title">Prendre rendez-vous</span>
                            <span class="link-desc">Planifier une consultation ou un entretien</span>
                        </a>
                    </div>
                </div>
                
                <!-- Espace utilisateur -->
                <div class="sitemap-section">
                    <h2><i class="fas fa-user"></i> Espace utilisateur</h2>
                    <div class="sitemap-links">
                        <a href="/login.php" class="sitemap-link">
                            <span class="link-title">Connexion</span>
                            <span class="link-desc">Accéder à votre espace personnel</span>
                        </a>
                        <a href="/register.php" class="sitemap-link">
                            <span class="link-title">Inscription</span>
                            <span class="link-desc">Créer votre compte utilisateur</span>
                        </a>
                    </div>
                </div>
                
                <!-- Pages légales -->
                <div class="sitemap-section">
                    <h2><i class="fas fa-gavel"></i> Pages légales</h2>
                    <div class="sitemap-links">
                        <a href="/mentions-legales.php" class="sitemap-link">
                            <span class="link-title">Mentions légales</span>
                            <span class="link-desc">Informations légales et mentions obligatoires</span>
                        </a>
                        <a href="/politique-de-confidentialite.php" class="sitemap-link">
                            <span class="link-title">Politique de confidentialité</span>
                            <span class="link-desc">Protection de vos données personnelles</span>
                        </a>
                        <a href="/plan-du-site.php" class="sitemap-link current">
                            <span class="link-title">Plan du site</span>
                            <span class="link-desc">Navigation complète du site (page actuelle)</span>
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Actions rapides -->
            <div class="sitemap-actions">
                <div class="actions-grid">
                    <a href="/contact.php" class="action-card">
                        <div class="action-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="action-content">
                            <h3>Nous contacter</h3>
                            <p>Une question ? Besoin d'aide ? Contactez-nous directement</p>
                        </div>
                        <div class="action-arrow">
                            <i class="fas fa-arrow-right"></i>
                        </div>
                    </a>
                    
                    <a href="/devis.php" class="action-card">
                        <div class="action-icon">
                            <i class="fas fa-calculator"></i>
                        </div>
                        <div class="action-content">
                            <h3>Demander un devis</h3>
                            <p>Obtenez un devis personnalisé pour vos projets</p>
                        </div>
                        <div class="action-arrow">
                            <i class="fas fa-arrow-right"></i>
                        </div>
                    </a>
                    
                    <a href="/ressources.php" class="action-card">
                        <div class="action-icon">
                            <i class="fas fa-download"></i>
                        </div>
                        <div class="action-content">
                            <h3>Télécharger des ressources</h3>
                            <p>Accédez à nos guides, modèles et outils gratuits</p>
                        </div>
                        <div class="action-arrow">
                            <i class="fas fa-arrow-right"></i>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section CTA -->
<section class="section section-cta">
    <div class="container">
        <div class="cta-content">
            <h2>Besoin d'aide pour naviguer ?</h2>
            <p>Notre équipe est là pour vous guider et répondre à toutes vos questions.</p>
            <div class="cta-actions">
                <a href="/contact.php" class="btn btn-primary">
                    <i class="fas fa-envelope"></i>
                    <span>Nous contacter</span>
                </a>
                <a href="/" class="btn btn-outline">
                    <i class="fas fa-home"></i>
                    <span>Retour à l'accueil</span>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- JavaScript spécifique à la page -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Animation des sections au scroll
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate');
            }
        });
    });
    
    const animatedElements = document.querySelectorAll('.sitemap-section, .action-card, .cta-content');
    animatedElements.forEach(el => observer.observe(el));
    
    // Navigation breadcrumb
    const breadcrumb = document.createElement('nav');
    breadcrumb.className = 'breadcrumb';
    breadcrumb.innerHTML = `
        <ol>
            <li><a href="/">Accueil</a></li>
            <li aria-current="page">Plan du site</li>
        </ol>
    `;
    
    const pageHeader = document.querySelector('.section-header');
    if (pageHeader) {
        pageHeader.parentNode.insertBefore(breadcrumb, pageHeader);
    }
    
    // Bouton retour en haut
    const backToTopBtn = document.createElement('button');
    backToTopBtn.className = 'back-to-top';
    backToTopBtn.innerHTML = '<i class="fas fa-arrow-up"></i>';
    backToTopBtn.setAttribute('aria-label', 'Retour en haut');
    
    document.body.appendChild(backToTopBtn);
    
    backToTopBtn.addEventListener('click', () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
    
    // Affichage/masquage du bouton retour en haut
    window.addEventListener('scroll', () => {
        if (window.pageYOffset > 300) {
            backToTopBtn.classList.add('visible');
        } else {
            backToTopBtn.classList.remove('visible');
        }
    });
    
    // Animation des cartes d'action au survol
    const actionCards = document.querySelectorAll('.action-card');
    actionCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-5px)';
            this.style.boxShadow = '0 10px 25px rgba(0, 0, 0, 0.15)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
            this.style.boxShadow = '0 5px 15px rgba(0, 0, 0, 0.1)';
        });
    });
    
    // Mise en surbrillance des liens internes
    const internalLinks = document.querySelectorAll('a[href^="/"]');
    internalLinks.forEach(link => {
        link.addEventListener('mouseenter', function() {
            if (!this.classList.contains('current')) {
                this.style.color = '#2563eb';
                this.style.textDecoration = 'underline';
            }
        });
        
        link.addEventListener('mouseleave', function() {
            if (!this.classList.contains('current')) {
                this.style.color = '';
                this.style.textDecoration = '';
            }
        });
    });
});
</script>

<?php
// Inclusion du pied de page
include 'includes/footer.php';
?>