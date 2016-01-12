<?php
if(!isset($_SESSION)) { session_start(); }//session.cookie_lifetime tiene que estar en 0 en el php.ini para que se destruya
error_reporting(0);                       //la sesion al cerrar el navegador.


class login {

    public function logueo() {

        $usuario = filter_input(INPUT_POST, 'username');
        $password = filter_input(INPUT_POST, 'password');



        if ($usuario == "marshal" and $password == "registro1") {
            $_SESSION["session_user"] = $usuario;
            header("Location: ../administradores.php");
        } elseif ($usuario == "robert" and $password == "registro2") {
            $_SESSION["session_user"] = $usuario;
            header("Location: ../usuarios.php");
            
        } else {

            echo '<script language="javascript">alert("Datos Incorrectos");
                  window.location.href="../index.php";
                  </script>';
        }
    }

}
