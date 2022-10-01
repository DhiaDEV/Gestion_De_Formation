<!-- protection page -->
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>

    <title>ADMIN HOME</title>
    <style>
        .participant{
            font-size: 30px;
            font-weight: 900;
            color: #053C5E;
        }
        .cycle{
            font-size: 30px;
            font-weight: 900;
            color: #053C5E;

        }
        .formateur{
            font-size: 30px;
            font-weight: 900;
            color: #053C5E;
        }
        .titre{
            text-align: center;
            font-weight: 800;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            color: #162521;
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
        <a class="nav-link" href="participant.php">Afficher Participants</a>
        <a class="nav-link" href="publierCycle.php">Publier Cycle</a>
        <a class="nav-link" href="ajoutFormateur.php">Ajouter Formateur</a>
        <a class="nav-link" href="formateurs.php">Afficher Formateurs</a>
      </div>
    </div>
  </div>
</nav> 


<a class="btn btn-info" href="logout.php" style="margin-top: 15px ;">Déconnexion</a>
<h1 class="titre">Les statistiques</h1>
<?php
$totalparticipant= $bdd->query('SELECT count(*)  FROM participants ');
$totalCycle=$bdd->query('SELECT count(*) FROM cycles ');
$totalFormateur=$bdd->query('SELECT count(*) FROM formateurs ');


?>
<div class="min-w-screen min-h-screen bg-gray-200 flex items-center justify-center px-5 py-5" style="background-color: #3C474B ;">
    <div class="w-full max-w-3xl" >
        <div class="-mx-2 md:flex" >
            <div class="w-full md:w-1/3 px-2" >
                <div class="rounded-lg shadow-sm mb-4" >
                    <div class="rounded-lg bg-white shadow-lg md:shadow-xl relative overflow-hidden" >
                        <div class="px-3 pt-8 pb-10 text-center relative z-10" >
                            <?php
                        while($parti = $totalparticipant->fetch()){
                        ?>
                            <h4 class="text-sm uppercase text-gray-500 leading-tight participant">Participants</h4>
                            <h3 class="text-3xl text-gray-700 font-semibold leading-tight my-3"><?php echo $parti[0] ;}?></h3>
                            <!-- <p class="text-xs text-green-500 leading-tight">▲ 57.1%</p> -->
                        </div>
                        <div class="absolute bottom-0 inset-x-0">
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full md:w-1/3 px-2">
                <div class="rounded-lg shadow-sm mb-4">
                    <div class="rounded-lg bg-white shadow-lg md:shadow-xl relative overflow-hidden">
                        <div class="px-3 pt-8 pb-10 text-center relative z-10">
                        <?php
                        while($parti = $totalCycle->fetch()){
                        ?>
                            <h4 class="text-sm uppercase text-gray-500 leading-tight cycle">Cycles</h4>
                            <h3 class="text-3xl text-gray-700 font-semibold leading-tight my-3"><?php echo $parti[0] ;}?></h3>
                            <!-- <p class="text-xs text-red-500 leading-tight">▼ 42.8%</p> -->
                        </div>
                        <div class="absolute bottom-0 inset-x-0">
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full md:w-1/3 px-2">
                <div class="rounded-lg shadow-sm mb-4">
                    <div class="rounded-lg bg-white shadow-lg md:shadow-xl relative overflow-hidden">
                        <div class="px-3 pt-8 pb-10 text-center relative z-10">
                            <h4 class="text-sm uppercase text-gray-500 leading-tight formateur">Formateur</h4>
                            <?php
                        while($parti = $totalFormateur->fetch()){
                        ?>
                            <h3 class="text-3xl text-gray-700 font-semibold leading-tight my-3"><?php echo $parti[0] ;}?></h3>
                            <!-- <p class="text-xs text-green-500 leading-tight">▲ 8.2%</p> -->
                        </div>
                        <div class="absolute bottom-0 inset-x-0">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




    <script src="chartjs.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script> 
</body>
</html>
