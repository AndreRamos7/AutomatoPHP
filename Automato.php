<?php

/**
 * Description of Automato
 *
 * @author andre
 */
class Automato {
    //put your code here
    
    private $estados;
    private $estadosFinais;
    private  $estadosIniciais;
    /**
     *
     * @var Array
     * Array com um conjunto de transicoes do automato 
     */
    private  $transicao;
    
    private $startState;
    private $startStateLimit = 0;
    private $finalStates;
    
    
    public function __construct() {
        $this->estados = array();
        $this->estadosFinais = array();
        $this->estadosIniciais = array();
        $this->transicao = array();
        $this->startState = array();
        $this->startStateLimit = array();
        $this->finalStates = array();
    }
    
    public function getEstados() {
        return $this->estados;
    }

    public function getEstadosFinais() {
        return $this->estadosFinais;
    }

   
    public function getTransicao() {
        return $this->transicao;
    }


    public function getStartStateLimit() {
        return $this->startStateLimit;
    }

    public function getFinalStates() {
        return $this->finalStates;
    }

    public function setEstadosFinais($estadoFinalId) {
        
        $estado = $this->estados[$estadoFinalId];
        $estado->setName("Estado final");
        array_push($this->estadosFinais, $estado);      
    }
    
    public function setEstado($estadoId) {
       array_push($this->estados,array("$estadoId" => new Estado($estadoId, "", "q".$estadoId)));
    }    
    
     public function getEstado($idEstado){
        return $this->estados[$idEstado];
    }
    public function getEstadosIniciais() {
        return $this->estadosIniciais;
    }
    
    public function setEstadoInicial($estadoInicial) {
        $this->estadoInicial = $estadoInicial;
    }
    public function isFinalState($id) {
        if($this->estados[$id]->getName() == "Estado final"){
            return true;
        }
        return false;
    }
    
    public function getStartState() {
        return $this->startState;
    }
    public function setTransitionMealy($origin, $destiny, $symbol,  $symbolMealy) {
       $origem = $this->estados[$origin];
       $destino = $this->estados[$destiny];               
       array_push($this->transicao, new Transicao($origem, $destino, $symbol, $symbolMealy)); 
      
    }
    public function getTransition($originId, $symbol) {
        $tr = new Transicao();
	foreach ($this->transicao as $keyTr => $valueTr) {
            $tr = $valueTr;
            if(($tr->getSimbolo() == symbol) && ($tr->getOrigem()->getId() == $originId)){
               return $tr;
            } 
        }    
        return null;
    }
}
