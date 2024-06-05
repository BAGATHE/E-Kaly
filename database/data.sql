-- Insérer des données dans la table Resto
INSERT INTO Resto (email, mot_de_pass) VALUES
('resto1@example.com', 'mdp1'),
('resto2@example.com', 'mdp2'),
('resto3@example.com', 'mdp3');

-- Insérer des données dans la table Plat
INSERT INTO Plat (id_resto, description, prix) VALUES
(1, 'Pizza Margherita', 10.99),
(1, 'Spaghetti Carbonara', 12.99),
(2, 'Burger Cheese', 8.99),
(2, 'Salade César', 7.49),
(3, 'Sushi Assorti', 15.99),
(3, 'Ramen au Poulet', 11.49);
-- Insérer des données dans la table Commande

insert into Client (nom) values ('koto');

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

insert into Commission_admin(commission_resto) VALUES (5);