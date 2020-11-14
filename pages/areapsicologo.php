<?php
include '../TFuncao.php';
if ($_POST) {
    TFuncoes::login($_POST["email"], $_POST["password"]);
}
?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Projects - Inicio</title>
    <?php require("../componentes/header_importacoes.html"); ?>
</head>

<body>
<?php require("../componentes/topo.html"); ?>
<main class="page projets-page">
    <section class="portfolio-block project-no-images">
        <div class="container">
           

            <div class="heading">
                <h2>Seja bem vindo psicologo</h2>
            </div>
            

            <p>Psicologo, aqui você tem disponível um pequeno painel de controle com algumas funções. Lembre-se sempre
                de visualizar suas consultas pré-agendadas para decidir se serão agendadas ou não.&nbsp;<br>&nbsp;<br>Caso
                seja necessário cadastrar
                um plano de saúde pelo qual você não atenda, envie um e-mail para 'Psicosystembusiness@gmail.com' para
                que ele seja incluído dentro do sistema. (Realizar a solicitação com pelo menos 48 horas antes de
                realizar a consulta.<br><br></p>
            <div
                    class="row">
                <div class="col-md-6 col-lg-4">
                    <div class="text-danger project-card-no-image">
                        <h3 style="color: rgb(0,0,0);">Recebimentos</h3>
                        <h4 style="color: rgb(0,0,0);">Verifique os seus rebimentos aqui.</h4><a
                                class="btn btn-outline-primary btn-sm"
                                role="button" href="./financas.php">Entrar</a>
                        <div class="tags"></div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="text-danger project-card-no-image">
                        <h3 style="color: rgb(0,0,0);">Cadastro de plano de saúde</h3>
                        <h4 style="color: rgb(0,0,0);">Faça cadastros de planos de saúde aqui para a sua clínica.</h4><a
                                class="btn btn-outline-primary btn-sm"
                                role="button" href="cadastro_convenios.php">Entrar</a>
                        <div class="tags"></div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="project-card-no-image">
                        <h3 class="display-4" style="filter: hue-rotate(360deg);">Para verificar .</h3>
                        <div class="tags"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<div class="container-fluid">
    <h3 class="text-center text-dark mb-4">Consultas já realizada</h3>
    <div class="card shadow">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 text-nowrap">
                    <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable">
                        <label>Filtro&nbsp;<select class="form-control form-control-sm custom-select custom-select-sm">
                                <option value="10" selected="">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>&nbsp;</label></div>
                </div>
                <div class="col-md-6">
                    <div class="text-md-right dataTables_filter" id="dataTable_filter"><label></label></div>
                </div>
            </div>
            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                <table class="table my-0" id="dataTable">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Telefone</th>
                        <th>Email</th>
                        <th>Valor</th>
                        <th>Data</th>
                        <th>Hora</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    /**
                     * exemplo para você listar algo na tela
                     */
                    // colocar ao certo os campos do banco de dados, colocar o nome da tabela
                    $sql = 'SELECT 
                                     a.*,
                                     ps.nome as nome_psicologo,
                                     ps.telefone as telefone_psicologo,
                                     ps.email as email_psicologo,
                                     p.nome as nome_paciente,
                                     p.telefone as telefone_paciente,
                                     p.email as email_paciente
                                    FROM `agenda` a
                                    INNER JOIN `pessoa` p ON p.id_pessoa = a.id_paciente
                                    INNER JOIN `pessoa` ps ON ps.id_pessoa = a.id_psicologo';

                    //tive que usar mysqli_query pois a funcao pra preencher tabela nao estava funcionando
                    $resultado = mysqli_query(TFuncoes::AddConexao(), $sql);
                    // echo $sqlEditar;
                    if ($resultado) {
                        while ($registro = mysqli_fetch_assoc($resultado)) {
                            // colocar ao certo os campos do banco de dados dentro dos [""] aonde tem ["nome"]
                            echo '<tr>';
                            echo '<td><img class="rounded-circle mr-2" width="30" height="30" src="../assets/img/favteste.png?h=98b0d64a468f6a5f152be18dc94d4bbe"/></td>';
                            echo '<td>' . $registro["nome_paciente"] . '</td>';
                            echo '<td>' . $registro["telefone_paciente"] . '</td>';
                            echo '<td>' . $registro["email_paciente"] . '</td>';
                            echo '<td>' . $registro["valor"] . '</td>';
                            echo '<td>' . $registro["data_agenda"] . '</td>';
                            echo '<td>' . $registro["hora"] . '</td>';
                            echo '</tr>';
                        }
                    } else {
                        echo '<tr>';
                        echo '<td>Sem agendamentos</td>';
                        echo '</tr>';
                    }

                    ?>
                    </tbody>
                    <tfoot>
                    <tr></tr>
                    </tfoot>
                </table>
            </div>
            <a class="btn btn-primary btn-block btn-sm text-center" href="../index.php">Sair&nbsp;</a>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/smart-forms.min.js?h=a52d057774a957ffc5c4e3aabf79520a"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.2.0/aos.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/pikaday.min.js"></script>
<script src="../assets/js/script.min.js?h=64241765bd4451a847941a9a75856ee8"></script>
</body>

</html>