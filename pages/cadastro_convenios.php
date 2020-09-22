<?php
include '../TFuncao.php';
if ($_POST) {
    $dataCad = date("Y-m-d H:i:s");
    $con = TFuncoes::AddConexao();

    $sql = "insert into convenios (nome, valor, tipo) 
        values('" . $_POST["nome"] . "','" . $_POST["valor"] . "','" . $_POST["tipo"] . "')";

    if (mysqli_query($con, $sql)) {
        $msg = "Gravado com sucesso!";
    } else {
        $msg = "Erro ao gravar!";
    }
    echo "<script type='javascript'>alert($msg)</script>";
    mysqli_close($con);
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
        <section class="portfolio-block projects compact-grid">
            <form action="/" method="post">
                <div class="form-group"><label for="nome">Nome do Plano</label><input class="form-control item" type="text" id="nome" name="nome" required="" style="background: rgb(255,255,255);"></div>
                <div class="form-group"><label for="valor">Valor das consultas</label><input class="form-control item" type="number" id="valor" name="valor" style="background: rgb(255,255,255);"></div>
                <div class="form-group"><label for="tipo">Tipo do Plano</label></div><select name="tipo" class="form-control">
                    <optgroup label="Nenhum">
                        <option value="12" selected="">Unimed</option>
                        <option value="13">Cassems</option>
                        <option value="14">Tabela Social</option>
                        <option value="">Pax Primavera</option>
                        <option value="">Outros</option>
                    </optgroup>
                </select>
                <div class="form-group">
                    <div></div>
                </div>
                <div></div>
                <div class="form-group"><button class="btn btn-primary btn-block btn-lg" type="submit" style="background: rgb(129,80,235);filter: brightness(106%) hue-rotate(324deg);">Cadastra Plano</button></div>
            </form>
            <!-- Start: portfolio heading -->
            <div class="heading">
                <h2></h2>
            </div>
            <!-- End: portfolio heading -->
        </section>
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/smart-forms.min.js?h=a52d057774a957ffc5c4e3aabf79520a"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.2.0/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/pikaday.min.js"></script>
    <script src="../assets/js/script.min.js?h=64241765bd4451a847941a9a75856ee8"></script>
</body>

</html>