<?php
// inclui o arquivo BD.php dentro deste arquivo 
//para que seus metodos fiquem visiveis
include '../../control/LocacaoController.php';
include '../../model/ClienteModel.php';
include '../../model/VeiculoModel.php';
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

    $objLocacaoController = new LocacaoController();


    if (!empty($_POST)) {
        //chama o metodo INSERT recebendo os dados do usuário através do metodo $_POST
        $objLocacaoController->create($_POST);
    }



    $objClienteModel = new ClienteModel();
    $resultClientes = $objClienteModel::selectAll();

    $objVeiculoModel = new VeiculoModel();
    $resultVeiculos = $objVeiculoModel::selectAll();


    ?>
    <a href="../locacao/listarLocacaoView.php" class="btn btn-primary" role="button">Voltar</a>
    <!-- propriedade action faz a chamada do BD.php para pegar o valor do form
        o restante e um formulario comum usando o metodo POST
    -->
    <form action="formLocacaoView.php" method="POST" , align="center">
        <h1>Cadastrar locação <span class="badge badge-secondary" align="center"></span></h1> <br>
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
                        <th><label>Veículo</label> </th>
                    <th><select name="veiculo_id">
                            <?php
                            //percorre os municipios
                            foreach ($resultVeiculos as $item) {
                                echo "<option value= '" . $item['id'] . "'>" . $item['modelo'] . "</option>";
                            }
                            ?>

                        </select> </th> <br>

                        <th><label>Data retirada</label></th>
                    <!-- passo valor do atributo telefone para a propriedade value -->
                    <th><input type="date" name="data_retirada"> <br></th>
                    <th><label>Hora retirada</label></th>
                    <!-- passo valor do atributo telefone para a propriedade value -->
                    <th><input type="time" name="hora_retirada"> <br></th>
                 
                    <th><label>Data devolução</label></th>
                    <!-- passo valor do atributo telefone para a propriedade value -->
                    <th><input type="date" name="data_devolucao"> <br></th>

                    <th><label>Hora devolução</label></th>
                    <!-- passo valor do atributo telefone para a propriedade value -->
                    <th><input type="time" name="hora_devolucao"> <br></th>
                    

                </tr>
                <tr>
                <th>

                    

            

                   

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