<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CadastroGraduacao</title>
</head>

<body>
    <h1> Cadastro de Graduacoes </h1>
    <form action="" method="POST">
        <table>
            <tr>
                <th>
                    Insira o nome da nova graduação
                </th>
                <th>
                    <input type="text" name="nomeGraduacao" id="nomeGraduacao">
                </th>
            </tr>
        </table>
        <input type="submit" value="Enviar Informações" id="enviarForm" name="enviarForm">
    </form>

</body>
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

    if (!empty($_POST["nomeGraduacao"])) {
        $sql = "INSERT INTO competencias(graduacoes) VALUES ('" . $_POST["nomeGraduacao"] . "')";

        if (mysqli_query($link, $sql)) {
            echo "Cadastrado com sucesso!";
        } else {
            echo "Error: " . $sql . "" . mysqli_error($link);
        }
    }
}
mysqli_close($link);
?>

</html>