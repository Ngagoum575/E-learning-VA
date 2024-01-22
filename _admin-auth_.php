
   <!-- Page entete -->
   <?php 
            include_once 'pages_utiles/entete.php'; 
            include 'config/ConnectDB.php';
       ?>
   <!-- Fin Page entete -->



 <body  class="login-page" onload="masquer();">
    <div style="box-shadow: 1px 1px 13px #555;" class="login-box">
    
      <div class="login-box-body">
        <p style="color:red;" class="login-box-msg"><b>C-PANEL ADMINISTRATEUR</b></p>
        <p class="login-box-msg">Veillez renseigner les informations</p>



        <?php

        $bd = new ConnectDB();
           
        if (isset($_POST['valider']))
        {           
          $login = addslashes(htmlspecialchars(trim($_POST['login'])));
          $pass = addslashes(htmlspecialchars(trim($_POST['pwd'])));
            
          //test de connexion pour l'administrateur
          $resultats = $bd->bdd->query("SELECT * FROM useradmin WHERE loginCpte='" . $login . "' && pwdCpte='" . $pass . "' && fctCpte='Administrateur' ") or die(mysql_error());
          $req = $resultats->fetch();
            
          if ($req == NULL)
          {
             echo"<span style=\"margin-bottom:12px;\" id=\"erreur\"class=\"btn btn-block btn-danger disabled\"> Désolé, Informations INCORRECTES !</span>";
          }
          else
          {
            if( sha1($req["pwdCpte"]) == sha1($pass) && sha1($req["loginCpte"]) == sha1($login) )
            {
              session_start();

              $_SESSION["id"] = $req["idCpte"];
              $_SESSION["login"] = $req["loginCpte"];
              $_SESSION["password"] = $req["pwdCpte"];
              $_SESSION["fonction"] = $req["fctCpte"];
              $_SESSION["photo"] = $req["file"];
              $_SESSION["dateCpte"] = $req["dateCreationCpte"];
              
              header("location:_stater_.php");    
            }
            else
            {
              echo "<script language='javascript'>alert('Désolé, Informations INCORRECTES, veillez ressaisir !')</script>";
            }
          }               
        }

      ?>

     
        <form action=" " method="post">
          <div class="form-group has-feedback">
            <input type="text" name="login" class="form-control" placeholder="Entrer matricule " onclick="erreur();" required />
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" name="pwd" class="form-control" placeholder="Entrer votre mot de passe"  id="check" required />
            <input type="checkbox" onclick="showPw()" /> Afficher <i class="fa fa-lock"></i>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>

            <script>
              function showPw(){
                var input = document.getElementById('check');
                if(input.type == "password"){

                   input.type = "text";
                }else{
                   input.type = "password";
                }
                
              }
          </script>

          </div>
       
          <div class="row">
            <div class="col-xs-8">
              
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" name="valider" class="btn btn-primary btn-block btn-flat"><i class="fa fa-check"></i> Valider</button>
            </div><!-- /.col -->
          </div>
        </form><br>

         <!-- /.social-auth-links -->
      <a href="_forgot_pwd_" >
        <p class="login-box-msg"> Mot de passe oublié</p>
      </a>

      <a href="_auth-form_">
         <button class="btn btn-info btn-block btn-flat"><i class="fa fa-eye"></i> Formateur</button>
      </a>
        

      </div><!-- /.login-box-body -->   
    </div><!-- /.login-box -->


  <!-- Script javascript et Jquery -->
        <?php include_once 'pages_utiles/script_pied.php'; ?>
  <!-- Fin Script javascript et Jquery -->

    <script>
    function masquer () {
        $('#oubli_pwd').hide();
          };
      function alert(){
            $('#oubli_pwd').fadeToggle();
      }
      function erreur(){
            $('#erreur').hide();
      }
    </script>

</body>
</html>
