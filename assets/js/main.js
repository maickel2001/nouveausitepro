// ===== MAIN JAVASCRIPT FILE =====
// Site professionnel de Maickel Okereke - Comptable & Développeur Web

document.addEventListener('DOMContentLoaded', function() {
    console.log('Site Maickel Okereke chargé avec succès');
    
    // Initialisation des composants
    initNavigation();
    initScrollEffects();
    initAnimations();
    initForms();
    initModals();
    
    // Analytics (Google Analytics 4)
    initAnalytics();
});

// ===== NAVIGATION MOBILE =====
function initNavigation() {
    const navbarToggle = document.getElementById('navbar-toggle');
    const navbarMenu = document.getElementById('navbar-menu');
    
    if (navbarToggle && navbarMenu) {
        navbarToggle.addEventListener('click', function() {
            navbarMenu.classList.toggle('active');
            navbarToggle.classList.toggle('active');
        });
        
        // Fermer le menu mobile lors du clic sur un lien
        const navLinks = navbarMenu.querySelectorAll('.nav-link');
        navLinks.forEach(link => {
            link.addEventListener('click', function() {
                navbarMenu.classList.remove('active');
                navbarToggle.classList.remove('active');
            });
        });
    }
}

// ===== EFFETS DE SCROLL =====
function initScrollEffects() {
    // Header transparent au scroll
    const header = document.querySelector('.header');
    if (header) {
        window.addEventListener('scroll', function() {
            if (window.scrollY > 100) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });
    }
    
    // Animation des éléments au scroll
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-in');
            }
        });
    }, observerOptions);
    
    // Observer les éléments à animer
    const animateElements = document.querySelectorAll('.service-card, .testimonial-card, .about-content, .hero-content');
    animateElements.forEach(el => {
        observer.observe(el);
    });
}

// ===== ANIMATIONS =====
function initAnimations() {
    // Animation des statistiques
    const statNumbers = document.querySelectorAll('.stat-number');
    if (statNumbers.length > 0) {
        const animateStats = () => {
            statNumbers.forEach(stat => {
                const target = parseInt(stat.textContent.replace(/\D/g, ''));
                const suffix = stat.textContent.replace(/\d/g, '');
                let current = 0;
                const increment = target / 50;
                
                const timer = setInterval(() => {
                    current += increment;
                    if (current >= target) {
                        current = target;
                        clearInterval(timer);
                    }
                    stat.textContent = Math.floor(current) + suffix;
                }, 30);
            });
        };
        
        // Déclencher l'animation quand les stats sont visibles
        const statsSection = document.querySelector('.about-stats');
        if (statsSection) {
            const statsObserver = new IntersectionObserver(function(entries) {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        animateStats();
                        statsObserver.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.5 });
            
            statsObserver.observe(statsSection);
        }
    }
}

// ===== FORMULAIRES =====
function initForms() {
    // Validation des formulaires
    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            if (!validateForm(form)) {
                e.preventDefault();
                showNotification('Veuillez corriger les erreurs dans le formulaire.', 'error');
            }
        });
    });
    
    // Validation en temps réel
    const inputs = document.querySelectorAll('input, textarea, select');
    inputs.forEach(input => {
        input.addEventListener('blur', function() {
            validateField(input);
        });
        
        input.addEventListener('input', function() {
            clearFieldError(input);
        });
    });
}

// Validation d'un champ
function validateField(field) {
    const value = field.value.trim();
    let isValid = true;
    let errorMessage = '';
    
    // Validation selon le type de champ
    if (field.hasAttribute('required') && !value) {
        isValid = false;
        errorMessage = 'Ce champ est obligatoire.';
    } else if (field.type === 'email' && value && !isValidEmail(value)) {
        isValid = false;
        errorMessage = 'Veuillez entrer une adresse email valide.';
    } else if (field.type === 'tel' && value && !isValidPhone(value)) {
        isValid = false;
        errorMessage = 'Veuillez entrer un numéro de téléphone valide.';
    }
    
    if (!isValid) {
        showFieldError(field, errorMessage);
    } else {
        clearFieldError(field);
    }
    
    return isValid;
}

// Validation d'un formulaire complet
function validateForm(form) {
    const fields = form.querySelectorAll('input, textarea, select');
    let isValid = true;
    
    fields.forEach(field => {
        if (!validateField(field)) {
            isValid = false;
        }
    });
    
    return isValid;
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

// Afficher une erreur de champ
function showFieldError(field, message) {
    clearFieldError(field);
    
    const errorDiv = document.createElement('div');
    errorDiv.className = 'field-error';
    errorDiv.textContent = message;
    errorDiv.style.color = '#dc2626';
    errorDiv.style.fontSize = '0.875rem';
    errorDiv.style.marginTop = '0.25rem';
    
    field.parentNode.appendChild(errorDiv);
    field.classList.add('error');
}

// Effacer une erreur de champ
function clearFieldError(field) {
    const errorDiv = field.parentNode.querySelector('.field-error');
    if (errorDiv) {
        errorDiv.remove();
    }
    field.classList.remove('error');
}

// ===== MODALES =====
function initModals() {
    // Gestion des modales
    const modalTriggers = document.querySelectorAll('[data-modal]');
    const modals = document.querySelectorAll('.modal');
    
    modalTriggers.forEach(trigger => {
        trigger.addEventListener('click', function(e) {
            e.preventDefault();
            const modalId = this.getAttribute('data-modal');
            openModal(modalId);
        });
    });
    
    // Fermer les modales
    modals.forEach(modal => {
        const closeBtn = modal.querySelector('.modal-close');
        if (closeBtn) {
            closeBtn.addEventListener('click', function() {
                closeModal(modal);
            });
        }
        
        // Fermer en cliquant à l'extérieur
        modal.addEventListener('click', function(e) {
            if (e.target === modal) {
                closeModal(modal);
            }
        });
    });
    
    // Fermer avec la touche Escape
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            const openModal = document.querySelector('.modal.active');
            if (openModal) {
                closeModal(openModal);
            }
        }
    });
}

// Ouvrir une modale
function openModal(modalId) {
    const modal = document.getElementById(modalId);
    if (modal) {
        modal.classList.add('active');
        document.body.style.overflow = 'hidden';
    }
}

// Fermer une modale
function closeModal(modal) {
    modal.classList.remove('active');
    document.body.style.overflow = '';
}

// ===== NOTIFICATIONS =====
function showNotification(message, type = 'info', duration = 5000) {
    // Supprimer les notifications existantes
    const existingNotifications = document.querySelectorAll('.notification');
    existingNotifications.forEach(notification => {
        notification.remove();
    });
    
    // Créer la notification
    const notification = document.createElement('div');
    notification.className = `notification notification-${type}`;
    notification.innerHTML = `
        <div class="notification-content">
            <span class="notification-message">${message}</span>
            <button class="notification-close">&times;</button>
        </div>
    `;
    
    // Styles de base
    notification.style.cssText = `
        position: fixed;
        top: 20px;
        right: 20px;
        background: ${type === 'error' ? '#dc2626' : type === 'success' ? '#059669' : '#2563eb'};
        color: white;
        padding: 1rem 1.5rem;
        border-radius: 8px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        z-index: 10000;
        max-width: 400px;
        animation: slideInRight 0.3s ease;
    `;
    
    // Ajouter au DOM
    document.body.appendChild(notification);
    
    // Gérer la fermeture
    const closeBtn = notification.querySelector('.notification-close');
    closeBtn.addEventListener('click', function() {
        removeNotification(notification);
    });
    
    // Auto-fermeture
    setTimeout(() => {
        removeNotification(notification);
    }, duration);
    
    // Animation de fermeture
    function removeNotification(notification) {
        notification.style.animation = 'slideOutRight 0.3s ease';
        setTimeout(() => {
            if (notification.parentNode) {
                notification.parentNode.removeChild(notification);
            }
        }, 300);
    }
}

// ===== ANALYTICS =====
function initAnalytics() {
    // Google Analytics 4 (à configurer avec l'ID réel)
    if (typeof gtag !== 'undefined') {
        // Tracking des événements
        trackPageView();
        trackEvents();
    }
}

// Tracking des vues de page
function trackPageView() {
    if (typeof gtag !== 'undefined') {
        gtag('config', 'GA_MEASUREMENT_ID', {
            page_title: document.title,
            page_location: window.location.href
        });
    }
}

// Tracking des événements
function trackEvents() {
    // Clics sur les boutons CTA
    const ctaButtons = document.querySelectorAll('.btn-primary, .btn-outline');
    ctaButtons.forEach(button => {
        button.addEventListener('click', function() {
            if (typeof gtag !== 'undefined') {
                gtag('event', 'click', {
                    event_category: 'CTA',
                    event_label: this.textContent.trim()
                });
            }
        });
    });
    
    // Soumission de formulaires
    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
        form.addEventListener('submit', function() {
            if (typeof gtag !== 'undefined') {
                gtag('event', 'form_submit', {
                    event_category: 'Form',
                    event_label: form.getAttribute('id') || 'form'
                });
            }
        });
    });
}

// ===== UTILITAIRES =====
// Debounce function
function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}

// Throttle function
function throttle(func, limit) {
    let inThrottle;
    return function() {
        const args = arguments;
        const context = this;
        if (!inThrottle) {
            func.apply(context, args);
            inThrottle = true;
            setTimeout(() => inThrottle = false, limit);
        }
    };
}

// Formatage des nombres
function formatNumber(num) {
    return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ");
}

// Formatage des prix
function formatPrice(price, currency = '€') {
    return new Intl.NumberFormat('fr-FR', {
        style: 'currency',
        currency: 'EUR'
    }).format(price);
}

// ===== GESTION DES ERREURS =====
window.addEventListener('error', function(e) {
    console.error('Erreur JavaScript:', e.error);
    
    // Envoyer l'erreur à un service de monitoring (optionnel)
    if (typeof gtag !== 'undefined') {
        gtag('event', 'exception', {
            description: e.error.message,
            fatal: false
        });
    }
});

// ===== PERFORMANCE =====
// Lazy loading des images
function initLazyLoading() {
    if ('IntersectionObserver' in window) {
        const imageObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    img.src = img.dataset.src;
                    img.classList.remove('lazy');
                    imageObserver.unobserve(img);
                }
            });
        });
        
        const lazyImages = document.querySelectorAll('img[data-src]');
        lazyImages.forEach(img => imageObserver.observe(img));
    }
}

// Initialiser le lazy loading
document.addEventListener('DOMContentLoaded', initLazyLoading);