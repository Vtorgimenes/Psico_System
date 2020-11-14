<?php
include "CRUD.php";

if (isset($_POST['action'])) {
    $action = $_POST['action'];
    unset($_POST['action']);
    if ($action === 'criar') {
        unset($_POST['id']);
        criar('pagamento', $_POST);
    } else if ($action === 'editar') {
        $id = $_POST['id'];
        unset($_POST['id']);
        editar('pagamento', 'id_pagamento', $id, $_POST);
    } else if ($action === 'remover') {
        $id = $_POST['id'];
        deletar('pagamento', 'id_pagamento', $id);
    }
}

$dados = json_encode(getAll('pagamento', "data_pag, valor,id_pagamento,descricao"));

?>


<!DOCTYPE html>
<html lang="PT-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagamentos</title>
    <link rel="stylesheet" href="main.css"/>
    <?php require("../componentes/header_importacoes.html"); ?>
</head>

<body style="display: contents!important;">
<?php require("../componentes/topo.html"); ?>
<main class="page projets-page container">
    <header>
        <span class=title>Pagamentos</span>
        <button onclick="criar()" class="btn btn-info">
            Criar
        </button>
    </header>
    <section class="page">
        <form action="pagamentos.php" method="post" hidden>
            <input class="input-group form-control m-2" name="data_pag" type="date" placeholder="Data pagamento" required/>
            <input class="input-group form-control m-2" name="descricao" type="text" placeholder="descricao" required/>
            <input class="input-group form-control m-2" name="valor" type="number" placeholder="valor" required/>
            <input class="input-group form-control m-2" name="id" type="number" hidden/>
            <input class="input-group form-control m-2" name="action" value="criar" hidden/>
            <button id="btn_form" class="btn btn-info">Cadastrar</button>
        </form>
        <table class="table table-bordered table-striped">
            <thead>
            <th>Data Pagamento</th>
            <th>Descricao</th>
            <th>Valor</th>
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
            linha.appendChild(criaColuna(new Date(dado.data_pag).toLocaleDateString("pt-BR")));
            linha.appendChild(criaColuna(dado.descricao));
            linha.appendChild(criaColuna(dado.valor));
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
        document.querySelector('[name=descricao]').value = dado.descricao;
        document.querySelector('[name=data_pag]').value = dado.data_pag;
        document.querySelector('[name=id]').value = dado.id_pagamento;
        document.querySelector('#btn_form').innerHTML = 'Editar';


        mostraFormulario();
    }

    function criar() {
        document.querySelector('[name=action]').value = 'criar';
        document.querySelector('[name=valor]').value = '';
        document.querySelector('[name=descricao]').value = '';
        document.querySelector('[name=data_pag]').value = '';
        document.querySelector('[name=id]').value = '';
        document.querySelector('#btn_form').innerHTML = 'Inserir';

        mostraFormulario();
    }

    function remover(dado) {
        document.querySelector('[name=id]').value = dado.id_pagamento;
        document.querySelector('[name=action]').value = 'remover';
        document.querySelector('form').submit();
    }

    function criaLinha() {
        return document.createElement('tr');
    }

    function criaBotao(name, action) {
        const botao = document.createElement('button');
        botao.innerHTML = name;
        botao.classList = name == 'editar' ? "btn btn-warning m-2" : "btn btn-danger m-2"
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