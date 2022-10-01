<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Ajouter Formateur</title>
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
session_start();
$bdd= new PDO('mysql:host=localhost; dbname=gestion_formation;','root','');
if(!$_SESSION['mdp']){
    header('Location: connexion.php');
}

if(isset($_POST['ajouter'])){
    if(!empty($_POST['nom_pren'])AND !empty($_POST['cin'])AND !empty($_POST['specialite'])AND !empty($_POST['direction'])){

        $nom_pren=htmlspecialchars($_POST['nom_pren']);
        $cin=htmlspecialchars($_POST['cin']);
        $specialite=htmlspecialchars($_POST['specialite']);
        $direction=htmlspecialchars($_POST['direction']);

        $insertFormateur=$bdd->prepare('INSERT INTO formateurs (nom_prenom_f , cin_f , specialite , direction) VALUES(?,?,?,?)');
        $insertFormateur->execute(array($nom_pren,$cin,$specialite,$direction));
        ?>
        <script>
            alert('Bien enregistrer');
        </script>
      <?php  
    }
}
?>




<!-- Formulaire d'ajout -->
<br><br>
<h1 align="center" class="parti">Ajouter Formateur</h1>
<br><br><br>
<div class="container">
<form class="row g-3 needs-validation" novalidate method="POST" action="" align="center">
    
        <div class="mb-3 row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Nom_Prenom</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" name="nom_pren" >

        </div>
        </div>
        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label" >CIN</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" name="cin" >
            </div>
        </div>
        <div class="mb-3 row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Specialite</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" name="specialite" >
        </div>
        </div>  
        <div class="mb-3 row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Direction</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" name="direction" >
        </div>
        </div> 
        
        <button type="submit" name="ajouter" class="btn btn-success">Ajouter</button>

   

 </form>

 </div>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>
