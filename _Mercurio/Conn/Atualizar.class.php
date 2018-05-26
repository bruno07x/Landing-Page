<?php

/**
 * Description of Atualizar:: Atualiza dados no banco de dados
 *
 * @author 403 Forbidden
 */
class Atualizar extends ConexaoBD {

    private $Tabela;
    private $Dados;
    private $Termos;
    private $Links;
    private $Result;

    /**
     * @var type PDOstatement
     * Atributo usado para armazenar a query preparada
     */
    private $Atualizar;

    /**
     * @var type PDO
     */
    private $ConexaoPDO;

    /**
     * Atualiza uma tabela do banco de dados, para isso basta informar o nome da tabela, os dados em forma de array a serem inseridos
     * os termos e os links de substituicao
     * @param [STRING] $Tabela = Armazena o nome da tabela
     * @param [ARRAY] $Dados = Armazena o valor dos dados que serão atualizados no BD
     * @param [STRING] $Termos = Recebe os termos de em quais colunas serão atualizado os dados EX: WHERE nome = :nome
     * @param [STRING] $Links = Altera o valor do link passado anteriormente em termos EX: nome={$Nome}&nome2={$Nome2}
     */
    public function AtualizarBD($Tabela, array $Dados, $Termos, $Links) {
        $this->Tabela = (string) $Tabela;
        $this->Dados = $Dados;
        $this->Termos = (string) $Termos;
        parse_str($Links, $this->Links);
        
        $this->Syntax();
        $this->Executar();
    }

    /**
     * Retorna TRUE se não ocorrer erros durante a execução de uma query ou FALSE
     * @return [BOOLEAN]
     */
    public function getResult() {
        return $this->Result;
    }

    /**
     * Retorna o número de linhas alteradas no banco de dados
     * @return [INT]
     */
    public function getRowCount() {
        return $this->Atualizar->rowCount();
    }

    /**
     * Altera manualmente os valores dos links
     * OBS: Os valores precisam ser identicos à quantidade de links
     * @param [STRING] $Links = link={$link}&link2={$link2}&...
     */
    public function AlterarLinks($Links) {
        parse_str($Links, $this->Links);
        $this->Syntax();
        $this->Executar();
    }

    /* ==================================================================
     * ================= Métodos privados de auxilio a classe =====================
     * ================================================================== */

    /**
     * [ConectarPDO MÉTODO usado para conectar-se à PDO e preparar a query]
     */
    private function ConectarPDO() {
        $this->ConexaoPDO = parent::getConexao();
        $this->Atualizar = $this->ConexaoPDO->prepare($this->Atualizar);
    }

    /**
     * Cria a syntax usado no prepare statement
     */
    private function Syntax() {
        foreach ($this->Dados as $key => $value) {
            $Places[] = $key . ' = :' . $key;
        }
        $Places = implode(', ', $Places);
        $this->Atualizar = "UPDATE {$this->Tabela} SET {$Places} {$this->Termos}";
    }

    /**
     * Obtem a conexão com BD e a syntax e executa
     */
    private function Executar() {
        $this->ConectarPDO();
        try {
            $this->Atualizar->execute(array_merge($this->Dados, $this->Links));
            $this->Result = true;
        } catch (PDOException $e) {
            $this->Result=null;
            MsgErro($e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
            die();
        }
    }
}
