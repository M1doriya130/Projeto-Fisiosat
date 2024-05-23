<?php
include_once ('conexao.php');

if (isset($_POST['especialidade'])) {
    $especialidade_id = $_POST['especialidade'];

    // Consulta para obter os profissionais da especialidade selecionada
    $query = "SELECT * FROM profissionais WHERE id_especialidade = $especialidade_id";
    $result = mysqli_query($conexao, $query);

    // Verifica se há resultados
    if (mysqli_num_rows($result) > 0) {
        ?>

        <!DOCTYPE html>
        <html lang="pt-br">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Profissionais</title>
            <link rel="stylesheet" href="./css/agendamento.css">
        </head>

        <body>
            <div class="menu">
                <ul class="opcoesMenu">
                    <li><a href="inicial.html">Voltar</a></li>
                    <li><a href="login.html">Sair</a></li>
                </ul>
            </div>

            <div class="container">
                <h1>Profissionais Disponíveis</h1>
                <form method="post" action="#">
                    <select name="profissional" id="profissional">
                        <option value="Escolha">--Escolha o profissional desejado--</option>
                        <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<option value='" . $row['id_profissional'] . "'>" . $row['nome_profissional'] . "</option>";
                        }
                        ?>
                    </select>
                    <input type="submit" value="Avançar"></input>
                </form>
            </div>
        </body>

        </html>

        <?php
    } else {
        echo "Nenhum profissional encontrado para esta especialidade.";
    }

    // Fecha a conexão
    mysqli_close($conexao);
} else {
    // Redireciona de volta para a página inicial se a especialidade não foi selecionada
    header("Location: especialidades.html");
    exit();
}
?>