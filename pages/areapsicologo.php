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
                                role="button" href="./recebimentos.php">Entrar</a>
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
                    <div class="text-danger project-card-no-image">
                        <h3 style="color: rgb(0,0,0);">Pagamentos</h3>
                        <h4 style="color: rgb(0,0,0);">Lance e consulte aqui os seus gastos mensais.</h4><a
                                class="btn btn-outline-primary btn-sm"
                                role="button" href="./pagamentos.php">Entrar</a>
                        <div class="tags"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<div class="container-fluid align-content-center text-center justify-content-center container"
     style="padding-bottom: 20px">
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