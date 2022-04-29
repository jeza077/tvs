<?php 

    $table = 'producto';
    $item = 'id_producto';
    $valor = $_GET['id'];

    $products = ProductController::ctrPruebaShowProducts($table, $item, $valor);
    // echo '<pre>';
    // var_dump($response);
    // echo '</pre>';

    $idProduct = 0;
    $imgs = [];
    foreach ($products as $key => $product){
        if($idProduct != $product['id']){
            echo $product['id'];

            $nameProduct = $product['nombre_producto'];
            $idCategory = $product['id_categoria'];
            $category = $product['categorias'];
            $price = $product['precio'];
            $description = $product['descripcion_producto'];
            $idProduct = $product['id'];
        }

        //  $product['url_img'];
        array_push($imgs, $product['url_img']);
        // var_dump($img);
    }


?>

<div class="container-fluid py-4">
    <div class="row">
        <!-- ENTER CODE HERE -->
    <div class="col-lg-8 col-md-10 col-12 m-auto">
        <h3 class="mt-1 mb-6 text-center">Editar producto</h3>
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
            <form class="multisteps-form__form" style="height: 276px;" id="editProductForm">
                <!--single form panel-->
                <div class="multisteps-form__panel pt-3 border-radius-xl bg-white js-active" id="dataProduct" data-animation="FadeIn">
                    <h5 class="font-weight-bolder">Información del producto</h5>
                    <div class="multisteps-form__content">
                    <div class="row mt-3">
                        <div class="col-12 col-sm-6">
                        <div class="input-group input-group-dynamic">
                            <label for="exampleFormControlInput1" class="form-label">Nombre producto</label>
                            <input class="multisteps-form__input form-control" type="text" name="editNameProduct" value="<?php echo $nameProduct?>" onfocus="focused(this)" onfocusout="defocused(this)">
                        </div>
                        </div>
                        <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                        <!-- <label class="form-control ms-0">Category</label> -->
                        <select class="form-control" name="editCategoryProduct" id="choices-category" placeholder="Departure">
                            <option value="<?php echo $idCategory?>" selected=""><?php echo $category?></option>
                            <?php    
                                $table = 'categorias';
                                $item = null;
                                $valor = null;
                            
                                $category = CategoryController::ctrShowCategories($table, $item, $valor);
                                foreach ($category as $key => $value) {

                                    echo '<option value="'.$value["id_categoria"].'">'.$value["categorias"].'</option>';
                                
                                }
                            ?>
                  
                        </select>             
                        </div>
                    </div>
                    <!-- <div class="row"> -->
                    <div class="col-12">
                        <!-- <label class="mt-4">Descripción</label>
                        <input type="text" name="descriptionProduct"> -->

                        <label class="mt-4">Descripción</label>
                        <p class="form-text text-muted text-xs ms-1 d-inline">
                            (optional)
                        </p>
                        <!-- <input type="text" name="descriptionProduct"> -->

                        <div class="form-floating">
                            <textarea class="form-control" name="editDescriptionProduct" style="border:1px solid #d2d6da"><?php echo $description?></textarea>
                        </div>

                       
                        <!-- <div class="ql-toolbar ql-snow">                             -->
                            <!-- <div id="edit-deschiption" class="h-50 ql-container ql-snow"> -->
                                <!-- <input type="text" name="descriptionProduct" id="descriptionProduct" data-formula="e=mc^2" data-link="https://quilljs.com" data-video="Embed URL"> -->
                                <!-- <input type="text" name="descriptionProduct" id="descriptionProduct"> -->
                            <!-- </div> -->
                        <!-- </div> -->
                        </div>
                    <!-- </div> -->
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
                        <label class="form-control mb-0">Product images</label>

                        <div action="/file-upload" class="form-control border dropzone dz-clickable" name="editImgProduct" id="editProductImg">
                            
                            <?php 
                                // var_dump($imgs);
                                foreach($imgs as $img){

                                    echo '<div class="dz-preview dz-processing dz-success dz-complete dz-image-preview">  <div class="dz-image">
                                        <img data-dz-thumbnail="" class="imgEdit" alt="apache-200-1.jpg" src="'.$img.'" style="width:120px" name="editImg">
                                    </div>                            
                                    <div class="dz-details"> 
                                        <div class="dz-size">
                                            <span data-dz-size=""><strong>45.8</strong> KB</span>
                                        </div>    
                                        <div class="dz-filename">
                                            <span data-dz-name="">apache-200-1.jpg</span>
                                        </div>  
                                    </div>  
                            <div class="dz-progress">
                                <span class="dz-upload" data-dz-uploadprogress="" style="width: 100%;"></span>
                            </div>  
                            <div class="dz-error-message"><span data-dz-errormessage=""></span></div>  <div class="dz-success-mark">    <svg width="54px" height="54px" viewBox="0 0 54 54" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">      <title>Check</title>      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">        <path d="M23.5,31.8431458 L17.5852419,25.9283877 C16.0248253,24.3679711 13.4910294,24.366835 11.9289322,25.9289322 C10.3700136,27.4878508 10.3665912,30.0234455 11.9283877,31.5852419 L20.4147581,40.0716123 C20.5133999,40.1702541 20.6159315,40.2626649 20.7218615,40.3488435 C22.2835669,41.8725651 24.794234,41.8626202 26.3461564,40.3106978 L43.3106978,23.3461564 C44.8771021,21.7797521 44.8758057,19.2483887 43.3137085,17.6862915 C41.7547899,16.1273729 39.2176035,16.1255422 37.6538436,17.6893022 L23.5,31.8431458 Z M27,53 C41.3594035,53 53,41.3594035 53,27 C53,12.6405965 41.3594035,1 27,1 C12.6405965,1 1,12.6405965 1,27 C1,41.3594035 12.6405965,53 27,53 Z" stroke-opacity="0.198794158" stroke="#747474" fill-opacity="0.816519475" fill="#FFFFFF"></path>      </g>    </svg>  </div>  <div class="dz-error-mark">    <svg width="54px" height="54px" viewBox="0 0 54 54" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">      <title>Error</title>      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">        <g stroke="#747474" stroke-opacity="0.198794158" fill="#FFFFFF" fill-opacity="0.816519475">          <path d="M32.6568542,29 L38.3106978,23.3461564 C39.8771021,21.7797521 39.8758057,19.2483887 38.3137085,17.6862915 C36.7547899,16.1273729 34.2176035,16.1255422 32.6538436,17.6893022 L27,23.3431458 L21.3461564,17.6893022 C19.7823965,16.1255422 17.2452101,16.1273729 15.6862915,17.6862915 C14.1241943,19.2483887 14.1228979,21.7797521 15.6893022,23.3461564 L21.3431458,29 L15.6893022,34.6538436 C14.1228979,36.2202479 14.1241943,38.7516113 15.6862915,40.3137085 C17.2452101,41.8726271 19.7823965,41.8744578 21.3461564,40.3106978 L27,34.6568542 L32.6538436,40.3106978 C34.2176035,41.8744578 36.7547899,41.8726271 38.3137085,40.3137085 C39.8758057,38.7516113 39.8771021,36.2202479 38.3106978,34.6538436 L32.6568542,29 Z M27,53 C41.3594035,53 53,41.3594035 53,27 C53,12.6405965 41.3594035,1 27,1 C12.6405965,1 1,12.6405965 1,27 C1,41.3594035 12.6405965,53 27,53 Z"></path>        </g>      </g>    </svg>  </div><a class="dz-remove" href="javascript:undefined;" data-dz-remove="">Remover</a></div>';

                                }

                            ?>

                            <!-- <div class="dz-preview dz-processing dz-success dz-complete dz-image-preview">  <div class="dz-image">
                                <img data-dz-thumbnail="" alt="apache-200-1.jpg" src="<?php echo $product['url_img']?>" style="width:120px">
                            </div>  
                            <div class="dz-details"> 
                                <div class="dz-size">
                                    <span data-dz-size=""><strong>45.8</strong> KB</span>
                                </div>    
                            <div class="dz-filename">
                                <span data-dz-name="">apache-200-1.jpg</span>
                            </div>  
                            </div>  
                            <div class="dz-progress">
                                <span class="dz-upload" data-dz-uploadprogress="" style="width: 100%;"></span>
                            </div>  
                            <div class="dz-error-message"><span data-dz-errormessage=""></span></div>  <div class="dz-success-mark">    <svg width="54px" height="54px" viewBox="0 0 54 54" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">      <title>Check</title>      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">        <path d="M23.5,31.8431458 L17.5852419,25.9283877 C16.0248253,24.3679711 13.4910294,24.366835 11.9289322,25.9289322 C10.3700136,27.4878508 10.3665912,30.0234455 11.9283877,31.5852419 L20.4147581,40.0716123 C20.5133999,40.1702541 20.6159315,40.2626649 20.7218615,40.3488435 C22.2835669,41.8725651 24.794234,41.8626202 26.3461564,40.3106978 L43.3106978,23.3461564 C44.8771021,21.7797521 44.8758057,19.2483887 43.3137085,17.6862915 C41.7547899,16.1273729 39.2176035,16.1255422 37.6538436,17.6893022 L23.5,31.8431458 Z M27,53 C41.3594035,53 53,41.3594035 53,27 C53,12.6405965 41.3594035,1 27,1 C12.6405965,1 1,12.6405965 1,27 C1,41.3594035 12.6405965,53 27,53 Z" stroke-opacity="0.198794158" stroke="#747474" fill-opacity="0.816519475" fill="#FFFFFF"></path>      </g>    </svg>  </div>  <div class="dz-error-mark">    <svg width="54px" height="54px" viewBox="0 0 54 54" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">      <title>Error</title>      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">        <g stroke="#747474" stroke-opacity="0.198794158" fill="#FFFFFF" fill-opacity="0.816519475">          <path d="M32.6568542,29 L38.3106978,23.3461564 C39.8771021,21.7797521 39.8758057,19.2483887 38.3137085,17.6862915 C36.7547899,16.1273729 34.2176035,16.1255422 32.6538436,17.6893022 L27,23.3431458 L21.3461564,17.6893022 C19.7823965,16.1255422 17.2452101,16.1273729 15.6862915,17.6862915 C14.1241943,19.2483887 14.1228979,21.7797521 15.6893022,23.3461564 L21.3431458,29 L15.6893022,34.6538436 C14.1228979,36.2202479 14.1241943,38.7516113 15.6862915,40.3137085 C17.2452101,41.8726271 19.7823965,41.8744578 21.3461564,40.3106978 L27,34.6568542 L32.6538436,40.3106978 C34.2176035,41.8744578 36.7547899,41.8726271 38.3137085,40.3137085 C39.8758057,38.7516113 39.8771021,36.2202479 38.3106978,34.6538436 L32.6568542,29 Z M27,53 C41.3594035,53 53,41.3594035 53,27 C53,12.6405965 41.3594035,1 27,1 C12.6405965,1 1,12.6405965 1,27 C1,41.3594035 12.6405965,53 27,53 Z"></path>        </g>      </g>    </svg>  </div><a class="dz-remove" href="javascript:undefined;" data-dz-remove="">Remover</a></div> -->
                        </div>

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
                    <h5 class="font-weight-bolder">Precio</h5>
                    <div class="multisteps-form__content mt-3">
                    <div class="row">
                        <div class="col-3">
                        <div class="input-group input-group-dynamic">
                            <label class="form-label">Precio</label>
                            <input type="text" class="form-control w-100" id="exampleInputEmail1" aria-describedby="emailHelp" onfocus="focused(this)" name="editPriceProduct" value="<?php echo $price?>" onfocusout="defocused(this)">
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
                    <div class="row">
                        <div class="col-12">
                            <label class="mt-4 form-label">Tags</label>
                            <select class="form-control" name="choices-tags" id="choices-tags" multiple>
                                <option value="Choice 1" selected>In Stock</option>
                                <option value="Choice 2">Out of Stock</option>
                                <option value="Choice 3">Sale</option>
                                <option value="Choice 4">Black Friday</option>
                                </select>
                        </div>

                        <input type="hidden" class="form-control" name="idEditProduct" value="<?php echo $idProduct?>" onfocus="focused(this)" onfocusout="defocused(this)">

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