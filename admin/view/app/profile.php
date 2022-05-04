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
                                        <div class="input-group input-group-dynamic form_group" id="group_email">
                                            <label class="form-label formulario__label">Email</label>
                                            <input class="form-control formulario__input" type="text" id="profileEmail" name="profileEmail" value="<?php echo $response['email'] ?>" readonly required>
                                        </div>
                                        <p class="formulario__input-error-email mt-1">Email incorrecto, ingrese uno valido.</p>
                                    </div>
                                    <div class="col-12 col-sm-6" id="containerPasswordProfile">
                                        <div class="input-group input-group-dynamic form_group" id="group_password">
                                            <label class="form-label formulario__label">Contraseña</label>
                                            <input class="form-control nueva-password formulario__input" type="password" id="profilePassword" name="profilePassword" readonly disabled>
                                        </div>
                                        <p class="formulario__input-error-password mt-1">La contraseña debe contener de 8 16 caracteres.</p>
                                    </div>
                                    <div class="col-12 col-sm-4" id="containerConfirmarPasswordProfile">
                                        <div class="input-group input-group-dynamic form_group" id="group_password2">
                                            <label class="form-label formulario__label">Confirmar Contraseña</label>
                                            <input class="form-control formulario__input" type="password" id="confirmarProfilePassword" name="confirmarProfilePassword">
                                        </div>
                                        <p class="formulario__input-error-password2 mt-1">Ambas contraseñas deben ser iguales.</p>
                                    </div>
                                </div>
                                <input type="hidden" value="<?php echo $response['id_usuario'] ?>" name="idUserProfile">
                            </form>
                            <div class="alert alert-danger text-white text-center mt-4" id="formulario__mensaje-error"><i class="fas fa-exclamation-triangle"></i>  Por favor rellenar el formulario correctamente.</div>
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
