<?php


/**
 * Description of Estado
 *
 * @author andre
 */
class Estado {
    //put your code here
    
    private $id;
    private $name;
    private $label;
    
    public function __construct($id, $name, $label) {
        $this->id = $id;
        $this->name = "Estado simples";
        $this->label = $label;
    }
   
    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getLabel() {
        return $this->label;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setLabel($label) {
        $this->label = $label;
    }



}
