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
                            <form class="forms-sample" action="../models/ModelInscritpitionEtablissement.php" method="POST">
                                <div class="form-group">
                                    <label for="LoginEtablissement">Login</label>
                                    <input type="text" name="LoginEtablissement" class="form-control" id="LoginEtablissement" placeholder="Login">
                                </div>
                                <div class="form-group">
                                    <label for="mailEtablissement">Mail</label>
                                    <input type="email" name="mailEtablissement" class="form-control" id="mailEtablissement" placeholder="Mail">
                                </div>
                                <div class="form-group" >
                                    <label for="TypeEtablissement">TypEtablissement</label>
                                    <select class="form-control" name="TypeEtablissement" id="TypeEtablissement">
                                        <option>université</option>
                                        <option>lycée général</option>
                                        <option>lycée professionnel</option>
                                        <option>collège</option>
                                        <option>école primaire</option>
                                        <option>maternelle</option>
                                        <option>établissement médico-sociaux</option>
                                        <option>établissement pénitentiaire</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="NomEtablissement">Nom</label>
                                    <input type="text" name="NomEtablissement" class="form-control" id="NomEtablissement" placeholder="Nom">
                                </div>
                                <div class="form-group">
                                    <label for="AdresseEtablissement">Adresse</label>
                                    <input type="text" name="AdresseEtablissement" class="form-control" id="AdresseEtablissement" placeholder="Adresse">
                                </div>
                                <div class="form-group">
                                    <label for="DateIEtablissement">Date Inscription</label>
                                    <input type="date" name="DateIEtablissement"  class="form-control" id="DateIEtablissement" placeholder="Date">
                                </div>

                                <div class="form-group">
                                    <label for="NbreEtablissement">Nombre de participant</label>
                                    <input type="number" name="NbreEtablissement" class="form-control" id="NbreEtablissement" placeholder="participant">
                                </div>
                                <div class="form-group">
                                    <label for="PublicEtablissement">Le public</label>
                                    <input type="text" name="PublicEtablissement" class="form-control" id="PublicEtablissement" placeholder="le public">
                                </div>
                                
                                <div class="form-group">
                                    <label for="telEtablissement">Téléphone</label>
                                    <input type="text" name="telEtablissement" class="form-control" id="telEtablissement" placeholder="+33 7 67 34 12 09">
                                </div>
                                <div class="form-group">
                                    <label for="pwdEtablissement">Mot de passe</label>
                                    <input type="password" name="pwdEtablissement" class="form-control" id="pwdEtablissement" >
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