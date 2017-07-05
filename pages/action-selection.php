<?php

require "../afd/Estado.php";
require "../afd/Transicao.php";
require "../afd/AutomatoFactory.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $automato = AutomatoFactory::getPageFlow();
    $next = $automato->getTransition($_SERVER['PHP_SELF'], $_POST['evento']);

    if($next != null) {
        header("Location: http://localhost" . $next->getDestino()->getId());
    }
}

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Action</title>
    </head>
    <h3>Action Selection</h3>
    <form action="/pages/action-selection.php" method="post">
        <select name="evento">
            <option value="e3">Business Plan Parametrization</option>
            <option value="e4">Game Parametrization</option>
            <option value="e5">Document Selection</option>
        </select>
        <button type="submit">Selecionar</button>
        <br>
        <br>
    </form>

    <form action="/pages/action-selection.php" method="post">
        <input type="hidden" name="evento" value="e2">
        <button type="submit">Sair</button>
    </form>
</html>
