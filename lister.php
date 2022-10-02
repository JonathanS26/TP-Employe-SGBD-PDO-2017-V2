<?php

// php07.php

// Base de donnée : entreprise
// Table : employe (matricule (char 4), nom (char 20), prenom (char 20), age (int))



// MODELE :fonctions de gestion de la base de données

/** Fonction connecterServeurBD
 * Se connecte au serveur de données                     
 * Se connecte au serveur de données à partir de valeurs
 * prédéfinies de connexion (hôte, compte utilisateur et mot de passe). 
 * Retourne l'identifiant de connexion si succès obtenu, le booléen false 
 * si problème de connexion.
 * @return resource identifiant de connexion
 */
function connecterServeurBD() 
{
    $PARAM_hote='localhost'; // le chemin vers le serveur
    $PARAM_port='3306';
    $PARAM_nom_bd='entreprise'; // le nom de votre base de données
    $PARAM_utilisateur='root'; // nom d'utilisateur pour se connecter
    $PARAM_mot_passe='root'; // mot de passe de l'utilisateur pour se connecter

    $connect = new PDO('mysql:host='.$PARAM_hote.';port='.$PARAM_port.';dbname='.$PARAM_nom_bd, $PARAM_utilisateur, $PARAM_mot_passe);
 
    return $connect;
}

function lister()
{

    $employe = array();
    
    $connexion = connecterServeurBD();
   
    $requete="select * from employe";
    
    $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
  
    $i = 0;
    $ligne = $jeuResultat->fetch();
    while($ligne)
    {
        $employe[$i]['matricule']=$ligne['matricule'];
        $employe[$i]['nom']=$ligne['nom'];
        $employe[$i]['prenom']=$ligne['prenom'];
        $employe[$i]['age']=$ligne['age'];
    
        $ligne=$jeuResultat->fetch();
        $i = $i + 1;
    }
    $jeuResultat->closeCursor();   // fermer le jeu de résultat
  
  return $employe;
}


// CONTROLEUR (Programme principal)

$lesEmployes = array();

$lesEmployes = lister();

// ajouter ("zzz","kkk","vvv");

?>


<!-- VUE  (L'affichage) -->

<html>
<head>
<title>Liste des employés</title>
</head>
<body>
<?php
  $nb = count($lesEmployes);
  if ($nb == 0 )
  {
    echo "aucun employe dans la base <br />";
  }
  
  $i=0;
  while($i < $nb) 
  {
     echo $lesEmployes[$i]["matricule"];echo ", ";
     echo $lesEmployes[$i]["nom"];echo ", ";
     echo $lesEmployes[$i]["prenom"];echo ", ";
     echo $lesEmployes[$i]["age"];echo "<br />";
     $i = $i + 1;
  }
?>
</body>
</html>
