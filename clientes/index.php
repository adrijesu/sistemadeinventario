<?php 
include '../app/config.php';
include '../app/seguridad.php';
include '../app/permisos.php';

permitirRoles(['ADMINISTRADOR','ALMACENERO']);

include '../layout/parte1.php';
include '../app/controllers/clientes/listado_de_clientes.php';
include '../app/seguridad.php';
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0">LISTADO DE CLIENTES</h1>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
       
        <div class="row">
        <div class="col-md-12">
       
            <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">Clientes Registrados</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                        <th><center>NRO</center></th>
                        <th><center>Nombre del cliente</center></th>
                        <th><center>DNI/RUC</center></th>
                        <th><center>Celular</center></th>
                        <?php if ($_SESSION['rol'] == 'ADMINISTRADOR') { ?>
                          <th><center>Acciones</center></th>
                        <?php } ?>
                        
                        
                    </tr>
                  </thead>
                  <tbody>
                      <?php 
                      $contador = 0;
                        foreach($clientes_datos as $clientes_dato) { 
                          $id_cliente = $clientes_dato['id_cliente'];
                          ?>
                          <tr>
                            <td><?php echo $contador = $contador + 1 ;?></td>
                            <td><?php echo $clientes_dato['nombre_cliente'];?></td>
                            <td><?php echo $clientes_dato['nit_ci_cliente'];?></td>
                            <td><?php echo $clientes_dato['celular_cliente'];?></td>
                           <?php if ($_SESSION['rol'] == 'ADMINISTRADOR') { ?>
                            <td>
                              <center>
                                <div class="btn-group-vertical">
                                  <button class="btn btn-success btn-sm"
                                    data-toggle="modal"
                                    data-target="#modal-update<?= $id_cliente ?>">
                                    <i class="fas fa-pencil-alt"></i> Editar
                                  </button>

                                  <button class="btn btn-danger btn-sm"
                                    onclick="eliminarCliente(<?= $id_cliente ?>)">
                                    <i class="fas fa-trash"></i> Eliminar
                                  </button>
                                </div>
                              </center>
                            </td>
                            <?php } ?>
                            </tr>

                            <!-- MODAL ÚNICO -->
                            <div class="modal fade" id="modal-update<?= $id_cliente ?>">
                              <div class="modal-dialog">
                                <div class="modal-content">

                                  <div class="modal-header bg-success">
                                    <h5 class="modal-title">Editar Cliente</h5>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  </div>

                                  <div class="modal-body">
                                    <input type="hidden" id="id_cliente<?= $id_cliente ?>" value="<?= $id_cliente ?>">

                                    <div class="form-group">
                                      <label>Nombre</label>
                                      <input type="text" id="nombre<?= $id_cliente ?>" class="form-control"
                                        value="<?= $clientes_dato['nombre_cliente'] ?>">
                                    </div>

                                    <div class="form-group">
                                      <label>DNI/RUC</label>
                                      <input type="text" id="nit<?= $id_cliente ?>" class="form-control"
                                        value="<?= $clientes_dato['nit_ci_cliente'] ?>">
                                    </div>

                                    <div class="form-group">
                                      <label>Celular</label>
                                      <input type="text" id="celular<?= $id_cliente ?>" class="form-control"
                                        value="<?= $clientes_dato['celular_cliente'] ?>">
                                    </div>
                                  </div>

                                  <div class="modal-footer">
                                    <button class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    <button class="btn btn-success"
                                      onclick="actualizarCliente(<?= $id_cliente ?>)">
                                      Guardar cambios
                                    </button>
                                  </div>

                                </div>
                              </div>
                            </div>
                            <?php } ?>

                          </tr>
                          
                          </tbody>
                        <tfoot>
                          <tr>
                          <th><center>NRO</center></th>
                        <th><center>Nombre del cliente</center></th>
                        <th><center>DNI/RUC</center></th>
                        <th><center>Celular</center></th>
                        <?php if ($_SESSION['rol'] == 'ADMINISTRADOR') { ?>
                          <th><center>Acciones</center></th>
                        <?php } ?>
                        
                          </tr>
                        </tfoot>
                        <div class="modal fade" id="modal-update<?php echo $id_cliente; ?>">
                  <div class="modal-dialog">
                    <div class="modal-content">

                      <div class="modal-header bg-success">
                        <h5 class="modal-title">Editar Cliente</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>

                      <div class="modal-body">
                        <div class="form-group">
                          <label>Nombre</label>
                          <input type="text" id="nombre<?php echo $id_cliente; ?>" value="<?php echo $clientes_dato['nombre_cliente']; ?>" class="form-control">
                        </div>

                        <div class="form-group">
                          <label>DNI/RUC</label>
                          <input type="text" id="nit<?php echo $id_cliente; ?>" value="<?php echo $clientes_dato['nit_ci_cliente']; ?>" class="form-control">
                        </div>

                        <div class="form-group">
                          <label>Celular</label>
                          <input type="text" id="celular<?php echo $id_cliente; ?>" value="<?php echo $clientes_dato['celular_cliente']; ?>" class="form-control">
                        </div>
                      </div>

                      <div class="modal-footer">
                        <button class="btn btn-success" onclick="actualizarCliente(<?php echo $id_cliente; ?>)">Guardar</button>
                      </div>

                    </div>
                  </div>
                </div>


                <!-- modal para editar clientes-->
                <div class="modal fade" id="modal-update<?php echo $id_cliente; ?>">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header bg-success">
                      <h4 class="modal-title">Editar Cliente</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body">
                      <div class="form-group">
                        <label>Nombre</label>
                        <input type="text"
                          id="nombre_cliente<?php echo $id_cliente; ?>"
                          class="form-control"
                          value="<?php echo $clientes_dato['nombre_cliente']; ?>">
                      </div>

                      <div class="form-group">
                        <label>DNI/RUC</label>
                        <input type="text"
                            id="nit_ci_cliente<?php echo $id_cliente; ?>"
                            class="form-control"
                            value="<?php echo $clientes_dato['nit_ci_cliente']; ?>"
                            oninput="this.value = this.value.replace(/[^0-9]/g,'')">
                      <div class="form-group">
                        <label>Celular</label>
                        <input type="text"
                          id="celular_cliente<?php echo $id_cliente; ?>"
                          class="form-control"
                          value="<?php echo $clientes_dato['celular_cliente']; ?>">
                      </div>

                      <small style="color:red; display:none"
                        id="error_update<?php echo $id_cliente; ?>">
                        Todos los campos son obligatorios
                      </small>
                    </div>

                    <div class="modal-footer">
                      <button class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                      <button class="btn btn-success"
                        id="btn_update<?php echo $id_cliente; ?>">
                        Guardar cambios
                      </button>
                    </div>
                  </div>
                </div>
              </div>

              <script>
$('#btn_update<?php echo $id_cliente; ?>').click(function () {

    var dni_ruc = $('#nit_ci_cliente<?php echo $id_cliente; ?>').val().trim();
    var celular = $('#celular_cliente<?php echo $id_cliente; ?>').val().trim();

    // Expresiones regulares
    var dniRegex = /^[0-9]{8}$/;
    var rucRegex = /^(10|20)[0-9]{9}$/;
    var celularRegex = /^9[0-9]{8}$/;

    // Validación DNI / RUC
    if (!(dniRegex.test(dni_ruc) || rucRegex.test(dni_ruc))) {
        alert('El DNI debe tener 8 dígitos o el RUC 11 dígitos válidos');
        $('#nit_ci_cliente<?php echo $id_cliente; ?>').focus();
        return;
    }

    // Validación celular
    if (!celularRegex.test(celular)) {
        alert('El celular debe tener 9 dígitos y empezar con 9');
        $('#celular_cliente<?php echo $id_cliente; ?>').focus();
        return;
    }

    // Si pasa validaciones, continúa con tu AJAX
    // aquí va tu $.post o $.get
});
</script>

                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
    </div>


      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 
<?php include '../layout/mensaje.php'?>
<?php include '../layout/parte2.php'?>

<script>
  $(function () {
    $("#example1").DataTable({
      "pageLength": 5,
          language: {
              "emptyTable": "No hay información",
              "decimal": "",
              "info": "Mostrando START a END de TOTAL Usuarios",
              "infoEmpty": "Mostrando 0 to 0 of 0 Usuarios",
              "infoFiltered": "(Filtrado de MAX total Usuarios)",
              "infoPostFix": "",
              "thousands": ",",
              "lengthMenu": "Mostrar_MENU_Usuarios",
              "loadingRecords": "Cargando...",
              "processing": "Procesando...",
              "search": "Buscador:",
              "zeroRecords": "Sin resultados encontrados",
              "paginate": {
                  "first": "Primero",
                  "last": "Ultimo",
                  "next": "Siguiente",
                  "previous": "Anterior"
              }
             },
      "responsive": true, "lengthChange": true, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    
  });
</script>

<script>
function eliminarCliente(id_cliente) {
  Swal.fire({
    title: '¿Eliminar cliente?',
    text: 'Esta acción no se puede deshacer',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Sí, eliminar'
  }).then((result) => {
    if (result.isConfirmed) {

      $.get('../app/controllers/clientes/delete_de_clientes.php',
        { id_cliente: id_cliente },
        function(respuesta) {

          if (respuesta.trim() === 'ok') {
            Swal.fire('Eliminado', 'Cliente eliminado', 'success')
              .then(() => location.reload());
          } else {
            Swal.fire('Error', respuesta, 'error');
          }

        });
    }
  });
}
</script>

<script>
function actualizarCliente(id) {

  let nombre = $('#nombre' + id).val();
  let nit = $('#nit' + id).val();
  let celular = $('#celular' + id).val();

  if (nombre === "" || nit === "" || celular === "") {
    Swal.fire('Error', 'Todos los campos son obligatorios', 'warning');
    return;
  }

  $.get('../app/controllers/clientes/update_de_clientes.php', {
    id_cliente: id,
    nombre_cliente: nombre,
    nit_ci_cliente: nit,
    celular_cliente: celular
  }, function (respuesta) {

    if (respuesta.trim() === 'ok') {
      Swal.fire('Actualizado', 'Cliente modificado correctamente', 'success')
        .then(() => location.reload());
    } else {
      Swal.fire('Error', respuesta, 'error');
    }

  });
}
</script>


