-- =====================================================
-- Schéma de base de données
-- Site professionnel de Maickel Okereke
-- =====================================================

-- Création de la base de données
CREATE DATABASE IF NOT EXISTS `maickel_site` 
CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE `maickel_site`;

-- =====================================================
-- TABLE: users (Utilisateurs)
-- =====================================================
CREATE TABLE `users` (
    `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `nom` VARCHAR(100) NOT NULL,
    `email` VARCHAR(255) NOT NULL UNIQUE,
    `mot_de_passe_hash` VARCHAR(255) NOT NULL,
    `role` ENUM('admin', 'user', 'staff') NOT NULL DEFAULT 'user',
    `telephone` VARCHAR(20) NULL,
    `societe` VARCHAR(100) NULL,
    `adresse` TEXT NULL,
    `date_creation` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `derniere_connexion` TIMESTAMP NULL,
    `statut` ENUM('actif', 'inactif', 'banni') NOT NULL DEFAULT 'actif',
    `email_verifie` BOOLEAN NOT NULL DEFAULT FALSE,
    `token_verification` VARCHAR(255) NULL,
    `date_verification` TIMESTAMP NULL,
    PRIMARY KEY (`id`),
    INDEX `idx_email` (`email`),
    INDEX `idx_role` (`role`),
    INDEX `idx_statut` (`statut`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =====================================================
-- TABLE: services (Services proposés)
-- =====================================================
CREATE TABLE `services` (
    `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `titre` VARCHAR(200) NOT NULL,
    `slug` VARCHAR(255) NOT NULL UNIQUE,
    `description_courte` TEXT NOT NULL,
    `description_complete` LONGTEXT NOT NULL,
    `prix_indicatif` DECIMAL(10,2) NULL,
    `devise` VARCHAR(3) NOT NULL DEFAULT 'EUR',
    `image` VARCHAR(255) NULL,
    `icone` VARCHAR(100) NULL,
    `categorie` VARCHAR(100) NULL,
    `ordre_affichage` INT(11) NOT NULL DEFAULT 0,
    `statut` ENUM('actif', 'inactif') NOT NULL DEFAULT 'actif',
    `date_creation` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `date_modification` TIMESTAMP NULL ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    INDEX `idx_slug` (`slug`),
    INDEX `idx_categorie` (`categorie`),
    INDEX `idx_statut` (`statut`),
    INDEX `idx_ordre` (`ordre_affichage`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =====================================================
-- TABLE: etudes_de_cas (Études de cas)
-- =====================================================
CREATE TABLE `etudes_de_cas` (
    `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `titre` VARCHAR(200) NOT NULL,
    `slug` VARCHAR(255) NOT NULL UNIQUE,
    `contexte` TEXT NOT NULL,
    `probleme` TEXT NOT NULL,
    `solution` LONGTEXT NOT NULL,
    `resultats` TEXT NOT NULL,
    `service_id` INT(11) UNSIGNED NULL,
    `image` VARCHAR(255) NULL,
    `client` VARCHAR(100) NULL,
    `secteur` VARCHAR(100) NULL,
    `duree_projet` VARCHAR(50) NULL,
    `budget` VARCHAR(100) NULL,
    `statut` ENUM('actif', 'inactif') NOT NULL DEFAULT 'actif',
    `date_creation` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `date_modification` TIMESTAMP NULL ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`service_id`) REFERENCES `services`(`id`) ON DELETE SET NULL,
    INDEX `idx_slug` (`slug`),
    INDEX `idx_service` (`service_id`),
    INDEX `idx_statut` (`statut`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =====================================================
-- TABLE: temoignages (Témoignages clients)
-- =====================================================
CREATE TABLE `temoignages` (
    `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `auteur` VARCHAR(100) NOT NULL,
    `role` VARCHAR(100) NOT NULL,
    `societe` VARCHAR(100) NOT NULL,
    `citation` TEXT NOT NULL,
    `photo` VARCHAR(255) NULL,
    `note` TINYINT(1) UNSIGNED NULL CHECK (`note` BETWEEN 1 AND 5),
    `service_id` INT(11) UNSIGNED NULL,
    `statut` ENUM('actif', 'inactif') NOT NULL DEFAULT 'actif',
    `ordre_affichage` INT(11) NOT NULL DEFAULT 0,
    `date_creation` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `date_modification` TIMESTAMP NULL ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`service_id`) REFERENCES `services`(`id`) ON DELETE SET NULL,
    INDEX `idx_service` (`service_id`),
    INDEX `idx_statut` (`statut`),
    INDEX `idx_ordre` (`ordre_affichage`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =====================================================
-- TABLE: articles (Blog)
-- =====================================================
CREATE TABLE `articles` (
    `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `titre` VARCHAR(200) NOT NULL,
    `slug` VARCHAR(255) NOT NULL UNIQUE,
    `contenu` LONGTEXT NOT NULL,
    `extrait` TEXT NOT NULL,
    `categorie` VARCHAR(100) NULL,
    `auteur_id` INT(11) UNSIGNED NOT NULL,
    `image` VARCHAR(255) NULL,
    `mots_cles` VARCHAR(500) NULL,
    `statut` ENUM('brouillon', 'publie', 'archive') NOT NULL DEFAULT 'brouillon',
    `date_publication` TIMESTAMP NULL,
    `date_creation` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `date_modification` TIMESTAMP NULL ON UPDATE CURRENT_TIMESTAMP,
    `vues` INT(11) UNSIGNED NOT NULL DEFAULT 0,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`auteur_id`) REFERENCES `users`(`id`) ON DELETE CASCADE,
    INDEX `idx_slug` (`slug`),
    INDEX `idx_categorie` (`categorie`),
    INDEX `idx_auteur` (`auteur_id`),
    INDEX `idx_statut` (`statut`),
    INDEX `idx_date_pub` (`date_publication`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =====================================================
-- TABLE: faq (Questions fréquentes)
-- =====================================================
CREATE TABLE `faq` (
    `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `question` TEXT NOT NULL,
    `reponse` LONGTEXT NOT NULL,
    `categorie` VARCHAR(100) NULL,
    `ordre_affichage` INT(11) NOT NULL DEFAULT 0,
    `statut` ENUM('actif', 'inactif') NOT NULL DEFAULT 'actif',
    `date_creation` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `date_modification` TIMESTAMP NULL ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    INDEX `idx_categorie` (`categorie`),
    INDEX `idx_statut` (`statut`),
    INDEX `idx_ordre` (`ordre_affichage`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =====================================================
-- TABLE: ressources (Ressources téléchargeables)
-- =====================================================
CREATE TABLE `ressources` (
    `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `titre` VARCHAR(200) NOT NULL,
    `description` TEXT NOT NULL,
    `type` ENUM('pdf', 'excel', 'word', 'video', 'guide') NOT NULL,
    `fichier` VARCHAR(255) NOT NULL,
    `image` VARCHAR(255) NULL,
    `acces` ENUM('public', 'user', 'admin') NOT NULL DEFAULT 'public',
    `taille_fichier` INT(11) UNSIGNED NULL,
    `telechargements` INT(11) UNSIGNED NOT NULL DEFAULT 0,
    `categorie` VARCHAR(100) NULL,
    `statut` ENUM('actif', 'inactif') NOT NULL DEFAULT 'actif',
    `date_creation` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `date_modification` TIMESTAMP NULL ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    INDEX `idx_type` (`type`),
    INDEX `idx_acces` (`acces`),
    INDEX `idx_categorie` (`categorie`),
    INDEX `idx_statut` (`statut`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =====================================================
-- TABLE: devis (Demandes de devis)
-- =====================================================
CREATE TABLE `devis` (
    `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `user_id` INT(11) UNSIGNED NULL,
    `nom` VARCHAR(100) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `telephone` VARCHAR(20) NULL,
    `societe` VARCHAR(100) NULL,
    `besoin` TEXT NOT NULL,
    `volume` VARCHAR(100) NULL,
    `details` LONGTEXT NULL,
    `fichier` VARCHAR(255) NULL,
    `statut` ENUM('nouveau', 'en_cours', 'devis_envoye', 'accepte', 'refuse', 'annule') NOT NULL DEFAULT 'nouveau',
    `montant_propose` DECIMAL(10,2) NULL,
    `devise` VARCHAR(3) NOT NULL DEFAULT 'EUR',
    `commentaires_admin` TEXT NULL,
    `date_creation` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `date_modification` TIMESTAMP NULL ON UPDATE CURRENT_TIMESTAMP,
    `date_reponse` TIMESTAMP NULL,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE SET NULL,
    INDEX `idx_user` (`user_id`),
    INDEX `idx_email` (`email`),
    INDEX `idx_statut` (`statut`),
    INDEX `idx_date_creation` (`date_creation`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =====================================================
-- TABLE: rendez_vous (Rendez-vous)
-- =====================================================
CREATE TABLE `rendez_vous` (
    `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `user_id` INT(11) UNSIGNED NULL,
    `nom` VARCHAR(100) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `telephone` VARCHAR(20) NULL,
    `date` DATE NOT NULL,
    `heure` TIME NOT NULL,
    `duree` INT(11) NOT NULL DEFAULT 60 COMMENT 'Durée en minutes',
    `sujet` VARCHAR(200) NOT NULL,
    `description` TEXT NULL,
    `type` ENUM('telephone', 'visio', 'presentiel') NOT NULL DEFAULT 'visio',
    `statut` ENUM('demande', 'confirme', 'annule', 'termine') NOT NULL DEFAULT 'demande',
    `commentaires_admin` TEXT NULL,
    `date_creation` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `date_modification` TIMESTAMP NULL ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE SET NULL,
    INDEX `idx_user` (`user_id`),
    INDEX `idx_date` (`date`),
    INDEX `idx_statut` (`statut`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =====================================================
-- TABLE: contacts (Messages de contact)
-- =====================================================
CREATE TABLE `contacts` (
    `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `nom` VARCHAR(100) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `telephone` VARCHAR(20) NULL,
    `sujet` VARCHAR(200) NOT NULL,
    `message` TEXT NOT NULL,
    `ip_address` VARCHAR(45) NULL,
    `user_agent` TEXT NULL,
    `statut` ENUM('nouveau', 'lu', 'repondu', 'archive') NOT NULL DEFAULT 'nouveau',
    `date_creation` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `date_modification` TIMESTAMP NULL ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    INDEX `idx_email` (`email`),
    INDEX `idx_statut` (`statut`),
    INDEX `idx_date_creation` (`date_creation`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =====================================================
-- TABLE: telechargements (Suivi des téléchargements)
-- =====================================================
CREATE TABLE `telechargements` (
    `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `user_id` INT(11) UNSIGNED NULL,
    `ressource_id` INT(11) UNSIGNED NOT NULL,
    `ip_address` VARCHAR(45) NULL,
    `user_agent` TEXT NULL,
    `date_telechargement` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE SET NULL,
    FOREIGN KEY (`ressource_id`) REFERENCES `ressources`(`id`) ON DELETE CASCADE,
    INDEX `idx_user` (`user_id`),
    INDEX `idx_ressource` (`ressource_id`),
    INDEX `idx_date` (`date_telechargement`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =====================================================
-- TABLE: sessions (Sessions utilisateurs)
-- =====================================================
CREATE TABLE `sessions` (
    `id` VARCHAR(128) NOT NULL,
    `user_id` INT(11) UNSIGNED NULL,
    `ip_address` VARCHAR(45) NULL,
    `user_agent` TEXT NULL,
    `data` LONGTEXT NOT NULL,
    `date_creation` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `date_modification` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE CASCADE,
    INDEX `idx_user` (`user_id`),
    INDEX `idx_date_modification` (`date_modification`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =====================================================
-- TABLE: logs (Journal des activités)
-- =====================================================
CREATE TABLE `logs` (
    `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `user_id` INT(11) UNSIGNED NULL,
    `action` VARCHAR(100) NOT NULL,
    `table_name` VARCHAR(100) NULL,
    `record_id` INT(11) UNSIGNED NULL,
    `details` JSON NULL,
    `ip_address` VARCHAR(45) NULL,
    `user_agent` TEXT NULL,
    `date_creation` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE SET NULL,
    INDEX `idx_user` (`user_id`),
    INDEX `idx_action` (`action`),
    INDEX `idx_date` (`date_creation`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =====================================================
-- INSERTION DES DONNÉES INITIALES
-- =====================================================

-- Utilisateur administrateur par défaut
INSERT INTO `users` (`nom`, `email`, `mot_de_passe_hash`, `role`, `statut`, `email_verifie`) VALUES
('Maickel Okereke', 'admin@maickel-okereke.com', '$2y$12$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin', 'actif', TRUE);

-- Services par défaut
INSERT INTO `services` (`titre`, `slug`, `description_courte`, `description_complete`, `prix_indicatif`, `icone`, `categorie`, `ordre_affichage`) VALUES
('Comptabilité générale', 'comptabilite-generale', 'Gestion complète de votre comptabilité', 'Service complet de comptabilité générale incluant la saisie des écritures, la tenue des livres comptables, l\'établissement des comptes annuels et la déclaration fiscale.', 150.00, 'calculator', 'Comptabilité', 1),
('Développement web', 'developpement-web', 'Création de sites web professionnels', 'Développement de sites web sur mesure, applications web et solutions e-commerce adaptées aux besoins de votre entreprise.', 2500.00, 'code', 'Développement', 2),
('Conseil fiscal', 'conseil-fiscal', 'Optimisation fiscale et conseils', 'Accompagnement personnalisé pour optimiser votre situation fiscale et respecter vos obligations légales.', 200.00, 'chart-line', 'Conseil', 3);

-- FAQ par défaut
INSERT INTO `faq` (`question`, `reponse`, `categorie`, `ordre_affichage`) VALUES
('Quels sont vos tarifs ?', 'Nos tarifs varient selon la complexité de votre projet et vos besoins spécifiques. Contactez-nous pour un devis personnalisé.', 'Tarifs', 1),
('Proposez-vous un accompagnement à distance ?', 'Oui, nous proposons un accompagnement complet à distance via visioconférence et outils collaboratifs.', 'Services', 2),
('Quels documents dois-je fournir ?', 'Nous vous demandons généralement vos derniers bilans, déclarations fiscales et documents d\'identification de l\'entreprise.', 'Démarches', 3);

-- Témoignages par défaut
INSERT INTO `temoignages` (`auteur`, `role`, `societe`, `citation`, `note`, `ordre_affichage`) VALUES
('Marie Dubois', 'Dirigeante', 'TechStart SARL', 'Maickel a transformé notre comptabilité et nous a fait gagner un temps précieux. Très professionnel et réactif !', 5, 1),
('Pierre Martin', 'Gérant', 'Boulangerie du Centre', 'Un expert-comptable qui comprend vraiment les enjeux des petites entreprises. Je recommande vivement !', 5, 2),
('Sophie Bernard', 'Fondatrice', 'GreenEco', 'Maickel nous a aidés à créer un site web parfaitement adapté à nos besoins. Résultat au-delà de nos attentes !', 5, 3);

-- Ressources par défaut
INSERT INTO `ressources` (`titre`, `description`, `type`, `fichier`, `acces`, `categorie`) VALUES
('Guide de création d\'entreprise', 'Guide complet pour créer votre entreprise en 2025', 'pdf', 'guide-creation-entreprise.pdf', 'public', 'Guides'),
('Modèle de business plan', 'Template Excel pour votre business plan', 'excel', 'modele-business-plan.xlsx', 'user', 'Templates'),
('Checklist comptable mensuelle', 'Liste de contrôle pour votre comptabilité mensuelle', 'pdf', 'checklist-comptable.pdf', 'user', 'Checklists');

-- =====================================================
-- INDEX ET OPTIMISATIONS
-- =====================================================

-- Index composites pour améliorer les performances
CREATE INDEX `idx_articles_cat_stat` ON `articles` (`categorie`, `statut`);
CREATE INDEX `idx_devis_stat_date` ON `devis` (`statut`, `date_creation`);
CREATE INDEX `idx_rdv_date_stat` ON `rendez_vous` (`date`, `statut`);

-- =====================================================
-- VUES UTILES
-- =====================================================

-- Vue des statistiques générales
CREATE VIEW `v_stats_generales` AS
SELECT 
    (SELECT COUNT(*) FROM users WHERE role = 'user' AND statut = 'actif') as total_clients,
    (SELECT COUNT(*) FROM devis WHERE statut = 'nouveau') as devis_en_attente,
    (SELECT COUNT(*) FROM articles WHERE statut = 'publie') as total_articles,
    (SELECT COUNT(*) FROM ressources WHERE statut = 'actif') as total_ressources;

-- Vue des derniers devis
CREATE VIEW `v_derniers_devis` AS
SELECT 
    d.id, d.nom, d.email, d.besoin, d.statut, d.date_creation,
    u.nom as nom_utilisateur
FROM devis d
LEFT JOIN users u ON d.user_id = u.id
ORDER BY d.date_creation DESC;

-- =====================================================
-- TRIGGERS
-- =====================================================

-- Mise à jour automatique de la date de modification
DELIMITER //
CREATE TRIGGER `tr_users_update` BEFORE UPDATE ON `users`
FOR EACH ROW
BEGIN
    SET NEW.date_modification = CURRENT_TIMESTAMP;
END//

CREATE TRIGGER `tr_services_update` BEFORE UPDATE ON `services`
FOR EACH ROW
BEGIN
    SET NEW.date_modification = CURRENT_TIMESTAMP;
END//

CREATE TRIGGER `tr_articles_update` BEFORE UPDATE ON `articles`
FOR EACH ROW
BEGIN
    SET NEW.date_modification = CURRENT_TIMESTAMP;
END//
DELIMITER ;

-- =====================================================
-- PROCÉDURES STOCKÉES
-- =====================================================

-- Procédure pour nettoyer les sessions expirées
DELIMITER //
CREATE PROCEDURE `sp_nettoyer_sessions`()
BEGIN
    DELETE FROM sessions 
    WHERE date_modification < DATE_SUB(NOW(), INTERVAL 24 HOUR);
END//
DELIMITER ;

-- Procédure pour obtenir les statistiques d'un utilisateur
DELIMITER //
CREATE PROCEDURE `sp_stats_utilisateur`(IN p_user_id INT)
BEGIN
    SELECT 
        (SELECT COUNT(*) FROM devis WHERE user_id = p_user_id) as total_devis,
        (SELECT COUNT(*) FROM telechargements WHERE user_id = p_user_id) as total_telechargements,
        (SELECT COUNT(*) FROM rendez_vous WHERE user_id = p_user_id) as total_rdv;
END//
DELIMITER ;

-- =====================================================
-- FIN DU SCHÉMA
-- =====================================================