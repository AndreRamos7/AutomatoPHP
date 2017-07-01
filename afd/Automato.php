<?php

class Automato {

    private $estados;
    private $estadosFinais;
    private $estadosIniciais;
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

        $this->setEstado(0);//"/pages/login.php");
        $this->setEstado(1);//"/pages/action-selection.php");
        $this->setEstado(2);//"/pages/business-plan-parametrization.php");
        $this->setEstado(3);//"/pages/document-selection.php");
        $this->setEstado(4);//"/pages/document.php");
        $this->setEstado(5);//"/pages/game-parametrization.php");
        $this->setEstado(6);//"/pages/game.php");
        $this->setEstado(7);//"/pages/business-plan.php");

        $this->setEstadoInicial(0);//"/pages/login.php");

        $this->setEstadosFinais(3);//"/pages/document-selection.php");
        $this->setEstadosFinais(6);//"/pages/game.php");
        $this->setEstadosFinais(7);//"/pages/business-plan.php");

        $this->setTransition(0, 1,"e1");
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
        $estado =  $this->estados[$estadoFinalId];
        $estado->setName("Estado final");
        array_push($this->estadosFinais, $estado);      
    }
    
    public function setEstado($estadoId) {
       array_push($this->estados, new Estado($estadoId, $estadoId, $estadoId));
        
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
    public function setTransition($originId, $destiny, $symbol) {
       $origem = $this->estados[$originId];
       $destino = $this->estados[$destiny];               
       array_push($this->transicao, new Transicao($origem, $destino, $symbol));

    }
    public function getTransition($originId, $symbol) {
	    for ($index = 0; $index < count($this->transicao); $index++) {
            if(($this->transicao[$index]->getSimbolo() == "$symbol") && ($this->transicao[$index]->getOrigem()->getId() == $originId)){
               return $this->transicao[$index];
            } 
        }    
        return null;
    }
}
