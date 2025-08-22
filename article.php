<?php
/**
 * Page de détail d'un article
 * Site professionnel de Maickel Okereke
 */

// Configuration de la page
$page_title = 'Article - Maickel Okereke';
$page_description = 'Découvrez nos articles sur la comptabilité, le développement web et la gestion d\'entreprise.';
$page_keywords = 'article, blog, comptabilité, développement web, gestion, Maickel Okereke';

// Récupération de l'ID de l'article
$article_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Données des articles (en production, viendraient de la base de données)
$articles = [
    1 => [
        'id' => 1,
        'titre' => 'Comment optimiser sa comptabilité en 2024',
        'slug' => 'optimiser-comptabilite-2024',
        'extrait' => 'Découvrez les meilleures pratiques et outils pour optimiser votre comptabilité en 2024. De la digitalisation aux tableaux de bord, nous vous donnons toutes les clés.',
        'contenu' => '
            <h2>Introduction</h2>
            <p>En 2024, la comptabilité n\'est plus seulement une obligation légale, mais un véritable levier de performance pour votre entreprise. Avec l\'évolution des technologies et des réglementations, il est essentiel de s\'adapter et d\'optimiser vos processus comptables.</p>
            
            <h2>1. La digitalisation de votre comptabilité</h2>
            <p>La première étape vers l\'optimisation de votre comptabilité passe par sa digitalisation. Voici les avantages principaux :</p>
            <ul>
                <li><strong>Gain de temps :</strong> Automatisation des tâches répétitives</li>
                <li><strong>Réduction des erreurs :</strong> Validation automatique des données</li>
                <li><strong>Accès en temps réel :</strong> Suivi de votre situation financière</li>
                <li><strong>Collaboration facilitée :</strong> Partage d\'informations avec votre équipe</li>
            </ul>
            
            <h3>1.1 Choisir le bon logiciel comptable</h3>
            <p>Le choix de votre logiciel comptable est crucial. Voici les critères à considérer :</p>
            <ul>
                <li>Facilité d\'utilisation</li>
                <li>Fonctionnalités adaptées à votre secteur</li>
                <li>Intégration avec vos autres outils</li>
                <li>Support client et formation</li>
                <li>Évolutivité selon votre croissance</li>
            </ul>
            
            <h2>2. Mettre en place des tableaux de bord</h2>
            <p>Les tableaux de bord vous permettent de visualiser rapidement les indicateurs clés de votre entreprise :</p>
            
            <h3>2.1 Indicateurs financiers essentiels</h3>
            <ul>
                <li><strong>Chiffre d\'affaires :</strong> Suivi de votre activité</li>
                <li><strong>Marge brute :</strong> Rentabilité de vos produits/services</li>
                <li><strong>Trésorerie :</strong> Gestion de vos flux de trésorerie</li>
                <li><strong>Délais de paiement :</strong> Optimisation de votre BFR</li>
            </ul>
            
            <h3>2.2 Tableaux de bord opérationnels</h3>
            <p>Au-delà des indicateurs financiers, surveillez également :</p>
            <ul>
                <li>Le taux de transformation de vos prospects</li>
                <li>La satisfaction client</li>
                <li>La productivité de vos équipes</li>
                <li>L\'efficacité de vos processus</li>
            </ul>
            
            <h2>3. Automatiser vos processus</h2>
            <p>L\'automatisation est la clé de l\'efficacité comptable :</p>
            
            <h3>3.1 Saisie automatique des factures</h3>
            <p>Utilisez la reconnaissance optique de caractères (OCR) pour :</p>
            <ul>
                <li>Scanner automatiquement vos factures</li>
                <li>Extraire les informations importantes</li>
                <li>Pré-remplir vos écritures comptables</li>
                <li>Réduire les erreurs de saisie</li>
            </ul>
            
            <h3>3.2 Rapprochement bancaire automatisé</h3>
            <p>Automatisez le rapprochement bancaire pour :</p>
            <ul>
                <li>Gagner du temps sur cette tâche chronophage</li>
                <li>Identifier rapidement les écarts</li>
                <li>Maintenir une comptabilité à jour</li>
                <li>Faciliter la détection de fraudes</li>
            </ul>
            
            <h2>4. Optimiser votre gestion des stocks</h2>
            <p>Une bonne gestion des stocks impacte directement votre comptabilité :</p>
            
            <h3>4.1 Méthodes d\'évaluation des stocks</h3>
            <ul>
                <li><strong>FIFO (First In, First Out) :</strong> Premiers entrés, premiers sortis</li>
                <li><strong>LIFO (Last In, First Out) :</strong> Derniers entrés, premiers sortis</li>
                <li><strong>Coût moyen pondéré :</strong> Moyenne des coûts d\'achat</li>
            </ul>
            
            <h3>4.2 Inventaire permanent vs inventaire intermittent</h3>
            <p>Choisissez la méthode adaptée à votre activité :</p>
            <ul>
                <li><strong>Inventaire permanent :</strong> Suivi en temps réel, plus précis mais plus complexe</li>
                <li><strong>Inventaire intermittent :</strong> Contrôle périodique, plus simple mais moins précis</li>
            </ul>
            
            <h2>5. Respecter les nouvelles réglementations</h2>
            <p>2024 apporte son lot de nouvelles obligations :</p>
            
            <h3>5.1 Facturation électronique</h3>
            <p>La facturation électronique devient obligatoire pour :</p>
            <ul>
                <li>Les entreprises de plus de 50 salariés (dès 2024)</li>
                <li>Toutes les entreprises (dès 2026)</li>
                <li>Certains secteurs spécifiques (BTP, transport, etc.)</li>
            </ul>
            
            <h3>5.2 Déclaration de TVA</h3>
            <p>Adaptez-vous aux nouvelles obligations :</p>
            <ul>
                <li>Déclaration mensuelle pour les grandes entreprises</li>
                <li>Déclaration trimestrielle pour les PME</li>
                <li>Transmission électronique obligatoire</li>
            </ul>
            
            <h2>6. Former vos équipes</h2>
            <p>L\'optimisation de votre comptabilité passe aussi par la formation :</p>
            
            <h3>6.1 Formation aux nouveaux outils</h3>
            <ul>
                <li>Prise en main du logiciel comptable</li>
                <li>Utilisation des tableaux de bord</li>
                <li>Procédures de contrôle qualité</li>
                <li>Nouvelles réglementations</li>
            </ul>
            
            <h3>6.2 Accompagnement au changement</h2>
            <p>Facilitez l\'adoption des nouveaux processus :</p>
            <ul>
                <li>Communication claire sur les objectifs</li>
                <li>Formation progressive et adaptée</li>
                <li>Support et accompagnement continu</li>
                <li>Reconnaissance des efforts</li>
            </ul>
            
            <h2>Conclusion</h2>
            <p>L\'optimisation de votre comptabilité en 2024 n\'est pas un objectif inaccessible. En combinant digitalisation, automatisation et formation, vous pouvez transformer cette fonction support en véritable atout concurrentiel.</p>
            
            <p>N\'oubliez pas que chaque entreprise est unique. Adaptez ces recommandations à votre contexte spécifique et n\'hésitez pas à faire appel à des experts pour vous accompagner dans cette transformation.</p>
            
            <h3>Prochaines étapes</h3>
            <p>Pour aller plus loin dans l\'optimisation de votre comptabilité :</p>
            <ul>
                <li>Auditez vos processus actuels</li>
                <li>Identifiez vos priorités d\'amélioration</li>
                <li>Planifiez votre transformation par étapes</li>
                <li>Mesurez vos progrès régulièrement</li>
            </ul>
        ',
        'categorie' => 'comptabilite',
        'auteur' => 'Maickel Okereke',
        'date_pub' => '2024-01-15',
        'image' => 'assets/images/blog/optimiser-comptabilite.jpg',
        'temps_lecture' => '5 min',
        'vues' => 1250,
        'tags' => ['Comptabilité', 'Optimisation', 'Digitalisation', '2024'],
        'auteur_bio' => 'Expert en comptabilité et développement web avec plus de 10 ans d\'expérience. Maickel combine sa double expertise pour offrir des solutions complètes aux entreprises.',
        'auteur_photo' => 'assets/images/team/maickel-okereke.jpg',
        'auteur_reseaux' => [
            'linkedin' => 'https://linkedin.com/in/maickel-okereke',
            'twitter' => 'https://twitter.com/maickel_okereke'
        ]
    ],
    2 => [
        'id' => 2,
        'titre' => 'Les tendances du développement web en 2024',
        'slug' => 'tendances-developpement-web-2024',
        'extrait' => 'Le développement web évolue constamment. Découvrez les technologies et frameworks qui dominent en 2024 et comment les intégrer dans vos projets.',
        'contenu' => '
            <h2>Introduction</h2>
            <p>Le développement web continue son évolution rapide en 2024, avec de nouvelles technologies qui transforment la façon dont nous créons et déployons des applications web. Découvrez les tendances qui façonnent l\'avenir du développement web.</p>
            
            <h2>1. L\'essor des frameworks JavaScript modernes</h2>
            <p>JavaScript reste le langage dominant du web, avec des frameworks qui se renouvellent constamment :</p>
            
            <h3>1.1 React 18 et ses nouvelles fonctionnalités</h3>
            <ul>
                <li><strong>Concurrent Features :</strong> Rendu concurrent pour une meilleure performance</li>
                <li><strong>Automatic Batching :</strong> Optimisation automatique des mises à jour</li>
                <li><strong>Suspense :</strong> Gestion améliorée du chargement asynchrone</li>
                <li><strong>Server Components :</strong> Composants côté serveur pour de meilleures performances</li>
            </ul>
            
            <h3>1.2 Vue.js 3 et la Composition API</h3>
            <p>Vue.js continue de gagner en popularité grâce à :</p>
            <ul>
                <li>Une syntaxe plus intuitive</li>
                <li>De meilleures performances</li>
                <li>Une meilleure TypeScript support</li>
                <li>Une adoption progressive facilitée</li>
            </ul>
            
            <h2>2. Le développement full-stack simplifié</h2>
            <p>Les développeurs recherchent des solutions qui simplifient le développement full-stack :</p>
            
            <h3>2.1 Next.js 14 et l\'App Router</h3>
            <ul>
                <li>Routage basé sur les dossiers</li>
                <li>Server Components par défaut</li>
                <li>Optimisations automatiques</li>
                <li>Intégration Turbopack</li>
            </ul>
            
            <h3>2.2 Nuxt 3 et son écosystème</h3>
            <p>Nuxt 3 apporte des améliorations significatives :</p>
            <ul>
                <li>Performance améliorée</li>
                <li>Développement plus rapide</li>
                <li>Meilleure SEO</li>
                <li>Écosystème riche</li>
            </ul>
            
            <h2>3. L\'importance croissante de la performance</h2>
            <p>La performance devient un critère essentiel pour le succès d\'une application web :</p>
            
            <h3>3.1 Core Web Vitals</h3>
            <ul>
                <li><strong>LCP (Largest Contentful Paint) :</strong> Temps de chargement du contenu principal</li>
                <li><strong>FID (First Input Delay) :</strong> Réactivité aux interactions utilisateur</li>
                <li><strong>CLS (Cumulative Layout Shift) :</strong> Stabilité visuelle</li>
            </ul>
            
            <h3>3.2 Techniques d\'optimisation</h3>
            <p>Adoptez ces techniques pour améliorer vos performances :</p>
            <ul>
                <li>Code splitting et lazy loading</li>
                <li>Optimisation des images (WebP, AVIF)</li>
                <li>Minification et compression</li>
                <li>Mise en cache intelligente</li>
            </ul>
            
            <h2>4. L\'accessibilité au cœur du développement</h2>
            <p>L\'accessibilité n\'est plus une option mais une nécessité :</p>
            
            <h3>4.1 Standards WCAG 2.1 et 3.0</h3>
            <ul>
                <li>Navigation au clavier</li>
                <li>Lecteurs d\'écran</li>
                <li>Contraste et lisibilité</li>
                <li>Alternatives textuelles</li>
            </ul>
            
            <h3>4.2 Outils d\'audit d\'accessibilité</h3>
            <p>Utilisez ces outils pour vérifier l\'accessibilité :</p>
            <ul>
                <li>Lighthouse Accessibility</li>
                <li>axe-core</li>
                <li>WAVE Web Accessibility Evaluator</li>
                <li>Tests manuels avec lecteurs d\'écran</li>
            </ul>
            
            <h2>5. La sécurité renforcée</h2>
            <p>Les menaces de sécurité évoluent, nécessitant des mesures de protection plus sophistiquées :</p>
            
            <h3>5.1 Bonnes pratiques de sécurité</h3>
            <ul>
                <li>Validation et assainissement des entrées</li>
                <li>Authentification multi-facteurs</li>
                <li>Chiffrement des données sensibles</li>
                <li>Mise à jour régulière des dépendances</li>
            </ul>
            
            <h3>5.2 Outils de sécurité</h3>
            <p>Intégrez ces outils dans votre workflow :</p>
            <ul>
                <li>OWASP ZAP pour les tests de sécurité</li>
                <li>Snyk pour la surveillance des vulnérabilités</li>
                <li>Content Security Policy (CSP)</li>
                <li>HTTPS obligatoire</li>
            </ul>
            
            <h2>6. L\'adoption du TypeScript</h2>
            <p>TypeScript devient le standard pour le développement JavaScript professionnel :</p>
            
            <h3>6.1 Avantages du TypeScript</h3>
            <ul>
                <li>Détection d\'erreurs à la compilation</li>
                <li>Meilleure documentation du code</li>
                <li>Refactoring plus sûr</li>
                <li>Support IDE amélioré</li>
            </ul>
            
            <h3>6.2 Migration progressive</h3>
            <p>Adoptez TypeScript progressivement :</p>
            <ul>
                <li>Commencez par les nouveaux fichiers</li>
                <li>Utilisez des types stricts</li>
                <li>Formez votre équipe</li>
                <li>Intégrez dans votre CI/CD</li>
            </ul>
            
            <h2>Conclusion</h2>
            <p>Le développement web en 2024 se caractérise par une attention particulière portée à la performance, l\'accessibilité et la sécurité. Les frameworks modernes facilitent le développement tout en offrant de meilleures performances.</p>
            
            <p>Pour rester compétitif, il est essentiel de :</p>
            <ul>
                <li>Suivre l\'évolution des technologies</li>
                <li>Adopter les bonnes pratiques</li>
                <li>Former vos équipes</li>
                <li>Mesurer et optimiser en continu</li>
            </ul>
        ',
        'categorie' => 'developpement',
        'auteur' => 'Thomas Dubois',
        'date_pub' => '2024-01-10',
        'image' => 'assets/images/blog/tendances-web-2024.jpg',
        'temps_lecture' => '7 min',
        'vues' => 980,
        'tags' => ['Développement web', 'Tendances', 'Technologies', '2024'],
        'auteur_bio' => 'Développeur web passionné avec une expertise en technologies modernes. Thomas crée des solutions web performantes et innovantes.',
        'auteur_photo' => 'assets/images/team/thomas-dubois.jpg',
        'auteur_reseaux' => [
            'linkedin' => 'https://linkedin.com/in/thomas-dubois',
            'github' => 'https://github.com/thomas-dubois'
        ]
    ]
];

// Vérification de l'existence de l'article
if (!isset($articles[$article_id])) {
    // Redirection vers la page 404 ou la liste des articles
    header('Location: /blog.php');
    exit;
}

$article = $articles[$article_id];

// Mise à jour du titre de la page
$page_title = $article['titre'] . ' - Blog - Maickel Okereke';
$page_description = $article['extrait'];

// En-tête de page personnalisé
$page_header = '
<div class="page-header-content">
    <h1>' . htmlspecialchars($article['titre']) . '</h1>
    <p>' . htmlspecialchars($article['extrait']) . '</p>
</div>
';

// Inclusion de l\'en-tête
include 'includes/header.php';
?>

<!-- Section de l\'article -->
<section class="section section-article-detail">
    <div class="container">
        <div class="article-detail-container">
            <!-- Image principale -->
            <div class="article-hero">
                <?php if (file_exists($article['image'])): ?>
                <img src="<?php echo $article['image']; ?>" alt="<?php echo htmlspecialchars($article['titre']); ?>">
                <?php else: ?>
                <div class="placeholder-image-large">
                    <i class="fas fa-image"></i>
                </div>
                <?php endif; ?>
            </div>
            
            <!-- Métadonnées de l\'article -->
            <div class="article-meta">
                <div class="meta-grid">
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
                    
                    <div class="meta-item">
                        <i class="fas fa-eye"></i>
                        <span><?php echo number_format($article['vues']); ?> vues</span>
                    </div>
                </div>
            </div>
            
            <!-- Contenu de l\'article -->
            <div class="article-content">
                <div class="content-grid">
                    <!-- Colonne principale -->
                    <div class="content-main">
                        <article class="article-body">
                            <?php echo $article['contenu']; ?>
                        </article>
                        
                        <!-- Tags de l\'article -->
                        <div class="article-tags">
                            <h4>Tags :</h4>
                            <div class="tags-list">
                                <?php foreach ($article['tags'] as $tag): ?>
                                <span class="tag"><?php echo htmlspecialchars($tag); ?></span>
                                <?php endfor; ?>
                            </div>
                        </div>
                        
                        <!-- Partage social -->
                        <div class="article-share">
                            <h4>Partager cet article :</h4>
                            <div class="share-buttons">
                                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode($_SERVER['REQUEST_URI']); ?>" target="_blank" class="share-btn facebook" aria-label="Partager sur Facebook">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode($_SERVER['REQUEST_URI']); ?>&text=<?php echo urlencode($article['titre']); ?>" target="_blank" class="share-btn twitter" aria-label="Partager sur Twitter">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo urlencode($_SERVER['REQUEST_URI']); ?>" target="_blank" class="share-btn linkedin" aria-label="Partager sur LinkedIn">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                                <button class="share-btn copy" onclick="copyToClipboard()" aria-label="Copier le lien">
                                    <i class="fas fa-link"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Barre latérale -->
                    <div class="content-sidebar">
                        <!-- Auteur -->
                        <div class="sidebar-section author-card">
                            <div class="author-header">
                                <h3>À propos de l\'auteur</h3>
                            </div>
                            
                            <div class="author-info">
                                <div class="author-photo">
                                    <?php if (file_exists($article['auteur_photo'])): ?>
                                    <img src="<?php echo $article['auteur_photo']; ?>" alt="<?php echo htmlspecialchars($article['auteur']); ?>">
                                    <?php else: ?>
                                    <div class="placeholder-photo">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <?php endif; ?>
                                </div>
                                
                                <div class="author-details">
                                    <h4><?php echo htmlspecialchars($article['auteur']); ?></h4>
                                    <p><?php echo htmlspecialchars($article['auteur_bio']); ?></p>
                                    
                                    <?php if (!empty($article['auteur_reseaux'])): ?>
                                    <div class="author-social">
                                        <?php foreach ($article['auteur_reseaux'] as $reseau => $url): ?>
                                        <a href="<?php echo $url; ?>" target="_blank" rel="noopener" class="social-link" aria-label="<?php echo ucfirst($reseau); ?>">
                                            <i class="fab fa-<?php echo $reseau; ?>"></i>
                                        </a>
                                        <?php endfor; ?>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Articles similaires -->
                        <div class="sidebar-section related-articles">
                            <h3>Articles similaires</h3>
                            <?php
                            // Recherche d'articles similaires
                            $articles_similaires = array_filter($articles, function($a) use ($article) {
                                return $a['id'] !== $article['id'] && 
                                       ($a['categorie'] === $article['categorie'] || 
                                        count(array_intersect($a['tags'], $article['tags'])) > 0);
                            });
                            
                            // Limiter à 3 articles similaires
                            $articles_similaires = array_slice($articles_similaires, 0, 3);
                            
                            foreach ($articles_similaires as $article_similaire):
                            ?>
                            <div class="related-article-item">
                                <h4><a href="/article.php?id=<?php echo $article_similaire['id']; ?>"><?php echo htmlspecialchars($article_similaire['titre']); ?></a></h4>
                                <div class="related-article-meta">
                                    <span class="date"><?php echo date('d/m/Y', strtotime($article_similaire['date_pub'])); ?></span>
                                    <span class="views"><?php echo number_format($article_similaire['vues']); ?> vues</span>
                                </div>
                            </div>
                            <?php endfor; ?>
                        </div>
                        
                        <!-- Newsletter -->
                        <div class="sidebar-section newsletter-card">
                            <h3>Restez informé</h3>
                            <p>Recevez nos derniers articles et conseils directement dans votre boîte mail.</p>
                            <form class="newsletter-signup" method="POST" action="">
                                <div class="form-group">
                                    <input type="email" name="email" placeholder="Votre adresse email" required>
                                    <button type="submit" class="btn btn-primary btn-full">
                                        <i class="fas fa-paper-plane"></i>
                                        <span>S\'inscrire</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section des commentaires -->
<section class="section section-comments">
    <div class="container">
        <div class="comments-container">
            <div class="section-header">
                <h2>Commentaires</h2>
                <p>Partagez votre avis et posez vos questions</p>
            </div>
            
            <!-- Formulaire de commentaire -->
            <div class="comment-form-container">
                <form class="comment-form" method="POST" action="">
                    <div class="form-group">
                        <label for="comment-name">Nom *</label>
                        <input type="text" id="comment-name" name="name" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="comment-email">Email *</label>
                        <input type="email" id="comment-email" name="email" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="comment-content">Commentaire *</label>
                        <textarea id="comment-content" name="content" rows="4" required placeholder="Partagez votre avis, posez une question..."></textarea>
                    </div>
                    
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-paper-plane"></i>
                            <span>Publier le commentaire</span>
                        </button>
                    </div>
                </form>
            </div>
            
            <!-- Liste des commentaires -->
            <div class="comments-list">
                <div class="comment-item">
                    <div class="comment-author">
                        <div class="author-avatar">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="author-info">
                            <div class="author-name">Jean Dupont</div>
                            <div class="comment-date">Il y a 2 jours</div>
                        </div>
                    </div>
                    
                    <div class="comment-content">
                        <p>Excellent article ! J\'ai particulièrement apprécié la section sur l\'automatisation des processus. C\'est exactement ce que nous cherchons à mettre en place dans notre entreprise.</p>
                    </div>
                </div>
                
                <div class="comment-item">
                    <div class="comment-author">
                        <div class="author-avatar">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="author-info">
                            <div class="author-name">Marie Martin</div>
                            <div class="comment-date">Il y a 1 semaine</div>
                        </div>
                    </div>
                    
                    <div class="comment-content">
                        <p>Merci pour ces conseils pratiques. Pouvez-vous nous donner plus de détails sur les outils de reconnaissance optique de caractères ?</p>
                    </div>
                </div>
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
    // Animation des éléments au scroll
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate');
            }
        });
    });
    
    const animatedElements = document.querySelectorAll('.article-meta, .article-body, .sidebar-section, .comment-item, .cta-content');
    animatedElements.forEach(el => observer.observe(el));
    
    // Gestion des images placeholder
    const placeholderImages = document.querySelectorAll('.placeholder-image-large, .placeholder-photo');
    placeholderImages.forEach(placeholder => {
        const parent = placeholder.closest('.article-hero, .author-photo');
        if (parent) {
            if (placeholder.classList.contains('placeholder-image-large')) {
                parent.style.backgroundColor = '#f3f4f6';
                parent.style.display = 'flex';
                parent.style.alignItems = 'center';
                parent.style.justifyContent = 'center';
                parent.style.minHeight = '400px';
            } else {
                parent.style.backgroundColor = '#f3f4f6';
                parent.style.display = 'flex';
                parent.style.alignItems = 'center';
                parent.style.justifyContent = 'center';
                parent.style.minHeight = '80px';
            }
        }
    });
    
    // Navigation breadcrumb
    const breadcrumb = document.createElement('nav');
    breadcrumb.className = 'breadcrumb';
    breadcrumb.innerHTML = `
        <ol>
            <li><a href="/">Accueil</a></li>
            <li><a href="/blog.php">Blog</a></li>
            <li aria-current="page">${document.title.split(' - ')[0]}</li>
        </ol>
    `;
    
    const pageHeader = document.querySelector('.page-header-content');
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
    
    // Gestion du formulaire de commentaire
    const commentForm = document.querySelector('.comment-form');
    if (commentForm) {
        commentForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Simulation d'ajout de commentaire
            const name = this.querySelector('input[name="name"]').value;
            const content = this.querySelector('textarea[name="content"]').value;
            
            // Créer un nouveau commentaire
            const newComment = document.createElement('div');
            newComment.className = 'comment-item new-comment';
            newComment.innerHTML = `
                <div class="comment-author">
                    <div class="author-avatar">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="author-info">
                        <div class="author-name">${name}</div>
                        <div class="comment-date">À l'instant</div>
                    </div>
                </div>
                
                <div class="comment-content">
                    <p>${content}</p>
                </div>
            `;
            
            // Ajouter le commentaire à la liste
            const commentsList = document.querySelector('.comments-list');
            commentsList.insertBefore(newComment, commentsList.firstChild);
            
            // Réinitialiser le formulaire
            this.reset();
            
            // Message de succès
            const successMessage = document.createElement('div');
            successMessage.className = 'comment-success';
            successMessage.innerHTML = `
                <i class="fas fa-check-circle"></i>
                <span>Votre commentaire a été publié avec succès !</span>
            `;
            
            this.appendChild(successMessage);
            
            // Supprimer le message après 5 secondes
            setTimeout(() => {
                successMessage.remove();
            }, 5000);
        });
    }
});

// Fonction pour copier le lien dans le presse-papiers
function copyToClipboard() {
    const url = window.location.href;
    
    if (navigator.clipboard) {
        navigator.clipboard.writeText(url).then(() => {
            showCopySuccess();
        });
    } else {
        // Fallback pour les navigateurs plus anciens
        const textArea = document.createElement('textarea');
        textArea.value = url;
        document.body.appendChild(textArea);
        textArea.select();
        document.execCommand('copy');
        document.body.removeChild(textArea);
        showCopySuccess();
    }
}

function showCopySuccess() {
    const copyBtn = document.querySelector('.share-btn.copy');
    const originalIcon = copyBtn.innerHTML;
    
    copyBtn.innerHTML = '<i class="fas fa-check"></i>';
    copyBtn.classList.add('copied');
    
    setTimeout(() => {
        copyBtn.innerHTML = originalIcon;
        copyBtn.classList.remove('copied');
    }, 2000);
}
</script>

<?php
// Inclusion du pied de page
include 'includes/footer.php';
?>