<?php 
session_name("AutomatoPHP");
session_start();

require("Automato.php");
require("Estado.php");
require("Transicao.php");


        $automato = new Automato();
    
        
        $symbol = array ("25", "100", "50", "25", "100", "50", "50");
        
        $automato->setEstado("login.php");
        $automato->setEstado("action-selection.php");
        $automato->setEstado("business-plan-parametrization.php");
        $automato->setEstado("document-selection.php");
        
        $automato->setEstado("game-parametrization.php");
        $automato->setEstado("game.php");
        $automato->setEstado("business-plan.php");
        $automato->setEstado("document.php");

        // Definindo qual estado é Inicial e quais são estados Finais 
        $automato->setEstadoInicial("login.php");
        
        $automato->setEstadosFinais("document-selection.php");
        $automato->setEstadosFinais("game.php");        
        $automato->setEstadosFinais("business-plan.php");
     
        
        // Definindo todas as transições do autômato 
        // (origem, destino, simbolo,paraImprimir) 
        $automato->setTransition("pagina0.php", 1,"25","");
        
        //$_SESSION['AUTOMATO'] = $automato;
                
        //$_SESSION['ESTADO_ATUAL'] = 0;
        $evento = filter_input(INPUT_GET, "link");
        
        $arrSymbol[0] = $evento;//str_split($symbol);
        $i = 0;    
        
        
        //while($i < count($arrSymbol)) {            

            print("Do estado q{$_SESSION['ESTADO_ATUAL']} "  );
            $_SESSION['TRANSICAO'] = $automato->getTransition($_SESSION['ESTADO_ATUAL'], $arrSymbol[$i] );

            if($_SESSION['TRANSICAO'] == null){
                die(" NÃO existe transições para o símbolo \"" . $arrSymbol[$i]  . "\" então trava o automato ");
                //break;
            }
           // $saida = (($_SESSION['TRANSICAO']->getSymbolMealy() == "1") ? "1 Lata Liberada!": "NENHUMA Lata Liberada!");
            
           
            $_SESSION['DESTINO'] = $_SESSION['TRANSICAO']->getDestino();
            $_SESSION['ESTADO_ATUAL'] = $_SESSION['DESTINO']->getId();
            
            print("leu o símbolo " .
                                $arrSymbol[$i] .
                                " foi para o " . 
                                $automato->getEstado($_SESSION['ESTADO_ATUAL'])->getName() .
                                " - " .$automato->getEstado($_SESSION['ESTADO_ATUAL'])->getLabel(). ": Saída:");
            
            require "pages/".$_SESSION['ESTADO_ATUAL']->getId();
             
             echo "</br>";
            //$i++;
           
        //}
        // Exibe o estado em que o autômato se encontra ao final da leitura da palavra. 
        //estadoFinalDeAutomato(symbol, automato, originId);
        
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <a href="?link=25">25</a></br>
        <a href="?link=50">50</a></br>
        <a href="?link=100">100</a></br>
    </body>
</html>
        
<?php
echo "<pre>";
//    print_r($_SESSION);
echo "<pre>";

   