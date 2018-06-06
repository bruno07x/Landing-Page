<?php

/* * ##########################################################################################
  Função usada para incluir outras classes: O método mágico autoload e capaz de procurar
  o valor informado pelo operador NEW e verificar se há alguma classe com o nome
  especificado pelo próprio.
 * ########################################################################################### */
function __autoload($Class) {

    $cDir = ['Conn', 'Helper', 'Models'];
    $iDir = null;

    foreach ($cDir as $dirName):
        if (!$iDir && file_exists(__DIR__ . DIRECTORY_SEPARATOR . $dirName . DIRECTORY_SEPARATOR . $Class . '.class.php') && !is_dir(__DIR__ . DIRECTORY_SEPARATOR . $dirName . DIRECTORY_SEPARATOR . $Class . '.class.php')):
            include_once (__DIR__ . DIRECTORY_SEPARATOR . $dirName . DIRECTORY_SEPARATOR . $Class . '.class.php');
            $iDir = TRUE;
        endif;
    endforeach;

    if (!$iDir):
        MsgErro(SYS_Erro, "Erro ao incluir a classe <b>==> {$Class} <==</b>", __FILE__, __LINE__);
        die();
    endif;
}

/* ###########################################################################################
  Configurações do E-mail
 * ########################################################################################### */
define('MAILSAIDA', 'mail.cleoalexandreonline.com.br');
define('MAILPORT', '587');
define('MAILUSER', 'contato@cleoalexandreonline.com.br');
define('MAILPASS', 'contato@cleo@alexandre@@');


/* ###########################################################################################
  Função usada para apresentar mensagens de erros
 * ########################################################################################### */

define('SYS_Erro', 'erro');
define('SYS_Sucesso', 'sucesso');
define('SYS_Alerta', 'alerta');
define('SYS_Noticia', 'noticia');

/**
 * @$ErroTipo [string] Informe o tipo de erro com base nas constantes já criadas, ou código de erro de uma exceção
 * @ErroMensagem [string] Informe uma mensagem para ser exibida em tela
 * @$ErroArquivo [string] Use __FILE___ para pegar o local do arquivo
 * @ErroLinha [string] Use __LINE__ para pegar a linha onde se encontra o erro
 */
function MsgErro($ErroTipo, $ErroMensagem, $ErroArquivo, $ErroLinha) {

    if ($ErroTipo == E_USER_ERROR) {
        $cssClass = SYS_Erro;
    } elseif ($ErroTipo == E_USER_NOTICE) {
        $cssClass = SYS_Noticia;
    } elseif ($ErroTipo == E_USER_WARNING) {
        $cssClass = SYS_Alerta;
    } else {
        $cssClass = $ErroTipo;
    }

    echo "<div class=\"boxErro {$cssClass}\">";
    echo "<p>";
    echo "<b>Erro na linha: {$ErroLinha}</b><br>";
    echo "<em>Mensagem:: {$ErroMensagem}</em><br>";
    echo "<small>Destino do arquivo::{$ErroArquivo}</small>";
    echo "</p>";
    echo "</div>";

    if ($ErroTipo == E_USER_ERROR) {
        die;
    }
}

set_error_handler('MsgErro');

/* ###########################################################################################
  Configurações do banco de dados
 * ########################################################################################### */
define('HOST', 'localhost');
define('PASS', 'bruno@couto@@');
define('USER', 'cleoalexandre_teste');
define('DBA', 'cleoalexandre_teste');
