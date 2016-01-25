<?php

session_start();
if (isset($_SESSION["session_user"])) {
    
} else {
    header("location:index.html");
    exit();
}
?>
<!DOCTYPE html>

<html lang="es">

    <head>
        <meta charset="utf-8" />
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

    <body>
        <header>
            <center>
                <image id="image1" src="images/sedeso.png"/> 
                <image id="image2" src="images/DGIDS.png"/> 
                <p class="text">ROCDF</p>
                <h3 id="reg" >Registro de Organizaciones Civiles</h3>
                <hr>
            </center>

        </header>
        <nav id="navigation">
            <center>
                <ul>
                    <!-- <li data-toggle="modal" data-target="#imp"><a href="librerias/formatopdf.php">Imprimir</a></li> -->
                    <li data-toggle="modal" data-target="#mod"><a href="#">Modificar</a></li>
                    <li data-toggle="modal" data-target="#bor"><a href="#">Borrar</a></li>
                    <li><a href='control/cerrarSesion.php' class="btn2" target="_top">Salir</a></li>
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
        </section> -->
        
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
        </section>

        <div class="container"></br></br></br>          
            <form action="control/controlador.php" method="post">
                <label>Folio de recepción</label></br>
                    <input type="text" name="folio" class="folio" placeholder="Folio"></br></br>
            <div class="row">
                <div class="col-md-6">
                    <label>Nombre de la organización</label></br>
                    <input type="text" name="nom_org" class="organizacion" placeholder="Nombre de la organización" size="70">
                </div>
                <div class="col-md-3 col-md-offset-2">
                    <label>Tipo de organización</label></br>
                        <select name="tipo_org">
                            <option value=""></option>
                            <option value="AC">Asociación Civil</option>
                            <option value="IAP">Institución de Asistencia Privada</option>
                            <option value="SC">Sociedad Civil</option>
                            <option value="OT">Otra</option>
                        </select></br></br>
                </div>    
            </div>
            <div class="row">
                <div class="col-md-5">            
                    <label>Nombre del representante legal</label></br>
                    <input type="text" name="rep_legal" class="repre" placeholder="Representante" size="60">
                </div>
                <div class="col-md-3 col-md-offset-2">
                    <label>Registro</label></br>
                    <input type="text" name="registro" class="registro" placeholder="Registro"></br>
                </div>
            </div></br></br>
            <div class="row">
                <div class="col-md-3">
                    <label>Calle</label></br>
                    <input type="text" name="calle" class="calle" placeholder="Calle" size="40">
                </div>
                <div class="col-md-2 col-md-offset-1">
                    <label>Número ext. o int.</label>
                    <input type="text" name="num_ext" class="num_ext" placeholder="Número"></br>
                </div>
                <div class="col-md-2">
                    <label>Colonia</label></br>
                    <input type="text" name="colonia" class="colonia" placeholder="Colonia"></br>
                </div>
                <div class="col-md-2">
                    <label>Delegación Política</label></br>
                    <select name="delegacion">
                        <option value=""></option>
                        <option value="ALVARO OBREGON">Álvaro Obregón</option>
                        <option value="AZCAPOTZALCO">Azcapotzalco</option>
                        <option value="BENITO JUAREZ">Benito Juárez</option>
                        <option value="COYOACAN">Coyoacán</option>
                        <option value="CUJIMALPA">Cuajimalpa</option>
                        <option value="CUAUHTEMOC">Cuauhtémoc</option>
                        <option value="GUSTAVO A. MADERO">Gustavo A. Madero</option>
                        <option value="IZTACALCO">Iztacalco</option>
                        <option value="IZTAPALAPA">Iztapalapa</option>
                        <option value="MAGDALENA CONTRERAS">Magdalena Contreras</option>
                        <option value="MIGUEL HIDALGO">Miguel Hidalgo</option>
                        <option value="MILPA ALTA">Milpa Alta</option>
                        <option value="TLAHUAC">Tláhuac</option>
                        <option value="TLALPAN">Tlalpan</option>
                        <option value="VENUSTIANO CARRANZA">Venustiano Carranza</option>
                        <option value="XOCHIMILCO">Xochimilco</option>
                    </select></br><br>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2"> 
                    <label>Código Postal</label></br>
                    <input type="text" name="cod_postal" class="cod_postal" placeholder="C.P." size="6"></br>
                </div>
                <div class="col-md-2">                
                    <label>Teléfono Fijo</label></br>                
                    <input type="text" name="tel_fijo" class="tel_fijo" placeholder="Teléfono"></br>
                </div>
                <div class="col-md-2">
                    <label>Teléfono Móvil</label></br>
                    <input type="text" name="tel_movil" class="tel_movil" placeholder="Teléfono"></br>
                </div>
                <div class="col-md-2">
                    <label>Página de Internet</label></br>
                    <input type="text" name="pag_int" class="pag_int" placeholder="Página de Internet"></br>
                </div>
                <div class="col-md-3">
                    <label>Correo Electrónico</label></br>                
                    <input type="text" name="correo" class="correo" placeholder="Email"></br></br>
                </div>
            </div>
                <label>Nombre del Proyecto</label></br>
                <input type="text" name="nom_proyecto" class="nom_proyecto" placeholder="Proyecto" size="100"></br></br>
                <label>Nombre del Responsable del Proyecto</label></br>
                <input type="text" name="nom_resp" class="nom_resp" placeholder="Responsable del proyecto" size="60"></br></br>
            <div class="row">
                <div class="col-md-2">
                    <label>Eje Temático</label></br>
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
                    </select></br></br>
                </div>
                <div class="col-md-9">
                    <div id="1" style="display: none;"><br>
                        <label>Eje 1) Prevención y atención de la violencia al interior de las familias y fortalecimiento de la diversidad familiar</label>
                    </div>
                    <div id="2" style="display: none;"><br>
                        <label>Eje 2) Fortalecimiento de la participación comunitaria en la política alimentaria</label>
                    </div>
                    <div id="3" style="display: none;"><br>
                        <label>Eje 3) Promoción y fortalecimiento de las políticas sociales</label>
                    </div>
                    <div id="4" style="display: none;"><br>
                        <label>Eje 4) Promoción de los derechos humanos, no discriminación y diversidad sexual </label>
                    </div>
                    <div id="5" style="display: none;"><br>
                        <label>Eje 5) Desarrollo comunitario, promoción de la cultura y comunicación social alternativa</label>
                    </div>
                    <div id="6" style="display: none;"><br>
                        <label>Eje 6) Promoción de los Derechos de Acceso a la Información Pública y Protección de Datos Personales</label>
                    </div>
                    <div id="7" style="display: none;"><br>
                        <label>Eje 7) Fortalecimiento para el sano desarrollo y garantía de derechos humanos para poblaciones en desventaja social</label>
                    </div>
                    <div id="8" style="display: none;"><br>
                        <label>Eje 8) Promoción y acceso de las mujeres al ejercicio de sus derechos humanos y a una vida libre de violencias </label>
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
                    <option value="sub_1_5">1.5</option>
                    <option value="sub_1_6">1.6</option>
                    <option value="sub_1_7">1.7</option>
                    <option value="sub_1_8">1.8</option>
                    <option value="sub_1_9">1.9</option>
                    <option value="sub_2_1">2.1</option>
                    <option value="sub_2_2">2.2</option>
                    <option value="sub_2_3">2.3</option>
                    <option value="sub_3_1">3.1</option>
                    <option value="sub_3_2">3.2</option>
                    <option value="sub_3_3">3.3</option>
                    <option value="sub_3_4">3.4</option>
                    <option value="sub_4_1">4.1</option>
                    <option value="sub_4_2">4.2</option>
                    <option value="sub_4_3">4.3</option>
                    <option value="sub_4_4">4.4</option>
                    <option value="sub_4_5">4.5</option>
                    <option value="sub_5_1">5.1</option>
                    <option value="sub_5_2">5.2</option>
                    <option value="sub_5_3">5.3</option>
                    <option value="sub_5_4">5.4</option>
                    <option value="sub_5_5">5.5</option>
                    <option value="sub_5_6">5.6</option>
                    <option value="sub_5_7">5.7</option>
                    <option value="sub_5_8">5.8</option>
                    <option value="sub_5_9">5.9</option>
                    <option value="sub_6_1">6.1</option>
                    <option value="sub_6_2">6.2</option>
                    <option value="sub_6_3">6.3</option>
                    <option value="sub_7_1">7.1</option>
                    <option value="sub_7_2">7.2</option>
                    <option value="sub_7_3">7.3</option>
                    <option value="sub_7_4">7.4</option>
                    <option value="sub_7_5">7.5</option>
                    <option value="sub_7_6">7.6</option>
                    <option value="sub_7_7">7.7</option>
                    <option value="sub_7_8">7.8</option>
                    <option value="sub_7_9">7.9</option>
                    <option value="sub_7_10">7.10</option>
                    <option value="sub_7_11">7.11</option>
                    <option value="sub_7_12">7.12</option>
                    <option value="sub_7_13">7.13</option>
                    <option value="sub_7_14">7.14</option>
                    <option value="sub_8_1">8.1</option>
                    <option value="sub_8_2">8.2</option>
                    <option value="sub_8_3">8.3</option>
                    <option value="sub_8_4">8.4</option>
                    <option value="sub_8_5">8.5</option>
                    <option value="sub_8_6">8.6</option>
                    <option value="sub_8_7">8.7</option>
                    <option value="sub_8_8">8.8</option>
                    <option value="sub_8_9">8.9</option>
                    <option value="sub_8_10">8.10</option>
                    <option value="sub_8_11">8.11</option>
                    <option value="sub_8_12">8.12</option>
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
                    <label><input type="checkbox" value="A" name="1" id="1">Álvaro Obregón</label>
                </div>
                <div class="col-md-2">
                    <label><input type="checkbox" value="B" name="2" id="2">Azcapotzalco</label>
                </div>
                <div class="col-md-2">
                    <label><input type="checkbox" value="C" name="3" id="3">Benito Juárez</label>
                </div>
                <div class="col-md-2">
                    <label><input type="checkbox" value="D" name="4" id="4">Coyoacán</label>
                </div>
                <div class="col-md-2">
                    <label><input type="checkbox" value="E"name="5" id="5">Cuajimalpa</label>
                </div>
                <div class="col-md-2">
                    <label><input type="checkbox" value="D" name="6" id="6">Cuauhtémoc</label>
                </div>
                <div class="col-md-2">
                    <label><input type="checkbox" value="F" name="7" id="7">Gustavo A. Madero</label>
                </div>
                <div class="col-md-2">
                    <label><input type="checkbox" value="G" name="8" id="8">Iztacalco</label>
                </div>
                <div class="col-md-2">
                    <label><input type="checkbox" value="H" name="9" id="9">Iztapalapa</label>
                </div>
                <div class="col-md-2">
                    <label><input type="checkbox" value="I" name="10" id="10">Magdalena Contreras</label>
                </div>
                <div class="col-md-2">
                    <label><input type="checkbox" value="J" name="11" id="11">Miguel Hidalgo</label>
                </div>
                <div class="col-md-2">
                    <label><input type="checkbox" value="K" name="12" id="12">Milpa Alta</label>
                </div>
                <div class="col-md-2">
                    <label><input type="checkbox" value="L" name="13" id="13">Tláhuac</label>
                </div>
                <div class="col-md-2">
                    <label><input type="checkbox" value="M" name="14" id="14">Tlalpan</label>
                </div>
                <div class="col-md-2">
                    <label><input type="checkbox" value="N" name="15" id="15">Venustiano Carranza</label>
                </div>
                <div class="col-md-2">
                    <label><input type="checkbox" value="O" name="16" id="16">Xochimilco</label>
                </div>
                <div class="row">
                    <div class="col-md-2 col-md-offset-6">
                        <label><input type="checkbox" value="ABCDEFGHIJKLMNO" name="marcarTodo" id="marcarTodo">Todas</label>
                        <label for="marcarTodo"></label>
                    </div>
                </div>
            </div>
            <div class="row"><br><br>
                <div class="col-md-3">
                    <label>Institución que dictamina</label></br>
                        <select name="ins_dic">
                            <option value=""></option>
                            <option value="DGIDS">DGIDS</option>
                            <option value="DIF">DIF</option>
                            <option value="INMUJERES">Inmujeres</option>
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
                    <input type="text" name="mon_sol" class="mon_sol" placeholder="Monto Solicitado"></br>
                </div>
            </div><br>
            <div class="row">
                <div class="col-md-3">
                    <label>Población Objetivo</label>
                        <select name="pob_obj">
                            <option value=""></option>
                            <option value="1">Personas Adultas Mayores</option>
                            <option value="2">Comites Ciudadanos</option>
                            <option value="3">Personas con Discapacidad</option>
                            <option value="4">Hombres</option>
                            <option value="5">Jovenes</option>
                            <option value="6">Mujeres</option>
                            <option value="7">Niñas/Niños</option>
                            <option value="8">Organizaciones Sociales</option>
                            <option value="9">Población en General</option>
                            <option value="10">Población LGBTTTI</option>
                            <option value="11">Pueblos y Colectividades Indigenas</option>
                        </select>
                </div>
                        <div class="col-md-2 col-md-offset-2">
                            <label>Mujeres</label></br>
                            <input type="text" name="num_mujeres" class="internet" placeholder="No. Mujeres">
                        </div>
                        <div class="col-md-2 col-md-offset-2">
                            <label>Hombres</label></br>
                            <input type="text" name="num_hombres" class="internet" placeholder="No. Hombres"></br>
                        </div>
            </div></br>
            <div class="row">
                    <div class="form-group">
                        <label for="comment">Objetivo general del Proyecto</label>
                        <textarea  name="objetivo" class="form-control" rows="5" id="comment"></textarea>
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
                                        <input type="radio" name="rec_ficha_tec" value='SI'>Sí
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="rec_ficha_tec" value='NO'>No
                                    </label>
                            </td>
                        </tr>
                        <tr>
                            <td>2. Archivo electrónico del proyecto y ficha técnica (CD o USB)</td>
                            <td>
                                    <label class="radio-inline">
                                        <input type="radio" name="rec_arch_elec" value='SI'>Sí
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="rec_arch_elec" value='NO'>No
                                    </label>
                            </td>
                        </tr>
                        <tr>
                            <td>3. Copia fotostática simple de la Constancia de inscripción en el Registro de Organizaciones Civiles del Distrito Federal</td>
                            <td>
                                    <label class="radio-inline">
                                        <input type="radio" name="rec_cons_insc" value='SI'>Sí
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
                                        <input type="radio" name="rec_carta" value='SI'>Sí
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="rec_carta" value='NO'>No
                                    </label>
                            </td>
                        </tr>
                        <tr>
                            <td>5. Constancia de participación de la plática informativa</td>
                            <td>
                                    <label class="radio-inline">
                                        <input type="radio" name="rec_cons_plat" value='SI'>Sí
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="rec_cons_plat" value='NO'>No
                                    </label>
                            </td>
                        </tr>
                        <tr>
                            <td>6. Documento de terminación 2014 y/o 2013</td>
                            <td>
                                    <label class="radio-inline">
                                        <input type="radio" name="rec_doc_term" value='SI'>Sí
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
                        <textarea name="observaciones" class="form-control" rows="1" id="comment"></textarea>
                    </div>
            </div>
            <div class="row">
                <div class="col-md-3">            
                    <label>Responsable quien recibe el proyecto</label></br>
                    <input type="text" name="resp_proyecto" class="repre" placeholder="Nombre" size="40">
                </div>
                <div class="col-md-4 col-md-offset-2">
                    <label>Nombre de la persona que entrega el proyecto</label></br>
                    <input type="text" name="nom_per_entrega" class="registro" placeholder="Nombre" size="40"></br>
                </div>
                <div class="col-md-1">
                    <label>Cargo</label></br>
                    <input type="text" name="cargo" class="registro" placeholder="Cargo"></br>
                </div>
            </div>
            <div class="col-md-1 col-md-offset-6"><br><br>
                <button type="submit"class="btn btn-primary btn-md" >Ingresar</button><br><br>
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
