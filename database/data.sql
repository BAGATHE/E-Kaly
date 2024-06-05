-- Insérer des données dans la table Resto
INSERT INTO Resto (id, email, mot_de_pass) VALUES
(1, 'resto1@example.com', 'mdp1'),
(2, 'resto2@example.com', 'mdp2'),
(3, 'resto3@example.com', 'mdp3');

-- Insérer des données dans la table Plat
INSERT INTO Plat (id, id_resto, description, prix) VALUES
(1, 1, 'Pizza Margherita', 10.99),
(2, 1, 'Spaghetti Carbonara', 12.99),
(3, 2, 'Burger Cheese', 8.99),
(4, 2, 'Salade César', 7.49),
(5, 3, 'Sushi Assorti', 15.99),
(6, 3, 'Ramen au Poulet', 11.49);

-- Insérer des données dans la table Client
INSERT INTO Client (id, nom) VALUES 
(1, 'koto');

-- Insérer des données dans la table Adresse
INSERT INTO Adresse (id, nom) VALUES
(1, 'Andoranofotsy'),
(2, 'Ambohimanarina'),
(3, 'Analakely'),
(4, 'Tanjombato');

-- Insérer des données dans la table Commande
INSERT INTO Commande (id, adresse, id_client, date) VALUES
(19, 1, 1, '2024-06-03 10:00:00'),
(20, 1, 1, '2024-06-03 11:30:00'),
(21, 1, 1, '2024-06-03 12:45:00');

-- Insérer des données dans la table Commande_plat
INSERT INTO Commande_plat (id, id_commande, id_plat, quantite, prix) VALUES
(1, 19, 1, 2, 21.98), -- Plat 1 (Pizza Margherita) appartient à Resto 1
(2, 19, 2, 1, 12.99), -- Plat 2 (Spaghetti Carbonara) appartient à Resto 1
-- La commande 19 ne contient que des plats du Resto 1

(3, 20, 3, 1, 8.99), -- Plat 3 (Burger Cheese) appartient à Resto 2
(4, 20, 4, 2, 14.98), -- Plat 4 (Salade César) appartient à Resto 2
-- La commande 20 ne contient que des plats du Resto 2

(5, 21, 5, 2, 31.98), -- Plat 5 (Sushi Assorti) appartient à Resto 3
(6, 21, 6, 1, 11.49); -- Plat 6 (Ramen au Poulet) appartient à Resto 3
-- La commande 21 ne contient que des plats du Resto 3

-- Insérer des données dans la table Commission_admin
INSERT INTO Commission_admin (id, commission_resto) VALUES 
(1, 5);

-- Insérer des données dans la table Config
INSERT INTO Config (id, nom, valeur, unite) VALUES
(1, 'benefice_frais_livraison', 30, '%');

-- Insérer des données dans la table Livreur
INSERT INTO Livreur (id, email, mot_de_pass) VALUES
(1, 'livreur1@example.com', 'mdp1');

-- Insérer des données dans la table Info_livreur
INSERT INTO Info_livreur (id, id_livreur, nom_complet, adresse) VALUES
(1, 1, 'Livreur 1', 1);

-- Insérer des données dans la table Livraison_payement_commande
INSERT INTO Livraison_payement_commande (id, id_commande, id_livreur, paye) VALUES
(1, 19, 1, TRUE),
(2, 20, 1, TRUE),
(3, 21, 1, TRUE);

-- Insérer des données dans la table Info_resto
INSERT INTO Info_resto (id, id_resto, nom, adresse, description, heure_ouverture, heure_fermeture) VALUES
(1, 1, 'Resto A', 2, 'Description Resto A', '08:00:00', '22:00:00'),
(2, 2, 'Resto B', 3, 'Description Resto B', '09:00:00', '23:00:00'),
(3, 3, 'Resto C', 4, 'Description Resto C', '10:00:00', '21:00:00');

-- Insérer des données dans la table LienAdresse
INSERT INTO Lien_adresse (id, id_adresse1, id_adresse2, distance) VALUES
(1, 1, 2, 1.5),
(2, 1, 3, 5.0),
(3, 1, 4, 10.0);

-- Insérer des données dans la table Tarif_livraison
INSERT INTO Tarif_livraison (id, distance_min, distance_max, tarif) VALUES
(1, 0, 2, 2000),
(2, 2, 6, 4500),
(3, 6, NULL, 6000);