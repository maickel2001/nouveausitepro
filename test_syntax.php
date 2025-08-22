<?php
/**
 * Test de syntaxe des fichiers PHP
 */

echo "<h1>Test de syntaxe des fichiers PHP</h1>";

$files = [
    'temoignages.php',
    'services.php',
    'a-propos.php',
    'contact.php',
    'devis.php',
    'faq.php',
    'ressources.php',
    'login.php',
    'inscription.php',
    'rendez-vous.php',
    'etudes-de-cas.php',
    'equipe.php',
    'tarifs.php',
    'blog.php',
    'article.php',
    'mentions-legales.php',
    'politique-de-confidentialite.php',
    'plan-du-site.php',
    'user/dashboard.php',
    'user/devis.php',
    'user/ressources.php',
    'user/profil.php',
    'admin/dashboard.php',
    'admin/utilisateurs.php',
    'admin/services.php',
    'admin/etudes.php',
    'admin/temoignages.php'
];

foreach ($files as $file) {
    echo "<h3>Test de $file</h3>";
    
    if (file_exists($file)) {
        // Test de syntaxe
        $output = shell_exec("php -l $file 2>&1");
        
        if (strpos($output, 'No syntax errors') !== false) {
            echo "<p style='color: green;'>✓ Syntaxe OK</p>";
        } else {
            echo "<p style='color: red;'>✗ Erreur de syntaxe:</p>";
            echo "<pre>" . htmlspecialchars($output) . "</pre>";
        }
    } else {
        echo "<p style='color: orange;'>⚠ Fichier non trouvé</p>";
    }
}

echo "<h2>Test terminé</h2>";
echo "<p><a href='index.php'>← Retour à l'accueil</a></p>";
?>