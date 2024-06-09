create or replace view  v_resto_plat AS
select 
    r.nom as nom_resto,
    r.id as id_resto,
    p.id as id_plat,
    p.description ,
    p.prix
from 
    Resto as r
join 
    Plat AS p
ON
    r.id = p.id_resto;

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


create or replace view v_resto_plat_Commande_plat_Commande AS
select 
    vrpcp.*,
    c.date,
    c.id_client
from 
    v_resto_plat_Commande_plat as vrpcp
join 
    Commande as c 
on 
    c.id = vrpcp.id_commande;


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


-- notre revenue pour toutes les commissions des plats des resto

    
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


create or replace view v_revenu_par_jour_resto_mois as
select 
    month,
    year,
    sum(revenu) as revenu
from 
    v_revenu_par_jour_resto_jour
group by

    month,year;   
 

create or replace VIEW v_mise_en_avant_with_expiration AS
SELECT 
    id AS id_mise_en_avant,
    id_resto,
    date AS date_debut,
    duree,
    DATE_ADD(Mise_en_avant.date, INTERVAL Mise_en_avant.duree MONTH) AS date_expiration
FROM Mise_en_avant;


-- stat livreur
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


create or replace view v_frais_livraison_par_commande_livreur_Commande_jour as
select
    id_commande,
    id_resto,
    id_livreur,
    sum(prix * quantite) as prix_commande,
    date,
    (sum(prix * quantite) * (select commission_livreur from Commission_admin))/100 as commission
from 
    v_frais_livraison_par_commande_livreur_Commande
group by
    id_commande,id_livreur,id_resto,DAY(date),MONTH(date),YEAR(date); 


create or replace view v_revenu_par_jour_livreur_jour as
select 
    DAY(date) as day,
    MONTH(date) as month,
    YEAR(date) as year,
    sum(commission) as revenu
from 
    v_frais_livraison_par_commande_livreur_Commande_jour
group by
    day,month,year;  


create or replace view v_revenu_par_jour_livreur_mois as
select 
    month,
    year,
    sum(revenu) as revenu
from 
    v_revenu_par_jour_livreur_jour
group by
    month,year;  

-- revenu total
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
    union all
    select 
        year,
        month,
        day,
        revenu
    from 
        v_revenu_par_jour_livreur_jour
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
    union all
    select 
        month as mois,
        year as annee,
        revenu
    from 
        v_revenu_par_jour_livreur_mois
) as revenus_combines
group by
    mois, annee
order by
    annee, mois;

-- Historique Commande Resto
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


-- INFO GLOBAL PLAT

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


-- revenu depense chiffre d affaire for resto 

create or replace view v_revenu_depense_chiffre_jour_for_resto as
select 
    DAY(date) as day,
    MONTH(date) as month,
    YEAR(date) as year,
    sum(chiffreDAffaireResto) as chiffreDAffaireResto,
    sum(commission) as depense,
    sum(chiffreDAffaireResto) - sum(commission) as revenue
from 
    v_commission_par_Commande_par_resto_par_jour
group by
    day,month,year;  


create or replace view v_revenu_depense_chiffre_mois_for_resto as
select 
    month,
    year,
    sum(chiffreDAffaireResto) as chiffreDAffaireResto,
    sum(depense) as depense,
    sum(revenue) as revenue
from 
    v_revenu_depense_chiffre_jour_for_resto
group by

    month,year;   