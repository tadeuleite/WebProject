<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Consultar Colaborador</title>
</head>

<body>
    <h1> Consultar de Colaboradores </h1>
    <form name="formularioColaborador" id="formularioColaborador" method="POST">
        <table>
            <tr>
                <th>
                    Insira o nome do colaborador que você deseja consultar
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
$conn = mysqli_connect("127.0.0.1", "root", "", "projetoweb");
if (isset($_POST["enviarForm"])) {
    if (!$conn) {
        die('Could not connect');
    }
    $sql = "SELECT nome FROM colaborador WHERE nome LIKE '%" . $_POST['nomeColaborador'] . "%'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "Nome: ".$row['nome']."<br>";
            echo"<br>";
        }
    }else{
        echo("não encontrado");
    }
}
mysqli_close($conn);
?>