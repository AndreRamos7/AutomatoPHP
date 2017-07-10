<?php

require "../afd/Estado.php";
require "../afd/Transicao.php";
require "../afd/AutomatoFactory.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $automato = AutomatoFactory::getPageFlow();
    $next = $automato->getTransition($_SERVER['PHP_SELF'], "e1");

    if($next != null) {
        session_start();
        $_SESSION['perfil'] = $_POST['perfil'];
        header("Location: http://localhost:85" . $next->getDestino()->getId());
    }
}

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h3>login</h3>
        <form action="/pages/login.php" method="post">
            <select name="perfil">
                <option value="student-beginner">Estudante - Iniciante</option>
                <option value="student-advanced">Estudante - Avançado</option>
                <option value="professor">Professor</option>
            </select>
            <br>
            <br>
            <button type="submit">Entrar</button>
        </form>
    </body>
</html>
