<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Contact - Inicio</title>
    <?php require("componentes/header_importacoes.html");?>
</head>

<body>
    <?php require("componentes/topo.html");?>
    <main class="page contact-page">
        <section class="portfolio-block contact">
            <div class="container">
                <div class="heading">
                    <h2>Faça parte do time :)</h2>
                </div>
                <form data-bss-recipient="fb75a8c59264a548949f3f090c012911">
                    <div class="form-group"><label for="name">Nome Completo</label><input class="form-control item" type="text" id="name" required=""></div>
                    <div class="form-group"><label for="subject">CPF</label><input class="form-control item" type="text" id="subject" required=""></div>
                    <div class="form-group"><label for="email">Email</label><input class="form-control item" type="email" id="email" required="" style="background-color: rgb(255,255,255);"></div>
                    <div class="form-group"><label for="email">Senha</label><input class="form-control" type="password"></div>
                    <div class="form-group"><label for="email">Telefone</label><input class="form-control" type="tel"></div>
                    <div class="form-group"><label for="email">Valor das consultas</label><input class="form-control" type="number" required=""></div>
                    <div class="form-group"><label for="email">CRP</label><input class="form-control" type="number"></div>
                    <div class="form-group"><label for="email">Possui alguma area de especialização?</label></div><select class="form-control"><optgroup label="Nenhum"><option value="12" selected="">Unimed</option><option value="13">Cassems</option><option value="14">Tabela Social</option><option value="">Pax Primavera</option><option value="">Outros</option></optgroup></select>
                    <div
                        class="form-group"><label for="email">Realiza consultas por planos de saude?</label>
                        <div></div>
            </div>
            <p>Sim&nbsp;&nbsp;<input type="checkbox"></p>
            <div></div>
            <p>Não&nbsp;<input type="checkbox"></p>
            <div class="form-group"><label for="message">Data de Nascimento<br><br></label><input class="form-control" type="date"></div>
            <div class="form-group"><button class="btn btn-primary btn-block btn-lg" type="submit" style="background-color: rgb(127,79,228);">Criar conta</button></div>
            </form>
            </div>
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