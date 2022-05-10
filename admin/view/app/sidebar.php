<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 ps ps--active-y bg-white" id="sidenav-main" data-color="info">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-dark opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="" target="_blank">
        <img src="assets/images/tvslogo.png" class="navbar-brand-img h-100" alt="main_logo">
        <!-- <span class="ms-1 font-weight-bold text-dark">TVS</span> -->
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse w-auto h-auto ps" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item mb-2 mt-0 ">
          <a data-bs-toggle="collapse" href="#ProfileNav" class="nav-link text-dark" aria-controls="ProfileNav" role="button" aria-expanded="false">
            <img src="assets/img/team-3.jpg" class="avatar">
            <span class="nav-link-text ms-2 ps-1"><?php echo $_SESSION['nivel']; ?></span>
          </a>
          <div class="collapse" id="ProfileNav" style="">
            <ul class="nav ">
              <li class="nav-item">
                <a class="nav-link text-dark" href="profile">
                  <span class="sidenav-mini-icon"> MP </span>
                  <span class="sidenav-normal  ms-3  ps-1"> Mi perfil </span>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link text-dark " href="">
                  <span class="sidenav-mini-icon"> C </span>
                  <span class="sidenav-normal  ms-3  ps-1"> Configuración </span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-dark" id="logout" href="">
                  <span class="sidenav-mini-icon"> L </span>
                  <span class="sidenav-normal  ms-3  ps-1"> Logout </span>
                </a>
              </li>
            </ul>
          </div>
        </li>
        <hr class="horizontal light mt-0">
        <li class="nav-item">
          <a href="dashboard" class="nav-link text-dark menu-lateral" aria-controls="dashboardsExamples" role="button" aria-expanded="false">
            <i class="material-icons-round opacity-10">dashboard</i>
            <span class="nav-link-text ms-2 ps-1">Dashboard</span>
          </a>          
        </li>
        <li class="nav-item mt-3">
          <h6 class="ps-4  ms-2 text-uppercase text-xs font-weight-bolder text-dark">PAGES</h6>
        </li>
  
        <li class="nav-item">
          <a data-bs-toggle="collapse" href="#category" class="nav-link text-dark menu-lateral" aria-controls="category" role="button" aria-expanded="false">
            <i class="material-icons-round {% if page.brand == 'RTL' %}ms-2{% else %} me-2{% endif %}">category</i>
            <span class="nav-link-text ms-2 ps-1">Categorias</span>
          </a>
          <div class="collapse " id="category">
            <ul class="nav ">              
              <li class="nav-item ">
                <a class="nav-link text-dark " href="category-list">
                  <span class="sidenav-mini-icon"> L </span>
                  <span class="sidenav-normal  ms-2  ps-1"> Lista categorias </span>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link text-dark " href="new-category">
                  <span class="sidenav-mini-icon"> N </span>
                  <span class="sidenav-normal  ms-2  ps-1"> Nueva categoria </span>
                </a>
              </li>
            </ul>
          </div>
        </li>

        <li class="nav-item">
          <a data-bs-toggle="collapse" href="#client" class="nav-link text-dark menu-lateral" aria-controls="client" role="button" aria-expanded="false">
            <i class="material-icons-round {% if page.brand == 'RTL' %}ms-2{% else %} me-2{% endif %}">group</i>
            <span class="nav-link-text ms-2 ps-1">Clientes</span>
          </a>
          <div class="collapse " id="client">
            <ul class="nav ">              
              <li class="nav-item ">
                <a class="nav-link text-dark " href="">
                  <span class="sidenav-mini-icon"> N </span>
                  <span class="sidenav-normal  ms-2  ps-1"> Nuevo cliente </span>
                </a>
              </li>
            </ul>
          </div>
        </li>

        <li class="nav-item">
          <a data-bs-toggle="collapse" href="#product" class="nav-link text-dark menu-lateral" aria-controls="product" role="button" aria-expanded="false">
            <i class="material-icons-round {% if page.brand == 'RTL' %}ms-2{% else %} me-2{% endif %}">inventory_2</i>
            <span class="nav-link-text ms-2 ps-1">Productos</span>
          </a>
          <div class="collapse " id="product">
            <ul class="nav ">              
              <li class="nav-item ">
                <a class="nav-link text-dark " href="product-list">
                  <span class="sidenav-mini-icon"> N </span>
                  <span class="sidenav-normal  ms-2  ps-1"> Lista productos </span>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link text-dark " href="new-product">
                  <span class="sidenav-mini-icon"> N </span>
                  <span class="sidenav-normal  ms-2  ps-1"> Nuevo producto </span>
                </a>
              </li>
            </ul>
          </div>
        </li>

        <li class="nav-item">
          <a data-bs-toggle="collapse" href="#color" class="nav-link text-dark menu-lateral" aria-controls="color" role="button" aria-expanded="false">
            <i class="material-icons-round {% if page.brand == 'RTL' %}ms-2{% else %} me-2{% endif %}">palette</i>
            <span class="nav-link-text ms-2 ps-1">Colores</span>
          </a>
          <div class="collapse " id="color">
            <ul class="nav ">              
              <li class="nav-item ">
                <a class="nav-link text-dark " href="color-list">
                  <span class="sidenav-mini-icon"> L </span>
                  <span class="sidenav-normal  ms-2  ps-1"> Lista colores </span>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link text-dark " href="new-color">
                  <span class="sidenav-mini-icon"> N </span>
                  <span class="sidenav-normal  ms-2  ps-1"> Nuevo color </span>
                </a>
              </li>
            </ul>
          </div>
        </li>
        
        <!-- <li class="nav-item">
          <a data-bs-toggle="collapse" href="#ecommerceExamples" class="nav-link text-dark " aria-controls="ecommerceExamples" role="button" aria-expanded="false">
            <i class="material-icons-round {% if page.brand == 'RTL' %}ms-2{% else %} me-2{% endif %}">shopping_basket</i>
            <span class="nav-link-text ms-2 ps-1">Ecommerce</span>
          </a>
          <div class="collapse " id="ecommerceExamples">
            <ul class="nav ">
              <li class="nav-item ">
                <a class="nav-link text-dark " data-bs-toggle="collapse" aria-expanded="false" href="#productsExample">
                  <span class="sidenav-mini-icon"> P </span>
                  <span class="sidenav-normal  ms-2  ps-1"> Products <b class="caret"></b></span>
                </a>
                <div class="collapse " id="productsExample">
                  <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                      <a class="nav-link text-dark " href="">
                        <span class="sidenav-mini-icon"> N </span>
                        <span class="sidenav-normal  ms-2  ps-1"> New Product </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link text-dark " href="">
                        <span class="sidenav-mini-icon"> E </span>
                        <span class="sidenav-normal  ms-2  ps-1"> Edit Product </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link text-dark " href="">
                        <span class="sidenav-mini-icon"> P </span>
                        <span class="sidenav-normal  ms-2  ps-1"> Product Page </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link text-dark " href="">
                        <span class="sidenav-mini-icon"> P </span>
                        <span class="sidenav-normal  ms-2  ps-1"> Products List </span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="nav-item ">
                <a class="nav-link text-dark " data-bs-toggle="collapse" aria-expanded="false" href="#ordersExample">
                  <span class="sidenav-mini-icon"> O </span>
                  <span class="sidenav-normal  ms-2  ps-1"> Orders <b class="caret"></b></span>
                </a>
                <div class="collapse " id="ordersExample">
                  <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                      <a class="nav-link text-dark " href="">
                        <span class="sidenav-mini-icon"> O </span>
                        <span class="sidenav-normal  ms-2  ps-1"> Order List </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link text-dark " href="">
                        <span class="sidenav-mini-icon"> O </span>
                        <span class="sidenav-normal  ms-2  ps-1"> Order Details </span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>              
            </ul>
          </div>
        </li> -->
       
      </ul>
    </div>
  </aside>