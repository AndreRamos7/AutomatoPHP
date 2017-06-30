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
        
        $symbol = "xxxx   Xxxxx. xxxxx X";
       
        $automato->setEstado(0);
        $automato->setEstado(1);
        $automato->setEstado(2);
        $automato->setEstado(3);
        $automato->setEstado(4);
        $automato->setEstado(5);

        // Definindo qual estado é Inicial e quais são estados Finais 
        $automato->setEstadoInicial(0);
        $automato->setEstadosFinais(4);
        //int finalStates[] = {1};
        // Definindo todas as transições do autômato 
        // (origem, destino, simbolo,paraImprimir) 
        $automato->setTransitionMealy(0, 1,"x","X");$automato->setTransitionMealy(0, 1,"X","X");
        $automato->setTransitionMealy(0, 2,"_","");
        
        $automato->setTransitionMealy(1, 1,"x","x");$automato->setTransitionMealy(1, 1,"X","x");
        $automato->setTransitionMealy(1, 3,"_","");
        $automato->setTransitionMealy(1, 4,".",".");
        
        $automato->setTransitionMealy(2, 1,"x","X");$automato->setTransitionMealy(2, 1,"X","X");
        $automato->setTransitionMealy(2, 2,"_","");
        $automato->setTransitionMealy(2, 4,".",".");

        $automato->setTransitionMealy(3, 1,"x","_x");$automato->setTransitionMealy(3, 1,"X","_x");
        $automato->setTransitionMealy(3, 3,"_","");
        $automato->setTransitionMealy(3, 4,".",".");
        
        
        $automato->setTransitionMealy(4, 1,"X","_X");$automato->setTransitionMealy(4, 1,"x","_X");
        $automato->setTransitionMealy(4, 5,"_","_");
        
        $automato->setTransitionMealy(5, 0,".","");
        $automato->setTransitionMealy(5, 5,"_","");
        
        
        
               
        $transition;
        $destiny;
        
        $i = 0;
        $originId = 0;
        $arrSymbol = str_split($symbol);
        
		while($i < count($symbol)) {            
            
                print("Do estado q$originId"  );
                $transition = $automato->getTransition($originId, "" . $arrSymbol[$i] );
                
                if($transition == null){
                    print(" NÃO existe transições para o símbolo \"" . $arrSymbol[$i]  . "\" então trava o automato ");
                    break;
                }
                $destiny = $transition->getDestino();
                $originId = $destiny->getId();
                print(" leu o símbolo \"" .
                                    $arrSymbol[$i] .
                                    "\" foi para o \"" + 
                                    $automato->getEstado($originId)->getName() .
                                    "\" - " .$automato->getEstado($originId)->getLabel(). "\n");
                $i++;
            
        }
        // Exibe o estado em que o autômato se encontra ao final da leitura da palavra. 
        //estadoFinalDeAutomato(symbol, automato, originId);
        
        
        
        ?>
    </body>
</html>
