USE jour09;
-- Nom de l etage
-- avec la salle plus max capacite
-- nom de cette salle = "Biggest Room"
-- sa capacite

SELECT etage.nom as etage, salles.nom as "Biggest Room", salles.capacite from salles 
JOIN etage ON salles.id_etage = etage.id
WHERE salles.capacite = (SELECT MAX(salles.capacite) FROM salles);