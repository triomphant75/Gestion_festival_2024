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
                    <div class="row">
                        <div class="container">
                        <div class="row">
                            <div class="col-md-6 offset-md-4"> <!-- Utilisation de la classe offset-md-4 pour centrer le formulaire sur les grands écrans -->
                            <div class="card">
                                <div class="card-body">
                                <h4 class="card-title">INSCRIPTION</h4>
                                <p class="card-description">Créer votre compte</p>
                            <form class="forms-sample" action="../models/ModelinscriptionInterprete.php" method="POST">
                                <div class="form-group">
                                    <label for="loginInterprete">Login</label>
                                    <input type="text" name="loginInterprete" class="form-control" id="loginInterprete" placeholder="Login">
                                </div>
                                <div class="form-group">
                                    <label for="NomInterprete">Nom</label>
                                    <input type="text" name="NomInterprete" class="form-control" id="NomInterprete" placeholder="Nom">
                                </div>
                                <div class="form-group">
                                    <label for="PrenomInterprete">Prenom</label>
                                    <input type="text" name="PrenomInterprete" class="form-control" id="PrenomInterprete" placeholder="Prenom">
                                </div>
                                <div class="form-group">
                                    <label for="EmailIntreprete">Email</label>
                                    <input type="email" name="EmailIntreprete"  class="form-control" id="EmailIntreprete" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label for="DateNInterprete">Date de Naissance</label>
                                    <input type="date" name="DateNInterprete" class="form-control" id="DateNInterprete" placeholder="Date">
                                </div>
                                <div class="form-group">
                                    <label for="TelInterprete">Téléphone</label>
                                    <input type="text" name="TelInterprete" class="form-control" id="TelInterprete" placeholder="+33 7 67 34 12 09">
                                </div>
                                <div class="form-group">
                                    <label for="AdresseInterprete">Adresse</label>
                                    <input type="text" name="AdresseInterprete" class="form-control" id="AdresseInterprete" placeholder="adresse">
                                </div>
                                <div class="form-group">
                                    <label for="PwdInterprete">Mot de passe </label>
                                    <input type="password" name="PwdInterprete" class="form-control" id="PwdInterprete">
                                </div>
                
                                <button type="submit" class="btn btn-primary mr-2">Enregistrer</button>
                                <button class="btn btn-light">Annuler</button>

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
    <!-- Custom js for this page -->
    <!-- End custom js for this page -->
  </body>
</html>