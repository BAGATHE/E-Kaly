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