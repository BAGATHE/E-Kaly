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

    CASE 
        WHEN idRecuperation = idLivraison THEN
            SELECT tarif_min INTO frais FROM Tarif_livraison;
        WHEN EXISTS (
            SELECT 1
            FROM Voisin 
            WHERE (id_adresse1 = idRecuperation AND id_adresse2 = idLivraison) OR
                  (id_adresse1 = idLivraison AND id_adresse2 = idRecuperation)
        ) THEN
            SELECT tarif_moyen INTO frais FROM Tarif_livraison;
        ELSE
            SELECT tarif_max INTO frais FROM Tarif_livraison;
    END CASE;

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
ORDER BY 
    mise_en_avant_valide DESC, 
    note_moyenne DESC;

