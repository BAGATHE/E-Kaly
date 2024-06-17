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





    
