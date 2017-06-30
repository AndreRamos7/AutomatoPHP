<?php 
require("Automato.php");
require("Estado.php");
require("Transicao.php");


?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>aaaaaa</title>
    </head>
    <body>
        <?php
            $automato = new Automato();
        // faz a leitura da palavra a ser reconhecid
        //String symbol = "1110011";
        
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
        //int finalStates[] = {1};
        // Definindo todas as transições do autômato 
        // (origem, destino, simbolo,paraImprimir) 
        $automato->setTransitionMealy(0, 1,"25","0");
        $automato->setTransitionMealy(0, 2,"50","0");
        $automato->setTransitionMealy(0, 0,"100","1");
        
        $automato->setTransitionMealy(1, 2,"25","0");
        $automato->setTransitionMealy(1, 3,"50","0");
        $automato->setTransitionMealy(1, 1,"100","1");
        
        $automato->setTransitionMealy(2, 3,"25","0");
        $automato->setTransitionMealy(2, 0,"50","1");
        $automato->setTransitionMealy(2, 2,"100","1");
        
        $automato->setTransitionMealy(3, 1,"50","1");
        $automato->setTransitionMealy(3, 0,"25","1");
        $automato->setTransitionMealy(3, 3,"100","1");
        
        
               
        $transition;
        $destiny;
        
        $i = 0;
        $originId = 0;
        $arrSymbol = $symbol;//str_split($symbol);
        
        while($i < count($arrSymbol)) {            

            print("Do estado q$originId "  );
            $transition = $automato->getTransition($originId, $arrSymbol[$i] );

            if($transition == null){
                print(" NÃO existe transições para o símbolo \"" . $arrSymbol[$i]  . "\" então trava o automato ");
                break;
            }
            $saida = (($transition->getSymbolMealy() == 1) ? "1 Lata Liberada!": "NENHUMA Lata Liberada!");
            
            $destiny = $transition->getDestino();
            $originId = $destiny->getId();
            
            print("leu o símbolo " .
                                $arrSymbol[$i] .
                                " foi para o " . 
                                $automato->getEstado($originId)->getName() .
                                " - " .$automato->getEstado($originId)->getLabel(). ": Saída:  $saida<br>");
            $i++;

        }
        // Exibe o estado em que o autômato se encontra ao final da leitura da palavra. 
        //estadoFinalDeAutomato(symbol, automato, originId);
        
        
        
        ?>
    </body>
</html>
