<!DOCTYPE html>
<html lang="en">
<head>
    <title>Formulaire</title>
<?php include'includes/navbar.php';?>

    <title>Consulter Vous</title>
    <style>
        .remplir{
            text-align: center;
            padding-top: 20px;
            font-size: 40px;
            font-weight: 800;
            color: #02182B;
            font-family: cursive;
        }
        .center{
            width: 50%;
            
        }

    </style>
</head>
<body>
<?php
 $bdd= new PDO('mysql:host=localhost; dbname=gestion_formation;','root','');
 $recupCycle=$bdd->query('SELECT * FROM cycles');


    if(isset($_POST['valider'])){
        if(!empty($_POST['nom_prenom']) AND !empty($_POST['cin']) AND !empty($_POST['email'])AND !empty($_POST['direction'])AND !empty($_POST['entreprise'])AND !empty($_POST['cycle'])){
            
            $nom_prenom= htmlspecialchars($_POST['nom_prenom']);
            $cin=htmlspecialchars($_POST['cin']);
            $email=htmlspecialchars($_POST['email']);
            $direction=htmlspecialchars($_POST['direction']);
            $cycle =htmlspecialchars($_POST['cycle']) ;
            $entreprise=htmlspecialchars($_POST['entreprise']);


            $insertParticipant=$bdd->prepare('INSERT INTO participants(nom_prenom,cin,email,direction,cycle_id,entreprise)VALUES(?,?,?,?,?,?)');
            $insertParticipant->execute(array($nom_prenom,$cin,$email,$direction,$cycle,$entreprise));
            ?>
            <script>
            alert('Bien enregistrer');
            </script>
        <?php
        }
    }


?>



<h1 class="remplir">Remplir le formulaire</h1>
<br><br>
<div class="container center">
<form class="row g-3 needs-validation" novalidate method="POST" action="" align="center">

        <div class="mb-3 row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Nom_Prenom</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" name="nom_prenom" >

        </div>
        </div>
        <div class="mb-3 row">
            <label for="staticEmail" class="col-sm-2 col-form-label">CIN</label>
            <div class="col-sm-10">
            <input type="number" class="form-control" name="cin" >

        </div>
        </div>
        <div class="mb-3 row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" name="email" >

        </div>
        </div>
        <div class="mb-3 row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Direction</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" name="direction" >

        </div>
        </div>
        <div class="mb-3 row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Entreprise</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" name="entreprise" >

        </div>
        </div>
        
        <div class="input-group">
            <label for="cycle" class="col-sm-2 col-form-label   " name="cycle">Theme de Cycle</label>
            <div class="col-sm-10">
            <select class="form-select" aria-label="Default select example" name="cycle">
            <?php
            $recupCycle->execute();
                while($cycle = $recupCycle->fetch()){?>
                
              <option>
                  <?php echo $cycle['id_cycle'];?>: <?php echo $cycle['theme_f'];?>
              </option>
              <?php
                }
                ?>
            </select>
       </div>      
       </div>
               
       <br><br>
        
        <button type="submit" name="valider" class="btn btn-success">Envoyer</button>
        <button type="reset"  class="btn btn-danger">Annuler</button>
          
 </form>
 </div>

<br><br>
<!-- Footer -->
<footer class="text-center text-lg-start bg-light text-muted">
  <!-- Section: Social media -->
  <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
    <!-- Left -->
    <div class="me-5 d-none d-lg-block">
      <span>Rejoignez-nous sur les réseaux sociaux :</span>
    </div>
    <!-- Left -->

    <!-- Right -->
    <div>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-facebook-f"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-twitter"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-google"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-instagram"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-linkedin"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-github"></i>
      </a>
    </div>
    <!-- Right -->
  </section>
  <!-- Section: Social media -->

  <!-- Section: Links  -->
  <section class="">
    <div class="container text-center text-md-start mt-5">
      <!-- Grid row -->
      <div class="row mt-3">
        <!-- Grid column -->
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
          <!-- Content -->
          <h6 class="text-uppercase fw-bold mb-4">
            <i class="fas fa-gem me-3"></i>Centre National Informatique
          </h6>
          <p>
            
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Formation
          </h6>
          <p>
            <a href="#!" class="text-reset">Angular</a>
          </p>
          <p>
            <a href="#!" class="text-reset">React</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Vue</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Laravel</a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
          LIENS UTILES          </h6>
          <p>
            <a href="#!" class="text-reset">Tarification</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Réglages</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Ordres</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Aider</a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
          <p><i class="fas fa-home me-3"></i>  17, 1005 Av. Belhassen Ben Chaabane, Tunis</p>
          <p>
            <i class="fas fa-envelope me-3"></i>
            webcni@cni.tn          </p>
          <p><i class="fas fa-phone me-3"></i> +216 71 783 055</p>
          <p><i class="fas fa-print me-3"></i> +216 71 781 862
</p>
        </div>
        <!-- Grid column -->
      </div>
      <!-- Grid row -->
    </div>
  </section>
  <!-- Section: Links  -->

  <!-- Copyright -->
  <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
    © 2022 Copyright:
    <a class="text-reset fw-bold" href="#">Centre National Informatique</a>
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->  
</body>
</html>