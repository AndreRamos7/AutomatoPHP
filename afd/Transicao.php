<?php
/**
 * Description of Transicao
 *
 * @author andre
 */
class Transicao {
    //put your code here
    private $origem;
    private $destino;
    public $simbolo;
    
    public function __construct(Estado $origem, Estado $destino, $simbolo) {
        $this->origem = $origem;
        $this->destino = $destino;
        $this->simbolo = $simbolo;
    }
    
    public function getOrigem() {
        return $this->origem;
    }

    public function getDestino() {
        return $this->destino;
    }

    public function getSimbolo() {
        return $this->simbolo;
    }

    public function setOrigem($origem) {
        
        $this->origem = $origem;
    }

    public function setDestino($destino) {
        $this->destino = $destino;
    }

    public function setSimbolo($simbolo) {
        $this->simbolo = $simbolo;
    }



    
    
}
