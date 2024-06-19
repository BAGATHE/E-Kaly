-- info complet Plat resto avec note
create or replace view v_infoPlatNote AS
select 
    vrp.id_resto,
    vrp.id_plat,
    vrp.description,
    vrp.prix,
    avg(np.note) as note
from 
    v_resto_plat as vrp
join 
    Note_plat as np
on 
    vrp.id_plat = np.id_plat
GROUP by 
    vrp.id_plat,vrp.id_resto;

-- info complet Resto avec note
create or replace view v_infoRestoNote as
select 
    r.id,
    r.nom as resto,
    r.id_adresse, 
    a.nom as adresse,
    r.email,
    avg(nr.note) as note 
from 
    resto as r
join 
    Adresse as a
on r.id_adresse = a.id
join
    Note_resto as nr
on 
    r.id = nr.id_resto
GROUP by 
    r.id;


DELIMITER //

CREATE OR REPLACE FUNCTION func_getfraisLivraison (idRecuperation INT, idLivraison INT)
RETURNS DECIMAL(10,2)
BEGIN
    DECLARE frais DECIMAL(10,2);

    IF idRecuperation = idLivraison THEN
        SELECT tarif_min INTO frais FROM Tarif_livraison;
    ELSEIF EXISTS (
        SELECT 1
        FROM Voisin 
        WHERE (id_adresse1 = idRecuperation AND id_adresse2 = idLivraison) OR
              (id_adresse1 = idLivraison AND id_adresse2 = idRecuperation)
    ) THEN
        SELECT tarif_moyen INTO frais FROM Tarif_livraison;
    ELSE
        SELECT tarif_max INTO frais FROM Tarif_livraison;
    END IF;

    RETURN frais;
END //

DELIMITER ;



CREATE OR REPLACE VIEW v_note_moyenne_par_resto AS
SELECT 
    id_resto, 
    AVG(note) AS note_moyenne
FROM 
    Note_resto
GROUP BY 
    id_resto;

CREATE OR REPLACE VIEW v_liste_resto_avec_note_et_mise_en_avant AS
SELECT 
    r.id AS id_resto,
    r.nom AS nom_resto,
    r.id_adresse,
    ir.repere,
    ir.description,
    ir.telephone,
    COALESCE(nm.note_moyenne, 0) AS note_moyenne,
    CASE 
        WHEN CURDATE() BETWEEN vad.date_debut AND vad.date_fin THEN 1 
        ELSE 0 
    END AS mise_en_avant_valide
FROM 
    Resto r
LEFT JOIN 
    v_note_moyenne_par_resto nm ON r.id = nm.id_resto
LEFT JOIN 
    v_mise_en_avant_dates vad ON r.id = vad.id_resto
LEFT JOIN 
    Info_resto ir ON r.id = ir.id_resto
ORDER BY 
    mise_en_avant_valide DESC, 
    note_moyenne DESC;

CREATE OR REPLACE VIEW v_resto_info AS
SELECT 
    r.id AS id_resto,
    r.nom AS nom_resto,
    r.email, 
    ir.nom AS nom_info, 
    a.nom AS adresse,
    ir.adresse AS id_adresse, 
    ir.repere, 
    ir.description, 
    ir.telephone, 
    ir.heure_ouverture, 
    ir.heure_fermeture,
    COALESCE(nm.note_moyenne, 0) AS note_moyenne,
    ir.image
FROM 
    Resto r
LEFT JOIN 
    Info_resto ir ON r.id = ir.id_resto
LEFT JOIN 
    v_note_moyenne_par_resto nm on nm.id_resto=ir.id_resto
LEFT JOIN 
    Adresse a ON ir.adresse = a.id;

CREATE OR REPLACE VIEW v_liste_resto_complet AS
SELECT
  vl.id_resto,
  vl.nom_resto,
  a.nom AS adresse,
  ir.repere,
  ir.description,
  ir.telephone,
  ir.heure_ouverture,
  ir.heure_fermeture,
  ir.image,
  vl.note_moyenne,
  vl.mise_en_avant_valide
FROM
  v_liste_resto_avec_note_et_mise_en_avant vl
LEFT JOIN
  Info_resto ir ON vl.id_resto = ir.id_resto
LEFT JOIN
  Adresse a ON ir.adresse = a.id
ORDER BY
  vl.mise_en_avant_valide DESC,
  vl.note_moyenne DESC;


DELIMITER //

CREATE or REPLACE PROCEDURE procedure_getRestoFavorisClient(IN idClient INT)
BEGIN
    SELECT
        r.id AS id_resto,
        r.nom AS nom_resto,
        r.id_adresse,
        ir.repere,
        ir.description,
        ir.telephone,
        ir.heure_ouverture,
        ir.heure_fermeture
    FROM Resto r
    JOIN Favori_client fc ON r.id = fc.id_resto
    JOIN Info_resto ir ON r.id = ir.id_resto
    WHERE fc.id_client = idClient;
END //
DELIMITER ;