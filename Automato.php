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

    public function getEstadosIniciais() {
        return $this->estadosIniciais;
    }

    public function getTransicao() {
        return $this->transicao;
    }

    public function getStartState() {
        return $this->startState;
    }

    public function getStartStateLimit() {
        return $this->startStateLimit;
    }

    public function getFinalStates() {
        return $this->finalStates;
    }

    public function setEstado($estadoId) {
       array_push($this->estados,array("$estadoId" => new Estado($estadoId, "", "q".$estadoId)));
    }

    public function setEstadosFinais($estadoFinalId) {
        //$this->estadosFinais
        $estado = $this->estados[$estadoFinalId];
        $estado->setName("Estado final");
        array_push($this->estadosFinais, $estado);      
    }
   
    public function getTransition($origin, $symbol) {
        $this->transicao;
        //$this->transicao
	while (iterator.hasNext()) {
          //   Transicao tr = iterator.next();
            // System.out.println("if " + tr.getSimbolo() + " == " + symbol + " && " + tr.getOrigem().getId() + " == " + origin);
             if((tr.getSimbolo().equals(symbol)) && (tr.getOrigem().getId() == origin)){
                 
                 return tr;
             } 
        }    
        return null;
    }

    public function setEstadosIniciais($estadosIniciais) {
        $this->estadosIniciais = $estadosIniciais;
    }

    public function setTransicao($transicao) {
        $this->transicao = $transicao;
    }

    public function setStartState($startState) {
        $this->startState = $startState;
    }

    public function setStartStateLimit($startStateLimit) {
        $this->startStateLimit = $startStateLimit;
    }

    public function setFinalStates($finalStates) {
        $this->finalStates = $finalStates;
    }



}
