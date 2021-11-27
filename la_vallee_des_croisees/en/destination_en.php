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
    <div id="body" class="col-10" style="margin-left: 17%; text-align: center;">
      <div>
        <h1 style="margin: 5%;">Nearby destinations</h1>
      </div>
      <div class="descriptif" style="width: 55%; margin: auto; padding: 10% 0 10% 0;">
        <p>
          Here you are in the destinations section. You will find all the destinations close to the campsite, starting from a zoo or visiting the Universal park,
          you will be sure to spend an unforgettable moment in these places.

        </p>
      </div>

      <div class="activite1" style="overflow: auto; display: flex;">
        <img src="../images/Universal_Studios_-_Studio_Tour.jfif" alt="" style=" width: 50%; float: left;">
        <div class="texte1" style="word-wrap : break-word; width: 50%;  margin: auto;">
          <h2 style="margin-bottom: 5%;">Universal studio</h2>
          <p>
            Visit Universal Studios through a mini-train exclusive to the campground that will take you to the most famous places of the park, but above 
            all you will learn more about this mythical place with our private guide who is a former employee of Universal Studios.
          </p>
        </div>
      </div>

      <div class="activite2" style="overflow: auto; display: flex;">
        <div class="texte2" style="word-wrap : break-word; width: 50%; margin: auto;">
          <h2 style="margin-bottom: 5%;">Heading to Yosemite National Park</h2>
          <p>
            Come and charge your batteries at Yosemite Park, the third largest national park in California. With its spectacular waterfalls and granite domes, 
            this park attracts thousands of hikers each year. For those staying at the campground, we offer a special tour with our local guide.
          </p>
        </div>
        <img src="../images/yosemite-ouest-américain-2-min-1.jpg" alt="" style=" width: 50%; float: right;">
      </div>

      <div class="activite3" style="overflow: auto; display: flex;">
        <img src="../images/20180426-104539-largejpg.jpg"
          alt="" style=" width: 50%; float: right;">
        <div class="texte3" style="word-wrap : break-word; width: 50%;  margin: auto;">
          <h2 style="margin-bottom: 5%;">San Diego Zoo </h2>
          <p>
            Take a bus tour of the park and feed the resident animals. We offer a half-price tour of the park for campground residents, and go behind the scenes
            of the park with their private plantations for each animal that the zoo has.
          </p>
        </div>
      </div>
      <footer class="footer">
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