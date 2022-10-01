<?php
require_once 'mail.php';

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
    <title>Liste Accepter</title>
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
        <a class="nav-link" href="participant.php">Liste Participants</a>

      </div>
    </div>
  </div>
</nav>
<br><br>
    <h1 align='center' class="parti" >  Liste Accepter</h1>
    <br><br><br><br>
    <table class="table table-hover">
        <tr>
            <td>ID</td>
            <td>Nom_Prenom</td>
            <td>CIN</td>
            <td>Email</td>
            <td>Direction</td>
            <td>Theme de Formation</td>
            <td>Entreprise</td>
            <td>Action</td>
            <td>Mail</td>
         
        </tr>
<?php
//pour supprimer un participant 
if(isset($_GET['supprime'])AND !empty($_GET['supprime'])){
    $supprime =(int) $_GET['supprime'];

    $req=$bdd->prepare('DELETE FROM participants WHERE id= ?');
    $req->execute(array($supprime));
}

//pour envoyer mail
if(isset($_GET['mail'])AND !empty($_GET['mail'])){
  $mailEnvoi =(int) $_GET['mail'];

  $partiMail=$bdd->query("SELECT * FROM participants p ,cycles c  where c.id_cycle = p.cycle_id AND id='$mailEnvoi' ");
  while($parti = $partiMail->fetch()){


   $mail->setFrom('dhiainfo1@gmail.com','Dhia Eddinne');
   $mail->addAddress($parti['email']);
   $mail->Subject='Concernant la formation chez CNI';
   $mail->Body = "Bonjour ".$parti['nom_prenom'].",<br/>
                 j'espére que vous allez bien , vous avez accepter dans votre théme<b> ".$parti['theme_f']."</b> 
                 chez notre société CNI, vous êtes les bienvenus est
                 votre N° Action est <b>".$parti['n_action']."</b>
                 .
        ";
  //  $attachment = "../Espace Admin/attestation.pdf";
  //  $mail->AddAttachment($attachment);
        
  $mail->send();
   echo("<script>alert('Mail bien envoyer')</script>");
  
}}


// votre theme est  <b> '.$parti['theme_f'].' </b>


        $recupParticipant= $bdd->query('SELECT * FROM participants p ,cycles c  where c.id_cycle = p.cycle_id  AND confirmer=1 ORDER BY id  LIMIT 10');
        while($parti = $recupParticipant->fetch()){
            ?>
            <tr>
            <td> <?php echo $parti['id'] ?></td> 
            <td> <?php echo $parti['nom_prenom'] ?></td> 
            <td> <?php echo $parti['cin'] ?></td> 
            <td> <?php echo $parti['email'] ?></td> 
            <td> <?php echo $parti['direction'] ?></td> 
            <td> <?php echo $parti['theme_f'] ?></td>
            <td> <?php echo $parti['entreprise'] ?></td> 
            <td><a class="btn btn-danger" href="participantAccepter.php?supprime=<?= $parti['id'] ?>">Supprimer</a></td>
            <td><a class="btn btn-info" href="participantAccepter.php?mail=<?= $parti['id'] ?>">Mail</a></td>


            
   <?php
    }
    ?> 
  
    </table>
</body>
</html>