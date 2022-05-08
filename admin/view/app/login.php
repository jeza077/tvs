<body class="bg-gray-200" cz-shortcut-listen="true">    
    <main class="main-content mt-0 ps">
        <div class="page-header align-items-start min-height-300 m-3 border-radius-xl" style="background-image: url('https://s3-us-west-2.amazonaws.com/vixnetapi/tvsmotor_mx/5d1b741bc693b_rr310-desktopjpg');">
            <span class="mask bg-gradient-dark opacity-6"></span>
        </div>
        <div class="container mb-4">
            <div class="row mt-lg-n12 mt-md-n12 mt-n12 justify-content-center">
                <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
                    <div class="card mt-8">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-info shadow-info border-radius-lg py-3 pe-1 text-center py-4">
                                <h4 class="font-weight-bolder text-white mt-1">TVS</h4>
                                <p class="mb-1 text-sm text-white">MOTOR HONDURAS</p>
                            </div>
                        </div>
                        <div class="card-body">
                            <form role="form" class="text-start" id="login-form">
                                <div class="input-group input-group-static mb-4">
                                    <label>Email</label>
                                    <input type="email" class="form-control" id="emailLogin" placeholder="tu@email.com" required>
                                </div>
                                <div class="input-group input-group-static mb-4">
                                    <label>Password</label>
                                    <input type="password" class="form-control" id="passwordLogin" placeholder="•••••••••••••" required>
                                </div>
                                <div class="form-check form-switch d-flex align-items-center mb-3" id="remember">
                                    <input class="form-check-input" type="checkbox" id="rememberMe" checked="">
                                    <label class="form-check-label mb-0 ms-3" for="rememberMe">Recuerdame</label>  
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn bg-gradient-dark w-100 mt-3 mb-0">Entrar</button>
                                </div>
                            </form>
                            <div class="alert alert-danger text-white mt-4" id="alertLogin"><i class="fas fa-exclamation-triangle"></i>  Favor rellenar todos los campos.</div>
                        </div>


                        <div class="card-footer text-center pt-0 px-lg-2 px-1">
                            <p class="mb-4 text-sm mx-auto">
                            ¿Aún no tienes una cuenta?
                            <a href="javascript:;" class="text-info text-gradient font-weight-bold">Registrarse</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
            <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
        </div>
        <div class="ps__rail-y" style="top: 0px; right: 0px;">
            <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
        </div>
    </main>
    <!--   Core JS Files   -->
    <script src="infoassets/js/core/popper.min.js"></script>
    <script src="infoassets/js/core/bootstrap.min.js"></script>
    <script src="infoassets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="infoassets/js/plugins/smooth-scrollbar.min.js"></script>
    <!-- Kanban scripts -->
    <script src="infoassets/js/plugins/dragula/dragula.min.js"></script>
    <script src="infoassets/js/plugins/jkanban/jkanban.js"></script>
    <script>
      var win = navigator.platform.indexOf('Win') > -1;
      if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
          damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
      }
    </script>
    <!-- Github buttons -->
    <script async="" defer="" src="https://buttons.github.io/buttons.js"></script>

    
  
  
  
  <style>
    #ofBar {
      background: #fff;
      z-index: 999999999;
      font-size: 16px;
      color: #333;
      padding: 16px 40px;
      font-weight: 400;
      display: flex;
      justify-content: space-between;
      align-items: center;
      position: fixed;
      top: 40px;
      width: 80%;
      border-radius: 8px;
      left: 0;
      right: 0;
      margin-left: auto;
      margin-right: auto;
      box-shadow: 0 13px 27px -5px rgba(50,50,93,0.25), 0 8px 16px -8px rgba(0,0,0,0.3), 0 -6px 16px -6px rgba(0,0,0,0.025);
    }
  
    #ofBar-logo img {
      height: 50px;
    }
  
    #ofBar-content {
      display: inline;
      padding: 0 15px;
    }
  
    #ofBar-right {
      display: flex;
      align-items: center;
    }
  
    #ofBar b {
      font-size: 15px !important;
    }
    #count-down {
      display: initial;
      padding-left: 10px;
      font-weight: bold;
      font-size: 20px;
    }
    #close-bar {
      font-size: 17px;
      opacity: 0.5;
      cursor: pointer;
    }
    #close-bar:hover{
      opacity: 1;
    }
    #btn-bar {
      background-image: linear-gradient(310deg, #141727 0%, #3A416F 100%);
      color: #fff;
      border-radius: 4px;
      padding: 10px 20px;
      font-weight: bold;
      text-transform: uppercase;
      text-align: center;
      font-size: 12px;
      opacity: .95;
      margin-right: 20px;
      box-shadow: 0 5px 10px -3px rgba(0,0,0,.23), 0 6px 10px -5px rgba(0,0,0,.25);
    }
     #btn-bar, #btn-bar:hover, #btn-bar:focus, #btn-bar:active {
       text-decoration: none !important;
       color: #fff !important;
   }
    #btn-bar:hover{
      opacity: 1;
    }
  
    #btn-bar span, #ofBar-content span {
      color: red;
      font-weight: 700;
    }
  
    #oldPriceBar {
      text-decoration: line-through;
      font-size: 16px;
      color: #fff;
      font-weight: 400;
      top: 2px;
      position: relative;
    }
    #newPrice{
      color: #fff;
      font-size: 19px;
      font-weight: 700;
      top: 2px;
      position: relative;
      margin-left: 7px;
    }
  
    #fromText {
      font-size: 15px;
      color: #fff;
      font-weight: 400;
      margin-right: 3px;
      top: 0px;
      position: relative;
    }
  
    @media(max-width: 991px){
  
    }
    @media (max-width: 768px) {
      #count-down {
        display: block;
        margin-top: 15px;
      }
  
      #ofBar {
        flex-direction: column;
        align-items: normal;
      }
  
      #ofBar-content {
        margin: 15px 0;
        text-align: center;
        font-size: 18px;
      }
  
      #ofBar-right {
        justify-content: flex-end;
      }
    }
  </style>