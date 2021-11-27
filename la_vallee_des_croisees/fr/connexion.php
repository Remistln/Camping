<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>connection</title>
  <!-- Bootstrap core CSS -->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../css/simple-sidebar.css" rel="stylesheet">
  <link href='../dist/toastifier.min.css' rel="stylesheet">
    
  <style>
    
  @import 
url('https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap');

 *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    list-style:none; 
    text-decoration: none;
    font-family: 'Josefin Sans', sans-serif;
 }
 .coin {
  background-color:#f9fbfd;
  border:1px solid #183c5f;
  padding:5px;
  width:auto ; 
  height:auto;
  /*arrondir les coins en haut à gauche et en bas à droite*/
  -moz-border-radius:10px ;
  -webkit-border-radius:10px ;
  border-radius:10px ;
 
  }
  </style>
</head>

<body>
    <div style="margin-top:5%;margin-left:5%;">
    <div class="container coin text-center">
        <h1>Connectez-vous</h1>
    <form action="./administration/verif_login.php" method="POST" class="form">
        <div class="form" style="margin-top:2cm;">
            <label for="login">login:</label>
            <input name="log" type="text" id="login" required>
        </div>
        <div class="form" style="margin-top:2cm;">
            <label for="password">password:</label>
            <input name="mdp" type="password" id="password" required>
        </div>
        <div class="form" style="margin-top: 3cm;">
            <input type="submit" value="Se connecter">
        </div>
        <div class="form" style="margin-top:1cm;">
            <input type="button" onclick="window.location.href = 'inscription.php';" value="Je m'inscris!">
        </div>
        <div class="form">
            <a href="index.php">retour</a>
        </div>
    </form>
</div>
</div>
</body>
</html>