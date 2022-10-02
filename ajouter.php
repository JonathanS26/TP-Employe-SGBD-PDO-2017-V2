<?php

// php12PDO.php

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


function ajouter($mat, $nom, $pre, $age)
{
  // Ouvrir une connexion au serveur mysql en s'identifiant
  $connexion = connecterServeurBD();
  
  // Créer la requête d'ajout 
  // ATTENTION : erreur sur le nom de la table 
  // pour voir méthode de mise au point avec echo
   $requete="insert into employe"
   ."(matricule, nom, prenom, age) values ("
   .$mat.",'"
   .$nom."','"
   .$pre."',"
   .$age.");";
 echo $requete;     
  // Lancer la requête d'ajout 
  $ok=$connexion->query($requete); 
    
  return $ok;  
}


// CONTROLEUR (Programme principal)


 $unMateriel = $_POST["mat"];
 $unNom = $_POST["nom"];
 $unPrenom = $_POST["pre"];
 $unAge = $_POST["age"];

 $reussi = ajouter($unMateriel, $unNom, $unPrenom, $unAge);
 if ($reussi==TRUE)
 {
    echo "Employe ajoute a la base";
 }
 else
{
    echo "Echec de l'ajout dans la base";
 }
 
?>
</body>
</html>
