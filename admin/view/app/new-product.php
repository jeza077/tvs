<?php

    $table = 'categorias';
    $item = null;
    $valor = null;
    $category = CategoryController::ctrShowCategories($table, $item, $valor);

    // var_dump($category);
    // $table = 'colores';
    // $item = null;
    // $valor = null;
    // $colors = ColorController::ctrShowColors($table, $item, $valor);

    // var_dump($colors);
?>

<div class="container-fluid py-4">
    <div class="row">
        <!-- ENTER CODE HERE -->
    <div class="col-lg-8 col-md-10 col-12 m-auto">
        <h3 class="mt-1 mb-6 text-center">Agregar nuevo producto</h3>
        <!-- <p class="lead font-weight-normal opacity-8 mb-7 text-center"></p> -->
        <div class="card">
        <div class="card-header p-0 position-relative mt-n5 mx-3 z-index-2">
            <div class="bg-gradient-info shadow-info border-radius-lg pt-4 pb-3">
            <div class="multisteps-form__progress">
                <button class="multisteps-form__progress-btn js-active" type="button" title="Product Info">1. Product Info</button>
                <button class="multisteps-form__progress-btn" type="button" title="Media">2. Media</button>
                <!-- <button class="multisteps-form__progress-btn" type="button" title="Socials">3. Socials</button> -->
                <button class="multisteps-form__progress-btn" type="button" title="Pricing">3. Pricing</button>
            </div>
            </div>
        </div>
        <div class="card-body">
            <form class="multisteps-form__form" style="height: 276px;" id="productForm">
                <!--single form panel-->
                <div class="multisteps-form__panel pt-3 border-radius-xl bg-white js-active" id="dataProduct" data-animation="FadeIn">
                    <h5 class="font-weight-bolder">Información del producto</h5>
                    <div class="multisteps-form__content">
                    <div class="row mt-3">
                        <div class="col-12 col-sm-6">
                        <div class="input-group input-group-dynamic">
                            <label for="exampleFormControlInput1" class="form-label">Nombre producto</label>
                            <input class="multisteps-form__input form-control" type="text" name="nameProduct" onfocus="focused(this)" onfocusout="defocused(this)">
                        </div>
                        </div>
                        <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                        <!-- <label class="form-control ms-0">Category</label> -->
                        <select class="form-control" name="categoryProduct" id="choices-category" placeholder="Departure">
                            <?php    
                              foreach ($category as $key => $value) {

                                echo '<option value="'.$value["id_categoria"].'">'.$value["categorias"].'</option>';
                                
                              }
                            ?>
                            <!-- <option value="Choice 1" selected="">Categoría</option>
                            <option value="Choice 2">Deportiva</option>
                            <option value="Choice 3">Semi-deportiva</option>
                            <option value="Choice 4">Automatica</option>
                            <option value="Choice 5">Trabajo</option> -->
                        </select>             
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-7">
                        <!-- <label class="mt-4">Descripción</label>
                        <input type="text" name="descriptionProduct"> -->

                        <label class="mt-4">Descripción</label>
                        <p class="form-text text-muted text-xs ms-1 d-inline">
                            (optional)
                        </p>
                        <!-- <input type="text" name="descriptionProduct"> -->

                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Leave a comment here" name="descriptionProduct" style="border:1px solid #d2d6da"></textarea>
                        </div>

                        </textarea>
                        <!-- <div class="ql-toolbar ql-snow">                             -->
                            <!-- <div id="edit-deschiption" class="h-50 ql-container ql-snow"> -->
                                <!-- <input type="text" name="descriptionProduct" id="descriptionProduct" data-formula="e=mc^2" data-link="https://quilljs.com" data-video="Embed URL"> -->
                                <!-- <input type="text" name="descriptionProduct" id="descriptionProduct"> -->
                            <!-- </div> -->
                        <!-- </div> -->
                        </div>

                        <div class="col-5">
                        <label class="mt-4 form-label">Color</label>
                        <select class="form-control" id="choices-tags" multiple>
                        <?php

                            $table = 'colores';
                            $item = null;
                            $valor = null;
                            $colors = ColorController::ctrShowColors($table, $item, $valor);

                            // var_dump($colors);

                            foreach ($colors as $key => $value) {   

                                echo '<option value="'.$value["id_color"].'">'.$value["colores"].'</option>';
                                
                            }
                        ?>
                      
                        </select>
                        </div>
                    
                    </div>
                    <div class="button-row d-flex mt-4">
                        <button class="btn bg-gradient-dark ms-auto mb-0 js-btn-next" type="button" id="nextProduct" title="Next">Next</button>
                    </div>
                    </div>
                </div>
                <!--single form panel-->
                <div class="multisteps-form__panel pt-3 border-radius-xl bg-white" data-animation="FadeIn">
                  <h5 class="font-weight-bolder">Media</h5>
                  <div class="multisteps-form__content">
                    <div class="row mt-3">
                      <div class="col-12">
                        <label class="form-control mb-0">Imagenes del producto</label>
                        <div class="form-control border dropzone dz-clickable" name="productImg" id="productImg"><div class="dz-default dz-message"><button class="dz-button" type="button">Arrastre y suelte o haga clic aquí</button></div></div>
                      </div>
                    </div>
                    <div class="button-row d-flex mt-4">
                      <button class="btn bg-gradient-light mb-0 js-btn-prev" type="button" title="Prev">Prev</button>
                      <button class="btn bg-gradient-dark ms-auto mb-0 js-btn-next" type="button" title="Next">Next</button>
                    </div>
                  </div>
                </div>
                <!--single form panel-->
                <!-- <div class="multisteps-form__panel pt-3 border-radius-xl bg-white" data-animation="FadeIn">
                    <h5 class="font-weight-bolder">Socials</h5>
                    <div class="multisteps-form__content">
                    <div class="row mt-3">
                        <div class="col-12">
                        <div class="input-group input-group-dynamic">
                            <label class="form-label">Shoppify Handle</label>
                            <input class="multisteps-form__input form-control" type="text" onfocus="focused(this)" onfocusout="defocused(this)">
                        </div>
                        </div>
                        <div class="col-12 mt-3">
                        <div class="input-group input-group-dynamic">
                            <label class="form-label">Facebook Account</label>
                            <input class="multisteps-form__input form-control" type="text" onfocus="focused(this)" onfocusout="defocused(this)">
                        </div>
                        </div>
                        <div class="col-12 mt-3">
                        <div class="input-group input-group-dynamic">
                            <label class="form-label">Instagram Account</label>
                            <input class="multisteps-form__input form-control" type="text" onfocus="focused(this)" onfocusout="defocused(this)">
                        </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="button-row d-flex mt-4 col-12">
                        <button class="btn bg-gradient-light mb-0 js-btn-prev" type="button" title="Prev">Prev</button>
                        <button class="btn bg-gradient-dark ms-auto mb-0 js-btn-next" type="button" title="Next">Next</button>
                        </div>
                    </div>
                    </div>
                </div> -->
                <!--single form panel-->
                <div class="multisteps-form__panel pt-3 border-radius-xl bg-white h-100 " data-animation="FadeIn">
                    <h5 class="font-weight-bolder">Pricing</h5>
                    <div class="multisteps-form__content mt-3">
                    <div class="row">
                        <div class="col-3">
                        <div class="input-group input-group-dynamic">
                            <label class="form-label">Price</label>
                            <input type="text" class="form-control w-100" id="exampleInputEmail1" aria-describedby="emailHelp" onfocus="focused(this)" name="priceProduct" onfocusout="defocused(this)">
                        </div>
                        </div>
                        <div class="col-4">
                        <select class="form-control" id="choices-currency">
                            <option value="Choice 1" selected="">LPS</option>
                            <option value="Choice 2">EUR</option>
                            <option value="Choice 3">GBP</option>
                            <option value="Choice 4">CNY</option>
                            <option value="Choice 5">INR</option>
                            <option value="Choice 6">BTC</option>
                            </select>
                        
                        </div>
                        <div class="col-5">
                        <div class="input-group input-group-dynamic">
                            <label class="form-label">SKU</label>
                            <input class="multisteps-form__input form-control" type="text" onfocus="focused(this)" onfocusout="defocused(this)">
                        </div>
                        </div>
                    </div>

                    <div class="button-row d-flex mt-0 mt-md-4">
                        <button class="btn bg-gradient-light mb-0 js-btn-prev" type="button" title="Prev">Prev</button>
                        <button class="btn bg-gradient-dark ms-auto mb-0" type="submit" title="Send">Send</button>
                    </div>
                    </div>
                </div>
            </form>
        </div>
        </div>
    </div>
        <!-- END ENTER CODE HERE -->
    </div>
</div>