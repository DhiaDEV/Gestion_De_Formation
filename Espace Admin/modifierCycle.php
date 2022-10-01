<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Modifier Cycle</title>
    <style>
      body{ 
        background-color: #F6E8EA;
      }
    
    .modifier{
     margin-left: 15px;
     margin-top: 15px;
     font-size: 17px;
     border-radius: 20px;
     font-weight: 500;
   }

 </style>
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
        <a class="nav-link" href="publierCycle.php">Publier Cycle</a>
      </div>
    </div>
  </div>
</nav> 
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>

<!-- Modifier Cycle -->

<?php
    $bdd= new PDO('mysql:host=localhost; dbname=gestion_formation;','root','');
    
    if(isset($_GET['id_cycle']) AND !empty($_GET['id_cycle'])){

        // en recupére id_cycle qui envoyer a modifier
        $getnAction=$_GET['id_cycle'];

        $recupCycle=$bdd->prepare('SELECT * FROM cycles WHERE id_cycle=?');
        $recupCycle->execute(array($getnAction));

        if($recupCycle->rowCount()>0){

        $cycleinfo=$recupCycle->fetch();
        $n_action=$cycleinfo['n_action'];
        $n_salle= $cycleinfo['n_salle'];
        $theme_f=$cycleinfo['theme_f'];
        $mode_f=$cycleinfo['mode_f'];
        $lieu=$cycleinfo['lieu'];
        $gouvernorat=$cycleinfo['gouvernorat'];
        $periode_de=$cycleinfo['periode_de'];
        $periode_a=$cycleinfo['periode_a'];
        $horaires=$cycleinfo['horaires'];
        $entreprise=$cycleinfo['entreprise'];

         //   Nouvelle donnée asaisie

         if(isset($_POST['envoyer'])){
        $n_actionSaisie=htmlspecialchars($_POST['n_action']);
        $n_salleSaisie=htmlspecialchars($_POST['n_salle']);
        $theme_fSaisie=htmlspecialchars($_POST['theme_f']);
        $mode_fSaisie=htmlspecialchars($_POST['mode_f']);
        $lieuSaisie=htmlspecialchars($_POST['lieu']);
        $gouvernoratSaisie=htmlspecialchars($_POST['gouvernorat']);
        $periode_de1Saisie=strtr($_REQUEST['periode_de'],'/','-');
        $periode_deSaisie= date('Y-m-d',strtotime($periode_de1Saisie));
        $periode_a1Saisie=strtr($_REQUEST['periode_a'],'/','-');
        $periode_aSaisie=date('Y-m-d',strtotime($periode_a1Saisie));
        $horairesSaisie=htmlspecialchars($_POST['horaires']);
        $entrepriseSaisie=htmlspecialchars($_POST['entreprise']);
            // requête modifier
        $updateCycle=$bdd->prepare('UPDATE cycles SET n_action=?, n_salle=? , theme_f=? , mode_f=? , lieu=? 
            , gouvernorat=? , periode_de=? , periode_a=? , horaires=? , entreprise=? WHERE id_cycle=?');
        $updateCycle->execute(array($n_actionSaisie, $n_salleSaisie ,$theme_fSaisie ,$mode_fSaisie,$lieuSaisie,$gouvernoratSaisie, $periode_deSaisie,$periode_aSaisie,$horairesSaisie,'CNI',$getnAction  ));

        header('Location:publierCycle.php');
         }

        

        }else{
            echo "<div class='alert alert-danger' role='alert' style=' font-weight: 700;'>
            Aucun cycle trouvé
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
        <h5 class="modal-title" id="exampleModalLabel">Modifier Cycle</h5>
      </div>
      <div class="modal-body">
       
      <form method="POST" >
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">N°_Action</label>
            <input type="number" name="n_action" value="<?=$n_action?>" class="form-control">
          </div> 

          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">N°_Salle</label>
            <input type="number" name="n_salle" value="<?=$n_salle?>" class="form-control">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Thème De Formation</label>
            <input type="text" name="theme_f"value="<?=$theme_f?>" class="form-control" >
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Mode De Formation</label>
            <input type="text" name="mode_f" value="<?=$mode_f?>" class="form-control" >
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Lieu De Formation</label>
            <input type="text" name="lieu" value="<?=$lieu?>" class="form-control" >
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Gouvernorat</label>
            <input type="text" name="gouvernorat" value="<?=$gouvernorat?>" class="form-control" >
          </div>  
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Périodes De</label>
            <input type="date" name="periode_de" value="<?=$periode_de?>" class="form-control" >
          </div>  
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Périodes à</label>
            <input type="date" name="periode_a"value="<?=$periode_a?>" class="form-control" >
          </div> 
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Horaires</label>
            <input type="time" name="horaires" value="<?=$horaires?>" class="form-control" >
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Entreprise</label>
            <input type="text" name="entreprise" value="CNI" class="form-control" disabled >
          </div>     
          <div class="modal-footer">
            <button type="submit" name="envoyer" class="btn btn-primary" >Envoyer</button>
          </div>
         
        </form>
      </div> 
    </div>
  </div>

