create or replace view  v_resto_plat AS
select 
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
    c.date
from 
    v_resto_plat_Commande_plat as vrpcp
join 
    Commande as c 
on 
    c.id = vrpcp.id_commande;


create or replace view v_commission_par_Commande_par_resto_par_jour as
select
    id_commande,
    id_resto,
    sum(prix * quantite) as prix_commande,
    date,
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





--stat livreur
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

--------------revenu total
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