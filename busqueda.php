<?php
session_start();
if (isset($_SESSION["session_user"])) {
    
} else {
    header("location:index.html");
    exit();
}
error_reporting(0);
?>
<!DOCTYPE html>

<html>
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
        <script type="text/javascript" src="js/mayusculas.js"></script>
        <title>Buscar</title>
    </head>
    <body>
        <br><br>
        
        <center>

            <div class="container-fluid" style="border-style: solid; background: -moz-linear-gradient(left, rgba(183,222,237,1) 0%, rgba(113,206,239,1) 27%, rgba(33,180,226,1) 51%, rgba(183,222,237,1) 100%);"></br></br></br>    
            
                <form action="control/buscar.php" method="post">
                    <!-- <label>Folio de recepci&oacute;n</label></br>
                        <input type="text" name="folio" class="folio" placeholder="Folio"></br></br>-->
                    <div class="row">

                        <div class="col-md-12">
                            <label> <h2>Ingresa el Folio que deseas buscar</h2></label></br>
                            <input type="text" name="folio" class="organizacion" placeholder="Numero de Folio" size="70" onChange="conMayusculas(this)" required >
                        </div>

                    </div>
                    <div class="row"><br><br>
                        <div class="col-md-2 col-md-offset-5">
                            <button type="submit"class="btn btn-danger btn-md" >Buscar</button><br><br>
                        </div>

                    </div>
                </form>
            
        </div>

            </center>

        <script src="css/bootstrap-3.3.6-dist/js/bootstrap.js"></script>
        <script src="css/bootstrap-3.3.6-dist/js/jquery-1.11.3.min.js"></script>
    </body>
</html>
