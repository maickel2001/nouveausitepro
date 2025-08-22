<?php
/**
 * Déconnexion - Site professionnel de Maickel Okereke
 */

// Démarrer la session
session_start();

// Définir les variables de page
$page_title = 'Déconnexion - Maickel Okereke';
$page_description = 'Vous avez été déconnecté avec succès de votre espace utilisateur.';
$page_keywords = 'déconnexion, logout, espace utilisateur, Maickel Okereke';

// Nettoyer toutes les variables de session
$_SESSION = array();

// Détruire le cookie de session si il existe
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Détruire la session
session_destroy();

// Rediriger vers la page d'accueil après un court délai
$redirect_url = '/index.php';
$redirect_delay = 3; // secondes

// Inclusion de l'en-tête
include 'includes/header.php';
?>

<!-- Section de déconnexion -->
<section class="section section-logout">
    <div class="container">
        <div class="logout-container">
            <div class="logout-content">
                <!-- Icône de déconnexion -->
                <div class="logout-icon">
                    <i class="fas fa-sign-out-alt"></i>
                </div>
                
                <!-- Message de confirmation -->
                <div class="logout-message">
                    <h1>Déconnexion réussie</h1>
                    <p>Vous avez été déconnecté de votre espace utilisateur avec succès.</p>
                    <p class="redirect-info">Vous allez être redirigé vers la page d'accueil dans <span id="countdown"><?php echo $redirect_delay; ?></span> secondes...</p>
                </div>
                
                <!-- Actions -->
                <div class="logout-actions">
                    <a href="/index.php" class="btn btn-primary">
                        <i class="fas fa-home"></i>
                        <span>Retour à l'accueil</span>
                    </a>
                    
                    <a href="/login.php" class="btn btn-outline">
                        <i class="fas fa-sign-in-alt"></i>
                        <span>Se reconnecter</span>
                    </a>
                </div>
                
                <!-- Informations supplémentaires -->
                <div class="logout-info">
                    <div class="info-card">
                        <i class="fas fa-shield-alt"></i>
                        <h3>Sécurité</h3>
                        <p>Votre session a été fermée en toute sécurité. Toutes les données sensibles ont été supprimées.</p>
                    </div>
                    
                    <div class="info-card">
                        <i class="fas fa-clock"></i>
                        <h3>Session</h3>
                        <p>Vous pouvez vous reconnecter à tout moment pour accéder à votre espace utilisateur.</p>
                    </div>
                    
                    <div class="info-card">
                        <i class="fas fa-question-circle"></i>
                        <h3>Besoin d'aide ?</h3>
                        <p>Si vous rencontrez des difficultés, n'hésitez pas à nous contacter.</p>
                    </div>
                </div>
                
                <!-- Liens utiles -->
                <div class="useful-links">
                    <h3>Liens utiles</h3>
                    <div class="links-grid">
                        <a href="/services.php" class="link-item">
                            <i class="fas fa-cogs"></i>
                            <span>Nos services</span>
                        </a>
                        
                        <a href="/contact.php" class="link-item">
                            <i class="fas fa-envelope"></i>
                            <span>Nous contacter</span>
                        </a>
                        
                        <a href="/faq.php" class="link-item">
                            <i class="fas fa-question-circle"></i>
                            <span>FAQ</span>
                        </a>
                        
                        <a href="/ressources.php" class="link-item">
                            <i class="fas fa-download"></i>
                            <span>Ressources</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- JavaScript spécifique à la page -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Animation de l'icône de déconnexion
    const logoutIcon = document.querySelector('.logout-icon i');
    if (logoutIcon) {
        setTimeout(() => {
            logoutIcon.classList.add('animate');
        }, 500);
    }
    
    // Animation des cartes d'information
    const infoCards = document.querySelectorAll('.info-card');
    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry, index) => {
            if (entry.isIntersecting) {
                setTimeout(() => {
                    entry.target.classList.add('animate');
                }, index * 200);
            }
        });
    });
    
    infoCards.forEach(card => observer.observe(card));
    
    // Animation des liens utiles
    const linkItems = document.querySelectorAll('.link-item');
    linkItems.forEach((link, index) => {
        link.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-5px) scale(1.05)';
        });
        
        link.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
        });
        
        // Animation d'apparition
        setTimeout(() => {
            link.classList.add('animate');
        }, 1000 + (index * 100));
    });
    
    // Compteur de redirection
    let countdown = <?php echo $redirect_delay; ?>;
    const countdownElement = document.getElementById('countdown');
    
    const countdownInterval = setInterval(() => {
        countdown--;
        if (countdownElement) {
            countdownElement.textContent = countdown;
        }
        
        if (countdown <= 0) {
            clearInterval(countdownInterval);
            window.location.href = '<?php echo $redirect_url; ?>';
        }
    }, 1000);
    
    // Gestion des boutons d'action
    const actionButtons = document.querySelectorAll('.btn');
    actionButtons.forEach(button => {
        button.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-2px)';
            this.style.boxShadow = '0 8px 25px rgba(0, 123, 255, 0.3)';
        });
        
        button.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
            this.style.boxShadow = '';
        });
    });
    
    // Animation des cartes d'information au hover
    infoCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-10px)';
            this.style.boxShadow = '0 15px 35px rgba(0, 0, 0, 0.1)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
            this.style.boxShadow = '';
        });
    });
    
    // Effet de parallaxe léger sur le scroll
    window.addEventListener('scroll', function() {
        const scrolled = window.pageYOffset;
        const parallaxElements = document.querySelectorAll('.logout-icon, .info-card');
        
        parallaxElements.forEach((element, index) => {
            const speed = 0.5 + (index * 0.1);
            element.style.transform = `translateY(${scrolled * speed}px)`;
        });
    });
    
    // Animation des liens utiles au hover
    linkItems.forEach(link => {
        link.addEventListener('mouseenter', function() {
            const icon = this.querySelector('i');
            if (icon) {
                icon.style.transform = 'rotate(360deg) scale(1.2)';
            }
        });
        
        link.addEventListener('mouseleave', function() {
            const icon = this.querySelector('i');
            if (icon) {
                icon.style.transform = 'rotate(0deg) scale(1)';
            }
        });
    });
    
    // Effet de ripple sur les boutons
    actionButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            const ripple = document.createElement('span');
            const rect = this.getBoundingClientRect();
            const size = Math.max(rect.width, rect.height);
            const x = e.clientX - rect.left - size / 2;
            const y = e.clientY - rect.top - size / 2;
            
            ripple.style.width = ripple.style.height = size + 'px';
            ripple.style.left = x + 'px';
            ripple.style.top = y + 'px';
            ripple.classList.add('ripple');
            
            this.appendChild(ripple);
            
            setTimeout(() => {
                ripple.remove();
            }, 600);
        });
    });
    
    // Animation du message de déconnexion
    const logoutMessage = document.querySelector('.logout-message');
    if (logoutMessage) {
        setTimeout(() => {
            logoutMessage.classList.add('animate');
        }, 300);
    }
    
    // Animation des actions
    const logoutActions = document.querySelector('.logout-actions');
    if (logoutActions) {
        setTimeout(() => {
            logoutActions.classList.add('animate');
        }, 600);
    }
    
    // Animation des liens utiles
    const usefulLinks = document.querySelector('.useful-links');
    if (usefulLinks) {
        setTimeout(() => {
            usefulLinks.classList.add('animate');
        }, 900);
    }
});

// Fonction pour annuler la redirection automatique
function cancelRedirect() {
    const countdownElement = document.getElementById('countdown');
    if (countdownElement) {
        countdownElement.textContent = 'Annulée';
        countdownElement.style.color = '#dc3545';
    }
    
    // Arrêter le compteur
    if (window.countdownInterval) {
        clearInterval(window.countdownInterval);
    }
}

// Fonction pour rediriger immédiatement
function redirectNow() {
    window.location.href = '<?php echo $redirect_url; ?>';
}

// Gestion des raccourcis clavier
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        cancelRedirect();
    } else if (e.key === 'Enter') {
        redirectNow();
    }
});

// Gestion du clic sur l'icône de déconnexion pour annuler
document.addEventListener('DOMContentLoaded', function() {
    const logoutIcon = document.querySelector('.logout-icon');
    if (logoutIcon) {
        logoutIcon.addEventListener('click', function() {
            cancelRedirect();
            this.style.cursor = 'pointer';
            this.title = 'Cliquez pour annuler la redirection';
        });
    }
});
</script>

<!-- Styles spécifiques à la page -->
<style>
.section-logout {
    min-height: 100vh;
    display: flex;
    align-items: center;
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
}

.logout-container {
    width: 100%;
    max-width: 800px;
    margin: 0 auto;
    text-align: center;
}

.logout-content {
    background: white;
    border-radius: 20px;
    padding: 3rem 2rem;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
    position: relative;
    overflow: hidden;
}

.logout-icon {
    margin-bottom: 2rem;
}

.logout-icon i {
    font-size: 4rem;
    color: #007bff;
    transition: all 0.5s ease;
}

.logout-icon i.animate {
    animation: logoutIconAnimation 1s ease-in-out;
}

@keyframes logoutIconAnimation {
    0% { transform: scale(0) rotate(-180deg); opacity: 0; }
    50% { transform: scale(1.2) rotate(0deg); opacity: 1; }
    100% { transform: scale(1) rotate(0deg); opacity: 1; }
}

.logout-message h1 {
    font-size: 2.5rem;
    color: #333;
    margin-bottom: 1rem;
    opacity: 0;
    transform: translateY(30px);
    transition: all 0.6s ease;
}

.logout-message.animate h1 {
    opacity: 1;
    transform: translateY(0);
}

.logout-message p {
    font-size: 1.1rem;
    color: #666;
    margin-bottom: 1rem;
    opacity: 0;
    transform: translateY(20px);
    transition: all 0.6s ease 0.2s;
}

.logout-message.animate p {
    opacity: 1;
    transform: translateY(0);
}

.redirect-info {
    font-weight: 600;
    color: #007bff;
}

#countdown {
    font-weight: bold;
    color: #dc3545;
}

.logout-actions {
    margin: 2rem 0;
    display: flex;
    gap: 1rem;
    justify-content: center;
    flex-wrap: wrap;
    opacity: 0;
    transform: translateY(30px);
    transition: all 0.6s ease 0.4s;
}

.logout-actions.animate {
    opacity: 1;
    transform: translateY(0);
}

.logout-actions .btn {
    padding: 0.75rem 1.5rem;
    border-radius: 50px;
    font-weight: 600;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.btn .ripple {
    position: absolute;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.6);
    transform: scale(0);
    animation: ripple 0.6s linear;
    pointer-events: none;
}

@keyframes ripple {
    to { transform: scale(4); opacity: 0; }
}

.logout-info {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 1.5rem;
    margin: 2rem 0;
}

.info-card {
    background: #f8f9fa;
    padding: 1.5rem;
    border-radius: 15px;
    text-align: center;
    transition: all 0.3s ease;
    opacity: 0;
    transform: translateY(30px);
}

.info-card.animate {
    opacity: 1;
    transform: translateY(0);
}

.info-card i {
    font-size: 2rem;
    color: #007bff;
    margin-bottom: 1rem;
}

.info-card h3 {
    font-size: 1.2rem;
    color: #333;
    margin-bottom: 0.5rem;
}

.info-card p {
    color: #666;
    font-size: 0.9rem;
    line-height: 1.5;
}

.useful-links {
    margin-top: 2rem;
    opacity: 0;
    transform: translateY(30px);
    transition: all 0.6s ease 0.6s;
}

.useful-links.animate {
    opacity: 1;
    transform: translateY(0);
}

.useful-links h3 {
    color: #333;
    margin-bottom: 1rem;
}

.links-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
    gap: 1rem;
}

.link-item {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 1rem;
    background: #f8f9fa;
    border-radius: 10px;
    text-decoration: none;
    color: #333;
    transition: all 0.3s ease;
    opacity: 0;
    transform: translateY(20px);
}

.link-item.animate {
    opacity: 1;
    transform: translateY(0);
}

.link-item i {
    font-size: 1.5rem;
    color: #007bff;
    margin-bottom: 0.5rem;
    transition: all 0.3s ease;
}

.link-item span {
    font-size: 0.9rem;
    font-weight: 500;
}

.link-item:hover {
    background: #007bff;
    color: white;
    transform: translateY(-5px);
}

.link-item:hover i {
    color: white;
}

/* Responsive */
@media (max-width: 768px) {
    .logout-content {
        padding: 2rem 1rem;
        margin: 1rem;
    }
    
    .logout-message h1 {
        font-size: 2rem;
    }
    
    .logout-actions {
        flex-direction: column;
        align-items: center;
    }
    
    .logout-info {
        grid-template-columns: 1fr;
    }
    
    .links-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 480px) {
    .logout-icon i {
        font-size: 3rem;
    }
    
    .logout-message h1 {
        font-size: 1.8rem;
    }
    
    .logout-actions .btn {
        width: 100%;
        max-width: 300px;
    }
    
    .links-grid {
        grid-template-columns: 1fr;
    }
}
</style>

<?php
// Inclusion du pied de page
include 'includes/footer.php';
?>