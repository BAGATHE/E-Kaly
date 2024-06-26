-- liste de tout les plat  jointure entre les resto et plat affiche tout les plat sans exxception
create or replace view  v_resto_plat AS
select 
    r.id as id_resto,
    p.id as id_plat,
    p.image as image,
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

create or replace view v_historique_commande_restaurant_avec_nom_client_avec_status as 
select 
    hcrn.*,
    lpc.paye
from v_historique_commande_restaurant_avec_nom_client as hcrn 
join Livraison_payement_commande lpc
on lpc.id_commande=hcrn.id_commande;

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
    (quantite*Plat.prix) as total,
    Plat.image
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
left join 
    Change_quantite_plat as cqp
on 
    vrp.id_plat = cqp.id_plat
GROUP BY
    vrp.id_plat,vrp.id_resto,DAY(cqp.date),MONTH(cqp.date),YEAR(cqp.date);

-- info avec note du plat
create or replace view v_info_global_plat_resto as 
select 
    vcqp.*,
    -- vcqp.image as images,
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


CREATE OR REPLACE VIEW v_mise_en_avant_dates_with_info_resto AS 
SELECT
    msv.id,
    msv.id_resto, 
    msv.date AS date_debut,
    DATE_ADD(msv.date, INTERVAL msv.duree MONTH) AS date_fin,
    msv.duree,
    msv.prix AS prix_par_mois, 
    msv.id_prix,
    ir.nom
FROM Mise_en_avant AS msv
JOIN Info_resto ir
ON msv.id_resto = ir.id_resto;


DELIMITER //

CREATE OR REPLACE FUNCTION ableToTakeCommand (idResto INT, heure TIME)
RETURNS INT
BEGIN
    DECLARE countCommands INT;
    
    SELECT COUNT(*)
    INTO countCommands
    FROM Info_resto
    WHERE id_resto = idResto
    AND heure BETWEEN heure_ouverture AND addtime(heure_fermeture, - 1);    
    RETURN countCommands;
END //

DELIMITER ;