<?php defined('BASEPATH') OR exit('No direct script access allowed');  
$texto_perfil = '';
if ($perfil != '') {
	$texto_perfil = ' con el perfil "'.$perfil.'"';
}
?>
Hola <?=$nombre?><br>
Recibe un cordial saludo<br>
Te damos la bienvenida, te hemos creado una cuenta en el módulo de tipo "<?=$tipo_usuario?>"<?=$texto_perfil?> y para ingresar en tu cuenta haz clic <a href="<?= base_url()?>backend">aquí</a><br><br>
Los siguientes datos son tus credenciales de ingreso:<br><br>
<b>Correo:</b> <?=$correo?><br>
<b>Clave:</b> <?=$clave?><br>
El sistema te solicitará una vez ingreses que cambies tu clave para garantizar la seguridad de tu cuenta.<br>

