<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,300;1,400;1,500;1,600;1,700&family=Montserrat:wght@500&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Centre National Informatique</title>
</head>
<body>
  <!--css-->
  <style>
    /* --------------------body------------------- */
body{
    overflow-x: hidden;
    font-family: 'Josefin Sans', sans-serif;
}
/* ----------------------navbar------------------- */
.navigation{
    background-color: #7C898B;
    height: 60px;
    
}
.navbar-brand{
font-weight: 800;

}
.navbar-brand .informatique{
    color:#be0015;
}
.nav-item{
    margin-left: 28px;
    font-size: 18px;
    
}
.link{
    color: black  ;
    font-size: 16px;
    font-weight: 500;
    transition: 1s all ease;
}
.link:hover{
    color: #F7B538;
}
.home{
    color: #F7B538;
    font-weight: 500;
}


    /* Default height for small devices */
    #intro-example {
      height: 400px;
    }

    /* Height for devices larger than 992px */
    @media (min-width: 992px) {
      #intro-example {
        height: 600px;
      }
    }

    .loca{
      color:#3C3C3B ;
      font-weight: 800;
      padding-top: 15px;
      text-align:center ;
    }

  </style>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid navigation">
             <a  class="navbar-brand" href="index.php">
      <img src="../Espace Participant/images/logotn.png" alt="" width="60" height="54">
    </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <a class="navbar-brand centre" href="index.php" style="color:#F7B538;">Centre National <span class="informatique">Informatique</span> </a>
          <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php"><span class="home">Home</span> </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="formation.php"> <span class="link">Formation</span> </a>
              </li>
              <li class="nav-item">
                <a class="nav-link login" href="contact.php"> <span class="link">Contact</span> </a>
              </li>
            </ul>
            
          </div>
        </div>
      </nav>
  


  <!-- Background image -->
  <div
    id="intro-example"
    class="p-5 text-center bg-image"
    style=" background:url(./images/web.jpg) no-repeat;
    background-size:cover ;
    background-position: center;
    background-attachment: fixed;"         
  >
  
    <div class="mask" style="background-color: rgba(0, 0, 0, 0.6); margin-top:300px;">
      <div class="d-flex justify-content-center align-items-center h-100">
        <div class="text-white">
          <h1 class="mb-3">Apprenez la programmation avec nous</h1>
          <h5 style="color:#902D41 ;font-weight: 900;" class="mb-4">Centre National Informatique</h5>
          <a
            class="btn btn-outline-light btn-lg m-2"
            href="formation.php"
            role="button"
            rel="nofollow"
            target="_blank"
          > Les Formations</a
          >
          <!-- <a
            class="btn btn-outline-light btn-lg m-2"
            href="https://mdbootstrap.com/docs/standard/"
            target="_blank"
            role="button"
          >Download MDB UI KIT</a
          > -->
        </div>
      </div>
    </div>
  </div>
  <!-- Background image -->
</header>

<div class="container-fluid">
  <h1 class="loca">Où sommes nous ?</h1>
<iframe style="width:100% ; padding-top:10px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12776.972009177018!2d10.1658505!3d36.8126965!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x48d6f4f6afb7d57!2zQ2VudHJlIE5hdGlvbmFsIGRlIGwnSW5mb3JtYXRpcXVlIChDTkkpIC0g2KfZhNmF2LHZg9iyINin2YTZiNi32YbZiiDZhNmE2KXYudmE2KfZhdmK2Kk!5e0!3m2!1sfr!2stn!4v1661118137013!5m2!1sfr!2stn" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>


<div data-aos="flip-left"
     data-aos-easing="ease-out-cubic"
     data-aos-duration="2000">
</div


   
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