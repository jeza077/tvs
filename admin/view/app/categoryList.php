<div class="container-fluid py-4">
    <div class="row">
        <!-- ENTER CODE HERE -->
        <div class="col-lg-12 position-relative z-index-2">

            <h2 id="examples">Categorías</h2>

            <?php 
                // echo $_SESSION['fecha']; 
                // echo date('d/m/Y', $_SESSION['fecha']);
            ?>

            <main class="ct-docs-content-col" role="main">
                <div class="ct-docs-page-title">                  
                    <div class="avatar-group mt-3">
                    </div>
                </div>          
                
                <hr class="ct-docs-hr"> 
                <div class="card">
                <div class="table-responsive">
                    <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Categoria</th>
                        <!-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Technology</th> -->
                        <th class="text-secondary opacity-7"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $table = "categorias";
                            $item = null;
                            $valor = null;
                            $categories = CategoryController::ctrShowCategories($table, $item, $valor);

                            // var_dump($categories);

                            foreach ($categories as $key => $value){
                                
                                echo   '<tr>
                                            <td scope="row">
                                                <div class="d-flex px-2 py-1">
                                                <div class="text-xs font-weight-bold mb-0">
                                                '.($key+1).'
                                                </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="text-xs font-weight-bold mb-0">
                                                '.$value["categorias"].'
                                                </div>
                                            </td>   
                                            <td class="align-middle">
                                                <a href="javascript:;" class="text-secondary font-weight-normal text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                                Edit
                                                </a>
                                            </td>
                                        </tr>';

                            }

                        ?>

                        <!-- <tr>
                            <td>
                                <div class="d-flex px-2 py-1">
                                <div>
                                    <img src="assets/img/team-3.jpg" class="avatar avatar-sm me-3">
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-xs">John Michael</h6>
                                    <p class="text-xs text-secondary mb-0">john@tvs.com</p>
                                </div>
                                </div>
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold mb-0">Manager</p>
                                <p class="text-xs text-secondary mb-0">Organization</p>
                            </td>
                            <td class="align-middle text-center text-sm">
                                <span class="badge badge-sm badge-success">Online</span>
                            </td>
                            <td class="align-middle">
                                <a href="javascript:;" class="text-secondary font-weight-normal text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                Edit
                                </a>
                            </td>
                        </tr>
         -->
                    </tbody>
                    </table>
                </div>
                </div>

            </main>

        </div>

    </div>
</div>
