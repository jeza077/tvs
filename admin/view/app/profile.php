<?php 
    $table = 'usuarios';    
    $item = 'id_usuario';
    $valor = $_SESSION['id_usuario'];

    $response = UserController::ctrShowUsers($table, $item, $valor);

    // var_dump($response);
?>

<div class="container-fluid py-4">
    <div class="row">
        <!-- ENTER CODE HERE -->
        <div class="col-lg-12 position-relative z-index-2">

            <h2 id="examples">Perfil</h2>

            <main class="ct-docs-content-col" role="main">
                <div class="ct-docs-page-title">                  
                    <div class="avatar-group mt-3">
                    </div>
                </div>          
                
                <hr class="ct-docs-hr"> 
                <div class="row">
                    <div class="col-sm-7" id="containerMyAccount">
                        <div class="card">
                        <div class="card-body">
                            <form id="formSaveProfile">
                                <div class="row">
                                    <div class="col-12 col-sm-6">
                                        <h3 class="card-title">Mi cuenta</h3>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <button class="btn btn-primary float-end" id="editProfile">Editar</button>
                                        <button type="submit" class="btn btn-primary float-end" id="saveProfile">Guardar</button>
                                        <button class="btn btn-outline-danger float-end me-2" id="cancelProfile">Cancelar</button>
                                    </div>
                                </div>
                                <div class="row mt-7" id="editMyAccount">
                                    <div class="col-12 col-sm-6" id="containerEmailProfile">
                                        <div class="input-group input-group-dynamic">
                                            <label for="exampleFormControlInput1" class="form-label">Email</label>
                                            <input class="form-control" type="text" id="profileEmail" name="profileEmail" value="<?php echo $response['email'] ?>" readonly required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6" id="containerPasswordProfile">
                                        <div class="input-group input-group-dynamic">
                                            <label for="exampleFormControlInput1" class="form-label">Contraseña</label>
                                            <input class="form-control" type="password" id="profilePassword" name="profilePassword" value="" readonly>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4" id="containerConfirmarPasswordProfile">
                                        <div class="input-group input-group-dynamic">
                                            <label for="exampleFormControlInput1" class="form-label">Confirmar Contraseña</label>
                                            <input class="form-control" type="password" id="confirmarProfilePassword" value="********">
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" value="<?php echo $response['id_usuario'] ?>" name="idUserProfile">
                            </form>
                        </div>
                        </div>
                    </div>
                    <div class="col-sm-5" id="profile">
                        <div class="card">
                        <div class="card-body">
                            <!-- <h3 class="card-title">Mi cuenta</h3> -->
                            
                        </div>
                        </div>
                    </div>
                </div>

            </main>

        </div>

    </div>
</div>
