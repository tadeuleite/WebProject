<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Consulta Area De Concentracao</title>
</head>

<body>
    <h1> Consulta de Area De Concentracao </h1>
    <form name="formularioAreaDeConcentracao" id="formularioAreaDeConcentracao" method="POST">
        <table>
            <tr>
                <th>
                    Insira o nome da Area De Concentracao que você quer consultar
                </th>
                <th>
                    <input type="text" name="nomeAreaDeConcentracao" id="nomeAreaDeConcentracao">
                </th>
            </tr>
        </table>

        <input type="submit" value="Enviar Informações" id="enviarForm" name="enviarForm">
    </form>

</body>
</html>

<?php

$conn = mysqli_connect("127.0.0.1", "root", "", "projetoweb");

if (!$conn) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
}

if (isset($_POST["enviarForm"])) {
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT nomeareas FROM areasconcentracao WHERE nomeareas LIKE '%" . $_POST['nomeAreaDeConcentracao'] . "%'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "Nome das áreas de concentração: ".$row['nomeareas']."<br>";
            echo"<br>";
        }
    }else{
        echo("não encontrado");
    }
}
mysqli_close($conn);
?>