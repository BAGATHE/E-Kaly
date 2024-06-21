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


-- payement livreur par mois
create or replace view v_payement_livreur as 
select 
    month(date) as month,
    year(date) as year,
	id_livreur,
    sum(frais_livraison) - sum(commission) as montant_a_paye
from 
	v_frais_livraison_commission as vflc
join 
	Livraison_payement_commande as lpc
on 
	vflc.id_commande = lpc.id_commande
group by 
	year,
    month,
    id_livreur;

-- info mise en avant resto 
create or  replace view v_info_mise_en_avant as 
select 
	m.id,
    id_resto,
    nom as nom_resto,
    prix,
    date as date_debut,
    duree
from 
	Mise_en_avant as m
join 
	Resto as r 
on 
	r.id = m.id_resto; 