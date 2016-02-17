<?php
if(!isset($_SESSION)) { session_start(); }//session.cookie_lifetime tiene que estar en 0 en el php.ini para que se destruya
error_reporting(0);                       //la sesion al cerrar el navegador.
require_once './datos_conexion.php';

class login {

    public function logueo() {

        $usuario = filter_input(INPUT_POST, 'username');
        $password = filter_input(INPUT_POST, 'password');

        $user="SELECT usuario, contrasena from usuarios WHERE usuario='".$usuario."' and contrasena='".$password."'";
        $log = mysqli_query(conector::conexion(), $user);
        

        if ( mysqli_fetch_array($log) > 0) {
            $_SESSION["session_user"] = $usuario;
            header("Location: ../administradores.php");           
        } else {

            echo '<script language="javascript">alert("Datos Incorrectos");
                  window.location.href="../index.html";
                  </script>';
        }
    }

}
