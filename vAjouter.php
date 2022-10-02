<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8">
    <title> Ajouter employé</title> 
  </head>
  <body>
  
 <!-- Formulaire de saisie des informations sur un employé
    ================================================== -->

<div>

<form name="formAjout" action="ajouter.php" method="post">
  <fieldset>
    <legend>Entrez les données sur l'employé à ajouter </legend>
    <label> Matricule : </label> <input type="text" name="mat" size="20" /><br />
    <label> Nom       : </label> <input type="text" name="nom" size="20" /><br />
    <label> Prénom :</label> <input type="text" name="pre" size="20"/><br /> 
    <label> Age :</label> <input type="text" name="age" size="20"/><br />    
   
  </fieldset>
  <button type="submit">Enregistrer</button>
  <button type="reset">Annuler</button>
  <p />
</form>
</div> 
  

  </body>
</html>
