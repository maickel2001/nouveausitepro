<?php
/**
 * Page FAQ
 * Site professionnel de Maickel Okereke
 */

// Configuration de la page
$page_title = 'FAQ - Questions Fréquentes - Maickel Okereke';
$page_description = 'Trouvez rapidement les réponses à vos questions sur nos services de comptabilité et développement web.';
$page_keywords = 'FAQ, questions fréquentes, comptabilité, développement web, Maickel Okereke';

// Données de la FAQ (en production, viendront de la base de données)
$faq_categories = [
    'general' => [
        'titre' => 'Général',
        'questions' => [
            [
                'question' => 'Quels sont vos horaires de disponibilité ?',
                'reponse' => 'Nous sommes disponibles du lundi au vendredi de 9h00 à 18h00, et le samedi de 9h00 à 12h00 sur rendez-vous. En dehors de ces horaires, vous pouvez laisser un message, nous vous répondrons dès la réouverture.'
            ],
            [
                'question' => 'Proposez-vous des consultations à distance ?',
                'reponse' => 'Oui, la plupart de nos services peuvent être réalisés à distance via visioconférence et outils collaboratifs. Cela nous permet d\'accompagner des clients partout en France et à l\'international.'
            ],
            [
                'question' => 'Quelle est votre zone d\'intervention ?',
                'reponse' => 'Nous intervenons sur site à Paris et en Île-de-France. Pour le reste de la France et l\'international, nous proposons un accompagnement complet à distance grâce aux outils numériques modernes.'
            ]
        ]
    ],
    'comptabilite' => [
        'titre' => 'Comptabilité',
        'questions' => [
            [
                'question' => 'Quels documents dois-je fournir pour commencer ?',
                'reponse' => 'Nous vous demandons généralement vos derniers bilans, déclarations fiscales, documents d\'identification de l\'entreprise et les justificatifs des derniers mois. Nous vous fournissons une liste complète lors de la première consultation.'
            ],
            [
                'question' => 'Combien de temps faut-il pour mettre en place la comptabilité ?',
                'reponse' => 'La mise en place complète prend généralement 2 à 4 semaines selon la complexité de votre entreprise. Nous commençons par une phase d\'audit et de mise en place des processus.'
            ],
            [
                'question' => 'Proposez-vous un suivi de trésorerie ?',
                'reponse' => 'Oui, le suivi de trésorerie est inclus dans nos services de comptabilité générale. Nous vous fournissons un reporting mensuel détaillé et des alertes en cas de besoin.'
            ],
            [
                'question' => 'Pouvez-vous m\'aider avec mes déclarations fiscales ?',
                'reponse' => 'Absolument ! Nous gérons toutes vos déclarations fiscales : TVA, IS, IR, taxes locales. Nous vous accompagnons également pour l\'optimisation fiscale de votre entreprise.'
            ]
        ]
    ],
    'developpement' => [
        'titre' => 'Développement Web',
        'questions' => [
            [
                'question' => 'Combien de temps faut-il pour créer un site web ?',
                'reponse' => 'Le délai varie selon la complexité : un site vitrine simple prend 2-4 semaines, un site e-commerce 6-12 semaines, et une application web sur mesure 8-20 semaines. Nous établissons un planning détaillé lors du devis.'
            ],
            [
                'question' => 'Mes sites sont-ils responsives ?',
                'reponse' => 'Oui, tous nos sites sont conçus en mobile-first et parfaitement responsives. Ils s\'adaptent automatiquement à tous les écrans : mobile, tablette et desktop.'
            ],
            [
                'question' => 'Proposez-vous la maintenance des sites ?',
                'reponse' => 'Oui, nous proposons des contrats de maintenance incluant mises à jour, sauvegardes, sécurité et support technique. Nous assurons également la formation de vos équipes.'
            ],
            [
                'question' => 'Pouvez-vous optimiser un site existant ?',
                'reponse' => 'Bien sûr ! Nous proposons des audits de performance, d\'optimisation SEO et de sécurité. Nous pouvons également refactoriser et moderniser des sites existants.'
            ]
        ]
    ],
    'tarifs' => [
        'titre' => 'Tarifs & Devis',
        'questions' => [
            [
                'question' => 'Quels sont vos tarifs ?',
                'reponse' => 'Nos tarifs varient selon la complexité de votre projet et vos besoins spécifiques. La première consultation est gratuite pour évaluer vos besoins et vous proposer un devis personnalisé.'
            ],
            [
                'question' => 'La première consultation est-elle vraiment gratuite ?',
                'reponse' => 'Oui, nous proposons une première consultation gratuite de 30 minutes pour faire connaissance, comprendre vos besoins et vous proposer les meilleures solutions. C\'est sans engagement.'
            ],
            [
                'question' => 'Proposez-vous des forfaits ?',
                'reponse' => 'Oui, nous proposons des forfaits pour certains services comme la comptabilité mensuelle. Pour les projets sur mesure, nous établissons des devis personnalisés avec décomposition détaillée des coûts.'
            ],
            [
                'question' => 'Y a-t-il des frais cachés ?',
                'reponse' => 'Non, nous pratiquons une politique de transparence totale. Tous les coûts sont clairement détaillés dans nos devis, sans surprise. Nous vous informons de tout changement en cours de projet.'
            ]
        ]
    ],
    'debuter' => [
        'titre' => 'Débuter avec nous',
        'questions' => [
            [
                'question' => 'Comment prendre rendez-vous pour la première fois ?',
                'reponse' => 'Vous pouvez prendre rendez-vous via notre formulaire de contact, par téléphone ou en utilisant notre système de prise de rendez-vous en ligne. Nous nous adaptons à vos disponibilités.'
            ],
            [
                'question' => 'Quels documents dois-je préparer ?',
                'reponse' => 'Pour la première consultation, préparez simplement une description de vos besoins et vos questions. Nous vous demanderons les documents spécifiques lors de la mise en place du service.'
            ],
            [
                'question' => 'Puis-je changer de prestataire en cours d\'année ?',
                'reponse' => 'Oui, nous proposons des contrats flexibles. Nous vous accompagnons dans la transition et vous remettons tous vos documents comptables dans les règles de l\'art.'
            ],
            [
                'question' => 'Proposez-vous un essai gratuit ?',
                'reponse' => 'Nous proposons une période d\'essai de 30 jours pour certains services. Cela vous permet de tester notre qualité de service avant de vous engager sur le long terme.'
            ]
        ]
    ]
];

// En-tête de page personnalisé
$page_header = '
<div class="page-header-content">
    <h1>Questions Fréquentes</h1>
    <p>Trouvez rapidement les réponses à vos questions les plus courantes</p>
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
                <h2>Des réponses claires à vos questions</h2>
                <p>Vous avez des questions sur nos services, nos tarifs ou notre façon de travailler ? Cette FAQ regroupe les questions les plus fréquemment posées par nos clients et prospects.</p>
                <p>Si vous ne trouvez pas la réponse à votre question, n\'hésitez pas à nous contacter directement. Notre équipe se fera un plaisir de vous répondre dans les plus brefs délais.</p>
            </div>
            <div class="intro-image">
                <img src="<?php echo generatePlaceholderImage(400, 300, 'FAQ', '2563eb', 'ffffff'); ?>" alt="Questions fréquentes" loading="lazy">
            </div>
        </div>
    </div>
</section>

<!-- Section de recherche -->
<section class="section section-search">
    <div class="container">
        <div class="search-container">
            <div class="search-box">
                <input type="text" id="faq-search" placeholder="Rechercher dans la FAQ..." aria-label="Rechercher dans la FAQ">
                <button type="button" id="search-btn" aria-label="Lancer la recherche">
                    <i class="fas fa-search"></i>
                </button>
            </div>
            <p class="search-help">Tapez vos mots-clés pour trouver rapidement les réponses</p>
        </div>
    </div>
</section>

<!-- Section des catégories -->
<section class="section section-categories">
    <div class="container">
        <div class="categories-nav">
            <button class="category-btn active" data-category="all">
                <i class="fas fa-th"></i>
                <span>Toutes les questions</span>
            </button>
            <?php foreach ($faq_categories as $key => $category): ?>
            <button class="category-btn" data-category="<?php echo $key; ?>">
                <i class="fas fa-folder"></i>
                <span><?php echo htmlspecialchars($category['titre']); ?></span>
            </button>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Section des questions -->
<section class="section section-questions">
    <div class="container">
        <?php foreach ($faq_categories as $key => $category): ?>
        <div class="faq-category" id="category-<?php echo $key; ?>">
            <div class="category-header">
                <h3><?php echo htmlspecialchars($category['titre']); ?></h3>
                <p><?php echo count($category['questions']); ?> question<?php echo count($category['questions']) > 1 ? 's' : ''; ?></p>
            </div>
            
            <div class="faq-list">
                <?php foreach ($category['questions'] as $index => $item): ?>
                <div class="faq-item" data-category="<?php echo $key; ?>">
                    <div class="faq-question" id="faq-<?php echo $key; ?>-<?php echo $index; ?>">
                        <h4><?php echo htmlspecialchars($item['question']); ?></h4>
                        <button class="faq-toggle" aria-expanded="false" aria-controls="faq-answer-<?php echo $key; ?>-<?php echo $index; ?>">
                            <i class="fas fa-chevron-down"></i>
                        </button>
                    </div>
                    <div class="faq-answer" id="faq-answer-<?php echo $key; ?>-<?php echo $index; ?>">
                        <p><?php echo htmlspecialchars($item['reponse']); ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</section>

<!-- Section des questions populaires -->
<section class="section section-popular">
    <div class="container">
        <div class="section-header">
            <h2>Questions les plus populaires</h2>
            <p>Les questions que nos clients nous posent le plus souvent</p>
        </div>
        
        <div class="popular-questions">
            <div class="popular-item">
                <div class="popular-icon">
                    <i class="fas fa-star"></i>
                </div>
                <h3>Combien coûte un site web ?</h3>
                <p>Le coût d\'un site web varie selon sa complexité. Un site vitrine simple coûte entre 2500€ et 5000€, un site e-commerce entre 5000€ et 15000€. Nous établissons un devis personnalisé pour chaque projet.</p>
                <a href="#faq-developpement-0" class="popular-link">Voir la réponse complète</a>
            </div>
            
            <div class="popular-item">
                <div class="popular-icon">
                    <i class="fas fa-star"></i>
                </div>
                <h3>Quels sont vos délais de réponse ?</h3>
                <p>Nous répondons généralement dans les 24h ouvrées. Pour les urgences, n\'hésitez pas à nous appeler directement. Nous avons des créneaux réservés aux situations urgentes.</p>
                <a href="#faq-general-0" class="popular-link">Voir la réponse complète</a>
            </div>
            
            <div class="popular-item">
                <div class="popular-icon">
                    <i class="fas fa-star"></i>
                </div>
                <h3>Proposez-vous un accompagnement post-livraison ?</h3>
                <p>Oui, nous proposons un accompagnement complet post-livraison incluant formation des équipes, support technique et maintenance. Nous restons disponibles pour vous accompagner dans l\'évolution de votre projet.</p>
                <a href="#faq-developpement-3" class="popular-link">Voir la réponse complète</a>
            </div>
        </div>
    </div>
</section>

<!-- Section de contact -->
<section class="section section-contact">
    <div class="container">
        <div class="contact-content">
            <h2>Vous n\'avez pas trouvé votre réponse ?</h2>
            <p>Notre équipe est là pour vous aider. Contactez-nous directement et nous vous répondrons dans les plus brefs délais.</p>
            <div class="contact-actions">
                <a href="/contact.php" class="btn btn-primary">
                    <i class="fas fa-envelope"></i>
                    <span>Nous contacter</span>
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
    // Gestion des catégories
    const categoryBtns = document.querySelectorAll('.category-btn');
    const faqCategories = document.querySelectorAll('.faq-category');
    
    categoryBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const category = this.dataset.category;
            
            // Mise à jour des boutons actifs
            categoryBtns.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            
            // Affichage des catégories
            if (category === 'all') {
                faqCategories.forEach(cat => cat.style.display = 'block');
            } else {
                faqCategories.forEach(cat => {
                    if (cat.id === `category-${category}`) {
                        cat.style.display = 'block';
                    } else {
                        cat.style.display = 'none';
                    }
                });
            }
        });
    });
    
    // Gestion des questions FAQ
    const faqToggles = document.querySelectorAll('.faq-toggle');
    
    faqToggles.forEach(toggle => {
        toggle.addEventListener('click', function() {
            const isExpanded = this.getAttribute('aria-expanded') === 'true';
            const answer = this.parentNode.nextElementSibling;
            const icon = this.querySelector('i');
            
            // Fermer toutes les autres questions
            faqToggles.forEach(otherToggle => {
                if (otherToggle !== this) {
                    otherToggle.setAttribute('aria-expanded', 'false');
                    otherToggle.parentNode.nextElementSibling.classList.remove('active');
                    otherToggle.querySelector('i').className = 'fas fa-chevron-down';
                }
            });
            
            // Basculer l'état de la question courante
            this.setAttribute('aria-expanded', !isExpanded);
            answer.classList.toggle('active');
            
            if (!isExpanded) {
                icon.className = 'fas fa-chevron-up';
            } else {
                icon.className = 'fas fa-chevron-down';
            }
        });
    });
    
    // Fonction de recherche
    const searchInput = document.getElementById('faq-search');
    const searchBtn = document.getElementById('search-btn');
    const faqItems = document.querySelectorAll('.faq-item');
    
    function performSearch() {
        const searchTerm = searchInput.value.toLowerCase().trim();
        
        if (searchTerm === '') {
            // Afficher toutes les questions
            faqItems.forEach(item => {
                item.style.display = 'block';
            });
            return;
        }
        
        // Rechercher dans les questions et réponses
        faqItems.forEach(item => {
            const question = item.querySelector('h4').textContent.toLowerCase();
            const answer = item.querySelector('p').textContent.toLowerCase();
            
            if (question.includes(searchTerm) || answer.includes(searchTerm)) {
                item.style.display = 'block';
                // Mettre en surbrillance les résultats
                highlightText(item, searchTerm);
            } else {
                item.style.display = 'none';
            }
        });
        
        // Mettre à jour les catégories visibles
        updateVisibleCategories();
    }
    
    // Recherche en temps réel
    searchInput.addEventListener('input', debounce(performSearch, 300));
    
    // Recherche au clic sur le bouton
    searchBtn.addEventListener('click', performSearch);
    
    // Recherche avec la touche Entrée
    searchInput.addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            performSearch();
        }
    });
    
    // Fonction de mise en surbrillance
    function highlightText(element, searchTerm) {
        const question = element.querySelector('h4');
        const answer = element.querySelector('p');
        
        if (question) {
            question.innerHTML = question.textContent.replace(
                new RegExp(searchTerm, 'gi'),
                match => `<mark>${match}</mark>`
            );
        }
        
        if (answer) {
            answer.innerHTML = answer.textContent.replace(
                new RegExp(searchTerm, 'gi'),
                match => `<mark>${match}</mark>`
            );
        }
    }
    
    // Fonction de mise à jour des catégories visibles
    function updateVisibleCategories() {
        faqCategories.forEach(category => {
            const visibleItems = category.querySelectorAll('.faq-item[style="display: block"]');
            if (visibleItems.length > 0) {
                category.style.display = 'block';
            } else {
                category.style.display = 'none';
            }
        });
    }
    
    // Fonction debounce pour la recherche
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
    
    // Navigation par ancres pour les liens populaires
    const popularLinks = document.querySelectorAll('.popular-link');
    popularLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const targetId = this.getAttribute('href').substring(1);
            const targetElement = document.getElementById(targetId);
            
            if (targetElement) {
                // Ouvrir la question
                const toggle = targetElement.querySelector('.faq-toggle');
                if (toggle) {
                    toggle.click();
                }
                
                // Scroll vers la question
                targetElement.scrollIntoView({ behavior: 'smooth' });
                
                // Mettre en surbrillance
                targetElement.classList.add('highlight');
                setTimeout(() => {
                    targetElement.classList.remove('highlight');
                }, 2000);
            }
        });
    });
    
    // Animation des éléments au scroll
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate');
            }
        });
    });
    
    const animatedElements = document.querySelectorAll('.popular-item, .contact-content');
    animatedElements.forEach(el => observer.observe(el));
});
</script>

<?php
// Inclusion du pied de page
include 'includes/footer.php';
?>