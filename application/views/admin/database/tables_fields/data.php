  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tables & Fields
        <small>Project: <?php echo $projectVersionTitle; ?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Tables & Fields</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="box">
        <div class="box-header with-border">

        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs">
            <li class="<?php echo $tab_project; ?>"><a href="<?php echo base_url() . $this->config->item('adminPath'); ?>/database/tables_fields">Project</a></li>
            <li class="<?php echo $tab_sql; ?>"><a href="<?php echo base_url() . $this->config->item('adminPath'); ?>/database/tables_fields/sql">SQL</a></li>
            <li class="<?php echo $tab_data; ?>"><a href="<?php echo base_url() . $this->config->item('adminPath'); ?>/database/tables_fields/data">Data</a></li>
          </ul>
          <div class="tab-content">

            <div class="tab-pane <?php echo $tab_project; ?>" id="tab_1-1">

            </div>

            <div class="tab-pane <?php echo $tab_sql; ?>" id="tab_1-2">

            </div>

            <div class="tab-pane <?php echo $tab_data; ?>" id="tab_1-3">


<?php if ($projectVersionTitle != 'None') { ?>
              <div class="table-responsive">
                <table id="lista" class="table table-striped table-bordered table-hover table-condensed">
                    <thead>
                        <tr>

                            <th>ID</th>
                            <th>Tabla</th>
                            <th>Etiqueta</th>
                            <th>Campo</th>
                            <th>Orden</th>
                            <th>Autonumerico</th>
                            <th>Llave Primaria</th>
                            <th>Unico</th>
                            <th>Indice</th>
                            <th>Sin Signo</th>
                            <th>No Nulo</th>
                            <th>Defecto</th>
                            <th>Defecto Valor</th>
                            <th>Comentario</th>
                            <th>Comentario Valor</th>
                            <th>Campo Tipo</th>
                            <th>Campo Tamaño</th>
                            <th>Tipo Campo</th>
                            <th>Tipo Entrada</th>
                            <th>Tipo Entrada Parametro</th>
                            <th>Archivo</th>
                            <th>Archivo Ruta</th>
                            <th>Relación Datos</th>
                            <th>Relación Tabla</th>
                            <th>Relación Campo</th>
                            <th>Relación Nombre</th>
                            <th>Relación Condicion</th>
                            <th>Relación Orden</th>
                            <th>Relación Etiqueta nm</th>
                            <th>Relación Tabla n</th>
                            <th>Relación Campo n</th>
                            <th>Relación Tabla m</th>
                            <th>Relación Campo m Tabla a</th>
                            <th>Relación Campo m Tabla b</th>
                            <th>Relación Campo m Prioridad</th>
                            <th>Relación Campo nm Condicion</th>

                        </tr>
                    </thead>
                    <tbody>
<?php

if (count($fields)) {
    foreach ($fields as $key => $row) {
?>
                        <tr>
                            <td><?php echo $row["id"]; ?></td>
                            <td><?php echo $row["tabla"]; ?></td>
                            <td><?php echo $row["etiqueta"]; ?></td>
                            <td><?php echo $row["nombre"]; ?></td>
                            <td><?php echo $row["orden"]; ?></td>
                            <td><?php echo $row["autonumerico"]; ?></td>
                            <td><?php echo $row["llave_primaria"]; ?></td>
                            <td><?php echo $row["unico"]; ?></td>
                            <td><?php echo $row["indice"]; ?></td>
                            <td><?php echo $row["sin_signo"]; ?></td>
                            <td><?php echo $row["no_nulo"]; ?></td>
                            <td><?php echo $row["defecto"]; ?></td>
                            <td><?php echo $row["defecto_valor"]; ?></td>
                            <td><?php echo $row["comentario"]; ?></td>
                            <td><?php echo $row["comentario_valor"]; ?></td>
                            <td><?php echo $row["tipo_dato"]; ?></td>
                            <td><?php echo $row["tamano"]; ?></td>
                            <td><?php echo $row["tipo_campo"]; ?></td>
                            <td><?php echo $row["tipo_entrada"]; ?></td>
                            <td><?php echo $row["tipo_entrada_parametro"]; ?></td>
                            <td><?php echo $row["archivo"]; ?></td>
                            <td><?php echo $row["archivo_ruta"]; ?></td>
                            <td><?php echo $row["relacion_datos"]; ?></td>
                            <td><?php echo $row["relacion_tabla"]; ?></td>
                            <td><?php echo $row["relacion_campo"]; ?></td>
                            <td><?php echo $row["relacion_nombre"]; ?></td>
                            <td><?php echo $row["relacion_condicion"]; ?></td>
                            <td><?php echo $row["relacion_orden"]; ?></td>
                            <td><?php echo $row["relacion_etiqueta_nm"]; ?></td>
                            <td><?php echo $row["relacion_tabla_n"]; ?></td>
                            <td><?php echo $row["relacion_campo_n"]; ?></td>
                            <td><?php echo $row["relacion_tabla_m"]; ?></td>
                            <td><?php echo $row["relacion_campo_m_tabla_a"]; ?></td>
                            <td><?php echo $row["relacion_campo_m_tabla_b"]; ?></td>
                            <td><?php echo $row["relacion_campo_m_prioridad"]; ?></td>
                            <td><?php echo $row["relacion_campo_nm_condicion"]; ?></td>
                        </tr>
<?php
    }
}
?>
                    </tbody>
                    <tfoot>
                        <tr>

                            <th>ID</th>
                            <th>Tabla</th>
                            <th>Etiqueta</th>
                            <th>Campo</th>
                            <th>Orden</th>
                            <th>Autonumerico</th>
                            <th>Llave Primaria</th>
                            <th>Unico</th>
                            <th>Indice</th>
                            <th>Sin Signo</th>
                            <th>No Nulo</th>
                            <th>Defecto</th>
                            <th>Defecto Valor</th>
                            <th>Comentario</th>
                            <th>Comentario Valor</th>
                            <th>Campo Tipo</th>
                            <th>Campo Tamaño</th>       
                            <th>Tipo Campo</th>
                            <th>Tipo Entrada</th>
                            <th>Tipo Entrada Parametro</th>
                            <th>Archivo</th>
                            <th>Archivo Ruta</th>
                            <th>Relación Datos</th>
                            <th>Relación Tabla</th>
                            <th>Relación Campo</th>
                            <th>Relación Nombre</th>
                            <th>Relación Condicion</th>
                            <th>Relación Orden</th>
                            <th>Relación Etiqueta nm</th>
                            <th>Relación Tabla n</th>
                            <th>Relación Campo n</th>
                            <th>Relación Tabla m</th>
                            <th>Relación Campo m Tabla a</th>
                            <th>Relación Campo m Tabla b</th>
                            <th>Relación Campo m Prioridad</th>
                            <th>Relación Campo nm Condicion</th>

                        </tr>
                    </tfoot>
                </table>
              </div>
<?php } ?>
            </div>
          </div>
        </div>

      </div>
    </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->