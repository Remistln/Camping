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
        <h1 style="margin: 5%;">Campsite activities</h1>
      </div>
      <div class="descriptif" style="width: 55%; margin: auto; padding: 10% 0 10% 0;">
        <p>
          Here you are in the activity section.<br>
          In this section you will find all the activities related to the universe of Universal studio, these
          activities are totally free (they are included in the price of the houses), <br>
          these activities are all original and different, from the meeting with the raptors in Jurassic
          world to a ride in the most emblematic cars of Fast and Furious. <br>
          For more information on the other activities, please find below the details of each activity
          we offer. <br>
          And if you have any problems, please contact us directly on the website with the heading "
          contact us "
        </p>
      </div>

      <div class="activite1" style="overflow: auto; display: flex;">
        <img src="../images/R21fb76905419aa6e1474a864e4123490.jfif" alt="" style=" width: 50%; float: left;">
        <div class="texte1" style="word-wrap : break-word; width: 50%;  margin: auto;">
          <h2 style="margin-bottom: 5%;">Ride with the Raptors</h2>
          <p>
            Travel in an off-road car and follow the raptors on their daily hunt. This activity is available 
            once a day (dates will be posted on the activity board at the campground reception),it
            suitable for young and old alike. This activity takes place in a cage of more than 5km²,
            you will be in the middle of the natural habitat of raptors, specialists will talk to you about the food given to the raptors,
            the food given to the raptors, the hunting systems used by the raptors and many other interesting information.
          </p>
        </div>
      </div>

      <div class="activite2" style="overflow: auto; display: flex;">
        <div class="texte2" style="word-wrap : break-word; width: 50%; margin: auto;">
          <h2 style="margin-bottom: 5%;">Visit London from "Mortal Engines</h2>
          <p>
            Visit London after the apocalypse, a mobile city powered by an unknown energy. Travel through the city,
            the upper part of which is for the rich and the lower part for the poor. Discover all the secrets hidden in the 
            city and defend it from invaders.
          </p>
        </div>
        <img src="../images/0414603-jpg-r_1920_1080-f_jpg-q_x-xxyxx.jpg" alt="" style=" width: 50%; float: right;">
      </div>

      <div class="activite3" style="overflow: auto; display: flex;">
        <img src="../images/fast-and-furious-5-tmc-combien-coutent-les-voitures-mythiques-de-la-saga-photos.jpg"
          alt="" style=" width: 50%; float: right;">
        <div class="texte3" style="word-wrap : break-word; width: 50%;  margin: auto;">
          <h2 style="margin-bottom: 5%;">Race with DOM and Bryan</h2>
          <p>
            Participate in a chase against the police with Dom and Bryan, through a mythical car of Fast and Furious that you will 
            choose beforehand on the spot, we have in the campsite a reconstruction of a city that is inspired by Los Angeles itself, 
            and you will be chased for a duration of 15 minutes where a professional pilot will walk around the city while avoiding the 
            obstacles that is the police, and DOM and Bryan will be your guide throughout your journey.
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