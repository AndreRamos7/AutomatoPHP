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
        <title>PPGCC - Document-selection</title>
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
            <h1>Document-selection: <?php echo $_SESSION['perfil'] ?></h1>
        </div>
        <div class="container">
            
            <ul class="list-group">
              <li class="list-group-item">News <span class="badge">12</span></li>
              <li class="list-group-item">Deleted <span class="badge">5</span></li>
              <li class="list-group-item">Warnings <span class="badge">3</span></li>
            </ul>
        </div>
    </body>
</html>
