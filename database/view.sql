-- liste de tout les plat  jointure entre les resto et plat affiche tout les plat sans exxception
create or replace view  v_resto_plat AS
select 
    r.id as id_resto,
    p.id as id_plat,
    r.id_adresse,
    p.description ,
    p.prix
from 
    Resto as r
join 
    Plat AS p
ON
    r.id = p.id_resto;


-- liste de tout les commande effectuer sur la plateforme de  tout les  resto 
create or replace view v_resto_plat_Commande_plat AS
select 
    vrp.*,
    cp.quantite,
    cp.id_commande
from 
    v_resto_plat as vrp
join 
    Commande_plat as cp
on
    vrp.id_plat =  cp.id_plat;

-- liste de tout les commande effectuer sur la plateform avec nom client et la date 
create or replace view v_resto_plat_Commande_plat_Commande AS
select 
    vrpcp.*,
    c.date,
    c.id_client,
    c.adresse as destination
from 
    v_resto_plat_Commande_plat as vrpcp
join 
    Commande as c 
on 
    c.id = vrpcp.id_commande;

-- liste de details de tout les commande effetuer sur la plateforme de tout les resto 
create or replace view v_details_commande AS
select 
    vrpcpc.*,
    c.nom,
    c.prenom
from 
    v_resto_plat_Commande_plat_Commande as vrpcpc
join  
    Client as c 
on 
    vrpcpc.id_client = c.id;


-- affichage commission par commande de tout les commande exisant    avec date commande 
create or replace view v_commission_par_Commande_par_resto_par_jour as
select
    id_commande,
    id_resto,
    sum(prix * quantite) as prix_commande,
    date,
    sum(prix * quantite) as chiffreDAffaireResto,
    (sum(prix * quantite) * (select commission_resto from Commission_admin))/100 as commission
from 
    v_resto_plat_Commande_plat_Commande
group by
    id_commande,id_resto,DAY(date),MONTH(date),YEAR(date); 


-- notre revenue somme commissions des commandes  des resto grouper par jour 
create or replace view v_revenu_par_jour_resto_jour as
select 
    DAY(date) as day,
    MONTH(date) as month,
    YEAR(date) as year,
    sum(commission) as revenu
from 
    v_commission_par_Commande_par_resto_par_jour
group by
    day,month,year;  

-- notre revenue somme commissions des commandes  des resto grouper par mois
create or replace view v_revenu_par_jour_resto_mois as
select 
    month,
    year,
    sum(revenu) as revenu
from 
    v_revenu_par_jour_resto_jour
group by

    month,year;   
 
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



-- revenu total somme commission livreur et restaurant
create or replace view v_revenu_par_mois as
select 
    year,
    month,
    day,
    sum(revenu) as revenu_total
from (
    select 
        year,
        month,
        day,
        revenu
    from 
        v_revenu_par_jour_resto_jour
) as revenu_par_jour
group by
    year, month, day
order by
    year, month, day;


create or replace view v_revenu_par_an as
select 
    mois,
    annee,
    sum(revenu) as revenu_total
from (
    select 
        month as mois,
        year as annee,
        revenu
    from 
        v_revenu_par_jour_resto_mois
) as revenus_combines
group by
    mois, annee
order by
    annee, mois;


-- Historique des commande Commande Resto 
create or replace view v_historique_commande_restaurant as
select  
    cpc.id_commande,
    cpc.id_resto,
    c.id_client,
    cpc.commission,
    cpc.prix_commande as total,
    cpc.date,
    a.nom as adresse
from v_commission_par_Commande_par_resto_par_jour as cpc 
join Commande c 
on cpc.id_commande=c.id
join Adresse a 
on a.id= c.adresse;


create or replace view v_historique_commande_restaurant_avec_nom_client as 
select 
    hcr.*,
    Client.nom as nom_client
from v_historique_commande_restaurant as hcr 
join Client 
on Client.id=hcr.id_client;

-- liste des detaisl de tout les commandes effectuer sur plateform
create or replace view v_details_commande as
select 
    id_commande,
    id_plat,
    quantite,
    prix as prix_unitaire,
    (quantite*prix) as total
from Commande_plat;

create or replace view v_details_commande_avec_nom_plat as
select 
    id_commande,
    id_plat,
    quantite,
    Plat.description,
    Plat.prix as prix_unitaire,
    (quantite*Plat.prix) as total
from Commande_plat
join Plat 
on Plat.id=Commande_plat.id_plat;


-- information global sur un plat 
create or replace view v_changement_quantite_plat  AS
select 
    vrp.*,
    cqp.date as date_changement,
    cqp.production
from 
    v_resto_plat as  vrp
join 
    Change_quantite_plat as cqp
on 
    vrp.id_plat = cqp.id_plat
GROUP BY
    vrp.id_plat,vrp.id_resto,DAY(cqp.date),MONTH(cqp.date),YEAR(cqp.date);

-- info avec note du plat
create or replace view v_info_global_plat_resto as 
select 
    vcqp.*,
    coalesce(avg(note),0) as note
FROM   
    v_changement_quantite_plat as vcqp
left join 
    Note_plat as np
on 
    np.id_plat = vcqp.id_plat
GROUP BY
    vcqp.id_plat,vcqp.id_resto,DAY(vcqp.date_changement),MONTH(vcqp.date_changement),YEAR(vcqp.date_changement);


-- revenu depense chiffre d affaire  resto 
create or replace view v_revenu_depense_chiffre_jour_for_resto as
select 
    DAY(date) as day,
    MONTH(date) as month,
    YEAR(date) as year,
    id_resto,
    sum(chiffreDAffaireResto) as chiffreDAffaireResto,
    sum(commission) as depense,
    sum(chiffreDAffaireResto) - sum(commission) as revenue
from 
    v_commission_par_Commande_par_resto_par_jour
group by
    id_resto,day,month,year;  


create or replace view v_revenu_depense_chiffre_mois_for_resto as
select 
    month,
    year,
    id_resto,
    sum(chiffreDAffaireResto) as chiffreDAffaireResto,
    sum(depense) as depense,
    sum(revenue) as revenue
from 
    v_revenu_depense_chiffre_jour_for_resto
group by

    id_resto,month,year;   

-- nombre plat vendu
create or replace view v_nombre_plat_vendu_resto_mois as 
select 
	*,
	month(date) as month,
    year(date) as year,
	count(id_plat) as vendu
from 
	v_resto_plat_Commande_plat_Commande 
group by
	id_plat,id_resto,month,year
order by 
	vendu DESC;

create or replace view v_nombre_plat_vendu_resto_annee as 
select 
    id_resto,
    id_plat,
    description,
    prix,
    quantite,
    id_commande,
    year,
    sum(vendu) as vendu
from 
	v_nombre_plat_vendu_resto_mois 
group by
	id_plat,id_resto,year
order by 
	vendu DESC;

-- Mise en avant + date_debut & date fin
CREATE OR REPLACE VIEW v_mise_en_avant_dates AS
select 
    id,
    id_resto, 
    date as date_debut,
    DATE_ADD(date, INTERVAL duree MONTH) as date_fin,
    duree,
    prix as prix_par_mois, 
    id_prix
from Mise_en_avant;


-- I-fonction getLivraison Disponible

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
    lp.paye AS status_livraison
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
    COALESCE(g.montant, 0) AS gain
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

    
