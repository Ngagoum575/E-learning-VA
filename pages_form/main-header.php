 <?php include_once './config/ConnectDB.php';?>




 <header class="main-header">

    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><img src="public/img/vc-academy.png" class="img-circle" width="88" height="40"/></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><img src="public/img/vc-academy.png" class="img-circle" width="88" height="40"/></span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul style="margin-top: -10px;" class="nav navbar-nav">
       
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
               <img src="public/img/comptes/<?php echo $_SESSION["photo"];?>" class="img-circle" width="38" height="40"/>
              <span class="hidden-xs"><?php echo $_SESSION["login"];?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
               <img src="public/img/comptes/<?php echo $_SESSION["photo"];?>" class="img-circle" width="38" height="40"/>

                <p>
                  <?php echo $_SESSION["login"];?>
                      <small>Membre depuis le <?php echo $_SESSION["dateCpte"];?></small>
                </p>
              </li>
            
              <!-- Menu Footer-->
              <li class="user-footer">

               <div class="pull-left">
                   <a  class="btn btn-default btn-flat" href="_profil_.php?reference_Update=<?php echo $_SESSION["login"];?>" > 
                    <i class="fa fa-pencil"></i> Profile</a>
                </div>

              

              
                <div class="pull-right">
                  <a href="config/deconnexion.php" class="btn btn-default btn-flat"><i class="glyphicon glyphicon-off"></i> D&eacute;connexion</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->

           <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
         
            
          </li>
          <!-- <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li> -->
        </ul>
      </div>

    </nav>
  </header>