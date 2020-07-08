<?php
// inclui o arquivo BD.php dentro deste arquivo 
//para que seus metodos fiquem visiveis
include '../../control/VeiculoController.php';
include '../../model/ClienteModel.php';
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
    <title>Document</title>
</head>

<body>
    <?php

    $objVeiculoController = new VeiculoController();


    if (!empty($_POST)) {
        //chama o metodo INSERT recebendo os dados do usuário através do metodo $_POST
        $objVeiculoController->create($_POST);
    }



    $objClienteModel = new ClienteModel();
    $resultClientes = $objClienteModel::selectAll();

    ?>

    <!-- propriedade action faz a chamada do BD.php para pegar o valor do form
        o restante e um formulario comum usando o metodo POST
    -->
    <a href="../veiculo/listarVeiculoView.php" class="btn btn-primary" role="button">Voltar</a>
    <form action="formVeiculoView.php" method="POST" , align="center">

        <h1>Cadastrar veículo<span class="badge badge-primary" align="center"></span></h1> <br>
        <div class="tabela">
            <table>

                <tr>
                <th><label>Cliente</label> </th>
                    <th><select name="cliente_id">
                            <?php
                            //percorre os municipios
                            foreach ($resultClientes as $item) {
                                echo "<option value= '" . $item['id'] . "'>" . $item['nome'] . "</option>";
                            }
                            ?>

                        </select> </th> <br>

                    <th><label>Placa</label></th>
                    <!-- passo valor do atributo nome para a propriedade value -->
                    <th><input type="text" name="placa"></th> <br>

                    <th><label>Tipo veículo</label></th>
                    <!-- passo valor do atributo telefone para a propriedade value -->
                    <th><input type="text" name="tipo_veiculo"> <br></th>

                   
                </tr>
                <tr>
                <th><label>Fabricante</label></th>
                    <!-- passo valor do atributo cpf para a propriedade value -->
                    <th><input type="text" name="fabricante"> <br></th>

                    
                    <th><label>Modelo</label></th>
                    <!-- passo valor do atributo e-mail para a propriedade value -->
                    <th><input type="text" name="modelo"> <br></th>

                   
                    

                    <br>
                    <th> <input type="submit" class="btn btn-primary" value="Enviar"></th>

                </tr>

            </table>
        </div>
    </form>


</body>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</html>