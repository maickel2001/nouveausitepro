<?php
/**
 * Page À propos
 * Site professionnel de Maickel Okereke
 */

// Configuration de la page
$page_title = 'À propos - Maickel Okereke';
$page_description = 'Découvrez l\'histoire et l\'expertise de Maickel Okereke, expert-comptable et développeur web passionné par l\'accompagnement des TPE/PME.';
$page_keywords = 'Maickel Okereke, expert-comptable, développeur web, TPE PME, histoire, parcours, expertise';

// En-tête de page personnalisé
$page_header = '
<div class="page-header-content">
    <h1>À propos de Maickel Okereke</h1>
    <p>Expert-comptable et développeur web passionné par l\'accompagnement des entreprises</p>
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
                <h2>Une double expertise au service de votre entreprise</h2>
                <p>Je suis Maickel Okereke, expert-comptable et développeur web, passionné par l\'accompagnement des petites et moyennes entreprises vers le succès. Mon parcours unique me permet d\'offrir une vision globale et des solutions intégrées pour vos besoins comptables et digitaux.</p>
                <p>Depuis plus de 10 ans, j\'aide les entrepreneurs à structurer leur croissance, optimiser leurs processus et développer leur présence en ligne. Mon approche est basée sur la confiance, l\'écoute et l\'innovation.</p>
            </div>
            <div class="intro-image">
                <img src="<?php echo generatePlaceholderImage(400, 500, 'Maickel Okereke', '2563eb', 'ffffff'); ?>" alt="Maickel Okereke" loading="lazy">
            </div>
        </div>
    </div>
</section>

<!-- Section parcours -->
<section class="section section-journey">
    <div class="container">
        <div class="section-header">
            <h2>Mon Parcours</h2>
            <p>Un cheminement professionnel riche et diversifié</p>
        </div>
        
        <div class="journey-timeline">
            <div class="timeline-item">
                <div class="timeline-marker">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <div class="timeline-content">
                    <div class="timeline-date">2010 - 2014</div>
                    <h3>Formation en Comptabilité</h3>
                    <p>Formation initiale en comptabilité et gestion à l\'École Supérieure de Commerce de Paris. Obtention du diplôme d\'expert-comptable avec mention.</p>
                </div>
            </div>
            
            <div class="timeline-item">
                <div class="timeline-marker">
                    <i class="fas fa-briefcase"></i>
                </div>
                <div class="timeline-content">
                    <div class="timeline-date">2014 - 2017</div>
                    <h3>Début de carrière</h3>
                    <p>Premières expériences dans un cabinet comptable parisien, spécialisé dans l\'accompagnement des TPE/PME. Développement de l\'expertise en conseil fiscal et optimisation.</p>
                </div>
            </div>
            
            <div class="timeline-item">
                <div class="timeline-marker">
                    <i class="fas fa-code"></i>
                </div>
            <div class="timeline-content">
                    <div class="timeline-date">2017 - 2019</div>
                    <h3>Formation en Développement Web</h3>
                    <p>Formation en développement web et programmation. Maîtrise des technologies modernes : HTML5, CSS3, JavaScript, PHP, MySQL. Création des premiers projets web.</p>
                </div>
            </div>
            
            <div class="timeline-item">
                <div class="timeline-marker">
                    <i class="fas fa-rocket"></i>
                </div>
                <div class="timeline-content">
                    <div class="timeline-date">2019 - 2022</div>
                    <h3>Développement de l\'activité</h3>
                    <p>Lancement de l\'activité indépendante combinant comptabilité et développement web. Premiers clients satisfaits et développement de la réputation.</p>
                </div>
            </div>
            
            <div class="timeline-item">
                <div class="timeline-marker">
                    <i class="fas fa-star"></i>
                </div>
                <div class="timeline-content">
                    <div class="timeline-date">2022 - Aujourd\'hui</div>
                    <h3>Expertise reconnue</h3>
                    <p>Plus de 150 clients accompagnés avec succès. Développement de solutions innovantes et accompagnement de startups en pleine croissance.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section valeurs -->
<section class="section section-values">
    <div class="container">
        <div class="section-header">
            <h2>Mes Valeurs</h2>
            <p>Les principes qui guident mon action au quotidien</p>
        </div>
        
        <div class="values-grid">
            <div class="value-item">
                <div class="value-icon">
                    <i class="fas fa-handshake"></i>
                </div>
                <h3>Confiance</h3>
                <p>La confiance est la base de toute relation professionnelle durable. Je m\'engage à être transparent, honnête et à respecter mes engagements envers chaque client.</p>
            </div>
            
            <div class="value-item">
                <div class="value-icon">
                    <i class="fas fa-lightbulb"></i>
                </div>
                <h3>Innovation</h3>
                <p>Je recherche constamment les meilleures solutions et les technologies les plus adaptées pour optimiser vos processus et améliorer votre performance.</p>
            </div>
            
            <div class="value-item">
                <div class="value-icon">
                    <i class="fas fa-users"></i>
                </div>
                <h3>Accompagnement</h3>
                <p>Je ne me contente pas de fournir des services, j\'accompagne véritablement votre entreprise dans sa croissance et son développement.</p>
            </div>
            
            <div class="value-item">
                <div class="value-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3>Excellence</h3>
                <p>L\'excellence dans la qualité de mes services est une exigence quotidienne. Je m\'efforce de dépasser vos attentes à chaque intervention.</p>
            </div>
            
            <div class="value-item">
                <div class="value-icon">
                    <i class="fas fa-heart"></i>
                </div>
                <h3>Passion</h3>
                <p>Ma passion pour la comptabilité et le développement web me pousse à toujours me former et à m\'améliorer pour mieux vous servir.</p>
            </div>
            
            <div class="value-item">
                <div class="value-icon">
                    <i class="fas fa-globe"></i>
                </div>
                <h3>Responsabilité</h3>
                <p>Je m\'engage à respecter l\'environnement et à promouvoir des pratiques durables dans mes activités professionnelles.</p>
            </div>
        </div>
    </div>
</section>

<!-- Section expertise -->
<section class="section section-expertise">
    <div class="container">
        <div class="section-header">
            <h2>Mon Expertise</h2>
            <p>Des compétences pointues dans deux domaines complémentaires</p>
        </div>
        
        <div class="expertise-content">
            <div class="expertise-area">
                <div class="expertise-header">
                    <div class="expertise-icon">
                        <i class="fas fa-calculator"></i>
                    </div>
                    <h3>Expertise Comptable</h3>
                </div>
                <div class="expertise-details">
                    <ul>
                        <li><strong>Comptabilité générale :</strong> Tenue des livres comptables, saisie des écritures, rapprochements bancaires</li>
                        <li><strong>Fiscalité :</strong> Déclarations TVA, IS, IR, optimisation fiscale, conseils juridiques</li>
                        <li><strong>Gestion :</strong> Suivi de trésorerie, reporting mensuel, analyse financière</li>
                        <li><strong>Conformité :</strong> Respect des obligations légales, audit des processus</li>
                        <li><strong>Accompagnement :</strong> Création d\'entreprise, développement commercial, stratégie</li>
                    </ul>
                </div>
            </div>
            
            <div class="expertise-area">
                <div class="expertise-header">
                    <div class="expertise-icon">
                        <i class="fas fa-code"></i>
                    </div>
                    <h3>Expertise Développement Web</h3>
                </div>
                <div class="expertise-details">
                    <ul>
                        <li><strong>Frontend :</strong> HTML5, CSS3, JavaScript, React, Vue.js, responsive design</li>
                        <li><strong>Backend :</strong> PHP, MySQL, Node.js, API REST, architecture MVC</li>
                        <li><strong>E-commerce :</strong> PrestaShop, WooCommerce, solutions sur mesure</li>
                        <li><strong>Performance :</strong> Optimisation, SEO, sécurité, hébergement</li>
                        <li><strong>Maintenance :</strong> Support technique, mises à jour, sauvegardes</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section clients -->
<section class="section section-clients">
    <div class="container">
        <div class="section-header">
            <h2>Ils me font confiance</h2>
            <p>Des entreprises de tous secteurs qui ont choisi mes services</p>
        </div>
        
        <div class="clients-grid">
            <div class="client-item">
                <div class="client-logo">
                    <img src="<?php echo generatePlaceholderImage(150, 80, 'TechStart', '1e40af', 'ffffff'); ?>" alt="TechStart SARL" loading="lazy">
                </div>
                <h4>TechStart SARL</h4>
                <p>Startup technologique - Comptabilité et site web</p>
            </div>
            
            <div class="client-item">
                <div class="client-logo">
                    <img src="<?php echo generatePlaceholderImage(150, 80, 'Boulangerie du Centre', '1e3a8a', 'ffffff'); ?>" alt="Boulangerie du Centre" loading="lazy">
                </div>
                <h4>Boulangerie du Centre</h4>
                <p>Commerce alimentaire - Comptabilité et conseil</p>
            </div>
            
            <div class="client-item">
                <div class="client-logo">
                    <img src="<?php echo generatePlaceholderImage(150, 80, 'GreenEco', '059669', 'ffffff'); ?>" alt="GreenEco" loading="lazy">
                </div>
                <h4>GreenEco</h4>
                <p>Entreprise éco-responsable - Site web et e-commerce</p>
            </div>
            
            <div class="client-item">
                <div class="client-logo">
                    <img src="<?php echo generatePlaceholderImage(150, 80, 'ConsultPro', 'dc2626', 'ffffff'); ?>" alt="ConsultPro" loading="lazy">
                </div>
                <h4>ConsultPro</h4>
                <p>Cabinet de conseil - Comptabilité et formation</p>
            </div>
            
            <div class="client-item">
                <div class="client-logo">
                    <img src="<?php echo generatePlaceholderImage(150, 80, 'ArtisanPlus', '7c3aed', 'ffffff'); ?>" alt="ArtisanPlus" loading="lazy">
                </div>
                <h4>ArtisanPlus</h4>
                <p>Artisan - Comptabilité et accompagnement</p>
            </div>
            
            <div class="client-item">
                <div class="client-logo">
                    <img src="<?php echo generatePlaceholderImage(150, 80, 'InnovLab', 'ea580c', 'ffffff'); ?>" alt="InnovLab" loading="lazy">
                </div>
                <h4>InnovLab</h4>
                <p>Laboratoire d\'innovation - Développement web</p>
            </div>
        </div>
    </div>
</section>

<!-- Section CTA -->
<section class="section section-cta">
    <div class="container">
        <div class="cta-content">
            <h2>Prêt à travailler ensemble ?</h2>
            <p>Discutons de vos besoins et voyons comment je peux vous accompagner vers le succès. Une première consultation gratuite pour faire connaissance.</p>
            <div class="cta-actions">
                <a href="/contact.php" class="btn btn-primary">
                    <i class="fas fa-envelope"></i>
                    <span>Me contacter</span>
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
    // Animation des éléments de la timeline
    const timelineItems = document.querySelectorAll('.timeline-item');
    
    const animateTimeline = () => {
        timelineItems.forEach((item, index) => {
            setTimeout(() => {
                item.classList.add('animate');
            }, index * 200);
        });
    };
    
    // Déclencher l'animation quand la section est visible
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                animateTimeline();
                observer.unobserve(entry.target);
            }
        });
    });
    
    const journeySection = document.querySelector('.section-journey');
    if (journeySection) {
        observer.observe(journeySection);
    }
    
    // Animation des valeurs
    const valueItems = document.querySelectorAll('.value-item');
    
    const animateValues = () => {
        valueItems.forEach((item, index) => {
            setTimeout(() => {
                item.classList.add('animate');
            }, index * 150);
        });
    };
    
    const valuesSection = document.querySelector('.section-values');
    if (valuesSection) {
        const valuesObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateValues();
                    valuesObserver.unobserve(entry.target);
                }
            });
        });
        valuesObserver.observe(valuesSection);
    }
});
</script>

<?php
// Inclusion du pied de page
include 'includes/footer.php';
?>