  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Relational Model
        <small>Project: <?php echo $projectVersionTitle; ?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Relational Model</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">

        </div>
        <div class="box-body">

          <div class="row">
            <div class="col-xs-12" id="container">
            </div>
          </div>

        </div>
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



<script>
  var camera, scene, renderer, controls, stats;
  tablas = new Array();
<?php

  $countTabla = count($tablas); // 127

  $fontSize = round(50 - $countTabla * 0.17);
  $textPos = round(300 - $countTabla * 0.65);
  $cilSize = round(150 - $countTabla * 0.85);

  $i = 0;
  foreach($tablas as $registro) {
      echo '
  tablas['.$i.'] = new Array();
  tablas['.$i.'][0] = "'.$registro['nombre'].'";
  tablas['.$i.'][1] = '.$registro['id'].';
  tablas['.$i.'][2] = 0;
  tablas['.$i.'][3] = 0;
  tablas['.$i.'][4] = 0;';
      $i++;
  }


?>
  tablas_relaciones = new Array();
<?php
  $i = 0;
  foreach($campos as $registro) {
      echo '
  tablas_relaciones['.$i.'] = new Array();
  tablas_relaciones['.$i.'][0] = '.$registro['tabla'].';
  tablas_relaciones['.$i.'][1] = '.$registro['relacion_tabla'].';';
      $i++;    
  }      
?>

  init();
  animate();

  function posicion (valor) {
    var azar = Math.random();
    var signo = Math.random();

    valor = valor * azar;
    if (signo < 0.5) {
      valor = valor * -1;
    }

    return valor;
  }

  function crear_texto (texto, y,x,z) {


    var fontSize = <?php echo $fontSize ?>;
    var textPos = <?php echo $textPos ?>;

    var canvas1 = document.createElement('canvas');
    var context1 = canvas1.getContext('2d');
    context1.font = fontSize + "px Verdana";
    context1.fillStyle = "rgba(0,0,0,1)";
    context1.fillText(texto, 0, 50);

    // canvas contents will be used for a texture
    var texture1 = new THREE.Texture(canvas1) 
    texture1.needsUpdate = true;
    var material1 = new THREE.MeshBasicMaterial( {map: texture1 } ); // , side:THREE.DoubleSide
    material1.transparent = true;

// --------------------
    var mesh1 = new THREE.Mesh(
      new THREE.PlaneGeometry(canvas1.width, canvas1.height),
      material1
    );
    mesh1.position.set(x+textPos,y-30,z);
    scene.add( mesh1 );
// --------------------
    var mesh2 = new THREE.Mesh(
      new THREE.PlaneGeometry(canvas1.width, canvas1.height),
      material1
    );
    mesh2.position.set(x-textPos,y-30,z);
    mesh2.rotation.y = Math.PI;
    scene.add( mesh2 );
// --------------------
    var mesh3 = new THREE.Mesh(
      new THREE.PlaneGeometry(canvas1.width, canvas1.height),
      material1
    );
    mesh3.position.set(x,y-30,z-textPos);
    mesh3.rotation.y = Math.PI/2;
    scene.add( mesh3 );
// -------------------- 
    var mesh4 = new THREE.Mesh(
      new THREE.PlaneGeometry(canvas1.width, canvas1.height),
      material1
    );
    mesh4.position.set(x,y-30,z+textPos);
    mesh4.rotation.y = -Math.PI/2;
    scene.add( mesh4 );
// --------------------
  }

  function init() {

    var cilSize = <?php echo $cilSize ?>;

    // Escena
    scene = new THREE.Scene();

    // Ancho y Alto
    var w = window.innerWidth * 0.9;
    var h = window.innerHeight * 0.8;       
    var innerWidth = parseInt(w);
    var innerHeight = parseInt(h);        

    // Camara
    var SCREEN_WIDTH = innerWidth, SCREEN_HEIGHT = innerHeight;
    var VIEW_ANGLE = 45, ASPECT = SCREEN_WIDTH / SCREEN_HEIGHT, NEAR = 0.1, FAR = 20000;
    camera = new THREE.PerspectiveCamera( VIEW_ANGLE, ASPECT, NEAR, FAR);       
    camera.position.set( 0, 1000, 2000 );
    camera.lookAt( new THREE.Vector3( 0, 1500, 0 ) );
// camera.position.set(0,150,400);
// camera.lookAt(scene.position); 


    // Controles de la camara con el mouse
    controls = new THREE.TrackballControls( camera );


    // Malla
    scene = new THREE.Scene();
    scene.add( new THREE.GridHelper( 800, 100 ) );

    // Cilindros
    var pos = 800;
    var pos_z = pos * -1;
    var factor = (tablas.length > 0 ? pos / tablas.length * 2 : 0);

    for (var i = tablas.length - 1; i >= 0; i--) {

      var azar = Math.random();
      var geometry = new THREE.CylinderGeometry( cilSize/2, cilSize/2, cilSize, 32 );
      var material = new THREE.MeshBasicMaterial( {color:azar * 0xffffff} );
      var cylinder = new THREE.Mesh( geometry, material );
      var y = posicion (pos);
      var x = posicion (pos);
      var z = pos_z; 

      pos_z = pos_z + factor;

      cylinder.position.y = y;
      cylinder.position.x = x;
      cylinder.position.z = z;
      scene.add( cylinder );

      tablas[i][2] = x;
      tablas[i][3] = y;
      tablas[i][4] = z;
      crear_texto (tablas[i][0], y,x,z);
    };

    // Relaciones
    for (var j = tablas_relaciones.length - 1; j >= 0; j--) {

      for (var i1 = tablas.length - 1; i1 >= 0; i1--) {
        if (tablas[i1][1] == tablas_relaciones[j][0]) {
          break;
        }
      }
      for (var i2 = tablas.length - 1; i2 >= 0; i2--) {
        if (tablas[i2][1] == tablas_relaciones[j][1]) {
          break;
        }
      }

      var material = new THREE.LineBasicMaterial({
        color: 0x3c8dbc
      });
      var geometry = new THREE.Geometry();
      geometry.vertices.push(
        new THREE.Vector3( tablas[i1][2], tablas[i1][3], tablas[i1][4] ),
        new THREE.Vector3( tablas[i2][2], tablas[i2][3], tablas[i2][4] )
      );

      var line = new THREE.Line( geometry, material );
      scene.add( line );
    };

    var container = document.getElementById( 'container' );

    // STATS
    stats = new Stats();
    stats.domElement.style.position = 'absolute';
    stats.domElement.style.bottom = '0px';
    stats.domElement.style.zIndex = 100;
    container.appendChild( stats.domElement );        

    // Render
    renderer = new THREE.CanvasRenderer();
    renderer.setClearColor( 0xf9f9f9 );
    renderer.setSize( innerWidth, innerHeight);
    container.appendChild( renderer.domElement );       

    // Resize
    window.addEventListener( 'resize', onWindowResize, false );
  }

  function onWindowResize() {
    var w = window.innerWidth * 0.9;
    var h = window.innerHeight * 0.8;       
    var innerWidth = parseInt(w);
    var innerHeight = parseInt(h);

    camera.aspect = innerWidth / innerHeight;
    camera.updateProjectionMatrix();
    renderer.setSize( innerWidth, innerHeight );
    render();   
    update();
  }

  function animate () {
    requestAnimationFrame( animate );
    render();   
    update();
  }

  function update () {
    controls.update(); 
    stats.update();
  }

  function render () {
    renderer.render( scene, camera ); 
  }

</script>
