<?php
session_start();
if (isset($_SESSION["session_user"])) {
    
} else {
    header("location:../index.html");
    exit();
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
//    echo "<font color='red'><h2>Se registro se realiz&oacute; exitosamente</h2></font>";
//    exit;
//}
while ($reg = mysqli_fetch_array($query2)) {
    ?>

    <!DOCTYPE html>

    <html lang="es">

        <head>
            <meta http-equiv='cache-control' content='no-cache'> <meta http-equiv='expires' content='0'> <meta http-equiv='pragma' content='no-cache'>
            <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
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
            <script type="text/javascript" src="../js/mayusculas.js"></script>
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

        <body onload="nobackbutton();">
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
                    <label>Folio de recepci&oacute;n</label></br>
                    <input type="text" name="id_folio" class="folio" value="<?php echo $reg['id_folio'] ?>"></br></br>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Nombre de la organizaci&oacute;n</label></br>
                            <input type="text" name="nom_org" class="organizacion" value="<?php echo $reg['nom_org'] ?>"size="70"  onChange="conMayusculas(this)"   >
                        </div>
                        <div class="col-md-3 col-md-offset-2">
                            <label>Tipo de organizaci&oacute;n</label></br>
                            <select name="id_tipo_org">
                                <option value=""></option>
                                <option value="A.C." <?php
                                if ($reg["id_tipo_org"] == 'A.C.') {
                                    echo "selected";
                                }
                                ?>>Asociaci&oacute;n Civil</option>
                                <option value="I.A.P"<?php
                                if ($reg["id_tipo_org"] == 'I.A.P') {
                                    echo "selected";
                                }
                                ?>>Instituci&oacute;n de Asistencia Privada</option>
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
                            <input type="text" name="rep_legal" class="repre" value="<?php echo $reg['rep_legal'] ?>" size="60"  onChange="conMayusculas(this)"  >
                        </div>
                        <div class="col-md-3 col-md-offset-2">
                            <label>Registro</label></br>
                            <input type="text" name="registro" class="registro" value="<?php echo $reg['registro'] ?>"  onChange="conMayusculas(this)"  ></br>
                        </div>
                    </div></br></br>
                    <div class="row">
                        <div class="col-md-3">
                            <label>Calle</label></br>
                            <input type="text" name="calle" class="calle" value="<?php echo $reg['calle'] ?>" size="40"  onChange="conMayusculas(this)"  >
                        </div>
                        <div class="col-md-2 col-md-offset-1">
                            <label>N&uacute;mero ext. o int.</label>
                            <input type="text" name="num_ext" class="num_ext" value="<?php echo $reg['num_ext'] ?>" onChange="conMayusculas(this)"  ></br>
                        </div>
                        <div class="col-md-2">
                            <label>Colonia</label></br>
                            <input type="text" name="colonia" class="colonia" value="<?php echo $reg['colonia'] ?>" onChange="conMayusculas(this)"  ></br>
                        </div>
                        <div class="col-md-2">
                            <label>Delegaci&oacute;n Pol&iacute;tica</label></br>
                            <select name="delegacion">
                                <option value=""></option>
                                <option value="ALVARO OBREGON" <?php
                                if ($reg["delegacion"] == 'ALVARO OBREGON') {
                                    echo "selected";
                                }
                                ?>>&Aacute;lvaro Obreg&oacute;n</option>
                                <option value="AZCAPOTZALCO" <?php
                                if ($reg["delegacion"] == 'AZCAPOTZALCO') {
                                    echo "selected";
                                }
                                ?>>Azcapotzalco</option>
                                <option value="BENITO JUAREZ" <?php
                                if ($reg["delegacion"] == 'BENITO JUAREZ') {
                                    echo "selected";
                                }
                                ?>>Benito Ju&aacute;rez</option>
                                <option value="COYOACAN" <?php
                                if ($reg["delegacion"] == 'COYOACAN') {
                                    echo "selected";
                                }
                                ?>>Coyoac&aacute;n</option>
                                <option value="CUJIMALPA" <?php
                                if ($reg["delegacion"] == 'CUJIMALPA') {
                                    echo "selected";
                                }
                                ?>>Cuajimalpa</option>
                                <option value="CUAUHTEMOC" <?php
                                if ($reg["delegacion"] == 'CUAUHTEMOC') {
                                    echo "selected";
                                }
                                ?>>Cuauht&eacute;moc</option>
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
                                ?>>Tl&aacute;huac</option>
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
                            <label>C&oacute;digo Postal</label></br>
                            <input type="text" name="cod_postal" class="cod_postal" value="<?php echo $reg['cod_postal'] ?>" size="6" onkeypress="return soloNumeros(event)"></br>
                        </div>
                        <div class="col-md-2">                
                            <label>Tel&eacute;fono Fijo</label></br>                
                            <input type="text" name="tel_fijo" class="tel_fijo" value="<?php echo $reg['tel_fijo'] ?>" onkeypress="return soloNumeros(event)"></br>
                        </div>
                        <div class="col-md-2">
                            <label>Tel&eacute;fono M&oacute;vil</label></br>
                            <input type="text" name="tel_movil" class="tel_movil" value="<?php echo $reg['tel_movil'] ?>" onkeypress="return soloNumeros(event)"></br>
                        </div>
                        <div class="col-md-2">
                            <label>P&aacute;gina de Internet</label></br>
                            <input type="text" name="pag_int" class="pag_int" value="<?php echo $reg['pag_int'] ?>"></br>
                        </div>
                        <div class="col-md-3">
                            <label>Correo Electr&oacute;nico</label></br>                
                            <input type="email" name="correo" class="correo" value="<?php echo $reg['correo'] ?>"></br></br>
                        </div>
                    </div>
                    <label>Nombre del Proyecto</label></br>
                    <input type="text" name="nom_proyecto" class="nom_proyecto" value="<?php echo $reg['nom_proyecto'] ?>" size="100" onChange="conMayusculas(this)"   ></br></br>
                    <label>Nombre del Responsable del Proyecto</label></br>
                    <input type="text" name="nom_resp" class="nom_resp" value="<?php echo $reg['nom_resp'] ?>" size="60" onChange="conMayusculas(this)"   ></br></br>
                    <div class="row">
                        <div class="col-md-2">
                            <label>Eje Tem&aacute;tico</label></br>
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
                                <h5>1.1 Fomentar, promover y proporcionar capacitaci&oacute;n en diferentes ramas productivas, para contribuir a que las mujeres se reintegren a una vida social y familiar libre de violencias, junto con sus hijas e hijos.</h5>
                            </div>
                            <div id="sub_1_2" style="display: none;"><br>
                                <h5>1.2 Fortalecimiento de las capacidades a las y los servidores p&uacute;blicos para la mejor atenci&oacute;n en materia de violencia familiar con perspectiva de g&eacute;nero y derechos humanos.</h5>
                            </div>
                            <div id="sub_1_3" style="display: none;"><br>
                                <h5>1.3 Apoyo psicol&oacute;gico y jur&iacute;dico a mujeres v&iacute;ctimas de violencia familiar y sus hijas e hijos.</h5>
                            </div>
                            <div id="sub_1_4" style="display: none;"><br>
                                <h5>1.4 Seguimiento y an&aacute;lisis de la aplicaci&oacute;n de la normatividad en materia de violencia familiar para la Ciudad de M&eacute;xico.</h5>
                            </div>
                            <div id="sub_2_1" style="display: none;"><br>
                                <h5>2.1 Fomentar, promover y proporcionar capacitaci&oacute;n a mujeres v&iacute;ctimas de violencia familiar, garantizando el acceso al empleo, a trav&eacute;s de oficios o mejoras de sus habilidades en el trabajo y/o actualizaci&oacute;n de sus estudios a trav&eacute;s de becas, como un medio para fortalecer e implementar proyectos productivos. </h5>
                            </div>
                            <div id="sub_2_2" style="display: none;"><br>
                                <h5>2.2 Fomento de acciones de prevenci&oacute;n de la violencia familiar y del buen trato en las escuelas de la Ciudad de M&eacute;xico.</h5>
                            </div>
                            <div id="sub_2_3" style="display: none;"><br>
                                <h5>2.3 Fortalecimiento de las pol&iacute;ticas p&uacute;blicas a trav&eacute;s de la equidad, democracia, los derechos humanos para prevenci&oacute;n de la violencia al interior de las familias diversas.</h5>
                            </div>
                            <div id="sub_3_1" style="display: none;"><br>
                                <h5>3.1 Fomentar, promover y proporcionar capacitaci&oacute;n para el empleo, dirigido  a las mujeres v&iacute;ctimas de violencia familiar, con la finalidad de brindar las condiciones b&aacute;sicas necesarias para impulsar su autonom&iacute;a y continuar su proceso de atenci&oacute;n especializada, hasta lograr vivir una vida libre de violencia, en condiciones m&iacute;nimas de independencia econ&oacute;mica, logrando en su toma de decisiones, su empoderamiento y el rescate de sus derechos.</h5>
                            </div>
                            <div id="sub_3_2" style="display: none;"><br>
                                <h5>3.2 Apoyo e inclusi&oacute;n de las mujeres ind&iacute;genas v&iacute;ctimas de violencia, en el conocimiento de sus derechos y acompa&ntilde;amiento de traductores.</h5>
                            </div>
                            <div id="sub_3_3" style="display: none;"><br>
                                <h5>3.3 Fortalecimiento de las pol&iacute;ticas p&uacute;blicas a trav&eacute;s de participaci&oacute;n activa en ferias gubernamentales, tendientes a erradicar la violencia familiar.</h5>
                            </div>
                            <div id="sub_4_1" style="display: none;"><br>
                                <h5>4.1 Acciones para el fortalecimiento de la participaci&oacute;n comunitaria en la pol&iacute;tica alimentaria, a trav&eacute;s de la generaci&oacute;n de empleos, autosuficiencia econ&oacute;mica y alimentaria.</h5>
                            </div>
                            <div id="sub_5_1" style="display: none;"><br>
                                <h5>5.1 Acciones para impulsar el fortalecimiento de los procesos organizativos en los comedores comunitarios, a trav&eacute;s de capacitaciones con reconocimiento oficial, garantizando su profesionalizaci&oacute;n derivando en la optimizaci&oacute;n de los comedores y en su caso, la auto realizaci&oacute;n personal.</h5>
                            </div>
                            <div id="sub_6_1" style="display: none;"><br>
                                <h5>6.1 Proyectos encaminados a la capacitaci&oacute;n y manejo en la administraci&oacute;n de alimentos en los comedores comunitarios, en temas tales como: higiene, administraci&oacute;n, variedad alimenticia, dietas saludables, acceso a bancos de alimentos, manejo de desechos, sostenibilidad y viabilidad financiera, dirigidos a los administradores y a la poblaci&oacute;n atendida en los comedores comunitarios.</h5>
                            </div>
                            <div id="sub_7_1" style="display: none;"><br>
                                <h5>7.1 Fomentar, promover y proporcionar las condiciones adecuadas de inserci&oacute;n e integraci&oacute;n laboral  de la poblaci&oacute;n LGBTTTI de la Ciudad de M&eacute;xico.</h5>
                            </div>
                            <div id="sub_7_2" style="display: none;"><br>
                                <h5>7.2 Implementar acciones concretas para la inclusi&oacute;n laboral y prevenci&oacute;n de la discriminaci&oacute;n por orientaci&oacute;n sexual e identidad de g&eacute;nero en &aacute;mbitos laborales.</h5>
                            </div>
                            <div id="sub_7_3" style="display: none;"><br>
                                <h5>7.3 Conformaci&oacute;n de emprendimientos productivos de la poblaci&oacute;n LGBTTTI de la Ciudad de M&eacute;xico. </h5>
                            </div>
                            <div id="sub_7_4" style="display: none;"><br>
                                <h5>7.4 Facilitar la inserci&oacute;n laboral de la poblaci&oacute;n LGBTTTI de la Ciudad de M&eacute;xico a trav&eacute;s de la adquisici&oacute;n de un oficio en el marco del auto empleo y la implementaci&oacute;n de proyectos productivos.</h5>
                            </div>
                            <div id="sub_7_5" style="display: none;"><br>
                                <h5>7.5 Fortalecimiento de una cultura de inclusi&oacute;n, respeto y reconocimiento a la diversidad sexual y las familias diversas.</h5>
                            </div>
                            <div id="sub_7_6" style="display: none;"><br>
                                <h5>7.6 Promoci&oacute;n de la defensa, el goce y el ejercicio de los derechos humanos y la no discriminaci&oacute;n en todos los &aacute;mbitos.</h5>
                            </div>
                            <div id="sub_8_1" style="display: none;"><br>
                                <h5>8.1 Capacitaci&oacute;n a las organizaciones de la sociedad civil para fortalecer las capacidades y  los modelos de profesionalizaci&oacute;n, con la finalidad de  consolidar su incidencia en el dise&ntilde;o, instrumentaci&oacute;n y evaluaci&oacute;n de programas y pol&iacute;ticas sociales.</h5>
                            </div>
                            <div id="sub_9_1" style="display: none;"><br>
                                <h5>9.1 Capacitaci&oacute;n a  organizaciones civiles que contribuyan a promover el  crecimiento econ&oacute;mico, el ingreso y el autoempleo, generando acciones para la autosustentabilidad econ&oacute;mica de grupos de mujeres y hombres y de comunidades para realizar proyectos productivos.</h5>
                            </div>
                            <div id="sub_10_1" style="display: none;"><br>
                                <h5>10.1 Fortalecer estrategias (Capacitaci&oacute;n, promoci&oacute;n, difusi&oacute;n, contralor&iacute;a y participaci&oacute;n ciudadana), con la finalidad de incrementar las capacidades de la ciudadan&iacute;a en general, con base en los derechos de acceso a la informaci&oacute;n p&uacute;blica y de protecci&oacute;n de datos personales.</h5>
                            </div>
                            <div id="sub_10_2" style="display: none;"><br>
                                <h5>10.2 Incrementar el conocimiento sobre los temas transparencia, derecho de acceso a la informaci&oacute;n p&uacute;blica y derecho de protecci&oacute;n de datos personales, a trav&eacute;s de proyectos culturales, que incluyan una amplia difusi&oacute;n en la Ciudad de M&eacute;xico.</h5>
                            </div>
                            <div id="sub_11_1" style="display: none;"><br>
                                <h5>11.1 Fomentar la lactancia materna, coadyuvar con las instituciones p&uacute;blicas para brindar a ni&ntilde;as y ni&ntilde;os estimulaci&oacute;n temprana, capacitar a padres y madres respecto a los nuevos modelos de crianza, fortalecer las capacidades y/o habilidades en el personal profesional que atiende primera infancia. Estimulaci&oacute;n temprana: implementar con las ni&ntilde;as y ni&ntilde;os canalizados por los Centros del DIF-CDMX, t&eacute;cnicas para el desarrollo de las capacidades y habilidades de los ni&ntilde;os en la primera infancia, entre el nacimiento y los seis a&ntilde;os de vida, para corregir trastornos reales o potenciales en su desarrollo, o para estimular capacidades compensadoras; teniendo en cuenta tanto al menor como a la familia y su entorno social.</h5>
                            </div>
                            <div id="sub_11_2" style="display: none;"><br>
                                <h5>11.2 Fomentar una nutrici&oacute;n adecuada y apoyar para que la alimentaci&oacute;n sea accesible para las ni&ntilde;as, ni&ntilde;os y adolescentes.</h5>
                            </div>
                            <div id="sub_11_3" style="display: none;"><br>
                                <h5>11.3 Implementar estrategias para prevenir, detectar y erradicar la violencia infantil en todos los &aacute;mbitos, fomentar una cultura de paz, prevenir conductas autodestructivas, evitar que las ni&ntilde;as, ni&ntilde;os y adolescentes sean v&iacute;ctimas de cualquier forma de explotaci&oacute;n econ&oacute;mica y salgan del entorno familiar hacia las calles.</h5>
                            </div>
                            <div id="sub_11_4" style="display: none;"><br>
                                <h5>11.4 Fomentar la participaci&oacute;n infantil y adolescente y formar promotores de los derechos humanos desde la infancia.</h5>
                            </div>
                            <div id="sub_11_5" style="display: none;"><br>
                                <h5>11.5 Implementar procesos de comunicaci&oacute;n social que garanticen el derecho a la libre expresi&oacute;n e informaci&oacute;n.</h5>
                            </div>
                            <div id="sub_11_6" style="display: none;"><br>
                                <h5>11.6 Acompa&ntilde;ar y apoyar a ni&ntilde;as, ni&ntilde;os y adolescentes con bajo rendimiento escolar y fomentar entre ellas y ellos la realizaci&oacute;n de actividades deportivas y culturales para lograr su desarrollo integral.</h5>
                            </div>
                            <div id="sub_11_7" style="display: none;"><br>
                                <h5>11.7 Fomentar entre los adolescentes el ejercicio responsable de derechos sexuales y reproductivos a fin de prevenir enfermedades de transmisi&oacute;n sexual y embarazo adolescente y capacitar a las ni&ntilde;as, ni&ntilde;os y adolescentes en masculinidades y paternidades responsables.</h5>
                            </div>
                            <div id="sub_11_8" style="display: none;"><br>
                                <h5>11.8 Brindar capacitaci&oacute;n multidisciplinaria a los derechohabientes de sociedades cooperativas.</h5>
                            </div>
                            <div id="sub_11_9" style="display: none;"><br>
                                <h5>11.9 Fomentar la participaci&oacute;n de la ciudadana en la toma de decisiones gubernamentales encaminadas a garantizar el ejercicio de sus derechos humanos y generar redes de apoyo vecinal que garanticen el derecho de las comunidades a vivir en paz y a disfrutar de los espacios p&uacute;blicos.</h5>
                            </div>
                            <div id="sub_11_10" style="display: none;"><br>
                                <h5>11.10 Dise&ntilde;o, promoci&oacute;n, defensa, difusi&oacute;n, ejercicio e implementaci&oacute;n de acciones que garanticen los derechos humanos de las personas con discapacidad  (ni&ntilde;os, ni&ntilde;as, adolescentes mujeres y hombres, adultas, adultos; adultas mayores y adultos mayores).</h5>
                            </div>
                            <div id="sub_11_11" style="display: none;"><br>
                                <h5>11.11 Capacitaci&oacute;n y actualizaci&oacute;n institucional en materia de rehabilitaci&oacute;n, terapia f&iacute;sica, terapia del Lenguaje, terapia ocupacional, para personal profesional especializado que trabaja con las personas con discapacidad.</h5>
                            </div>
                            <div id="sub_11_12" style="display: none;"><br>
                                <h5>11.12 Capacitaci&oacute;n e instrucci&oacute;n profesional para cuidados alternativos a familiares, cuidadores y personal que atiende a personas con discapacidad, psicosocial e intelectual.</h5>
                            </div>
                            <div id="sub_11_13" style="display: none;"><br>
                                <h5>11.13 Fomento de actividades que promuevan el dise&ntilde;o universal y los ajustes razonables para personas con discapacidad.</h5>
                            </div>
                            <div id="sub_11_14" style="display: none;"><br>
                                <h5>11.14 Desarrollo de actividades que promuevan la autonom&iacute;a y la vida independiente de las personas con discapacidad mediante actividades de inclusi&oacute;n educativa, deportiva, recreativa y cultural.</h5>
                            </div>
                            <div id="sub_11_15" style="display: none;"><br>
                                <h5>11.15 Promoci&oacute;n de Talleres productivos, microempresas, cooperativas, promoviendo la inclusi&oacute;n laboral de las personas con discapacidad.</h5>
                            </div>
                            <div id="sub_11_16" style="display: none;"><br>
                                <h5>11.16 Atenci&oacute;n e integraci&oacute;n social a ni&ntilde;as, ni&ntilde;os y adolescentes que se encuentran en una condici&oacute;n vulnerable, mediante la intervenci&oacute;n de albergues y hogares provisionales.</h5>
                            </div>
                            <div id="sub_12_1" style="display: none;"><br>
                                <h5>12.1 Acciones para la elaboraci&oacute;n de pol&iacute;ticas p&uacute;blicas dirigidas a la atenci&oacute;n de las ni&ntilde;as en la Ciudad de M&eacute;xico.</h5>
                            </div>
                            <div id="sub_12_2" style="display: none;"><br>
                                <h5>12.2 Acciones para la prevenci&oacute;n y atenci&oacute;n del embarazo adolescente.</h5>
                            </div>
                            <div id="sub_12_3" style="display: none;"><br>
                                <h5>12.3 Desarrollo de propuestas a partir de experiencias exitosas para la autonom&iacute;a econ&oacute;mica de las mujeres en la Ciudad de M&eacute;xico.</h5>
                            </div>
                            <div id="sub_12_4" style="display: none;"><br>
                                <h5>12.4 Propuestas sobre alternativas sociales para el trabajo de cuidado.</h5>
                            </div>
                            <div id="sub_12_5" style="display: none;"><br>
                                <h5>12.5 Propuestas para la atenci&oacute;n, prevenci&oacute;n de la violencia contra las ni&ntilde;as y mujeres en la  Ciudad de M&eacute;xico.</h5>
                            </div>
                            <div id="sub_12_6" style="display: none;"><br>
                                <h5>12.6 Propuesta para promover y garantizar los derechos sexuales y reproductivos de las mujeres y las adolescentes en la Ciudad de M&eacute;xico.</h5>
                            </div>
                            <div id="sub_12_7" style="display: none;"><br>
                                <h5>12.7 Proyectos para el desarrollo de habilidades digitales de las mujeres  y ni&ntilde;as a fin de  favorecer su empoderamiento.</h5>
                            </div>
                            <div id="sub_12_8" style="display: none;"><br>
                                <h5>12.8 Acciones para la recuperaci&oacute;n y sustentabilidad ecol&oacute;gica con  participaci&oacute;n de las mujeres y con enfoque productivo.</h5>
                            </div>
                            <div id="sub_12_9" style="display: none;"><br>
                                <h5>12.9 Acciones que promuevan el ejercicio de los derechos humanos de las mujeres y las ni&ntilde;as en la Ciudad de M&eacute;xico a trav&eacute;s de actividades audivisuales, culturales y artes esc&eacute;nicas, con &eacute;nfasis en grupos m&aacute;s desfavorecidos.</h5>
                            </div>
                            <div id="sub_12_10" style="display: none;"><br>
                                <h5>12.10 Propuestas para promoci&oacute;n del goce y ejercicio de los derechos humanos de las trabajadoras del hogar.</h5>
                            </div>
                            <div id="sub_12_11" style="display: none;"><br>
                                <h5>12.11 Propuestas para la reducci&oacute;n de la violencia y la discriminaci&oacute;n contra las mujeres lesbianas, bisexuales, transg&eacute;nero y transexuales, as&iacute; como promover su empoderamiento.</h5>
                            </div>
                            <div id="sub_12_12" style="display: none;"><br>
                                <h5>12.12 Promoci&oacute;n de la defensa, goce y el ejercicio de los derechos humanos de las mujeres en reclusi&oacute;n.</h5>
                            </div>
                            <div id="sub_12_13" style="display: none;"><br>
                                <h5>12.13 Fomento de acciones para la prevenci&oacute;n y atenci&oacute;n de las v&iacute;ctimas de la trata y la explotaci&oacute;n humana con especial &eacute;nfasis en protecci&oacute;n a mujeres ind&iacute;genas y migrantes.</h5>
                            </div>

                        </div>
                    </div>
                    <br><br>

                    <h3 align=center >Delegaciones de Intervenci&oacute;n y/o Interacci&oacute;n</h3><br><br>
                    <div id="del_intera">
                        <div class="col-md-2">
                            <label><input type="checkbox" value="SI" name="del_ao" id="1" <?php
                                          if ($reg['del_alvaro'] == 'SI') {
                                              echo 'checked';
                                          }
                                          ?>>&Aacute;lvaro Obreg&oacute;n</label>
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
                                          ?>>Benito Ju&aacute;rez</label>
                        </div>
                        <div class="col-md-2">
                            <label><input type="checkbox" value="SI" name="del_coy" id="4" <?php
                                          if ($reg['del_coyoacan'] == 'SI') {
                                              echo 'checked';
                                          }
                                          ?>>Coyoac&aacute;n</label>
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
                                          ?>>Cuauht&eacute;moc</label>
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
                                          ?>>Tl&aacute;huac</label>
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
                            <label>Instituci&oacute;n que dictamina</label></br>
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
                            <input type="text" name="mon_sol" class="mon_sol" value="<?php echo $reg['mon_sol'] ?>" onkeypress="return soloNumeros(event)"></br>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-md-3">
                            <label>Poblaci&oacute;n Objetivo</label>
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
                                ?>>Ni&ntilde;as/Ni&ntilde;os</option>
                                <option value="8" <?php
                                if ($reg["id_cat_poblacion"] == '8') {
                                    echo "selected";
                                }
                                ?>>Organizaciones Sociales</option>
                                <option value="9" <?php
                                if ($reg["id_cat_poblacion"] == '9') {
                                    echo "selected";
                                }
                                ?>>Poblaci&oacute;n en General</option>
                                <option value="10" <?php
                                    if ($reg["id_cat_poblacion"] == '10') {
                                        echo "selected";
                                    }
                                    ?>>Poblaci&oacute;n LGBTTTI</option>
                                <option value="11"<?php
                                    if ($reg["id_cat_poblacion"] == '11') {
                                        echo "selected";
                                    }
                                    ?>>Pueblos y Colectividades Indigenas</option>
                            </select>
                        </div>
                        <div class="col-md-2 col-md-offset-2">
                            <label>Mujeres</label></br>
                            <input type="text" name="num_mujeres" class="internet" value="<?php echo $reg['num_mujeres'] ?>" onkeypress="return soloNumeros(event)">
                        </div>
                        <div class="col-md-2 col-md-offset-2">
                            <label>Hombres</label></br>
                            <input type="text" name="num_hombres" class="internet" value="<?php echo $reg['num_hombres'] ?>" onkeypress="return soloNumeros(event)"></br>
                        </div>
                    </div></br>
                    <div class="row">
                        <div class="form-group">
                            <label for="comment">Objetivo general del Proyecto</label>
                            <textarea  name="objetivo" class="form-control" rows="5" id="comment" onChange="conMayusculas(this)"   ><?php echo $reg['objetivo'] ?></textarea>
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
                                            <input type="radio" name="rec_ficha_tec" value='SI' <?php if ($reg['rec_ficha_tec'] == 'SI') {
                                        echo 'checked';
                                    } ?>>S&iacute;
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="rec_ficha_tec" value='NO' <?php if ($reg['rec_ficha_tec'] == 'NO') {
                                        echo 'checked';
                                    } ?>>No
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2. Archivo electr&oacute;nico del proyecto y ficha t&eacute;cnica (CD o USB)</td>
                                    <td>
                                        <label class="radio-inline">
                                            <input type="radio" name="rec_arch_elec" value='SI' <?php if ($reg['rec_arch_elec'] == 'SI') {
                                        echo 'checked';
                                    } ?>>S&iacute;
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="rec_arch_elec" value='NO' <?php if ($reg['rec_arch_elec'] == 'NO') {
                                        echo 'checked';
                                    } ?>>No
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3. Copia fotost&aacute;tica simple de la Constancia de inscripci&oacute;n en el Registro de Organizaciones Civiles del Distrito Federal</td>
                                    <td>
                                        <label class="radio-inline">
                                            <input type="radio" name="rec_cons_insc" value='SI' <?php if ($reg['rec_copia_insc'] == 'SI') {
                                        echo 'checked';
                                    } ?>>S&iacute;
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
                                    } ?>>S&iacute;
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="rec_carta" value='NO' <?php if ($reg['rec_carta'] == 'NO') {
                                        echo 'checked';
                                    } ?>>No
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>5. Constancia de participaci&oacute;n de la pl&aacute;tica informativa</td>
                                    <td>
                                        <label class="radio-inline">
                                            <input type="radio" name="rec_cons_plat" value='SI' <?php if ($reg['rec_cons_plat'] == 'SI') {
                                        echo 'checked';
                                    } ?>>S&iacute;
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="rec_cons_plat" value='NO' <?php if ($reg['rec_cons_plat'] == 'NO') {
                                        echo 'checked';
                                    } ?>>No
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>6. Documento de terminaci&oacute;n 2014 y/o 2013</td>
                                    <td>
                                        <label class="radio-inline">
                                            <input type="radio" name="rec_doc_term" value='SI' <?php if ($reg['rec_doc_term'] == 'SI') {
                                        echo 'checked';
                                    } ?>>S&iacute;
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
                            <textarea name="observaciones" class="form-control" rows="1" id="comment" onChange="conMayusculas(this)"   ><?php echo $reg['observaciones'] ?></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">            
                            <label>Id de quien recibe el proyecto</label></br>
                            <input type="text" name="resp_proyecto" class="repre" value="<?php echo $reg['id_usuarios'] ?>" OnFocus="this.blur()" size="40">
                        </div>
                        <div class="col-md-4 col-md-offset-2">
                            <label>Nombre de la persona que entrega el proyecto</label></br>
                            <input type="text" name="nom_per_entrega" class="registro" value="<?php echo $reg['nom_per_entrega'] ?>" size="40" onChange="conMayusculas(this)"></br>
                        </div>
                        <div class="col-md-1">
                            <label>Cargo</label></br>
                            <input type="text" name="cargo" class="registro" value="<?php echo $reg['cargo'] ?>" onChange="conMayusculas(this)"   ></br>
                        </div>
                    </div>
                    <br><br><br><center>
                        <label style="margin-bottom: 1%;">Da Click en "Aceptar" si los datos son correctos o "Corregir" si algun dato estaba mal</label></center>

                    <div class="col-md-1 col-md-offset-2">
                        <button type="submit"class="btn btn-primary btn-md" style="background: #B40404;" >Corregir</button><br><br>
                    </div>
                </form>
                <div class="col-md-1 col-md-offset-2">
                    <button type="submit"class="imp"  onclick = "window.open('../librerias/formatopdf.php?UsId=<?php echo $reg['id_usuarios']?>');" target="_blank"/>Imprimir</button><br><br>
                </div>
                <div class="col-md-1 col-md-offset-3">
                    <button type="submit"class="btn btn-primary btn-md" onclick = "location = '../administradores.php'"/>Aceptar</button><br><br>
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
