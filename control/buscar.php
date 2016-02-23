<?php
header('Content-Type: text/html; charset=UTF-8');
if (!isset($_SESSION)) {
    session_start();
}
error_reporting(0);

require_once './datos_conexion.php';

$folio = filter_input(INPUT_POST, 'folio');

$buscar = "SELECT * FROM registro_gral where registro= '" . $folio . "'";

$query = mysqli_query(conector::conexion(), $buscar);

if ($query == TRUE) {
    
    while ($reg = mysqli_fetch_array($query)) {

    header('Location: ./controlador.php?numUs= ' . $reg['id_usuarios'] . '');
    }
} else {

     echo '<script language="javascript">alert("No se encontro en la base de datos");
                  window.location.href="../administradores.php";
                  </script>';
}