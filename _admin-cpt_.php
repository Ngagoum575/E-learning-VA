
<?php 
      include_once 'config/ConnectDB.php';
      // Nous démarrons la session
      session_start();
      // Nous vérifions nos sessions
      if(!isset($_SESSION["login"])){header("location:_stater_.php");}

?>


    <!-- Page entete -->
      <?php include_once 'pages_utiles/entete.php'; ?>
   <!-- Fin Page entete -->


<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

 

  <!-- Main header -->
        <?php include_once 'pages_utiles/main-header.php'; ?>
  <!-- Fin Main header -->


  <!-- Main sidebar -->
        <?php include_once 'pages_utiles/main-sidebar.php'; ?>
  <!-- Main sidebar -->
  
  
 <!-- Content Wrapper. Contains page content -->
        
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1></h1> 
    </section>

    <div class="pad margin no-print">
      <div class="callout callout-info" style="margin-bottom: 0!important;">
        <h4>Note</h4>
      Entrer correctement les informations
      </div>
    </div>





    <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-sign-in"></i> Créer un nouveau compte
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
     
      <!-- début de l'insertion dans la table comptes_user --> 
          <?php 
          
              if (isset($_POST['save'])) {
                   
                    $bd = new ConnectDB();

                    $login = addslashes(htmlspecialchars(trim($_POST['login'])));
                    $pwd = htmlspecialchars(trim($_POST['pwd']));
                    $fct = htmlspecialchars(trim($_POST['fonction']));
                    $tel = htmlspecialchars(trim($_POST['tel']));                           
                    $email = htmlspecialchars(trim($_POST['email']));
                    // Checking the timezone.
                    date_default_timezone_set('Africa/Bangui');
                    $date = date('d-m-Y');
           
                    
                    $name = $_FILES['file']['name'];
                    $type = $_FILES['file']['type'];
                    $temp = $_FILES['file']['tmp_name'];


                    $c = $bd->bdd->query("SELECT * FROM useradmin WHERE loginCpte = '".$login."' && pwdCpte = '".$pwd."' ") or die(mysql_error());
                    $a1 = $c->fetch();

                    if ($a1 == NULL) {

                      $path = "public/img/comptes/". $name;
                      move_uploaded_file($temp, $path);

                        $p=$bd->bdd->query(" INSERT INTO useradmin (loginCpte,pwdCpte,fctCpte,telCpte,emailCpte,dateCreationCpte,file,location) VALUES ('$login','$pwd','$fct','$tel','$email','$date','$name','$path')");
                      
                      if ($p == true) {
                        
                        echo "
                                 <div class=\"alert alert-success alert-dismissible\" style=\"width:250px;\">
                                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
                                    <h4><i class=\"icon fa fa-thumbs-o-up\"></i> Alert !</h4>
                                     Compte crée avec SUCC&Egrave;S !
                                  </div> 

                                 ";
                      } else {
                              echo "
                                  <div class=\"alert alert-danger alert-dismissible\" style=\"width:250px;\">
                                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
                                    <h4><i class=\"icon fa fa-ban\"></i> Alert !</h4>
                                    &Eacute;CHEC, veillez ressaisir !
                                  </div>

                                   ";
                      }}else{

                         echo "
                               <div class=\"alert alert-danger alert-dismissible\" style=\"width:250px;\">
                                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
                                    <h4><i class=\"icon fa fa-ban\"></i> Alert !</h4>
                                    Ce compte existe déja !
                                </div>

                            ";
                    }
                  }

            // Generation de mot de passe automatiquement

            function generatePassword ($length = 8)
            {
              $genpassword = "";
              $possible = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
              $i = 0;
              while ($i < $length) {
                $char = substr($possible, mt_rand(0, strlen($possible)-1), 1);
                if (!strstr($genpassword, $char)) {
                  $genpassword .= $char;
                  $i++;
                }
              }
              return $genpassword;
            }

               // Generation du Matricule

             function generateMatricule ($length = 4)
               {
                $genpassword = "";
                $possible = "0123456789abcemsuABCEMSU";
                $i = 0;
                while ($i < $length) {
                $char = substr($possible, mt_rand(0, strlen($possible)-1), 1);
                if (!strstr($genpassword, $char)) {
                   $genpassword .= $char;
                 $i++;
                  }
                }
               return $genpassword;
             }

          ?>

          
          <!-- fin de l'insertion dans la table comptes_user -->
          
         <!-- /.box-header -->
        <form action=" " method="post" enctype="multipart/form-data">
        <div class="box-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Matricule</label>
                  <div class="input-group">
                        <input type="text" class="form-control" name="login" value="<?php echo generateMatricule(); ?>" readonly>
                          <span class="input-group-btn">
                            <button type="submit" class="btn btn-info btn-flat">Géneration automatique <i class="fa fa-cog"></i></button>
                          </span>
                    </div>
                </div>
             

              <!-- /.form-group -->

              <div class="form-group">
                <label>Mot de passe</label>
                  <div class="input-group">
                        <input type="text" class="form-control" name="pwd" value="<?php echo generatePassword(); ?>" readonly>
                          <span class="input-group-btn">
                            <button type="submit" class="btn btn-danger btn-flat">Géneration automatique <i class="fa fa-code"></i></button>
                          </span>
                    </div>
                </div>

              <!-- /.form-group -->

              <div class="form-group">
                    <label>Comptes utilisateurs</label>
                      <select class="form-control" name="fonction" style="width: 100%;">
                         <option selected="selected">-- Choix du Compte --</option>
                         <option value="Administrateur">Administrateur</option>
                         <option value="Enseignant">Enseignant</option>
                   
                     </select>
                </div>

              <!-- /.form-group -->

           
            </div>
            <!-- /.col -->
            <div class="col-md-6">
              <div class="form-group">
                <label>Téléphone</label>
                <div class="input-group">
                   <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                    <input type="number" class="form-control" name="tel" placeholder="Entrer le n° de téléphone de l'utilisateur">
                  </div>
              </div>
              <!-- /.form-group -->
              <div class="form-group">
                <label>Email</label>
                <div class="input-group">
                   <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                    <input type="email" class="form-control" name="email" placeholder="Entrer l'adresse Email de l'utilisateur">
                  </div>
              </div>

                 <!-- /.form-group -->
          

              <div class="form-group">
                <label>Photo de profil</label>
                <div class="input-group">
                   <span class="input-group-addon"><i class="fa fa-file-image-o"></i></span>
                    <input type="file" name="file" required>

                  </div>
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
              <button type="submit" name="save"  class="btn btn-primary"><i class="fa fa-check"></i> Créer </button>
                  <button type="reset" style="margin-left:10px;" class="btn btn-danger" ><i class="glyphicon glyphicon-remove"></i>  Annuler</button>
        </div>
        </form><br/> 

       
     <!--  </div> -->
      <!-- /.box -->
     
    </section>
    <!-- /.content -->
    <div class="clearfix"></div>
  </div>
  <!-- /.content-wrapper -->



  <!-- Pied de page -->
        <?php include_once 'pages_utiles/main-footer.php'; ?>
  <!-- Fin Pied de page -->


  <!-- Control Sidebar -->
        <?php include_once 'pages_utiles/control-sidebar.php'; ?>
  <!-- Fin Control Sidebar -->



  <div class="control-sidebar-bg"></div>

</div>

  <!-- Script javascript et Jquery -->
        <?php include_once 'pages_utiles/script_pied.php'; ?>
  <!-- Fin Script javascript et Jquery -->

</body>
</html>
