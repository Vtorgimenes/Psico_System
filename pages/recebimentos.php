<?php
include "CRUD.php";

if (isset($_POST['action'])) {
  $action = $_POST['action'];
  unset($_POST['action']);
  if ($action === 'criar') {
    unset($_POST['id']);
    criar('recebimento', $_POST);
  } else if ($action === 'editar') {
    $id = $_POST['id'];
    unset($_POST['id']);
    editar('recebimento', 'id_recebimento', $id, $_POST);
  } else if ($action === 'remover') {
    $id = $_POST['id'];
    deletar('recebimento', 'id_recebimento', $id);
  }
}

$dados = json_encode(getAll('recebimento', "data_receb, valor,id_recebimento,plano_saude,tipo_receita,tipo_pagamento"));

?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Recebimentos</title>
  <link rel="stylesheet" href="main.css" />
  
  <?php require("../componentes/header_importacoes.html"); ?>
</head>

<body>
  <?php require("../componentes/topo.html"); ?>
  <main class="page projets-page">
    <header>
      <span class=title>Recebimentos</span>
      <button onclick="criar()" class="btn btn-info">
        Criar
      </button>
    </header>
    <section class="page">
      <form action="recebimentos.php" method="post" hidden>
        <input name="data_receb" type="date" placeholder="Data recebimento" required />
        <input name="plano_saude" type="text" placeholder="plano saude" required />
        <input name="valor" type="number" placeholder="valor" required />
        <input name="tipo_pagamento" type="text" placeholder="Tipo Pagamento" required />
        <input name="tipo_receita" type="text" placeholder="Tipo Receita" required />
        <input name="id" type="number" hidden />
        <input name="action" value="criar" hidden />
        <button id="btn_form" class="btn btn-info">Cadastrar</button>
      </form>
      <table>
        <thead>
          <th>Data Recebimentos</th>
          <th>plano saude</th>
          <th>Valor</th>
          <th>Tipo Pagamento </th>
          <th>Tipo Receita</th>
          <th>Ações</th>
        </thead>
        <tbody>
        </tbody>
      </table>
    </section>
  </main>

  <script>
    function mostraFormulario() {
      document.querySelector('form').removeAttribute('hidden')
    }

    function carregaDados() {
      const dados = <?php echo $dados ?>;
      const tabela = document.querySelector('table tbody');

      dados.forEach(dado => {
        const btnEditar = criaBotao('editar', () => editar(dado));
        const btnRemover = criaBotao('remover', () => remover(dado));
        const btnOptions = criaColuna();
        const linha = criaLinha();
        linha.appendChild(criaColuna(dado.data_receb));
        linha.appendChild(criaColuna(dado.plano_saude));
        linha.appendChild(criaColuna(dado.valor));
        linha.appendChild(criaColuna(dado.tipo_pagamento));
        linha.appendChild(criaColuna(dado.tipo_receita));
        linha.appendChild(btnEditar);
        btnOptions.appendChild(btnEditar);
        btnOptions.appendChild(btnRemover);
        linha.appendChild(btnOptions);
        tabela.appendChild(linha)
      })
    }

    function editar(dado) {
      document.querySelector('[name=action]').value = 'editar';

      document.querySelector('[name=valor]').value = dado.valor;
      document.querySelector('[name=plano_saude]').value = dado.plano_saude;
      document.querySelector('[name=data_receb]').value = dado.data_receb;
      document.querySelector('[name=tipo_pagamento]').value = dado.tipo_pagamento;
      document.querySelector('[name=tipo_receita]').value = dado.tipo_receita;
      document.querySelector('[name=id]').value = dado.id_recebimento;

      document.querySelector('#btn_form').innerHTML = 'Editar';


      mostraFormulario();
    }

    function criar() {
      document.querySelector('[name=action]').value = 'criar';
      document.querySelector('[name=valor]').value = '';
      document.querySelector('[name=plano_saude]').value = '';
      document.querySelector('[name=data_receb]').value = '';
      document.querySelector('[name=tipo_pagamento]').value = '';
      document.querySelector('[name=tipo_receita]').value = '';
      document.querySelector('[name=id]').value = '';
      document.querySelector('#btn_form').innerHTML = 'Inserir';

      mostraFormulario();
    }

    function remover(dado) {
      document.querySelector('[name=id]').value = dado.id_recebimento;
      document.querySelector('[name=action]').value = 'remover';
      document.querySelector('form').submit();
    }

    function criaLinha() {
      return document.createElement('tr');
    }

    function criaBotao(name, action) {
      const botao = document.createElement('button');
      botao.innerHTML = name;
      botao.class = "btn btn-info"
      botao.addEventListener('click', action);

      return botao;
    }

    function criaColuna(value) {
      const coluna = document.createElement('td');
      if (value) {
        coluna.innerHTML = value;
      }

      return coluna;
    }

    carregaDados();
  </script>
</body>

</html>