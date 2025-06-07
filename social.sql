CREATE TABLE `demandes_vacances` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL COMMENT 'اللقب (العامل)',
  `nom_original` varchar(100) DEFAULT NULL COMMENT 'اللقب الأصلي للمتنوعة',
  `prenom` varchar(100) NOT NULL COMMENT 'الاسم',
  `date_lieu_naissance` varchar(200) NOT NULL COMMENT 'تاريخ ومكان الإندياد',
  `adresse` text NOT NULL COMMENT 'العنوان الشخصي',
  `fonction` varchar(100) NOT NULL COMMENT 'الوظيفة',
  `lieu_travail` varchar(200) NOT NULL COMMENT 'مكان العمل',
  `telephone` varchar(20) NOT NULL COMMENT 'رقم الهاتف',
  `compte_bancaire` varchar(50) NOT NULL COMMENT 'رقم الحساب الجاري',
  `categorie` varchar(50) NOT NULL COMMENT 'الفئة',
  `periode_enseignement` varchar(100) NOT NULL COMMENT 'فترة التعليم',
  `destination` varchar(100) NOT NULL COMMENT 'الوجهة',
  `lieu_redaction` varchar(100) NOT NULL COMMENT 'حرر في',
  `date_redaction` date NOT NULL COMMENT 'تاريخ',
  `signature` varchar(100) NOT NULL COMMENT 'إمضاء المعني',
  `date_soumission` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Date de soumission',
  `statut` enum('en_attente','approuvee','rejetee') NOT NULL DEFAULT 'en_attente' COMMENT 'Statut de la demande',
  `notes_admin` text DEFAULT NULL COMMENT 'Notes administratives',
  PRIMARY KEY (`id`),
  KEY `idx_statut` (`statut`),
  KEY `idx_date_soumission` (`date_soumission`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Demandes de participation aux colonies de vacances';

CREATE TABLE `accompagnants_vacances` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `demande_id` int(11) NOT NULL,
  `numero` tinyint(1) NOT NULL COMMENT 'Numéro d''ordre (01, 02, 03)',
  `nom` varchar(100) NOT NULL COMMENT 'الاسم واللقب',
  `date_naissance` date DEFAULT NULL COMMENT 'تاريخ الإندياد',
  `lien_parente` varchar(50) DEFAULT NULL COMMENT 'صلة القرابة',
  `notes` text DEFAULT NULL COMMENT 'ملاحظات',
  PRIMARY KEY (`id`),
  KEY `fk_demande_id` (`demande_id`),
  CONSTRAINT `fk_accompagnants_demande` FOREIGN KEY (`demande_id`) REFERENCES `demandes_vacances` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `documents_vacances` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `demande_id` int(11) NOT NULL,
  `numero` tinyint(1) NOT NULL COMMENT 'Numéro d''ordre (01 à 06)',
  `nom_document` varchar(200) DEFAULT NULL COMMENT 'الوثائق المطلوبة',
  `recu` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'مستلمة',
  `accompagne` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'مرافقة',
  `notes` text DEFAULT NULL COMMENT 'ملاحظات',
  PRIMARY KEY (`id`),
  KEY `fk_demande_id` (`demande_id`),
  CONSTRAINT `fk_documents_demande` FOREIGN KEY (`demande_id`) REFERENCES `demandes_vacances` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;