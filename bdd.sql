CREATE TABLE enfants(
    id int SERIAL PRIMARY KEY,
    nom varchar(50),
    prenom varchar(50),
    age int
    idadresse int,
    FOREIGN KEY (idadresse) REFERENCES adresse(id)
);

CREATE TABLE jouets(
    id int SERIAL PRIMARY KEY,
    nom varchar(50)
    idatelier int,
    FOREIGN KEY (idatelier) REFERENCES ateliers(id)
);

CREATE TABLE ateliers(
    id int SERIAL PRIMARY KEY,
    nom varchar(50),
    adresse varchar(200)
);

CREATE TABLE lutins(
    id int SERIAL PRIMARY KEY,
    nom varchar(50),
    prenom varchar(50),
    idtraineau int,
    FOREIGN KEY (idtraineau) REFERENCES traineaux(id)
);

CREATE TABLE traineaux(
    id int SERIAL PRIMARY KEY
);

CREATE TABLE rennes(
    id int SERIAL PRIMARY KEY,
    nom varchar(50),

);

CREATE TABLE adresses(
    id int SERIAL PRIMARY KEY,
    adresse varchar(200),
    idtraineau int,
    FOREIGN KEY (idtraineau) REFERENCES traineaux(id) ON DELETE CASCADE
);

CREATE TABLE listejouets(
    enfant_id INT NOT NULL,
    jouet_id INT NOT NULL,
    PRIMARY KEY (enfant_id, jouet_id),
    FOREIGN KEY (enfant_id) REFERENCES enfants(id) ON DELETE CASCADE,
    FOREIGN KEY (jouet_id) REFERENCES jouets(id) ON DELETE CASCADE
);

CREATE TABLE livraison(
    traineau_id INT NOT NULL,
    adresse_id INT NOT NULL,
    heure time,
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

