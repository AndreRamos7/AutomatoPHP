<?php

require "../afd/Estado.php";
require "../afd/Transicao.php";
require "../afd/AutomatoFactory.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $automato = AutomatoFactory::getPageFlow();
    $next = $automato->getTransition($_SERVER['PHP_SELF'], $_POST['evento']);

    if($next != null) {
        header("Location: http://localhost" . $next->getDestino()->getId());
    }
} else {
    $availabilitySupervisor = AutomatoFactory::getAvailabilitySupervisor();
}

?>
<html>
    <head>
         <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="../webroot/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="../webroot/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="../webroot/bootstrap.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>PPGCC - Action Selection</title>
        <style>
            #btnlogar{
                float: right;
            }
            #cabecalho{
                background-color: #4CAF50;
            }
        </style>

        <script>
          $(document).ready(function(){
            /*$("button").click(function(){
                $.post("/pages/action-selection.php",
                { evento: "e3"},
                function(data, status){
                    //window.open("/pages/action-selection.php");
                    alert("Data: " + data + "\nStatus: " + status);
                });
            });*/
        });

        </script>

    </head>
    <body>
        <div class="container jumbotron" id="cabecalho">
            <h1>Action Selection</h1>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-6 well">
                    <form action="/pages/action-selection.php" method="post">
                        <select name="evento">
                            <option value="e3">Business Plan Parametrization</option>
                            <option value="e4">Game Parametrization</option>
                            <option value="e5">Document Selection</option>
                        </select>
                        <button type="submit" <?php echo $availabilitySupervisor->geTransition()->getDestino()->getId() === 'qS1,3' ? 'disabled=disabled' : '' ?> class="btn btn-primary" >Selecionar</button>
                        <br>
                        <br>
                    </form>

                    <form action="/pages/action-selection.php" method="post">
                        <input type="hidden" name="evento" value="e2">
                        <button type="submit"  class="btn btn-primary" >Sair</button>
                    </form>
                </div>
            <div class="col-md-6 well"></div>
        </div>
    </body>
</html>
