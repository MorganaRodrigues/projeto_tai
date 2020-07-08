<?php
// inclui o arquivo BD.php dentro deste arquivo 
//para que seus metodos fiquem visiveis
include '../../control/ClienteController.php'; //voltando duas pastas
//include '../../lib/Util.php';
?>

<!DOCTYPE html>
<html lang="en">
<style>
    body {
        background-image: url("https://i.ibb.co/Ht4fCJ3/wall.jpg");
        background-repeat: repeat;
    }
</style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Deletar cliente</title>
</head>

<body>
    <?php

    //cria um instancia do objeto BD
    $objetoClienteController = new ClienteController();


    if (!empty($_POST['confirmar'])) {
        //chama o metodo DELETAR recebendo os dados do usuário através do metodo $_POST
        $objetoClienteController->remove($_GET['id']);
        //metodo header faz uma chamada para a tela de listagem
        //depois que realizou a adicao
        //header("Location: listarClienteView.php");
    }
    ?>
    <!-- propriedade action faz a chamada do BD.php para pegar o valor do form
        o restante e um formulario comum usando o metodo POST
    -->
    <a href="../cliente/listarClienteView.php" class="btn btn-primary" role="button">Voltar</a>
    <form action="formDeletarClienteView.php?id=<?php echo $_GET['id']; ?>" method="POST" , align="center">
        <h1>Deseja deletar o registro? <span class="badge badge-secondary"></span></h1> <br>
        <input type="hidden" name="confirmar" value="ok" /> <br>
        <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />

        <input type="submit" class="btn btn-danger" value="Deletar">
    </form>

</body>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</html>