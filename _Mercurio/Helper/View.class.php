<?php

/**
 * Description of View:: Classe responsável por carregar os templates do projeto e povoar a view.
 *
 * @author Bruno Couto
 */
class View {

    private static $Dados;
    private static $Indices;
    private static $Valores;
    private static $Template;

    /* ========== MÉTODOS PÚBLICOS ========== */

    /**
     * Método usado para carregar o template e pegar o conteúdo do mesmo.
     * @param [STRING] $Template = Armazena caminho do template, aceito somente arquivos .tpl.html
     */
    public static function CarregarTemplate($Template) {
        self::$Template = (string) $Template;
        self::$Template = file_get_contents(self::$Template . '.tpl.html');
    }

    /**
     * Método usado para exibir o template e executar métodos privados da classe
     * @param array $Dados = Recebe um array com os dados da tabela use o foreach para pegar os keys e values
     */
    public static function Exibir(array $Dados) {
        self::setIndices($Dados);
        self::setValores();
        self::ExibirView();
    }

    public static function Incluir($Arquivo, array $Dados) {
        extract($Dados);
        require ("{$Arquivo}.inc.php");
    }

    /* ========== MÉTODOS PRIVADOS ========== */

    /**
     * Cria os indices com os dados da tabela
     * @param [ARRAY] $Dados = Recebe um array com os dados da tabela
     */
    private static function setIndices($Dados) {
        self::$Dados = $Dados;
        self::$Indices = explode('&', '#' . implode("#&#", array_keys(self::$Dados)) . '#');
    }

    /**
     * Cria os valores com os dados da tabela
     */
    private static function setValores() {
        self::$Valores = array_values(self::$Dados);
    }

    /**
     * Exibe todo o conteúdo do template
     */
    private static function ExibirView() {
        echo str_replace(self::$Indices, self::$Valores, self::$Template);
    }

}
