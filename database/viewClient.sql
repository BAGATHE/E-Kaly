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