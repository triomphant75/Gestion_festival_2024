
<?php
session_start();
include_once '../function/OeuvreFunction.php';
include_once '../models/ModelConnexion.php';

// Assurez-vous que la variable de session 'role' est définie
if (!isset($_SESSION['role'])) {
    // Rediriger l'utilisateur vers une page de connexion si 'role' n'est pas défini
    header('Location: PageConnexion.php');
    exit(); // Assurez-vous de terminer le script après la redirection
}

// Maintenant que nous sommes sûrs que 'role' est défini, nous pouvons l'utiliser
$role = $_SESSION['role'];
// Vérifie si la variable de session $role est définie
if(isset($_SESSION['role'])) {
  $role = $_SESSION['role'];
} 

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
      <!-- partial:../../partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="#"><img class="imageLogo" src="../public/assets/images/Logo Festi.png" alt="logo" style="width: 65px; height: auto;" /></a>

        <a class="navbar-brand brand-logo-mini" href="#"><img src="../public/assets/images/logo-mini.svg" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
          <div>
            <h2>Festival littéraire</h2>
          </div>
          <ul class="navbar-nav navbar-nav-right">
            
            
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <div class="nav-profile-img">
                  <img src="../public/assets/images/faces/face28.png" alt="image">
                </div>
                <div class="nav-profile-text">
                <p class="mb-1 text-black">USER</p>
                </div>
              </a>
              <div class="dropdown-menu navbar-dropdown dropdown-menu-right p-0 border-0 font-size-sm" aria-labelledby="profileDropdown" data-x-placement="bottom-end">
                <div class="p-3 text-center bg-primary">
                  <img class="img-avatar img-avatar48 img-avatar-thumb" src="../../assets/images/faces/face28.png" alt="">
                </div>
                <div class="p-2">
                  <h5 class="dropdown-header text-uppercase pl-2 text-dark">User Options</h5>
                  <a class="dropdown-item py-1 d-flex align-items-center justify-content-between" href="#">
                    <span>Inbox</span>
                    <span class="p-0">
                      <span class="badge badge-primary">3</span>
                      <i class="mdi mdi-email-open-outline ml-1"></i>
                    </span>
                  </a>
                  <a class="dropdown-item py-1 d-flex align-items-center justify-content-between" href="#">
                    <span>Profile</span>
                    <span class="p-0">
                      <span class="badge badge-success">1</span>
                      <i class="mdi mdi-account-outline ml-1"></i>
                    </span>
                  </a>
                  <a class="dropdown-item py-1 d-flex align-items-center justify-content-between" href="javascript:void(0)">
                    <span>Settings</span>
                    <i class="mdi mdi-settings"></i>
                  </a>
                  <div role="separator" class="dropdown-divider"></div>
                  <h5 class="dropdown-header text-uppercase  pl-2 text-dark mt-2">Actions</h5>
                  <a class="dropdown-item py-1 d-flex align-items-center justify-content-between" href="#">
                    <span>Lock Account</span>
                    <i class="mdi mdi-lock ml-1"></i>
                  </a>
                  <a class="dropdown-item py-1 d-flex align-items-center justify-content-between" href="#">
                    <span>Log Out</span>
                    <i class="mdi mdi-logout ml-1"></i>
                  </a>
                </div>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                <i class="mdi mdi-bell-outline"></i>
                <span class="count-symbol bg-danger"></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                <h6 class="p-3 mb-0 bg-primary text-white py-4">Notifications</h6>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-success">
                      <i class="mdi mdi-calendar"></i>
                    </div>
                  </div>
                  <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                    <h6 class="preview-subject font-weight-normal mb-1">Event today</h6>
                    <p class="text-gray ellipsis mb-0"> Just a reminder that you have an event today </p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-warning">
                      <i class="mdi mdi-settings"></i>
                    </div>
                  </div>
                  <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                    <h6 class="preview-subject font-weight-normal mb-1">Settings</h6>
                    <p class="text-gray ellipsis mb-0"> Update dashboard </p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-info">
                      <i class="mdi mdi-link-variant"></i>
                    </div>
                  </div>
                  <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                    <h6 class="preview-subject font-weight-normal mb-1">Launch Admin</h6>
                    <p class="text-gray ellipsis mb-0"> New admin wow! </p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <h6 class="p-3 mb-0 text-center">See all notifications</h6>
              </div>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-category">Main</li>
            <li class="nav-item">
              <a class="nav-link" href="dashboard.php">
                <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
                <span class="menu-title">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
    <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
        <span class="icon-bg"><i class="mdi mdi-crosshairs-gps menu-icon"></i></span>
        <span class="menu-title">Edition</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="collapse" id="ui-basic">
    <ul class="nav flex-column sub-menu">
            <?php if ($_SESSION['role'] != "accompagnateur" && $_SESSION['role'] != "auteur" && $_SESSION['role'] != "accompagnateur" && $_SESSION['role'] != "etablissement" && $_SESSION['role'] != "interprete") { ?>
            <li class="nav-item"><a class="nav-link" href="AjoutEdition.php">créer une édition</a></li>
            <?php } ?>

        <li class="nav-item"><a class="nav-link" href="ListeEditions.php">Liste des éditions</a></li>
        <?php if ($_SESSION['role'] != "accompagnateur" && $_SESSION['role'] != "auteur" && $_SESSION['role'] != "accompagnateur" && $_SESSION['role'] != "etablissement" && $_SESSION['role'] != "interprete") { ?>
            <li class="nav-item"><a class="nav-link" href="InscriptionsEdition.php">gestion inscription</a></li>
        <?php } ?>
        <li class="nav-item"><a class="nav-link" href="InscritEdition.php">Liste des inscriptions</a></li>
    </ul>
</div>

</li>

            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#auth4" aria-expanded="false" aria-controls="auth">
                <span class="icon-bg"><i class="mdi mdi-lock menu-icon"></i></span>
                <span class="menu-title">Voeux</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="auth4">
                <ul class="nav flex-column sub-menu">
                <?php if ($_SESSION['role'] != "accompagnateur" && $_SESSION['role'] != "auteur" && $_SESSION['role'] != "accompagnateur"  && $_SESSION['role'] != "interprete") { ?>

                  <li class="nav-item"> <a class="nav-link" href="LancementVoeux.php">Lancement des voeux</a></li>
                <?php } ?>
                  <?php if ($_SESSION['role'] != "accompagnateur" && $_SESSION['role'] != "auteur" && $_SESSION['role'] != "admin" && $_SESSION['role'] != "accompagnateur"  && $_SESSION['role'] != "interprete") { ?>
                  <li class="nav-item"> <a class="nav-link" href="ListeDesVoeux.php">Liste voeux</a></li>
                  <?php } ?>
                  <?php if ($_SESSION['role'] != "accompagnateur" && $_SESSION['role'] != "auteur" && $_SESSION['role'] != "accompagnateur" && $_SESSION['role'] != "etablissement" && $_SESSION['role'] != "interprete") { ?>

                  <li class="nav-item"> <a class="nav-link" href="AnalyseVoeux.php">Analyse des Voeux</a></li>
                  <?php } ?>

                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#auth2" aria-expanded="false" aria-controls="auth">
                <span class="icon-bg"><i class="mdi mdi-lock menu-icon"></i></span>
                <span class="menu-title">intervention</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="auth2">
                <ul class="nav flex-column sub-menu">
                <?php if ($_SESSION['role'] != "accompagnateur" && $_SESSION['role'] != "auteur" && $_SESSION['role'] != "accompagnateur" && $_SESSION['role'] != "etablissement" && $_SESSION['role'] != "interprete") { ?>
                  <li class="nav-item"> <a class="nav-link" href="AjoutIntervention.php">Ajouter une intervention</a></li>
                <?php }?>
                  <li class="nav-item"> <a class="nav-link" href="ListeIntervention.php"> Liste des interventions</a></li>

                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#auth3" aria-expanded="false" aria-controls="auth">
                <span class="icon-bg"><i class="mdi mdi-lock menu-icon"></i></span>
                <span class="menu-title">Oeuvres</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="auth3">
                <ul class="nav flex-column sub-menu">
                <?php if ($_SESSION['role'] != "accompagnateur" && $_SESSION['role'] != "accompagnateur" && $_SESSION['role'] != "etablissement" && $_SESSION['role'] != "interprete") { ?>
                  <li class="nav-item"> <a class="nav-link" href="AjoutOeuvre.php">Ajouter oeuvre</a></li>
                <?php } ?>
                  <li class="nav-item"> <a class="nav-link" href="ListeOeuvre.php"> Liste des oeuvres</a></li>
                  

                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                <span class="icon-bg"><i class="mdi mdi-lock menu-icon"></i></span>
                <span class="menu-title">participants</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="auth">
                <ul class="nav flex-column sub-menu">
                <?php if ($_SESSION['role'] != "accompagnateur" && $_SESSION['role'] != "accompagnateur" && $_SESSION['role'] != "etablissement" && $_SESSION['role'] != "interprete") { ?>

                   <li class="nav-item"> <a class="nav-link" href="AjoutAccompagnateur.php" >Ajouter un Accompagnateur</a></li>
                <?php } ?>
                   <li class="nav-item"> <a class="nav-link" href="ListeAccompagnateur.php"> Liste des Acompagnateur</a></li>
                   <?php if ($_SESSION['role'] != "accompagnateur" && $_SESSION['role'] != "accompagnateur" && $_SESSION['role'] != "etablissement" && $_SESSION['role'] != "interprete") { ?>

                   <li class="nav-item"> <a class="nav-link" href="AjoutAuteur.php">Ajouter un Auteur</a></li>
                <?php } ?>
                   <li class="nav-item"> <a class="nav-link" href="ListeAuteur.php"> Liste des Auteur</a></li>
                   <?php if ($_SESSION['role'] != "accompagnateur" && $_SESSION['role'] != "accompagnateur" && $_SESSION['role'] != "etablissement" && $_SESSION['role'] != "interprete") { ?>

                   <li class="nav-item"> <a class="nav-link" href="AjoutInterprete.php">Ajouter un Interprete</a></li>
                <?php } ?>
                   <li class="nav-item"> <a class="nav-link" href="ListeInterprete.php"> Liste des Interprete</a></li>
                   <?php if ($_SESSION['role'] != "accompagnateur" && $_SESSION['role'] != "accompagnateur" && $_SESSION['role'] != "etablissement" && $_SESSION['role'] != "interprete") { ?>

                   <li class="nav-item"> <a class="nav-link" href="AjoutEtablissement.php">Ajouter un établissement</a></li>
                <?php } ?>
                   <li class="nav-item"> <a class="nav-link" href="ListeEtablissement.php"> Liste des établissements</a></li>
                 

                </ul>
              </div>
            </li>
            <li class="nav-item sidebar-user-actions">
              <div class="user-details">
                <div class="d-flex justify-content-between align-items-center">
                  <div>
                    <div class="d-flex align-items-center">
                      <div class="sidebar-profile-img">
                        <img src="../public/assets/images/faces/face28.png" alt="image">
                      </div>
                      <div class="sidebar-profile-text">
                        <p class="mb-1">Role: <?php echo $_SESSION['role']; ?></p>
                    </div>

                    </div>
                  </div>
                </div>
              </div>
            </li>
            <li class="nav-item sidebar-user-actions">
              <div class="sidebar-user-menu">
                <a href="../views/Accueil.php" class="nav-link"><i class="mdi mdi-logout menu-icon"></i>
                  <span class="menu-title">Déconnexion</span></a>
              </div>
            </li>
          </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
        <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Listes des Oeuvres</h6>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>titre</th>
                                        <th>edition</th>
                                        <th>public cible</th>
                                        <th>prix littéraire</th>
                                        <th>année de publication</th>
                                        <th>genre littéraire</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Lignes de données de la liste d'œuvres -->
                                    <?php
                                        $oeuvres = getOeuvre();
                                        if (!empty($oeuvres) && is_array($oeuvres)){
                                            foreach ($oeuvres as $value){    
                                    ?>
                                    <tr>
                                        <td><?=$value['titre']?></td>
                                        <td><?=$value['editionoeuvre']?></td>
                                        <td><?=$value['publiccible']?></td>
                                        <td><?=$value['prixlitteraire']?></td>
                                        <td><?=$value['anneepublication']?></td>
                                        <td><?=$value['genrelitteraire']?></td>
                                        <td><?=$value['descriptionoeuvre']?></td>    
                                        
                                        
                                        <td><a href ="?idoeuvre=<? $value['idoeuvre'] ?>"><ion-icon name="create"></ion-icon></<a></td>

                                    </tr>
                                    <?php
                                            }
                                        }
                                    ?> 
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->
          <footer class="footer">
            <div class="footer-inner-wraper">
              <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © by L3 MIAGE 2023_2024</span>
                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap dashboard templates</a> from Bootstrapdash.com</span>
              </div>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
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
    <!-- Custom js for this page -->
    <!-- End custom js for this page -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

  </body>
</html>