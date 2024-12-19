<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Solucionáticos</title>

  <link rel="icon" href="<?php echo base_url(); ?>assets/images/favicon.ico" type="image/x-icon">

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

<?php
if (isset($css)) {
  echo $css;
}
?>

  <!-- jQuery 3 -->
  <script src="<?php echo base_url(); ?>assets/templates/<?php echo $this->config->item('adminPath'); ?>/AdminLTE-2.4.18/bower_components/jquery/dist/jquery.min.js"></script>

  <!-- Three -->
  <script src="<?php echo base_url(); ?>assets/plugins/three2/js/Three.js"></script>
  <script src="<?php echo base_url(); ?>assets/plugins/three2/js/TrackballControls.js"></script>
  <script src="<?php echo base_url(); ?>assets/plugins/three2/js/OrbitControls.js"></script>
  <script src="<?php echo base_url(); ?>assets/plugins/three2/js/CSS3DRenderer.js"></script>
  <script src="<?php echo base_url(); ?>assets/plugins/three2/fonts/helvetiker_regular.typeface.js"></script>  
  <script src="<?php echo base_url(); ?>assets/plugins/three2/js/Stats.js"></script>
  <script src="<?php echo base_url(); ?>assets/plugins/three2/js/Detector.js"></script>
  <script src="<?php echo base_url(); ?>assets/plugins/three2/js/THREEx.KeyboardState.js"></script>
  <script src="<?php echo base_url(); ?>assets/plugins/three2/js/THREEx.FullScreen.js"></script>
  <script src="<?php echo base_url(); ?>assets/plugins/three2/js/THREEx.WindowResize.js"></script>

<!-- Code to display an information button and box when clicked. -->
<script src="https://code.jquery.com/jquery-1.9.1.js"></script>
<script src="https://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
<link rel=stylesheet href="https://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" />
<script>
$(function() 
{
   $("#infoBox")
  .css( 
  {
     "background":"rgba(255,255,255,0.9)",
     "color":"black"
  })
  .dialog({ autoOpen: false, 
    show: { effect: 'fade', duration: 500 },
    hide: { effect: 'fade', duration: 500 },
    width: 500 
  });
  
   $("#infoButton")
       .text("Filtrar (<?php echo $projectVersionTitle; ?>)") // sets text to empty
  .css(
  { "z-index":"2",
    "background":"rgba(0,0,0,0)", "opacity":"0.9", 
    "position":"absolute", "top":"4px", "left":"4px"
  }) // adds CSS
    .button()
  .click( 
    function() 
    { 
      $("#infoBox").dialog("open");
    });
});  
</script>

<!-- ------------------------------------------------------------ -->

</head>
<body style="margin: 0px;padding: 0px;">

<div id="infoButton">Filtro</div>
<div id="infoBox" title="Tablas">
<?php
  $tablas_opciones = '';
  foreach($tablas as $registro) {
    $tablas_opciones .= '<option value="'.$registro['id'].'">'.$registro['nombre'].'</option>';
  }
  $tablas_filtro = '<select id="tabla_filtro"><option value="0">Todas</option>' . $tablas_opciones . '</select>';
  echo $tablas_filtro;
?>
  <br>
  <button id="btn_tabla_filtro">Filtrar</button>
</div>
