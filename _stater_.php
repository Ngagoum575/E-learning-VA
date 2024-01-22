<?php 

  include_once 'config/ConnectDB.php';
  // Nous démarrons la session
  session_start();
  // Nous vérifions nos sessions
  if(!isset($_SESSION["login"])){header("location:stater.php");}
?>

<!-- Script Datatable -->
        <?php include_once 'pages_utiles/entete.php'; ?>
<!-- Fin Datatable -->

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
 

  <!-- Main header -->
        <?php include_once 'pages_utiles/main-header.php'; ?>
  <!-- Fin Main header -->


  <!-- Main sidebar -->
        <?php include_once 'pages_utiles/main-sidebar.php'; ?>
  <!-- Main sidebar -->
  
 <!-- Content Wrapper. Contains page content -->
 
 <!-- Content Wrapper. Contains page content -->
        <?php include_once 'pages_utiles/content-wrapper.php'; ?>
  <!-- Content Wrapper. Contains page content -->

   

  <!-- Pied de page -->
        <?php include_once 'pages_utiles/main-footer.php'; ?>
  <!-- Fin Pied de page -->


  <div class="control-sidebar-bg"></div>

</div>

    
    <!-- Script Datatable -->
        <?php include_once 'pages_utiles/script_pied.php'; ?>
  <!-- Fin Datatable -->


</body>
</html>
