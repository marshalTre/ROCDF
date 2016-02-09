<?php
if (!isset($_SESSION)) {
    session_start();
}
error_reporting(0);

require_once './datos_conexion.php';

$nom_org = filter_input(INPUT_POST, 'nom_org');
$tipo_org = filter_input(INPUT_POST, 'tipo_org');
$rep_legal = filter_input(INPUT_POST, 'rep_legal');
$registro = filter_input(INPUT_POST, 'registro');
$calle = filter_input(INPUT_POST, 'calle');
$num_ext = filter_input(INPUT_POST, 'num_ext');
$colonia = filter_input(INPUT_POST, 'colonia');
$delegacion = filter_input(INPUT_POST, 'delegacion');
$cod_postal = filter_input(INPUT_POST, 'cod_postal');
$tel_fijo = filter_input(INPUT_POST, 'tel_fijo');
$tel_movil = filter_input(INPUT_POST, 'tel_movil');
$pag_int = filter_input(INPUT_POST, 'pag_int');
$correo = filter_input(INPUT_POST, 'correo');
$nom_proyecto = filter_input(INPUT_POST, 'nom_proyecto');
$nom_resp = filter_input(INPUT_POST, 'nom_resp');
$eje_tem = filter_input(INPUT_POST, 'eje_tem');
$sub_eje = filter_input(INPUT_POST, 'sub_eje');
/**  $marcarTodo = $_POST["marcarTodo"]; */
$ins_dic = filter_input(INPUT_POST, 'ins_dic');
$tipo_proyecto = filter_input(INPUT_POST, 'tipo_proyecto');
$mon_sol = filter_input(INPUT_POST, 'mon_sol');
$pob_obj = filter_input(INPUT_POST, 'pob_obj');
$num_mujeres = filter_input(INPUT_POST, 'num_mujeres');
$num_hombres = filter_input(INPUT_POST, 'num_hombres');
$objetivo = filter_input(INPUT_POST, 'objetivo');
$rec_ficha_tec = filter_input(INPUT_POST, 'rec_ficha_tec');
$rec_arch_elec = filter_input(INPUT_POST, 'rec_arch_elec');
$rec_cons_insc = filter_input(INPUT_POST, 'rec_cons_insc');
$rec_carta = filter_input(INPUT_POST, 'rec_carta');
$rec_cons_plat = filter_input(INPUT_POST, 'rec_cons_plat');
$rec_doc_term = filter_input(INPUT_POST, 'rec_doc_term');
$observaciones = filter_input(INPUT_POST, 'observaciones');
$resp_proyecto = filter_input(INPUT_POST, 'resp_proyecto');
$nom_per_entrega = filter_input(INPUT_POST, 'nom_per_entrega');
$cargo = filter_input(INPUT_POST, 'cargo');

$consulta = "INSERT INTO registro( nom_org, tipo_org, rep_legal, registro, calle, num_ext, colonia, delegacion, cod_postal, tel_fijo, tel_moviL,
                            pag_int, correo, nom_proyecto, nom_resp, eje_tem, sub_eje, ins_dic, tipo_proyecto, mon_sol, pob_obj, num_mujeres, 
                               num_hombres, objetivo, rec_ficha_tec, rec_arch_elec, rec_cons_insc, rec_carta, rec_cons_plat, rec_doc_term, observaciones, resp_proyecto, nom_per_entrega, cargo ) 
                                values ('" . $nom_org . "','" . $tipo_org . "','" . $rep_legal . "','" . $registro . "','" . $calle . "','" . $num_ext . "','" . $colonia . "','" . $delegacion . "'
                                            ,'" . $cod_postal . "','" . $tel_fijo . "','" . $tel_movil . "','" . $pag_int . "','" . $correo . "','" . $nom_proyecto . "','" . $nom_resp . "','" . $eje_tem . "','" . $sub_eje . "'
                                                ,'" . $ins_dic . "','" . $tipo_proyecto . "','" . $mon_sol . "','" . $pob_obj . "','" . $num_mujeres . "','" . $num_hombres . "','" . $objetivo . "','" . $rec_ficha_tec . "'
                                                    ,'" . $rec_arch_elec . "','" . $rec_cons_insc . "','" . $rec_carta . "','" . $rec_cons_plat . "','" . $rec_doc_term . "','" . $observaciones . "','" . $resp_proyecto . "','" . $nom_per_entrega . "','" . $cargo . "')";

$query = mysqli_query(conector::conexion(), $consulta);
header('Location: ./controlador.php');

