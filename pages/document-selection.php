<?php
/**
 * Created by PhpStorm.
 * User: gilson
 * Date: 30/06/17
 * Time: 11:03
 */
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
            <?php echo "<h3>Document-selection</h3>"; ?>           
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
