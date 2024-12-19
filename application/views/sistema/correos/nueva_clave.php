<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?> 
Hola <?=$nombre?><br>
Recibe un cordial saludo<br>
Para definir tu nueva constraseña haz clic <a href="<?= base_url()?>sistema/nueva_clave/<?=$codigo?>">aquí</a><br>
O copia el siguiente enlace en la barra navegación en tu navegador:<br>
<?= base_url()?>sistema/nueva_clave/<?=$codigo?><br>

