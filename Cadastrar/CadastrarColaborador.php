<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastrar Colaborador</title>
</head>

<body>
    <div>
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
                <tr>
                    <th>
                        Insira a soft skill do colaborador
                    </th>
                    <th>
                        <input type="text" name="softSkills" id="softSkills">
                    </th>
                </tr>
                <tr>
                    <th>
                        Insira a area de concentração desse colaborador
                    </th>
                    <th>
                        <input type="text" name="areaConcentracao" id="areaConcentracao">

                    </th>
                </tr>
                <tr>
                    <th>
                        Insira o nivel do colaborador nessa area
                    </th>
                    <th>
                        <input type="text" name="nivelGraduacao" id="nivelGraduacao">
                    </th>
                </tr>
                <tr>
                    <th>
                        Insira a competência do colaborador
                    </th>
                    <th>
                        <input type="text" name="competencia" id="competencia">

                    </th>
                </tr>
            </table>
        </form>
    </div>
    <br>
    <div>
        <input type="submit" value="Enviar Informações" id="enviarForm" name="enviarForm">
    </div>
</body>

</html>
