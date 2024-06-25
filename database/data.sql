--Insertion dans la table Admis
INSERT INTO Admis (nom, prenom, email, mot_de_pass) VALUES
('admin1', 'admin1', 'admin1@gmail.com', 'admin1'),
('admin2', 'admin2', 'admin2@gmail.com', 'admin2');


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
('Antohomadinika'),
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
('Tsaralalana'),
('Tsimbazaza'),
('Tsarasaotra'),
('Tanjombato'),
('Anosy'),
('Ampefiloha'),
('67ha'),
('Andoharanofotsy'),
('Ankadimbahoaka'),
('Soanierana'),
('Iavoloha'),
('Ankorondrano'),
('Soarano'),
('Tsiadana'),
('Ivandry'),
('Andraharo'),
('Analamahintsy'),
('Avaradoha'),
('Ambodivona'),
('Antsahabe'),
('Alasora'),
('Nanisana'),
('Ambatobe'),
('Ambohimanarina'),
('Ambohibao'),
('Antaninarenina'),
('Ambohipo'),
('Ampandrana'),
('Ambohijatovo'),
('Andohalo');

-- inserer voisin de l'adresse
INSERT INTO `Voisin` (`id_adresse1`,`id_adresse2`) VALUES
('1','11'),
('1','33'),
('1','21'),
('2','11'),
('2','7'),
('2','12'),
('3','17'),
('3','25'),
('3','22'),
('4','40'),
('4','48'),
('5','6'),
('5','27'),
('6','5'),
('6','27'),
('7','2'),
('7','8'),
('8','16'),
('8','27'),
('9','12'),
('9','13'),
('10','19'),

('11','2'),
('11','7'),
('11','1'),
('12','13'),
('12','38'),
('13','12'),
('13','38'),
('14','1'),
('14','2'),
('15','16'),
('15','21'),
('15','26'),
('16','27'),
('16','26'),
('16','21'),
('17','26'),
('17','25'),
('17','3'),
('18','45'),
('18','44'),
('19','39'),
('20','27'),
('20','16'),
('20','8'),
('21','15'),
('21','1'),
('21','33'),
('22','3'),
('22','17'),
('22','25'),
('23','45'),
('23','18'),
('23','44'),
('24','29'),
('24','28'),
('24','30'),
('25','17'),
('25','26'),
('25','3'),
('26','25'),
('26','27'),
('26','15'),
('27','16'),
('27','5'),
('27','16'),
('28','29'),
('28','24'),
('28','31'),
('29','30'),
('29','24'),
('30','29'),
('30','24'),
('30','3'),
('31','28'),
('32','35'),
('32','7'),
('33','1'),
('33','11'),
('33','21'),
('34','4'),
('34','47'),
('35','32'),
('36','44'),
('36','47'),
('37','43'),
('37','45'),
('38','12'),
('38','13'),
('39','19'),
('39','2'),
('40','3'),
('40','17'),
('40','48'),
('41','29'),
('41','24'),
('41','4'),
('42','19'),
('42','37'),
('42','38'),
('43','42'),
('43','37'),
('44','45'),
('44','36'),
('45','44'),
('45','23'),
('45','18'),
('46','15'),
('46','21'),
('47','3'),
('48','2'),
('48','7'),
('48','11'),
('49','1'),
('49','50'),
('50','49'),
('50','50');


-- Insérer des données dans la table Resto
INSERT INTO Resto (nom,id_adresse, email,mot_de_pass) VALUES
('PAKOPAKO',7,'pakopako@gmail.com', 'pakopako'),
('Chez Madama',28,'madama@gmail.com','madama'),
('Selesy',49,'selesy@gmail.com','selesy');


-- Insertion des données dans la table Info_resto
INSERT INTO Info_resto (id_resto, nom, adresse, repere,description, heure_ouverture, heure_fermeture,latitude,longitude,image) VALUES
(1, 'PAKOPAKO', 7,'Skate park', 'Venez savourez de bon Plat chez PAKOPAKO', '11:30:00', '19:00:00',-18.8983496847481,47.52367911306232,'pakopako.png'),
(2, 'Chez Madama', 28,'ITU Andoharanofotsy','tongava misakafo', '11:00:00', '18:00:00',-18.98599963341681,47.53279656171799,null),
(3, 'Selesy', 15,'Rond point Faravohitra ',' ', '10:00:00', '18:00:00',-18.914764079712324,47.531726360321045,'selesy.jpg'),
(4,'Bon appetit',48,'ampandrana','Bon appetit','08:30:00','22:00:00',-18.905216763768436,47.53353602027097,'pao.jpg'),
(5,'Passion coco',27,'67ha nord ouest','Saveur coco','08:00:00','12:00:00',-18.902869849546796,47.50907892132396,'passion.png'),
(6,'CHIKY',11,'chiky Behoririka','chiken chiken','08:00:00','18:00:00',-18.901876022333454,47.527863485616614,'chiky.jpg'),
(7,'Xin Hai',1,'Ambodifilao Analakey','chinesse','13:00:00','20:30:00',-18.908479328941524,47.52671997071501,'xi.jpg'),
(8,'DROPZON',2,'Ankadifotsy','drop drop','08:00:00','13:00:00',-18.896887319553702,47.52277851104736,'drop.JPG'),
(9,'O zone',15,'Isoraka','ozone','10:00:00','20:00:00',-18.912212391314878,47.52065225505948,'ozone.jpeg');




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



INSERT INTO Status(id_livreur,status) VALUES (1,'dispo');
INSERT INTO Status(id_livreur,status) VALUES (2,'dispo');
INSERT INTO Status(id_livreur,status) VALUES (3,'dispo');
INSERT INTO Status(id_livreur,status) VALUES (4,'non-dispo');
INSERT INTO Status(id_livreur,status) VALUES (5,'dispo');
INSERT INTO Status(id_livreur,status) VALUES (6,'dispo');
INSERT INTO Status(id_livreur,status) VALUES (7,'dispo');



-- Insérer des données dans la table Plat
INSERT INTO Plat (id_resto, description, prix,image) VALUES
(1, 'Biriani foza de luxe',20000,"biriani.jpg"),
(1, 'Akondro metissy BALAHAZO',4000,"balahazo.jpg"),
(1, 'Assiette vehihivavy',10000,"vehivavy.jpg"),
(1, 'Dite manaikitra tenda',3000,"dithe.jpg"),
(1,'Akohooo na matata',10500,'akohooo.jpg'),
(2, 'Akoho sauce + Achard', 6000,null),
(2, 'steak sy vary', 6000,null),
(2, 'saucisse sy haricot', 5000,null),
(2, 'poisson frite', 7000,null),
(3, 'Big mofo anana',3000,'mofo_anana_GM.jpg'),
(3, 'Mofo anana',1000,'mofo_anana.png'),
(3, 'Mofo akondro gold',2000,'mofo_akondro_gold.jpg'),
(3,'Mofo akondro tsotra',500,'mofo_akondro_tsotra.jpg'),
(3,'Mofo akondro VIP',1000,'mofo_akondro.jpg'),
(4,'Biscottine de crevette',27500,'biscotine.JPG'),
(4,'TSASIOU MIEL',1900,'miel.jpg'),
(4,'nem tsasiou',11500,'nem.JPG'),
(4,'VAN TAN FRIT',9500,'fitte.JPG'),
(5,'POISSON CREVETTE COCO',25000,'poisson.png'),
(5,'VIANDE RITRA RAVITOTO SPECIAL',20000,'ravitoto.png'),
(5,'CANARD RITRA FACON COTIER',2000,'canard.png'),
(5,'CREVETTE COCO',20000,'coco.png'),
(5,'POISSON COCO',20000,'poison_coco.png'),
(6,'CRISPY BUCKET',80000,'crispy.jpg'),
(6,'DOBLO',18000,'doblo.PNG'),
(6,'CHIKY BALLS',8000,'balls.JPG'),
(6,'MAXI GRILLED',98000,'maxi.JPG'),
(6,'DUO',42000,'duo.JPG'),
(7,'Nouilles sauce',12000,'nouilles.jpg'),
(7,'SESAME CHIKEN',12000,'sesame.jpg'),
(7,'Curry Chiken',12000,'curry.jpg'),
(7,'Brochette de poulet',7000,'brochette.jpg'),
(7,'MINE SAO PORC',12000,'minesao.jpg'),
(8,'Salade Fraicheur',18000,'salade.jpg'),
(8,'Nouille sautees tsa siu',18000,'tsasiu'),
(8,'RIBS',21000,'ribs.jpg'),
(8,'BO BUN',19000,'bo.jpg'),
(8,'Beignets de crevettes',18000,'beignet.jpg'),
(9,'Riz cantonnais au crevette',12000,'ananas.jpg'),
(9,'Riz cantonnais fruit de mer',12000,'fuit.jpg'),
(9,'Riz au panne croustillant',19000,'panne.jpg'),
(9,'Riz au canard laque',25000,'canard.jpg'),
(9,'riz cantonnais au boeuf',17000,'boeuf.jpg');


INSERT INTO Change_quantite_plat (id_plat, date, production) VALUES
(1, '2024-06-01 08:00:00', 15),
(2, '2024-06-01 08:00:00', 25),
(3, '2024-06-01 08:00:00', 20),
(4, '2024-06-01 08:00:00', 30),
(5, '2024-06-01 08:00:00', 30),
(6, '2024-06-01 08:00:00', 15),
(7, '2024-06-01 08:00:00', 10),
(8, '2024-06-01 08:00:00', 10),
(9, '2024-06-01 08:00:00', 100),
(10, '2024-06-01 08:00:00', 100),
(11, '2024-06-01 08:00:00', 100);


-- Insérer des données dans la table Commande
INSERT INTO Commande (id_client,adresse,repere,date,latitude,longitude) VALUES(1,7,"Iscam",'2024-06-22 08:00:00',-18.9292156,47.4981480);
INSERT INTO Commande (id_client,adresse,repere,date,latitude,longitude) VALUES(1,7,"Iscam",'2024-06-22 10:00:00',-18.9292156,47.4981480);


-- Insérer des données dans la table Commande_plat
-- (Assumant que vous avez une table Commande déjà créée)
INSERT INTO Commande_plat (id_commande, id_plat, quantite, prix) VALUES(1, 1, 2, 8000);
INSERT INTO Commande_plat (id_commande, id_plat, quantite, prix) VALUES(1, 2, 2, 4000);
INSERT INTO Commande_plat (id_commande, id_plat, quantite, prix) VALUES(2, 2, 4, 4000);

-- Insérer des données dans la table Commission_admin
INSERT INTO Commission_admin (commission_resto,commission_livreur) VALUES (5,30);


-- Insérer des données dans la table Livraison_payement_commande
--INSERT INTO Livraison_payement_commande ( id_commande, id_livreur,paye) VALUES();

INSERT INTO Note_plat (id_client, id_plat, note) VALUES
(1, 1, 4),
(2, 1, 5),
(3, 2, 3);

INSERT INTO Note_resto (id_client, id_resto, note) VALUES
(1, 1, 4),
(2, 1, 1),
(3, 2, 4);

INSERT INTO Prix_mise_en_avant(prix) VALUES(200000);

INSERT INTO Tarif_livraison (tarif_min,tarif_moyen,tarif_max)
VALUES (2000,4000,7000);
--teste