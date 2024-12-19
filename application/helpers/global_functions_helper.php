<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (! function_exists('searcharray')) {
    function searcharray($value, $array, $key, $field) {
        // get main CodeIgniter object
        $ci = get_instance();
       
        // Write your logic as per requirement
		foreach ($array as $k => $val) {
			if ($val[$key] == $value) {
				return $val[$field];
			}
		}
		return null;
    }
}

if (! function_exists('removespecialchars')) {
	function removespecialchars ($string) {

		$string = html_entity_decode($string);

		$find = array('à','á','â','ã','ä', 'ç', 'è','é','ê','ë', 'ì','í','î','ï',  'ò','ó','ô','õ','ö', 'ù','ú','û','ü', 'ý','ÿ', 
			'À','Á','Â','Ã','Ä', 'Ç', 'È','É','Ê','Ë', 'Ì','Í','Î','Ï', 'Ò','Ó','Ô','Õ','Ö', 'Ù','Ú','Û','Ü', 'Ý','ñ','Ñ', '"', "'", '´');
		$repl = array('a','a','a','a','a', 'c', 'e','e','e','e', 'i','i','i','i',  'o','o','o','o','o', 'u','u','u','u', 'y','y', 
			'A','A','A','A','A', 'C', 'E','E','E','E', 'I','I','I','I', 'O','O','O','O','O', 'U','U','U','U', 'Y','n','N',  '',  '',  '');
		$text = str_replace($find, $repl, $string);
		return ($text);
	}
}

if ( !function_exists('texttourl') ) {
	function texttourl ($string) {
		$find = array('à','á','â','ã','ä', 'ç', 'è','é','ê','ë', 'ì','í','î','ï', 'ñ', 'ò','ó','ô','õ','ö', 'ù','ú','û','ü', 'ý','ÿ', 'À','Á','Â','Ã','Ä', 'Ç', 'È','É','Ê','Ë', 'Ì','Í','Î','Ï', 'Ñ', 'Ò','Ó','Ô','Õ','Ö', 'Ù','Ú','Û','Ü', 'Ý', '-', ' ');
		$repl = array('a','a','a','a','a', 'c', 'e','e','e','e', 'i','i','i','i', 'n', 'o','o','o','o','o', 'u','u','u','u', 'y','y', 'A','A','A','A','A', 'C', 'E','E','E','E', 'I','I','I','I', 'N', 'O','O','O','O','O', 'U','U','U','U', 'Y', '_', '-');
		return trim(urlencode(strtolower(str_replace($find, $repl, $string))));
	}
}
	
if ( !function_exists('texttovar') ) {
	function texttovar ($string) {
		$find = array('à','á','â','ã','ä', 'ç', 'è','é','ê','ë', 'ì','í','î','ï', 'ñ', 'ò','ó','ô','õ','ö', 'ù','ú','û','ü', 'ý','ÿ', 'À','Á','Â','Ã','Ä', 'Ç', 'È','É','Ê','Ë', 'Ì','Í','Î','Ï', 'Ñ', 'Ò','Ó','Ô','Õ','Ö', 'Ù','Ú','Û','Ü', 'Ý', '-', ' ', '(', ')', '/', '|', "'", "´", ".", ",");
		$repl = array('a','a','a','a','a', 'c', 'e','e','e','e', 'i','i','i','i', 'n', 'o','o','o','o','o', 'u','u','u','u', 'y','y', 'A','A','A','A','A', 'C', 'E','E','E','E', 'I','I','I','I', 'N', 'O','O','O','O','O', 'U','U','U','U', 'Y', '_', '_', '_', '_', '_', '_', '_', '_', "_", "_");
		return trim(strtolower(str_replace($find, $repl, $string)));
	}
}


if ( !function_exists('urltotext') ) {
	function urltotext ($string) {
		$string = urldecode ($string);
		$find = array('-', '_');
		$repl = array(' ', '-');
		return str_replace($find, $repl, $string);
	}
}


/*
function crear_archivo_ren ($nombre, $ext, $contenido) {
	$hoy = date('YmdHis');
	if (existe_archivo ('', $nombre.$ext)) {
		renombrar_archivo ($nombre.$ext, $nombre.'.'.$hoy.$ext);
	}
	// $mat = array();
	$filas = explode("\n", $contenido);
	foreach ($filas as $fila) {
		$mat[] = $fila;
	}
	crear_archivo ('.', $nombre.$ext, $mat);	
}

function cambiar_directorio ($dir) {
	if ( @chdir($dir) ) {
		return 'Cambio de directorio ' . $dir . ' exitoso<br/>';
	} else {
		return 'No fue posible cambiar al directorio ' . $dir . ' <br />';
	}
}
//echo 'Directorio actual: ' . actual_directorio () . '<br />';
//cambiar_directorio ('carpetacreada');
//echo 'Directorio actual: ' . actual_directorio () . '<br />';

function actual_directorio () {
	return getcwd();
}

function leer_directorio ($dir) {
	$archivos = scandir($dir);
	if ( count($archivos) ) {
		sort($archivos);
		for ($i=0; $i<count($archivos); $i++) {
			$tipo = 'Arc';
			if ( is_dir($archivos[$i]) ) 
				$tipo = 'Dir';
			echo $archivos[$i] . ' -->> ' . $tipo . '<br />';
		}
	}
}

function leer_directorio_escaneo ($dir = '.') {
  echo "<ul>";
	$archivos = scandir($dir);
	if ( count($archivos) ) {
		sort($archivos);
		for ($i=0; $i<count($archivos); $i++) {
			if ( is_dir($dir . '/' . $archivos[$i]) ) {
        if ($archivos[$i] != '.' and $archivos[$i] != '..') {
            echo "<li style='color:red;'><span><i class='icon-folder-open'></i> " . $archivos[$i] . "</span>";
            echo leer_directorio_escaneo ($dir . '/' . $archivos[$i]);
            echo "</li>";
        }
      } else {
        echo "<li style='color:black;'><span><i class='icon-leaf'></i> " . $archivos[$i] . "</span> <a href='#'>Comandos</a></li>";
      }
			
		}
	}
  echo "</ul>";
}

// Para Windows
//leer_directorio ('.'); // Directorio actual
//echo '<HR >';
//leer_directorio ('..'); // Directorio padre
//echo '<HR >';
//leer_directorio ('/'); // Directorio raiz
//echo '<HR >';
//leer_directorio ('../bds'); // Directorio padre + otro directorio

function crear_directorio ($dir) {
	if ( @mkdir($dir) ) {
		return 'El directorio ' . $dir . ' fue creado con exito <br />'; 
	} else {
		return 'El directorio ' . $dir . ' no fue creado<br />'; 
	}
}

//echo crear_directorio ('kilo');
//echo cambiar_directorio ('kilo');
//echo crear_directorio ('jajaja');
//echo cambiar_directorio ('jajaja');

function eliminar_directorio ($dir) {
	// Si falla presenta un error en pantalla y solo borra los directorios de la carpeta actual y q este vacio
	if ( @rmdir($dir) ) {
		return 'El directorio ' . $dir . ' fue eliminado con exito <br />'; 
	} else {
		return 'El directorio ' . $dir . ' no fue eliminado<br />'; 
	}
}
//echo cambiar_directorio ('kilo');
//echo eliminar_directorio ('jajaja');
//echo cambiar_directorio ('..');
//echo 'Directorio actual: ' . actual_directorio () . '<br />';
//echo eliminar_directorio ('kilo');

function existe_archivo ($dir,$archivo) {
	if (file_exists($dir.$archivo)) {
		return true; 
	} else {
		return false;
	}
}
//if ( existe_archivo ('prueba2','') ) {
//	echo 'El directorio prueba existe <br />';
//} else {
//	echo 'El directorio prueba no existe <br />';
//}

function copiar_archivo ($dir_ori, $archivo_ori, $dir_des, $archivo_des, $modo) {
	if ( $modo ) {
		if ( existe_archivo ($dir_des,$archivo_des) ) {
			echo 'No se pudo copia el archivo '.$dir_des . $archivo_des.' porque ya existe un archivo con el mismo nombre <br />';
		} else {
			if (!copy($dir_ori . $archivo_ori, $dir_des . $archivo_des)) {
				echo 'No fue posible copiar el archivo '.$dir_des . $archivo_des.'<br />';
			} else {
				echo 'El archivo '.$dir_des . $archivo_des.' se copio con exito <br />';
			}
		}
	} else {
		if (!copy($dir_ori . $archivo_ori, $dir_des . $archivo_des)) {
			echo 'No fue posible copiar el archivo '.$dir_des . $archivo_des.'<br />';
		} else {
			echo 'El archivo '.$dir_des . $archivo_des.' se copio con exito <br />';
		}
	}
}
//copiar_archivo ('', 'sa_fxs.php', 'prueba/', 'funciones.txt', false);

function renombrar_archivo ($actual, $nuevo) {
	if ( rename ($actual, $nuevo) ) {
		return 'El archivo ' . $actual . ' fue renombrado como '.$nuevo.' <br />'; 
	} else {
		return 'El archivo ' . $actual . ' no fue renombrado como '.$nuevo.' <br />'; 
	}
}
//echo renombrar_archivo ('carpetacreada', 'prueba');
//echo renombrar_archivo ('prueba/funciones.txt', 'prueba/borreme.txt');

function eliminar_archivo ($dir, $archivo) {
	if ( @unlink ($dir . $archivo) ) {
		return 'El archivo ' . $dir . $archivo . ' fue eliminado<br />'; 
	} else {
		return 'El archivo ' . $dir . $archivo . ' no fue eliminado<br />'; 
	}
}
//echo eliminar_archivo ('prueba/', 'funciones.txt');


//$gestor = fopen("prueba_fopen.txt", "r"); // Lectura de un archivo
//$gestor = fopen("prueba_fopen.txt", "w+"); // Escritura de un archivo desde el principio
//$gestor = fopen("prueba_fopen.txt", "a+"); // Escritura de un archivo desde el principio
//fclose($gestor); // Cierra el archivo

function leer_archivo ($dir, $archivo) {
	$gestor = @fopen($dir . $archivo, 'r');
	if ($gestor) {
		while (!feof($gestor)) {
			$bufer = fgets($gestor, 4096);
			echo $bufer . '<br />';
		}
		fclose ($gestor);
	} else {
		echo 'No fue posible leer el archivo ' . $dir . $archivo . '<br />';
	}

}

function leer_archivo_mat ($dir, $archivo, $separador) {
	$mat = array();
	$gestor = @fopen($dir . $archivo, 'r');
	if ($gestor) {
		while (!feof($gestor)) {
			$bufer = fgets($gestor, 4096);
			$mat[] = explode($separador, $bufer);
		}
		fclose ($gestor);
	}
	return $mat;
}

//leer_archivo ('','sa_fxs.php');
//leer_archivo ('prueba/','funciones.txt');


function obtener_contenido ($archivo) {
	$contenido = '';
	if (file_exists($archivo)) {
		$contenido = file_get_contents($archivo);
	}
	return $contenido;
}



function abrir_archivo ($dir, $archivo, $modo) {
	return @fopen ($dir . $archivo, $modo);
}

function cerrar_archivo ($gestor) {
	fclose($gestor);
}

function escribir_archivo ($gestor, $contenido) {
	//$contenido .= chr(13) . chr(10);
	if (fwrite($gestor, $contenido) === FALSE) {
		echo 'No se puede escribir el contenido: ' . $contenido;
	}
}


// crear_directorio ('prueba');

//$mat[] = 'Hola';
//$mat[] = 'Kilo';
//$mat[] = 'Linea 3';
//crear_archivo ('prueba', 'kilo.php', $mat);


function crear_archivo ($dir, $archivo, $arr) {
	$abrir_arc = true;
	$dir_completo = '';
	if (trim($dir) != '')
		$dir_completo = $dir . '/'; 
	
	
	
	if ( existe_archivo ($dir_completo, $archivo) ) {
		if ( !is_writable($dir_completo, $archivo) ) {
			$abrir_arc = false;
		}
	}
	if ( $abrir_arc ) {
		$gestor = abrir_archivo ($dir_completo, $archivo, 'w+');
		if ( $gestor ) {
			foreach ($arr as $key => $value) {
				escribir_archivo ($gestor,$value);
			}
      chmod($archivo,0644);
			cerrar_archivo ($gestor);
		} else {
			echo 'No fue posible abrir el archivo '.$dir . '/', $archivo.'<br />';
		}
	} else {
		echo 'No se puede escribir sobre el archivo '.$dir . '/', $archivo.'<br />';
	}
}

// Arreglar funciones y volver todo un objeto, la idea es q esta clase sirva para crear archivos y carpetas para la creacion de formularios

function adicionar_archivo ($dir, $archivo, $arr) {
	$abrir_arc = true;
	$dir_completo = '';
	if (trim($dir) != '')
		$dir_completo = $dir . '/';

    $modo = 'w+';
	if ( existe_archivo ($dir_completo, $archivo) ) {
		if ( !is_writable($dir_completo, $archivo) ) {
			$abrir_arc = false;
            $modo = 'a+';
		}
	}
    $gestor = abrir_archivo ($dir_completo, $archivo, $modo);
    if ( $gestor ) {
            foreach ($arr as $key => $value) {
                    escribir_archivo ($gestor,$value);
            }
            cerrar_archivo ($gestor);
    } else {
            echo 'No fue posible abrir el archivo '.$dir . '/', $archivo.'<br />';
    }

}

*/



