<?php

/**
 * Descricao ::> Classe responsável pelas sessões
 * 
 * OBS: Para usar essa classe você deverá ter 2 tabelas no banco de dados reservadas para inserir os dados dos usuários, 
 * uma tabela contendo as visitas e a outra tabela contendo
 *
 * @author Bruno Couto
 */
class Session {

    private $Data;
    private $Cache;
    private $Trafego;
    private $Navegador;

//    Altera o comportamento inicial da classe já iniciando a sessão
    function __construct($Cache = NULL) {
        session_start();
        $this->MainSession($Cache);
    }

    /*     * ====================
     *  ========== Main ========
     *  ====================== */

//    Método principal responsável por utilizar todos os outros métodos dessa classe
    private function MainSession($Cache = null) {
        $this->Data = date('Y-m-d');
        $this->Cache = ((int) $Cache ? $Cache : 20);

//        Verifica se há sessao criada, caso contrário cria e atualiza
        if (empty($_SESSION['usuarioOnline'])) {
            $this->setTrafego();
            $this->setSessao();
            $this->ChecarNavegador();
            $this->setUsuario();
            
            $this->AtualizaNavegador();
        } else {
            $this->attSessao();
            $this->atualizaTrafego();
            $this->ChecarNavegador();
            $this->AtualizaUsuario();
        }

        $this->Data = NULL;
    }

    /*     * *   ===============================
     *      ========== SESSÃO DO USUÁRIO ========
     *      =================================    */

    private function setSessao() {
        $_SESSION['usuarioOnline'] = [
            'sessaoID' => session_id(),
            'inicio' => date('Y-m-d H:i:s'),
            'fim' => date('Y-m-d H:i:s', strtotime("+{$this->Cache}minutes")),
            'ip' => filter_input(INPUT_SERVER, 'REMOTE_ADDR', FILTER_VALIDATE_IP),
            'url' => filter_input(INPUT_SERVER, 'REQUEST_URI', FILTER_DEFAULT),
            'navegador' => filter_input(INPUT_SERVER, 'HTTP_USER_AGENT', FILTER_DEFAULT)
        ];
    }

    /*     * *   ===============================
     *      ========== VISITAS E ATUALIZAÇÕES ========
     *      =================================    */

//    Pega os dados do banco de dados [Helper de Trafego]
    private function getTrafego() {
        $LerVisitasSite = new Ler;
        $LerVisitasSite->LerBD('visitas', "WHERE data  =:data", "data={$this->Data}");

        if ($LerVisitasSite->getRowCount()) {
            $this->Trafego = $LerVisitasSite->getResult()[0];
        }
    }

//    Atualiza a sessão do usuário
    private function attSessao() {
        $_SESSION['usuarioOnline']['fim'] = date('Y-m-d H:i:s', strtotime("+{$this->Cache}minutes"));
        $_SESSION['usuarioOnline']['url'] = filter_input(INPUT_SERVER, 'REQUEST_URI', FILTER_DEFAULT);
    }

//    Verifica e insere o trafego na tabela
    private function setTrafego() {
        $this->getTrafego();
        if (!$this->Trafego) {
            $DadosVisitas = ['data' => $this->Data, 'usuarios' => 1, 'visitas' => 1, 'paginas' => 1];
            $InserirVisitas = new Inserir;
            $InserirVisitas->InserirBD('visitas', $DadosVisitas);
        } else {
            if (!$this->getCookie()) {
                $DadosVisitas = ['usuarios' => $this->Trafego['usuarios'] + 1, 'visitas' => $this->Trafego['visitas'] + 1, 'paginas' => $this->Trafego['paginas'] + 1];
            } else {
                $DadosVisitas = ['visitas' => $this->Trafego['visitas'] + 1, 'paginas' => $this->Trafego['paginas'] + 1];
            }
            $AtualizaVisitas = new Atualizar;
            $AtualizaVisitas->AtualizarBD('visitas', $DadosVisitas, "WHERE data = :data", "data={$this->Data}");
        }
    }

//    Verifica e atualiza as páginas de trafego
    private function atualizaTrafego() {
        $this->getTrafego();
        $DadosVisitas = ['paginas' => $this->Trafego['paginas'] + 1];
        $AtualizarPaginas = new Atualizar;
        $AtualizarPaginas->AtualizarBD('visitas', $DadosVisitas, "WHERE data = :data", "data={$this->Data}");
        
        $this->Trafego = null;
    }

//    Cria e atualiza os cookies do usuário  [Helper de Trafego]
    private function getCookie() {
        $Cookie = filter_input(INPUT_COOKIE, 'usuarioOnline', FILTER_DEFAULT);
        setcookie('usuarioOnline', base64_encode('Cookie ok'), time() + 86400);
        if (!$Cookie) {
            return false;
        } else {
            return true;
        }
    }
    
        /*     * *   ===============================
     *      ========== NAVEGADORES DE ACESSOS ========
     *      =================================    */
//    Identifica o navegador do usuário
    private function ChecarNavegador() {
        $this->Navegador = $_SESSION['usuarioOnline']['navegador'];
        if (strpos($this->Navegador, 'Firefox')) {
            $this->Navegador = 'Mozila Firefox';
        }elseif (strpos($this->Navegador, 'Chrome')) {
            $this->Navegador = 'Google Chrome';
        }elseif (strpos($this->Navegador, 'MSIE') || strpos($this->Navegador, 'Trident/')) {
            $this->Navegador = 'Internet explorer';
        } else {
            $this->Navegador = 'Outros';
        }
    }
    
//    Atualiza tabela com os dados do navegadores  
    private function AtualizaNavegador() {
        $LerNavegador = new Ler;
        $LerNavegador->LerBD('navegadores', "WHERE navegador = :nav", "nav={$this->Navegador}");
        if (!$LerNavegador->getResult()) {
            $DadosNavegador = ['navegador' => $this->Navegador, 'visitas' => 1];
            $InserirNavegador = new Inserir;
            $InserirNavegador->InserirBD('navegadores', $DadosNavegador);
        } else {
            $DadosNavegador = ['visitas' => $LerNavegador->getResult()[0]['visitas'] + 1];
            $AtualizarNavegador = new Atualizar;
            $AtualizarNavegador->AtualizarBD('navegadores', $DadosNavegador, "WHERE navegador = :nav", "nav={$this->Navegador}");
        }
    }
        /*     * *   ===============================
     *      ========== USUÁRIOS ONLINES ========
     *      =================================    */
    
//    Cadastra usuário online
    private function setUsuario() {
        $sessaoOnline = $_SESSION['usuarioOnline'];
        $sessaoOnline ['navegador'] = $this->Navegador;
        
        $InserirSessao = new Inserir;
        $InserirSessao->InserirBD('sessao', $sessaoOnline);
    }
    
//    Atualiza usuarios onlines
    private function AtualizaUsuario() {
        $DadosSessao = ['fim' => $_SESSION['usuarioOnline']['fim'], 'url' => $_SESSION['usuarioOnline']['url']];
        $AtualziarSessao = new Atualizar;
        $AtualziarSessao->AtualizarBD('sessao', $DadosSessao, "WHERE sessaoID = :id", "id={$_SESSION['usuarioOnline']['sessaoID']}");
        
        if (!$AtualziarSessao->getRowCount()) {
            $LerSessao = new Ler;
            $LerSessao->LerBD('sessao', "WHERE sessaoID = :onid", "onid={$_SESSION['usuarioOnline']['sessaoID']}");
            if (!$LerSessao->getRowCount()) {
                $this->setUsuario();
            }
        }
    }
    

}
