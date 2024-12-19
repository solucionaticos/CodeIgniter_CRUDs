<?php defined('BASEPATH') OR exit('No esta permitido el acceso directo a este script.'); ?> 
<table width="650px" align="center" border="0" cellpadding="0" cellspacing="0" style="font-family: sans-serif;">
	<tr>
		<td>
			<img src="<?= base_url()?>assets/tienda/images/header_email.png" alt="header" style="width: 100%; vertical-align: bottom; border: 0;">
		</td>
	</tr>

	<tr>
		<td style="text-align: center; background-color: #f2f3f4; padding: 20px 0;">
			<h2 style="color: #565656; font-size: 25px; font-weight: 300; margin: 0;">Hola <strong style="color: #f37441;"><?=$nombre?></strong></h2>
			<p style="color: #6d6e71; font-size: 18px; margin: 10px 0;">Confirmación de tu compra en nuestra tienda</p>
			<p style="color: #6d6e71; font-size: 12px; margin: 10px 0;">Fecha de Compra: <span style="color: #f37441;"><?=$fecha_compra?></span></p>
		</td>
	</tr>

	<tr>
		<td style="padding: 10px 0;">
			<table width="100%">
			<tr valign="top">
				<td width="50%">
					<p style="color: #f37441; font-size: 20px; margin: 10px 0; font-weight: 300;">
						<b>Tus Datos:</b>
					</p>
					<?php echo $email_datos; ?><br>
					<?php echo $nombre_datos; ?><br>
					<?php echo $apellidos_datos; ?><br>
					<?php echo $telefono_datos; ?><br>
				</td>
				<td width="50%">
					<p style="color: #f37441; font-size: 20px; margin: 10px 0; font-weight: 300;">
						<b>Dirección de Envío:</b>
					</p>
					<?php echo $direccion_1_datos; ?><br>
					<?php echo $direccion_2_datos; ?><br>
					<?php echo $barrio_datos; ?><br>
					<?php echo $departamento_datos; ?><br>
					<?php echo $municipio_datos; ?><br>
					Colombia<br>
				</td>
			</tr>
			</table>	
		</td>
	</tr>

	<tr>
		<td style="padding: 10px 0;">
			<table width="100%">
				<tr valign="top">
					<td><b style="color: #f37441;">Producto</b></td>
					<td align="right" style="width:100px;"><b style="color: #f37441;">Precio</b></td>
					<td align="right" style="width:100px;"><b style="color: #f37441;">Cant.</b></td>
					<td align="right" style="width:100px;"><b style="color: #f37441;">Total</b></td>
				</tr>
<?php
foreach ($productos as $codigo => $registro) {
?>
				<tr valign="top">
					<td><?php echo $registro['producto']; ?></td>
					<td align="right"><?php echo $registro['precio']; ?></td>
					<td align="right"><?php echo $registro['cantidad']; ?></td>
					<td align="right"><?php echo $registro['total']; ?></td>
				</tr>
<?php	
}
?>

				<tr valign="top">
					<td></td>
					<td></td>
					<td align="right"><span style="color: #565656;">Subtotal:</span></td>
					<td align="right"><?php echo $subtotal; ?></td>
				</tr>
				<tr valign="top">
					<td></td>
					<td></td>
					<td align="right"><span style="color: #565656;">Impuestos:</span></td>
					<td align="right"><?php echo $impuestos; ?></td>
				</tr>
				<tr valign="top">
					<td></td>
					<td></td>
					<td align="right"><span style="color: #565656;">Envio:</span></td>
					<td align="right"><?php echo $envio; ?></td>
				</tr>
				<tr valign="top">
					<td></td>
					<td></td>
					<td align="right"><b style="color: #f37441;">Total:</b></td>
					<td align="right"><?php echo $total; ?></td>
				</tr>

			</table>	
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