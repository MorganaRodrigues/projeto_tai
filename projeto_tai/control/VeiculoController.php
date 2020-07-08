<?php
include '../../model/VeiculoModel.php';

class VeiculoController
{
    private $model;
    public function __construct()
    {
        //instanciando objeto
        $this->model = new VeiculoModel();
    }
    public function index()
    {
        //listar
        $objeto = $this->model::selectAll();
        return $objeto;
    }
    public function create($dados)
    {
        //inserir
        if (!empty($dados['cliente_id']) && !empty($dados['placa']) && !empty($dados['tipo_veiculo']) && !empty($dados['fabricante']) && !empty($dados['modelo'])) {

            $this->model::insert($dados);
            echo "<script>alert('Registro inserido com sucesso!')</script>";
            echo "<script>window.location='listarVeiculoView.php'</script>";
        } else {
            echo "<script>alert('Alguns campos não foram preenchidos!')</script>";
        }
    }
    public function update($dados)
    {
        //editar
        if (!empty($dados['cliente_id']) && !empty($dados['placa']) && !empty($dados['tipo_veiculo']) && !empty($dados['fabricante']) && !empty($dados['modelo'])) {

            $this->model::update($dados);
            echo "<script>alert('Registro alterado com sucesso!')</script>";
            echo "<script>window.location='listarVeiculoView.php'</script>";
        } else {
            echo "<script>alert('Alguns campos não foram preenchidos!')</script>";
        }
    }
    public function remove($id)
    {
        //remover, o exclamacao é igual a diferente
        $objModel = $this->model::find($id);
        if (empty($objModel)) {
            echo "<script>alert('o id informado nao existe!')</script>";
            echo "<script>window.location='listarVeiculoView.php'</script>";
        } else {
            $this->model::deletar($id);
            echo "<script>alert('registro removido com sucesso!')</script>";
            echo "<script>window.location='listarVeiculoView.php'</script>";
        }
    }
    public function search($dados)
    {
        //pesquisar
        $result = $this->model::search($dados);
        return $result;
    }
}
