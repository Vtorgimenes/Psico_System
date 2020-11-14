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
    <main class="page projects-page"></main>
    <!-- Start: Login Form Clean -->
    <div class="login-clean" style="background: rgba(255,255,255,0);">
        <h3 class="text-center">Entre com seu usuario e senha<br><br></h3>
        <form class="border rounded-0" action="loginPaciente.php" data-aos="fade-down" method="post" style="background-color: rgb(255,255,255);filter: blur(0px) grayscale(0%) hue-rotate(0deg) invert(0%);">
            <h2 class="sr-only">Login Form</h2>
            <div class="illustration"><i class="icon-lock" style="color: #376ab7;filter: hue-rotate(324deg);"></i></div>
            <div class="form-group"><input class="form-control" type="email" name="email" placeholder="Email"></div>
            <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Senha"></div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block" role="button" style="background-color: #0067c6;filter: blur(0px) brightness(200%) hue-rotate(36deg) invert(0%) saturate(200%) sepia(59%);">Log In</button>
            </div>
            <a class="forgot" href="#">Caso tenha esquecido a senha entre em contato pelo email Psicosystembussines@gmail.com </a>
        </form>
    </div>
    <!-- End: Login Form Clean -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/smart-forms.min.js?h=a52d057774a957ffc5c4e3aabf79520a"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.2.0/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/pikaday.min.js"></script>
    <script src="../assets/js/script.min.js?h=64241765bd4451a847941a9a75856ee8"></script>
</body>

</html>