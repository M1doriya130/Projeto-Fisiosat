<?php 
if(isset($_POST['email'])) {
    // Acesso aos valores dos campos do formulário
    $email = $_POST['email'];
}

header("location: registrado.html?email=".urlencode($email));
?>