<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Publier Cycles</title>
    <style>
    
       .ajouter{
        margin-left: 15px;
        margin-top: 15px;
        font-size: 17px;
        border-radius: 20px;
        font-weight: 500;
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


<!-- protection page -->
<?php
    session_start();
    $bdd= new PDO('mysql:host=localhost; dbname=gestion_formation;','root','');
    $recupFormateur=$bdd->query('SELECT * FROM formateurs  ');
    if(!$_SESSION['mdp']){
        header('Location: connexion.php');
    }
   
    if(isset($_POST['envoyer'])){
      if
      (!empty($_POST['n_action'])
      AND !empty($_POST['n_salle']) 
      AND !empty($_POST['theme_f']) 
      AND !empty($_POST['mode_f'])
      AND !empty($_POST['lieu'])
      AND !empty($_POST['gouvernorat'])
      AND !empty($_POST['periode_de'])
      AND !empty($_POST['periode_a']) 
      AND !empty($_POST['horaires'])
      AND !empty($_POST['formateur'])

     ){
        $n_action=htmlspecialchars($_POST['n_action']);
        $n_salle=htmlspecialchars($_POST['n_salle']);
        $theme_f=htmlspecialchars($_POST['theme_f']);
        $mode_f=htmlspecialchars($_POST['mode_f']);
        $lieu=htmlspecialchars($_POST['lieu']);
        $gouvernorat=htmlspecialchars($_POST['gouvernorat']);
        $periode_de1=strtr($_REQUEST['periode_de'],'/','-');
        $periode_de= date('Y-m-d',strtotime($periode_de1));
        $periode_a1=strtr($_REQUEST['periode_a'],'/','-');
        $periode_a=date('Y-m-d',strtotime($periode_a1));
        $horaires=htmlspecialchars($_POST['horaires']);
        $formateur =htmlspecialchars($_POST['formateur']) ;
       
        $insertCycle= $bdd->prepare('INSERT INTO cycles(n_action,n_salle,theme_f,mode_f,lieu,gouvernorat,periode_de,periode_a,horaires,formateur_id,entreprise)VALUES(?,?,?,?,?,?,?,?,?,?,?)');
        $insertCycle->execute(array($n_action, $n_salle, $theme_f, $mode_f, $lieu, $gouvernorat, $periode_de, $periode_a, $horaires,$formateur,'CNI'));
        

 

    
        

      
      }else{
        echo "<div class='alert alert-danger' role='alert' style=' font-weight: 700;'>
                Veuillez compléter tous les champs
                </div> " ;
      }
    }
?>

<?php
// $bdd= new PDO('mysql:host=localhost; dbname=gestion_formation;','root','');
$alltheme=$bdd->query('SELECT * FROM cycles c , formateurs f where f.id_formateur =  c.formateur_id ORDER BY id_cycle DESC');
if(isset($_GET['recherche']) AND !empty($_GET['recherche'])){
    $recherche= htmlspecialchars($_GET['recherche']);
    $alltheme=$bdd->query('SELECT * from cycles c , formateurs f where f.id_formateur =  c.formateur_id AND theme_f LIKE "%'.$recherche.'%" ORDER BY id_cycle DESC');
}

?>

<br>
<div class="container">
<form class="d-flex" method="GET">
      <input class="form-control me-2" type="search" name="recherche" placeholder="Recherche un théme" aria-label="Search" autocomplete="off">
      <button class="btn btn-outline-success" name="rechercher" type="submit">Rechercher</button>
    </form>
    <section class="afficher_theme">
      </div>


<!-- Modal -->

  <button type="button" class="btn btn-primary ajouter" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Ajouter</button>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter Cycle</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       
      <form method="POST" enctype="multipart/form-data">
      <div class="mb-3">
            <label for="recipient-name" class="col-form-label">N°_Action</label>
            <input type="number" name="n_action" class="form-control">
          </div>  
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">N°_Salle</label>
            <input type="number" name="n_salle" class="form-control">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Thème De Formation</label>
            <input type="text" name="theme_f" class="form-control" >
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Mode De Formation</label>
            <input type="text" name="mode_f" class="form-control" >
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Lieu De Formation</label>
            <input type="text" name="lieu" class="form-control" >
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Gouvernorat</label>
            <input type="text" name="gouvernorat" class="form-control" >
          </div>  
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Périodes De</label>
            <input type="date" name="periode_de" class="form-control" >
          </div>  
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Périodes à</label>
            <input type="date" name="periode_a" class="form-control" >
          </div> 
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Horaires</label>
            <input type="time" name="horaires" class="form-control" >
          </div>
         
          <div class="mb-3">
            <label for="formateur" class="col-form-label" name="formateur">Formateur</label>
            <select class="form-select" aria-label="Default select example" name="formateur">
            <?php
            $recupFormateur->execute();
                while($format = $recupFormateur->fetch()){?>
                
              <option>
                  <?php echo $format['id_formateur'];?>: <?php echo $format['nom_prenom_f'];?>
              </option>
              <?php
                }
                ?>
            </select>
            </div>

          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Entreprise</label>
            <input type="text" name="entreprise" class="form-control" value="CNI" disabled>
          </div>     
          
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
            <button type="submit" name="envoyer" class="btn btn-primary" >Envoyer</button>
          </div>
         
        </form>
      </div> 
    </div>
  </div>
</div>

 
<h1 align='center' class="parti" >  Listes Des Cycles</h1>
    <br><br><br><br>
    <table class="table table-hover">
        <tr>
            <td>Id_cycle</td>
            <td>N_Action</td>
            <td>N_salle</td>
            <td>Theme de Formation</td>
            <td>Mode de Formation</td>
            <td>Lieu</td>
            <td>Gouvernorat</td>
            <td>Periode_De</td>
            <td>Periode_A</td>
            <td>Horaires</td>
            <td>Entreprise</td>
            <td>formateur</td>
            <td>Action</td>
        </tr>



    <?php
    // supprimer un cycle
    if(isset($_GET['supprime'])AND !empty($_GET['supprime'])){
      $supprime =(int) $_GET['supprime'];
  
      $req=$bdd->prepare('DELETE FROM cycles WHERE id_cycle= ?');
      $req->execute(array($supprime));
  }
  

      // $recupCycles= $bdd->query('SELECT * FROM cycles c , formateurs f where f.id_formateur =  c.formateur_id ORDER BY id_cycle DESC LIMIT 10');
   
    // while($parti = $recupCycles->fetch()){
      if($alltheme-> rowCount()>0){
        while($parti = $alltheme->fetch()){
        ?>
            <tr>
            <td> <?php echo $parti['id_cycle'] ?></td> 
            <td> <?php echo $parti['n_action'] ?></td> 
            <td> <?php echo $parti['n_salle'] ?></td> 
            <td> <?php echo $parti['theme_f'] ?></td> 
            <td> <?php echo $parti['mode_f'] ?></td> 
            <td> <?php echo $parti['lieu'] ?></td> 
            <td> <?php echo $parti['gouvernorat'] ?></td> 
            <td> <?php echo $parti['periode_de'] ?></td> 
            <td> <?php echo $parti['periode_a'] ?></td> 
            <td> <?php echo $parti['horaires'] ?></td> 
            <td> <?php echo $parti['entreprise'] ?></td>
            <td> <?php echo $parti['nom_prenom_f'] ?></td>

            <td>  <a class="btn btn-danger" href="publierCycle.php?supprime=<?= $parti['id_cycle'] ?>">Supprimer</a>
            <a class="btn btn-warning" href="modifierCycle.php?id_cycle=<?= $parti['id_cycle'] ?>">Modifier</a> </td>
          


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