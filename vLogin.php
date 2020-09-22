<?php
include './TFuncao.php';

$user = addslashes(trim($_GET['email']));
$senha = addslashes(trim($_GET["senha"])) ;


$dados = TFuncoes::ExecSql("select id, nome_completo from usuarios where email = '$user' and senha = '$senha'");
//die(var_dump($dados));

if ($dados != false){
    session_start();
    $_SESSION["logado"] = true;
    $_SESSION["user_id"] = $dados[0]['id'];
    $_SESSION["user_nome"] = $dados[0]['nome_completo'];
    $_SESSION["user_cpf"]= 0;
    header("Location: pages/areapaciente.php");
    exit();

    $dados = true;
}else{
    session_start();
    unset ($_SESSION["logado"]);
    unset ($_SESSION["user_id"]);
    unset ($_SESSION["user_nome"]);
    $dados =  false;
}
echo json_encode( $dados);
?>
