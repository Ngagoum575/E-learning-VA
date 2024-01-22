<?php 

  include_once 'config/ConnectDB.php';
  // Nous démarrons la session
  session_start();
  // Nous vérifions nos sessions
  if(!isset($_SESSION["login"])){header("location:_stater_.php");}
   
   

?>

<!-- Script Datatable -->
        <?php include_once 'pages_utiles/entete.php'; ?>
<!-- Fin Datatable -->


<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<!-- Script main-header -->
        <?php include_once 'pages_utiles/main-header.php'; ?>
<!-- Fin main-header -->



<!-- Script main-sidebar -->
        <?php include_once 'pages_utiles/main-sidebar.php'; ?>
<!-- Fin main-sidebar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <section class="content-header">
      <h1></h1> 
    </section>

    <div class="pad margin no-print">
      <div class="callout callout-info" style="margin-bottom: 0!important;">
         <h4>Note</h4>
      Cliquez sur  <i class="fa fa-pencil"></i> pour une ACTION sur le compte
      </div>
    </div>

    <!-- Content Header (Page header) -->
   

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h3 class="box-title"> <i class="fa  fa-meh-o"></i> Liste des Comptes  </h3>
            </div>



                    <?php 
                      
                      if (isset($_GET['reference_Delete'])) 
                      {
                        $p = delete_compte_admin($_GET['reference_Delete']);
                          if ($p == true)
                          {

                           
                            echo "
                               <div class=\"alert alert-success alert-dismissible\" style=\"width:250px;\">
                                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
                                <h4><i class=\"icon fa fa-check\"></i> Alert !</h4>
                                Compte supprimé avec succès
                              </div> ";


                              
                          }else{

                              echo "
                                  <div class=\"alert alert-danger alert-dismissible\" style=\"width:250px;\">
                                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
                                    <h4><i class=\"icon fa fa-ban\"></i> Alert !</h4>
                                   ECHEC de suppression !
                                  </div> "; 
                            }
                      } 
                
                    ?>
                    


      <!-- -------------------------------------------------------------------------------------------------------------------------- -->

            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <th>N°</th>
                  <th>Votre Login </th>
                  <th> Mot de passe </th>
                  <th> Email</th>
                  <th> Fonctions</th>
                  <th>Actions</th>
                </thead>
                <?php
                      $bd = new ConnectDB();                      
                      $req = $bd->bdd->query("SELECT * FROM useradmin ") or die(mysql_error());
                      $i = 1;
                       while($rep = $req->fetch())
                      {

                        $_SESSION["loginCpte"] = $rep['loginCpte'] ;
                ?>
                   <tr>
                     <td><button type="button" class="btn btn-default btn-circle"><?php echo $i; ?></button></td>                  
                      <td><?php echo $rep['loginCpte']; ?></td> 
                      <td><?php echo $rep['pwdCpte']; ?></td>
                      <td><?php echo $rep['emailCpte']; ?></td>
                      <td><?php echo $rep['fctCpte']; ?></td>                                                         
                      <td align="center">

                        <script type="text/javascript">
                              function confirmation() {
                                return confirm('Voulez-vous vraiment modifier ?');
                              }
                            </script>

                          <a class="btn btn-warning" title="Modifier le compte " href="_modif-cpt_.php?reference_Update=<?php echo $rep["idCpte"];?>" onclick="return confirmation()">
                         <i class="fa fa-pencil"></i> Modifier
                        </a>
                        
                      </td>
                      </tr>     
                <tbody>
               <?php $i ++; } ?>
                <tfoot>
                <tr>
                <th>N°</th>
                  <th>Votre Login </th>
                  <th> Mot de passe </th>
                  <th> Email</th>
                  <th> Fonctions</th>
                  <th>Actions</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
     
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>

       <!-- Vider la table administrateur --> 

<!-- -------------------------------------------------------------------------------------------------------------------------- -->
 
  <!-- Pied de page -->
        <?php include_once 'pages_utiles/main-footer.php'; ?>
  <!-- Fin Pied de page -->

  <!-- Control Sidebar -->

  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

 <!-- Script Datatable -->
        <?php include_once 'pages_utiles/script_pied.php'; ?>
  <!-- Fin Datatable -->
</body>
</html>
