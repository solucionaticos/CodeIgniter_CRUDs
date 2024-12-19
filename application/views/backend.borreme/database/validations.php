  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Validations
        <small>Project: <?php echo $projectVersionTitle; ?></small>
      </h1>

<?php
if ($this->session->has_userdata('project')) {
  echo "<input type='hidden' id='project' value='".$this->session->userdata('project')."'>";
} else {
  echo "<input type='hidden' id='project' value='0'>";
}
if ($this->session->has_userdata('version')) {
  echo "<input type='hidden' id='version' value='".$this->session->userdata('version')."'>";
} else {
  echo "<input type='hidden' id='version' value='0'>";
}
?>

      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Validations</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-body">

    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <b>Selector / Creador de Tablas</b>
          </div>        
          <div class="panel-body">
            <div class="row">
              <div class="col-md-6">
                <form>
                  <div class="form-group">
                    <label for="tabla">Tabla:</label>
                    <div class="input-group">
                      <select name="tabla" id="tabla" class="form-control">
                        <option value="0">Seleccione una tabla</option>
<?php
foreach ($tablas as $registro) {
?>
                        <option value="<?=$registro['id'];?>"><?=$registro['nombre'];?></option>
<?php
}
?> 
                      </select>
                      <span class="input-group-btn">
                        <button class="btn btn-default" id="tabla_propiedades" type="button"><i class="fa fa-cog" style="color: #3879b7;"></i></button>
                      </span>
                    </div>
                  </div>
                </form>
              </div>
              <div class="col-md-6">
                <form>
                  <div class="form-group">
                    <label for="nueva_tabla">Nueva Tabla:</label>
                    <div class="input-group">
                      <input name="nueva_tabla" id="nueva_tabla" class="form-control" type="text" placeholder="Nombre de la tabla">
                      <span class="input-group-btn">
                        <button type="button" class="btn btn-default" id="tabla_nuevo" type="button"><i class="fa fa-plus" aria-hidden="true" style="color: #5cb85c;"></i></button>
                        <button type="button" class="btn btn-default" id="tabla_asistente" type="button"><i class="fa fa-magic" aria-hidden="true" style="color: #3879b7;"></i></button>
                      </span>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row" id="campos_formularios" style="display:none;">
      <div class="col-md-5">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <b>Campos de la tabla:</b> <span style="color:yellow;"" id="tabla_seleccionada"></span>
          </div>
          <div class="panel-body">
            <div class="table-responsive">
              <table class="table table-striped table-bordered table-hover table-condensed">
                <thead>
                  <tr>
                    <th style="width:10px;"></th>
                    <th style="width:220px;">Etiqueta</th>
                    <th style="width:140px;">Tipo Dato</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody id="campos">
                </tbody>
                <tfoot>
                  <tr>
                    <td colspan="4">
                      <div class="btn-group" role="group">
                        <button type="button" class="btn btn-default" id="campo_nuevo" type="button"><i class="fa fa-plus" aria-hidden="true" style="color: #5cb85c;"></i></button>

                      </div>
                    </td>
                  </tr>
                </tfoot>              
              </table>
            </div> <!-- table-responsive -->
          </div> <!-- panel-body -->
        </div> <!-- panel -->
      </div> <!-- col-sm-4 -->
      <div class="col-md-7" id="propiedades_campo" style="display:none;">
        <div class="panel panel-primary" id="campos_panel">
          <div class="panel-heading">
            <b>Propiedades del Campo:</b> <span style="color:yellow;"" id="campo_etiqueta_seleccionado"></span>
          </div>
          <div class="panel-body">

            <ul class="nav nav-tabs">
              <li class="active"><a data-toggle="tab" href="#pc_general">Generales</a></li>
              <li><a data-toggle="tab" href="#pc_validaciones">Validaciones</a></li>
              <li><a data-toggle="tab" href="#pc_indices">Indices</a></li>
              <li><a data-toggle="tab" href="#pc_archivo">Archivo</a></li>
              <li><a data-toggle="tab" href="#pc_relacion_1_n">Relación 1-N</a></li>
              <li><a data-toggle="tab" href="#pc_relacion_n_m">Relación N-M</a></li>
            </ul>

            <br>

            <div class="tab-content">
              <div id="pc_general" class="tab-pane fade in active">

                <div class="btn-group" role="group">
                  <button type="button" class="btn btn-default" id="campo_asistente" type="button"><i class="fa fa-magic" style="color: #3879b7;"></i></button>
                  <button type="button" class="btn btn-default" id="campo_subir" type="button"><i class="fa fa-arrow-up" aria-hidden="true"></i></button>
                  <button type="button" class="btn btn-default" id="campo_bajar" type="button"><i class="fa fa-arrow-down" aria-hidden="true"></i></button>
                  <button type="button" class="btn btn-default" id="campo_eliminar" type="button"><span class="glyphicon glyphicon-trash" style="color:red;"></span></button>
                </div>

                <br><br>

                <div class="table-responsive">   

                  <input type="hidden" id="tabla_id" value="0">       
                  <input type="hidden" id="campo_id" value="0">       

                  <table class="table table-striped table-bordered table-hover table-condensed">
                    <tbody>
                      <tr>
                        <th style="width:130px;">Etiqueta</th>
                        <td style="width:240px;"><input name="etiqueta" id="campo_etiqueta" class="form-control actDato" type="text" value=""></td>
                        <td></td>
                      </tr>
                      <tr>
                        <th>Nombre</th>
                        <td><input name="nombre" id="campo_nombre" class="form-control actDato" type="text" value=""></td>
                        <td></td>
                      </tr>
                      <tr>
                        <th>Tamaño</th>
                        <td><input name="tamano" id="campo_tamano" class="form-control actDato" type="text" value=""></td>
                        <td></td>
                      </tr>
                      <tr>
                        <th>Valor Predeterminado</th>
                        <td><input name="valor_predeterminado" id="campo_valor_predeterminado" class="form-control actDato" type="text" value=""></td>
                        <td></td>
                      </tr>
                      <tr>
                        <th>Tipo Entrada</th>
                        <td>
                          <select name="tipo_entrada" id="campo_tipo_entrada" class="form-control actDato">
                          <?php
                          foreach ($datos_tipos_campos as $key => $value) {
                            echo '<option value="'.$value['id'].'">'.$value['nombre'].'</option>';
                          }
                          ?>
                          </select>
                        </td>
                        <td></td>
                      </tr>
                      <tr>
                        <th>Tipo Campo Parametro</th>
                        <td><input name="tipo_campo_parametro" id="campo_tipo_campo_parametro" class="form-control actDato" type="text" value=""></td>
                        <td></td>
                      </tr>
                      <tr>
                        <th>Autonumerico</th>
                        <td>
                          <select name="autonumerico" id="campo_autonumerico" class="form-control actDato">
                          <?php
                          foreach ($datos_si_no as $key => $value) {
                            echo '<option value="'.$value['id'].'">'.$value['nombre'].'</option>';
                          }
                          ?>
                          </select>
                        </td>
                        <td></td>
                      </tr>
                      <tr>
                        <th>Comentarios</th>
                        <td>
                          <textarea name="comentarios" id="campo_comentarios" class="form-control actDato"></textarea>
                        </td>
                        <td></td>
                      </tr>
                    </tbody>
                  </table>
                </div> <!-- table-responsive -->
              </div> <!-- tab -->
              <div id="pc_validaciones" class="tab-pane fade">
                <div class="table-responsive">          
                  <table class="table table-striped table-bordered table-hover table-condensed validaciones">
                    <thead>
                      <tr>
                        <th style="width:10px;"></th>
                        <th style="width:240px;">Validacion</th>
                        <th style="width:240px;">Parametro</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    <tfoot>
                      <tr>
                        <td colspan="4">
                          <div class="btn-group" role="group">
                            <button type="button" class="btn btn-default" id="validacion_nuevo" type="button"><i class="fa fa-plus" aria-hidden="true" style="color: #5cb85c;"></i></button>
                            <button type="button" class="btn btn-default" id="validacion_asistente" type="button"><i class="fa fa-magic" aria-hidden="true" style="color: #3879b7;"></i></button>
                          </div>
                        </td>
                      </tr>
                    </tfoot>
                  </table>
                </div> <!-- table-responsive -->
              </div> <!-- tab -->
              <div id="pc_indices" class="tab-pane fade">
                <div class="table-responsive">          
                  <table class="table table-striped table-bordered table-hover table-condensed">
                    <tbody>
                      <tr>
                        <th style="width:130px;">Llave Primaria</th>
                        <td style="width:240px;">
                          <select name="llave_primaria" id="campo_llave_primaria" class="form-control actDato">
                          <?php
                          foreach ($datos_si_no as $key => $value) {
                            echo '<option value="'.$value['id'].'">'.$value['nombre'].'</option>';
                          }
                          ?>
                          </select>
                        </td>
                        <td></td>
                      </tr>
                      <tr>
                        <th>Indice</th>
                        <td>
                          <select name="indice" id="campo_indice" class="form-control actDato">
                          <?php
                          foreach ($datos_si_no as $key => $value) {
                            echo '<option value="'.$value['id'].'">'.$value['nombre'].'</option>';
                          }
                          ?>
                          </select>
                        </td>
                        <td></td>
                      </tr>
                      <tr>
                        <th>Unico</th>
                        <td>
                          <select name="unico" id="campo_unico" class="form-control actDato">
                          <?php
                          foreach ($datos_si_no as $key => $value) {
                            echo '<option value="'.$value['id'].'">'.$value['nombre'].'</option>';
                          }
                          ?>
                          </select>
                        </td>
                        <td></td>
                      </tr>
                    </tbody>
                  </table>
                </div> <!-- table-responsive -->
              </div> <!-- tab -->
              <div id="pc_archivo" class="tab-pane fade">

                <div class="table-responsive">          
                  <table class="table table-striped table-bordered table-hover table-condensed">
                    <tbody>
                      <tr>
                        <th style="width:130px;">Archivo</th>
                        <td style="width:240px;">
                          <select name="archivo" id="campo_archivo" class="form-control actDato">
                          <?php
                          foreach ($datos_si_no as $key => $value) {
                            echo '<option value="'.$value['id'].'">'.$value['nombre'].'</option>';
                          }
                          ?>
                          </select>
                        </td>
                        <td></td>
                      </tr>
                      <tr>
                        <th>Archivo Ruta</th>
                        <td><input name="archivo_ruta" id="campo_archivo_ruta" class="form-control actDato" type="text" value="" placeholder="./imagenes/productos/"></td>
                        <td></td>
                      </tr>
                    </tbody>
                  </table>
                </div> <!-- table-responsive -->
              </div> <!-- tab -->
              <div id="pc_relacion_1_n" class="tab-pane fade">

                <div class="table-responsive">          
                  <table class="table table-striped table-bordered table-hover table-condensed">
                    <tbody>
                      <tr>
                        <th style="width:130px;">Datos</th>
                        <td style="width:240px;">
                          <select name="relacion_datos" id="campo_relacion_datos" class="form-control actDato">
                            <option value=""></option>
<?php
foreach ($datos as $registro) {
?>
                            <option value="<?=$registro['id'];?>"><?=$registro['nombre'];?></option>
<?php
}
?>
                          </select>
                        </td>
                        <td></td>
                      </tr>
                      <tr>
                        <th>Tabla</th>
                        <td>
                          <select name="relacion_tabla" id="campo_relacion_tabla" class="form-control actDato">
                            <option value=""></option>
<?php
foreach ($tablas as $registro) {
?>
                            <option value="<?=$registro['id'];?>"><?=$registro['nombre'];?></option>
<?php
}
?>
                          </select>
                        </td>
                        <td></td>
                      </tr>                     
                      <tr>
                        <th>Campo</th>
                        <td>
                          <select name="relacion_campo" id="campo_relacion_campo" class="form-control actDato">
                            <option value=""></option>
<?php
foreach ($tablas as $registroTab) {
?>
                            <optgroup label="<?=$registroTab['nombre'];?>">
<?php
  foreach ($campos as $registroCam) {
    if ($registroTab['id'] == $registroCam['tabla']) {
?>
                              <option value="<?=$registroCam['id']?>"><?=$registroCam['nombre']?></option>
<?php
    }
  }
?>
                            </optgroup>
<?php
}
?>
                          </select>
                        </td>
                        <td></td>
                      </tr>

                      <tr>
                        <th>Nombre</th>
                        <td>
                          <select name="relacion_nombre" id="campo_relacion_nombre" class="form-control actDato">
                            <option value=""></option>
<?php
foreach ($tablas as $registroTab) {
?>
                            <optgroup label="<?=$registroTab['nombre'];?>">
<?php
  foreach ($campos as $registroCam) {
    if ($registroTab['id'] == $registroCam['tabla']) {
?>
                              <option value="<?=$registroCam['id']?>"><?=$registroCam['nombre']?></option>
<?php
    }
  }
?>
                            </optgroup>
<?php
}
?>
                          </select>
                        </td>
                        <td></td>
                      </tr>


                      <tr>
                        <th>Condicion</th>
                        <td><input name="relacion_condicion" id="campo_relacion_condicion" class="form-control actDato" type="text" value="" placeholder="Usar comillas sencillas"></td>
                        <td></td>
                      </tr>
                      <tr>
                        <th>Orden</th>
                        <td><input name="relacion_orden" id="campo_relacion_orden" class="form-control actDato" type="text" value=""></td>
                        <td></td>
                      </tr>
                    </tbody>
                  </table>
                </div> <!-- table-responsive -->
              </div> <!-- tab -->
              <div id="pc_relacion_n_m" class="tab-pane fade">
                <div class="table-responsive">          
                  <table class="table table-striped table-bordered table-hover table-condensed">
                    <tbody>
                      <tr>
                        <th style="width:130px;">Etiqueta NM</th>
                        <td style="width:240px;"><input name="relacion_etiqueta_nm" id="campo_relacion_etiqueta_nm" class="form-control actDato" type="text" value=""></td>
                        <td></td>
                      </tr>

                      <tr>
                        <th>Tabla N</th>
                        <td>
                          <select name="relacion_tabla_n" id="campo_relacion_tabla_n" class="form-control actDato">
                            <option value=""></option>
<?php
foreach ($tablas as $registro) {
?>
                            <option value="<?=$registro['id'];?>"><?=$registro['nombre'];?></option>
<?php
}
?>
                          </select>
                        </td>
                        <td></td>
                      </tr> 

                      <tr>
                        <th>Campo N</th>
                        <td>
                          <select name="relacion_campo_n" id="campo_relacion_campo_n" class="form-control actDato">
                            <option value=""></option>
<?php
foreach ($tablas as $registroTab) {
?>
                            <optgroup label="<?=$registroTab['nombre'];?>">
<?php
  foreach ($campos as $registroCam) {
    if ($registroTab['id'] == $registroCam['tabla']) {
?>
                              <option value="<?=$registroCam['id']?>"><?=$registroCam['nombre']?></option>
<?php
    }
  }
?>
                            </optgroup>
<?php
}
?>
                          </select>
                        </td>
                        <td></td>
                      </tr>

                      <tr>
                        <th>Tabla M</th>
                        <td>
                          <select name="relacion_tabla_m" id="campo_relacion_tabla_m" class="form-control actDato">
                            <option value=""></option>
<?php
foreach ($tablas as $registro) {
?>
                            <option value="<?=$registro['id'];?>"><?=$registro['nombre'];?></option>
<?php
}
?>
                          </select>
                        </td>
                        <td></td>
                      </tr> 


                      <tr>
                        <th>Campo M Tabla A</th>
                        <td>
                          <select name="relacion_campo_m_tabla_a" id="campo_relacion_campo_m_tabla_a" class="form-control actDato">
                            <option value=""></option>
<?php
foreach ($tablas as $registroTab) {
?>
                            <optgroup label="<?=$registroTab['nombre'];?>">
<?php
  foreach ($campos as $registroCam) {
    if ($registroTab['id'] == $registroCam['tabla']) {
?>
                              <option value="<?=$registroCam['id']?>"><?=$registroCam['nombre']?></option>
<?php
    }
  }
?>
                            </optgroup>
<?php
}
?>
                          </select>
                        </td>
                        <td></td>
                      </tr>

                      <tr>
                        <th>Campo M Tabla B</th>
                        <td>
                          <select name="relacion_campo_m_tabla_b" id="campo_relacion_campo_m_tabla_b" class="form-control actDato">
                            <option value=""></option>
<?php
foreach ($tablas as $registroTab) {
?>
                            <optgroup label="<?=$registroTab['nombre'];?>">
<?php
  foreach ($campos as $registroCam) {
    if ($registroTab['id'] == $registroCam['tabla']) {
?>
                              <option value="<?=$registroCam['id']?>"><?=$registroCam['nombre']?></option>
<?php
    }
  }
?>
                            </optgroup>
<?php
}
?>
                          </select>
                        </td>
                        <td></td>
                      </tr>

                      <tr>
                        <th>Campo M Prioridad</th>
                        <td>
                          <select name="relacion_campo_m_prioridad" id="campo_relacion_campo_m_prioridad" class="form-control actDato">
                            <option value=""></option>
<?php
foreach ($tablas as $registroTab) {
?>
                            <optgroup label="<?=$registroTab['nombre'];?>">
<?php
  foreach ($campos as $registroCam) {
    if ($registroTab['id'] == $registroCam['tabla']) {
?>
                              <option value="<?=$registroCam['id']?>"><?=$registroCam['nombre']?></option>
<?php
    }
  }
?>
                            </optgroup>
<?php
}
?>
                          </select>
                        </td>
                        <td></td>
                      </tr>

                      <tr>
                        <th>Condicion NM</th>
                        <td><input name="relacion_campo_nm_condicion" id="campo_relacion_campo_nm_condicion" class="form-control actDato" type="text" value=""></td>
                        <td></td>
                      </tr>
                    </tbody>
                  </table>
                </div> <!-- table-responsive -->
              </div> <!-- tab -->
            </div> <!-- tab-content -->

          </div> <!-- panel-body -->
        </div> <!-- panel -->
      </div> <!-- col-sm-8 -->
    </div> <!-- row -->


        </div>
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



<!-- ---- Modales ---------------------------------------------------------- -->

<!-- Modal -->
<div class="modal fade" id="modal_tabla_propiedades" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title">Propiedades de la Tabla</h4>
      </div>
      <div class="modal-body">
        <p>Aqui deben estar las utilidades de esta ventana</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal_tabla_asistente" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title">Asistente de Creación de Tablas</h4>
      </div>
      <div class="modal-body">
        <p>Aqui deben estar las utilidades de esta ventana</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal_campo_asistente" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title">Asistente de Creación de Campos</h4>
      </div>
      <div class="modal-body">
        <p>Aqui deben estar las utilidades de esta ventana</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal_campo_eliminar" role="dialog">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title">Esta seguro de eliminar este campo?</h4>
      </div>
      <div class="modal-body">
        <p>Aqui deben estar las utilidades de esta ventana</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal_validacion_eliminar" role="dialog">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title">Esta seguro de eliminar esta validación?</h4>
      </div>
      <div class="modal-body">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal" id="validacion_eliminar" cod="0">Eliminar</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal_validacion_asistente" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title">Asistente de Creación de Validaciones</h4>
      </div>
      <div class="modal-body">
        <p>Aqui deben estar las utilidades de esta ventana</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
  var validaciones = '';
<?php foreach ($datos_validaciones as $key => $value) { ?>
  validaciones += '<option value="<?php echo $value['id'] ?>"><?php echo $value['nombre'] ?></option>';
<?php } ?>
</script>
  