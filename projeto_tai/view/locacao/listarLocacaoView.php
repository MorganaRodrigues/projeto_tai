<?php
// inclui o arquivo BD.php dentro deste arquivo 
//para que seus metodos fiquem visiveis
include '../../control/LocacaoController.php'; //voltando duas pastas
include '../../model/ClienteModel.php';
include '../../model/VeiculoModel.php';
/*
include '../../lib/Util.php';

session_start();

verificarLogin();
$objUsuario = $_SESSION['usuario'];
 <h3> <?php echo $objUsuario->nome ?> </h3>
    <a href="../login/LoginView.php" class="btn btn-danger" role="button">Sair</a>
*/
?>
<!DOCTYPE html>
<html lang="en">
<style>
    body {
        background-image: url("https://i.ibb.co/Ht4fCJ3/wall.jpg");
        background-repeat: repeat;
    }

    .buttonEditar{
        background-color: #47d147;
    }

   

</style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

   
    <a href="../home/HomeView.php" class="btn btn-primary" role="button">Voltar</a>
    <!-- formulario com o botao para chamar o arquivo formCliente -->
    <form action="formLocacaoView.php" method="POST" , align="center">
        <h1>Listagem de locações <span class="badge badge-secondary"></span></h1> <br>
        <label>Cadastrar locação</label>
        <input type="submit" class="btn btn-primary" value="Novo">
    </form>
    <br>

    <form action="listarLocacaoView.php" method="POST" , align="center">
        <label>Buscar por data: </label>
        <input type="date" name="valor" />
        <select name="tipo">
            <option value="data_retirada">Data retirada</option>
            <option value="data_devolucao">Data devolução</option>
        </select>
      
        <input type="submit" class="btn btn-primary" value="Buscar">
    </form>
    <br>
    <form action="listarLocacaoView.php" method="POST" , align="center">
        <label>Buscar por hora: </label>
        <input type="time" name="valor" />
        <select name="tipo">
            <option value="hora_retirada">Hora retirada</option>
            <option value="hora_devolucao">Hora devolução</option>
        </select>

        <input type="submit" class="btn btn-primary" value="Buscar">
    </form>
    <br>
    <?php

    /*//cria um instancia do objeto BD
    $objBD = new BD();
    //Faz a chamada do metodo Connection para conecta com o Banco de Dados
    $objBD->connection();*/

    $objLocacaoController = new LocacaoController();

    if (!empty($_POST['valor'])) {
        $result = $objLocacaoController->search($_POST);
    } else {
        //Faz a chamada do metodo selectAll para conecta com o Banco de Dados
        $result = $objLocacaoController->index();
    }


    $objClienteModel = new ClienteModel();
    $objVeiculoModel = new VeiculoModel();




    //monta uma tabela e lista os dados atraves do foreach
    echo "
    <table class='table'>
    <tr>
    <th>Cliente</th>
    <th>Veículo</th>
    <th>Data retirada</th>
    <th>Hora retirada</th>
    <th>Data devolução</th>
    <th>Hora devolução</th>
    <th></th>
    </tr>";

    foreach ($result as $item) {

        $objCliente   = $objClienteModel::find($item['cliente_id'], 'cliente') ;
        $objVeiculo = $objVeiculoModel::find($item['veiculo_id'],'veiculo');


        echo "
    

    
        <td>" . $objCliente->nome . "</td>
        <td>" . $objVeiculo->modelo . "</td>
        <td>" . $item['data_retirada'] . "</td>
        <td>" . $item['hora_retirada'] . "</td>
        <td>" . $item['data_devolucao'] . "</td>
        <td>" . $item['hora_devolucao'] . "</td>

        <td><a href='formEditarLocacaoView.php?id=" . $item['id'] . "'><button class='buttonEditar'>Editar</button></a>
        
        </tr>";

    }

    echo "</table>";

    ?>
</body>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</html>