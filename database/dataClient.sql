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


INSERT INTO Livraison_payement_commande (id_commande, id_livreur, paye) VALUES (1, 3, 1);
INSERT INTO Livraison_payement_commande (id_commande, id_livreur, paye) VALUES (2, 9, 1);
INSERT INTO Livraison_payement_commande (id_commande, id_livreur, paye) VALUES (3, 6, 1);
INSERT INTO Livraison_payement_commande (id_commande, id_livreur, paye) VALUES (4, 7, 1);
INSERT INTO Livraison_payement_commande (id_commande, id_livreur, paye) VALUES (5, 2, 1);
INSERT INTO Livraison_payement_commande (id_commande, id_livreur, paye) VALUES (6, 5, 1);
INSERT INTO Livraison_payement_commande (id_commande, id_livreur, paye) VALUES (7, 1, 1);
INSERT INTO Livraison_payement_commande (id_commande, id_livreur, paye) VALUES (8, 8, 1);
INSERT INTO Livraison_payement_commande (id_commande, id_livreur, paye) VALUES (9, 4, 1);
INSERT INTO Livraison_payement_commande (id_commande, id_livreur, paye) VALUES (10, 3, 1);
INSERT INTO Livraison_payement_commande (id_commande, id_livreur, paye) VALUES (11, 7, 1);
INSERT INTO Livraison_payement_commande (id_commande, id_livreur, paye) VALUES (12, 5, 1);
INSERT INTO Livraison_payement_commande (id_commande, id_livreur, paye) VALUES (13, 9, 1);
INSERT INTO Livraison_payement_commande (id_commande, id_livreur, paye) VALUES (14, 1, 1);
INSERT INTO Livraison_payement_commande (id_commande, id_livreur, paye) VALUES (15, 6, 1);
INSERT INTO Livraison_payement_commande (id_commande, id_livreur, paye) VALUES (16, 2, 1);
INSERT INTO Livraison_payement_commande (id_commande, id_livreur, paye) VALUES (17, 9, 1);
INSERT INTO Livraison_payement_commande (id_commande, id_livreur, paye) VALUES (18, 4, 1);
INSERT INTO Livraison_payement_commande (id_commande, id_livreur, paye) VALUES (19, 1, 1);
INSERT INTO Livraison_payement_commande (id_commande, id_livreur, paye) VALUES (20, 3, 1);
INSERT INTO Livraison_payement_commande (id_commande, id_livreur, paye) VALUES (21, 7, 1);
INSERT INTO Livraison_payement_commande (id_commande, id_livreur, paye) VALUES (22, 5, 1);
INSERT INTO Livraison_payement_commande (id_commande, id_livreur, paye) VALUES (23, 9, 1);
INSERT INTO Livraison_payement_commande (id_commande, id_livreur, paye) VALUES (24, 8, 1);
INSERT INTO Livraison_payement_commande (id_commande, id_livreur, paye) VALUES (25, 6, 1);
INSERT INTO Livraison_payement_commande (id_commande, id_livreur, paye) VALUES (26, 2, 1);
INSERT INTO Livraison_payement_commande (id_commande, id_livreur, paye) VALUES (27, 4, 1);
INSERT INTO Livraison_payement_commande (id_commande, id_livreur, paye) VALUES (28, 1, 1);
INSERT INTO Livraison_payement_commande (id_commande, id_livreur, paye) VALUES (29, 3, 1);
INSERT INTO Livraison_payement_commande (id_commande, id_livreur, paye) VALUES (30, 7, 1);
INSERT INTO Livraison_payement_commande (id_commande, id_livreur, paye) VALUES (31, 5, 1);


INSERT INTO Commande (id_client, adresse, repere, date, latitude, longitude) VALUES
(1, 7, NULL, '2024-06-01 11:00:00', -18.8792, 47.5079),
(26, 36, NULL, '2024-06-01 18:00:00', -18.8725, 47.5114),
(2, 12, NULL, '2024-06-02 12:00:00', -18.8796, 47.5075),
(27, 4, NULL, '2024-06-02 19:00:00', -18.8720, 47.5118),
(3, 25, NULL, '2024-06-03 13:00:00', -18.8790, 47.5083),
(28, 19, NULL, '2024-06-03 11:00:00', -18.8715, 47.5122),
(4, 8, NULL, '2024-06-04 14:00:00', -18.8765, 47.5091),
(29, 47, NULL, '2024-06-04 12:00:00', -18.8710, 47.5125),
(5, 19, NULL, '2024-06-05 15:00:00', -18.8769, 47.5097),
(30, 22, NULL, '2024-06-05 13:00:00', -18.8705, 47.5128),
(6, 33, NULL, '2024-06-06 16:00:00', -18.8763, 47.5095),
(7, 10, NULL, '2024-06-07 17:00:00', -18.8758, 47.5089),
(8, 42, NULL, '2024-06-08 18:00:00', -18.8747, 47.5081),
(9, 16, NULL, '2024-06-09 19:00:00', -18.8752, 47.5073),
(10, 3, NULL, '2024-06-10 11:00:00', -18.8774, 47.5067),
(11, 28, NULL, '2024-06-11 12:00:00', -18.8778, 47.5074),
(12, 8, NULL, '2024-06-12 13:00:00', -18.8785, 47.5068),
(13, 49, NULL, '2024-06-13 14:00:00', -18.8791, 47.5062),
(14, 21, NULL, '2024-06-14 15:00:00', -18.8797, 47.5056),
(15, 11, NULL, '2024-06-15 16:00:00', -18.8802, 47.5063),
(16, 2, NULL, '2024-06-16 17:00:00', -18.8783, 47.5057),
(17, 38, NULL, '2024-06-17 18:00:00', -18.8777, 47.5064),
(18, 13, NULL, '2024-06-18 19:00:00', -18.8769, 47.5070),
(19, 31, NULL, '2024-06-19 11:00:00', -18.8763, 47.5076),
(20, 6, NULL, '2024-06-20 12:00:00', -18.8757, 47.5082),
(21, 17, NULL, '2024-06-21 13:00:00', -18.8752, 47.5088),
(22, 45, NULL, '2024-06-22 14:00:00', -18.8748, 47.5094),
(23, 9, NULL, '2024-06-23 15:00:00', -18.8742, 47.5100),
(24, 26, NULL, '2024-06-24 16:00:00', -18.8736, 47.5105),
(25, 14, NULL, '2024-06-25 17:00:00', -18.8730, 47.5110);


INSERT INTO Commande_plat (id_commande, id_plat, quantite, prix)
VALUES
-- Commande 1
(32, 1, 1, 20000.00),   -- Biriani foza de luxe
(32, 2, 2, 4000.00),    -- Akondro metissy BALAHAZO
(32, 3, 1, 10000.00),   -- Assiette vehihivavy

(33, 4, 3, 3000.00),    -- Dite manaikitra tenda
(33, 5, 1, 10500.00),   -- Akohooo na matata

(34, 1, 2, 20000.00),   -- Biriani foza de luxe
(34, 2, 1, 4000.00),    -- Akondro metissy BALAHAZO

(35, 3, 1, 10000.00),   -- Assiette vehihivavy
(35, 5, 2, 21000.00),   -- Akohooo na matata

(36, 2, 1, 4000.00),    -- Akondro metissy BALAHAZO
(36, 3, 2, 20000.00),   -- Assiette vehihivavy

(37, 1, 1, 20000.00),   -- Biriani foza de luxe
(37, 4, 2, 6000.00),    -- Dite manaikitra tenda

(38, 5, 3, 31500.00),   -- Akohooo na matata
(38, 2, 1, 4000.00),    -- Akondro metissy BALAHAZO

(39, 3, 1, 10000.00),   -- Assiette vehihivavy
(39, 1, 2, 40000.00),   -- Biriani foza de luxe

(40, 2, 1, 4000.00),    -- Akondro metissy BALAHAZO
(40, 4, 2, 6000.00),    -- Dite manaikitra tenda

(41, 5, 2, 21000.00),  -- Akohooo na matata
(41, 3, 1, 10000.00),  -- Assiette vehihivavy

(42, 1, 2, 20000.00),  -- Biriani foza de luxe
(42, 2, 1, 4000.00),   -- Akondro metissy BALAHAZO

(43, 3, 1, 10000.00),  -- Assiette vehihivavy
(43, 5, 2, 21000.00),  -- Akohooo na matata

(44, 2, 1, 4000.00),   -- Akondro metissy BALAHAZO
(44, 3, 2, 20000.00),  -- Assiette vehihivavy

(45, 1, 1, 20000.00),  -- Biriani foza de luxe
(45, 4, 2, 6000.00),   -- Dite manaikitra tenda

(46, 5, 3, 31500.00),  -- Akohooo na matata
(46, 2, 1, 4000.00),   -- Akondro metissy BALAHAZO

(47, 3, 1, 10000.00),  -- Assiette vehihivavy
(47, 1, 2, 40000.00),  -- Biriani foza de luxe

(48, 2, 1, 4000.00),   -- Akondro metissy BALAHAZO
(48, 4, 2, 6000.00),   -- Dite manaikitra tenda

(49, 5, 2, 21000.00),  -- Akohooo na matata
(49, 3, 1, 10000.00),  -- Assiette vehihivavy


(50, 1, 2, 20000.00),  -- Biriani foza de luxe
(50, 2, 1, 4000.00),   -- Akondro metissy BALAHAZO

(51, 3, 1, 10000.00),  -- Assiette vehihivavy
(51, 5, 2, 21000.00),  -- Akohooo na matata

(52, 2, 1, 4000.00),   -- Akondro metissy BALAHAZO
(52, 3, 2, 20000.00),  -- Assiette vehihivavy


(53, 1, 1, 20000.00),  -- Biriani foza de luxe
(53, 4, 2, 6000.00),   -- Dite manaikitra tenda

(54, 5, 3, 31500.00),  -- Akohooo na matata
(54, 2, 1, 4000.00),   -- Akondro metissy BALAHAZO

(55, 3, 1, 10000.00),  -- Assiette vehihivavy
(55, 1, 2, 40000.00),  -- Biriani foza de luxe

(56, 2, 1, 4000.00),   -- Akondro metissy BALAHAZO
(56, 4, 2, 6000.00),   -- Dite manaikitra tenda

(57, 5, 2, 21000.00),  -- Akohooo na matata
(57, 3, 1, 10000.00),  -- Assiette vehihivavy

(58, 1, 2, 40000.00),  -- Biriani foza de luxe
(58, 2, 1, 4000.00),   -- Akondro metissy BALAHAZO

(58, 3, 1, 10000.00),  -- Assiette vehihivavy
(58, 5, 2, 21000.00),  -- Akohooo na matata

(59, 2, 1, 4000.00),   -- Akondro metissy BALAHAZO
(59, 3, 2, 20000.00),  -- Assiette vehihivavy

(60, 1, 1, 20000.00),  -- Biriani foza de luxe
(60, 4, 2, 6000.00);   -- Dite manaikitra tenda


INSERT INTO Livraison_payement_commande (id_commande, id_livreur, paye)
VALUES
(32, 1, 1),

(33, 2, 1),

(34, 3, 1),

(35, 4, 1),

(36, 5, 1),

(37, 6, 1),

(38, 7, 1),

(39, 8, 1),

(40, 9, 1),

(41, 1, 1),

(42, 2, 1),

(43, 3, 1),

(44, 4, 1),

(45, 5, 1),

(46, 6, 1),

(47, 7, 1),

(48, 8, 1),

(49, 9, 1),

(50, 1, 1),

(51, 2, 1),

(52, 3, 1),

(53, 4, 1),

(54, 5, 1),

(55, 6, 1),

(56, 7, 1),

(57, 8, 1),

(58, 9, 1),

(59, 1, 1),

(60, 2, 1),

(61, 3, 1);

-- Mise en avant 1
INSERT INTO Mise_en_avant (id_resto, id_prix, prix, date, duree)
VALUES (1, 1, 200000.00, '2024-06-01', 4);

-- Mise en avant 2
INSERT INTO Mise_en_avant (id_resto, id_prix, prix, date, duree)
VALUES (2, 1, 200000.00, '2024-06-05', 1);

-- Mise en avant 3
INSERT INTO Mise_en_avant (id_resto, id_prix, prix, date, duree)
VALUES (3, 1, 200000.00, '2024-06-10', 1);
