
<?php 
      include_once 'config/ConnectDB.php';
      // Nous démarrons la session
      session_start();
      // Nous vérifions nos sessions
      if(!isset($_SESSION["login"])){header("location:stater.php");}

     
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
        <h4>Note </h4>
      Entrer correctement les informations à modifier
      </div>
    </div>


    <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-image"></i> Mettre à jour votre profil
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->

      <!-- début de la modification dans la table comptes_user -->

          <?php 
               
           if (isset($_POST['update'])) {
                   
                    $bd = new ConnectDB();

                    $id = htmlspecialchars(trim($_POST['id']));
                    
                    $name = $_FILES['file']['name'];
                    $type = $_FILES['file']['type'];
                    $temp = $_FILES['file']['tmp_name'];


                      $path = "public/img/comptes/". $name;
                      move_uploaded_file($temp, $path);

                        $p=$bd->bdd->query("UPDATE useradmin SET idCpte='$id',  file='$name' WHERE idCpte='$id' ");
                      
                      if ($p == true) {
                        
                        echo "
                                 <div class=\"alert alert-success alert-dismissible\" style=\"width:250px;\">
                                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
                                    <h4><i class=\"icon fa fa-thumbs-o-up\"></i> Alert !</h4>
                                     Profil modifier avec succès !
                                  </div> 

                                 ";
                      } else {
                              echo "
                                  <div class=\"alert alert-danger alert-dismissible\" style=\"width:250px;\">
                                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
                                    <h4><i class=\"icon fa fa-ban\"></i> Alert !</h4>
                                    Echec, veuillez recommencer !
                                  </div>

                                   ";
                      }
                  }

          ?>

          <!-- fin de la modification dans la table comptes_user -->
       
        <!-- /.box-header -->

        <form action=" " method="post" enctype="multipart/form-data">
        <div class="box-body">
          <div class="row">
            <div class="col-md-4">

              <?php
                  if (isset($_GET['reference_Update'])) 
                  {
                    $bd = new ConnectDB();                  
                    $req = $bd->bdd->query("SELECT * FROM useradmin WHERE loginCpte = '".$_GET['reference_Update']."' ");
                    $rep = $req->fetch();
                    
                    echo "

                      <div class=\"form-group\">
                        <label>  Utilisateur</label>
                         <div class=\"input-group\">
                           <span class=\"input-group-addon\"><i class=\"fa fa-user\"></i></span>
                           <input name=\"id\" type=\"hidden\" value=\"$rep[idCpte]\" required />
                            <input type=\"text\" class=\"form-control\" name=\"login\" value=\"$_SESSION[login]\" readonly>
                          </div>
                      </div>
                      <!-- /.form-group -->


                      <div class=\"form-group\">
                        <label> Changer votre profil</label>
                        <div class=\"input-group\">
                         <div class=\"input-group-addon\">
                            <img src=\"public/img/comptes/$rep[file]\" width=\"55px\" height=\"50px\" alt=\"logo\" >
                            <input name=\"file\" type=\"hidden\" value=\"$rep[file]\" required />
                            </div>
                            <input type=\"file\" id=\"exampleInputFile\" name=\"file\" required>

                          </div>
                      </div>
                      <!-- /.form-group -->

              
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->
                </div>
                <!-- /.box-body -->
                <div class=\"box-footer\">
                      <button type=\"submit\" name=\"update\"  class=\"btn btn-primary\"><i class=\"fa fa-check\"></i> Modifier</button>
                          <button type=\"reset\" style=\"margin-left:10px;\" class=\"btn btn-danger\"><i class=\"glyphicon glyphicon-remove\"></i> Annuler</button>
                 </div>";

                    }
            ?> 

        </form>
        <br/> 

       
     <!--  </div> -->
      <!-- /.box -->
     
    </section>
    <!-- /.content -->
    <div class="clearfix"></div>
  </div>
  <!-- /.content-wrapper -->
  <!-- Fin Content wrapper -->



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
