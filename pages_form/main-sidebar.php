 <?php include_once './config/ConnectDB.php';?>
  
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION["login"];?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Connecté</a>
        </div><br/><br/>
      </div>
     
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU PRINCIPALE</li>
          <li class="active treeview menu-open">
          <a href="_start-form_.php">
            <i class="fa fa-diamond"></i> <span>Tableau de bord</span>
          </a>
        </li>
           
        <!-- ----------------------------------------------------Administrateur---------------------------------------------- -->


         <!-- Début paramètre -->

          <li class="treeview">
          	<a href="#">

          <?php if($_SESSION["fonction"] == "Enseignant" )
		    {
		    echo " <i class=\"fa fa-user\"></i> 
		           <span> Comptes </span>
		           <span class=\"label label-primary pull-right\">1</span> ";}?>
          </a>
          <ul class="treeview-menu">

            <?php if($_SESSION["fonction"] == "Enseignant" ){ echo "
            <li><a href=\"_list-app_\"><i class=\"fa fa-plus\"></i> Compte Apprenant</a></li> ";}?>
          
             
          </ul>
        </li>

        <!-- Fin menu paramètre -->


<!-- ----------------------------------------------Enseignant------------------------------------------------ -->

        </li>  
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>