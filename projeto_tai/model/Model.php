<?php
include '../../Config.php';

class Model
{

    private static $table;

    public static function setTable($nomeTabela)
    {
        self::$table = $nomeTabela;
    }

    public static function getTable()
    {
        return self::$table;
    }

    public static function connection()
    {
        $str_conn = Config::BD_TIPO . ":host=" . Config::BD_HOST .
            ";dbname=" . Config::BD_NOME . ";port=" . Config::BD_PORTA;

        return new PDO(
            $str_conn,
            Config::BD_USUARIO,
            Config::BD_SENHA,
            array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES " . Config::BD_CHARSET)
        );
    }

    public static function selectAll($diffTable = '')
    {
        $nameTable = !empty($diffTable) ? $diffTable : self::getTable();

        $conn = self::connection();
        $stmt = $conn->prepare("SELECT * FROM $nameTable order by id");
        $stmt->execute();
        return $stmt;
    }

    public static function find($id, $diffTable = "")
    {
        $nameTable = !empty($diffTable) ? $diffTable : self::getTable();

        $conn = self::connection();
        $stmt = $conn->prepare("SELECT * FROM $nameTable WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetchObject();
    }

    public static function logar($login, $senha)
    {
        $conn = self::connection();
        $stmt = $conn->prepare("SELECT * FROM usuario WHERE login = ? AND senha = ? AND ativo = 1");
        $stmt->execute([$login, $senha]);
        return $stmt->fetchObject();
    }

    public static function search($dados)
    {
        $nomeTabela = self::getTable();
        $campo = $dados['tipo'];

        $conn = self::connection();
        $stmt = $conn->prepare("SELECT * FROM $nomeTabela WHERE $campo LIKE ?;");
        $stmt->execute(["%" . $dados['valor'] . "%"]);
        return $stmt;
    }

    public static function update($dados)
    {
        $nameTable = self::getTable();
        $id = $dados['id'];

        $sql = "UPDATE $nameTable SET ";

        $flag = 0;
        $arrayValue = [];
        foreach ($dados as $campo => $valor) {
            $sql .= $flag == 0 ? "$campo = ?" : ", $campo = ?";

            $flag = 1;
            $arrayValue[] = $valor;
        }

        $sql .= " WHERE id = $id;";

        $conn = self::connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($arrayValue);

        return $stmt;
    }

    public static  function insert($dados)
    {
        $nameTable = self::getTable();
        $sql = "INSERT INTO $nameTable(";

        $flag = 0;
        foreach ($dados as $campo => $valor) {
            $sql .= ($flag == 0 ? $campo : ", $campo");

            $flag = 1;
        }

        $sql .= ") VALUES (";

        $flag = 0;
        $arrayValue = [];
        foreach ($dados as $campo => $valor) {

            $sql .= ($flag == 0 ? " ? " : ", ?");
            $flag = 1;

            $arrayValue[] = $valor;
        }

        $sql .= ");";

        $conn = self::connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($arrayValue);

        return $stmt;
    }

    public static function deletar($id)
    {
        $nameTable = self::getTable();

        $conn = self::connection();
        $stmt = $conn->prepare("DELETE FROM $nameTable WHERE `id` = ?;");
        $stmt->execute([$id]);
        return $stmt;
    }
}
