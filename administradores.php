<?php

session_start();
if (isset($_SESSION["session_user"])) {
    
} else {
    header("location:index.html");
    exit();
}
error_reporting(0);
require_once './control/datos_conexion.php';
$user="SELECT * from usuarios WHERE usuario='".$_SESSION["session_user"]."'";
$queryUs = mysqli_query(conector::conexion(), $user);
?>
<!DOCTYPE html>

<html lang="es">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
        <meta http-equiv='cache-control' content='no-cache'> <meta http-equiv='expires' content='0'> <meta http-equiv='pragma' content='no-cache'>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>
        <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/nav.css">
        <script language=javascript>
            function nuevaventana() {
                window.open(URL, "ventana1", "width=300,height=300,scrollbars=NO")
            }
        </script> 
        <!-- Bootstrap -->
        <link href="css/bootstrap-3.3.6-dist/css/bootstrap.css" rel="stylesheet">
        <link rel="javascript" type="text/javascript" href="css/bootstrap-3.3.6-dist/js/bootstrap.js">
        <script type="text/javascript" src="css/bootstrap-3.3.6-dist/js/jquery-1.11.3.min.js"></script>
        <script type="text/javascript" src="js/eje.js"></script>
        <script type="text/javascript" src="js/subeje.js"></script>
        <script type="text/javascript" src="js/mayusculas.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
 
                //Checkbox
                $("input[name=marcarTodo]").change(function(){
                    $('input[type=checkbox]').each( function() {            
                        if($("input[name=marcarTodo]:checked").length == 1){
                            this.checked = true;
                        } else {
                            this.checked = false;
                        }
                    });
                });
 
            });
        </script>

    </head>

    <body onload="nobackbutton();">
        <header>
            <center>
                <image id="image1" src="images/sedeso.png"/> 
                <image id="image2" src="images/dgids.png"/> 
                <p class="text">ROCDF</p>
                <h3 id="reg" >Registro de Organizaciones Civiles</h3>
                <hr>
            </center>

        </header>
        <nav id="navigation">
            <center>
                <ul>
                    <!-- <li data-toggle="modal" data-target="#imp"><a href="librerias/formatopdf.php">Imprimir</a></li>
                    <li data-toggle="modal" data-target="#mod"><a href="#">Modificar</a></li>
                    <li data-toggle="modal" data-target="#bor"><a href="#">Borrar</a></li>
                    <li><a href='control/cerrarSesion.php' class="btn btn-primary btn-md" target="_top">Salir</a></li>-->
                </ul>
                <?php setlocale(LC_TIME, 'es_ES.UTF-8'); echo strftime("%A, %d de %B de %Y") ?>
            </center>
        </nav>
        
    <!--    <section class="imprimir">
            <div class="modal fade" id="imp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                        </div>
                        <div class="modal-body">
                            Hola aqui va a ir la consulta de lo que se ha capturado
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" data-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-success">Imprimir</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <section class="modificar">
            <div class="modal fade" id="mod" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                        </div>
                        <div class="modal-body">
                            Hola aqui va a ir el formato para modificar
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-warning">Guardar</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <section class="borrar">
            <div class="modal fade" id="bor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                        </div>
                        <div class="modal-body">
                            Hola aqui va a ir el formato para borrar
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-danger">Borrar</button>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->

        <div class="container-fluid"></br></br></br>          
            <form action="control/insertar.php" method="post">
                <!-- <label>Folio de recepci&oacute;n</label></br>
                    <input type="text" name="folio" class="folio" placeholder="Folio"></br></br>-->
            <div class="row">
                <div class="col-md-6">
                    <label>Nombre de la organizaci&oacute;n</label></br>
                    <input type="text" name="nom_org" class="organizacion" placeholder="Nombre de la organizaci&oacute;n" size="70" onChange="conMayusculas(this)" required >
                </div>
                <div class="col-md-3 col-md-offset-2">
                    <label>Tipo de organizaci&oacute;n</label></br>
                        <select name="tipo_org">
                            <option value=""></option>
                            <option value="A.C.">Asociaci&oacute;n Civil</option>
                            <option value="I.A.P">Instituci&oacute;n de Asistencia Privada</option>
                            <option value="S.C.">Sociedad Civil</option>
                            <option value="OT">Otra</option>
                        </select></br></br>
                </div>    
            </div>
            <div class="row">
                <div class="col-md-5">            
                    <label>Nombre del representante legal</label></br>
                    <input type="text" name="rep_legal" class="repre" placeholder="Representante" size="60" onChange="conMayusculas(this)" required >
                </div>
                <div class="col-md-3 col-md-offset-2">
                    <label>Registro</label></br>
                    <input type="text" name="registro" class="registro" placeholder="Registro" onChange="conMayusculas(this)" required ></br>
                </div>
            </div></br></br>
            <div class="row">
                <div class="col-md-3">
                    <label>Calle</label></br>
                    <input type="text" name="calle" class="calle" placeholder="Calle" size="40" onChange="conMayusculas(this)" required >
                </div>
                <div class="col-md-2 col-md-offset-1">
                    <label>N&uacute;mero ext. o int.</label>
                    <input type="text" name="num_ext" class="num_ext" placeholder="N&uacute;mero" onChange="conMayusculas(this)" required ></br>
                </div>
                <div class="col-md-2">
                    <label>Colonia</label></br>
                    <input type="text" name="colonia" class="colonia" placeholder="Colonia" onChange="conMayusculas(this)" required ></br>
                </div>
                <div class="col-md-2">
                    <label>Delegaci&oacute;n Pol&iacute;tica</label></br>
                    <select name="delegacion">
                        <option value=""></option>
                        <option value="ALVARO OBREGON">&Aacute;lvaro Obreg&oacute;n</option>
                        <option value="AZCAPOTZALCO">Azcapotzalco</option>
                        <option value="BENITO JUAREZ">Benito Ju&aacute;rez</option>
                        <option value="COYOACAN">Coyoac&aacute;n</option>
                        <option value="CUJIMALPA">Cuajimalpa</option>
                        <option value="CUAUHTEMOC">Cuauht&eacute;moc</option>
                        <option value="GUSTAVO A. MADERO">Gustavo A. Madero</option>
                        <option value="IZTACALCO">Iztacalco</option>
                        <option value="IZTAPALAPA">Iztapalapa</option>
                        <option value="MAGDALENA CONTRERAS">Magdalena Contreras</option>
                        <option value="MIGUEL HIDALGO">Miguel Hidalgo</option>
                        <option value="MILPA ALTA">Milpa Alta</option>
                        <option value="TLAHUAC">Tl&aacute;huac</option>
                        <option value="TLALPAN">Tlalpan</option>
                        <option value="VENUSTIANO CARRANZA">Venustiano Carranza</option>
                        <option value="XOCHIMILCO">Xochimilco</option>
                    </select></br><br>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2"> 
                    <label>C&oacute;digo Postal</label></br>
                    <input type="text" name="cod_postal" class="cod_postal" placeholder="C.P." size="6" required="" onkeypress="return soloNumeros(event)"></br>
                </div>
                <div class="col-md-2">                
                    <label>Tel&eacute;fono Fijo</label></br>                
                    <input type="text" name="tel_fijo" class="tel_fijo" placeholder="Tel&eacute;fono" required="" onkeypress="return soloNumeros(event)"></br>
                </div>
                <div class="col-md-2">
                    <label>Tel&eacute;fono M&oacute;vil</label></br>
                    <input type="text" name="tel_movil" class="tel_movil" placeholder="Tel&eacute;fono" required="" onkeypress="return soloNumeros(event)"></br>
                </div>
                <div class="col-md-2">
                    <label>P&aacute;gina de Internet</label></br>
                    <input type="text" name="pag_int" class="pag_int" placeholder="P&aacute;gina de Internet"></br>
                </div>
                <div class="col-md-3">
                    <label>Correo Electr&oacute;nico</label></br>                
                    <input type="email" name="correo" class="correo" placeholder="Email" required=""></br></br>
                </div>
            </div>
                <label>Nombre del Proyecto</label></br>
                <input type="text" name="nom_proyecto" class="nom_proyecto" placeholder="Proyecto" size="100" onChange="conMayusculas(this)" required ></br></br>
                <label>Nombre del Responsable del Proyecto</label></br>
                <input type="text" name="nom_resp" class="nom_resp" placeholder="Responsable del proyecto" size="60" onChange="conMayusculas(this)" required ></br></br>
            <div class="row">
                <div class="col-md-2">
                    <label>Eje Tem&aacute;tico</label></br>
                    <select id="eje" name="eje_tem" onChange="mostrar(this.value);">
                        <option value=""></option>
                        <option value="1">Eje 1</option>
                        <option value="2">Eje 2</option>
                        <option value="3">Eje 3</option>
                        <option value="4">Eje 4</option>
                        <option value="5">Eje 5</option>
                        <option value="6">Eje 6</option>
                        <option value="7">Eje 7</option>
                        <option value="8">Eje 8</option>
                        <option value="9">Eje 9</option>
                        <option value="10">Eje 10</option>
                        <option value="11">Eje 11</option>
                        <option value="12">Eje 12</option>
                    </select></br></br>
                </div>
                <div class="col-md-9">
                    <div id="1" style="display: none;"><br>
                        <label>Eje 1) Atenci&oacute;n y prevenci&oacute;n de la violencia familiar.</label>
                    </div>
                    <div id="2" style="display: none;"><br>
                        <label>Eje 2) Promoci&oacute;n de acciones y medidas para la educaci&oacute;n social, cultural y emocional, de las personas agresoras y de las v&iacute;ctimas de la violencia familiar para la Ciudad de M&eacute;xico.</label>
                    </div>
                    <div id="3" style="display: none;"><br>
                        <label>Eje 3) Fortalecimiento de acciones de prevenci&oacute;n de violencia familiar con estrategias de desarrollo social y comunitario.</label>
                    </div>
                    <div id="4" style="display: none;"><br>
                        <label>Eje 4) Fortalecimiento de la participaci&oacute;n comunitaria en la pol&iacute;tica alimentaria. </label>
                    </div>
                    <div id="5" style="display: none;"><br>
                        <label>Eje 5) Impulsar el fortalecimiento de los procesos organizativos en los comedores comunitarios.</label>
                    </div>
                    <div id="6" style="display: none;"><br>
                        <label>Eje 6) Promover la capacitaci&oacute;n y manejo en la administraci&oacute;n de alimentos en los comedores comunitarios, en temas tales como: higiene, administraci&oacute;n, variedad alimenticia, dietas saludables, acceso a bancos de alimentos, manejo de desechos, sostenibilidad y viabilidad financiera.</label>
                    </div>
                    <div id="7" style="display: none;"><br>
                        <label>Eje 7) Promoci&oacute;n y fortalecimiento de las pol&iacute;ticas sociales.</label>
                    </div>
                    <div id="8" style="display: none;"><br>
                        <label>Eje 8) Impulsar procesos de fortalecimiento de las pol&iacute;ticas p&uacute;blicas de fomento a las organizaciones de la sociedad civil. </label>
                    </div>
                    <div id="9" style="display: none;"><br>
                        <label>Eje 9) Profesionalizaci&oacute;n de las organizaciones de la sociedad civil para aumentar su incidencia en el &aacute;mbito comunitario. </label>
                    </div>
                    <div id="10" style="display: none;"><br>
                        <label>Eje 10) Promoci&oacute;n de los Derechos de Acceso a la Informaci&oacute;n P&uacute;blica y Protecci&oacute;n de Datos Personales. </label>
                    </div>
                    <div id="11" style="display: none;"><br>
                        <label>Eje 11) Fortalecimiento para el sano desarrollo y garant&iacute;a de derechos humanos para poblaci&oacute;n en vulnerabilidad. </label>
                    </div>
                    <div id="12" style="display: none;"><br>
                        <label>Eje 12) Promoci&oacute;n y acceso de las mujeres al ejercicio de sus derechos humanos y a una vida libre de violencias. </label>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                <label>Sub Eje</label></br>
                <select id="subeje" name="sub_eje" onChange="mostrarr(this.value);">
                    <option value=""></option>
                    <option value="sub_1_1">1.1</option>
                    <option value="sub_1_2">1.2</option>
                    <option value="sub_1_3">1.3</option>
                    <option value="sub_1_4">1.4</option>
                    <option value="sub_2_1">2.1</option>
                    <option value="sub_2_2">2.2</option>
                    <option value="sub_2_3">2.3</option>
                    <option value="sub_3_1">3.1</option>
                    <option value="sub_3_2">3.2</option>
                    <option value="sub_3_3">3.3</option>
                    <option value="sub_4_1">4.1</option>
                    <option value="sub_5_1">5.1</option>
                    <option value="sub_6_1">6.1</option>
                    <option value="sub_7_1">7.1</option>
                    <option value="sub_7_2">7.2</option>
                    <option value="sub_7_3">7.3</option>
                    <option value="sub_7_4">7.4</option>
                    <option value="sub_7_5">7.5</option>
                    <option value="sub_7_6">7.6</option>
                    <option value="sub_8_1">8.1</option>
                    <option value="sub_9_1">9.1</option>
                    <option value="sub_10_1">10.1</option>
                    <option value="sub_10_2">10.2</option>
                    <option value="sub_11_1">11.1</option>
                    <option value="sub_11_2">11.2</option>
                    <option value="sub_11_3">11.3</option>
                    <option value="sub_11_4">11.4</option>
                    <option value="sub_11_5">11.5</option>
                    <option value="sub_11_6">11.6</option>
                    <option value="sub_11_7">11.7</option>
                    <option value="sub_11_8">11.8</option>
                    <option value="sub_11_9">11.9</option>
                    <option value="sub_11_10">11.10</option>
                    <option value="sub_11_11">11.11</option>
                    <option value="sub_11_12">11.12</option>
                    <option value="sub_11_13">11.13</option>
                    <option value="sub_11_14">11.14</option>
                    <option value="sub_11_15">11.15</option>
                    <option value="sub_11_16">11.16</option>
                    <option value="sub_12_1">12.1</option>
                    <option value="sub_12_2">12.2</option>
                    <option value="sub_12_3">12.3</option>
                    <option value="sub_12_4">12.4</option>
                    <option value="sub_12_5">12.5</option>
                    <option value="sub_12_6">12.6</option>
                    <option value="sub_12_7">12.7</option>
                    <option value="sub_12_8">12.8</option>
                    <option value="sub_12_9">12.9</option>
                    <option value="sub_12_10">12.10</option>
                    <option value="sub_12_11">12.11</option>
                    <option value="sub_12_12">12.12</option>
                    <option value="sub_12_13">12.13</option>
                </select>
                </div>

            <div class="col-md-9">
                    <div id="sub_1_1" style="display: none;"><br>
                        <h5>1.1  Fomentar, promover y proporcionar capacitaci&oacute;n en diferentes ramas productivas, para contribuir a que las mujeres se reintegren a una vida social y familiar libre de violencias, junto con sus hijas e hijos.</h5>
                    </div>
                    <div id="sub_1_2" style="display: none;"><br>
                        <h5>1.2  Fortalecimiento de las capacidades a las y los servidores p&uacute;blicos para la mejor atenci&oacute;n en materia de violencia familiar con perspectiva de g&eacute;nero y derechos humanos.</h5>
                    </div>
                    <div id="sub_1_3" style="display: none;"><br>
                        <h5>1.3  Apoyo psicol&oacute;gico y jur&iacute;dico a mujeres v&iacute;ctimas de violencia familiar y sus hijas e hijos.</h5>
                    </div>
                    <div id="sub_1_4" style="display: none;"><br>
                        <h5>1.4  Seguimiento y an&aacute;lisis de la aplicaci&oacute;n de la normatividad en materia de violencia familiar para la Ciudad de M&eacute;xico.</h5>
                    </div>
                    <div id="sub_2_1" style="display: none;"><br>
                        <h5>2.1  Fomentar, promover y proporcionar capacitaci&oacute;n a mujeres v&iacute;ctimas de violencia familiar, garantizando el acceso al empleo, a trav&eacute;s de oficios o mejoras de sus habilidades en el trabajo y/o actualizaci&oacute;n de sus estudios a trav&eacute;s de becas, como un medio para fortalecer e implementar proyectos productivos. </h5>
                    </div>
                    <div id="sub_2_2" style="display: none;"><br>
                        <h5>2.2  Fomento de acciones de prevenci&oacute;n de la violencia familiar y del buen trato en las escuelas de la Ciudad de M&eacute;xico.</h5>
                    </div>
                    <div id="sub_2_3" style="display: none;"><br>
                        <h5>2.3  Fortalecimiento de las pol&iacute;ticas p&uacute;blicas a trav&eacute;s de la equidad, democracia, los derechos humanos para prevenci&oacute;n de la violencia al interior de las familias diversas.</h5>
                    </div>
                    <div id="sub_3_1" style="display: none;"><br>
                        <h5>3.1  Fomentar, promover y proporcionar capacitaci&oacute;n para el empleo, dirigido  a las mujeres v&iacute;ctimas de violencia familiar, con la finalidad de brindar las condiciones b&aacute;sicas necesarias para impulsar su autonom&iacute;a y continuar su proceso de atenci&oacute;n especializada, hasta lograr vivir una vida libre de violencia, en condiciones m&iacute;nimas de independencia econ&oacute;mica, logrando en su toma de decisiones, su empoderamiento y el rescate de sus derechos.</h5>
                    </div>
                    <div id="sub_3_2" style="display: none;"><br>
                        <h5>3.2  Apoyo e inclusi&oacute;n de las mujeres ind&iacute;genas v&iacute;ctimas de violencia, en el conocimiento de sus derechos y acompa&ntilde;amiento de traductores.</h5>
                    </div>
                    <div id="sub_3_3" style="display: none;"><br>
                        <h5>3.3  Fortalecimiento de las pol&iacute;ticas p&uacute;blicas a trav&eacute;s de participaci&oacute;n activa en ferias gubernamentales, tendientes a erradicar la violencia familiar.</h5>
                    </div>
                    <div id="sub_4_1" style="display: none;"><br>
                        <h5>4.1  Acciones para el fortalecimiento de la participaci&oacute;n comunitaria en la pol&iacute;tica alimentaria, a trav&eacute;s de la generaci&oacute;n de empleos, autosuficiencia econ&oacute;mica y alimentaria.</h5>
                    </div>
                    <div id="sub_5_1" style="display: none;"><br>
                        <h5>5.1  Acciones para impulsar el fortalecimiento de los procesos organizativos en los comedores comunitarios, a trav&eacute;s de capacitaciones con reconocimiento oficial, garantizando su profesionalizaci&oacute;n derivando en la optimizaci&oacute;n de los comedores y en su caso, la auto realizaci&oacute;n personal.</h5>
                    </div>
                    <div id="sub_6_1" style="display: none;"><br>
                        <h5>6.1  Proyectos encaminados a la capacitaci&oacute;n y manejo en la administraci&oacute;n de alimentos en los comedores comunitarios, en temas tales como: higiene, administraci&oacute;n, variedad alimenticia, dietas saludables, acceso a bancos de alimentos, manejo de desechos, sostenibilidad y viabilidad financiera, dirigidos a los administradores y a la poblaci&oacute;n atendida en los comedores comunitarios.</h5>
                    </div>
                    <div id="sub_7_1" style="display: none;"><br>
                        <h5>7.1  Fomentar, promover y proporcionar las condiciones adecuadas de inserci&oacute;n e integraci&oacute;n laboral  de la poblaci&oacute;n LGBTTTI de la Ciudad de M&eacute;xico.</h5>
                    </div>
                    <div id="sub_7_2" style="display: none;"><br>
                        <h5>7.2  Implementar acciones concretas para la inclusi&oacute;n laboral y prevenci&oacute;n de la discriminaci&oacute;n por orientaci&oacute;n sexual e identidad de g&eacute;nero en &aacute;mbitos laborales.</h5>
                    </div>
                    <div id="sub_7_3" style="display: none;"><br>
                        <h5>7.3  Conformaci&oacute;n de emprendimientos productivos de la poblaci&oacute;n LGBTTTI de la Ciudad de M&eacute;xico. </h5>
                    </div>
                    <div id="sub_7_4" style="display: none;"><br>
                        <h5>7.4  Facilitar la inserci&oacute;n laboral de la poblaci&oacute;n LGBTTTI de la Ciudad de M&eacute;xico a trav&eacute;s de la adquisici&oacute;n de un oficio en el marco del auto empleo y la implementaci&oacute;n de proyectos productivos.</h5>
                    </div>
                    <div id="sub_7_5" style="display: none;"><br>
                        <h5>7.5  Fortalecimiento de una cultura de inclusi&oacute;n, respeto y reconocimiento a la diversidad sexual y las familias diversas.</h5>
                    </div>
                    <div id="sub_7_6" style="display: none;"><br>
                        <h5>7.6  Promoci&oacute;n de la defensa, el goce y el ejercicio de los derechos humanos y la no discriminaci&oacute;n en todos los &aacute;mbitos.</h5>
                    </div>
                    <div id="sub_8_1" style="display: none;"><br>
                        <h5>8.1  Capacitaci&oacute;n a las organizaciones de la sociedad civil para fortalecer las capacidades y  los modelos de profesionalizaci&oacute;n, con la finalidad de  consolidar su incidencia en el dise&ntilde;o, instrumentaci&oacute;n y evaluaci&oacute;n de programas y pol&iacute;ticas sociales.</h5>
                    </div>
                    <div id="sub_9_1" style="display: none;"><br>
                        <h5>9.1  Capacitaci&oacute;n a  organizaciones civiles que contribuyan a promover el  crecimiento econ&oacute;mico, el ingreso y el autoempleo, generando acciones para la autosustentabilidad econ&oacute;mica de grupos de mujeres y hombres y de comunidades para realizar proyectos productivos.</h5>
                    </div>
                    <div id="sub_10_1" style="display: none;"><br>
                        <h5>10.1  Fortalecer estrategias (Capacitaci&oacute;n, promoci&oacute;n, difusi&oacute;n, contralor&iacute;a y participaci&oacute;n ciudadana), con la finalidad de incrementar las capacidades de la ciudadan&iacute;a en general, con base en los derechos de acceso a la informaci&oacute;n p&uacute;blica y de protecci&oacute;n de datos personales.</h5>
                    </div>
                    <div id="sub_10_2" style="display: none;"><br>
                        <h5>10.2  Incrementar el conocimiento sobre los temas transparencia, derecho de acceso a la informaci&oacute;n p&uacute;blica y derecho de protecci&oacute;n de datos personales, a trav&eacute;s de proyectos culturales, que incluyan una amplia difusi&oacute;n en la Ciudad de M&eacute;xico.</h5>
                    </div>
                    <div id="sub_11_1" style="display: none;"><br>
                        <h5>11.1  Fomentar la lactancia materna, coadyuvar con las instituciones p&uacute;blicas para brindar a ni&ntilde;as y ni&ntilde;os estimulaci&oacute;n temprana, capacitar a padres y madres respecto a los nuevos modelos de crianza, fortalecer las capacidades y/o habilidades en el personal profesional que atiende primera infancia. Estimulaci&oacute;n temprana: implementar con las ni&ntilde;as y ni&ntilde;os canalizados por los Centros del DIF-CDMX, t&eacute;cnicas para el desarrollo de las capacidades y habilidades de los ni&ntilde;os en la primera infancia, entre el nacimiento y los seis a&ntilde;os de vida, para corregir trastornos reales o potenciales en su desarrollo, o para estimular capacidades compensadoras; teniendo en cuenta tanto al menor como a la familia y su entorno social.</h5>
                    </div>
                    <div id="sub_11_2" style="display: none;"><br>
                        <h5>11.2  Fomentar una nutrici&oacute;n adecuada y apoyar para que la alimentaci&oacute;n sea accesible para las ni&ntilde;as, ni&ntilde;os y adolescentes.</h5>
                    </div>
                    <div id="sub_11_3" style="display: none;"><br>
                        <h5>11.3  Implementar estrategias para prevenir, detectar y erradicar la violencia infantil en todos los &aacute;mbitos, fomentar una cultura de paz, prevenir conductas autodestructivas, evitar que las ni&ntilde;as, ni&ntilde;os y adolescentes sean v&iacute;ctimas de cualquier forma de explotaci&oacute;n econ&oacute;mica y salgan del entorno familiar hacia las calles.</h5>
                    </div>
                    <div id="sub_11_4" style="display: none;"><br>
                        <h5>11.4  Fomentar la participaci&oacute;n infantil y adolescente y formar promotores de los derechos humanos desde la infancia.</h5>
                    </div>
                    <div id="sub_11_5" style="display: none;"><br>
                        <h5>11.5  Implementar procesos de comunicaci&oacute;n social que garanticen el derecho a la libre expresi&oacute;n e informaci&oacute;n.</h5>
                    </div>
                    <div id="sub_11_6" style="display: none;"><br>
                        <h5>11.6  Acompa&ntilde;ar y apoyar a ni&ntilde;as, ni&ntilde;os y adolescentes con bajo rendimiento escolar y fomentar entre ellas y ellos la realizaci&oacute;n de actividades deportivas y culturales para lograr su desarrollo integral.</h5>
                    </div>
                    <div id="sub_11_7" style="display: none;"><br>
                        <h5>11.7  Fomentar entre los adolescentes el ejercicio responsable de derechos sexuales y reproductivos a fin de prevenir enfermedades de transmisi&oacute;n sexual y embarazo adolescente y capacitar a las ni&ntilde;as, ni&ntilde;os y adolescentes en masculinidades y paternidades responsables.</h5>
                    </div>
                    <div id="sub_11_8" style="display: none;"><br>
                        <h5>11.8  Brindar capacitaci&oacute;n multidisciplinaria a los derechohabientes de sociedades cooperativas.</h5>
                    </div>
                    <div id="sub_11_9" style="display: none;"><br>
                        <h5>11.9  Fomentar la participaci&oacute;n de la ciudadana en la toma de decisiones gubernamentales encaminadas a garantizar el ejercicio de sus derechos humanos y generar redes de apoyo vecinal que garanticen el derecho de las comunidades a vivir en paz y a disfrutar de los espacios p&uacute;blicos.</h5>
                    </div>
                    <div id="sub_11_10" style="display: none;"><br>
                        <h5>11.10  Dise&ntilde;o, promoci&oacute;n, defensa, difusi&oacute;n, ejercicio e implementaci&oacute;n de acciones que garanticen los derechos humanos de las personas con discapacidad  (ni&ntilde;os, ni&ntilde;as, adolescentes mujeres y hombres, adultas, adultos; adultas mayores y adultos mayores).</h5>
                    </div>
                    <div id="sub_11_11" style="display: none;"><br>
                        <h5>11.11  Capacitaci&oacute;n y actualizaci&oacute;n institucional en materia de rehabilitaci&oacute;n, terapia f&iacute;sica, terapia del Lenguaje, terapia ocupacional, para personal profesional especializado que trabaja con las personas con discapacidad.</h5>
                    </div>
                    <div id="sub_11_12" style="display: none;"><br>
                        <h5>11.12  Capacitaci&oacute;n e instrucci&oacute;n profesional para cuidados alternativos a familiares, cuidadores y personal que atiende a personas con discapacidad, psicosocial e intelectual.</h5>
                    </div>
                    <div id="sub_11_13" style="display: none;"><br>
                        <h5>11.13  Fomento de actividades que promuevan el dise&ntilde;o universal y los ajustes razonables para personas con discapacidad.</h5>
                    </div>
                    <div id="sub_11_14" style="display: none;"><br>
                        <h5>11.14  Desarrollo de actividades que promuevan la autonom&iacute;a y la vida independiente de las personas con discapacidad mediante actividades de inclusi&oacute;n educativa, deportiva, recreativa y cultural.</h5>
                    </div>
                    <div id="sub_11_15" style="display: none;"><br>
                        <h5>11.15  Promoci&oacute;n de Talleres productivos, microempresas, cooperativas, promoviendo la inclusi&oacute;n laboral de las personas con discapacidad.</h5>
                    </div>
                    <div id="sub_11_16" style="display: none;"><br>
                        <h5>11.16  Atenci&oacute;n e integraci&oacute;n social a ni&ntilde;as, ni&ntilde;os y adolescentes que se encuentran en una condici&oacute;n vulnerable, mediante la intervenci&oacute;n de albergues y hogares provisionales.</h5>
                    </div>
                    <div id="sub_12_1" style="display: none;"><br>
                        <h5>12.1  Acciones para la elaboraci&oacute;n de pol&iacute;ticas p&uacute;blicas dirigidas a la atenci&oacute;n de las ni&ntilde;as en la Ciudad de M&eacute;xico.</h5>
                    </div>
                    <div id="sub_12_2" style="display: none;"><br>
                        <h5>12.2  Acciones para la prevenci&oacute;n y atenci&oacute;n del embarazo adolescente.</h5>
                    </div>
                    <div id="sub_12_3" style="display: none;"><br>
                        <h5>12.3  Desarrollo de propuestas a partir de experiencias exitosas para la autonom&iacute;a econ&oacute;mica de las mujeres en la Ciudad de M&eacute;xico.</h5>
                    </div>
                    <div id="sub_12_4" style="display: none;"><br>
                        <h5>12.4  Propuestas sobre alternativas sociales para el trabajo de cuidado.</h5>
                    </div>
                    <div id="sub_12_5" style="display: none;"><br>
                        <h5>12.5  Propuestas para la atenci&oacute;n, prevenci&oacute;n de la violencia contra las ni&ntilde;as y mujeres en la  Ciudad de M&eacute;xico.</h5>
                    </div>
                    <div id="sub_12_6" style="display: none;"><br>
                        <h5>12.6  Propuesta para promover y garantizar los derechos sexuales y reproductivos de las mujeres y las adolescentes en la Ciudad de M&eacute;xico.</h5>
                    </div>
                    <div id="sub_12_7" style="display: none;"><br>
                        <h5>12.7  Proyectos para el desarrollo de habilidades digitales de las mujeres  y ni&ntilde;as a fin de  favorecer su empoderamiento.</h5>
                    </div>
                    <div id="sub_12_8" style="display: none;"><br>
                        <h5>12.8  Acciones para la recuperaci&oacute;n y sustentabilidad ecol&oacute;gica con  participaci&oacute;n de las mujeres y con enfoque productivo.</h5>
                    </div>
                    <div id="sub_12_9" style="display: none;"><br>
                        <h5>12.9  Acciones que promuevan el ejercicio de los derechos humanos de las mujeres y las ni&ntilde;as en la Ciudad de M&eacute;xico a trav&eacute;s de actividades audivisuales, culturales y artes esc&eacute;nicas, con &eacute;nfasis en grupos m&aacute;s desfavorecidos.</h5>
                    </div>
                    <div id="sub_12_10" style="display: none;"><br>
                        <h5>12.10  Propuestas para promoci&oacute;n del goce y ejercicio de los derechos humanos de las trabajadoras del hogar.</h5>
                    </div>
                    <div id="sub_12_11" style="display: none;"><br>
                        <h5>12.11  Propuestas para la reducci&oacute;n de la violencia y la discriminaci&oacute;n contra las mujeres lesbianas, bisexuales, transg&eacute;nero y transexuales, as&iacute; como promover su empoderamiento.</h5>
                    </div>
                    <div id="sub_12_12" style="display: none;"><br>
                        <h5>12.12  Promoci&oacute;n de la defensa, goce y el ejercicio de los derechos humanos de las mujeres en reclusi&oacute;n.</h5>
                    </div>
                    <div id="sub_12_13" style="display: none;"><br>
                        <h5>12.13  Fomento de acciones para la prevenci&oacute;n y atenci&oacute;n de las v&iacute;ctimas de la trata y la explotaci&oacute;n humana con especial &eacute;nfasis en protecci&oacute;n a mujeres ind&iacute;genas y migrantes.</h5>
                    </div>
                   
            </div>
            </div>
        <br><br>
                <h3 align=center >Delegaciones de Intervenci&oacute;n y/o Interacci&oacute;n</h3><br><br>
            <div id="del_intera">
                <div class="col-md-2">
                    <label><input type="checkbox" value="SI" name="del_alvaro" id="1">Álvaro Obreg&oacute;n</label>
                </div>
                <div class="col-md-2">
                    <label><input type="checkbox" value="SI" name="del_azcapotzalco" id="2">Azcapotzalco</label>
                </div>
                <div class="col-md-2">
                    <label><input type="checkbox" value="SI" name="del_benito" id="3">Benito Ju&aacute;rez</label>
                </div>
                <div class="col-md-2">
                    <label><input type="checkbox" value="SI" name="del_coyoacan" id="4">Coyoac&aacute;n</label>
                </div>
                <div class="col-md-2">
                    <label><input type="checkbox" value="SI"name="del_cuajimalpa" id="5">Cuajimalpa</label>
                </div>
                <div class="col-md-2">
                    <label><input type="checkbox" value="SI" name="del_cuauhtemoc" id="6">Cuauht&eacute;moc</label>
                </div>
                <div class="col-md-2">
                    <label><input type="checkbox" value="SI" name="del_gustavo" id="7">Gustavo A. Madero</label>
                </div>
                <div class="col-md-2">
                    <label><input type="checkbox" value="SI" name="del_iztacalco" id="8">Iztacalco</label>
                </div>
                <div class="col-md-2">
                    <label><input type="checkbox" value="SI" name="del_iztapalapa" id="9">Iztapalapa</label>
                </div>
                <div class="col-md-2">
                    <label><input type="checkbox" value="SI" name="del_magdalena" id="10">Magdalena Contreras</label>
                </div>
                <div class="col-md-2">
                    <label><input type="checkbox" value="SI" name="del_miguel" id="11">Miguel Hidalgo</label>
                </div>
                <div class="col-md-2">
                    <label><input type="checkbox" value="SI" name="del_milpa" id="12">Milpa Alta</label>
                </div>
                <div class="col-md-2">
                    <label><input type="checkbox" value="SI" name="del_tlahuac" id="13">Tl&aacute;huac</label>
                </div>
                <div class="col-md-2">
                    <label><input type="checkbox" value="SI" name="del_tlalpan" id="14">Tlalpan</label>
                </div>
                <div class="col-md-2">
                    <label><input type="checkbox" value="SI" name="del_venustiano" id="15">Venustiano Carranza</label>
                </div>
                <div class="col-md-2">
                    <label><input type="checkbox" value="SI" name="del_xochimilco" id="16">Xochimilco</label>
                </div>
                <div class="row">
                    <div class="col-md-1 col-md-offset-5">
                        <label><input type="checkbox" value="ABCDEFGHIJKLMNO" name="marcarTodo" id="marcarTodo">Todas</label>
                        <label for="marcarTodo"></label>
                    </div>
                </div>
            </div>
            <div class="row"><br><br>
                <div class="col-md-3">
                    <label>Instituci&oacute;n que dictamina</label></br>
                        <select name="ins_dic">
                            <option value=""></option>
                            <option value="DGIDS">DGIDS</option>
                            <option value="DIF" >DIF</option>
                            <option value="INMUJERES">Inmujeres</option>
                            <option value="INFODF">INFODF</option>
                        </select>
                </div>
                <div class="col-md-3 col-md-offset-2">
                    <label>Tipo de proyecto</label></br>
                        <select name="tipo_proyecto">
                            <option value=""></option>
                            <option value="NUEVO">Nuevo</option>
                            <option value="CONTINUIDAD">Continuidad</option>
                        </select>
                </div>
                <div class="col-md-2 col-md-offset-2">
                    <label>Monto solicitado</label></br>
                    <input type="text" name="mon_sol" class="mon_sol" placeholder="Monto Solicitado" required="" onkeypress="return soloNumeros(event)"></br>
                </div>
            </div><br>
            <div class="row">
                <div class="col-md-3">
                    <label>Poblaci&oacute;n Objetivo</label>
                        <select name="pob_obj">
                            <option value=""></option>
                            <option value="1">Personas Adultas Mayores</option>
                            <option value="2">Comites Ciudadanos</option>
                            <option value="3">Personas con Discapacidad</option>
                            <option value="4">Hombres</option>
                            <option value="5">Jovenes</option>
                            <option value="6">Mujeres</option>
                            <option value="7">Ni&ntilde;as/Ni&ntilde;os</option>
                            <option value="8">Organizaciones Sociales</option>
                            <option value="9">Poblaci&oacute;n en General</option>
                            <option value="10">Poblaci&oacute;n LGBTTTI</option>
                            <option value="11">Pueblos y Colectividades Indigenas</option>
                        </select>
                </div>
                        <div class="col-md-2 col-md-offset-2">
                            <label>Mujeres</label></br>
                            <input type="text" name="num_mujeres" class="internet" placeholder="No. Mujeres" required="" onkeypress="return soloNumeros(event)">
                        </div>
                        <div class="col-md-2 col-md-offset-2">
                            <label>Hombres</label></br>
                            <input type="text" name="num_hombres" class="internet" placeholder="No. Hombres" required="" onkeypress="return soloNumeros(event)"></br>
                        </div>
            </div></br>
            <div class="row">
                    <div class="form-group">
                        <label for="comment">Objetivo general del Proyecto</label>
                        <textarea  name="objetivo" class="form-control" rows="5" id="comment" onChange="conMayusculas(this)" required ></textarea>
                    </div>

            </div>
            <div class="row">
                <table class="table">
                    <label>Requisitos</label>
                    <tbody>
                        <tr>
                            <td>1. Proyecto y ficha t&eacute;cnica (original y copia impresas)</td>
                            <td> 
                                    <label class="radio-inline">
                                        <input type="radio" name="rec_ficha_tec" value='SI'>S&iacute;
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="rec_ficha_tec" value='NO'>No
                                    </label>
                            </td>
                        </tr>
                        <tr>
                            <td>2. Archivo electr&oacute;nico del proyecto y ficha t&eacute;cnica (CD o USB)</td>
                            <td>
                                    <label class="radio-inline">
                                        <input type="radio" name="rec_arch_elec" value='SI'>S&iacute;
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="rec_arch_elec" value='NO'>No
                                    </label>
                            </td>
                        </tr>
                        <tr>
                            <td>3. Copia fotost&aacute;tica simple de la Constancia de inscripci&oacute;n en el Registro de Organizaciones Civiles del Distrito Federal</td>
                            <td>
                                    <label class="radio-inline">
                                        <input type="radio" name="rec_cons_insc" value='SI'>S&iacute;
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="rec_cons_insc" value='NO'>No
                                    </label>
                            </td>
                        </tr>
                        <tr>
                            <td>4. Carta compromiso (original y copia impresa)</td>
                            <td>
                                    <label class="radio-inline">
                                        <input type="radio" name="rec_carta" value='SI'>S&iacute;
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="rec_carta" value='NO'>No
                                    </label>
                            </td>
                        </tr>
                        <tr>
                            <td>5. Constancia de participaci&oacute;n de la pl&aacute;tica informativa</td>
                            <td>
                                    <label class="radio-inline">
                                        <input type="radio" name="rec_cons_plat" value='SI'>S&iacute;
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="rec_cons_plat" value='NO'>No
                                    </label>
                            </td>
                        </tr>
                        <tr>
                            <td>6. Documento de terminaci&oacute;n 2014 y/o 2013</td>
                            <td>
                                    <label class="radio-inline">
                                        <input type="radio" name="rec_doc_term" value='SI'>S&iacute;
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="rec_doc_term" value='NO'>No
                                    </label>
</td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="row">
                    <div class="form-group">
                        <label for="comment">Observaciones</label>
                        <textarea name="observaciones" class="form-control" rows="1" id="comment" onChange="conMayusculas(this)" required ></textarea>
                    </div>
            </div>
            <div class="row">
                <?php while ($reg = mysqli_fetch_array($queryUs)) { ?>
                <div class="col-md-3">            
                    <label>ID de quien recibe el proyecto</label></br>
                    <input type="text" name="resp_proyecto" class="repre" value="<?php echo $reg['id_usuarios'] ?>" size="1" OnFocus="this.blur()">
                </div>
                <?php } ?>
                <div class="col-md-4 col-md-offset-2">
                    <label>Nombre de la persona que entrega el proyecto</label></br>
                    <input type="text" name="nom_per_entrega" class="registro" placeholder="Nombre" size="40" onChange="conMayusculas(this)" required ></br>
                </div>
                <div class="col-md-1">
                    <label>Cargo</label></br>
                    <input type="text" name="cargo" class="registro" placeholder="Cargo" onChange="conMayusculas(this)" required ></br>
                </div>
            </div>
            <div class="row"><br><br>
                <div class="col-md-1 col-md-offset-4">
                    <button type="submit"class="btn btn-danger btn-md" >Ingresar</button><br><br>
                </div>
                <div class="col-md-1 col-md-offset-2">
                    <a href='control/cerrarSesion.php' class="btn btn-primary btn-md" target="_top">Salir</a><br><br>

                </div>
            </div>
        </form>

            </div>
        </div>

        <aside>

        </aside>

        <footer>

        </footer>
        
        <script src="css/bootstrap-3.3.6-dist/js/bootstrap.js"></script>
        <script src="css/bootstrap-3.3.6-dist/js/jquery-1.11.3.min.js"></script> 
<!--        archivos necesarios para generar los jquery y javascript de bootstrap sin internet-->
        
    </body>
</html>
