<?php
include '../../model/ClienteModel.php';

class ClienteController
{
    private $model;
    public function __construct()
    {
        //instanciando objeto
        $this->model = new ClienteModel();
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
        if (!empty($dados['nome']) && !empty($dados['telefone']) && !empty($dados['cpf']) && !empty($dados['email']) && !empty($dados['data_nascimento']) && !empty($dados['municipio_id'])) {

            $this->model::insert($dados);
            echo "<script>alert('Registro inserido com sucesso!')</script>";
            echo "<script>window.location='listarClienteView.php'</script>";
        } else {
            echo "<script>alert('Alguns campos não foram preenchidos!')</script>";
        }
    }
    public function update($dados)
    {
        //editar
        if (!empty($dados['nome']) && !empty($dados['telefone']) && !empty($dados['cpf']) && !empty($dados['email'])  && !empty($dados['data_nascimento'])  && !empty($dados['municipio_id'])) {

            $this->model::update($dados);
            echo "<script>alert('Registro alterado com sucesso!')</script>";
            echo "<script>window.location='listarClienteView.php'</script>";
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
            echo "<script>window.location='listarClienteView.php'</script>";
        } else {
            $this->model::deletar($id);
            echo "<script>alert('registro removido com sucesso!')</script>";
            echo "<script>window.location='listarClienteView.php'</script>";
        }
    }
    public function search($dados)
    {
        //pesquisar
        $result = $this->model::search($dados);
        return $result;
    }
}
