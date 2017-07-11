<?php


class AutomatoDisponibilidade extends Automato {

    public function geTransition() {
        return $this->getTransition("qS1,1", $this->ping("postgres", 5432));
    }

    private function ping($host, $port) {
        $fsock = @fSockOpen($host, $port, $errno = 0, $errstr = "", 0.1);
        return $fsock ? "eN" : "eServer,1";
    }
}
