-- revenu total somme commission livreur et restaurant

create or replace view v_revenu_par_mois as
select 
    day,
    month,
    year,
    sum(revenu) as revenu_total_jour
from
    (
    select 
        day,
        month,
        year,
        revenu 
    from 
        v_revenu_par_jour_resto_jour 
    union ALL

    select 
        day,
        month,
        year,
        somme_commission
    from 
            v_total_commission_frais_livraison_par_jour
    ) as combinaison
GROUP by 
    day,month,year;

create or replace view v_revenu_par_an as
select 
    month,
    year,
    sum(revenu_total_jour) as revenu_total
from
    v_revenu_par_mois
group by
    month, year
order by
    month, year ASC;    