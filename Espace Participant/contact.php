<?php require_once 'mail.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>contact</title>
    <style>
        .remplir{
            text-align: center;
            padding-top: 20px;
            font-size: 40px;
            font-weight: 800;
            color: #02182B;
            font-family: cursive;
        }
        .center1{
            width: 50%;
            
        }
    </style>
</head>
<body>
<?php include 'includes/navbar.php'; ?>

<?php
//connextion

// $bdd= new PDO('mysql:host=localhost; dbname=gestion_formation;','root','');


// insertion formulaire

if(isset($_POST['valider'])){
    if(!empty($_POST['sujet'])AND !empty($_POST['nom_prenom'])AND !empty($_POST['telephone'])AND !empty($_POST['email'])AND !empty($_POST['description'])){
        $sujet=htmlspecialchars($_POST['sujet']);
        $nom_prenom=htmlspecialchars($_POST['nom_prenom']);
        $telephone=htmlspecialchars($_POST['telephone']);
        $email=htmlspecialchars($_POST['email']);
        $description= nl2br(htmlspecialchars($_POST['description']));

        // $insertContact=$bdd->prepare('INSERT INTO contact (sujet, nom_prenom , telephone , email , description) VALUES(?,?,?,?,?)');
        // $insertContact->execute(array($sujet,$nom_prenom,$telephone,$email,$description));

        // $recupId=$bdd->query("SELECT id_contact FROM contact");
        // $recupContact=$bdd->query("SELECT * FROM contact WHERE id_contact='$recupId'");
        // while($contact = $recupContact->fetch()){

        // $mail->setFrom('dhiainfo1@gmail.com','Dhia Eddinne');
        $mail->addAddress('dhiainfo1@gmail.com');
        $mail->Subject= $sujet;
        $mail->Body ='<b>Nom_Prenom:</b> '. $nom_prenom. '<br><b>Telephone:</b> ' . $telephone.'<br><b>Adresse Electronique:</b> '. $email . '<br><b>Description:</b> <br>' .$description;   
        $mail->send();
        echo("<script> alert('Mail bien envoyer') ;</script>");
      }
}
  
?>



<h1 class="remplir">Contacter-Nous</h1>
<br><br>
<div class="container center1">
<form class="row g-3 needs-validation" novalidate method="POST" action="" align="center">

<div class="mb-3 row">
        <label for="exampleFormControlInput1" class="col-sm-2 col-form-label">Sujet</label>
        <div class="col-sm-10">
        <input type="text" name="sujet" class="form-control"  placeholder="Entrer votre sujet">
        </div>
        </div>

<div class="mb-3 row">
        <label for="nom_prenom" class="col-sm-2 col-form-label">Nom_Prenom</label>
        <div class="col-sm-10">
        <input type="text" name="nom_prenom" class="form-control"  placeholder="Entrer votre nom et prénom">
        </div>
        </div>

    <div class="mb-3 row">
        <label for="exampleFormControlInput1" class="col-sm-2 col-form-label">Téléphone</label>
        <div class="col-sm-10">
        <input type="number" name="telephone" class="form-control"  placeholder="Entrer votre numero">
    </div>
    </div>

    <div class="mb-3 row">
        <label for="exampleFormControlInput1" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
        <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
    </div>
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
        <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>


        <br><br>
        
        <button type="submit" name="valider" class="btn btn-success">Envoyer</button>
        <button type="reset"  class="btn btn-danger">Annuler</button>
          
 </form>
</div>
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