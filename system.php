<?php
class System{
    private $_url;
    private $_explode;
    public $_controller;
    public $_action;
    public $_params;
    
    public function __construct() {
        $this->setUrl();
        $this->setExplode();
        $this->setController();
        $this->setAction();
        $this->setParams();        
    }
	
	private function setGet() {
        $req = $_SERVER['REQUEST_URI'];
        $array = explode("?", $req);
        if(isset($array[1]) and (count($array) > 0) and $array != array()){
            $gets = "?$array[1]";

            //$_GET['url'] = $array[1];
            if (preg_match_all('/(<name>[^\=]+)\=(?<value>[^&]+)&?/', $gets, $matches)) {
                foreach ($matches['name'] as $offset => $name) {
                    $_GET[$name] = $matches['value'][$offset];
                }
            }
            //print_r($_GET);
        }
    }
    
    private function setUrl(){
		//echo $_SERVER['REQUEST_URI'];
        $url = (isset($_SERVER['REQUEST_URI']) or $_SERVER['REQUEST_URI'] == "/") ? $_SERVER['REQUEST_URI'] : '/Sessao/index';
        $this->_url = $url;
    }
    
    private function setExplode(){
        $this->_explode = explode( '/', $this->_url );
    }
    
    private function setController(){
        $ctrl = ($_SERVER['REQUEST_URI'] == "/") ? "Sessao" : $this->_explode[1];
		
		$string = explode("?", $ctrl);
        $this->_controller = $string[0];
		
    }
    
    private function setAction(){
        $ac = (!isset($this->_explode[2]) || $this->_explode[2] == null || $this->_explode[2] == 'index' ? 'index_action' : $this->_explode[2]);
		
		$string = explode("?", $ac);
        $this->_action = $string[0];
		
        //$this->_action = $ac;
    }
    
    private function setParams(){
        unset( $this->_explode[0], $this->_explode[1], $this->_explode[2]);        
        if (end($this->_explode) == null) {
            array_pop($this->_explode);
        }
        $i = 0;
        if( !empty( $this->_explode )){
            foreach( $this->_explode as $val ){
                if( $i % 2 == 0 ){
                    $ind[] = $val;
                }else{
                    $value[] = $val;
                }
                $i++;
            }
        }else{
            $ind = array();
            $value = array();
        }        
        if (count($ind) == count($value) and !empty($ind) and !empty($value)) {
            $this->_params = array_combine($ind, $value);
        } else {
            $this->_params = array();
        }
    }
    
    public function getParam($name = null){
        $valP = $this->_params[$name];
        //echo "aaaaaaaa $valP";
        if ($name != null and $valP != null and isset($valP)) {
            return $this->_params[$name];
        } else {
            return null;
        }
    }
    
    public function rum(){
        $controller_path = CONTROLLERS . $this->_controller .'Controller.php';
        if (!file_exists($controller_path)) {
            //header("Location: /index/erro");
            die("Houve um erro. O controller {$this->_controller} nao existe");
        }
        require_once( $controller_path );
        $app = new $this->_controller();
        
        if (!method_exists($app, $this->_action)) {
            //header("Location: /index/erro");
            die("Houve um erro. Esta action {$this->_action} nao existe");
        }
		$this->setGet();

        $action = $this->_action;
        $app->init();
        $app->$action();
        $app->view($action);
    }
}
