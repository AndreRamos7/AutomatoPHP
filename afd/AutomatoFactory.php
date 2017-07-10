<?php

require 'Automato.php';

class AutomatoFactory {

    public function getPageFlow() {
        $automato = new Automato();

        $automato->setEstado("/pages/login.php");
        $automato->setEstado("/pages/action-selection.php");
        $automato->setEstado("/pages/business-plan-parametrization.php");
        $automato->setEstado("/pages/document-selection.php");
        $automato->setEstado("/pages/game-parametrization.php");
        $automato->setEstado("/pages/game.php");
        $automato->setEstado("/pages/business-plan.php");
        $automato->setEstado("/pages/document.php");

        $automato->setEstadoInicial("/pages/login.php");

        $automato->setEstadosFinais("/pages/document-selection.php");
        $automato->setEstadosFinais("/pages/game.php");
        $automato->setEstadosFinais("/pages/business-plan.php");

        $automato->setTransition("/pages/login.php", "/pages/action-selection.php","e1");
        $automato->setTransition("/pages/action-selection.php", "/pages/login.php","e2");
        $automato->setTransition("/pages/action-selection.php", "/pages/business-plan-parametrization.php","e3");
        $automato->setTransition("/pages/action-selection.php", "/pages/game-parametrization.php","e4");
        $automato->setTransition("/pages/action-selection.php", "/pages/document-selection.php","e5");
        $automato->setTransition("/pages/document-selection.php", "/pages/action-selection.php", "e6");

        return $automato;
    }

    public function getAvailabilitySupervisor() {
        $automato = new Automato();

        $automato->setEstado("qS1,1");
        $automato->setEstado("qS1,2");
        $automato->setEstado("qS1,3");

        $automato->setEstadoInicial("qS1,1");

        $automato->setEstadosFinais("qS1,1");
        $automato->setEstadosFinais("qS1,2");
        $automato->setEstadosFinais("qS1,3");

        $automato->setTransition("qS1,1", "qS1,2","e3");
        $automato->setTransition("qS1,1", "qS1,2","e4");
        $automato->setTransition("qS1,1", "qS1,2","e5");
        $automato->setTransition("qS1,1", "qS1,3","eServer,1");
        $automato->setTransition("qS1,3", "qS1,1","eServer,2");

        return $automato;
    }

    public function getBPGuideSupervisor() {
        $automato = new Automato();

        $automato->setEstado("qS2,1");
        $automato->setEstado("qS2,2");
        $automato->setEstado("qS2,3");
        $automato->setEstado("qS2,4");
        $automato->setEstado("qS2,5");

        $automato->setEstadoInicial("qS2,1");

        $automato->setEstadosFinais("qS2,1");
        $automato->setEstadosFinais("qS2,2");
        $automato->setEstadosFinais("qS2,3");
        $automato->setEstadosFinais("qS2,4");
        $automato->setEstadosFinais("qS2,5");

        $automato->setTransition("qS2,1", "qS2,2","ePer,1");
        $automato->setTransition("qS2,2", "qS2,3","eP,1");
        $automato->setTransition("qS2,2", "qS2,4","eP,2");
        $automato->setTransition("qS2,2", "qS2,5","eP,3");

        return $automato;
    }

    public function getGamesSupervisor() {
        $automato = new Automato();

        $automato->setEstado("qS3,1");
        $automato->setEstado("qS3,2");
        $automato->setEstado("qS3,3");
        $automato->setEstado("qS3,4");
        $automato->setEstado("qS3,5");

        $automato->setEstadoInicial("qS3,1");

        $automato->setEstadosFinais("qS3,1");
        $automato->setEstadosFinais("qS3,2");
        $automato->setEstadosFinais("qS3,3");
        $automato->setEstadosFinais("qS3,4");
        $automato->setEstadosFinais("qS3,5");

        $automato->setTransition("qS3,1", "qS3,2","ePer,1");
        $automato->setTransition("qS3,2", "qS3,3","eG,1");
        $automato->setTransition("qS3,2", "qS3,4","eG,2");
        $automato->setTransition("qS3,2", "qS3,5","eG,3");

        return $automato;
    }
}
