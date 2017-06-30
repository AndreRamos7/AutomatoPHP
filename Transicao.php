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
    private $symbolMealy;
    public $simbolo;
    
    public function __construct(Estado $origem, Estado $destino, $simbolo, $symbolMealy) {
        $this->origem = $origem;
        $this->destino = $destino;
        $this->symbolMealy = $symbolMealy;
        $this->simbolo = $simbolo;
    }
    
    public function getOrigem() {
        return $this->origem;
    }

    public function getDestino() {
        return $this->destino;
    }

    public function getSymbolMealy() {
        return $this->symbolMealy;
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

    public function setSymbolMealy($symbolMealy) {
        $this->symbolMealy = $symbolMealy;
    }

    public function setSimbolo($simbolo) {
        $this->simbolo = $simbolo;
    }



    
    
}
