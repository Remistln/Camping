<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Bootstrap core CSS -->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../css/simple-sidebar.css" rel="stylesheet">

  <style>
    @import url('https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap');

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      list-style: none;
      text-decoration: none;
      font-family: 'Josefin Sans', sans-serif;
    }

    .coin {
      background-color: #f9fbfd;
      border: 1px solid #183c5f;
      padding: 5px;
      /*arrondir les coins en haut à gauche et en bas à droite*/
      -moz-border-radius: 10px;
      -webkit-border-radius: 10px;
      border-radius: 10px;
    }
  </style>

</head>

<body>

  
  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right col-2" id="sidebar-wrapper" style="position: fixed; padding :0%; text-align: center;">
      <div class="sidebar-heading">
        <h2><b>Vallée des croisés</b></h2>
      </div>
      <img src="../images/valee.jpg" alt="Logo" style="width:60%">
      <div class="list-group list-group-flush" style="width: 100%; text-align: center;">

        <a href="./index_en.php" class="list-group-item list-group-item-action bg-light">Home page</a>
        <a href="./destination_en.php" class="list-group-item list-group-item-action bg-light">Destinations</a>
        <a href="./activite_en.php" class="list-group-item list-group-item-action bg-light">Activities</a>
        <a href="../fr/client/rechercheReservation.php" class="list-group-item list-group-item-action bg-light">Booking</a>
        <a href="../fr/client/listReservation.php" class="list-group-item list-group-item-action bg-light">My reservations</a>
        <a href="../fr/contacter.php" class="list-group-item list-group-item-action bg-light">Contact us</a>
        <div class="profile">
          <div class="div-divider" style="border-top: 3px solid black; text-align: center;"></div>
          <p>Disconnected</p>
          <a href="../fr/connexion.php" class="btn btn-outline-primary" role="button">Login</a>
        </div>
        <div id="langage" style="margin-top: 5%;">
          <select name="forma" onchange=" location= this.value;" id="forma" style="width: 20%;">
            <option value="./index_en.php">En</option>
            <option value="../fr/index.php">Fr</option>
          </select>
        </div>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->
    <!-- Page Content -->
    <div class="col-12" style="margin-left: 15%;">
    <div id="carouselControls" class="carousel slide container col-12" data-ride="carousel">
      <div class="carousel-inner row">
        <div class="col-12 text-center">

          <div class="carousel-item active">
            <img src="../images/home1.jpg" class="d-block w-100" style="height: 100vh; object-fit: cover;">
          </div>
          <div class="carousel-item">
            <img src="../images/home2.jpeg" class="d-block w-100" style="height: 100vh; object-fit: cover;">
          </div>
          <div class="carousel-item">
            <img src="../images/home3.webp" class="d-block w-100" style="height: 100vh; object-fit: cover;">
          </div>
        </div>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselControls" role="button" data-slide="prev" style="margin-left:15%;">
    <span class="carousel-control-prev-icon" aria-hidden="true" style="color:#183c5f;">
      <span class="sr-only">Previous</span>
    </span>
  </a>
  <a class="carousel-control-next" href="#carouselControls" role="button" data-slide="next" style="margin-right:0%;">
    <span class="carousel-control-next-icon" aria-hidden="true" style="color:#183c5f;">
      <span class="sr-only">Next</span>
    </span>
  </a>
  </div>
  <div style=" margin-left: 17%; width: 83%; " >
  <div class="container" style="padding-top: 5%;">
    <div class="row ">
      <div class="col-10 col-md-10  text-center coin" style="margin-left:7%; text-align: center">


        <p></b>Welcome in "La vallée des croisés" ! <br> 
          Here you will find the best camping in the United States, with activities that are unique in the world! <br>
          Outdoor activities with your favorite movie heroes, a swimming pool with games associated with Universal movies
          and much more (check out our activities section). Movie-related houses, such as the dwarf house, the goose house
          house, the ogre house and the elf house.
          Our campsite is located next to the universal studio theme park. Moreover, by booking a mobile home in this campsite, you will have 
          a 20% discount on the entrance tickets to the park. It's a great deal! <br></b>
        </p>

      </div>
    </div>
  </div>

  <div class="container" style=" margin-left: 10%;">
    <div class="row " style="padding-top: 5%;">
      <div class="col-5 coin" style="margin-right: 1%;">
        <a href="./activite_en.php" class=" text-center " style="margin-left: auto; text-align: center; ">
          <h2>Activities</h2>
        </a>
      </div>
      <div class="col-5 coin" style="margin-left: 1%;">
        <a href="./destination_en.php" class=" text-center " style="margin-left: auto; text-align: center;">
          <h2>Destinations</h2>
        </a>

      </div>
    </div>
  </div>
  <div class="container">
    <div class="row text-center" style="padding-top: 5%;">
      <div style="margin-left: 44%;">
        <button type="button" class="btn btn-primary"
          style="margin-left: auto; text-align: center; font-family:Arial, Helvetica, sans-serif;">Book here</button>
        </a>
      </div>
    </div>
  </div>

  <div class="container " style="margin-top: 2%;">
    <div class="row coin">

      <div class="col-6 col-lg-6"  style="margin: auto;">
        <img src="../images/news1.png" alt="..." class="col-12">
      </div>
      <div class="col-6 col-lg-6">
        <h2 style="margin-top: 5%;">Maintenance</h2>
        <p style="margin-top: 1%;">A maintenance of the site will occur on 05/30 at 4pm. The site will be unavailable for 2 to 3 hours.</p>
      </div>

    </div>
  </div>
  <div class="container " style="margin-top: 2%;">
    <div class="row coin ">

      <div class="col-6 col-lg-6" style="margin: auto;">
        <img src="../images/news2.jpg" alt="..." class="col-12">
      </div>
      <div class="col-6 col-lg-6">
        <h2 style="margin-top: 5%;">A brand new activity</h2>
        <p style="margin-top: 1%;">Could it be animals that we see there? Yes, they are! With the movie Dr. Doolittle, we created a zoo with the animals that appeared in the movie, you can feed them, see a veterinarian in action and much more!</p>
      </div>

    </div>
  </div>
  <div class="container " style="margin-top: 2%;">
    <div class="row coin">

      <div class="col-6 col-lg-6"  style="margin: auto;">
        <img src="../images/news3.jpg" alt="..." class="col-12">
      </div>
      <div class="col-6 col-lg-6">
        <h2 style="margin-top: 5%;">Employee search</h2>
        <p style="margin-top: 1%;">We are looking for our team, a person with the knowledge and skills to perform front end, please send a message, if you are interested, in the contact us tab.</p>
      </div>

    </div>
  </div>
  </div>
</div>
  <!-- Bootstrap core JavaScript -->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function (e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>

  <footer class="footer" style="margin-top: 2%; margin-left: 17%; background-color: black;">
    <div class="container text-center">
      <a href="#"><i class="fa fa-facebook"></i></a>
      <a href="#"><i class="fa fa-twitter"></i></a>
      <a href="#"><i class="fa fa-linkedin"></i></a>
      <a href="#"><i class="fa fa-google-plus"></i></a>
      <a href="#"><i class="fa fa-skype"></i></a>
    </div>
  </footer>

</body>

</html>