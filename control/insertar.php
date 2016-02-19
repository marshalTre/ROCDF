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
$del_alvaro = filter_input(INPUT_POST, 'del_alvaro');
$del_azcapotzalco = filter_input(INPUT_POST, 'del_azcapotzalco');
$del_benito = filter_input(INPUT_POST, 'del_benito');
$del_coyoacan = filter_input(INPUT_POST, 'del_coyoacan');
$del_cuajimalpa = filter_input(INPUT_POST, 'del_cuajimalpa');
$del_cuauhtemoc = filter_input(INPUT_POST, 'del_cuauhtemoc');
$del_gustavo = filter_input(INPUT_POST, 'del_gustavo');
$del_iztacalco = filter_input(INPUT_POST, 'del_iztacalco');
$del_iztapalapa = filter_input(INPUT_POST, 'del_iztapalapa');
$del_magdalena = filter_input(INPUT_POST, 'del_magdalena');
$del_miguel = filter_input(INPUT_POST, 'del_miguel');
$del_milpa = filter_input(INPUT_POST, '	del_milpa');
$del_tlahuac = filter_input(INPUT_POST, 'del_tlahuac');
$del_tlalpan = filter_input(INPUT_POST, 'del_tlalpan');
$del_venustiano = filter_input(INPUT_POST, 'del_venustiano');
$del_xochimilco = filter_input(INPUT_POST, 'del_xochimilco');
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



$consulta = "INSERT INTO registro_gral( nom_org, rep_legal, registro, calle, num_ext, colonia, delegacion, cod_postal, tel_fijo, tel_movil, pag_int,
             correo, nom_proyecto, nom_resp, tipo_proyecto, mon_sol, num_mujeres, num_hombres, del_alvaro, del_azcapotzalco, del_benito, del_coyoacan,
             del_cuajimalpa, del_cuauhtemoc, del_gustavo, del_iztacalco, del_iztapalapa, del_magdalena, del_miguel, del_milpa, del_tlahuac, del_tlalpan,
             del_venustiano, del_xochimilco, objetivo, rec_ficha_tec, rec_arch_elec, rec_copia_insc, rec_carta, rec_cons_plat, rec_doc_term, observaciones,
             nom_per_entrega, cargo, id_tipo_org, id_cat_eje, id_sub_eje, id_cat_poblacion, id_cat_institucion, id_usuarios ) 
             values ('".$nom_org."','".$rep_legal."','".$registro."','".$calle."','".$num_ext."','".$colonia."','".$delegacion."','".$cod_postal."','".$tel_fijo."','".$tel_movil."','".$pag_int."','".$correo."','".$nom_proyecto."','".$nom_resp."','".$tipo_proyecto."','".$mon_sol."','".$num_mujeres."','".$num_hombres."','".$del_alvaro."','".$del_azcapotzalco."','".$del_benito."','".$del_coyoacan."','".$del_cuajimalpa."','".$del_cuauhtemoc."','".$del_gustavo."','".$del_iztacalco."','".$del_iztapalapa."','".$del_magdalena."','".$del_miguel."','".$del_milpa."','".$del_tlahuac."','".$del_tlalpan."','".$del_venustiano."','".$del_xochimilco."','".$objetivo."','".$rec_ficha_tec."','".$rec_arch_elec."','".$rec_copia_insc."','".$rec_carta."','".$rec_cons_plat."','".$rec_doc_term."','".$observaciones."','".$nom_per_entrega."','".$cargo."','".$id_tipo_org."','".$id_cat_eje."','".$id_sub_eje."','".$id_cat_poblacion."','".$id_cat_institucion."','".$user."');";



$query = mysqli_query(conector::conexion(), $consulta);
clearstatcache();
header('Location: ./controlador.php?numUs= '. $resp_proyecto.'');

