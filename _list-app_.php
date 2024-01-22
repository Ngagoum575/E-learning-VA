<?php 

  include_once 'config/ConnectDB.php';
  // Nous démarrons la session
  session_start();
  // Nous vérifions nos sessions
  if(!isset($_SESSION["login"])){header("location:_start-form_.php");}
   
   
    // Démarer le status : Active : Inactive

    if(isset($_GET['email'])){

      $bd = new ConnectDB();
      $sql = $bd->bdd->query("SELECT status FROM auth_app WHERE email ='" . $_GET["email"] . "' ");
      $rows = $sql->fetch();
      if($rows['status']== 1){
          $stt = 0;
      }else{
        $stt = 1;
      }
      $sqlup = $bd->bdd->query("UPDATE auth_app SET status ='".$stt."' WHERE email='".$_GET["email"]."' ");
    }
// Arreter le status : Active : Inactive

?>

<!-- Script Datatable -->
        <?php include_once 'pages_form/entete.php'; ?>
<!-- Fin Datatable -->


<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<!-- Script main-header -->
        <?php include_once 'pages_form/main-header.php'; ?>
<!-- Fin main-header -->



<!-- Script main-sidebar -->
        <?php include_once 'pages_form/main-sidebar.php'; ?>
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
              <h3 class="box-title"> <i class="fa  fa-meh-o"></i> Liste des apprenants </h3>
            </div>


      <!-- -------------------------------------------------------------------------------------------------------------------------- -->

            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <th>N°</th>
                  <th>Email </th>
                  <th> Mot de passe </th>
                  <th> Formation</th>
                  <th> CV</th>
                  <th> Statut</th>
                 
                </thead>
                <?php
                      $bd = new ConnectDB();                      
                      $req = $bd->bdd->query("SELECT * FROM auth_app ") or die(mysql_error());
                      $i = 1;
                       while($rep = $req->fetch())
                      {

                       
                ?>
                   <tr>
                     <td><button type="button" class="btn btn-default btn-circle"><?php echo $i; ?></button></td>                  
                      <td><?php echo $rep['email']; ?></td> 
                      <td><?php echo $rep['pwdCpte']; ?></td>
                      <td><?php echo $rep['listformation']; ?></td>
                      <td>
                         <a href="_cv-down_.php?file_id=<?php echo $rep['id']?>" class="btn btn-success"> 
                          <i class="fa fa-cloud-download"></i> Télécharger 
                        </a>
                      </td> 
                      <td align="center">
                        <a class="btn btn-default" href="_list-app_.php?email=<?php echo $rep["email"];?>"> <i class="fa fa-check"></i>
                            <?php  $st = ($rep["status"]==1)? 'Accepté':'Rejeté'; echo $st; ?>
                        </a>
                      </td>                                                              
              
                      </tr>     
                <tbody>
               <?php $i ++; } ?>
                <tfoot>
                <tr>
                <th>N°</th>
                  <th>Email </th>
                  <th> Mot de passe </th>
                  <th> Formation</th>
                  <th> CV</th>
                  <th> Statut</th>
              
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
        <?php include_once 'pages_form/main-footer.php'; ?>
  <!-- Fin Pied de page -->

  <!-- Control Sidebar -->

  <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

 <!-- Script Datatable -->
        <?php include_once 'pages_form/script_pied.php'; ?>
  <!-- Fin Datatable -->
</body>
</html>
