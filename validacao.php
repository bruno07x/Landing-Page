<?php 
    require_once '_Mercurio/config.inc.php';

    $Tabela = 'reservaclientes';
    $getPost = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    $setPost = array_map('strip_tags', $getPost); //Limpar tags HTML e PHP para segurança da aplicação
    $Post = array_map('trim', $setPost); //Retira os espaços em branco

    $Json = array();
    
    sleep(2);

    if (isset($Post)) {
        $Ler = new Ler();
        $Ler->LerBD($Tabela, "WHERE email = :email", "email={$Post['DestinoEmail']}");

        if ($Ler->getResult()) {
            $Json['Alerta'] = 'E-mail já cadastrado';
        }

        elseif(!Check::Email($Post['DestinoEmail'])){
            $Json['Erro'] = "Email fora do padrao aceito {$Post['DestinoEmail']}";
        }else{
            $Inserir = new Inserir;
            // $Inserir->InserirBD($Tabela, $Post);
            $Json['Sucesso'] = 'Cadastro efetuado com sucesso, você será redirecionado.';

            $Post['Assunto'] = 'Nike HyperAdapt 1.0';
            $Post['Mensagem'] = 'Clique no link a baixo para confirmar o e-mail';
            $Post['RemetenteNome'] = MAIL_SENDER;
            $Post['RemetenteEmail'] = MAIL_TESTER;


            $EmailEnviar = new Email;
            $EmailEnviar->Enviar($Post);
        }
    }

    echo json_encode($Json);