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
                            <form class="forms-sample" action="../models/ModelInscriptionAccompagnateur.php" method="POST">
                                <div class="form-group">
                                    <label for="loginAccompagnateur">Login</label>
                                    <input type="text" name="loginAccompagnateur" class="form-control" id="loginAccompagnateur" placeholder="Login">
                                </div>
                                <div class="form-group">
                                    <label for="NomAccompagnateur">Nom</label>
                                    <input type="text" name="NomAccompagnateur" class="form-control" id="NomAccompagnateur" placeholder="Nom">
                                </div>
                                <div class="form-group">
                                    <label for="PrenomAccompagnateur">Prenom</label>
                                    <input type="text" name="PrenomAccompagnateur" class="form-control" id="PrenomAccompagnateur" placeholder="Prenom">
                                </div>
                                <div class="form-group">
                                    <label for="EmailAccompagnateur">Email</label>
                                    <input type="email" name="EmailAccompagnateur"  class="form-control" id="EmailAccompagnateur" placeholder="Email">
                                </div>

                                <div class="form-group">
                                    <label for="DateIAccompagnateur">Date Inscription</label>
                                    <input type="date" name="DateIAccompagnateur"  class="form-control" id="DateIAccompagnateur" placeholder="Date">
                                </div>
                                <div class="form-group">
                                    <label for="DateNAccompagnateur">Date de Naissance</label>
                                    <input type="date" name="DateNAccompagnateur" class="form-control" id="DateNAccompagnateur" placeholder="Date">
                                </div>
                                <div class="form-group">
                                    <label for="TelAccompagnateur">Téléphone</label>
                                    <input type="text" name="TelAccompagnateur" class="form-control" id="TelAccompagnateur" placeholder="+33 7 67 34 12 09">
                                </div>
                                <div class="form-group">
                                    <label for="AdresseAccompagnateur">Adresse</label>
                                    <input type="text" name="AdresseAccompagnateur" class="form-control" id="AdresseAccompagnateur" placeholder="adresse">
                                </div>
                                <div class="form-group">
                                    <label for="PwdAccompagnateur">Mot de passe </label>
                                    <input type="password" name="PwdAccompagnateur" class="form-control" id="PwdAccompagnateur">
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