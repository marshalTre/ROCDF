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



        <section class="imprimir">

            <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                Collapsible Group Item #1
                            </a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in">
                        <div class="panel-body">
                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                Collapsible Group Item #2
                            </a>
                        </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse">
                        <div class="panel-body">
                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                Collapsible Group Item #3
                            </a>
                        </h4>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse">
                        <div class="panel-body">
                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                        </div>
                    </div>
                </div>
            </div>

        </section>


        <aside>

        </aside>

        <footer>

        </footer>

        <script src="css/bootstrap-3.3.6-dist/js/bootstrap.js"></script>
        <script src="css/bootstrap-3.3.6-dist/js/jquery-1.11.3.min.js"></script> 
        <!--        archivos necesarios para generar los jquery y javascript de bootstrap sin internet-->

    </body>
</html>
