<?php
// inclui o arquivo BD.php dentro deste arquivo 
//para que seus metodos fiquem visiveis
include '../../control/ClienteController.php'; //voltando duas pastas
include '../../model/MunicipioModel.php';

/*
include '../../lib/Util.php';

session_start();

verificarLogin();
$objUsuario = $_SESSION['usuario'];
    <h3> <?php echo $objUsuario->nome ?> </h3>
    <a href="../login/LoginView.php" class="btn btn-danger" role="button">Sair</a>

*/

?>
<style>
        

        .btn-group-vertical {
            position: center;
            top: 0px;
            left: 410px;
        }

        

        body {
            background-image: url("https://i.ibb.co/Ht4fCJ3/wall.jpg");
            background-repeat: repeat;
        }

    
    </style>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

    

    <form action="HomeView.php" method="POST" , align="center" ;>   

        <br>
        <div class="btn-group-vertical">
        <img src="https://i.ibb.co/qr9nqJC/Sis-Gerbranco.png" class="imagem">
            <a href="../cliente/listarClienteView.php" class="btn btn-warning" role="button" width=30>Listagem de clientes</a>
            <a href="../cliente/formClienteView.php" class="btn btn-light" role="button">Cadastrar cliente</a>
            <br>
            <a href="../veiculo/listarVeiculoView.php" class="btn btn-warning" role="button">Listagem de veículos</a>
            <a href="../veiculo/formVeiculoView.php" class="btn btn-light" role="button">Cadastrar veículo</a>
            <br>
            <a href="../locacao/listarLocacaoView.php" class="btn btn-warning" role="button">Listagem de locações</a>
            <a href="../locacao/formLocacaoView.php" class="btn btn-light" role="button">Cadastrar locação</a>
            <br>
            <a href="../multa/listarMultaView.php" class="btn btn-warning" role="button">Listagem de multas</a>
            <a href="../multa/formMultaView.php" class="btn btn-light" role="button">Cadastrar multa</a>
            <br>

        </div>
    </form>
</body>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</html>