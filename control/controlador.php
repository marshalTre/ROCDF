<?php
if (!isset($_SESSION)) {
    session_start();
}
error_reporting(0);

require_once './datos_conexion.php';
//require_once './insertar.php';


//$revision = "SELECT * FROM registro where folio = '116' ";
$revision= "SELECT * FROM registro ORDER BY folio DESC LIMIT 1";
$query2 = mysqli_query(conector::conexion(), $revision);



if (!$query2) {

    echo "<font color='red'><h2>No se pudo ejecutar la consulta</h2></font>";
    exit;
}


//if (mysqli_num_rows($query) == true) {
//    echo "<font color='red'><h2>Se registro se realizó exitosamente</h2></font>";
//    exit;
//}
while ($reg = mysqli_fetch_array($query2)) {
    ?>

    <!DOCTYPE html>

    <html lang="es">

        <head>
            <meta charset="utf-8" />
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title></title>
            <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
            <link rel="stylesheet" href="../css/style.css">
            <link rel="stylesheet" href="../css/nav.css">
            <script language=javascript>
                function nuevaventana() {
                    window.open(URL, "ventana1", "width=300,height=300,scrollbars=NO")
                }
            </script> 
            <!-- Bootstrap -->
            <link href="../css/bootstrap-3.3.6-dist/css/bootstrap.css" rel="stylesheet">
            <link rel="javascript" type="text/javascript" href="../css/bootstrap-3.3.6-dist/js/bootstrap.js">
            <script type="text/javascript" src="../css/bootstrap-3.3.6-dist/js/jquery-1.11.3.min.js"></script>
            <script type="text/javascript" src="../js/eje.js"></script>
            <script type="text/javascript" src="../js/subeje.js"></script>
            <script type="text/javascript">
                $(document).ready(function () {

                    //Checkbox
                    $("input[name=marcarTodo]").change(function () {
                        $('input[type=checkbox]').each(function () {
                            if ($("input[name=marcarTodo]:checked").length == 1) {
                                this.checked = true;
                            } else {
                                this.checked = false;
                            }
                        });
                    });

                });
            </script>

        </head>

        <body>
            <header>
                <center>
                    <image id="image1" src="../images/sedeso.png"/> 
                    <image id="image2" src="../images/DGIDS.png"/> 
                    <p class="text">ROCDF</p>
                    <h3 id="reg" >Registro de Organizaciones Civiles</h3>
                    <hr>
                </center>

            </header>
            <nav id="navigation">
                <center>
                    <ul>

                        <li><a href='./cerrarSesion.php' class="btn2" target="_top">Salir</a></li>
                    </ul>
                    <?php
                    setlocale(LC_TIME, 'es_ES.UTF-8');
                    echo strftime("%A, %d de %B de %Y")
                    ?>
                </center>
            </nav>
            <br><br><br>

            <h2>Dato insertado</h2>
            <h4>Verifique que todos sus datos sean correctos</h4>

            <div class="container"></br></br></br>          
                <form action="./modificar.php" method="post">
                    <label>Folio de recepción</label></br>
                    <input type="text" name="folio" class="folio" value="<?php echo $reg['folio'] ?>"></br></br>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Nombre de la organización</label></br>
                            <input type="text" name="nom_org" class="organizacion" value="<?php echo $reg['nom_org'] ?>"size="70">
                        </div>
                        <div class="col-md-3 col-md-offset-2">
                            <label>Tipo de organización</label></br>
                            <select name="tipo_org">
                                <option value=""></option>
                                <option value="AC" <?php
                                if ($reg["tipo_org"] == 'AC') {
                                    echo "selected";
                                }
                                ?>>Asociación Civil</option>
                                <option value="IAP"<?php
                                if ($reg["tipo_org"] == 'IAP') {
                                    echo "selected";
                                }
                                ?>>Institución de Asistencia Privada</option>
                                <option value="SC"<?php
                                if ($reg["tipo_org"] == 'SC') {
                                    echo "selected";
                                }
                                ?>>Sociedad Civil</option>
                                <option value="OT"<?php
                                if ($reg["tipo_org"] == 'OT') {
                                    echo "selected";
                                }
                                ?>>Otra</option>
                            </select></br></br>
                        </div>    
                    </div>
                    <div class="row">
                        <div class="col-md-5">            
                            <label>Nombre del representante legal</label></br>
                            <input type="text" name="rep_legal" class="repre" value="<?php echo $reg['rep_legal'] ?>" size="60">
                        </div>
                        <div class="col-md-3 col-md-offset-2">
                            <label>Registro</label></br>
                            <input type="text" name="registro" class="registro" value="<?php echo $reg['registro'] ?>"></br>
                        </div>
                    </div></br></br>
                    <div class="row">
                        <div class="col-md-3">
                            <label>Calle</label></br>
                            <input type="text" name="calle" class="calle" value="<?php echo $reg['calle'] ?>" size="40">
                        </div>
                        <div class="col-md-2 col-md-offset-1">
                            <label>Número ext. o int.</label>
                            <input type="text" name="num_ext" class="num_ext" value="<?php echo $reg['num_ext'] ?>"></br>
                        </div>
                        <div class="col-md-2">
                            <label>Colonia</label></br>
                            <input type="text" name="colonia" class="colonia" value="<?php echo $reg['colonia'] ?>"></br>
                        </div>
                        <div class="col-md-2">
                            <label>Delegación Política</label></br>
                            <select name="delegacion">
                                <option value=""></option>
                                <option value="ALVARO OBREGON" <?php
                                if ($reg["delegacion"] == 'ALVARO OBREGON') {
                                    echo "selected";
                                }
                                ?>>Álvaro Obregón</option>
                                <option value="AZCAPOTZALCO" <?php
                                if ($reg["delegacion"] == 'AZCAPOTZALCO') {
                                    echo "selected";
                                }
                                ?>>Azcapotzalco</option>
                                <option value="BENITO JUAREZ" <?php
                                if ($reg["delegacion"] == 'BENITO JUAREZ') {
                                    echo "selected";
                                }
                                ?>>Benito Juárez</option>
                                <option value="COYOACAN" <?php
                                if ($reg["delegacion"] == 'COYOACAN') {
                                    echo "selected";
                                }
                                ?>>Coyoacán</option>
                                <option value="CUJIMALPA" <?php
                                if ($reg["delegacion"] == 'CUJIMALPA') {
                                    echo "selected";
                                }
                                ?>>Cuajimalpa</option>
                                <option value="CUAUHTEMOC" <?php
                                if ($reg["delegacion"] == 'CUAUHTEMOC') {
                                    echo "selected";
                                }
                                ?>>Cuauhtémoc</option>
                                <option value="GUSTAVO A. MADERO" <?php
                                if ($reg["delegacion"] == 'GUSTAVO A. MADERO') {
                                    echo "selected";
                                }
                                ?>>Gustavo A. Madero</option>
                                <option value="IZTACALCO" <?php
                                if ($reg["delegacion"] == 'IZTACALCO') {
                                    echo "selected";
                                }
                                ?>>Iztacalco</option>
                                <option value="IZTAPALAPA" <?php
                                if ($reg["delegacion"] == 'IZTAPALAPA') {
                                    echo "selected";
                                }
                                ?>>Iztapalapa</option>
                                <option value="MAGDALENA CONTRERAS" <?php
                                if ($reg["delegacion"] == 'MAGDALENA CONTRERAS') {
                                    echo "selected";
                                }
                                ?>>Magdalena Contreras</option>
                                <option value="MIGUEL HIDALGO" <?php
                                if ($reg["delegacion"] == 'MIGUEL HIDALGO') {
                                    echo "selected";
                                }
                                ?>>Miguel Hidalgo</option>
                                <option value="MILPA ALTA" <?php
                                if ($reg["delegacion"] == 'MILPA ALTA') {
                                    echo "selected";
                                }
                                ?>>Milpa Alta</option>
                                <option value="TLAHUAC" <?php
                                if ($reg["delegacion"] == 'TLAHUAC') {
                                    echo "selected";
                                }
                                ?>>Tláhuac</option>
                                <option value="TLALPAN" <?php
                                if ($reg["delegacion"] == 'TLALPAN') {
                                    echo "selected";
                                }
                                ?>>Tlalpan</option>
                                <option value="VENUSTIANO CARRANZA" <?php
                                if ($reg["delegacion"] == 'VENUSTIANO CARRANZA') {
                                    echo "selected";
                                }
                                ?>>Venustiano Carranza</option>
                                <option value="XOCHIMILCO" <?php
                                if ($reg["delegacion"] == 'XOCHIMILCO') {
                                    echo "selected";
                                }
                                ?>>Xochimilco</option>
                            </select></br><br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2"> 
                            <label>Código Postal</label></br>
                            <input type="text" name="cod_postal" class="cod_postal" value="<?php echo $reg['cod_postal'] ?>" size="6"></br>
                        </div>
                        <div class="col-md-2">                
                            <label>Teléfono Fijo</label></br>                
                            <input type="text" name="tel_fijo" class="tel_fijo" value="<?php echo $reg['tel_fijo'] ?>"></br>
                        </div>
                        <div class="col-md-2">
                            <label>Teléfono Móvil</label></br>
                            <input type="text" name="tel_movil" class="tel_movil" value="<?php echo $reg['tel_movil'] ?>"></br>
                        </div>
                        <div class="col-md-2">
                            <label>Página de Internet</label></br>
                            <input type="text" name="pag_int" class="pag_int" value="<?php echo $reg['pag_int'] ?>"></br>
                        </div>
                        <div class="col-md-3">
                            <label>Correo Electrónico</label></br>                
                            <input type="text" name="correo" class="correo" value="<?php echo $reg['correo'] ?>"></br></br>
                        </div>
                    </div>
                    <label>Nombre del Proyecto</label></br>
                    <input type="text" name="nom_proyecto" class="nom_proyecto" value="<?php echo $reg['nom_proyecto'] ?>" size="100"></br></br>
                    <label>Nombre del Responsable del Proyecto</label></br>
                    <input type="text" name="nom_resp" class="nom_resp" value="<?php echo $reg['nom_resp'] ?>" size="60"></br></br>
                    <div class="row">
                        <div class="col-md-2">
                            <label>Eje Temático</label></br>
                            <select id="eje" name="eje_tem" onChange="mostrar(this.value);">
                                <option value=""></option>
                                <option value="1" <?php
                                if ($reg["eje_tem"] == '1') {
                                    echo "selected";
                                }
                                ?>>Eje 1</option>
                                <option value="2" <?php
                                if ($reg["eje_tem"] == '2') {
                                    echo "selected";
                                }
                                ?>>Eje 2</option>
                                <option value="3" <?php
                                if ($reg["eje_tem"] == '3') {
                                    echo "selected";
                                }
                                ?>>Eje 3</option>
                                <option value="4" <?php
                                if ($reg["eje_tem"] == '4') {
                                    echo "selected";
                                }
                                ?>>Eje 4</option>
                                <option value="5" <?php
                                if ($reg["eje_tem"] == '5') {
                                    echo "selected";
                                }
                                ?>>Eje 5</option>
                                <option value="6" <?php
                                if ($reg["eje_tem"] == '6') {
                                    echo "selected";
                                }
                                ?>>Eje 6</option>
                                <option value="7" <?php
                                if ($reg["eje_tem"] == '7') {
                                    echo "selected";
                                }
                                ?>>Eje 7</option>
                                <option value="8" <?php
                                if ($reg["eje_tem"] == '8') {
                                    echo "selected";
                                }
                                ?>>Eje 8</option>
                            </select></br></br>
                        </div>
                        <div class="col-md-9">
                            <div id="eje_1" style="display: none;"><br>
                                <label>Eje 1) Prevención y atención de la violencia al interior de las familias y fortalecimiento de la diversidad familiar</label>
                            </div>
                            <div id="eje_2" style="display: none;"><br>
                                <label>Eje 2) Fortalecimiento de la participación comunitaria en la política alimentaria</label>
                            </div>
                            <div id="eje_3" style="display: none;"><br>
                                <label>Eje 3) Promoción y fortalecimiento de las políticas sociales</label>
                            </div>
                            <div id="eje_4" style="display: none;"><br>
                                <label>Eje 4) Promoción de los derechos humanos, no discriminación y diversidad sexual </label>
                            </div>
                            <div id="eje_5" style="display: none;"><br>
                                <label>Eje 5) Desarrollo comunitario, promoción de la cultura y comunicación social alternativa</label>
                            </div>
                            <div id="eje_6" style="display: none;"><br>
                                <label>Eje 6) Promoción de los Derechos de Acceso a la Información Pública y Protección de Datos Personales</label>
                            </div>
                            <div id="eje_7" style="display: none;"><br>
                                <label>Eje 7) Fortalecimiento para el sano desarrollo y garantía de derechos humanos para poblaciones en desventaja social</label>
                            </div>
                            <div id="eje_8" style="display: none;"><br>
                                <label>Eje 8) Promoción y acceso de las mujeres al ejercicio de sus derechos humanos y a una vida libre de violencias </label>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <label>Sub Eje</label></br>
                            <select id="subeje" name="sub_eje" onChange="mostrarr(this.value);">
                                <option value=""></option>
                                <option value="sub_1_1" <?php
                                if ($reg["sub_eje"] == 'sub_1_1') {
                                    echo "selected";
                                }
                                ?>>1.1</option>
                                <option value="sub_1_2" <?php
                                if ($reg["sub_eje"] == 'sub_1_2"') {
                                    echo "selected";
                                }
                                ?>>1.2</option>
                                <option value="sub_1_3" <?php
                                if ($reg["sub_eje"] == 'sub_1_3') {
                                    echo "selected";
                                }
                                ?>>1.3</option>
                                <option value="sub_1_4" <?php
                                if ($reg["sub_eje"] == 'sub_1_4') {
                                    echo "selected";
                                }
                                ?>>1.4</option>
                                <option value="sub_1_5" <?php
                                if ($reg["sub_eje"] == 'sub_1_5') {
                                    echo "selected";
                                }
                                ?>>1.5</option>
                                <option value="sub_1_6" <?php
                                if ($reg["sub_eje"] == 'sub_1_6') {
                                    echo "selected";
                                }
                                ?>>1.6</option>
                                <option value="sub_1_7" <?php
                                if ($reg["sub_eje"] == 'sub_1_7') {
                                    echo "selected";
                                }
                                ?>>1.7</option>
                                <option value="sub_1_8" <?php
                                if ($reg["sub_eje"] == 'sub_1_8') {
                                    echo "selected";
                                }
                                ?>>1.8</option>
                                <option value="sub_1_9" <?php
                                if ($reg["sub_eje"] == 'sub_1_9') {
                                    echo "selected";
                                }
                                ?>>1.9</option>
                                <option value="sub_1_10" <?php
                                if ($reg["sub_eje"] == 'sub_1_10') {
                                    echo "selected";
                                }
                                ?>>1.10</option>
                                <option value="sub_2_1" <?php
                                if ($reg["sub_eje"] == 'sub_2_1') {
                                    echo "selected";
                                }
                                ?>>2.1</option>
                                <option value="sub_2_2" <?php
                                if ($reg["sub_eje"] == 'sub_2_2') {
                                    echo "selected";
                                }
                                ?>>2.2</option>
                                <option value="sub_2_3" <?php
                                if ($reg["sub_eje"] == 'sub_2_3') {
                                    echo "selected";
                                }
                                ?>>2.3</option>
                                <option value="sub_3_1" <?php
                                if ($reg["sub_eje"] == 'sub_3_1') {
                                    echo "selected";
                                }
                                ?>>3.1</option>
                                <option value="sub_3_2" <?php
                                if ($reg["sub_eje"] == 'sub_3_2') {
                                    echo "selected";
                                }
                                ?>>3.2</option>
                                <option value="sub_3_3" <?php
                                if ($reg["sub_eje"] == 'sub_3_3') {
                                    echo "selected";
                                }
                                ?>>3.3</option>
                                <option value="sub_3_4" <?php
                                if ($reg["sub_eje"] == 'sub_3_4') {
                                    echo "selected";
                                }
                                ?>>3.4</option>
                                <option value="sub_4_1" <?php
                                if ($reg["sub_eje"] == 'sub_4_1') {
                                    echo "selected";
                                }
                                ?>>4.1</option>
                                <option value="sub_4_2" <?php
                                if ($reg["sub_eje"] == 'sub_4_2') {
                                    echo "selected";
                                }
                                ?>>4.2</option>
                                <option value="sub_4_3" <?php
                                if ($reg["sub_eje"] == 'sub_4_3') {
                                    echo "selected";
                                }
                                ?>>4.3</option>
                                <option value="sub_4_4" <?php
                                if ($reg["sub_eje"] == 'sub_4_4') {
                                    echo "selected";
                                }
                                ?>>4.4</option>
                                <option value="sub_4_5" <?php
                                if ($reg["sub_eje"] == 'sub_4_5') {
                                    echo "selected";
                                }
                                ?>>4.5</option>
                                <option value="sub_5_1" <?php
                                if ($reg["sub_eje"] == 'sub_5_1') {
                                    echo "selected";
                                }
                                ?>>5.1</option>
                                <option value="sub_5_2" <?php
                                if ($reg["sub_eje"] == 'sub_5_2') {
                                    echo "selected";
                                }
                                ?>>5.2</option>
                                <option value="sub_5_3" <?php
                                if ($reg["sub_eje"] == 'sub_5_3') {
                                    echo "selected";
                                }
                                ?>>5.3</option>
                                <option value="sub_5_4" <?php
                                if ($reg["sub_eje"] == 'sub_5_4') {
                                    echo "selected";
                                }
                                ?>>5.4</option>
                                <option value="sub_5_5" <?php
                                if ($reg["sub_eje"] == 'sub_5_5') {
                                    echo "selected";
                                }
                                ?>>5.5</option>
                                <option value="sub_5_6" <?php
                                if ($reg["sub_eje"] == 'sub_5_6') {
                                    echo "selected";
                                }
                                ?>>5.6</option>
                                <option value="sub_5_7" <?php
                                if ($reg["sub_eje"] == 'sub_5_7') {
                                    echo "selected";
                                }
                                ?>>5.7</option>
                                <option value="sub_5_8" <?php
                                if ($reg["sub_eje"] == 'sub_5_8') {
                                    echo "selected";
                                }
                                ?>>5.8</option>
                                <option value="sub_5_9" <?php
                                if ($reg["sub_eje"] == 'sub_5_9') {
                                    echo "selected";
                                }
                                ?>>5.9</option>
                                <option value="sub_6_1" <?php
                                if ($reg["sub_eje"] == 'sub_6_1') {
                                    echo "selected";
                                }
                                ?>>6.1</option>
                                <option value="sub_6_2" <?php
                                if ($reg["sub_eje"] == 'sub_6_2') {
                                    echo "selected";
                                }
                                ?>>6.2</option>
                                <option value="sub_6_3" <?php
                                if ($reg["sub_eje"] == 'sub_6_3') {
                                    echo "selected";
                                }
                                ?>>6.3</option>
                                <option value="sub_7_1" <?php
                                if ($reg["sub_eje"] == 'sub_7_1') {
                                    echo "selected";
                                }
                                ?>>7.1</option>
                                <option value="sub_7_2" <?php
                                if ($reg["sub_eje"] == 'sub_7_2') {
                                    echo "selected";
                                }
                                ?>>7.2</option>
                                <option value="sub_7_3" <?php
                                if ($reg["sub_eje"] == 'sub_7_3') {
                                    echo "selected";
                                }
                                ?>>7.3</option>
                                <option value="sub_7_4" <?php
                                if ($reg["sub_eje"] == 'sub_7_4') {
                                    echo "selected";
                                }
                                ?>>7.4</option>
                                <option value="sub_7_5" <?php
                                if ($reg["sub_eje"] == 'sub_7_5') {
                                    echo "selected";
                                }
                                ?>>7.5</option>
                                <option value="sub_7_6" <?php
                                if ($reg["sub_eje"] == 'sub_7_6') {
                                    echo "selected";
                                }
                                ?>>7.6</option>
                                <option value="sub_7_7" <?php
                                if ($reg["sub_eje"] == 'sub_7_7') {
                                    echo "selected";
                                }
                                ?>>7.7</option>
                                <option value="sub_7_8" <?php
                                if ($reg["sub_eje"] == 'sub_7_8') {
                                    echo "selected";
                                }
                                ?>>7.8</option>
                                <option value="sub_7_9" <?php
                                if ($reg["sub_eje"] == 'sub_7_9') {
                                    echo "selected";
                                }
                                ?>>7.9</option>
                                <option value="sub_7_10" <?php
                                if ($reg["sub_eje"] == 'sub_7_10') {
                                    echo "selected";
                                }
                                ?>>7.10</option>
                                <option value="sub_7_11" <?php
                                if ($reg["sub_eje"] == 'sub_7_11') {
                                    echo "selected";
                                }
                                ?>>7.11</option>
                                <option value="sub_7_12" <?php
                                if ($reg["sub_eje"] == 'sub_7_12') {
                                    echo "selected";
                                }
                                ?>>7.12</option>
                                <option value="sub_7_13" <?php
                                if ($reg["sub_eje"] == 'sub_7_13') {
                                    echo "selected";
                                }
                                ?>>7.13</option>
                                <option value="sub_7_14" <?php
                                if ($reg["sub_eje"] == 'sub_7_14') {
                                    echo "selected";
                                }
                                ?>>7.14</option>
                                <option value="sub_8_1" <?php
                                if ($reg["sub_eje"] == 'sub_8_1') {
                                    echo "selected";
                                }
                                ?>>8.1</option>
                                <option value="sub_8_2" <?php
                                if ($reg["sub_eje"] == 'sub_8_2') {
                                    echo "selected";
                                }
                                ?>>8.2</option>
                                <option value="sub_8_3" <?php
                                if ($reg["sub_eje"] == 'sub_8_3') {
                                    echo "selected";
                                }
                                ?>>8.3</option>
                                <option value="sub_8_4" <?php
                                if ($reg["sub_eje"] == 'sub_8_4') {
                                    echo "selected";
                                }
                                ?>>8.4</option>
                                <option value="sub_8_5" <?php
                                if ($reg["sub_eje"] == 'sub_8_5') {
                                    echo "selected";
                                }
                                ?>>8.5</option>
                                <option value="sub_8_6" <?php
                                if ($reg["sub_eje"] == 'sub_8_6') {
                                    echo "selected";
                                }
                                ?>>8.6</option>
                                <option value="sub_8_7" <?php
                                if ($reg["sub_eje"] == 'sub_8_7') {
                                    echo "selected";
                                }
                                ?>>8.7</option>
                                <option value="sub_8_8" <?php
                                if ($reg["sub_eje"] == 'sub_8_8') {
                                    echo "selected";
                                }
                                ?>>8.8</option>
                                <option value="sub_8_9" <?php
                                if ($reg["sub_eje"] == 'sub_8_9') {
                                    echo "selected";
                                }
                                ?>>8.9</option>
                                <option value="sub_8_10" <?php
                                if ($reg["sub_eje"] == 'sub_8_10') {
                                    echo "selected";
                                }
                                ?>>8.10</option>
                                <option value="sub_8_11" <?php
                                if ($reg["sub_eje"] == 'sub_8_11') {
                                    echo "selected";
                                }
                                ?>>8.11</option>
                                <option value="sub_8_12" <?php
                                if ($reg["sub_eje"] == 'sub_8_12') {
                                    echo "selected";
                                }
                                ?>>8.12</option>
                            </select>
                        </div>

                        <div class="col-md-9">
                            <div id="sub_1_1" style="display: none;"><br>
                                <h5>1.1  Atención y prevención de la violencia familiar</h5>
                            </div>
                            <div id="sub_1_2" style="display: none;"><br>
                                <h5>1.2  Fortalecimiento de las capacidades a las y los servidores públicos para la mejor atención en materia de violencia familiar con perspectiva de género y derechos humanos.</h5>
                            </div>
                            <div id="sub_1_3" style="display: none;"><br>
                                <h5>1.3  Apoyo psicológico y jurídico a mujeres víctimas de violencia familiar y sus hijas e hijos.</h5>
                            </div>
                            <div id="sub_1_4" style="display: none;"><br>
                                <h5>1.4  Seguimiento y análisis de la aplicación de la normatividad en materia de violencia familiar para el Distrito Federal.</h5>
                            </div>
                            <div id="sub_1_5" style="display: none;"><br>
                                <h5>1.5  Promoción de acciones y medidas para la educación social, cultural y emocional de la persona agresora y de las víctimas de violencia familiar. </h5>
                            </div>
                            <div id="sub_1_6" style="display: none;"><br>
                                <h5>1.6  Fomento de acciones de prevención de la violencia familiar y del buen trato en las escuelas de la Ciudad de México.</h5>
                            </div>
                            <div id="sub_1_7" style="display: none;"><br>
                                <h5>1.7  Fortalecimiento de las políticas públicas a través de la equidad, democracia, los derechos humanos para prevención de la violencia al interior de las familias diversas.</h5>
                            </div>
                            <div id="sub_1_8" style="display: none;"><br>
                                <h5>1.8  Fortalecimiento de acciones de prevención de la violencia familiar con estrategias de desarrollo social y comunitario.</h5>
                            </div>
                            <div id="sub_1_9" style="display: none;"><br>
                                <h5>1.9  Promoción de la participación infantil para la inclusión activa en la solución de la problemática de la violencia familiar.</h5>
                            </div>
                            <div id="sub_2_1" style="display: none;"><br>
                                <h5>2.1  Impulsar el fortalecimiento de los procesos organizativos en la política alimentaria en los comedores comunitarios.</h5>
                            </div>
                            <div id="sub_2_2" style="display: none;"><br>
                                <h5>2.2  Promover la capacitación y manejo en la administración de alimentos en los comedores comunitarios, en temas tales como: higiene, administración, variedad alimenticia, dietas saludables, acceso a bancos de alimentos, sostenibilidad y viabilidad financiera.</h5>
                            </div>
                            <div id="sub_2_3" style="display: none;"><br>
                                <h5>2.3  Formación, sensibilización y fomento de mejoras en la calidad de vida de los integrantes de los comités de administración, que incentive una mejor atención y servicio en la población atendida en los comedores comunitarios.</h5>
                            </div>
                            <div id="sub_3_1" style="display: none;"><br>
                                <h5>3.1  Impulsar procesos de fortalecimiento de las políticas públicas de fomento a las organizaciones de la sociedad civil.</h5>
                            </div>
                            <div id="sub_3_2" style="display: none;"><br>
                                <h5>3.2  Profesionalización de las organizaciones de la sociedad civil para aumentar su incidencia en el ámbito comunitario.</h5>
                            </div>
                            <div id="sub_3_3" style="display: none;"><br>
                                <h5>3.3  Promoción y fomento de campañas de educación, información y difusión de temáticas y políticas sociales sobre equidad de género, prevención de las violencias hacia las mujeres, las niñas y los niños, las y los jóvenes, y derecho a la alimentación, con el fin de fomentar la equidad y la igualdad social.</h5>
                            </div>
                            <div id="sub_3_4" style="display: none;"><br>
                                <h5>3.4  Seguimiento y análisis de la normatividad en materia de organizaciones de la sociedad civil.</h5>
                            </div>
                            <div id="sub_4_1" style="display: none;"><br>
                                <h5>4.1  Promoción de la defensa, el goce y el ejercicio de los derechos humanos y la no discriminación, en todos los ámbitos.</h5>
                            </div>
                            <div id="sub_4_2" style="display: none;"><br>
                                <h5>4.2  Fortalecimiento de una cultura de inclusión, respeto y reconocimiento a la diversidad sexual y las familias diversas.</h5>
                            </div>
                            <div id="sub_4_3" style="display: none;"><br>
                                <h5>4.3  Formación, capacitación y sensibilización de servidores públicos en derechos humanos, no discriminación y derecho a la identidad.</h5>
                            </div>
                            <div id="sub_4_4" style="display: none;"><br>
                                <h5>4.4  Elaboracion de diagnósticos sobre la situación actual de la población LGBTTTI de la Ciudad de México.</h5>
                            </div>
                            <div id="sub_4_5" style="display: none;"><br>
                                <h5>4.5  Promoción para el conocimiento, ejercicio, goce y defensa del derecho a la identidad jurídica de la población residente en el Distrito Federal. </h5>
                            </div>
                            <div id="sub_5_1" style="display: none;"><br>
                                <h5>5.1  Promoción de la convivencia comunitaria y reconstrucción del tejido social a partir de procesos de inclusión.</h5>
                            </div>
                            <div id="sub_5_2" style="display: none;"><br>
                                <h5>5.2  Fomento de la participación social a través de diversas estrategias orientadas al desarrollo social y a mejorar las condiciones de vida de las comunidades.</h5>
                            </div>
                            <div id="sub_5_3" style="display: none;"><br>
                                <h5>5.3  Promoción y difusión de actividades culturales y fomento de las artes para el desarrollo social.</h5>
                            </div>
                            <div id="sub_5_4" style="display: none;"><br>
                                <h5>5.4  Promoción de la organización de redes sociales orientadas a garantizar los derechos sociales.</h5>
                            </div>
                            <div id="sub_5_5" style="display: none;"><br>
                                <h5>5.5  Investigar y desarrollar acciones para la recuperación de la memoria histórica y riqueza cultural de los pueblos, barrios y colonias de la Ciudad de México.</h5>
                            </div>
                            <div id="sub_5_6" style="display: none;"><br>
                                <h5>5.6  Realizar acciones para el fortalecimiento de las identidades juveniles.</h5>
                            </div>
                            <div id="sub_5_7" style="display: none;"><br>
                                <h5>5.7  Fortalecimiento de medios alternativos de comunicación para promover el ejercicio de los derechos sociales, la igualdad  y la no discriminación y el desarrollo cultural y comunitario</h5>
                            </div>
                            <div id="sub_5_8" style="display: none;"><br>
                                <h5>5.8  Fortalecimiento y acceso comunitario a nuevas tecnologías.</h5>
                            </div>
                            <div id="sub_5_9" style="display: none;"><br>
                                <h5>5.9  Promoción y difusión de los programas sociales del Gobierno del Distrito Federal a grupos de población en desventaja social.</h5>
                            </div>
                            <div id="sub_6_1" style="display: none;"><br>
                                <h5>6.1  Proyectos para ejercicios de contraloría ciudadanas por la transparencia.</h5>
                            </div>
                            <div id="sub_6_2" style="display: none;"><br>
                                <h5>6.2  Proyectos culturales en vinculación con instituciones educativas públicas o privadas; mesas de trabajo, exposiciones y concursos relativos a la transparencia, el acceso a la información y la protección de los datos personales en el Distrito Federal, que incluyan una amplia difusión de los derechos.</h5>
                            </div>
                            <div id="sub_6_3" style="display: none;"><br>
                                <h5>6.3  Proyectos para fortalecer capacidades y habilidades de los jóvenes y las mujeres, a través de los derechos de acceso a la información pública y protección de datos personales, para desarrollar liderazgos, formas de organización y participación ciudadana.</h5>
                            </div>
                            <div id="sub_7_1" style="display: none;"><br>
                                <h5>7.1  Estimulación temprana: implementar con las niñas y niños canalizados por los Centros del DIF-DF, técnicas para el desarrollo de las capacidades y habilidades de los niños en la primera infancia, entre el nacimiento y los seis años de vida, para corregir trastornos reales o potenciales en su desarrollo, o para estimular capacidades compensadoras; teniendo en cuenta tanto al menor como a la familia y su entorno social.</h5>
                            </div>
                            <div id="sub_7_2" style="display: none;"><br>
                                <h5>7.2  Desarrollo psicosocial en primera infancia que atienda el desarrollo intelectual, lingüístico, social, emocional y personal de niñas y niños.</h5>
                            </div>
                            <div id="sub_7_3" style="display: none;"><br>
                                <h5>7.3  Atención directa en prevención con las niñas, niños y jóvenes que se encuentran en riesgo de presentar situación de calle.</h5>
                            </div>
                            <div id="sub_7_4" style="display: none;"><br>
                                <h5>7.4  Actividades deportivas para niñas y niños y jóvenes de 6 a 18 años que apoyen el desarrollo humano físico, mental, psicológico y social.</h5>
                            </div>
                            <div id="sub_7_5" style="display: none;"><br>
                                <h5>7.5  Prevención de conductas autodestructivas en niñas, niños y adolescentes (bullying, suicidio).</h5>
                            </div>
                            <div id="sub_7_6" style="display: none;"><br>
                                <h5>7.6  Formación de redes de apoyo social para adolescentes de 12 a 17 años que permitan el ejercicio pleno de sus derechos humanos proporcionando herramientas frente a riesgos que afectan su calidad de vida permitiéndoles al adolescente tomar decisiones en beneficio para su futuro.</h5>
                            </div>
                            <div id="sub_7_7" style="display: none;"><br>
                                <h5>7.7  Formación de redes comunitarias y comunicación comunitaria para fomentar el fortalecimiento del tejido social ejerciendo su derecho a la expresión y libre asociación que coadyuven a potenciar las capacidades de la población en forma individual, familiar y comunitaria permitiendo la elevación del capital social.</h5>
                            </div>
                            <div id="sub_7_8" style="display: none;"><br>
                                <h5>7.8  Actividades recreativas y culturales para mujeres y hombres de 18 a 60 años y más que les permita estimular su crecimiento individual y comunitario propiciando la transformación colectiva positiva.</h5>
                            </div>
                            <div id="sub_7_9" style="display: none;"><br>
                                <h5>7.9  Diseño, promoción, defensa, difusión, ejercicio e implementación de acciones que garanticen los derechos humanos de las personas con discapacidad.</h5>
                            </div>
                            <div id="sub_7_10" style="display: none;"><br>
                                <h5>7.10  Promoción de los derechos de las mujeres y niñas con discapacidad.</h5>
                            </div>
                            <div id="sub_7_11" style="display: none;"><br>
                                <h5>7.11  Fomento de actividades que promuevan el diseño universal y accesibilidad para personas con discapacidad.</h5>
                            </div>
                            <div id="sub_7_12" style="display: none;"><br>
                                <h5>7.12  Desarrollo de actividades que promuevan la autonomía y la vida independiente de  las personas con discapacidad mediante actividades de inclusión educativa, recreativa y cultural.</h5>
                            </div>
                            <div id="sub_7_13" style="display: none;"><br>
                                <h5>7.13  Promoción de la inclusión laboral.</h5>
                            </div>
                            <div id="sub_7_14" style="display: none;"><br>
                                <h5>7.14  Atención e integración social a niñas, niños y adolescentes que se encuentran en una condición vulnerable, mediante la intervención de albergues y hogares provisionales.</h5>
                            </div>
                            <div id="sub_8_1" style="display: none;"><br>
                                <h5>8.1  Atención y prevención de la violencia comunitaria contra las niñas y las mujeres en el Distrito Federal.</h5>
                            </div>
                            <div id="sub_8_2" style="display: none;"><br>
                                <h5>8.2  Acciones de información y formación sobre la igualdad sustantiva y los derechos humanos de las niñas y las mujeres en el Distrito Federal.</h5>
                            </div>
                            <div id="sub_8_3" style="display: none;"><br>
                                <h5>8.3  Alternativas para el fortalecimiento del derecho a la salud integral de las mujeres; con especial énfasis en las acciones dirigidas a la prevención y atención de los embarazos adolescentes, VIH/Sida, riesgos de ITS, desórdenes alimenticios y adicciones.</h5>
                            </div>
                            <div id="sub_8_4" style="display: none;"><br>
                                <h5>8.4  Promoción de la defensa, goce y el ejercicio de los Derechos Humanos de las trabajadoras sexuales.</h5>
                            </div>
                            <div id="sub_8_5" style="display: none;"><br>
                                <h5>8.5  Fomento de acciones para la prevención y atención de las víctimas de la trata y la explotación humana con especial énfasis en protección de mujeres indígenas y migrantes.</h5>
                            </div>
                            <div id="sub_8_6" style="display: none;"><br>
                                <h5>8.6  Propuestas de movilidad segura, espacios amigables y ciudades seguras para las niñas y las mujeres.</h5>
                            </div>
                            <div id="sub_8_7" style="display: none;"><br>
                                <h5>8.7  Estudios y análisis de experiencias exitosas  sobre corresponsabilidad y empresas sociales dedicadas al cuidado de niñas, niños,  adolescentes, personas adultas mayores, personas enfermas y discapacitadas.</h5>
                            </div>
                            <div id="sub_8_8" style="display: none;"><br>
                                <h5>8.8  Estudios y análisis sobre armonización y homologación de Códigos y Leyes del Distrito Federal con los Tratados Internacionales en materia de Derechos Humanos de las mujeres en el marco de la Reforma Constitucional en materia de derechos humanos y del nuevo Sistema Penal acusatorio.</h5>
                            </div>
                            <div id="sub_8_9" style="display: none;"><br>
                                <h5>8.9  Promoción de la defensa, goce y el ejercicio de los derechos humanos de las mujeres en reclusión.</h5>
                            </div>
                            <div id="sub_8_10" style="display: none;"><br>
                                <h5>8.10  Estudios de viabilidad para la creación de fondos de crédito y ahorro para mujeres emprendedoras en la CDMX.</h5>
                            </div>
                            <div id="sub_8_11" style="display: none;"><br>
                                <h5>8.11  Elaboración de aplicaciones y programas tecnológicos para desarrollar actitudes y promover la cultura de no violencia entre niñas y niños de Escuelas Primarias.</h5>
                            </div>
                            <div id="sub_8_12" style="display: none;"><br>
                                <h5>8.12  Acciones para la recuperación y sustentabilidad ecológica con participación de las mujeres y con enfoque productivo.</h5>
                            </div>
                        </div>
                    </div>
                    <br><br>
                   
                    <h3 align=center >Delegaciones de Intervención y/o Interacción</h3><br><br>
                    <div id="del_intera">
                        <div class="col-md-2">
                            <label><input type="checkbox" value="1" name="del_ao" id="1" <?php
                                if ( $reg['del_ao']== '1') {
                                        echo 'checked';
                                    }
                                ?>>Álvaro Obregón</label>
                        </div>
                        <div class="col-md-2">
                            <label><input type="checkbox" value="1" name="del_azc" id="2" <?php
                                
                                    if ( $reg['del_azc']== '1') {
                                        echo 'checked';
                                    }
                                
                                ?>>Azcapotzalco</label>
                        </div>
                        <div class="col-md-2">
                            <label><input type="checkbox" value="1" name="del_ben" id="3" <?php
                                if ( $reg['del_ben']== '1') {
                                        echo 'checked';
                                    }
                                ?>>Benito Juárez</label>
                        </div>
                        <div class="col-md-2">
                            <label><input type="checkbox" value="1" name="del_coy" id="4" <?php
                                if ( $reg['del_coy']== '1') {
                                        echo 'checked';
                                    }
                                ?>>Coyoacán</label>
                        </div>
                        <div class="col-md-2">
                            <label><input type="checkbox" value="1"name="del_cuaj" id="5" <?php
                                if ( $reg['del_cuaj']== '1') {
                                        echo 'checked';
                                    }
                                ?>>Cuajimalpa</label>
                        </div>
                        <div class="col-md-2">
                            <label><input type="checkbox" value="1" name="del_cuauh" id="6" <?php
                                if ( $reg['del_cuauh']== '1') {
                                        echo 'checked';
                                    }
                                ?>>Cuauhtémoc</label>
                        </div>
                        <div class="col-md-2">
                            <label><input type="checkbox" value="1" name="del_gam" id="7" <?php
                                if ( $reg['del_gam']== '1') {
                                        echo 'checked';
                                    }
                                ?>>Gustavo A. Madero</label>
                        </div>
                        <div class="col-md-2">
                            <label><input type="checkbox" value="1" name="del_iztac" id="8" <?php
                                if ( $reg['del_iztac']== '1') {
                                        echo 'checked';
                                    }
                                ?>>Iztacalco</label>
                        </div>
                        <div class="col-md-2">
                            <label><input type="checkbox" value="1" name="del_iztap" id="9" <?php
                                if ( $reg['del_iztap']== '1') {
                                        echo 'checked';
                                    }
                                ?>>Iztapalapa</label>
                        </div>
                        <div class="col-md-2">
                            <label><input type="checkbox" value="1" name="del_magda" id="10" <?php
                                if ( $reg['del_magda']== '1') {
                                        echo 'checked';
                                    }
                                ?>>Magdalena Contreras</label>
                        </div>
                        <div class="col-md-2">
                            <label><input type="checkbox" value="1" name="del_miguel" id="11" <?php
                                if ( $reg['del_miguel']== '1') {
                                        echo 'checked';
                                    }
                                ?>>Miguel Hidalgo</label>
                        </div>
                        <div class="col-md-2">
                            <label><input type="checkbox" value="1" name="del_milpa" id="12" <?php
                                if ( $reg['del_milpa']== '1') {
                                        echo 'checked';
                                    }
                                ?>>Milpa Alta</label>
                        </div>
                        <div class="col-md-2">
                            <label><input type="checkbox" value="1" name="del_tlah" id="13" <?php
                                if ( $reg['del_tlah']== '1') {
                                        echo 'checked';
                                    }
                                ?>>Tláhuac</label>
                        </div>
                        <div class="col-md-2">
                            <label><input type="checkbox" value="1" name="del_tlal" id="14" <?php
                                if ( $reg['del_tlal']== '1') {
                                        echo 'checked';
                                    }
                                ?>>Tlalpan</label>
                        </div>
                        <div class="col-md-2">
                            <label><input type="checkbox" value="1" name="del_venus" id="15" <?php
                                if ( $reg['del_venus']== '1') {
                                        echo 'checked';
                                    }
                                ?>>Venustiano Carranza</label>
                        </div>
                        <div class="col-md-2">
                            <label><input type="checkbox" value="1" name="del_xochi" id="16" <?php
                                if ( $reg['del_xochi']== '1') {
                                        echo 'checked';
                                    }
                                ?>>Xochimilco</label>
                        </div>
                        <div class="row">
                            <div class="col-md-2 col-md-offset-6">
                                <label><input type="checkbox" name="marcarTodo" id="marcarTodo">Todas</label>
                                <label for="marcarTodo"></label>
                            </div>
                        </div>
                    </div>
                    <div class="row"><br><br>
                        <div class="col-md-3">
                            <label>Institución que dictamina</label></br>
                            <select name="ins_dic">
                                <option value=""></option>
                                <option value="DGIDS" <?php
                                if ($reg["ins_dic"] == 'DGIDS') {
                                    echo "selected";
                                }
                                ?>>DGIDS</option>
                                <option value="DIF" <?php
                                if ($reg["ins_dic"] == 'DIF') {
                                    echo "selected";
                                }
                                ?>>DIF</option>
                                <option value="INMUJERES" <?php
                                if ($reg["ins_dic"] == 'INMUJERES') {
                                    echo "selected";
                                }
                                ?>>Inmujeres</option>
                            </select>
                        </div>
                        <div class="col-md-3 col-md-offset-2">
                            <label>Tipo de proyecto</label></br>
                            <select name="tipo_proyecto">
                                <option value=""></option>
                                <option value="N" <?php
                                if ($reg["tipo_proyecto"] == 'N') {
                                    echo "selected";
                                }
                                ?>>Nuevo</option>
                                <option value="C" <?php
                                if ($reg["tipo_proyecto"] == 'C') {
                                    echo "selected";
                                }
                                ?>>Continuidad</option>
                            </select>
                        </div>
                        <div class="col-md-2 col-md-offset-2">
                            <label>Monto solicitado</label></br>
                            <input type="text" name="mon_sol" class="mon_sol" value="<?php echo $reg['mon_sol'] ?>"></br>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-md-3">
                            <label>Población Objetivo</label>
                            <select name="pob_obj">
                                <option value=""></option>
                                
                                <option value="1" <?php
                                if ($reg["pob_obj"] == '1') {
                                    echo "selected";
                                }
                                ?>>Personas Adultas Mayores</option>
                                <option value="2" <?php
                                if ($reg["pob_obj"] == '2') {
                                    echo "selected";
                                }
                                ?>>Comites Ciudadanos</option>
                                <option value="3" <?php
                                if ($reg["pob_obj"] == '3') {
                                    echo "selected";
                                }
                                ?>>Personas con Discapacidad</option>
                                <option value="4" <?php
                                if ($reg["pob_obj"] == '4') {
                                    echo "selected";
                                }
                                ?>>Hombres</option>
                                <option value="5" <?php
                                if ($reg["pob_obj"] == '5') {
                                    echo "selected";
                                }
                                ?>>Jovenes</option>
                                <option value="6" <?php
                                if ($reg["pob_obj"] == '6') {
                                    echo "selected";
                                }
                                ?>>Mujeres</option>
                                <option value="7" <?php
                                if ($reg["pob_obj"] == '7') {
                                    echo "selected";
                                }
                                ?>>Niñas/Niños</option>
                                <option value="8" <?php
                                if ($reg["pob_obj"] == '8') {
                                    echo "selected";
                                }
                                ?>>Organizaciones Sociales</option>
                                <option value="9" <?php
                                if ($reg["pob_obj"] == '9') {
                                    echo "selected";
                                }
                                ?>>Población en General</option>
                                <option value="10" <?php
                                if ($reg["pob_obj"] == '10') {
                                    echo "selected";
                                }
                                ?>>Población LGBTTTI</option>
                                <option value="11"<?php
                                if ($reg["pob_obj"] == '11') {
                                    echo "selected";
                                }
                                ?>>Pueblos y Colectividades Indigenas</option>
                            </select>
                        </div>
                        <div class="col-md-2 col-md-offset-2">
                            <label>Mujeres</label></br>
                            <input type="text" name="num_mujeres" class="internet" value="<?php echo $reg['num_mujeres'] ?>">
                        </div>
                        <div class="col-md-2 col-md-offset-2">
                            <label>Hombres</label></br>
                            <input type="text" name="num_hombres" class="internet" value="<?php echo $reg['num_hombres'] ?>"></br>
                        </div>
                    </div></br>
                    <div class="row">
                        <div class="form-group">
                            <label for="comment">Objetivo general del Proyecto</label>
                            <textarea  name="objetivo" class="form-control" rows="5" id="comment" ><?php echo $reg['objetivo'] ?></textarea>
                        </div>

                    </div>
                    <div class="row">
                        <table class="table">
                            <label>Requisitos</label>
                            <tbody>
                                <tr>
                                    <td>1. Proyecto y ficha técnica (original y copia impresas)</td>
                                    <td> 
                                        <label class="radio-inline">
                                            <input type="radio" name="rec_ficha_tec" value='SI' <?php if($reg['rec_ficha_tec'] == 'SI'){echo 'checked';}?>>Sí
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="rec_ficha_tec" value='NO' <?php if($reg['rec_ficha_tec'] == 'NO'){echo 'checked';}?>>No
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2. Archivo electrónico del proyecto y ficha técnica (CD o USB)</td>
                                    <td>
                                        <label class="radio-inline">
                                            <input type="radio" name="rec_arch_elec" value='SI' <?php if($reg['rec_arch_elec'] == 'SI'){echo 'checked';}?>>Sí
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="rec_arch_elec" value='NO' <?php if($reg['rec_arch_elec'] == 'NO'){echo 'checked';}?>>No
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3. Copia fotostática simple de la Constancia de inscripción en el Registro de Organizaciones Civiles del Distrito Federal</td>
                                    <td>
                                        <label class="radio-inline">
                                            <input type="radio" name="rec_cons_insc" value='SI' <?php if($reg['rec_cons_insc'] == 'SI'){echo 'checked';}?>>Sí
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="rec_cons_insc" value='NO' <?php if($reg['rec_cons_insc'] == 'NO'){echo 'checked';}?>>No
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>4. Carta compromiso (original y copia impresa)</td>
                                    <td>
                                        <label class="radio-inline">
                                            <input type="radio" name="rec_carta" value='SI' <?php if($reg['rec_carta'] == 'SI'){echo 'checked';}?>>Sí
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="rec_carta" value='NO' <?php if($reg['rec_carta'] == 'NO'){echo 'checked';}?>>No
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>5. Constancia de participación de la plática informativa</td>
                                    <td>
                                        <label class="radio-inline">
                                            <input type="radio" name="rec_cons_plat" value='SI' <?php if($reg['rec_cons_plat'] == 'SI'){echo 'checked';}?>>Sí
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="rec_cons_plat" value='NO' <?php if($reg['rec_cons_plat'] == 'NO'){echo 'checked';}?>>No
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>6. Documento de terminación 2014 y/o 2013</td>
                                    <td>
                                        <label class="radio-inline">
                                            <input type="radio" name="rec_doc_term" value='SI' <?php if($reg['rec_doc_term'] == 'SI'){echo 'checked';}?>>Sí
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="rec_doc_term" value='NO' <?php if($reg['rec_doc_term'] == 'NO'){echo 'checked';}?>>No
                                        </label>
                                    </td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label for="comment">Observaciones</label>
                            <textarea name="observaciones" class="form-control" rows="1" id="comment"><?php echo $reg['observaciones'] ?></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">            
                            <label>Responsable quien recibe el proyecto</label></br>
                            <input type="text" name="resp_proyecto" class="repre" value="<?php echo $reg['resp_proyecto'] ?>" size="40">
                        </div>
                        <div class="col-md-4 col-md-offset-2">
                            <label>Nombre de la persona que entrega el proyecto</label></br>
                            <input type="text" name="nom_per_entrega" class="registro" value="<?php echo $reg['nom_per_entrega'] ?>" size="40"></br>
                        </div>
                        <div class="col-md-1">
                            <label>Cargo</label></br>
                            <input type="text" name="cargo" class="registro" value="<?php echo $reg['cargo'] ?>"></br>
                        </div>
                    </div>
                    <br><br><br><center>
                        <label style="margin-bottom: 1%;">Da Click en "Aceptar" si los datos son correctos o "Corregir" si algun dato estaba mal</label></center>
                    
                    <div class="col-md-1 col-md-offset-3">
                        <button type="submit"class="btn btn-primary btn-md" style="background: #B40404;" >Corregir</button><br><br>
                    </div>
                </form>
                <div class="col-md-1 col-md-offset-3">
                        <button type="submit"class="btn btn-primary btn-md" onclick = "location='../administradores.php'"/>Aceptar</button><br><br>
                    </div>
            </div>

        </div>

        <aside>

        </aside>

        <footer>

        </footer>

        <script src="../css/bootstrap-3.3.6-dist/js/bootstrap.js"></script>
        <script src="../css/bootstrap-3.3.6-dist/js/jquery-1.11.3.min.js"></script> 
        <!--        archivos necesarios para generar los jquery y javascript de bootstrap sin internet-->

    </body>
    </html>
    <?php
}
?>