<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include "MailServiceZoho.php";

$correo = new MailService();

$correo->setAddress("solucionaticos@gmail.com");
$correo->setBody(true, 'Prueba de Correo 3', 'Este es el contenido del <u>mensaje</u><br><br><h1>Kilin!!!!</h1>', 'Kilo!');
$correo->send();

echo "Kilo2";