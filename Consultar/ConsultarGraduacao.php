<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Consulta Graduacao</title>
</head>

<body>
    <h1> Consulta de Graduacoes </h1>
    <form action="" method="POST">
        <table>
            <tr>
                <th>
                    Insira o nome da graduação que você deseja consultar
                </th>
                <th>
                    <input type="text" name="nomeGraduacao" id="nomeGraduacao">
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

    $sql = "SELECT Graduacoes FROM competencias WHERE Graduacoes LIKE '%" . $_POST['nomeGraduacao'] . "%'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo $row['Graduacoes'];
            echo "<br>";
        }
    }else{
        echo("não encontrado");
    }
}
mysqli_close($conn);
?>