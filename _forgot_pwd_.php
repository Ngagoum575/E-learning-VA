
    <!-- Page entete -->
      <?php 
            include 'config/ConnectDB.php';
            include_once 'pages_utiles/entete.php';


       ?>
   <!-- Fin Page entete -->



 <body  class="login-page" onload="masquer();">
    <div style="box-shadow: 1px 1px 13px #555;" class="login-box">
      <div class="login-box-body">
        <p class="login-box-msg">Veillez saisir l'email du compte crée</p>



       <!-- ---------------------------------------------------------- PHP CODE REGISTER ------------------------------------------------ -->
     
      <?php 
            include 'functions/mail/save_mail.php';

            $bd = new ConnectDB();

            if (isset($_POST['save'])) 
            {
                 $email = htmlspecialchars(trim($_POST['emailCpte']));
                 $data = $bd->bdd->query("SELECT * FROM useradmin WHERE emailCpte = '".$email."' ") or die(mysql_error());
                 $data->execute();


                 // Trier les infos dans la bd

                 while($row = $data->fetch())
                 {
                      $email = $row['emailCpte'];
                      $dbid = $row['idCpte'];
                      $token = uniqid(md5(time()));

                       // Isérer mail dans la bd
                      $p = save_mail($email,$token);

                      if ($p == true)
                      {


                             echo  $message = " 
                                           <div class=\"alert alert-success\" style=\"width:320px;\">
                                            <button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>
                                            <strong><i class=\"glyphicon glyphicon-ok\"></i> Cliquez <a href=\"_reset_pwd_?token=$token\">ici</a> pour réinitialiser </strong>
                                          </div> ";
                      }

                 }

             
              } 
          ?>


    
<!-- ---------------------------------------------------------------------------------------------------------------------------- -->

     
        <form action=" " method="post">
          <div class="form-group has-feedback">
            <input type="text" name="emailCpte" class="form-control" placeholder="Entrez votre adresse Email" onclick="erreur();" required />
            <span class="fa fa-at form-control-feedback"></span>
          </div>
         
          <div class="row">
            <div class="col-xs-8">
             
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" name="save" class="btn btn-primary btn-block btn-flat"><i class="fa fa-check"></i> Valider</button>
            </div><!-- /.col -->
          </div>
        </form>

       

      <a href="_admin-auth_" >
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
