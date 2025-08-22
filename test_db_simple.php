<?php
/**
 * Test simple de la base de données
 * Vérification de la connexion sans erreur de constante
 */

// Affichage des erreurs pour le debug
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<h1>Test de connexion à la base de données</h1>";

try {
    // Test 1: Chargement de la configuration
    echo "<h2>1. Test de la configuration</h2>";
    
    if (file_exists('config/config.php')) {
        echo "<p style='color: green;'>✓ Fichier config/config.php trouvé</p>";
        
        // Inclusion de la configuration
        require_once 'config/config.php';
        
        echo "<p style='color: green;'>✓ Configuration chargée</p>";
        echo "<p>Host: " . DB_HOST . "</p>";
        echo "<p>Database: " . DB_NAME . "</p>";
        echo "<p>User: " . DB_USER . "</p>";
        echo "<p>Charset: " . DB_CHARSET . "</p>";
    } else {
        echo "<p style='color: red;'>✗ Fichier config/config.php manquant</p>";
        exit;
    }
    
    // Test 2: Chargement de la classe Database
    echo "<h2>2. Test de la classe Database</h2>";
    
    if (file_exists('config/database.php')) {
        echo "<p style='color: green;'>✓ Fichier config/database.php trouvé</p>";
        
        // Inclusion de la classe Database
        require_once 'config/database.php';
        
        echo "<p style='color: green;'>✓ Classe Database chargée</p>";
    } else {
        echo "<p style='color: red;'>✗ Fichier config/database.php manquant</p>";
        exit;
    }
    
    // Test 3: Test de connexion
    echo "<h2>3. Test de connexion</h2>";
    
    try {
        $db = Database::getInstance();
        echo "<p style='color: green;'>✓ Instance Database créée</p>";
        
        // Test de requête simple
        $result = $db->fetch("SELECT VERSION() as version");
        if ($result) {
            echo "<p style='color: green;'>✓ Connexion réussie !</p>";
            echo "<p>Version MySQL : " . htmlspecialchars($result['version']) . "</p>";
        } else {
            echo "<p style='color: orange;'>⚠ Connexion établie mais requête échouée</p>";
        }
    } catch (Exception $e) {
        echo "<p style='color: red;'>✗ Erreur de connexion : " . htmlspecialchars($e->getMessage()) . "</p>";
    }
    
} catch (Exception $e) {
    echo "<p style='color: red;'>✗ Erreur générale : " . htmlspecialchars($e->getMessage()) . "</p>";
}

echo "<h2>Test terminé</h2>";
echo "<p><a href='index.php'>← Retour à l'accueil</a></p>";
echo "<p><a href='test_complet.php'>Test complet du site</a></p>";
?>