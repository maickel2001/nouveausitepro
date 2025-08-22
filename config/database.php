<?php
/**
 * Configuration de la base de données
 * Mise à jour avec les nouvelles informations de connexion
 */

// Inclusion de la configuration pour accéder aux constantes de base de données
require_once __DIR__ . '/config.php';

/**
 * Classe Database pour la gestion des connexions PDO
 */
class Database {
    private static $instance = null;
    private $connection;
    
    private function __construct() {
        try {
            $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;
            $this->connection = new PDO($dsn, DB_USER, DB_PASS, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES " . DB_CHARSET
            ]);
        } catch (PDOException $e) {
            error_log("Erreur de connexion à la base de données: " . $e->getMessage());
            throw new Exception("Impossible de se connecter à la base de données");
        }
    }
    
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    
    public function getConnection() {
        return $this->connection;
    }
    
    public function query($sql, $params = []) {
        try {
            $stmt = $this->connection->prepare($sql);
            $stmt->execute($params);
            return $stmt;
        } catch (PDOException $e) {
            error_log("Erreur de requête SQL: " . $e->getMessage());
            throw new Exception("Erreur lors de l'exécution de la requête");
        }
    }
    
    public function fetch($sql, $params = []) {
        $stmt = $this->query($sql, $params);
        return $stmt->fetch();
    }
    
    public function fetchAll($sql, $params = []) {
        $stmt = $this->query($sql, $params);
        return $stmt->fetchAll();
    }
    
    public function insert($table, $data) {
        $columns = implode(', ', array_keys($data));
        $placeholders = ':' . implode(', :', array_keys($data));
        
        $sql = "INSERT INTO {$table} ({$columns}) VALUES ({$placeholders})";
        $this->query($sql, $data);
        
        return $this->connection->lastInsertId();
    }
    
    public function update($table, $data, $where, $whereParams = []) {
        $setParts = [];
        foreach (array_keys($data) as $column) {
            $setParts[] = "{$column} = :{$column}";
        }
        $setClause = implode(', ', $setParts);
        
        $sql = "UPDATE {$table} SET {$setClause} WHERE {$where}";
        $params = array_merge($data, $whereParams);
        
        return $this->query($sql, $params)->rowCount();
    }
    
    public function delete($table, $where, $params = []) {
        $sql = "DELETE FROM {$table} WHERE {$where}";
        return $this->query($sql, $params)->rowCount();
    }
    
    public function beginTransaction() {
        return $this->connection->beginTransaction();
    }
    
    public function commit() {
        return $this->connection->commit();
    }
    
    public function rollback() {
        return $this->connection->rollback();
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
    return $db->fetch($sql, $params);
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
function dbInsert($table, $data) {
    $db = getDB();
    return $db->insert($table, $data);
}

/**
 * Fonction utilitaire pour mettre à jour
 */
function dbUpdate($table, $data, $where, $whereParams = []) {
    $db = getDB();
    return $db->update($table, $data, $where, $whereParams);
}

/**
 * Fonction utilitaire pour supprimer
 */
function dbDelete($table, $where, $params = []) {
    $db = getDB();
    return $db->delete($table, $where, $params);
}
?>