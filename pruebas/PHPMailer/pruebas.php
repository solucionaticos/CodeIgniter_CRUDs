<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include "MailService.php";

$correo = new MailService();

$correo->setAddress("solucionaticos@gmail.com");
$correo->setBody(true, 'Prueba de Correo 1', 'Este es el contenido del <u>mensaje</u>', 'Kilo!');
$correo->send();

echo "Kilo2";