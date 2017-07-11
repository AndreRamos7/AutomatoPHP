<?php
session_start();
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
        <title>PPGCC - Business-plan-parametrization</title>
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
            <h1>Business-plan-parametrization: <?php echo $_SESSION['perfil'] ?></h1>
        </div>
        <div class="container">
            <h4>Business-plan-parametrization </h4>
            <ul class="list-group">
              <li class="list-group-item">Business nas empresas <span class="badge">12</span></li>
              <li class="list-group-item">Business nas Universidades <span class="badge">5</span></li>
              <li class="list-group-item">Business no município <span class="badge">3</span></li>
            </ul>
        </div>
    </body>
</html>
