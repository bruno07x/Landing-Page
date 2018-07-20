<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--NOTE: Arquivo de base normalize css -->
    <link rel="stylesheet" href="_VIEW/assets/CSS/base/normalize.css">
    <!--NOTE: Arquivo de base com cores da marca, tipografica usada, e utilidades -->
    <link rel="stylesheet" href="_VIEW/assets/CSS/base/baseBrand.css">
    <!--NOTE: Arquivo de layout contendo todo o grid do projeto -->
    <link rel="stylesheet" href="_VIEW/assets/CSS/layout/grid.css">
    <!--NOTE: Arquivo de componentes contendo todo os componentes do projeto (botões, modal, backgrounds, etc) -->
    <link rel="stylesheet" href="_VIEW/assets/CSS/components/componentes.css">
    <title>Nike HyperAdapt</title>
</head>
<!-- TODO: Criar sombra no ícone do projeto -->
<!-- TODO: Adicionar um favicon -->

<body>
    <!--NOTE: H1 com finalidade de ficar oculta para dar mais semântica ao projeto. -->
    <h1 class="nulo">Nike HyperAdapt</h1>
    <section class="background__dobra1 shadow__element--1dp">
        <div class="entradaDobra1">
            <div class="entradaDobra1__logo">
                <img src="_VIEW/assets/IMG/pattern/nike__icon-light.png">
            </div>
            <div class="entradaDobra1__frase">
                <h1 class="tipografia__titulo cores__suporteWhite">Just do it!</h1>
            </div>
            <div class="entradaDobra1__botao shadow__element--8dp button">
                <a class="tipografia__subTitulo cores__suporteGray ">Reserve</a>
            </div>
            <div class="entradaDobra1__contador contador tipografia__subTitulo--segunda shadow__element--8dp cores__suporteGray">20H 30m 15s</div>
        </div>
    </section>

    <section class="background__dobra2">
        <div class="especificacoesDobra2">
            <div class="especificacoesDobra2__fraseMain">
                <h1 class="tipografia__subTitulo alinhamento__titulos cores__suporteGray">Eis aqui uma nova concepção de calçado!</h1>
            </div>
            <ul class="especificacoesDobra2__funcionalidades margin__elemento--1">
                <li class="tipografia__corpoTexto cores__suporteGray">Se ajusta automaticamente aos pés
                    <img src="_VIEW/assets/IMG/section2/especDobra2__ajuste-baseDark.png" alt="">
                </li>
                <li class="tipografia__corpoTexto cores__suporteGray">Controle de iluminação RGB
                    <img src="_VIEW/assets/IMG/section2/especDobra2__color-baseDark.png" alt="">
                </li>
                <li class="tipografia__corpoTexto cores__suporteGray">Contador de passos e calorias
                    <img src="_VIEW/assets/IMG/section2/especDobra2__contagem-baseDark.png" alt="">
                </li>
                <li class="tipografia__corpoTexto cores__suporteGray">E mais opções no app de smartphone
                    <img src="_VIEW/assets/IMG/section2/especDobra2__smartphone-baseDark.png"
                        alt="">
                </li>
            </ul>
            <div class="especificacoesDobra2__observacoes">
                <p class="cores__suporteGray tipografia__corpoTexto">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras placerat imperdiet feugiat. Nunc mi nisl.Lorem
                    ipsum dolor sit amet, consectetur adipiscing elit. Cras placerat imperdiet feugiat. Nunc mi nisl.</p>
            </div>
            <div class="especificacoesDobra2__exemploTenis">
                <img class="" src="_VIEW/assets/IMG/section2/especDobra2__exemploTenis.png" alt="[Tênis Nike]" title ="Tênis Nike com funcionalidades">
            </div>
            <div class="especificacoesDobra2__fraseSecundaria">
                <h3 class="tipografia__subTitulo alinhamento__titulos cores__suporteGray">Tecnologia e conforto na sola dos pés</h3>
            </div>
        </div>
    </section>

    <!-- <section class="anime">
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
    </section> -->
    <!-- <section class="bg-secao4 anime">
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
    </section> -->
    <!-- <section>
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
    </section> -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
</body>

</html>