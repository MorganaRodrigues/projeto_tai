<?php
// inclui o arquivo BD.php dentro deste arquivo 
//para que seus metodos fiquem visiveis
include '../../control/MultaController.php'; //voltando duas pastas

include '../../model/ClienteModel.php';
include '../../model/VeiculoModel.php';
include '../../model/LocacaoModel.php';
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
    $objMultaController = new MultaController();

    if (!empty($_POST)) {
        //chama o metodo UPDATE recebendo os dados do usuário através do metodo $_POST
        $objMultaController->update($_POST);
        //metodo header faz uma chamada para a tela de listagem
        //depois que realizou a edicao
        //  header("Location: listarClienteView.php");
    }

    //Busca os dados no banco de dados pelo ID da URL passando como parametro no metodo FIND
    $objetoMultaModel = new MultaModel();
    $objMulta = $objetoMultaModel->find($_GET['id']);



    $objetoClienteModel = new ClienteModel();
    $resultCliente = $objetoClienteModel->selectAll();

    $objetoVeiculoModel = new VeiculoModel();
    $resultVeiculo = $objetoVeiculoModel->selectAll();

    $objetoLocacaoModel = new LocacaoModel();
    $resultLocacao = $objetoLocacaoModel->selectAll();

    ?>
    <a href="../multa/listarMultaView.php" class="btn btn-primary" role="button">Voltar</a>
    <form action="formEditarMultaView.php" method="POST" , align="center">
        <h1>Editar multa <span class="badge badge-secondary"></span></h1> <br>
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
                $selected = ($itens['id'] == $objMulta->cliente_id ? "selected" : "");
                echo "<option value='" . $itens['id'] . "' " . $selected . " >" . $itens['nome'] . "</option>";
            }
            ?>

        </select>   </th>     <br>

        <th><label>Veículo</label>    </th>
        <th><select name="veiculo_id"> 
            <?php
            //percorre os municipios
            foreach ($resultVeiculo as $itens) {
                $selected = ($itens['id'] == $objMulta->veiculo_id ? "selected" : "");
                echo "<option value='" . $itens['id'] . "' " . $selected . " >" . $itens['modelo'] . "</option>";
            }
            ?>

        </select>   </th>     <br>

        <th><label>Locação (data retirada)</label>    </th>
        <th><select name="locacao_id"> 
            <?php
            //percorre os municipios
            foreach ($resultLocacao as $itens) {
                $selected = ($itens['id'] == $objMulta->locacao_id ? "selected" : "");
                echo "<option value='" . $itens['id'] . "' " . $selected . " >" . $itens['data_retirada'] . "</option>";
            }
            ?>

        </select>   </th>     <br>

        <th><label>Valor</label></th>
        <!-- passo valor do atributo e-mail para a propriedade value -->
        <th><input type="text" name="valor" value="<?php echo $objMulta->valor; ?>"> <br></th>
      

</tr><tr>

<th><label>Data multa</label></th>
        <!-- passo valor do atributo e-mail para a propriedade value -->
        <th><input type="date" name="data_multa" value="<?php echo $objMulta->data_multa; ?>"> <br></th>
        <th><label>Hora multa</label></th>
        <!-- passo valor do atributo e-mail para a propriedade value -->
        <th><input type="time" name="hora_multa" value="<?php echo $objMulta->hora_multa; ?>"> <br></th>
      
      
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