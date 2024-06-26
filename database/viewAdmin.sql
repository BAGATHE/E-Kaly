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
    sum(revenu_total_jour) + 
        coalesce(
            (
                select 
                    sum(prix_par_mois) 
                from 
                    v_mise_en_avant_dates 
                where 
                    month BETWEEN MONTH(date_debut) and MONTH(date_fin)
                and 
                    year BETWEEN YEAR(date_debut) and YEAR(date_fin)  
            ),0
        ) 
    as revenu_total
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


-- payement livreur par mois avec info 
create or replace view v_payement_livreur_with_info_livreur as 
select 
    vpl.*,
    info_livreur.nom_complet,
     info_livreur.telephone
from 
    v_payement_livreur as vpl
join 
    Info_livreur as info_livreur
on 
    vpl.id_livreur = info_livreur.id_livreur;

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

    CREATE OR REPLACE VIEW v_combined_commission_frais_livraison AS
SELECT
    cpcpr.date,
    cpcpr.prix_commande,
    cpcpr.commission,
    tcfp.somme_commission,
    tcfp.somme_frais_livraison
FROM
    v_commission_par_Commande_par_resto_par_jour cpcpr
JOIN
    v_total_commission_frais_livraison_par_jour tcfp
ON
    DATE(cpcpr.date) = tcfp.date;

  
create or replace view v_revenu_n as
select * from v_revenu_par_an where year(now()) = year and month(now()) = month;

create or replace view v_revenu_n_moins_un as
select * from v_revenu_par_an where year(now()) = year and month(now()) = month - 1;

create or replace view v_variation_revenu as
select 
    n.year as annee_n,
    n.month as mois_n,
    n.revenu_total as revenu_n,
    COALESCE(nmoinsun.revenu_total, 0) as revenu_n_moins_un,
    case
        when nmoinsun.revenu_total != 0 and nmoinsun.revenu_total != null then
            ((n.revenu_total - nmoinsun.revenu_total) / nmoinsun.revenu_total) * 100
        else
            -100
    end as pourcentage_variation
from 
    v_revenu_n n
left join v_revenu_n_moins_un nmoinsun 
on n.month = nmoinsun.month;
