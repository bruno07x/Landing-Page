<?php require "INC/config.inc.php"; ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
    <link rel="stylesheet" href="CSS/style.css">
    <title>Nike HyperAdapt</title>
</head>

<body>

    <section class="">
        <div class="grid secao1">
            <img class="logo" src="img/nike_icon.png">
            <h1 class="frase display text-center white">
                Just do it!
            </h1>
            <!-- MODAL -->
            <div id="ex1" class="modal modal-style">
                <h3 class="bhead azul2 text-center m-b-2">Não perca tempo!
                    <br> Faça parte desta evolução.</h3>
                <form method="post" class="form-modal">
                    <input type="text" name="nome" required="" class="area-input" placeholder="Primeiro nome">
                    <input type="email" name="email" class="area-input" placeholder="E-mail">
                    <div class="text-center">
                        <button type="submit" name="enviar" required="" class="btn m-t-2">Reserve!</button>
                        <!-- <a href="" class="btn m-t-2">Reserve!</a> -->
                    </div>

                </form>
            </div>
            <!-- FIM MODAL -->
            <div class="area-btn">
                <a style="display: block;" href="#ex1" rel="modal:open" class="btn">Reserve</a>
            </div>
            <div id="countbox" class="contagem"></div>
                                <!-- Teste para validação -->
                                <div class="boxErro">
                        <P>
                            <?php
                                $dados = [];
                                $dados['nome'] = isset($_POST["nome"]) ? $dados['nome'] = $_POST["nome"] : $dados['nome'] = "";
                                $dados['email'] = isset($_POST["email"]) ? $dados['email'] = $_POST["email"] : $email = "";
                                // Verificação do email
                                if (Check::Email($dados['email'])) {
                                    // Email válido, inserção no BD
                                    $Inserir = new Inserir();
                                    $Inserir->InserirBD('reservaclientes', $dados);
                                    echo "<div class=\"boxErro sucesso bhead\">";
                                    echo "<p>";
                                    echo "<b>Parabéns:</b> Você já está na lista de espera, recebera um e-mail assim que o produto estiver disponível para a compra";
                                    echo "</p>";
                                    echo "</div>";
                                };
                            ?>
                        </P>
                    </div>
        </div>
    </section>
    <section>
        <div class="grid secao2">
            <video autoplay loop muted class="movie">
                <source src="IMG/nike_movie.mp4">
            </video>
            <h1 class="grid frase2 display white text-center m-y-0 cinza"> Esqueça tudo que você conhece sobre tênis... Eis aqui uma nova concepção!</h1>
                <div class="grid benefics bhead m-t-0">
                    <p class="display white">Beneficíos:</p>
                    <ul>
                        <li class="m-y-0">▶ Ajuste automatico aos pés</li>
                        <li class="m-y-0">▶ Controle de iluminação RGB</li>
                        <li class="m-y-0">▶ Contador de passos e calorias</li>
                    </ul>
                </div>
                <img class="img-tenis grid m-t-1" src="IMG/tenis.png" alt="tênis nike">
            <h3 class="grid frase3 display text-center cinza">Ideal para amantes de técnologias e atletas</h3>
        </div>
    </section>
    <section>
        <div class="grid secao3">
            <img class="img-bg-min" src="IMG/bg_min.png" alt="Calçado nike">
            <h1 class="display azul1 grid text-center m-t-3">Faça parte desta evolução!</h1>
            <div class="btn-secao3 text-center">
                <a href="#ex1" rel="modal:open" class="btn">Reserve</a>
            </div>
        </div>
    </section>
    <section>
        <div class="grid secao4-perguntas">
            <div class="conteudo-perguntas">
                <h1 class="display white text-center">Perguntas frequentes:</h1>
                <ul>
                    <li>
                        <h3 class="bhead">O que acompanha o produto?</h3>
                        <p class="m-l-0 m-y-0">O produto vem acompanhado com 2 pares de carregadores com plug magnético, um manual de inicio rápido
                            com QR code para baixar o app</p>
                    </li>
                    <li>
                        <h3 class="bhead">Como controlo a iluminação do calçado?</h3>
                        <p class="m-l-0 m-y-0">Através do app você consegue configurar a cor com o código hexadecimal ou simplesmente arrastando
                            para o lado da cor favorita.</p>
                    </li>
                    <li>
                        <h3 class="bhead">Por outro lado, a competitividade nas transações comerciais apresenta tendências no sentido?</h3>
                        <p class="m-l-0 m-y-0">Gostaria de enfatizar que o consenso sobre a necessidade de qualificação agrega Gostaria de enfatizar
                            que o consenso sobre a necessidade de qualificação agrega .</p>
                    </li>
                    <li>
                        <h3 class="bhead">Valor ao estabelecimento dos métodos utilizados na avaliação?</h3>
                        <p class="m-l-0 m-y-0">Gostaria de enfatizar que o consenso sobre a necessidade de qualificação agrega Gostaria de enfatizar
                            que o consenso sobre a necessidade de qualificação agrega .</p>
                    </li>
                </ul>
            </div>
        </div>
        <div class="grid secao4-footer">
            <img class="icone-nike-footer" src="IMG/nike_icon2.png" alt="Icone Nike">
            <ul class="redes-sociais text-center">
                <li>
                    <a href="https://www.instagram.com/nike/?hl=pt-br">
                        <img src="IMG/insta.png" alt="Instagram Nike">
                    </a>
                </li>
                <li class="m-x-1">
                    <a href="https://pt-br.facebook.com/nike/">
                        <img src="IMG/facebook.png" alt="Facebook Nike">
                    </a>
                </li>
                <li>
                    <a href="https://twitter.com/nike">
                        <img src="IMG/twitter.png" alt="Twitter Nike">
                    </a>
                </li>
            </ul>
        </div>
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
    <script type="text/javascript" src="JS/js.js"></script>
</body>

</html>