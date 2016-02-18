<?php
if (!isset($_SESSION)) {
    session_start();
}
error_reporting(0);

require_once './datos_conexion.php';
//require_once './insertar.php';
$numUs = filter_input(INPUT_GET, 'numUs');

//$revision = "SELECT * FROM registro where folio = '116' ";
$revision = "SELECT * FROM registro_gral WHERE id_usuarios = '" . $numUs . "' ORDER BY id_folio DESC LIMIT 1";
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
<!--                    <ul>

                        <li><a href='./cerrarSesion.php' class="btn2" target="_top">Salir</a></li>
                    </ul>-->
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
                    <input type="text" name="id_folio" class="folio" value="<?php echo $reg['id_folio'] ?>"></br></br>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Nombre de la organización</label></br>
                            <input type="text" name="nom_org" class="organizacion" value="<?php echo $reg['nom_org'] ?>"size="70">
                        </div>
                        <div class="col-md-3 col-md-offset-2">
                            <label>Tipo de organización</label></br>
                            <select name="id_tipo_org">
                                <option value=""></option>
                                <option value="A.C." <?php
                                if ($reg["id_tipo_org"] == 'A.C.') {
                                    echo "selected";
                                }
                                ?>>Asociación Civil</option>
                                <option value="I.A.P"<?php
                                if ($reg["id_tipo_org"] == 'I.A.P') {
                                    echo "selected";
                                }
                                ?>>Institución de Asistencia Privada</option>
                                <option value="S.C."<?php
                                if ($reg["id_tipo_org"] == 'S.C.') {
                                    echo "selected";
                                }
                                ?>>Sociedad Civil</option>
                                <option value="OT"<?php
                                if ($reg["id_tipo_org"] == 'OT') {
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
                            <input type="email" name="correo" class="correo" value="<?php echo $reg['correo'] ?>"></br></br>
                        </div>
                    </div>
                    <label>Nombre del Proyecto</label></br>
                    <input type="text" name="nom_proyecto" class="nom_proyecto" value="<?php echo $reg['nom_proyecto'] ?>" size="100"></br></br>
                    <label>Nombre del Responsable del Proyecto</label></br>
                    <input type="text" name="nom_resp" class="nom_resp" value="<?php echo $reg['nom_resp'] ?>" size="60"></br></br>
                    <div class="row">
                        <div class="col-md-2">
                            <label>Eje Temático</label></br>
                            <select id="eje" name="id_cat_eje" onChange="mostrar(this.value);">
                                <option value=""></option>
                                <option value="1" <?php
                                if ($reg["id_cat_eje"] == '1') {
                                    echo "selected";
                                }
                                ?>>Eje 1</option>

                                <option value="2" <?php
                                if ($reg["id_cat_eje"] == '2') {
                                    echo "selected";
                                }
                                ?>>Eje 2</option>

                                <option value="3" <?php
                                        if ($reg["id_cat_eje"] == '3') {
                                            echo "selected";
                                        }
                                        ?>>Eje 3</option>

                                <option value="4" <?php
                                        if ($reg["id_cat_eje"] == '4') {
                                            echo "selected";
                                        }
                                        ?>>Eje 4</option>

                                <option value="5" <?php
                            if ($reg["id_cat_eje"] == '5') {
                                echo "selected";
                            }
                                        ?>>Eje 5</option>

                                <option value="6" <?php
                                if ($reg["id_cat_eje"] == '6') {
                                    echo "selected";
                                }
                                ?>>Eje 6</option>

                                <option value="7" <?php
                                if ($reg["id_cat_eje"] == '7') {
                                    echo "selected";
                                }
                                ?>>Eje 7</option>

                                <option value="8" <?php
                                        if ($reg["id_cat_eje"] == '8') {
                                            echo "selected";
                                        }
                                        ?>>Eje 8</option>

                                <option value="9" <?php
                                        if ($reg["id_cat_eje"] == '9') {
                                            echo "selected";
                                        }
                                        ?>>Eje 9</option>

                                <option value="10" <?php
                            if ($reg["id_cat_eje"] == '10') {
                                echo "selected";
                            }
                                        ?>>Eje 10</option>

                                <option value="11" <?php
                            if ($reg["id_cat_eje"] == '11') {
                                echo "selected";
                            }
                            ?>>Eje 11</option>

                                <option value="12" <?php
                            if ($reg["id_cat_eje"] == '12') {
                                echo "selected";
                            }
                            ?>>Eje 12</option>

                            </select></br></br>
                        </div>
                        <div class="col-md-9">
                            <div id="1" style="display: none;"><br>
                                <label>Eje 1) Atención y prevención de la violencia familiar.</label>
                            </div>
                            <div id="2" style="display: none;"><br>
                                <label>Eje 2) Promoción de acciones y medidas para la educación social, cultural y emocional, de las personas agresoras y de las víctimas de la violencia familiar para la Ciudad de México.</label>
                            </div>
                            <div id="3" style="display: none;"><br>
                                <label>Eje 3) Fortalecimiento de acciones de prevención de violencia familiar con estrategias de desarrollo social y comunitario.</label>
                            </div>
                            <div id="4" style="display: none;"><br>
                                <label>Eje 4) Fortalecimiento de la participación comunitaria en la política alimentaria. </label>
                            </div>
                            <div id="5" style="display: none;"><br>
                                <label>Eje 5) Impulsar el fortalecimiento de los procesos organizativos en los comedores comunitarios.</label>
                            </div>
                            <div id="6" style="display: none;"><br>
                                <label>Eje 6) Promover la capacitación y manejo en la administración de alimentos en los comedores comunitarios, en temas tales como: higiene, administración, variedad alimenticia, dietas saludables, acceso a bancos de alimentos, manejo de desechos, sostenibilidad y viabilidad financiera.</label>
                            </div>
                            <div id="7" style="display: none;"><br>
                                <label>Eje 7) Promoción y fortalecimiento de las políticas sociales.</label>
                            </div>
                            <div id="8" style="display: none;"><br>
                                <label>Eje 8) Impulsar procesos de fortalecimiento de las políticas públicas de fomento a las organizaciones de la sociedad civil. </label>
                            </div>
                            <div id="9" style="display: none;"><br>
                                <label>Eje 9) Profesionalización de las organizaciones de la sociedad civil para aumentar su incidencia en el ámbito comunitario. </label>
                            </div>
                            <div id="10" style="display: none;"><br>
                                <label>Eje 10) Promoción de los Derechos de Acceso a la Información Pública y Protección de Datos Personales. </label>
                            </div>
                            <div id="11" style="display: none;"><br>
                                <label>Eje 11) Fortalecimiento para el sano desarrollo y garantía de derechos humanos para población en vulnerabilidad. </label>
                            </div>
                            <div id="12" style="display: none;"><br>
                                <label>Eje 12) Promoción y acceso de las mujeres al ejercicio de sus derechos humanos y a una vida libre de violencias. </label>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <label>Sub Eje</label></br>
                            <select id="subeje" name="id_sub_eje" onChange="mostrarr(this.value);">
                                <option value=""></option>
                                <option value="sub_1_1" <?php
                                if ($reg["id_sub_eje"] == 'sub_1_1') {
                                    echo "selected";
                                }?>>1.1</option>
                                
                                <option value="sub_1_2" <?php
                                if ($reg["id_sub_eje"] == 'sub_1_2"') {
                                    echo "selected";
                                }?>>1.2</option>
                                
                                <option value="sub_1_3" <?php
                                if ($reg["id_sub_eje"] == 'sub_1_3') {
                                    echo "selected";
                                }?>>1.3</option>
                                
                                <option value="sub_1_4" <?php
                                if ($reg["id_sub_eje"] == 'sub_1_4') {
                                    echo "selected";
                                }?>>1.4</option>
                                
                                <option value="sub_2_1" <?php
                                if ($reg["id_sub_eje"] == 'sub_2_1') {
                                    echo "selected";
                                }?>>2.1</option>
                                
                                <option value="sub_2_2" <?php
                                if ($reg["id_sub_eje"] == 'sub_2_2') {
                                    echo "selected";
                                }?>>2.2</option>
                                
                                <option value="sub_2_3" <?php
                                if ($reg["id_sub_eje"] == 'sub_2_3') {
                                    echo "selected";
                                }?>>2.3</option>
                                
                                <option value="sub_3_1" <?php
                                if ($reg["id_sub_eje"] == 'sub_3_1') {
                                    echo "selected";
                                }?>>3.1</option>
                                
                                <option value="sub_3_2" <?php
                                if ($reg["id_sub_eje"] == 'sub_3_2') {
                                    echo "selected";
                                }?>>3.2</option>
                                
                                <option value="sub_3_3" <?php
                                if ($reg["id_sub_eje"] == 'sub_3_3') {
                                    echo "selected";
                                }?>>3.3</option>
                                                                
                                <option value="sub_4_1" <?php
                                if ($reg["id_sub_eje"] == 'sub_4_1') {
                                    echo "selected";
                                }?>>4.1</option>
                                                                
                                <option value="sub_5_1" <?php
                                if ($reg["id_sub_eje"] == 'sub_5_1') {
                                    echo "selected";
                                }?>>5.1</option>
                                                                
                                <option value="sub_6_1" <?php
                                if ($reg["id_sub_eje"] == 'sub_6_1') {
                                    echo "selected";
                                }?>>6.1</option>
                                                                
                                <option value="sub_7_1" <?php
                                if ($reg["id_sub_eje"] == 'sub_7_1') {
                                    echo "selected";
                                }?>>7.1</option>
                                
                                <option value="sub_7_2" <?php
                                if ($reg["id_sub_eje"] == 'sub_7_2') {
                                    echo "selected";
                                }?>>7.2</option>
                                
                                <option value="sub_7_3" <?php
                                if ($reg["id_sub_eje"] == 'sub_7_3') {
                                    echo "selected";
                                }?>>7.3</option>
                                
                                <option value="sub_7_4" <?php
                                if ($reg["id_sub_eje"] == 'sub_7_4') {
                                    echo "selected";
                                }?>>7.4</option>
                                
                                <option value="sub_7_5" <?php
                                if ($reg["id_sub_eje"] == 'sub_7_5') {
                                    echo "selected";
                                }?>>7.5</option>
                                
                                <option value="sub_7_6" <?php
                                if ($reg["id_sub_eje"] == 'sub_7_6') {
                                    echo "selected";
                                }?>>7.6</option>
                                                                
                                <option value="sub_8_1" <?php
                                if ($reg["id_sub_eje"] == 'sub_8_1') {
                                    echo "selected";
                                }?>>8.1</option>
                                
                                <option value="sub_9_1" <?php
                                if ($reg["id_sub_eje"] == 'sub_9_1') {
                                    echo "selected";
                                }?>>9.1</option>
                                
                                <option value="sub_10_1" <?php
                                if ($reg["id_sub_eje"] == 'sub_10_1') {
                                    echo "selected";
                                }?>>10.1</option>
                                
                                <option value="sub_10_2" <?php
                                if ($reg["id_sub_eje"] == 'sub_10_2') {
                                    echo "selected";
                                }?>>10.2</option>
                                
                                <option value="sub_11_1" <?php
                                if ($reg["id_sub_eje"] == 'sub_11_1') {
                                    echo "selected";
                                }?>>11.1</option>
                                
                                <option value="sub_11_2" <?php
                                if ($reg["id_sub_eje"] == 'sub_11_2') {
                                    echo "selected";
                                }?>>11.2</option>
                                
                                <option value="sub_11_3" <?php
                                if ($reg["id_sub_eje"] == 'sub_11_3') {
                                    echo "selected";
                                }?>>11.3</option>
                                
                                <option value="sub_11_4" <?php
                                if ($reg["id_sub_eje"] == 'sub_11_4') {
                                    echo "selected";
                                }?>>11.4</option>
                                
                                <option value="sub_11_5" <?php
                                if ($reg["id_sub_eje"] == 'sub_11_5') {
                                    echo "selected";
                                }?>>11.5</option>
                                
                                <option value="sub_11_6" <?php
                                if ($reg["id_sub_eje"] == 'sub_11_6') {
                                    echo "selected";
                                }?>>11.6</option>
                                
                                <option value="sub_11_7" <?php
                                if ($reg["id_sub_eje"] == 'sub_11_7') {
                                    echo "selected";
                                }?>>11.7</option>
                                
                                <option value="sub_11_8" <?php
                                if ($reg["id_sub_eje"] == 'sub_11_8') {
                                    echo "selected";
                                }?>>11.8</option>
                                
                                <option value="sub_11_9" <?php
                                if ($reg["id_sub_eje"] == 'sub_11_9') {
                                    echo "selected";
                                }?>>11.9</option>
                                
                                <option value="sub_11_10" <?php
                                if ($reg["id_sub_eje"] == 'sub_11_10') {
                                    echo "selected";
                                }?>>11.10</option>
                                
                                <option value="sub_11_11" <?php
                                if ($reg["id_sub_eje"] == 'sub_11_11') {
                                    echo "selected";
                                }?>>11.11</option>
                                
                                <option value="sub_11_12" <?php
                                if ($reg["id_sub_eje"] == 'sub_11_12') {
                                    echo "selected";
                                }?>>11.12</option>
                                
                                <option value="sub_11_13" <?php
                                if ($reg["id_sub_eje"] == 'sub_11_13') {
                                    echo "selected";
                                }?>>11.13</option>
                                
                                <option value="sub_11_14" <?php
                                if ($reg["id_sub_eje"] == 'sub_11_14') {
                                    echo "selected";
                                }?>>11.14</option>
                                
                                <option value="sub_11_15" <?php
                                if ($reg["id_sub_eje"] == 'sub_11_15') {
                                    echo "selected";
                                }?>>11.15</option>
                                
                                <option value="sub_11_16" <?php
                                if ($reg["id_sub_eje"] == 'sub_11_16') {
                                    echo "selected";
                                }?>>11.16</option>
                                
                                <option value="sub_12_1" <?php
                                if ($reg["id_sub_eje"] == 'sub_12_1') {
                                    echo "selected";
                                }?>>12.1</option>
                                
                                <option value="sub_12_2" <?php
                                if ($reg["id_sub_eje"] == 'sub_12_2') {
                                    echo "selected";
                                }?>>12.2</option>
                                
                                <option value="sub_12_3" <?php
                                if ($reg["id_sub_eje"] == 'sub_12_3') {
                                    echo "selected";
                                }?>>12.3</option>
                                
                                <option value="sub_12_4" <?php
                                if ($reg["id_sub_eje"] == 'sub_12_4') {
                                    echo "selected";
                                }?>>12.4</option>
                                
                                <option value="sub_12_5" <?php
                                if ($reg["id_sub_eje"] == 'sub_12_5') {
                                    echo "selected";
                                }?>>12.5</option>
                                
                                <option value="sub_12_6" <?php
                                if ($reg["id_sub_eje"] == 'sub_12_6') {
                                    echo "selected";
                                }?>>12.6</option>
                                
                                <option value="sub_12_7" <?php
                                if ($reg["id_sub_eje"] == 'sub_12_7') {
                                    echo "selected";
                                }?>>12.7</option>
                                
                                <option value="sub_12_8" <?php
                                if ($reg["id_sub_eje"] == 'sub_12_8') {
                                    echo "selected";
                                }?>>12.8</option>
                                
                                <option value="sub_12_9" <?php
                                if ($reg["id_sub_eje"] == 'sub_12_9') {
                                    echo "selected";
                                }?>>12.9</option>
                                
                                <option value="sub_12_10" <?php
                                if ($reg["id_sub_eje"] == 'sub_12_10') {
                                    echo "selected";
                                }?>>12.10</option>
                                
                                <option value="sub_12_11" <?php
                                if ($reg["id_sub_eje"] == 'sub_12_11') {
                                    echo "selected";
                                }?>>12.11</option>
                                
                                <option value="sub_12_12" <?php
                                if ($reg["id_sub_eje"] == 'sub_12_12') {
                                    echo "selected";
                                }?>>12.12</option>
                                
                                <option value="sub_12_13" <?php
                                if ($reg["id_sub_eje"] == 'sub_12_13') {
                                    echo "selected";
                                }?>>12.13</option>
                                
                            </select>
                        </div>

                        <div class="col-md-9">
                            <div id="sub_1_1" style="display: none;"><br>
                                <h5>1.1  Fomentar, promover y proporcionar capacitación en diferentes ramas productivas, para contribuir a que las mujeres se reintegren a una vida social y familiar libre de violencias, junto con sus hijas e hijos.</h5>
                            </div>
                            <div id="sub_1_2" style="display: none;"><br>
                                <h5>1.2  Fortalecimiento de las capacidades a las y los servidores públicos para la mejor atención en materia de violencia familiar con perspectiva de género y derechos humanos.</h5>
                            </div>
                            <div id="sub_1_3" style="display: none;"><br>
                                <h5>1.3  Apoyo psicológico y jurídico a mujeres víctimas de violencia familiar y sus hijas e hijos.</h5>
                            </div>
                            <div id="sub_1_4" style="display: none;"><br>
                                <h5>1.4  Seguimiento y análisis de la aplicación de la normatividad en materia de violencia familiar para la Ciudad de México.</h5>
                            </div>
                            <div id="sub_2_1" style="display: none;"><br>
                                <h5>2.1  Fomentar, promover y proporcionar capacitación a mujeres víctimas de violencia familiar, garantizando el acceso al empleo, a través de oficios o mejoras de sus habilidades en el trabajo y/o actualización de sus estudios a través de becas, como un medio para fortalecer e implementar proyectos productivos. </h5>
                            </div>
                            <div id="sub_2_2" style="display: none;"><br>
                                <h5>2.2  Fomento de acciones de prevención de la violencia familiar y del buen trato en las escuelas de la Ciudad de México.</h5>
                            </div>
                            <div id="sub_2_3" style="display: none;"><br>
                                <h5>2.3  Fortalecimiento de las políticas públicas a través de la equidad, democracia, los derechos humanos para prevención de la violencia al interior de las familias diversas.</h5>
                            </div>
                            <div id="sub_3_1" style="display: none;"><br>
                                <h5>3.1  Fomentar, promover y proporcionar capacitación para el empleo, dirigido  a las mujeres víctimas de violencia familiar, con la finalidad de brindar las condiciones básicas necesarias para impulsar su autonomía y continuar su proceso de atención especializada, hasta lograr vivir una vida libre de violencia, en condiciones mínimas de independencia económica, logrando en su toma de decisiones, su empoderamiento y el rescate de sus derechos.</h5>
                            </div>
                            <div id="sub_3_2" style="display: none;"><br>
                                <h5>3.2  Apoyo e inclusión de las mujeres indígenas víctimas de violencia, en el conocimiento de sus derechos y acompañamiento de traductores.</h5>
                            </div>
                            <div id="sub_3_3" style="display: none;"><br>
                                <h5>3.3  Fortalecimiento de las políticas públicas a través de participación activa en ferias gubernamentales, tendientes a erradicar la violencia familiar.</h5>
                            </div>
                            <div id="sub_4_1" style="display: none;"><br>
                                <h5>4.1  Acciones para el fortalecimiento de la participación comunitaria en la política alimentaria, a través de la generación de empleos, autosuficiencia económica y alimentaria.</h5>
                            </div>
                            <div id="sub_5_1" style="display: none;"><br>
                                <h5>5.1  Acciones para impulsar el fortalecimiento de los procesos organizativos en los comedores comunitarios, a través de capacitaciones con reconocimiento oficial, garantizando su profesionalización derivando en la optimización de los comedores y en su caso, la auto realización personal.</h5>
                            </div>
                            <div id="sub_6_1" style="display: none;"><br>
                                <h5>6.1  Proyectos encaminados a la capacitación y manejo en la administración de alimentos en los comedores comunitarios, en temas tales como: higiene, administración, variedad alimenticia, dietas saludables, acceso a bancos de alimentos, manejo de desechos, sostenibilidad y viabilidad financiera, dirigidos a los administradores y a la población atendida en los comedores comunitarios.</h5>
                            </div>
                            <div id="sub_7_1" style="display: none;"><br>
                                <h5>7.1  Fomentar, promover y proporcionar las condiciones adecuadas de inserción e integración laboral  de la población LGBTTTI de la Ciudad de México.</h5>
                            </div>
                            <div id="sub_7_2" style="display: none;"><br>
                                <h5>7.2  Implementar acciones concretas para la inclusión laboral y prevención de la discriminación por orientación sexual e identidad de género en ámbitos laborales.</h5>
                            </div>
                            <div id="sub_7_3" style="display: none;"><br>
                                <h5>7.3  Conformación de emprendimientos productivos de la población LGBTTTI de la Ciudad de México. </h5>
                            </div>
                            <div id="sub_7_4" style="display: none;"><br>
                                <h5>7.4  Facilitar la inserción laboral de la población LGBTTTI de la Ciudad de México a través de la adquisición de un oficio en el marco del auto empleo y la implementación de proyectos productivos.</h5>
                            </div>
                            <div id="sub_7_5" style="display: none;"><br>
                                <h5>7.5  Fortalecimiento de una cultura de inclusión, respeto y reconocimiento a la diversidad sexual y las familias diversas.</h5>
                            </div>
                            <div id="sub_7_6" style="display: none;"><br>
                                <h5>7.6  Promoción de la defensa, el goce y el ejercicio de los derechos humanos y la no discriminación en todos los ámbitos.</h5>
                            </div>
                            <div id="sub_8_1" style="display: none;"><br>
                                <h5>8.1  Capacitación a las organizaciones de la sociedad civil para fortalecer las capacidades y  los modelos de profesionalización, con la finalidad de  consolidar su incidencia en el diseño, instrumentación y evaluación de programas y políticas sociales.</h5>
                            </div>
                            <div id="sub_9_1" style="display: none;"><br>
                                <h5>9.1  Capacitación a  organizaciones civiles que contribuyan a promover el  crecimiento económico, el ingreso y el autoempleo, generando acciones para la autosustentabilidad económica de grupos de mujeres y hombres y de comunidades para realizar proyectos productivos.</h5>
                            </div>
                            <div id="sub_10_1" style="display: none;"><br>
                                <h5>10.1  Fortalecer estrategias (Capacitación, promoción, difusión, contraloría y participación ciudadana), con la finalidad de incrementar las capacidades de la ciudadanía en general, con base en los derechos de acceso a la información pública y de protección de datos personales.</h5>
                            </div>
                            <div id="sub_10_2" style="display: none;"><br>
                                <h5>10.2  Incrementar el conocimiento sobre los temas transparencia, derecho de acceso a la información pública y derecho de protección de datos personales, a través de proyectos culturales, que incluyan una amplia difusión en la Ciudad de México.</h5>
                            </div>
                            <div id="sub_11_1" style="display: none;"><br>
                                <h5>11.1  Fomentar la lactancia materna, coadyuvar con las instituciones públicas para brindar a niñas y niños estimulación temprana, capacitar a padres y madres respecto a los nuevos modelos de crianza, fortalecer las capacidades y/o habilidades en el personal profesional que atiende primera infancia. Estimulación temprana: implementar con las niñas y niños canalizados por los Centros del DIF-CDMX, técnicas para el desarrollo de las capacidades y habilidades de los niños en la primera infancia, entre el nacimiento y los seis años de vida, para corregir trastornos reales o potenciales en su desarrollo, o para estimular capacidades compensadoras; teniendo en cuenta tanto al menor como a la familia y su entorno social.</h5>
                            </div>
                            <div id="sub_11_2" style="display: none;"><br>
                                <h5>11.2  Fomentar una nutrición adecuada y apoyar para que la alimentación sea accesible para las niñas, niños y adolescentes.</h5>
                            </div>
                            <div id="sub_11_3" style="display: none;"><br>
                                <h5>11.3  Implementar estrategias para prevenir, detectar y erradicar la violencia infantil en todos los ámbitos, fomentar una cultura de paz, prevenir conductas autodestructivas, evitar que las niñas, niños y adolescentes sean víctimas de cualquier forma de explotación económica y salgan del entorno familiar hacia las calles.</h5>
                            </div>
                            <div id="sub_11_4" style="display: none;"><br>
                                <h5>11.4  Fomentar la participación infantil y adolescente y formar promotores de los derechos humanos desde la infancia.</h5>
                            </div>
                            <div id="sub_11_5" style="display: none;"><br>
                                <h5>11.5  Implementar procesos de comunicación social que garanticen el derecho a la libre expresión e información.</h5>
                            </div>
                            <div id="sub_11_6" style="display: none;"><br>
                                <h5>11.6  Acompañar y apoyar a niñas, niños y adolescentes con bajo rendimiento escolar y fomentar entre ellas y ellos la realización de actividades deportivas y culturales para lograr su desarrollo integral.</h5>
                            </div>
                            <div id="sub_11_7" style="display: none;"><br>
                                <h5>11.7  Fomentar entre los adolescentes el ejercicio responsable de derechos sexuales y reproductivos a fin de prevenir enfermedades de transmisión sexual y embarazo adolescente y capacitar a las niñas, niños y adolescentes en masculinidades y paternidades responsables.</h5>
                            </div>
                            <div id="sub_11_8" style="display: none;"><br>
                                <h5>11.8  Brindar capacitación multidisciplinaria a los derechohabientes de sociedades cooperativas.</h5>
                            </div>
                            <div id="sub_11_9" style="display: none;"><br>
                                <h5>11.9  Fomentar la participación de la ciudadana en la toma de decisiones gubernamentales encaminadas a garantizar el ejercicio de sus derechos humanos y generar redes de apoyo vecinal que garanticen el derecho de las comunidades a vivir en paz y a disfrutar de los espacios públicos.</h5>
                            </div>
                            <div id="sub_11_10" style="display: none;"><br>
                                <h5>11.10  Diseño, promoción, defensa, difusión, ejercicio e implementación de acciones que garanticen los derechos humanos de las personas con discapacidad  (niños, niñas, adolescentes mujeres y hombres, adultas, adultos; adultas mayores y adultos mayores).</h5>
                            </div>
                            <div id="sub_11_11" style="display: none;"><br>
                                <h5>11.11  Capacitación y actualización institucional en materia de rehabilitación, terapia física, terapia del Lenguaje, terapia ocupacional, para personal profesional especializado que trabaja con las personas con discapacidad.</h5>
                            </div>
                            <div id="sub_11_12" style="display: none;"><br>
                                <h5>11.12  Capacitación e instrucción profesional para cuidados alternativos a familiares, cuidadores y personal que atiende a personas con discapacidad, psicosocial e intelectual.</h5>
                            </div>
                            <div id="sub_11_13" style="display: none;"><br>
                                <h5>11.13  Fomento de actividades que promuevan el diseño universal y los ajustes razonables para personas con discapacidad.</h5>
                            </div>
                            <div id="sub_11_14" style="display: none;"><br>
                                <h5>11.14  Desarrollo de actividades que promuevan la autonomía y la vida independiente de las personas con discapacidad mediante actividades de inclusión educativa, deportiva, recreativa y cultural.</h5>
                            </div>
                            <div id="sub_11_15" style="display: none;"><br>
                                <h5>11.15  Promoción de Talleres productivos, microempresas, cooperativas, promoviendo la inclusión laboral de las personas con discapacidad.</h5>
                            </div>
                            <div id="sub_11_16" style="display: none;"><br>
                                <h5>11.16  Atención e integración social a niñas, niños y adolescentes que se encuentran en una condición vulnerable, mediante la intervención de albergues y hogares provisionales.</h5>
                            </div>
                            <div id="sub_12_1" style="display: none;"><br>
                                <h5>12.1  Acciones para la elaboración de políticas públicas dirigidas a la atención de las niñas en la Ciudad de México.</h5>
                            </div>
                            <div id="sub_12_2" style="display: none;"><br>
                                <h5>12.2  Acciones para la prevención y atención del embarazo adolescente.</h5>
                            </div>
                            <div id="sub_12_3" style="display: none;"><br>
                                <h5>12.3  Desarrollo de propuestas a partir de experiencias exitosas para la autonomía económica de las mujeres en la Ciudad de México.</h5>
                            </div>
                            <div id="sub_12_4" style="display: none;"><br>
                                <h5>12.4  Propuestas sobre alternativas sociales para el trabajo de cuidado.</h5>
                            </div>
                            <div id="sub_12_5" style="display: none;"><br>
                                <h5>12.5  Propuestas para la atención, prevención de la violencia contra las niñas y mujeres en la  Ciudad de México.</h5>
                            </div>
                            <div id="sub_12_6" style="display: none;"><br>
                                <h5>12.6  Propuesta para promover y garantizar los derechos sexuales y reproductivos de las mujeres y las adolescentes en la Ciudad de México.</h5>
                            </div>
                            <div id="sub_12_7" style="display: none;"><br>
                                <h5>12.7  Proyectos para el desarrollo de habilidades digitales de las mujeres  y niñas a fin de  favorecer su empoderamiento.</h5>
                            </div>
                            <div id="sub_12_8" style="display: none;"><br>
                                <h5>12.8  Acciones para la recuperación y sustentabilidad ecológica con  participación de las mujeres y con enfoque productivo.</h5>
                            </div>
                            <div id="sub_12_9" style="display: none;"><br>
                                <h5>12.9  Acciones que promuevan el ejercicio de los derechos humanos de las mujeres y las niñas en la Ciudad de México a través de actividades audivisuales, culturales y artes escénicas, con énfasis en grupos más desfavorecidos.</h5>
                            </div>
                            <div id="sub_12_10" style="display: none;"><br>
                                <h5>12.10  Propuestas para promoción del goce y ejercicio de los derechos humanos de las trabajadoras del hogar.</h5>
                            </div>
                            <div id="sub_12_11" style="display: none;"><br>
                                <h5>12.11  Propuestas para la reducción de la violencia y la discriminación contra las mujeres lesbianas, bisexuales, transgénero y transexuales, así como promover su empoderamiento.</h5>
                            </div>
                            <div id="sub_12_12" style="display: none;"><br>
                                <h5>12.12  Promoción de la defensa, goce y el ejercicio de los derechos humanos de las mujeres en reclusión.</h5>
                            </div>
                            <div id="sub_12_13" style="display: none;"><br>
                                <h5>12.13  Fomento de acciones para la prevención y atención de las víctimas de la trata y la explotación humana con especial énfasis en protección a mujeres indígenas y migrantes.</h5>
                            </div>

                        </div>
                    </div>
                    <br><br>

                    <h3 align=center >Delegaciones de Intervención y/o Interacción</h3><br><br>
                    <div id="del_intera">
                        <div class="col-md-2">
                            <label><input type="checkbox" value="SI" name="del_ao" id="1" <?php
                                          if ($reg['del_alvaro'] == 'SI') {
                                              echo 'checked';
                                          }
                                          ?>>Álvaro Obregón</label>
                        </div>
                        <div class="col-md-2">
                            <label><input type="checkbox" value="SI" name="del_azc" id="2" <?php
                                          if ($reg['del_azcapotzalco'] == 'SI') {
                                              echo 'checked';
                                          }
                                          ?>>Azcapotzalco</label>
                        </div>
                        <div class="col-md-2">
                            <label><input type="checkbox" value="SI" name="del_ben" id="3" <?php
                                          if ($reg['del_benito'] == 'SI') {
                                              echo 'checked';
                                          }
                                          ?>>Benito Juárez</label>
                        </div>
                        <div class="col-md-2">
                            <label><input type="checkbox" value="SI" name="del_coy" id="4" <?php
                                          if ($reg['del_coyoacan'] == 'SI') {
                                              echo 'checked';
                                          }
                                          ?>>Coyoacán</label>
                        </div>
                        <div class="col-md-2">
                            <label><input type="checkbox" value="SI"name="del_cuaj" id="5" <?php
                                          if ($reg['del_cuajimalpa'] == 'SI') {
                                              echo 'checked';
                                          }
                                          ?>>Cuajimalpa</label>
                        </div>
                        <div class="col-md-2">
                            <label><input type="checkbox" value="SI" name="del_cuauh" id="6" <?php
                                          if ($reg['del_cuauhtemoc'] == 'SI') {
                                              echo 'checked';
                                          }
                                          ?>>Cuauhtémoc</label>
                        </div>
                        <div class="col-md-2">
                            <label><input type="checkbox" value="SI" name="del_gam" id="7" <?php
                                          if ($reg['del_gustavo'] == 'SI') {
                                              echo 'checked';
                                          }
                                          ?>>Gustavo A. Madero</label>
                        </div>
                        <div class="col-md-2">
                            <label><input type="checkbox" value="SI" name="del_iztac" id="8" <?php
                                          if ($reg['del_iztacalco'] == 'SI') {
                                              echo 'checked';
                                          }
                                          ?>>Iztacalco</label>
                        </div>
                        <div class="col-md-2">
                            <label><input type="checkbox" value="SI" name="del_iztap" id="9" <?php
                                          if ($reg['del_iztapalapa'] == 'SI') {
                                              echo 'checked';
                                          }
                                          ?>>Iztapalapa</label>
                        </div>
                        <div class="col-md-2">
                            <label><input type="checkbox" value="SI" name="del_magda" id="10" <?php
                                          if ($reg['del_magdalena'] == 'SI') {
                                              echo 'checked';
                                          }
                                          ?>>Magdalena Contreras</label>
                        </div>
                        <div class="col-md-2">
                            <label><input type="checkbox" value="SI" name="del_miguel" id="11" <?php
                                          if ($reg['del_miguel'] == 'SI') {
                                              echo 'checked';
                                          }
                                          ?>>Miguel Hidalgo</label>
                        </div>
                        <div class="col-md-2">
                            <label><input type="checkbox" value="SI" name="del_milpa" id="12" <?php
                                          if ($reg['del_milpa'] == 'SI') {
                                              echo 'checked';
                                          }
                                          ?>>Milpa Alta</label>
                        </div>
                        <div class="col-md-2">
                            <label><input type="checkbox" value="SI" name="del_tlah" id="13" <?php
                                          if ($reg['del_tlahuac'] == 'SI') {
                                              echo 'checked';
                                          }
                                          ?>>Tláhuac</label>
                        </div>
                        <div class="col-md-2">
                            <label><input type="checkbox" value="SI" name="del_tlal" id="14" <?php
                                          if ($reg['del_tlalpan'] == 'SI') {
                                              echo 'checked';
                                          }
                                          ?>>Tlalpan</label>
                        </div>
                        <div class="col-md-2">
                            <label><input type="checkbox" value="SI" name="del_venus" id="15" <?php
                                          if ($reg['del_venustiano'] == 'SI') {
                                              echo 'checked';
                                          }
                                          ?>>Venustiano Carranza</label>
                        </div>
                        <div class="col-md-2">
                            <label><input type="checkbox" value="SI" name="del_xochi" id="16" <?php
                                          if ($reg['del_xochimilco'] == 'SI') {
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
                                if ($reg["id_cat_institucion"] == 'DGIDS') {
                                    echo "selected";
                                }
                                ?>>DGIDS</option>
                                <option value="DIF" <?php
                                    if ($reg["id_cat_institucion"] == 'DIF') {
                                        echo "selected";
                                    }
                                    ?>>DIF</option>
                                <option value="INMUJERES" <?php
                                    if ($reg["id_cat_institucion"] == 'INMUJERES') {
                                        echo "selected";
                                    }
                                ?>>Inmujeres</option>
                            </select>
                        </div>
                        <div class="col-md-3 col-md-offset-2">
                            <label>Tipo de proyecto</label></br>
                            <select name="tipo_proyecto">
                                <option value=""></option>
                                <option value="NUEVO" <?php
                            if ($reg["tipo_proyecto"] == 'NUEVO') {
                                echo "selected";
                            }
                            ?>>Nuevo</option>
                                <option value="CONTINUIDAD" <?php
                            if ($reg["tipo_proyecto"] == 'CONTINUIDAD') {
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
                                if ($reg["id_cat_poblacion"] == '1') {
                                    echo "selected";
                                }
                                ?>>Personas Adultas Mayores</option>
                                <option value="2" <?php
                                if ($reg["id_cat_poblacion"] == '2') {
                                    echo "selected";
                                }
                                ?>>Comites Ciudadanos</option>
                                <option value="3" <?php
                                if ($reg["id_cat_poblacion"] == '3') {
                                    echo "selected";
                                }
                                ?>>Personas con Discapacidad</option>
                                <option value="4" <?php
                                if ($reg["id_cat_poblacion"] == '4') {
                                    echo "selected";
                                }
                                ?>>Hombres</option>
                                <option value="5" <?php
                                if ($reg["id_cat_poblacion"] == '5') {
                                    echo "selected";
                                }
                                ?>>Jovenes</option>
                                <option value="6" <?php
                                if ($reg["id_cat_poblacion"] == '6') {
                                    echo "selected";
                                }
                                ?>>Mujeres</option>
                                <option value="7" <?php
                                if ($reg["id_cat_poblacion"] == '7') {
                                    echo "selected";
                                }
                                ?>>Niñas/Niños</option>
                                <option value="8" <?php
                                if ($reg["id_cat_poblacion"] == '8') {
                                    echo "selected";
                                }
                                ?>>Organizaciones Sociales</option>
                                <option value="9" <?php
                                if ($reg["id_cat_poblacion"] == '9') {
                                    echo "selected";
                                }
                                ?>>Población en General</option>
                                <option value="10" <?php
                                    if ($reg["id_cat_poblacion"] == '10') {
                                        echo "selected";
                                    }
                                    ?>>Población LGBTTTI</option>
                                <option value="11"<?php
                                    if ($reg["id_cat_poblacion"] == '11') {
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
                                            <input type="radio" name="rec_ficha_tec" value='SI' <?php if ($reg['rec_ficha_tec'] == 'SI') {
                                        echo 'checked';
                                    } ?>>Sí
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="rec_ficha_tec" value='NO' <?php if ($reg['rec_ficha_tec'] == 'NO') {
                                        echo 'checked';
                                    } ?>>No
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2. Archivo electrónico del proyecto y ficha técnica (CD o USB)</td>
                                    <td>
                                        <label class="radio-inline">
                                            <input type="radio" name="rec_arch_elec" value='SI' <?php if ($reg['rec_arch_elec'] == 'SI') {
                                        echo 'checked';
                                    } ?>>Sí
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="rec_arch_elec" value='NO' <?php if ($reg['rec_arch_elec'] == 'NO') {
                                        echo 'checked';
                                    } ?>>No
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3. Copia fotostática simple de la Constancia de inscripción en el Registro de Organizaciones Civiles del Distrito Federal</td>
                                    <td>
                                        <label class="radio-inline">
                                            <input type="radio" name="rec_cons_insc" value='SI' <?php if ($reg['rec_copia_insc'] == 'SI') {
                                        echo 'checked';
                                    } ?>>Sí
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="rec_cons_insc" value='NO' <?php if ($reg['rec_copia_insc'] == 'NO') {
                                        echo 'checked';
                                    } ?>>No
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>4. Carta compromiso (original y copia impresa)</td>
                                    <td>
                                        <label class="radio-inline">
                                            <input type="radio" name="rec_carta" value='SI' <?php if ($reg['rec_carta'] == 'SI') {
                                        echo 'checked';
                                    } ?>>Sí
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="rec_carta" value='NO' <?php if ($reg['rec_carta'] == 'NO') {
                                        echo 'checked';
                                    } ?>>No
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>5. Constancia de participación de la plática informativa</td>
                                    <td>
                                        <label class="radio-inline">
                                            <input type="radio" name="rec_cons_plat" value='SI' <?php if ($reg['rec_cons_plat'] == 'SI') {
                                        echo 'checked';
                                    } ?>>Sí
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="rec_cons_plat" value='NO' <?php if ($reg['rec_cons_plat'] == 'NO') {
                                        echo 'checked';
                                    } ?>>No
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>6. Documento de terminación 2014 y/o 2013</td>
                                    <td>
                                        <label class="radio-inline">
                                            <input type="radio" name="rec_doc_term" value='SI' <?php if ($reg['rec_doc_term'] == 'SI') {
                                        echo 'checked';
                                    } ?>>Sí
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="rec_doc_term" value='NO' <?php if ($reg['rec_doc_term'] == 'NO') {
                                        echo 'checked';
                                    } ?>>No
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
                            <input type="text" name="resp_proyecto" class="repre" value="<?php echo $reg['id_usuarios'] ?>" OnFocus="this.blur()" size="40">
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
                
                <div class="col-md-1 col-md-offset-4">
                    <button type="submit"class="btn btn-primary btn-md" onclick = "location = '../librerias/formatopdf.php'"/>Aceptar</button><br><br>
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