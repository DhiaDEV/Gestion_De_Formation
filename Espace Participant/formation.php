<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <title>Formation</title>
   
 
    
</head>
<body>
<?php include 'includes/navbar.php'; ?>


  <main>
<div class="album py-5 bg-light">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

      <?php
    $bdd= new PDO('mysql:host=localhost; dbname=gestion_formation;','root','');
  $recupCycle= $bdd->query('SELECT * FROM cycles c, formateurs f  where f.id_formateur = c .formateur_id ');
     while($cycle = $recupCycle->fetch()){

  ?>
        <div class="col" >
          <div class="card shadow-sm" style="background-color:white ;  border-radius: 15px; border:solid 1px black; ">
            <!-- <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: صورة مصغرة" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">صورة مصغرة</text></svg> -->

            <div class="card-body">
              <p class="card-text" style="font-weight:700 ;"><span style="font-weight:700 ; color:red; font-size:25px;">Formation:</span> <?php echo $cycle['theme_f'] ?> </p>
                <!-- <h6> <span style="font-weight:700 ; color:Blue;">Numéro Action: </span>  <?php echo $cycle['n_action'] ?></h6> -->
                <h6> <span style="font-weight:700 ; color:Blue;">Numéro salle: </span>  <?php echo $cycle['n_salle'] ?></h6>
                <h6> <span style="font-weight:700 ; color:blue;">Mode Formation: </span> <?php echo $cycle['mode_f'] ?></h6>
                <h6> <span style="font-weight:700 ; color:blue;">Lieu:</span> <?php echo $cycle['lieu'] ?></h6>
                <h6> <span style="font-weight:700 ; color:blue;">Gouvernorat: </span><?php echo $cycle['gouvernorat'] ?></h6>
                <h6> <span style="font-weight:700 ; color:blue;">Période De: </span><?php echo $cycle['periode_de'] ?></h6>            
                <h6> <span style="font-weight:700 ; color:blue;">Période A: </span><?php echo $cycle['periode_a'] ?></h6>
                <h6> <span style="font-weight:700 ; color:blue;">Horaires: </span><?php echo $cycle['horaires'] ?></h6>
                <h6> <span style="font-weight:700 ; color:blue;">Entreprise: </span><?php echo $cycle['entreprise'] ?></h6>
                <h6> <span style="font-weight:700 ; color:blue;">Nom formateur: </span><?php echo $cycle['nom_prenom_f'] ?></h6>

              <div class="d-flex justify-content-between align-items-center">
                

                <div class="btn-group">
                <a href="consulter.php" class="card-link">Consulter</a>
                </div>
              </div>
            </div>
          </div>
        </div>

        <?php
}
    ?> 

      </div>
      </div>
      </div>
  </main>


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
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>