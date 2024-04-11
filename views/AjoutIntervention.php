<?php
session_start();

include_once '../function/InterventionFunction.php';
include_once '../function/AccompFunction.php';
include_once '../function/AuteurFunction.php';
include_once '../function/InterpreteFunction.php';
include_once '../function/EditionFunction.php';
include_once '../function/EtablissementFunction.php';

if (!empty($_GET['idauteur'])){
  $auteurs = getAuteur($_GET['idauteur']);
}

if (!empty($_GET['idinterprete'])){
  $interperetes = getInterprete($_GET['idinterprete']);
}
if (!empty($_GET['idaccompaganteur'])){
  $accompagnateurs = getAccompagnateur($_GET['idaccompaganteur']);
}
if (!empty($_GET['idetablissement'])){
  $etablissements = getEtablissement($_GET['idetablissement']);
}
if (!empty($_GET['idintervention'])){
  $interventions = getIntervention($_GET['idintervention']);
}
if (!empty($_GET['idedition'])){
  $editions = getEdition($_GET['idedition']);
}

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
                <?php if ($_SESSION['role'] != "accompagnateur" && $_SESSION['role'] != "auteur"  && $_SESSION['role'] != "accompagnateur" && $_SESSION['role'] != "etablissement" && $_SESSION['role'] != "interprete") { ?>

                   <li class="nav-item"> <a class="nav-link" href="AjoutAccompagnateur.php" >Ajouter un Accompagnateur</a></li>
                <?php } ?>
                   <li class="nav-item"> <a class="nav-link" href="ListeAccompagnateur.php"> Liste des Acompagnateur</a></li>
                   <?php if ($_SESSION['role'] != "accompagnateur" && $_SESSION['role'] != "auteur"  && $_SESSION['role'] != "accompagnateur" && $_SESSION['role'] != "etablissement" && $_SESSION['role'] != "interprete") { ?>

                   <li class="nav-item"> <a class="nav-link" href="AjoutAuteur.php">Ajouter un Auteur</a></li>
                <?php } ?>
                   <li class="nav-item"> <a class="nav-link" href="ListeAuteur.php"> Liste des Auteur</a></li>
                   <?php if ($_SESSION['role'] != "accompagnateur" && $_SESSION['role'] != "auteur"  && $_SESSION['role'] != "accompagnateur" && $_SESSION['role'] != "etablissement" && $_SESSION['role'] != "interprete") { ?>

                   <li class="nav-item"> <a class="nav-link" href="AjoutInterprete.php">Ajouter un Interprete</a></li>
                <?php } ?>
                   <li class="nav-item"> <a class="nav-link" href="ListeInterprete.php"> Liste des Interprete</a></li>
                   <?php if ($_SESSION['role'] != "accompagnateur" && $_SESSION['role'] != "auteur"  && $_SESSION['role'] != "accompagnateur" && $_SESSION['role'] != "etablissement" && $_SESSION['role'] != "interprete") { ?>

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
          <div class="content-wrapper">
             <!-- Début de la partie blanche -->

             <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Intervention </h4>
                            <p class="card-description"> Ajouter une intervention</p>
                            <form class="forms-sample" action="<?= !empty($_GET['idintervention']) ? "../models/ModifierIntervention.php" : "../models/Intervention.php" ?>" method="POST">
                                    <?php if (!empty($_GET['idintervention'])): ?>
                                        <!-- Champ caché pour l'ID de l'intervention à modifier -->
                                        <input type="hidden" name="idintervention" value="<?= $_GET['idintervention'] ?>">
                                    <?php endif; ?>
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Durée</label>
                                    <input value="<?= !empty($_GET['idintervention']) ? $value['dureeintervention'] : "" ?>" type="time" name="DureeIntervention" class="form-control" id="exampleInputUsername1" placeholder="Durée">
                                </div>
                                <div class="form-group">
                                    <label for="start_date">Date de début</label>
                                    <input value="<?= !empty($_GET['idintervention']) ? $interperetes['datedebutintervention'] : "" ?>" type="date" name="DateFDntervention" class="form-control" id="start_date" placeholder="Date de début">
                                </div>
                                <div class="form-group">
                                    <label for="end_date">Date de fin</label>
                                    <input value="<?= !empty($_GET['idintervention']) ? $interperetes['datefinintervention'] : "" ?>" type="date" name="DateFIntervention" class="form-control" id="end_date" placeholder="Date de fin">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Etat</label>
                                    <select value="<?= !empty($_GET['idintervention']) ? $interperetes['etatintervention'] : "" ?>"  class="form-control" name="EtatIntervention"id="exampleFormControlSelect1">
                                        <option>Programmée</option>
                                        <option>En attente</option>
                                        <option>Annulée</option>
                                        <option>Remplacée</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Lieu</label>
                                    <input  type="text" name="LieuIntervention" class="form-control" id="exampleInputUsername1" placeholder="Lieu">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Auteur</label>
                                    <select value="<?= !empty($_GET['idintervention']) ? $interperetes['idauteur'] : "" ?>" class="form-control" name="AuteurIntervention"id="exampleFormControlSelect1">
                                      <?php
                                          $nomAuteurs = getAuteur();
                                          if (!empty($nomAuteurs) && is_array($nomAuteurs)) {
                                              foreach ($nomAuteurs as $key => $value) {
                                                  ?>
                                                  <option value="<?= $value['idauteur'] ?>"><?= $value['idauteur'] ?></option>
                                                  <?php
                                              }
                                          }
                                          ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Accompagnateur</label>
                                    <select class="form-control" name="AccompagnateurIntervention" id="exampleFormControlSelect1">
                                         <?php
                                              $nomaccompagnateurs = getAccompagnateur();
                                              if (!empty($nomaccompagnateurs) && is_array($nomaccompagnateurs)) {
                                              foreach ($nomaccompagnateurs as $key => $value) {
                                        ?>
                                              <option value="<?= $value['idaccompagnateur'] ?>"><?= $value['idaccompagnateur'] ?></option>
                                        <?php
                                                }
                                            }
                                        ?>
                                       
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Interprete</label>
                                    <select class="form-control" name= "InterpreteIntervention" id="exampleFormControlSelect1">
                                        <?php
                                            $nominterpretes = getInterprete();
                                            if (!empty($nominterpretes) && is_array($nominterpretes)) {
                                            foreach ($nominterpretes as $key => $value) {
                                        ?>
                                                <option value="<?= $value['idinterprete'] ?>"><?= $value['idinterprete'] ?></option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Edition</label>
                                    <select class="form-control" name="EditionIntervention" id="exampleFormControlSelect1">
                                        <?php
                                            $editions = getEdition();
                                            if (!empty($editions) && is_array($editions)) {
                                            foreach ($editions as $key => $value) {
                                        ?>
                                          <option value="<?= $value['idedition'] ?>"><?= $value['idedition'] ?></option>
                                          <?php
                                            }
                                        }
                                        ?>               
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Etablissement</label>
                                    <select class="form-control" name="EtablissementIntervention" id="exampleFormControlSelect1">
                                          <?php
                                            $nometablissements = getEtablissement();
                                            if (!empty($nometablissements) && is_array($nometablissements)) {
                                            foreach ($nometablissements as $key => $value) {
                                          ?>
                                                <option value="<?= $value['idetablissement'] ?>"><?= $value['idetablissement'] ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary mr-2"><?= !empty($_GET['idintervention']) ? 'Modifier' : 'Créer' ?></button>
                                <button class="btn btn-light">Annuler</button>
                            </form>
                            <?php
                // Si le message d'alerte n'est pas vide
                if (!empty($_SESSION['message']['text'])):
            ?>
            <div class="alert <?= $_SESSION['message']['type'] ?>">
                <?= $_SESSION['message']['text'] ?>
            </div>
            <?php endif; ?>
                        </div>
                    </div>
            </div>

    <!-- Datagrid de liste d'œuvres -->
    <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h6 class="card-title">Liste des Interventions</h6>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Durée</th>
                            <th>Date de début</th>
                            <th>Date de fin</th>
                            <th>Lieu</th>
                            <th>Etat de l'intervention</th>
                            <th>Etablissement</th>
                            <th>Auteur</th>
                            <th>Accompagnateur</th>
                            <th>Interprete</th>
                            <th>Edition</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Lignes de données de la liste des interventions -->
                        <?php
                        $interventions = getIntervention();
                        if (!empty($interventions) && is_array($interventions)) {
                            foreach ($interventions as $key => $value) {
                        ?>
                                <tr>
                                    <td><?= $value['dureeintervention'] ?></td>
                                    <td><?= $value['datedebutintervention'] ?></td>
                                    <td><?= $value['datefinintervention'] ?></td>
                                    <td><?= $value['lieuintervention'] ?></td>
                                    <td><?= $value['etatintervention'] ?></td>
                                    <td><?= $value['idetablissement'] ?></td>
                                    <td><?= $value['idauteur'] ?></td>
                                    <td><?= $value['idaccompagnateur'] ?></td>
                                    <td><?= $value['idinterprete'] ?></td>
                                    <td><?= $value['idedition'] ?></td>
                                    <td>
                                        <!-- Bouton modifier redirigeant vers le formulaire d'ajout d'intervention avec l'ID de l'intervention -->
                                        <a href="AjoutIntervention.php?idintervention=<?= $value['idintervention'] ?>"><ion-icon name="create"></ion-icon></a>
                                    </td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                        <!-- Ajoutez d'autres lignes de données au besoin -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



              <!-- fin de la partie blanche -->
            
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