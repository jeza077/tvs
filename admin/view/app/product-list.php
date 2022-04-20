<div class="container-fluid py-4">
    <div class="row">
        <!-- ENTER CODE HERE -->
        <div class="col-lg-12 position-relative z-index-2">

            <h2 id="examples">Productos</h2>

            <?php 
                // echo $_SESSION['fecha']; 
                // $table = "producto";
                // $item = null;
                // $valor = null;
                // $products = ProductController::ctrShowProducts($table, $item, $valor);

                // echo '<pre>';
                // var_dump($products);
                // echo '</pre>';
            ?>

            <main class="ct-docs-content-col" role="main">
                <div class="ct-docs-page-title">                  
                    <div class="avatar-group mt-3">
                    </div>
                </div>          
                
                <hr class="ct-docs-hr"> 
                <div class="card">
                <div class="table-responsive p-4">
                    <table class="table align-items-center responsive mb-0" id="tableProducts" style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7" width="5%">No.</th>
                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2" width="8%">Producto</th>
                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2" width="20%">Categoría</th>
                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2" width="15%">Descripción</th>
                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2" width="20%">Precio</th>
                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2" width="15%">Acciones</th>
                        </tr>
                    </thead>
                    <!-- <tbody> -->
                        <?php 
                            // $table = "producto";
                            // $item = null;
                            // $valor = null;
                            // $products = ProductController::ctrShowProducts($table, $item, $valor);

                            // // echo '<pre>';
                            // // var_dump($products);
                            // // echo '</pre>';

                            // foreach ($products as $key => $value){
                                
                            //     echo   '<tr>
                            //                 <td scope="row">
                            //                     <div class="d-flex px-2 py-1">
                            //                     <div class="text-md font-weight-bold mb-0">
                            //                     '.($key+1).'
                            //                     </div>
                            //                     </div>
                            //                 </td>
                            //                 <td class"align-middle text-center">
                                            
                            //                     <div class="text-md font-weight-bold mb-0">
                            //                     '.$value["nombre_producto"].'
                            //                     </div>
                            //                 </td>   
                            //                 <td>
                            //                     <div class="text-md font-weight-bold mb-0">
                            //                     '.$value["categorias"].'
                            //                     </div>
                            //                 </td>   
                            //                 <td>
                            //                     <div class="text-md font-weight-bold mb-0">
                            //                     '.$value["descripcion_producto"].'
                            //                     </div>
                            //                 </td>   
                            //                 <td>
                            //                     <div class="text-md font-weight-bold mb-0">
                            //                     '.$value["precio"].'
                            //                     </div>
                            //                 </td>  
                            //                 <td>

                            //                 <button class="btn btn-warning btn-xs" data-toggle="tooltip" data-original-title="Editar categoría">
                            //                     Editar
                            //                     </button>
                            //                     <button class="btn btn-danger btn-xs" data-toggle="tooltip" data-original-title="Eliminar categoría">
                            //                     Eliminar
                            //                     </button>
                            //                 </td>
                            //             </tr>';

                            // }

                        ?>

                    <!-- </tbody> -->
                    </table>
                </div>
                </div>

            </main>

        </div>

    </div>
</div>
