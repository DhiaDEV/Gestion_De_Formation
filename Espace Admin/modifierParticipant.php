<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Modifier Participant</title>
</head>
<body>
    <!-- navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">ADMIN</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link" href="index.php">Home</a>
        <a class="nav-link" href="participant.php">Afficher Participants</a>
      </div>
    </div>
  </div>
</nav> 
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>
    
</body>
</html>

<!-- Modifier Participant -->

<?php
    $bdd= new PDO('mysql:host=localhost; dbname=gestion_formation;','root','');
    
    if(isset($_GET['id']) AND !empty($_GET['id'])){

        // en recupére id qui envoyer a modifier
        $getnAction=$_GET['id'];

        $recupparti=$bdd->prepare('SELECT * FROM participants WHERE id=?');
        $recupparti->execute(array($getnAction));

        if($recupparti->rowCount()>0){

        $participant=$recupparti->fetch();
        $nom_prenom=$participant['nom_prenom'];
        $cin= $participant['cin'];
        $email=$participant['email'];
        $direction=$participant['direction'];
        $entreprise=$participant['entreprise'];
         //   Nouvelle donnée asaisie

         if(isset($_POST['envoyer'])){
        $nom_prenomSaisie=htmlspecialchars($_POST['nom_prenom']);
        $cinSaisie=htmlspecialchars($_POST['cin']);
        $emailSaisie=htmlspecialchars($_POST['email']);
        $directionSaisie=htmlspecialchars($_POST['direction']);
        $entrepriseSaisie=htmlspecialchars($_POST['entreprise']);
            // requête modifier
        $updateparti=$bdd->prepare('UPDATE participants SET nom_prenom=?, cin=? , email=? , direction=? , entreprise=?  WHERE id=?');
        $updateparti->execute(array($nom_prenomSaisie,$cinSaisie,$emailSaisie,$directionSaisie,$entrepriseSaisie,$getnAction  ));

        header('Location:participant.php');
         }

        

        }else{
            echo "<div class='alert alert-danger' role='alert' style=' font-weight: 700;'>
            Aucun participant trouvé
            </div> " ;
        }

    }else{

        echo "<div class='alert alert-danger' role='alert' style=' font-weight: 700;'>
                Aucun identifiant trouvé
                </div> " ;
    }



?>

<!-- Modal -->
<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modifier Participant</h5>
      </div>
      <div class="modal-body">
       
      <form method="POST" >
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Nom_Prenom</label>
            <input type="text" name="nom_prenom" value="<?=$nom_prenom?>" class="form-control">
          </div> 

          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">CIN</label>
            <input type="number" name="cin" value="<?=$cin?>" class="form-control">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Email</label>
            <input type="email" name="email"value="<?=$email?>" class="form-control" >
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Direction</label>
            <input type="text" name="direction" value="<?=$direction?>" class="form-control" >
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Entreprise</label>
            <input type="text" name="entreprise" value="<?=$entreprise?>" class="form-control" >
          </div>   
          <div class="modal-footer">
            <button type="submit" name="envoyer" class="btn btn-primary" >Envoyer</button>
          </div>
         
        </form>
      </div> 
    </div>
  </div>