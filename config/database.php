<?php
/**
 * Configuration de la base de données
 * Site professionnel de Maickel Okereke
 */

// Informations de connexion à la base de données
define('DB_HOST', 'localhost');
define('DB_NAME', 'maickel_site');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_CHARSET', 'utf8mb4');

// Options PDO
define('DB_OPTIONS', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4 COLLATE utf8mb4_unicode_ci"
]);

/**
 * Classe Database pour la gestion de la connexion
 */
class Database {
    private static $instance = null;
    private $connection;
    
    private function __construct() {
        try {
            $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;
            $this->connection = new PDO($dsn, DB_USER, DB_PASS, DB_OPTIONS);
        } catch (PDOException $e) {
            error_log("Erreur de connexion à la base de données: " . $e->getMessage());
            throw new Exception("Impossible de se connecter à la base de données");
        }
    }
    
    /**
     * Obtenir l'instance unique de la base de données
     */
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    
    /**
     * Obtenir la connexion PDO
     */
    public function getConnection() {
        return $this->connection;
    }
    
    /**
     * Exécuter une requête préparée
     */
    public function query($sql, $params = []) {
        try {
            $stmt = $this->connection->prepare($sql);
            $stmt->execute($params);
            return $stmt;
        } catch (PDOException $e) {
            error_log("Erreur de requête: " . $e->getMessage());
            throw new Exception("Erreur lors de l'exécution de la requête");
        }
    }
    
    /**
     * Récupérer une seule ligne
     */
    public function fetchOne($sql, $params = []) {
        $stmt = $this->query($sql, $params);
        return $stmt->fetch();
    }
    
    /**
     * Récupérer toutes les lignes
     */
    public function fetchAll($sql, $params = []) {
        $stmt = $this->query($sql, $params);
        return $stmt->fetchAll();
    }
    
    /**
     * Insérer une ligne et retourner l'ID
     */
    public function insert($sql, $params = []) {
        $stmt = $this->query($sql, $params);
        return $this->connection->lastInsertId();
    }
    
    /**
     * Mettre à jour des données
     */
    public function update($sql, $params = []) {
        $stmt = $this->query($sql, $params);
        return $stmt->rowCount();
    }
    
    /**
     * Supprimer des données
     */
    public function delete($sql, $params = []) {
        $stmt = $this->query($sql, $params);
        return $stmt->rowCount();
    }
    
    /**
     * Commencer une transaction
     */
    public function beginTransaction() {
        return $this->connection->beginTransaction();
    }
    
    /**
     * Valider une transaction
     */
    public function commit() {
        return $this->connection->commit();
    }
    
    /**
     * Annuler une transaction
     */
    public function rollback() {
        return $this->connection->rollback();
    }
    
    /**
     * Vérifier si une transaction est active
     */
    public function inTransaction() {
        return $this->connection->inTransaction();
    }
    
    /**
     * Échapper une chaîne pour éviter l'injection SQL
     */
    public function escape($string) {
        return $this->connection->quote($string);
    }
    
    /**
     * Fermer la connexion
     */
    public function close() {
        $this->connection = null;
    }
}

/**
 * Fonction utilitaire pour obtenir une instance de la base de données
 */
function getDB() {
    return Database::getInstance();
}

/**
 * Fonction utilitaire pour exécuter une requête simple
 */
function dbQuery($sql, $params = []) {
    $db = getDB();
    return $db->query($sql, $params);
}

/**
 * Fonction utilitaire pour récupérer une ligne
 */
function dbFetchOne($sql, $params = []) {
    $db = getDB();
    return $db->fetchOne($sql, $params);
}

/**
 * Fonction utilitaire pour récupérer toutes les lignes
 */
function dbFetchAll($sql, $params = []) {
    $db = getDB();
    return $db->fetchAll($sql, $params);
}

/**
 * Fonction utilitaire pour insérer
 */
function dbInsert($sql, $params = []) {
    $db = getDB();
    return $db->insert($sql, $params);
}

/**
 * Fonction utilitaire pour mettre à jour
 */
function dbUpdate($sql, $params = []) {
    $db = getDB();
    return $db->update($sql, $params);
}

/**
 * Fonction utilitaire pour supprimer
 */
function dbDelete($sql, $params = []) {
    $db = getDB();
    return $db->delete($sql, $params);
}
?>