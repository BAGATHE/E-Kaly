-- 1-fonction algorithme qui choisi quelle livreur peut voir la commande 
-- a-algo
create or replace view v_voisin_details as 
select 
	v.*,
    a.nom as adresse1,
    a1.nom as adresse2
from	
	Voisin as v
join 
	Adresse as a
on
	v.id_adresse1 = a.id
join 
	Adresse as a1
on 
	v.id_adresse2 = a1.id;

create or replace view v_voisin_livreur as 
select 
    vvd.*,
    il.id_livreur,
    il.nom_complet
from 
    v_voisin_details as vvd
join 
    Info_livreur as il
on 
    il.adresse = vvd.id_adresse1;


create or replace view v_voisin_livreur_Commande AS
select 
    vvl.*,
    c.id as id_commande,
    c.id_client,
    c.repere
from 
    v_voisin_livreur as vvl
join 
    Commande as c 
on 
    vvl.id_adresse2 = c.adresse;

create or replace view v_voisin_livreur_Commande_Status AS
select
    vvlcs.*
from 
    v_voisin_livreur_Commande as vvlcs
join 
    Status as s
on 
    s.id_livreur = vvlcs.id_livreur and s.status = 'dispo';

create or replace view v_cross_livreur_commande as
SELECT 
    Livreur.id AS id_livreur,
    Commande.id AS id_commande,
    Commande.date
FROM 
    Commande
CROSS JOIN 
    Livreur
LEFT JOIN 
    Livraison_payement_commande ON Commande.id = Livraison_payement_commande.id_commande
WHERE 
    Livraison_payement_commande.id IS NULL;

    
create or replace view v_livreur_commande as 
SELECT 
    COALESCE(clc.id_livreur, vlcs.id_livreur) AS id_livreur,
    COALESCE(clc.id_commande, vlcs.id_commande) AS id_commande,
    vlcs.date
from 
	v_cross_livreur_commande as vlcs
left join 
	v_voisin_livreur_Commande_Status as clc
on 
	clc.id_commande = vlcs.id_commande
group by 
	id_livreur,id_commande
order by 
	id_livreur,id_commande ASC ;



-- affichage de tout les commandes avec le livreur qui effectue la livraison 
create or replace VIEW v_frais_livraison_par_commande_livreur_Commande as
select 
    vrpcpc.*,
    lpc.id_livreur
from 
    v_resto_plat_Commande_plat_Commande as vrpcpc
join
     Livraison_payement_commande as lpc
on 
   vrpcpc.id_commande =  lpc.id_commande;

-- 2-affichage
create or replace view v_frais_livraison as
SELECT 
    id_resto,
    id_adresse AS recuperation,
    id_commande,
    date,
    id_client,
    destination,
    (
        CASE 
            WHEN id_adresse = destination THEN (SELECT tarif_min FROM Tarif_livraison)
            WHEN (
                    SELECT 
                        COUNT(*)
                    FROM 
                        Voisin 
                    WHERE 
                        (id_adresse1 = id_adresse AND id_adresse2 = destination) OR
                        (id_adresse1 = destination AND id_adresse2 = id_adresse) 
                ) > 0  
            THEN
                (SELECT tarif_moyen FROM Tarif_livraison)
        ELSE
            (SELECT tarif_max FROM Tarif_livraison) 
    END
    ) AS frais_livraison
FROM 
    v_resto_plat_Commande_plat_Commande
GROUP BY id_commande;


create or replace view v_frais_livraison_commission as
select 
    *, 
    frais_livraison * (select commission_livreur from Commission_admin)/100 as commission 
from
    v_frais_livraison;

create or replace view v_frais_livraison_commission_detail AS
select 
    vfl.id_commande,
    r.nom as nom_resto,
    a1.nom as recuperation,
    c.nom as client,
    c.telephone,
    a2.nom as destination,
    vfl.frais_livraison,
    vfl.commission,
    date
from
    v_frais_livraison_commission as vfl
join Resto as r on r.id = vfl.id_resto
join Client as c on c.id = vfl.id_client
join Adresse as a1 on a1.id = vfl.recuperation
join Adresse as a2 on a2.id = vfl.destination;


create or replace view v_livreur_commande_frais_commission as
select 
    vlc.id_livreur,
    vlc.id_commande,
    vlc.date,
    flcd.nom_resto,
    flcd.recuperation,
    flcd.client,
    flcd.telephone,
    flcd.destination,
    flcd.frais_livraison,
    flcd.commission
from 
    v_livreur_commande as vlc
join 
    v_frais_livraison_commission_detail as flcd
on 
    vlc.id_commande = flcd.id_commande
order by 
    vlc.id_livreur, vlc.id_commande;



CREATE OR REPLACE VIEW v_liste_livraison_livreur_jour AS
SELECT
    c.id AS id_commande,
    l.id AS id_livreur,
    a.nom AS adresse,
    r.nom AS resto,
    c.date AS date_commande,
    lp.paye AS status_livraison,
    c.latitude AS latitude_commande,
    c.longitude AS longitude_commande,
    ir.latitude AS latitude_resto,
    ir.longitude AS longitude_resto,
    aa.nom AS adresse_resto,
    c.repere AS repere_commande
FROM
    Commande c
JOIN
    Livraison_payement_commande lp ON c.id = lp.id_commande
JOIN
    Livreur l ON lp.id_livreur = l.id
JOIN
    Commande_plat cp ON c.id = cp.id_commande
JOIN
    Plat p ON cp.id_plat = p.id
JOIN
    Resto r ON p.id_resto = r.id
JOIN
    Adresse a ON c.adresse = a.id
JOIN
    Info_resto ir ON r.id = ir.id_resto
JOIN
    Adresse aa ON ir.adresse = aa.id
GROUP BY
    id_commande, resto;




CREATE OR REPLACE VIEW v_livraison_livreur_avec_gain AS
SELECT
    vlllj.id_commande,
    vlllj.id_livreur,
    vlllj.date_commande,
    vlllj.resto,
    vlllj.adresse,
    vlllj.status_livraison,
    vlllj.latitude_commande,
    vlllj.longitude_commande,
    vlllj.latitude_resto,
    vlllj.longitude_resto,
    COALESCE(g.montant, 0) AS gain,
    vlllj.adresse_resto,
    vlllj.repere_commande
FROM 
    v_liste_livraison_livreur_jour vlllj
LEFT JOIN
    Payement g ON vlllj.id_commande  = g.id_commande
GROUP BY
    vlllj.id_commande;


-- Statistique livreur

CREATE OR REPLACE VIEW v_commande_payes AS 
SELECT* FROM Livraison_payement_commande WHERE paye=1; 

CREATE OR REPLACE VIEW v_total_commission_frais_livraison_par_jour AS
    SELECT
    cp.id_livreur,
    DAY(date) as day,
    MONTH(date) as month,
    YEAR(date) as year,
    DATE(date) as date,
    SUM(commission) AS somme_commission,
    SUM(frais_livraison) as somme_frais_livraison
FROM
    v_frais_livraison_commission_detail flc
JOIN v_commande_payes cp 
    ON flc.id_commande= cp.id_commande
GROUP BY
    DATE(date);

create or replace view v_livreur_commande_frais_commission_payement as
select 
    lcfc.id_livreur,
    lcfc.id_commande,
    lcfc.date,
    lcfc.nom_resto,
    lcfc.recuperation,
    lcfc.client,
    lcfc.telephone,
    lcfc.destination,
    lcfc.frais_livraison,
    lcfc.commission,
    case when lpc.id_livreur is null then false else true end as livree
from 
    v_livreur_commande_frais_commission as lcfc
left join 
    Livraison_payement_commande as lpc
on 
    lcfc.id_commande = lpc.id_commande
order by 
    lcfc.id_livreur, lcfc.id_commande;
