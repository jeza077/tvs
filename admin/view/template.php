<?php
  require_once 'controllers/userController.php';
  session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="">
  <title>
    Backend TVS
  </title> 
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- Datatable -->
  <link rel="stylesheet" href="assets/css/dataTables.bootstrap5.min.css">
  <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.11.5/datatables.min.css"/> -->
  <!-- CSS Files -->
  <link id="pagestyle" href="assets/css/backendtvs.min.css?v=3.0.3" rel="stylesheet" />
  <style>
      .sidenav[data-color=info] .navbar-nav>.nav-item .nav-link.active+.collapse .nav-item.active .nav-link.active, .sidenav[data-color=info] .navbar-nav>.nav-item .nav-link.active+.collapsing .nav-item.active .nav-link.active {
            background-image: linear-gradient(195deg,#1a73e8,#1a73e8)!important;
        }
        .navbar-vertical .navbar-nav>.nav-item .nav-link.active {
            color: #fff!important;
            border-right-width: 0;
            border-bottom-width: 0;
            background-color: hsla(0,0%,78%,.2);
            background-image: linear-gradient(195deg,#1a73e8,#1a73e8)!important;
        }
  </style>
</head>
  <?php 
  if(isset($_SESSION['login']) && $_SESSION['login'] == true) {

    // echo '<body class="g-sidenav-show bg-gray-200 g-sidenav-pinned">';
    echo '<body class="g-sidenav-show bg-gray-200 g-sidenav-hidden">';

    // <!-- SIDEBAR -->
    include "view/app/sidebar.php";

    echo '<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ps ps--active-y">';
      // <!-- Navbar -->
    include "view/app/navbar.php";

        if(isset($_GET["url"]) ){ 
            
            if($_GET["url"] == "dashboard" ||
              $_GET["url"] == "category-list" ||
              $_GET["url"] == "new-category" ||
              $_GET["url"] == "edit-category" ||
              $_GET["url"] == "new-product" ||
              $_GET["url"] == "product-list" ||
              $_GET["url"] == "logout" ||
              $_GET["url"] == "tvs"){
                
              include "app/".$_GET["url"].".php";
            } else {
              include "app/dashboard.php";
            }
          
        } else {
          include "app/dashboard.php";
        }
          
        include 'view/app/footer.php';

      
      echo '</div>
      </main>
      <div class="fixed-plugin">
        <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
          <i class="material-icons py-2">settings</i>
        </a>
        <div class="card shadow-lg">
          <div class="card-header pb-0 pt-3">
            <div class="float-start">
              <h5 class="mt-3 mb-0">Backen TVS</h5>
              <p>See our dashboard options.</p>
            </div>
            <div class="float-end mt-4">
              <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
                <i class="material-icons">clear</i>
              </button>
            </div>
            <!-- End Toggle Button -->
          </div>
          <hr class="horizontal dark my-1">
          <div class="card-body pt-sm-3 pt-0">
            <!-- Sidebar Backgrounds -->
            
            <!-- Sidenav Type -->
            <div class="mt-3">
              <h6 class="mb-0">Sidenav Type</h6>
              <p class="text-sm">Choose between.</p>
            </div>
            <hr class="horizontal dark my-sm-4">
          
          
          </div>
        </div>
      </div>';
      
  } else {
    include "app/login.php";

  }




?>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <!--   Core JS Files   -->
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap.min.js"></script>
  <script src="assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="assets/js/plugins/choices.min.js"></script>
  <script src="assets/js/plugins/quill.min.js"></script>
  <script src="assets/js/plugins/multistep-form.js"></script>
  <!-- <script src="assets/js/plugins/validation.js"></script> -->

  <!-- Kanban scripts -->
  <script src="assets/js/plugins/dragula/dragula.min.js"></script>
  <script src="assets/js/plugins/jkanban/jkanban.js"></script>
  <!-- Datatable -->
  <!-- <script src="assets/js/plugins/dataTables.bootstrap5.min.js"></script> -->
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.5/datatables.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>

  <!-- Sweet ALert -->
  <script src="assets/js/plugins/sweetalert.min.js"></script>


  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <script src="assets/js/backendtvs.min.js?v=3.0.3"></script>
  <script src="view/js/template.js"></script>
  <script src="view/js/login.js"></script>
  <script src="view/js/category.js"></script>
  <script src="view/js/product.js"></script>
</body>

</html>