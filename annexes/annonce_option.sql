USE wazaaimmo;
DROP Table IF EXISTS annonce_option;
CREATE TABLE annonce_option
(
an_id INT (10),
opt_id INT (10),
PRIMARY KEY (an_id,opt_id),
FOREIGN KEY (an_id) REFERENCES annonces(an_id),-- (an_id)=La colonne sur laquelle on ajoute la clé
FOREIGN KEY (opt_id)REFERENCES options(opt_id) --(an_id)=La table et la colonne de référence
);