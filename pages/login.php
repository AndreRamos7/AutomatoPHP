<?php
/*
require "../afd/Estado.php";
require "../afd/Transicao.php";
require "../afd/Automato.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    $automato = new Automato();
//    $next = $automato->getTransition($_SERVER['PHP_SELF'], "e1");
    $next = $automato->getTransition(0, "e1");

    if($next != null) {
        session_start();

        $_SESSION['perfil'] = $_POST['perfil'];

        //redirect to next.getDestino.getId
        header("Location: http://docker02/pages/action-selection.php");
    }
}
*/
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
                <option value="student">Estudante</option>
                <option value="professor">Professor</option>
            </select>
            <br>
            <br>
            <button type="submit">Entrar</button>
        </form>
    </body>
</html>
