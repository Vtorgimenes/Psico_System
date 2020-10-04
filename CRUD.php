
<?php

include_once('conexao.php');
include_once('helper.php');
function editar($tablename, $primaryKey, $id, $dados) {
    global $conn;
    $columns = trataDados($dados);
   // die("UPDATE {$tablename} SET {$columns} WHERE {$primaryKey} = {$id}");
    $result = $conn->query("UPDATE {$tablename} SET {$columns} WHERE {$primaryKey} = {$id}");
  
    if (!$result) {
      die('Erro ao atualizar');
    }
  }
function criar($tablename, $dados)
{
    global $conn;
    
    $columns = join(array_keys($dados), ",");
    $values =  join(array_values(trataDadosInsert($dados)), ",");
   // die("INSERT into {$tablename} ({$columns}) values ({$values})");
   
    $result = $conn->query("INSERT into {$tablename} ({$columns}) values ({$values})");

    if (!$result) {
        die('Erro ao criar');
    }
}

function deletar($tablename, $primaryKey, $id)
{
    global $conn;
    $result = $conn->query("DELETE FROM {$tablename} WHERE {$primaryKey} = {$id}");
}

function getAll($tablename, $columns) {
   
    global $conn;
    
    $query = $conn->query("SELECT {$columns} FROM {$tablename}");

    return $query->fetch_all(MYSQLI_ASSOC);
}
?>