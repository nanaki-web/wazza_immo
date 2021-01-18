DROP DATABASE IF EXISTS wazaaimmo;

CREATE DATABASE wazaaimmo; 

USE wazaaimmo; 

CREATE TABLE photo (
  pho_id int(10) NOT NULL AUTO_INCREMENT,
  pho_nom varchar(100) NOT NULL,
  PRIMARY KEY (id)
) 

CREATE TABLE annonces (
  an_id int(10) NOT NULL AUTO_INCREMENT,
  an_offre char(1) NOT NULL,
  an_type tinyint(3) NOT NULL ,
  an_pieces tinyint(3),
  an_ref varchar(10) NOT NULL  ,
  an_titre varchar(200) NOT NULL  ,
  an_description mediumtext NOT NULL,
  an_local varchar(100) NOT NULL,
  an_surf_hab smallint(6) ,
  an_surf_tot int(11) NOT NULL ,
  an_prix int(11) NOT NULL ,
  an_diagnostic char(1) NOT NULL ,
  an_d_ajout date NOT NULL ,
  an_d_modif datetime,
  an_picture varchar(100),
  pho_id int(10),
  PRIMARY KEY (an_id),
  FOREIGN KEY(pho_id) REFERENCES photo(pho_id)
) 

CREATE TABLE options (
  opt_id smallint(5) NOT NULL AUTO_INCREMENT ,
  opt_libelle varchar(100) NOT NULL,
  PRIMARY KEY (opt_id)
) 

--
-- Déchargement des données de la table options
--

INSERT INTO options (opt_id, opt_libelle) VALUES
(1, 'Jardin'),
(2, 'Garage'),
(3, 'Parking'),
(4, 'Piscine'),
(5, 'Combles aménageables'),
(6, 'Cuisine ouverte'),
(7, 'Sans travaux'),
(8, 'Avec travaux'),
(9, 'Cave'),
(10, 'Plain-pied'),
(11, 'Ascenseur'),
(12, 'Terrasse/balcon'),
(13, 'Cheminée');

INSERT INTO annonces (an_id, an_offre, an_type, an_pieces, an_ref, an_titre, an_description, an_local, an_surf_hab, an_surf_tot, an_prix, an_diagnostic, an_d_ajout, an_d_modif, an_picture, pict_id) VALUES
(1, 'A', 1, 5, '20A100', '100 km de Paris, maison 85m2 avec jardin', 'Exclusivité : dans bourg tous commerces avec écoles, maison d\'environ 85m2 habitables, mitoyenne, offrant en rez-de-chaussée, une cuisine aménagée, un salon-séjour, un WC et une loggia et à l\'étage, 3 chambres dont 2 avec placard, salle de bains et WC séparé. 2 garages. Le tout sur une parcelle de 225m2. Chauffage individuel clim réversible, DPE : F. ', 'Somme (80), 1h00 de Paris', 85, 225, 197000, 'F', '2020-11-13', NULL, '1-1.jpg', 0),
(2, 'A', 1, 5, '20B30', '100 km de Paris, maison 85m2 avec jardin', 'Exclusivité : dans bourg tous commerces avec écoles, maison d\'environ 85m2 habitables, mitoyenne, offrant en rez-de-chaussée, une cuisine aménagée, un salon-séjour, un WC et une loggia et à l\'étage, 3 chambres dont 2 avec placard, salle de bains et WC séparé. 2 garages. Le tout sur une parcelle de 225m2. Chauffage individuel clim réversible, DPE : F. ', 'Somme (80), 1h00 de Paris', 85, 225, 197000, 'F', '2020-11-13', NULL, '2-1.jpg', 0),
(3, 'A', 1, 5, '50B30', '100 km de Paris, maison 85m2 avec jardin', 'Exclusivité : dans bourg tous commerces avec écoles, maison d\'environ 85m2 habitables, mitoyenne, offrant en rez-de-chaussée, une cuisine aménagée, un salon-séjour, un WC et une loggia et à l\'étage, 3 chambres dont 2 avec placard, salle de bains et WC séparé. 2 garages. Le tout sur une parcelle de 225m2. Chauffage individuel clim réversible, DPE : F. ', 'Somme (80), 1h00 de Paris', 85, 225, 197000, 'F', '2020-11-13', NULL, '3-1.jpg', 0),
(4, 'A', 1, 5, '20c800', '100 km de Paris, maison 85m2 avec jardin', 'Exclusivité : dans bourg tous commerces avec écoles, maison d\'environ 85m2 habitables, mitoyenne, offrant en rez-de-chaussée, une cuisine aménagée, un salon-séjour, un WC et une loggia et à l\'étage, 3 chambres dont 2 avec placard, salle de bains et WC séparé. 2 garages. Le tout sur une parcelle de 225m2. Chauffage individuel clim réversible, DPE : F. ', 'Somme (80), 1h00 de Paris', 85, 225, 197000, 'F', '2020-11-13', NULL, '4-1.jpg', 0),
(5, 'A', 1, 5, '50Z900', '100 km de Paris, maison 85m2 avec jardin', 'Exclusivité : dans bourg tous commerces avec écoles, maison d\'environ 85m2 habitables, mitoyenne, offrant en rez-de-chaussée, une cuisine aménagée, un salon-séjour, un WC et une loggia et à l\'étage, 3 chambres dont 2 avec placard, salle de bains et WC séparé. 2 garages. Le tout sur une parcelle de 225m2. Chauffage individuel clim réversible, DPE : F. ', 'Somme (80), 1h00 de Paris', 85, 225, 197000, 'F', '2020-11-13', NULL, '5-1.jpg', 0),
(6, 'A', 1, 5, '20H400', '100 km de Paris, maison 85m2 avec jardin', 'Exclusivité : dans bourg tous commerces avec écoles, maison d\'environ 85m2 habitables, mitoyenne, offrant en rez-de-chaussée, une cuisine aménagée, un salon-séjour, un WC et une loggia et à l\'étage, 3 chambres dont 2 avec placard, salle de bains et WC séparé. 2 garages. Le tout sur une parcelle de 225m2. Chauffage individuel clim réversible, DPE : F. ', 'Somme (80), 1h00 de Paris', 85, 225, 197000, 'F', '2020-11-13', NULL, '6-1.jpg', 0),
(7, 'A', 1, 5, '40L450', '100 km de Paris, maison 85m2 avec jardin', 'Exclusivité : dans bourg tous commerces avec écoles, maison d\'environ 85m2 habitables, mitoyenne, offrant en rez-de-chaussée, une cuisine aménagée, un salon-séjour, un WC et une loggia et à l\'étage, 3 chambres dont 2 avec placard, salle de bains et WC séparé. 2 garages. Le tout sur une parcelle de 225m2. Chauffage individuel clim réversible, DPE : F. ', 'Somme (80), 1h00 de Paris', 85, 225, 197000, 'F', '2020-11-13', NULL, '7-1.jpg', 0),
(8, 'A', 1, 5, '50J462', '100 km de Paris, maison 85m2 avec jardin', 'Exclusivité : dans bourg tous commerces avec écoles, maison d\'environ 85m2 habitables, mitoyenne, offrant en rez-de-chaussée, une cuisine aménagée, un salon-séjour, un WC et une loggia et à l\'étage, 3 chambres dont 2 avec placard, salle de bains et WC séparé. 2 garages. Le tout sur une parcelle de 225m2. Chauffage individuel clim réversible, DPE : F. ', 'Somme (80), 1h00 de Paris', 85, 225, 197000, 'F', '2020-11-13', NULL, '8-1.jpg', 0),
(9, 'A', 1, 5, '60J800', '100 km de Paris, maison 85m2 avec jardin', 'Exclusivité : dans bourg tous commerces avec écoles, maison d\'environ 85m2 habitables, mitoyenne, offrant en rez-de-chaussée, une cuisine aménagée, un salon-séjour, un WC et une loggia et à l\'étage, 3 chambres dont 2 avec placard, salle de bains et WC séparé. 2 garages. Le tout sur une parcelle de 225m2. Chauffage individuel clim réversible, DPE : F. ', 'Somme (80), 1h00 de Paris', 85, 225, 197000, 'F', '2020-11-13', NULL, '9-1.jpg', 0),
(10, 'A', 1, 5, '10P492', '100 km de Paris, maison 85m2 avec jardin', 'Exclusivité : dans bourg tous commerces avec écoles, maison d\'environ 85m2 habitables, mitoyenne, offrant en rez-de-chaussée, une cuisine aménagée, un salon-séjour, un WC et une loggia et à l\'étage, 3 chambres dont 2 avec placard, salle de bains et WC séparé. 2 garages. Le tout sur une parcelle de 225m2. Chauffage individuel clim réversible, DPE : F. ', 'Somme (80), 1h00 de Paris', 85, 225, 197000, 'F', '2020-11-13', NULL, '10-1.jpg', 0);

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
