<?php
// inclui o arquivo BD.php dentro deste arquivo 
//para que seus metodos fiquem visiveis
include '../../control/LocacaoController.php'; //voltando duas pastas

include '../../model/ClienteModel.php';
include '../../model/VeiculoModel.php';
/*
include '../../lib/Util.php';

session_start();

verificarLogin();*/
?>
<!DOCTYPE html>
<html lang="en">
<style>
    body {
        background-image: url("https://i.ibb.co/Ht4fCJ3/wall.jpg");
        background-repeat: repeat;
    }

.tabela{
    margin:40px;
}
</style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <?php

    //cria um instancia do objeto BD
    $objLocacaoController = new LocacaoController();

    if (!empty($_POST)) {
        //chama o metodo UPDATE recebendo os dados do usuário através do metodo $_POST
        $objLocacaoController->update($_POST);
        //metodo header faz uma chamada para a tela de listagem
        //depois que realizou a edicao
        //  header("Location: listarClienteView.php");
    }

    //Busca os dados no banco de dados pelo ID da URL passando como parametro no metodo FIND
    $objetoLocacaoModel = new LocacaoModel();
    $objLocacao = $objetoLocacaoModel->find($_GET['id']);



    $objetoClienteModel = new ClienteModel();
    $resultCliente = $objetoClienteModel->selectAll();

    $objetoVeiculoModel = new VeiculoModel();
    $resultVeiculo = $objetoVeiculoModel->selectAll();



    ?>
    <a href="../locacao/listarLocacaoView.php" class="btn btn-primary" role="button">Voltar</a>
    <form action="formEditarLocacaoView.php" method="POST" , align="center">
        <h1>Editar locação <span class="badge badge-secondary"></span></h1> <br>
        <!-- Input Hidden tag que fica oculta para receber o valor do ID do form--->
        <!-- passo os id para a propriedade value -->
        <div class="tabela">
        <table>

        <tr>
        <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">

        <th><label>Cliente</label>    </th>
        <th><select name="cliente_id"> 
            <?php
            //percorre os municipios
            foreach ($resultCliente as $itens) {
                $selected = ($itens['id'] == $objLocacao->cliente_id ? "selected" : "");
                echo "<option value='" . $itens['id'] . "' " . $selected . " >" . $itens['nome'] . "</option>";
            }
            ?>

        </select>   </th>     <br>

        <th><label>Veículo</label>    </th>
        <th><select name="veiculo_id"> 
            <?php
            //percorre os municipios
            foreach ($resultVeiculo as $itens) {
                $selected = ($itens['id'] == $objLocacao->veiculo_id ? "selected" : "");
                echo "<option value='" . $itens['id'] . "' " . $selected . " >" . $itens['modelo'] . "</option>";
            }
            ?>

        </select>   </th>     <br>

        <th><label>Data retirada</label></th>
        <!-- passo valor do atributo telefone para a propriedade value -->
        <th><input type="date" name="data_retirada" value="<?php echo $objLocacao->data_retirada; ?>"> <br></th>
        <th><label>Hora retirada</label></th>
        <!-- passo valor do atributo telefone para a propriedade value -->
        <th><input type="time" name="hora_retirada" value="<?php echo $objLocacao->hora_retirada; ?>"> <br></th>

</tr><tr>

        

<th><label>Data devolução</label></th>
        <!-- passo valor do atributo telefone para a propriedade value -->
        <th><input type="date" name="data_devolucao" value="<?php echo $objLocacao->data_devolucao; ?>"> <br></th>

        <th><label>Hora devolução</label></th>
        <!-- passo valor do atributo telefone para a propriedade value -->
        <th><input type="time" name="hora_devolucao" value="<?php echo $objLocacao->hora_devolucao; ?>"> <br></th>

        <br>
        <th><input  type="submit" class="btn btn-primary" value="Editar"></th>

        </tr>

        </table>
        </div>

    </form>
</body>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</html>