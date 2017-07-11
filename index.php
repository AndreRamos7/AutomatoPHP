<?php 
session_name("AutomatoPHP");
session_start();

require "afd/Estado.php";
require "afd/Transicao.php";
require "afd/Automato.php";
 
header("Location: http://localhost:85/pages/login.php");

        if(!isset($_SESSION['ESTADO_ATUAL'])){
            $_SESSION['ESTADO_ATUAL'] = "login.php";
        }

        echo count($_SESSION)."<br/>";
        $automato = new Automato();
    
        $automato->setEstado("login.php"); //1
        $automato->setEstado("action-selection.php"); //2
        $automato->setEstado("business-plan-parametrization.php"); //3
        $automato->setEstado("document-selection.php"); //4
        
        $automato->setEstado("game-parametrization.php"); //5
        $automato->setEstado("game.php"); //6
        $automato->setEstado("business-plan.php"); //7
        $automato->setEstado("document.php"); //8

        // Definindo qual estado é Inicial e quais são estados Finais 
        $automato->setEstadoInicial("login.php");        
        $automato->setEstadosFinais("document-selection.php");
        $automato->setEstadosFinais("game.php");        
        $automato->setEstadosFinais("business-plan.php");
     
        
        // Definindo todas as transições do autômato 
        // (origem, destino, simbolo) 
        $automato->setTransition("login.php","login.php","e0"); //login
        $automato->setTransition("login.php", "action-selection.php","e1"); //login
        $automato->setTransition("action-selection.php", "business-plan-parametrization.php","e3");
        $automato->setTransition("action-selection.php", "login.php","e2"); //logout
        
        $automato->setTransition("action-selection.php", "game-parametrization.php","e4"); //indo para games
        $automato->setTransition("action-selection.php", "document-selection.php","e5");
        
        $automato->setTransition("document-selection.php", "action-selection.php", "e6");
        
        
          
        //$_SESSION['ESTADO_ATUAL'] = 0;
        $evento = filter_input(INPUT_GET, "link");
          
        print("Do estado {$_SESSION['ESTADO_ATUAL']} "  );
        $_SESSION['TRANSICAO'] = $automato->getTransition($_SESSION['ESTADO_ATUAL'], $evento );

        if($_SESSION['TRANSICAO'] == null){
            session_unset();
            unset($_SESSION);
            
            die(" NÃO existe transições para o símbolo \"" . $evento  . "\" então trava o automato<br/> <a href='?link=e0'>e0</a>");
        }

      
        
        $_SESSION['DESTINO'] = $_SESSION['TRANSICAO']->getDestino();
        $_SESSION['ESTADO_ATUAL'] = $_SESSION['DESTINO']->getId();

        print("leu o símbolo " .
                            $evento .
                            " foi para o " . 
                            $automato->getEstado($_SESSION['ESTADO_ATUAL'])->getName() .
                            " - " .$automato->getEstado($_SESSION['ESTADO_ATUAL'])->getLabel(). ": Saída:");

      

         echo "";
           
        // Exibe o estado em que o autômato se encontra ao final da leitura da palavra. 
        //estadoFinalDeAutomato(symbol, automato, originId);
        
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
            
            div#conteudo{
                
                display: block;
                border: 1px solid black;
                width: 600px;
                height: 550px;   
            }
            div#menu{
                display: block;
                border: 1px solid black;
                width: 600px;
                height: 50px;    
            }
            div#menu a{
                display: block;
                border: 1px solid black;
                width: 50px;
                height: auto;
                margin: 15px;
                background-color: antiquewhite;
                float: left;
                text-align: center;
            }
            
        </style>
    </head>
    <body>
        <div id="menu">
            <a href="?link=e1">e1</a>
            <a href="?link=e2">e2</a>
            <a href="?link=e3">e3</a>

            <a href="?link=e4">e4</a>
            <a href="?link=e5">e5</a>
            <a href="?link=e6">e6</a>
            <a href="./pages/apagar.php">apagar Sessao</a>
        </div>
        
        <div id="conteudo">
            
            <?php
                  require "./pages/" . $_SESSION['ESTADO_ATUAL'];
            ?>
            
        </div>
    </body>
</html>
        
<?php
echo "<pre>";

    print_r(session_get_cookie_params());
echo "<pre>";

   