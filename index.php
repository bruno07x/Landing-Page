<?php require "_Mercurio/config.inc.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" /> -->
    <!-- <link rel="stylesheet" href="CSS/animate.css"> -->
    <link rel="stylesheet" href="CSS/style.css">
    <title>Nike HyperAdapt</title>
</head>

<body>
    <h1 class="display-none">Nike HyperAdapt</h1>
    <section class="bg-secao1">
        <div class="grid secao1">
            <div class="A-logo m-t-1">
                <img class="logo" src="IMG/nike_icon.png">
            </div>
            <div class="A-frase-secao1">
                <h1 class="slogan text-center white">Just do it!</h1>
            </div>
            <div class="A-btn-secao1">
                <a class="btn btn-modal">Reserve</a>
            </div>
            <div id="countbox" class="A-cont m-t-0 text-center"></div>
        </div>
    </section>
    <section class="bg-secao2 anime">
        <div class="grid secao2">
            <div class="A-frase1-secao2 text-center">
                <h1 class="slogan">Eis aqui uma nova concepção de calçado!</h1>
            </div>
            <div class="A-beneficios">
                <p class="beneficio bhead azul-strong">
                    Se ajusta automaticamente aos pés, com um controle de iluminação RGB e contador de passos e calorias. Tudo o que você precisa
                    para ser uma pessoa de sucesso.
                </p>
                <p class="m-t-1">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras placerat imperdiet feugiat. Nunc mi nisl.Lorem ipsum dolor
                    sit amet, consectetur adipiscing elit. Cras placerat imperdiet feugiat. Nunc mi nisl.
                </p>
            </div>
            <div class="A-img-secao2">
                <img class="img-secao2 opacity" src="IMG/tenis.png" alt="tênis nike">
            </div>
            <div class="A-frase2-secao2 text-center">
                <h3 class="slogan">Tecnologia e conforto na sola dos pés</h3>
            </div>
        </div>
    </section>
    <section class="anime">
        <div class="grid-full secao3">
            <div class="A-img-secao3">
                <img class="opacity" src="IMG/bg2_min.png" alt="Calçado nike">
            </div>
            <div class="A-frase-secao3">
                <h1 class="slogan white text-center">Faça parte desta evolução!</h1>
            </div>
            <div class="A-btn-secao3">
                <a class="btn btn-modal">Reserve</a>
            </div>
        </div>
    </section>
    <section class="bg-secao4 anime">
        <div class="grid-full secao4">
            <div class="A-frase-secao4">
                <p class="slogan text-center">Perguntas frequentes:</p>
            </div>
            <ul class="ul-secao4 m-b-1">
                <li class="white m-x-1">
                    <p class="h2-sanfona-secao4 bhead">→ O que acompanha o produto?</p>
                    <div class="sanfona">
                        <p class="cinza">O produto vem acompanhado com 2 pares de carregadores com plug magnético, um manual de inicio rápido
                            com QR code para baixar o app</p>
                    </div>
                </li>
                <li class="white m-x-1">
                    <p class="h2-sanfona-secao4 bhead">→ Como controlo a iluminação do calçado?</p>
                    <div class="sanfona">
                        <p class="cinza">Através do app você consegue configurar a cor com o código hexadecimal ou simplesmente arrastando
                            para o lado da cor favorita.</p>
                    </div>
                </li>
                <li class="white m-x-1">
                    <p class="h2-sanfona-secao4 bhead">→ Por outro lado, a competitividade nas transações?</p>
                    <div class="sanfona">
                        <p class="cinza">Gostaria de enfatizar que o consenso sobre a necessidade de qualificação agrega Gostaria de enfatizar
                            que o consenso sobre a necessidade de qualificação agrega .</p>
                    </div>
                </li>
                <li class="white m-x-1">
                    <p class="h2-sanfona-secao4 bhead">→ Valor ao estabelecimento dos métodos?</p>
                    <div class="sanfona">
                        <p class="cinza">Gostaria de enfatizar que o consenso sobre a necessidade de qualificação agrega Gostaria de enfatizar
                            que o consenso sobre a necessidade de qualificação agrega .</p>
                    </div>
                </li>
            </ul>
        </div>
    </section>
    <section>
        <div class="grid-full footer">
            <div class="A-logo-secao5 m-y-0">
                <img class="logo-footer" src="IMG/nike_icon.png">
            </div>
            <ul class="A-redes-sociais-footer text-center">
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

    <!-- MODAL -->
    <div id="modalID" class="A-modal">
        <div class="modal">
            <img src="IMG/fechar.svg" class="fechar" alt="[botão fechar]" title="botão fechar">
            <p class="text-center white bhead">Não perca tempo!
                <br> Faça parte desta evolução.</p>
            <form method="post" class="form-modal form-jquery">
                <span class="white byline">Nome:</span>
                <input type="text" name="nome" required="" class="area-input">
                <span class="white byline">Email:</span>
                <input type="email" name="email" class="area-input">
                <div class="text-center m-t-1">
                    <button class="btn" type="submit">Reserve</button>
                    <!-- <a href="#" class="btn">Reserve!</a> -->
                </div>
                <img src="IMG/load.gif" class="load" alt="Carregando...">
            </form>
            <div class="box"></div>
        </div>
    </div>
    <!-- FIM MODAL -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
    <script type="text/javascript" src="JS/script.js"></script>
</body>

</html>