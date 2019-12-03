<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CadastroSoftSkills</title>
</head>

<body>
    <h1> Cadastro de SoftSkills </h1>
    <form name="formularioSoftSkills" id="formularioSoftSkills" method="POST">
        <table>
            <tr>
                <th>
                    Insira o nome da nova Soft skill
                </th>
                <th>
                    <input type="text" name="nomeSoftSkills" id="nomeSoftSkills">
                </th>

                <th>
                    Insira o colaborador que possui essa soft skill
                </th>
                <th>
                    <select id="selectColaborador" name="selectColaborador">
                        <?php
                        $conn = mysqli_connect("127.0.0.1", "root", "", "projetoweb");

                        if (!$conn) {
                            die('Could not connect');
                        }
                        $sql = 'SELECT nome FROM colaborador';
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            $i = 1;

                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "
                                <script>
                                        var opt = document.createElement('option');
                                        opt.value = $i;
                                        opt.innerHTML = ' " . $row["nome"] . " ';
                                        document.getElementById('selectColaborador').appendChild(opt);
                                        " . $i++ . "
                                </script>";
                            }
                        }
                        mysqli_close($conn);
                        ?>
                    </select>
                </th>
                <th>
                    Insira a area dessa soft skill
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
                                        " . $i++ . "
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
    $selected_colaborador = $_POST['selectColaborador'];
    $selected_area = $_POST['selectArea'];
    // Check connection
    if ($link->connect_error) {
        die("Connection failed: " . $link->connect_error);
    }

    if (!empty($_POST["nomeSoftSkills"])) {
        $sql = "INSERT INTO SoftSkills(SoftSkills, IdColaborador, idareas) 
        VALUES ('" . $_POST["nomeSoftSkills"] . "', " . $selected_colaborador . ",  " . $selected_area . ")";

        if (mysqli_query($link, $sql)) {
            echo "Cadastrado com sucesso!";
        } else {
            echo "Error: " . $sql . "" . mysqli_error($link);
        }
    }
}
mysqli_close($link);
?>