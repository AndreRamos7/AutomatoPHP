<?php

session_start();

require "../afd/Estado.php";
require "../afd/Transicao.php";
require "../afd/AutomatoFactory.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $automato = AutomatoFactory::getPageFlow();
    $next = $automato->getTransition($_SERVER['PHP_SELF'], "e1");

    if($next != null) {
        $_SESSION['perfil'] = $_POST['perfil'];
        header("Location: http://localhost" . $next->getDestino()->getId());
    }
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
        <title>PPGCC - Login</title>
        <style>
            
            #btnlogar{                
                float: right;
            }
            #cabecalho{                
                background-color: #4CAF50;
            }
        </style>
    </head>
    <body>
        <div class="container jumbotron" id="cabecalho">
            <h1>PPGCC - Login</h1>            
        </div>
        <div class="container">         
            <div class="row"> 
                <div class="col-md-6 well">
                    <form action="/pages/login.php" method="post" >
                        <label for="sel1">Perfil</label>
                        <select class="form-control" id="sel1" name="perfil" class="form-control" >
                            <option value="student-beginner">Estudante - Iniciante</option>
                            <option value="student-advanced">Estudante - Avançado</option>
                            <option value="professor">Professor</option>
                        </select>
                        <br>
                        <br>
                        <button class="btn btn-primary" type="submit" id="btnlogar">Entrar</button>
                    </form>
                </div>
                <div class="col-md-6 well"></div>
            </div>                
        </div>
    </body>
</html>
