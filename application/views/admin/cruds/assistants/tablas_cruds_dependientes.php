<?php
$matCruds = array();
$i = 0;

// echo "<br><br><br><pre>";
// print_r($cruds_dependientes_detalles);
// echo "</pre>";

foreach ($cruds_dependientes_detalles as $regCrud) {
	$matCruds[$i]['id'] = $regCrud['id'];
	$matCruds[$i]['codigo'] = $regCrud['codigo'];
	$matCruds[$i]['depende_de'] = $regCrud['depende_de'];

	$matCruds[$i]['tabla'] = $regCrud['tabla'];
	$matCruds[$i]['etiqueta'] = $regCrud['etiqueta'];
	$matCruds[$i]['campo_relacion'] = $regCrud['campo_relacion'];

	$matCruds[$i]['depende_de_tabla_nombre'] = $regCrud['depende_de_tabla_nombre'];
	$matCruds[$i]['depende_de_campo_relacion'] = $regCrud['depende_de_campo_relacion'];
	$matCruds[$i]['depende_de_campo_nombre'] = $regCrud['depende_de_campo_nombre'];
	$matCruds[$i]['depende_de_campo_num_registros'] = $regCrud['depende_de_campo_num_registros'];
	$i++;
}

function depende_de($cruds, $depende_de, $nivel) {

  $flechas = '';
  for ($i=0; $i <= $nivel; $i++) { 
    $flechas .= '> ';
  }

  foreach ($cruds as $key => $regCruds) {
    if ($regCruds['depende_de'] == $depende_de) {
      echo '<option value="' . $regCruds['codigo'] . '">' . $flechas . $regCruds['tabla'] . ' ('. $regCruds['etiqueta'] .')</option>';
      depende_de($cruds, $regCruds['codigo'], $nivel+1);
    }
  }

}

function lista2($cruds, $depende_de, $nivel) {
  $flechas = '';
  for ($i=0; $i < $nivel; $i++) { 
    $flechas .= '    ';
  }
  echo $flechas . '<ul class="no_bullets">' . "\n";
  foreach ($cruds as $key => $regCruds) {
    if ($regCruds['depende_de'] == $depende_de) {
      echo $flechas . '<li>';
      echo '<a href="'.base_url().'admin/cruds/assistants/tablas_cruds_dependientes_borrar/' . $regCruds['id'] . '" class="btn btn-danger btn-xs" onclick="return confirm(\'Clic OK para continuar?\')"><span class="glyphicon glyphicon-trash"></span></a>&nbsp;';
      echo ' ' . $regCruds['tabla'] . ' (' . $regCruds['etiqueta'] . ')' . "\n";
      lista2($cruds, $regCruds['codigo'], $nivel+1);
      echo $flechas . '</li>' . "\n";
    }
  }
  echo $flechas . '</ul>' . "\n";
}


function lista3($cruds, $depende_de, $nivel) {
  $flechas = '';
  for ($i=0; $i < $nivel; $i++) { 
    $flechas .= '    ';
  }
  echo $flechas . '<ul>' . "\n";
  foreach ($cruds as $key => $regCruds) {
    if ($regCruds['depende_de'] == $depende_de) {
      echo $flechas . '<li>';
      echo $regCruds['tabla'] . ' (' . $regCruds['etiqueta'] . ')' . "\n";
      lista3($cruds, $regCruds['codigo'], $nivel+1);
      echo $flechas . '</li>' . "\n";
    }
  }
  echo $flechas . '</ul>' . "\n";
}

function nav1($cruds, $depende_de, $nivel, $texto) {
  foreach ($cruds as $key => $regCruds) {
    if ($regCruds['depende_de'] == $depende_de) {
      echo '<li><a data-toggle="tab" href="#' . $texto . '-' . $regCruds['id'] . '">';
      echo $regCruds['tabla'] . ' (' . $regCruds['etiqueta'] . ')';
      echo '</a></li>';
      nav1($cruds, $regCruds['codigo'], $nivel+1, $texto);
    }
  }
}

function tab_pane1($cruds, $depende_de, $nivel, $texto, $formulario_origen) {
  foreach ($cruds as $key => $regCruds) {

    if ($nivel == 0 and $formulario_origen == '') {
      $formulario_origen = $regCruds['tabla'];
    }

    if ($regCruds['depende_de'] == $depende_de) {
      echo '<div id="' . $texto . '-' . $regCruds['id'] . '" class="tab-pane fade">';

      echo '<h2>'.$regCruds['tabla'] . ' (' . $regCruds['etiqueta'] . ')'.'</h2>';

      if ($texto == 'Controlador') {
        if ($nivel > 0) {
// - Controlador - <<tabla>>_list - Inicio -------------------------------------------------------------------------        
          echo '<br><br><hr><div class="lead text-right">'.ucfirst($regCruds['tabla']) . '_list.php</div>';

// Kilo-ini

          $str = <<<'KIL'
public $path_rel;
KIL;
          echo '<span class="circle">1</span>';
          echo '<pre><code class="language-php">' . htmlentities($str) . '</code></pre>';

          $str = <<<'KIL'
public $rel_((depende_de_tabla_nombre));
public $rel_((depende_de_tabla_nombre))_nombre;
KIL;
          $str = str_replace("((depende_de_tabla_nombre))", $regCruds['depende_de_tabla_nombre'], $str);
          echo '<span class="circle-blue">2</span>';
          echo '<pre><code class="language-php">' . htmlentities($str) . '</code></pre>';

          $str = <<<'KIL'
$this->path = 'admin/cruds/((tabla))_list';
$this->path_rel = 'admin/cruds/((tabla))';
KIL;
          $str = str_replace("((tabla))", $regCruds['tabla'], $str);
          echo '<span class="circle">3</span>';
          echo '<pre><code class="language-php">' . htmlentities($str) . '</code></pre>';

          $str = <<<'KIL'
function _remap($param) {
    $this->index($param);
}
KIL;
          echo '<span class="circle">4</span>';
          echo '<pre><code class="language-php">' . htmlentities($str) . '</code></pre>';

          $str = <<<'KIL'
public function index($rel_((depende_de_tabla_nombre))) {
KIL;
          $str = str_replace("((depende_de_tabla_nombre))", $regCruds['depende_de_tabla_nombre'], $str);
          echo '<span class="circle">5</span>';
          echo '<pre><code class="language-php">' . htmlentities($str) . '</code></pre>';


          $str = <<<'KIL'
$this->rel_((depende_de_tabla_nombre)) = $rel_((depende_de_tabla_nombre)); // $row_rel_((tabla))->((campo_relacion));
$this->parameters['data']['rel_((depende_de_tabla_nombre))'] = $this->rel_((depende_de_tabla_nombre));
$row_rel_((depende_de_tabla_nombre)) = $this->Model->getRow('((depende_de_tabla_nombre))', $this->rel_((depende_de_tabla_nombre)));
$this->rel_((depende_de_tabla_nombre))_nombre = $row_rel_((depende_de_tabla_nombre))->nombre;
KIL;
          $str = str_replace("((depende_de_tabla_nombre))", $regCruds['depende_de_tabla_nombre'], $str);
          $str = str_replace("((tabla))", $regCruds['tabla'], $str);
          $str = str_replace("((campo_relacion))", $regCruds['campo_relacion'], $str);
          echo '<span class="circle-blue">6</span>';
          echo '<pre><code class="language-php">' . htmlentities($str) . '</code></pre>';

          $str = <<<'KIL'
$this->parameters['path_rel'] = $this->path_rel;
$this->parameters['path_rel_view'] = 'list';
$this->load->library('breadcrumb');
$this->parameters['breadcrumb'] = $this->breadcrumb->((tabla))();
KIL;
          $str = str_replace("((tabla))", $regCruds['tabla'], $str);
          echo '<span class="circle">7</span>';
          echo '<pre><code class="language-php">' . htmlentities($str) . '</code></pre>';

          $strs = '';
          foreach ($cruds as $key2 => $regCruds2) {
            if ($regCruds['codigo'] == $regCruds2['depende_de']) {



                $str = <<<'KIL'
// Actualizacion
$rows = $this->Model->getRowsJoin('((depende_de_tabla_nombre_2))', '((depende_de_campo_relacion))', array(), array('((campo_relacion_1))'=>$this->rel_((depende_de_tabla_nombre_1))));
foreach ($rows as $row) {
  $count_rows = $this->Model->records('((tabla))', '', '', array('((campo_relacion_2))'=>$row['((depende_de_campo_relacion))']));
  $this->Model->update('((depende_de_tabla_nombre_2))', array("((depende_de_campo_num_registros))" => $count_rows), $row['((depende_de_campo_relacion))']);
}
KIL;
                $str = str_replace("((tabla))", $regCruds2['tabla'], $str);
                $str = str_replace("((campo_relacion_1))", $regCruds['campo_relacion'], $str);
                $str = str_replace("((campo_relacion_2))", $regCruds2['campo_relacion'], $str);
                $str = str_replace("((depende_de_tabla_nombre_1))", $regCruds['depende_de_tabla_nombre'], $str);
                $str = str_replace("((depende_de_tabla_nombre_2))", $regCruds2['depende_de_tabla_nombre'], $str);
                $str = str_replace("((depende_de_campo_relacion))", $regCruds2['depende_de_campo_relacion'], $str);
                $str = str_replace("((depende_de_campo_num_registros))", $regCruds2['depende_de_campo_num_registros'], $str);
                $strs .= $str;

            }
          }

          echo '<span class="circle-orange">8</span>';
          echo '<pre><code class="language-php">' . htmlentities($strs) . '</code></pre>';

// Kilo-fin

// - Controlador - <<tabla>>_list - Fin ----------------------------------------------------------------------------        
        }


// - Controlador - <<tabla>> - Inicio -------------------------------------------------------------------------        

        echo '<br><br><hr><div class="lead text-right">'.ucfirst($regCruds['tabla']) . '.php</div>';

        if ($nivel == 0) {

// -----------------------------------------------------------------------------------------------
          $str = '';


          $strs_1 = '';
          $strs_2 = '';
          $strs_3 = '';
          foreach ($cruds as $key2 => $regCruds2) {
            if ($regCruds['codigo'] == $regCruds2['depende_de']) {

              $str = <<<'KIL'
$row_((tabla)) = $this->Model->getRow('((tabla))', $id);

KIL;
              $str = str_replace("((tabla))", $regCruds['tabla'], $str);
              $strs_2 .= $str;

              if ($regCruds2['depende_de_campo_num_registros'] != '') {
                $str = <<<'KIL'
// Actualizacion
$rows = $this->Model->getRowsJoin('((depende_de_tabla_nombre))', '((depende_de_campo_relacion))');
foreach ($rows as $row) {
  $count_rows = $this->Model->records('((tabla))', '', '', array('((campo_relacion))'=>$row['((depende_de_campo_relacion))']));
  $this->Model->update('((depende_de_tabla_nombre))', array("((depende_de_campo_num_registros))" => $count_rows), $row['((depende_de_campo_relacion))']);
}
KIL;
                $str = str_replace("((tabla))", $regCruds2['tabla'], $str);
                $str = str_replace("((campo_relacion))", $regCruds2['campo_relacion'], $str);
                $str = str_replace("((depende_de_tabla_nombre))", $regCruds2['depende_de_tabla_nombre'], $str);
                $str = str_replace("((depende_de_campo_relacion))", $regCruds2['depende_de_campo_relacion'], $str);
                $str = str_replace("((depende_de_campo_num_registros))", $regCruds2['depende_de_campo_num_registros'], $str);
                $strs_1 .= $str;

                $str = <<<'KIL'
$this->parameters['data']['((depende_de_campo_num_registros))'] = $row_((tabla))->((depende_de_campo_num_registros));
KIL;
                $str = str_replace("((tabla))", $regCruds['tabla'], $str);
                $str = str_replace("((depende_de_campo_num_registros))", $regCruds2['depende_de_campo_num_registros'], $str);
                $strs_2 .= $str;

                $str = <<<'KIL'
array( 'db' => '((depende_de_campo_num_registros))', 
  'dt' => 5, 
  'field' => 'id', 
  'formatter' => function($d, $row) {
    return '<div class="btn-group tdCommands"><a href="' . base_url() . 'admin/cruds/((tabla))_list/' . $d . '" class="btn btn-info btn-xs" cod="' . $d . '" title="((etiqueta))">((etiqueta)): ' .$row['((depende_de_campo_num_registros))']. '</a></div>';}), 
KIL;
                $str = str_replace("((tabla))", $regCruds2['tabla'], $str);
                $str = str_replace("((etiqueta))", $regCruds2['etiqueta'], $str);
                $str = str_replace("((depende_de_campo_num_registros))", $regCruds2['depende_de_campo_num_registros'], $str);
                $strs_3 .= $str;

              } else {

                $str = <<<'KIL'
array( 'db' => 'id', 
  'dt' => 5, 
  'field' => 'id', 
  'formatter' => function($d, $row) {
    return '<div class="btn-group tdCommands"><a href="' . base_url() . 'admin/cruds/((tabla))_list/' . $d . '" class="btn btn-info btn-xs" cod="' . $d . '" title="((etiqueta))">((etiqueta))</a></div>';}), 
KIL;
                $str = str_replace("((tabla))", $regCruds2['tabla'], $str);
                $str = str_replace("((etiqueta))", $regCruds2['etiqueta'], $str);
                $strs_3 .= $str;

              }

            }
          }
// -----------------------------------------------------------------------------------------------

          echo '<span class="circle-orange">1</span>';
          echo '<pre><code class="language-php">' . htmlentities($strs_1) . '</code></pre>';
          echo '<span class="circle-orange">2</span>';
          echo '<pre><code class="language-php">' . htmlentities($strs_2) . '</code></pre>';
          echo '<span class="circle-orange">3x</span>';
          echo '<pre><code class="language-php">' . htmlentities($strs_3) . '</code></pre>';

        } else {

// Kilo-ini


          $str = <<<'KIL'
public $path_rel;
KIL;
          echo '<span class="circle">1</span>';
          echo '<pre><code class="language-php">' . htmlentities($str) . '</code></pre>';

          $str = <<<'KIL'
public $rel_((depende_de_tabla_nombre));
public $rel_((depende_de_tabla_nombre))_nombre;
KIL;
          $str = str_replace("((depende_de_tabla_nombre))", $regCruds['depende_de_tabla_nombre'], $str);
          echo '<span class="circle-blue">2</span>';
          echo '<pre><code class="language-php">' . htmlentities($str) . '</code></pre>';

          $str = <<<'KIL'
$this->path = 'admin/cruds/((tabla))';
$this->path_rel = 'admin/cruds/((tabla))_list';
KIL;
          $str = str_replace("((tabla))", $regCruds['tabla'], $str);
          echo '<span class="circle">3</span>';
          echo '<pre><code class="language-php">' . htmlentities($str) . '</code></pre>';

          $str = <<<'KIL'
  public function index() {  
    echo "((etiqueta))";
  } 
KIL;
          $str = str_replace("((etiqueta))", $regCruds['etiqueta'], $str);
          echo '<span class="circle">4</span>';
          echo '<pre><code class="language-php">' . htmlentities($str) . '</code></pre>';

          $str = <<<'KIL'
public function new($rel_((depende_de_tabla_nombre))) {
KIL;
          $str = str_replace("((depende_de_tabla_nombre))", $regCruds['depende_de_tabla_nombre'], $str);
          echo '<span class="circle">5</span>';
          echo '<pre><code class="language-php">' . htmlentities($str) . '</code></pre>';


          $str = <<<'KIL'
$this->rel_((depende_de_tabla_nombre)) = $rel_((depende_de_tabla_nombre));
$this->parameters['data']['rel_((depende_de_tabla_nombre))'] = $this->rel_((depende_de_tabla_nombre));
$row_rel_((depende_de_tabla_nombre)) = $this->Model->getRow('((depende_de_tabla_nombre))', $this->rel_((depende_de_tabla_nombre)));
$this->rel_((depende_de_tabla_nombre))_nombre = $row_rel_((depende_de_tabla_nombre))->nombre;
KIL;
          $str = str_replace("((depende_de_tabla_nombre))", $regCruds['depende_de_tabla_nombre'], $str);
          echo '<span class="circle-blue">6</span>';
          echo '<pre><code class="language-php">' . htmlentities($str) . '</code></pre>';

          $str = <<<'KIL'
$this->parameters['path_rel'] = $this->path_rel;
$this->load->library('breadcrumb');
$this->parameters['breadcrumb'] = $this->breadcrumb->((tabla))();
KIL;
          $str = str_replace("((tabla))", $regCruds['tabla'], $str);
          echo '<span class="circle">7</span>';
          echo '<pre><code class="language-php">' . htmlentities($str) . '</code></pre>';

          $str = <<<'KIL'
$row_rel_((tabla)) =  $this->Model->getRow('((tabla))', $id);

$this->rel_((depende_de_tabla_nombre)) = $row_rel_((tabla))->((campo_relacion));
$this->parameters['data']['rel_((depende_de_tabla_nombre))'] = $this->rel_((depende_de_tabla_nombre));
$row_rel_((depende_de_tabla_nombre)) = $this->Model->getRow('((depende_de_tabla_nombre))', $this->rel_((depende_de_tabla_nombre)));
$this->rel_((depende_de_tabla_nombre))_nombre = $row_rel_((depende_de_tabla_nombre))->nombre;

KIL;
          $str = str_replace("((depende_de_tabla_nombre))", $regCruds['depende_de_tabla_nombre'], $str);
          $str = str_replace("((tabla))", $regCruds['tabla'], $str);
          $str = str_replace("((campo_relacion))", $regCruds['campo_relacion'], $str);
          echo '<span class="circle-blue">8</span>';
          echo '<pre><code class="language-php">' . htmlentities($str) . '</code></pre>';

          $strs = '';
          $str = '';
          foreach ($cruds as $key2 => $regCruds2) {
            if ($regCruds['codigo'] == $regCruds2['depende_de']) {

              if ($regCruds2['depende_de_campo_num_registros'] != '') {
                $str = <<<'KIL'
$row_((tabla_1)) = $this->Model->getRow('((tabla_1))', $id);
$this->parameters['data']['((tabla_2))'] = $row_((tabla_1))->((depende_de_campo_num_registros));
KIL;
              } else {
                $str = <<<'KIL'
KIL;
              }

              $str = str_replace("((tabla_1))", $regCruds['tabla'], $str);
              $str = str_replace("((tabla_2))", $regCruds2['tabla'], $str);
              $str = str_replace("((depende_de_campo_num_registros))", $regCruds2['depende_de_campo_num_registros'], $str);
              $strs .= $str;

            }
          }

          echo '<span class="circle-orange">9</span>';
          echo '<pre><code class="language-php">' . htmlentities($strs) . '</code></pre>';

          $str = <<<'KIL'
$this->parameters['path_rel'] = $this->path_rel;
$this->load->library('breadcrumb');
$this->parameters['breadcrumb'] = $this->breadcrumb->((tabla))();
KIL;
          $str = str_replace("((tabla))", $regCruds['tabla'], $str);
          echo '<span class="circle">10</span>';
          echo '<pre><code class="language-php">' . htmlentities($str) . '</code></pre>';

$str = <<<'KIL'
$this->rel_((depende_de_tabla_nombre)) = 0;
if (isset($post["rel_((depende_de_tabla_nombre))"])) {
  $this->rel_((depende_de_tabla_nombre)) = $post["rel_((depende_de_tabla_nombre))"];
}
KIL;
          $str = str_replace("((depende_de_tabla_nombre))", $regCruds['depende_de_tabla_nombre'], $str);
          echo '<span class="circle-blue">11</span>';
          echo '<pre><code class="language-php">' . htmlentities($str) . '</code></pre>';

$str = <<<'KIL'
"((campo_relacion))" => $this->rel_((depende_de_tabla_nombre)),
KIL;
          $str = str_replace("((campo_relacion))", $regCruds['campo_relacion'], $str);
          $str = str_replace("((depende_de_tabla_nombre))", $regCruds['depende_de_tabla_nombre'], $str);
          echo '<span class="circle-blue">12</span>';
          echo '<pre><code class="language-php">' . htmlentities($str) . '</code></pre>';

          $str = '';
          if ($regCruds['depende_de_campo_num_registros'] != '') {
            $str = <<<'KIL'
// Actualizacion
$count_rows = $this->Model->records('((tabla))', '', '', array('((campo_relacion))'=>$this->rel_((depende_de_tabla_nombre))));
$this->Model->update('((depende_de_tabla_nombre))', array("((depende_de_campo_num_registros))" => $count_rows), $this->rel_((depende_de_tabla_nombre)));
KIL;
            $str = str_replace("((tabla))", $regCruds['tabla'], $str);
            $str = str_replace("((campo_relacion))", $regCruds['campo_relacion'], $str);
            $str = str_replace("((depende_de_tabla_nombre))", $regCruds['depende_de_tabla_nombre'], $str);
            $str = str_replace("((depende_de_campo_num_registros))", $regCruds['depende_de_campo_num_registros'], $str);
          }
          echo '<span class="circle-orange">13</span>';
          echo '<pre><code class="language-php">' . htmlentities($str) . '</code></pre>';

          $str = <<<'KIL'
redirect(base_url() . $this->path_rel . '/' . $this->rel_((depende_de_tabla_nombre)));
KIL;
          $str = str_replace("((depende_de_tabla_nombre))", $regCruds['depende_de_tabla_nombre'], $str);
          echo '<span class="circle">14</span>';
          echo '<pre><code class="language-php">' . htmlentities($str) . '</code></pre>';

          $str = <<<'KIL'
if ($this->rel_((depende_de_tabla_nombre)) > 0) {
  redirect(base_url() . $this->path . '/new/' . $this->rel_((depende_de_tabla_nombre)));
} else {
  redirect(base_url() . 'admin/cruds/((formulario_origen))');
}
KIL;
          $str = str_replace("((depende_de_tabla_nombre))", $regCruds['depende_de_tabla_nombre'], $str);
          $str = str_replace("((formulario_origen))", $formulario_origen, $str);
          echo '<span class="circle">15</span>';
          echo '<pre><code class="language-php">' . htmlentities($str) . '</code></pre>';

$str = <<<'KIL'
$this->rel_((depende_de_tabla_nombre)) = 0;
if (isset($post["rel_((depende_de_tabla_nombre))"])) {
  $this->rel_((depende_de_tabla_nombre)) = $post["rel_((depende_de_tabla_nombre))"];
}
KIL;
          $str = str_replace("((depende_de_tabla_nombre))", $regCruds['depende_de_tabla_nombre'], $str);
          echo '<span class="circle-blue">16</span>';
          echo '<pre><code class="language-php">' . htmlentities($str) . '</code></pre>';

$str = <<<'KIL'
redirect(base_url() . $this->path_rel . '/' . $this->rel_((depende_de_tabla_nombre)));
KIL;
          $str = str_replace("((depende_de_tabla_nombre))", $regCruds['depende_de_tabla_nombre'], $str);
          echo '<span class="circle">17</span>';
          echo '<pre><code class="language-php">' . htmlentities($str) . '</code></pre>';

          $str = <<<'KIL'
if ($this->rel_((depende_de_tabla_nombre)) > 0) {
  redirect(base_url() . $this->path . '/edit/'.$post['id']);
} else {
  redirect(base_url() . 'admin/cruds/((formulario_origen))');
}
KIL;
          $str = str_replace("((depende_de_tabla_nombre))", $regCruds['depende_de_tabla_nombre'], $str);
          $str = str_replace("((formulario_origen))", $formulario_origen, $str);
          echo '<span class="circle">18</span>';
          echo '<pre><code class="language-php">' . htmlentities($str) . '</code></pre>';

$str = <<<'KIL'
$this->rel_((depende_de_tabla_nombre)) = 0;
if (isset($post["rel_((depende_de_tabla_nombre))"])) {
  $this->rel_((depende_de_tabla_nombre)) = $post["rel_((depende_de_tabla_nombre))"];
}
KIL;
          $str = str_replace("((depende_de_tabla_nombre))", $regCruds['depende_de_tabla_nombre'], $str);
          echo '<span class="circle-blue">19</span>';
          echo '<pre><code class="language-php">' . htmlentities($str) . '</code></pre>';


          $str = '';
          if ($regCruds['depende_de_campo_num_registros'] != '') {
            $str = <<<'KIL'
// Actualizacion
$count_rows = $this->Model->records('((tabla))', '', '', array('((campo_relacion))'=>$this->rel_((depende_de_tabla_nombre))));
$this->Model->update('((depende_de_tabla_nombre))', array("((depende_de_campo_num_registros))" => $count_rows), $this->rel_((depende_de_tabla_nombre)));
KIL;
            $str = str_replace("((tabla))", $regCruds['tabla'], $str);
            $str = str_replace("((campo_relacion))", $regCruds['campo_relacion'], $str);
            $str = str_replace("((depende_de_tabla_nombre))", $regCruds['depende_de_tabla_nombre'], $str);
            $str = str_replace("((depende_de_campo_num_registros))", $regCruds['depende_de_campo_num_registros'], $str);
          }
          echo '<span class="circle-orange">20</span>';
          echo '<pre><code class="language-php">' . htmlentities($str) . '</code></pre>';

          $str = <<<'KIL'
if ($this->rel_((depende_de_tabla_nombre)) > 0) {
  redirect(base_url() . $this->path_rel . '/' . $this->rel_((depende_de_tabla_nombre)));
} else {
  redirect(base_url() . 'admin/cruds/((formulario_origen))');
}
KIL;
          $str = str_replace("((depende_de_tabla_nombre))", $regCruds['depende_de_tabla_nombre'], $str);
          $str = str_replace("((formulario_origen))", $formulario_origen, $str);
          echo '<span class="circle">21</span>';
          echo '<pre><code class="language-php">' . htmlentities($str) . '</code></pre>';

          $str = <<<'KIL'
public function list_ssp ($rel_((campo_relacion))) {
KIL;
          $str = str_replace("((campo_relacion))", $regCruds['campo_relacion'], $str);
          echo '<span class="circle">22</span>';
          echo '<pre><code class="language-php">' . htmlentities($str) . '</code></pre>';


          $str = <<<'KIL'
array( 
  'db' => 'id', 
  'dt' => 1, 
  'field' => 'id', 
  'formatter' => function($d, $row) {
    return '<button type="button" class="btn btn-primary btn-xs btnEdit_rel" cod="' . $d . '" title="'.$this->lang->line('be_crud_edit').'"><span class="glyphicon glyphicon-pencil"></span></button>';}), 
KIL;
          echo '<span class="circle">23</span>';
          echo '<pre><code class="language-php">' . htmlentities($str) . '</code></pre>';

          $strs = '';
          foreach ($cruds as $key2 => $regCruds2) {
            if ($regCruds['codigo'] == $regCruds2['depende_de']) {

              if ($regCruds2['depende_de_campo_num_registros'] != '') {

                $str = <<<'KIL'
array( 'db' => '((depende_de_campo_num_registros))', 
  'dt' => 5, 
  'field' => 'id', 
  'formatter' => function($d, $row) {
    return '<div class="btn-group tdCommands"><a href="' . base_url() . 'admin/cruds/((tabla))_list/' . $d . '" class="btn btn-info btn-xs" cod="' . $d . '" title="((etiqueta))">((etiqueta)): ' .$row['((depende_de_campo_num_registros))']. '</a></div>';}), 
KIL;
                $str = str_replace("((tabla))", $regCruds2['tabla'], $str);
                $str = str_replace("((etiqueta))", $regCruds2['etiqueta'], $str);
                $str = str_replace("((depende_de_campo_num_registros))", $regCruds2['depende_de_campo_num_registros'], $str);
                $strs .= $str;

              } else {

                $str = <<<'KIL'
array( 'db' => 'id', 
  'dt' => 5, 
  'field' => 'id', 
  'formatter' => function($d, $row) {
    return '<div class="btn-group tdCommands"><a href="' . base_url() . 'admin/cruds/((tabla))_list/' . $d . '" class="btn btn-info btn-xs" cod="' . $d . '" title="((etiqueta))">((etiqueta))</a></div>';}), 
KIL;
                $str = str_replace("((tabla))", $regCruds2['tabla'], $str);
                $str = str_replace("((etiqueta))", $regCruds2['etiqueta'], $str);
                $strs .= $str;

              }

            }
          }
          echo '<span class="circle-orange">24</span>';
          echo '<pre><code class="language-php">' . htmlentities($strs) . '</code></pre>';


          $str = <<<'KIL'
$extraWhere = "((campo_relacion)) = '".$rel_((campo_relacion))."'";
KIL;
          $str = str_replace("((campo_relacion))", $regCruds['campo_relacion'], $str);
          echo '<span class="circle">25</span>';
          echo '<pre><code class="language-php">' . htmlentities($str) . '</code></pre>';


// Kilo-fin

        }

// - Controlador - <<tabla>> - Fin -------------------------------------------------------------------------        

      }

      if ($texto == 'Vista') {
// - Vista - List - Inicio -------------------------------------------------------------------------        
        echo '<br><br><hr><div class="lead text-right">list.php</div>';

        if ($nivel == 0) {
          $str = <<<'KIL'
<th></th>
KIL;
          echo '<span class="circle">1</span>';
          echo '<pre><code class="language-markup">' . htmlentities($str) . '</code></pre>';
          $str = <<<'KIL'
<th></th>
KIL;
          echo '<span class="circle">2</span>';
          echo '<pre><code class="language-markup">' . htmlentities($str) . '</code></pre>';

        } else {

          $str = <<<'KIL'
<a href="<?php echo base_url() . $path_rel; ?>/new/<?php echo $data['rel_((campo_relacion))']; ?>" class="btn btn-default text-green" id="btnNew"><span class="glyphicon glyphicon-plus"></span> <?php echo $this->lang->line('be_crud_new'); ?></a>
KIL;
          $str = str_replace("((campo_relacion))", $regCruds['campo_relacion'], $str);
          echo '<span class="circle">1</span>';
          echo '<pre><code class="language-php">' . htmlentities($str) . '</code></pre>';

          $str = <<<'KIL'
<th></th>
KIL;
          echo '<span class="circle-orange">2</span>';
          echo '<pre><code class="language-markup">' . htmlentities($str) . '</code></pre>';

          $str = <<<'KIL'
<th></th>
KIL;
          echo '<span class="circle-orange">3</span>';
          echo '<pre><code class="language-markup">' . htmlentities($str) . '</code></pre>';

          $str = <<<'KIL'
<input type="hidden" name="rel_((campo_relacion))" id="rel_((campo_relacion))" value="<?php echo $data['rel_((campo_relacion))']; ?>">
KIL;
          $str = str_replace("((campo_relacion))", $regCruds['campo_relacion'], $str);
          echo '<span class="circle">4</span>';
          echo '<pre><code class="language-php">' . htmlentities($str) . '</code></pre>';

        }
// - Vista - List - Fin ---------------------------------------------------------------------------


// - Vista - New - Inicio -------------------------------------------------------------------------        
        if ($nivel > 0) {
          echo '<br><br><hr><div class="lead text-right">new.php</div>';

          $str = <<<'KIL'
<input type="hidden" name="rel_((campo_relacion))" id="rel_((campo_relacion))" value="<?php echo $data['rel_((campo_relacion))']; ?>">
KIL;
          $str = str_replace("((campo_relacion))", $regCruds['campo_relacion'], $str);
          echo '<span class="circle">1</span>';
          echo '<pre><code class="language-php">' . htmlentities($str) . '</code></pre>';


          $str = <<<'KIL'
<a href="<?php echo base_url() . $path_rel . '/' . $data['rel_((campo_relacion))']; ?>" class="btn btn-default"><?php echo $this->lang->line('be_crud_cancel'); ?></a>
KIL;
          $str = str_replace("((campo_relacion))", $regCruds['campo_relacion'], $str);
          echo '<span class="circle">2</span>';
          echo '<pre><code class="language-php">' . htmlentities($str) . '</code></pre>';


          $str = <<<'KIL'
<a href="<?php echo base_url() . $path_rel . '/' . $data['rel_((campo_relacion))']; ?>" class="btn btn-default"><?php echo $this->lang->line('be_crud_cancel'); ?></a>
KIL;
          $str = str_replace("((campo_relacion))", $regCruds['campo_relacion'], $str);
          echo '<span class="circle">3</span>';
          echo '<pre><code class="language-php">' . htmlentities($str) . '</code></pre>';

        }
// - Vista - New - Fin ----------------------------------------------------------------------------        



// - Vista - Edit - Inicio -------------------------------------------------------------------------        
        echo '<br><br><hr><div class="lead text-right">edit.php</div>';
        if ($nivel == 0) {

          $strs = '';
          $str = '';
          foreach ($cruds as $key2 => $regCruds2) {
            if ($regCruds['codigo'] == $regCruds2['depende_de']) {

              if ($regCruds2['depende_de_campo_num_registros'] != '') {
                $str = <<<'KIL'
<a href="<?php echo base_url() . 'admin/cruds/((tabla))_list/' . $data['id']; ?>" class="btn btn-info">((etiqueta)): <?php echo $data['((depende_de_campo_num_registros))']; ?></a>
KIL;
              } else {
                $str = <<<'KIL'
<a href="<?php echo base_url() . 'admin/cruds/((tabla))_list/' . $data['id']; ?>" class="btn btn-info">((etiqueta))</a>
KIL;
              }

              $str = str_replace("((tabla))", $regCruds2['tabla'], $str);
              $str = str_replace("((etiqueta))", $regCruds2['etiqueta'], $str);
              $str = str_replace("((depende_de_campo_num_registros))", $regCruds2['depende_de_campo_num_registros'], $str);
              $strs .= $str;

            }
          }

          if ($strs != '') {
            echo '<span class="circle">1</span>';
            echo '<pre><code class="language-php">' . htmlentities($strs) . '</code></pre>';
            echo '<span class="circle">2</span>';
            echo '<pre><code class="language-php">' . htmlentities($strs) . '</code></pre>';
          }


        } else {

          $str = <<<'KIL'
<input type="hidden" name="rel_((campo_relacion))" id="rel_((campo_relacion))" value="<?php echo $data['rel_((campo_relacion))']; ?>">
KIL;
          $str = str_replace("((campo_relacion))", $regCruds['campo_relacion'], $str);
          echo '<span class="circle">1</span>';
          echo '<pre><code class="language-php">' . htmlentities($str) . '</code></pre>';

          $strs = '';
          $str = <<<'KIL'
<a href="<?php echo base_url() . $path_rel . '/' . $data['rel_((campo_relacion))']; ?>" class="btn btn-default"><?php echo $this->lang->line('be_crud_cancel'); ?></a>
KIL;
          $str = str_replace("((campo_relacion))", $regCruds['campo_relacion'], $str);
          $strs .= $str;

          foreach ($cruds as $key2 => $regCruds2) {
            if ($regCruds['codigo'] == $regCruds2['depende_de']) {


              if ($regCruds2['depende_de_campo_num_registros'] != '') {
                $str = <<<'KIL'
<a href="<?php echo base_url() . 'admin/cruds/((tabla))_list/' . $data['id']; ?>" class="btn btn-info">((etiqueta)): <?php echo $data['((depende_de_campo_num_registros))']; ?></a>
KIL;
              } else {
                $str = <<<'KIL'
<a href="<?php echo base_url() . 'admin/cruds/((tabla))_list/' . $data['id']; ?>" class="btn btn-info">((etiqueta))</a>
KIL;
              }

              $str = str_replace("((tabla))", $regCruds2['tabla'], $str);
              $str = str_replace("((etiqueta))", $regCruds2['etiqueta'], $str);
              $str = str_replace("((depende_de_campo_num_registros))", $regCruds2['depende_de_campo_num_registros'], $str);
              $strs .= $str;
            }
          }

          if ($strs != '') {
            echo '<span class="circle">2</span>';
            echo '<pre><code class="language-php">' . htmlentities($strs) . '</code></pre>';
            echo '<span class="circle">3</span>';
            echo '<pre><code class="language-php">' . htmlentities($strs) . '</code></pre>';
          }

        }
// - Vista - Edit - Fin -------------------------------------------------------------------------        

      }


// - Javascript - Inicio ------------------------------------------------------------------------        
      if ($texto == 'Javascript' and $nivel > 0) {
        echo '<br><br><hr><div class="lead text-right">list.js</div>';
        $str = <<<'KIL'
var rel_((campo_relacion)) = $("#rel_((campo_relacion))").val();
KIL;
        $str = str_replace("((campo_relacion))", $regCruds['campo_relacion'], $str);
        echo '<span class="circle">1</span>';
        echo '<pre><code class="language-javascript">' . htmlentities($str) . '</code></pre>';
        $str = <<<'KIL'
"ajax": proyVar.base_url + proyVar.path_rel + "/list_ssp/" + rel_((campo_relacion)),
KIL;
        $str = str_replace("((campo_relacion))", $regCruds['campo_relacion'], $str);
        echo '<span class="circle">2</span>';
        echo '<pre><code class="language-javascript">' . htmlentities($str) . '</code></pre>';
      }
// - Javascript - Fin ----------------------------------------------------------------------------        


      echo '</div>';

      tab_pane1($cruds, $regCruds['codigo'], $nivel+1, $texto, $formulario_origen);
    }
  }
}

?>

<link href="<?php echo base_url(); ?>assets/plugins/prism/prism.css" rel="stylesheet" />
<script src="<?php echo base_url(); ?>assets/plugins/prism/prism.js"></script>

<style type="text/css">
  .azul {color: #337ab7;}
  .rojo {color: red;}
  .no_bullets {list-style: none;}
</style>

<style>
  span.circle {
    background: #525252;
    border-radius: 50%;
    -moz-border-radius: 50%;
    -webkit-border-radius: 50%;
    color: #ffffff;
    display: inline-block;
    font-weight: bold;
    line-height: 30px;
    margin-right: 5px;
    text-align: center;
    width: 33px;
  }
  span.circle-orange {
    background: #ff5e00;
    border-radius: 50%;
    -moz-border-radius: 50%;
    -webkit-border-radius: 50%;
    color: #ffffff;
    display: inline-block;
    font-weight: bold;
    line-height: 30px;
    margin-right: 5px;
    text-align: center;
    width: 33px;
  }  
  span.circle-blue {
    background: #0095ff;
    border-radius: 50%;
    -moz-border-radius: 50%;
    -webkit-border-radius: 50%;
    color: #ffffff;
    display: inline-block;
    font-weight: bold;
    line-height: 30px;
    margin-right: 5px;
    text-align: center;
    width: 33px;
  }  
</style>

  <div class="row">
    <div class="col-sm-5" id="col1">


      <?php echo form_open(base_url() . 'admin/cruds/assistants/tablas_cruds_dependientes_crear_crud_dependiente', array()); ?>
      <div class="panel panel-primary">
        <div class="panel-heading" style="display:block;height: 54px;">
          <div style="float:left;font-weight:bold;font-size: 18px;">Crear Grupo de CRUDs Dependientes</div>
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
if ($crud_dependiente_seleccionado > 0) {
?>
      <?php echo form_open(base_url() . 'admin/cruds/assistants/tablas_cruds_dependientes_guardar_crud_dependiente', array()); ?>
      <div class="panel panel-primary">

        <div class="panel-heading" style="display:block;height: 54px;">
          <div style="float:left;font-weight:bold;font-size: 18px;">Crear/Editar CRUD Dependiente</div>
          <div style="float:right;">
            <button class="btn btn-success" type="submit">Guardar</button>
          </div>
        </div>

        <div class="panel-body">

<?php
if (count($cruds_dependientes_detalles) == 0) {
?>
          <div class="form-group">
          	<label class="control-label" for="ce_tabla">CRUD Inicial:</label>
            <select class="form-control" id="ce_tabla" name="tabla_inicial">
              <option value="">Seleccionar CRUD inicial...</option>
	<?php
	foreach ($tablas as $regTablas) {
	?>
              <option value="<?php echo $regTablas['nombre']; ?>"><?php echo $regTablas['nombre']; ?></option>
	<?php
	}
	?>              
            </select>
          </div>
<?php
} else {
?>

		  <h3>Depende de...</h3>

          <div class="form-group">
          	<label class="control-label" for="ce_depende_de">Depende de...:</label>
            <select class="form-control" id="ce_depende_de" name="depende_de">
              <option value="">Depende de...</option>
			  <?php depende_de($matCruds, '', 0); ?>              
            </select>
          </div>

          <div class="form-group">
			<label class="control-label">Tabla Nombre:</label>
			<p class="form-control-static" id="ce_depende_de_tabla_nombre_static">Sin selccionar</p>
            <input type="hidden" class="form-control" id="ce_depende_de_tabla_nombre" name="depende_de_tabla_nombre">
          </div>

          <div class="form-group">
          	<label class="control-label text-aqua" for="ce_depende_de_campo_relacion">Campo Relación:</label>
            <select class="form-control" id="ce_depende_de_campo_relacion" name="depende_de_campo_relacion">
            	<option value="">Selecciona el campo relación...</option>
            </select>
          </div>

          <div class="form-group">
          	<label class="control-label" for="ce_depende_de_campo_nombre">Campo Nombre:</label>
            <select class="form-control" id="ce_depende_de_campo_nombre" name="depende_de_campo_nombre">
            	<option value="">Selecciona el campo nombre...</option>
            </select>
          </div>

          <div class="form-group">
          	<label class="control-label" for="ce_depende_de_campo_num_registros">Campo Num Registros:</label>
            <select class="form-control" id="ce_depende_de_campo_num_registros" name="depende_de_campo_num_registros">
            	<option value="">Selecciona el campo num registros...</option>
            </select>
          </div>

		  <h3>Relacionado con...</h3>

          <div class="form-group">
          	<label class="control-label" for="ce_tabla">CRUD:</label>
            <select class="form-control" id="ce_tabla" name="tabla">
            	<option value="">Selecciona el CRUD...</option>
            </select>
          </div>

          <div class="form-group">
          	<label class="control-label" for="ce_etiqueta">Etiqueta:</label>
            <input type="text" class="form-control" id="ce_etiqueta" placeholder="Ingresa la etiqueta" name="etiqueta">
          </div>

          <div class="form-group">
          	<label class="control-label text-aqua" for="ce_campo_relacion">Campo Relación:</label>
            <select class="form-control" id="ce_campo_relacion" name="campo_relacion">
            	<option value="">Selecciona el campo relación...</option>
            </select>
          </div>

<?php
}
?>

        </div>
      </div>
      </form>
<?php
}
?>

<?php
if ($crud_dependiente_seleccionado > 0) {
?>
<!-- 
      <?php echo form_open(base_url() . 'admin/cruds/assistants/tablas_cruds_dependientes_copiar_crud_dependiente', array()); ?>
      <div class="panel panel-primary">
        <div class="panel-heading" style="display:block;height: 54px;">
          <div style="float:left;font-weight:bold;font-size: 18px;color: yellow;">Copiar CRUD Dependiente</div>
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
            <select class="form-control" id="copiar_crud_dependiente" name="copiar_crud_dependiente">
              <option value="0">Selecciona el CRUD Dependiente</option>
            </select>
          </div>

        </div>
      </div>
      </form>
 -->
<?php
}
?>

    </div>

    <div class="col-sm-7" id="col2">

      <div class="panel panel-primary">
        <div class="panel-heading"><b>CRUDs Dependientes</b> <button class="btn btn-warning btn-xs" type="button" id="funcionalidades" estado="ocultar">Funcionalidades</button></div>
        <div class="panel-body">

          <?php echo form_open(base_url() . 'admin/cruds/assistants/tablas_cruds_dependientes_seleccionar_crud_dependiente', array()); ?>
            <div class="input-group">
              <select class="form-control" id="crud_dependiente" name="crud_dependiente">
                <option value="0">Selecciona los CRUDs</option>
                <?php
                foreach ($cruds_dependientes as $regCrudsDependientes) {
                  $seleccionado = '';
                  if ($crud_dependiente_seleccionado == $regCrudsDependientes['id']) $seleccionado = " selected='selected'";
                  echo "<option value='".$regCrudsDependientes['id']."'".$seleccionado.">".$regCrudsDependientes['nombre']."</option>";
                }
                ?>
              </select>
              <div class="input-group-btn">
                <button class="btn btn-success" type="submit">Seleccionar</button>
              </div>
            </div>
          </form>

          <br>

<?php
if ($crud_dependiente_seleccionado > 0) {
?>

          <?php lista2($matCruds, '', 0); ?> 
          <ul class="nav nav-tabs">
            <li class="dropdown active">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">Controladores <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <?php nav1($matCruds, '', 0, 'Controlador'); ?>  
              </ul>
            </li>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">Vistas <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <?php nav1($matCruds, '', 0, 'Vista'); ?>  
              </ul>
            </li>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">Javascript <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <?php nav1($matCruds, '', 0, 'Javascript'); ?>  
              </ul>
            </li>
          </ul>

          <div class="tab-content">
            <?php tab_pane1($matCruds, '', 0, 'Controlador', ''); ?>
            <?php tab_pane1($matCruds, '', 0, 'Vista', ''); ?>
            <?php tab_pane1($matCruds, '', 0, 'Javascript', ''); ?>
          </div>

<?php
}
?>

        </div>
      </div>
    </div>
	</div>

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

    $("#ce_depende_de").change(function () {
    	var codigo = $("#ce_depende_de").val();

		$("#ce_depende_de_tabla_nombre").val('');
		$("#ce_depende_de_tabla_nombre_static").html('Sin selccionar');
		$("#ce_depende_de_campo_relacion").html('<option value="">Selecciona el campo relación...</option>');
		$("#ce_depende_de_campo_nombre").html('<option value="">Selecciona el campo nombre...</option>');
		$("#ce_depende_de_campo_num_registros").html('<option value="">Selecciona el campo num registros...</option>');
    	$("#ce_tabla").html('<option value="">Selecciona el CRUD...</option>');

		$("#ce_etiqueta").val('');
		$("#ce_campo_relacion").html('<option value="">Selecciona el campo relación...</option>');

		$.ajax({
			url: "<?php echo base_url(); ?>admin/cruds/assistants/traer_cruds_dependientes_tablas_dependientes",
			cache: false,
			dataType: "json",
			type: "post",
			data: {"codigo":codigo},
			success:function(datos) {

				$("#ce_depende_de_tabla_nombre").val(datos.tabla_nombre);
				$("#ce_depende_de_tabla_nombre_static").html(datos.tabla_nombre);

				var depende_de_campos = '';
				for(var i in datos.depende_de_campos) {
					depende_de_campos += '<option value="'+datos.depende_de_campos[i].nombre+'">'+datos.depende_de_campos[i].nombre+' ('+datos.depende_de_campos[i].etiqueta+')</option>';
				}
				$("#ce_depende_de_campo_relacion").html('<option value="">Selecciona el campo relación...</option>' + depende_de_campos);
				$("#ce_depende_de_campo_nombre").html('<option value="">Selecciona el campo nombre...</option>' + depende_de_campos);
				$("#ce_depende_de_campo_num_registros").html('<option value="">Selecciona el campo num registros...</option>' + depende_de_campos);

				var tablas = '';
				for(var i in datos.tablas) {
					tablas += '<option value="'+datos.tablas[i].tabla_relacion+'">'+datos.tablas[i].tabla_relacion+' ('+datos.tablas[i].etiqueta+')</option>';
				}
				$("#ce_tabla").html('<option value="0">Selecciona el CRUD...</option>' + tablas);

			}
		}); 

    });

    $("#ce_tabla").change(function () {
    	var tabla = $("#ce_tabla").val(); 

		$("#ce_etiqueta").val('');
		$("#ce_campo_relacion").html('<option value="">Selecciona el campo relación...</option>');

		$.ajax({
			url: "<?php echo base_url(); ?>admin/cruds/assistants/traer_cruds_dependientes_crud_relacion",
			cache: false,
			dataType: "json",
			type: "post",
			data: {"tabla":tabla},
			success:function(datos) {

				$("#ce_etiqueta").val(datos.tabla_etiqueta);

				var campos_relacion = '';
				for(var i in datos.campos_relacion) {
					campos_relacion += '<option value="'+datos.campos_relacion[i].nombre+'">'+datos.campos_relacion[i].nombre+' ('+datos.campos_relacion[i].etiqueta+')</option>';
				}
				$("#ce_campo_relacion").html('<option value="">Selecciona el campo relación...</option>' + campos_relacion);

			}
		}); 

    });


    $("#copiar_proyecto").change(function () {
      var proyecto = $("#copiar_proyecto").val();
      $("#copiar_version").html('<option>Cargando...</option>');
      $("#copiar_crud_dependiente").html('<option value="0">Selecciona el CRUD Dependiente</option>');
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
      $("#copiar_crud_dependiente").html('<option>Cargando...</option>');
      $.ajax({
        url: "<?php echo base_url(); ?>admin/cruds/assistants/traer_crud_dependiente",
        cache: false,
        dataType: "json",
        type: "post",
        data: {"version":version},
        success:function(datos) {
          var cruds_dependientes = '<option value="0">Selecciona el CRUD Dependiente</option>';
          for(var i in datos.cruds_dependientes) {
            if (datos.cruds_dependientes[i].id != <?php echo $crud_dependiente_seleccionado; ?>) {
              cruds_dependientes += '<option value="'+datos.cruds_dependientes[i].id+'">'+datos.cruds_dependientes[i].nombre+'</option>';
            }
          }
          $("#copiar_crud_dependiente").html(cruds_dependientes);
        }
      }); 
    });

    $('#funcionalidades').click(function () {
      var estado = $('#funcionalidades').attr('estado');
      if (estado == 'ocultar') {
        $('#col1').fadeOut('fast', function() {
          $('#col1').attr('class', 'col-sm-12');
          $('#col2').attr('class', 'col-sm-12');
          $('#funcionalidades').attr('estado', 'ver');
        });
      }
      if (estado == 'ver') {
        $('#col1').attr('class', 'col-sm-5');
        $('#col2').attr('class', 'col-sm-7');
        $('#funcionalidades').attr('estado', 'ocultar');
        $('#col1').fadeIn('slow');
      }
    });

  });
</script>