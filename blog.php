<?php
/**
 * Page du blog
 * Site professionnel de Maickel Okereke
 */

// Configuration de la page
$page_title = 'Blog - Maickel Okereke';
$page_description = 'Découvrez nos articles sur la comptabilité, le développement web et la gestion d\'entreprise.';
$page_keywords = 'blog, articles, comptabilité, développement web, gestion, Maickel Okereke';

// Inclusion des fichiers nécessaires
require_once 'includes/functions.php';

// Inclusion du header
include 'includes/header.php';

// Données des articles (en production, viendraient de la base de données)
$articles = [
    [
        'id' => 1,
        'titre' => 'Comment optimiser sa comptabilité en 2024',
        'slug' => 'optimiser-comptabilite-2024',
        'extrait' => 'Découvrez les meilleures pratiques et outils pour optimiser votre comptabilité en 2024. De la digitalisation aux tableaux de bord, nous vous donnons toutes les clés.',
        'contenu' => 'Contenu complet de l\'article...',
        'categorie' => 'comptabilite',
        'auteur' => 'Maickel Okereke',
        'date_pub' => '2024-01-15',
        'image' => 'assets/images/blog/optimiser-comptabilite.jpg',
        'temps_lecture' => '5 min',
        'vues' => 1250,
        'tags' => ['Comptabilité', 'Optimisation', 'Digitalisation', '2024']
    ],
    [
        'id' => 2,
        'titre' => 'Les tendances du développement web en 2024',
        'slug' => 'tendances-developpement-web-2024',
        'extrait' => 'Le développement web évolue constamment. Découvrez les technologies et frameworks qui dominent en 2024 et comment les intégrer dans vos projets.',
        'contenu' => 'Contenu complet de l\'article...',
        'categorie' => 'developpement',
        'auteur' => 'Thomas Dubois',
        'date_pub' => '2024-01-10',
        'image' => 'assets/images/blog/tendances-web-2024.jpg',
        'temps_lecture' => '7 min',
        'vues' => 980,
        'tags' => ['Développement web', 'Tendances', 'Technologies', '2024']
    ],
    [
        'id' => 3,
        'titre' => 'Transformer son entreprise avec le digital',
        'slug' => 'transformation-digitale-entreprise',
        'extrait' => 'La transformation digitale n\'est plus une option mais une nécessité. Voici comment accompagner votre entreprise dans cette transition cruciale.',
        'contenu' => 'Contenu complet de l\'article...',
        'categorie' => 'strategie',
        'auteur' => 'Marie Leroy',
        'date_pub' => '2024-01-05',
        'image' => 'assets/images/blog/transformation-digitale.jpg',
        'temps_lecture' => '6 min',
        'vues' => 750,
        'tags' => ['Transformation digitale', 'Stratégie', 'Innovation', 'Entreprise']
    ],
    [
        'id' => 4,
        'titre' => 'Gérer sa trésorerie efficacement',
        'slug' => 'gerer-tresorerie-efficacement',
        'extrait' => 'La gestion de trésorerie est cruciale pour la survie de votre entreprise. Découvrez nos conseils et outils pour une gestion optimale.',
        'contenu' => 'Contenu complet de l\'article...',
        'categorie' => 'comptabilite',
        'auteur' => 'Sophie Martin',
        'date_pub' => '2023-12-28',
        'image' => 'assets/images/blog/gestion-tresorerie.jpg',
        'temps_lecture' => '4 min',
        'vues' => 620,
        'tags' => ['Trésorerie', 'Gestion', 'Finance', 'PME']
    ],
    [
        'id' => 5,
        'titre' => 'Créer un site web performant en 2024',
        'slug' => 'creer-site-web-performant-2024',
        'extrait' => 'Performance, SEO, accessibilité : découvrez les critères essentiels pour créer un site web qui convertit en 2024.',
        'contenu' => 'Contenu complet de l\'article...',
        'categorie' => 'developpement',
        'auteur' => 'Thomas Dubois',
        'date_pub' => '2023-12-20',
        'image' => 'assets/images/blog/site-web-performant.jpg',
        'temps_lecture' => '8 min',
        'vues' => 890,
        'tags' => ['Site web', 'Performance', 'SEO', 'Conversion']
    ],
    [
        'id' => 6,
        'titre' => 'Les erreurs comptables à éviter',
        'slug' => 'erreurs-comptables-eviter',
        'extrait' => 'Certaines erreurs comptables peuvent coûter cher à votre entreprise. Voici les plus courantes et comment les éviter.',
        'contenu' => 'Contenu complet de l\'article...',
        'categorie' => 'comptabilite',
        'auteur' => 'Maickel Okereke',
        'date_pub' => '2023-12-15',
        'image' => 'assets/images/blog/erreurs-comptables.jpg',
        'temps_lecture' => '5 min',
        'vues' => 1100,
        'tags' => ['Comptabilité', 'Erreurs', 'Prévention', 'Conseils']
    ],
    [
        'id' => 7,
        'titre' => 'Stratégie marketing digital pour PME',
        'slug' => 'strategie-marketing-digital-pme',
        'extrait' => 'Le marketing digital n\'est pas réservé aux grandes entreprises. Découvrez comment les PME peuvent l\'utiliser efficacement.',
        'contenu' => 'Contenu complet de l\'article...',
        'categorie' => 'strategie',
        'auteur' => 'Marie Leroy',
        'date_pub' => '2023-12-10',
        'image' => 'assets/images/blog/marketing-digital-pme.jpg',
        'temps_lecture' => '6 min',
        'vues' => 680,
        'tags' => ['Marketing digital', 'PME', 'Stratégie', 'ROI']
    ],
    [
        'id' => 8,
        'titre' => 'Sécuriser son application web',
        'slug' => 'securiser-application-web',
        'extrait' => 'La sécurité web est primordiale. Découvrez les bonnes pratiques et outils pour protéger vos applications des menaces.',
        'contenu' => 'Contenu complet de l\'article...',
        'categorie' => 'developpement',
        'auteur' => 'Thomas Dubois',
        'date_pub' => '2023-12-05',
        'image' => 'assets/images/blog/securite-web.jpg',
        'temps_lecture' => '7 min',
        'vues' => 720,
        'tags' => ['Sécurité', 'Application web', 'Protection', 'Bonnes pratiques']
    ]
];

// Filtrage des articles
$filtre_categorie = $_GET['categorie'] ?? '';
$filtre_auteur = $_GET['auteur'] ?? '';
$recherche = $_GET['recherche'] ?? '';
$page = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;

$articles_filtres = $articles;

// Filtre par catégorie
if (!empty($filtre_categorie)) {
    $articles_filtres = array_filter($articles_filtres, function($a) use ($filtre_categorie) {
        return $a['categorie'] === $filtre_categorie;
    });
}

// Filtre par auteur
if (!empty($filtre_auteur)) {
    $articles_filtres = array_filter($articles_filtres, function($a) use ($filtre_auteur) {
        return $a['auteur'] === $filtre_auteur;
    });
}

// Recherche textuelle
if (!empty($recherche)) {
    $articles_filtres = array_filter($articles_filtres, function($a) use ($recherche) {
        $recherche_lower = strtolower($recherche);
        return strpos(strtolower($a['titre']), $recherche_lower) !== false ||
               strpos(strtolower($a['extrait']), $recherche_lower) !== false ||
               strpos(strtolower($a['auteur']), $recherche_lower) !== false ||
               in_array(strtolower($recherche), array_map('strtolower', $a['tags']));
    });
}

// Pagination
$articles_par_page = 6;
$total_articles = count($articles_filtres);
$total_pages = ceil($total_articles / $articles_par_page);
$page = min($page, $total_pages);
$debut = ($page - 1) * $articles_par_page;
$articles_page = array_slice($articles_filtres, $debut, $articles_par_page);

// Statistiques
$total_articles_total = count($articles);
$total_vues = array_sum(array_column($articles, 'vues'));

// En-tête de page personnalisé
$page_header = '
<div class="page-header-content">
    <h1>Blog</h1>
    <p>Conseils, actualités et bonnes pratiques pour votre entreprise</p>
</div>
';

// Inclusion de l\'en-tête
include 'includes/header.php';
?>

<!-- Section des statistiques du blog -->
<section class="section section-blog-stats">
    <div class="container">
        <div class="stats-grid">
            <div class="stat-item">
                <div class="stat-number"><?php echo $total_articles_total; ?></div>
                <div class="stat-label">Articles publiés</div>
            </div>
            <div class="stat-item">
                <div class="stat-number"><?php echo number_format($total_vues); ?></div>
                <div class="stat-label">Lectures totales</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">3</div>
                <div class="stat-label">Catégories</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">4</div>
                <div class="stat-label">Auteurs experts</div>
            </div>
        </div>
    </div>
</section>

<!-- Section des filtres et recherche -->
<section class="section section-blog-filters">
    <div class="container">
        <div class="filters-container">
            <form class="filters-form" method="GET" action="">
                <div class="filters-row">
                    <div class="filter-group">
                        <label for="categorie">Catégorie</label>
                        <select id="categorie" name="categorie">
                            <option value="">Toutes les catégories</option>
                            <option value="comptabilite" <?php echo $filtre_categorie === 'comptabilite' ? 'selected' : ''; ?>>Comptabilité</option>
                            <option value="developpement" <?php echo $filtre_categorie === 'developpement' ? 'selected' : ''; ?>>Développement web</option>
                            <option value="strategie" <?php echo $filtre_categorie === 'strategie' ? 'selected' : ''; ?>>Stratégie</option>
                        </select>
                    </div>
                    
                    <div class="filter-group">
                        <label for="auteur">Auteur</label>
                        <select id="auteur" name="auteur">
                            <option value="">Tous les auteurs</option>
                            <option value="Maickel Okereke" <?php echo $filtre_auteur === 'Maickel Okereke' ? 'selected' : ''; ?>>Maickel Okereke</option>
                            <option value="Thomas Dubois" <?php echo $filtre_auteur === 'Thomas Dubois' ? 'selected' : ''; ?>>Thomas Dubois</option>
                            <option value="Sophie Martin" <?php echo $filtre_auteur === 'Sophie Martin' ? 'selected' : ''; ?>>Sophie Martin</option>
                            <option value="Marie Leroy" <?php echo $filtre_auteur === 'Marie Leroy' ? 'selected' : ''; ?>>Marie Leroy</option>
                        </select>
                    </div>
                    
                    <div class="filter-group search-group">
                        <label for="recherche">Rechercher</label>
                        <div class="search-input">
                            <i class="fas fa-search"></i>
                            <input type="text" id="recherche" name="recherche" value="<?php echo htmlspecialchars($recherche); ?>" placeholder="Titre, contenu, tags...">
                        </div>
                    </div>
                    
                    <div class="filter-actions">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-filter"></i>
                            <span>Filtrer</span>
                        </button>
                        <a href="/blog.php" class="btn btn-outline">
                            <i class="fas fa-times"></i>
                            <span>Effacer</span>
                        </a>
                    </div>
                </div>
            </form>
            
            <div class="filters-results">
                <p><?php echo $total_articles; ?> article<?php echo $total_articles > 1 ? 's' : ''; ?> trouvé<?php echo $total_articles > 1 ? 's' : ''; ?></p>
            </div>
        </div>
    </div>
</section>

<!-- Section des articles -->
<section class="section section-blog-articles">
    <div class="container">
        <?php if (empty($articles_page)): ?>
        <div class="no-results">
            <div class="no-results-icon">
                <i class="fas fa-search"></i>
            </div>
            <h3>Aucun article trouvé</h3>
            <p>Aucun article ne correspond à vos critères de recherche. Essayez de modifier vos filtres.</p>
            <a href="/blog.php" class="btn btn-primary">
                <i class="fas fa-eye"></i>
                <span>Voir tous les articles</span>
            </a>
        </div>
        <?php else: ?>
        
        <div class="articles-grid">
            <?php foreach ($articles_page as $article): ?>
            <article class="article-card" data-categorie="<?php echo $article['categorie']; ?>" data-auteur="<?php echo $article['auteur']; ?>">
                <div class="article-image">
                    <?php if (file_exists($article['image'])): ?>
                    <img src="<?php echo $article['image']; ?>" alt="<?php echo htmlspecialchars($article['titre']); ?>">
                    <?php else: ?>
                    <div class="placeholder-image">
                        <i class="fas fa-image"></i>
                    </div>
                    <?php endif; ?>
                    
                    <div class="article-overlay">
                        <div class="overlay-content">
                            <a href="/article.php?id=<?php echo $article['id']; ?>" class="btn btn-primary">
                                <i class="fas fa-eye"></i>
                                <span>Lire l\'article</span>
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="article-content">
                    <div class="article-meta">
                        <div class="meta-item">
                            <i class="fas fa-folder"></i>
                            <span class="category-badge category-<?php echo $article['categorie']; ?>">
                                <?php
                                $categories_labels = [
                                    'comptabilite' => 'Comptabilité',
                                    'developpement' => 'Développement web',
                                    'strategie' => 'Stratégie'
                                ];
                                echo $categories_labels[$article['categorie']];
                                ?>
                            </span>
                        </div>
                        <div class="meta-item">
                            <i class="fas fa-user"></i>
                            <span><?php echo htmlspecialchars($article['auteur']); ?></span>
                        </div>
                        <div class="meta-item">
                            <i class="fas fa-calendar"></i>
                            <span><?php echo date('d/m/Y', strtotime($article['date_pub'])); ?></span>
                        </div>
                        <div class="meta-item">
                            <i class="fas fa-clock"></i>
                            <span><?php echo $article['temps_lecture']; ?></span>
                        </div>
                    </div>
                    
                    <div class="article-header">
                        <h3><a href="/article.php?id=<?php echo $article['id']; ?>"><?php echo htmlspecialchars($article['titre']); ?></a></h3>
                    </div>
                    
                    <div class="article-excerpt">
                        <p><?php echo htmlspecialchars($article['extrait']); ?></p>
                    </div>
                    
                    <div class="article-tags">
                        <?php foreach (array_slice($article['tags'], 0, 3) as $tag): ?>
                        <span class="tag"><?php echo htmlspecialchars($tag); ?></span>
                        <?php endfor; ?>
                        <?php if (count($article['tags']) > 3): ?>
                        <span class="tag more">+<?php echo count($article['tags']) - 3; ?></span>
                        <?php endif; ?>
                    </div>
                    
                    <div class="article-footer">
                        <div class="article-stats">
                            <span class="views">
                                <i class="fas fa-eye"></i>
                                <?php echo number_format($article['vues']); ?>
                            </span>
                        </div>
                        
                        <a href="/article.php?id=<?php echo $article['id']; ?>" class="read-more">
                            Lire la suite <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </article>
            <?php endfor; ?>
        </div>
        
        <?php endif; ?>
    </div>
</section>

<!-- Section de pagination -->
<?php if ($total_pages > 1): ?>
<section class="section section-pagination">
    <div class="container">
        <div class="pagination-container">
            <div class="pagination-info">
                <p>Page <?php echo $page; ?> sur <?php echo $total_pages; ?> (<?php echo $total_articles; ?> article<?php echo $total_articles > 1 ? 's' : ''; ?>)</p>
            </div>
            
            <div class="pagination-links">
                <?php if ($page > 1): ?>
                <a href="?<?php echo http_build_query(array_merge($_GET, ['page' => $page - 1])); ?>" class="pagination-link prev">
                    <i class="fas fa-chevron-left"></i>
                    <span>Précédent</span>
                </a>
                <?php endif; ?>
                
                <?php
                $debut_pagination = max(1, $page - 2);
                $fin_pagination = min($total_pages, $page + 2);
                
                if ($debut_pagination > 1): ?>
                <a href="?<?php echo http_build_query(array_merge($_GET, ['page' => 1])); ?>" class="pagination-link">1</a>
                <?php if ($debut_pagination > 2): ?>
                <span class="pagination-ellipsis">...</span>
                <?php endif; ?>
                <?php endif; ?>
                
                <?php for ($i = $debut_pagination; $i <= $fin_pagination; $i++): ?>
                <a href="?<?php echo http_build_query(array_merge($_GET, ['page' => $i])); ?>" class="pagination-link <?php echo $i === $page ? 'active' : ''; ?>">
                    <?php echo $i; ?>
                </a>
                <?php endfor; ?>
                
                <?php if ($fin_pagination < $total_pages): ?>
                <?php if ($fin_pagination < $total_pages - 1): ?>
                <span class="pagination-ellipsis">...</span>
                <?php endif; ?>
                <a href="?<?php echo http_build_query(array_merge($_GET, ['page' => $total_pages])); ?>" class="pagination-link"><?php echo $total_pages; ?></a>
                <?php endif; ?>
                
                <?php if ($page < $total_pages): ?>
                <a href="?<?php echo http_build_query(array_merge($_GET, ['page' => $page + 1])); ?>" class="pagination-link next">
                    <span>Suivant</span>
                    <i class="fas fa-chevron-right"></i>
                </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- Section des articles populaires -->
<section class="section section-popular-articles">
    <div class="container">
        <div class="section-header">
            <h2>Articles populaires</h2>
            <p>Les articles les plus lus par nos lecteurs</p>
        </div>
        
        <div class="popular-articles-grid">
            <?php
            // Trier les articles par nombre de vues et prendre les 3 premiers
            $articles_populaires = $articles;
            usort($articles_populaires, function($a, $b) {
                return $b['vues'] - $a['vues'];
            });
            $articles_populaires = array_slice($articles_populaires, 0, 3);
            
            foreach ($articles_populaires as $article):
            ?>
            <div class="popular-article-item">
                <div class="popular-article-image">
                    <?php if (file_exists($article['image'])): ?>
                    <img src="<?php echo $article['image']; ?>" alt="<?php echo htmlspecialchars($article['titre']); ?>">
                    <?php else: ?>
                    <div class="placeholder-image">
                        <i class="fas fa-image"></i>
                    </div>
                    <?php endif; ?>
                </div>
                
                <div class="popular-article-content">
                    <h3><a href="/article.php?id=<?php echo $article['id']; ?>"><?php echo htmlspecialchars($article['titre']); ?></a></h3>
                    <p><?php echo htmlspecialchars(substr($article['extrait'], 0, 100)) . '...'; ?></p>
                    
                    <div class="popular-article-meta">
                        <span class="author"><?php echo htmlspecialchars($article['auteur']); ?></span>
                        <span class="views"><?php echo number_format($article['vues']); ?> vues</span>
                    </div>
                </div>
            </div>
            <?php endfor; ?>
        </div>
    </div>
</section>

<!-- Section newsletter -->
<section class="section section-newsletter">
    <div class="container">
        <div class="newsletter-content">
            <div class="newsletter-text">
                <h2>Restez informé</h2>
                <p>Recevez nos derniers articles et conseils directement dans votre boîte mail.</p>
            </div>
            
            <div class="newsletter-form">
                <form class="newsletter-signup" method="POST" action="">
                    <div class="form-group">
                        <input type="email" name="email" placeholder="Votre adresse email" required>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-paper-plane"></i>
                            <span>S\'inscrire</span>
                        </button>
                    </div>
                    <div class="form-note">
                        <small>Nous respectons votre vie privée. Désinscription à tout moment.</small>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Section CTA -->
<section class="section section-cta">
    <div class="container">
        <div class="cta-content">
            <h2>Besoin d\'aide pour votre projet ?</h2>
            <p>Nos experts sont là pour vous accompagner dans vos projets de comptabilité et développement web.</p>
            <div class="cta-actions">
                <a href="/contact.php" class="btn btn-primary">
                    <i class="fas fa-envelope"></i>
                    <span>Nous contacter</span>
                </a>
                <a href="/devis.php" class="btn btn-outline">
                    <i class="fas fa-calculator"></i>
                    <span>Demander un devis</span>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- JavaScript spécifique à la page -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Gestion de la recherche en temps réel
    const searchInput = document.getElementById('recherche');
    const searchForm = document.querySelector('.filters-form');
    
    if (searchInput) {
        let searchTimeout;
        
        searchInput.addEventListener('input', function() {
            clearTimeout(searchTimeout);
            searchTimeout = setTimeout(() => {
                searchForm.submit();
            }, 500);
        });
    }
    
    // Gestion des filtres automatiques
    const filterSelects = document.querySelectorAll('select[name="categorie"], select[name="auteur"]');
    
    filterSelects.forEach(select => {
        select.addEventListener('change', function() {
            searchForm.submit();
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
    
    const animatedElements = document.querySelectorAll('.stat-item, .article-card, .popular-article-item, .cta-content');
    animatedElements.forEach(el => observer.observe(el));
    
    // Animation des statistiques
    const statNumbers = document.querySelectorAll('.stat-number');
    
    const animateStats = () => {
        statNumbers.forEach(stat => {
            const target = parseInt(stat.textContent.replace(/,/g, ''));
            if (!isNaN(target)) {
                const increment = target / 100;
                let current = 0;
                
                const updateStat = () => {
                    if (current < target) {
                        current += increment;
                        stat.textContent = Math.ceil(current).toLocaleString();
                        requestAnimationFrame(updateStat);
                    } else {
                        stat.textContent = target.toLocaleString();
                    }
                };
                
                updateStat();
            }
        });
    };
    
    // Déclencher l'animation quand la section est visible
    const statsSection = document.querySelector('.section-blog-stats');
    if (statsSection) {
        const statsObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateStats();
                    statsObserver.unobserve(entry.target);
                }
            });
        });
        statsObserver.observe(statsSection);
    }
    
    // Animation des articles
    const articleCards = document.querySelectorAll('.article-card');
    
    const animateArticles = () => {
        articleCards.forEach((card, index) => {
            setTimeout(() => {
                card.classList.add('animate');
            }, index * 150);
        });
    };
    
    const articlesSection = document.querySelector('.section-blog-articles');
    if (articlesSection) {
        const articlesObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateArticles();
                    articlesObserver.unobserve(entry.target);
                }
            });
        });
        articlesObserver.observe(articlesSection);
    }
    
    // Gestion des filtres avec URL
    const updateURL = () => {
        const formData = new FormData(searchForm);
        const params = new URLSearchParams();
        
        for (let [key, value] of formData.entries()) {
            if (value) {
                params.append(key, value);
            }
        }
        
        const newURL = window.location.pathname + (params.toString() ? '?' + params.toString() : '');
        window.history.pushState({}, '', newURL);
    };
    
    // Mettre à jour l'URL lors des changements de filtres
    filterSelects.forEach(select => {
        select.addEventListener('change', updateURL);
    });
    
    if (searchInput) {
        searchInput.addEventListener('input', function() {
            clearTimeout(searchTimeout);
            searchTimeout = setTimeout(updateURL, 500);
        });
    }
    
    // Restaurer les filtres depuis l'URL au chargement
    const urlParams = new URLSearchParams(window.location.search);
    const categorieParam = urlParams.get('categorie');
    const auteurParam = urlParams.get('auteur');
    const rechercheParam = urlParams.get('recherche');
    
    if (categorieParam) {
        document.getElementById('categorie').value = categorieParam;
    }
    if (auteurParam) {
        document.getElementById('auteur').value = auteurParam;
    }
    if (rechercheParam) {
        document.getElementById('recherche').value = rechercheParam;
    }
    
    // Gestion des images placeholder
    const placeholderImages = document.querySelectorAll('.placeholder-image');
    placeholderImages.forEach(placeholder => {
        const parent = placeholder.closest('.article-image, .popular-article-image');
        if (parent) {
            parent.style.backgroundColor = '#f3f4f6';
            parent.style.display = 'flex';
            parent.style.alignItems = 'center';
            parent.style.justifyContent = 'center';
            parent.style.minHeight = '200px';
        }
    });
    
    // Hover effects sur les cartes d'articles
    const articleCardsHover = document.querySelectorAll('.article-card');
    articleCardsHover.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.classList.add('hovered');
        });
        
        card.addEventListener('mouseleave', function() {
            this.classList.remove('hovered');
        });
    });
    
    // Gestion de la newsletter
    const newsletterForm = document.querySelector('.newsletter-signup');
    if (newsletterForm) {
        newsletterForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const email = this.querySelector('input[name="email"]').value;
            
            // Simulation d'inscription réussie
            const successMessage = document.createElement('div');
            successMessage.className = 'newsletter-success';
            successMessage.innerHTML = `
                <i class="fas fa-check-circle"></i>
                <span>Merci ! Vous êtes maintenant inscrit à notre newsletter.</span>
            `;
            
            this.parentNode.appendChild(successMessage);
            this.reset();
            
            // Supprimer le message après 5 secondes
            setTimeout(() => {
                successMessage.remove();
            }, 5000);
        });
    }
});
</script>

<?php
// Inclusion du pied de page
include 'includes/footer.php';
?>