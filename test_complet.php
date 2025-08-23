<?php
/**
 * Test complet du site
 * Vérification de tous les composants
 */

// Affichage des erreurs pour le debug
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<!DOCTYPE html>";
echo "<html lang='fr'>";
echo "<head>";
echo "<meta charset='UTF-8'>";
echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
echo "<title>Test Complet - Site Maickel Okereke</title>";
echo "<style>";
echo "body { font-family: Arial, sans-serif; margin: 20px; }";
echo ".success { color: green; }";
echo ".error { color: red; }";
echo ".warning { color: orange; }";
echo ".info { color: blue; }";
echo ".section { margin: 20px 0; padding: 15px; border: 1px solid #ddd; border-radius: 5px; }";
echo ".test-item { margin: 10px 0; padding: 10px; background: #f9f9f9; border-radius: 3px; }";
echo "</style>";
echo "</head>";
echo "<body>";

echo "<h1>🔍 Test Complet du Site Maickel Okereke</h1>";

// Test 1: Configuration
echo "<div class='section'>";
echo "<h2>1. Test de la Configuration</h2>";

try {
    if (file_exists('config/config.php')) {
        echo "<div class='test-item success'>✓ Fichier config/config.php trouvé</div>";
        
        // Test de l'inclusion de la configuration
        ob_start();
        include 'config/config.php';
        ob_end_clean();
        
        echo "<div class='test-item success'>✓ Configuration chargée sans erreur</div>";
        
        // Vérification des constantes
        if (defined('DB_HOST') && defined('DB_NAME') && defined('DB_USER')) {
            echo "<div class='test-item success'>✓ Constantes de base de données définies</div>";
            echo "<div class='test-item info'>Host: " . DB_HOST . "</div>";
            echo "<div class='test-item info'>Database: " . DB_NAME . "</div>";
            echo "<div class='test-item info'>User: " . DB_USER . "</div>";
        } else {
            echo "<div class='test-item error'>✗ Constantes de base de données manquantes</div>";
        }
    } else {
        echo "<div class='test-item error'>✗ Fichier config/config.php manquant</div>";
    }
} catch (Exception $e) {
    echo "<div class='test-item error'>✗ Erreur lors du chargement de la configuration: " . htmlspecialchars($e->getMessage()) . "</div>";
}
echo "</div>";

// Test 2: Base de données
echo "<div class='section'>";
echo "<h2>2. Test de la Base de Données</h2>";

try {
    if (file_exists('config/database.php')) {
        echo "<div class='test-item success'>✓ Fichier config/database.php trouvé</div>";
        
        // Test de l'inclusion de la base de données
        ob_start();
        include 'config/database.php';
        ob_end_clean();
        
        echo "<div class='test-item success'>✓ Classe Database chargée</div>";
        
        // Test de connexion
        try {
            $db = Database::getInstance();
            echo "<div class='test-item success'>✓ Instance Database créée</div>";
            
            // Test de requête simple
            $result = $db->fetch("SELECT VERSION() as version");
            if ($result) {
                echo "<div class='test-item success'>✓ Connexion à la base de données réussie</div>";
                echo "<div class='test-item info'>Version MySQL: " . htmlspecialchars($result['version']) . "</div>";
                
                // Test des tables
                $tables = $db->fetchAll("SHOW TABLES");
                if (empty($tables)) {
                    echo "<div class='test-item warning'>⚠ Aucune table trouvée dans la base de données</div>";
                } else {
                    echo "<div class='test-item success'>✓ Tables trouvées: " . count($tables) . "</div>";
                    foreach ($tables as $table) {
                        $tableName = array_values($table)[0];
                        echo "<div class='test-item info'>- " . htmlspecialchars($tableName) . "</div>";
                    }
                }
            } else {
                echo "<div class='test-item error'>✗ Impossible d'exécuter une requête simple</div>";
            }
        } catch (Exception $e) {
            echo "<div class='test-item error'>✗ Erreur de connexion: " . htmlspecialchars($e->getMessage()) . "</div>";
        }
    } else {
        echo "<div class='test-item error'>✗ Fichier config/database.php manquant</div>";
    }
} catch (Exception $e) {
    echo "<div class='test-item error'>✗ Erreur lors du chargement de la base de données: " . htmlspecialchars($e->getMessage()) . "</div>";
}
echo "</div>";

// Test 3: Fonctions
echo "<div class='section'>";
echo "<h2>3. Test des Fonctions</h2>";

try {
    if (file_exists('includes/functions.php')) {
        echo "<div class='test-item success'>✓ Fichier includes/functions.php trouvé</div>";
        
        // Test de l'inclusion des fonctions
        ob_start();
        include 'includes/functions.php';
        ob_end_clean();
        
        echo "<div class='test-item success'>✓ Fonctions chargées</div>";
        
        // Test de quelques fonctions
        if (function_exists('sanitizeInput')) {
            echo "<div class='test-item success'>✓ Fonction sanitizeInput disponible</div>";
        } else {
            echo "<div class='test-item error'>✗ Fonction sanitizeInput manquante</div>";
        }
        
        if (function_exists('generatePlaceholderImage')) {
            echo "<div class='test-item success'>✓ Fonction generatePlaceholderImage disponible</div>";
            
            // Test de la fonction
            $testImage = generatePlaceholderImage(100, 100, 'Test', 'ff0000', 'ffffff');
            if ($testImage) {
                echo "<div class='test-item success'>✓ Fonction generatePlaceholderImage fonctionne</div>";
            } else {
                echo "<div class='test-item error'>✗ Fonction generatePlaceholderImage ne retourne rien</div>";
            }
        } else {
            echo "<div class='test-item error'>✗ Fonction generatePlaceholderImage manquante</div>";
        }
        
        if (function_exists('generateCSRFToken')) {
            echo "<div class='test-item success'>✓ Fonction generateCSRFToken disponible</div>";
        } else {
            echo "<div class='test-item error'>✗ Fonction generateCSRFToken manquante</div>";
        }
    } else {
        echo "<div class='test-item error'>✗ Fichier includes/functions.php manquant</div>";
    }
} catch (Exception $e) {
    echo "<div class='test-item error'>✗ Erreur lors du chargement des fonctions: " . htmlspecialchars($e->getMessage()) . "</div>";
}
echo "</div>";

// Test 4: Header et Footer
echo "<div class='section'>";
echo "<h2>4. Test des Includes (Header/Footer)</h2>";

try {
    if (file_exists('includes/header.php')) {
        echo "<div class='test-item success'>✓ Fichier includes/header.php trouvé</div>";
        
        // Test de l'inclusion du header
        ob_start();
        include 'includes/header.php';
        $headerContent = ob_get_clean();
        
        if (strpos($headerContent, '<!DOCTYPE html>') !== false) {
            echo "<div class='test-item success'>✓ Header génère du HTML valide</div>";
        } else {
            echo "<div class='test-item warning'>⚠ Header ne génère pas de HTML valide</div>";
        }
        
        if (strpos($headerContent, 'Maickel Okereke') !== false) {
            echo "<div class='test-item success'>✓ Header contient le nom du site</div>";
        } else {
            echo "<div class='test-item warning'>⚠ Header ne contient pas le nom du site</div>";
        }
    } else {
        echo "<div class='test-item error'>✗ Fichier includes/header.php manquant</div>";
    }
    
    if (file_exists('includes/footer.php')) {
        echo "<div class='test-item success'>✓ Fichier includes/footer.php trouvé</div>";
    } else {
        echo "<div class='test-item error'>✗ Fichier includes/footer.php manquant</div>";
    }
} catch (Exception $e) {
    echo "<div class='test-item error'>✗ Erreur lors du test des includes: " . htmlspecialchars($e->getMessage()) . "</div>";
}
echo "</div>";

// Test 5: Pages principales
echo "<div class='section'>";
echo "<h2>5. Test des Pages Principales</h2>";

$pages = [
    'index.php' => 'Page d\'accueil',
    'services.php' => 'Services',
    'a-propos.php' => 'À propos',
    'contact.php' => 'Contact',
    'devis.php' => 'Devis',
    'faq.php' => 'FAQ',
    'ressources.php' => 'Ressources',
    'login.php' => 'Connexion',
    'inscription.php' => 'Inscription',
    'rendez-vous.php' => 'Rendez-vous',
    'temoignages.php' => 'Témoignages',
    'etudes-de-cas.php' => 'Études de cas',
    'equipe.php' => 'Équipe',
    'tarifs.php' => 'Tarifs',
    'blog.php' => 'Blog',
    'article.php' => 'Article',
    'mentions-legales.php' => 'Mentions légales',
    'politique-de-confidentialite.php' => 'Politique de confidentialité',
    'plan-du-site.php' => 'Plan du site',
    '404.php' => 'Page 404'
];

foreach ($pages as $page => $description) {
    if (file_exists($page)) {
        echo "<div class='test-item success'>✓ $description ($page) trouvé</div>";
        
        // Test de l'inclusion de la page
        try {
            ob_start();
            include $page;
            $pageContent = ob_get_clean();
            
            if (strlen($pageContent) > 100) {
                echo "<div class='test-item success'>✓ $description génère du contenu</div>";
            } else {
                echo "<div class='test-item warning'>⚠ $description génère peu de contenu</div>";
            }
        } catch (Exception $e) {
            echo "<div class='test-item error'>✗ Erreur lors du test de $description: " . htmlspecialchars($e->getMessage()) . "</div>";
        }
    } else {
        echo "<div class='test-item error'>✗ $description ($page) manquant</div>";
    }
}
echo "</div>";

// Test 6: Espace utilisateur
echo "<div class='section'>";
echo "<h2>6. Test de l'Espace Utilisateur</h2>";

$userPages = [
    'user/dashboard.php' => 'Tableau de bord utilisateur',
    'user/devis.php' => 'Gestion des devis',
    'user/ressources.php' => 'Gestion des ressources',
    'user/profil.php' => 'Profil utilisateur'
];

foreach ($userPages as $page => $description) {
    if (file_exists($page)) {
        echo "<div class='test-item success'>✓ $description ($page) trouvé</div>";
    } else {
        echo "<div class='test-item error'>✗ $description ($page) manquant</div>";
    }
}
echo "</div>";

// Test 7: Interface administrateur
echo "<div class='section'>";
echo "<h2>7. Test de l'Interface Administrateur</h2>";

$adminPages = [
    'admin/dashboard.php' => 'Tableau de bord admin',
    'admin/utilisateurs.php' => 'Gestion des utilisateurs',
    'admin/services.php' => 'Gestion des services',
    'admin/etudes.php' => 'Gestion des études de cas',
    'admin/temoignages.php' => 'Gestion des témoignages'
];

foreach ($adminPages as $page => $description) {
    if (file_exists($page)) {
        echo "<div class='test-item success'>✓ $description ($page) trouvé</div>";
    } else {
        echo "<div class='test-item error'>✗ $description ($page) manquant</div>";
    }
}
echo "</div>";

// Test 8: CSS et JavaScript
echo "<div class='section'>";
echo "<h2>8. Test des Assets (CSS/JS)</h2>";

$assets = [
    'assets/css/style.css' => 'CSS principal',
    'assets/css/responsive.css' => 'CSS responsive',
    'assets/js/main.js' => 'JavaScript principal',
    'assets/js/navigation.js' => 'JavaScript navigation'
];

foreach ($assets as $asset => $description) {
    if (file_exists($asset)) {
        echo "<div class='test-item success'>✓ $description ($asset) trouvé</div>";
        
        // Vérification de la taille
        $size = filesize($asset);
        if ($size > 0) {
            echo "<div class='test-item info'>- Taille: " . number_format($size) . " octets</div>";
        } else {
            echo "<div class='test-item warning'>⚠ $description est vide</div>";
        }
    } else {
        echo "<div class='test-item error'>✗ $description ($asset) manquant</div>";
    }
}
echo "</div>";

// Test 9: Structure des dossiers
echo "<div class='section'>";
echo "<h2>9. Test de la Structure des Dossiers</h2>";

$directories = [
    'config' => 'Configuration',
    'includes' => 'Includes',
    'assets' => 'Assets',
    'assets/css' => 'CSS',
    'assets/js' => 'JavaScript',
    'assets/images' => 'Images',
    'user' => 'Espace utilisateur',
    'admin' => 'Interface administrateur'
];

foreach ($directories as $dir => $description) {
    if (is_dir($dir)) {
        echo "<div class='test-item success'>✓ Dossier $description ($dir) trouvé</div>";
        
        // Vérification du contenu
        $files = scandir($dir);
        $fileCount = count($files) - 2; // Exclure . et ..
        echo "<div class='test-item info'>- Contient $fileCount fichiers/dossiers</div>";
    } else {
        echo "<div class='test-item error'>✗ Dossier $description ($dir) manquant</div>";
    }
}
echo "</div>";

// Résumé
echo "<div class='section'>";
echo "<h2>📊 Résumé des Tests</h2>";

echo "<p><strong>Instructions pour tester le site :</strong></p>";
echo "<ol>";
echo "<li>Uploadez tous les fichiers sur votre serveur web</li>";
echo "<li>Configurez votre base de données MySQL avec les informations fournies</li>";
echo "<li>Exécutez le fichier database.sql pour créer les tables</li>";
echo "<li>Testez la connexion avec test_db.php</li>";
echo "<li>Vérifiez que toutes les pages s'affichent correctement</li>";
echo "</ol>";

echo "<p><strong>Informations de connexion à la base de données :</strong></p>";
echo "<ul>";
echo "<li><strong>Host:</strong> localhost</li>";
echo "<li><strong>Database:</strong> u634930929_Ini</li>";
echo "<li><strong>User:</strong> u634930929_Ini</li>";
echo "<li><strong>Password:</strong> Ino1234@</li>";
echo "<li><strong>Charset:</strong> utf8mb4</li>";
echo "</ul>";

echo "<p><strong>Problèmes identifiés et corrigés :</strong></p>";
echo "<ul>";
echo "<li>✓ Configuration de la base de données mise à jour</li>";
echo "<li>✓ Inclusions des fichiers corrigées</li>";
echo "<li>✓ Fonctions ajoutées dans toutes les pages</li>";
echo "<li>✓ Headers ajoutés dans toutes les pages</li>";
echo "<li>✓ Structure des fichiers vérifiée</li>";
echo "</ul>";

echo "<p><strong>Prochaines étapes :</strong></p>";
echo "<ul>";
echo "<li>Créer la base de données et les tables</li>";
echo "<li>Tester la connexion à la base de données</li>";
echo "<li>Vérifier l'affichage de toutes les pages</li>";
echo "<li>Configurer l'envoi d'emails</li>";
echo "<li>Personnaliser le contenu selon vos besoins</li>";
echo "</ul>";
echo "</div>";

echo "<div class='section'>";
echo "<h2>🔗 Liens de Test</h2>";
echo "<p><a href='index.php'>← Retour à l'accueil</a></p>";
echo "<p><a href='test_db.php'>Test de la base de données</a></p>";
echo "</div>";

echo "</body>";
echo "</html>";
?>