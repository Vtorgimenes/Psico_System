<?php

abstract class TFuncoes {

    /*
     * Verifica se o usuário está logado
     *
     * */
    public static function VerificaLogin($index = false){

        session_start();
        if (!isset($_SESSION["logado"]) || $_SESSION["logado"] != true) {
            if($index){
                header("Location: login.php");
            }else
                header("Location: ../login.php");
        }
    }
    public static function login($user, $senha, $tipo = 'paciente')
    {

        $dados = TFuncoes::ExecSql("SELECT l.id_login, p.nome, p.telefone, p.cpf, p.tipo
FROM `login` l 
INNER JOIN `pessoa` p on p.email = l.email 
WHERE l.email = '$user' and l.senha = '$senha'");

        $psicologo = TFuncoes::ExecSql("SELECT p.nome, p.telefone, p.email, p.cpf, p.endereco from `pessoa` p
WHERE p.tipo = 'psicologo'");

        if ($dados != false) {
            session_start();
            $_SESSION["logado"] = true;
            $_SESSION["user_id"] = $dados[0]['id_login'];
            $_SESSION["user_nome"] = $dados[0]['nome'];
            $_SESSION["user_tipo"] = $dados[0]['tipo'];
            $_SESSION["user_permissao"] = 1;
            $_SESSION["user_cpf"] = $dados[0]['cpf'];

            $_SESSION["psic_nome"] = $psicologo[0]['nome'];
            $_SESSION["psic_cpf"] = $psicologo[0]['cpf'];
            $_SESSION["psic_telefone"] = $psicologo[0]['telefone'];
            $_SESSION["psic_email"] = $psicologo[0]['email'];
            $_SESSION["psic_endereco"] = $psicologo[0]['endereco'];

            if ($dados[0]['tipo'] == 'paciente') {
                header("Location: areapaciente.php");
            }
            if ($dados[0]['tipo'] == 'psicologo') {
                header("Location: areapsicologo.php");
            }
            exit();
            $dados = true;
        } else {
            session_start();
            unset($_SESSION["logado"]);
            unset($_SESSION["user_id"]);
            unset($_SESSION["user_nome"]);
            unset($_SESSION["user_permissao"]);
            //    unset ($_SESSION["user_cargo"]);
            //    unset ($_SESSION["user_cpf"]);
            if ($tipo == 'paciente') {
                header("Location: pages/loginPaciente.php");
            }
            if ($tipo == 'psicologo') {
                header("Location: pages/loginpsico.php");
            }
            $dados =  false;
        }
    }

    public static function AddConexao() {

//        $host = "127.0.0.1";
        $host = "localhost";
//        $username = "locar";
        $username = "root";
//        $password = "lizard";
        $password = "";
        $db_name = "psico";

        $conn = new mysqli($host, $username, $password, $db_name);
        if ($conn->connect_error) {
            die("Falha na Conexão com o banco" . $conn->connect_error);
        } else
            return $conn;
    }

    /* Passar por parametro campos ou um where
     * Ex: ('pessoa', 'nome, cpf')
     *  ('pessoa', 'nome, cpf', 'cpf = 0000000000')    */

    public static function Select($tabela, $campos = false, $where = false) {
        $db = TFuncoes::AddConexao();

        $cp = (!$campos) ? ' * ' : $campos;
        $busca = (!$where) ? '' : ' where ' . $where;

        $resul = $db->query("select $cp from $tabela $busca");
        if ($resul->num_rows > 0) {
            while ($row = $resul->fetch_assoc()) {

                $dados[] = $row;
            }
            return $dados;
        } else {
            return false;
        }
    } 
    /*
     *Passar sql que deseja executar por parametro*/
    public static function ExecSql($sql) {
        $db = TFuncoes::AddConexao();

        $resul = $db->query($sql);
        if($resul){
//        var_dump('asd');
        if ($resul->num_rows > 0) {
            while ($row = $resul->fetch_assoc()) {

                $dados[] = $row;
            }
            return $dados;
        }} else {
            return false;
        }
    }
}
