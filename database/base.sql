
drop database Ekaly;
create database Ekaly;
use Ekaly;

drop database ekaly;
create database ekaly;
use ekaly;

CREATE TABLE Client (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(255),
    prenom VARCHAR(255),
    email VARCHAR(255),
    telephone VARCHAR(255),
    mot_de_pass VARCHAR(255)
);

CREATE TABLE Adresse (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(255)
);

CREATE TABLE Voisin (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_adresse1 INT,
    id_adresse2 INT,
    FOREIGN KEY (id_adresse1) REFERENCES Adresse(id),
    FOREIGN KEY (id_adresse2) REFERENCES Adresse(id)

);


CREATE TABLE Resto (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(255),
    id_adresse INT,
    email VARCHAR(255),
    mot_de_pass VARCHAR(255),
    FOREIGN KEY (id_adresse) REFERENCES Adresse(id)
);

CREATE TABLE Info_resto (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_resto INT,
    nom VARCHAR(255),
    adresse INT,
    repere VARCHAR(255),
    description VARCHAR(255),
    telephone VARCHAR(255),
    heure_ouverture TIME,
    heure_fermeture TIME,
    latitude DECIMAL(2, 10) DEFAULT NULL,
    longitude DECIMAL(2, 10) DEFAULT NULL,
    image VARCHAR(255) DEFAULT NULL,
    FOREIGN KEY (id_resto) REFERENCES Resto(id),
    FOREIGN KEY (adresse) REFERENCES Adresse(id)
);


CREATE TABLE Plat (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_resto INT,
    description VARCHAR(255),
    prix DECIMAL(10, 2),
    image VARCHAR(255) DEFAULT NULL,
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
    repere VARCHAR(250),
    date DATETIME,
    latitude DECIMAL(2, 10) DEFAULT NULL,
    longitude DECIMAL(2, 10) DEFAULT NULL,
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
    telephone VARCHAR(255),
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
    note decimal(10,2),
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




CREATE TABLE Prix_mise_en_avant(
    id INT PRIMARY KEY AUTO_INCREMENT,
    prix DECIMAL(10, 2)
);

CREATE TABLE Mise_en_avant (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_resto INT,
    id_prix INT,
    prix DECIMAL(10, 2),
    date DATE,
    duree INT,
    FOREIGN KEY (id_resto) REFERENCES Resto(id),
    FOREIGN KEY (id_prix) REFERENCES Prix_mise_en_avant(id)
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
    id_commande INT,
    date DATETIME,
    montant DECIMAL(10, 2),
    FOREIGN KEY (id_livreur) REFERENCES Livreur(id)
);


create table Commission_admin(
    id INT PRIMARY KEY AUTO_INCREMENT,
    commission_resto decimal(10,2),
    commission_livreur decimal(10,2)
);


CREATE OR REPLACE TABLE Tarif_livraison (
    tarif_min decimal(10,2),
    tarif_moyen decimal(10,2),
    tarif_max decimal(10,2)
);


ALTER TABLE `Info_livreur` ADD FOREIGN KEY (`id_livreur`) REFERENCES `Livreur` (`id`);

ALTER TABLE `Info_livreur` ADD FOREIGN KEY (`adresse`) REFERENCES `Adresse` (`id`);

ALTER TABLE `Plat` ADD FOREIGN KEY (`id_resto`) REFERENCES `Resto` (`id`);

ALTER TABLE `Change_quantite_plat` ADD FOREIGN KEY (`id_plat`) REFERENCES `Plat` (`id`);

ALTER TABLE `Commande` ADD FOREIGN KEY (`id_client`) REFERENCES `Client` (`id`);

ALTER TABLE `Commande` ADD FOREIGN KEY (`adresse`) REFERENCES `Adresse` (`id`);

ALTER TABLE `Commande_plat` ADD FOREIGN KEY (`id_commande`) REFERENCES `Commande` (`id`);

ALTER TABLE `Commande_plat` ADD FOREIGN KEY (`id_plat`) REFERENCES `Plat` (`id`);

ALTER TABLE `Livraison_payement_commande` ADD FOREIGN KEY (`id_commande`) REFERENCES `Commande` (`id`);

ALTER TABLE `Livraison_payement_commande` ADD FOREIGN KEY (`id_livreur`) REFERENCES `Livreur` (`id`);

ALTER TABLE `Note_plat` ADD FOREIGN KEY (`id_client`) REFERENCES `Client` (`id`);

ALTER TABLE `Note_plat` ADD FOREIGN KEY (`id_plat`) REFERENCES `Plat` (`id`);

ALTER TABLE `Note_resto` ADD FOREIGN KEY (`id_client`) REFERENCES `Client` (`id`);

ALTER TABLE `Note_resto` ADD FOREIGN KEY (`id_resto`) REFERENCES `Resto` (`id`);

ALTER TABLE `Favori_client` ADD FOREIGN KEY (`id_resto`) REFERENCES `Resto` (`id`);

ALTER TABLE `Favori_client` ADD FOREIGN KEY (`id_client`) REFERENCES `Client` (`id`);

ALTER TABLE `Commission` ADD FOREIGN KEY (`id_resto`) REFERENCES `Resto` (`id`);

ALTER TABLE `Commission` ADD FOREIGN KEY (`id_commande`) REFERENCES `Commande` (`id`);

ALTER TABLE `Info_resto` ADD FOREIGN KEY (`id_resto`) REFERENCES `Resto` (`id`);

ALTER TABLE `Info_resto` ADD FOREIGN KEY (`adresse`) REFERENCES `Adresse` (`id`);

ALTER TABLE `Mise_en_avant` ADD FOREIGN KEY (`id_resto`) REFERENCES `Resto` (`id`);

ALTER TABLE `Mise_en_avant` ADD FOREIGN KEY (`id_prix`) REFERENCES `Prix` (`id`);

ALTER TABLE `Status` ADD FOREIGN KEY (`id_livreur`) REFERENCES `Livreur` (`id`);

ALTER TABLE `Payement` ADD FOREIGN KEY (`id_livreur`) REFERENCES `Livreur` (`id`);

ALTER TABLE `lien_adresse` ADD FOREIGN KEY (`id_adresse1`) REFERENCES `Adresse` (`id`);

ALTER TABLE `lien_adresse` ADD FOREIGN KEY (`id_adresse2`) REFERENCES `Adresse` (`id`);