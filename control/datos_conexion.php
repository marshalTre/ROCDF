<?php

class conector {

    public static function conexion() {
        $servidor = "localhost";
        $nombreDeUsuario = "root";
        $contrasena = "rocasado78";
        $baseDeDatos = "rocdf";

        $db = new mysqli($servidor, $nombreDeUsuario, $contrasena, $baseDeDatos);

        if ($db->connect_error) {

            echo "<font color='red'><h2>Error en la conexión Intentalo más tarde</h2></font>";
            exit;
        }
        return $db;
    }

}
