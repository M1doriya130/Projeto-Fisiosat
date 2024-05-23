<?php
  if(isset($_POST['btCadastro']))
  {
   include_once('conexao.php');

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $telefone = $_POST['telefone'];
    $convenio = $_POST['convenio'];
 
  $result = mysqli_query($conexao, "INSERT INTO cadastro(nome_cadastro, email, senha, telefone, convenio) VALUES ('$nome', '$email','$senha','$telefone','$convenio')");

  }
  else {
    echo 'Não foi possivel cadastrar';
  }
  
  //redireciona depois de cadastrar
  header("Location: registrado.php");
exit;


?>
