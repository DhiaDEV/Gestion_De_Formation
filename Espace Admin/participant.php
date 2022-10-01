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
        <a class="nav-link" href="participantAccepter.php">Liste Accepter</a>
      </div>
    </div>
  </div>
</nav>
<?php

$alltheme=$bdd->query('SELECT *  FROM participants p , cycles  c where c.id_cycle = p.cycle_id  ORDER BY id DESC LIMIT 10');
if(isset($_GET['recherche']) AND !empty($_GET['recherche'])){
    $recherche= htmlspecialchars($_GET['recherche']);
    $alltheme=$bdd->query('SELECT *   FROM participants p , cycles  c where c.id_cycle = p.cycle_id  AND theme_f LIKE "%'.$recherche.'%" ORDER BY id DESC LIMIT 10');
}

?>
<br>
<div class="container">
<form class="d-flex" method="GET">
      <input class="form-control me-2" type="search" name="recherche" placeholder="Recherche participant par thème" aria-label="Search" autocomplete="off">
      <button class="btn btn-outline-success" name="rechercher" type="submit">Rechercher</button>
    </form>
    <section class="afficher_theme">
      </div>

<br><br>
    <h1 align='center' class="parti" >  Liste Des Participants</h1>
    <br><br><br><br>
    <table class="table table-hover">
        <tr>
            <td>ID</td>
            <td>Nom_Prenom</td>
            <td>CIN</td>
            <td>Email</td>
            <td>Direction</td>
            <td>Entreprise</td>
            <td>Theme de formation </td>
            <td>Action</td>
         
        </tr>
   

    <!-- Afficher tous les participants-->
  
  
  
  <?php
  //Pour confirmer un participant
   if(isset($_GET['confirme'])AND !empty($_GET['confirme'])){
    $confirme =(int) $_GET['confirme'];

    $req=$bdd->prepare('UPDATE participants SET confirmer = 1 WHERE id= ?');
    $req->execute(array($confirme));
    header('Location: participantAccepter.php');

}
//pour supprimer un participant 
if(isset($_GET['supprime'])AND !empty($_GET['supprime'])){
    $supprime =(int) $_GET['supprime'];

    $req=$bdd->prepare('DELETE FROM participants WHERE id= ?');
    $req->execute(array($supprime));
}

   

// $recupParticipant= $bdd->query('SELECT *  FROM participants p , cycles  c
//  where c.id_cycle = p.cycle_id ORDER BY id DESC LIMIT 10');
   
    // while($parti = $recupParticipant->fetch()){

      if($alltheme-> rowCount()>0){
        while($parti = $alltheme->fetch()){
        ?>
            <tr>
            <td> <?php echo $parti['id'] ?></td> 
            <td> <?php echo $parti['nom_prenom'] ?></td> 
            <td> <?php echo $parti['cin'] ?></td> 
            <td> <?php echo $parti['email'] ?></td> 
            <td> <?php echo $parti['direction'] ?></td> 
            <td> <?php echo $parti['entreprise'] ?></td> 
            <td> <?php echo $parti['theme_f'] ?></td> 
            <td><?php if($parti['confirmer']==0){?> <a class="btn btn-success" href="participant.php?confirme=<?= $parti['id'] ?>">Confirmer</a><?php }?>
             <a class="btn btn-warning" href="modifierParticipant.php?id=<?= $parti['id'] ?>">Modifier</a> 
             <a class="btn btn-danger" href="participant.php?supprime=<?= $parti['id'] ?>">Supprimer</a>
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


