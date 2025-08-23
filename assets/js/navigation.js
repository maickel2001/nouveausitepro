// ===== NAVIGATION JAVASCRIPT =====
// Gestion de la navigation mobile et des interactions de menu

document.addEventListener('DOMContentLoaded', function() {
    initMobileNavigation();
    initScrollNavigation();
    initDropdownMenus();
    initSearchFunctionality();
});

// ===== NAVIGATION MOBILE =====
function initMobileNavigation() {
    const navbarToggle = document.getElementById('navbar-toggle');
    const navbarMenu = document.getElementById('navbar-menu');
    const body = document.body;
    
    if (navbarToggle && navbarMenu) {
        // Toggle du menu mobile
        navbarToggle.addEventListener('click', function(e) {
            e.preventDefault();
            toggleMobileMenu();
        });
        
        // Fermer le menu lors du clic sur un lien
        const mobileLinks = navbarMenu.querySelectorAll('a');
        mobileLinks.forEach(link => {
            link.addEventListener('click', function() {
                if (window.innerWidth <= 768) {
                    closeMobileMenu();
                }
            });
        });
        
        // Fermer le menu lors du redimensionnement de la fenêtre
        window.addEventListener('resize', function() {
            if (window.innerWidth > 768) {
                closeMobileMenu();
            }
        });
        
        // Fermer le menu lors du clic à l'extérieur
        document.addEventListener('click', function(e) {
            if (!navbarToggle.contains(e.target) && !navbarMenu.contains(e.target)) {
                closeMobileMenu();
            }
        });
    }
}

// Toggle du menu mobile
function toggleMobileMenu() {
    const navbarToggle = document.getElementById('navbar-toggle');
    const navbarMenu = document.getElementById('navbar-menu');
    const body = document.body;
    
    if (navbarMenu.classList.contains('active')) {
        closeMobileMenu();
    } else {
        openMobileMenu();
    }
}

// Ouvrir le menu mobile
function openMobileMenu() {
    const navbarToggle = document.getElementById('navbar-toggle');
    const navbarMenu = document.getElementById('navbar-menu');
    const body = document.body;
    
    navbarMenu.classList.add('active');
    navbarToggle.classList.add('active');
    body.style.overflow = 'hidden';
    
    // Animation des barres du hamburger
    const bars = navbarToggle.querySelectorAll('span');
    bars[0].style.transform = 'rotate(45deg) translate(5px, 5px)';
    bars[1].style.opacity = '0';
    bars[2].style.transform = 'rotate(-45deg) translate(7px, -6px)';
}

// Fermer le menu mobile
function closeMobileMenu() {
    const navbarToggle = document.getElementById('navbar-toggle');
    const navbarMenu = document.getElementById('navbar-menu');
    const body = document.body;
    
    navbarMenu.classList.remove('active');
    navbarToggle.classList.remove('active');
    body.style.overflow = '';
    
    // Reset des barres du hamburger
    const bars = navbarToggle.querySelectorAll('span');
    bars[0].style.transform = 'none';
    bars[1].style.opacity = '1';
    bars[2].style.transform = 'none';
}

// ===== NAVIGATION AU SCROLL =====
function initScrollNavigation() {
    const header = document.querySelector('.header');
    const navbar = document.querySelector('.navbar');
    let lastScrollTop = 0;
    
    if (header && navbar) {
        window.addEventListener('scroll', throttle(function() {
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            
            // Ajouter/supprimer la classe scrolled
            if (scrollTop > 100) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
            
            // Navigation qui se cache/apparaît au scroll
            if (scrollTop > lastScrollTop && scrollTop > 200) {
                // Scroll vers le bas - cacher la navbar
                header.style.transform = 'translateY(-100%)';
            } else {
                // Scroll vers le haut - montrer la navbar
                header.style.transform = 'translateY(0)';
            }
            
            lastScrollTop = scrollTop;
        }, 100));
    }
}

// ===== MENUS DÉROULANTS =====
function initDropdownMenus() {
    const dropdownTriggers = document.querySelectorAll('.dropdown-trigger');
    
    dropdownTriggers.forEach(trigger => {
        const dropdown = trigger.nextElementSibling;
        
        if (dropdown && dropdown.classList.contains('dropdown-menu')) {
            // Desktop : hover
            if (window.innerWidth > 768) {
                trigger.addEventListener('mouseenter', function() {
                    showDropdown(dropdown);
                });
                
                trigger.addEventListener('mouseleave', function() {
                    hideDropdown(dropdown);
                });
            }
            
            // Mobile : click
            if (window.innerWidth <= 768) {
                trigger.addEventListener('click', function(e) {
                    e.preventDefault();
                    toggleDropdown(dropdown);
                });
            }
        }
    });
    
    // Gérer le redimensionnement de la fenêtre
    window.addEventListener('resize', function() {
        const dropdowns = document.querySelectorAll('.dropdown-menu');
        dropdowns.forEach(dropdown => {
            if (window.innerWidth > 768) {
                dropdown.classList.remove('active');
            }
        });
    });
}

// Afficher un menu déroulant
function showDropdown(dropdown) {
    dropdown.classList.add('active');
    dropdown.style.opacity = '1';
    dropdown.style.visibility = 'visible';
    dropdown.style.transform = 'translateY(0)';
}

// Cacher un menu déroulant
function hideDropdown(dropdown) {
    dropdown.classList.remove('active');
    dropdown.style.opacity = '0';
    dropdown.style.visibility = 'hidden';
    dropdown.style.transform = 'translateY(-10px)';
}

// Toggle d'un menu déroulant (mobile)
function toggleDropdown(dropdown) {
    if (dropdown.classList.contains('active')) {
        hideDropdown(dropdown);
    } else {
        // Fermer tous les autres dropdowns
        const allDropdowns = document.querySelectorAll('.dropdown-menu');
        allDropdowns.forEach(d => {
            if (d !== dropdown) {
                hideDropdown(d);
            }
        });
        
        showDropdown(dropdown);
    }
}

// ===== FONCTIONNALITÉ DE RECHERCHE =====
function initSearchFunctionality() {
    const searchToggle = document.querySelector('.search-toggle');
    const searchModal = document.querySelector('.search-modal');
    const searchInput = document.querySelector('.search-input');
    
    if (searchToggle && searchModal) {
        // Ouvrir la recherche
        searchToggle.addEventListener('click', function(e) {
            e.preventDefault();
            openSearch();
        });
        
        // Fermer la recherche
        const searchClose = searchModal.querySelector('.search-close');
        if (searchClose) {
            searchClose.addEventListener('click', function() {
                closeSearch();
            });
        }
        
        // Fermer avec Escape
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeSearch();
            }
        });
        
        // Fermer en cliquant à l'extérieur
        searchModal.addEventListener('click', function(e) {
            if (e.target === searchModal) {
                closeSearch();
            }
        });
        
        // Focus automatique sur l'input
        if (searchInput) {
            searchModal.addEventListener('transitionend', function() {
                if (searchModal.classList.contains('active')) {
                    searchInput.focus();
                }
            });
        }
    }
}

// Ouvrir la recherche
function openSearch() {
    const searchModal = document.querySelector('.search-modal');
    const body = document.body;
    
    if (searchModal) {
        searchModal.classList.add('active');
        body.style.overflow = 'hidden';
        
        // Animation d'ouverture
        searchModal.style.opacity = '1';
        searchModal.style.visibility = 'visible';
    }
}

// Fermer la recherche
function closeSearch() {
    const searchModal = document.querySelector('.search-modal');
    const body = document.body;
    
    if (searchModal) {
        searchModal.classList.remove('active');
        body.style.overflow = '';
        
        // Animation de fermeture
        searchModal.style.opacity = '0';
        searchModal.style.visibility = 'hidden';
    }
}

// ===== NAVIGATION PAR ANCRES =====
function initSmoothScrolling() {
    const anchorLinks = document.querySelectorAll('a[href^="#"]');
    
    anchorLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            
            if (href !== '#' && href !== '') {
                e.preventDefault();
                
                const target = document.querySelector(href);
                if (target) {
                    const headerHeight = document.querySelector('.header').offsetHeight;
                    const targetPosition = target.offsetTop - headerHeight - 20;
                    
                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });
                    
                    // Fermer le menu mobile si ouvert
                    closeMobileMenu();
                }
            }
        });
    });
}

// ===== INDICATEUR DE PROGRESSION =====
function initProgressIndicator() {
    const progressBar = document.createElement('div');
    progressBar.className = 'scroll-progress';
    progressBar.style.cssText = `
        position: fixed;
        top: 0;
        left: 0;
        width: 0%;
        height: 3px;
        background: linear-gradient(90deg, #2563eb, #1d4ed8);
        z-index: 10001;
        transition: width 0.1s ease;
    `;
    
    document.body.appendChild(progressBar);
    
    window.addEventListener('scroll', throttle(function() {
        const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        const docHeight = document.documentElement.scrollHeight - window.innerHeight;
        const scrollPercent = (scrollTop / docHeight) * 100;
        
        progressBar.style.width = scrollPercent + '%';
    }, 100));
}

// ===== NAVIGATION PAR CLAVIER =====
function initKeyboardNavigation() {
    document.addEventListener('keydown', function(e) {
        // Navigation par Tab
        if (e.key === 'Tab') {
            const focusableElements = document.querySelectorAll(
                'a[href], button, input, textarea, select, [tabindex]:not([tabindex="-1"])'
            );
            
            const firstElement = focusableElements[0];
            const lastElement = focusableElements[focusableElements.length - 1];
            
            if (e.shiftKey) {
                // Shift + Tab : navigation arrière
                if (document.activeElement === firstElement) {
                    e.preventDefault();
                    lastElement.focus();
                }
            } else {
                // Tab : navigation avant
                if (document.activeElement === lastElement) {
                    e.preventDefault();
                    firstElement.focus();
                }
            }
        }
        
        // Navigation par flèches dans le menu mobile
        if (window.innerWidth <= 768) {
            const activeMenu = document.querySelector('.navbar-menu.active');
            if (activeMenu) {
                const menuItems = activeMenu.querySelectorAll('.nav-link');
                const currentIndex = Array.from(menuItems).findIndex(item => 
                    item === document.activeElement
                );
                
                if (e.key === 'ArrowDown') {
                    e.preventDefault();
                    const nextIndex = (currentIndex + 1) % menuItems.length;
                    menuItems[nextIndex].focus();
                } else if (e.key === 'ArrowUp') {
                    e.preventDefault();
                    const prevIndex = currentIndex === 0 ? menuItems.length - 1 : currentIndex - 1;
                    menuItems[prevIndex].focus();
                }
            }
        }
    });
}

// ===== GESTION DES ÉTATS ACTIFS =====
function initActiveStates() {
    const currentPath = window.location.pathname;
    const navLinks = document.querySelectorAll('.nav-link');
    
    navLinks.forEach(link => {
        const linkPath = link.getAttribute('href');
        
        if (linkPath === currentPath || 
            (currentPath.includes(linkPath) && linkPath !== '/') ||
            (currentPath === '/' && linkPath === 'index.php')) {
            link.classList.add('active');
        } else {
            link.classList.remove('active');
        }
    });
}

// ===== INITIALISATION COMPLÈTE =====
document.addEventListener('DOMContentLoaded', function() {
    initSmoothScrolling();
    initProgressIndicator();
    initKeyboardNavigation();
    initActiveStates();
    
    // Ajouter la classe loaded au body après le chargement
    setTimeout(() => {
        document.body.classList.add('loaded');
    }, 100);
});

// ===== UTILITAIRES =====
// Fonction throttle pour optimiser les performances
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

// Fonction debounce pour optimiser les performances
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

// ===== GESTION DES ERREURS =====
window.addEventListener('error', function(e) {
    console.error('Erreur dans navigation.js:', e.error);
});

// ===== PERFORMANCE =====
// Optimisation des événements de scroll
const optimizedScrollHandler = throttle(function() {
    // Gérer le scroll de manière optimisée
}, 16); // ~60fps

window.addEventListener('scroll', optimizedScrollHandler, { passive: true });