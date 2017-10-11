DROP TABLE IF EXISTS Personne;

CREATE TABLE Personne (
    id int(15) AUTO_INCREMENT NOT NULL,
    nom varchar(25),
    pass varchar(25) NOT NULL,
    color varchar(25),
    
    PRIMARY KEY (id)
)
ENGINE=InnoDB
CHARACTER SET utf8
COLLATE utf8_bin;

/* ---------------------------------- */

INSERT INTO Personne (nom, pass, color) VALUES
('JMdu93', 'LeStylo', 'white'),
('Groot', 'JeSappelle', 'green'),
('Bouffi', 'Bouffon', 'gras'),
('JJ', 'Abrams', 'black');

/* ---------------------------------- */

INSERT INTO Personne (nom, pass, color) VALUES
('Allé', '$012¨^', 'white'),
('Whôut', '/zzz\zzz\'', 'green'),
('BÉuffà', 'zzfe', 'gras'),
('îoooï', '589*.=!', 'black');

/* ---------------------------------- */

INSERT INTO Personne (nom, pass, color) VALUES
('TBG', 'Admin', 'RAINBOW');