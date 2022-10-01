<?php
session_start();
$bdd= new PDO('mysql:host=localhost; dbname=gestion_formation;','root','');
if(!$_SESSION['mdp']){
    header('Location: connexion.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Afficher les Participants</title>
    <style>
        .parti{
            color:#141414;
            font-weight: 900;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">ADMIN</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link" href="index.php">Home</a>
      </div>
    </div>
  </div>
</nav>
<?php

$alltheme=$bdd->query('SELECT *  FROM formateurs   ORDER BY id_formateur DESC LIMIT 10');
if(isset($_GET['recherche']) AND !empty($_GET['recherche'])){
    $recherche= htmlspecialchars($_GET['recherche']);
    $alltheme=$bdd->query('SELECT * FROM formateurs WHERE nom_prenom_f LIKE "%'.$recherche.'%" OR cin_f LIKE "%'.$recherche.'%" OR specialite LIKE "%'.$recherche.'%" ORDER BY id_formateur DESC LIMIT 10');
}

?>
<br>
<div class="container">
<form class="d-flex" method="GET">
      <input class="form-control me-2" type="search" name="recherche" placeholder="Recherche un formateur" aria-label="Search" autocomplete="off">
      <button class="btn btn-outline-success" name="rechercher" type="submit">Rechercher</button>
    </form>
    <section class="afficher_theme">
      </div>


<br><br>
    <h1 align='center' class="parti" >  Liste Des Formateurs</h1>
    <br><br><br><br>
    <table class="table table-hover">
        <tr>
            <td>ID_Formateur</td>
            <td>Nom_Prenom</td>
            <td>CIN</td>
            <td>spécialité</td>
            <td>Direction</td>
            <td>Action</td>
        </tr>
<?php
        //pour supprimer un formateur 
if(isset($_GET['supprime'])AND !empty($_GET['supprime'])){
    $supprime =(int) $_GET['supprime'];

    $req=$bdd->prepare('DELETE FROM formateurs WHERE id_formateur= ?');
    $req->execute(array($supprime));
}

// $recupformateurs= $bdd->query('SELECT * FROM formateurs ORDER BY id_formateur DESC LIMIT 10');
   
    // while($format = $recupformateurs->fetch()){
      if($alltheme-> rowCount()>0){
        while($format = $alltheme->fetch()){
        ?>
            <tr>
            <td> <?php echo $format['id_formateur'] ?></td> 
            <td> <?php echo $format['nom_prenom_f'] ?></td> 
            <td> <?php echo $format['cin_f'] ?></td> 
            <td> <?php echo $format['specialite'] ?></td> 
            <td> <?php echo $format['direction'] ?></td> 
            <td><a class="btn btn-danger" href="formateurs.php?supprime=<?= $format['id_formateur'] ?>">Supprimer</a>
            <a class="btn btn-warning" href="modifierFormateur.php?id_formateur=<?= $format['id_formateur'] ?>">Modifier</a>
            </td> 

            </tr>

        <?php
   }

  }else {
                
   echo "<div class='alert alert-danger' role='alert' style=' font-weight: 700;'>
   Rien afficher
 </div> " ;
 
 
 }
 
 ?>  
    </table>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>