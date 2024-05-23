<?php
include_once('conexao.php');

if (isset($_POST['email']) && isset($_POST['senha'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    if (empty($email)) {
        echo "Preencha seu email";
    } else if (empty($senha)) {
        echo "Preencha sua senha";
    } else {
        // Prepara a consulta usando declaração preparada
        $prepara = $conexao->prepare("SELECT * FROM cadastro WHERE email = ? AND senha = ?");
        $prepara->bind_param("ss", $email, $senha);
        $prepara->execute();
        $result = $prepara->get_result();

        // Verifica se há um único resultado
        if ($result->num_rows == 1) {
            $usuario = $result->fetch_assoc();

            // Inicia a sessão se não estiver iniciada
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }

            // Define as variáveis de sessão
            $_SESSION['id_cadastro'] = $usuario['id_cadastro'];
            $_SESSION['nome_cadastro'] = $usuario['nome_cadastro'];

            // Redireciona para a página inicial
            header('Location: inicial.html');
            exit();
        } else {
            // Mensagem de erro para credenciais inválidas
            echo "Falha ao logar! E-mail ou senha incorretos";
        }
    }
} else {
    // Se email ou senha não foram enviados, redireciona para a página de login
    header('Location: login.html');
    exit();
}
?>
