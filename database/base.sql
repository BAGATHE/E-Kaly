drop database ekaly;
create database ekaly;
use ekaly;

CREATE TABLE Client (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(255),
    prenom VARCHAR(255),
    email VARCHAR(255),
    mot_de_pass VARCHAR(255)
);

CREATE TABLE Adresse (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(255)
);

CREATE TABLE lienAdresse (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_adresse1 INT,
    id_adresse2 INT,
    distance Decimal(10,6),
    FOREIGN KEY (id_adresse1) REFERENCES Adresse(id),
    FOREIGN KEY (id_adresse2) REFERENCES Adresse(id)

);

CREATE TABLE Resto (
    id INT PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(255),
    mot_de_pass VARCHAR(255)
);

CREATE TABLE Livreur (
    id INT PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(255),
    mot_de_pass VARCHAR(255)
);

CREATE TABLE Info_livreur (
    id INT PRIMARY KEY AUTO_INCREMENT,	
    id_livreur INT,
    nom_complet VARCHAR(255),
    adresse INT,
    FOREIGN KEY (id_livreur) REFERENCES Livreur(id) ,
    FOREIGN KEY (adresse) REFERENCES Adresse(id)
    
);

CREATE TABLE Admis (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(255),
    prenom VARCHAR(255),
    email VARCHAR(255),
    mot_de_pass VARCHAR(255)
);

CREATE TABLE Plat (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_resto INT,
    description VARCHAR(255),
    prix DECIMAL(10, 2),
    FOREIGN KEY (id_resto) REFERENCES Resto(id)
);

CREATE TABLE Change_quantite_plat (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_plat INT,
    date DATETIME,
    production INT,
    FOREIGN KEY (id_plat) REFERENCES Plat(id)
);

CREATE TABLE Commande (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_client INT,
    adresse INT,
    date DATETIME,
    FOREIGN KEY (id_client) REFERENCES Client(id),
    FOREIGN KEY (adresse) REFERENCES Adresse(id)

);

CREATE TABLE Commande_plat (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_commande INT,
    id_plat INT,
    quantite INT,
    prix DECIMAL(10, 2),
    FOREIGN KEY (id_commande) REFERENCES Commande(id),
    FOREIGN KEY (id_plat) REFERENCES Plat(id)
);

CREATE TABLE Livraison_payement_commande (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_commande INT,
    id_livreur INT,
    paye BOOLEAN,
    FOREIGN KEY (id_commande) REFERENCES Commande(id),
    FOREIGN KEY (id_livreur) REFERENCES Livreur(id)
);

CREATE TABLE Note_plat (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_client INT,
    id_plat INT,
    note INT,
    FOREIGN KEY (id_client) REFERENCES Client(id),
    FOREIGN KEY (id_plat) REFERENCES Plat(id)
);

CREATE TABLE Note_resto (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_client INT,
    id_resto INT,
    note INT,
    FOREIGN KEY (id_client) REFERENCES Client(id),
    FOREIGN KEY (id_resto) REFERENCES Resto(id)
);

CREATE TABLE Favori_client (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_resto INT,
    id_client INT,
    FOREIGN KEY (id_resto) REFERENCES Resto(id),
    FOREIGN KEY (id_client) REFERENCES Client(id)
);

CREATE TABLE Commission (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_resto INT,
    id_commande INT,
    date DATETIME,
    prix DECIMAL(10, 2),
    FOREIGN KEY (id_resto) REFERENCES Resto(id),
    FOREIGN KEY (id_commande) REFERENCES Commande(id)
);

CREATE TABLE Info_resto (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_resto INT,
    nom VARCHAR(255),
    adresse INT,
    description VARCHAR(255),
    heure_ouverture TIME,
    heure_fermeture TIME,
    FOREIGN KEY (id_resto) REFERENCES Resto(id),
    FOREIGN KEY (adresse) REFERENCES Adresse(id)
);

CREATE TABLE Prix (
    id INT PRIMARY KEY AUTO_INCREMENT,
    prix DECIMAL(10, 2)
);

CREATE TABLE Mise_en_avant (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_resto INT,
    id_prix INT,
    prix DECIMAL(10, 2),
    date DATETIME,
    duree INT,
    FOREIGN KEY (id_resto) REFERENCES Resto(id),
    FOREIGN KEY (id_prix) REFERENCES Prix(id)
);

CREATE TABLE Status (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_livreur INT,
    status VARCHAR(255),
    FOREIGN KEY (id_livreur) REFERENCES Livreur(id)
);

CREATE TABLE Payement (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_livreur INT,
    date DATETIME,
    montant DECIMAL(10, 2),
    FOREIGN KEY (id_livreur) REFERENCES Livreur(id)
);



---modif
create table Commission_admin(
    id INT PRIMARY KEY AUTO_INCREMENT,
    commission_resto decimal(10,2)
);