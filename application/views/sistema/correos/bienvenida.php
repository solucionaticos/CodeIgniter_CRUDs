<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?> 
Hola <?=$nombre?><br>
Recibe un cordial saludo<br>
Te damos la bienvenida, para activar tu cuenta haz clic <a href="<?= base_url()?>sistema/activacion/<?=$codigo_activacion?>">aquí</a><br>
O copia el siguiente enlace en la barra navegación en tu navegador:<br>
<?= base_url()?>sistema/activacion/<?=$codigo_activacion?><br>

