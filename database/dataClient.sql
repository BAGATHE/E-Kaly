INSERT INTO Commande (id_client, adresse, repere, date, latitude, longitude) VALUES
(1, 1, 'près de TITI Store', '2024-05-01 12:34:56', -18.907242300123073, 47.526421130008266),
(2, 1, 'près de David Shop', '2024-05-02 13:45:12',  -18.90651267298538, 47.526400648402415),
(3, 2, 'Iscam', '2024-05-03 14:56:23', -18.898485144819226, 47.52495354363907),
(4, 2, 'Fitness Store', '2024-05-04 15:34:45', -18.897588345048963, 47.5228990387242),
(5, 4, 'Cite rose Ankatso', '2024-05-05 16:12:34', -18.9202763937677, 47.556617630483714),
(6, 4, 'Cite jaune Ankatso', '2024-05-06 17:23:56', -18.918913614086314, 47.55744132137897),
(7, 4, 'Terrain basket', '2024-05-07 18:34:12', -18.920386928677573, 47.55325142123992),
(8, 4, 'Office du bac', '2024-05-08 19:45:23', -18.9164807236796,  47.55366053003712),
(9, 5, 'Shop Avenir', '2024-05-09 20:56:34', -18.928294082823136, 47.51119136810303),
(10, 5, 'Ecole Laureat', '2024-05-10 21:34:45', -18.92851481640875, 47.508015632629395),
(11, 7, 'Esca', '2024-05-11 22:12:34', -18.897025362323458, 47.52231542403427),
(12, 7, 'CEG Antanimena', '2024-05-12 23:23:45', -18.897876859403997, 47.51914358698665),
(13, 8, 'Pres de l arret bus', '2024-05-13 10:34:56', -18.899204425296944,  47.51466745607857),
(14, 8, 'Techno science Sarl', '2024-05-14 11:45:12', -18.8998512636901,  47.515740394592285),
(15, 9, 'Glad Touch', '2024-05-15 12:56:23', -18.909361921683704, 47.53286361694336),
(16, 9, 'Italian Embassy', '2024-05-16 13:34:45', -18.90740806862586,  47.531447410583496),
(17, 11, 'Repère 17', '2024-05-17 14:12:34', null, null),
(18, 11, 'Repère 18', '2024-05-18 15:23:56', null, null),
(19, 11, 'Repère 19', '2024-05-19 16:34:12', null, null),
(20, 12, 'Repère 20', '2024-05-20 17:45:23', null, null),
(21, 13, 'Repère 21', '2024-05-21 18:56:34', null, null),
(22, 14, 'Repère 22', '2024-05-22 19:34:45', null, null),
(23, 15, 'Repère 23', '2024-05-23 20:12:34', null, null),
(24, 16, 'Repère 24', '2024-05-24 21:23:45', null, null),
(25, 16, 'Repère 25', '2024-05-25 22:34:56', null, null),
(26, 17, 'Repère 26', '2024-05-26 23:45:12', null, null),
(27, 18, 'Repère 27', '2024-05-27 10:56:23', null, null),
(28, 18, 'Repère 28', '2024-05-28 11:34:45', null, null),
(29, 18, 'Repère 29', '2024-05-29 12:12:34', null, null),
(30, 19, 'Repère 30', '2024-05-30 13:23:45', null, null),
(31, 21, 'Repère 31', '2024-05-31 14:34:56', null, null);

-- Générer les plats associés aux commandes
INSERT INTO Commande_plat (id_commande, id_plat, quantite, prix) VALUES
(1, 16, 2, 1900.00),
(1, 15, 1, 27500.00),
(2, 16, 1, 1900.00),
(2,17, 3, 11500.00),
(3, 18, 1, 9500.00),
(3,17, 2, 11500.00),
(4,20, 2, 20000.00),
(4,21, 1, 2000.00),
(5,22, 1, 20000.00),
(5, 23, 2, 20000.00),
(6, 24, 1, 80000.00),
(6, 25, 2, 18000.00),
(7, 26, 1, 8000.00),
(7, 25, 1, 98000.00),
(8, 28, 1, 42000.00),
(8, 25, 2, 98000.00),
(9, 30, 1, 12000.00),
(9, 31, 2, 12000.00),
(10, 32, 1, 7000.00),
(10, 33, 1, 12000.00),
(11, 32, 2, 7000.00),
(11, 35, 1, 18000.00),
(12, 36, 1, 21000.00),
(12, 37, 1, 19000.00),
(13, 38, 2, 18000.00),
(13, 37, 1, 19000.00),
(14, 40, 2, 12000.00),
(14, 41, 1, 19000.00),
(15, 42, 2, 25000.00),
(15, 43, 1, 17000.00),
(16, 2, 2, 4000.00),
(16, 1, 1, 20000.00);

INSERT INTO Commande_plat (id_commande, id_plat, quantite, prix) VALUES
(17, 1, 2, 20000.00),
(17, 2, 1, 4000.00),
(18, 3, 1, 10000.00),
(18, 4, 3, 3000.00),
(19, 5, 1, 10500.00),
(19, 4, 2, 3000.00),
(20, 7, 2, 6000.00),
(20, 8, 1, 5000.00),
(21, 9, 1, 7000.00),
(21, 8, 2, 5000.00),
(22, 11, 1, 1000.00),
(22, 12, 2, 2000.00),
(23, 13, 1, 500.00),
(23, 14, 1, 1000.00),
(24, 15, 1, 27500.00),
(24, 16, 2, 1900.00),
(25, 17, 1, 11500.00),
(25, 18, 2, 9500.00),
(26, 19, 1, 25000.00),
(26, 20, 1, 20000.00),
(27, 21, 2, 2000.00),
(27, 22, 1, 20000.00),
(28, 23, 1, 20000.00),
(28, 22, 1, 20000.00),
(29, 25, 2, 18000.00),
(29, 26, 1, 8000.00),
(30, 27, 2, 98000.00),
(30, 28, 1, 42000.00),
(31, 29, 2, 12000.00),
(31, 30, 1, 12000.00);


INSERT INTO Livraison_payement_commande (id_commande, id_livreur, paye) VALUES (1, 3, TRUE);
INSERT INTO Livraison_payement_commande (id_commande, id_livreur, paye) VALUES (2, 9, TRUE);
INSERT INTO Livraison_payement_commande (id_commande, id_livreur, paye) VALUES (3, 6, TRUE);
INSERT INTO Livraison_payement_commande (id_commande, id_livreur, paye) VALUES (4, 7, TRUE);
INSERT INTO Livraison_payement_commande (id_commande, id_livreur, paye) VALUES (5, 2, TRUE);
INSERT INTO Livraison_payement_commande (id_commande, id_livreur, paye) VALUES (6, 5, TRUE);
INSERT INTO Livraison_payement_commande (id_commande, id_livreur, paye) VALUES (7, 1, TRUE);
INSERT INTO Livraison_payement_commande (id_commande, id_livreur, paye) VALUES (8, 8, TRUE);
INSERT INTO Livraison_payement_commande (id_commande, id_livreur, paye) VALUES (9, 4, TRUE);
INSERT INTO Livraison_payement_commande (id_commande, id_livreur, paye) VALUES (10, 3, TRUE);
INSERT INTO Livraison_payement_commande (id_commande, id_livreur, paye) VALUES (11, 7, TRUE);
INSERT INTO Livraison_payement_commande (id_commande, id_livreur, paye) VALUES (12, 5, TRUE);
INSERT INTO Livraison_payement_commande (id_commande, id_livreur, paye) VALUES (13, 9, TRUE);
INSERT INTO Livraison_payement_commande (id_commande, id_livreur, paye) VALUES (14, 1, TRUE);
INSERT INTO Livraison_payement_commande (id_commande, id_livreur, paye) VALUES (15, 6, TRUE);
INSERT INTO Livraison_payement_commande (id_commande, id_livreur, paye) VALUES (16, 2, TRUE);
INSERT INTO Livraison_payement_commande (id_commande, id_livreur, paye) VALUES (17, 9, TRUE);
INSERT INTO Livraison_payement_commande (id_commande, id_livreur, paye) VALUES (18, 4, TRUE);
INSERT INTO Livraison_payement_commande (id_commande, id_livreur, paye) VALUES (19, 1, TRUE);
INSERT INTO Livraison_payement_commande (id_commande, id_livreur, paye) VALUES (20, 3, TRUE);
INSERT INTO Livraison_payement_commande (id_commande, id_livreur, paye) VALUES (21, 7, TRUE);
INSERT INTO Livraison_payement_commande (id_commande, id_livreur, paye) VALUES (22, 5, TRUE);
INSERT INTO Livraison_payement_commande (id_commande, id_livreur, paye) VALUES (23, 9, TRUE);
INSERT INTO Livraison_payement_commande (id_commande, id_livreur, paye) VALUES (24, 8, TRUE);
INSERT INTO Livraison_payement_commande (id_commande, id_livreur, paye) VALUES (25, 6, TRUE);
INSERT INTO Livraison_payement_commande (id_commande, id_livreur, paye) VALUES (26, 2, TRUE);
INSERT INTO Livraison_payement_commande (id_commande, id_livreur, paye) VALUES (27, 4, TRUE);
INSERT INTO Livraison_payement_commande (id_commande, id_livreur, paye) VALUES (28, 1, TRUE);
INSERT INTO Livraison_payement_commande (id_commande, id_livreur, paye) VALUES (29, 3, TRUE);
INSERT INTO Livraison_payement_commande (id_commande, id_livreur, paye) VALUES (30, 7, TRUE);
INSERT INTO Livraison_payement_commande (id_commande, id_livreur, paye) VALUES (31, 5, TRUE);
