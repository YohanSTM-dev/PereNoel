CREATE TABLE adresses (
    id SERIAL PRIMARY KEY,
    adresse varchar(200),
    idtraineau INT,
    FOREIGN KEY (idtraineau) REFERENCES traineaux(id) ON DELETE CASCADE
);

CREATE TABLE traineaux (
    id SERIAL PRIMARY KEY
);

CREATE TABLE ateliers (
    id SERIAL PRIMARY KEY,
    nom varchar(50),
    adresse varchar(200)
);

CREATE TABLE enfants (
    id SERIAL PRIMARY KEY,
    nom varchar(50),
    prenom varchar(50),
    age INT,
    idadresse INT,
    FOREIGN KEY (idadresse) REFERENCES adresses(id)
);

CREATE TABLE jouets (
    id SERIAL PRIMARY KEY,
    nom varchar(50),
    idatelier INT,
    FOREIGN KEY (idatelier) REFERENCES ateliers(id)
);

CREATE TABLE lutins (
    id SERIAL PRIMARY KEY,
    nom varchar(50),
    prenom varchar(50),
    idtraineau INT,
    FOREIGN KEY (idtraineau) REFERENCES traineaux(id)
);

CREATE TABLE rennes (
    id SERIAL PRIMARY KEY,
    nom varchar(50)
);

CREATE TABLE listejouets (
    enfant_id INT NOT NULL,
    jouet_id INT NOT NULL,
    PRIMARY KEY (enfant_id, jouet_id),
    FOREIGN KEY (enfant_id) REFERENCES enfants(id) ON DELETE CASCADE,
    FOREIGN KEY (jouet_id) REFERENCES jouets(id) ON DELETE CASCADE
);

CREATE TABLE livraison (
    traineau_id INT NOT NULL,
    adresse_id INT NOT NULL,
    heure TIME,
    PRIMARY KEY (traineau_id, adresse_id),
    FOREIGN KEY (traineau_id) REFERENCES traineaux(id) ON DELETE CASCADE,
    FOREIGN KEY (adresse_id) REFERENCES adresses(id) ON DELETE CASCADE
);

CREATE TABLE affectation (
    lutin_id INT NOT NULL,
    atelier_id INT NOT NULL,
    PRIMARY KEY (lutin_id, atelier_id),
    FOREIGN KEY (lutin_id) REFERENCES lutins(id) ON DELETE CASCADE,
    FOREIGN KEY (atelier_id) REFERENCES ateliers(id) ON DELETE CASCADE
);

