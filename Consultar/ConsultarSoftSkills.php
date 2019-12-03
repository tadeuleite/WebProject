<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CadastrosoftSkills</title>
</head>

<body>
    <h1> Cadastro de softSkills </h1>
    <form name="formulariosoftSkills" id="formulariosoftSkills" method="POST">
        <table>
            <tr>
                <th>
                    Insira o nome da nova soft skill
                </th>
                <th>
                    <input type="text" name="nomesoftSkills" id="nomesoftSkills">
                </th>
            </tr>
        </table>

        <input type="submit" value="Consultar Informações" id="enviarForm" name="enviarForm">
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

    if (!empty($_POST["nomesoftSkills"])) {
        $sql = "SELECT SoftSkills, nome, nomeareas,  HardSkills, graduacoes FROM SoftSkills as softskills
        INNER JOIN colaborador as colaborador on softskills.IdColaborador = colaborador.IdColaborador
        INNER JOIN areasconcentracao as area on softskills.IdAreas = area.IdAreas
 		INNER JOIN HardSkills as hardskill
        INNER JOIN competencias as competencia on hardskill.IdCompetencia = competencia.IdCompetencia";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "SoftSkill: " . $row['SoftSkills'] . "<br>";
                echo "Colaborador: " . $row['nome'] . "<br>";
                echo "Nome da área de concentração: " . $row['nomeareas'] . "<br>";
                
                echo "HardSkill: " . $row['HardSkills'] . "<br>";
                echo "Competência: " . $row['graduacoes'] . "<br>";
                echo "Nome da área de concentração: " . $row['nomeareas'] . "<br>";
                echo"<br>";
            }
        } else {
            echo ("não encontrado");
        }
    }
}
mysqli_close($conn);
?>