 <?php
require "datos_conexion.php";
session_start();
if (isset($_SESSION["session_user"])) {
    
} else {
    header("location:index.html");
    exit();
}



/**
 * @author www.intercambiosvirtuales.org
 * @copyright 2015
 */

 
  $nom_org = $_POST["nom_org"];
  $tipo_org = $_POST["tipo_org"];
  $rep_legal = $_POST["rep_legal"];
  $registro = $_POST["registro"];
  $calle = $_POST["calle"];
  $num_ext = $_POST["num_ext"];
  $colonia = $_POST["colonia"];
  $delegacion = $_POST["delegacion"];
  $cod_postal = $_POST["cod_postal"];
  $tel_fijo = $_POST["tel_fijo"];
  $tel_movil = $_POST["tel_movil"];
  $pag_int = $_POST["pag_int"];
  $correo = $_POST["correo"];
  $nom_proyecto = $_POST["nom_proyecto"];
  $nom_resp = $_POST["nom_resp"];
  $eje_tem = $_POST["eje_tem"];
  $sub_eje = $_POST["sub_eje"];
/**  $marcarTodo = $_POST["marcarTodo"];*/
  $ins_dic = $_POST["ins_dic"];
  $tipo_proyecto = $_POST["tipo_proyecto"];
  $mon_sol = $_POST["mon_sol"];
  $pob_obj = $_POST["pob_obj"];
  $num_mujeres = $_POST["num_mujeres"];
  $num_hombres = $_POST["num_hombres"];
  $objetivo = $_POST["objetivo"];
  $rec_ficha_tec = $_POST["rec_ficha_tec"];
  $rec_arch_elec = $_POST["rec_arch_elec"];
  $rec_cons_insc = $_POST["rec_cons_insc"];
  $rec_carta = $_POST["rec_carta"];
  $rec_cons_plat = $_POST["rec_cons_plat"];
  $rec_doc_term = $_POST["rec_doc_term"];
  $observaciones = $_POST["observaciones"];
  $resp_proyecto = $_POST["resp_proyecto"];
  $nom_per_entrega = $_POST["nom_per_entrega"];
  $cargo = $_POST["cargo"];

  $db = new mysqli($servidor,$nombreDeUsuario,$contrasena,$baseDeDatos);

    if ($db->connect_error){
        
        echo "<font color='red'><h2>Error en la conexión Intentalo más tarde</h2></font>";
        exit;
    }
$consulta = "insert into registro (nom_org,tipo_org,rep_legal,registro,calle,num_ext,colonia,delegacion,
                                    cod_postal,tel_fijo,tel_movil,pag_int,correo,nom_proyecto,nom_resp,eje_tem,sub_eje,
                                        ins_dic,tipo_proyecto,mon_sol,pob_obj,num_mujeres,num_hombres,objetivo,rec_ficha_tec,
                                            rec_arch_elec,rec_cons_insc,rec_carta,rec_cons_plat,rec_doc_term,observaciones,resp_proyecto,nom_per_entrega,cargo)
                                values ('".$nom_org."','".$tipo_org."','".$rep_legal."','".$registro."','".$calle."','".$num_ext."','".$colonia."','".$delegacion."'
                                            ,'".$cod_postal."','".$tel_fijo."','".$tel_movil."','".$pag_int."','".$correo."','".$nom_proyecto."','".$nom_resp."','".$eje_tem."','".$sub_eje."'
                                                ,'".$ins_dic."','".$tipo_proyecto."','".$mon_sol."','".$pob_obj."','".$num_mujeres."','".$num_hombres."','".$objetivo."','".$rec_ficha_tec."'
                                                    ,'".$rec_arch_elec."','".$rec_cons_insc."','".$rec_carta."','".$rec_cons_plat."','".$rec_doc_term."','".$observaciones."','".$resp_proyecto."','".$nom_per_entrega."','".$cargo."');";

$query = $db->query($consulta);

    if(!$query){
        
        echo "<font color='red'><h2>No se pudo ejecutar la consulta</h2></font>";
        exit;
    
    }

    if(mysqli_num_rows($query)==1){
        echo "<font color='red'><h2>Se registro se realizó exitosamente</h2></font>";
        exit;
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
                    <li data-toggle="modal" data-target="#imp"><a href="../librerias/formatopdf.php">Imprimir</a></li>
                    <li data-toggle="modal" data-target="#mod"><a href="#">Modificar</a></li>
                    <li data-toggle="modal" data-target="#bor"><a href="#">Borrar</a></li>
                    <li><a href='control/cerrarSesion.php' class="btn2" target="_top">Salir</a></li>
                </ul>
                <?php setlocale(LC_TIME, 'es_ES.UTF-8'); echo strftime("%A, %d de %B de %Y") ?>
            </center>
        </nav>
        
        <section class="imprimir">
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
        </section>
    <h2>Datos del usuario</h2>
    
    <table border="1">
        <tr>
            <th>folio</th>
            <th>nom_org</th>
            <th>tipo_org</th>
            <th>rep_legal</th>
            <th>registro</th>
	          <th>calle</th>
            <th>num_ext</th>
            <th>colonia</th>
            <th>delegacion</th>
            <th>cod_postal</th>
            <th>tel_fijo</th>
            <th>tel_movil</th>
            <th>pag_int</th>
            <th>correo</th>
            <th>nom_proyecto</th>
            <th>nom_resp</th>
            <th>eje_tem</th>
            <th>sub_eje</th>
            <th>del_intera</th>
            <th>ins_dic</th>
            <th>tipo_proyecto</th>
            <th>mon_sol</th>
            <th>pob_obj</th>
            <th>num_mujeres</th>
            <th>num_hombres</th>
            <th>objetivo</th>
            <th>rec_ficha_tec</th>
            <th>rec_arch_elec</th>
            <th>rec_cons_insc</th>
            <th>rec_carta</th>
            <th>rec_cons_plat</th>
            <th>rec_doc_term</th>
            <th>observaciones</th>
            <th>resp_proyecto</th>
            <th>nom_per_entrega</th>
            <th>cargo</th>
        </tr>
        <tr>
            <td><?php echo $folio ?></td>
            <td><?php echo $nom_org ?></td>
            <td><?php echo $tipo_org ?></td>
            <td><?php echo $rep_legal ?></td>
            <td><?php echo $registro ?></td>
            <td><?php echo $calle ?></td>
            <td><?php echo $num_ext ?></td>
            <td><?php echo $colonia ?></td>
            <td><?php echo $delegacion ?></td>
            <td><?php echo $cod_postal ?></td>
            <td><?php echo $tel_fijo ?></td>
            <td><?php echo $tel_movil ?></td>
            <td><?php echo $pag_int ?></td>
            <td><?php echo $correo ?></td>
            <td><?php echo $nom_proyecto ?></td>
            <td><?php echo $nom_resp ?></td>
            <td><?php echo $eje_tem ?></td>
            <td><?php echo $sub_eje ?></td>
            <td><?php echo $del_intera ?></td>
            <td><?php echo $ins_dic ?></td>
            <td><?php echo $tipo_proyecto ?></td>
            <td><?php echo $mon_sol ?></td>
            <td><?php echo $pob_obj ?></td>
            <td><?php echo $num_mujeres ?></td>
            <td><?php echo $num_hombres ?></td>
            <td><?php echo $objetivo ?></td>
            <td><?php echo $rec_ficha_tec ?></td>
            <td><?php echo $rec_arch_elec ?></td>
            <td><?php echo $rec_cons_insc ?></td>
            <td><?php echo $rec_carta ?></td>
            <td><?php echo $rec_cons_plat ?></td>
            <td><?php echo $rec_doc_term ?></td>
            <td><?php echo $observaciones ?></td>
            <td><?php echo $resp_proyecto ?></td>
            <td><?php echo $nom_per_entrega ?></td>
            <td><?php echo $cargo ?></td>
        </tr>
    </table>
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

