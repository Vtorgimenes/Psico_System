<?php

function trataDados($dados) {
    $values = [];

  foreach($dados as $key => $value) {
      array_push($values, "{$key}='{$value}'");
  }

  $values = join($values, ",");

  return $values;
}
function trataDadosInsert($dados) {
  return array_map(function ($dado) {
    return "'{$dado}'";
  }, $dados);
}
?>