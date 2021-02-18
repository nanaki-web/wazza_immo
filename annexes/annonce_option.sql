DROP Table IF EXISTS annonce_option;
CREATE TABLE annonce_option
(
an_id INT (10),
opt_id INT (10),
PRIMARY KEY (an_id,opt_id),
CONSTRAINT FK_annonce_option1 FOREIGN KEY (an_id) REFERENCES annonces(an_id) ON DELETE CASCADE,-- (an_id)=La colonne sur laquelle on ajoute la clé
CONSTRAINT FK_annonce_option2 FOREIGN KEY (opt_id) REFERENCES options(opt_id) ON DELETE CASCADE -- (an_id)=La table et la colonne de référence
);
-- on delete cascade ,supprime la table de la ligne  fille quand on supprime la table de la ligne parent