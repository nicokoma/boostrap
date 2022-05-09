<?php

$nombre = $ _POST['nombre'];
$email = $ _POST['email'];
$mensaje = $ _POST['mensaje'];
$para = 'nicokoma@gmail.com';
$titulo = 'Mensaje de Contacto de v3ktor';
 
$msjCorreo = "Nombre: $nombre\n E-Mail: $email\n Mensaje:\n $mensaje";
 
if ($ _POST['submit']) {
if (mail ($para, $titulo, $msjCorreo)) {
echo 'El mensaje se ha enviado';
} else {
echo 'Falló el envio';
}
}
?>
