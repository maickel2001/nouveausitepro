<?php
/**
 * Fonctions utilitaires
 * Site professionnel de Maickel Okereke
 */

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../config/database.php';

/**
 * Sécurisation des entrées utilisateur
 */
function sanitizeInput($input, $type = 'string') {
    if (is_array($input)) {
        return array_map('sanitizeInput', $input);
    }
    
    $input = trim($input);
    
    switch ($type) {
        case 'email':
            return filter_var($input, FILTER_SANITIZE_EMAIL);
        case 'url':
            return filter_var($input, FILTER_SANITIZE_URL);
        case 'int':
            return (int) $input;
        case 'float':
            return (float) $input;
        case 'html':
            return strip_tags($input, '<p><br><strong><em><ul><ol><li><h1><h2><h3><h4><h5><h6>');
        case 'text':
            return strip_tags($input);
        default:
            return htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
    }
}

/**
 * Validation des entrées
 */
function validateInput($input, $rules) {
    $errors = [];
    
    foreach ($rules as $field => $rule) {
        $value = $input[$field] ?? '';
        
        if (isset($rule['required']) && $rule['required'] && empty($value)) {
            $errors[$field] = 'Ce champ est obligatoire.';
            continue;
        }
        
        if (!empty($value)) {
            if (isset($rule['min_length']) && strlen($value) < $rule['min_length']) {
                $errors[$field] = 'Minimum ' . $rule['min_length'] . ' caractères requis.';
            }
            
            if (isset($rule['max_length']) && strlen($value) > $rule['max_length']) {
                $errors[$field] = 'Maximum ' . $rule['max_length'] . ' caractères autorisés.';
            }
            
            if (isset($rule['pattern']) && !preg_match($rule['pattern'], $value)) {
                $errors[$field] = 'Format invalide.';
            }
            
            if (isset($rule['type'])) {
                switch ($rule['type']) {
                    case 'email':
                        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                            $errors[$field] = 'Adresse email invalide.';
                        }
                        break;
                    case 'phone':
                        if (!preg_match('/^[\+]?[0-9\s\-\(\)]{10,}$/', $value)) {
                            $errors[$field] = 'Numéro de téléphone invalide.';
                        }
                        break;
                }
            }
        }
    }
    
    return $errors;
}

/**
 * Génération de token CSRF
 */
function generateCSRFToken() {
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

/**
 * Vérification du token CSRF
 */
function verifyCSRFToken($token) {
    return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
}

/**
 * Hashage sécurisé des mots de passe
 */
function hashPassword($password) {
    return password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);
}

/**
 * Vérification des mots de passe
 */
function verifyPassword($password, $hash) {
    return password_verify($password, $hash);
}

/**
 * Génération de slug URL
 */
function generateSlug($string, $separator = '-') {
    $string = strtolower($string);
    $string = preg_replace('/[^a-z0-9\s-]/', '', $string);
    $string = preg_replace('/[\s-]+/', $separator, $string);
    $string = trim($string, $separator);
    return $string;
}

/**
 * Formatage des dates
 */
function formatDate($date, $format = 'd/m/Y') {
    if (is_string($date)) {
        $date = new DateTime($date);
    }
    
    return $date->format($format);
}

/**
 * Formatage des nombres
 */
function formatNumber($number, $decimals = 0) {
    return number_format($number, $decimals, ',', ' ');
}

/**
 * Formatage des prix
 */
function formatPrice($price, $currency = 'EUR') {
    $symbol = $currency === 'EUR' ? '€' : $currency;
    return formatNumber($price, 2) . ' ' . $symbol;
}

/**
 * Troncature de texte
 */
function truncateText($text, $length = 100, $suffix = '...') {
    if (strlen($text) <= $length) {
        return $text;
    }
    
    return substr($text, 0, $length) . $suffix;
}

/**
 * Génération d'image placeholder
 */
function generatePlaceholderImage($width = 400, $height = 300, $text = 'Image', $bgColor = '2563eb', $textColor = 'ffffff') {
    $url = "https://via.placeholder.com/{$width}x{$height}/{$bgColor}/{$textColor}?text=" . urlencode($text);
    return $url;
}

/**
 * Upload de fichier sécurisé
 */
function uploadFile($file, $destination, $allowedExtensions = null, $maxSize = null) {
    if (!$allowedExtensions) {
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'pdf', 'doc', 'docx', 'xls', 'xlsx'];
    }
    
    if (!$maxSize) {
        $maxSize = MAX_FILE_SIZE;
    }
    
    // Vérifications de sécurité
    if (!isset($file['tmp_name']) || !is_uploaded_file($file['tmp_name'])) {
        throw new Exception('Fichier invalide.');
    }
    
    if ($file['size'] > $maxSize) {
        throw new Exception('Fichier trop volumineux.');
    }
    
    $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    if (!in_array($extension, $allowedExtensions)) {
        throw new Exception('Type de fichier non autorisé.');
    }
    
    // Génération d'un nom de fichier unique
    $filename = uniqid() . '.' . $extension;
    $filepath = $destination . '/' . $filename;
    
    // Création du dossier de destination si nécessaire
    if (!is_dir($destination)) {
        mkdir($destination, 0755, true);
    }
    
    // Déplacement du fichier
    if (!move_uploaded_file($file['tmp_name'], $filepath)) {
        throw new Exception('Erreur lors de l\'upload du fichier.');
    }
    
    return $filename;
}

/**
 * Envoi d'email
 */
function sendEmail($to, $subject, $message, $from = null) {
    if (!$from) {
        $from = SITE_EMAIL;
    }
    
    $headers = [
        'From: ' . $from,
        'Content-Type: text/html; charset=UTF-8',
        'X-Mailer: PHP/' . phpversion()
    ];
    
    return mail($to, $subject, $message, implode("\r\n", $headers));
}

/**
 * Génération de mot de passe aléatoire
 */
function generateRandomPassword($length = 12) {
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()';
    $password = '';
    
    for ($i = 0; $i < $length; $i++) {
        $password .= $chars[random_int(0, strlen($chars) - 1)];
    }
    
    return $password;
}

/**
 * Pagination
 */
function paginate($totalItems, $itemsPerPage, $currentPage, $baseUrl) {
    $totalPages = ceil($totalItems / $itemsPerPage);
    $currentPage = max(1, min($currentPage, $totalPages));
    
    $pagination = [
        'current_page' => $currentPage,
        'total_pages' => $totalPages,
        'total_items' => $totalItems,
        'items_per_page' => $itemsPerPage,
        'offset' => ($currentPage - 1) * $itemsPerPage,
        'pages' => []
    ];
    
    // Génération des liens de pagination
    $start = max(1, $currentPage - 2);
    $end = min($totalPages, $start + 4);
    
    for ($i = $start; $i <= $end; $i++) {
        $pagination['pages'][] = [
            'number' => $i,
            'url' => $baseUrl . '?page=' . $i,
            'active' => $i === $currentPage
        ];
    }
    
    return $pagination;
}

/**
 * Vérification si l'utilisateur est connecté
 */
function isLoggedIn() {
    return isset($_SESSION['user_id']) && !empty($_SESSION['user_id']);
}

/**
 * Vérification si l'utilisateur est admin
 */
function isAdmin() {
    return isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin';
}

/**
 * Redirection sécurisée
 */
function redirect($url, $statusCode = 302) {
    if (!headers_sent()) {
        http_response_code($statusCode);
        header('Location: ' . $url);
        exit;
    } else {
        echo '<script>window.location.href = "' . $url . '";</script>';
        exit;
    }
}

/**
 * Affichage d'erreur et arrêt
 */
function showError($message, $title = 'Erreur') {
    http_response_code(500);
    echo '<h1>' . $title . '</h1>';
    echo '<p>' . $message . '</p>';
    exit;
}

/**
 * Affichage de page 404
 */
function show404() {
    http_response_code(404);
    include '404.php';
    exit;
}
?>