DROP Table IF EXISTS annonce_option;
CREATE TABLE annonce_option
{
  `an_id` int (10) NOT NULL AUTO_INCREMENT COMMENT 'Identifiant / Clé primaire',
  `an_offre` char (1) NOT NULL COMMENT 'Type d''offre. Lettres A, L ou V.',
  `an_type` tinyint (3)  NOT NULL COMMENT 'Type de bien',
  `an_pieces` tinyint (3) DEFAULT NULL COMMENT 'Nombre de pièces (facultatif)',
  `an_ref` varchar (10) NOT NULL COMMENT 'Référence de l''annonce',
  `an_titre` varchar (200) NOT NULL COMMENT 'Titre',
  `an_description` mediumtext NOT NULL COMMENT 'Description',
  `an_local` varchar (100) NOT NULL,
  `an_surf_hab` smallint (6) DEFAULT NULL COMMENT 'Surface habitable (mètres carrés)',
  `an_surf_tot` int (11) NOT NULL COMMENT 'Surface totale/terrain (mètres carrés)',
  `an_prix` int (11) NOT NULL COMMENT 'Prix en euros',
  `an_diagnostic` char (1) NOT NULL COMMENT 'Lettre du diagnostic : A à G + V pour vierge ',
  `an_d_ajout` date NOT NULL COMMENT 'Date d''ajout',
  `an_d_modif` datetime DEFAULT NULL COMMENT 'Date de modification',
  PRIMARY KEY (an_id)
}