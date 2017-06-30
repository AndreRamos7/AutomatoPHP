<?php 
session_name("AutomatoPHP");
session_start();




require("Automato.php");
require("Estado.php");
require("Transicao.php");


        $automato = new Automato();
    
        
        $symbol = array ("25", "100", "50", "25", "100", "50", "50");
        
        $automato->setEstado(0);
        $automato->setEstado(1);
        $automato->setEstado(2);
        $automato->setEstado(3);

        // Definindo qual estado é Inicial e quais são estados Finais 
        $automato->setEstadoInicial(0);
        
        $automato->setEstadosFinais(0);
        $automato->setEstadosFinais(1);
        $automato->setEstadosFinais(2);
        $automato->setEstadosFinais(3);
        
        // Definindo todas as transições do autômato 
        // (origem, destino, simbolo,paraImprimir) 
        $automato->setTransitionMealy(0, 1,"25","document.php");
        $automato->setTransitionMealy(0, 2,"50","document.php");
        $automato->setTransitionMealy(0, 0,"100","document-selection.php");
        
        $automato->setTransitionMealy(1, 2,"25","document.php");
        $automato->setTransitionMealy(1, 3,"50","document.php");
        $automato->setTransitionMealy(1, 1,"100","document-selection.php");
        
        $automato->setTransitionMealy(2, 3,"25","document.php");
        $automato->setTransitionMealy(2, 0,"50","document-selection.php");
        $automato->setTransitionMealy(2, 2,"100","document-selection.php");
        
        $automato->setTransitionMealy(3, 1,"50","document-selection.php");
        $automato->setTransitionMealy(3, 0,"25","document-selection.php");
        $automato->setTransitionMealy(3, 3,"100","document-selection.php");
        
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
             require "pages/".$_SESSION['TRANSICAO']->getSymbolMealy();
             
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
    print_r($_SESSION);
echo "<pre>";

   