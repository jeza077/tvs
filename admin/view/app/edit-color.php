<?php

    $valor = $_GET['id'];
    if($valor){
        
        $table = 'colores';
        $item = 'id_color';
        // echo 'si';
        $colors = ColorController::ctrShowColors($table, $item, $valor);
    } else {
        // echo 'no';
        echo("<script>location.href = tvs/admin/color-list;</script>");
        exit();
    }


?>

<div class="container-fluid py-4">
    <div class="row">
        <!-- ENTER CODE HERE -->
    <div class="col-lg-6 m-auto">
        <h3 class="mt-3 mb-5 text-center">Editar color</h3>
       
        <div class="card">

        <div class="card-body">
            <form class="multisteps-form__form" style="height: 276px;" id="editColorForm">
            <!--single form panel-->
            <div class="pt-3 border-radius-xl bg-white js-active" data-animation="FadeIn">
                <h5 class="font-weight-bolder">Información color</h5>
                <div class="multisteps-form__content">
                    <div class="mt-5">
                        <div class="row">
                            
                            <div class="col-md-6">
                            <div class="input-group input-group-dynamic">
                                <label for="exampleFormControlInput1" class="form-label">Nombre color</label>
                                <input class="form-control" name="editNameColor" type="text" value="<?php echo $colors['colores']?>" onfocus="focused(this)" onfocusout="defocused(this)">
                            </div>
                            </div>

                            <div class="col-md-6 mt-3">                          
                                <input type="text" id="color-picker" class="color-picker minicolors-input" value="<?php echo $colors['hexadecimal']?>" name="editColorHex">
                            </div>
                            <input type="hidden" name="editIdColor" value="<?php echo $colors['id_color']?>">
                            
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