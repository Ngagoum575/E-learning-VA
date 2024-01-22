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
          <p style="font-size: 19px;"> grâce à des formations métiers par des professionnels <br> en activité.</p>
        </div>
        <form action="#" method="post" enctype="multipart/form-data">
          <p style="color: red; font-size: 18px;">
              
      <?php 
          
          if (isset($_POST['save'])) {
               
                $bd = new ConnectDB();
                          
                $email = htmlspecialchars(trim($_POST['email']));
                $pwd = htmlspecialchars(trim($_POST['pwd']));
                $formation = htmlspecialchars(trim($_POST['name']));
           
       
                
                $name = $_FILES['file']['name'];
                $type = $_FILES['file']['type'];
                $temp = $_FILES['file']['tmp_name'];
                $status = 1;
                


                $c = $bd->bdd->query("SELECT * FROM auth_app WHERE email = '".$email."' && pwdCpte = '".$pwd."' ") or die(mysql_error());
                $a1 = $c->fetch();

                if ($a1 == NULL) {

                  $path = "public/file/comptes/". $name;
                  move_uploaded_file($temp, $path);

                    $p=$bd->bdd->query("INSERT INTO auth_app (email,pwdCpte,listformation,file,location,status) VALUES ('$email','$pwd','$formation','$name','$path','$status')");
                  
                  if ($p == true) {
                    
                    echo " Compte crée avec SUCC&Egrave;S ! ";
                  } else {
                          echo " &Eacute;CHEC, veillez ressaisir !";
                  }}else{

                     echo " Ce compte existe déja !";
                }
              }

        

      ?>
          </p>
          <input type="email" name="email" placeholder="Entrer votre email" required>
          <input type="password" name="pwd" placeholder="Votre mot de passe" required>
          <select  name="name" required>
                  <option>Liste des formations</option>
                  <option value="Developpeur web et wordpress">Developpeur web et wordpress</option>
                  <option value="react/Nodejs">React/NodeJs</option>
                  <option value="Javascript">Javascript</option>
                  <option value="Laravel">Laravel</option>
                  <option value="Python">Python </option>         
           </select><br/>
           
           <div class="form-group">
                <label>Votre Cv</label>
                <div class="input-group">
                   <span class="input-group-addon"><i class="fa fa-file-image-o"></i></span>
                    <input type="file" name="file" required>

                  </div>
              </div>
          <div class="link">
            <button type="submit" name="save" class="login">S'inscrire</button>
          </div>
          <hr>
          <div class="button">
            <a href="index">Se connecter</a>
          </div>
        </form>
      </div>
    </div>
  </body>
</html>