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
(1, 1, 1, 20000.00),   -- Biriani foza de luxe
(1, 2, 2, 4000.00),    -- Akondro metissy BALAHAZO
(1, 3, 1, 10000.00),   -- Assiette vehihivavy

-- Commande 2
(2, 4, 3, 3000.00),    -- Dite manaikitra tenda
(2, 5, 1, 10500.00),   -- Akohooo na matata

-- Commande 3
(3, 1, 2, 20000.00),   -- Biriani foza de luxe
(3, 2, 1, 4000.00),    -- Akondro metissy BALAHAZO

-- Commande 4
(4, 3, 1, 10000.00),   -- Assiette vehihivavy
(4, 5, 2, 21000.00),   -- Akohooo na matata

-- Commande 5
(5, 2, 1, 4000.00),    -- Akondro metissy BALAHAZO
(5, 3, 2, 20000.00),   -- Assiette vehihivavy

-- Commande 6
(6, 1, 1, 20000.00),   -- Biriani foza de luxe
(6, 4, 2, 6000.00),    -- Dite manaikitra tenda

-- Commande 7
(7, 5, 3, 31500.00),   -- Akohooo na matata
(7, 2, 1, 4000.00),    -- Akondro metissy BALAHAZO

-- Commande 8
(8, 3, 1, 10000.00),   -- Assiette vehihivavy
(8, 1, 2, 40000.00),   -- Biriani foza de luxe

-- Commande 9
(9, 2, 1, 4000.00),    -- Akondro metissy BALAHAZO
(9, 4, 2, 6000.00),    -- Dite manaikitra tenda

-- Commande 10
(10, 5, 2, 21000.00),  -- Akohooo na matata
(10, 3, 1, 10000.00),  -- Assiette vehihivavy

-- Commande 11
(11, 1, 2, 20000.00),  -- Biriani foza de luxe
(11, 2, 1, 4000.00),   -- Akondro metissy BALAHAZO

-- Commande 12
(12, 3, 1, 10000.00),  -- Assiette vehihivavy
(12, 5, 2, 21000.00),  -- Akohooo na matata

-- Commande 13
(13, 2, 1, 4000.00),   -- Akondro metissy BALAHAZO
(13, 3, 2, 20000.00),  -- Assiette vehihivavy

-- Commande 14
(14, 1, 1, 20000.00),  -- Biriani foza de luxe
(14, 4, 2, 6000.00),   -- Dite manaikitra tenda

-- Commande 15
(15, 5, 3, 31500.00),  -- Akohooo na matata
(15, 2, 1, 4000.00),   -- Akondro metissy BALAHAZO

-- Commande 16
(16, 3, 1, 10000.00),  -- Assiette vehihivavy
(16, 1, 2, 40000.00),  -- Biriani foza de luxe

-- Commande 17
(17, 2, 1, 4000.00),   -- Akondro metissy BALAHAZO
(17, 4, 2, 6000.00),   -- Dite manaikitra tenda

-- Commande 18
(18, 5, 2, 21000.00),  -- Akohooo na matata
(18, 3, 1, 10000.00),  -- Assiette vehihivavy

-- Commande 19
(19, 1, 2, 20000.00),  -- Biriani foza de luxe
(19, 2, 1, 4000.00),   -- Akondro metissy BALAHAZO

-- Commande 20
(20, 3, 1, 10000.00),  -- Assiette vehihivavy
(20, 5, 2, 21000.00),  -- Akohooo na matata

-- Commande 21
(21, 2, 1, 4000.00),   -- Akondro metissy BALAHAZO
(21, 3, 2, 20000.00),  -- Assiette vehihivavy

-- Commande 22
(22, 1, 1, 20000.00),  -- Biriani foza de luxe
(22, 4, 2, 6000.00),   -- Dite manaikitra tenda

-- Commande 23
(23, 5, 3, 31500.00),  -- Akohooo na matata
(23, 2, 1, 4000.00),   -- Akondro metissy BALAHAZO

-- Commande 24
(24, 3, 1, 10000.00),  -- Assiette vehihivavy
(24, 1, 2, 40000.00),  -- Biriani foza de luxe

-- Commande 25
(25, 2, 1, 4000.00),   -- Akondro metissy BALAHAZO
(25, 4, 2, 6000.00),   -- Dite manaikitra tenda

-- Commande 26
(26, 5, 2, 21000.00),  -- Akohooo na matata
(26, 3, 1, 10000.00),  -- Assiette vehihivavy

-- Commande 27
(27, 1, 2, 40000.00),  -- Biriani foza de luxe
(27, 2, 1, 4000.00),   -- Akondro metissy BALAHAZO

-- Commande 28
(28, 3, 1, 10000.00),  -- Assiette vehihivavy
(28, 5, 2, 21000.00),  -- Akohooo na matata

-- Commande 29
(29, 2, 1, 4000.00),   -- Akondro metissy BALAHAZO
(29, 3, 2, 20000.00),  -- Assiette vehihivavy

-- Commande 30
(30, 1, 1, 20000.00),  -- Biriani foza de luxe
(30, 4, 2, 6000.00);   -- Dite manaikitra tenda


INSERT INTO Livraison_payement_commande (id_commande, id_livreur, paye)
VALUES
-- Commande 1
(1, 1, 1),

-- Commande 2
(2, 2, 1),

-- Commande 3
(3, 3, 1),

-- Commande 4
(4, 4, 1),

-- Commande 5
(5, 5, 1),

-- Commande 6
(6, 6, 1),

-- Commande 7
(7, 7, 1),

-- Commande 8
(8, 8, 1),

-- Commande 9
(9, 9, 1),

-- Commande 10
(10, 1, 1),

-- Commande 11
(11, 2, 1),

-- Commande 12
(12, 3, 1),

-- Commande 13
(13, 4, 1),

-- Commande 14
(14, 5, 1),

-- Commande 15
(15, 6, 1),

-- Commande 16
(16, 7, 1),

-- Commande 17
(17, 8, 1),

-- Commande 18
(18, 9, 1),

-- Commande 19
(19, 1, 1),

-- Commande 20
(20, 2, 1),

-- Commande 21
(21, 3, 1),

-- Commande 22
(22, 4, 1),

-- Commande 23
(23, 5, 1),

-- Commande 24
(24, 6, 1),

-- Commande 25
(25, 7, 1),

-- Commande 26
(26, 8, 1),

-- Commande 27
(27, 9, 1),

-- Commande 28
(28, 1, 1),

-- Commande 29
(29, 2, 1),

-- Commande 30
(30, 3, 1);



-- Mise en avant 1
INSERT INTO Mise_en_avant (id_resto, id_prix, prix, date, duree)
VALUES (1, 1, 200000.00, '2024-06-01', 4);

-- Mise en avant 2
INSERT INTO Mise_en_avant (id_resto, id_prix, prix, date, duree)
VALUES (2, 1, 200000.00, '2024-06-05', 1);

-- Mise en avant 3
INSERT INTO Mise_en_avant (id_resto, id_prix, prix, date, duree)
VALUES (3, 1, 200000.00, '2024-06-10', 1);
