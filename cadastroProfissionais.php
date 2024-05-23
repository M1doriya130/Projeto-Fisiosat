<?php
  // Verifica se o formulário foi submetido
  if(isset($_POST['btCadastro'])) {
    // Inclui o arquivo de conexão
    include_once('conexao.php');

    // Obtém os dados do formulário
    $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
    $id = mysqli_real_escape_string($conexao, $_POST['id']);

    // Verifica se os campos foram preenchidos
    if(!empty($nome) && !empty($id)) {
      // Prepara a consulta SQL usando instrução preparada
      $prepara = $conexao->prepare("INSERT INTO profissionais(nome_profissional, id_especialidade) VALUES (?, ?)");
      $prepara->bind_param("si", $nome, $id);

      // Executa a consulta
      if($prepara->execute()) {
        // Redireciona para a página de sucesso
        header("Location: registrado.php");
        exit;
      } else {
        // Exibe mensagem de erro se a consulta falhar
        echo 'Não foi possível cadastrar.';
      }

      // Fecha a instrução
      $prepara->close();
    } else {
      // Exibe mensagem se os campos estiverem vazios
      echo 'Por favor, preencha todos os campos.';
    }

    // Fecha a conexão
    $conexao->close();
  }
?>