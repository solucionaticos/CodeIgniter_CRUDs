<?php defined('BASEPATH') OR exit('No esta permitido el acceso directo a este script.');  
$texto_perfil = '';
if ($perfil != '') {
	$texto_perfil = ' con el perfil "'.$perfil.'"';
}
?>
<table width="650px" align="center" border="0" cellpadding="0" cellspacing="0" style="font-family: sans-serif;">
	<tr>
		<td>
			<img src="<?= base_url()?>assets/tienda/images/header_email.png" alt="header" style="width: 100%; vertical-align: bottom; border: 0;">
		</td>
	</tr>

	<tr>
		<td style="text-align: center; background-color: #f2f3f4; padding: 20px 0;">
			<h2 style="color: #565656; font-size: 25px; font-weight: 300; margin: 0;">Hola <strong style="color: #f37441;"><?=$nombre?> <?=$apellidos?></strong></h2>
			<p style="color: #6d6e71; font-size: 18px; margin: 10px 0;">Recibe un cordial saludo</p>
		</td>
	</tr>


	<tr>
		<td style="text-align: center; padding: 10px 0;">
			<p style="color: #565656; font-size: 20px; margin: 10px 0; font-weight: 300;">Te damos la bienvenida, te hemos creado una cuenta en el módulo de tipo "<?=$tipo_usuario?>"<?=$texto_perfil?> y para ingresar en tu cuenta haz clic <a href="<?= base_url()?>backend" style="color: #f37441; text-decoration: none; font-weight: 600;">aquí</a></p>

			<p style="color: #565656; font-size: 18px; margin: 30px 0 0 0; font-weight: 300;">o copia el siguiente enlace</p>

			<p style="background-color: #fff; font-size: 14px; padding: 10px 0; margin: 5px 0;"><?= base_url()?>backend</p>

			<p style="color: #565656; font-size: 18px; margin: 0; font-weight: 300;">en la barra navegación en tu navegador. </p>


			<p style="color: #565656; font-size: 20px; margin: 10px 0; font-weight: 300;">
Los siguientes datos son tus credenciales de ingreso:
<br><br>
<b>Correo:</b> <?=$correo?>
<br><br>
<b>Clave:</b> <?=$clave?>
<br><br>
El sistema te solicitará una vez ingreses que cambies tu clave, esto solo para garantizar la seguridad de tu cuenta.
			</p>


		</td>
	</tr>


	<tr>
		<td style="padding-top: 30px; display: block;">
			<img src="<?= base_url()?>assets/tienda/images/footer.png" alt="footer" style="width: 100%; vertical-align: bottom; border: 0;">
		</td>

		<td style="display: block;">
			<p style="background-color: #6d6e71; color: #fff; font-size: 13px; margin: 0; text-align: center; padding: 10px 0; font-weight: 300;"><strong>© <?php echo $this->config->item('Y'); ?> Fundación Bolívar Davivienda.</strong> Todos los derechos reservados.</p>
		</td>
	</tr>

	<tr>
		<td style="display: block;">
			<p style="color: #848484; font-size: 12px; margin: 10px 0; padding: 0 10px 10px 10px; border-bottom: 1px solid #b8babc; line-height: 130%;">Este correo fue enviado por peticion suya. Si desea no ser contactado desde esta direccion de correo, por favor ingrese a nuestra pagina de Internet o acerquese a la oficina sede de su cuenta para modificar la matricula de notificaciones. Toda informacion contenida en este mensaje es considerada de caracter confidencial y/o privilegiado y esta dirigida unicamente a su destinatario, quien por tal razon es el unico autorizado para leerla y utilizarla. Si usted ha recibido por error este mensaje debe eliminarlo totalmente de su sistema y comunicar tal situacion al remitente de inmediato.</p>
		</td>

		<td style="display: block; text-align: center;">
			<p style="display: inline-block; vertical-align: middle; font-size: 13px; color: #b8babc;">Powered By</p>
			<a href="https://ecommercefactory.co/" style="display: inline-block; vertical-align: middle; width: 90px;">
				<img src="<?= base_url()?>assets/tienda/images/logo-EF.jpg" alt="Logo ECommerceFactory" style="width: 100%; vertical-align: bottom; border: 0;">
			</a>
			<a href="https://ecommercefactory.co/" style="display: inline-block; vertical-align: middle; width: 90px;">
				<img src="<?= base_url()?>assets/tienda/images/logo-TS.jpg" alt="Logo TiendiShops" style="width: 100%; vertical-align: bottom; border: 0;">
			</a>
		</td>
	</tr>
</table>