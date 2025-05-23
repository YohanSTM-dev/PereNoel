CREATE TABLE traineaux (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY
);

CREATE TABLE ateliers (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50),
    adresse VARCHAR(200)
);

CREATE TABLE adresses (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    adresse VARCHAR(200),
    idtraineau INT NULL
);

CREATE TABLE enfants (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50),
    prenom VARCHAR(50),
    age INT,
    idadresse INT NULL
);

CREATE TABLE lutins (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50),
    prenom VARCHAR(50),
    idtraineau INT NULL
);

CREATE TABLE jouets (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50),
    idatelier INT NULL
);

CREATE TABLE rennes (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50)
);

CREATE TABLE listejouets (
    enfant_id INT NOT NULL,
    jouet_id INT NOT NULL,
    PRIMARY KEY (enfant_id, jouet_id)
);

CREATE TABLE livraison (
    traineau_id INT NOT NULL,
    adresse_id INT NOT NULL,
    heure TIME,
    PRIMARY KEY (traineau_id, adresse_id)
);

CREATE TABLE affectation (
    lutin_id INT NOT NULL,
    atelier_id INT NOT NULL,
    PRIMARY KEY (lutin_id, atelier_id)
);

ALTER TABLE adresses
  ADD CONSTRAINT fk_adresses_traineaux FOREIGN KEY (idtraineau) REFERENCES traineaux(id);

ALTER TABLE enfants
  ADD CONSTRAINT fk_enfants_adresses FOREIGN KEY (idadresse) REFERENCES adresses(id);

ALTER TABLE lutins
  ADD CONSTRAINT fk_lutins_traineaux FOREIGN KEY (idtraineau) REFERENCES traineaux(id);

ALTER TABLE jouets
  ADD CONSTRAINT fk_jouets_ateliers FOREIGN KEY (idatelier) REFERENCES ateliers(id);

ALTER TABLE listejouets
  ADD CONSTRAINT fk_listejouets_enfants FOREIGN KEY (enfant_id) REFERENCES enfants(id) ON DELETE CASCADE,
  ADD CONSTRAINT fk_listejouets_jouets FOREIGN KEY (jouet_id) REFERENCES jouets(id) ON DELETE CASCADE;

ALTER TABLE livraison
  ADD CONSTRAINT fk_livraison_traineaux FOREIGN KEY (traineau_id) REFERENCES traineaux(id) ON DELETE CASCADE,
  ADD CONSTRAINT fk_livraison_adresses FOREIGN KEY (adresse_id) REFERENCES adresses(id) ON DELETE CASCADE;

ALTER TABLE affectation
  ADD CONSTRAINT fk_affectation_lutins FOREIGN KEY (lutin_id) REFERENCES lutins(id) ON DELETE CASCADE,
  ADD CONSTRAINT fk_affectation_ateliers FOREIGN KEY (atelier_id) REFERENCES ateliers(id) ON DELETE CASCADE;
