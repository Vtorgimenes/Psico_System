<?php
include './TFuncao.php';
if ($_POST) {
    TFuncoes::login($_POST["email"], $_POST["password"], 'psicologo');
}
?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title> Inicio</title>
    <?php require("../componentes/header_importacoes.html"); ?>
</head>

<body>
    <main class="page hire-me-page">
        <h1 class="text-center" data-bs-hover-animate="bounce" style="background: #ffffff;filter: hue-rotate(259deg);"><br>Psicologo faça seu login<br><br></h1>
    </main>
    <!-- Inicio do Formulario -->
    <div class="login-clean" style="background: rgba(0,0,0,0);">
        <form class="border rounded-0" action="pages/loginpsico.php" data-aos="fade-down" method="post" style="background-color: rgb(255,255,255);filter: blur(0px) grayscale(0%) hue-rotate(0deg) invert(0%);">
            <h2 class="sr-only">Login Form</h2>
            <div class="illustration"><i class="icon-lock" style="color: #00337f;filter: hue-rotate(328deg);"></i></div>
            <div class="form-group"><input class="form-control" type="email" name="email" placeholder="Email"></div>
            <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Senha"></div>
            <div class="form-group"><a type="submit" class="btn btn-primary btn-block" role="button" style="background-color: #00adc6;" href="areapsicologo.html">Log In</a></div><a class="forgot" href="#"></a>
        </form>
    </div>
    <!-- Final do formulario -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/smart-forms.min.js?h=a52d057774a957ffc5c4e3aabf79520a"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.2.0/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/pikaday.min.js"></script>
    <script src="../assets/js/script.min.js?h=64241765bd4451a847941a9a75856ee8"></script>
</body>

</html>