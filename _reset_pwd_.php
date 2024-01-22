
    <!-- Page entete -->
      <?php 
            include 'config/ConnectDB.php';
            include_once 'pages_utiles/entete.php'; 

      ?>
   <!-- Fin Page entete -->



 <body class="login-page" onload="masquer();">
     <div style="box-shadow: 1px 1px 13px #555;" class="login-box">
    
      <div class="login-box-body">
        <p class="login-box-msg">Veillez renseigner les informations</p>


<!-- ---------------------------------------------------------- PHP CODE REGISTER ------------------------------------------------ -->
     
      <?php 

          include 'functions/mail/reset_password.php';

          $bd = new ConnectDB();

          if (isset($_GET['token'])) 
            {

                $token = $_GET['token'];
                $query = $bd->bdd->query("SELECT * FROM password_reset WHERE token = '".$token."' ") or die(mysql_error());
                $query->execute();


                // Trier les infos dans la bd

                if($row = $query->fetch())
                {
                   $dbtoken = $row['token'];
                   $email = $row['emailCpte'];
                }else{
                      header("location:_admin-auth_.php");
                }
            }

       /*--------------------------------------------------------------------------------------------------------------------------*/


            if (isset($_POST['save'])) 
            {
               $id = $_POST['email'];
               $email = $_POST['email'];
               $pwd = $_POST['pwd'];
               $pwdConfirm = $_POST['pwdconfirm'];
        
          

               if($pwd!=$pwdConfirm)
               {
                  echo $message = " <div class=\"alert alert-danger\" style=\"width:320px;\">
                                            <button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>
                                            <strong> Désolé, le mot de passe ne correspond pas</strong>
                                    </div>";

               }else{
                
                      $bd = new ConnectDB();

                      $query = $bd->bdd->query("SELECT * FROM useradmin WHERE pwdCpte = '".$pwd."' && emailCpte ='".$email."' ") or die(mysql_error());
                       $query->execute();

                       // Trier les infos dans la bd

                       while($row = $query->fetch())
                       {
                          $id = $row['emailCpte'];
                          $pwd = $row['pwdCpte'];
                          $email = $row['emailCpte'];
                      
                       }

                          // Isérer mail dans la bd
                         $p = update_reset_password($id,$pwd,$email);

                      
                      if ($p == true)
                      {
                               echo $message = " <div class=\"alert alert-success\" style=\"width:320px;\">
                                            <button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>
                                            <strong><i class=\"glyphicon glyphicon-ok\"></i>  Le Mot de passe à été réinitialisé ! </strong>
                                       </div>";
                      }else{
                               echo $message = " <div class=\"alert alert-danger\" style=\"width:320px;\">
                                            <button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>
                                            <strong> Echec de la réinitialisation ! </strong>
                                         </div>";
                      }
                     
                        
                        
                 }

               }
            
           
      ?>


    
<!-- ---------------------------------------------------------------------------------------------------------------------------- -->

     
        <form action=" " method="post">
          <div class="form-group has-feedback">
            <input type="email" name="email" class="form-control" placeholder="Entrez votre adresse Email" value="<?php echo  $email; ?>" required />
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>

          <div class="form-group has-feedback">
            <input type="password" name="pwd" class="form-control"  onclick="erreur();" placeholder="Entrez votre mot de passe" required />
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>

          <div class="form-group has-feedback">
            <input type="password" name="pwdconfirm" class="form-control" placeholder="Confirmé votre mot de passe" required />
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">
              <!-- <div class="checkbox icheck">
                <label style="margin-left: 11%; color: black;">
                  <input type="checkbox"> Se Rappeler de moi ?  
                </label>
              </div> -->
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" name="save" class="btn btn-primary btn-block btn-flat"><i class="fa fa-check"></i> Valider</button>
            </div><!-- /.col -->
          </div>
        </form>

         <!-- /.social-auth-links -->
      <a href="c-panel.php" >
        <p class="login-box-msg"> Se connecté</p>
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
