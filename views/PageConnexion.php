<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Connect Plus</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../public/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../public/assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../public/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../public/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../public/assets/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                <div class="brand-logo">
                <div style="text-align: center;">

                <img class="imageLogo" src="../public/assets/images/Logo Festi.png" alt="logo" style="width: 65px; height: auto;" />
                </div>
                </div>
                <h4>Bonjour! Commençons</h4>
                <h6 class="font-weight-light">Connectez-vous pour continuer.</h6>
                <form class="pt-3" action="../models/ModelConnexion.php" method="POST">
                  <div class="form-group">
                    <input type="email" name="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Login">
                  </div>
                  <div class="form-group">
                    <input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="mot de passe">
                  </div>
                  <div class="mt-3">
                  <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" name="valider" >Connexion</button>
                  </div>
                    
                  </div>
                  <?php
                    //si le message d'alert n'est pas vide 
                    if(!empty($_SESSION['message']['text'])){
                      //affiche
                      ?>
                      <div class="alert <?=$_SESSION['message']['type']?>">

                          <?=$_SESSION['message']['text']?>
                      </div>
                      <?php
                    }  
                ?>
                </form>

              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../public/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../public/assets/js/off-canvas.js"></script>
    <script src="../public/assets/js/hoverable-collapse.js"></script>
    <script src="../public/assets/js/misc.js"></script>
    <!-- endinject -->
  </body>
</html>