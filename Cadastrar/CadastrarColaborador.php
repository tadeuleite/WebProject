<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastrar Colaborador</title>
</head>

<body>
    <h1> Cadastro de Colaboradores </h1>
    <form name="formularioColaborador" id="formularioColaborador" method="POST">
        <table>
            <tr>
                <th>
                    Insira o nome do colaborador
                </th>
                <th>
                    <input type="text" name="nomeColaborador" id="nomeColaborador">
                </th>
            </tr>
        </table>
        <input type="submit" value="Enviar Informações" id="enviarForm" name="enviarForm">
    </form>
</body>

</html>

<?php

$link = mysqli_connect("127.0.0.1", "root", "", "projetoweb");

if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
}

if (isset($_POST["enviarForm"])) {
    // Check connection
    if ($link->connect_error) {
        die("Connection failed: " . $link->connect_error);
    }

    if (!empty($_POST["nomeColaborador"])) {
        $sql = "INSERT INTO colaborador(nome) VALUES ('" . $_POST["nomeColaborador"] . "')";

        if (mysqli_query($link, $sql)) {
            echo "Cadastrado com sucesso!";
        } else {
            echo "Error: " . $sql . "" . mysqli_error($link);
        }
    }
} else {
    echo ("adasd");
}
mysqli_close($link);
?>