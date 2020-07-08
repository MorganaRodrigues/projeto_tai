<?php
// inclui o arquivo BD.php dentro deste arquivo 
//para que seus metodos fiquem visiveis
include '../../control/VeiculoController.php'; //voltando duas pastas

include '../../model/ClienteModel.php';

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

    .buttonDeletar{
        background-color: #ff3333;
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

    <form action="formVeiculoView.php" method="POST" , align="center">
        <h1>Listagem de veículos<span class="badge badge-secondary"></span></h1> <br>
        <label>Cadastrar veículo</label>
        <input type="submit" class="btn btn-primary" value="Novo">
    </form>
    <br>

    <form action="listarVeiculoView.php" method="POST" align="center">

        <label>Buscar: </label>
        <input type="text" name="valor" />
        <select name="tipo">
            <option value="placa">Placa</option>
            <option value="fabricante">Fabricante</option>
            <option value="tipo_veiculo">Tipo veículo</option>
            <option value="modelo">Modelo</option>
        </select>

        <input type="submit" class="btn btn-primary" value="Buscar">

    </form>
    <br>

    <?php
    /*//cria um instancia do objeto BD
    $objBD = new BD();
    //Faz a chamada do metodo Connection para conecta com o Banco de Dados
    $objBD->connection();*/

    $objVeiculoController = new VeiculoController();

    if (!empty($_POST['valor'])) {
        $result = $objVeiculoController->search($_POST);
    } else {
        //Faz a chamada do metodo selectAll para conecta com o Banco de Dados
        $result = $objVeiculoController->index();
    }


    $objClienteModel = new ClienteModel();
    //monta uma tabela e lista os dados atraves do foreach
    echo "
    <table class='table'>
        <tr>
        <th>Cliente</th>
        <th>Placa</th>
        <th>Tipo veículo</th>
        <th>Fabricante</th>
        <th>Modelo</th>
        <th></th>
        </tr>";

    foreach ($result as $item) {

        $objCliente = $objClienteModel::find($item['cliente_id']);

        echo "
  
        
        <td>" . $objCliente->nome . "</td>
        <td>" . $item['placa'] . "</td>
        <td>" . $item['tipo_veiculo'] . "</td>
        <td>" . $item['fabricante'] . "</td>
        <td>" . $item['modelo'] . "</td>

        <td><a href='formEditarVeiculoView.php?id=" . $item['id'] . "'><button class='buttonEditar'>Editar</button></a>
        <a href='formDeletarVeiculoView.php?id=" . $item['id'] . "'><button class='buttonDeletar'>Deletar</button></td>
        
        </tr>";

    }

    echo "</table>";


    ?>
</body>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</html>