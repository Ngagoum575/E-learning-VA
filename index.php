<?php  include_once 'config/ConnectDB.php';?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VisionAcademie</title>
    <link rel="stylesheet" href="public/css/style.css">
  </head>
  <body>
    <div class="container flex">
      <div class="facebook-page flex">
        <div class="text">
          <h1 style="color:#0f625b;">VisionAcademie <sup>&reg;</sup> </h1>
          <p style="font-size: 19px;">Devenez expert dans les métiers de l’IT et du digital </p>
          <p style="font-size: 19px;"> grâce à des formations métiers par des professionnels <br>en activité.</p>
        </div>
        <form action="#" method="post" enctype="multipart/form-data">

          <p>
                <?php

                  $bd = new ConnectDB();
                    
                  if (isset($_POST['valider']))
                  {           
                    $email = addslashes(htmlspecialchars(trim($_POST['email'])));
                    $pass = addslashes(htmlspecialchars(trim($_POST['pwd'])));
                      
                    //test de connexion pour l'apprenant
                    $resultats = $bd->bdd->query("SELECT * FROM auth_app WHERE email='" . $email . "' && pwdCpte='" . $pass . "' ") or die(mysql_error());
                    $req = $resultats->fetch();
                      
                    if ($req == NULL)
                    {
                      echo"<span style=\"margin-bottom:12px;\" id=\"erreur\"class=\"btn btn-block btn-danger disabled\"> Désolé, Informations INCORRECTES !</span>";
                    }
                    else
                    {
                      if( sha1($req["pwdCpte"]) == sha1($pass) && sha1($req["email"]) == sha1($email) )
                      {
                        session_start();

                        $_SESSION["id"] = $req["id"];
                        $_SESSION["email"] = $req["email"];
                        
                        header("location:_adm-std_.php");    
                      }
                      else
                      {
                        echo "<script language='javascript'>alert('Désolé, Informations INCORRECTES, veillez ressaisir !')</script>";
                      }
                    }               
                  }

                  ?>
          </p>
          <input type="email" name="email" placeholder="Entrer votre email" onclick="erreur();" required>
          <input type="password" name="pwd" placeholder="Votre mot de passe" required>
         
          <div class="link">
            <button type="submit" name="valider" class="login">Se Connecter</button>
            <a href="#" class="forgot">Mot de passe oublie ?</a>
          </div>
          <hr>
          <div class="button">
            <a href="_creer-cpt_">Créer votre compte</a>
          </div>
        </form>
      </div>
    </div>


    <script>
      function erreur(){
             $('#erreur').hide();
           }
    </script>
  </body>
</html>