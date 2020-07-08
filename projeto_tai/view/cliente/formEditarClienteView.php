<?php
// inclui o arquivo BD.php dentro deste arquivo 
//para que seus metodos fiquem visiveis
include '../../control/ClienteController.php'; //voltando duas pastas
include '../../model/MunicipioModel.php';
/*
include '../../lib/Util.php';

session_start();

verificarLogin();

*/
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
    $objClienteController = new ClienteController();

    if (!empty($_POST)) {
        //chama o metodo UPDATE recebendo os dados do usuário através do metodo $_POST
        $objClienteController->update($_POST);
        //metodo header faz uma chamada para a tela de listagem
        //depois que realizou a edicao
        //  header("Location: listarClienteView.php");
    }

    //Busca os dados no banco de dados pelo ID da URL passando como parametro no metodo FIND
    $objetoClienteModel = new ClienteModel();
    $objCliente = $objetoClienteModel->find($_GET['id']);

    $objetoMunicipioModel = new MunicipioModel();
    $resultMunicipio = $objetoMunicipioModel->selectAll();

    ?>
    <a href="../cliente/listarClienteView.php" class="btn btn-primary" role="button">Voltar</a>


    <form action="formEditarClienteView.php" method="POST" , align="center">
        <h1>Editar cliente <span class="badge badge-secondary"></span></h1> <br>
        <!-- Input Hidden tag que fica oculta para receber o valor do ID do form--->
        <!-- passo os id para a propriedade value -->
<div class="tabela">
        <table>

        <tr>
        <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">

        <th><label>Nome</label></th>
        <!-- passo valor do atributo nome para a propriedade value -->
        <th><input type="text" name="nome" value="<?php echo $objCliente->nome; ?>"></th> <br>

        <th><label>Telefone</label></th>
        <!-- passo valor do atributo telefone para a propriedade value -->
        <th><input type="text" name="telefone" value="<?php echo $objCliente->telefone; ?>"> <br></th>

        <th><label>CPF</label></th>
        <!-- passo valor do atributo cpf para a propriedade value -->
        <th><input type="text" name="cpf" value="<?php echo $objCliente->cpf; ?>"> <br></th>

</tr><tr>

        <th><label>E-mail</label></th>
        <!-- passo valor do atributo e-mail para a propriedade value -->
        <th><input type="text" name="email" value="<?php echo $objCliente->email; ?>"> <br></th>

        <th><label>Data nascimento</label></th>
        <!-- passo valor do atributo telefone para a propriedade value -->
        <th><input type="date" name="data_nascimento" value="<?php echo $objCliente->data_nascimento; ?>"> <br></th>

        <th><label>Município</label>    </th>
        <th><select name="municipio_id"> 
            <?php
            //percorre os municipios
            foreach ($resultMunicipio as $itens) {
                $selected = ($itens['id'] == $objCliente->municipio_id ? "selected" : "");
                echo "<option value='" . $itens['id'] . "' " . $selected . " >" . $itens['nome'] . "</option>";
            }
            ?>

        </select>   </th>     <br>

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