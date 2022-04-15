<div class="container-fluid py-4">
    <div class="row">
        <!-- ENTER CODE HERE -->
    <div class="col-lg-6 m-auto">
        <h3 class="mt-3 mb-5 text-center">Editar categoría</h3>
       
        <div class="card">

        <div class="card-body">
            <form class="multisteps-form__form" style="height: 276px;" id="editCategoryForm">
            <!--single form panel-->
            <div class="pt-3 border-radius-xl bg-white js-active" data-animation="FadeIn">
                <h5 class="font-weight-bolder">Información categoría</h5>
                <div class="multisteps-form__content">

                <?php 
                    $table = 'categorias';
                    $item = 'id_categoria';
                    $valor = $_GET['id'];
            
                    $response = CategoryController::ctrShowCategories($table, $item, $valor);

                    // var_dump($response);
                ?>
                    <div class="mt-5">
                        <div class="col-12">
                        <div class="input-group input-group-dynamic">
                            <label for="exampleFormControlInput1" class="form-label">Categoría</label>
                            <input type="text" class="form-control" name="editCategory" id="editCategory" value="<?php echo $response['categorias']?>" onfocus="focused(this)" onfocusout="defocused(this)">
                            <input type="hidden" class="form-control" name="idEditCategory" value="<?php echo $response['id_categoria']?>" onfocus="focused(this)" onfocusout="defocused(this)">
                        </div>
                        </div>
                        <!-- <div class="col-12 mt-3 mt-sm-0">
                        <div class="input-group input-group-dynamic">
                            <label for="exampleFormControlInput1" class="form-label">Weight</label>
                            <input class="multisteps-form__input form-control" type="text" onfocus="focused(this)" onfocusout="defocused(this)">
                        </div> -->
                        </div>
                    </div>
                </div>
                <div class="button-row d-flex mt-0 mt-md-7">
                    <button class="btn btn-primary ms-auto mb-0" type="submit" title="Send">Guardar cambios</button>
                </div>
            </div>
            </form>
        </div>
        </div>
    </div>
        <!-- END ENTER CODE HERE -->
    </div>
</div>