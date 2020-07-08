<?php
// inclui o arquivo BD.php dentro deste arquivo 
//para que seus metodos fiquem visiveis

include '../../control/MultaController.php'; //voltando duas pastas
include '../../model/ClienteModel.php';
include '../../model/VeiculoModel.php';
include '../../model/LocacaoModel.php';

/*
ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);
error_reporting(E_ALL);
include '../../lib/Util.php';

session_start();

verificarLogin();
$objUsuario = $_SESSION['usuario'];
 <h3> <?php echo $objUsuario->nome ?> </h3>
    <a href="../login/LoginView.php" class="btn btn-danger" role="button">Sair</a>
*/
$objClienteModel = new ClienteModel();
$resultCliente =  $objClienteModel::selectAll();

$objVeiculoModel = new VeiculoModel();
$resultVeiculo =  $objVeiculoModel::selectAll();

?>
<!DOCTYPE html>
<html lang="en">
<style>
    body {
        background-image: url("https://i.ibb.co/Ht4fCJ3/wall.jpg");
        background-repeat: repeat;
    }
</style>

<style>
        
        
    body {
        background-image: url("https://i.ibb.co/Ht4fCJ3/wall.jpg");
        background-repeat: repeat;
    }

    .buttonEditar{
        background-color: #47d147;
    }


        .btn-group {
            margin-left: 30px;


        }

        .btn-groupp {
            margin-left: 40px;
            width: 10%;

        }

    </style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body align="center">

    <a href="../home/HomeView.php" class="btn btn-primary" role="button">Voltar</a>
    <!-- formulario com o botao para chamar o arquivo formCliente -->
    <form action="formMultaView.php" method="POST" , align="center">
        <h1>Listagem de multas <span class="badge badge-secondary"></span></h1> <br>
        <label>Cadastrar multa</label>
        <input type="submit" class="btn btn-primary" value="Novo">
    </form>
    <br>

    <form action="listarMultaView.php" method="POST" , align="center">
    <div class="btn-group">

<div class="form-group">
    <label>Cliente</label>
    <select name="cliente_id" class="form-control" required>

        <?php

      // array_push($resultCliente, ["TODOS" => 0]);
        foreach ($resultCliente as $itens) {
            echo "<option value='" . $itens['id'] . "'>" . $itens['nome'] . "</option>";
        }
        ?>
    </select>
</div>

<div class="form-group">
    <label>Veículo</label>
    <select name="veiculo_id" class="form-control" required>

        <?php

        foreach ($resultVeiculo as $itens) {
            echo "<option value='" . $itens['id'] . "'>" . $itens['modelo'] . "</option>";
        }
        ?>
    </select>

</div>

<select name="tipo">

    <option value="cliente_id">Cliente</option>
    <option value="veiculo_id">Veículo</option>

</select>

<input type="submit" class="btn btn-primary" value="Buscar">

</div>

</form>

</div> <br>
<br>
    <?php

    /*//cria um instancia do objeto BD
    $objBD = new BD();
    //Faz a chamada do metodo Connection para conecta com o Banco de Dados
    $objBD->connection();*/

    $objMultaController = new MultaController();

    if (!empty($_POST['cliente_id']) || !empty($_POST['veiculo_id'])) {
        $result = $objMultaController->search($_POST);
    } else {
        //Faz a chamada do metodo selectAll para conecta com o Banco de Dados
        $result = $objMultaController->index();
    }
    $objClienteModel = new ClienteModel();
    $objVeiculoModel = new VeiculoModel();
    $objLocacaoModel = new LocacaoModel();

    
    

    //monta uma tabela e lista os dados atraves do foreach
    echo "

    <table class='table'>
        <tr>
        <th>Cliente</th>
        <th>Veículo</th>
        <th>Locação (data retirada)</th>
        <th>Valor</th>
        <th>Data multa</th>
        <th>Hora multa</th>
        <th></th>
        </tr>";

  foreach ($result as $item) {
    $objCliente = $objClienteModel::find($item['cliente_id'], 'cliente');
    $objVeiculo = $objVeiculoModel::find($item['veiculo_id'], 'veiculo');
    $objLocacao = $objLocacaoModel::find($item['locacao_id'], 'locacao');
    echo "
    <td>" .  $objCliente->nome. "</td>
    <td>" . $objVeiculo->modelo . "</td>
    <td>" . $objLocacao->data_retirada . "</td>
    <td>" . $item['valor'] . "</td>
    <td>" . $item['data_multa'] . "</td>
    <td>" . $item['hora_multa'] . "</td>

    <td><a href='formEditarMultaView.php?id=" . $item['id'] . "'><button class='buttonEditar'>Editar</button></a>
    
    </tr>";

}

echo "</table>";


    ?>
</body>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</html>