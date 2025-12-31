<?php 
 include "../app/config.php";
include '../layout/sesion.php';
include '../layout/parte1.php';
include '../app/controllers/roles/listado_de_roles.php';
include '../app/seguridad.php';

if (
  empty($nombres) ||
  empty($email) ||
  empty($rol) ||
  empty($password_user) ||
  empty($password_repeat)
) {
  // mensaje de error
}
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0">REGISTRO DE UN NUEVO USUARIO</h1>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
       
      <div class="row">
        <div class="col-md-6">
        <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Usuraios Registrados</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                
                  <div class="row">
                    <div class="col-md-12">

                      <form action="../app/controllers/usuarios/create.php" method="post">
                        <div class="form-group">
                          <label for="">nombres</label>
                          <input 
                            type="text" 
                            name="nombres" 
                            class="form-control"
                            placeholder="Escriba el nombre del usuario"
                            required
                            minlength="3"
                            maxlength="100"
                            pattern="[A-Za-zÁÉÍÓÚáéíóúÑñ ]+"
                            title="Solo letras y espacios">
                        </div>
                        <div class="form-group">
                          <label for="">email</label>
                          <input type="email" name="email" class="form-control" placeholder="escriba el correo del usuario" required>
                        </div>
                        <div class="form-group">
                          <label for="">Rol del usuario</label>
                          <select name="rol" class="form-control" required>
                            <option value="">Seleccione un rol</option>
                            <?php foreach($roles_datos as $roles_dato){ ?>
                              <option value="<?= $roles_dato['id_rol']; ?>">
                                <?= $roles_dato['rol']; ?>
                              </option>
                            <?php } ?>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="">contraseña</label>
                          <input 
                            type="password" 
                            name="password_user" 
                            class="form-control"
                            required
                            minlength="8"
                            maxlength="20"
                            pattern="(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9]).{8,}"
                            title="Debe tener al menos 8 caracteres, una mayúscula, una minúscula y un número">
                        </div>
                        <div class="form-group">
                          <label for="">Repita la contraseña</label>
                          <input 
                            type="password" 
                            name="password_repeat" 
                            class="form-control"
                            required>
                        </div>
                        <hr>
                        <div class="form-group">
                          <a href="index.php" class="btn btn-secondary">Cancelar</a>
                          <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                      </form>

                    </div>
                  </div>

              </div>
              <!-- /.card-body -->
            </div>
        </div>
      </div>

      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php include '../layout/parte2.php'?>



