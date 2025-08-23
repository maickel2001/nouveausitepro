<?php
/**
 * Page de l'équipe
 * Site professionnel de Maickel Okereke
 */

// Configuration de la page
$page_title = 'Notre équipe - Maickel Okereke';
$page_description = 'Découvrez notre équipe d\'experts en comptabilité et développement web.';
$page_keywords = 'équipe, experts, comptabilité, développement web, Maickel Okereke';

// Inclusion des fichiers nécessaires
require_once 'includes/functions.php';

// Données de l'équipe (en production, viendraient de la base de données)
$equipe = [
    [
        'id' => 1,
        'nom' => 'Maickel Okereke',
        'role' => 'Fondateur & Expert Double Compétence',
        'specialites' => ['Comptabilité', 'Développement web', 'Conseil stratégique'],
        'photo' => 'assets/images/team/maickel-okereke.jpg',
        'bio' => 'Expert en comptabilité et développement web avec plus de 10 ans d\'expérience. Maickel combine sa double expertise pour offrir des solutions complètes aux entreprises.',
        'formation' => 'Master en Comptabilité, Formation Développement Web',
        'certifications' => ['Expert-comptable', 'Développeur Full-Stack'],
        'reseaux' => [
            'linkedin' => 'https://linkedin.com/in/maickel-okereke',
            'twitter' => 'https://twitter.com/maickel_okereke',
            'github' => 'https://github.com/maickel-okereke'
        ],
        'expertise_principale' => 'Double expertise comptabilité/web',
        'projets_realises' => 50,
        'clients_satisfaits' => 45,
        'annees_experience' => 10
    ],
    [
        'id' => 2,
        'nom' => 'Sophie Martin',
        'role' => 'Experte Comptabilité & Gestion',
        'specialites' => ['Comptabilité générale', 'Gestion financière', 'Audit'],
        'photo' => 'assets/images/team/sophie-martin.jpg',
        'bio' => 'Experte-comptable diplômée avec une spécialisation en gestion financière des PME. Sophie accompagne les entreprises dans leur développement financier.',
        'formation' => 'Master en Comptabilité, Contrôle, Audit',
        'certifications' => ['Expert-comptable', 'Auditeur interne'],
        'reseaux' => [
            'linkedin' => 'https://linkedin.com/in/sophie-martin',
            'twitter' => 'https://twitter.com/sophie_martin'
        ],
        'expertise_principale' => 'Gestion financière PME',
        'projets_realises' => 35,
        'clients_satisfaits' => 32,
        'annees_experience' => 8
    ],
    [
        'id' => 3,
        'nom' => 'Thomas Dubois',
        'role' => 'Développeur Web Senior',
        'specialites' => ['Frontend', 'Backend', 'Applications web'],
        'photo' => 'assets/images/team/thomas-dubois.jpg',
        'bio' => 'Développeur web passionné avec une expertise en technologies modernes. Thomas crée des solutions web performantes et innovantes.',
        'formation' => 'Master en Informatique, Spécialisation Web',
        'certifications' => ['Développeur Full-Stack', 'Certification AWS'],
        'reseaux' => [
            'linkedin' => 'https://linkedin.com/in/thomas-dubois',
            'github' => 'https://github.com/thomas-dubois',
            'twitter' => 'https://twitter.com/thomas_dubois'
        ],
        'expertise_principale' => 'Développement web moderne',
        'projets_realises' => 40,
        'clients_satisfaits' => 38,
        'annees_experience' => 7
    ],
    [
        'id' => 4,
        'nom' => 'Marie Leroy',
        'role' => 'Conseillère en Stratégie Digitale',
        'specialites' => ['Transformation digitale', 'Stratégie web', 'Formation'],
        'photo' => 'assets/images/team/marie-leroy.jpg',
        'bio' => 'Spécialiste en transformation digitale, Marie accompagne les entreprises dans leur transition numérique et la formation de leurs équipes.',
        'formation' => 'Master en Management, Spécialisation Digital',
        'certifications' => ['Consultant Digital', 'Formateur certifié'],
        'reseaux' => [
            'linkedin' => 'https://linkedin.com/in/marie-leroy',
            'twitter' => 'https://twitter.com/marie_leroy'
        ],
        'expertise_principale' => 'Transformation digitale',
        'projets_realises' => 25,
        'clients_satisfaits' => 23,
        'annees_experience' => 6
    ]
];

// Statistiques de l'équipe
$total_membres = count($equipe);
$total_experience = array_sum(array_column($equipe, 'annees_experience'));
$total_projets = array_sum(array_column($equipe, 'projets_realises'));
$total_clients = array_sum(array_column($equipe, 'clients_satisfaits'));

// En-tête de page personnalisé
$page_header = '
<div class="page-header-content">
    <h1>Notre équipe</h1>
    <p>Une équipe d\'experts passionnés pour vous accompagner</p>
</div>
';

// Inclusion de l\'en-tête
include 'includes/header.php';
?>

<!-- Section de présentation de l'équipe -->
<section class="section section-team-intro">
    <div class="container">
        <div class="team-intro-content">
            <div class="intro-text">
                <h2>Une équipe d'experts passionnés</h2>
                <p>Notre équipe combine expertise technique et vision stratégique pour offrir des solutions complètes et innovantes. Chaque membre apporte sa spécialité pour créer une synergie unique au service de vos projets.</p>
                
                <div class="team-values">
                    <div class="value-item">
                        <div class="value-icon">
                            <i class="fas fa-handshake"></i>
                        </div>
                        <div class="value-content">
                            <h4>Collaboration</h4>
                            <p>Nous travaillons ensemble pour atteindre l'excellence</p>
                        </div>
                    </div>
                    
                    <div class="value-item">
                        <div class="value-icon">
                            <i class="fas fa-lightbulb"></i>
                        </div>
                        <div class="value-content">
                            <h4>Innovation</h4>
                            <p>Nous cherchons constamment de nouvelles solutions</p>
                        </div>
                    </div>
                    
                    <div class="value-item">
                        <div class="value-icon">
                            <i class="fas fa-heart"></i>
                        </div>
                        <div class="value-content">
                            <h4>Passion</h4>
                            <p>Nous mettons notre passion au service de vos projets</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="intro-stats">
                <div class="stats-grid">
                    <div class="stat-item">
                        <div class="stat-number"><?php echo $total_membres; ?></div>
                        <div class="stat-label">Experts</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number"><?php echo $total_experience; ?>+</div>
                        <div class="stat-label">Années d'expérience</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number"><?php echo $total_projets; ?>+</div>
                        <div class="stat-label">Projets réalisés</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number"><?php echo $total_clients; ?>+</div>
                        <div class="stat-label">Clients satisfaits</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section des membres de l'équipe -->
<section class="section section-team-members">
    <div class="container">
        <div class="section-header">
            <h2>Nos experts</h2>
            <p>Découvrez les talents qui composent notre équipe</p>
        </div>
        
        <div class="team-members-grid">
            <?php foreach ($equipe as $membre): ?>
            <div class="team-member-card">
                <div class="member-photo">
                    <?php if (file_exists($membre['photo'])): ?>
                    <img src="<?php echo $membre['photo']; ?>" alt="<?php echo htmlspecialchars($membre['nom']); ?>">
                    <?php else: ?>
                    <div class="placeholder-photo">
                        <i class="fas fa-user"></i>
                    </div>
                    <?php endif; ?>
                    
                    <div class="member-overlay">
                        <div class="overlay-content">
                            <div class="member-stats">
                                <div class="stat">
                                    <span class="stat-number"><?php echo $membre['projets_realises']; ?>+</span>
                                    <span class="stat-label">Projets</span>
                                </div>
                                <div class="stat">
                                    <span class="stat-number"><?php echo $membre['annees_experience']; ?>+</span>
                                    <span class="stat-label">Années</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="member-content">
                    <div class="member-header">
                        <h3><?php echo htmlspecialchars($membre['nom']); ?></h3>
                        <p class="member-role"><?php echo htmlspecialchars($membre['role']); ?></p>
                    </div>
                    
                    <div class="member-bio">
                        <p><?php echo htmlspecialchars($membre['bio']); ?></p>
                    </div>
                    
                    <div class="member-expertise">
                        <h4>Expertise principale</h4>
                        <p><?php echo htmlspecialchars($membre['expertise_principale']); ?></p>
                    </div>
                    
                    <div class="member-specialites">
                        <h4>Spécialités</h4>
                        <div class="specialites-tags">
                            <?php foreach ($membre['specialites'] as $specialite): ?>
                            <span class="specialite-tag"><?php echo htmlspecialchars($specialite); ?></span>
                            <?php endfor; ?>
                        </div>
                    </div>
                    
                    <div class="member-formation">
                        <h4>Formation & Certifications</h4>
                        <ul class="formation-list">
                            <li><strong>Formation :</strong> <?php echo htmlspecialchars($membre['formation']); ?></li>
                            <?php foreach ($membre['certifications'] as $certification): ?>
                            <li><strong>Certification :</strong> <?php echo htmlspecialchars($certification); ?></li>
                            <?php endfor; ?>
                        </ul>
                    </div>
                    
                    <div class="member-reseaux">
                        <h4>Suivez-moi</h4>
                        <div class="reseaux-links">
                            <?php foreach ($membre['reseaux'] as $reseau => $url): ?>
                            <a href="<?php echo $url; ?>" target="_blank" rel="noopener" class="reseau-link" aria-label="<?php echo ucfirst($reseau); ?>">
                                <i class="fab fa-<?php echo $reseau; ?>"></i>
                            </a>
                            <?php endfor; ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php endfor; ?>
        </div>
    </div>
</section>

<!-- Section de l'organisation -->
<section class="section section-organization">
    <div class="container">
        <div class="section-header">
            <h2>Notre organisation</h2>
            <p>Une structure agile et collaborative pour maximiser l'efficacité</p>
        </div>
        
        <div class="organization-content">
            <div class="org-chart">
                <div class="org-level org-level-1">
                    <div class="org-position founder">
                        <div class="position-icon">
                            <i class="fas fa-crown"></i>
                        </div>
                        <div class="position-info">
                            <h4>Maickel Okereke</h4>
                            <p>Fondateur & Directeur</p>
                        </div>
                    </div>
                </div>
                
                <div class="org-connector"></div>
                
                <div class="org-level org-level-2">
                    <div class="org-position">
                        <div class="position-icon">
                            <i class="fas fa-calculator"></i>
                        </div>
                        <div class="position-info">
                            <h4>Sophie Martin</h4>
                            <p>Responsable Comptabilité</p>
                        </div>
                    </div>
                    
                    <div class="org-position">
                        <div class="position-icon">
                            <i class="fas fa-code"></i>
                        </div>
                        <div class="position-info">
                            <h4>Thomas Dubois</h4>
                            <p>Responsable Développement</p>
                        </div>
                    </div>
                    
                    <div class="org-position">
                        <div class="position-icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <div class="position-info">
                            <h4>Marie Leroy</h4>
                            <p>Responsable Stratégie</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="org-description">
                <h3>Une structure collaborative</h3>
                <p>Notre organisation favorise la collaboration et l'échange d'expertise entre les différents domaines. Chaque responsable supervise sa spécialité tout en travaillant en étroite collaboration avec les autres équipes.</p>
                
                <div class="org-features">
                    <div class="feature-item">
                        <i class="fas fa-users"></i>
                        <h4>Équipes spécialisées</h4>
                        <p>Chaque domaine d'expertise dispose de sa propre équipe dédiée</p>
                    </div>
                    
                    <div class="feature-item">
                        <i class="fas fa-sync-alt"></i>
                        <h4>Collaboration continue</h4>
                        <p>Communication régulière et partage d'expertise entre les équipes</p>
                    </div>
                    
                    <div class="feature-item">
                        <i class="fas fa-rocket"></i>
                        <h4>Agilité</h4>
                        <p>Structure flexible permettant de s'adapter rapidement aux besoins</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section des valeurs -->
<section class="section section-values">
    <div class="container">
        <div class="section-header">
            <h2>Nos valeurs</h2>
            <p>Les principes qui guident notre action au quotidien</p>
        </div>
        
        <div class="values-grid">
            <div class="value-card">
                <div class="value-icon">
                    <i class="fas fa-star"></i>
                </div>
                <h3>Excellence</h3>
                <p>Nous visons l'excellence dans chaque projet, en nous appuyant sur notre expertise et notre passion pour délivrer des résultats exceptionnels.</p>
            </div>
            
            <div class="value-card">
                <div class="value-icon">
                    <i class="fas fa-handshake"></i>
                </div>
                <h3>Confiance</h3>
                <p>La confiance est au cœur de nos relations avec nos clients. Nous construisons des partenariats durables basés sur la transparence et la fiabilité.</p>
            </div>
            
            <div class="value-card">
                <div class="value-icon">
                    <i class="fas fa-lightbulb"></i>
                </div>
                <h3>Innovation</h4>
                <p>Nous encourageons la créativité et l'innovation pour trouver des solutions toujours plus performantes et adaptées aux besoins de nos clients.</p>
            </div>
            
            <div class="value-card">
                <div class="value-icon">
                    <i class="fas fa-users"></i>
                </div>
                <h3>Collaboration</h3>
                <p>Nous croyons en la force du travail d'équipe et de la collaboration pour atteindre des résultats exceptionnels.</p>
            </div>
            
            <div class="value-card">
                <div class="value-icon">
                    <i class="fas fa-heart"></i>
                </div>
                <h3>Passion</h3>
                <p>Notre passion pour notre métier nous pousse à toujours donner le meilleur de nous-mêmes et à nous investir pleinement dans chaque projet.</p>
            </div>
            
            <div class="value-card">
                <div class="value-icon">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <h3>Formation continue</h3>
                <p>Nous nous engageons dans une démarche de formation continue pour maintenir notre expertise à la pointe de la technologie.</p>
            </div>
        </div>
    </div>
</section>

<!-- Section CTA -->
<section class="section section-cta">
    <div class="container">
        <div class="cta-content">
            <h2>Prêt à travailler avec notre équipe ?</h2>
            <p>Découvrez comment notre expertise peut transformer votre entreprise.</p>
            <div class="cta-actions">
                <a href="/contact.php" class="btn btn-primary">
                    <i class="fas fa-envelope"></i>
                    <span>Nous contacter</span>
                </a>
                <a href="/rendez-vous.php" class="btn btn-outline">
                    <i class="fas fa-calendar"></i>
                    <span>Prendre rendez-vous</span>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- JavaScript spécifique à la page -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Animation des éléments au scroll
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate');
            }
        });
    });
    
    const animatedElements = document.querySelectorAll('.value-item, .team-member-card, .org-position, .value-card, .cta-content');
    animatedElements.forEach(el => observer.observe(el));
    
    // Animation des statistiques
    const statNumbers = document.querySelectorAll('.stat-number');
    
    const animateStats = () => {
        statNumbers.forEach(stat => {
            const text = stat.textContent;
            if (text.includes('+')) {
                const number = parseInt(text.replace('+', ''));
                if (!isNaN(number)) {
                    const increment = number / 100;
                    let current = 0;
                    
                    const updateStat = () => {
                        if (current < number) {
                            current += increment;
                            stat.textContent = Math.ceil(current) + '+';
                            requestAnimationFrame(updateStat);
                        } else {
                            stat.textContent = number + '+';
                        }
                    };
                    
                    updateStat();
                }
            }
        });
    };
    
    // Déclencher l'animation quand la section est visible
    const introSection = document.querySelector('.section-team-intro');
    if (introSection) {
        const introObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateStats();
                    introObserver.unobserve(entry.target);
                }
            });
        });
        introObserver.observe(introSection);
    }
    
    // Animation des membres de l'équipe
    const teamMembers = document.querySelectorAll('.team-member-card');
    
    const animateTeamMembers = () => {
        teamMembers.forEach((member, index) => {
            setTimeout(() => {
                member.classList.add('animate');
            }, index * 200);
        });
    };
    
    const teamSection = document.querySelector('.section-team-members');
    if (teamSection) {
        const teamObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateTeamMembers();
                    teamObserver.unobserve(entry.target);
                }
            });
        });
        teamObserver.observe(teamSection);
    }
    
    // Animation de l'organisation
    const orgPositions = document.querySelectorAll('.org-position');
    
    const animateOrganization = () => {
        orgPositions.forEach((position, index) => {
            setTimeout(() => {
                position.classList.add('animate');
            }, index * 300);
        });
    };
    
    const orgSection = document.querySelector('.section-organization');
    if (orgSection) {
        const orgObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateOrganization();
                    orgObserver.unobserve(entry.target);
                }
            });
        });
        orgObserver.observe(orgSection);
    }
    
    // Animation des valeurs
    const valueCards = document.querySelectorAll('.value-card');
    
    const animateValues = () => {
        valueCards.forEach((card, index) => {
            setTimeout(() => {
                card.classList.add('animate');
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
    
    // Gestion des images placeholder
    const placeholderPhotos = document.querySelectorAll('.placeholder-photo');
    placeholderPhotos.forEach(placeholder => {
        const parent = placeholder.closest('.member-photo');
        if (parent) {
            parent.style.backgroundColor = '#f3f4f6';
            parent.style.display = 'flex';
            parent.style.alignItems = 'center';
            parent.style.justifyContent = 'center';
            parent.style.minHeight = '300px';
        }
    });
    
    // Hover effects sur les cartes des membres
    const memberCards = document.querySelectorAll('.team-member-card');
    memberCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.classList.add('hovered');
        });
        
        card.addEventListener('mouseleave', function() {
            this.classList.remove('hovered');
        });
    });
    
    // Gestion des liens des réseaux sociaux
    const reseauLinks = document.querySelectorAll('.reseau-link');
    reseauLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            // Ajouter un délai pour l'animation avant l'ouverture
            e.preventDefault();
            const url = this.href;
            
            setTimeout(() => {
                window.open(url, '_blank', 'noopener,noreferrer');
            }, 200);
        });
    });
});
</script>

<?php
// Inclusion du pied de page
include 'includes/footer.php';
?>