<?php
$menuEnlaces = array();
$i = 0;
foreach ($menus_enlaces as $regMenu) {

  $menuEnlaces[$i]['id'] = $regMenu['id'];
  $menuEnlaces[$i]['codigo'] = $regMenu['codigo'];
  $menuEnlaces[$i]['nombre'] = $regMenu['nombre'];
  $menuEnlaces[$i]['enlace'] = $regMenu['enlace'];
  $menuEnlaces[$i]['depende_de'] = $regMenu['depende_de'];
  $menuEnlaces[$i]['orden'] = $regMenu['orden'];

  $i++;
}

function depende_de($enlaces, $depende_de, $nivel) {

  $flechas = '';
  for ($i=0; $i <= $nivel; $i++) { 
    $flechas .= '> ';
  }

  foreach ($enlaces as $key => $regEnlaces) {
    if ($regEnlaces['depende_de'] == $depende_de) {
      echo '<option value="' . $regEnlaces['codigo'] . '">' . $flechas . $regEnlaces['nombre'] . '</option>';
      depende_de($enlaces, $regEnlaces['codigo'], $nivel+1);
    }
  }

}

// function lista($enlaces, $depende_de, $nivel) {
//   $flechas = '';
//   for ($i=0; $i <= $nivel; $i++) { 
//     $flechas .= '> ';
//   }
//   foreach ($enlaces as $key => $regEnlaces) {
//     if ($regEnlaces['depende_de'] == $depende_de) {
//       echo $flechas . $regEnlaces['nombre'] . '
// ';
//       lista($enlaces, $regEnlaces['codigo'], $nivel+1);
//     }
//   }
// }

function lista2($enlaces, $depende_de, $nivel) {
  $flechas = '';
  for ($i=0; $i < $nivel; $i++) { 
    $flechas .= '    ';
  }
  echo $flechas . '<ul class="no_bullets">' . "\n";
  foreach ($enlaces as $key => $regEnlaces) {
    if ($regEnlaces['depende_de'] == $depende_de) {
      echo $flechas . '<li>';
      echo '<a href="'.base_url().'admin/cruds/assistants/versiones_generar_menus_borrar/' . $regEnlaces['id'] . '" class="btn btn-danger btn-xs" onclick="return confirm(\'Clic OK para continuar?\')"><span class="glyphicon glyphicon-trash"></span></a>&nbsp;';
      echo '<button class="btn btn-primary btn-xs editar" enlace_id="' . $regEnlaces['id'] . '" nombre="' . $regEnlaces['nombre'] . '" enlace="' . $regEnlaces['enlace'] . '" depende_de="' . $regEnlaces['depende_de'] . '" orden="' . $regEnlaces['orden'] . '"><span class="glyphicon glyphicon-pencil"></span></button>';
      echo '<span class="rojo"> (' . $regEnlaces['orden'] . ')</span> ' . $regEnlaces['nombre'] . "\n";
      if (trim($regEnlaces['enlace']) != '') echo $flechas . "<br>" . "<span class='azul'>" . $regEnlaces['enlace'] . "</span>" . "\n";
      lista2($enlaces, $regEnlaces['codigo'], $nivel+1);
      echo $flechas . '</li>' . "\n";
    }
  }
  echo $flechas . '</ul>' . "\n";
}


function lista3($enlaces, $depende_de, $nivel) {
  $flechas = '';
  for ($i=0; $i < $nivel; $i++) { 
    $flechas .= '    ';
  }
  echo $flechas . '<ul>' . "\n";
  foreach ($enlaces as $key => $regEnlaces) {
    if ($regEnlaces['depende_de'] == $depende_de) {
      echo $flechas . '<li>';

      if (trim($regEnlaces['enlace']) != '') {
        echo '<a href="'.$regEnlaces['enlace'].'">' . $regEnlaces['nombre'] . '</a>' . "\n"; 
      } else {
        echo $regEnlaces['nombre'] . "\n";
      }

      lista3($enlaces, $regEnlaces['codigo'], $nivel+1);
      echo $flechas . '</li>' . "\n";
    }
  }
  echo $flechas . '</ul>' . "\n";
}

?>

<style type="text/css">
  .azul {color: #337ab7;}
  .rojo {color: red;}
  .no_bullets {list-style: none;}
</style>

  <div class="row">
    <div class="col-sm-4">


      <?php echo form_open(base_url() . 'admin/cruds/assistants/versiones_generar_menus_crear_menu', array()); ?>
      <div class="panel panel-primary">
        <div class="panel-heading" style="display:block;height: 54px;">
          <div style="float:left;font-weight:bold;font-size: 18px;">Crear Menu</div>
          <div style="float:right;">
            <button class="btn btn-success" type="submit">Guardar</button>
          </div>
        </div>
        <div class="panel-body">

          <div class="form-group">
            <input type="text" class="form-control" id="nombre" placeholder="Ingresa el nombre" name="nombre">
          </div>

        </div>
      </div>
      </form>


<?php
if ($menu_seleccionado > 0) {
?>
      <?php echo form_open(base_url() . 'admin/cruds/assistants/versiones_generar_menus_guardar_menu', array()); ?>
      <input type="hidden" id="ce_enlace_id" name="enlace_id" value="0">
      <div class="panel panel-primary">

        <div class="panel-heading" style="display:block;height: 54px;">
          <div style="float:left;font-weight:bold;font-size: 18px;">Crear/Editar Enlace</div>
          <div style="float:right;">
            <button class="btn btn-success" type="submit">Guardar</button>
          </div>
        </div>

        <div class="panel-body">
          <div class="form-group">
            <input type="text" class="form-control" id="ce_nombre" placeholder="Ingresa el nombre" name="nombre">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="ce_enlace" placeholder="Ingrese el enlace" name="enlace">
          </div>
          <div class="form-group">
            <select class="form-control" id="ce_depende_de" name="depende_de">
              <option value="">Depende de...</option>
<?php
depende_de($menuEnlaces, '', 0);
?>              
            </select>
          </div>

          <div class="form-group">
            <input type="text" class="form-control" id="ce_orden" placeholder="Ingrese el orden" name="orden">
          </div>

        </div>
      </div>
      </form>
<?php
}
?>

<?php
if ($menu_seleccionado > 0) {
?>
      <?php echo form_open(base_url() . 'admin/cruds/assistants/versiones_generar_menus_copiar_menu', array()); ?>
      <div class="panel panel-primary">
        <div class="panel-heading" style="display:block;height: 54px;">
          <div style="float:left;font-weight:bold;font-size: 18px;">Copiar Menu</div>
          <div style="float:right;">
            <button class="btn btn-success" type="submit">Copiar</button>
          </div>
        </div>
        <div class="panel-body">

          <div class="form-group">
            <select class="form-control" id="copiar_proyecto" name="copiar_proyecto">
              <option value="0">Selecciona el Proyecto</option>
                <?php
                foreach ($proyectos as $registro) {
                ?>
                  <option value="<?=$registro['id'];?>"><?=$registro['nombre'];?></option>
                <?php
                }
                ?>              
            </select>
          </div>

          <div class="form-group">
            <select class="form-control" id="copiar_version" name="copiar_version">
              <option value="0">Selecciona la Versión</option>
            </select>
          </div>

          <div class="form-group">
            <select class="form-control" id="copiar_menu" name="copiar_menu">
              <option value="0">Selecciona el Menú</option>
            </select>
          </div>

        </div>
      </div>
      </form>
<?php
}
?>

    </div>


    <div class="col-sm-8">

      <div class="panel panel-primary">
        <div class="panel-heading"><b>Enlaces</b></div>
        <div class="panel-body">


          <?php echo form_open(base_url() . 'admin/cruds/assistants/versiones_generar_menus_seleccionar_menu', array()); ?>
          <div class="input-group">
            <select class="form-control" id="menu" name="menu">
              <option value="0">Selecciona el menú</option>
              <?php
              foreach ($menus as $regMenu) {
                $seleccionado = '';
                if ($menu_seleccionado == $regMenu['id']) $seleccionado = " selected='selected'";
                echo "<option value='".$regMenu['id']."'".$seleccionado.">".$regMenu['nombre']."</option>";
              }
              ?>
            </select>
            <div class="input-group-btn">
              <button class="btn btn-success" type="submit">Seleccionar</button>
            </div>
          </div>
          </form>
          <br>


          <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#registros">Registros</a></li>
            <li><a data-toggle="tab" href="#html">HTML</a></li>
          </ul>
          <br>

          <div class="tab-content">
            <div id="registros" class="tab-pane fade in active">
<?php
lista2($menuEnlaces, '', 0);
?> 
            </div>
            <div id="html" class="tab-pane fade">
<textarea class="form-control" rows="20">
<?php
lista3($menuEnlaces, '', 0);
?>   
</textarea>
            </div>
          </div>

          
        </div>

        </div>
      </div>

    </div>

<!-- 	</div> -->

<script type="text/javascript">
  $(function () {

    $(".editar").click(function () {

      var enlace_id = $(this).attr("enlace_id");
      var nombre = $(this).attr("nombre");
      var enlace = $(this).attr("enlace");
      var depende_de = $(this).attr("depende_de");
      var orden = $(this).attr("orden");

      $("#ce_enlace_id").val(enlace_id);
      $("#ce_nombre").val(nombre);
      $("#ce_enlace").val(enlace);
      $("#ce_depende_de").val(depende_de);
      $("#ce_orden").val(orden);

    });

    $("#copiar_proyecto").change(function () {
      var proyecto = $("#copiar_proyecto").val();
      $("#copiar_version").html('<option>Cargando...</option>');
      $("#copiar_menu").html('<option value="0">Selecciona el Menú</option>');
      $.ajax({
        url: "<?php echo base_url(); ?>admin/cruds/assistants/traer_version",
        cache: false,
        dataType: "json",
        type: "post",
        data: {"proyecto":proyecto},
        success:function(datos) {
          var versiones = '<option value="0">Selecciona la Versión</option>';
          for(var i in datos.versions) {
              versiones += '<option value="'+datos.versions[i].id+'">'+datos.versions[i].nombre+'</option>';
          }
          $("#copiar_version").html(versiones);
        }
      }); 
    });

    $("#copiar_version").change(function () {
      var version = $("#copiar_version").val();
      $("#copiar_menu").html('<option>Cargando...</option>');
      $.ajax({
        url: "<?php echo base_url(); ?>admin/cruds/assistants/traer_menu",
        cache: false,
        dataType: "json",
        type: "post",
        data: {"version":version},
        success:function(datos) {
          var menus = '<option value="0">Selecciona el Menú</option>';
          for(var i in datos.menus) {
            if (datos.menus[i].id != <?php echo $menu_seleccionado; ?>) {
              menus += '<option value="'+datos.menus[i].id+'">'+datos.menus[i].nombre+'</option>';
            }
          }
          $("#copiar_menu").html(menus);
        }
      }); 
    });

  });
</script>
