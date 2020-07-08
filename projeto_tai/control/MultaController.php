<?php
include '../../model/MultaModel.php';

class MultaController
{

    private $model;

    public function __construct()
    {
        $this->model = new MultaModel();
    }

    public function index()
    {
        $objeto = $this->model::selectAll();

        return $objeto;
    }

    public function create($dados)
    {

        if (
            !empty($dados['data_multa']) && !empty($dados['hora_multa']) &&
            !empty($dados['veiculo_id']) &&  !empty($dados['cliente_id']) &&
            !empty($dados['locacao_id']) &&  !empty($dados['valor'])
        ) {

            $objLocacaoModel = new LocacaoModel();
            $objLocacao = $objLocacaoModel::find($dados['locacao_id'], 'locacao');

            $this->model = new MultaModel();

            if (
                $objLocacao->data_retirada <= ($dados['data_multa']) &&
                $objLocacao->data_devolucao >= ($dados['data_multa'])
            ) {
                $this->model::insert($dados);


                echo "<script>alert('Registro inserido com sucesso!')</script>";
                echo "<script>window.location='listarMultaView.php'</script>";
            } else {
                echo "<script>alert('Não é possível cadastrar uma multa nessa data!')</script>";
                echo "<script>window.location='listarMultaView.php'</script>";
            }
        } else {
            echo "<script>alert('Tente novamente!')</script>";
        }
    }
    public function update($dados)
    {
        if (
            !empty($dados['data_multa']) && !empty($dados['hora_multa']) &&
            !empty($dados['veiculo_id']) &&  !empty($dados['cliente_id']) &&
            !empty($dados['locacao_id']) && !empty($dados['valor'])
        ) {

            $objLocacaoModel = new LocacaoModel();
            $objLocacao = $objLocacaoModel::find($dados['locacao_id'], 'locacao');

            $this->model = new MultaModel();

            if (
                $objLocacao->data_retirada <= ($dados['data_multa']) &&
                $objLocacao->data_devolucao >= ($dados['data_multa'])
            ) {
                $this->model::update($dados);

                echo "<script>alert('Registro alterado com sucesso!')</script>";
                echo "<script>window.location='listarMultaView.php'</script>";
            } else {
                echo "<script>alert('Não é possível cadastrar uma multa nessa data!')</script>";
                echo "<script>window.location='listarMultaView.php'</script>";
            }
        } else {
            echo "<script>alert('Tente novamente!')</script>";
        }
    }
    public function remove($id)
    {
        $objModel = $this->model::find($id);
        if (empty($objModel)) {
            echo "<script>alert('O ID informado não exite!')</script>";
            echo "<script>window.location='listarMultaView.php'</script>";
        } else {
            $this->model::deletar($id);
            echo "<script>alert('Registro removido com sucesso!')</script>";
            echo "<script>window.location='listarMultaView.php'</script>";
        }
    }
    public function search($dados)
    {


        if ($dados['tipo'] == "cliente_id") {
            $dados['valor'] = $dados['cliente_id'];

        } else  if ($dados['tipo'] == "veiculo_id") {
            $dados['valor'] = $dados['veiculo_id'];

        }

        $result = $this->model::search($dados);

        return $result;
    }

}