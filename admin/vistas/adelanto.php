<?php 
//activamos almacenamiento en el buffer
ob_start();
session_start();
if (!isset($_SESSION['nombre'])) {
  header("Location: login.html");
}else{

require 'header.php';
 ?>
    <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="row">
        <div class="col-md-12">
      <div class="box">
<div class="box-header with-border">
  <h1 class="box-title">Notas y adelantos <button class="btn btn-success" onclick="mostrarform(true)" id="btnagregar"><i class="fa fa-plus-circle"></i>Agregar</button></h1>
  <div class="box-tools pull-right">
    
  </div>
</div>
<!--box-header-->
<!--centro-->
<div class="panel-body table-responsive" id="listadoregistros">
  <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
    <thead>
      <th>Opciones</th>
      <th>Código</th>
      <th>Nombres</th>
      <th>Área</th>
      <th>Fecha Hora</th>
      <th>Actividad</th>
      <th>Actividad</th>
      <th>Fecha</th>
    </thead>
    <tbody>
    </tbody>
    <tfoot>
      <th>Opciones</th>
      <th>Código</th>
      <th>Nombres</th>
      <th>Área</th>
      <th>Fecha Hora</th>
      <th>Actividad</th>
      <th>Actividad</th>
      <th>Fecha</th>
    </tfoot>   
  </table>
</div>
<div class="panel-body" id="formularioregistros">
  <form action="" name="formulario" id="formulario" method="POST">
    <div class="form-group col-lg-6 col-md-6 col-xs-12">
    <label>Empleado</label>
    <select name="codigo_persona" id="codigo_persona" class="form-control selectpicker" data-live-search="true" required>
    </select>

    </div>
    
    <div class="form-group col-lg-6 col-md-6 col-xs-12">
      <label for="">Condición de:</label>
     <select class="form-control select-picker" name="tipo" id="tipo" required>
       <option value="Adelanto">Adelanto</option>
       <option value="Prestamo">Prestamo</option>
       <option value="Otro">Otro</option>
     </select>
    </div>
    <div class="form-group col-lg-6 col-md-6 col-xs-12">
      <label for="">Monto $(*):</label>
      <input class="form-control" type="number" name="pdiario" id="pdiario" maxlength="100" placeholder="Monto" required>
    </div>
    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i>  Guardar</button>
      <button class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
    </div>
  </form>
</div>




      </div>
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
<?php 

require 'footer.php';
 ?>
 <script src="scripts/adelanto.js"></script>
 <?php 
}

ob_end_flush();
  ?>
