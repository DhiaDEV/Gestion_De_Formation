<?php 
session_start();
    if(isset($_POST['valider'])){
        if(!empty($_POST['pseudo']) AND !empty($_POST['mdp'])){
            $pseudo_par_defaut="admin" ;
            $mdp_par_defaut="admin1234";

            $pseudo_saisi=htmlspecialchars($_POST['pseudo']);
            $mdp_saisi=htmlspecialchars($_POST['mdp']); 

            if($pseudo_saisi == $pseudo_par_defaut AND $mdp_saisi == $mdp_par_defaut){
                $_SESSION['mdp'] = $mdp_saisi ;
                header('Location: index.php');

            }else{
                echo "<div class='alert alert-danger' role='alert' style=' font-weight: 700;'>
                Votre mot de passe ou pseudo est incorrect
                </div> " ;
               
            }

        }else{
            echo "<div class='alert alert-danger' role='alert' style=' font-weight: 700;'>
            Veuillez completer tous les champs
          </div> " ;
         
        }
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
    <title>Espace De Connexion Admin</title>
    <style>
        body{
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background:url(./images/bg-admin.jpg) no-repeat;
            background-size:cover ;
            background-position: center;
            background-attachment: fixed;

        }
        .card{
             background-color: #ffff;
             width: 600px;
             box-shadow: 0 20px 25px rgba(1 1 1/15%);
             border-radius: 10px;
             padding: 25px;
             margin: 15px;
        }
    </style>
</head>
<body>
    <br><br><br><br><br><br><br><br><br><br><br>
    <div class="card">
<form class="row g-3 needs-validation" novalidate method="POST" action="" align="center">
    <div class="container">
        <div class="mb-3 row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Login</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" name="pseudo" >

        </div>
        </div>
        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label" >Password</label>
            <div class="col-sm-10">
            <input type="password" class="form-control" name="mdp" >
            </div>
        </div>
        <button type="submit" name="valider" class="btn btn-success">Connexion</button>

        </div>

 </form>
 </div>
     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script> 
</body>
</html>