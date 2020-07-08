<?php
// inclui o arquivo BD.php dentro deste arquivo 
//para que seus metodos fiquem visiveis
include '../../control/ClienteController.php';
include '../../model/MunicipioModel.php';
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

    $objClienteController = new ClienteController();


    if (!empty($_POST)) {
        //chama o metodo INSERT recebendo os dados do usuário através do metodo $_POST
        $objClienteController->create($_POST);
    }

    $objMunicipioModel = new MunicipioModel();
    $resultMunicipios = $objMunicipioModel::selectAll();

    ?>

    <!-- propriedade action faz a chamada do BD.php para pegar o valor do form
        o restante e um formulario comum usando o metodo POST
    -->
    <a href="../cliente/listarClienteView.php" class="btn btn-primary" role="button">Voltar</a>
    <form action="formClienteView.php" method="POST" , align="center">
        <h1>Cadastrar cliente <span class="badge badge-secondary" align="center"></span></h1> <br>
        <div class="tabela">
            <table>

                <tr>

                    <th><label>Nome</label></th>
                    <!-- passo valor do atributo nome para a propriedade value -->
                    <th><input type="text" name="nome"></th> <br>

                    <th><label>Telefone</label></th>
                    <!-- passo valor do atributo telefone para a propriedade value -->
                    <th><input type="text" name="telefone"> <br></th>

                    <th><label>CPF</label></th>
                    <!-- passo valor do atributo cpf para a propriedade value -->
                    <th><input type="text" name="cpf"> <br></th>

                </tr>
                <tr>

                    <th><label>E-mail</label></th>
                    <!-- passo valor do atributo e-mail para a propriedade value -->
                    <th><input type="text" name="email"> <br></th>

                    <th><label>Data nascimento</label></th>
                    <!-- passo valor do atributo telefone para a propriedade value -->
                    <th><input type="date" name="data_nascimento"> <br></th>

                    <th><label>Município</label> </th>
                    <th><select name="municipio_id">
                            <?php
                            //percorre os municipios
                            foreach ($resultMunicipios as $item) {
                                echo "<option value= '" . $item['id'] . "'>" . $item['nome'] . "</option>";
                            }
                            ?>

                        </select> </th> <br>

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