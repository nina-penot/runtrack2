USE jour09;
SELECT salles.nom, etage.nom FROM etage INNER JOIN salles ON etage.id = salles.id_etage; 