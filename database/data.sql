
-- Insérer des données dans la table Resto
INSERT INTO Resto (nom,email, mot_de_pass) VALUES
('Fong Mei','resto1@example.com', 'mdp1'),
('EURASIE','resto2@example.com', 'mdp2'),
('Selesy','resto3@example.com', 'mdp3');

-- Insérer des données dans la table Plat
INSERT INTO Plat (id_resto, description, prix) VALUES
(1, 'Pizza Margherita', 10.99),
(1, 'Spaghetti Carbonara', 12.99),
(2, 'Burger Cheese', 8.99),
(2, 'Salade César', 7.49),
(3, 'Sushi Assorti', 15.99),
(3, 'Ramen au Poulet', 11.49);
-- Insérer des données dans la table Commande

insert into client (nom) values ('koto');

insert into Adresse (nom) values('Andoranofotsy');

INSERT INTO Commande (adresse,id_client, date) VALUES
(1, 1, '2024-06-03 10:00:00'),
(1, 1, '2024-06-03 11:30:00'),
(1, 1, '2024-06-03 12:45:00');

-- Insérer des données dans la table Commande_plat
-- (Assumant que vous avez une table Commande déjà créée)
INSERT INTO Commande_plat (id_commande, id_plat, quantite, prix) VALUES
(1, 1, 2, 21.98),
(1, 4, 1, 7.49),
(2, 3, 1, 8.99),
(2, 6, 2, 22.98),
(3, 2, 1, 8.99),
(3, 5, 2, 22.98);


-- Insertion dans la table Admis
INSERT INTO Admis (nom, prenom, email, mot_de_pass) VALUES
('admin1', 'admin1', 'admin1@gmail.com', 'admin1'),
('admin2', 'admin2', 'admin2@gmail.com', 'admin2');


-- Insertion dans la table CLient
INSERT INTO `Client` (`nom`, `prenom`, `email`, `mot_de_pass`) VALUES
('Bernard', 'Alice', 'alice@gmail.com', 'alice'),
('Durand', 'Louis', 'louis@gmail.com', 'louis'),
('Moreau', 'Claire', 'claire@gmail.com', 'claire'),
('Petit', 'Henri', 'henri@gmail.com', 'henri'),
('Robert', 'Emma', 'emma@gmail.com', 'emma'),
('Richard', 'Paul', 'paul@gmail.com', 'paul'),
('Garcia', 'Marie', 'marie@gmail.com', 'marie'),
('Martinez', 'Luc', 'luc@gmail.com', 'luc'),
('Lefevre', 'Julie', 'julie@gmail.com', 'julie'),
('Thomas', 'Pierre', 'pierre@gmail.com', 'pierre');


-- Insérer des données dans la table Adresse
INSERT INTO `Adresse` (`nom`) VALUES
('Analakely'),
('Ankadifotsy'),
('Ankadilalana'),
('Ankatso'),
('Anosibe'),
('Anosipatrana'),
('Antanimena'),
('Antaninandro'),
('Antananarivo Renivohitra'),
('Antohomadinika'),
('Antohomadinika Avaratra'),
('Antohomadinika Atsimo'),
('Antsakaviro'),
('Anjanahary'),
('Behoririka'),
('Besarety'),
('Betongolo'),
('Faravohitra'),
('Isoraka'),
('Isotry'),
('Mahamasina'),
('Mandrosoa'),
('Manjakaray'),
('Manarintsoa'),
('Tsaralalàna'),
('Tsimbazaza');



-- Insertion dans la table Livreur
INSERT INTO Livreur (id,email, mot_de_pass) VALUES (1,'livreur1@gmail.com', 'livreur1');
INSERT INTO Livreur (id,email, mot_de_pass) VALUES (2,'livreur3@gmail.com', 'livreur2');
INSERT INTO Livreur (id,email, mot_de_pass) VALUES (3,'livreur2@gmail.com', 'livreur3');

-- Insertion dans la table Info_livreur
INSERT INTO Info_livreur (id_livreur, nom_complet, adresse) VALUES (1,'livreur1',4);
INSERT INTO Info_livreur (id_livreur, nom_complet, adresse) VALUES (2,'livreur2',6);
INSERT INTO Info_livreur (id_livreur, nom_complet, adresse) VALUES (3,'livreur3',12);


-- Insérer des données dans la table Resto
INSERT INTO Resto (email, mot_de_pass) VALUES
('resto1@example.com', 'mdp1'),
('resto2@example.com', 'mdp2'),
('resto3@example.com', 'mdp3');

-- Insertion des données dans la table Info_resto
INSERT INTO Info_resto (id_resto, nom, adresse, description, heure_ouverture, heure_fermeture) VALUES
( 1, 'Resto A', 2, 'Description Resto A', '08:00:00', '22:00:00'),
( 2, 'Resto B', 3, 'Description Resto B', '09:00:00', '23:00:00'),
( 3, 'Resto C', 4, 'Description Resto C', '10:00:00', '21:00:00');

-- Insérer des données dans la table Plat
INSERT INTO Plat (id_resto, description, prix) VALUES
( 1, 'Pizza Margherita', 10.99),
( 1, 'Spaghetti Carbonara', 12.99),
( 2, 'Burger Cheese', 8.99),
( 2, 'Salade César', 7.49),
( 3, 'Sushi Assorti', 15.99),
(3, 'Ramen au Poulet', 11.49);



-- Insérer des données dans la table Commande
INSERT INTO Commande (adresse, id_client, date) VALUES
(1, 1, '2024-06-03 10:00:00'),
(1, 1, '2024-06-03 11:30:00'),
(1, 1, '2024-06-03 12:45:00');

-- Insérer des données dans la table Commande_plat
INSERT INTO Commande_plat ( id_commande, id_plat, quantite, prix) VALUES
(1, 1, 2, 21.98), -- Plat 1 (Pizza Margherita) appartient à Resto 1
( 1, 2, 1, 12.99), -- Plat 2 (Spaghetti Carbonara) appartient à Resto 1
-- La commande 19 ne contient que des plats du Resto 1

( 2, 3, 1, 8.99), -- Plat 3 (Burger Cheese) appartient à Resto 2
( 2, 4, 2, 14.98), -- Plat 4 (Salade César) appartient à Resto 2
-- La commande 20 ne contient que des plats du Resto 2

( 3, 5, 2, 31.98), -- Plat 5 (Sushi Assorti) appartient à Resto 3
( 3, 6, 1, 11.49); -- Plat 6 (Ramen au Poulet) appartient à Resto 3
-- La commande 21 ne contient que des plats du Resto 3

-- Insérer des données dans la table Commission_admin
INSERT INTO Commission_admin (commission_resto,commission_livreur) VALUES 
(5,30);
-- Insérer des données dans la table Config
INSERT INTO Config ( nom, valeur, unite) VALUES
('benefice_frais_livraison', 30, '%');


-- Insérer des données dans la table Livraison_payement_commande
INSERT INTO Livraison_payement_commande ( id_commande, id_livreur, paye) VALUES
(1,  1, TRUE),
(2, 1, TRUE),
(3,  1, TRUE);



-- Insérer des données dans la table LienAdresse
INSERT INTO Lien_adresse (id_adresse1, id_adresse2, distance) VALUES
( 1, 2, 1.5),
(1, 3, 5.0),
( 1, 4, 10.0);

-- Insérer des données dans la table Tarif_livraison
INSERT INTO Tarif_livraison (distance_min, distance_max, tarif) VALUES
(0, 2, 2000),
( 2, 6, 4500),
(6, 10, 6000);

INSERT INTO Change_quantite_plat (id_plat, date, production) VALUES
(1, '2024-06-01 08:00:00', 50),
(2, '2024-06-01 08:00:00', 40),
(3, '2024-06-01 08:00:00', 30),
(4, '2024-06-01 08:00:00', 20),
(5, '2024-06-01 08:00:00', 15),
(6, '2024-06-01 08:00:00', 25);


INSERT INTO Note_plat (id_client, id_plat, note) VALUES
(1, 1, 4),
(2, 1, 5),
(3, 2, 3),
(4, 2, 4),
(5, 3, 5),
(6, 3, 4),
(7, 4, 2),
(8, 4, 3),
(9, 5, 4),
(10,5, 5);

INSERT INTO Prix_mise_en_avant(prix) VALUES(100);
