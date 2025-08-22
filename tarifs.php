<?php
/**
 * Page des tarifs
 * Site professionnel de Maickel Okereke
 */

// Configuration de la page
$page_title = 'Nos tarifs - Maickel Okereke';
$page_description = 'Découvrez nos tarifs transparents et nos forfaits adaptés à tous les budgets.';
$page_keywords = 'tarifs, prix, forfaits, comptabilité, développement web, Maickel Okereke';

// Données des forfaits (en production, viendraient de la base de données)
$forfaits = [
    [
        'id' => 'starter',
        'nom' => 'Starter',
        'sous_titre' => 'Pour débuter',
        'prix' => '99',
        'periode' => 'mois',
        'description' => 'Solution idéale pour les entrepreneurs débutants et les petites structures.',
        'popular' => false,
        'features' => [
            'Comptabilité de base (écritures comptables)',
            'Déclarations fiscales mensuelles',
            'Site web vitrine simple (5 pages)',
            'Hébergement inclus (1 an)',
            'Support email',
            'Mise à jour trimestrielle'
        ],
        'limitations' => [
            'Maximum 50 transactions/mois',
            '1 compte bancaire',
            'Templates de base uniquement'
        ],
        'cta_text' => 'Commencer maintenant',
        'cta_link' => '/devis.php?forfait=starter'
    ],
    [
        'id' => 'professional',
        'nom' => 'Professional',
        'sous_titre' => 'Le plus populaire',
        'prix' => '199',
        'periode' => 'mois',
        'description' => 'La solution complète pour les PME en croissance.',
        'popular' => true,
        'features' => [
            'Comptabilité complète avec analyse',
            'Déclarations fiscales et sociales',
            'Site web professionnel (10 pages)',
            'E-commerce basique inclus',
            'Hébergement et nom de domaine',
            'Support prioritaire',
            'Mise à jour mensuelle',
            'Tableaux de bord personnalisés',
            'Formation utilisateur (2h)'
        ],
        'limitations' => [
            'Maximum 200 transactions/mois',
            '3 comptes bancaires',
            '5 produits e-commerce'
        ],
        'cta_text' => 'Choisir ce forfait',
        'cta_link' => '/devis.php?forfait=professional'
    ],
    [
        'id' => 'enterprise',
        'nom' => 'Enterprise',
        'sous_titre' => 'Sur mesure',
        'prix' => '399',
        'periode' => 'mois',
        'description' => 'Solution premium pour les grandes entreprises et projets complexes.',
        'popular' => false,
        'features' => [
            'Comptabilité multi-entités',
            'Audit et conseil financier',
            'Site web sur mesure illimité',
            'E-commerce avancé complet',
            'Application web personnalisée',
            'Hébergement haute performance',
            'Support 24/7',
            'Mise à jour continue',
            'Formation complète (8h)',
            'Accompagnement stratégique',
            'Intégrations API',
            'Maintenance préventive'
        ],
        'limitations' => [
            'Transactions illimitées',
            'Comptes bancaires illimités',
            'Produits e-commerce illimités'
        ],
        'cta_text' => 'Demander un devis',
        'cta_link' => '/devis.php?forfait=enterprise'
    ]
];

// Services à la carte
$services_carte = [
    [
        'categorie' => 'Comptabilité',
        'services' => [
            ['nom' => 'Écritures comptables', 'prix' => '50', 'unite' => 'mois'],
            ['nom' => 'Déclarations fiscales', 'prix' => '80', 'unite' => 'mois'],
            ['nom' => 'Bilan et compte de résultat', 'prix' => '150', 'unite' => 'trimestre'],
            ['nom' => 'Audit comptable', 'prix' => '500', 'unite' => 'jour'],
            ['nom' => 'Conseil fiscal', 'prix' => '120', 'unite' => 'heure']
        ]
    ],
    [
        'categorie' => 'Développement Web',
        'services' => [
            ['nom' => 'Site vitrine (5 pages)', 'prix' => '800', 'unite' => 'projet'],
            ['nom' => 'Site e-commerce', 'prix' => '1500', 'unite' => 'projet'],
            ['nom' => 'Application web', 'prix' => '2500', 'unite' => 'projet'],
            ['nom' => 'Maintenance mensuelle', 'prix' => '100', 'unite' => 'mois'],
            ['nom' => 'Formation utilisateur', 'prix' => '80', 'unite' => 'heure']
        ]
    ],
    [
        'categorie' => 'Services mixtes',
        'services' => [
            ['nom' => 'Audit complet entreprise', 'prix' => '800', 'unite' => 'jour'],
            ['nom' => 'Transformation digitale', 'prix' => '2000', 'unite' => 'mois'],
            ['nom' => 'Accompagnement stratégique', 'prix' => '150', 'unite' => 'heure'],
            ['nom' => 'Formation équipe', 'prix' => '500', 'unite' => 'jour']
        ]
    ]
];

// En-tête de page personnalisé
$page_header = '
<div class="page-header-content">
    <h1>Nos tarifs</h1>
    <p>Des solutions adaptées à tous les budgets et besoins</p>
</div>
';

// Inclusion de l\'en-tête
include 'includes/header.php';
?>

<!-- Section d'introduction des tarifs -->
<section class="section section-pricing-intro">
    <div class="container">
        <div class="pricing-intro-content">
            <div class="intro-text">
                <h2>Tarifs transparents et sans surprise</h2>
                <p>Nous croyons en la transparence des prix. Choisissez le forfait qui correspond à vos besoins ou optez pour des services à la carte. Tous nos tarifs incluent la TVA et sont sans engagement.</p>
                
                <div class="pricing-features">
                    <div class="feature-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Prix transparents et sans surprise</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Sans engagement et résiliable à tout moment</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Support inclus dans tous les forfaits</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Mise à jour et maintenance incluses</span>
                    </div>
                </div>
            </div>
            
            <div class="intro-cta">
                <h3>Besoin d'un devis personnalisé ?</h3>
                <p>Nos experts étudient votre projet et vous proposent une solution sur mesure.</p>
                <a href="/devis.php" class="btn btn-primary">
                    <i class="fas fa-calculator"></i>
                    <span>Demander un devis</span>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Section des forfaits -->
<section class="section section-pricing-plans">
    <div class="container">
        <div class="section-header">
            <h2>Nos forfaits</h2>
            <p>Choisissez la solution qui correspond à vos besoins</p>
        </div>
        
        <div class="pricing-toggle">
            <label class="toggle-label">
                <span>Facturation mensuelle</span>
                <input type="checkbox" id="billing-toggle">
                <span class="toggle-slider"></span>
                <span>Facturation annuelle (-20%)</span>
            </label>
        </div>
        
        <div class="pricing-grid">
            <?php foreach ($forfaits as $forfait): ?>
            <div class="pricing-card <?php echo $forfait['popular'] ? 'popular' : ''; ?>">
                <?php if ($forfait['popular']): ?>
                <div class="popular-badge">
                    <i class="fas fa-star"></i>
                    <span>Le plus populaire</span>
                </div>
                <?php endif; ?>
                
                <div class="pricing-header">
                    <h3><?php echo htmlspecialchars($forfait['nom']); ?></h3>
                    <p class="pricing-subtitle"><?php echo htmlspecialchars($forfait['sous_titre']); ?></p>
                    
                    <div class="pricing-price">
                        <div class="price-amount">
                            <span class="currency">€</span>
                            <span class="amount" data-monthly="<?php echo $forfait['prix']; ?>" data-yearly="<?php echo round($forfait['prix'] * 0.8); ?>"><?php echo $forfait['prix']; ?></span>
                        </div>
                        <div class="price-period">/<?php echo $forfait['periode']; ?></div>
                    </div>
                    
                    <p class="pricing-description"><?php echo htmlspecialchars($forfait['description']); ?></p>
                </div>
                
                <div class="pricing-features">
                    <h4>Ce qui est inclus :</h4>
                    <ul class="features-list">
                        <?php foreach ($forfait['features'] as $feature): ?>
                        <li>
                            <i class="fas fa-check"></i>
                            <span><?php echo htmlspecialchars($feature); ?></span>
                        </li>
                        <?php endfor; ?>
                    </ul>
                </div>
                
                <?php if (!empty($forfait['limitations'])): ?>
                <div class="pricing-limitations">
                    <h4>Limitations :</h4>
                    <ul class="limitations-list">
                        <?php foreach ($forfait['limitations'] as $limitation): ?>
                        <li>
                            <i class="fas fa-info-circle"></i>
                            <span><?php echo htmlspecialchars($limitation); ?></span>
                        </li>
                        <?php endfor; ?>
                    </ul>
                </div>
                <?php endif; ?>
                
                <div class="pricing-actions">
                    <a href="<?php echo $forfait['cta_link']; ?>" class="btn <?php echo $forfait['popular'] ? 'btn-primary' : 'btn-outline'; ?> btn-full">
                        <i class="fas fa-arrow-right"></i>
                        <span><?php echo htmlspecialchars($forfait['cta_text']); ?></span>
                    </a>
                </div>
            </div>
            <?php endfor; ?>
        </div>
        
        <div class="pricing-note">
            <p><i class="fas fa-info-circle"></i> Tous nos tarifs incluent la TVA. Possibilité de personnalisation selon vos besoins spécifiques.</p>
        </div>
    </div>
</section>

<!-- Section des services à la carte -->
<section class="section section-a-la-carte">
    <div class="container">
        <div class="section-header">
            <h2>Services à la carte</h2>
            <p>Composez votre solution selon vos besoins spécifiques</p>
        </div>
        
        <div class="services-carte-grid">
            <?php foreach ($services_carte as $categorie): ?>
            <div class="service-category">
                <div class="category-header">
                    <h3><?php echo htmlspecialchars($categorie['categorie']); ?></h3>
                </div>
                
                <div class="services-list">
                    <?php foreach ($categorie['services'] as $service): ?>
                    <div class="service-item">
                        <div class="service-info">
                            <h4><?php echo htmlspecialchars($service['nom']); ?></h4>
                        </div>
                        <div class="service-price">
                            <span class="price"><?php echo $service['prix']; ?>€</span>
                            <span class="unit">/<?php echo $service['unite']; ?></span>
                        </div>
                    </div>
                    <?php endfor; ?>
                </div>
            </div>
            <?php endfor; ?>
        </div>
        
        <div class="a-la-carte-cta">
            <p>Besoin d'un service spécifique ? Contactez-nous pour un devis personnalisé.</p>
            <a href="/contact.php" class="btn btn-primary">
                <i class="fas fa-envelope"></i>
                <span>Nous contacter</span>
            </a>
        </div>
    </div>
</section>

<!-- Section des questions fréquentes -->
<section class="section section-pricing-faq">
    <div class="container">
        <div class="section-header">
            <h2>Questions fréquentes sur nos tarifs</h2>
            <p>Tout ce que vous devez savoir sur nos conditions tarifaires</p>
        </div>
        
        <div class="faq-grid">
            <div class="faq-item">
                <div class="faq-question">
                    <h4>Y a-t-il des frais cachés ?</h4>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>Non, tous nos tarifs sont transparents et incluent la TVA. Les seuls frais supplémentaires sont ceux que vous choisissez (domaine personnalisé, fonctionnalités avancées, etc.).</p>
                </div>
            </div>
            
            <div class="faq-item">
                <div class="faq-question">
                    <h4>Puis-je changer de forfait ?</h4>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>Oui, vous pouvez changer de forfait à tout moment. La modification prendra effet au début du mois suivant. Vous pouvez également passer à un forfait supérieur en cours de mois.</p>
                </div>
            </div>
            
            <div class="faq-item">
                <div class="faq-question">
                    <h4>Y a-t-il un engagement ?</h4>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>Non, aucun engagement n'est requis. Vous pouvez résilier votre abonnement à tout moment. Nous vous demandons simplement un préavis de 30 jours.</p>
                </div>
            </div>
            
            <div class="faq-item">
                <div class="faq-question">
                    <h4>Que se passe-t-il si je dépasse les limites ?</h4>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>Nous vous contactons pour discuter de vos besoins. Nous pouvons soit ajuster votre forfait, soit facturer les dépassements au prorata. Notre objectif est de vous accompagner dans votre croissance.</p>
                </div>
            </div>
            
            <div class="faq-item">
                <div class="faq-question">
                    <h4>Les mises à jour sont-elles incluses ?</h4>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>Oui, toutes les mises à jour de sécurité et de fonctionnalités sont incluses dans vos forfaits. Nous maintenons vos outils à jour pour garantir leur performance et sécurité.</p>
                </div>
            </div>
            
            <div class="faq-item">
                <div class="faq-question">
                    <h4>Puis-je avoir un devis personnalisé ?</h4>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>Absolument ! Si vos besoins ne correspondent pas exactement à nos forfaits, nous étudions votre projet et vous proposons une solution sur mesure avec un devis personnalisé.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section des garanties -->
<section class="section section-guarantees">
    <div class="container">
        <div class="section-header">
            <h2>Nos garanties</h2>
            <p>Votre satisfaction est notre priorité</p>
        </div>
        
        <div class="guarantees-grid">
            <div class="guarantee-item">
                <div class="guarantee-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3>Garantie satisfaction</h3>
                <p>Si vous n'êtes pas satisfait de nos services dans les 30 premiers jours, nous vous remboursons intégralement.</p>
            </div>
            
            <div class="guarantee-item">
                <div class="guarantee-icon">
                    <i class="fas fa-clock"></i>
                </div>
                <h3>Support réactif</h3>
                <p>Nous nous engageons à répondre à vos demandes dans les 24h ouvrées maximum.</p>
            </div>
            
            <div class="guarantee-item">
                <div class="guarantee-icon">
                    <i class="fas fa-lock"></i>
                </div>
                <h3>Sécurité garantie</h3>
                <p>Vos données sont protégées et sauvegardées régulièrement. Nous respectons le RGPD.</p>
            </div>
            
            <div class="guarantee-item">
                <div class="guarantee-icon">
                    <i class="fas fa-sync-alt"></i>
                </div>
                <h3>Évolutivité</h3>
                <p>Vos solutions évoluent avec votre entreprise. Pas de remise à zéro nécessaire.</p>
            </div>
        </div>
    </div>
</section>

<!-- Section CTA -->
<section class="section section-cta">
    <div class="container">
        <div class="cta-content">
            <h2>Prêt à commencer ?</h2>
            <p>Choisissez le forfait qui correspond à vos besoins ou contactez-nous pour un devis personnalisé.</p>
            <div class="cta-actions">
                <a href="/devis.php" class="btn btn-primary">
                    <i class="fas fa-calculator"></i>
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
    // Gestion du toggle de facturation
    const billingToggle = document.getElementById('billing-toggle');
    const priceAmounts = document.querySelectorAll('.amount');
    
    if (billingToggle) {
        billingToggle.addEventListener('change', function() {
            const isYearly = this.checked;
            
            priceAmounts.forEach(amount => {
                const monthlyPrice = amount.getAttribute('data-monthly');
                const yearlyPrice = amount.getAttribute('data-yearly');
                
                if (isYearly) {
                    amount.textContent = yearlyPrice;
                    amount.parentNode.nextElementSibling.textContent = '/mois (facturé annuellement)';
                } else {
                    amount.textContent = monthlyPrice;
                    amount.parentNode.nextElementSibling.textContent = '/mois';
                }
            });
        });
    }
    
    // Gestion des FAQ
    const faqQuestions = document.querySelectorAll('.faq-question');
    
    faqQuestions.forEach(question => {
        question.addEventListener('click', function() {
            const faqItem = this.parentNode;
            const answer = this.nextElementSibling;
            const icon = this.querySelector('i');
            
            // Fermer toutes les autres FAQ
            faqQuestions.forEach(q => {
                if (q !== this) {
                    q.parentNode.classList.remove('active');
                    q.nextElementSibling.style.maxHeight = null;
                    q.querySelector('i').className = 'fas fa-chevron-down';
                }
            });
            
            // Toggle de la FAQ actuelle
            faqItem.classList.toggle('active');
            
            if (faqItem.classList.contains('active')) {
                answer.style.maxHeight = answer.scrollHeight + 'px';
                icon.className = 'fas fa-chevron-up';
            } else {
                answer.style.maxHeight = null;
                icon.className = 'fas fa-chevron-down';
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
    
    const animatedElements = document.querySelectorAll('.pricing-card, .service-category, .faq-item, .guarantee-item, .cta-content');
    animatedElements.forEach(el => observer.observe(el));
    
    // Animation des cartes de tarification
    const pricingCards = document.querySelectorAll('.pricing-card');
    
    const animatePricingCards = () => {
        pricingCards.forEach((card, index) => {
            setTimeout(() => {
                card.classList.add('animate');
            }, index * 200);
        });
    };
    
    const pricingSection = document.querySelector('.section-pricing-plans');
    if (pricingSection) {
        const pricingObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animatePricingCards();
                    pricingObserver.unobserve(entry.target);
                }
            });
        });
        pricingObserver.observe(pricingSection);
    }
    
    // Animation des garanties
    const guaranteeItems = document.querySelectorAll('.guarantee-item');
    
    const animateGuarantees = () => {
        guaranteeItems.forEach((item, index) => {
            setTimeout(() => {
                item.classList.add('animate');
            }, index * 150);
        });
    };
    
    const guaranteesSection = document.querySelector('.section-guarantees');
    if (guaranteesSection) {
        const guaranteesObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateGuarantees();
                    guaranteesObserver.unobserve(entry.target);
                }
            });
        });
        guaranteesObserver.observe(guaranteesSection);
    }
    
    // Hover effects sur les cartes de tarification
    pricingCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.classList.add('hovered');
        });
        
        card.addEventListener('mouseleave', function() {
            this.classList.remove('hovered');
        });
    });
    
    // Gestion des liens de forfaits
    const forfaitLinks = document.querySelectorAll('.pricing-actions a');
    forfaitLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            // Ajouter un délai pour l'animation avant la redirection
            e.preventDefault();
            const url = this.href;
            
            setTimeout(() => {
                window.location.href = url;
            }, 200);
        });
    });
    
    // Calcul automatique des économies annuelles
    const calculateSavings = () => {
        const monthlyPrices = document.querySelectorAll('[data-monthly]');
        let totalMonthly = 0;
        
        monthlyPrices.forEach(price => {
            totalMonthly += parseInt(price.getAttribute('data-monthly'));
        });
        
        const yearlySavings = totalMonthly * 12 * 0.2; // 20% d'économie
        
        // Afficher les économies si elles sont significatives
        if (yearlySavings > 100) {
            const savingsElement = document.createElement('div');
            savingsElement.className = 'yearly-savings';
            savingsElement.innerHTML = `
                <i class="fas fa-piggy-bank"></i>
                <span>Économisez ${yearlySavings}€ par an avec la facturation annuelle !</span>
            `;
            
            const toggleContainer = document.querySelector('.pricing-toggle');
            if (toggleContainer) {
                toggleContainer.appendChild(savingsElement);
            }
        }
    };
    
    // Calculer les économies au chargement
    calculateSavings();
});
</script>

<?php
// Inclusion du pied de page
include 'includes/footer.php';
?>