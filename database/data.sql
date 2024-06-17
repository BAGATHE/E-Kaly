-- Insertion dans la table CLient
INSERT INTO `Client` (`nom`, `prenom`, `email`,`telephone`,`mot_de_pass`) VALUES
('Bernard', 'Alice', 'alice@gmail.com','0326257346' ,'alice'),
('Durand', 'Louis', 'louis@gmail.com', '0348965471','louis'),
('Moreau', 'Claire', 'claire@gmail.com','0339624875' ,'claire');


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
('Tsimbazaza'),
('Tsarasaotra'),
('Tanjombato'),
('Anosy'),
('Ampefiloha'),
('67ha'),
('Andoharanofotsy'),
('Ankadimbahoaka'),
('Soanierana');

--inserer voisin de l'adresse
INSERT INTO `Voisin` (`id_adresse1`,`id_adresse2`) VALUES
('32','28'),
('32','35');


-- Insérer des données dans la table Resto
INSERT INTO Resto (nom,id_adresse, email,mot_de_pass) VALUES
('Fong Mei',32,'resto1@example.com', 'mdp1'),
('EURASIE',28,'resto2@example.com','mdp2'),
('Selesy',15,'resto3@example.com','mdp3');


-- Insertion des données dans la table Info_resto
INSERT INTO Info_resto (id_resto, nom, adresse, repere,description, heure_ouverture, heure_fermeture) VALUES
( 1, 'Resto A', 32,'pharmacie', 'Description Resto A', '08:00:00', '22:00:00'),
( 2, 'Resto B', 28,'magasin M','Description Resto B', '09:00:00', '23:00:00'),
( 3, 'Resto C', 15,'jazz club','Description Resto C', '10:00:00', '21:00:00');


-- Insérer des données dans la table Plat
INSERT INTO Plat (id_resto, description, prix) VALUES
(1, 'Pizza Margherita', 8000),
(1, 'Spaghetti Carbonara', 6000),
(2, 'Burger Cheese', 7000),
(2, 'Salade César', 5000),
(3, 'Sushi Assorti', 9000),
(3, 'Ramen au Poulet', 6000);


INSERT INTO Change_quantite_plat (id_plat, date, production) VALUES
(1, '2024-06-01 08:00:00', 50),
(2, '2024-06-01 08:00:00', 40),
(3, '2024-06-01 08:00:00', 30),
(4, '2024-06-01 08:00:00', 20),
(5, '2024-06-01 08:00:00', 15),
(6, '2024-06-01 08:00:00', 25);


-- Insérer des données dans la table Commande
INSERT INTO Commande (id_client,adresse,repere,date) VALUES
(1,32,'itu','2024-06-03 10:00:00'),
(1,28,'forello','2024-06-03 11:30:00'),
(1,15,'black jack','2024-06-03 12:45:00'),
(1,35,'maison blanche','2024-06-11 08:00:00'),
(1,35,'maison blanche','2024-06-11 10:00:00');

-- Insérer des données dans la table Commande_plat
-- (Assumant que vous avez une table Commande déjà créée)
INSERT INTO Commande_plat (id_commande, id_plat, quantite, prix) VALUES
(1, 1, 2, 21.98),
(1, 4, 1, 7.49),
(2, 3, 1, 8.99),
(2, 6, 2, 22.98),
(3, 2, 1, 8.99),
(3, 5, 2, 31.98),
(4, 1, 2, 21.98),
(5, 1, 2, 21.98);

-- Insérer des données dans la table Commission_admin
INSERT INTO Commission_admin (commission_resto,commission_livreur) VALUES 
(5,30);



--Insertion dans la table Admis
INSERT INTO Admis (nom, prenom, email, mot_de_pass) VALUES
('admin1', 'admin1', 'admin1@gmail.com', 'admin1'),
('admin2', 'admin2', 'admin2@gmail.com', 'admin2');






INSERT INTO Status(id_livreur,status) VALUES (1,'dispo');
INSERT INTO Status(id_livreur,status) VALUES (2,'dispo');
INSERT INTO Status(id_livreur,status) VALUES (3,'dispo');
INSERT INTO Status(id_livreur,status) VALUES (4,'non-dispo');
INSERT INTO Status(id_livreur,status) VALUES (5,'dispo');
INSERT INTO Status(id_livreur,status) VALUES (6,'dispo');
INSERT INTO Status(id_livreur,status) VALUES (7,'dispo');


-- Insertion dans la table Livreur
INSERT INTO Livreur (id,email, mot_de_pass) VALUES (1,'livreur1@gmail.com', 'livreur1');
INSERT INTO Livreur (id,email, mot_de_pass) VALUES (2,'livreur3@gmail.com', 'livreur2');
INSERT INTO Livreur (id,email, mot_de_pass) VALUES (3,'livreur2@gmail.com', 'livreur3');

INSERT INTO Livreur (email, mot_de_pass) VALUES ('livreur4@gmail.com', 'livreur4');
INSERT INTO Livreur (email, mot_de_pass) VALUES ('livreur5@gmail.com', 'livreur5');
INSERT INTO Livreur (email, mot_de_pass) VALUES ('livreur6@gmail.com', 'livreur6');
INSERT INTO Livreur (email, mot_de_pass) VALUES ('livreur7@gmail.com', 'livreur7');

-- Insertion dans la table Info_livreur
INSERT INTO Info_livreur (id_livreur, nom_complet, adresse) VALUES (1,'livreur1',15);
INSERT INTO Info_livreur (id_livreur, nom_complet, adresse) VALUES (2,'livreur2',20);
INSERT INTO Info_livreur (id_livreur, nom_complet, adresse) VALUES (3,'livreur3',28);

INSERT INTO Info_livreur (id_livreur, nom_complet, adresse) VALUES (4,'livreur4',32);
INSERT INTO Info_livreur (id_livreur, nom_complet, adresse) VALUES (5,'livreur5',35);
INSERT INTO Info_livreur (id_livreur, nom_complet, adresse) VALUES (6,'livreur6',32);
INSERT INTO Info_livreur (id_livreur, nom_complet, adresse) VALUES (7,'livreur7',22);




-- Insérer des données dans la table Livraison_payement_commande
INSERT INTO Livraison_payement_commande ( id_commande, id_livreur,paye) VALUES
(1,  1, 1),
(2, 1, 1),
(3,  1, 0);








INSERT INTO Note_plat (id_client, id_plat, note) VALUES
(1, 1, 4),
(2, 1, 5),
(3, 2, 3);

INSERT INTO Prix_mise_en_avant(prix) VALUES(200000);



INSERT INTO Tarif_livraison (tarif_min,tarif_moyen,tarif_max)
VALUES (1500,3000,5000);

--teste