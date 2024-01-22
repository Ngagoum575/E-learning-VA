<?php 

    include_once 'config/ConnectDB.php';
    // Nous démarrons la session
    session_start();
    // Nous vérifions nos sessions
    if(!isset($_SESSION["email"])){header("location:_adm-std_.php");}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>VisionAcademie</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    
   <!-- Font Awesome -->
   <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
    <link href="public/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }

      .form-signin {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }    </style>
  </head>
  <body>

  
  <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="#">VS Academie</a>
          <div class="nav-collapse collapse">
            
            <p class="navbar-text pull-right">
             <a href="config/deconnexion.php" class="btn btn-default btn-flat"><i class="glyphicon glyphicon-off"></i> D&eacute;connexion</a>
            </p>
            <ul class="nav">
              <li class="active"><a href="#">Accueil</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span3">
          <div class="well sidebar-nav">
            <ul class="nav nav-list">
              <li style="font-size:18px;font-weight: bold;">Statut de candidature</li>
              <br>
              <li>
              <a class="btn btn-default" href="#"> 
                        <?php  

                          $bd = new ConnectDB();
                          $sql = $bd->bdd->query("SELECT status FROM auth_app WHERE email ='" .$_SESSION["email"]. "' ");
                          $rows = $sql->fetch();

                            if($rows['status']== 1){
                                echo $stt = '<i style=\'color:green;\' class="fa fa-toggle-on"></i> Accepté';
                            }else{
                              echo $stt = '<i class="fa fa-toggle-off"></i> Rejeté'; 
                            }

                        ?>
                        </a>

              </li>
              <li class="nav-header">Email</li>
              <li> <a href="#" style="color:#000000;"><i class="fa fa-circle text-success"></i> <?php echo $_SESSION["email"];?></a></li>
            
             
            </ul>
          </div><!--/.well -->
        </div><!--/span-->
        <div class="span9">
          <div class="hero-unit">
            <h1>BIENVENUE !</h1>
            <p>
                Bienvenue au prototype e-learning de vision academie. Il s'agit d'une application web
                écrit en PHP et basé sur l'interface Twitter Bootstrap 5.
            </p>
          </div>
          <div class="row-fluid">
          
          </div><!--/row-->
        </div><!--/span-->
      </div><!--/row-->

      <hr>

    

    </div><!--/.fluid-container-->
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="public/js/bootstrap.min.js"></script>
  </body>
</html>