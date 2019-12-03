<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CadastroHardSkills</title>
</head>

<body>
    <h1> Cadastro de HardSkills </h1>
    <form name="formularioHardSkills" id="formularioHardSkills" method="POST">
        <table>
            <tr>
                <th>
                    Insira o nome da nova Hard skill
                </th>
                <th>
                    <input type="text" name="nomeHardSkills" id="nomeHardSkills">
                </th>
                <th>
                    Insira a competência dessa hard skill
                </th>
                <th>
                    <select id="selectCompetencia" name="selectCompetencia">
                        <?php
                        $conn = mysqli_connect("127.0.0.1", "root", "", "projetoweb");

                        if (!$conn) {
                            die('Could not connect');
                        }
                        $sql = 'SELECT graduacoes FROM competencias';
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            $i = 1;
                            
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "
                                <script>
                                        var opt = document.createElement('option');
                                        opt.value = $i;
                                        opt.innerHTML = ' " . $row["graduacoes"] . " ';
                                        document.getElementById('selectCompetencia').appendChild(opt);
                                        ". $i++ ."
                                </script>";
                            }
                        }
                        mysqli_close($conn);
                        ?>
                    </select>
                </th>
                <th>
                    Insira a area dessa hard skill
                </th>
                <th>
                    <select id="selectArea" name="selectArea">
                        <?php
                        $conn = mysqli_connect("127.0.0.1", "root", "", "projetoweb");

                        if (!$conn) {
                            die('Could not connect');
                        }
                        $sql = 'SELECT nomeareas FROM areasconcentracao';
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            $i = 1;
                            
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "
                                <script>
                                        var opt = document.createElement('option');
                                        opt.value = $i;
                                        opt.innerHTML = ' " . $row["nomeareas"] . " ';
                                        document.getElementById('selectArea').appendChild(opt);
                                        ". $i++ ."
                                </script>";
                            }
                        }
                        mysqli_close($conn);
                        ?>
                    </select>
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
    $selected_competencia = $_POST['selectCompetencia'];
    $selected_area = $_POST['selectArea'];
    // Check connection
    if ($link->connect_error) {
        die("Connection failed: " . $link->connect_error);
    }

    if (!empty($_POST["nomeHardSkills"])) {
        $sql = "INSERT INTO HardSkills(HardSkills, IdCompetencia, idareas) 
        VALUES ('" . $_POST["nomeHardSkills"] . "', " . $selected_competencia . ",  " . $selected_area . ")";

        if (mysqli_query($link, $sql)) {
            echo "Cadastrado com sucesso!";
        } else {
            echo "Error: " . $sql . "" . mysqli_error($link);
        }
    }
}
mysqli_close($link);
?>